-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2025 pada 07.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `status`) VALUES
(2, 'admin2', 'admin123', 'admin2@example.com', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formulir_pendaftaran`
--

CREATE TABLE `formulir_pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_ortu` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `kode_pembayaran` varchar(50) DEFAULT NULL,
  `siswa_id` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Lunas','Belum Lunas') DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kode_pembayaran`, `siswa_id`, `jenis_pembayaran`, `jumlah`, `tanggal`, `status`) VALUES
(3, 'TA202505022020', 3, 'SPP', 2000000, '2025-06-12', 'Lunas'),
(4, 'TA202505022004', 4, 'SPP', 100000, '2025-06-12', 'Lunas'),
(5, 'TA202505022004', 4, 'SPP', 3000, '2025-06-12', 'Lunas'),
(8, 'TA202502022022', 9, 'SPP', 100000, '2025-06-15', 'Lunas'),
(9, 'TA202502022022', 11, 'SPP', 100000, '2025-06-16', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reset_log`
--

CREATE TABLE `reset_log` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `waktu_reset` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `no_hp_ayah` varchar(20) NOT NULL,
  `foto_anak` varchar(255) NOT NULL,
  `foto_akte` varchar(255) DEFAULT NULL,
  `foto_kk` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu','Sudah Di Konfirmasi','Ditolak') DEFAULT 'Menunggu',
  `nik_anak` varchar(25) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `tempat_lahir_anak` varchar(100) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(100) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(100) DEFAULT NULL,
  `foto_ktp_ayah` varchar(255) DEFAULT NULL,
  `foto_ktp_ibu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nama_ayah`, `nama_ibu`, `no_hp_ayah`, `foto_anak`, `foto_akte`, `foto_kk`, `status`, `nik_anak`, `nama_panggilan`, `anak_ke`, `tempat_lahir_anak`, `tempat_lahir_ayah`, `tempat_lahir_ibu`, `foto_ktp_ayah`, `foto_ktp_ibu`) VALUES
(2, 'Pebih yola', '2004-11-17', 'Perempuan', 'Desa pekantingan kecamatan klangenan kabupaten cirebon', 'papa', 'mama', '08765439083', '1749292860_foto (2).jpg', '1749292860_akte.jpg', '1749292860_kk.jpg', 'Sudah Di Konfirmasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'andhika', '2020-02-05', 'Laki-laki', 'afafa', 'fredhy', 'angel lia', '02222222222', '1749710893_44fafddd4d09657a7be43363d405dd80.jpg', '1749710893_20220827_002201.jpg', '1749710893_20220829_140354.jpg', 'Sudah Di Konfirmasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'arkhanandhika', '2004-02-05', 'Laki-laki', 'jakarta', 'johns bel', 'angel', '082276122290', '1749742481_20230412_155428.jpg', '1749742481_20230429_232514.jpg', '1749742482_20230429_232418.jpg', 'Sudah Di Konfirmasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'cinra', '2025-02-03', 'Perempuan', 'ciputat', 'mean', 'disa', '02222222222', '1749746278_d017cf0fefc93e2a39f820a915c96322.jpg', '1749746278_IMG_20230828_135003_725.jpg', '1749746278_29.jpg', 'Sudah Di Konfirmasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'yohan', '2022-02-02', 'Laki-laki', 'jakarta', 'andi', 'mia', '02988281891', '1749922904_20230412_155428.jpg', '1749922904_20230429_232418.jpg', '1749922904_20230429_232514.jpg', 'Sudah Di Konfirmasi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'yohan', '2022-02-02', 'Laki-laki', 'jakarta', 'andi', 'mia', '02988281891', '1750042919_20230412_155428.jpg', '1750042919_IMG_20240119_235536_179.jpg', '1750042919_IMG_20230828_135003_725.jpg', 'Menunggu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'mia', '2022-02-02', 'Perempuan', 'ciputat', 'andi', 'mia', '02988281891', '1750042979_44fafddd4d09657a7be43363d405dd80.jpg', '1750042979_20220829_140354.jpg', '1750042979_d017cf0fefc93e2a39f820a915c96322.jpg', 'Menunggu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'dila', '2022-02-02', '', 'jakarta', 'andi', 'mia', '02988281891', '1750047962_29.jpg', '1750047962_photography-sunset-chinese-temple-malaysia-wallpaper-preview.jpg', '1750047962_IMG_20230828_135003_725.jpg', 'Menunggu', '12345', '', 2, 'jakarta', 'jakarta', 'bandung', NULL, NULL),
(13, 'andi', '2022-02-02', 'Laki-laki', 'jakarta', 'andi', 'mia', '02988281891', '1750048056_d017cf0fefc93e2a39f820a915c96322.jpg', '1750048056_photography-sunset-chinese-temple-malaysia-wallpaper-preview.jpg', '1750048056_IMG_20230828_135003_725.jpg', 'Menunggu', '12345', '', 2, 'bandung', 'jakarta', 'bandung', NULL, NULL),
(14, 'dhika', '2022-02-02', 'Laki-laki', 'kakea', 'andi', 'mia', '02222', '1750048405_Copy (3) of 6d716033090c51486b10547a7f72e36b.jpg', '1750048405_photography-sunset-chinese-temple-malaysia-wallpaper-preview.jpg', '1750048405_IMG_20240119_235536_179.jpg', 'Menunggu', '12345', '', 2, NULL, 'jakarta', 'bandung', NULL, NULL),
(15, 'sinta', '2022-02-02', 'Perempuan', 'jakarta', 'andi', 'mia', '02222222222', '1750049701_Copy (3) of 6d716033090c51486b10547a7f72e36b.jpg', '1750049701_pngtree-chinese-tv-wall-porch-wallpaper-background-material-picture-image_1091899.jpg', '1750049701_d017cf0fefc93e2a39f820a915c96322.jpg', 'Menunggu', '12345', 'nan', 2, 'bandung', 'jakarta', 'bandung', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('siswa','guru','admin') NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `formulir_pendaftaran`
--
ALTER TABLE `formulir_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`siswa_id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `reset_log`
--
ALTER TABLE `reset_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `formulir_pendaftaran`
--
ALTER TABLE `formulir_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
