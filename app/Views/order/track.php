<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container" action="" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Lacak pesanan</h5>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode pesanan</label>
                        <label class="col-sm-10 col-form-label"><?= $order->order_code; ?></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Detil pesanan</label>
                        <label class="col-sm-10 col-form-label"><?= $order->detil; ?></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pengiriman</label>
                        <label class="col-sm-10 col-form-label"><?= $order->delivery_name; ?></label>
                    </div>
                    <?php if ($order->delivery_method_id == "1") : ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat pengiriman</label>
                            <label class="col-sm-10 col-form-label">
                                <?= "{$order->address_name}</b><br />{$order->address}
                                <br/>{$order->provinsi}, {$order->kabupaten}, {$order->kecamatan} {$order->zip_code} Indonesia"; ?>

                            </label>
                        </div>
                    <?php endif; ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status terakhir</label>
                        <label class="col-sm-10 col-form-label"><?= $order->status_name; ?></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Riwayat</label>
                        <div class="col-sm-10">
                            <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tracking as $t) :
                                    ?>
                                        <tr>
                                            <td><?= $t['updated_date']; ?></td>
                                            <td><?= $t['status_name']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-md btn-secondary float-right" id="btnBack">Kembali</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script type="text/javascript">
    $(document).on("click", "#btnBack", function() {
        window.history.go(-1);
    });
</script>
<?= $this->endSection(); ?>