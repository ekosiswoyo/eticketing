-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 05:57 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aquarium`
--

CREATE TABLE `tb_aquarium` (
  `id_aquarium` varchar(10) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `jml_orang` int(5) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aquarium`
--

INSERT INTO `tb_aquarium` (`id_aquarium`, `id_user`, `jml_orang`, `total`, `tanggal`, `jam`) VALUES
('AQ001', 'ID004', 2, 8000, '2019-07-03', '15:12:39'),
('AQ002', 'ID004', 1, 4000, '2019-07-03', '05:38:04'),
('AQ003', 'ID004', 1, 4000, '2019-07-05', '05:07:56'),
('AQ004', 'ID004', 3, 12000, '2019-07-07', '08:07:14'),
('AQ005', 'ID004', 2, 8000, '2019-07-09', '03:31:53'),
('AQ006', 'ID004', 3, 12000, '2019-07-09', '03:32:06'),
('AQ007', 'ID004', 4, 16000, '2019-07-16', '08:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_edukasi`
--

CREATE TABLE `tb_edukasi` (
  `id_edukasi` varchar(10) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `jml_orang` int(5) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_edukasi`
--

INSERT INTO `tb_edukasi` (`id_edukasi`, `id_user`, `jml_orang`, `total`, `tanggal`, `jam`) VALUES
('ED001', 'ID003', 2, 8000, '2019-07-03', '15:11:47'),
('ED002', 'ID003', 1, 4000, '2019-07-03', '05:06:49'),
('ED003', 'ID003', 2, 8000, '2019-07-07', '08:06:08'),
('ED004', 'ID003', 3, 12000, '2019-07-09', '03:31:04'),
('ED005', 'ID003', 1, 4000, '2019-07-09', '03:31:25'),
('ED006', 'ID003', 2, 8000, '2019-07-13', '11:44:05'),
('ED007', 'ID003', 3, 12000, '2019-07-16', '08:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `id` int(5) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `plat` varchar(10) NOT NULL DEFAULT '-',
  `jenis` varchar(15) DEFAULT NULL,
  `jml_orang` int(5) DEFAULT NULL,
  `biaya_orang` int(11) DEFAULT NULL,
  `biaya_parkir` int(11) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_parkir`
--

INSERT INTO `tb_parkir` (`id`, `id_user`, `plat`, `jenis`, `jml_orang`, `biaya_orang`, `biaya_parkir`, `total_biaya`, `tanggal`, `jam`) VALUES
(39, 'ID003', 't555', 'Motor', 1, 2000, 2000, 4000, '2019-07-03', '05:32:36'),
(40, 'ID002', 'r777', 'Motor', 2, 4000, 2000, 6000, '2019-07-05', '05:03:35'),
(41, 'ID002', '-', '-', 1, 2000, 0, 2000, '2019-07-05', '05:04:12'),
(42, 'ID002', '-', '-', 2, 4000, 0, 4000, '2019-07-07', '08:04:01'),
(43, 'ID002', 'G5555', 'Motor', 2, 4000, 2000, 6000, '2019-07-09', '03:29:12'),
(44, 'ID002', 'E7676', 'Mobil', 2, 4000, 5000, 9000, '2019-07-09', '03:29:48'),
(45, 'ID012', 'G223t', 'Bus', 6, 12000, 0, 12000, '2019-07-10', '04:28:23'),
(47, 'ID012', 'Y5454T', 'Bus', 4, 8000, 0, 8000, '2019-07-13', '11:43:11'),
(48, 'ID012', '7777', 'Sepeda', 1, 2000, 1000, 3000, '2019-07-13', '11:50:00'),
(49, 'ID012', '-', '-', 1, 2000, 0, 2000, '2019-07-13', '12:03:30'),
(53, 'ID012', '-', '-', 1, 2000, 0, 2000, '2019-07-13', '17:35:13'),
(54, 'ID012', '-', '-', 3, 6000, 0, 6000, '2019-07-13', '18:29:04'),
(55, 'ID012', '4444', 'Bus', 2, 4000, 0, 4000, '2019-07-13', '18:42:35'),
(56, 'ID012', 'qq', 'Sepeda', 2, 4000, 1000, 5000, '2019-07-13', '18:42:59'),
(57, 'ID012', '66', 'Sepeda', 2, 4000, 1000, 5000, '2019-07-15', '07:01:07'),
(58, 'ID012', '-', '-', 3, 6000, 0, 6000, '2019-07-15', '09:54:32'),
(59, 'ID012', '3e3e3', 'Bus', 5, 10000, 0, 10000, '2019-07-15', '13:00:27'),
(60, 'ID012', '6666', 'Sepeda', 1, 2000, 1000, 3000, '2019-07-15', '13:03:10'),
(61, 'ID012', '44', 'Mobil', 4, 8000, 5000, 13000, '2019-07-15', '13:04:03'),
(62, 'ID012', '333', 'Motor', 2, 4000, 2000, 6000, '2019-07-16', '08:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '0',
  `level` varchar(25) NOT NULL DEFAULT '0',
  `nama_user` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `level`, `nama_user`) VALUES
('ID002', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Parkir', 'susilo'),
('ID003', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Edukasi', 'Ahmad'),
('ID004', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Aquarium', 'Edi'),
('ID012', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Parkir', 'Slamet'),
('ID013', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Nugroho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aquarium`
--
ALTER TABLE `tb_aquarium`
  ADD PRIMARY KEY (`id_aquarium`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_edukasi`
--
ALTER TABLE `tb_edukasi`
  ADD PRIMARY KEY (`id_edukasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aquarium`
--
ALTER TABLE `tb_aquarium`
  ADD CONSTRAINT `tb_aquarium_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_edukasi`
--
ALTER TABLE `tb_edukasi`
  ADD CONSTRAINT `tb_edukasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD CONSTRAINT `tb_parkir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
