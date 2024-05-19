<div class="container-fluid mb-4">
    <a class="btn btn-warning mb-3" href="<?= base_url('booking') ?>">
        <h5><i class="fas fa-angle-left"></i> Kembali</h5>
    </a>
    <div class="card mb-5 ">
        <div class="card-header text-dark bg-light">
            <h1><?= $id_booking ?></h1>
        </div>
        <div class="card-body bg-light shadow">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card rounded mb-3 bg-light border-0 shadow">
                        <div class="card-header bg-biru2 border-bottom-warning text-white">
                            <h3>Lapangan <?= $booking['jenis_lapangan'] ?></h3>
                        </div>
                        <div class="card-body text-center">
                            <img src="<?= base_url('assets/img/lapangan/') . $booking['img'] ?>" class="img img-fluid  rounded" style="width: 40em;">

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card rounded shadow">
                        <div class="card-header bg-biru2 border-bottom-warning text-white">
                            <div class="d-flex align-content-between">
                                <h3><?= $booking['id_pelanggan']; ?></h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive-lg">
                                <tbody>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <td><?= $booking['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td><?= $booking['no_telepon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Booking</th>
                                        <td><?= $booking['tanggal']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jam</th>
                                        <td><?= $booking['jam_mulai']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?= $booking['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>

                                        <td><?="Rp " . number_format($booking['harga'],2,',','.') ; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>