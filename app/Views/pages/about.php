<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Tentang Kami</h5>
                <div class="card-body">
                    <p>
                        <span>Dewasa ini kebutuhan akan jasa Laundry & Dry Clean semakin meningkat, baik di bidang rumah tangga, salon, instansi, apartement, dan hotel. Aladdin Laundry didirikan pada bulan Juni 2015 yang berlokasi di Ruko Karimata Square kav B-3 (Sebelah Pandu Logistik) Jl. Karimata, Jember. Seiring dengan peningkatan tersebut maka kami Aladdin Laundry hadir untuk memberikan pelayanan yang berkualitas dengan harga yang kompetitif.
                        Besar harapan kami agar dapat membantu usaha dan memberikan kemudahan dengan memberikan pelayanan jasa Laundry & Dry Clean berupa linen & towels, uniform, guest laundry, gordyn, sofa, springbed, karpet, tas, dan sepatu.
                        Sebagai bahan pertimbangan dibawah ini akan kami paparkan dengan lebih detail jasa-jasa yang dapat kami berikan.
                        </span>
                        
                        <br><br>Kami menawarkan pelayanan jasa laundry & Dry Clean meliputi :

                        <ul>
                            <li>Linen (Sprei, Sarung Bantal, dan Gordyn)</li>
                            <li>Towels (Bed Cover, Selimut, Matras, dan Handuk)</li>
                            <li>Uniform (Seragam Karyawan, Karpet, Boneka, Bantal, dan Tas)</li>
                            <li>Guest Laundry (Pakaian/Baju harian)</li>
                            <li>Clean & Care (Sepatu, Stroller,Tas, Helm, Koper, & Jaket Kulit)</li>
                            <li>Cuci Sofa dan springbed</li>
                            <li>Karpet</li>
                            <li>Laundry Satuan</li>
                        </ul>

                        <b> Visi dan Misi Perusahaan </b>

                        <br> <b>1. Visi</b>
                        <ul>
                            <li>Terwujudnya laundry yang menjadi pilihan masyarakat, baik kualitas hasil dan/atau pelayanan.</li>
                            <li>Laundry yang peduli terhadap keamanan, keselamatan, kesehatan, lingkungan hidup dan pelesetarian alam.</li> 
                        </ul>

                        <br> <b>2. Misi</b>
                        <ul>
                            <li>Berperan aktif dalam program percepatan pembangunan nasional khususnya di bidang laundry.</li>
                            <li>Harga yang terjangkau bagi konsumen.</li>
                            <li>Inovasi secara berkesinambungan.</li>
                            <li>Keramahan terhadap setiap konsumen.</li>
                            <li>Pelayanan yang maksimal kepada konsumen</li>
                        </ul>
                    </p>

                    <img src="<?= base_url('/images/sertifikat.jpg'); ?>" width="400px">

                    <br><br><h6 style="text-align: center;"> Customer Service via Whatsapp <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry">+62 811-3509-299</a></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url('order/create'); ?>"><img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-laundry-antar-jemput.jpg"></a>
            <br><br>
            <img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-paket-harga-laundry.jpg">
            <br><br>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>