<!doctype html>
<html lang="en">

<head>
<style>
/* Sidebar Styles */
.sidenav {
  height: 100%;
  width: 220px; /* Lebar sidebar */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  color: white; /* Warna teks */
}

/* Style the sidebar links */
.sidebar-link {
  text-decoration: none;
  display: block;
  padding: 10px 15px; /* Padding kiri kanan dan atas bawah */
  color: white;
}

.sidebar-link:hover {
  background-color: #333; /* Warna latar belakang saat hover */
}

/* Custom bullet style */
.sidebar-link .bullet {
  width: 8px;
  height: 8px;
  background-color: #fff; /* Warna bullet */
  border-radius: 50%;
  display: inline-block;
  margin-right: 10px; /* Jarak antara bullet dan teks */
}

/* Arrow icon */
.sidebar-link.has-arrow::after {
  content: '▼'; /* Icon panah bawah */
  float: right;
  margin-left: 10px; /* Jarak antara teks dan icon */
}

.sidebar-link[aria-expanded="true"]::after {
  content: '▲'; /* Icon panah atas untuk menu yang terbuka */
}

/* Dropdown items */
.collapse {
  display: none;
  transition: height 0.3s ease;
}

.collapse.show {
  display: block;
}

.first-level {
  padding-left: 15px; /* Padding kiri submenu */
}

.first-level .sidebar-item {
  margin-left: 15px; /* Margin kiri untuk submenu */
}

/* Styling active link */
.sidebar-item.active {
  background-color: #333; /* Warna latar belakang saat aktif */
}

/* Small caption */
.nav-small-cap {
  margin-top: 20px; /* Jarak atas dari small caption */
  padding: 8px 15px; /* Padding small caption */
  color: #aaa; /* Warna small caption */
  font-size: 14px; /* Ukuran font small caption */
}

/* Icon small caption */
.nav-small-cap .nav-small-cap-icon {
  margin-right: 10px; /* Jarak antara icon dan teks */
}

/* Hide menu text */
.hide-menu {
  display: inline-block; /* Menampilkan text */
}

/* Toggle button style */
.dropdown-btn {
  background: none;
  border: none;
  color: white;
  cursor: pointer;
  outline: none;
  padding: 10px 15px;
  text-decoration: none;
  width: 100%;
  text-align: left;
}
.sidebar-link .bullet {
  width: 8px;
  height: 8px;
  background-color: #000000; /* Warna bullet */
  border-radius: 50%;
  display: inline-block;
  margin-right: 10px; /* Jarak antara bullet dan teks */
}
/* Dropdown container */
.dropdown-container {
  display: none;
  background-color: #333; /* Warna latar belakang dropdown */
  padding-left: 15px; /* Padding kiri dropdown */
}

/* Dropdown link style */
.dropdown-container a {
  color: white;
  padding: 8px 15px;
  text-decoration: none;
  display: block;
}

/* Dropdown link hover */
.dropdown-container a:hover {
  background-color: #555; /* Warna latar belakang saat hover */
}

/* Caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 15px;
}

/* Active dropdown button */
.active {
  background-color: #555; /* Warna latar belakang saat aktif */
}
    </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Petugas</title>
  <link rel="shortcut icon" type="image/png" href="<?=base_url('assets')?>/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/styles.min.css" />
</head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS --><!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a  class="text-nowrap logo-img">
            <img src="<?=base_url('assets/')?>images/logos/logo_puskes.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <li class="nav-item d-block d-xl-none">
  <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
    <i class="ti ti-menu-2"></i>
  </a>
</li>

