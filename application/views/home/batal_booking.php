<main class="main dl py">
    <div class="struk">
        <div class="container-struk">
            <!-- <div class="cheklis">
                <div class="background">
                    <i class="fas fa-check"></i>
                </div>
            </div> -->
            <div class="head-struk">
                <h1><?= "Rp " . number_format($pelanggan['harga'], 0, ',', '.'); ?></h1>
                <p>Rincian Pembayaran</p>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $pecah = date('d F Y - H:i', $pelanggan['date_tr']);
                $pecah = explode('-', $pecah); ?>
                <span><?= $pecah[0]; ?> <i class="fas fa-circle"></i> <?= $pecah[1]; ?></span>
                <div class="bl">
                    <div class="bulat satu"></div>
                    <div class="bulat dua"></div>
                </div>
            </div>
            <div class="body-struk">
                <div class="ket-struk">
                    <i class="fas fa-futbol"></i>
                    <div class="column-struk">
                        <?php if ($pelanggan['id_lapangan'] == 1) : ?>
                            <h1>Lapangan Standar</h1>
                        <?php else : ?>
                            <h1>Lapangan Sintetis</h1>
                        <?php endif; ?>
                        <p><?= $pelanggan['tanggal']; ?></p>
                        <p><?= $pelanggan['jam_mulai']; ?></p>
                    </div>
                </div>
                <div class="grup-detail">
                    <p>Nota</p>
                    <h3><?= $pelanggan['nota']; ?></h3>
                </div>
                <div class="grup-detail">
                    <p>ID Booking</p>
                    <h3><?= $pelanggan['id_booking']; ?></h3>
                </div>
                <div class="grup-detail">
                    <p>ID Pelanggan</p>
                    <h3><?= $pelanggan['id_pelanggan']; ?></h3>
                </div>
                <div class="grup-detail">
                    <p>Nama Pelanggan</p>
                    <h3><?= $pelanggan['nama']; ?></h3>
                </div>
                <div class="grup-detail">
                    <p>No Telepon</p>
                    <h3><?= $pelanggan['no_telepon']; ?></h3>
                </div>
                <div class="garis"></div>
                <div class="metode-pembayaran">
                    <div class="row-metode">
                        <div class="img-pembayaran">
                            <img src="<?= base_url('assets/img/payment/') . $pelanggan['metode'] . '.png' ?>" alt="">
                        </div>
                        <!-- <h3><?= $pelanggan['metode']; ?></h3> -->
                    </div>
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="tomboll">
                <p>Yakin ingin Membatalkan Booking?</p>
                <a href="<?= base_url('home/batalBooking/'). $pelanggan['id_pelanggan']?>">Batal</a>
            </div>
        </div>
    </div>
    <div class="tutor geser">
        <h1>Cara Membatalkan Booking</h1>
        <div class="row-tutor">
            <div class="card-tutor">
                <div class="card-tutor-header">
                    <h1>1</h1>
                    <h3>Pilih Booking Yang Inging Dibatalkan</h3>
                </div>
                <div class="card-tutor-body">
                    <p>Pilihlah Secara Teliti Booking Yang Ingin Dibatalkan dan perlu diingat pembatalan hanya bisa dilakukan maksimal 2 jam sebelum dimulainya jadwal booking yang anda pilih</p>
                </div>
            </div>
            <div class="card-tutor">
                <div class="card-tutor-header">
                    <h1>2</h1>
                    <h3>Klik Tombol Batal </h3>
                </div>
                <div class="card-tutor-body">
                    <p>Ketika Booking Yang Ingin Dibatalkan Sudah Dipilih, Maka Klik Tombol Batal</p>
                </div>
            </div>
            <div class="card-tutor">
                <div class="card-tutor-header">
                    <h1>3</h1>
                    <h3>Simpan Rincian Pembatalan</h3>
                </div>
                <div class="card-tutor-body">
                    <p>Simpan Sebagai Alat Bukti Pembatalan Ketika ingin Mengambil Pengembalian Dana</p>
                </div>
            </div>
        </div>
    </div>
</main>