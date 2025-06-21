<?php
session_start();
include 'config.php';

// Fungsi upload file
function upload_file($field_name, $target_dir = "user/uploads/") {
    if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
        $file_name = time() . "_" . basename($_FILES[$field_name]['name']);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_path);
        return $file_name;
    }
    return null;
}

// Proses upload
$foto_anak = upload_file('foto_anak');
$foto_akte = upload_file('foto_akte');
$foto_kk   = upload_file('foto_kk');
$foto_ktp_ayah  = upload_file('foto_ktp_ayah');
$foto_ktp_ibu   = upload_file('foto_ktp_ibu');

// Data dari form
$nama           = $_POST['nama'] ?? '';
$tanggal_lahir  = $_POST['tanggal_lahir'] ?? '';
$jenis_kelamin  = $_POST['jenis_kelamin'] ?? '';
$alamat         = $_POST['alamat'] ?? '';
$nama_ayah      = $_POST['nama_ayah'] ?? '';
$nama_ibu       = $_POST['nama_ibu'] ?? '';
$no_hp_ayah     = $_POST['no_hp_ayah'] ?? '';
$nik_anak        = $_POST['nik_anak'] ?? '';
$nama_panggilan     = $_POST['nama_panggilan'] ?? '';
$anak_ke         = $_POST['anak_ke'] ?? '';
$tempat_lahir_anak    = $_POST['tempat_lahir_anak'] ?? '';
$tempat_lahir_ayah = $_POST['tempat_lahir_ayah'] ?? '';
$tempat_lahir_ibu  = $_POST['tempat_lahir_ibu'] ?? '';

// Simpan ke database menggunakan prepared statement
$stmt = $conn->prepare("INSERT INTO siswa (
    nama, tanggal_lahir, jenis_kelamin, alamat, nama_ayah, nama_ibu, no_hp_ayah,
    nik_anak, nama_panggilan, anak_ke, tempat_lahir_anak,
    tempat_lahir_ayah, tempat_lahir_ibu,
    foto_anak, foto_akte, foto_kk, foto_ktp_ayah, foto_ktp_ibu
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");


if (!$stmt) {
    die("Query prepare error: " . $conn->error);
}

$stmt->bind_param("ssssssssssssssssss", $nama, $tanggal_lahir, $jenis_kelamin, $alamat, $nama_ayah, $nama_ibu, $no_hp_ayah,  $nik_anak, $nama_panggilan, $anak_ke, $tempat_lahir_anak,
    $tempat_lahir_ayah, $tempat_lahir_ibu, $foto_anak, $foto_akte, $foto_kk, $foto_ktp_ayah, $foto_ktp_ibu);

if ($stmt->execute()) {
    $_SESSION['user_id'] = $conn->insert_id;
    header("Location: index.php");
    exit;
} else {
    echo "<script>alert('Gagal menyimpan data: " . htmlspecialchars($stmt->error) . "'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
