<p>Seseorang meminta reset password pada email ini untuk <?= base_url() ?>.</p>

<p>Untuk mereset password, gunakan kode berikut atau URL dan ikuti instruksinya.</p>

<p>Kode: <?= $hash ?></p>

<p>Kunjungi <a href="<?= base_url('reset-password') . '?token=' . $hash ?>">Reset password</a>.</p>

<br>

<p>Jika Anda tidak merasa meminta reset password, Anda dapat mengabaikan email ini..</p>