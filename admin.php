<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      background-color: #dbe9ff;
      color: var(--text-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding-top: 80px;
    }

    .login-box {
      background: white;
      border-radius: 12px;
      padding: 30px 40px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 320px;
    }

    .login-box i.bi {
      font-size: 45px;
      color: #f2a543;
      margin-bottom: 15px;
    }

    .login-box h4 {
      margin-bottom: 20px;
      font-weight: bold;
    }

    .form-control {
      background-color: #fff9d6;
      border: none;
      border-radius: 6px;
      margin-bottom: 15px;
    }

    .btn-login {
      background-color: #f2a543;
      border: none;
      color: white;
      width: 100%;
    }

    .btn-login:hover {
      background-color: #e2932d;
    }

    .forgot {
      display: block;
      margin-top: 10px;
      font-size: 0.9rem;
      color: #888;
      text-decoration: none;
    }

    .forgot:hover {
      text-decoration: underline;
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
      padding: 6px 18px;
    }

    .navbar .btn:hover {
      background-color: var(--primary-blue);
      color: #fff;
      transform: scale(1.05);
    }

    @media (max-width: 991.98px) {
      .navbar-nav .btn {
        width: 100%;
        text-align: left;
        padding-left: 16px;
      }
    }
  </style>
</head>
<body>

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
          <a class="btn" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="btn" href="formulir_daftar.php">Daftar</a>
        </li>
        <li class="nav-item">
          <a class="btn" href="#admin">Admin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Login Box -->
<div class="login-box">
  <i class="bi bi-person-lock"></i>
  <h4>Login Admin</h4>

  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger" role="alert">
      <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
  <?php endif; ?>

  <form action="proses_login_admin.php" method="post">
    <input type="text" name="username" placeholder="Username" class="form-control" required />
    <input type="password" name="password" placeholder="Password" class="form-control" required />
    <button type="submit" class="btn btn-login mt-2">Login</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
