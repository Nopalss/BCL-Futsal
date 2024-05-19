<div class="container-fluid mb-4">
  <div class="col-lg-7 ">
    
    
    <div class="card  mt-5 bg-white mb-5 rounded shadow-lg">
      <div class="card-header bg-biru2 border-bottom-warning text-white ">
        <h3><?= $title; ?></h3>
      </div>
      
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('booking/jadwalBooking') ?> " method="post">
          <div class="form-group">
            <label for="tanggal"><b>Tanggal</b></label>
            <input type="date" id="tanggal" class="form-control" name="tanggal" onchange="pilih_tanggal()">
            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="id_lapangan"><b>Jenis Lapangan</b></label>
            <select id="id_lapangan" class="form-control" name="id_lapangan" >
              <option value="">Pilih Jenis Lapangan</option>
              <?php foreach ($lapangan as $lp) : ?>
                <option value="<?= $lp['id'] ?>"><?= $lp['jenis_lapangan'] ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('id_lapangan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group text-right mb-0">
          <a href="<?= base_url('booking') ?>" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Cek Jadwal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>