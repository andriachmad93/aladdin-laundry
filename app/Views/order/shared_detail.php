<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode pesanan</label>
    <label class="col-sm-10 col-form-label"><?= $order->order_code; ?></label>
</div>
<?php if ($operation != "track") : ?>
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
                        <td class="text-right"><?= (int)$grandSubTotal; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Biaya pengiriman</td>
                        <td class="text-right"><?= (int)$order->delivery_fee; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Diskon</td>
                        <td class="text-right"><?= (int)$order->discount; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Bayar dengan poin</td>
                        <td class="text-right"><?= (int)$order->point_used; ?></td>
                    </tr>
                    <tr>
                        <th colspan="4">Total</th>
                        <th class="text-right"><?= (int)$order->net_amount; ?></th>
                    </tr>

                </tfoot>
            </table>
        </label>
    </div>
<?php endif; ?>
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