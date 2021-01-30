<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <form action="<?= base_url() ?>/user/updatepassword" method="POST">
        <?= csrf_field(); ?>
        <div class="card">
            <h4 class="card-header">Ubah password</h4>
            <div class="card-body">
                <?= csrf_field() ?>

                <?= view('Myth\Auth\Views\_message_block') ?>

                <input type="hidden" name="id" value="<?= user()->id; ?>">

                <div class="form-group">
                    <label for="current_password">Password saat ini</label>
                    <input type="password" name="current_password" class="form-control <?php if (session('errors.current_password')) : ?>is-invalid<?php endif ?>" placeholder="Password saat ini" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="password"><?= lang('Auth.password') ?></label>
                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Ubah password</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>