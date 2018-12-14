-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 08:22 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

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
  `nama_kode` varchar(255) NOT NULL,
  `status` enum('debet','kredit','','') NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_rekening`
--

INSERT INTO `kode_rekening` (`id`, `kode_rekening`, `nama_kode`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 12311, '123321', 'debet', '2018-11-29 00:00:00', 'siapa yang buat', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `list_transaksi`
--

CREATE TABLE `list_transaksi` (
  `id` int(11) NOT NULL,
  `kodeRek` int(11) NOT NULL,
  `tgl_transaksi` text NOT NULL,
  `status` enum('debet','kredit','','') NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_transaksi`
--

INSERT INTO `list_transaksi` (`id`, `kodeRek`, `tgl_transaksi`, `status`, `id_transaksi`, `keterangan`, `nominal`) VALUES
(1, 123123, '123123', '', 0, '', 0),
(2, 12311, 'Contoh', '', 0, '', 0),
(3, 12311, '14-Dec-18', '', 0, '123123', 1232),
(4, 12311, '14-Dec-18', '', 0, '123123', 1232),
(5, 12311, '14-Dec-18', '', 0, '11111', 10000),
(6, 12311, '14-Dec-18', '', 0, '11111', 111111),
(7, 12311, '14-Dec-18', 'kredit', 0, '1111', 1111),
(8, 12311, '14-Dec-18', 'debet', 0, '111', 1111),
(9, 12311, '14-Dec-18', 'kredit', 47, '11111', 11111);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `total_debet` int(11) NOT NULL,
  `total_kredit` int(11) NOT NULL,
  `tgl_entry` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `edited_by` varchar(255) NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `total_debet`, `total_kredit`, `tgl_entry`, `tgl_edit`, `created_by`, `edited_by`, `status`) VALUES
(9, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(10, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(11, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(12, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(13, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(14, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(15, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(16, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(17, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(18, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(19, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(20, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(21, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(22, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(23, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(24, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(25, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(26, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(27, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(28, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(29, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(30, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(31, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(32, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(33, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(34, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(35, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(36, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(37, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(38, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(39, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(40, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(41, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(42, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(43, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(44, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(45, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(46, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(47, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kode_rekening`
--
ALTER TABLE `kode_rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_transaksi`
--
ALTER TABLE `list_transaksi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `list_transaksi`
--
ALTER TABLE `list_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
