<div class="container-fluid">
  <h3><?= $title; ?></h3>

  <div class="col-lg-7 mt-5 bg-white p-3 mb-5 rounded shadow-lg" >
    <form action="<?= base_url('booking/tambahBooking') ?> " method="post">
      <div class="form-group">
        <label for="id_booking"> <b>Id Booking</b></label>
        <input type="input" class="form-control" id="id_booking" name="id_booking"  value="<?= $id_booking?>" readonly>
        <?= form_error('id_booking', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="id_pelanggan"><b>Id Pelanggan</b></label>
        <input type="input" id="id_pelanggan" class="form-control" name="id_pelanggan" value="<?= $id_pelanggan?>" readonly>
        <?= form_error('id_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nama"><b>Nama</b></label>
        <input type="input" id="nama" class="form-control" name="nama">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="no_telepon"><b>No Telepon</b></label>
        <input type="input" id="no_telepon" class="form-control" name="no_telepon">
        <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="id_lapangan"><b>Jenis Lapangan</b></label>
        <select id="id_lapangan" class="form-control" name="id_lapangan" onkeyup="autofill()">
          <option value="">Pilih Jenis Lapangan</option>
          <?php foreach($lapangan as $lp) : ?>
          <option value="<?= $lp['id']?>"><?= $lp['jenis_lapangan']?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('jenis_lapangan', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <input type="input" id="harga" class="form-control" name="harga">
      </div>

      <div class="form-group">
        <label for="tanggal"><b>Tanggal</b></label>
        <input type="date" id="tanggal" class="form-control" name="tanggal">
        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="id_jam"><b>Jam Mulai</b></label>
        <select id="id_jam" class="form-control" name="id_jam">
          <option value="">Pilih Jam Mulai</option>
          <?php foreach($jam as $jm) : ?>
          <option value="<?= $jm['id_jam']?>"><?= $jm['jam']?></option>
          <?php endforeach; ?>
        </select>
        <?= form_error('id_jam', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <input type="input" id="jam_mulai" class="form-control" name="jam_mulai">
      </div>
      <div class="form-group">
        <label for="durasi"><b>Durasi</b></label>
        <input type="input" id="durasi" class="form-control" name="durasi">
        <?= form_error('durasi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="jam_selesai"><b>Jam Selesai</b></label>
        <input type="input" id="jam_selesai" class="form-control" name="jam_selesai" readonly>
        <?= form_error('jam_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="<?= base_url('booking')?>" class="btn btn-danger">Batal</a>
  </div>
</div>