<?php
session_start();
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../admin.php');
    exit;
}

include '../config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "ID tidak valid.";
    exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id");

if (!$query || mysqli_num_rows($query) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    .card-header {
      background-color: #4f8bc9;
      color: white;
      border-radius: 12px 12px 0 0;
    }
    .img-preview {
      max-width: 120px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .table th {
      background-color: #e9f0fa;
      width: 30%;
    }
    .badge-custom {
      background-color: #6c757d;
      color: white;
      font-size: 0.9em;
      padding: 0.4em 0.6em;
      border-radius: 0.5rem;
    }
  </style>
</head>
<body class="p-4">

<div class="container">
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0">📄 Detail Siswa: <?= htmlspecialchars($data['nama']) ?></h5>
    </div>
    <div class="card-body">
      <table class="table table-bordered align-middle">
        <tr><th>Nama</th><td><?= htmlspecialchars($data['nama']) ?></td></tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>
            <span class="badge-custom" style="background-color: <?= $data['jenis_kelamin'] === 'Laki-laki' ? '#4ea1d3' : '#dc8aa2' ?>;">
              <?= htmlspecialchars($data['jenis_kelamin']) ?>
            </span>
          </td>
        </tr>
        <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($data['tanggal_lahir']) ?></td></tr>
        <tr><th>Alamat</th><td><?= htmlspecialchars($data['alamat']) ?></td></tr>
        <tr><th>Nama Panggilan</th><td><?= htmlspecialchars($data['nama_panggilan']) ?></td></tr>
<tr><th>NIK Anak</th><td><?= htmlspecialchars($data['nik_anak']) ?></td></tr>
<tr><th>Tempat Lahir Anak</th><td><?= htmlspecialchars($data['tempat_lahir_anak']) ?></td></tr>
<tr><th>Anak ke</th><td><?= htmlspecialchars($data['anak_ke']) ?></td></tr>


<tr><th>Tempat Lahir Ayah</th><td><?= htmlspecialchars($data['tempat_lahir_ayah']) ?></td></tr>
<tr><th>Tempat Lahir Ibu</th><td><?= htmlspecialchars($data['tempat_lahir_ibu']) ?></td></tr>
        <tr><th>Nama Ayah</th><td><?= htmlspecialchars($data['nama_ayah']) ?></td></tr>
        <tr><th>Nama Ibu</th><td><?= htmlspecialchars($data['nama_ibu']) ?></td></tr>
        <tr><th>No HP Ayah</th><td><span class="badge-custom"><?= htmlspecialchars($data['no_hp_ayah']) ?></span></td></tr>
        <tr>
          <th>Status</th>
          <td>
            <span class="badge-custom" style="background-color: <?= $data['status'] === 'Diterima' ? '#198754' : '#adb5bd' ?>;">
              <?= htmlspecialchars($data['status']) ?>
            </span>
          </td>
        </tr>

        <!-- Foto Anak -->
        <tr>
          <th>Foto Anak</th>
          <td>
            <?php if (!empty($data['foto_anak'])): ?>
              <img src="../user/uploads/<?= htmlspecialchars($data['foto_anak']) ?>" class="img-preview"><br>
              <a href="../user/uploads/<?= htmlspecialchars($data['foto_anak']) ?>" download class="btn btn-sm btn-primary mt-2">⬇ Unduh Foto Anak</a>
            <?php else: ?>
              <span class="text-muted">Tidak ada</span>
            <?php endif; ?>
          </td>
        </tr>

        <!-- Foto KK -->
        <tr>
          <th>Foto KK</th>
          <td>
            <?php if (!empty($data['foto_kk'])): ?>
              <img src="../user/uploads/<?= htmlspecialchars($data['foto_kk']) ?>" class="img-preview"><br>
              <a href="../user/uploads/<?= htmlspecialchars($data['foto_kk']) ?>" download class="btn btn-sm btn-primary mt-2">⬇ Unduh Foto KK</a>
            <?php else: ?>
              <span class="text-muted">Tidak ada</span>
            <?php endif; ?>
          </td>
        </tr>

        <!-- Foto Akte -->
        <tr>
          <th>Foto Akte</th>
          <td>
            <?php if (!empty($data['foto_akte'])): ?>
              <img src="../user/uploads/<?= htmlspecialchars($data['foto_akte']) ?>" class="img-preview"><br>
              <a href="../user/uploads/<?= htmlspecialchars($data['foto_akte']) ?>" download class="btn btn-sm btn-primary mt-2">⬇ Unduh Foto Akte</a>
            <?php else: ?>
              <span class="text-muted">Tidak ada</span>
            <?php endif; ?>
          </td>

           <!-- Foto ktp ayah -->
        </tr>
        <th>KTP Ayah</th>
  <td>
    <?php if (!empty($data['foto_ktp_ayah'])): ?>
      <img src="../user/uploads/<?= htmlspecialchars($data['foto_ktp_ayah']) ?>" class="img-preview"><br>
      <a href="../user/uploads/<?= htmlspecialchars($data['foto_ktp_ayah']) ?>" download class="btn btn-sm btn-primary mt-2">⬇ Unduh KTP Ayah</a>
    <?php else: ?>
      <span class="text-muted">Tidak ada</span>
    <?php endif; ?>
  </td>

   <!-- Foto ktp ibu -->
<tr>
  <th>KTP Ibu</th>
  <td>
    <?php if (!empty($data['foto_ktp_ibu'])): ?>
      <img src="../user/uploads/<?= htmlspecialchars($data['foto_ktp_ibu']) ?>" class="img-preview"><br>
      <a href="../user/uploads/<?= htmlspecialchars($data['foto_ktp_ibu']) ?>" download class="btn btn-sm btn-primary mt-2">⬇ Unduh KTP Ibu</a>
    <?php else: ?>
      <span class="text-muted">Tidak ada</span>
    <?php endif; ?>
  </td>
</tr>
      </table>

      <a href="data_pendaftaran.php" class="btn btn-outline-secondary mt-3">← Kembali</a>
    </div>
  </div>
</div>

</body>
</html>