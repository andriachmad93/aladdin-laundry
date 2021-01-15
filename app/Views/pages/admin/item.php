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
                <tr>
                    <td>Cuci Sepatu</td>
                    <td>Rp 100.000</td>
                    <td>
                      <a href="<?= base_url('item/update_item_page/1'); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a>
                      <a href="" class="btn btn-sm btn-outline-secondary">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>Cuci Baju</td>
                    <td>Rp 10.000</td>
                    <td>
                      <a href="<?= base_url('item/update_item_page/1'); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a>
                      <a href="" class="btn btn-sm btn-outline-secondary">Hapus</a>
                    </td>
                </tr>
                <tr>
                    <td>Cuci Piring</td>
                    <td>Rp 5.000</td>
                    <td>
                      <a href="<?= base_url('item/update_item_page/1'); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a>
                      <a href="" class="btn btn-sm btn-outline-secondary">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
