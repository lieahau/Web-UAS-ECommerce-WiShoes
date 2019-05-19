-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2019 at 07:27 PM
-- Server version: 5.7.24
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
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(8) NOT NULL,
  `id_pembelian` int(8) NOT NULL,
  `id_sepatu` int(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `id_pembelian`, `id_sepatu`, `jumlah`, `harga`) VALUES
(4, 2, 2, 3, 30000),
(5, 5, 5, 6, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(8) NOT NULL,
  `id_sepatu` int(8) NOT NULL,
  `id_penjualan` int(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(8) NOT NULL,
  `id_supplier` int(8) NOT NULL,
  `timestamp` date NOT NULL,
  `pajak` int(11) NOT NULL DEFAULT '0',
  `diskon` int(11) NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_supplier`, `timestamp`, `pajak`, `diskon`, `total_harga`) VALUES
(2, 2, '2019-05-06', 12, 12, 30000),
(3, 1, '2019-05-08', 0, 0, 1000000),
(4, 1, '2019-05-07', 0, 0, 200000),
(5, 2, '2019-05-13', 12, 12, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(8) NOT NULL,
  `id_user` int(8) NOT NULL,
  `timestamp` date NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `id` int(8) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`id`, `Nama`, `merk`, `jenis`, `ukuran`, `stok`, `harga_satuan`, `image`) VALUES
(1, 'Nike Flex 720', 'Nike', 'SportShoes', 38, 5, 1279000, '5cdc5389e7ddc.jpg'),
(2, 'Nike Sholay Thong', 'Nike', 'Sandals', 40, 10, 313900, '5cdc544f65b05.jpg'),
(3, 'Nike Epic React Flyknit', 'Nike', 'SportShoes', 39, 15, 2279000, '5cdc54867c789.jpg'),
(4, 'Nike Renew Rival Shoes', 'Nike', 'SportShoes', 41, 12, 1199000, '5cdc550819aa2.jpg'),
(5, 'Nike Flex 2018', 'Nike', 'RunningShoes', 40, 15, 767900, '5cdc552f52cf5.jpg'),
(6, 'Adidas Lux 3', 'Adidas', 'RunningShoes', 39, 12, 1300000, '5cdc561eabd29.jpg'),
(7, 'Adidas Duramo 9', 'Adidas', 'RunningShoes', 39, 12, 700000, '5cdc56582638b.jpg'),
(8, 'Adidas Falcon', 'Adidas', 'RunningShoes', 42, 15, 650000, '5cdc567ad0a6e.jpg'),
(9, 'Adidas Solar Lt Trainer', 'Adidas', 'SportShoes', 40, 5, 899900, '5cdc569e71ca1.jpg'),
(10, 'Adidas Ultraboost', 'Adidas', 'SportShoes', 41, 7, 3000000, '5cdc57035e8bb.jpg'),
(11, 'Skechers Dit-A', 'Skechers', 'SportShoes', 38, 5, 1199000, '5cdc580c2b6b9.jpg'),
(12, 'Skechers Otg 400', 'Skechers', 'Sandals', 40, 8, 459000, '5cdc583225f0f.jpg'),
(13, 'Skechers Sport Sandals', 'Skechers', 'Sandals', 39, 7, 659000, '5cdc584f6b806.jpg'),
(14, 'Skechers Active', 'Skechers', 'SportShoes', 38, 10, 799900, '5cdc586f15cb8.jpg'),
(15, 'Skechers D\'Lite', 'Skechers', 'SportShoes', 40, 16, 899000, '5cdc588f5b871.jpg'),
(16, 'Vans Ua Era', 'Vans', 'FlatShoes', 38, 18, 899000, '5cdc58c5a954e.jpg'),
(17, 'Vans Ua Old Skool', 'Vans', 'FlatShoes', 40, 37, 949000, '5cdc59355c6f4.jpg'),
(18, 'Vans Ua Court Icon', 'Vans', 'FlatShoes', 38, 7, 999000, '5cdc5968c3de6.jpg'),
(19, 'Vans Ua Authentic', 'Vans', 'FlatShoes', 38, 12, 674100, '5cdc599366ab2.jpg'),
(20, 'Vans Ua Classic-Slip On', 'Vans', 'FlatShoes', 40, 10, 699000, '5cdc5a456c436.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'tes', 'kfljd', '12321'),
(2, 'testing', 'adsdas', 'asdasd'),
(4, 'PT.blabla', 'pl', '0303');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`, `first_name`, `last_name`, `alamat`, `no_telp`) VALUES
(1, 'admin', 'admin@wishoes.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'Admin', 'Admin', 'Jl. Admin', '0808');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_sepatu` (`id_sepatu`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sepatu` (`id_sepatu`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_user_relation` (`id_user`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `pembelian_relation` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id`),
  ADD CONSTRAINT `pembelian_sepatu_relation` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `penjualan_relation` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`),
  ADD CONSTRAINT `penjualan_sepatu_relation` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `supplier_relation` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_user_relation` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
