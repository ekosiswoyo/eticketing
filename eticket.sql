-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 11:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
  `jml_orang` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aquarium`
--

INSERT INTO `tb_aquarium` (`id_aquarium`, `jml_orang`, `total`, `status`, `tanggal`) VALUES
('AQ001', 2, 8000, NULL, '2019-04-13 07:12:53'),
('AQ002', 5, 20000, NULL, '2019-04-13 07:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_edukasi`
--

CREATE TABLE `tb_edukasi` (
  `id_edukasi` varchar(50) NOT NULL,
  `jml_orang` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_edukasi`
--

INSERT INTO `tb_edukasi` (`id_edukasi`, `jml_orang`, `total`, `tanggal`, `status`) VALUES
('BRG001', 4, 16000, '2019-04-13 06:59:40', 0),
('BRG002', 3, 12000, '2019-04-13 07:02:35', 0),
('BRG003', 4, 16000, '2019-04-13 07:03:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `id` int(11) NOT NULL,
  `plat` varchar(15) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
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

INSERT INTO `tb_parkir` (`id`, `plat`, `jenis`, `jml_orang`, `biaya_orang`, `biaya_parkir`, `total_biaya`, `tanggal`, `status`) VALUES
(4, 'e222', 'Sepeda', 1, 2000, 3000, NULL, NULL, NULL),
(5, 'g5490wt', 'Sepeda Motor', 2, 4000, 6000, NULL, NULL, NULL),
(6, 'h5328t', 'Sepeda Motor', 3, 6000, 8000, NULL, '2019-03-13 12:55:43', NULL),
(7, 'pp2403p', 'Mobil', 2, 4000, 9000, NULL, '2019-04-12 17:30:27', NULL),
(8, 'z44r', 'Sepeda', 2, 4000, 5000, NULL, '2019-04-12 17:45:56', NULL),
(9, 'WE778J', 'Sepeda', 2, 4000, 5000, NULL, '2019-04-13 05:48:30', NULL),
(10, 'D 4590 ET', 'Sepeda Motor', 4, 8000, 2000, 10000, '2019-04-13 06:03:58', NULL),
(11, 'dd43rt', 'Sepeda', 1, 2000, 1000, 3000, '2019-04-13 07:02:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '0',
  `level` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `level`) VALUES
('ID001', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('ID002', '21232f297a57a5a743894a0e4a801fc3', 'admin_tiket'),
('ID003', '21232f297a57a5a743894a0e4a801fc3', 'admin_tiket');

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
-- AUTO_INCREMENT for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
