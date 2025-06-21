<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ppdb0";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$nama = trim($_POST['username']);
$password_input = trim($_POST['password']);

if (!preg_match('/^\d{8}$/', $password_input)) {
    echo "<script>alert('Format password salah! Masukkan tanggal lahir dalam format YYYYMMDD tanpa tanda pemisah.'); window.location.href='index.php';</script>";
    exit;
}

$tanggal_lahir = substr($password_input, 0, 4) . '-' . substr($password_input, 4, 2) . '-' . substr($password_input, 6, 2);

$d = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
if (!$d || $d->format('Y-m-d') !== $tanggal_lahir) {
    echo "<script>alert('Tanggal lahir tidak valid!'); window.location.href='index.php';</script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM siswa WHERE LOWER(nama) = LOWER(?) AND tanggal_lahir = ? LIMIT 1");
$stmt->bind_param("ss", $nama, $tanggal_lahir);
$stmt->execute();
$result = $stmt->get_result();

echo "DEBUG: Nama input = '$nama', Tanggal lahir input = '$tanggal_lahir'<br>";
echo "Rows found: " . $result->num_rows . "<br>";

if ($result->num_rows === 1) {
    $siswa = $result->fetch_assoc();
    session_regenerate_id(true);
    $_SESSION['nama'] = $siswa['nama'];
    $_SESSION['id_siswa'] = $siswa['id'];
    header("Location: user/dashboard.php");
    exit;
} else {
    echo "<script>alert('Nama atau Tanggal Lahir salah!'); window.location.href='index.php';</script>";
}

$stmt->close();
$conn->close();

?>
