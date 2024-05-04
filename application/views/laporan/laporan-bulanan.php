<div class="container-fluid">
        <div class="card rounded shadow">
            <?= $this->session->flashdata('message'); ?>
            <div class="card-header border-bottom-warning bg-biru text-white ">
                <h3><?= $title; ?></h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('laporan/tambahLaporanBulanan') ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <div class="table-responsive-lg">
                    <table class="table table-hover" id="dataTable"  cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Laporan</th>
                                <th scope="col">Bulan</th>
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
                                    <td><?= $l['id_laporanB']; ?></td>
                                    <td><?= $l['bulan']; ?></td>
                                    <td><?= "Rp " . number_format($l['pendapatan'],2,',','.') ; ?></td>
                                    <td>
                                        <a href="<?= base_url('laporan/detailLaporanBulanan/') . $l['id_laporanB'] ?>" class="btn btn-info btn-circle"><i class="fas fa-fw fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <!-- <tr >
                                    <th colspan="3" class="text-center">Total</th>
                                    <th><div class="btn btn-success font-weight-bold"><?= "Rp " . number_format($pendapatan['pendapatan'],2,',','.'); ?></div></th>
                                    <th></th>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- page heading -->
    </div>