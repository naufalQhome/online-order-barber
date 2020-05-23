-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 04:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m-barber`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(120) NOT NULL,
  `harga_kec` decimal(10,0) NOT NULL,
  `t_kec` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `harga_kec`, `t_kec`) VALUES
(1, 'Danurejan', '10000', '2020-05-20 23:31:25'),
(2, 'Gedongtengen', '10000', '2020-05-20 23:31:25'),
(3, 'Gondokusuman', '10000', '2020-05-20 23:31:25'),
(4, 'Gondomanan', '10000', '2020-05-20 23:31:25'),
(5, 'Jetis', '10000', '2020-05-20 23:31:25'),
(6, 'Kotagede', '10000', '2020-05-20 23:31:25'),
(7, 'Keraton', '10000', '2020-05-20 23:31:25'),
(8, 'Mantrijeron', '10000', '2020-05-20 23:31:25'),
(9, 'Mergangsan', '10000', '2020-05-20 23:31:25'),
(10, 'Ngampilan', '10000', '2020-05-20 23:31:25'),
(11, 'Pakualaman', '10000', '2020-05-20 23:31:25'),
(12, 'Tegalrejo', '10000', '2020-05-20 23:31:25'),
(13, 'Umbulharjo', '10000', '2020-05-20 23:31:25'),
(14, 'Wirobrajan', '10000', '2020-05-20 23:31:25');

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
  `waktu_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_order` int(4) NOT NULL,
  `total_order` decimal(10,0) NOT NULL,
  `valid_order` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_customer`
--

INSERT INTO `order_customer` (`id_order`, `nama_order`, `paket_order`, `ponsel_order`, `tempat_order`, `tanggal_order`, `jam_order`, `waktu_order`, `kode_order`, `total_order`, `valid_order`) VALUES
(2, 'JONI', '1,2', '1231203012', 4, '2020-05-27', '9:00 WIB', '2020-05-21 06:22:44', 415, '0', 0),
(10000, 'welbeck', '1,3', '0856562121', 1, '2020-05-24', '12:00 WIB', '2020-05-21 06:30:59', 222, '0', 0),
(10001, 'Naufal', '1,2,3', '0816947361', 4, '2020-05-25', '9:00 WIB', '2020-05-21 16:59:36', 628, '0', 0),
(10002, '[removed]alert&#40;\'tk\'&#41;[removed]', '1,2', '3128318231', 4, '2020-05-29', '9:00 WIB', '2020-05-21 17:11:23', 11, '0', 0),
(10003, 'naufal', '1', '1231', 4, '2020-05-26', '9:00 WIB', '2020-05-21 19:01:43', 295, '0', 0),
(10004, 'naufal', '1', '1231', 4, '2020-05-26', '9:00 WIB', '2020-05-21 19:02:32', 295, '0', 0),
(10005, 'naufal', '1', '1231', 4, '2020-05-26', '9:00 WIB', '2020-05-21 19:02:35', 295, '0', 0),
(10006, 'pobes', '1', '232323', 3, '2020-05-30', '9:00 WIB', '2020-05-21 19:17:04', 701, '0', 0),
(10007, 'opal', '1,2', '082222222', 1, '2020-05-30', '9:00 WIB', '2020-05-21 20:27:06', 825, '0', 0),
(10008, 'Naufal', '3', '082222222', 1, '2020-05-29', '9:00 WIB', '2020-05-21 20:29:45', 167, '0', 0),
(10009, 'Naufal Suka', '1,2', '082222222', 1, '2020-05-30', '9:00 WIB', '2020-05-21 20:32:28', 660, '130660', 0);

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
  `t_paket` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tampil_paket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_cukur`
--

INSERT INTO `paket_cukur` (`id_paket`, `nama_paket`, `deskripsi_paket`, `harga_paket`, `gambar_paket`, `t_paket`, `tampil_paket`) VALUES
(1, 'Paket 1', 'Profesional haircut, hair vitamin.', '50000', 'slide1.png', '2020-05-20 21:18:28', 'active'),
(2, 'Paket 2', 'Profesional haircut, hair vitamin,head massage.', '70000', 'slide2.png', '2020-05-20 21:12:57', ''),
(3, 'Coloring', 'Black coloring. etc', '60000', 'slide3.png', '2020-05-20 22:57:25', '');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_customer`
--
ALTER TABLE `order_customer`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;

--
-- AUTO_INCREMENT for table `paket_cukur`
--
ALTER TABLE `paket_cukur`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
