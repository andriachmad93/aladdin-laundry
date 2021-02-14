<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pelanggan</h1>
      </div>

      <div class="table-responsive">
        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pelanggan</th>
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>Email</th>
              <th>No Telepon</th>
              <th>Alamat</th>
              <th>Tanggal Pendaftaran</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $i = 1;
            foreach ($users as $user) {
            ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $user["firstname"]; ?> <?= $user["lastname"]; ?></td>
                <td><?= $user["date_of_birth"]; ?></td>
                <td><?= $user['gender']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['phone']; ?></td>
                <td><?= $user['address']; ?></td>
                <td><?= $user["created_at"]; ?></td>
              </tr>
            <?php
              $i++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>