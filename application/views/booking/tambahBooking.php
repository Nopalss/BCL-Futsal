<div class="container-fluid mb-4">
  <div class="col-lg-7 ">

    <div class="card  mt-5 bg-white mb-5 rounded shadow-lg">
      <div class="card-header bg-biru2 border-bottom-warning text-white ">
        <h3><?= $title; ?></h3>
      </div>
      <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('booking/tambahBooking') ?> " method="post">
          <div class="form-group">
            <label for="tanggal"><b>Tanggal</b></label>
            <input type="input" id="tanggal" class="form-control" name="tanggal" value="<?= $this->session->userdata('tanggal') ?>" readonly>
          </div>
          <div class="form-group">
            <label for="id_pelanggan"><b>Id Pelanggan</b></label>
            <input type="input" id="id_pelanggan" class="form-control" name="id_pelanggan" value="<?= $id_pelanggan ?>" readonly>
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
            <input type="input" id="jenis_lapangan" class="form-control" name="jenis_lapangan" value="<?= $this->session->userdata('jenis_lapangan')?>" readonly>
            <input type="hidden" id="id_lapangan" class="form-control" name="id_lapangan" value="<?= $this->session->userdata('id_lapangan')?>">
            <?= form_error('id_lapangan', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
         
          <div class="form-group">
            <input type="hidden" id="harga" class="form-control" name="harga" readonly>
          </div>
          <div class="form-group">
            <label><b>Jam Mulai</b></label>
            <div class="row text-center justify-content-center">
              <?php if ($jam_booking) : ?>
                <?php foreach ($jam_booking as $jb) : ?>
                  <?php
                   $jamB[] = $jb['jam_mulai'];
                   ?>
                  <?php endforeach; ?>
                  <?php $jumlah = count($jamB); ?>
                  <?php foreach ($jam as $jm) : ?>
                    <?php if($jumlah == 1): ?>
                      <?php if ($jm['jam'] == $jamB[0]): ?>
                        <div class="row">
                          <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em; ">
                            <div class="card-heading bg-gold rounded-top">
                              <p class="p-1"></p>
                            </div>
                            <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                              <p><?= $jm['jam']; ?></p>
                              <p class="badge badge-pill badge-warning text-white">Booked</p>
                            </label>
                          </div>
                        </div>
                      <?php else : ?>
                        <div class="row">
                          <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                            <div class="card-heading bg-gold rounded-top">
                              <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                            </div>
                            <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                              <p><?= $jm['jam']; ?></p>
                            </label>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php elseif($jumlah == 2): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 3): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] ): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 4): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 5): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 6): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 7): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 8): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 9): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7] || $jm['jam'] == $jamB[8]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 10): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7] || $jm['jam'] == $jamB[8] || $jm['jam'] == $jamB[9]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 11): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7] || $jm['jam'] == $jamB[8] || $jm['jam'] == $jamB[9] || $jm['jam'] == $jamB[10]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 12): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7] || $jm['jam'] == $jamB[8] || $jm['jam'] == $jamB[9] || $jm['jam'] == $jamB[10] || $jm['jam'] == $jamB[11]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif($jumlah == 13): ?>
                        <?php if ($jm['jam'] == $jamB[0]|| $jm['jam'] == $jamB[1] || $jm['jam'] == $jamB[2] || $jm['jam'] == $jamB[3] || $jm['jam'] == $jamB[4] || $jm['jam'] == $jamB[5] || $jm['jam'] == $jamB[6] || $jm['jam'] == $jamB[7] || $jm['jam'] == $jamB[8] || $jm['jam'] == $jamB[9] || $jm['jam'] == $jamB[10] || $jm['jam'] == $jamB[11] || $jm['jam'] == $jamB[12]): ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <p class="p-1"></p>
                              </div>
                              <label class="card-body bg-biru text-gray-500 text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                                <p class="badge badge-pill badge-warning text-white">Booked</p>
                              </label>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="row">
                            <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                              <div class="card-heading bg-gold rounded-top">
                                <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                              </div>
                              <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                                <p><?= $jm['jam']; ?></p>
                              </label>
                            </div>
                          </div>
                        <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
              <?php else : ?>
                <?php foreach ($jam as $jm) : ?>
                  <div class="row">
                    <div class="card shadow-sm m-3 rounded" style="width: 10em; height: 8em;">
                      <div class="card-heading bg-gold rounded-top">
                        <input class="border-none ml-1" type="radio" name="id_jam" id="<?= $jm['id_jam'] ?>" value="<?= $jm['id_jam'] ?>" checked>
                      </div>
                      <label class="card-body bg-biru text-white text-center" for="<?= $jm['id_jam'] ?>">
                        <p><?= $jm['jam']; ?></p>
                      </label>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
              <?= form_error('id_jam', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

          </div>
       
          <div class="card-footer bg-white text-right">
            <a href="<?= base_url('booking/jadwalBooking') ?>" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>