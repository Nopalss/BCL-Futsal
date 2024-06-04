<main class="main dl py">
    <div class="cont-mybooking">
        <?php foreach($booking as $b): ?>
            <div class="mybooking">
                <div class="header-my">
                    <h3><i class="fas fa-futbol"></i> BCL Futsal</h3>
                </div>
            <a class="body-my" href="<?= base_url('home/detailBooking/'). $b['id_pelanggan']?>">
                <img src="<?= base_url('assets/img/lapangan/s'). $b['id_lapangan']. '.png'?>" alt="">
                <div class="column">
                    <?php if($b['id_lapangan'] == 1): ?>
                        <h3>Lapangan Standart</h3>
                    <?php else: ?>
                        <h3>Lapangan Sintetis</h3>
                    <?php endif; ?>
                    <p>Tanggal : <?= $b['tanggal']; ?></p>
                    <p>Jam : <?= $b['jam_mulai']; ?></p>
                </div>
            </a>
            <div class="footer-my">
                <div class="total">
                    <p>Harga:</p>
                    <h3><?= "Rp " . number_format($b['harga'],0,',','.') ; ?></h3>
                </div>
                <div class="button">
                    <a href="<?= base_url('home/detailBookingLapangan/'). $b['id_lapangan']?>">Ulasan</a>
                    <a href="<?= base_url('home/detailBooking/'). $b['id_pelanggan']?>">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>