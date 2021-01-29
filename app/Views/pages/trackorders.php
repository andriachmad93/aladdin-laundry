<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container" action="<?= base_url('track'); ?>" method="POST">
    <?= csrf_field(); ?>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Lacak pesanan Anda</h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="order_codes">Kode pesanan</label>
                        <textarea class="form-control" rows="5" name="order_codes" placeholder="Contoh: ALD/<?= date('Y'); ?>/00000"><?= $order_codes; ?></textarea>
                        <p class="text-justify"><small><em>Anda dapat memasukkan maksimal 5 kode pesanan dengan memisahkannya menggunakan koma (',') Contoh: ALD/<?= date('Y'); ?>/00000, ALD/<?= date('Y'); ?>/99999</em></small></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Lacak</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Hasil pelacakan</h5>
                <div class="card-body">
                    <?php foreach ($tracking as $o => $t) : ?>
                        <div class="form-row bg-info pb-1 pt-1 pr-1 pl-1">
                            <label><b>Kode pesanan: <?= $o; ?></b></label>
                        </div>
                        <div class="form-row pb-1 pt-1 pr-1 pl-1">
                            <?php if (count($t) == 0) : ?>
                                <label><em>Data tidak ditemukan</em></label>
                            <?php else : ?>
                                <table class="table table-bordered table-striped table-hover table-bordered">
                                    <thead>
                                        <th>Tanggal - Jam</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($t as $dt) : ?>
                                            <tr>
                                                <td><?= date("d M Y H:i:s", strtotime($dt['updated_date'])); ?></td>
                                                <td><?= $dt['status_name']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>