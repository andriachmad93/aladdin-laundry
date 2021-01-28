<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Items</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href="<?= base_url('item/add_item_page'); ?>" class="btn btn-sm btn-outline-secondary">Tambah Item</a>
        </div>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
            <thead>
                <tr>
                    <th>Nama Pelayanan</th>
                    <th>Biaya</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                  foreach($item_list as $item) {
              ?>

                <tr>
                  <td><?= $item["item_name"]; ?></td>
                  <td>Rp <?= $item["price"]; ?></td>
                  <td>
                    <a href="<?= base_url('item/update_item_page/' . $item["id"]); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a>
                    <button class="btn btn-sm btn-outline-secondary btnDelete" data-id="<?= $item["id"]; ?>">Hapus</button>
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
        window.location = "<?= base_url('item/delete'); ?>/" + id;
      }
  });
</script>
<?= $this->endSection(); ?>
