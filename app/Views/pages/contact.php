<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Kontak</h5>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url('order/create'); ?>"><img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-laundry-antar-jemput.jpg"></a>
            <br><br>
            <img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-paket-harga-laundry.jpg">
            <br><br>

            <div class="card">
                <h5 class="card-header">Layanan Kami</h5>
                <div class="card-body">
                    <ul>
                        <li>COBA</li>
                        <li>COBA</li>
                        <li>COBA</li>
                        <li>COBA</li>
                        <li>COBA</li>
                        <li>COBA</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
