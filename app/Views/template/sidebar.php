 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Saubluu <sup>Cafe</sup></div>
     </a>


     <!-- Divider -->
     <hr class="sidebar-divider" />
     <div class="sidebar-heading">Main Menu</div>
     <!-- Nav Item - Cashier -->
     <li class="nav-item" data-url="/user/dashboard">
         <a class="nav-link" href="/user/dashboard" data-url="admin">
             <i class="fas fa-fw fa-chart-area" data-url="admin"></i>
             <span>Dashboard</span></a>
     </li>
     <li class="nav-item" data-url="/penjualan/tampil">
         <a class="nav-link" href="/penjualan/tampil">
             <i class="fas fa-fw fa-cash-register"></i>
             <span>Cashier</span></a>
     </li>


     <!-- divider -->
     <?php if (session()->get('level') == 'admin') { ?>
         <hr class="sidebar-divider" />

         <!-- Heading -->
         <div class="sidebar-heading">MASTER DATA</div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-user"></i>
                 <span>Kelola User</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Kelola User</h6>
                     <a class="collapse-item " href="/user/tampil">List Pegawai</a>
                     <a class="collapse-item" href="/user/tambah">Tambah Pegawai</a>
                 </div>
             </div>
         </li>


         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-book-open"></i>
                 <span>Kelola Kategori & Menu</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Kelola Kategori</h6>
                     <a class="collapse-item" href="/kategori/tampil">List Kategori</a>
                     <a class="collapse-item" href="/kategori/tambah">Tambah Kategori</a>
                 </div>
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Kelola Menu</h6>
                     <a class="collapse-item" href="/menu/tampil">List Menu</a>
                     <a class="collapse-item" href="/menu/tambah">Tambah Menu</a>
                 </div>
             </div>
         </li>
     <?php } ?>

     <!-- laporan -->
     <hr class="sidebar-divider" />
     <div class="sidebar-heading">Laporan</div>
     <li class="nav-item" data-url="/laporan/tampil">
         <a class="nav-link" href="/laporan/tampil">
             <i class="fas fa-fw fa-file-alt"></i>
             <span>Laporan Harian</span></a>
     </li>
     <li class="nav-item" data-url="/laporan/viewMonth">
         <a class="nav-link" href="/laporan/viewMonth">
             <i class="fas fa-fw fa-file-alt"></i>
             <span>Laporan Bulanan</span></a>
     </li>


     <!-- divider -->
     <hr class="sidebar-divider" />
     <div class="sidebar-heading">Logout</div>
     <!-- Nav Item - Logout -->
     <li class="nav-item">
         <a class="nav-link" href="/user">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block" />

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>
 <!-- End of Sidebar -->