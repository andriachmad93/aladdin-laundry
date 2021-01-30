<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Laundry Helm</h5>
                <div class="card-body">
                    <p>
                        <img src="https://asset.kompas.com/crops/bF8yPnBJszYRfO8NBBY4DEbfLo0=/0x183:2596x1481/750x500/data/photo/2019/07/22/5d34fdafe0478.jpg" width="400px">
                        
                        <br><br>HELM BERSIH KEPALA SEHAT. Gak asik dong pas lagi motoran kepala gatel karena helm kotor belum dicuci. Tentu sangat menggangu, apalagi kalau lagi jalan sama pasangan kita.
                        <br><br>Kalau biasanya cuci helm harus ke mall tunggu sambil belanja, sekarang  cukup bawa ke Aladdin Laundry aja, untuk area jember dan sekitarnya silahkan datang langsung ke workshop kami
                        <br><br>Jika tidak sempat datang bisa pesan layanan bisa melalui <a href="<?= base_url();?>">aladdinlaundry.com</a> atau dikirim via OJOL baik <a href="https://www.gojekindonesia.com">@gojekindonesia</a> atau <a href="https://www.grab.com">@grabid</a> atau bisa juga melalui kurir kami.
                        <br><br>Silahkan ditanyakan terlebih dahulu dengan CS kami di nomor <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry"> +62 811-3509-299</a>. Dengan senang hati akan berusaha membantu

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
