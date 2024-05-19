<div class="container-fluid">
    
    
    <div class="row ml-3">
        <div class="card mb-3 col-lg-6  shadow-lg rounded">
            <div class="card-header bg-biru2 border-bottom-warning text-white">
                <h1 class="h3 mb-4"><?= $title; ?></h1>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="row no-gutters">
                    <div class="col-lg">
                        <form action="<?= base_url('akun/changePassword') ?>" method="post">
                            <div class="form-group">
                                <label for="current_password"><b>Current Password</b></label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1"><b>New Password</b></label>
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2"><b>Repeat Password</b></label>
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group mt-4 text-right">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>