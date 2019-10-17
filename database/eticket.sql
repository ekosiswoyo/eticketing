-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 01:57 PM
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
('AQ004', 'ID010', 235, 940000, '2019-04-15', '11:14:45'),
('AQ005', 'ID010', 3, 12000, '2019-04-21', '11:51:28'),
('AQ006', 'ID010', 4, 16000, '2019-04-21', '12:51:10'),
('AQ007', 'ID010', 2, 8000, '2019-04-23', '12:51:12'),
('AQ008', 'ID010', 1, 4000, '2019-04-23', '12:51:14');

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
('ED008', 'ID010', 65, 260000, '2019-04-23', '20:53:59');

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
(25, 'ID010', 'B 2 RI', 'Bis', 2, 4000, 8000, 12000, '2018-04-23', '00:00:00'),
(27, 'ID010', 'B 2 RI', 'Bis', 555, 1110000, 8000, 1118000, '2019-04-23', '00:00:00'),
(30, 'ID010', '-', '-', 4, 8000, 0, 8000, '2019-04-23', '13:21:18'),
(31, 'ID012', '-', '-', 4, 8000, 0, 8000, '2019-04-23', '13:39:40'),
(33, 'ID010', '-', '-', 43, 86000, 0, 86000, '2019-04-23', '20:53:08'),
(34, 'ID010', '-', '-', 2, 4000, 0, 4000, '2019-04-30', '13:56:46');

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
('ID002', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Parkir', '0'),
('ID003', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Edukasi', '0'),
('ID004', '21232f297a57a5a743894a0e4a801fc3', 'Petugas Wahana Aquarium', '0'),
('ID010', '0192023a7bbd73250516f069df18b500', 'Administrator', 'eko'),
('ID012', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Lia');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_aquarium`
--
ALTER TABLE `tb_aquarium`
  ADD CONSTRAINT `tb_aquarium_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_edukasi`
--
ALTER TABLE `tb_edukasi`
  ADD CONSTRAINT `tb_edukasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD CONSTRAINT `tb_parkir_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
