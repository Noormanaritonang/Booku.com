-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 02:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(1, 'Buku Pelajaran'),
(2, 'Buku Teknik'),
(3, 'Novel'),
(4, 'Bisnis'),
(5, 'Buku Anak'),
(6, 'Kamus'),
(7, 'Sejarah'),
(8, 'Komik'),
(9, 'Biogafi');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `nama`, `email`, `isi`) VALUES
(0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fedback`
--

CREATE TABLE `fedback` (
  `Comment_Id` int(10) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Customer_Id` int(10) NOT NULL,
  `DateStamp` date NOT NULL,
  `Data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `O_Id` int(11) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Payment_Method` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Product_Id` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `StatusAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_Id`, `User_Id`, `P_Name`, `Image`, `Payment_Method`, `Address`, `Phone`, `Product_Id`, `Quantity`, `Amount`, `Date`, `Status`, `StatusAdmin`) VALUES
(1, 5, 'My Little Ponny', 'images/home/bukubaru2.jpg', '', 'Laguboti', 987654321, 8, 1, 30000, '2018-01-09', 'notChecked', 'notOk'),
(2, 5, 'Kepatuhan Dalam Bisnis Bank', 'images/home/bukubaru1.jpg', '', 'Laguboti', 987654321, 7, 1, 83000, '2018-01-09', 'notChecked', 'notOk'),
(11, 6, 'My Little Ponny', 'images/home/bukubaru2.jpg', '', 'Medan', 1234567890, 8, 4, 120000, '2018-01-10', 'notChecked', 'notOk'),
(12, 1, 'Teknik Gambar Bangunan', 'images/home/buku4.jpg', '', 'Sitoluama', 1234567890, 4, 3, 165000, '2018-01-11', 'notChecked', 'notOk'),
(13, 7, 'My Little Ponny', 'images/home/bukubaru2.jpg', '', 'ricky', 2147483647, 8, 1, 30000, '2018-01-11', 'notChecked', 'notOk'),
(14, 8, 'My Little Ponny', 'images/home/bukubaru2.jpg', '', 'Medan', 1234567890, 8, 2, 60000, '2018-01-11', 'notChecked', 'notOk');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `P_Id` int(10) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Stock` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Width` int(10) NOT NULL,
  `Weight` int(10) NOT NULL,
  `Height` int(10) NOT NULL,
  `Deskripsi` varchar(500) NOT NULL,
  `Pengarang` varchar(100) NOT NULL,
  `BestSeller` varchar(100) NOT NULL,
  `discount` double DEFAULT '0',
  `hargapesan` int(200) NOT NULL,
  `promodiskon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`P_Id`, `Model`, `P_Name`, `Category`, `Stock`, `Price`, `Image`, `Width`, `Weight`, `Height`, `Deskripsi`, `Pengarang`, `BestSeller`, `discount`, `hargapesan`, `promodiskon`) VALUES
