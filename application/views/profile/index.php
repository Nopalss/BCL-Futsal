<div class="container-fluid ">

    <div class="margin container-fluid text-center col-lg-6 bg-white shadow-lg rounded pb-4">
        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="<?= $user['image'] ?>" class="img-profile img-fluid rounded-circle shadow-lg atas" style="width: 9em;">
        <?php if(validation_errors()): ?>
            <div class="alert alert-danger alert-message" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php else:  ?>
                <?= $this->session->flashdata('edit'); ?>
            <?php endif ?>
        <div class="table-responsive">
            <table class="table table-hover text-center mt-3 mx-auto">
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
                    <?php $jabatan = $this->db->get_where('user_role', ['id' => $user['roll_id']])->row_array() ?>
                    <td><?= $jabatan['role']; ?></td>
                </tr>
                <tr>
                    <th>Sejak</th>

                    <td><?= date('d F Y', $user['date_created']); ?></b></td>
                </tr>
            </table>
        </div>
        <button type="button" class="btn btn-warning mt-3" data-toggle="modal" data-target="#editProfileModal">Edit Porfile</button>
    </div>
    <!-- edit profile modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-info text-white">
                    <h5 class="modal-title" id="editppModal">Edit Profile</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="email" name="name" value="<?= $user['name']?>">
                    </div>
                    <div class="form-group">
                                <label>Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="image" value="<?= $user['image']?>">
                                <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>

                </div>
            </div>
        </div>
    </div>
</div>