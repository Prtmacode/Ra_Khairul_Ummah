<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../admin.php');
    exit;
}
include '../config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Pembayaran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: 'Fredoka', sans-serif;
      background-color: rgb(209, 233, 250);
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

    h2 {
      font-size: 26px;
      font-weight: 600;
      color: #003a75;
      margin-bottom: 30px;
    }

    .button {
      display: inline-block;
      margin-bottom: 20px;
      padding: 10px 20px;
      background-color: #0091ea;
      color: white;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s ease;
    }

    .button:hover {
      background-color: #0074c1;
    }

    table {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      width: 100%;
    }

    .table thead th {
      background-color: #b3e5fc;
      color: #003a75;
      font-weight: 600;
      text-align: center;
    }

    .table td {
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #eaf6ff;
    }

    .no-data {
      text-align: center;
      font-style: italic;
      color: #888;
      padding: 20px 0;
    }

    .form-select-sm {
      border: 1px solid #b3e5fc;
      background-color: #e3f2fd;
      color: #003a75;
    }

    .btn-success {
      background-color: #007bff;
      border: none;
    }

    .btn-success:hover {
      background-color: #0056b3;
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

      .button {
        width: 100%;
        text-align: center;
      }

      h2 {
        font-size: 20px;
      }
    }

    @media (max-width: 576px) {
      .content {
        padding: 20px;
      }

      .table th,
      .table td {
        white-space: nowrap;
      }

      .d-flex {
        flex-direction: column;
        align-items: flex-start;
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
    <a class="navbar-brand" href="#">Admin Panel</a>
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
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-money-check-alt me-2"></i>Data Pembayaran</h2>
  </div>

  <a href="form_pembayaran.php" class="button"><i class="fas fa-plus me-1"></i> Tambah Pembayaran Baru</a>

  <div class="card shadow-sm border-0">
    <div class="card-body p-4">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Kode Pembayaran</th>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($conn, "
              SELECT p.id, s.nama, p.kode_pembayaran, p.tanggal, p.jumlah, p.status 
              FROM pembayaran p
              JOIN siswa s ON p.siswa_id = s.id
              ORDER BY p.tanggal DESC
            ");
            $no = 1;

            if (mysqli_num_rows($query) > 0) {
              while ($row = mysqli_fetch_assoc($query)) {
                $badge = $row['status'] === 'Lunas' 
                  ? "<span class='badge bg-success'>Lunas</span>"
                  : "<span class='badge bg-warning text-dark'>Belum Bayar</span>";

                echo "<tr data-id='{$row['id']}'>
                  <td>{$no}</td>
                  <td>" . htmlspecialchars($row['nama']) . "</td>
                  <td>{$row['kode_pembayaran']}</td>
                  <td>{$row['tanggal']}</td>
                  <td>Rp " . number_format($row['jumlah'], 2, ',', '.') . "</td>
                  <td>
                    <select class='status-select form-select form-select-sm' data-id='{$row['id']}'>
                      <option value='Belum Bayar' " . ($row['status'] === 'Belum Bayar' ? 'selected' : '') . ">Belum Bayar</option>
                      <option value='Lunas' " . ($row['status'] === 'Lunas' ? 'selected' : '') . ">Lunas</option>
                    </select>
                    <div class='mt-1'>$badge</div>
                  </td>
                  <td><button class='konfirmasi-btn btn btn-success btn-sm'><i class='fas fa-check'></i> Konfirmasi</button></td>
                </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='7' class='no-data'>Belum ada data pembayaran.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.konfirmasi-btn').forEach(button => {
  button.addEventListener('click', () => {
    const row = button.closest('tr');
    const id = row.dataset.id;
    const status = row.querySelector('.status-select').value;

    fetch('update_pembayaran.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id, status })
    })
    .then(res => res.json())
    .then(res => {
      if (res.success) {
        alert('Status pembayaran berhasil dikonfirmasi.');
        location.reload();
      } else {
        alert('Gagal mengkonfirmasi pembayaran.');
      }
    })
    .catch(error => {
      alert('Terjadi kesalahan saat mengirim data.');
      console.error(error);
    });
  });
});
</script>
</body>
</html>
