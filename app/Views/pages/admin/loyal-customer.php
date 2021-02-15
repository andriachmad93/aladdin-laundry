<?= $this->extend('layout/owner/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/owner/sidebarmenu') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Loyal Customers</h1>
            </div>
            <div class="row mb-2">
                <label class="col-md-2 form-label">Kategori</label>
                <div class="col-md-3">
                    <select class="form-control" id="cboType">
                        <option value="count" <?= $type == "count" ? "selected" : ""; ?>>Frekuensi transaksi</option>
                        <option value="volume" <?= $type == "volume" ? "selected" : ""; ?>>Volume transaksi</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-2 form-label">Periode</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="startDate" value="<?= $start_date; ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="endDate" value="<?= $end_date; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-md-2 form-label"></label>
                <div class="col-md-10">
                    <button class="btn btn-primary btn-sm" id="btnShow">Tampilkan</button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th><?= $type == "count" ? "Frekuensi" : "Volume (Rp)"; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($customers as $c) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $c["firstname"] . " " . $c["lastname"]; ?></td>
                                        <td class="text-right"><?= intval($c["total"]); ?></td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#btnShow", function() {
        getTop10Customers();
    });

    function getTop10Customers() {
        let type = $("#cboType").val();
        let startDate = $("#startDate").val();
        let endDate = $("#endDate").val();

        window.location = "<?= base_url('report/loyal_customers'); ?>/" + type + "/" + startDate + "/" + endDate;
    }
</script>
<?= $this->endSection(); ?>