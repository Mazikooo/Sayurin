-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 03:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sayurin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `ID_Admin` int(5) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ID_Admin`, `Username`, `Password`) VALUES
(1, 'asep', '12345'),
(2, 'admin', '444');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `ID_Barang` int(5) NOT NULL,
  `NamaBarang` varchar(100) DEFAULT NULL,
  `Deskripsi` varchar(2000) DEFAULT NULL,
  `Harga` varchar(100) DEFAULT NULL,
  `Gambar` varchar(100) DEFAULT NULL,
  `ID_Penjual` int(5) DEFAULT NULL,
  `ID_Kategori` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`ID_Barang`, `NamaBarang`, `Deskripsi`, `Harga`, `Gambar`, `ID_Penjual`, `ID_Kategori`) VALUES
(20, 'Rawit', ' Varietas cabe rawit berkualitas tinggi ini terpilih dari hasil panen terbaik, dengan kualitas segar', '10000', 'rawit.jpeg', 2, 3),
(23, 'cmd', 'Kami menawarkan beragam produk berkualitas tinggi yang sesuai dengan kebutuhan Mu. Mulai dari Buah dan Sayuran, kami memiliki semuanya.', '50000', 'terongungu.jpg', 2, 2),
(25, 'Paprtika', '“Paprika termasuk dalam sayuran yang memiliki banyak manfaat untuk kesehatan. Beberapa manfaatnya seperti meningkatkan kesehatan mata, mencegah anemia, hingga mempertahankan berat badan sehat.”', '12000', 'paprika.jpg', 2, 4),
(27, 'xxx', 'xxx', '50000', 'mixed-vegetables-pile.jpg', 6, 1),
(28, 'cscs', 'dsdsd', '20000', 'mixed-vegetables-pile-removebg-preview.png', 7, 1),
(29, 'terong', 'terog ungu', '30000', 'terongungu1.jpg', 8, 4),
(30, 'xxxx', 'xxxxxx', '33330', 'product-img-33.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `ID_Berita` int(5) NOT NULL,
  `Judul` varchar(100) DEFAULT NULL,
  `Deskripsi` varchar(100) DEFAULT NULL,
  `Gambar` varchar(100) DEFAULT NULL,
  `Link` varchar(100) DEFAULT NULL,
  `ID_Admin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`ID_Berita`, `Judul`, `Deskripsi`, `Gambar`, `Link`, `ID_Admin`) VALUES
