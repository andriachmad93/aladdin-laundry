<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ubah Item</h1>
        </div>

        <form action="<?php echo base_url('item/update_item') . '/' . $item_detail['id']; ?>" method="post">
            <div class="mb-2">
              <label class="form-label">Nama Item</label>
              <input type="text" class="form-control" name="item_name" value="<?= $item_detail['item_name']; ?>">
            </div>
            <div class="mb-2">
              <label class="form-label">Harga</label>
              <input type="text" class="form-control" name="price" value="<?= $item_detail['price']; ?>">
            </div>
            <div class="mb-2">
              <label class="form-label">Masa Aktif</label>
              <select name="is_active" class="form-control">
                <option value="1" <?= $item_detail['is_active'] == 1 ? "selected" : ""; ?>>Ya</option>
                <option value="0" <?= $item_detail['is_active'] == 0 ? "selected" : ""; ?>>Tidak</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
