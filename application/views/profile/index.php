<div class="container-fluid">
    <h3 class="mb-5"><?= $title; ?></h3>

    <div class="mt-5 container-fluid text-center col-lg-6 bg-white shadow-lg rounded- pb-4">
        <img src="<?= base_url('assets/img/') . $user['image'] ?>" alt="<?= $user['image'] ?>" class="img-profile img-fluid rounded-circle shadow atas" style="width: 9em;">
         <div class="table-responsive">
             <table class="table table-hover text-center mt-3">
                 <tr>
                     <th>Nama</th>
                     <td><?= $user['name']; ?></td>
                 </tr>
                 
                 <tr>
                     <th>Email</th>
                     <td><?= $user['email']; ?></td>
                 </tr>
                 <tr>
                     <th>Jabatan</th>
                     <?php $jabatan = $this->db->get_where('user_role', ['id' => $user['roll_id']])->row_array()?>
                     <td><?= $jabatan['role']; ?></td>
                 </tr>
                 <tr>
                     <th>Sejak</th>
                     
                     <td><?= date('d F Y', $user['date_created']); ?></b></td>
                 </tr>
             </table>
         </div>
    </div>
</div>