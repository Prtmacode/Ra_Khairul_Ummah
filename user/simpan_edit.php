<?php
include '../config.php';

$id_siswa = $_POST['id_siswa'];
$nama = $_POST['nama'];
$nik = $_POST['nik'];

// Update data siswa
mysqli_query($conn, "UPDATE siswa SET nama='$nama', nik='$nik' WHERE id='$id_siswa'");

// Redirect ke profil
header("Location: profil.php");
?>
