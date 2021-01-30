<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Kontak</h5>
                <div class="card-body">
                    <p>
                        <h5><b>Workshop</b></h5>
                        <span>Ruko Karimata Square Kav. B3. Jember.</span>
                        <br><span>Kecamatan Sumber Sari</span>
                        <br><span>Kabupaten Jember 68121</span>
                        <br><span>Provinsi Jawa Timur</span>

                        <br><br><a href="https://goo.gl/maps/SXN6fPFSM6kj27on9">Petunjuk Arah Google Map</a>
                        
                        <br><br><span>Operasional</span>
                        <br><span>Buka Setiap Hari</span>
                        <br><span>Jam 08.00 - 18.00</span>

                        <br><br><span>Customer Service</span>
                        <br><span>Whatsapp: <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry"> +62 811-3509-299</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url('order/create'); ?>"><img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-laundry-antar-jemput.jpg"></a>
            <br><br>
            <a href="<?= base_url('/pages/price') ?>"><img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-paket-harga-laundry.jpg"></a>
            <br><br>

            <div class="card">
                <h5 class="card-header">Layanan Kami</h5>
                <div class="card-body">
                    <ul>
                        <li><a href="<?= base_url('pages/layanan/stroller-dan-babycare'); ?>">Laundry stroller & baby care</a></li>
                        <li><a href="<?= base_url('pages/layanan/sepatu-dan-tas'); ?>">Laundry sepatu & tas</a></li>
                        <li><a href="<?= base_url('pages/layanan/helm'); ?>">Laundry helm</a></li>
                        <li><a href="<?= base_url('pages/layanan/satuan'); ?>">Laundry satuan Jember</a></li>
                        <li><a href="<?= base_url('pages/layanan/cuci-karpet-kantor'); ?>">Cuci karpet kantor</a></li>
                        <li><a href="<?= base_url('pages/layanan/cuci-sofa-dan-springbed'); ?>">Cuci sofa dan spring bed</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
