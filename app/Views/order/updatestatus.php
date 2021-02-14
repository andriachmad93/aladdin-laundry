<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container" action="<?= base_url('/order/submitStatus'); ?>" method="POST">
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <input type="hidden" name="id" value="<?= $order->id; ?>" />
                <h5 class="card-header">Update status pesanan</h5>
                <div class="card-body">
                    <?= view('order\shared_detail') ?>
                    <?php if (!empty($order->proof_of_payment)) : ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bukti pembayaran</label>
                            <label class="col-sm-10 col-form-label">
                                <a href="<?= base_url('files/orders/' . $order->id . '/' . $order->proof_of_payment); ?>" target="_blank">klik disini</a>
                            </label>
                        </div>
                    <?php endif; ?>
                    <?php if (empty($order->proof_of_payment) && $order->status_id == 30 && $order->delivery_method_id == 1) : ?>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bukti pembayaran</label>
                            <label class="col-sm-10 col-form-label">
                                <input type="file" name="proof_of_payment" id="proof_of_payment" />
                                <small style="display:block;" class="mt-2"><em>berkas yang dapat diunggah: .pdf, .jpeg, .png dengan ukuran maksimum 1Mb</em></small>
                            </label>
                        </div>
                    <?php endif; ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="status_id" name="status_id">
                                <option></option>
                                <?php foreach ($status as $s) : ?>
                                    <option value="<?= $s['id']; ?>" <?= $s['id'] == $order->status_id ? 'selected' : ''; ?>><?= $s['id'] . ' - ' . $s['status_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-md btn-primary mb-1 mr-1" id="btnUpdate">Update</button>
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

    $("#status_id").select2({
        theme: "bootstrap4",
        placeholder: 'Pilih status'
    });

    $(document).on("click", "#btnUpdate", function(event) {
        let isHaveFile = $("#proof_of_payment").attr("name");
        if (typeof isHaveFile !== "undefined") {
            let fileType = $("[name='proof_of_payment']").val().split('.').pop();
            let validImageTypes = ["pdf", "jpeg", "jpg", "png"];

            if ($.inArray(fileType, validImageTypes) < 0) {
                alert("Berkas yang diunggah harus berupa .pdf/.jpeg/.png ");
                event.preventDefault();
            }
        }
    });
</script>
<?= $this->endSection(); ?>