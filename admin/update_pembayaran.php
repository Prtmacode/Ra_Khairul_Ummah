<?php
include '../config.php';
header('Content-Type: application/json');

// Ambil data JSON dari fetch
$data = json_decode(file_get_contents("php://input"), true);

// Validasi data
if (!isset($data['id']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
    exit;
}

$id = intval($data['id']);
$status = mysqli_real_escape_string($conn, $data['status']);

// Update status di database
$query = "UPDATE pembayaran SET status='$status' WHERE id=$id";
if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
}
?>
