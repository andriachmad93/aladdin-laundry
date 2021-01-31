<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <input type="hidden" name="id" value="<?= $order->id; ?>" />
                <h5 class="card-header">Update status pesanan</h5>
                <div class="card-body">
                    <?= view('order\shared_detail') ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-14 col-form-label">
                            <select class="form-control">
                                <option>Pesanan dipick up oleh kurir, menunggu antrian untuk dicuci</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bukti pembayaran</label>
                        <label class="col-sm-10 col-form-label">
                            <input type="file" name="proof_of_payment" />
                            <small style="display:block;" class="mt-2"><em>berkas yang dapat diunggah: .pdf, .jpeg, .png dengan ukuran maksimum 1Mb</em></small>
                        </label>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-md btn-primary mb-1 mr-1" id="btnBack">Update</button>
                            <button type="button" class="btn btn-md btn-secondary mb-1 mr-1" id="btnBack">Kembali</button>
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