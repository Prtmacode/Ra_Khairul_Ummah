<?php
session_start();

// Koneksi database
$host = 'localhost';
$db   = 'ppdb0';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Koneksi gagal: ' . $e->getMessage());
}

// Ambil data dari form login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Cek jika kosong
if (!$username || !$password) {
    echo "<script>alert('Username dan password wajib diisi.'); window.location.href='admin.php';</script>";
    exit;
}

// Cek data admin di database
$sql = "SELECT * FROM admin WHERE username = :username LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$admin = $stmt->fetch();

// Validasi login
if ($admin) {
    if ($password === $admin['password']) {
        // Jika password cocok, simpan session dan redirect
        session_regenerate_id(); // pengamanan session
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: admin/dashboard_admin.php');
        exit;
    } else {
        echo "<script>alert('Password admin salah.'); window.location.href='admin.php';</script>";
    }
} else {
    echo "<script>alert('Username admin tidak ditemukan.'); window.location.href='admin.php';</script>";
}
