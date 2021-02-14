<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 pb-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= base_url('courier'); ?>">
                    <i class="fa fa-home"></i><span data-feather="home"></span>
                    Beranda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/courier/mypickup'); ?>">
                    <i class="fa fa-hands"></i>&nbsp;myPickup
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/courier/mydelivery'); ?>">
                    <i class="fa fa-truck"></i>&nbsp;myDelivery
                </a>
            </li>
        </ul>
    </div>
</nav>