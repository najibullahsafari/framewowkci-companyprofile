
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-tools"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Control Panel</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      
      
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('user'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </li>
    
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main Setting
      </div>
      <?php
      $akses = $this->session->userdata('role'); 
      if ($akses == 2) {
      ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-users-cog"></i>
          
          <span>Data Admin</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('user/view'); ?>">Data Admin</a>
            <a class="collapse-item" href="<?= base_url('user/add'); ?>">Add Admin</a>
          </div>


        </div>

      </li>
      <?php } ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company" aria-expanded="true" aria-controls="collapseTwo">
          
          <i class="fas fa-building"></i>
          <span>Website & Company Info</span>
        </a>
        <div id="company" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('company'); ?>">Data Company</a>
            <a class="collapse-item" href="<?= base_url('company/banner'); ?>">Banner</a>
            <a class="collapse-item" href="<?= base_url('company/icon'); ?>">Icon</a>

          </div>


        </div>

      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('maincontent'); ?>" >
          <i class="fas fa-pen-alt"></i>
          <span>Main Content</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="far fa-edit"></i>
          <span>Detail Content</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="<?= base_url('client'); ?>">client</a>
            <a class="collapse-item" href="<?= base_url('services'); ?>">Services</a>
            <a class="collapse-item" href="<?= base_url('portfolio'); ?>">Portfolio</a>
            <a class="collapse-item" href="<?= base_url('testimoni'); ?>">Testimoni</a>
            <a class="collapse-item" href="<?= base_url('faq'); ?>">faq</a>
            <a class="collapse-item" href="<?= base_url('team'); ?>">team</a>
            <a class="collapse-item" href="<?= base_url('kontak'); ?>">contact</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->