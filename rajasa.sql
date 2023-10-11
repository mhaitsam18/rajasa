-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 10:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `username`, `alamat`, `no_hp`, `avatar`, `tipe`) VALUES
('adm-Admin-6445bbb99650c0.96552805', 'admin@gmail.com', '$2y$10$6ikF3EE2ncF9By8hnNrztuHXu9ZeWK0zstg3cyjwofV5heOPY1z9e', 'Admin', 'admin', 'Admin Address', '081234567890', 'asset/admin/akun/avatar-admin.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `tipe` int(11) NOT NULL,
  `user_status` varchar(250) DEFAULT NULL,
  `last_logout` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `nama`, `username`, `alamat`, `kode_pos`, `no_hp`, `avatar`, `tipe`, `user_status`, `last_logout`) VALUES
('cust-abi-64bfa7a73089f8.49507005', 'm.abizard1123@gmail.com', '$2y$10$7p/ZV5Jd0pN91jRNyZfnEOCJSrOkMHuWLiyG7c9XhpVQKQxoA201C', 'Muhammad Abizard', 'abi', 'Taman Sari Persada, Cluster Lotus B4/12A', '16166', '081386397855', 'asset/customer/akun/1690619185_8f88901fe0cb3a9176a8.jpg', 3, 'active', '7/29/2023, 2:44:43 PM'),
('cust-Customer-6445bb69477750.70474596', 'customer@gmail.com', '$2y$10$DSVhBRR/uijvt.eshHFxUud0EnsWFm2yuLGhYSaV4.VnAZ9pmKq3O', 'Customer', 'customer', 'Customer Address', '12345', '081234567890', 'asset/customer/akun/1690282256_87c741263cfb0cecd994.png', 3, 'deactive', ''),
('cust-Rico-6445ccc362a659.86780964', 'ferdian@gmail.com', '$2y$10$TnrCeSGi62QdEKwbW3Ubyubw.9.KtQvZyVKfcIOzJiwCeU563GSp2', 'Rico Ferdian Maulana', 'ferdian', '', '', '', 'asset/customer/akun/avatar-customer.png', 3, 'deactive', ''),
('cust-Toko-6445e38e1d3d84.38256766', 'tokoberkah@gmail.com', '$2y$10$aXsUv0BLuw5YZy1L27Nmdeu0glsnaJBCXNomt93V3qAMFGJUIAy0S', 'Toko Berkah', 'tokoberkah', '', '', '', 'asset/customer/akun/avatar-customer.png', 3, 'deactive', '');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `tipe` int(11) NOT NULL,
  `user_status` varchar(250) DEFAULT NULL,
  `last_logout` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `email`, `password`, `nama`, `username`, `alamat`, `no_hp`, `avatar`, `tipe`, `user_status`, `last_logout`) VALUES
('dsg-Designer-6445bc9c696ed4.41377364', 'designer@gmail.com', '$2y$10$7p/ZV5Jd0pN91jRNyZfnEOCJSrOkMHuWLiyG7c9XhpVQKQxoA201C', 'Muhammad Joko', 'designer', 'Designer Address', '081234567890', 'asset/customer/akun/1688339934_9ab35981ab0351946494.png', 2, 'active', '7/29/2023, 3:34:29 PM'),
('dsg-Designer2-64ab6aa0010b85.62524177', 'designer2@gmail.com', '$2y$10$PikLHZv.1VXVs71UPKQLTOuLABgYc/x6E.eMcJQYDgzpESizbqhxW', 'Ahmad Brazi', 'designer2', 'Designer 2 Address', '081234567890', 'asset/customer/akun/1688339934_9ab35981ab0351946494.png', 2, 'deactive', '6/20/2021, 10:53:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
('kat-Apron-64908e8a213b54.28616235', 'Apron'),
('kat-Brosur-64908e809555c6.95050517', 'Brosur'),
('kat-Buku-64908df7ead8d9.94071979', 'Buku'),
('kat-Kalender-64908dd5d877b8.48393563', 'Kalender'),
('kat-Kaos-64908e92092b32.23026208', 'Kaos'),
('kat-Pouchbag-64908ea34f21b9.88730624', 'Pouchbag'),
('kat-Totebag-64908e98d5dee2.83869174', 'Totebag'),
('kat-Undangan-64908e74618fc5.80039426', 'Undangan');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `harga` double(65,2) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `gambar3` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rating` double(65,1) NOT NULL,
  `terjual` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `idKategori` varchar(255) NOT NULL,
  `idDesigner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `judul`, `harga`, `deskripsi`, `gambar1`, `gambar2`, `gambar3`, `status`, `rating`, `terjual`, `created`, `idKategori`, `idDesigner`) VALUES
('prod-Apron-64999eae251fc5.13765249', 'Apron Dapur', 120000.00, 'Apron Dapur', 'asset/produk/apron/prod-Apron-64999eae251fc5.13765249-1.png', '', '', 'Ready Stock', 3.8, 15, '2023-06-23 00:00:00', 'kat-Apron-64908e8a213b54.28616235', 'dsg-Designer-6445bc9c696ed4.41377364'),
('prod-Buku-649984547eb7a9.91873158', 'Buku Learn & Play', 80000.00, 'Buku Learn & Play', 'asset/produk/buku/prod-Buku-649984547eb7a9.91873158-1.png', '', '', 'Ready Stock', 4.0, 20, '2023-06-21 00:00:00', 'kat-Buku-64908df7ead8d9.94071979', 'dsg-Designer-6445bc9c696ed4.41377364'),
('prod-Kalender-64908ea34f20f5.08789580', 'Kalender 2023', 75000.00, 'Dicetak di Kertas Art Carton 210 Gram<br>\r\nUkuran 15 x 21cm<br>\r\nPilih Isi Halaman<br>\r\nFinishing Spiral Kawat Putih<br>\r\nHardcover Hitam<br>\r\nCetak Mesin Laser Dua Sisi', 'asset/produk/kalender/prod-Kalender-64908ea34f20f5.08789580-1.png', 'asset/produk/kalender/prod-Kalender-64908ea34f20f5.08789580-2.png', 'asset/produk/kalender/prod-Kalender-64908ea34f20f5.08789580-3.png', 'Ready Stock', 4.2, 100, '2023-06-26 00:00:00', 'kat-Kalender-64908dd5d877b8.48393563', 'dsg-Designer-6445bc9c696ed4.41377364');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_akun`
--

CREATE TABLE `tipe_akun` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipe_akun`
--

