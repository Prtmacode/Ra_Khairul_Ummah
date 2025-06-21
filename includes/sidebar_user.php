<?php
// Pastikan variabel $siswa tersedia, jika tidak buat default
if (!isset($siswa)) {
  $siswa = [
    'nama' => 'User',
    'foto_anak' => 'default.jpg'
  ];
}


// Ambil nama file foto anak
$foto_anak = 'default.jpg';
$foto_path = realpath(__DIR__ . '/../uploads/' . $siswa['foto_anak']);

// Cek apakah file foto anak ada
if (!empty($siswa['foto_anak']) && $foto_path && file_exists($foto_path)) {
  $foto_anak = $siswa['foto_anak'];
}

// Ambil halaman aktif
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar -->
<div class="col-md-3 sidebar d-flex flex-column" id="sidebar">
  <div>
 <div class="profile-section">
  <img src="/uploads/<?php echo htmlspecialchars($foto_anak); ?>" alt="Foto Profil" class="profile-img" />
  <div class="profile-name"><?php echo htmlspecialchars($siswa['nama']); ?></div>
</div>


    <input type="text" class="form-control" placeholder="Cari menu..." />

    <div class="menu-box">
      <i class="bi bi-speedometer2"></i>
      <span>Dashboard</span>
    </div>

    <div class="menu-box collapsible" id="dataSiswaToggle">
      <i class="bi bi-people-fill"></i>
      <span>Data Siswa</span>
      <i class="bi bi-caret-down-fill ms-auto <?php echo ($currentPage == 'data_pembayaran.php' || $currentPage == 'profil.php') ? 'rotated' : ''; ?>"></i>
    </div>
    <div class="submenu <?php echo ($currentPage == 'data_pembayaran.php' || $currentPage == 'profil.php') ? 'show' : ''; ?>" id="dataSiswaMenu">
      <a href="profil.php" class="<?php echo ($currentPage == 'profil.php') ? 'active' : ''; ?>">Profil</a>
      <a href="data_pembayaran.php" class="<?php echo ($currentPage == 'data_pembayaran.php') ? 'active' : ''; ?>">Data Pembayaran</a>
    </div>
  </div>

  <form action="logout.php" method="POST" class="mt-auto">
    <button type="submit" class="logout-btn mt-4">Logout</button>
  </form>
</div>
