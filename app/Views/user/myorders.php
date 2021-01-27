<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Pesanan saya</h4>
        <div class="card-body table-responsive">
            <?= view('Myth\Auth\Views\_message_block') ?>

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
                            <td>
                                <?php if ($o['status_id'] == "10") : ?>
                                    <button type="button" class="btn btn-warning btn-sm btnUpload mb-1" data-id="<?= $o['id']; ?>" data-toggle="tooltip" data-placement="top" title="Upload bukti pembayaran">
                                        <i class="fas fa-print">&nbsp;</i></button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-info btn-sm btnTrack mb-1" data-id="<?= $o['id']; ?>" data-toggle="tooltip" data-placement="top" title="Lacak pesanan">
                                    <i class="fas fa-search">&nbsp;</i></button>
                                <?php if ($o['status_id'] == "10") : ?>
                                    <button type="button" class="btn btn-danger btn-sm btnCancel mb-1" data-id="<?= $o['id']; ?>" data-toggle="tooltip" data-placement="top" title="Ajukan pembatalan">
                                        <i class="fas fa-reply">&nbsp;</i></button>
                                <?php endif; ?>
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
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
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
                    "width": "20%"
                },
                {
                    "width": "10%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "15%"
                }
            ]
        });
    });

    $(document).on("click", ".btnTrack", function() {
        let id = $(this).data('id');
        window.location = `<?= base_url('/order/track'); ?>/${id}`;
    });

    $(document).on("click", ".btnUpload", function() {
        let id = $(this).data('id');
        window.location = `<?= base_url('/order/payment'); ?>/${id}`;
    });
</script>
<?= $this->endSection(); ?>