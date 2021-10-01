-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 07:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moduldelapan`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalogbuku`
--

CREATE TABLE IF NOT EXISTS `katalogbuku` (
  `idbuku` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahunterbit` varchar(4) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  PRIMARY KEY (`idbuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalogbuku`
--

INSERT INTO `katalogbuku` (`idbuku`, `judul`, `penulis`, `penerbit`, `tahunterbit`, `cover`, `stok`) VALUES
('BOOK001', '#GILAVINYL', 'Wahyu Acum', 'Bhuana Ilmu Populer', '2017', 'gilavinyl.jpg', 10),
('BOOK002', 'Choosing Death', 'Albert Mudrian', 'Decibel Books', '2015', 'choosingdeath.jpg', 5),
('BOOK003', 'Dark Days', 'Randy Blythe', 'Da Capo', '2016', 'darkdays.jpg', 7),
('BOOK004', 'My Self Scumbag', 'Kimung', 'Minor Books', '2007', 'scumbag.jpg', 17),
('BOOK005', 'Confessions Of A Heretic: The Sacred And The Profane', 'Adam Nergal Darski, Mark Eglin', 'Jawbone', '2015', 'nergal.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `katalogfilm`
--

CREATE TABLE IF NOT EXISTS `katalogfilm` (
  `idfilm` varchar(100) NOT NULL,
  `judulfilm` varchar(100) NOT NULL,
  `rumahproduksi` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `tahunrilis` varchar(4) NOT NULL,
  `sutradara` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  PRIMARY KEY (`idfilm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalogfilm`
--

INSERT INTO `katalogfilm` (`idfilm`, `judulfilm`, `rumahproduksi`, `genre`, `tahunrilis`, `sutradara`, `cover`, `stok`) VALUES
('FILM001', 'Global Metal', 'Banger Films', 'Documentary', '2008', 'Sam Dunn, Scot McFadyen', 'globalmetal.jpg', 3),
('FILM002', 'Metal: A Headbanger''s Journey', 'Banger Films', 'Documentary', '2005', 'Jessica Joy Wise, Sam Dunn, Scot McFadyen', 'headbangerjourney.jpg', 2),
('FILM003', 'Metalhead', 'Cinelicious Pics', 'Fantasy/Drama', '2013', 'Ragnar Bragason', 'metalhead.jpg', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
