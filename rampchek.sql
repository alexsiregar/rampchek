-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 01:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rampchek`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan`
--

CREATE TABLE `pengecekan` (
  `id_pengecekan` int(11) NOT NULL,
  `penguji` varchar(128) NOT NULL,
  `pengemudi` varchar(128) NOT NULL,
  `nama_po` varchar(128) NOT NULL,
  `no_kendaraan` varchar(50) NOT NULL,
  `no_stuk` varchar(50) NOT NULL,
  `waktu_pemeriksaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengecekan_unsur`
--

CREATE TABLE `pengecekan_unsur` (
  `id_pengsur` int(11) NOT NULL,
  `id_pengecekan` int(11) NOT NULL,
  `id_unadmin` varchar(128) NOT NULL,
  `kondisi_admin` varchar(128) NOT NULL,
  `keterangan_admin` text NOT NULL,
  `kondisi_teknis` varchar(128) NOT NULL,
  `keterangan_teknis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unsur_administrasi`
--

CREATE TABLE `unsur_administrasi` (
  `id_unadmin` int(11) NOT NULL,
  `daftar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unsur_administrasi`
--

INSERT INTO `unsur_administrasi` (`id_unadmin`, `daftar`) VALUES
(1, 'STNK'),
(2, 'Surat Izin Muatan');

-- --------------------------------------------------------

--
-- Table structure for table `unsur_teknis`
--

CREATE TABLE `unsur_teknis` (
  `id_unteknis` int(11) NOT NULL,
  `daftar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unsur_teknis`
--

INSERT INTO `unsur_teknis` (`id_unteknis`, `daftar`) VALUES
(1, 'Ban'),
(2, 'Lampu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$nV3erHKBVKYkj8ezw99Ds.LfBnihfe/oJszsVfWVs2VAr2qRBCKOG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengecekan`
--
ALTER TABLE `pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`);

--
-- Indexes for table `pengecekan_unsur`
--
ALTER TABLE `pengecekan_unsur`
  ADD PRIMARY KEY (`id_pengsur`);

--
-- Indexes for table `unsur_administrasi`
--
ALTER TABLE `unsur_administrasi`
  ADD PRIMARY KEY (`id_unadmin`);

--
-- Indexes for table `unsur_teknis`
--
ALTER TABLE `unsur_teknis`
  ADD PRIMARY KEY (`id_unteknis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengecekan`
--
ALTER TABLE `pengecekan`
  MODIFY `id_pengecekan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengecekan_unsur`
--
ALTER TABLE `pengecekan_unsur`
  MODIFY `id_pengsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unsur_administrasi`
--
ALTER TABLE `unsur_administrasi`
  MODIFY `id_unadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unsur_teknis`
--
ALTER TABLE `unsur_teknis`
  MODIFY `id_unteknis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
