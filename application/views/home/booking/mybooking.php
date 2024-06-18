<main class="main dl py">
<?= $this->session->flashdata('message'); ?>
    <div class="cont-mybooking">
        <?php foreach($booking as $b): ?>
            <div class="mybooking">
                <div class="header-my">
                    <h3><i class="fas fa-futbol"></i> BCL Futsal</h3>
                    <?php if(date('Y m d H',$b['date_tr']) == date('Y m d H')):  ?>
                    <p class="new">New!</p>
                    <?php else: ?>

                    <?php endif; ?>
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
                    <?php 
                    date_default_timezone_set('Asia/Jakarta');
                        $pecah = explode('-', $b['jam_mulai']);
                        $pecah = explode(':', $pecah[0]);
                        // var_dump($pecah);
                        $batal = intval($pecah[0]) - 2;
                    ?>
                    <?php if( date('Y-m-d') <= $b['tanggal']): ?>
                        <?php if(date('H') < $batal && date('Y-m-d') == $b['tanggal']): ?>
                            <a style="background-color: red;" href="<?= base_url('home/pageBatalBooking/'). $b['id_pelanggan']?>">Batal</a>
                            <a href="<?= base_url('home/pageEditBooking/'). $b['id_pelanggan']?>"style="background-color: orange;">Reschedule</a>
                        <?php elseif(date('Y-m-d') < $b['tanggal']): ?>
                            <a style="background-color: red;" href="<?= base_url('home/pageBatalBooking/'). $b['id_pelanggan']?>">Batal</a>
                            <a href="<?= base_url('home/pageEditBooking/'). $b['id_pelanggan']?>"style="background-color: orange;">Reschedule</a>
                        <?php endif ?>
                    <?php endif ?>
                    <a href="<?= base_url('home/detailBookingLapangan/'). $b['id_lapangan']?>">Ulasan</a>
                    <a href="<?= base_url('home/detailBooking/'). $b['id_pelanggan']?>">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
  
</main>