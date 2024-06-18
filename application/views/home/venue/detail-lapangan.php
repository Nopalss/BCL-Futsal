<main class="main dl">
<!-- <div class="info-login">
            <p>Anda Belum Melakukan Login. Silahkan Login Terlebih Dahulu!</p>
            <a href="<?=base_url('auth')?>">Login</a>
            <i class="fas fa-times" id="x-info"></i>
        </div>   -->
        <?= $this->session->flashdata('message'); ?>
    <?php if($this->session->userdata('status') == "Visitor"): ?>
        <div class="info-login">
            <p>Anda Belum Melakukan Login. Silahkan Login Terlebih Dahulu!</p>
            <a href="<?=base_url('auth')?>">Login</a>
            <i class="fas fa-times" id="x-info"></i>
        </div>    
    <?php endif; ?>
    <div class="header-detail-lapangan">
        <div class="detail-img">
            <img src="<?= base_url('assets/img/lapangan/'). $lapangan['img']?>" alt="">
            <div class="detail-harga">
                <p>Harga</p>
                <h1><?= "Rp " . number_format($lapangan['harga'],2,',','.'); ?></h1>
            </div>
        </div>
        <div class="detail-judul">
            <h1>Lapangan <?= $lapangan['jenis_lapangan']; ?></h1>
            <p>BCL Futsal</p>
        </div>
    </div>
    <div class="body-detail-lapangan">
        <div class="form-row">
            <div class="form">
                <h3>Pilih Tanggal Booking:</h3>
                <form method = "post" action="<?= base_url('home/detailBookingLapangan/'). $lapangan['id']?>">
                    <input type="date" name="tanggal" id="" value="<?= $tanggal ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    <button type="submit">Cek jadwal</button>
                </form>
            </div>
        </div>
       
        <form method = "post" action="<?= base_url('home/createBookinguser/')?>" class="form-jam-booking">
           <div class="row-jam-booking">
            <!-- dicek jadwal booking nya ada yang booking apa enggak -->
                <?php if($jam_booking): ?>
                   <!-- ini perulangan buat ditaroh di $jb -->
                    <?php foreach ($jam_booking as $jb) : ?>
                         <?php $jamB[] = $jb['jam_mulai'];?>
                    <?php endforeach; ?>
                    <!-- dijumlahkan ada berapa booking pada tanggal yang diminta user -->
                    <?php $jumlah = count($jamB); ?>
                    <!-- jika ada satu -->
                    <?php if($jumlah == 1): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 2): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 3): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 4): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    
                    <?php elseif($jumlah == 5): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    
                    <?php elseif($jumlah == 6): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 7): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 8): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>        
                    <?php elseif($jumlah == 9): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 10): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 11): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 12): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif($jumlah == 13): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11] || $j['jam'] == $jamB[12]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    
                    <?php elseif($jumlah == 14): ?>
                        <?php foreach($jam as $j): ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11] || $j['jam'] == $jamB[12] || $j['jam'] == $jamB[13]): ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label ><?= $j['jam']?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    
                    <!--  -->
                    <?php endif; ?>
                <?php else: ?>
                    <?php foreach($jam as $j): ?>
                        <div class="card-radio">
                            <input id="<?= $j['id_jam']?>" type="radio" name="jam_mulai" value="<?= $j['jam']?>">
                            <div class="body-radio">
                                <label for="<?= $j['id_jam']?>"><?= $j['jam']?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
           </div>

           <input type="hidden" name="tanggal" value="<?=$tanggal?>">
           <input type="hidden" name="jenis_lapangan" value="<?=$lapangan['jenis_lapangan']?>">
           <input type="hidden" name="id_lapangan" value="<?= $lapangan['id']?>">
           <input type="hidden" name ="harga" value="<?= $lapangan['harga']?>">
           <div class="lanjut-pembayaran">
                <div class="tombol-lanjut-pembayaran">
                    <button type="submit">Lanjut Pembayaran</button>
                </div>
           </div>
        </form>
        <div class="row-comment-tutor">
            <div class="container-comment">
                <div class="row-comment">
                    <h4>Ulasan Pelanggan</h4>
                    <?php foreach($comment as $c): ?>
                        <div class="card-comment">
                            <img src="<?= base_url('assets/img/profile/'). $c['image']?>" alt="">
                            <div class="content-comment">
                                <h3><?= $c['name']; ?></h3>
                                <div class="comment">
                                    <p><?= $c['comment']; ?></p>
                                    <span><?= $c['tanggal']; ?></span>
                                </div>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>  
                </div>
                <?php if($this->session->userdata('status') == 'Member'): ?>
                    <form action="<?= base_url('home/beriUlasan')?>" method="post">
                        <div class="input-comment">
                            <input type="hidden" name ="id_user" value="<?= $this->session->userdata('id_user')?>">
                            <input type="hidden" name ="id" value="<?= $lapangan['id']?>">
                            <input type="text" placeholder="Comment" name="comment" maxlength="100" required>
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="container-tutor">
                <?php foreach($tutor as $t): ?>
                    <div class="card-tutor2">
                        <h1><?= $t['id'];  ?></h1>
                        <h3><?= $t['tutor']; ?></h3>
                        <p><?= $t['text']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</main>