<main class="main dl py">
    <div class="struk">
        <div class="container-struk">
            <div class="cheklis">
                <div class="background">
                    <i class="fas fa-check"></i>
                </div>
            </div>
            <div class="head-struk">
                <h1><?=  "Rp " . number_format($pelanggan['harga'],0,',','.'); ?></h1>
                <?php if($pelanggan['status2'] == 'Batal'): ?>
                    <p>Rincian Pengembalian</p>
                <?php else: ?>
                <p>Pembayaran Behasil</p>
                <?php endif; ?>
                <?php   
                date_default_timezone_set('Asia/Jakarta');
                $pecah = date('d F Y - H:i', $pelanggan['date_tr']);
                $pecah = explode('-', $pecah ); ?>  
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
                        <?php if( $pelanggan['id_lapangan'] == 1): ?>
                            <h1>Lapangan Standart</h1>
                        <?php else: ?>
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
                <?php if($pelanggan['status2'] == 'Batal'): ?>
                <?php else: ?>
                    <div class="metode-pembayaran">
                        <div class="row-metode">
                            <div class="img-pembayaran">
                                <img src="<?= base_url('assets/img/payment/'). $pelanggan['metode'] . '.png'?>" alt="">
                            </div>
                        </div>
                        <i class="fas fa-check"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>