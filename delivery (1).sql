-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 09.07
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
-- Struktur dari tabel `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `code_jo` varchar(50) NOT NULL,
  `id_inquiry_container` varchar(11) NOT NULL,
  `ro_number` varchar(50) NOT NULL,
  `tracking_name` varchar(128) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `type_track` varchar(50) NOT NULL,
  `driver_n` varchar(128) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `load_type` varchar(50) NOT NULL,
  `receipent` varchar(100) NOT NULL,
  `rec_no_hp` varchar(20) NOT NULL,
  `address_cons` varchar(128) NOT NULL,
  `no_truck` varchar(20) NOT NULL,
  `no_container` varchar(50) NOT NULL,
  `no_seal` varchar(50) NOT NULL,
  `route` varchar(50) NOT NULL,
  `origin_port` varchar(20) NOT NULL,
  `destination_port` varchar(20) NOT NULL,
  `agent` varchar(128) NOT NULL,
  `biaya_t` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `delivery`
--

INSERT INTO `delivery` (`id`, `code_jo`, `id_inquiry_container`, `ro_number`, `tracking_name`, `unit`, `type_track`, `driver_n`, `no_hp`, `load_type`, `receipent`, `rec_no_hp`, `address_cons`, `no_truck`, `no_container`, `no_seal`, `route`, `origin_port`, `destination_port`, `agent`, `biaya_t`, `Status`) VALUES
(10, 'JO-00006', '218', '65656', '7', 'wq', 'Double Combo', 'Dias', '089513309238', 'Textile', 'aaA', '089513309238', 'wewew', 'bb007', '09919291', '', 'Batam', '11', '11', 'wanni', '', 3),
(11, 'JO-00007', '219', '08821121', '7', 'yyasa', 'Double panjang', 'wee', '9878964', 'Kertas', 'Pt. Sriwisari', '0899', 'Jlsas', 'bb007', '09919291', '', 'Batam', '11', '11', 'wanni', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
