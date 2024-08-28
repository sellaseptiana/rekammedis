<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dokter</title>
  <link rel="shortcut icon" type="image/png" href="<?=base_url('assets')?>/images/logos/favicon.png" />
  <link rel="stylesheet" href="<?=base_url('assets/')?>css/styles.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Inisialisasi Pusher
    var pusher = new Pusher('54c239527fc7b5132a57', {
        cluster: 'ap1',
        encrypted: true
    });

    // Subscribe ke channel 'rekam-medis'
    var channel = pusher.subscribe('rekam-medis');

    // Tampilkan notifikasi saat menerima event 'kunjungan-event'
    channel.bind('kunjungan-event', function(data) {
        // Increment counter
        var count = parseInt($('#notificationCount').text());
        $('#notificationCount').text(count + 1);

        // Tambahkan notifikasi baru ke daftar
        var listItem = '<a href="#" class="list-group-item list-group-item-action">' + data.message + '</a>';
        $('#notificationList').prepend(listItem);
    });
</script>

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
          <a class="text-nowrap logo-img">
            <img src="<?=base_url('assets/')?>images/logos/logo_puskes.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=base_url('Dokter')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <!-- <span class="hide-menu">UI COMPONENTS</span> -->
              <li class="sidebar-item">
              <a class="sidebar-link" href="<?=base_url('Dokter/pasien')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Data Pasien</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=base_url('Dokter/rekammedisdokter')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Data Rekam Medis</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=base_url('Login/logout')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Log Out</span>
              </a>
            </li>
           
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
            <li class="nav-item dropdown">
  
    <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu" aria-labelledby="notificationLink">
    <h6 class="dropdown-header">Notifikasi</h6>
    <div id="notificationList" class="list-group">
        <!-- Daftar notifikasi akan ditambahkan secara dinamis oleh JavaScript -->
    </div>
</div>

<style>
  /* CSS untuk lonceng notifikasi */
  #notificationLink {
    position: relative;
    text-decoration: none; /* Menghapus garis bawah default pada lonceng */
    display: flex;
    align-items: center; /* Menyusun ikon dan angka notifikasi secara vertikal */
  }

  #notificationCount {
    position: absolute;
    top: 7px; /* Menyesuaikan posisi vertikal */
    right: 1px; /* Menyesuaikan posisi horizontal */
    background-color: red; /* Warna latar belakang angka notifikasi */
    color: white; /* Warna teks angka notifikasi */
    border-radius: 50%; /* Membuat bentuk lingkaran */
    width: 20px; /* Ukuran lebar */
    height: 20px; /* Ukuran tinggi */
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px; /* Ukuran teks */
    z-index: 1; /* Membuat lonceng ada di atas ikon */
  }

  /* CSS untuk daftar notifikasi */
  #notificationList {
    position: relative;
    top: 45px; /* Menyesuaikan posisi dari atas */
    right: 0px; /* Menyesuaikan posisi dari kanan */
    width: 300px; /* Menyesuaikan lebar daftar notifikasi */
    max-height: 300px; /* Menyesuaikan tinggi maksimum daftar notifikasi */
    overflow-y: auto; /* Menampilkan scrollbar jika konten melebihi tinggi maksimum */
    background-color: #fff; /* Warna latar belakang */
    border: 1px solid #ddd; /* Garis tepi */
    border-radius: 4px; /* Sudut melengkung */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan */
    display: none; /* Sembunyikan secara default */
    z-index: 1000; /* Z-index untuk menempatkan di atas konten lain */
  }

  .list-group-item {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd; /* Garis pembatas antara item */
    cursor: pointer; /* Kursor berubah menjadi pointer saat diarahkan */
  }

  .list-group-item:last-child {
    border-bottom: none; /* Hapus garis pembatas di item terakhir */
  }

  .list-group-item:hover {
    background-color: #f0f0f0; /* Warna latar belakang saat hover */
  }

  /* Tambahan CSS untuk tampilan lebih menarik */
  .list-group-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    transition: background-color 0.3s ease;
  }

  .list-group-item-action {
    color: #333;
    text-decoration: none;
  }

  .list-group-item-action:hover {
    color: #007bff;
  }

  .dropdown-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
    font-size: 1rem;
    font-weight: 500;
    padding: 10px 15px;
  }

  /* Custom CSS untuk menggeser elemen dropdown ke kanan */
  .custom-dropdown-menu {
    right: -150px; /* Menyesuaikan posisi dari kanan */
  }
</style>

</li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
  <ul class="navbar-nav">
              <a id="notificationLink" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-bell-ringing"></i>
                <div id="notificationCount" class="notification bg-primary rounded-circle">0</div>
              </a>
              <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu" aria-labelledby="notificationLink">
                <h6 class="dropdown-header">Notifikasi</h6>
                <div id="notificationList" class="list-group">
                  <!-- Daftar notifikasi akan ditambahkan secara dinamis oleh JavaScript -->
                </div>
              </div>
            </li>

    <li class="nav-item dropdown">
      <span class="ml-2">Hallo, Selamat Datang</span>
      <span class=""><?= $this->session->userdata('role'); ?> <?= $this->session->userdata('nama'); ?></span>
      <img src="<?=base_url('assets/')?>images/profile/user-1.jpg" alt="" width="35" height="35"  role="button" data-toggle="dropdown" class="rounded-circle ml-3">
      </a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
        <div class="message-body">
        <a href="<?= base_url('Dokter/profile/'); ?>" class="d-flex align-items-center gap-2 dropdown-item">
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
  function updateNotificationCount(count) {
    document.getElementById('notificationCount').innerText = count;
  }

  // Update jumlah notifikasi
  updateNotificationCount(<?php echo $notification_count; ?>);
</script>

      <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Contoh fungsi untuk menampilkan modal dengan pesan
    function showNotification(message) {
      // Update pesan notifikasi
      document.getElementById('notificationMessage').innerText = message;
      
      // Tampilkan modal
      $('#notificationModal').modal('show');
    }

    // Contoh penggunaan
    <?php if ($this->session->flashdata('message')): ?>
      showNotification("<?php echo $this->session->flashdata('message'); ?>");
    <?php endif; ?>
  });
</script>
