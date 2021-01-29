<?= $this->extend('layout/admin/template'); ?>

<?= $this->section('maincontent'); ?>
<div class="container-fluid">
  <div class="row">
    <?= $this->include('layout/admin/sidebarmenu') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ubah Promosi</h1>
        </div>

        <form action="<?php echo base_url('item/update_promotion/') . $promotion_detail['id']; ?>" method="post">
          <div class="mb-2">
            <label class="form-label">Nama Promosi</label>
            <input type="text" class="form-control" name="promotion_name" value="<?= $promotion_detail['promotion_name']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Kode Promosi</label>
            <input type="text" class="form-control" name="promotion_code" value="<?= $promotion_detail['promotion_code']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="description" value="<?= $promotion_detail['description']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Waktu Mulai Promosi</label>
            <input type="date" class="form-control" name="start_date" value="<?= $promotion_detail['start_date']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Waktu Berakhir Promosi</label>
            <input type="date" class="form-control" name="end_date" value="<?= $promotion_detail['end_date']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Kategori Promosi</label>
            <select name="promotion_category" class="form-control" id="promotion_category">
              <option value="diskon" value="<?= $promotion_detail['promotion_category'] == "diskon" ? "selected" : ""; ?>">Diskon</option>
              <option value="poin" value="<?= $promotion_detail['promotion_category'] == "poin" ? "selected" : ""; ?>">Poin</option>
            </select>
          </div>
          <div class="mb-2" id="div-promotion-type">
            <label class="form-label">Tipe Promosi</label>
            <select name="promotion_type" class="form-control">
              <option value="%" value="<?= $promotion_detail['promotion_type'] == "%" ? "selected" : ""; ?>">Percent (%)</option>
              <option value="Rp" value="<?= $promotion_detail['promotion_type'] == "Rp" ? "selected" : ""; ?>">Potongan Harga</option>
            </select>
          </div>
          <div class="mb-2">
            <label class="form-label">Harga Minimum Promosi</label>
            <input type="text" class="form-control" name="amount" value="<?= $promotion_detail['amount']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Harga Maksimum Promosi</label>
            <input type="text" class="form-control" name="maximum_amount" value="<?= $promotion_detail['maximum_amount']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Maksimal Penggunaan Promosi</label>
            <input type="text" class="form-control" name="max_use" value="<?= $promotion_detail['max_use']; ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">Masa Aktif</label>
            <select name="is_active" class="form-control">
              <option value="1" value="<?= $promotion_detail['is_active'] == 1 ? "selected" : ""; ?>">Ya</option>
              <option value="0" value="<?= $promotion_detail['is_active'] == 0 ? "selected" : ""; ?>">Tidak</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </main>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#promotion_category').on('click', function() {
      if ($(this).val() == 'poin') {
        $('#div-promotion-type').hide()
      } else {
        $('#div-promotion-type').show()
      }
    })
  })
</script>
<?= $this->endSection(); ?>
