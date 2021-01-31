<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/courier/sidebarmenu') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">myPickup</h1>
            </div>

            <div class="table-responsive mb-5">
                <h4>Pesanan yang sedang diambil</h4>
                <table id="tblActiveOrder" class="table table-striped table-bordered" width="100%" cellspacing="6">
                    <thead>
                        <tr>
                            <th>Kode pesanan</th>
                            <th>Tanggal pesanan</th>
                            <th>Detil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ALD/2021/00010</td>
                            <td>31 Jan 2021 09:10:01</td>
                            <td>BAJU SAFARI 1 PCS</td>
                            <td>Gina 0812345678</td>
                            <td>Cempaka putih No.3</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-success btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-check">&nbsp;</i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>ALD/2021/00016</td>
                            <td>31 Jan 2021 10:05:14</td>
                            <td>SEPATU 2 PCS</td>
                            <td>Lukman 0812345673</td>
                            <td>Cengkareng No.14</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-success btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-check">&nbsp;</i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mb-2">
                <h4>Pesanan yang siap untuk diambil</h4>
                <table id="tblOutstandingOrder" class="table table-striped table-bordered" width="100%" cellspacing="6">
                    <thead>
                        <tr>
                            <th>Kode pesanan</th>
                            <th>Tanggal pesanan</th>
                            <th>Detil</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ALD/2021/00020</td>
                            <td>31 Jan 2021 12:10:01</td>
                            <td>BAJU PESTA 1 PCS</td>
                            <td>Putri 0812345678</td>
                            <td>Jasmine No.31</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-primary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-hands">&nbsp;</i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>ALD/2021/00022</td>
                            <td>31 Jan 2021 12:05:14</td>
                            <td>CELANA PANJANG 2 PCS</td>
                            <td>Hendra 0812345673</td>
                            <td>Jalan Buntu No.99</td>
                            <td>
                                <button type="button" class="btn btn-secondary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Lihat detail pesanan">
                                    <i class="fas fa-folder-open">&nbsp;</i></button>
                                <button type="button" class="btn btn-primary btn-sm btnDone mb-1" data-toggle="tooltip" data-placement="top" title="Update status">
                                    <i class="fas fa-hands">&nbsp;</i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tblOutstandingOrder').DataTable();
        $('#tblActiveOrder').DataTable();
    });
</script>
<?= $this->endSection(); ?>