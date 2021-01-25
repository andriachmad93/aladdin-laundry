<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container-fluid col-md-12" action="" method="POST">
    <?= csrf_field(); ?>
    <div id="errorBlock">

    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Detil pesanan</h5>
                <div class="card-body">
                    <p class="text-xs-left font-italic">Tekan tombol 'tambah barang' untuk menambah barang pada pesanan Anda</p>
                    <table id="tblOrder" class="table-data table table-striped" width="100%" cellspacing="6">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 30%;">Nama barang</th>
                                <th style="width: 10%;">Satuan</th>
                                <th style="width: 10%;" class="text-right">Jumlah</th>
                                <th style="width: 20%;" class="text-right">Harga satuan</th>
                                <th style="width: 20%;" class="text-right">Total</th>
                                <th style="width: 10%;">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th colspan="4">Sub total</th>
                                <th class="subTotal" id="subTotal" class="text-right">0</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                    <button type="button" id="btnAdd" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus">&nbsp;</i>Tambah barang</button>
                    <div class="form-group"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Pembayaran & Pengiriman</h5>
                <div class="card-body">
                    <div class="form-check mb-2">
                        <!-- 1: delivery; 2: self-pickup -->
                        <input type="hidden" name="delivery_method_id" id="delivery_method_id" value="1" />
                        <input type="checkbox" id="cboPickup" class="form-check-input" />
                        <label class="form-check-label" for="cboPickup">
                            Ambil laundry sendiri
                        </label>
                    </div>
                    <div class="form-group" id="deliveryBox">
                        <label for="address_id">Alamat pengiriman</label>
                        <select class="form-control" name="address_id" id="address_id">
                            <?php foreach ($address as $a) : ?>
                                <option value="<?= $a['id']; ?>" <?= ($a['default_address'] == 'true') ? 'selected' : ''; ?>><?= $a['address_name']; ?> - <?= $a['address']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row mb-2" id="pointBox" style="<?= (!empty($point) && $point > 0) ? "" : "display:none"; ?>">
                        <div class="col-md-8">
                            <div class="form-check">
                                <input type="checkbox" id="cboUsePoint" class="form-check-input" />
                                <label class="form-check-label" for="cboUsePoint">
                                    Gunakan poin
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="point" class="form-control number text-right" name="point" readonly value="<?= $point; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="redeem_code">Voucher</label>
                        <div class="input-group mb-3">
                            <input class="form-control" name="redeem_code" id="redeem_code" placeholder="Masukkan kode promosi" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="btnUseVoucher">Gunakan voucher</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item">Sub total <span class="badge badge-primary float-right subTotal" id="subTotal2">0</span></li>
                            <li class="list-group-item">Biaya pengiriman <span class="badge badge-primary float-right" id="biayaKirim">0</span></li>
                            <li class="list-group-item">Diskon <span class="badge badge-primary float-right" id="discount">0</span></li>
                            <li class="list-group-item">Bayar dengan poin <span class="badge badge-primary float-right" id="point_used">0</span></li>
                            <li class="list-group-item"><b>Total</b> <span class="badge badge-primary float-right" id="grandTotal">0</span></li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="payment_method_id">Metode pembayaran</label>
                        <select class="form-control" name="payment_method_id" id="payment_method_id">
                            <option></option>
                            <option value="1">Bayar di tempat</option>
                            <option value="2">Transfer bank</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btnCancel" class="btn btn-danger btn-md"><i class="fas fa-close">&nbsp;</i>Batalkan</button>
                        <button type="button" id="btnSubmit" class="btn btn-primary btn-md"><i class="fas fa-disk">&nbsp;</i>Buat pesanan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script src="<?= base_url() ?>/js/common.js?v<?= date("Ymd"); ?>"></script>
