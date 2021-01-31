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
            <li class="nav-item">
                <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-table"></i> <span class="d-none d-sm-inline">Laporan</span></a>
                <div class="collapse" id="submenu1" aria-expanded="false">
                    <ul class="flex-column pl-2 nav">
                        <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/transactions'); ?>"><span>Transaksi</span></a></li>
                        <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/sales_trend'); ?>"><span>Tren Penjualan</span></a></li>
                        <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/customer_rating'); ?>"><span>Penilaian Pelanggan</span></a></li>
                        <li class="nav-item"><a class="nav-link py-0" href="<?= base_url('report/loyal_customers'); ?>"><span>Top 10 Loyal Customers</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>