<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Item</h1>
        </div>

        <form action="<?php echo base_url('/item/add_item'); ?>" method="post">
            <div class="mb-2">
              <label class="form-label">Nama Item</label>
              <input type="text" class="form-control" name="item_name">
            </div>
            <div class="mb-2">
              <label class="form-label">Satuan</label>
              <input type="text" class="form-control" name="uom">
            </div>
            <div class="mb-2">
              <label class="form-label">Tipe Layanan</label>
              <select name="item_type" class="form-control">
                <option value="1">Laundry Scroller & Baby Care</option>
                <option value="2">Laundry Sepatu & Tas</option>
                <option value="3">Laundry Helm</option>
                <option value="4">Laundry Satuan</option>
                <option value="5">Cuci Karpet Kantor</option>
                <option value="6">Cuci Sofa & Spring Bed</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label">Harga</label>
              <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-2">
              <label class="form-label">Masa Aktif</label>
              <select name="is_active" class="form-control">
                <option value="1">Ya</option>
                <option value="0">Tidak</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