<nav class="sidebar-nav scroll-sidebar" data-simplebar="" id="sidebarNav">
  <ul id="sidebarnav">
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">Home</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Dashboard')?>" aria-expanded="false">
        <span><i class="ti ti-layout-dashboard"></i></span>
        <span class="hide-menu">Dashboard</span>
      </a>
    </li>
    <!-- <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu"></span>
    </li> -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/pasien')?>" aria-expanded="false">
        <span><i class="ti ti-article"></i></span>
        <span class="hide-menu">Data Pasien</span>
      </a>
    </li>
    <!-- <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/kunjungan')?>" aria-expanded="false">
        <span><i class="ti ti-file-description"></i></span>
        <span class="hide-menu">Data Kunjungan</span>
      </a>
    </li> -->
    <li class="sidebar-item">
      <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
        <span><i class="ti ti-file-description"></i></span>
        <span class="hide-menu">Data Kunjungan</span>
      </a>
      <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/kunjungan_umum') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Umum</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/kunjungan_gigi') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Gigi</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/kunjungan_kia_kb') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli KIA & KB</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/kunjungan_anak') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Anak</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/dokter')?>" aria-expanded="false">
        <span><i class="ti ti-article"></i></span>
        <span class="hide-menu">Data Dokter</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/apoteker')?>" aria-expanded="false">
        <span><i class="ti ti-article"></i></span>
        <span class="hide-menu">Data Apoteker</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
        <span><i class="ti ti-file-description"></i></span>
        <span class="hide-menu">Data Rekam Medis</span>
      </a>
      <ul aria-expanded="false" class="collapse first-level">
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/rekammedis_umum') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Umum</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/rekammedis_gigi') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Gigi</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/rekammedis_kia_kb') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli KIA & KB</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="<?= base_url('Petugas/rekammedis_anak') ?>" class="sidebar-link">
            <span class="bullet"></span>
            <span class="hide-menu">Poli Anak</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/rekammedis')?>" aria-expanded="false">
        <span><i class="ti ti-file-description"></i></span>
        <span class="hide-menu">Data Rekam Medis</span>
      </a>
    </li> -->
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/jadwaldokter')?>" aria-expanded="false">
        <span><i class="ti ti-article"></i></span>
        <span class="hide-menu">Data Jadwal Dokter</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Petugas/unitpelayanan')?>" aria-expanded="false">
        <span><i class="ti ti-cards"></i></span>
        <span class="hide-menu">Data Poli</span>
      </a>
    </li>
    <li class="nav-small-cap">
      <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
      <span class="hide-menu">AUTH</span>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="<?=base_url('Login/logout')?>" aria-expanded="false">
        <span><i class="ti ti-login"></i></span>
        <span class="hide-menu">Log Out</span>
      </a>
    </li>
  </ul>
</nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
      <i class="ti ti-menu-2"></i>
    </a>
  </li>
            <li class="nav-item">
              <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a> -->
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item dropdown">
      <span class="ml-2">Hallo, Selamat Datang</span>
      <span class=""><?= $this->session->userdata('role'); ?> <?= $this->session->userdata('nama'); ?></span>
      <img src="<?=base_url('assets/')?>images/profile/user-1.jpg" alt="" width="35" height="35"  role="button" data-toggle="dropdown" class="rounded-circle ml-3">
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
        <div class="message-body">
        <a href="<?= base_url('Petugas/profile/'); ?>" class="d-flex align-items-center gap-2 dropdown-item">
        <i class="ti ti-user fs-6"></i>
            <p class="mb-0 fs-3">My Profile</p>
          </a>
          <a href="<?=base_url('Login/logout')?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
        </div>
      </div>
    </li>
            </ul>
          </div>
        </nav>
      </header>
      <script>
  document.getElementById('headerCollapse').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebarNav');
    if (sidebar.style.display === 'none' || sidebar.style.display === '') {
      sidebar.style.display = 'block';
    } else {
      sidebar.style.display = 'none';
    }
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.has-arrow').on('click', function() {
                var $this = $(this);
                var $submenu = $this.next('.collapse');

                if ($submenu.hasClass('show')) {
                    $submenu.removeClass('show').slideUp();
                    $this.attr('aria-expanded', 'false');
                } else {
                    $submenu.addClass('show').slideDown();
                    $this.attr('aria-expanded', 'true');
                }
            });
        });
    </script>
     