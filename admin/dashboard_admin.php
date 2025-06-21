<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../admin.php');
    exit;
}
include '../config.php';

$siswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa"));
$pembayaran = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pembayaran"));
$pendaftar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE status = 'Menunggu'"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: rgb(209, 233, 250);
      margin: 0;
    }

    .sidebar {
      width: 280px;
      position: fixed;
      top: 0;
      bottom: 0;
      background-color: #003a75;
      padding-top: 60px;
      z-index: 1000;
    }

    .content {
      margin-left: 300px;
      padding: 40px;
      background-color: rgb(226, 240, 250);
      border-radius: 16px;
      margin-top: 30px;
      margin-right: 30px;
      max-width: calc(100% - 360px);
      min-height: 100vh;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    h4 {
      font-size: 24px;
      font-weight: 600;
      color: #003a75;
    }

    .info-box {
      background-color:rgb(255, 255, 255);
      border-left: 6px solid #1976d2;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      gap: 15px;
      transition: all 0.2s ease;
    }

    .info-box:hover {
      transform: translateY(-3px);
    }

    .info-box i {
      font-size: 30px;
      color: #1976d2;
    }

    .info-content h5 {
      font-size: 15px;
      margin-bottom: 4px;
      color: #003a75;
    }

    .info-content span {
      font-size: 22px;
      font-weight: bold;
      color: #003a75;
    }

    .section-title {
      font-size: 20px;
      font-weight: 600;
      color: #003a75;
      margin-bottom: 20px;
    }

    canvas {
      width: 100% !important;
      height: 300px !important;
    }

    @media (max-width: 992px) {
      .sidebar {
        display: none;
      }

      .content {
        margin: 20px;
        max-width: 100%;
        margin-left: 0;
      }

      h4 {
        font-size: 20px;
      }
    }

    @media (max-width: 576px) {
      .content {
        padding: 20px;
      }

      .info-box {
        flex-direction: column;
        align-items: flex-start;
      }

      .info-box i {
        font-size: 24px;
      }

      .info-content span {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>

<!-- Navbar Mobile -->
<nav class="navbar navbar-dark bg-primary d-lg-none">
  <div class="container-fluid">
    <button class="btn btn-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="#">Dashboard Admin</a>
  </div>
</nav>

<!-- Sidebar (Desktop) -->
<div class="sidebar d-none d-lg-block">
  <?php include '../includes/sidebar_admin.php'; ?>
</div>

<!-- Offcanvas Sidebar (Mobile) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
  <div class="offcanvas-header bg-primary text-white">
    <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <?php include '../includes/sidebar_admin.php'; ?>
  </div>
</div>

<!-- Content -->
<div class="content">
  <h4 class="mb-4">Selamat datang, <?= htmlspecialchars($_SESSION['admin_username']) ?>!</h4>

  <!-- Info Boxes -->
  <div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="info-box">
        <i class="fas fa-users"></i>
        <div class="info-content">
          <h5>Total Siswa</h5>
          <span><?= $siswa ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="info-box">
        <i class="fas fa-hourglass-half"></i>
        <div class="info-content">
          <h5>Menunggu Verifikasi</h5>
          <span><?= $pendaftar ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-4">
      <div class="info-box">
        <i class="fas fa-wallet"></i>
        <div class="info-content">
          <h5>Total Pembayaran</h5>
          <span><?= $pembayaran ?></span>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart Section -->
  <div class="bg-white p-4 rounded shadow-sm">
    <div class="section-title">Statistik Pendaftaran</div>
    <canvas id="chart"></canvas>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('chart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Siswa', 'Menunggu', 'Pembayaran'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= $siswa ?>, <?= $pendaftar ?>, <?= $pembayaran ?>],
        backgroundColor: ['#4fc3f7', '#ffeb3b', '#81c784'],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { stepSize: 1 }
        }
      }
    }
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
