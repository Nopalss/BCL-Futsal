<header>
    <a href="" class="pt">BCL Futsal</a>
    <nav class="nav-desktop">
        <?php 
        if($this->session->userdata('status') == 'Member'): 
            $id = $user['id'];
            $query = "SELECT COUNT(*) AS jumlah FROM notif WHERE id_user = $id AND statuss = 'Belum'";
            $n = $this->db->query($query)->row_array();  
            // var_dump($n);
            // var_dump(intval($n));
            ?>
        <?php endif; ?>
        <ul>
            <?php foreach($menu as $m): ?>
            <li>
                <a href="<?= base_url(). $m['url']?>"><?= $m['title']; ?></a>
            </li>
            <?php endforeach; ?>
            <?php  if($this->session->userdata('status') == 'Member'):  ?>
            <li>
                <a href="<?= base_url('home/notifikasi')?>">
                    <i class="fas fa-bell"></i>
                    <?php if(intval($n['jumlah']) > 0): ?>
                        <span class="kecil"><?= $n['jumlah']?></span>
                    <?php endif; ?>
                </a>
            </li>
            <?php endif; ?>
            <li>
                <!-- <a href="" class="login">Login <i class="logo fas fa-user-circle"></i> </a> -->
                <?php if($this->session->userdata('status') == 'Visitor'): ?>
                    <a href ="<?= base_url('auth')?>" class="login" id="profile">Login <i class="logo fas fa-user-circle"></i> </a>
                <?php else: ?>
                    <div class="st-member" id="profile"><img src="<?= base_url('assets/img/profile/'). $user['image']?>" alt=""></div>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
    <div class="user-mobile">
        <i class="logo fas fa-bars"></i>
    </div>
    <?php if($this->session->userdata('status') == 'Visitor'): ?>
    <!-- <div class="profile-detail" id="detail-profile">
        <div class="detail-img">
            <img src="<?= base_url('assets/img/profile/default.png')?>" alt="">
        </div>
        <div class="detail-text">
            <h1><?= $this->session->userdata('status'); ?></h1>
        </div>
        <div class="garis"></div>
        <div class="profile-menu">
            <ul>
                <li><a href="">Login</a></li>
                <li><a href="">Create Account</a></li>
            </ul>
        </div>
    </div> -->
    <?php else: ?>
        <div class="profile-detail" id="detail-profile">
            <div class="detail-img">
                <img src="<?= base_url('assets/img/profile/'). $user['image']?>" alt="">
            </div>
            <div class="detail-text">
                <h1><?= $user['name']; ?></h1>
                <p>Member</p>
            </div>
            <div class="garis"></div>
            <div class="profile-menu">
                <ul>
                    <li><a href="<?= base_url('akun/myprofile')?>">My Profile</a></li>
                    <li><div id="logout">Logout</div></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal-logout">
        <div class="header-logout">
            <p>Ready to Leave?</p>
            <span id="x-logout"><i class="fas fa-times"></i></span>
        </div>
        <div class="body-logout">
            <p>Select "Logout" below if you are ready to end your current session.</p>
        </div>
        <div class="footer-logout">
            <div class="tombol batal-logout">
                <p>Batal</p>
            </div>
            <a href="<?= base_url('auth/logout')?>" class="tombol">Logout</a>
        </div>
    </div>
</header>
<nav class="nav-mobile" id="nav-mobile">
    <div class="nav-header">
        <div class="nav-img">
            <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" alt="">
        </div>
        <div class="n-j">
            <?php if($this->session->userdata('status') == 'Member'): ?>
                <h1><?= $user['name']; ?> <sup><span class="edit-profile"><a href="<?= base_url('akun/myprofile')?>"><i class="fas fa-cog"></i></a></span></sup></h1>
                <p><?= $this->session->userdata('status'); ?></p>
                
            <?php else: ?>
                <div class="pertombolan">
                    <a href="<?= base_url('auth/registration')?>" class="btn-login">Create</a>
                    <a href="<?= base_url('auth')?>" class="btn-login">Login</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <span class="x" id="x2"><i class="fas fa-times"></i></span>
    
    <div class="nav-menu">
        <ul>
            <?php foreach($menu as $m): ?>
            <li><a href="<?= base_url(). $m['url']?>"><i class="<?= $m['icon']?>"></i><?= $m['title']; ?></a></li>
            <?php endforeach; ?>
            <?php if($this->session->userdata('status') == 'Member'): ?>
                <li><a href="<?= base_url('home/notifikasi')?>"><i class="fas fa-bell"></i>Notifikasi
                <?php if(intval($n['jumlah']) > 0): ?>
                        <span class="kecil2"><?= $n['jumlah']?></span>
                    <?php endif; ?></a></li>
                <li><div class="logout" id="logout-2"><i class="fas fa-sign-out-alt"></i>Logout</div></li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="nav-footer">

    </div>
</nav>
