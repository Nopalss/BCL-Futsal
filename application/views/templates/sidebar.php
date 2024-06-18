       <!-- Sidebar -->
       <ul class="navbar-nav bg-biru sidebar sidebar-dark accordion shadow animated--fade-in toggled" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-futbol text-gold"></i>
               </div>
               <div class="sidebar-brand-text mx-3">BCL Futsal</div>
           </a>
           <?php 
           $menu = $this->modelfutsal->get_where('user_sub_menu', ['menu_id' => $this->session->userdata('roll_id')]);
           ?>
           <hr class="sidebar-divider bg-gradient-warning">
           
           <?php foreach($menu as $m): ?>
           <!-- Divider -->
            <?php if($m['title'] == $title): ?>
           <li class="nav-item active">
            <?php else: ?>
            <li class="nav-item">
            <?php endif; ?>
               <a class="nav-link pb-0" href="<?= base_url(). $m['url'] ?>">
                    <i class="<?= $m['icon']?>"></i>
                   <span><?= $m['title']; ?></span>
               </a>
           </li>
           <?php endforeach; ?>
          

           <li class="nav-item ">
               <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                   <i class="fas fa-sign-out-alt fa-fw text-warning"></i>
                   <span>Logout</span>
               </a>
           </li>


           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline animated--fade-in">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

       </ul>
       <!-- End of Sidebar -->