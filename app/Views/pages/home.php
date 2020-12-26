<?= $this->extend('layout/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="promotions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#promotions" data-slide-to="0" class="active"></li>
                    <li data-target="#promotions" data-slide-to="1"></li>
                    <li data-target="#promotions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="http://via.placeholder.com/480x240" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://via.placeholder.com/480x240" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="http://via.placeholder.com/480x240" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#promotions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#promotions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            right side image
        </div>
    </div>
    <div class="row">

    </div>
</div>
<?= $this->endSection(); ?>