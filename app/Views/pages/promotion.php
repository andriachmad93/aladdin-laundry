<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Promo</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-header">Voucher Penukaran Poin</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Jumlah Poin</th>
                                            <th>Tanggal Berakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($promotion_list as $promo) {
                                                if ($promo['promotion_category'] == 'poin') {
                                        ?>

                                                    <tr>

                                                        <td><?= $promo['promotion_code']; ?></td>
                                                        <td>Rp. <?= $promo['amount']; ?></td>
                                                        <td><?= date('d M Y', strtotime($promo['end_date'])); ?></td>
                                                    
                                                    </tr>

                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header">Voucher Diskon</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Berakhir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($promotion_list as $promo) {
                                                if ($promo['promotion_category'] != 'poin') {
                                        ?>

                                            <tr>

                                                <td><?= $promo['promotion_code']; ?></td>
                                                <td><?= $promo["promotion_type"] == "%" ? $promo["amount"] . " %" : "Rp " . $promo["amount"]; ?></td>
                                                <td><?= date('d M Y', strtotime($promo['end_date'])); ?></td>
                                            
                                            </tr>

                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
