<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tren Penjualan</h1>
        </div>

        <label class="col-md-4 form-label">Pilih Periode</label>
        <div class="col-md-4 input-group mb-1">
            <select name="period" class="form-control mr-1">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>
            <button class="btn btn-primary btn-sm float-right">Tampilkan</button>
        </div>
      <div id="container"></div>
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
    type: 'spline'
  },
  title: {
    text: 'Grafik Tren Penjualan'
  },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: 'Total'
    },
    labels: {
      formatter: function () {
        return 'Rp. ' + this.value;
      }
    }
  },
  tooltip: {
    crosshairs: true,
    shared: true
  },
  plotOptions: {
    spline: {
      marker: {
        radius: 4,
        lineColor: '#666666',
        lineWidth: 1
      }
    }
  },
  series: [{
    name: '1 (Jan - Des 2019)',
    marker: {
      symbol: 'square'
    },
    data: [7.0, 6.9, 9.5, 14.5, 11.2, 21.5, 25.2, {
      y: 26.5
    }, 23.3, 18.3, 13.9, 9.6]

  }, {
    name: '2 (Jan - Des 2020)',
    marker: {
      symbol: 'diamond'
    },
    data: [{
      y: 3.9
    }, 4.2, 5.7, 8.5, 18.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
  }]
});

</script>
<?= $this->endSection(); ?>
