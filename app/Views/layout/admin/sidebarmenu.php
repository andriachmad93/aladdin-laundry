<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url('admin'); ?>">
                    <i class="fa fa-home"></i><span data-feather="home"> Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('order'); ?>">
                    <i class="fa fa-shopping-cart"></i><span data-feather="file"> Pesanan</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('item'); ?>">
                    <i class="fa fa-tshirt"></i><span data-feather="users"> Layanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('promotion'); ?>">
                    <i class="fa fa-percent"></i><span data-feather="bar-chart-2"> Promo</span>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('customer'); ?>"><i class="fa fa-user"></i><span> Pelanggan</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('user/user_group'); ?>"><i class="fa fa-users"></i><span> Hak Akses</span></a></li>
        </ul>
    </div>
</nav>