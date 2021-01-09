<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Promotions</h1>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
            <thead>
                <tr>
                    <th>Nama Promosi</th>
                    <th>Tanggal Kedaluwarsa</th>
                    <th>Kode Promosi</th>
                    <th>Tipe Promosi</th>
                    <th>Jumlah Potongan</th>
                    <th>Maksimal Potongan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tahun Baru</td>
                    <td>11 November 2020</td>
                    <td>ABC123</td>
                    <td>Percent</td>
                    <td>5 %</td>
                    <td>Rp 5.000</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
