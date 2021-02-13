<?= $this->extend('layout/owner/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/owner/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Penilaian Pelanggan</h1>
        </div>

        <label class="col-md-4 form-label">Pilih Periode</label>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-sm float-right">Tampilkan</button>
                </div>
            </div>
        </div>
        <br><div id="container"></div>
    </main>
  </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Persentase Penilaian Pelanggan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Rating',
        colorByPoint: true,
        data: [{
            name: 'Bintang 1',
            y: 10
        }, {
            name: 'Bintang 2',
            y: 20
        }, {
            name: 'Bintang 3',
            y: 20
        }, {
            name: 'Bintang 4',
            y: 25
        }, {
            name: 'Bintang 5',
            y: 25
        }]
    }]
});

</script>
<?= $this->endSection(); ?>
