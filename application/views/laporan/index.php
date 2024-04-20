<div class="container-fluid">
        <div class="card rounded shadow">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header border-bottom-warning bg-biru text-white ">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('admin/tambahLaporanHarian') ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <div class="table-responsive-lg">
                    <table class="table table-hover" id="dataTable"  cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Laporan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pendapatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($laporan as $l) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $l['id']; ?></td>
                                    <td><?= $l['tanggal']; ?></td>
                                    <td><?= $l['pendapatan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/detailTransaksi/') . $l['id'] ?>" class="btn btn-info btn-circle"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="<?= base_url('admin/hapus_booking/') . $l['id'] ?>" class="btn btn-danger btn-circle"><i class="fas fa-fw fa-trash"></i></a>

                                        <a href="<?= base_url('admin/edit_booking/') . $l['id'] ?>" class="btn btn-warning btn-circle"><i class="fas fa-fw fa-pen"></i></a>
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