(1, 'buku', 'Kamus Inggris Indonesia ', 'Kamus', 10, 35000, 'images/home/buku10.jpg', 50, 50, 50, 'Bagi kau yang ingin mengetahui bahasa inggris lebih dalam dan kesulitan dalam menerjamahkan setiap kata, kini Booku menghadirkan Kamus Lengkap Inggris Indonesia.', 'Hasan Shadily', 'November 2017', 2, 34300, 'Februari 2018'),
(2, 'buku', 'Imitation', 'Komik', 10, 30000, 'images/home/buku7.jpg', 50, 50, 50, 'Park Hyun Man adalah seorang penulis terkenal Indonesia.Kini Hyung panggilan akrab Park Hyung Man menghadirakan sebuah Komik bagi para pencintanya dengan bertajukan nuansa Romance yang berjudul Imitation', 'Park Hyun Man', 'Desember 2017', 2, 0, 'Februari 2018'),
(3, 'buku', 'Pemograman Sistem Pakar', 'Buku Pelajaran', 20, 60000, 'images/home/buku3.jpg', 50, 50, 50, 'Ayo anak IT tunggu apalagi kini telah hadir buku terbaru Pemograman Sistem Pakar yang dibuat oleh Prof. Arie Andriani, Buku ini merupakan Best Seller November 2017 dan merupakan buku terlaris Booku.com', 'Noorman Aritonang', 'November 2017', 4, 0, '20 Januari 2018'),
(4, 'buku', 'Teknik Gambar Bangunan', 'Buku Teknik', 15, 55000, 'images/home/buku4.jpg', 50, 50, 50, 'Teknik Gambar Bangunan telah hadir dalam versi bahasa Indonesia oleh Suparno, menggambar merupakan salah satu kesulitan bagi anak Teknik Sipil dan Bangunan jadi tunngu apalagi, silahkan order langsung di Booku.com', 'Suparno', 'Januari 2018', 3, 0, '30 Januari 2018'),
(5, 'buku', 'Biografi para penemu Dunia', 'Biografi', 25, 43000, 'images/home/buku8.jpg', 50, 50, 50, 'Buku ini dihadirkan oleh seorang Arkeolog sukses yang bernama Cheriatna, Beliau membagi pengalamannya dalam buku ini agar mereka yang ingin mengetahui sejarah penemuan hebat di dunia kita saat ini.', 'Cheriatna', 'Oktober 2017', 5, 0, '23 Januari 2018'),
(6, 'buku', 'Sejarah Dunia yang Tersembunyi', 'Sejarah', 14, 62500, 'images/home/buku9.jpg', 50, 50, 50, 'Bagi kamu yang ingin memecahkan misteri dunia ini lebih dalam, buku ini adalah salah satu jawaban yang tepat untuk mencari tahu jawaban itu, tidak sabar lagi segera pesan di Booku.com', 'Jonathan Black', 'Januari 2017', 5, 0, 'Maret 2018'),
(7, 'buku', 'Kepatuhan Dalam Bisnis Bank', 'Bisnis', 5, 83000, 'images/home/bukubaru1.jpg', 50, 50, 50, 'Kepatuhan Dalam Bisnis Bank adalah salah satu buku yang diterbitkan oleh ikatan Bankir Indonesia, Buku ini sengaja ditujukan bagi para pebisnis oleh para Bankir guna memajukan bisnis bagi para bankir', 'Ikatan Bankir Indonesia', 'Januari 2018\r\n', 1, 0, '14 Februari 2018'),
(8, 'buku', 'My Little Ponny', 'Buku Anak', 30, 30000, 'images/home/bukubaru2.jpg', 50, 50, 50, 'My Little Ponny adalah buku dongeng anak yang menceritakan kisah hidup seorang gadis cantik yang diperebutkan oleh banayak pria, hingga dimana gadis ini akhirnya menemukan sang Pangeran ketika ia dihadang oleh sekumpulan penjahat.', 'SQ Agatha', 'April 2017', 7, 0, '13 Maret 2018'),
(9, 'buku', 'Secrets', 'Novel', 5, 125000, 'images/home/bukubaru4.jpg', 50, 50, 50, 'Secrets merupakan Novel kelima karangan seorang penulis terkenal bernama <b>Jenifah Sebril Manurung</b>. Novel ini menceritakan kisah hidup seorang wanita yang bertahan melawan penyakitnya dimana dikala penghujung hidupnya dia harus melepaskan seorang lelaki yang ia sayangi akibat sakit yang diderita sang gadis.Buku ini merupakan limited edition. Silahkan Langsung di order via <b><i>Booku.com</i></b>', 'Jenyfah Sebril Manurung', 'Januari 2018', 8, 0, '14 April 2018');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `product_id` int(1) NOT NULL,
  `vote` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `Sp_Id` int(10) NOT NULL,
  `P_Id` int(10) NOT NULL,
  `Weight` int(10) NOT NULL,
  `Height` int(10) NOT NULL,
  `Width` int(10) NOT NULL,
  `Shippable` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`Sp_Id`, `P_Id`, `Weight`, `Height`, `Width`, `Shippable`) VALUES
(1, 1, 50, 50, 50, 'Bisa Diantar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) CHARACTER SET utf8 NOT NULL,
  `website` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pesan` text CHARACTER SET utf8 NOT NULL,
  `tanggal` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id`, `nama`, `website`, `pesan`, `tanggal`, `time`) VALUES
(15, 'Nobel', 'Secret', 'Makasih Gan barangnya dh nyampe, hasilnya memuaskan, sesuai gambar', '2018-01-11', '02:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Picture` varchar(100) NOT NULL,
  `Re-Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Email`, `Password`, `Address`, `Phone`, `Type`, `Picture`, `Re-Password`) VALUES
(1, 'Noorman', 'noorman@gmail.com', 'jenifah', 'Sitoluama', 1234567890, 'user', '', ''),
(2, 'Jenyfah', 'jenyfah@gmail.com', 'jeny', 'Medan', 1234567890, 'user', '', ''),
(3, 'josua', 'josua@gmail.com', 'josua', 'Medan', 1234567890, 'user', '', ''),
(4, 'admin', 'jenifah@gmail.com', 'jenifah', 'Medan', 1234567890, 'admin', 'images/home/korak.jpg', 'jenifah'),
(5, 'blibli', 'blibli@gmail.com', 'pabwekita', 'Laguboti', 987654321, 'user', '', ''),
(6, 'tokopedia', 'tokopedia@gmail.com', 'tokopedia', 'Medan', 1234567890, 'user', '', ''),
(7, 'ricky', 'ricky@gmail.com', 'ricky', 'ricky', 2147483647, 'user', '', ''),
(8, 'Ruben', 'ruben@gmail.com', 'ruben', 'Medan', 1234567890, 'user', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`Sp_Id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
