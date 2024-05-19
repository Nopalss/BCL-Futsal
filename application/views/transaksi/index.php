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
                                        <a href="<?= base_url('transaksi/hapusTransaksi/') . $t['nota'] ?>" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#<?= $t['nota']?>"><i class="fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>
                                 <!-- modal -->
                                 <div class="modal fade" id="<?=$t['nota']?>" tabindex="-1" role="dialog" aria-labelledby="<?=$t['nota']?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus Transaksi?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select 'Hapus' below if you are ready to delete Transaksi.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="<?= base_url('transaksi/hapusTransaksi/'). $t['nota'] ?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- page heading -->
    </div>