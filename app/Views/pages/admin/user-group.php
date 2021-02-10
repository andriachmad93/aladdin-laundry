<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Groups</h1>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Grup</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php
                foreach($users as $user) {
              ?>
                <tr>
                  <td><?= $user['firstname'] ?></td>
                  <td><?= $user['name'] ?></td>
                  <td><a href="<?= base_url('user/edit_user_group/' . $user['user_id']); ?>" class="btn btn-sm btn-outline-secondary">Ubah</a></td>
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
