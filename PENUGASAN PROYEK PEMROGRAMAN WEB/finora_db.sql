-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2026 at 10:51 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finora_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `foto_barang` varchar(255) DEFAULT NULL,
  `jenis_laporan` enum('Hilang','Ditemukan') NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `deskripsi` text,
  `status` enum('Dalam Pencarian','Sudah Ditemukan','Sudah Dikembalikan') DEFAULT 'Dalam Pencarian',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `foto_barang`, `jenis_laporan`, `kategori`, `lokasi`, `tanggal_kejadian`, `deskripsi`, `status`, `created_at`) VALUES
(5, 'photocard', '1794465675_b836a3d996981ae3d09c.jpg', 'Hilang', 'Aksesori', 'cakra', '2026-11-12', 'siapapun yang nemu tolong hubungi wa:08xxxxxxx', 'Dalam Pencarian', '2026-11-12 06:41:15'),
(6, 'buku', '1794465784_a32dc6a65271125eb1a7.jpg', 'Ditemukan', 'Alat Tulis', 'perpustakaan cakra', '2026-11-13', 'ada barang ketinggalan? nemu di perpus nih, coba hubungi wa; +628xxxxxx, nanti ketemuan ya', '', '2026-11-12 06:43:04'),
(7, 'skincare', '1795031527_5aa69306df97913a1935.jpg', 'Hilang', 'Lainnya', 'hilang di gedung FT di halaman depannya ', '2026-11-10', 'skincare wardah warna biru seprti di gambar ', 'Dalam Pencarian', '2026-11-18 19:52:07'),
(8, 'buku novel', '1795031749_edab18bb15c260e27141.png', 'Ditemukan', 'Alat Tulis', 'di perpustakaan', '2026-11-16', 'buku novel samudra vol 1, 2, 3 ', 'Dalam Pencarian', '2026-11-18 19:55:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
