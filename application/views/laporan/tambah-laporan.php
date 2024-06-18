<div class="container-fluid">
  <div class="col-lg-7 ">

    <div class="card  mt-5 bg-white mb-5 rounded shadow-lg">
      <div class="card-header bg-biru2 border-bottom-warning text-white ">
        <h3><?= $title; ?></h3>
      </div>
      
      <div class="card-body">
        <form action="<?= base_url('laporan/tambahLaporanHarian') ?> " method="post">
          <div class="form-group">
            <label for="id"><b>Id Laporan</b></label>
            <input type="text" id="id" class="form-control" name="id" value="<?= $id_laporan?>" readonly >
          </div>
          <div class="form-group">
            <label for="tanggal"><b>Tanggal</b></label>
            <select id="tanggal" class="form-control" name="tanggal" onchange="pilih_laporan()">
                <option value="">-> Pilih Tanggal<-</option>
                <?php foreach($transaksi as $t): ?>
                  <option value="<?= $t['tanggal']?>"><?= $t['tanggal']; ?></option>
                  <?php endforeach; ?>

            </select>
            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <div class="form-group">
            <label for="pendapatan"><b>Pendapatan</b></label>
            <input type="text" id="pendapatan" class="form-control" name="pendapatan" readonly >
            <input type="hidden" class="pendapatan" class="form-control" name="pendapatan1" readonly >
          </div>

          <div class="form-group text-right mb-0">
            <a href="<?= base_url('laporan/laporanHarian')?>" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>