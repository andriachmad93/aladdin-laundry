<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/courier/sidebarmenu') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1>Selamat datang, Kurir.</h1>
        </main>
    </div>
</div>
<script type="text/javascript">

</script>
<?= $this->endSection(); ?>