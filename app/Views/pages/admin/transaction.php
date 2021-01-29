<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Transactions</h1>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
            <thead>
                <tr>
                    <th>Kode Pesanan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>AL 123</td>
                    <td>11 November 2020</td>
                    <td>Andri</td>
                    <td>Rp 100.000</td>
                    <td>Belum Bayar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>AL 123</td>
                    <td>11 November 2020</td>
                    <td>Indra</td>
                    <td>Rp 100.000</td>
                    <td>Belum Bayar</td>
                    <td></td>
                </tr>
                <tr>
                    <td>AL 123</td>
                    <td>11 November 2020</td>
                    <td>Andri</td>
                    <td>Rp 100.000</td>
                    <td>Belum Bayar</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
