<main class="main dl py">
<?= $this->session->flashdata('message'); ?>
    <div class="content-change">
        <div class="header-change">
            <h3><?= $title; ?></h3>
        </div>
        <div class="body-change">
            <form action="<?= base_url('akun/changePassword2')?>" method="post">
            <div class="form-group2">
                <input type="text" name="current_password" id="current" placeholder="Current Password">
                <?= form_error('current_password', '<small class="red">', '</small>'); ?>
                <!-- <small class="red">halo</small> -->
            </div>
            <div class="form-group-password">
                <div class="form-group2">
                
                    <input type="text" name="new_password1" id="password" placeholder="New Password">
                    <?= form_error('new_password1', '<small class="red">', '</small>'); ?>
                    <!-- <small class="red">halo</small> -->
                </div>
                <div class="form-group2">
                    <input type="text" name="new_password2" id="rPassword" placeholder="Current New Password">
                   
                </div>
            </div>
            <div class="tombol2">
                <a href="<?= base_url('akun/myProfile')?>">Kembali</a>
                <button type="submit">Change</button>
            </div>
            </form>
        </div>
    </div>
</main>