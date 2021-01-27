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
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode pesanan</label>
                        <label class="col-sm-10 col-form-label"><?= $order->order_code; ?></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Detil pesanan</label>
                        <label class="col-sm-10 col-form-label">
                            <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Barang</th>
                                        <th>Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Harga satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $grandSubTotal = 0;
                                    foreach ($orderDetail as $d) :  ?>
                                        <tr>
                                            <td><?= $d['item_name']; ?></td>
                                            <td><?= $d['uom']; ?></td>
                                            <td class="text-right"><?= $d['quantity']; ?></td>
                                            <td class="text-right"><?= (int)$d['price']; ?></td>
                                            <td class="text-right"><?= (int)$d['sub_total']; ?></td>
                                        </tr>
                                    <?php
                                        $grandSubTotal += $d['sub_total'];
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Sub total</td>
                                        <td class="text-right"><?= $grandSubTotal; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Biaya pengiriman</td>
                                        <td class="text-right"><?= $order->delivery_fee; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Diskon</td>
                                        <td class="text-right"><?= $order->discount; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Bayar dengan poin</td>
                                        <td class="text-right"><?= $order->point_used; ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th class="text-right"><?= $order->net_amount; ?></th>
                                    </tr>

                                </tfoot>
                            </table>
                        </label>
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
                        <label class="col-sm-2 col-form-label">Bukti pembayaran</label>
                        <label class="col-sm-10 col-form-label">
                            <input type="file" name="proof_of_payment" />
                            <small style="display:block;" class="mt-2"><em>berkas yang dapat diunggah: .pdf, .jpeg, .png</em></small>
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
            event.preventDefault();
        }
    });
</script>
<?= $this->endSection(); ?>