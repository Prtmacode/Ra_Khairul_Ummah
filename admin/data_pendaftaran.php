<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../admin.php');
    exit;
}

include '../config.php';

// Proses update status jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $id = intval($_POST['id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $allowed_status = ['Menunggu', 'Sudah Di Konfirmasi', 'Ditolak'];
    if (in_array($status, $allowed_status)) {
        $update = mysqli_query($conn, "UPDATE siswa SET status = '$status' WHERE id = $id");
        if ($update) {
            header("Location: data_pendaftaran.php");
            exit;
        } else {
            echo "<script>alert('Gagal mengupdate status');</script>";
        }
    }
}

// Tambahkan query untuk ambil data siswa
$query = mysqli_query($conn, "SELECT * FROM siswa");

// Proses delete data
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Step 1: Delete the related data from the 'pembayaran' table
    $delete_pembayaran_query = "DELETE FROM pembayaran WHERE siswa_id = ?";
    $stmt = $conn->prepare($delete_pembayaran_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Step 2: Now delete the siswa record
    $delete_query = "DELETE FROM siswa WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href = 'data_pendaftaran.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus data'); window.location.href = 'data_pendaftaran.php';</script>";
    }

    $stmt->close();
}

// Ambil data siswa
$query = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Data Pendaftaran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Fredoka', sans-serif;
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

    h2 {
      font-size: 26px;
      font-weight: 600;
      color: #003a75;
      margin-bottom: 30px;
    }

    .btn-download {
      margin-top: 5px;
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

    img {
      max-height: 80px;
      cursor: pointer;
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

    /* Modal Gambar */
    .modal {
      display: none;
      position: fixed;
      z-index: 2000;
      padding-top: 60px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      max-width: 90%;
      max-height: 90%;
      border-radius: 8px;
    }

    .close {
      position: absolute;
      top: 20px;
      right: 35px;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
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

<!-- Sidebar Desktop -->
<div class="sidebar d-none d-lg-block">
  <?php include '../includes/sidebar_admin.php'; ?>
</div>

<!-- Sidebar Mobile (Offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
  <div class="offcanvas-header bg-primary text-white">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <?php include '../includes/sidebar_admin.php'; ?>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-user-check me-2"></i>Data Pendaftaran</h2>
  </div>

  <div class="card shadow rounded-4 p-3 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-info sticky-top">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>JK</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Foto Anak</th>
              <th>Foto KK</th>
              <th>Foto Akte</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; while($row = mysqli_fetch_assoc($query)): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['nama']) ?></td>
              <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
              <td><?= htmlspecialchars($row['tanggal_lahir']) ?></td>
              <td style="text-align:left;"><?= htmlspecialchars($row['alamat']) ?></td>
              <td>
                <?php if (!empty($row['foto_anak'])): ?>
                  <img src="../user/uploads/<?= htmlspecialchars($row['foto_anak']) ?>" onclick="openModal(this.src)">
                  <a href="../user/uploads/<?= htmlspecialchars($row['foto_anak']) ?>" download class="btn btn-sm btn-outline-primary btn-download">
                    <i class="fas fa-download"></i> Unduh
                  </a>
                <?php else: ?> - <?php endif; ?>
              </td>
              <td>
                <?php if (!empty($row['foto_kk'])): ?>
                  <img src="../user/uploads/<?= htmlspecialchars($row['foto_kk']) ?>" onclick="openModal(this.src)">
                  <a href="../user/uploads/<?= htmlspecialchars($row['foto_kk']) ?>" download class="btn btn-sm btn-outline-primary btn-download">
                    <i class="fas fa-download"></i> Unduh
                  </a>
                <?php else: ?> - <?php endif; ?>
              </td>
              <td>
                <?php if (!empty($row['foto_akte'])): ?>
                  <img src="../user/uploads/<?= htmlspecialchars($row['foto_akte']) ?>" onclick="openModal(this.src)">
                  <a href="../user/uploads/<?= htmlspecialchars($row['foto_akte']) ?>" download class="btn btn-sm btn-outline-primary btn-download">
                    <i class="fas fa-download"></i> Unduh
                  </a>
                <?php else: ?> - <?php endif; ?>
              </td>
              <td>
                <span class="badge bg-warning text-dark"><?= htmlspecialchars($row['status'] ?? 'Menunggu') ?></span>
              </td>
              <td>
                <form method="POST" action="data_pendaftaran.php" class="d-flex flex-column align-items-center gap-1">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <select name="status" class="form-select form-select-sm status-select">
                    <option value="Menunggu" <?= strtolower($row['status'] ?? '') === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                    <option value="Sudah Di Konfirmasi" <?= strtolower($row['status'] ?? '') === 'sudah di konfirmasi' ? 'selected' : '' ?>>Sudah Di Konfirmasi</option>
                    <option value="Ditolak" <?= strtolower($row['status'] ?? '') === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                  </select>
                  <button type="submit" class="btn btn-sm btn-warning text-dark w-100">Update</button>
                </form>
                <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info text-white mt-1 w-100">
                  <i class="fas fa-eye"></i> Lihat
                </a>
                <!-- Delete Button -->
                <form method="POST" action="data_pendaftaran.php" class="mt-1">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <button type="submit" name="delete" class="btn btn-sm btn-danger w-100">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
            <?php endwhile; ?>
            <?php if(mysqli_num_rows($query) === 0): ?>
              <tr><td colspan="10" class="text-center">Belum ada data pendaftaran</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Gambar -->
<div id="imgModal" class="modal" onclick="closeModal(event)">
  <span class="close" onclick="closeModal(event)">&times;</span>
  <img class="modal-content" id="modalImg" />
</div>

<script>
  function openModal(src) {
    document.getElementById('imgModal').style.display = "flex";
    document.getElementById('modalImg').src = src;
  }

  function closeModal(e) {
    if (e.target.id === 'imgModal' || e.target.classList.contains('close')) {
      document.getElementById('imgModal').style.display = "none";
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
