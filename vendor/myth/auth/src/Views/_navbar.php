<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Aladdin Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(''); ?>">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pages/tentang-kami'); ?>">Tentang kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pages/layanan'); ?>">Layanan</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!logged_in()) : ?>
                    <li>
                        <p class="navbar-text">Sudah punya akun?</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login'); ?>">&nbsp;Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register'); ?>">| Daftar baru</a>
                    </li>
                <?php else : ?>
                    <li>
                        <p class="navbar-text">Selamat datang <b><?= user()->username; ?></b>!</p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout'); ?>">&nbsp;Keluar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Myth:Auth</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?= lang('Auth.home') ?> <span class="sr-only">(<?= lang('Auth.current') ?>)</span></a>
            </li>
        </ul>
    </div>
</nav> -->