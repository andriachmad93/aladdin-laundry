<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>
    .select2-container {
        z-index: 99999 !important;
    }

    .modal-body {
        overflow-y: auto;
    }
</style>
<?= $this->endSection(); ?>


<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>

<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <form action="/user/update" method="POST">
        <?= csrf_field(); ?>
        <div class="card">
            <h4 class="card-header">Alamat saya</h4>
            <div class="card-body table-responsive">
                <button type="button" id="btnAddAddress" class="btn btn-primary btn-sm"><i class="fas fa-plus">&nbsp;</i>Tambah alamat baru</button>
                <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                    <thead class="bg-light">
                        <tr>
                            <th class="no-sort" width>&nbsp;</th>
                            <th>Penerima</th>
                            <th>Alamat pengiriman</th>
                            <th>Daerah pengiriman</th>
                            <th class="no-sort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($address as $a) :
                        ?>
                            <tr>
                                <td><input type="radio" name="default_address" value="<?= $a['id']; ?>" <?= ($a['default_address'] == 'true') ? 'checked' : ''; ?>></td>
                                <td><b><?= $a['receiver']; ?></b><br />
                                    <?= $a['receiver_phone']; ?>
                                </td>
                                <td><b><?= "{$a['address_name']}</b><br />{$a['address']}"; ?>
                                </td>
                                <td><?= "{$a['provinsi']}, {$a['kabupaten']}, {$a['kecamatan']} {$a['zip_code']} Indonesia"; ?></td>
                                <td><button type="button" class="btn btn-secondary btn-sm btnEdit mb-1" data-id="<?= $a['id']; ?>">
                                        <i class="fas fa-edit">&nbsp;</i>Edit</button>
                                    <button type="button" class="btn btn-secondary btn-sm btnDelete mb-1" data-id="<?= $a['id']; ?>">
                                        <i class="fas fa-trash">&nbsp;</i>Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

<!-- Modal address -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <h5 class="modal-title text-center" id="addressModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <div id="errorBlock"></div>
                <input type="hidden" id="id" name="id" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address_name">Nama alamat</label>
                            <input type="address_name" id="address_name" class="form-control <?= session('errors.address_name') ? 'is-invalid' : '' ?>" name="address_name" placeholder="Rumah" value="<?= (old('address_name')) ? old('address_name') : "" ?>" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receiver">Nama penerima</label>
                            <input type="receiver" id="receiver" class="form-control <?= session('errors.receiver') ? 'is-invalid' : '' ?>" name="address_name" placeholder="Nama penerima" value="<?= (old('receiver')) ? old('receiver') : "" ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receiver_phone">Nomor HP</label>
                            <input type="receiver_phone" id="receiver_phone" class="form-control <?= session('errors.receiver_phone') ? 'is-invalid' : '' ?>" name="receiver_phone" placeholder="No HP penerima" value="<?= (old('receiver_phone')) ? old('receiver_phone') : "" ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="district_id">Kota atau kecamatan</label>
                            <select id="district_id" name="district_id" class="form-control"></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="zip_code">Kode pos</label>
                            <input type="zip_code" id="zip_code" class="form-control <?= session('errors.zip_code') ? 'is-invalid' : '' ?>" name="zip_code" placeholder="Kode pos" value="<?= (old('zip_code')) ? old('zip_code') : "" ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea type="address" id="address" class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" name="address" placeholder="Alamat" rows="4"><?= (old('address')) ? old('address') : "" ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancel" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="button" id="btnSave" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script src="<?= base_url() ?>/js/common.js?v<?= date("Ymd"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.table-data').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "order": [
                [1, 'asc']
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false
            }],
            "columns": [{
                    "width": "5%"
                },
                {
                    "width": "15%"
                },
                {
                    "width": "30%"
                },
                {
                    "width": "25%"
                },
                {
                    "width": "15%"
                }
            ]
        });
    });

    $(document).on("click", "#btnAddAddress", function() {
        resetAddressModal("add");
        $("#addressModal").modal('show');
    });

    $(document).on("click", "#btnSave", function() {
        saveAddress();
    });

    $(document).on("click", ".btnEdit", function() {
        resetAddressModal("edit");
        loadAddress($(this).data("id"));
    });

    $(document).on("click", ".btnDelete", function() {
        if (confirm("Anda yakin?")) {
            deleteAddress($(this).data("id"));
        }
    });

    $(document).on("click", "#btnCancel", function() {
        $("#addressModal").modal('hide');
    });

    /* modal functions */
    function resetAddressModal(method) {
        $('#errorBlock').html("");
        $("#id").val("");

        $("#district_id").children('option').remove();
        $("#district_id").val(null).trigger('change');

        $("#address_name").val("");
        $("#receiver").val("");
        $("#receiver_phone").val("");
        $("#zip_code").val("");
        $("#address").val("");

        if (method == "add") {
            $("#addressModalLabel").text("Tambah alamat baru");
            $("#btnSave").text("Tambah");
        } else if (method == "edit") {
            $("#addressModalLabel").text("Ubah alamat");
            $("#btnSave").text("Ubah");
        }
    }

    $("#district_id").select2({
        theme: "bootstrap4",
        dropdownParent: $('#addressModal .modal-body'),
        placeholder: 'Cari kota/kecamatan',
        minimumInputLength: 3,
        ajax: {
            url: '<?= base_url() ?>/Address/getKota',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    function loadAddress(id) {
        $.ajax({
            url: '<?= base_url() ?>/Address/getDetailAddress',
            type: "post",
            dataType: 'json',
            data: {
                'id': id
            },
            success: function(response) {
                if (response != null && typeof response !== "undefined") {
                    $("#id").val(response.id);
                    $("#address_name").val(response.address_name);
                    $("#receiver").val(response.receiver);
                    $("#receiver_phone").val(response.receiver_phone);
                    $("#zip_code").val(response.zip_code);
                    $("#address").val(response.address);

                    districtSelect = $("#district_id");
                    var option = new Option(response.nama_kota, response.district_id, true, true);
                    districtSelect.append(option).trigger('change');

                    districtSelect.trigger({
                        type: 'select2:select',
                        params: {
                            data: [{
                                id: response.district_id,
                                text: response.nama_kota
                            }]
                        }
                    });

                    $("#addressModal").modal('show');
                }
            }
        });
    }

    function saveAddress() {
        $.ajax({
            url: '<?= base_url() ?>/Address/save',
            type: "post",
            dataType: 'json',
            data: {
                'id': $("#id").val(),
                'address_name': $("#address_name").val(),
                'receiver': $("#receiver").val(),
                'receiver_phone': $("#receiver_phone").val(),
                'zip_code': $("#zip_code").val(),
                'address': $("#address").val(),
                'district_id': $("#district_id").val(),
            },
            success: function(response) {
                clearValidations();
                if (response != null && typeof response !== "undefined") {
                    if (response.status != 200) {
                        if (!response.message && response.data) {
                            let data = JSON.parse(response.data);
                            showErrors("errorBlock", data['error']);
                        } else {
                            alert(response.message);
                        }
                    } else {
                        if (response.message) {
                            alert(response.message);
                        }
                        location.reload();
                    }
                }
            }
        });
    }

    function deleteAddress(id) {
        $.ajax({
            url: `<?= base_url() ?>/Address/delete/${id}`,
            type: "get",
            dataType: 'json',
            success: function(response) {
                if (response != null && typeof response !== "undefined") {
                    if (response.status != 200) {
                        if (response.message) {
                            alert(response.message);
                        }
                    } else {
                        if (response.message) {
                            alert(response.message);
                        }
                        location.reload();
                    }
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>