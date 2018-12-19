-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 02:52 PM
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
  `tgl_transaksi` date NOT NULL,
  `status` enum('debet','kredit','','') NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_entry` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `edited_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_transaksi`
--

INSERT INTO `list_transaksi` (`id`, `kodeRek`, `tgl_transaksi`, `status`, `id_transaksi`, `keterangan`, `nominal`, `tgl_entry`, `created_by`, `tgl_edit`, `edited_by`) VALUES
(1, 12311, '2018-12-01', 'debet', 228, 'Keterangan Transaksi', 10000, '2018-12-18 00:00:00', 'orang', '0000-00-00 00:00:00', ''),
(2, 12311, '2018-12-12', 'kredit', 228, '111', 111, '2018-12-18 00:00:00', 'orang', '0000-00-00 00:00:00', ''),
(3, 12311, '2018-11-28', 'kredit', 228, '22', 22, '2018-12-18 00:00:00', 'orang', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `status` enum('unconfirmed','confirmed','','') NOT NULL DEFAULT 'unconfirmed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `status`) VALUES
(228, 'confirmed'),
(229, ''),
(230, ''),
(231, ''),
(232, ''),
(233, ''),
(234, ''),
(235, ''),
(236, ''),
(237, ''),
(238, ''),
(239, ''),
(240, ''),
(241, ''),
(242, ''),
(243, ''),
(244, ''),
(245, ''),
(246, '');

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
-- Stand-in structure for view `vwlaporanneraca`
-- (See below for the actual view)
--
CREATE TABLE `vwlaporanneraca` (
`NomorRekening` varchar(5)
,`nama_kode` varchar(255)
,`TanggalTransaksi` date
,`TotalDebet` decimal(41,0)
,`TotalKredit` decimal(41,0)
,`Total` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwlaporanrugilaba`
-- (See below for the actual view)
--
CREATE TABLE `vwlaporanrugilaba` (
`NomorRekening` varchar(5)
,`nama_kode` varchar(255)
,`TanggalTransaksi` date
,`TotalDebet` decimal(41,0)
,`TotalKredit` decimal(41,0)
,`Total` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwlisttransaksi`
-- (See below for the actual view)
--
CREATE TABLE `vwlisttransaksi` (
`TanggalTransaksi` date
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` bigint(11)
,`Kredit` bigint(11)
,`DibuatOleh` varchar(255)
,`TanggalDibuat` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwneraca`
-- (See below for the actual view)
--
CREATE TABLE `vwneraca` (
`TanggalTransaksi` date
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` bigint(11)
,`Kredit` bigint(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwposisikas`
-- (See below for the actual view)
--
CREATE TABLE `vwposisikas` (
`TanggalTransaksi` date
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` bigint(11)
,`Kredit` bigint(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwrugilaba`
-- (See below for the actual view)
--
CREATE TABLE `vwrugilaba` (
`TanggalTransaksi` date
,`Uraian` text
,`NomorRekening` int(11)
,`Debet` bigint(11)
,`Kredit` bigint(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vwlaporanneraca`
--
DROP TABLE IF EXISTS `vwlaporanneraca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlaporanneraca`  AS  select concat(left(`vn`.`NomorRekening`,3),'00') AS `NomorRekening`,`kr`.`nama_kode` AS `nama_kode`,`vn`.`TanggalTransaksi` AS `TanggalTransaksi`,sum(`vn`.`Debet`) AS `TotalDebet`,sum(`vn`.`Kredit`) AS `TotalKredit`,(case `kr`.`status` when 'debet' then (sum(`vn`.`Debet`) - sum(`vn`.`Kredit`)) else (sum(`vn`.`Debet`) - sum(`vn`.`Kredit`)) end) AS `Total` from (`vwneraca` `vn` left join `kode_rekening` `kr` on((concat(left(`vn`.`NomorRekening`,3),'00') = `kr`.`kode_rekening`))) group by left(`vn`.`NomorRekening`,3),month(`vn`.`TanggalTransaksi`),year(`vn`.`TanggalTransaksi`) ;

-- --------------------------------------------------------

--
-- Structure for view `vwlaporanrugilaba`
--
DROP TABLE IF EXISTS `vwlaporanrugilaba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlaporanrugilaba`  AS  select concat(left(`vrl`.`NomorRekening`,3),'00') AS `NomorRekening`,`kr`.`nama_kode` AS `nama_kode`,`vrl`.`TanggalTransaksi` AS `TanggalTransaksi`,sum(`vrl`.`Debet`) AS `TotalDebet`,sum(`vrl`.`Kredit`) AS `TotalKredit`,(case `kr`.`status` when 'debet' then (sum(`vrl`.`Debet`) - sum(`vrl`.`Kredit`)) else (sum(`vrl`.`Debet`) - sum(`vrl`.`Kredit`)) end) AS `Total` from (`vwrugilaba` `vrl` left join `kode_rekening` `kr` on((concat(left(`vrl`.`NomorRekening`,3),'00') = `kr`.`kode_rekening`))) group by left(`vrl`.`NomorRekening`,3),month(`vrl`.`TanggalTransaksi`),year(`vrl`.`TanggalTransaksi`) ;

-- --------------------------------------------------------

--
-- Structure for view `vwlisttransaksi`
--
DROP TABLE IF EXISTS `vwlisttransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlisttransaksi`  AS  select `list`.`tgl_transaksi` AS `TanggalTransaksi`,`list`.`keterangan` AS `Uraian`,`list`.`kodeRek` AS `NomorRekening`,(case `list`.`status` when 'debet' then `list`.`nominal` else 0 end) AS `Debet`,(case `list`.`status` when 'kredit' then `list`.`nominal` else 0 end) AS `Kredit`,`list`.`created_by` AS `DibuatOleh`,`list`.`tgl_entry` AS `TanggalDibuat` from (`list_transaksi` `list` left join `transaksi` on((`list`.`id_transaksi` = `transaksi`.`id`))) where (`transaksi`.`status` = 'confirmed') ;

-- --------------------------------------------------------

--
-- Structure for view `vwneraca`
--
DROP TABLE IF EXISTS `vwneraca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwneraca`  AS  select `lt`.`tgl_transaksi` AS `TanggalTransaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else 0 end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else 0 end) AS `Kredit` from `list_transaksi` `lt` where ((`lt`.`kodeRek` like '1%') or (`lt`.`kodeRek` like '2%') or (`lt`.`kodeRek` like '3%')) ;

-- --------------------------------------------------------

--
-- Structure for view `vwposisikas`
--
DROP TABLE IF EXISTS `vwposisikas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwposisikas`  AS  select `lt`.`tgl_transaksi` AS `TanggalTransaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else 0 end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else 0 end) AS `Kredit` from `list_transaksi` `lt` where (`lt`.`kodeRek` like '1%') ;

-- --------------------------------------------------------

--
-- Structure for view `vwrugilaba`
--
DROP TABLE IF EXISTS `vwrugilaba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwrugilaba`  AS  select `lt`.`tgl_transaksi` AS `TanggalTransaksi`,`lt`.`keterangan` AS `Uraian`,`lt`.`kodeRek` AS `NomorRekening`,(case `lt`.`status` when 'debet' then `lt`.`nominal` else 0 end) AS `Debet`,(case `lt`.`status` when 'kredit' then `lt`.`nominal` else 0 end) AS `Kredit` from (`list_transaksi` `lt` left join `kode_rekening` `kr` on((`lt`.`kodeRek` = `kr`.`kode_rekening`))) where ((`lt`.`kodeRek` like '4%') or (`lt`.`kodeRek` like '5%')) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
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
