<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/assets_landing/img/LogoPemweb.png') ?>" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url('assets/assets_landing/img/LogoPemweb.png') ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?= base_url('assets') ?>/dist/img/Logo_pemweb_putih.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AR.EO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets') ?>/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a><?= $this->session->userdata('username') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('index.php/Dashboard') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dasboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/Users') ?>" class="nav-link <?= $menu == 'users' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/JenisPeserta') ?>" class="nav-link <?= $menu == 'jenis_peserta' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Jenis Peserta</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/JenisKegiatan') ?>" class="nav-link <?= $menu == 'jenis_kegiatan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>Jenis Kegiatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/Kegiatan') ?>" class="nav-link <?= $menu == 'kegiatan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>Kegiatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/kegiatan/kegiatanTerdaftar') ?>" class="nav-link <?= $menu == 'kegiatan_terdaftar' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Peserta Terdaftar</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?= base_url('index.php/Auth/logout') ?>" class="nav-link" onclick="return confirm('Yakin ingin keluar?')">
              <i class=" text-danger nav-icon fas fa-sign-out-alt"></i>
              <p class=" text-danger">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content py-4">