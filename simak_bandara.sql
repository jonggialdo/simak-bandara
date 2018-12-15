-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 11:56 AM
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
(87, 42311, '14-Dec-18', 'debet', 150, '11', 12),
(88, 52311, '14-Dec-18', 'kredit', 150, '333', 123),
(89, 12311, '14-Dec-18', 'kredit', 150, '333', 123),
(90, 12311, '14-Dec-18', 'debet', 151, '12', 12),
(91, 12311, '14-Dec-18', 'kredit', 151, '122', 122),
(92, 12311, '14-Dec-18', 'debet', 153, '1', 1),
(93, 12311, '14-Dec-18', 'debet', 153, '2', 2),
(94, 12311, '14-Dec-18', 'kredit', 154, '123', 123),
(95, 12311, '14-Dec-18', 'debet', 154, '232', 213),
(96, 12311, '14-Dec-18', 'debet', 154, '232', 213),
(97, 12311, '14-Dec-18', 'debet', 154, '232', 213),
(98, 12311, '14-Dec-18', 'debet', 154, '12', 12),
(99, 12311, '14-Dec-18', 'debet', 154, '12', 12),
(100, 12311, '14-Dec-18', 'debet', 154, '12', 12),
(101, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(102, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(103, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(104, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(105, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(106, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(107, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(108, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(109, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(110, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(111, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(112, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(113, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(114, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(115, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(116, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(117, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(118, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(119, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(120, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(121, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(122, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(123, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(124, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(125, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(126, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(127, 12311, '14-Dec-18', 'kredit', 154, '1', 1),
(128, 12311, '14-Dec-18', 'debet', 155, '23', 12),
(129, 12311, '14-Dec-18', 'debet', 155, '23', 12),
(130, 12311, '14-Dec-18', 'debet', 155, '232', 123),
(131, 12311, '14-Dec-18', 'debet', 155, '232', 123),
(132, 12311, '14-Dec-18', 'debet', 155, '232', 123),
(133, 12311, '14-Dec-18', 'debet', 155, '232', 123),
(134, 12311, '14-Dec-18', 'debet', 155, '232', 123),
(135, 12311, '14-Dec-18', 'debet', 157, '321', 123),
(136, 12311, '14-Dec-18', 'debet', 158, '321', 123),
(137, 12311, '14-Dec-18', 'debet', 159, '321', 123),
(138, 12311, '14-Dec-18', 'debet', 160, '321', 123),
(139, 12311, '14-Dec-18', 'debet', 161, '321', 123),
(140, 12311, '14-Dec-18', 'debet', 162, '321', 123),
(141, 12311, '14-Dec-18', 'debet', 163, '321', 123),
(142, 12311, '14-Dec-18', 'debet', 164, '321', 123),
(143, 12311, '14-Dec-18', 'debet', 165, '321', 123),
(144, 12311, '14-Dec-18', 'debet', 166, '321', 123),
(145, 12311, '14-Dec-18', 'debet', 166, '123', 321),
(146, 12311, '14-Dec-18', 'debet', 166, '123', 321),
(147, 12311, '14-Dec-18', 'debet', 167, '321', 123),
(148, 12311, '14-Dec-18', 'kredit', 167, '3213', 1233),
(149, 12311, '14-Dec-18', 'kredit', 167, '3213', 1233),
(150, 12311, '14-Dec-18', 'debet', 168, '321', 123),
(151, 12311, '14-Dec-18', 'debet', 169, '321', 123),
(152, 12311, '14-Dec-18', 'debet', 170, '321', 123),
(153, 12311, '14-Dec-18', 'debet', 171, '321', 123),
(154, 12311, '14-Dec-18', 'debet', 173, '321', 132),
(155, 12311, '14-Dec-18', 'debet', 173, '3333', 123),
(156, 12311, '14-Dec-18', 'debet', 174, '3211', 133),
(157, 12311, '14-Dec-18', 'debet', 174, '321111', 123),
(158, 12311, '14-Dec-18', 'debet', 174, '321111', 123),
(159, 12311, '14-Dec-18', 'kredit', 181, '12', 1232),
(160, 12311, '14-Dec-18', 'kredit', 181, '1', 1),
(161, 12311, '14-Dec-18', 'kredit', 184, '1', 1),
(162, 12311, '14-Dec-18', 'kredit', 185, '12', 123),
(163, 12311, '14-Dec-18', 'kredit', 214, '12', 12),
(164, 12311, '14-Dec-18', 'kredit', 214, '12', 12),
(165, 12311, '14-Dec-18', 'kredit', 214, '12', 12);

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
(143, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(144, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(145, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(146, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(147, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(148, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(149, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(150, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(151, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(152, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(153, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(154, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(155, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(156, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(157, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(158, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(159, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(160, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(161, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(162, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(163, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(164, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(165, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(166, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(167, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(168, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(169, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(170, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(171, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(172, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(173, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(174, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(175, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(176, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(177, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(178, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(179, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(180, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(181, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(182, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(183, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(184, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(185, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(186, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(187, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(188, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(189, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(190, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(191, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(192, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(193, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(194, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(195, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(196, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(197, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(198, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(199, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(200, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(201, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(202, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(203, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(204, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(205, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(206, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(207, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(208, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(209, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(210, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(211, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(212, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(213, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(214, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(215, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', ''),
(216, 0, 0, '2014-12-18 00:00:00', '0000-00-00 00:00:00', 'orang', '', '');

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
-- Stand-in structure for view `vwneraca`
-- (See below for the actual view)
--
CREATE TABLE `vwneraca` (
`Transaksi` text
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` varchar(11)
,`Kredit` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwposisikas`
-- (See below for the actual view)
--
CREATE TABLE `vwposisikas` (
`Transaksi` text
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` varchar(11)
,`Kredit` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwrugilaba`
-- (See below for the actual view)
--
CREATE TABLE `vwrugilaba` (
`TanggalTransaksi` text
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` varchar(11)
,`Kredit` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vwneraca`
--
DROP TABLE IF EXISTS `vwneraca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwneraca`  AS  select `lt`.`tgl_transaksi` AS `Transaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else '-' end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else '-' end) AS `Kredit` from `list_transaksi` `lt` where ((`lt`.`kodeRek` like '1%') or (`lt`.`kodeRek` like '2%') or (`lt`.`kodeRek` like '3%')) ;

-- --------------------------------------------------------

--
-- Structure for view `vwposisikas`
--
DROP TABLE IF EXISTS `vwposisikas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwposisikas`  AS  select `lt`.`tgl_transaksi` AS `Transaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else '-' end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else '-' end) AS `Kredit` from `list_transaksi` `lt` where (`lt`.`kodeRek` like '1%') ;

-- --------------------------------------------------------

--
-- Structure for view `vwrugilaba`
--
DROP TABLE IF EXISTS `vwrugilaba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwrugilaba`  AS  select `lt`.`tgl_transaksi` AS `TanggalTransaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else '-' end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else '-' end) AS `Kredit` from `list_transaksi` `lt` where ((`lt`.`kodeRek` like '4%') or (`lt`.`kodeRek` like '5%')) ;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_transaksi`
--
ALTER TABLE `list_transaksi`
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 
