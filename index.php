<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPDB TK RA Khairul Ummah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --soft-yellow: #fff9e6;
      --soft-blue: #dbe9ff;
      --primary-blue: #7a9eff;
      --text-color: #33475b;
    }

    body {
      background-color: var(--soft-yellow);
      color: var(--text-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 80px;
    }

    .navbar {
      background-color: var(--soft-blue);
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar .btn {
      border-radius: 30px;
      border: 2px solid var(--primary-blue);
      background-color: transparent;
      color: var(--text-color);
      transition: 0.3s;
    }

    .navbar .btn:hover {
      background-color: var(--primary-blue);
      color: #fff;
      transform: scale(1.05);
    }

    #home {
      background: url('bgnew.jpg') center/cover no-repeat;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-top: -80px;
      padding-top: 100px;
    }

    .hero-box {
      background-color: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 15px;
      max-width: 600px;
    }

    section {
      padding: 60px 0;
    }

    footer {
      background-color: var(--primary-blue);
      color: white;
      text-align: center;
      padding: 20px 0;
    }

    .carousel-img {
      height: 370px;
      object-fit: cover;
      border-radius: 12px;
    }

    #logout-notification {
      display: none;
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      background-color: #f9d56e;
      color: #3a1e00;
      padding: 15px 30px;
      font-weight: 700;
      border-radius: 0 0 10px 10px;
      z-index: 1050;
    }

  #kontak h5 {
    font-size: 1.15rem;
  }

  #kontak a:hover {
    color: #0d47a1 !important;
  }

  #kontak i {
    vertical-align: middle;
  }

  @media (max-width: 576px) {
    #kontak .rounded-4 {
      border-radius: 1rem !important;
    }
  }

  </style>
</head>
<body>
<div id="logout-notification">Pergi ke pasar membeli nangka, Goodbye, see you, sampai jumpa!</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid px-4">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <img src="images/logonavbar.jpg" alt="Logo" width="45" height="45" class="rounded-circle">
      <div>
        <h6 class="mb-0 fw-bold text-primary">PPDB TK RA KHAIRUL UMMAH</h6>
        <small class="text-muted">Tahun Ajaran 2025/2026</small>
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav d-flex flex-column flex-lg-row gap-2 align-items-start align-items-lg-center">
        <li class="nav-item">
          <a class="btn" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn" href="formulir_daftar.php">Daftar</a>
        </li>
        <li class="nav-item">
          <a class="btn" href="admin.php">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section id="home">
  <div class="hero-box">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4">
        <h2 class="fw-semibold">Selamat Datang di PPDB</h2>
        <h4 class="fw-bold text-primary">TK RA Khairul Ummah</h4>
        <p class="text-muted">Mari bergabung dalam membentuk generasi cerdas, berakhlak, dan cinta belajar.<br>Tahun Ajaran <strong>2025/2026</strong> telah dibuka.</p>
      </div>
      <div class="col-md-6">
        <form action="proses_login.php" method="POST" class="bg-light p-4 rounded-4 shadow">
          <h4 class="text-center text-primary fw-bold mb-3">Login PPDB</h4>
          <div class="mb-3">
            <input type="text" name="username" class="form-control rounded-pill" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control rounded-pill" placeholder="Tanggal Lahir (yyyymmdd)" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Visi Misi -->
<section id="visi-misi" class="py-5" style="background-color:rgb(245, 246, 248);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary display-5" style="font-family: 'Fredoka', sans-serif;">Visi & Misi</h2>
      <p class="text-muted fs-5">Komitmen kami dalam membentuk generasi Islami yang cerdas dan berkarakter.</p>
    </div>
    <div class="row g-4 align-items-stretch">
      <!-- Visi Card -->
      <div class="col-lg-6">
        <div class="bg-white rounded-4 shadow p-5 h-100 position-relative border-start border-5 border-warning">
          <div class="position-absolute top-0 start-0 translate-middle bg-warning text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
            <i class="bi bi-lightbulb-fill"></i>
          </div>
          <h4 class="fw-bold mb-3 mt-4 text-warning">Visi</h4>
          <p class="fs-5 text-secondary">
            “Menciptakan insan yang <strong>berilmu</strong>, <strong>beramal</strong>, dan <strong>bertaqwa</strong> kepada Allah SWT dengan akhlak mulia dan cinta ilmu.”
          </p>
        </div>
      </div>

      <!-- Misi Card -->
      <div class="col-lg-6">
        <div class="bg-white rounded-4 shadow p-5 h-100 position-relative border-start border-5 border-primary">
          <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 1.5rem;">
            <i class="bi bi-check-circle-fill"></i>
          </div>
          <h4 class="fw-bold mb-3 mt-4 text-primary">Misi</h4>
          <ul class="fs-5 text-secondary ps-3 mb-0">
            <li class="mb-2">Memberikan pengajaran dasar-dasar agama Islam.</li>
            <li class="mb-2">Membiasakan ibadah harian dengan praktik langsung.</li>
            <li class="mb-2">Menanamkan nilai-nilai sosial, nasionalisme, dan akhlakul karimah.</li>
            <li class="mb-2">Mempersiapkan peserta didik ke jenjang pendidikan berikutnya.</li>
            <li class="mb-2">Membangun karakter mandiri, percaya diri, dan peduli lingkungan.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sarana dan Prasarana -->
