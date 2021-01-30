<?= $this->extend('layout/template'); ?>

<?= $this->section('leftbar'); ?>
<?= view('user\leftmenu') ?>
<?= $this->endSection(); ?>

<?= $this->section('maincontent'); ?>

<div class="col-md-9">
    <form class="container" method="POST" action="<?= base_url('user/redeem'); ?>">
        <?= view('Myth\Auth\Views\_message_block') ?>
        <div class="card mb-2">
            <h4 class="card-header">Penukaran Poin</h4>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="input-group mb-1">
                            <input class="form-control mr-1" name="redeem_code" id="redeem_code" placeholder="Masukkan kode promosi" />
                            <button class="btn btn-primary btn-sm float-right" type="submit" id="btnUseVoucher">Tukar poin</button>
                        </div>
                        <small><em>Lihat promo yang berlaku <a href="<?= base_url('pages/promo'); ?>" target="_blank">di sini</a></em></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h4 class="card-header">Poin saya</h4>
            <div class="card-body table-responsive">
                <div class="form-row">
                    <div class="col-md-3">
                        <label>Total poin saat ini</label>
                    </div>
                    <div class="col-md-1 text-right">
                        <label><b><?= $user->point; ?></b></label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label>Riwayat penukaran poin</label>
                    </div>
                    <div class="col-md-9">
                        <table id="tabel-data" class="table-data table table-striped" width="100%" cellspacing="6">
                            <thead class="bg-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis poin</th>
                                    <th>Total poin</th>
                                    <th>Kode promo</th>
                                    <th>Kode pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($point_history as $point) : ?>
                                    <tr>
                                        <td><?= date("d M Y", strtotime($point['transaction_date'])); ?> </td>
                                        <td><?= $point['type']; ?></td>
                                        <td class="text-right"><?= (int)$point['point']; ?></td>
                                        <td><?= $point['promotion_code']; ?></td>
                                        <td>
                                            <?php if (!empty($point['order_code'])) : ?>
                                                <a href="<?= base_url('/order/detail/' . $point['order_id']); ?>" target="_blank"><?= $point['order_code']; ?></a>
                                            <?php endif; ?>
                                            &nbsp;
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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
                "orderable": false,

            }, {
                targets: 0,
                render: function(data) {
                    return moment(data).format('DD MMM YYYY');
                }
            }],
            "columns": [{
                    "width": "25%"
                }, {
                    "width": "15%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "20%"
                }
            ]
        });
    });
</script>
<?= $this->endSection(); ?>