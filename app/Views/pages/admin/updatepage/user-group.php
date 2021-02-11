<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ubah Grup Pengguna</h1>
        </div>

        <form action="<?php echo base_url('user/update_user_group') . '/' . $user['id']; ?>" method="post">
            <div class="mb-2">
                <label class="form-label">Nama Pengguna</label><br>
                <span><b><?= $user["firstname"] . " " . $user["lastname"] ?></b></span>
            </div>
            <div class="mb-2">
                <label class="form-label">Pengguna Grup</label><br>
                <select name="group_id" class="form-control">
                    <?php
                        foreach($auth_groups as $auth) {
                    ?>
                    
                    <option value="<?= $auth["id"]?>" value="<?= $user["group_id"] == $auth["id"] ? "selected" : ""; ?>"><?= $auth["name"]?></option>

                    <?php
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </main>
  </div>
</div>
<?= $this->endSection(); ?>
