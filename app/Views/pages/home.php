<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid" style="min-height:520px; background-image: url(<?= base_url('/images/clean-clothes.jpg') ?>); background-size: cover;">
                <div class="container">
                    <h1 class="display-4">Laundry terbaik di kota Anda</h1>
                    <p class="lead">Kami menjaga kebersihan pakaian Anda</p>
                    <a href="<?= base_url('/pages/tentang-kami') ?>" class="btn btn-md btn-primary">Pelajari lebih lanjut</a>
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
</div>

<?= $this->endSection(); ?>

<?= $this->section('rightbar'); ?>
<?= $this->endSection(); ?>