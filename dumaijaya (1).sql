-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 05:55 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumaijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktual_pakai`
--

CREATE TABLE `tbl_aktual_pakai` (
  `id_aktual_pakai` int(11) NOT NULL,
  `aktual_pakai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barangs`
--

CREATE TABLE `tbl_barangs` (
  `barangId` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_mesin` varchar(255) NOT NULL,
  `id_aktual_pakai` varchar(255) NOT NULL,
  `detail` varchar(225) NOT NULL,
  `no_npb` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_pesan` varchar(255) NOT NULL,
  `no_po` varchar(255) NOT NULL,
  `id_suplier` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `nama_faktur` varchar(255) DEFAULT NULL,
  `jumlah_masuk` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barangs`
--

INSERT INTO `tbl_barangs` (`barangId`, `tanggal`, `id_mesin`, `id_aktual_pakai`, `detail`, `no_npb`, `nama_barang`, `jumlah_pesan`, `no_po`, `id_suplier`, `tanggal_masuk`, `nama_faktur`, `jumlah_masuk`, `keterangan`, `harga`) VALUES
(19, '2019-02-01', 'Koch', 'Pengadaan Produksi', 'Pengikat Gulungan ulir', '31/NPB- DJA/II/19', 'Ijer plat / Strapping band 3/4', '9', '23', 'Toko Beneliza', '2019-02-02', '-', '0', '-', '0'),
(20, '2019-02-01', 'Cutting', 'Pengadaan Sparepart', 'Stock Sparepart Cutting', '32/NPB -DJA/II/19', 'Air tac selenoid valve (4 V210-08)', '3', '23', 'Toko Beneliza', '2019-04-04', '-', '0', '-', '0'),
(21, '2019-02-01', 'Cutting', 'Perawatan', 'Pembersih Roda Ulir + Baut', '-', 'WD 40', '2', '23', 'Toko Beneliza', '2019-02-02', 'WD-40 333 Ml', '2', '-', '48000'),
(22, '2019-04-02', 'Genset', 'Perawatan', 'Stok service Genset 1 dan 2', '-', 'FS 1000', '4', '2', 'Fuji Mandiri', '2019-02-02', 'Fuel filter 1000 FL', '4', '-', '48000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mesin`
--

CREATE TABLE `tbl_mesin` (
  `id_mesin` int(11) NOT NULL,
  `mesin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `suplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@bewithdhanu.in', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'System Administrator', '9890098900', 1, 1, 0, '2015-07-01 18:56:49', 4, '2019-03-21 18:22:06'),
(2, 'manager@bewithdhanu.in', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Manager', '9890098900', 2, 1, 1, '2016-12-09 17:49:56', 1, '2019-03-11 16:38:20'),
(3, 'employee@bewithdhanu.in', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Employee', '9890098900', 3, 1, 1, '2016-12-09 17:50:22', 4, '2019-03-21 18:18:23'),
(4, 'mita@gmail.com', '$2y$10$8QvshWRII.8xx76GyUlB/.myz9d7KipVTV.0VVsemng4xJc5x0Xye', 'Mita', '0852653022', 1, 0, 0, '2019-03-06 04:09:23', NULL, NULL),
(5, 'tomi@gmail.com', '$2y$10$nJdmY/ipBvsh9B.ouS7Jw./5IPleo7DknWl5YG7uXgYMEAmO2JlHK', 'Tomi', '0852653022', 2, 1, 1, '2019-03-07 10:06:05', 4, '2019-04-05 18:24:08'),
(6, 'firam@gmail.com', '$2y$10$KP.jKEeoEpU/6ka6p.mpq.lz944QLu.sP2E88HUjNO/y09TyDdlJ.', 'Firman', '8790879879', 2, 1, 4, '2019-03-21 19:54:56', 4, '2019-03-21 19:55:14'),
(7, 'friman@gmail.com', '$2y$10$9xv28o576qko/T1EMxr35OuhR8nBDkc.4nikv.YDIKEzN3e5t9lHW', 'Nnn', '8790879879', 2, 0, 4, '2019-03-21 20:08:21', NULL, NULL),
(8, 'test@gmail.com', '$2y$10$3kw1FRCJ8eFc1tIWbY0raupLr791t1.sRmYZC5BN.UM.7bJq2Mtkq', 'Test', '8787998798', 2, 0, 4, '2019-03-23 15:19:43', NULL, NULL),
(9, 'tesss@gmail.com', '$2y$10$8E934Syl3guu.gyQDbWLN.RKQqSW1HtU2wFRy2SuhbwsoDYDMmCkq', 'Tes', '0989880980', 2, 0, 4, '2019-04-02 20:17:46', NULL, NULL),
(10, 'tesss@gmail.com', '$2y$10$L9nYd/GxMo3HpRFvnze1eeV.tR84eH.XFzwevnzEOT66vvfVpw6km', 'Tes', '0989880980', 2, 0, 4, '2019-04-02 20:17:46', NULL, NULL),
(11, 'tesaf@gmail.com', '$2y$10$bMaMJpxsrLb1aSqJfW2/4.pmKM87JWf3D9fxmDdHouNtGwykuRv/a', 'Tes', '68970988907', 2, 0, 4, '2019-04-05 18:16:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aktual_pakai`
--
ALTER TABLE `tbl_aktual_pakai`
  ADD PRIMARY KEY (`id_aktual_pakai`);

--
-- Indexes for table `tbl_barangs`
--
ALTER TABLE `tbl_barangs`
  ADD PRIMARY KEY (`barangId`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barangs`
--
ALTER TABLE `tbl_barangs`
  MODIFY `barangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  MODIFY `id_mesin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
