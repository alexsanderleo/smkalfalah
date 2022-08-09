-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 09:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsarpras`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_customer`
--

CREATE TABLE `tabel_customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_lokasi`
--

CREATE TABLE `tabel_lokasi` (
  `lokasi_id` int(11) NOT NULL,
  `namalokasi` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_lokasi`
--

INSERT INTO `tabel_lokasi` (`lokasi_id`, `namalokasi`, `created`, `updated`) VALUES
(1, 'Lab 1', '2022-08-09 05:37:15', NULL),
(2, 'Lab 2', '2022-08-09 05:37:18', NULL),
(3, 'Lab 3', '2022-08-09 05:37:22', NULL),
(4, 'Lab TPM', '2022-08-09 05:37:27', NULL),
(5, 'Lab simdig', '2022-08-09 05:37:40', NULL),
(6, 'Lab AKT 1', '2022-08-09 05:37:45', '2022-08-09 05:37:56'),
(7, 'Lab AKT 2', '2022-08-09 05:37:51', NULL),
(8, 'Gudang atas', '2022-08-09 05:38:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_peminjam`
--

CREATE TABLE `tabel_peminjam` (
  `peminjam_id` int(11) NOT NULL,
  `namapeminjam` varchar(400) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('kosongi','in','out') NOT NULL,
  `qty` int(11) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggaldikembalikan` date DEFAULT NULL,
  `NIK` varchar(400) DEFAULT NULL,
  `status` enum('diPinjam','diKembalikan') NOT NULL,
  `kondisibarang` varchar(400) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_peminjam`
--

INSERT INTO `tabel_peminjam` (`peminjam_id`, `namapeminjam`, `item_id`, `type`, `qty`, `tanggalpinjam`, `tanggaldikembalikan`, `NIK`, `status`, `kondisibarang`, `user_id`) VALUES
(1, 'Alex sander', 22, 'in', 5, '2022-08-09', '0000-00-00', '-', '', 'Normal', 1),
(2, 'Alex sander', 22, 'in', 5, '2022-08-09', '2022-08-09', '-', 'diKembalikan', 'lecet', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pinjam`
--

CREATE TABLE `tabel_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `namaygpinjam` varchar(200) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `totalpinjambarangunit` varchar(200) NOT NULL,
  `tanggalpinjam` date NOT NULL,
  `tanggaldikembalikan` date NOT NULL,
  `kondisibarangpinjam` varchar(200) NOT NULL,
  `pinjamstatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produkcategory`
--

CREATE TABLE `tabel_produkcategory` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_produkcategory`
--

INSERT INTO `tabel_produkcategory` (`category_id`, `name`, `created`, `updated`) VALUES
(15, 'Charger', '2022-07-19 10:19:07', NULL),
(16, 'Mouse', '2022-07-19 10:38:18', NULL),
(25, 'Laptop', '2022-08-03 19:06:01', NULL),
(26, 'Kabel VGA', '2022-08-09 05:40:46', NULL),
(27, 'Kabel Power', '2022-08-09 05:40:50', NULL),
(28, 'Printer', '2022-08-09 06:19:35', NULL),
(29, 'Keyboard', '2022-08-09 06:28:20', NULL),
(30, 'Komputer', '2022-08-09 06:29:13', NULL),
(31, 'Monitor', '2022-08-09 06:48:50', NULL),
(32, 'Switch', '2022-08-09 06:50:54', NULL),
(33, 'Hub', '2022-08-09 06:51:04', NULL),
(34, 'Router', '2022-08-09 06:51:12', NULL),
(35, 'FO Tool Kit', '2022-08-09 06:55:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produkitem`
--

CREATE TABLE `tabel_produkitem` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `lokasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_produkitem`
--

INSERT INTO `tabel_produkitem` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`, `lokasi_id`) VALUES
(22, 'L001', 'Laptop dell e7440', 25, 13, 3000000, -5, 'item-220809-30274eacdc.jpg', '2022-08-09 05:40:02', NULL, 8),
(23, 'L002', 'Laptop Dell Latitude E5440', 25, 13, 3000000, 0, 'item-220809-434ca86082.jpeg', '2022-08-09 06:32:22', NULL, 8),
(24, 'L003', 'Laptop Lenovo Ideapad 320', 25, 13, 3000000, 0, 'item-220809-cfec00db9b.jpeg', '2022-08-09 06:33:20', NULL, 8),
(25, 'L004', 'Laptop HP Core i3', 25, 13, 3000000, 0, 'item-220809-7826d2cd69.jpeg', '2022-08-09 06:38:19', NULL, 8),
(26, 'L005', 'Laptop HP 14', 25, 13, 3000000, 0, 'item-220809-2186ef7ef4.jpeg', '2022-08-09 06:39:23', NULL, 8),
(27, 'L006', 'Laptop Toshiba PPC-T25001', 25, 13, 3000000, 0, 'item-220809-40645de421.jpeg', '2022-08-09 06:40:32', NULL, 5),
(28, 'P001', 'Printer Canon MP 287', 28, 13, 3000000, 0, 'item-220809-70ca703034.jpeg', '2022-08-09 06:41:39', NULL, 8),
(29, 'K001', 'Keyboard', 29, 13, 50000, 0, 'item-220809-d315c3e242.jpeg', '2022-08-09 06:43:35', NULL, 8),
(30, 'K002', 'Kabel VGA', 26, 13, 50000, 0, 'item-220809-50028ebac6.jpeg', '2022-08-09 06:44:31', NULL, 8),
(31, 'K003', 'Mouse', 16, 13, 50000, 0, 'item-220809-adfab19c60.jpeg', '2022-08-09 06:45:18', NULL, 8),
(32, 'C001', 'Charger Dell Latitude E5440', 15, 13, 50000, 0, 'item-220809-7c63ea5c3f.jpeg', '2022-08-09 06:46:11', NULL, 8),
(33, 'C002', 'Charger HP', 15, 13, 50000, 0, 'item-220809-a72e8c57d2.jpeg', '2022-08-09 06:46:43', NULL, 8),
(34, 'C003', 'Charger Lenovo Ideapad', 15, 13, 50000, 0, 'item-220809-c291252e54.jpeg', '2022-08-09 06:47:16', NULL, 8),
(35, 'K004', 'Kabel Power Adaptor 12vol', 27, 13, 50000, 0, 'item-220809-ede3c09fdf.jpeg', '2022-08-09 07:02:03', NULL, 8),
(36, 'K005', 'Komputer Server', 30, 13, 3000000, 0, 'item-220809-3a62c99099.jpeg', '2022-08-09 07:03:42', NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produkunit`
--

CREATE TABLE `tabel_produkunit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_produkunit`
--

INSERT INTO `tabel_produkunit` (`unit_id`, `name`, `created`, `updated`) VALUES
(11, 'kilogram', '2022-07-18 17:07:20', NULL),
(12, 'Buah', '2022-07-18 17:07:29', NULL),
(13, 'pcs', '2022-07-19 10:23:31', NULL),
(14, 'perunit', '2022-08-03 19:06:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_stock`
--

CREATE TABLE `tabel_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('kosongi','in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `statusperbaikan` enum('kosongi','rusaktotal','rskperbaikan','perawatan') NOT NULL,
  `diperbaikitanggal` date DEFAULT NULL,
  `lokasibarangperbaikan` varchar(400) DEFAULT NULL,
  `keteranganrusak` varchar(400) NOT NULL,
  `barcodekerusakan` varchar(400) DEFAULT NULL,
  `detailperbaikan` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_supplier`
--

CREATE TABLE `tabel_supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_supplier`
--

INSERT INTO `tabel_supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '0812278890', 'JL ALAMAT JAKAARTA BLOK A', 'Toko ini toko mebel', '2022-07-17 19:27:00', '0000-00-00 00:00:00'),
(2, 'Toko B', '0812278890', 'JL.KUDUS', 'INI TOKO ELEKTRONIK', '2019-01-01 19:27:00', '0000-00-00 00:00:00'),
(6, 'GIGACOMP', '081227899', 'JL.Pekalongan Winong rt 11 rw 01', 'Menyediakan alat komputyer', '2022-07-18 12:04:59', '0000-00-00 00:00:00'),
(7, 'coba', 'coba', 'cobaalamat', 'deskripsi\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'PT.adijaya', '081271289', 'pati', 'jakenan\r\n', '2019-01-01 20:15:15', '0000-00-00 00:00:00'),
(32, 'laptop jeneng 2', '1000002', 'ini adalah alamat 2', 'ini percobaan deskripsi 2', '2022-07-02 00:00:00', '0000-00-00 00:00:00'),
(33, 'laptop jeneng 3', '1000003', 'ini adalah alamat 3', 'ini percobaan deskripsi 3', '2022-07-03 00:00:00', '0000-00-00 00:00:00'),
(34, 'laptop jeneng 4', '1000004', 'ini adalah alamat 4', 'ini percobaan deskripsi 4', '2022-07-04 00:00:00', '0000-00-00 00:00:00'),
(36, 'laptop jeneng 6', '1000006', 'ini adalah alamat 6', 'ini percobaan deskripsi 6', '2022-07-06 00:00:00', '0000-00-00 00:00:00'),
(37, 'laptop jeneng 7', '1000007', 'ini adalah alamat 7', 'ini percobaan deskripsi 7', '2022-07-07 00:00:00', '0000-00-00 00:00:00'),
(38, 'laptop jeneng 8', '1000008', 'ini adalah alamat 8', 'ini percobaan deskripsi 8', '2022-07-08 00:00:00', '0000-00-00 00:00:00'),
(39, 'laptop jeneng 9', '1000009', 'ini adalah alamat 9', 'ini percobaan deskripsi 9', '2022-07-09 00:00:00', '0000-00-00 00:00:00'),
(40, 'laptop jeneng 10', '1000010', 'ini adalah alamat 10', 'ini percobaan deskripsi 10', '2022-07-10 00:00:00', '0000-00-00 00:00:00'),
(41, 'laptop jeneng 11', '1000011', 'ini adalah alamat 11', 'ini percobaan deskripsi 11', '2022-07-11 00:00:00', '0000-00-00 00:00:00'),
(42, 'laptop jeneng 12', '1000012', 'ini adalah alamat 12', 'ini percobaan deskripsi 12', '2022-07-12 00:00:00', '0000-00-00 00:00:00'),
(43, 'laptop jeneng 13', '1000013', 'ini adalah alamat 13', 'ini percobaan deskripsi 13', '2022-07-13 00:00:00', '0000-00-00 00:00:00'),
(44, 'laptop jeneng 14', '1000014', 'ini adalah alamat 14', 'ini percobaan deskripsi 14', '2022-07-14 00:00:00', '0000-00-00 00:00:00'),
(45, 'laptop jeneng 15', '1000015', 'ini adalah alamat 15', 'ini percobaan deskripsi 15', '2022-07-15 00:00:00', '0000-00-00 00:00:00'),
(46, 'laptop jeneng 16', '1000016', 'ini adalah alamat 16', 'ini percobaan deskripsi 16', '2022-07-16 00:00:00', '0000-00-00 00:00:00'),
(47, 'laptop jeneng 17', '1000017', 'ini adalah alamat 17', 'ini percobaan deskripsi 17', '2022-07-17 00:00:00', '0000-00-00 00:00:00'),
(48, 'laptop jeneng 18', '1000018', 'ini adalah alamat 18', 'ini percobaan deskripsi 18', '2022-07-18 00:00:00', '0000-00-00 00:00:00'),
(49, 'laptop jeneng 19', '1000019', 'ini adalah alamat 19', 'ini percobaan deskripsi 19', '2022-07-19 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:kasir 3.Walikelas\r\n4.Kaprog',
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'alexsander', 'Pati', 1, ''),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Steven', 'Jakarta', 2, 'kaser'),
(5, 'kaprog', '5244caa48ef3c9e521321966900066ad5427e59f', 'kaprognamasaiful', 'pekalonganwinong', 4, ''),
(6, 'walikelas', 'c858d81f76993346613bb529f2428236998e33a8', 'walikelasnugrohoadi', 'gunungpanti', 3, ''),
(11, 'msyaiful', 'a3e38bcb75e8bba2ba70c431542f5fa83f07a5c2', 'nama kaprog syaiful', 'jalan syaiful', 4, ''),
(12, 'jajalusernameanyar', '10ab3d448013d6b28824ab1a3e415691363f13e4', 'ikijenengeanyarnew', 'jajalalamat', 2, ''),
(14, 'sitikasir', 'ae743416d3f86e8f2952a7c08c1a343c55236c17', 'siti', 'serutsadang', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_customer`
--
ALTER TABLE `tabel_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tabel_lokasi`
--
ALTER TABLE `tabel_lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- Indexes for table `tabel_peminjam`
--
ALTER TABLE `tabel_peminjam`
  ADD PRIMARY KEY (`peminjam_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `namabarangygdipinjam` (`id_barang`),
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tabel_produkcategory`
--
ALTER TABLE `tabel_produkcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `lokasi_id` (`lokasi_id`);

--
-- Indexes for table `tabel_produkunit`
--
ALTER TABLE `tabel_produkunit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tabel_stock`
--
ALTER TABLE `tabel_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_customer`
--
ALTER TABLE `tabel_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_lokasi`
--
ALTER TABLE `tabel_lokasi`
  MODIFY `lokasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tabel_peminjam`
--
ALTER TABLE `tabel_peminjam`
  MODIFY `peminjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_produkcategory`
--
ALTER TABLE `tabel_produkcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tabel_produkunit`
--
ALTER TABLE `tabel_produkunit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_stock`
--
ALTER TABLE `tabel_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_peminjam`
--
ALTER TABLE `tabel_peminjam`
  ADD CONSTRAINT `tabel_peminjam_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tabel_produkitem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_peminjam_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tabel_pinjam`
--
ALTER TABLE `tabel_pinjam`
  ADD CONSTRAINT `tabel_pinjam_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  ADD CONSTRAINT `tabel_produkitem_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tabel_produkcategory` (`category_id`),
  ADD CONSTRAINT `tabel_produkitem_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `tabel_produkunit` (`unit_id`),
  ADD CONSTRAINT `tabel_produkitem_ibfk_3` FOREIGN KEY (`lokasi_id`) REFERENCES `tabel_lokasi` (`lokasi_id`);

--
-- Constraints for table `tabel_stock`
--
ALTER TABLE `tabel_stock`
  ADD CONSTRAINT `tabel_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tabel_produkitem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `tabel_supplier` (`supplier_id`),
  ADD CONSTRAINT `tabel_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
