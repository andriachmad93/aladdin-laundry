<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <form action="<?= base_url() ?>/user/update" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="card">
            <h4 class="card-header">Profil saya</h4>
            <div class="card-body">
                <?= csrf_field() ?>

                <?= view('Myth\Auth\Views\_message_block') ?>

                <input type="hidden" name="id" value="<?= user()->id; ?>">

                <div class="form-group">
                    <div class="row justify-content-md-center">
                        <img style="display:block;" src="<?= base_url('files/userpics') . "/" . $user->photo; ?>" width="120" height="120" class="rounded-circle border border-primary center">
                    </div>
                    <div class="row justify-content-md-center mt-1">
                        <input type="file" name="photo" id="photo" />
                        <button type="button" id="btnEditPhoto" class="btn btn-secondary btn-sm mb-1 ml-1">Ubah foto profil</button>
                        <button type="button" id="btnCancel" class="btn btn-danger btn-sm mb-1 ml-1">Batalkan</button>
                    </div>
                    <div class="row justify-content-md-center mt-1">
                        <small><em>Ukuran foto harus 120 x 120 pixel</em></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname"><?= lang('Auth.firstname') ?></label>
                            <input type="firstname" class="form-control <?= session('errors.firstname') ? 'is-invalid' : '' ?>" name="firstname" placeholder="<?= lang('Auth.firstname') ?>" value="<?= (old('firstname')) ? old('firstname') : $user->firstname ?>" autofocus>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lastname"><?= lang('Auth.lastname') ?></label>
                            <input type="lastname" class="form-control <?= session('errors.lastname') ? 'is-invalid' : '' ?>" name="lastname" placeholder="<?= lang('Auth.lastname') ?>" value="<?= (old('lastname')) ? old('lastname') : $user->lastname ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $user->email ?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="username"><?= lang('Auth.username') ?></label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $user->username ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="phone">Jenis kelamin</label>
                            <select class="form-control <?= session('errors.gender') ? 'is-invalid' : '' ?>" placeholder="<?= lang('Auth.gender') ?>" name="gender">
                                <option></option>
                                <option value="M" <?= ((old('gender') ? old('gender') : $user->gender) == 'M') ? 'selected' : ''; ?>>Pria</option>
                                <option value="F" <?= ((old('gender') ? old('gender') : $user->gender) == 'F') ? 'selected' : ''; ?>>Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="date_of_birth">Tanggal lahir</label>
                            <input type="date" class="form-control <?= session('errors.date_of_birth') ? 'is-invalid' : '' ?>" name="date_of_birth" placeholder="<?= lang('Auth.date_of_birth') ?>" value="<?= (old('date_of_birth')) ? old('date_of_birth') : $user->date_of_birth ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone"><?= lang('Auth.phone') ?></label>
                            <input type="text" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" name="phone" placeholder="<?= lang('Auth.phone') ?>" value="<?= (old('phone')) ? old('phone') : $user->phone ?>">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script type="text/javascript">
    $("[name='gender']").select2({
        theme: "bootstrap4",
        placeholder: 'Pilih jenis kelamin'
    });


    $(document).on('change', '#photo', function(event) {
        var fileType = $(this).val().split('.').pop();
        var validImageTypes = ["jpeg", "jpg", "png"];

        if ($.inArray(fileType, validImageTypes) < 0) {
            alert("Foto harus berupa .jpg/.jpeg/.png");
            $("#photo").val('');
            return;
        }

        var fr = new FileReader;

        fr.onload = function() {
            var img = new Image;

            img.onload = function() {
                if (img.width != 120 || img.height != 120) {
                    alert("Ukuran foto harus 120 x 120 pixel.");
                    $("#photo").val('');
                }
            };
            img.src = fr.result;
        };

        fr.readAsDataURL(this.files[0]);
    });

    function UpdatePhoto(act = 1) {
        if (act == 1) {
            $("#btnCancel").hide();
            $("#photo").hide();
            $("#btnEditPhoto").show();
        } else {
            $("#btnCancel").show();
            $("#photo").show();
            $("#btnEditPhoto").hide();
        }
    }

    $(document).on('click', '#btnEditPhoto', function() {
        UpdatePhoto(2);
    });

    $(document).on('click', '#btnCancel', function() {
        UpdatePhoto(1);
    });

    $(document).ready(function() {
        UpdatePhoto(1);
    });
</script>

<?= $this->endSection(); ?>