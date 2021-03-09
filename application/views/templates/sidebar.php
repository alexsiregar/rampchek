<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
    <div class="sidebar-brand-icon">
      <i><img src="<?= base_url(); ?>assets/img/logo.png" alt="" height="50px" /></i>
    </div>
    <div class="sidebar-brand-text mx-3">RAMPCHEK</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <?php $active = $title == 'Dashboard'  ? 'active' : '' ?>
  <li class="nav-item <?= $active; ?>">
    <a class="nav-link" href="<?= base_url('home'); ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>

  <!-- Nav Item - Charts -->
  <?php $active = $title == 'Edit Profil'  ? 'active' : '' ?>
  <li class="nav-item <?= $active; ?>">
    <a class="nav-link" href="<?= base_url('home/edit'); ?>">
      <i class="fas fa-fw fa-user-edit"></i>
      <span>Edit Profil</span></a>
  </li>

  <?php if ($user['role'] == 1) { ?>
    <?php $active = $title == 'Tambah User'  ? 'active' : '' ?>
    <li class="nav-item <?= $active; ?>">
      <a class="nav-link" href="<?= base_url('home/tambahuser'); ?>">
        <i class="fas fa-fw fa-user-plus"></i>
        <span>Tambah user</span></a>
    </li>
  <?php } ?>

  <?php $active = $title == 'Pengecekan'  ? 'active' : '' ?>
  <li class="nav-item <?= $active; ?>">
    <a class="nav-link" href="<?= base_url('home/pengecekan'); ?>">
      <i class="fas fa-fw fa-save"></i>
      <span>Pengecekan</span></a>
  </li>


  <?php $active = $title == 'Laporan'  ? 'active' : '' ?>
  <li class="nav-item <?= $active; ?>">
    <a class="nav-link" href="<?= base_url('home/laporan'); ?>">
      <i class="fas fa-fw fa-file-alt"></i>
      <span>Laporan</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->