<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
    @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

    fieldset,
    label {
        margin: 0;
        padding: 0
    }

    .rating {
        border: none;
        margin-right: 49px
    }

    .myratings {
        font-size: 20px;
        color: green
    }

    .rating>[id^="star"] {
        display: none
    }

    .rating>label:before {
        margin: 5px;
        font-size: 2.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005"
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute
    }

    .rating>label {
        color: #ddd;
        float: right
    }

    .rating>[id^="star"]:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #FFD700
    }

    .rating>[id^="star"]:checked+label:hover,
    .rating>[id^="star"]:checked~label:hover,
    .rating>label:hover~[id^="star"]:checked~label,
    .rating>[id^="star"]:checked~label:hover~label {
        color: #FFED85
    }

    .reset-option {
        display: none
    }

    .reset-button {
        margin: 6px 12px;
        background-color: rgb(255, 255, 255);
        text-transform: uppercase
    }
</style>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<form class="container" action="<?= base_url('/order/savePenilaian'); ?>" method="POST">
    <?= csrf_field(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <input type="hidden" name="id" value="<?= $order->id; ?>" />
                <h5 class="card-header">Detil pesanan</h5>
                <div class="card-body">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <?= view('order\shared_detail') ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Berikan penilaian</label>
                        <label class="col-sm-4 col-form-label">
                            <div class="card">
                                <div class="card-body text-center"> <span class="myratings"></span>
                                    <fieldset class="rating">
                                        <input type="radio" id="star5" name="rating" value="5" />
                                        <label class="full" for="star5" title="Sangat baik"></label>
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label class="full" for="star4" title="Baik"></label>
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label class="full" for="star3" title="Biasa saja"></label>
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label class="full" for="star2" title="Buruk"></label>
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label class="full" for="star1" title="Buruk sekali"></label>
                                        <input type="radio" class="reset-option" name="rating" value="reset" />
                                    </fieldset>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-4">
                            <textarea class="form-control <?= session('errors.remarks') ? 'is-invalid' : '' ?>" rows="4" placeholder="Berikan komentarmu" name="remarks" maxlength="500"><?= (old('remarks')) ? old('remarks') : (!empty($order->remarks) ? $order->remarks : "") ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-md btn-secondary mb-1 mr-1" id="btnBack">Kembali</button>
                            <button type="submit" class="btn btn-md btn-primary mb-1 mr-1" id="btnSubmit">Beri penilaian</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script type="text/javascript">
    let rating = "<?= (!empty($order->rating) ? $order->rating : 0); ?>";
    $(document).on("click", "#btnBack", function() {
        window.history.go(-1);
    });

    $(function() {
        var $radios = $('input:radio[name=rating]');
        if ($radios.is(':checked') === false) {
            $radios.filter(`[value=${rating}]`).prop('checked', true);
        }
    });

    $(document).ready(function() {


        $("input[type='radio']").click(function() {
            var sim = $("input[type='radio']:checked").val();
            if (sim < 3) {
                $('.myratings').css('color', 'red');
                $(".myratings").text(sim);
            } else {
                $('.myratings').css('color', 'green');
                $(".myratings").text(sim);
            }
        });
    });
</script>
<?= $this->endSection(); ?>