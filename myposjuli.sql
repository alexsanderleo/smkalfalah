-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2022 pada 13.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_customer`
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

--
-- Dumping data untuk tabel `tabel_customer`
--

INSERT INTO `tabel_customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'ridhoa', 'P', '08122711989a', 'Jl.Pekalongan winonga', '0000-00-00 00:00:00', '2022-07-18 13:45:41'),
(2, 'Andiniqa', 'P', '01821982', 'Jl.Winongsaria', '0000-00-00 00:00:00', '2022-07-18 13:39:00'),
(3, 'Misal', 'L', '081227819', 'Alamat jakarta', '2022-07-18 13:43:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produkcategory`
--

CREATE TABLE `tabel_produkcategory` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_produkcategory`
--

INSERT INTO `tabel_produkcategory` (`category_id`, `name`, `created`, `updated`) VALUES
(12, 'makanan', '2022-07-18 17:05:11', NULL),
(13, 'minuman', '2022-07-18 17:05:21', NULL),
(14, 'Laptop', '2022-07-19 10:18:56', NULL),
(15, 'Charger', '2022-07-19 10:19:07', NULL),
(16, 'Mouse', '2022-07-19 10:38:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produkitem`
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
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_produkitem`
--

INSERT INTO `tabel_produkitem` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(3, 'A001', 'Mouse dell', 16, 13, 40000, 0, NULL, '2022-07-19 10:38:43', '2022-07-19 12:13:01'),
(6, 'A002', 'Kue kering', 12, 11, 10000, 0, NULL, '2022-07-19 10:49:32', NULL),
(9, 'A003', 'asas', 15, 13, 12, 0, NULL, '2022-07-20 18:17:46', NULL),
(11, 'A005', 'assss', 15, 13, 12222, 0, 'item-220720-7684ef6f49.jpg', '2022-07-20 18:25:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_produkunit`
--

CREATE TABLE `tabel_produkunit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_produkunit`
--

INSERT INTO `tabel_produkunit` (`unit_id`, `name`, `created`, `updated`) VALUES
(11, 'kilogram', '2022-07-18 17:07:20', NULL),
(12, 'Buah', '2022-07-18 17:07:29', NULL),
(13, 'pcs', '2022-07-19 10:23:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_stock`
--

CREATE TABLE `tabel_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_supplier`
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
-- Dumping data untuk tabel `tabel_supplier`
--

INSERT INTO `tabel_supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '0812278890', 'JL ALAMAT JAKAARTA BLOK A', 'Toko ini toko mebel', '2022-07-17 19:27:00', NULL),
(2, 'Toko B', '0812278890', 'JL.KUDUS', 'INI TOKO ELEKTRONIK', '2022-07-17 19:27:00', NULL),
(6, 'GIGACOMP', '081227899', 'JL.Pekalongan Winong rt 11 rw 01', 'Menyediakan alat komputyer', '2022-07-18 12:04:59', NULL),
(7, 'coba', 'coba', 'cobaalamat', 'deskripsi\r\n', '0000-00-00 00:00:00', NULL),
(11, 'PT.adijaya', '081271289', 'pati', 'jakenan\r\n', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:kasir 3.Walikelas\r\n4.Kaprog'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'alexsander', 'Pati', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Steven', 'Jakarta', 2),
(5, 'kaprog', '5244caa48ef3c9e521321966900066ad5427e59f', 'kaprognamasaiful', 'pekalonganwinong', 4),
(6, 'walikelas', 'c858d81f76993346613bb529f2428236998e33a8', 'walikelasnugrohoadi', 'gunungpanti', 3),
(11, 'msyaiful', 'a3e38bcb75e8bba2ba70c431542f5fa83f07a5c2', 'nama kaprog syaiful', 'jalan syaiful', 4),
(12, 'jajalusernameanyar', '10ab3d448013d6b28824ab1a3e415691363f13e4', 'ikijenengeanyarnew', 'jajalalamat', 2),
(14, 'sitikasir', 'ae743416d3f86e8f2952a7c08c1a343c55236c17', 'siti', 'serutsadang', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_customer`
--
ALTER TABLE `tabel_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `tabel_produkcategory`
--
ALTER TABLE `tabel_produkcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `tabel_produkunit`
--
ALTER TABLE `tabel_produkunit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `tabel_stock`
--
ALTER TABLE `tabel_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_customer`
--
ALTER TABLE `tabel_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_produkcategory`
--
ALTER TABLE `tabel_produkcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tabel_produkunit`
--
ALTER TABLE `tabel_produkunit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tabel_stock`
--
ALTER TABLE `tabel_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabel_supplier`
--
ALTER TABLE `tabel_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_produkitem`
--
ALTER TABLE `tabel_produkitem`
  ADD CONSTRAINT `tabel_produkitem_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tabel_produkcategory` (`category_id`),
  ADD CONSTRAINT `tabel_produkitem_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `tabel_produkunit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `tabel_stock`
--
ALTER TABLE `tabel_stock`
  ADD CONSTRAINT `tabel_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `tabel_produkitem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `tabel_supplier` (`supplier_id`),
  ADD CONSTRAINT `tabel_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
