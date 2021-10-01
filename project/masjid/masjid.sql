-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 01, 2011 at 11:49 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `masjid`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `artikel`
-- 

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL auto_increment,
  `judul` varchar(255) default NULL,
  `isi` text,
  `post` datetime default NULL,
  `pengirim` varchar(50) default NULL,
  `page` enum('artikel','home','kontak') default NULL,
  `foto` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `artikel`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `datamasjid`
-- 

CREATE TABLE `datamasjid` (
  `email` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `propinsi` varchar(30) NOT NULL,
  `luastotal` varchar(20) NOT NULL,
  `luasbangunan` varchar(20) NOT NULL,
  `statustanah` varchar(20) NOT NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `datamasjid`
-- 

INSERT INTO `datamasjid` (`email`, `nama`, `alamat`, `kota`, `kabupaten`, `propinsi`, `luastotal`, `luasbangunan`, `statustanah`) VALUES 
('123', '23', '31', 'yogyakarta', 'yogyakarta', 'yogyakarta', '-', '-', '-'),
('a@yahoo.com', 'masjid Annur', 'klaten', 'bayat', 'klaten', 'jawa tengah', '30 M2', '20 M2', 'hibah');

-- --------------------------------------------------------

-- 
-- Table structure for table `fakir`
-- 

CREATE TABLE `fakir` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `fakir`
-- 

INSERT INTO `fakir` (`id`, `nama`, `jk`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES 
(1, 'erna', 'Pria', 'Diploma / D1', 'as', '2011-01-01', 'as'),
(2, 'juminten', 'Pria', 'Diploma / D1', 'jogja', '1994-10-18', 'jogja');

-- --------------------------------------------------------

-- 
-- Table structure for table `inventaris`
-- 

CREATE TABLE `inventaris` (
  `no_inventaris` varchar(10) NOT NULL,
  `nm_barang` varchar(20) default NULL,
  `resume` varchar(60) default NULL,
  `asal_barang` varchar(25) default NULL,
  `tgl_pengadaan` date default NULL,
  `harga_barang` double default NULL,
  `kondisi` varchar(10) default NULL,
  PRIMARY KEY  (`no_inventaris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `inventaris`
-- 

INSERT INTO `inventaris` (`no_inventaris`, `nm_barang`, `resume`, `asal_barang`, `tgl_pengadaan`, `harga_barang`, `kondisi`) VALUES 
('123', '213', '23', '23', '2011-01-01', 100000, '121'),
('12323 32 3', 'Kamera Digital', 'masih bagus dan keren', 'bantuan warga''', '1992-10-19', 1000000, 'bagus');

-- --------------------------------------------------------

-- 
-- Table structure for table `jadwal`
-- 

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL auto_increment,
  `hari` varchar(15) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `jadwal`
-- 

INSERT INTO `jadwal` (`id`, `hari`, `jam`, `jenis`) VALUES 
(2, 'selasa', '15.30', 'TPA anak-anak'),
(3, '353', '324', '2343');

-- --------------------------------------------------------

-- 
-- Table structure for table `jamaah`
-- 

CREATE TABLE `jamaah` (
  `id` int(11) NOT NULL auto_increment,
  `nmkepala` varchar(50) NOT NULL,
  `nmistri` varchar(50) NOT NULL,
  `jmlanggota` double NOT NULL,
  `namaanaklk` varchar(150) NOT NULL,
  `namaanakpr` varchar(150) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendapatan` double NOT NULL,
  `kendaraan` varchar(40) NOT NULL,
  `kwalitasrumah` varchar(30) NOT NULL,
  `luasrumah` varchar(30) NOT NULL,
  `kategoriklrga` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `jamaah`
-- 

INSERT INTO `jamaah` (`id`, `nmkepala`, `nmistri`, `jmlanggota`, `namaanaklk`, `namaanakpr`, `pekerjaan`, `pendapatan`, `kendaraan`, `kwalitasrumah`, `luasrumah`, `kategoriklrga`) VALUES 
(1, 'paijo', 'sarmini', 4, 'tukijo 16 tahun, paiman 19 tahun', 'jumia 14 tahun, sarmini 3 tahun', 'pedagang', 2000000, 'Honda CRV', 'Bagus', '23 M2', 'Kaya'),
(3, '1', '1', 1, '1', '1', '1', 3000000, '1', '1', '1', '1'),
(4, '2', '2', 2, '2', '2', '2', 3500000, '2', '2', '2', '2');

-- --------------------------------------------------------

-- 
-- Table structure for table `janda`
-- 

CREATE TABLE `janda` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `janda`
-- 

INSERT INTO `janda` (`id`, `nama`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES 
(1, 'qwewe', 'Diploma / D1', 'wqe', '2011-01-01', 'qwe'),
(3, 'rusmi', 'Diploma / D1', 'jogja', '1993-05-19', 'jogja');

-- --------------------------------------------------------

-- 
-- Table structure for table `kegiatan`
-- 

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL auto_increment,
  `tanggal` date NOT NULL,
  `jam` varchar(15) NOT NULL,
  `pemateri` varchar(50) NOT NULL,
  `materi` varchar(60) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `kegiatan`
-- 

INSERT INTO `kegiatan` (`id`, `tanggal`, `jam`, `pemateri`, `materi`, `jenis`) VALUES 
(1, '1996-04-18', '23:19', 'windiarto nugroho', 'indahnya perniakahan dini', 'pengajian remaja'),
(2, '2011-01-17', '17.00', 'werwer', 'ewrer', 'ewrewr');

-- --------------------------------------------------------

-- 
-- Table structure for table `mustahiq`
-- 

CREATE TABLE `mustahiq` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `mustahiq`
-- 

INSERT INTO `mustahiq` (`id`, `nama`, `jk`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`, `pekerjaan`) VALUES 
(1, 'qwqw', 'Pria', 'Diploma / D1', 'qw', '2011-01-01', 'qw', 'qw'),
(2, '34545', 'Pria', 'Diploma / D1', '345', '2011-01-01', '345', '435');

-- --------------------------------------------------------

-- 
-- Table structure for table `muzaqi`
-- 

CREATE TABLE `muzaqi` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `muzaqi`
-- 

INSERT INTO `muzaqi` (`id`, `nama`, `jk`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`, `pekerjaan`) VALUES 
(1, 'waginem', 'Pria', 'Diploma / D1', 'we', '2011-01-01', 'we', 'we'),
(2, 'wert', 'Pria', 'Diploma / D1', 'ert', '2011-01-01', 'ert', 'rt');

-- --------------------------------------------------------

-- 
-- Table structure for table `nisob`
-- 

CREATE TABLE `nisob` (
  `hargamas` double NOT NULL,
  `batas` double NOT NULL,
  PRIMARY KEY  (`hargamas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `nisob`
-- 

INSERT INTO `nisob` (`hargamas`, `batas`) VALUES 
(300000, 25500000);

-- --------------------------------------------------------

-- 
-- Table structure for table `pegawai`
-- 

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL auto_increment,
  `nik` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `jbtn` varchar(25) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `pendidikan` (`pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `pegawai`
-- 

INSERT INTO `pegawai` (`id`, `nik`, `nama`, `jk`, `jbtn`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES 
(1, '20050001', 'Eka Andriyanto', 'Pria', 'Ketua Takmir', 'Diploma / D3', 'Kulon Progo', '1982-04-16', 'Wiladek RT 04/17 wiladek Karangmojo'),
(24, '1111', '111', 'Wanita', '111', 'Sarjana S1', '111', '1995-05-15', '111'),
(25, '3', '-', 'Pria', '-', 'Diploma / D1', '-', '2011-01-01', '-');

-- --------------------------------------------------------

-- 
-- Table structure for table `pemasukan`
-- 

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL auto_increment,
  `pemberi` varchar(40) NOT NULL,
  `besarnya` double NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `pemasukan`
-- 

INSERT INTO `pemasukan` (`id`, `pemberi`, `besarnya`, `jenis`, `tanggal`) VALUES 
(1, 'Nugroho', 1800000, 'Zakat', '2003-08-11'),
(2, 'Nurhayati', 1000000, 'Sodaqoh', '1994-03-18');

-- --------------------------------------------------------

-- 
-- Table structure for table `pendidikan`
-- 

CREATE TABLE `pendidikan` (
  `tingkat` varchar(30) NOT NULL,
  PRIMARY KEY  (`tingkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `pendidikan`
-- 

INSERT INTO `pendidikan` (`tingkat`) VALUES 
('Diploma / D1'),
('Diploma / D3'),
('Diploma / D4'),
('Sarjana S1'),
('Sarjana S1 Profesi'),
('Sarjana S2 / SP'),
('SMP'),
('SMU'),
('Tidak Sekolah');

-- --------------------------------------------------------

-- 
-- Table structure for table `pengeluaran`
-- 

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL auto_increment,
  `pengurus` varchar(50) NOT NULL,
  `besarnya` double NOT NULL,
  `keperluan` varchar(60) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `pengeluaran`
-- 

INSERT INTO `pengeluaran` (`id`, `pengurus`, `besarnya`, `keperluan`, `tanggal`) VALUES 
(1, 'Windiarto nugroho', 110000, 'Beli lampu depan masjid', '1997-06-17'),
(4, '5', 100000, '5', '2011-01-01');

-- --------------------------------------------------------

-- 
-- Table structure for table `sesion`
-- 

CREATE TABLE `sesion` (
  `user` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `sesion`
-- 

INSERT INTO `sesion` (`user`) VALUES 
('ADMIN');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `nip` varchar(25) NOT NULL,
  `usere` varchar(600) NOT NULL default '',
  `passwordte` varchar(600) default NULL,
  `type` enum('ADMIN','PEGAWAI','DOSEN','OPERATOR') NOT NULL,
  KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` (`nip`, `usere`, `passwordte`, `type`) VALUES 
('ADMIN', 'admin', 'admin', 'ADMIN');

-- --------------------------------------------------------

-- 
-- Table structure for table `yatim`
-- 

CREATE TABLE `yatim` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `yatim`
-- 

INSERT INTO `yatim` (`id`, `nama`, `jk`, `pendidikan`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES 
(26, 'paijo', 'Pria', 'Diploma / D1', 'asas', '1995-07-17', 'asas'),
(27, 'painem', 'Wanita', 'Diploma / D1', 'klaten', '2011-01-01', 'klaten');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `pegawai`
-- 
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`pendidikan`) REFERENCES `pendidikan` (`tingkat`) ON UPDATE CASCADE;
