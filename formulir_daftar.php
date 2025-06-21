<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PPDB TK RA KHAIRUL UMMAH - Formulir Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #f0f8ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #33475b;
      padding-top: 80px;
    }
    .navbar {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 1000;
      background: #e6f0ff;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 0.5rem 1rem;
      border-bottom: 2px solid #b0d4f1;
    }
    .navbar .btn {
      font-size: 1rem;
      padding: 8px 16px;
      border-radius: 30px;
      transition: all 0.3s ease;
      border: 2px solid #7a9eff;
      color: #33475b;
      background: transparent;
    }
    .navbar .btn:hover {
      background-color: #7a9eff;
      color: #fff;
      transform: scale(1.05);
      box-shadow: 0 4px 8px rgba(135, 206, 250, 0.5);
      border-color:  #7a9eff;
    }
    .alur-container {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      background: #ffffff;
      padding: 3rem;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(70, 130, 180, 0.1);
      flex-wrap: wrap;
      margin-bottom: 2rem;
      max-width: 900px;
      margin-left: auto;
      margin-right: auto;
    }
    .alur-img {
      max-width: 180px;
      width: 100%;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(70, 130, 180, 0.15);
      flex-shrink: 0;
    }
    .alur-list {
      flex: 1;
      min-width: 250px;
    }
    .alur-list h5 {
      color: #4682b4;
      font-weight: 700;
      margin-bottom: 1rem;
      text-align: center;
      letter-spacing: 1.2px;
    }
    .alur-list ul {
      padding-left: 1.2rem;
      list-style-type: decimal;
      color: #33475b;
      font-size: 0.9rem;
      line-height: 1.5;
    }
    .alur-list ul li {
      margin-bottom: 0.7rem;
    }
    #formulir_daftar {
      background: #ffffff;
      padding: 3rem;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(135, 206, 250, 0.3);
      max-width: 900px;
      margin: 0 auto 50px;
    }
    #formulir_daftar h3 {
      color: #4682b4;
      margin-bottom: 2rem;
      text-align: center;
      font-weight: 700;
      letter-spacing: 1.2px;
      text-shadow: 1px 1px 3px rgba(135, 206, 250, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
    }
    #formulir_daftar h3 svg {
      width: 30px;
      height: 30px;
      fill: #4682b4;
      filter: drop-shadow(0 0 2px #87cefaaa);
    }
    #formulir_daftar .form-label {
      font-weight: 600;
      color: #33475b;
    }
    #formulir_daftar .form-control,
    #formulir_daftar .form-select {
      border-radius: 12px;
      box-shadow: inset 0 2px 8px rgba(122, 158, 255, 0.1);
      border: 1.5px solid #b0d4f1;
      font-size: 1rem;
      color: #33475b;
      background-color: #f8fbff;
    }
    #formulir_daftar .form-control:focus,
    #formulir_daftar .form-select:focus {
      border-color: #87cefa;
      box-shadow: 0 0 12px #87cefa99;
      outline: none;
      background-color: #fff;
      color: #222;
    }
    #formulir_daftar button {
      background-color: #4682b4;
      border: none;
      width: 100%;
      font-weight: 700;
      padding: 1rem;
      border-radius: 50px;
      font-size: 1.15rem;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 6px 16px rgba(70, 130, 180, 0.5);
      margin-top: 1.5rem;
      color: white;
      letter-spacing: 1.1px;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }
    #formulir_daftar button:hover {
      background-color: #37648d;
      box-shadow: 0 8px 24px rgba(70, 130, 180, 0.6);
    }
    @media (max-width: 768px) {
      .alur-container {
        flex-direction: column;
        align-items: center;
        padding: 2rem 1rem;
      }
      .alur-img {
        max-width: 100%;
        margin-bottom: 1rem;
      }
      #formulir_daftar {
        padding: 2rem 1rem;
      }
      .navbar .navbar-brand h6 {
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid px-3">
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
        <li class="nav-item"><a class="btn" href="index.php">Home</a></li>
        <li class="nav-item"><a class="btn" href="#daftar">Daftar</a></li>
        <li class="nav-item"><a class="btn" href="admin.php">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid px-3">
  <h2 class="text-center mb-4 text-primary">Pendaftaran PPDB TK RA KHAIRUL UMMAH</h2>
  <p class="text-center mb-5 text-muted">
    Silakan lengkapi data berikut untuk mendaftar sebagai calon peserta didik baru Tahun Ajaran 2025/2026.
  </p>

  <section class="alur-container">
    <img src="images/1212.jpg" alt="Alur Pendaftaran" class="alur-img" />
    <div class="alur-list">
      <h5>📋 ALUR PENDAFTARAN</h5>
      <ul>
       <li>Pengisian Formulir: Isi Data Lengkap Anak melalui Form Online.</li>
        <li>Unggah Dokumen: Upload Kartu Keluarga, Akte Kelahirin, Foto KTP Orang Tua, dan Pas Foto Anak</li>
        <li>Verifikasi: Submit Formulir Pendaftaran</li>
        <li>Pengumuman Final: Cek hasil seleksi via dashboard/email.</li>
        <li>Kunjungan Sekolah: Tur Kelas dan bermain dengan guru.</li>
        <li>Daftar Ulang: melakukan daftar ulang.</li>
      </ul>
    </div>
  </section>

  <section id="formulir_daftar">
    <h3>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path d="M48 6H16a4 4 0 0 0-4 4v44a4 4 0 0 0 4 4h32a4 4 0 0 0 4-4V10a4 4 0 0 0-4-4zM18 12h28v6H18v-6zm0 12h28v4H18v-4zm0 8h28v4H18v-4zm0 8h16v4H18v-4z"/></svg>
      Formulir Pendaftaran
    </h3>
    <form action="proses_daftar.php" method="post" enctype="multipart/form-data" novalidate>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="nama" class="form-label">Nama Lengkap Anak</label>
          <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan nama lengkap anak" />
        </div>
        <div class="col-md-6">
  <label for="nik_anak" class="form-label">NIK Anak</label>
  <input type="text" class="form-control" id="nik_anak" name="nik_anak" required />
</div>
<div class="col-md-6">
  <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
  <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" required />
</div>
<div class="col-md-6">
  <label for="anak_ke" class="form-label">Anak ke-</label>
  <input type="number" class="form-control" id="anak_ke" name="anak_ke" min="1" required />
</div>
        <div class="col-md-6">
  <label for="tempat_lahir_anak" class="form-label">Tempat Lahir anak</label>
  <input type="text" class="form-control" id="tempat_lahir_anak" name="tempat_lahir_anak" required />
</div>
        <div class="col-md-6">
          <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required />
        </div>
        <div class="col-md-6">
          <label class="form-label">Jenis Kelamin</label>
          <select class="form-select" name="jenis_kelamin" required>
            <option value="" selected disabled>Pilih jenis kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="no_hp_ayah" class="form-label">Nomor Telepon Ayah / WA</label>
          <input type="tel" class="form-control" id="no_hp_ayah" name="no_hp_ayah" required />
        </div>
        <div class="col-12">
          <label for="alamat" class="form-label">Alamat Lengkap</label>
          <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
        </div>
        <div class="col-md-6">
          <label for="nama_ayah" class="form-label">Nama Ayah</label>
          <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required />
        </div>
        <div class="col-md-6">
  <label for="tempat_lahir_ayah" class="form-label">Tempat Lahir Ayah</label>
  <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" required />
</div>
        <div class="col-md-6">
          <label for="nama_ibu" class="form-label">Nama Ibu</label>
          <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required />
        </div>
        <div class="col-md-6">
  <label for="tempat_lahir_ibu" class="form-label">Tempat Lahir Ibu</label>
  <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" required />
</div>
        <div class="col-md-6">
          <label for="foto_anak" class="form-label">Upload Foto Anak</label>
          <input type="file" class="form-control" id="foto_anak" name="foto_anak" accept=".jpg,.jpeg,.png" required />
        </div>
        <div class="col-md-6">
          <label for="foto_akte" class="form-label">Upload Akte Kelahiran</label>
          <input type="file" class="form-control" id="foto_akte" name="foto_akte" accept=".jpg,.jpeg,.png,.pdf" />
        </div>
        <div class="col-md-6">
          <label for="foto_kk" class="form-label">Upload Kartu Keluarga</label>
          <input type="file" class="form-control" id="foto_kk" name="foto_kk" accept=".jpg,.jpeg,.png,.pdf" />
        </div>
        <div class="col-md-6">
          <label for="foto_ktp_ayah" class="form-label">Upload foto ktp ayah </label>
          <input type="file" class="form-control" id="foto_ktp_ayah" name="foto_ktp_ayah" accept=".jpg,.jpeg,.png,.pdf" />
        </div>
        <div class="col-md-6">
          <label for="foto_ktp_ibu" class="form-label">Upload Ktp ibu</label>
          <input type="file" class="form-control" id="foto_ktp_ibu" name="foto_ktp_ibu" accept=".jpg,.jpeg,.png,.pdf" />
        </div>
        
      </div>
      <button type="submit">Kirim Pendaftaran</button>
    </form>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
