-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 03:16 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`username`, `password`) VALUES
('asep', '123'),
('budi', '123'),
('udin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin2`
--

CREATE TABLE `admin2` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin2`
--

INSERT INTO `admin2` (`username`, `password`) VALUES
('asep', '202cb962ac59075b964b07152d234b70'),
('budi', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('tono', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('alex', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e'),
('udin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('siti', '202cb962ac59075b964b07152d234b70'),
('lisa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('dul', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('adi', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `nama_jur`) VALUES
('TE', 'Teknik Elektronika');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_jur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merk_hp`
--

CREATE TABLE `merk_hp` (
  `id_merk` int(10) NOT NULL,
  `nama_merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk_hp`
--

INSERT INTO `merk_hp` (`id_merk`, `nama_merk`) VALUES
(1, 'Nokia'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_hp`
--

CREATE TABLE `tipe_hp` (
  `id_tipe` int(10) NOT NULL,
  `nama_tipe` varchar(20) NOT NULL,
  `id_merk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_hp`
--

INSERT INTO `tipe_hp` (`id_tipe`, `nama_tipe`, `id_merk`) VALUES
(1, '3310', 1),
(2, 'Lumia 930', 1),
(3, '6610', 1),
(4, 'Galaxy S5', 2),
(5, 'Galaxy S6', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `merk_hp`
--
ALTER TABLE `merk_hp`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `tipe_hp`
--
ALTER TABLE `tipe_hp`
  ADD PRIMARY KEY (`id_tipe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
