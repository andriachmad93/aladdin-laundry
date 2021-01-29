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
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Penukaran Poin</h5>
                <div class="card-body">
                    <label for="redeem_code">Kode Promosi</label>
                    <div class="form-group">
                        <div class="input-group mb-1">
                            <input class="form-control mr-5" name="redeem_code" id="redeem_code" placeholder="Masukkan kode promosi" />
                            <button class="btn btn-primary btn-sm float-right" type="button" id="btnUseVoucher">Gunakan voucher</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>
