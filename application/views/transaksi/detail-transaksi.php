<div class="content-wrapper mb-5">

    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card rounded shadow">
                <div class="card-header text-center bg-biru2 text-white border-bottom-warning">
                    <h2><i class="fas fa-futbol text-gold"></i> BCL Futsal</h2>
                </div>
                <div class="card-body">
                    <p class="col text-dark" style="font-weight: bold;">Rincian Transaksi :</p>
                    <div class="d-flex justify-content-center mx-auto text-center">
                        <table class="table table-responsive-xl table-borderless text-justify ">
                            <tr>
                                <th>Status</th>
                                <th class="p-2"></th>
                                <td>
                                    <?php if($transaksi['status2'] == 'Batal'): ?>
                                        <h3 class="badge badge-pill badge-danger">pengembalian <i class="far fa-check-circle"></i></h3>
                                        <?php else: ?>
                                            <h3 class="badge badge-pill badge-success">Lunas <i class="far fa-check-circle"></i></h3>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <th class="p-2"></th>
                                <td>Booking</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <th class="p-2"></th>
                                <td><?= $transaksi['tanggal']; ?></td>
                            </tr>
                            <tr>
                                <th>Nota</th>
                                <th class="p-2"></th>
                                <td><?= $transaksi['nota']; ?></td>
                            </tr>
                            <tr>
                                <th>Id Booking</th>
                                <th class="p-2"></th>
                                <td><?= $transaksi['id_booking']; ?></td>
                            </tr>
                            <tr>
                                <th>Metode Pembayaran</th>
                                <th class="p-2"></th>
                                <td><?= $transaksi['metode']; ?></td>
                            </tr>
                            
                        </table>

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-around" style="font-weight: bold;">
                    <p>Total</p>
                    <p class="btn btn-success"><?= "Rp " . number_format($transaksi['total'],2,',','.') ?></p>
                </div>
            </div>
            <a href="<?= base_url('transaksi')?>" class="btn btn-info col-md-1 mt-2"><i class="fas fa-arrow-left"></i></a>
            <a href="<?= base_url('transaksi/printTransaksi/'). $transaksi['nota']; ?>" class="btn btn-danger col-md-1 mt-2"><i class="fas fa-print"></i></a>
        </div>
    </div>
</div>