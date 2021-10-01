-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 02:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6706160014`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idPeminjaman` int(100) NOT NULL,
  `kodeBuku` varchar(100) NOT NULL,
  `nim` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tglPinjam` date NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `judul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`idPeminjaman`, `kodeBuku`, `nim`, `nama`, `kelas`, `tglPinjam`, `foto`, `judul`) VALUES
(1, 'A1', 2147483647, 'Muhammad Faisal Amir', 'D3IF-40-02', '2017-03-12', 'OP.jpg', 'One Piece'),
(2, 'A2', 2147483647, 'Hudio Hizari', 'D3IF-40-02', '2017-03-12', 'FT.jpg', 'Fairy Tail'),
(3, 'A3', 2147483647, 'Saiful Apriyanto', 'D3IF-40-02', '2017-03-12', 'NT.jpg', 'Naruto'),
(4, 'A4', 2147483647, 'Achmad Dzaky Abrori', 'D3IF-40-02', '2017-03-12', 'DN.jpg', 'Doraemon'),
(5, 'A5', 2147483647, 'Bryan Rafsanzani', 'D3IF-40-02', '2017-03-12', 'CN.jpg', 'Detektif Conan'),
(12, 'A1', 2147483647, 'Lintang Prayogo', 'D3IF-40-02', '2017-03-12', 'OP.jpg', 'One Piece'),
(13, 'A1', 2147483647, 'Ridwan Junaedi', 'D3IF-40-02', '2017-03-12', 'OP.jpg', 'One Piece'),
(14, 'A2', 2147483647, 'Pramana Batu Bara', 'D3IF-40-02', '2017-03-12', 'FT.jpg', 'Fairy Tail'),
(15, 'A3', 2147483647, 'Rizky Eka Maulana', 'D3IF-40-02', '2017-03-12', 'NT.jpg', 'Naruto'),
(16, 'A5', 2147483647, 'Andy Maulana Yusuf', 'D3IF-40-02', '2017-03-12', 'CN.jpg', 'Detektif Conan'),
(17, 'A4', 2147483647, 'Rivkal Sukma Sanjaya', 'D3IF-40-02', '2017-03-12', 'DN.jpg', 'Doraemon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idPeminjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `idPeminjaman` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
