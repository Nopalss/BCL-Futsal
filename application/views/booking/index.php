    <div class="container-fluid mb-4">
        <div class="card rounded shadow">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header border-bottom-warning bg-biru text-white ">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('booking/jadwalBooking') ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <div class="table-responsive-lg">
                    <table class="table table-hover " id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Booking</th>
                                <th scope="col">Id User</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($booking as $b) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $b['id']; ?></td>
                                    <td><?= $b['id_pelanggan']; ?></td>
                                    <!-- <td><?= $b['nama']; ?></td> -->
                                    <td><?= $b['tanggal']; ?></td>
                                    <td><?= $b['jam_mulai']; ?></td>
                                    <?php if ($b['status2'] == 'Sukses') : ?>
                                        <td><a class="btn btn-success"><?= $b['status2']; ?></a></td>
                                    <?php elseif($b['status2'] == 'Batal') : ?>
                                        <td><a href="#" class="btn btn-danger"><?= $b['status2']; ?></a></td>
                                        <?php else: ?>
                                            <td><a href="#" class="btn btn-warning"><?= $b['status2']; ?></a></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?= base_url('booking/detailBooking/') . $b['id'] ?>" class="btn btn-info btn-circle"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="<?= base_url('booking/hapusBooking/') . $b['id'] ?>" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#<?= $b['id']?>"><i class="fas fa-fw fa-trash"></i></a>

                                        <a href="<?= base_url('booking/editTanggal/') . $b['id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-fw fa-pen"></i></a>
                                    </td>
                                </tr>
                                <!-- modal -->
                                <div class="modal fade" id="<?=$b['id']?>" tabindex="-1" role="dialog" aria-labelledby="<?=$b['id']?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Menghapus Booking?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select 'Hapus' below if you are ready to delete booking.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="<?= base_url('booking/hapusBooking/'). $b['id'] ?>">Delete</a>
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