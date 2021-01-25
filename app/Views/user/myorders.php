<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Pesanan saya</h4>
        <div class="card-body table-responsive">
            <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                <thead class="bg-light">
                    <tr>
                        <th>No pesanan</th>
                        <th>Tanggal</th>
                        <th>Order date</th>
                        <th>Detil pesanan</th>
                        <th>Total harga</th>
                        <th>Status terakhir</th>
                        <th class="no-sort">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order as $o) :
                    ?>
                        <tr>
                            <td><?= $o['order_code']; ?></td>
                            <td><?= $o['tanggal']; ?></td>
                            <td><?= $o['order_date']; ?></td>
                            <td><?= $o['detil']; ?></td>
                            <td><?= $o['net_amount']; ?></td>
                            <td><?= $o['status_name']; ?></td>
                            <td><button type="button" class="btn btn-secondary btn-sm btnEdit mb-1" data-id="<?= $o['id']; ?>">
                                    <i class="fas fa-edit">&nbsp;</i>Edit</button>
                                <button type="button" class="btn btn-danger btn-sm btnDelete mb-1" data-id="<?= $o['id']; ?>">
                                    <i class="fas fa-trash">&nbsp;</i>Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
                [2, 'desc']
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false
            }],
            "columns": [{
                    "width": "15%"
                }, {
                    "width": "10%"
                }, {
                    "width": "0%",
                    "visible": false,
                },
                {
                    "width": "30%"
                },
                {
                    "width": "15%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "10%"
                }
            ]
        });
    });
</script>
<?= $this->endSection(); ?>