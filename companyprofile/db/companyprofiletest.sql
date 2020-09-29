-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 09:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companyprofiletest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ask`
--

CREATE TABLE `tbl_ask` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(225) DEFAULT NULL,
  `jawab` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ask`
--

INSERT INTO `tbl_ask` (`id`, `pertanyaan`, `jawab`) VALUES
(1, 'tanya 1', 'jawab 1'),
(2, 'tanya 2', 'jawab 2'),
(3, 'tanya 3', 'jawaba 3'),
(4, 'tanya 4', 'jawab 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `nama`, `image`) VALUES
(1, 'a', 'a.jpg'),
(2, 'b', 'b.jpg'),
(3, 'c', 'c.jpg'),
(5, 'd', 'klik.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

CREATE TABLE `tbl_companyinfo` (
  `id` int(11) NOT NULL,
  `companyname` varchar(75) NOT NULL,
  `tagline` varchar(125) NOT NULL,
  `subtagline` varchar(225) NOT NULL,
  `twitter` varchar(225) NOT NULL,
  `facebook` varchar(225) NOT NULL,
  `instagram` varchar(225) NOT NULL,
  `linkedin` varchar(225) NOT NULL,
  `banner` varchar(225) DEFAULT NULL,
  `icon` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`id`, `companyname`, `tagline`, `subtagline`, `twitter`, `facebook`, `instagram`, `linkedin`, `banner`, `icon`) VALUES
(1, 'ZORACUSTOMID', 'Create Your Personal Product ', 'Our Passion Is Make Our Customer Happy', 'www.twitter.com/zoracustomid', 'www.facebook.com/zoracustomid', 'www.instagram.com/zoracustomid', 'www.linkedin.com/zoracustomid', 'family_mockup.jpg', 'imageedit_1_97803708971.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id`, `kategori`, `deskripsi`) VALUES
(1, 'email', 'emailcoba@email.com'),
(2, 'email', 'email2@email.com'),
(3, 'nomor', '021123123123'),
(4, 'nomor', '021321321321'),
(5, 'alamat', 'jl. alamat 1'),
(6, 'alamat', 'jl. alamat 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menuutama`
--

CREATE TABLE `tbl_menuutama` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menuutama`
--

INSERT INTO `tbl_menuutama` (`id`, `kategori`, `deskripsi`) VALUES
(1, 'About', 'ZoracustomID hadir dengan menawarkan product yang berkualitas premium dan Cetakan super Premium'),
(2, 'Services', 'Kami akan memberikan pelayanan terbaik untuk andaaaaaaaaaaaaaaaaaa'),
(3, 'Portfolio', 'Ini adalah penjelasan dari halaman portfolio'),
(4, 'Testimonial', 'ini adalah penjelasan dari testimonial'),
(5, 'Team', 'Kami mempunyai team yang profesional, yang siap untuk memberikan pelayan terbaik untuk anda'),
(6, 'Contact', 'Anda bisa menghubungi kami dari di bawah ini');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE `tbl_portfolio` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`id`, `kategori`, `nama`, `image`) VALUES
(1, 'Case Cstom', 'Csutom case 1', 'default.jpg'),
(2, 'case custom', 'custom case 2', 'default.jpg'),
(3, 'kaos custom', 'custom kaos 1', 'default.jpg'),
(4, 'kaos custom', 'custom kaos 2', 'default.jpg'),
(5, 'hoodie custom', 'custom hodie 1', 'mockup_avatar.jpg'),
(6, 'hoodie custom', 'custom hoodie 2', 'default.jpg'),
(7, 'mug custom', 'custom mug 1', 'kardus.png'),
(8, 'mug custom ', 'custom mug 2', 'default.jpg'),
(11, 'Casing Custom', 'asdfasdf', 'lemfox.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `detail` text,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `nama`, `detail`, `image`) VALUES
(1, 'Casing Custom', 'zoracustomid menyediakan custom case untuk berbagai jenis HP zoracustomid menyediakan custom case untuk berbagai jenis HP zoracustomid menyediakan custom case untuk berbagai jenis HP zoracustomid menyediakan custom case untuk berbagai jenis HP ', 'default.jpeg'),
(2, 'Kaos Custom', 'zoracustom id menyediakan juga kaos premium dengan warna cetak yang sangat bagus zoracustom id menyediakan juga kaos premium dengan warna cetak yang sangat bagus zoracustom id menyediakan juga kaos premiummmmmmmmmmm', 'BOTOL_BEKAS.jpg'),
(3, 'Hoodie Custom', 'zoracustom id menyediakan juga kaos premium dengan warna cetak yang sangat bagus zoracustom id menyediakan juga kaos premium dengan warna cetak yang sangat bagus zoracustom id menyediakan juga kaos premium dengan warna cetak yang sangat bagus ', 'services.png'),
(4, 'Mug Custom', 'Zoracustomid menyediakan juga mug custom suka-suka Zoracustomid menyediakan juga mug custom suka-suka Zoracustomid menyediakan juga mug custom suka-suka Zoracustomid menyediakan juga mug custom suka-suka ', 'services.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `linkedin` varchar(150) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `nama`, `jabatan`, `twitter`, `facebook`, `instagram`, `linkedin`, `image`) VALUES
(1, 'Team 1', 'jabatan 1', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'default.png'),
(2, 'Team 2', 'Jabatran 2', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'default.png'),
(3, 'Team 3', 'Jabatan 3', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'default.png'),
(5, 'Team 4', 'Team 4', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'me.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `detail` varchar(225) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimoni`
--

INSERT INTO `tbl_testimoni` (`id`, `nama`, `jabatan`, `detail`, `image`) VALUES
(1, 'User 1', 'Jabatan 1', 'testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni ', 'testimoni.png'),
(2, 'user 2', 'jabatan 2', 'testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni ', 'testimoni.png'),
(3, 'user 3', 'jabatan 3', 'testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni ', 'testimoni.png'),
(4, 'user 4', 'jabatan 4', 'testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni ', 'testimoni.png'),
(5, 'user 5', 'jabatan 5', 'testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni testimoni ', 'default.jpg'),
(7, 'user 6', 'jabatan 6', 'bagus banget bagus banget bagus banget bagus banget bagus banget bagus banget bagus banget bagus banget bagus banget bagus banget ', 'testimoni.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` int(1) DEFAULT NULL,
  `image` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `username`, `password`, `role`, `image`) VALUES
(1, 'Muhammad Najibullah Safari', 'admin', '$2y$10$VFeGM2FIp91Nav3cpfRZEO9Kq6RaU8EHUsMTzFdGNFujlSPzoWskm', 2, 'amirah.png'),
(10, 'User Operator', 'user', '$2y$10$eQB01Pq2ZiaOspiKcxgXeuzSX1F5Wb1DeK6QXaive/CoxIDSoMK8u', 1, 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ask`
--
ALTER TABLE `tbl_ask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menuutama`
--
ALTER TABLE `tbl_menuutama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ask`
--
ALTER TABLE `tbl_ask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menuutama`
--
ALTER TABLE `tbl_menuutama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
