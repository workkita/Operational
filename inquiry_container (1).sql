-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2021 pada 09.41
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
-- Struktur dari tabel `inquiry_container`
--

CREATE TABLE `inquiry_container` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `sales_code` varchar(20) NOT NULL,
  `load_date` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `purchased` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `ppn` varchar(20) NOT NULL,
  `insurance` varchar(20) NOT NULL,
  `ppftz03` varchar(20) NOT NULL,
  `service` varchar(50) NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `vessel_name` varchar(50) NOT NULL,
  `voy` varchar(50) NOT NULL,
  `container` varchar(50) NOT NULL,
  `type_jo` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `etd` date NOT NULL,
  `eta` date NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inquiry_container`
--

INSERT INTO `inquiry_container` (`id`, `order_date`, `sales_code`, `load_date`, `customer`, `purchased`, `Address`, `ppn`, `insurance`, `ppftz03`, `service`, `shipping_name`, `vessel_name`, `voy`, `container`, `type_jo`, `type`, `etd`, `eta`, `Status`) VALUES
(218, '2021-01-29', 'SLS001', '2021-01-29', 'CSR001', 'Textile', 'MAlang', 'exclude', 'exclude', 'exclude', 'Port to Port', 'PT. Korin Global Mandiri', '23', 'yyyy', '40\"', 'International', 'Muat', '2021-01-29', '2021-01-29', 1),
(219, '2021-01-29', 'SLS001', '2021-01-29', 'CSR001', 'Textile', 'MAlang', 'exclude', 'exclude', 'exclude', 'Door to Door', 'Bisco Management Indonesia', '23', 'yyyy', '40\"', 'Domestic', 'Bongkar', '2021-01-29', '2021-01-29', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inquiry_container`
--
ALTER TABLE `inquiry_container`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inquiry_container`
--
ALTER TABLE `inquiry_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
