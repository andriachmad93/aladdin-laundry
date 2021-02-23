<?= $this->extend('layout/owner/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/owner/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Transaksi</h1>
      </div>

      <label class="col-md-4 form-label">Pilih Periode</label>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-4">
            <input type="date" class="form-control startDate" value="<?= $start_date; ?>">
          </div>
          <div class="col-md-4">
            <input type="date" class="form-control endDate" value="<?= $end_date; ?>">
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary btn-sm float-right" onclick="getTransactionPeriod()">Tampilkan</button>
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
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($order_list as $order) {
            ?>

              <tr>
                <td><a href="<?= base_url("Order/detail/" . $order['id']); ?>"><?= $order['order_code']; ?></a></td>
                <td><?= $order['order_date'] ?></td>
                <td><?= $order["firstname"]; ?> <?= $order["lastname"]; ?></td>
                <td>Rp. <?= $order['net_amount'] ?></td>
                <td><?= $order['status_name'] ?></td>
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

<script type="text/javascript">
  function getTransactionPeriod() {
    var startDate = document.getElementsByClassName("startDate");
    var endDate = document.getElementsByClassName("endDate");

    window.location = "<?= base_url('report/transactions'); ?>/" + startDate[0].value + "/" + endDate[0].value;
  }
</script>
<?= $this->endSection(); ?>