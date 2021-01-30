<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Laundry Cuci Sofa dan Spring Bed</h5>
                <div class="card-body">
                    <p>
                        <img src="https://media.karousell.com/media/photos/products/2017/12/06/cuci_sofaspringbedjok_mobil_bekasijakartatangerang_1512569840_21203215.jpg" height="400">
                        
                        <br><br>Salah satu layanan laundry andalan di Aladdin Laundry adalah cuci sofa & spring bed. Dengan jam terbang dan pengalaman yang kami miliki banyak customer yang telah mempercayakan, menggunakan jasa cuci sofa kantor, maupun cuci spring bed.
                        <br><br>Sofa, Kasur maupun Spring Bed harus menjadi perhatian khusus dalam segi perawatan dan kebersihannya. Jika tidak dibersihkan dengan baik dan benar, barang-barang tersebut bisa mudah lembar dan berjamur dan yang dikhawatirkan malah menjadi sumber penyakit.
                        <br><br>Anda tidak perlu repot membeli alat-alat dan chemical pembersih untuk memcuci sofa/spring bed anda. Serahkan pada kami ahlinya, cukup dengan reservasi hubungi kontak customer service kami untuk dibantu jadwal hari yang kosong/cocok dengan jadwal anda. Tim kami akan datang ke lokasi (rumah/kantor) sesuai dengan jadwal yang ditentukan.
                        <br><br>Silahkan ditanyakan terlebih dahulu dengan CS kami di nomor <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry">+62 811-3509-299</a> dengan senang hati akan berusaha membantu
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