<section id="sarana-prasarana" class="py-5" style="background-color:rgb(245, 246, 248);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary display-5" style="font-family: 'Fredoka', sans-serif;">Sarana & Prasarana</h2>
      <p class="text-muted fs-5">Fasilitas yang mendukung tumbuh kembang dan kenyamanan anak-anak.</p>
    </div>
    <div class="row g-4 align-items-stretch">
      <!-- Sarana -->
      <div class="col-md-6">
        <div class="bg-white rounded-4 shadow p-4 h-100 border-start border-5 border-primary position-relative">
          <div class="position-absolute top-0 start-0 translate-middle bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; font-size: 1.4rem;">
            <i class="bi bi-building"></i>
          </div>
          <h4 class="fw-bold mb-3 mt-4 text-primary">Sarana</h4>
          <ul class="fs-5 text-secondary ps-3 mb-0">
            <li>Kelas</li>
            <li>Kantor Kepala RA</li>
            <li>Ruang Guru</li>
            <li>Ruang Tata Usaha (TU)</li>
            <li>Musholah</li>
            <li>Perpustakaan</li>
            <li>Ruang Bermain</li>
            <li>Toilet</li>
          </ul>
        </div>
      </div>

      <!-- Prasarana -->
      <div class="col-md-6">
        <div class="bg-white rounded-4 shadow p-4 h-100 border-start border-5 border-info position-relative">
          <div class="position-absolute top-0 start-0 translate-middle bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; font-size: 1.4rem;">
            <i class="bi bi-tree-fill"></i>
          </div>
          <h4 class="fw-bold mb-3 mt-4 text-info">Prasarana</h4>
          <ul class="fs-5 text-secondary ps-3 mb-0">
            <li>Papan Luncur</li>
            <li>Ayunan</li>
            <li>Mandi Bola</li>
            <li>Lempar Bola</li>
            <li>Lapangan Futsal Mini</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Galeri -->
<section id="galeri" class="py-5" style="background-color: #f9fbff; color: #1a237e;">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold" style="color: #1a237e;">Galeri Kegiatan TK RA Khairul Ummah</h2>
    <p class="text-center mb-5 text-muted fs-5">Lihat momen-momen seru selama kegiatan belajar dan acara sekolah.</p>

    <div class="row g-4 align-items-start">
      <!-- Kegiatan Kami -->
    <div class="col-lg-5">
      <h4 class="fw-bold mb-4" style="color: #f1c857;">🌟 Kegiatan Kami</h4>
      <div class="d-flex flex-column gap-3">
        <!-- Manasik Haji -->
        <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white border-start border-4" style="border-color: #f1c857;">
          <div class="me-3">
            <i class="bi bi-stars fs-3" style="color: #f1c857;"></i>
          </div>
          <div>
            <h6 class="fw-semibold mb-1 text-primary">Manasik Haji</h6>
            <p class="text-muted mb-0">Simulasi ibadah haji secara menyenangkan dan edukatif.</p>
          </div>
        </div>
        <!-- Kunjungan Damkar -->
        <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white border-start border-4" style="border-color: #f1c857;">
          <div class="me-3">
            <i class="bi bi-fire fs-3" style="color: #e53935;"></i>
          </div>
          <div>
            <h6 class="fw-semibold mb-1 text-primary">Kunjungan Damkar</h6>
            <p class="text-muted mb-0">Belajar tentang profesi pemadam kebakaran dan keselamatan.</p>
          </div>
        </div>
        <!-- Hari Guru -->
        <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white border-start border-4" style="border-color: #f1c857;">
          <div class="me-3">
            <i class="bi bi-heart-half fs-3" style="color: #e91e63;"></i>
          </div>
          <div>
            <h6 class="fw-semibold mb-1 text-primary">Hari Guru</h6>
            <p class="text-muted mb-0">Perayaan spesial untuk guru-guru tercinta.</p>
          </div>
        </div>
        <!-- Kegiatan Renang -->
        <div class="d-flex align-items-start p-3 rounded-4 shadow-sm bg-white border-start border-4" style="border-color: #f1c857;">
          <div class="me-3">
            <i class="bi bi-water fs-3 text-info"></i>
          </div>
          <div>
            <h6 class="fw-semibold mb-1 text-primary">Kegiatan Renang</h6>
            <p class="text-muted mb-0">Melatih keterampilan berenang dengan aman dan menyenangkan.</p>
          </div>
        </div>
      </div>
    </div>


      <!-- Carousel Galeri -->
      <div class="col-lg-7">
        <div id="galleryCarousel" class="carousel slide shadow rounded-4 overflow-hidden border border-3" style="border-color: #f1c857;" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/Renang.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Renang">
            </div>
            <div class="carousel-item">
              <img src="images/Manasik Haji.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Manasik Haji">
            </div>
            <div class="carousel-item">
              <img src="images/Kunjungan Damkar.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Damkar">
            </div>
            <div class="carousel-item">
              <img src="images/Kegiatan di Ancol.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Ancol">
            </div>
            <div class="carousel-item">
              <img src="images/Hari Guru.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Hari Guru">
            </div>
            <div class="carousel-item">
              <img src="images/Maulid Nabi.jpg" class="d-block w-100 rounded-4 img-fluid" alt="Maulid">
            </div>
          </div>

          <!-- Tombol Navigasi -->
          <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Kontak -->
