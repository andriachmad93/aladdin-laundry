<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container" action="<?= base_url('/order/uploadpayment'); ?>" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <input type="hidden" name="id" value="<?= $order->id; ?>" />
                <h5 class="card-header">Upload bukti pembayaran</h5>
                <div class="card-body">
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <?= view('order\shared_detail') ?>
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
                            <button type="button" class="btn btn-md btn-secondary mb-1 mr-1" id="btnBack">Kembali</button>
                            <button type="submit" class="btn btn-md btn-primary mb-1 mr-1" id="btnUpload">Submit bukti pembayaran</button>
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

    $(document).on("click", "#btnUpload", function(event) {
        var fileType = $("[name='proof_of_payment']").val().split('.').pop();
        var validImageTypes = ["pdf", "jpeg", "jpg", "png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            alert("Berkas yang diunggah harus berupa .pdf/.jpeg/.png ");
            event.preventDefault();
        }
    });
</script>
<?= $this->endSection(); ?>