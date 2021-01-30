<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Laundry Satuan</h5>
                <div class="card-body">
                    <p>
                        <img src="https://ecs7.tokopedia.net/img/cache/900/product-1/2019/7/28/72004248/72004248_5fc917d0-a767-4c86-94f1-f10f52ebf6de_670_903.jpg" height="400">
                        
                        <br><br>Kami juga menediakan layanan laundry satuan seperti pakaian kerja (kemeja kerja, celana kerja, dasi), jaket, blazer, baju muslim, baju batik, bantal, guling, sprei, bed cover dll
                        <br><br><b>Kenapa harus di laundry satuan?</b>
                        <br>Pakaian yang bukan dipakai sehari-hari tentunya digunakan pada saat tertentu dan harus sangat terjaga kebersihannya, harus diperlakukan khusus sesuai dengan jenis bahannya. Dengan layanan laundry satuan pelanggan tidak perlu khawatir pakaiannya akan terkena luntur/kerusakan yang lainnya, pengerjaan laundry satuan lebih detail dan teliti serta menggunakan chemical yang disesuaikan dengan bahan material pakaian sehingga aman pada pakaian.
                        <br>Untuk laundry satuan kami memiliki harga yang bervariatif sesuai jenis pakaian, Silahkan lihat harga layanan laundry kami dan disesuaikan dengan kebutuhan laundry anda. Apabila anda tidak menemukan jasa laundry yang diinginkan, silahkan menghubungi kami di nomor <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry">+62 811-3509-299</a>.
                        <br>Aladdin Laundry melayani jasa laundry di wilayah jember dan sekitarnya.
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
