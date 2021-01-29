<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Promotions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href="<?= base_url('promotion/add_promotion_page'); ?>" class="btn btn-sm btn-outline-secondary">Tambah Promosi</a>
        </div>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
            <thead>
                <tr>
                    <th>Nama Promosi</th>
                    <th>Kode Promosi</th>
                    <th>Tanggal Mulai Promosi</th>
                    <th>Tanggal Berakhir Promosi</th>
                    <th>Kategori Promosi</th>
                    <th>Tipe Promosi</th>
                    <th>Jumlah</th>
                    <th>Maksimal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                foreach($promotion_list as $promotion) {
              ?>

                <tr>
                    <td><?= $promotion["promotion_name"]; ?></td>
                    <td><?= $promotion["promotion_code"]; ?></td>
                    <td><?= $promotion["start_date"]; ?></td>
                    <td><?= $promotion["end_date"]; ?></td>
                    <td><?= $promotion["promotion_category"]; ?></td>
                    <td><?= $promotion["promotion_type"] == "%" ? "Percent" : "Rupiah"; ?></td>
                    <td><?= $promotion["promotion_type"] == "%" ? $promotion["amount"] . " %" : "Rp " . $promotion["amount"]; ?></td>
                    <td><?= $promotion["maximum_amount"]; ?></td>
                    <td>
                      <a href="<?= base_url('promotion/update_promotion_page/' . $promotion["id"]); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a>
                      <button class="btn btn-sm btn-outline-secondary btnDelete" data-id="<?= $promotion["id"]; ?>">Hapus</button>
                    </td>
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
  $(document).on("click", ".btnDelete", function() {
    var id = $(this).data('id');

    if (confirm("Apakah anda yakin hapus data ? ")) {
      window.location = "<?= base_url('promotion/delete'); ?>/" + id;
    }
  });
</script>
<?= $this->endSection(); ?>
