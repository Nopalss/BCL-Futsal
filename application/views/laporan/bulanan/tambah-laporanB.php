<div class="container-fluid">
  <div class="col-lg-7 ">

    <div class="card  mt-5 bg-white mb-5 rounded shadow-lg">
      <div class="card-header bg-biru2 border-bottom-warning text-white ">
        <h3><?= $title; ?></h3>
      </div>
      
      <div class="card-body">
        <form action="<?= base_url('laporan/tambahLaporanBulanan') ?> " method="post">
          <div class="form-group">
            <label for="id"><b>Id Laporan</b></label>
            <input type="text" id="id" class="form-control" name="id" value="<?= $id_laporan?>" readonly >
          </div>
          <div class="form-group">
            <label for="bulan"><b>Bulan</b></label>
            <input type="text" id="bulan" class="form-control" name="bulan" value="<?= $bulan?>" readonly >
            <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>

          </div>
          
          <div class="form-group">
            <label for="pendapatan"><b>Pendapatan</b></label>
            <input type="text" id="pendapatan" class="form-control" value="<?= "Rp " . number_format($pendapatan, 0, ',', '.'); ?>" readonly >
            <input type="hidden" class="form-control" name="pendapatan" value="<?= $pendapatan?>" readonly >
          </div>

          <div class="form-group text-right mb-0">
            <a href="<?= base_url('laporan/laporanBulanan')?>" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>