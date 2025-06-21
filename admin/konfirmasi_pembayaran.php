<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Update status pembayaran jadi 'Sudah Di Konfirmasi'
    $query = mysqli_query($conn, "UPDATE pembayaran SET status = 'Sudah Di Konfirmasi' WHERE id = $id");

    if ($query) {
        header('Location: data_pembayaran.php?status=success');
    } else {
        echo "Gagal mengkonfirmasi.";
    }
} else {
    echo "ID tidak valid.";
}
