<?php
session_start();
if (!isset($_SESSION['id_siswa'])) {
    header('Location: ../index.php');
    exit;
}
require '../config.php';

$user_id = (int)$_SESSION['id_siswa'];

$query = "SELECT * FROM siswa WHERE id = $user_id";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
  $siswa = $result->fetch_assoc();
} else {
  $siswa = [
      'nama' => 'User',
      'upload_foto' => 'default.jpg',
      'jenis_kelamin' => '-',
      'tanggal_lahir' => '-',
      'alamat' => '-',
      'status' => 'Belum dikonfirmasi',
  ];
}
$foto_anak = !empty($siswa['foto_anak']) ? $siswa['foto_anak'] : 'default.jpg';
$foto_akta = !empty($siswa['foto_akte']) ? $siswa['foto_akte'] : null;
$foto_kk = !empty($siswa['foto_kk']) ? $siswa['foto_kk'] : null;
$foto_ktp_ayah = !empty($siswa['foto_ktp_ayah']) ? $siswa['foto_ktp_ayah'] : null;
$foto_ktp_ibu = !empty($siswa['foto_ktp_ibu']) ? $siswa['foto_ktp_ibu'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard User - TK RA Khairul Ummah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet" />
  
  <!-- Di dalam tag <style> -->
  <style>
body {
  font-family: 'Fredoka', cursive, sans-serif;
  background-color: #1976d2;
  margin: 0;
  color: #1b1b1b;
}

.sidebar {
  background: #bbdefb;
  min-height: 100vh;
  padding: 25px 20px;
  color: #0d47a1;
  border-right: 3px solid #0d47a1;
  position: sticky;
  top: 0;
  box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
}

.sidebar .menu-box,
.sidebar input.form-control,
.sidebar .submenu a {
  color: #0d47a1;
}

.profile-section {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 30px;
}

.profile-img {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #ffffff;
  box-shadow: 0 0 10px #ffffff;
  transition: transform 0.3s ease;
  cursor: pointer;
}

.profile-img:hover {
  transform: scale(1.1);
}

.profile-name {
  font-weight: 700;
  font-size: 1.35rem;
  color: #0d47a1;
}

input.form-control {
  border-radius: 25px;
  padding-left: 20px;
  border: 2px solid #0d47a1;
  background-color: #ffffff;
  box-shadow: 1px 1px 5px #cccccc;
  margin-bottom: 20px;
}

.sidebar a {
  text-decoration: none;
}


.menu-box {
  background-color: #e3f2fd;
  border-radius: 12px;
  padding: 10px 15px;
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 600;
  font-size: 0.95rem;
  cursor: pointer;
  border: 1px solid #90caf9;
  transition: all 0.3s ease;
}

.menu-box:hover {
  background-color: #0d47a1;
  color: #ffffff;
}

.menu-box:hover i {
  color: #ffffff;
}

.menu-box i {
  font-size: 1.4rem;
  color: #0d47a1;
}

.submenu {
  margin-left: 38px;
  margin-top: 8px;
  display: none;
  flex-direction: column;
}

.submenu.show {
  display: flex;
}

.submenu a {
  font-size: 0.95rem;
  margin-bottom: 8px;
  font-weight: 500;
  text-decoration: none;
  color: #0d47a1;
  background-color: #e3f2fd;
  padding: 8px 14px;
  border-radius: 10px;
  display: inline-block;
  border: 1px solid #bbdefb;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.submenu a:hover,
.submenu a.active {
  background-color: #0d47a1;
  color: #ffffff;
  font-weight: 600;
  transform: translateX(5px);
}

.logout-btn {
  background-color: #ffffff;
  border: 2px solid #0d47a1;
  border-radius: 30px;
  color: #0d47a1;
  font-weight: 600;
  padding: 14px;
  width: 100%;
  box-shadow: 0 4px 10px rgba(13, 71, 161, 0.1);
  transition: background-color 0.3s ease, color 0.3s ease;
}

.logout-btn:hover {
  background-color: #0d47a1;
  color: #ffffff;
}

.main-content {
  padding: 40px 50px;
  background-color: #ffffff;
  min-height: 100vh;
  border-radius: 0 25px 25px 0;
  box-shadow: -5px 0 20px rgba(0, 0, 0, 0.05);
  color: #1b1b1b;
}

.welcome-box {
  background-color: #e1f5fe;
  border: 2px solid #81d4fa;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 8px 20px rgba(129, 212, 250, 0.4);
}

.status-box {
  background-color: #ffffff;
  border: 2px solid #81d4fa;
  border-radius: 15px;
  padding: 20px;
  font-weight: 600;
  font-size: 1.1rem;
  display: flex;
  align-items: center;
  gap: 10px;
}

.status-box span {
  padding: 6px 18px;
  border-radius: 20px;
  background-color: #81d4fa;
  color: white;
  font-weight: 700;
  box-shadow: 0 2px 8px rgba(129, 212, 250, 0.5);
}

.rotated {
  transform: rotate(180deg);
  transition: transform 0.3s ease;
}

.overlay {
  display: none;
}

@media (max-width: 767.98px) {
  .sidebar {
    position: fixed;
    top: 0;
    left: -100%;
    width: 75%;
    z-index: 999;
    height: 100vh;
    transition: left 0.3s ease;
  }

  .sidebar.show {
    left: 0;
  }

    .card-header.soft-yellow {
  background-color:  #bbdefb;
}
  .overlay.show {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,0.4);
    width: 100%;
    height: 100%;
    z-index: 998;
  }

  .main-content {
    padding: 25px 20px;
    margin-top: 60px;
  }
}

.navbar {
  background-color: #64b5f6;
  color: white;
}
</style>
</head>
<body>

<nav class="navbar d-md-none">
  <div class="container-fluid d-flex align-items-center py-2">
    <button class="btn btn-light rounded-circle me-2 shadow-sm" type="button" id="toggleSidebar">
      <i class="bi bi-list" style="font-size: 1.3rem; color: #0d47a1;"></i>
    </button>
    <span class="navbar-brand mb-0 text-white fw-semibold">PROFIL</span>
  </div>
</nav>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar d-flex flex-column">
      <div>
        <div class="profile-section">
          <img src="uploads/<?php echo htmlspecialchars($foto_anak); ?>" alt="Foto Profil" class="profile-img" />
          <div class="profile-name"><?php echo htmlspecialchars($siswa['nama']); ?></div>
        </div>

        <input type="text" class="form-control" placeholder="Cari menu..." />

        <a href="dashboard.php" class="menu-box">
        <i class="bi bi-speedometer2"></i>
          <span>Dashboard</span>
        </a>

        <div class="menu-box collapsible" id="dataSiswaToggle" style="user-select:none;">
          <i class="bi bi-people-fill"></i>
          <span>Data Siswa</span>
          <i class="bi bi-caret-down-fill ms-auto"></i>
        </div>
        <div class="submenu" id="dataSiswaMenu">
          <a href="profil.php">Profil</a>
          <a href="data_pembayaran.php">Data Pembayaran</a>
        </div>
      </div>

      <form action="logout.php" method="POST" class="mt-auto">
        <button type="submit" class="logout-btn mt-4">Logout</button>
      </form>
    </div>

    <!-- Main content -->
    <div class="col-md-9 main-content p-4">
      <div class="card shadow-sm mb-4">
       <div class="card-header soft-yellow">
          <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Profil Siswa</h4>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <p class="mb-1"><i class="bi bi-person-fill me-2"></i><strong>Nama Lengkap Anak:</strong><br> <?php echo htmlspecialchars($siswa['nama'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><strong>Nama Panggilan:</strong><br> <?php echo htmlspecialchars($siswa['nama_panggilan'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-gender-ambiguous me-2"></i><strong>Jenis Kelamin:</strong><br> <?php echo htmlspecialchars($siswa['jenis_kelamin'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><strong>Tempat Lahir Anak:</strong><br> <?php echo htmlspecialchars($siswa['tempat_lahir_anak'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-calendar-event me-2"></i><strong>Tanggal Lahir:</strong><br> <?php echo htmlspecialchars($siswa['tanggal_lahir'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><strong>Alamat:</strong><br> <?php echo htmlspecialchars($siswa['alamat'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><strong>NIK Anak:</strong><br> <?php echo htmlspecialchars($siswa['nik_anak'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i><strong>Anak Ke:</strong><br> <?php echo htmlspecialchars($siswa['anak_ke'] ?? '-'); ?></p>
            
            </div>
            <div class="col-md-6">
              <p class="mb-1"><i class="bi bi-person-badge-fill me-2"></i><strong>Nama Ayah:</strong><br> <?php echo htmlspecialchars($siswa['nama_ayah'] ?? '-'); ?></p>
               <p class="mb-1"><i class="bi bi-person-badge-fill me-2"></i><strong>Tempat Lahir Ayah:</strong><br> <?php echo htmlspecialchars($siswa['tempat_lahir_ayah'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-person-badge me-2"></i><strong>Nama Ibu:</strong><br> <?php echo htmlspecialchars($siswa['nama_ibu'] ?? '-'); ?></p>
               <p class="mb-1"><i class="bi bi-person-badge-fill me-2"></i><strong>Tempat Lahir Ibu:</strong><br> <?php echo htmlspecialchars($siswa['tempat_lahir_ibu'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i><strong>Nomor HP Ayah / WA:</strong><br> <?php echo htmlspecialchars($siswa['no_hp_ayah'] ?? '-'); ?></p>
              <p class="mb-1"><i class="bi bi-info-circle-fill me-2"></i><strong>Status:</strong><br>
                <?php
                  $status = htmlspecialchars($siswa['status'] ?? 'Belum dikonfirmasi');
                  $badgeClass = $status === 'Dikonfirmasi' ? 'bg-success' : 'bg-warning text-dark';
                  echo "<span class='badge $badgeClass'>$status</span>";
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
<div class="card shadow-sm">
  <div class="card-header soft-yellow">
    <h4 class="mb-0"><i class="bi bi-images me-2"></i>Dokumen Upload</h4>
  </div>
  <div class="card-body d-flex flex-wrap gap-4 justify-content-center">
    <div>
      <p class="text-center fw-semibold mb-2">Foto Anak</p>
      <img src="uploads/<?php echo htmlspecialchars($foto_anak); ?>" alt="Foto Anak" style="max-width: 250px; max-height: 250px; object-fit: contain; border-radius: 15px; border: 3px solid #f9d56e;" />
    </div>

    <?php if ($foto_akta): ?>
    <div>
      <p class="text-center fw-semibold mb-2">Foto Akta Kelahiran</p>
      <img src="uploads/<?php echo htmlspecialchars($foto_akta); ?>" alt="Foto Akta" style="max-width: 250px; max-height: 250px; object-fit: contain; border-radius: 15px; border: 3px solid #f9d56e;" />
    </div>
    <?php endif; ?>

       <?php if ($foto_ktp_ayah): ?>
    <div>
      <p class="text-center fw-semibold mb-2">Foto KTP Ayah</p>
      <img src="uploads/<?php echo htmlspecialchars($foto_ktp_ayah); ?>" alt="Foto KTP Ayah" style="max-width: 250px; max-height: 250px; object-fit: contain; border-radius: 15px; border: 3px solid #f9d56e;" />
    </div>
    <?php endif; ?>

    <?php if ($foto_kk): ?>
    <div>
      <p class="text-center fw-semibold mb-2">Foto KTP Ibu</p>
      <img src="uploads/<?php echo htmlspecialchars($foto_ktp_ibu); ?>" alt="Foto KTP Ibu" style="max-width: 250px; max-height: 250px; object-fit: contain; border-radius: 15px; border: 3px solid #f9d56e;" />
    </div>
    <?php endif; ?>

    <?php if ($foto_kk): ?>
    <div>
      <p class="text-center fw-semibold mb-2">Foto Kartu Keluarga</p>
      <img src="uploads/<?php echo htmlspecialchars($foto_kk); ?>" alt="Foto KK" style="max-width: 250px; max-height: 250px; object-fit: contain; border-radius: 15px; border: 3px solid #f9d56e;" />
    </div>
    <?php endif; ?>

  </div>
</div>

<script>
  // Toggle submenu
  document.querySelectorAll('.collapsible').forEach(btn => {
    btn.addEventListener('click', () => {
      const submenu = btn.nextElementSibling;
      if (submenu) {
        submenu.classList.toggle('show');
        const icon = btn.querySelector('i.bi-caret-down-fill');
        if (icon) {
          icon.style.transform = submenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0deg)';
          icon.style.transition = 'transform 0.3s ease';
        }
      }
    });
  });

  // Simple search filter for menu-box links and submenu links
  const searchInput = document.querySelector('.sidebar input.form-control');
  searchInput.addEventListener('input', () => {
    const filter = searchInput.value.toLowerCase();
    document.querySelectorAll('.sidebar a.menu-box, .sidebar .submenu a').forEach(el => {
      if (el.textContent.toLowerCase().includes(filter)) {
        el.style.display = '';
      } else {
        el.style.display = 'none';
      }
    });
  });

  // Toggle sidebar on mobile
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.querySelector('.sidebar');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });

  // Close sidebar if clicked outside (on mobile only)
  document.addEventListener('click', function(event) {
    const isClickInsideSidebar = sidebar.contains(event.target);
    const isClickToggleBtn = toggleBtn.contains(event.target);

    if (!isClickInsideSidebar && !isClickToggleBtn && sidebar.classList.contains('show')) {
      sidebar.classList.remove('show');
    }
  });
</script>


</body>
</html>
