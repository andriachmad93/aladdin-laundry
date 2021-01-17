<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Promosi</h1>
        </div>

        <form>
            <div class="mb-2">
              <label class="form-label">Nama Promosi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Deskripsi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Waktu Mulai Promosi</label>
              <input type="date" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Waktu Berakhir Promosi</label>
              <input type="date" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Tipe Promosi</label>
              <select name="cars" id="cars" class="form-control">
                <option value="volvo">Percent (%)</option>
                <option value="saab">Potongan Harga</option>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label">Harga Minimum Promosi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Harga Maksimum Promosi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Maksimal Penggunaan Promosi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-2">
              <label class="form-label">Masa Aktif</label>
              <select name="cars" id="cars" class="form-control">
                <option value="volvo">Ya</option>
                <option value="saab">Tidak</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
