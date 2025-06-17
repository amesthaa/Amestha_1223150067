<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/summernote/summernote-bs4.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/datatables-buttons/css/buttons/bootstrap4.min.css')?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url(); ?>" class="brand-link">
    <img src="<?= base_url('assets/adminlte/dist/img/AdminTELogo.png'); ?>"
    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <spann class="brand=text font-weight-light">AdminLTE 3</span>
</a>

<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url('assets/adminlte/dist/img/user2-160x160.jpg'); ?>"
      class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Alexander Pierce</a>
    </div>
  </div>

  <nav class="mt-2">
    <?php $level = $this->session->userdata('role'); ?>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <?php if ($level == 'admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('product/tambah'); ?>" class="nav-link">
              <i class="far fa-newspaper nav-icon"></i>
              <p>Input Product</p>
            </a>
          </li>
          <?php endif; ?>

          <?php if ($level == 'admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('pelanggan/tambah'); ?>" class="nav-link">
              <i class="far fa-newspaper nav-icon"></i>
              <p>Input Customer</p>
            </a>
          </li>
          <?php endif; ?>
          
          <?php if ($level == 'admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('product/data_produk'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Data Product</p>
            </a>
          </li>
          <?php endif; ?>
           <?php if ($level == 'admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('pelanggan/data_pelanggan'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Data Customer</p>
            </a>
          </li>
          <?php endif; ?>
           <?php if ($level == 'admin') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/data_penjualan'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Data Penjualan</p>
            </a>
          </li>
          <?php endif; ?>
           <?php if ($level == 'sales') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/tambah'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Input Sales Order</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($level == 'sales') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/data'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Data Penjualan Sales</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($level == 'manajer') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/laporan_penjualan'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Laporan per Sales</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($level == 'manajer') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/laporan_produk'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Laporan per Produk</p>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($level == 'manajer') : ?>
          <li class="nav-item">
            <a href="<?= base_url('Salesorder/laporan_periode'); ?>" class="nav-link">
              <i class="far fa-folder nav-icon"></i>
              <p>Laporan per Waktu</p>
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
    <li class="nav-item">
      <a href="<?= site_url('auth/logout') ?>" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
      </a>
    </li>
        </ul>
      </nav>
    </div>
  </aside>
</div>