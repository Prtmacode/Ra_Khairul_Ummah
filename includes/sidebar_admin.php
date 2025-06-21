<!-- Link Google Font & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  body {
    margin: 0;
    font-family: 'Fredoka', sans-serif;
    background: #fefefe;
  }

  #sidebar {
    width: 270px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #003a75;
    box-shadow: 2px 0 8px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-direction: column;
    padding: 24px 0;
    z-index: 1000;
  }

  .logo {
    text-align: center;
    margin-bottom: 24px;
  }

  .logo img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 3px solid #ffffff;
    object-fit: cover;
  }

  .logo h2 {
    margin-top: 12px;
    font-size: 22px;
    color: #ffffff;
    font-weight: 600;
  }

  #sidebar input[type="text"] {
    margin: 0 24px 20px;
    padding: 10px 14px;
    border-radius: 20px;
    border: none;
    font-size: 15px;
    background-color: #e0f2ff;
    color: #003a75;
    box-shadow: inset 1px 1px 4px rgba(0, 0, 0, 0.05);
    width: calc(100% - 48px);
  }

  #sidebar input[type="text"]:focus {
    outline: none;
    background-color: #f0faff;
  }

  ul.menu {
    list-style: none;
    padding: 0;
    margin: 0;
    flex-grow: 1;
  }

  ul.menu li {
    border-bottom: 1px solid #5a9bdc;
  }

  ul.menu li a,
  ul.menu li summary {
    display: flex;
    align-items: center;
    padding: 14px 28px;
    font-weight: 500;
    color: #e0f2ff;
    text-decoration: none;
    font-size: 15px;
    transition: all 0.3s ease;
  }

  ul.menu li a i,
  ul.menu li summary i {
    margin-right: 12px;
    color: #aee1fc;
  }

  ul.menu li a:hover,
  ul.menu li summary:hover {
    background-color: #dff6ff;
    color: #003a75;
  }

  ul.menu ul {
    padding-left: 40px;
    background-color: #eaf9ff;
  }

  ul.menu ul li a {
    font-weight: 400;
    font-size: 14px;
    padding: 10px 24px;
    color: #003a75;
  }

  ul.menu ul li a:hover {
    background-color: #d0f2ff;
    color: #002a5c;
  }

  details summary {
    list-style: none;
    cursor: pointer;
  }

  details summary::-webkit-details-marker {
    display: none;
  }

  details summary::after {
    content: "\f107";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    float: right;
    transition: transform 0.3s ease;
  }

  details[open] summary::after {
    transform: rotate(180deg);
  }

  .logout {
    margin: 0 24px;
    padding: 12px;
    background-color: #b3e5fc;
    color: #003a75;
    font-weight: 600;
    text-align: center;
    border-radius: 8px;
    text-decoration: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
  }

  .logout:hover {
    background: linear-gradient(to right, #b3e5fc, #d0f2ff);
    color: #002a5c;
    border-color: #aee1fc;
  }

  .main {
    margin-left: 270px;
    padding: 20px;
    transition: margin-left 0.3s ease;
  }
</style>

<!-- Sidebar Layout -->
<div id="sidebar">
  <div class="logo">
    <img src="../img/logo1.jpeg" alt="Logo" />
    <h2>Admin</h2>
  </div>

  <input type="text" placeholder="Cari menu..." />

  <ul class="menu">
    <li><a href="dashboard_admin.php"><i class="fas fa-home"></i>Dashboard</a></li>
    <li>
      <details open>
        <summary><i class="fas fa-user-graduate"></i>Data Siswa</summary>
        <ul>
          <li><a href="data_pendaftaran.php"><i class="fas fa-file-alt"></i> Pendaftaran</a></li>
          <li><a href="data_pembayaran.php"><i class="fas fa-credit-card"></i> Pembayaran</a></li>
        </ul>
      </details>
    </li>
  </ul>

  <a href="../index.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