<section id="kontak" class="py-5" style="background-color: #ecf2f9; color: #1a237e;">
  <div class="container">
    <h3 class="fw-bold text-center mb-5" style="color: #264b96; font-size: 2rem;">
  Kontak RA Khairul Ummah
</h3>


    <div class="row gy-4 align-items-start">
      <!-- Alamat Sekolah -->
      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm bg-white h-100 border-start border-5" style="border-color: rgb(241, 200, 87);">
          <h5 class="fw-semibold mb-3" style="color: rgb(241, 200, 87);">
            <i class="bi bi-geo-alt-fill me-2"></i>Alamat Sekolah
          </h5>
          <p class="mb-1 text-dark">Swadaya Parakan, RT 04/RW 08 No.17</p>
          <p class="mb-1 text-dark">Kelurahan Pondok Benda, Kec. Pamulang</p>
          <p class="mb-0 text-dark">Kota Tangerang Selatan, Banten, 15416</p>
        </div>
      </div>

      <!-- Informasi Kontak -->
      <div class="col-md-6">
        <div class="p-4 rounded-4 shadow-sm bg-white h-100 border-start border-5" style="border-color: rgb(241, 200, 87);">
          <h5 class="fw-semibold mb-3" style="color: rgb(241, 200, 87);">
            <i class="bi bi-info-circle-fill me-2"></i>Informasi Kontak
          </h5>
          <ul class="list-unstyled mb-3">
            <li class="mb-2">
              <i class="bi bi-person-fill me-2" style="color: rgb(241, 200, 87);"></i>
              <strong class="text-dark">Kepala RA:</strong> <span class="text-dark">Siti Aliyah</span>
            </li>
            <li class="mb-2">
              <i class="bi bi-telephone-fill me-2" style="color: rgb(241, 200, 87);"></i>
              <strong class="text-dark">Telepon:</strong>
              <a href="tel:081514544043" class="text-decoration-none text-dark">0815-1454-4043</a>
            </li>
            <li class="mb-2">
              <i class="bi bi-envelope-fill me-2" style="color: rgb(241, 200, 87);"></i>
              <strong class="text-dark">Email:</strong>
              <a href="mailto:info@tkkhairulummah.sch.id" class="text-decoration-none text-dark">info@tkkhairulummah.sch.id</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Peta Lokasi -->
    <div class="mt-5">
      <div class="p-4 rounded-4 shadow-sm bg-white border-start border-5" style="border-color: rgb(241, 200, 87);">
        <h5 class="fw-semibold mb-3" style="color: rgb(241, 200, 87);">
          <i class="bi bi-map-fill me-2"></i>Lokasi Sekolah
        </h5>
        <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.361720576878!2d106.70650666951674!3d-6.336113766690186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5cd36453acb%3A0x6cb170ccd2df21b!2sRA%20Khairul%20Ummah!5e0!3m2!1sen!2sid!4v1749901013280!5m2!1sen!2sid"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>


<footer>
  <div class="container">
    <p class="mb-0">&copy; 2025 TK RA Khairul Ummah. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $showLogoutNotification = isset($_GET['logout']) && $_GET['logout'] === 'success'; ?>
<script>
  <?php if ($showLogoutNotification): ?>
    document.getElementById('logout-notification').style.display = 'block';
    setTimeout(() => document.getElementById('logout-notification').style.display = 'none', 5000);
  <?php endif; ?>
</script>
</body>
</html>
