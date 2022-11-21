  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Fronts')?>">
        <div class="sidebar-brand-icon">
          <img src="<?=base_url('/assets/img/logo.png')?>" width="45px">
        </div>
      </a>
      <small class="text-center text-light" style="margin-top:-10px; margin-bottom:20px;">SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG</small>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($title === "Dashboard - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG") {
                            echo "active";
                          } ?>">
        <a class="nav-link" href="<?= base_url('Dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
          IBADAH
        </div> -->

        <li class="nav-item <?php if ($title === "Ibadah - SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG") {
                              echo "active";
                            } ?>">
          <a class="nav-link" href="<?= base_url('Ibadah');?>">
            <i class="fas fa-fw fa-church"></i>
            <span>Ibadah</span></a>
        </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-3 d-none d-lg-inline text-gray-600 small"><b><?= $this->session->userdata('nama'); ?></b></span>
                <img class="img-profile rounded-circle" src="<?= base_url()?>/assets/img/user.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('Profile')?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider <?php if($this->session->userdata('role')!=="admin"){ echo "d-none"; }?>"></div>
                <a class="dropdown-item <?php if($this->session->userdata('role')!=="admin"){ echo "d-none"; }?>" href="<?= base_url('Admin')?>">
                  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Admin Menu
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->