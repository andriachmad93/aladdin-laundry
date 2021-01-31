<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Transaksi</h1>
      </div>

      <label class="col-md-4 form-label">Pilih Periode</label>
      <div class="col-md-8">
          <div class="row">
              <div class="col-md-4">
                  <input type="date" class="form-control">
              </div>
              <div class="col-md-4">
                  <input type="date" class="form-control">
              </div>
              <div class="col-md-2">
                  <button class="btn btn-primary btn-sm float-right">Tampilkan</button>
              </div>
          </div>
      </div>
      <br><br>
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
              <?php
                foreach($order_list as $order) {
              ?>

              <tr>
                <td><?= $order['order_code'] ?></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order["firstname"]; ?> <?= $order["lastname"]; ?></td>
                <td>Rp. <?= $order['net_amount'] ?></td>
                <td><?= $order['status_name'] ?></td>
                <td></td>
              </tr>
              
              <?php
                }
              ?>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
