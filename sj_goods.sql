-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 09.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sj_goods`
--

CREATE TABLE `sj_goods` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `sj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sj_goods`
--

INSERT INTO `sj_goods` (`id`, `nama_barang`, `quantity`, `unit`, `sj`) VALUES
(31, 'fluida', '55', 'Cardboard', '00001/SJ/January/2021'),
(32, 'test', '55', 'Cardboard', '00001/SJ/January/2021'),
(33, 'test', '55', 'Cardboard', '00002/SJ/January/2021'),
(34, 'Soklin', '5', 'Unit', '00002/SJ/January/2021');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sj_goods`
--
ALTER TABLE `sj_goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sj_goods`
--
ALTER TABLE `sj_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
