<main class="main dl py">
    <div class="header-notif">
        <h1>Notifikasi</h1>
    </div>
    <div class="body-notifikasi">
        <?php foreach($notif as $n): ?>
        <?php if($n['statuss'] == "Belum"): ?>
            <a class="card-notifikasi baca" href="<?= base_url('home/myBooking/')?>">
                    <i class="fas fa-futbol"></i>
                    <div class="text">
                        <p><?= $n['pesan']; ?> </p>
                        <?php  date_default_timezone_set('Asia/Jakarta');?>
                        <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                        <span class="bulat"></span>
                    </div>
                </a>
        <?php else: ?>
            <a class="card-notifikasi" href="<?= base_url('home/detailBooking/').$n['id_pelanggan']?>">
                <i class="fas fa-futbol"></i>
                <div class="text">
                    <p><?= $n['pesan']; ?> </p>
                    <?php  date_default_timezone_set('Asia/Jakarta');?>
                    <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                </div>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
</main>