<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Promosi</h1>
        </div>

        <form action="<?php echo base_url('/promotion/add_promotion'); ?>" method="post">
          <div class="mb-2">
            <label class="form-label">Nama Promosi</label>
            <input type="text" class="form-control" name="promotion_name">
          </div>
          <div class="mb-2">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="description">
          </div>
          <div class="mb-2">
            <label class="form-label">Waktu Mulai Promosi</label>
            <input type="date" class="form-control" name="start_date">
          </div>
          <div class="mb-2">
            <label class="form-label">Waktu Berakhir Promosi</label>
            <input type="date" class="form-control" name="end_date">
          </div>
          <div class="mb-2">
            <label class="form-label">Tipe Promosi</label>
            <select name="promotion_type" class="form-control">
              <option value="%">Percent (%)</option>
              <option value="Rp">Potongan Harga</option>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Harga Minimum Promosi</label>
            <input type="text" class="form-control" name="amount">
          </div>
          <div class="mb-2">
            <label class="form-label">Harga Maksimum Promosi</label>
            <input type="text" class="form-control" name="maximum_amount">
          </div>
          <div class="mb-2">
            <label class="form-label">Maksimal Penggunaan Promosi</label>
            <input type="text" class="form-control" name="max_use">
          </div>
          <div class="mb-2">
            <label class="form-label">Masa Aktif</label>
            <select name="is_active" class="form-control">
              <option value="1">Ya</option>
              <option value="0">Tidak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