INSERT INTO `tipe_akun` (`id_tipe`, `tipe`) VALUES
(1, 'admin'),
(2, 'designer'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(255) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `total_harga` double(10,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_transfer` varchar(255) NOT NULL,
  `idProduk` varchar(255) NOT NULL,
  `idKategori` varchar(255) NOT NULL,
  `idCustomer` varchar(255) NOT NULL,
  `idDesigner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_transaksi`, `tanggal_pengiriman`, `total_harga`, `jumlah`, `status`, `status_transfer`, `idProduk`, `idKategori`, `idCustomer`, `idDesigner`) VALUES
('transaksi-64a5c8422dec03.11190636', '2023-07-06', '0000-00-00', 750000.00, 10, 'On Going', 'Belum', 'prod-Kalender-64908ea34f20f5.08789580', 'kat-Kalender-64908dd5d877b8.48393563', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer-6445bc9c696ed4.41377364'),
('transaksi-64a5f96d86f9e9.51274433', '2023-07-04', '2023-07-06', 750000.00, 10, 'Selesai', 'Selesai', 'prod-Kalender-64908ea34f20f5.08789580', 'kat-Kalender-64908dd5d877b8.48393563', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer-6445bc9c696ed4.41377364'),
('transaksi-64a5f996658f11.19051758', '2023-06-01', '2023-06-02', 1200000.00, 10, 'Selesai', 'Selesai', 'prod-Apron-64999eae251fc5.13765249', 'kat-Apron-64908e8a213b54.28616235', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer-6445bc9c696ed4.41377364'),
('transaksi-64a67f2ac27dd4.15770125', '2022-06-01', '2022-06-02', 160000.00, 2, 'Selesai', 'Selesai', 'prod-Buku-649984547eb7a9.91873158', 'kat-Buku-64908df7ead8d9.94071979', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer-6445bc9c696ed4.41377364'),
('transaksi-64ab6aebd4d054.59866917', '2023-07-02', '2023-07-03', 750000.00, 10, 'Selesai', 'Selesai', 'prod-Kalender-64908ea34f20f5.08789580', 'kat-Kalender-64908dd5d877b8.48393563', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer2-64ab6aa0010b85.62524177'),
('transaksi-64ab95d22f2242.78352978', '2022-03-07', '2022-03-08', 360000.00, 4, 'Selesai', 'Selesai', 'prod-Buku-649984547eb7a9.91873158', 'kat-Buku-64908df7ead8d9.94071979', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer2-64ab6aa0010b85.62524177'),
('transaksi-64acd4844923d9.08558357', '2023-07-11', '0000-00-00', 750000.00, 10, 'On Going', 'Selesai', 'prod-Kalender-64908ea34f20f5.08789580', 'kat-Kalender-64908dd5d877b8.48393563', 'cust-Customer-6445bb69477750.70474596', 'dsg-Designer-6445bc9c696ed4.41377364');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(11) NOT NULL,
  `time` datetime(6) NOT NULL,
  `sender_message_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `receiver_message_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `time`, `sender_message_id`, `receiver_message_id`, `message`) VALUES
(1, '2023-07-29 15:39:27.000000', 'dsg-Designer-6445bc9c696ed4.41377364', 'cust-abi-64bfa7a73089f8.49507005', 'halo kak'),
(2, '2023-07-29 15:39:40.000000', 'dsg-Designer-6445bc9c696ed4.41377364', 'cust-abi-64bfa7a73089f8.49507005', 'mau order desain ya?'),
(3, '2023-07-29 15:39:46.000000', 'cust-abi-64bfa7a73089f8.49507005', 'dsg-Designer-6445bc9c696ed4.41377364', 'iya kak mau order desain nih'),
(4, '2023-07-29 15:39:57.000000', 'dsg-Designer-6445bc9c696ed4.41377364', 'cust-abi-64bfa7a73089f8.49507005', 'kamu mau desain seperti apa?'),
(5, '2023-07-29 15:40:03.000000', 'cust-abi-64bfa7a73089f8.49507005', 'dsg-Designer-6445bc9c696ed4.41377364', 'yang bagus aja kak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkTipe` (`tipe`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkDesigner` (`idDesigner`),
  ADD KEY `fkKategori` (`idKategori`);

--
-- Indexes for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCustomer` (`idCustomer`),
  ADD KEY `transaksi_ibfk_1` (`idDesigner`),
  ADD KEY `idKategori` (`idKategori`),
  ADD KEY `idProduk` (`idProduk`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipe_akun`
--
ALTER TABLE `tipe_akun`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designer`
--
ALTER TABLE `designer`
  ADD CONSTRAINT `fkTipe` FOREIGN KEY (`tipe`) REFERENCES `tipe_akun` (`id_tipe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fkDesigner` FOREIGN KEY (`idDesigner`) REFERENCES `designer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkKategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fkCustomer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idDesigner`) REFERENCES `designer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
