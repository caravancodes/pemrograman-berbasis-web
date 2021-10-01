-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 02:53 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kisikisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE IF NOT EXISTS `gedung` (
  `idGedung` varchar(10) NOT NULL,
  `namaGedung` varchar(100) NOT NULL,
  PRIMARY KEY (`idGedung`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`idGedung`, `namaGedung`) VALUES
('a', 'Gedung A'),
('b', 'Gedung B'),
('c', 'Gedung C'),
('d', 'Gedung D'),
('e', 'Gedung E'),
('f', 'Gedung F');

-- --------------------------------------------------------

--
-- Table structure for table `pinjamruangan`
--

CREATE TABLE IF NOT EXISTS `pinjamruangan` (
  `idPeminjaman` int(10) NOT NULL AUTO_INCREMENT,
  `idRuangan` varchar(10) NOT NULL,
  `namaPeminjam` varchar(100) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `tglPeminjaman` date NOT NULL,
  PRIMARY KEY (`idPeminjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pinjamruangan`
--

INSERT INTO `pinjamruangan` (`idPeminjaman`, `idRuangan`, `namaPeminjam`, `noTelp`, `tglPeminjaman`) VALUES
(1, 'A101', 'Arya Wiguna', '089666666', '2017-03-09'),
(2, 'A101', 'Shervano', '0899189', '2017-03-01'),
(3, 'C101', 'Arys Ganteng', '0888888', '2017-03-11'),
(4, 'A103', 'Aa', '088888', '2017-03-15'),
(5, 'D101', 'Si Ganteng', '08888888', '2017-03-15'),
(6, 'F104', 'Si Agak Ganteng', '08888', '2017-03-15'),
(7, 'A101', 'Arman Maucelana', '08092189', '2017-03-25'),
(8, 'B101', 'sdfuiysh', '08092189', '2017-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `idRuangan` varchar(10) NOT NULL,
  `idGedung` varchar(10) NOT NULL,
  PRIMARY KEY (`idRuangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`idRuangan`, `idGedung`) VALUES
('A101', 'a'),
('A102', 'a'),
('A103', 'a'),
('A104', 'a'),
('A105', 'a'),
('B101', 'b'),
('B102', 'b'),
('B103', 'b'),
('B104', 'b'),
('B105', 'b'),
('C101', 'c'),
('C102', 'c'),
('C103', 'c'),
('C104', 'c'),
('C105', 'c'),
('D101', 'd'),
('D102', 'd'),
('D103', 'd'),
('D104', 'd'),
('D105', 'd'),
('E101', 'e'),
('E102', 'e'),
('E103', 'e'),
('E104', 'e'),
('E105', 'e'),
('F101', 'f'),
('F102', 'f'),
('F103', 'f'),
('F104', 'f'),
('F105', 'f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
