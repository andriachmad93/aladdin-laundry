<?= $this->extend('layout/owner/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/owner/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tren Penjualan</h1>
      </div>

      <div class="row mb-5">
        <label class="col-md-2 form-label">Pilih Periode</label>
        <div class="col-md-4 input-group mb-1">
          <select id="cboPeriod" class="form-control mr-1">
            <?php
            $y = 2020;
            while ($y <= intval(date('Y'))) :
            ?>
              <option value=<?= $y; ?> <?= $y == $period ? "selected" : ""; ?>><?= $y; ?></option>
            <?php
              $y++;
            endwhile; ?>
          </select>
          <button class="btn btn-primary btn-sm float-right" id="btnShow">Tampilkan</button>
        </div>
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
      text: ''
    },
    xAxis: {
      categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
      ]
    },
    yAxis: {
      title: {
        text: 'Total'
      },
      labels: {
        formatter: function() {
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
    series: <?= $graph_data; ?>
  });

  $(document).on("click", "#btnShow", function() {
    getSalesTrend();
  });

  function getSalesTrend() {
    let period = $("#cboPeriod").val();

    window.location = "<?= base_url('report/sales_trend'); ?>/" + period;
  }
</script>
<?= $this->endSection(); ?>