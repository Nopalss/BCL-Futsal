       <!-- Sidebar -->
       <ul class="navbar-nav bg-biru sidebar sidebar-dark accordion shadow animated--fade-in" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-futbol text-gold"></i>
               </div>
               <div class="sidebar-brand-text mx-3">BCL Futsal</div>
           </a>
           <hr class="sidebar-divider bg-gradient-warning">

           <!-- Divider -->
           <li class="nav-item">
               <a class="nav-link pb-0" href="<?= base_url('admin') ?>">
                   <i class="fas fa-user fa-fw text-warning"></i>
                   <span>My Profile</span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link pb-0" href="<?= base_url('admin/changepassword') ?>">
                   <i class="fas fa-book fa-fw text-warning"></i>
                   <span>Change Password</span>
               </a>
           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('admin/booking') ?>">
                   <i class="fas fa-calendar-alt fa-fw text-warning"></i>
                   <span>Booking</span>
               </a>
           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('admin/transaksi') ?>">
               <i class="fas fa-money-bill-wave fa-fw text-warning"></i>
                <span>Transaksi</span>
               </a>

           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('admin/LaporanHarian') ?>">
                   <i class="fas fa-file-invoice-dollar fa-fw text-warning"></i>
                   <span>Laporan Harian</span>
               </a>
           </li>

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