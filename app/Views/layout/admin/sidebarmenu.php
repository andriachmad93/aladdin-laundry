<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= base_url('report/dashboard'); ?>">
            <span data-feather="home"></span>
            Dashboard
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('order'); ?>">
            <span data-feather="file"></span>
            Pesanan
        </a>
        </li>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('item'); ?>">
            <span data-feather="users"></span>
            Layanan
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('promotion'); ?>">
            <span data-feather="bar-chart-2"></span>
            Promo
        </a>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('customer'); ?>"><span>Pelanggan</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('user/user_group'); ?>"><span>Hak Akses</span></a></li>
        <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> <span class="d-none d-sm-inline">Laporan</span></a>
            <div class="collapse" id="submenu1" aria-expanded="false">
                <ul class="flex-column pl-2 nav">
                <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/sales_trend'); ?>"><span>Tren Penjualan</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/transactions'); ?>"><span>Transaksi</span></a></li>
                    <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/loyal_customers'); ?>"><span>Top 10 Loyal Customers</span></a></li>
                </ul>
            </div>
        </li>
    </ul>
    </div>
</nav>
