    <div class="container-fluid">
        <!-- page heading -->
        <h3><?= $title; ?></h3>
        <a href="<?= base_url('admin/tambahBooking')?>" class="btn btn-success mt-4 mb-3"><i class="fas fa-fw fa-plus-circle"></i> Tambah Booking</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Booking</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Jam Selesai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
   