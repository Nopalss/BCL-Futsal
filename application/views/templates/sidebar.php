       <!-- Sidebar -->
       <ul class="navbar-nav bg-biru sidebar sidebar-dark accordion shadow animated--fade-in" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-futbol text-gold"></i>
               </div>
               <div class="sidebar-brand-text mx-3">BCL Futsal</div>
           </a>
           <hr class="sidebar-divider bg-gradient-warning">

           <!-- Divider -->
           <li class="nav-item">
               <a class="nav-link pb-0" href="<?= base_url('dashboard') ?>">
                   <i class="fas fa-fw fa-chart-pie text-warning"></i>
                   <span>Dashboard</span>
               </a>
           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('booking') ?>">
                   <i class="fas fa-calendar-alt fa-fw text-warning"></i>
                   <span>Booking</span>
               </a>
           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('transaksi') ?>">
                   <i class="fas fa-money-bill-wave fa-fw text-warning"></i>
                   <span>Transaksi</span>
               </a>

           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('laporan/LaporanHarian') ?>">
                   <i class="fas fa-file-invoice fa-fw text-warning"></i>
                   <span>Laporan Harian</span>
               </a>
           </li>
           <li class="nav-item ">
               <a class="nav-link pb-0" href="<?= base_url('laporan/LaporanBulanan') ?>">
                   <i class="fas fa-file-invoice-dollar fa-fw text-warning"></i>
                   <span>Laporan Bulanan</span>
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