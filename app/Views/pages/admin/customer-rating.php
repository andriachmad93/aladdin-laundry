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
                        <input type="date" class="form-control" id="startDate" value="<?= $start_date; ?>" />
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" id="endDate" value="<?= $end_date; ?>" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm float-right" id="btnShow">Tampilkan</button>
                    </div>
                </div>
            </div>
            <br>
            <div id="container"></div>
            <div class="table-responsive">
                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                    <thead>
                        <tr>
                            <th>Kode pesanan</th>
                            <th>Tanggal pesanan</th>
                            <th>Rating</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ratingDetail as $d) : ?>
                            <tr>
                                <td><a href="<?= base_url("Order/detail/" . $d['id']); ?>"><?= $d['order_code']; ?></a></td>
                                <td><?= date("d M Y", strtotime($d['order_date'])); ?></td>
                                <td><?= $d['rating']; ?>/5</td>
                                <td><?= $d['remarks']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    $(document).on("click", "#btnShow", function() {
        getRatingPeriod();
    });

    function getRatingPeriod() {
        let startDate = $("#startDate").val();
        let endDate = $("#endDate").val();

        window.location = "<?= base_url('report/customer_rating'); ?>/" + startDate + "/" + endDate;
    }

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
            data: <?= $rating; ?>
        }]
    });
</script>
<?= $this->endSection(); ?>