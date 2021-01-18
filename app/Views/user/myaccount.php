<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <form action="<?= base_url() ?>/user/update" method="POST">
        <?= csrf_field(); ?>
        <div class="card">
            <h4 class="card-header">Profil saya</h4>
            <div class="card-body">
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <input type="hidden" name="id" value="<?= user()->id; ?>">

                    <div class="form-group">
                        <div class="row justify-content-md-center">
                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="120" height="120" class="rounded-circle border border-primary center">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname"><?= lang('Auth.firstname') ?></label>
                        <input type="firstname" class="form-control <?= session('errors.firstname') ? 'is-invalid' : '' ?>" name="firstname" placeholder="<?= lang('Auth.firstname') ?>" value="<?= (old('firstname')) ? old('firstname') : $user->firstname ?>" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="lastname"><?= lang('Auth.lastname') ?></label>
                        <input type="lastname" class="form-control <?= session('errors.lastname') ? 'is-invalid' : '' ?>" name="lastname" placeholder="<?= lang('Auth.lastname') ?>" value="<?= (old('lastname')) ? old('lastname') : $user->lastname ?>">
                    </div>

                    <div class="form-group">
                        <label for="email"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $user->email ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $user->username ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone"><?= lang('Auth.phone') ?></label>
                        <input type="phone" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" name="phone" placeholder="<?= lang('Auth.phone') ?>" value="<?= (old('phone')) ? old('phone') : $user->phone ?>">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                </form>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>