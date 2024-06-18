<main class="main dl">
    <?= $this->session->flashdata('message'); ?>
    <div class="body-detail-lapangan">
        <div class="form-row">
            <div class="form">
                <h3>Pilih Tanggal Booking:</h3>
                <form method="post" action="<?= base_url('home/pageEditBooking/') . $booking['id_pelanggan'] ?>">
                    <input type="date" name="tanggal" id="" value="<?= $tanggal ?>">
                    <input type="input" readonly name="id_lapangan" id="jenis_lapangan"value="Lapangan <?= $lapangan['jenis_lapangan']?>">

                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    <button type="submit">Cek jadwal</button>
                </form>
            </div>
        </div>
        <form method="post" action="<?= base_url('home/editBookingLapangan/'). $booking['id_pelanggan'] ?>" class="form-jam-booking">
            <div class="row-jam-booking">
                <!-- dicek jadwal booking nya ada yang booking apa enggak -->
                <?php if ($jam_booking) : ?>
                    <!-- ini perulangan buat ditaroh di $jb -->
                    <?php foreach ($jam_booking as $jb) : ?>
                        <?php $jamB[] = $jb['jam_mulai']; ?>
                    <?php endforeach; ?>
                    <!-- dijumlahkan ada berapa booking pada tanggal yang diminta user -->
                    <?php $jumlah = count($jamB); ?>
                    <!-- jika ada satu -->
                    <?php if ($jumlah == 1) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 2) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 3) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 4) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php elseif ($jumlah == 5) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php elseif ($jumlah == 6) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 7) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 8) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 9) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 10) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 11) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 12) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php elseif ($jumlah == 13) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11] || $j['jam'] == $jamB[12]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php elseif ($jumlah == 14) : ?>
                        <?php foreach ($jam as $j) : ?>
                            <!-- ini dibanding apakah ada yang booking pada jam yang sama -->
                            <?php if ($j['jam'] == $jamB[0] || $j['jam'] == $jamB[1] || $j['jam'] == $jamB[2] || $j['jam'] == $jamB[3] || $j['jam'] == $jamB[4] || $j['jam'] == $jamB[5] || $j['jam'] == $jamB[6] || $j['jam'] == $jamB[7] || $j['jam'] == $jamB[8] || $j['jam'] == $jamB[9] || $j['jam'] == $jamB[10] || $j['jam'] == $jamB[11] || $j['jam'] == $jamB[12] || $j['jam'] == $jamB[13]) : ?>
                                <div class="card-radio booked ">
                                    <div class="body-radio">
                                        <label><?= $j['jam'] ?></label>
                                        <p>Booked</p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="card-radio">
                                    <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                                    <div class="body-radio">
                                        <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!--  -->
                    <?php endif; ?>
                <?php else : ?>
                    <?php foreach ($jam as $j) : ?>
                        <div class="card-radio">
                            <input id="<?= $j['id_jam'] ?>" type="radio" name="jam_mulai" value="<?= $j['jam'] ?>">
                            <div class="body-radio">
                                <label for="<?= $j['id_jam'] ?>"><?= $j['jam'] ?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
                        
            <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
            <input type="hidden" name="jenis_lapangan" value="<?= $lapangan['jenis_lapangan'] ?>">
            <input type="hidden" name="id_lapangan" value="<?= $lapangan['id'] ?>">
            <input type="hidden" name="harga" value="<?= $lapangan['harga'] ?>">
            <div class="lanjut-pembayaran">
                <div class="tombol-lanjut-pembayaran">
                    <button type="submit">Reschedule Booking</button>
                </div>
            </div>
        </form>
</main>