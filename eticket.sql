-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 11:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aquarium`
--

CREATE TABLE `tb_aquarium` (
  `id_aquarium` varchar(50) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `jml_orang` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aquarium`
--

INSERT INTO `tb_aquarium` (`id_aquarium`, `id_user`, `jml_orang`, `total`, `status`, `tanggal`) VALUES
('AQ001', NULL, 2, 8000, NULL, '2019-04-13 07:12:53'),
('AQ002', NULL, 5, 20000, NULL, '2019-04-13 07:13:00'),
('AQ003', NULL, 4, 16000, NULL, '2019-04-16 10:36:04'),
('AQ004', 'ID001', 5, 20000, NULL, '2019-04-16 10:37:51'),
('AQ005', 'ID001', 5, 20000, NULL, '2019-04-18 04:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_edukasi`
--

CREATE TABLE `tb_edukasi` (
  `id_edukasi` varchar(50) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `jml_orang` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_edukasi`
--

INSERT INTO `tb_edukasi` (`id_edukasi`, `id_user`, `jml_orang`, `total`, `tanggal`, `status`) VALUES
('BRG001', NULL, 4, 16000, '2019-04-13 06:59:40', 0),
('BRG002', NULL, 3, 12000, '2019-04-13 07:02:35', 0),
('BRG003', NULL, 4, 16000, '2019-04-13 07:03:13', 0),
('ED004', NULL, 2, 8000, '2019-04-15 11:03:39', 0),
('ED005', NULL, 4, 16000, '2019-04-18 04:22:05', 0),
('ED006', 'ID001', 4, 16000, '2019-04-18 04:24:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `biaya`) VALUES
(1, 'Sepeda', NULL),
(2, 'Motor', NULL),
(3, 'Mobil', NULL),
(4, 'Bus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `id` int(11) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `plat` varchar(100) NOT NULL DEFAULT 'TIDAK BERKENDARA',
  `jenis` varchar(100) DEFAULT NULL,
  `jml_orang` int(5) DEFAULT NULL,
  `biaya_orang` int(11) DEFAULT NULL,
  `biaya_parkir` int(11) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_parkir`
--

INSERT INTO `tb_parkir` (`id`, `id_user`, `plat`, `jenis`, `jml_orang`, `biaya_orang`, `biaya_parkir`, `total_biaya`, `tanggal`, `status`) VALUES
(18, 'ID001', 'Z BBN 01', 'Motor', 2, 4000, 2000, 6000, '2019-03-15 10:59:58', NULL),
(19, 'ID001', 'V 888 B', 'Motor', 2, 4000, 2000, 6000, '2019-03-15 11:00:12', NULL),
(20, 'ID001', 'B 99 T', 'Mobil', 1, 2000, 5000, 7000, '2019-04-15 11:00:25', NULL),
(21, 'ID001', 'N 88 T', 'Mobil', 1, 2000, 5000, 7000, '2019-04-15 11:00:52', NULL),
(22, 'ID001', 'eee', 'Mobil', 2, 4000, 5000, 9000, '2019-04-15 11:02:11', NULL),
(23, 'ID001', 'R 4321 T', 'Mobil', 2, 4000, 5000, 9000, '2019-04-16 10:30:42', NULL),
(24, 'ID001', '', 'Mobil', 3, 6000, 5000, 11000, '2019-04-16 10:30:51', NULL),
(25, 'ID001', '', 'Mobil', 1, 2000, 5000, 7000, '2019-04-16 10:31:15', NULL),
(26, 'ID001', 'RT 72 RI', 'Mobil', 5, 10000, 5000, 15000, '2019-04-18 04:13:27', NULL),
(27, 'ID001', 'B 1 RI', 'Sepeda', 1, 2000, 5000, 7000, '2019-03-18 04:13:53', NULL),
(28, 'ID001', 'B 2 RI', 'Bis', 1, 2000, 8000, 10000, '2019-04-18 04:14:25', NULL),
(35, 'ID001', '3', 'Bis', 1, 2000, 8000, 10000, '2019-04-18 04:19:58', NULL),
(36, 'ID001', 'g', 'Motor', 1, 2000, 2000, 4000, '2019-04-18 04:20:12', NULL),
(37, 'ID010', 'TIDAK BERKENDARA', 'TIDAK BERKENDARA', 3, 6000, 0, 6000, '2019-04-18 05:47:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '0',
  `level` varchar(100) NOT NULL DEFAULT '0',
  `nama_user` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `level`, `nama_user`) VALUES
('dfd', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'Administrator', 'eko'),
('ID002', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Parkir', '0'),
('ID003', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Edukasi', '0'),
('ID004', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Aquarium', '0'),
('ID005', '21232f297a57a5a743894a0e4a801fc3', 'admin_tiket', 'eko'),
('ID006', '21232f297a57a5a743894a0e4a801fc3', 'admin_tiket', 'adminn'),
('ID008', '21232f297a57a5a743894a0e4a801fc3', 'admin_tiket', 'ee'),
('ID010', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admint');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aquarium`
--
ALTER TABLE `tb_aquarium`
  ADD PRIMARY KEY (`id_aquarium`);

--
-- Indexes for table `tb_edukasi`
--
ALTER TABLE `tb_edukasi`
  ADD PRIMARY KEY (`id_edukasi`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