(2, 'Kemarau Tak Berkesudahan, Risiko Asuransi Tani Naik', 'Jakarta, CNBC Indonesia - Kekeringan akibat fenoma el nino yang belakangan terjadi di Indonesia dipr', 'Screenshot_(680).png', 'https://www.cnbcindonesia.com/market/20231012141304-17-480033/kemarau-tak-berkesudahan-risiko-asuran', NULL),
(3, 'Ini Rahasia Swasembada Pangan Era Soeharto yang Dicuri India', ' Tak bisa dipungkiri, suka tidak suka nyatanya jejak zaman Orde Baru era Soeharto menjadi inspirasi ', 'Screenshot_(681).png', 'https://www.cnbcindonesia.com/research/20230910085227-128-471060/ini-rahasia-swasembada-pangan-era-s', NULL),
(6, 'Jurus Petrokimia Gresik Bawa Pertanian Indonesia ke Era Modern', 'BEF merupakan alat ukur kinerja yang bersifat menyeluruh dengan standar internasional dan implementa', 'Screenshot_(682).png', 'https://www.liputan6.com/bisnis/read/5466152/jurus-petrokimia-gresik-bawa-pertanian-indonesia-ke-era', NULL),
(7, '3 Komoditas Ini Sumbang Inflasi, Tapi Tak Disuka Petani', 'Sensus Pertanian 2023 Badan Pusat Statistik (BPS) menunjukkan, komoditas utama pertanian yang ditana', 'Screenshot_(694).png', 'https://www.cnbcindonesia.com/news/20231204122113-4-494322/3-komoditas-ini-sumbang-inflasi-tapi-tak-', NULL),
(8, 'Usaha Pertanian Susut 7,4 Persen dalam 1 Dekade, Sisa 29 Juta di 2023  Baca artikel CNN Indonesia ', 'Usaha Pertanian Susut 7,4 Persen dalam 1 Dekade, Sisa 29 Juta di 2023  Baca artikel CNN Indonesia \"U', '1661392360-perkuliahan-di-ITB3.jpg', 'https://www.cnnindonesia.com/ekonomi/20231204120024-92-1032554/usaha-pertanian-susut-74-persen-dalam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `ID_Kategori` int(5) NOT NULL,
  `NamaKategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`ID_Kategori`, `NamaKategori`) VALUES
(1, 'Batang'),
(2, 'Daun'),
(3, 'Biji'),
(4, 'Buah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `ID_Member` int(5) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `namaKonsumen` varchar(270) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `idKota` int(5) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `No_HP` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`ID_Member`, `Username`, `namaKonsumen`, `Email`, `Password`, `idKota`, `Alamat`, `No_HP`) VALUES
(19, 'asep', 'asep', 'asep@gm', '123', 419, 'congcat', 2147483647),
(25, 'tes', 'ssss', 'svvsvs@scs', '123', 232, 'BOPONGAN', 2147483647),
(26, 'restu', 'restu', 'sccs@sadx', '123', 419, 'BOPONGAN', 2147483647),
(27, 'regavv', 'sdsd', 'sccs@sadx', '123', 196, 'efedfe', 2147483647),
(28, 'budi2', 'budi2', 'svvsvs@scs', '123', 106, 'vv', 2147483647),
(29, 'pratamaa', 'pratamaa', 'svvsvs@scs', '123', 126, 'garut', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `ID_Order` int(5) NOT NULL,
  `TglOrder` date DEFAULT NULL,
  `Ongkir` varchar(100) DEFAULT NULL,
  `kurir` varchar(50) NOT NULL,
  `statusOrder` varchar(50) NOT NULL,
  `ID_Penjual` int(5) DEFAULT NULL,
  `ID_Member` int(5) DEFAULT NULL,
  `ID_Barang` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`ID_Order`, `TglOrder`, `Ongkir`, `kurir`, `statusOrder`, `ID_Penjual`, `ID_Member`, `ID_Barang`) VALUES
(22, '2023-12-04', '60000', 'JNE Oke', 'Belum Bayar', 2, 19, NULL),
(23, '2023-12-04', '60000', 'JNE Oke', 'Belum Bayar', 2, 19, NULL),
(24, '2023-12-04', '60000', 'JNE Oke', 'Belum Bayar', 2, 19, NULL),
(25, '2023-12-04', '18000', 'JNE Oke', 'Belum Bayar', 7, 28, NULL),
(26, '2023-12-04', NULL, 'JNE Oke', 'Belum Bayar', NULL, NULL, NULL),
(27, '2023-12-04', '14000', 'JNE Oke', 'Belum Bayar', 7, 19, NULL),
(28, '2023-12-05', '60000', 'JNE Oke', 'Belum Bayar', 2, 19, NULL),
(29, '2023-12-05', '63000', 'JNE Oke', 'Belum Bayar', 2, 29, NULL),
(30, '2023-12-06', '17000', 'JNE Oke', 'Belum Bayar', 8, 19, NULL),
(31, '2023-12-06', '17000', 'JNE Oke', 'Belum Bayar', 8, 19, NULL),
(32, '2023-12-06', '60000', 'JNE Oke', 'Belum Bayar', 2, 19, NULL),
(33, '2023-12-06', '14000', 'JNE Oke', 'Belum Bayar', 7, 26, NULL),
(34, '2023-12-06', '14000', 'JNE Oke', 'Belum Bayar', 7, 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjual`
--

CREATE TABLE `tbl_penjual` (
  `ID_Penjual` int(5) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `idKota` varchar(10) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `No_Hp` int(20) NOT NULL,
  `NamaToko` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penjual`
--

INSERT INTO `tbl_penjual` (`ID_Penjual`, `Username`, `Password`, `Email`, `idKota`, `Alamat`, `No_Hp`, `NamaToko`) VALUES
(1, 'Pangudiluhur', '12345', '', '', '', 0, 'Pangudiluhur'),
(2, 'aseppp', '123', 'svvsvs@scs', '66', 'BOPONGAN', 867676767, 'aseppp'),
(4, 'xxx', 'xxx', 'xxx@s', '326', 'BOPONGAN', 2147483647, 'xxx'),
(5, 'tes', '123', 'azis@gmail.com', '27', 'BOPONGAN', 2147483647, 'aaa'),
(6, 'budi', '123', 'svvsvs@scs', '125', 'flores', 2147483647, 'budi'),
(7, 'aka', '123', 'svvsvs@scs', '178', 'dd', 2147483647, 'aaa'),
(8, 'gunawan', '123', 'svvsvs@scs', '152', 'jkt', 2147483647, 'gunawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`ID_Barang`),
  ADD KEY `ID_Penjual` (`ID_Penjual`),
  ADD KEY `ID_Kategori` (`ID_Kategori`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`ID_Berita`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`ID_Kategori`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`ID_Member`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`ID_Order`),
  ADD KEY `ID_Penjual` (`ID_Penjual`),
  ADD KEY `ID_Member` (`ID_Member`),
  ADD KEY `ID_Barang` (`ID_Barang`);

--
-- Indexes for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD PRIMARY KEY (`ID_Penjual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `ID_Admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `ID_Barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `ID_Berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `ID_Kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `ID_Member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `ID_Order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  MODIFY `ID_Penjual` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`ID_Penjual`) REFERENCES `tbl_penjual` (`ID_Penjual`),
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`ID_Kategori`) REFERENCES `tbl_kategori` (`ID_Kategori`);

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `tbl_berita_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `tbl_admin` (`ID_Admin`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`ID_Penjual`) REFERENCES `tbl_penjual` (`ID_Penjual`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`ID_Member`) REFERENCES `tbl_member` (`ID_Member`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`ID_Barang`) REFERENCES `tbl_barang` (`ID_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
