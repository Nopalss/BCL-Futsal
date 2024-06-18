<main class="main dl py">
    <div class="header-notif">
        <h1>Notifikasi</h1>
    </div>
    <div class="body-notifikasi">
        <?php foreach ($notif as $n) : ?>
            <?php if ($n['statuss'] == "Belum") : ?>
                <a class="card-notifikasi baca" href="<?= base_url('home/myBooking/') ?>">
                <?php if ($n['status2'] == 'Batal') : ?>
                    <i class="fas fa-trash-alt" style="color: red;"></i>
                <?php elseif($n['status2'] == 'Update') : ?>
                    <i class="fas fa-pencil-alt" style="color: orange;"></i>
                <?php else: ?>
                    <i class="fas fa-futbol"></i>
                <?php endif; ?>
                    <div class="text">
                        <p><?= $n['pesan']; ?> </p>
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                        <span class="bulat"></span>
                    </div>
                </a>
            <?php else : ?>
                <?php if ($n['status2'] == 'Batal') : ?>
                    <a class="card-notifikasi" href="<?= base_url('home/detailBooking/') . $n['id_pelanggan'] ?>">
                    <i class="fas fa-trash-alt" style="color: red;"></i>
    
                        <div class="text">
                            <p><?= $n['pesan']; ?> </p>
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                        </div>
                    </a>
                <?php elseif($n['status2'] == 'Update') : ?>
                    <a class="card-notifikasi"href="<?= base_url('home/detailBooking/') . $n['id_pelanggan'] ?>">
                    <i class="fas fa-pencil-alt" style="color: orange;"></i>
                        <div class="text">
                            <p><?= $n['pesan']; ?> </p>
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                        </div>
                    </a>
                <?php else : ?>
                    <a class="card-notifikasi" href="<?= base_url('home/detailBooking/') . $n['id_pelanggan'] ?>">
                        <i class="fas fa-futbol"></i>
                        <div class="text">
                            <p><?= $n['pesan']; ?> </p>
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <p class="jam"><?= date('d F, H:i ', $n['jam']); ?></p>
                        </div>
                    </a>
                <?php endif; ?>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</main>