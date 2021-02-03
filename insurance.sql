-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 09.09
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
-- Struktur dari tabel `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `code_del` varchar(50) NOT NULL,
  `value` varchar(20) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `td_j` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `insurance`
--

INSERT INTO `insurance` (`id`, `code`, `code_del`, `value`, `rate`, `total`, `td_j`) VALUES
(7, 'INS-00001', 'JO-00002', '200008', '3', 'Rp. 194007.76', '2021-01-20'),
(8, 'INS-00002', 'JO-00006', '20000', '4', 'Rp. 19200', '2021-01-31'),
(9, 'INS-00003', 'JO-00006', '20000', '6', 'Rp. 18800', '2021-01-26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
