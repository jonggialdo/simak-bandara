-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 02:11 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simak_bandara`
--

-- --------------------------------------------------------

--
-- Table structure for table `kode_rekening`
--

CREATE TABLE `kode_rekening` (
  `id` int(11) NOT NULL,
  `kode_rekening` int(11) NOT NULL,
  `nama_kode` int(11) NOT NULL,
  `status` enum('debet','kredit','','') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kd_debet` int(11) NOT NULL,
  `kd_kredit` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `uraian` text NOT NULL,
  `nominal_debet` int(11) NOT NULL,
  `nominal_kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwkoderekening`
-- (See below for the actual view)
--
CREATE TABLE `vwkoderekening` (
`kode_rekening` int(11)
,`nama_kode` int(11)
,`status` enum('debet','kredit','','')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtransaksi`
-- (See below for the actual view)
--
CREATE TABLE `vwtransaksi` (
`kd_debet` int(11)
,`nama_kode_debet` int(11)
,`kd_kredit` int(11)
,`nama_kode_kredit` int(11)
,`tgl_transaksi` datetime
,`Uraian` text
,`nominal_debet` int(11)
,`nominal_kredit` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vwkoderekening`
--
DROP TABLE IF EXISTS `vwkoderekening`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwkoderekening`  AS  select `kode_rekening`.`kode_rekening` AS `kode_rekening`,`kode_rekening`.`nama_kode` AS `nama_kode`,`kode_rekening`.`status` AS `status` from `kode_rekening` ;

-- --------------------------------------------------------

--
-- Structure for view `vwtransaksi`
--
DROP TABLE IF EXISTS `vwtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtransaksi`  AS  select `a`.`kd_debet` AS `kd_debet`,`b`.`nama_kode` AS `nama_kode_debet`,`a`.`kd_kredit` AS `kd_kredit`,`c`.`nama_kode` AS `nama_kode_kredit`,`a`.`tgl_transaksi` AS `tgl_transaksi`,`a`.`uraian` AS `Uraian`,`a`.`nominal_debet` AS `nominal_debet`,`a`.`nominal_kredit` AS `nominal_kredit` from ((`transaksi` `a` left join `kode_rekening` `b` on((`a`.`kd_debet` = `b`.`kode_rekening`))) left join `kode_rekening` `c` on((`a`.`kd_kredit` = `c`.`kode_rekening`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_rekening`
--
ALTER TABLE `kode_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kode_rekening`
--
ALTER TABLE `kode_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
