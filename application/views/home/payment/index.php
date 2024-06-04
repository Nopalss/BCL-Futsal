<main class="main dl py">
    <form action="<?= base_url('transaksi/userTransaksi');?>" method="post">
    <h1>Payment</h1>
    <div class="row-payment">
        <div class="container-customer">
            <h3>Customer Detail</h3>
            <div class="grup-input">
                <label for="email">Email</label>
                <input type="text" class="readonly" readonly name="email" id="email" value="<?= $user['email']?>">
            </div>
            <div class="grup-input">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= $user['name']?>" maxlength="50" minlength="4"  required>
            </div>
            <div class="grup-input">
                <label for="No Telepon">No Telepon</label>
                <input type="tel"  name="no_telepon" id="No Telepon" maxlength="12" pattern="[0-9]{12}" placeholder="081xxxxxxxxx"  required >
            </div>
        </div>
        <div class="container-payment">
            <div class="ket-payment">
                <h3>Pilih Jenis Pembayaran</h3>
                <p>Semua transaksi yang dilakukan aman dan terenkripsi</p>
            </div>
            <div class="grup-payment">
                <h3>Transfer Virtual Account</h3>
                <div class="row-jenis-payment">
                    <?php foreach($bank as $b): ?>
                        <div class="card-payment">
                            <input type="radio" name="metode" value="<?= $b['name']?>" class="t-pay" required>
                            <div class="body-payment">
                                <img src="<?= base_url('assets/img/payment/'). $b['img']?>" alt="">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="grup-payment">
                <h3>e-Wallets</h3>
                <div class="row-jenis-payment">
                    <?php foreach($pay as $b): ?>
                        <div class="card-payment">
                            <input type="radio" name="metode" value="<?= $b['name']?>" class="t-pay" required>
                            <div class="body-payment">
                                <img src="<?= base_url('assets/img/payment/'). $b['img']?>" alt="">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-pesanan">
        <div class="judul-pesanan">
            <h3>Lapangan <?= $booking['jenis_lapangan']; ?></h3>
            <p class="bcl"><i class="fas fa-futbol"></i> BCL Futsal</p>
            <p><?= $booking['tanggal']. ' '; ?> <i class="fas fa-circle-notch"> </i> <?= ' '.$booking['jam_mulai']; ?></p>
        </div>
        <div class="column-struk">
            <div class="row-struk">
                <p>Harga Lapangan:</p>
                <p><?= "Rp " . number_format($booking['harga'],0,',','.')  ?></p>
            </div>
            <div class="row-struk none">
                <p>Total Bayar</p>
                <p class="total"><?= "Rp " . number_format($booking['harga'],0,',','.')  ?></p>
            </div>
        </div>
    </div>
    <div class="content-button">
        <div class="container-button">
            <div class="harga-total">
                <p>Total Bayar</p>
                <p class="p2"><?= "Rp " . number_format($booking['harga'],0,',','.') ?></p>
            </div>
            <button type="submit">Bayar</button>
        </div>
    </div>
    </form>
</main>