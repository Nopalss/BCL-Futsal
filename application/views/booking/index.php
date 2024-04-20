    <div class="container-fluid">
        <div class="card rounded shadow">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header border-bottom-warning bg-biru text-white ">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('admin/jadwal_booking') ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <div class="table-responsive-lg">
                    <table class="table table-hover" id="dataTable"  cellspacing="0">
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
                                    <?php if($b['status'] == 'Booking'): ?>
                                    <td><a href="<?= base_url('admin/tambahTransaksi') ?>" class="btn btn-warning"><?= $b['status']; ?></a></td>
                                    <?php else: ?>
                                    <td><a href="#" class="btn btn-success"><?= $b['status']; ?></a></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?= base_url('admin/detail_booking/') . $b['id'] ?>" class="btn btn-info btn-circle"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="<?= base_url('admin/hapus_booking/') . $b['id'] ?>" class="btn btn-danger btn-circle" onclick="hapus(<?= $b['id'] ?>)"><i class="fas fa-fw fa-trash"></i></a>

                                        <a href="<?= base_url('admin/edit_booking/') . $b['id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-fw fa-pen"></i></a>
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