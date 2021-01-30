<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Laundry Sepatu & Tas</h5>
                <div class="card-body">
                    <p>
                        <img src="https://www.reseppilihan.com/wp-content/uploads/2015/08/sevice-sepatu-tas.jpg">
                        
                        <br><br><b>Tahukah anda kesalahan kabanyakan orang saat mencuci sepatu?</b>
                        <br>Kesalahan atau pemahaman yang keliru yang sering dilakukan adalah mencuci sepatu direndam, dicuci basah dengan deterjen pakaian. Cara seperti itu akan mempersingkat keawetan dari sepatu karena penggunaan chemical yang tidak tepat pada bahan sepatu dapat mengakibatkan pudarnya warna atau kerusakan pada bahan sepetu tersebut, dengan pemakaian air yang berlebihan juga kan mengakibatkan sol pada sepatu mudah terbuka.
                        Sepatu sebagai alas kaki yang berguna untuk melindungi mata tapi banyak sepatu-sepatu yang menjadi pelengkap style agar penampilan lebih menarik. Jenis-jenis sepatu pun pasti beragam, perawatannya pun atau cara mencuci sepatu tentu akan disesuaikan dengan bahan sepatu tersebut. Bahan sepatu suede (bahan sepatu yang berasal dari kulit hewan) akan beda cara membersihkannya dengan jenis sepatu sneaker yang gampang kotor.
                        <br><br>Tidak perlu pusing, di Aladdin Laundry  telah tersedia layanan cuci sepatu yang menggunakan chemical khusus yang disesuaikan dengan bahan-bahan sepatu yang tentunya aman untuk sepatu-sepatu dengan jenis apa pun. Untuk mendapatkan layanan cuci sepatu di Aladdin Laundry bisa langsung menghubungi kami di nomor <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry"> +62 811-3509-299</a>, kami juga melayani antar-jemput untuk wilayah Jember dan sekitarnya.
                        <br><br>Beberapa foto pengerjaan laundry sepatu oleh Aladdin Laundry, foto lainnya bisa dilihat juga di Instagram <a href="https:www.instagram.com/salonsepatu.jember">@salonsepatu.jember</a>

                        <br><h5><b>Workshop</b></h5>
                        <span>Ruko Karimata Square Kav. B3. Jember.</span>
                        <br><span>Kecamatan Sumber Sari</span>
                        <br><span>Kabupaten Jember 68121</span>
                        <br><span>Provinsi Jawa Timur</span>
                        <br><br><a href="https://goo.gl/maps/SXN6fPFSM6kj27on9">Petunjuk Arah Google Map</a>
                    </p>
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