<script type="text/javascript">
    let biayaKirim = 0;
    let grandSubTotal = 0;
    let point = 0;
    let discount = 0;
    let grandTotal = 0;

    $(document).ready(function() {
        $("#point").trigger('blur');
    });

    $(document).on("click", "#btnAdd", function() {
        let uid = CreateGuid();
        let html = "";
        html += `<tr id='${uid}'>
                <td><input type='hidden' name='row_id[]' value='${uid}'/>
                    <select class='form-control cboItem' name='item_id[]' id='item_id_${uid}'></select><input type='hidden' name='item_name[]' id='item_name_${uid}'/></td>
                <td><input type='text' class='form-control' name='uom[]' id='uom_${uid}' readonly/></td>
                <td><input type='text' class='form-control text-right number' name='quantity[]' id='quantity_${uid}'/></td>
                <td><input type='text' class='form-control text-right number' name='price[]' id='price_${uid}' readonly/></td>
                <td><input type='text' class='form-control text-right number' name='sub_total[]' id='sub_total_${uid}' readonly/></td>
                <td><button type='button' class='btn btn-danger btn-sm btnDelete mb-1'><i class='fas fa-trash'>&nbsp;</i></button></td>
            </tr>`;
        $("#tblOrder tbody").append(html);
        initiateCboItem(uid);

    });

    $("#address_id").select2({
        theme: "bootstrap4",
        placeholder: 'Pilih alamat'
    });

    $("#payment_method_id").select2({
        theme: "bootstrap4",
        placeholder: 'Pilih metode pembayaran'
    });

    function initiateCboItem(uid) {
        $(`#item_id_${uid}`).select2({
            theme: "bootstrap4",
            placeholder: 'Cari barang',
            minimumInputLength: 3,
            ajax: {
                url: '<?= base_url() ?>/Order/getItem',
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
                        results: response.data
                    };
                },
                cache: true
            }
        });
    }

    $(document).on("select2:select", ".cboItem", function() {
        loadItem($(this).val(), $(this).closest("tr").attr("id"));
    })

    $(document).on("click", ".btnDelete", function() {
        $(this).closest("tr").remove();
    });

    function loadItem(id = "0", trid = "") {
        $.ajax({
            url: `<?= base_url() ?>/Order/getItemDetail/${id}`,
            type: "get",
            dataType: 'json',

            success: function(response) {
                if (response != null && typeof response !== "undefined") {
                    $(`#item_name_${trid}`).val(response.data.item_name);
                    $(`#uom_${trid}`).val(response.data.uom);
                    $(`#price_${trid}`).val(parseInt(response.data.price).toLocaleString("en"));
                }
            }
        });
    }

    $(document).on("blur", "[name^='quantity']", function() {
        calculateSubTotal();
    });

    function calculateSubTotal() {
        grandSubTotal = 0;
        $("#tblOrder tbody tr").each(function() {
            let uid = $(this).attr('id');
            let qty = String($(`#quantity_${uid}`).val()).replace(/,/g, '');
            let price = String($(`#price_${uid}`).val()).replace(/,/g, '');
            let subtotal = parseInt(qty) * parseInt(price);
            if (isNaN(subtotal))
                subtotal = 0;

            grandSubTotal += subtotal;
            $(`#sub_total_${uid}`).val(subtotal.toLocaleString("en"));
        });
        $(".subTotal").text(grandSubTotal.toLocaleString("en"));

        grandTotal = grandSubTotal + biayaKirim;
        $("#grandTotal").text(grandTotal.toLocaleString("en"));
    }

    $(document).on("change", "#cboPickup", function() {
        if ($(this).prop('checked')) {
            biayaKirim = 0;
            $("#delivery_method_id").val(2);
            $("#deliveryBox").hide();
        } else {
            biayaKirim = 5000;
            $("#delivery_method_id").val(1);
            $("#deliveryBox").show();
        }

        $("#biayaKirim").text(biayaKirim.toLocaleString("en"));

        calculateSubTotal();
    });

    function OrderValidation() {

    }

    $(document).on("click", "#btnCancel", function() {
        window.location = `<?= base_url(); ?>`;
    });

    $(document).on("click", "#btnSubmit", function() {
        SubmitOrder();
    });

    function SubmitOrder() {
        let form = $('form')[0];
        let data = new FormData(form);

        $.ajax({
            url: `<?= base_url() ?>/Order/submit`,
            type: "post",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
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
                        window.location = "<?= base_url("/user/myorders"); ?>";
                    }
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>