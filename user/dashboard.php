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
    $_SESSION['user_status'] = $siswa['status'] ?? 'Belum dikonfirmasi';
} else {
    $siswa = [
        'nama' => 'User',
        'foto_anak' => 'default.jpg',
        'status' => 'Belum dikonfirmasi',
    ];
    $_SESSION['user_status'] = $siswa['status'];
}

$foto_anak = 'default.jpg';
$foto_path = __DIR__ . '/uploads/' . $siswa['foto_anak'];

if (!empty($siswa['foto_anak']) && file_exists($foto_path)) {
    $foto_anak = $siswa['foto_anak'];
}

$currentPage = basename($_SERVER['PHP_SELF']);
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
    <span class="navbar-brand mb-0 text-white fw-semibold">Dashboard</span>
  </div>
</nav>

<div class="overlay" id="sidebarOverlay"></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 sidebar d-flex flex-column" id="sidebar">
      <div>
        <div class="profile-section">
          <img src="uploads/<?php echo htmlspecialchars($foto_anak); ?>" alt="Foto Profil" class="profile-img" />
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

    <div class="col-md-9 main-content">
      <div class="welcome-box">
        <h4>🎉 Selamat datang di <strong style="color: #0d47a1;">TK RA Khairul Ummah</strong>!</h4>
        <p>Terima kasih telah mendaftar. Silakan tunggu proses verifikasi dari admin.</p>
      </div>

      <div class="status-box mt-4">
        <strong>Status kamu:</strong>
        <span><?php echo htmlspecialchars($_SESSION['user_status']); ?></span>
      </div>
    </div>
  </div>
</div>

<script>
  const toggleBtn = document.getElementById('dataSiswaToggle');
  const submenu = document.getElementById('dataSiswaMenu');
  const arrowIcon = toggleBtn.querySelector('.bi-caret-down-fill');

  toggleBtn.addEventListener('click', () => {
    submenu.classList.toggle('show');
    arrowIcon.classList.toggle('rotated');
  });

  const sidebar = document.getElementById('sidebar');
  const toggleSidebarBtn = document.getElementById('toggleSidebar');
  const overlay = document.getElementById('sidebarOverlay');

  toggleSidebarBtn.addEventListener('click', () => {
    sidebar.classList.toggle('show');
    overlay.classList.toggle('show');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.remove('show');
    overlay.classList.remove('show');
  });
</script>

</body>
</html>