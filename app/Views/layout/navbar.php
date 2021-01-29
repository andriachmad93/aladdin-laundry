<nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top">
    <div class="container-fluid">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toogle" id="navbarLayanan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?= base_url('pages/layanan'); ?>">Layanan</a>
                    <div class="dropdown-menu" aria-labelledby="navbarLayanan">
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/stroller-dan-babycare'); ?>">Laundry stroller & baby care</a>
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/sepatu-dan-tas'); ?>">Laundry sepatu & tas</a>
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/helm'); ?>">Laundry helm</a>
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/satuan'); ?>">Laundry satuan</a>
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/cuci-karpet-kantor'); ?>">Cuci karpet kantor</a>
                        <a class="dropdown-item" href="<?= base_url('pages/layanan/cuci-sofa-dan-springbed'); ?>">Cuci sofa dan spring bed</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pages/promo'); ?>">Promo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pages/faq'); ?>">FAQ</a>
                </li>
                <?php if (logged_in()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('order/create'); ?>">Buat pesanan</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('track'); ?>">Lacak pesanan</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" role="button">
                            <img src="<?= base_url('files/userpics/' . user()->photo); ?>" width="40" height="40" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?= base_url("user"); ?>">Profil saya</a>
                            <a class="dropdown-item" href="<?= base_url("logout"); ?>">Keluar</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>