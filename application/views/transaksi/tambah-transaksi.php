<div class="container-fluid">
  <div class="col-lg-7 ">

    <div class="card  mt-5 bg-white mb-5 rounded shadow-lg">
      <div class="card-header bg-biru2 border-bottom-warning text-white ">
        <h3><?= $title; ?></h3>
      </div>
      
      <div class="card-body">
        <form action="<?= base_url('transaksi/tambahTransaksi') ?> " method="post">
          <div class="form-group">
            <label for="nota"><b>Nota</b></label>
            <input type="text" id="nota" class="form-control" name="nota" value="<?= $nota?>" readonly >
          </div>
          <div class="form-group">
            <label for="id_booking"><b>Id Booking</b></label>
            <select id="id_booking" class="form-control" name="id_booking" onchange="pilih_booking()">
                <option value="">-> Pilih Id Booking <-</option>
                <?php foreach($booking as $b): ?>
                  <option value="<?= $b['id']?>"><?= $b['id']; ?></option>
                  <?php endforeach; ?>

            </select>
            <?= form_error('id_booking', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          
          <div class="form-group">
            <label for="tanggal"><b>Tanggal</b></label>
            <input type="text" id="tanggal" class="form-control" name="tanggal" readonly >
            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="total"><b>Total</b></label>
            <input type="text" id="total" class="form-control" name="total" readonly >
            <?= form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group text-right mb-0">
            <a href="<?= base_url('transaksi')?>" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>