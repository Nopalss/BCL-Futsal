       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
               <div class="sidebar-brand-icon rotate-n-15">
                   <i class="fas fa-code"></i>
               </div>
               <div class="sidebar-brand-text mx-3">WPU Admin</div>
           </a>

           <!-- Divider -->
           <hr class="sidebar-divider">

           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                   <i class="fas fa-sign-out-alt fa-fw"></i>
                   <span>Logout</span>
               </a>
           </li>

           <hr class="sidebar-divider">

           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

       </ul>
       <!-- End of Sidebar -->