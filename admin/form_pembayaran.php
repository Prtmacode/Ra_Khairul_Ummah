<?php
include '../config.php';
session_start();

// Jika pakai session admin, bisa tambah validasi disini juga kalau perlu
if (!isset($_SESSION['admin_username'])) {
    header('Location: ../admin.php');
    exit;
}

$siswaList = mysqli_query($conn, "SELECT id, nama FROM siswa ORDER BY nama ASC");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['siswa_id'])) {
    $siswa_id = $_POST['siswa_id'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];
    $nominal_pembayaran = $_POST['nominal_pembayaran'];

    $siswa_id = mysqli_real_escape_string($conn, $siswa_id);

    $result = mysqli_query($conn, "SELECT tanggal_lahir FROM siswa WHERE id = '$siswa_id'");
    $siswa = mysqli_fetch_assoc($result);

    if ($siswa) {
        $tgl_lahir = date('dmY', strtotime($siswa['tanggal_lahir']));
        $kode_pembayaran = "TA" . date('Y') . $tgl_lahir;

        mysqli_query($conn, "INSERT INTO pembayaran (siswa_id, kode_pembayaran, tanggal, jumlah, jenis_pembayaran, status) VALUES ('$siswa_id', '$kode_pembayaran', '$tanggal_pembayaran', '$nominal_pembayaran', 'SPP', 'Belum Lunas')");
        header("Location: data_pembayaran.php");
        exit;
    } else {
        $error_message = "Data siswa tidak ditemukan.";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #e3f2fd; /* soft blue */
        }

        .sidebar {
            width: 280px;
            position: fixed;
            top: 0;
            bottom: 0;
            background-color: #cde9ff;
            padding-top: 60px;
            z-index: 1000;
        }

        .content {
            margin-left: 300px;
            padding: 40px;
            background-color: #fff9c4; /* soft yellow */
            border-radius: 16px;
            margin-top: 30px;
            margin-right: 30px;
            max-width: calc(100% - 360px);
            min-height: 100vh;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        h2 {
            font-size: 26px;
            font-weight: 600;
            color: #003a75;
            margin-bottom: 30px;
            text-align: center;
        }

        label {
            font-weight: 600;
            color: #003a75;
        }

        .form-select, .form-control {
            border-radius: 8px;
            border: 1.5px solid #90caf9;
            transition: border-color 0.3s ease;
        }

        .form-select:focus, .form-control:focus {
            border-color: #f7d794; /* baby yellow */
            box-shadow: 0 0 8px #f7d794;
        }

        .btn-primary {
            background: linear-gradient(90deg, #a3cef1 0%, #f7d794 100%);
            border: none;
            border-radius: 12px;
            font-weight: 700;
            padding: 0.6rem 1.8rem;
            width: 100%;
            color: #333;
            box-shadow: 0 6px 12px rgba(247, 215, 148, 0.6);
            transition: background 0.4s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #f7d794 0%, #a3cef1 100%);
            color: #222;
        }

        .alert {
            max-width: 400px;
            margin: 0 auto 20px auto;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin: 20px;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <?php include '../includes/sidebar_admin.php'; ?>
</div>

<!-- Main Content -->
<div class="content">
    <h2>Form Pembayaran</h2>

    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>

    <form action="" method="post" autocomplete="off">
        <div class="mb-4">
            <label for="siswa_id" class="form-label">Nama Siswa</label>
            <select class="form-select" name="siswa_id" required>
                <option value="" disabled selected>Pilih siswa</option>
                <?php while($siswa = mysqli_fetch_assoc($siswaList)): ?>
                    <option value="<?= htmlspecialchars($siswa['id']) ?>"><?= htmlspecialchars($siswa['nama']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control" name="tanggal_pembayaran" required>
        </div>

        <div class="mb-4">
            <label for="nominal_pembayaran" class="form-label">Nominal Pembayaran</label>
            <input type="number" class="form-control" name="nominal_pembayaran" min="0" step="1000" placeholder="Masukkan nominal dalam Rupiah" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
   </table>

      <a href="data_pembayaran.php" class="btn btn-outline-secondary mt-3">← Kembali</a>
    </div>
    </form>
</div>

</body>
</html>
