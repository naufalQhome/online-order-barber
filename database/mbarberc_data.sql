-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2020 at 02:30 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbarberc_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `nama_diskon` varchar(30) NOT NULL,
  `kode_diskon` varchar(30) NOT NULL,
  `tanggal_diskon` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aktif_diskon` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(120) NOT NULL,
  `harga_kec` decimal(10,0) NOT NULL,
  `t_kec` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `harga_kec`, `t_kec`) VALUES
(1, 'Danurejan', 10000, '2020-05-20 23:31:25'),
(2, 'Gedongtengen', 10000, '2020-05-20 23:31:25'),
(3, 'Gondokusuman', 10000, '2020-05-20 23:31:25'),
(4, 'Gondomanan', 10000, '2020-05-20 23:31:25'),
(5, 'Jetis', 10000, '2020-05-20 23:31:25'),
(6, 'Kotagede', 10000, '2020-05-20 23:31:25'),
(7, 'Keraton', 10000, '2020-05-20 23:31:25'),
(8, 'Mantrijeron', 10000, '2020-05-20 23:31:25'),
(9, 'Mergangsan', 10000, '2020-05-20 23:31:25'),
(10, 'Ngampilan', 10000, '2020-05-20 23:31:25'),
(11, 'Pakualaman', 10000, '2020-05-20 23:31:25'),
(12, 'Tegalrejo', 10000, '2020-05-20 23:31:25'),
(13, 'Umbulharjo', 10000, '2020-05-20 23:31:25'),
(14, 'Wirobrajan', 10000, '2020-05-20 23:31:25'),
(15, 'Depok - Sleman', 10000, '2020-05-24 09:57:13'),
(16, 'Banguntapan - Bantul', 15000, '2020-05-24 09:57:13'),
(17, 'Gamping - Sleman', 15000, '2020-05-24 09:57:13'),
(18, 'Ngagklik  - Sleman', 15000, '2020-05-24 09:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_customer`
--

