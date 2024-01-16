-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2024 pada 05.14
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat-crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(7, 'cek', 'cek', 'cek@gmail.com', '$2y$10$g9QWHK065XMB0zWthsHprO.7GF3REWZjU/Cv8viWFNho42sef.qCS', '2'),
(14, 'zeno', 'zeno', 'zoro@gmail.com', '$2y$10$QfAnw8w0wF4AxVzqeaPnS.Lb.Y1TQPAfyaN9Syg.6dNmUnxe97xe2', '1'),
(15, 'opepel', 'opp', 'operator@gmail.com', '$2y$10$y79PVz7/QrI9nmUSBSRs8eqvMI4bCbqNW8RLSMibJ5gFNWHlQWRfW', ' 3'),
(16, 'Fairuz Alsawau', 'admin', 'admin@gmail.com', '$2y$10$TzUCHKIslQnPz3rcd1rPdehBBvz2TiHv9oqCCUDWIii2FLB6RZey6', '1'),
(17, 'naruto', 'pel1', 'admin@lkpcendana.com', '$2y$10$pFNKDxd9fu7MO.tHtgKHEOYhUVO18w3ZHmhuPpR0zCn4vNhOoC7OO', '3'),
(18, 'sakura', 'op1', 'admin@gmail.com', '$2y$10$cvgEuRR/8jSGORbe1O9eguE/jS1K/AXSQqahcL7x9Q.IspfSvvOU2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sewa` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `tanggal_diambil` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `sewa`, `harga`, `tanggal_diambil`, `tanggal_diterima`) VALUES
(1, 'jas silver', '3 hari', '85000', '2023-12-22 10:55:07', '2023-12-24 00:00:00'),
(2, 'jas pink', '3 hari', '25000', '2023-12-22 10:57:09', '2023-12-25 12:57:09'),
(3, 'basofi merah', '1 hari', '50000', '2023-12-22 05:20:12', '2023-12-27 11:20:12'),
(4, 'beskap hitam', '3 hari', '75000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'adat kudus', '2 hari', '75000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'fairuz salsabil', '3 hari', '75000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'lala', '2 hari', '75000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'cek', '3 hari', '75000', '2023-12-25 08:22:02', '2023-12-25 08:22:02'),
(11, 'jas hitam', '1 hari', '75000', '2023-12-25 08:43:26', '2023-12-25 08:43:26'),
(13, 'fairuz', '3 hari', '75000', '2023-12-26 16:26:29', '2023-12-26 22:25:00'),
(14, 'santo', '2 hari', '75000', '2023-12-26 16:27:32', '2023-12-26 01:00:00'),
(16, 'jas', '2 hari', '1500000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'jas gold', '2 hari', '20000', '2002-10-13 20:20:00', '2002-10-12 20:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` int(11) NOT NULL,
  `nama_pel` varchar(100) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `nama_pel`, `no_ktp`, `jenis_kelamin`, `telepon`, `email`, `foto`) VALUES
(1, 'yudisetiawan', '123456789', 'Laki-Laki', '082323748984', 'alsawau123@gmail.com', '65977ea8f1e31.jpg'),
(2, 'fairuz', '12345', 'Laki-Laki', '0811234672', 'kelompok@gmail.com', '65977c86b8e85.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
