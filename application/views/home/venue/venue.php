<main class="venue main">
    <div class="header-venue">
        <h1><?= $title; ?></h1>
        <p>Berikut daftar Venue yang sudah memenuhi standar kualitas terbaik untuk memanjakan pengalamanmu bermain</p>
    </div>
    <div class="menu-venue">
        <ul>
            <li><span class="hadir-venue-menu" id="menu-lapangan">Lapangan</span></li>
            <li><span id="menu-about">About</span></li>
            <li><span id="menu-rule">Rule</span></li>
            <li><span id="menu-gallery">Gallery</span></li>
        </ul>
    </div>
    <div id="venue-lapangan">
        <div class="body-venue lapangan">
            <div class="venues-lapangan">
                <?php foreach ($lapangan as $lp) : ?>
                    <a href="<?= base_url('home/detailBookingLapangan/') . $lp['id'] ?>" class="card-link">
                        <div class="card-lapangan">
                            <div class="card-img-lp">
                                <img src="<?= base_url('assets/img/lapangan/') . $lp['img'] ?>" alt="">
                            </div>
                            <div class="card-text">
                                <h1>Lapangan <?= $lp['jenis_lapangan']; ?></h1>
                                <p><?= "Rp " . number_format($lp['harga'], 2, ',', '.'); ?></p>
                                <a class="tombol" href="<?= base_url('home/detailBookingLapangan/') . $lp['id'] ?>" class="tombol">Booking</a>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="body-venue about">
        <section class="t-hadir" id="venue-about">
            <article>
                <h3>Deskripsi</h3>
                <p>BCL Futsal memiliki 2 lapangan berstandar FIFA. 2 lapangan yang terdapat pada BCL Futsal berjenis Vinnyl dan Sintetis. Ini merupakan jenis lapangan yang sama yang digunakan oleh para team-team profesional. Selain itu, untuk menunjang pemain dalam berlatih, BCL Futsal juga memiliki fasilitas diantaranya locker room / ruang ganti pemain, sebanyak 2 ruangan yang masing - masing memiliki 10 loker di dalamnya yang dilengkapi dengan pendingin ruangan (AC), wastafel, kamar mandi dan toilet. Di area FOP lapangan, juga tersedia lampu penerangan untuk bermain dimalam hari yang juga berstandar FIFA.</p>
                <p>Setiap penyewa mendapatlkan fasilitas peminjaman handuk untuk digunakan di area lapangan dan dikembalikan pada saat pemakaian lapangan selesai</p>
                <div>
                    <p>Fasilitas tambahan yang didapatkan oleh penyewa lapangan:</p>
                    <ol>
                        <li>1. Free locker room</li>
                        <li>2. Handuk untuk penggunaan di venue</li>
                        <li>3. Dekker</li>
                        <li>4. Peminjaman bola </li>
                    </ol>
                </div>
            </article>
            <article>
                <h3>Fasilitas</h3>
                <div class="venue-icon-fasilitas">
                    <?php foreach ($icon as $i) : ?>
                        <div class="circle-fasilitas">
                            <div class="circle-icon-fasilitas">
                                <img src="<?= base_url('assets/img/home/') . $i['icon'] ?>" alt="">
                            </div>
                            <div class="text-fasilitas">
                                <p><?= $i['name']; ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </article>
        </section>
        <section id="rules">
            <article>
                <h1>Rules</h1>
                <ol class="rules">
                    <li>Diwajibkan menggunakan sepatu khusus (sepatu futsal) saat melakukan permainan di Lapangan.</li>
                    <li>Wajib menjaga kebersihan lingkungan di dalam area Lapangan.</li>
                    <li>Wajib menjaga ketertiban lingkungan di dalam area Lapangan.</li>
                    <li>Wajib melaporkan segala bentuk pelanggaran di dalam area Lapangan.</li>
                    <li>Dilarang merokok di dalam area Lapangan.</li>
                    <li>Tidak diperkenankan makan dan minum di dalam area Lapangan.</li>
                    <li>Dilarang membawa senjata tajam di dalam area Lapangan.</li>
                    <li>Dilarang membawa minuman keras / beralkohol di dalam area Lapangan.</li>
                    <li>Dilarang berjudi di dalam area Lapangan.</li>
                    <li>Dilarang membawa hewan peliharaan di dalam area Lapangan.</li>
                    <li>Dilarang membawa narkoba / narkotika di dalam area Lapangan.</li>
                    <li>Penyewa dimohon untuk mengikuti aturan yang sudah ada, jika melanggar maka penyewa akan diberikan sanksi yang berlaku.</li>
                </ol>
                <p><b>Catatan: Petugas lapangan BCL Futsal berhak melakukan pemberhentian / pelarangan jika para penyewa lapangan melakukan pelanggaran atas aturan aturan di atas</b></p>
            </article>
        </section>
        <section id="venue-gambar-fasilitas">
            <div class="row-img-fasilitas">
                <?php foreach ($fasilitas as $f) : ?>
                    <div class="card-img-fasilitas">
                        <img src="<?= base_url('assets/img/fasilitas/') . $f['file'] ?>" alt="">
                    </div>
                <?php endforeach; ?>

            </div>
        </section>
        <aside id="jam-operasional">
            <h3>Jam Operasional</h3>
            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                    </tr>
                <tbody>
                    <tr>
                        <td>Senin</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Selasa</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Rabu</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Kamis</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Jumat</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Sabtu</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Minggu</td>
                        <td>08:00 - 22:00</td>
                    </tr>
                </tbody>
                </thead>
            </table>
        </aside>
    </div>
    <div class="tutor">
        <h1>Cara Booking Lapangan</h1>
        <div class="row-tutor">
            <?php foreach ($tutor as $t) : ?>
                <div class="card-tutor">
                    <div class="card-tutor-header">
                        <h1><?= $t['id']; ?></h1>
                        <h3><?= $t['tutor']; ?></h3>
                    </div>
                    <div class="card-tutor-body">
                        <p><?= $t['text']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>