CREATE TABLE `order_customer` (
  `id_order` int(11) NOT NULL,
  `nama_order` varchar(120) NOT NULL,
  `paket_order` varchar(120) NOT NULL,
  `ponsel_order` varchar(20) NOT NULL,
  `tempat_order` int(2) NOT NULL,
  `tanggal_order` date NOT NULL,
  `jam_order` varchar(20) NOT NULL,
  `waktu_order` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_order` int(4) NOT NULL,
  `total_order` decimal(10,0) NOT NULL,
  `valid_order` int(2) NOT NULL,
  `konfirmasi_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_customer`
--

INSERT INTO `order_customer` (`id_order`, `nama_order`, `paket_order`, `ponsel_order`, `tempat_order`, `tanggal_order`, `jam_order`, `waktu_order`, `kode_order`, `total_order`, `valid_order`, `konfirmasi_order`) VALUES
(10031, 'naufal #3', '2', '6216947361', 15, '2020-05-30', '4', '2020-05-24 10:24:54', 188, 80188, 0, 1),
(10032, 'Naufal #5', '2', '62816947361', 4, '2020-06-06', '4', '2020-05-24 10:36:02', 807, 80807, 0, 1),
(10033, 'naufal #6', '1,2', '6216947361', 16, '2020-05-30', '4', '2020-05-24 10:43:22', 345, 135345, 0, 1),
(10034, 'Nurul', '2,3', '089632107002', 3, '2020-05-29', '2', '2020-05-24 21:46:23', 239, 140239, 0, 1),
(10035, 'Nofal#1', '1,2', '62816947361', 15, '2020-05-30', '1', '2020-05-24 23:13:06', 122, 130122, 0, 1),
(10036, 'Nofal#1', '2', '62816947361', 1, '2020-05-30', '1', '2020-05-24 23:20:42', 160, 80160, 0, 0),
(10037, 'Arfin', '1', '085643686161', 3, '2020-05-26', '1', '2020-05-25 18:22:40', 759, 60759, 0, 0),
(10038, 'Arfin nur', '1', '089632107002', 1, '2020-05-29', '1', '2020-05-26 18:56:52', 418, 60418, 0, 1),
(10039, 'Najmi test test', '1', '087821242461984', 15, '2020-05-28', '3', '2020-05-27 15:38:29', 588, 60588, 0, 1),
(10040, 'Haruno Suryokumoro', '1', '081228490004', 3, '2020-05-29', '8', '2020-05-28 16:33:14', 790, 60790, 0, 1),
(10041, 'Naufal#1', '2', '62816947361', 3, '2020-05-29', '1', '2020-05-28 21:20:04', 373, 80373, 0, 1),
(10042, 'Naufal', '1,3', '0816947361', 3, '2020-06-03', '10', '2020-05-29 00:00:22', 582, 120582, 0, 0),
(10043, 'awq', '2', '43', 1, '2020-05-31', '1', '2020-05-29 01:24:04', 397, 80397, 0, 0),
(10044, 'Ushshs', '2', '0816947361', 3, '2020-05-31', '1', '2020-05-29 01:50:25', 783, 80783, 0, 0),
(10045, 'Arfin', '1', '085643686161', 3, '2020-05-30', '1', '2020-05-29 13:22:21', 110, 60110, 0, 1),
(10046, 'Arfin', '1,3', '085643686161', 3, '2020-05-30', '1', '2020-05-29 13:31:59', 625, 120625, 0, 1),
(10047, 'Naufal', '3', '62816947361', 3, '2020-05-31', '3', '2020-05-29 16:22:23', 462, 70462, 0, 1),
(10048, 'eka pamor', '1', '081290262762', 12, '2020-06-01', '7', '2020-05-31 12:15:09', 483, 60483, 0, 1),
(10049, 'Wahyu', '2', '081904019791', 18, '2020-06-01', '1', '2020-05-31 15:05:03', 682, 85682, 0, 1),
(10050, 'gladia', '1', '081328307894', 15, '2020-06-01', '1', '2020-05-31 15:37:38', 24, 60024, 0, 1),
(10051, 'gladia', '1', '081328307894', 15, '2020-06-01', '2', '2020-05-31 15:38:25', 258, 60258, 0, 1),
(10052, 'ghgfhf', '1,2,3', '657546456', 3, '2020-06-28', '10', '2020-06-01 04:29:35', 124, 190124, 0, 0),
(10053, 'Nuafal', '2', '6544', 2, '2020-06-03', '1', '2020-06-02 17:26:46', 142, 80142, 0, 0),
(10054, 'Nabil ', '1', '085225915111', 13, '2020-06-07', '4', '2020-06-06 11:26:15', 14, 60014, 0, 0),
(10055, 'Abil', '1', '085225915111', 13, '2020-06-07', '1', '2020-06-06 18:38:00', 607, 60607, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_cukur`
--

CREATE TABLE `paket_cukur` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `deskripsi_paket` varchar(240) NOT NULL,
  `harga_paket` decimal(10,0) NOT NULL,
  `gambar_paket` varchar(120) NOT NULL,
  `t_paket` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tampil_paket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_cukur`
--

INSERT INTO `paket_cukur` (`id_paket`, `nama_paket`, `deskripsi_paket`, `harga_paket`, `gambar_paket`, `t_paket`, `tampil_paket`) VALUES
(1, 'Paket 1', 'Profesional haircut, hair vitamin.', 50000, 'slide1.jpg', '2020-05-24 10:01:29', 'active'),
(2, 'Paket 2', 'Profesional haircut, hair vitamin, and head massage.', 70000, 'slide2.jpg', '2020-05-29 00:36:17', ''),
(3, 'Coloring', 'Black coloring.', 60000, 'slide3.jpg', '2020-05-24 10:03:48', '');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_order`
--

CREATE TABLE `waktu_order` (
  `id_waktu` int(11) NOT NULL,
  `nama_waktu` varchar(10) NOT NULL,
  `tanggal_waktu` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_order`
--

INSERT INTO `waktu_order` (`id_waktu`, `nama_waktu`, `tanggal_waktu`) VALUES
(1, '10:00', '2020-05-24 02:05:14'),
(2, '11:00', '2020-05-24 02:05:14'),
(3, '12:00', '2020-05-24 02:05:14'),
(4, '13:00', '2020-05-24 02:05:14'),
(5, '14:00', '2020-05-24 02:05:14'),
(6, '15:00', '2020-05-24 02:05:14'),
(7, '16:00', '2020-05-24 02:05:14'),
(8, '17:00', '2020-05-24 02:05:14'),
(9, '18:00', '2020-05-24 02:05:14'),
(10, '19:00', '2020-05-24 02:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `order_customer`
--
ALTER TABLE `order_customer`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `paket_cukur`
--
ALTER TABLE `paket_cukur`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `waktu_order`
--
ALTER TABLE `waktu_order`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_customer`
--
ALTER TABLE `order_customer`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10056;

--
-- AUTO_INCREMENT for table `paket_cukur`
--
ALTER TABLE `paket_cukur`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `waktu_order`
--
ALTER TABLE `waktu_order`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
