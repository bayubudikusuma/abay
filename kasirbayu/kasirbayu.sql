-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 02:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirbayu`
--

-- --------------------------------------------------------

--
-- Table structure for table `kasirdetailpenjualan`
--

CREATE TABLE `kasirdetailpenjualan` (
  `DetailId` int(11) NOT NULL,
  `penjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasir pelanggan`
--

CREATE TABLE `kasir pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `nomortelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasir penjualan`
--

CREATE TABLE `kasir penjualan` (
  `penjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kasirproduk`
--

CREATE TABLE `kasirproduk` (
  `produkID` int(11) NOT NULL,
  `namaproduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `namauser` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` enum('Admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `namauser`, `Password`, `Level`) VALUES
(888, 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', 'Admin'),
(555, 'petugas', '202cb962ac59075b964b07152d234b70', 'Admin'),
(888, 'bayuu', '202cb962ac59075b964b07152d234b70', 'Admin'),
(123, 'bayu', '202cb962ac59075b964b07152d234b70', 'Admin'),
(1, 'fadil', '202cb962ac59075b964b07152d234b70', 'Admin'),
(345, 'uyab', 'cee631121c2ec9232f3a2f028ad5c89b', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasirdetailpenjualan`
--
ALTER TABLE `kasirdetailpenjualan`
  ADD PRIMARY KEY (`DetailId`);

--
-- Indexes for table `kasir penjualan`
--
ALTER TABLE `kasir penjualan`
  ADD PRIMARY KEY (`penjualanID`);

--
-- Indexes for table `kasirproduk`
--
ALTER TABLE `kasirproduk`
  ADD PRIMARY KEY (`produkID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasirdetailpenjualan`
--
ALTER TABLE `kasirdetailpenjualan`
  MODIFY `DetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasir penjualan`
--
ALTER TABLE `kasir penjualan`
  MODIFY `penjualanID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasirproduk`
--
ALTER TABLE `kasirproduk`
  MODIFY `produkID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
