<?= $this->extend('layout/template'); ?>

<?= $this->section('pageStyles'); ?>
<style>

</style>
<?= $this->endSection(); ?>

<?= $this->section('maincontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Daftar Harga Aladdin Laundry</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-header">Laundry Stroller & Baby Care</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            foreach($stroller_list as $stroller) {
                                        ?>

                                            <tr>

                                                <td><?= $stroller['item_name']; ?></td>
                                                <td>Rp. <?= $stroller['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header">Laundry Sepatu & Tas</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($shoes_list as $shoe) {
                                        ?>

                                            <tr>

                                                <td><?= $shoe['item_name']; ?></td>
                                                <td>Rp. <?= $shoe['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-header">Laundry Helm</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($helm_list as $helm) {
                                        ?>

                                            <tr>

                                                <td><?= $helm['item_name']; ?></td>
                                                <td>Rp. <?= $helm['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header">Laundry Satuan</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($clothes_list as $clothes) {
                                        ?>

                                            <tr>

                                                <td><?= $clothes['item_name']; ?></td>
                                                <td>Rp. <?= $clothes['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-header">Cuci Karpet Kantor</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($office_list as $office) {
                                        ?>

                                            <tr>

                                                <td><?= $office['item_name']; ?></td>
                                                <td>Rp. <?= $office['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-header">Cuci Sofa & Spring Bed</h5>
                            <div class="table-responsive">
                                <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="6">
                                    <thead>
                                        <tr>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($bedroom_list as $bedroom) {
                                        ?>

                                            <tr>

                                                <td><?= $bedroom['item_name']; ?></td>
                                                <td>Rp. <?= $bedroom['price']; ?></td>
                                            
                                            </tr>

                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
