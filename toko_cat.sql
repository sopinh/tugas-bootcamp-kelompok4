-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 05:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `jenis_cat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jml_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `nama_customer`, `no_hp`, `alamat`, `tgl_penjualan`, `jenis_cat`, `warna`, `jml_beli`) VALUES
(20232, 'Agil Zulfa', '089687405602', 'Bogor', '2023-09-29', 'Bituminous Paint', 'biru', 6),
(20239, 'Sopi Nuryani', '08943289324', 'BOGOR', '2023-09-20', 'Bituminous Paint', 'kuning', 2),
(20240, 'Luthfi Awaludin', '08943289324', 'Ciawi', '2023-09-28', 'Chlorinated Rubber', 'biru', 2),
(20241, 'Riskyta', '089834208342', 'Subang', '2023-09-26', 'Chlorinated Rubber', 'biru', 1),
(20242, 'kjsa', '0893923324', 'jo', '2023-09-26', 'Chlorinated Rubber', 'biru', 2);

-- --------------------------------------------------------

--
-- Table structure for table `total_harga`
--

CREATE TABLE `total_harga` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_harga`
--

INSERT INTO `total_harga` (`id`, `id_penjualan`, `harga`, `total_harga`, `diskon`, `total_bayar`) VALUES
(1, 20232, 20000, 120000, 6000, 114000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_harga`
--
ALTER TABLE `total_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_harga_ibfk_1` (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20243;

--
-- AUTO_INCREMENT for table `total_harga`
--
ALTER TABLE `total_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `total_harga`
--
ALTER TABLE `total_harga`
  ADD CONSTRAINT `total_harga_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
