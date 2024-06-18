<main class="main dl py">
<?= $this->session->flashdata('message'); ?>
<?= form_error('name', '<div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i>', '</div>'); ?>
<!-- <div class="alert-message-eror" role="alert"><i class="fas fa-info-circle"></i> Harap Isi Form Dengan Benar!</div> -->
    <div class="myprofile">
        <div class="head-mp">
            <h3>Profile Saya</h3>
            <img src="<?= base_url('assets/img/profile/'). $user['image']?>" alt="">
            <p class="name"><?= $user['name']; ?></p>
            <p class="email"><?= $user['email']; ?></p>
        </div>
        <div class="body-mp">
            <div class="mp-item">
                <p><i class="far fa-envelope"></i> <?= $user['email']; ?></p>
            </div>
            <div class="mp-item">
                <p><i class="far fa-user"></i> <?= $user['name']; ?></p>
            </div>
            <div class="mp-item">
                <p><i class="fas fa-calendar-plus"></i> <?= date('d M Y',$user['date_created']); ?></p>
            </div>
            <div class="pemisah">
            </div>
            <div class="mp-item">
                <div class="edit-profile"><i class="fas fa-user-edit"></i> Edit Profile <span><i class="fas fa-chevron-left fa-flip-horizontal"></i></span></div>
            </div>
            <div class="mp-item">
                <a href="<?= base_url('akun/changePassword2')?>" class="biru"><i class="fas fa-lock"></i> Change Password <span><i class="fas fa-chevron-left fa-flip-horizontal"></i></span></a>
            </div>
            <div class="mp-item">
                <a href="<?= base_url('auth/logout')?>" class="red"><i class="fas fa-sign-out-alt"></i> Logout <span><i class="fas fa-chevron-left fa-flip-horizontal"></i></span></a>
            </div>
        </div>
    </div>
    <div class="cont-edit-profile">
        <div class="body-edit">
            <div class="head-edit">
                <h3>Edit Profile</h3>
            </div>
            <div class="form-edit">
            <?= form_open_multipart('akun/myprofile'); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="readonly"id="email" name="email" type="text" value="<?= $user['email']?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" name="name" type="text" value="<?= $user['name']?>">
                    </div>
                    
                    <label class="img-text" for="foto">Image</label>
                    <div class="form-group-image">
                        <img src="<?= base_url('assets/img/profile/'). $user['image']?>" alt="">
                        <input type="file" class="custom-file-input" id="foto" name="image" value="<?= $user['image']?>">
                    </div>
                    <div class="btn-edit">
                        <div class="edit-batal">Batal</div>
                        <button type="submit">Update</button>
                    </div>
            </div>
        </div>
    </div>
</main>