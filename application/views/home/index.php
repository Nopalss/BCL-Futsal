<main>
    <section class="background">
        <h1 class="kalimat">A winner is not someone who never fails, <br> but someone who never gives up</h1>
    </section>
    <article class="l-2">
        <div class="foto1">
            <img src="<?= base_url('assets/img/home/gawang.jpg') ?>" alt="">
        </div>
        <div class="word1 l-height">
            <h1>Siap Menjadi Juara? Latih Skill Futsal Anda di Lapangan Kami!</h1>
            <p>Di BCL Futsal, kami memahami pentingnya olahraga futsal bagi Anda dan tim Anda. Dengan lapangan yang berkualitas, fasilitas modern, dan lokasi yang strategis, kami siap memberikan pengalaman bermain futsal yang tak terlupakan.</p>
        </div>
    </article>
    <section class="home-lapangan">
        <div class="word2 l-height">
            <h1 class="h2">Main Futsal Kapan Saja, Tanpa Ribet! Sewa Lapangan dengan Mudah</h1>
            <p class="p2">Kami menyediakan 2 lapangan futsal yaitu lapangan standart dan lapangan sintetis. Rasakan Pengalaman Bermain Futsal yang Berbeda! Booking Lapangan Kami Hari Ini!</p>
        </div>
        <div class="images1">
            <?php foreach($lapangan as $lp) :?>
            <div class="img-lapang">
                <img src="<?= base_url("assets/img/lapangan/"). $lp['img'] ?>">
                <div class="layer">
                    <div class="atribut-layer">
                        <p>Lapangan <?= $lp['jenis_lapangan']; ?></p>
                        <a href="<?= base_url('home/detailBookingLapangan/'). $lp['id']?>" class="tombol-lapangan1">Booking</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="home-fasilitas">
        <div class="word2 l-height">
            <h1 class="h2">Bawa Tim Anda ke Level Berikutnya dengan Sewa Lapangan Futsal Kami!</h1>
            <p class="p2">Menjadi pilihan utama bagi komunitas futsal, dengan menyediakan lapangan berkualitas, layanan terbaik dan fasilitas memadai untuk mendukung perkembangan olahraga futsal.</p>
        </div>
        <div class="logo-fasilitas">
            <?php foreach($icon as $i): ?>
            <a href="">
                <img src="<?= base_url('assets/img/home/'). $i['icon']?>" alt=""><p><?= $i['name']; ?></p></a>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="home-jenisLapangan">
        <div class="layer-lapangan bg-green1">
            <div class="word1 bl" id="bl">
                <h1>Lapangan standart</h1>
                <p>adalah jenis lapangan yang menggunakan bahan vinil sebagai lapisan atasnya. Rasakan sensasi bermain bagaikan atlet timnas. <br> Lapangan Futsal dengan Permukaan Vinil, Pilihan Terbaik untuk Anda!</p>
                <a href="<?= base_url('home/detailBookingLapangan/1')?>" class="tombol">Booking Now!</a>

            </div>
            <div class="home-img-lapangan">
                <img src="<?= base_url('assets/img/lapangan/s1.png')?>" alt="">
            </div>
        </div>
        <div class="layer-lapangan bg-green2">
            
            <div class="home-img-lapangan">
                <img src="<?= base_url('assets/img/lapangan/s2.png')?>" alt="">
            </div>
            <div class="word1">
                <h1>Lapangan Sintetis</h1>
                <p>adalah jenis lapangan yang menggunakan bahan buatan (sintetis) sebagai permukaan bermain, menggantikan bahan alami seperti rumput atau tanah. Lapangan Sintetis Kami Menjamin Permainan yang Aman dan Nyaman! Sewa Sekarang dan Buktikan Sendiri! </p>
                <a href="<?= base_url('home/detailBookingLapangan/2')?>" class="tombol">Booking Now!</a>
            </div>
        </div>
    </section>
    <section class="map">
        <h1>Location</h1>
        <div class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9726281480825!2d107.183601574751!3d-6.2673301937213255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6984a28656b9a7%3A0xe8cf5089531e6904!2sBCL%20Futsal!5e0!3m2!1sid!2sid!4v1716448708249!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>