<div class="container-fluid">
        <div class="card rounded shadow">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header border-bottom-warning bg-biru text-white ">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('transaksi/tambahTransaksi') ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <div class="table-responsive-lg">
                    <table class="table table-hover" id="dataTable"  cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nota</th>
                                <th scope="col">Id Booking</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($transaksi as $t) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $t['nota']; ?></td>
                                    <td><?= $t['id_booking']; ?></td>
                                    <td><?= $t['tanggal']; ?></td>
                                    <td><?= "Rp " . number_format($t['total'],2,',','.') ; ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detailTransaksi/') . $t['nota'] ?>" class="btn btn-info btn-circle"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="<?= base_url('transaksi/hapus_booking/') . $t['nota'] ?>" class="btn btn-danger btn-circle"><i class="fas fa-fw fa-trash"></i></a>

                                        <a href="<?= base_url('transaksi/edit_booking/') . $t['nota'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-fw fa-pen"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- page heading -->
    </div>