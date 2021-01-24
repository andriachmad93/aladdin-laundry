<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>


<?= $this->section('maincontent'); ?>
<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Poin saya</h4>
        <div class="card-body table-responsive">
            <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                <thead class="bg-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis poin</th>
                        <th>Total poin</th>
                        <th class="no-sort">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script src="<?= base_url() ?>/js/common.js?v<?= date("Ymd"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.table-data').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "order": [
                [0, 'desc']
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false
            }],
            "columns": [{
                    "width": "25%"
                },
                {
                    "width": "40%"
                },
                {
                    "width": "25%"
                },
                {
                    "width": "10%"
                }
            ]
        });
    });
</script>
<?= $this->endSection(); ?>