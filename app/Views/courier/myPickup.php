<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/courier/sidebarmenu') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">myPickup</h1>
            </div>

            <div class="table-responsive mb-5">
                <h4>Pesanan yang sedang diambil</h4>
                <table id="tblActiveOrder" class="table table-striped table-bordered" width="100%" cellspacing="6">
                    <thead>
                        <tr>
                            <th>Kode pesanan</th>
                            <th>Tanggal pesanan</th>
                            <th>Detil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($onGoingPickupOrder as $order) : ?>
                        <tr>
                            <td><?= $order['order_code']; ?></td>
                            <td><?= $order['tanggal']; ?></td>
                            <td><?= $order['detil']; ?></td>
                            <td><b><?= $order['receiver']; ?></b><br /> <?= $order['receiver_phone']; ?></td>
                            <td><?= $order['address']; ?></td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnOpen mb-1" data-id="<?= $order['id']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-success btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-check">&nbsp;</i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
               
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mb-2">
                <h4>Pesanan yang siap untuk diambil</h4>
                <table id="tblOutstandingOrder" class="table table-striped table-bordered" width="100%" cellspacing="6">
                    <thead>
                        <tr>
                            <th>Kode pesanan</th>
                            <th>Tanggal pesanan</th>
                            <th>Detil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($readyPickupOrder as $order) : ?>
                        <tr>
                            <td><?= $order['order_code']; ?></td>
                            <td><?= $order['tanggal']; ?></td>
                            <td><?= $order['detil']; ?></td>
                            <td><b><?= $order['receiver']; ?></b><br /> <?= $order['receiver_phone']; ?></td>
                            <td><?= $order['address']; ?></td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnOpen mb-1" data-id="<?= $order['id']; ?>" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-primary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-hands">&nbsp;</i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tblOutstandingOrder').DataTable();
        $('#tblActiveOrder').DataTable();
    });
    $(document).on("click", ".btnOpen", function() {
        let id = $(this).data('id');

        window.location = `<?= base_url('/order/detail'); ?>/${id}`;
    });
</script>
<?= $this->endSection(); ?>