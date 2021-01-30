<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid" style="min-height:520px; background-image: url(<?= base_url('/images/clean-clothes.jpg') ?>); background-size: cover;">
                <div class="container">
                    <h1 class="display-4">Laundry terbaik di kota Anda</h1>
                    <p class="lead">Kami menjaga kebersihan pakaian Anda</p>
                    <a href="<?= base_url('/pages/tentang-kami') ?>" class="btn btn-md btn-primary">Pelajari lebih lanjut</a> <br><br>
                    <a href="<?= base_url('order/create'); ?>"><img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-laundry-antar-jemput.jpg"></a> <br><br>
                    <img src="https://www.mataharilaundry.com/wp-content/uploads/2016/11/banner-paket-harga-laundry.jpg">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center mb-3">
            <h2>Cara kerja kami</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="<?= base_url('/images/shirt.png'); ?>" class="card-img-top mx-auto d-block mt-3" alt="" style="width: 80px; height: 80px;">
                    <div class="card-body mb-3 d-flex justify-content-center">
                        Kami mengumpulkan baju Anda.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="<?= base_url('/images/washing-clothes.png'); ?>" class="card-img-top mx-auto d-block mt-3" alt="" style="width: 80px; height: 80px;">
                    <div class="card-body mb-3 d-flex justify-content-center">
                        Kami membersihkan baju Anda.
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="<?= base_url('/images/delivery-truck.png'); ?>" class="card-img-top mx-auto d-block mt-3" alt="" style="width: 80px; height: 80px;">
                    <div class="card-body mb-3 d-flex justify-content-center">
                        Kami mengantar baju Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid" style="min-height:520px; background-image: url('https://www.mataharilaundry.com/wp-content/uploads/2016/10/background-webcuci-karpet-kantor-1.jpg'); background-size: cover;">
                <div class="container">
                    <h1 style="color:White; text-align: center;">Kenapa Aladdin Laundry ?</h1>
                    <p class="lead">
                        <span style="color: #ffffff;"><br />
                            Aladdin Laundry merupakan jasa laundry satuan Jember &amp; jasa cuci karpet kantor serta jasa laundry sepatu &amp; tas yang memiliki workshop di ruko Karimata Square Kav. B3. Jember. 
                            <a href="" target="_blank" rel="noopener noreferrer">(lihat peta)</a>.
                            <span style="color: #000000;">
                                <span style="color: #ffffff;">
                                    Aladdin Laundry adalah member dari Asosiasi Laundry Indonesia (ASLI) yang mengutamakan standar pelayanan yang baik.
                                </span>
                            </span>&nbsp;<a href="<?= base_url('/pages/tentang-kami') ?>" target="_blank" rel="noopener noreferrer">Baca Selengkapnya</a>
                        </span>
                    </p>
                    <h1 style="color:White; text-align: center;">MEMBER OF</h1>
                    <img style="display: block; margin-left: auto; margin-right: auto;" src="https://www.mataharilaundry.com/wp-content/uploads/2016/10/logo-asosiasi-laundry-indonesia-150x150.jpg"><br>
                    <a style="display: block; margin-left: auto; margin-right: auto; width: 20%;" href="<?= base_url('/pages/price') ?>" class="btn btn-lg btn-secondary fw-bold border-white bg-orange">Lihat Daftar Harga</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 style="text-align: center;">HUBUNGI KAMI</h5>
            <p style="text-align: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg> <a href="https://api.whatsapp.com/send?phone=628113509299&amp;text=Aladdin%20Laundry"> +62 811-3509-299</a>
            </p>
            <p style="text-align: center;">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
                <a href="#">Youtube</a>
            </p>
            <p style="text-align: center;">
                <span class="bawah">Dengan menggunakan jasa dan produk kami, maka anda menyatakan setuju dengan <a href="<?= base_url('/pages/terms-condition') ?>">Syarat Ketentuan</a>. <br />Aladdin Laundry adalah member resmi dari Asosiasi Laundry Indonesia (ASLI)<br /></span>
            </p>
            <p style="text-align: center;">
                <a href="<?= base_url('/pages/tentang-kami') ?>">Tentang Kami</a> - <a href="<?= base_url('/pages/terms-condition') ?>">Syarat Ketentuan</a> - <a href="#">Blog</a>
            </p>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('rightbar'); ?>
<?= $this->endSection(); ?>