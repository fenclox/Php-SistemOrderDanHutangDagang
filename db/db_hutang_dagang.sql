-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 06:24 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hutang_dagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` char(5) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `harga` int(9) NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `harga`, `stok`) VALUES
('00001', 'isi cutter', 92000, 40),
('00002', 'buku tulis besar folio', 60000, 75),
('00003', 'odner folio', 350000, 40),
('00004', 'binder clip', 35000, 80),
('00005', 'hard carton', 260000, 60),
('00006', 'spidol permanent hitam', 62000, 40),
('00007', 'pulpen standar hitam', 255000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

-- --------------------------------------------------------

--
-- Table structure for table `detil_po`
--

CREATE TABLE IF NOT EXISTS `detil_po` (
  `kd_po` char(8) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `jumlah_barang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_po`
--

INSERT INTO `detil_po` (`kd_po`, `kd_barang`, `jumlah_barang`) VALUES
('17090601', '00001', 10),
('17090602', '00004', 10),
('17090603', '00003', 10),
('17090603', '00005', 10),
('17090604', '00005', 10),
('17090604', '00002', 10),
('17090605', '00001', 20),
('17091001', '00001', 10),
('17091002', '00002', 25),
('17091901', '00001', 10),
('17091902', '00006', 13),
('17092901', '00006', 10),
('17092902', '00005', 25),
('17092903', '00004', 30),
('17092904', '00002', 15),
('17092904', '00002', 15),
('17100301', '00001', 20),
('17100302', '00002', 10);

-- --------------------------------------------------------

--
-- Table structure for table `detil_ttb`
--

CREATE TABLE IF NOT EXISTS `detil_ttb` (
  `kd_ttb` char(8) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `jumlah_terima` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_ttb`
--

INSERT INTO `detil_ttb` (`kd_ttb`, `kd_barang`, `jumlah_terima`) VALUES
('06091701', '00005', 10),
('06091701', '00003', 10),
('06091702', '00001', 10),
('06091703', '00005', 10),
('06091703', '00002', 10),
('06091704', '00001', 20),
('29091701', '00006', 10),
('29091702', '00004', 30),
('29091703', '00002', 35),
('03101701', '00001', 20),
('03101702', '00002', 10);

--
-- Triggers `detil_ttb`
--
DELIMITER $$
CREATE TRIGGER `stok_after_cttb` AFTER DELETE ON `detil_ttb`
 FOR EACH ROW UPDATE barang SET stok = stok - OLD.jumlah_terima
    where kd_barang = OLD.kd_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_after_ttb` AFTER INSERT ON `detil_ttb`
 FOR EACH ROW update barang set stok= stok + new.jumlah_terima
    where kd_barang=new.kd_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `kd_pegawai` char(4) NOT NULL,
  `nm_pegawai` varchar(30) NOT NULL,
  `bagian` varchar(15) DEFAULT NULL,
  `alamat_pegawai` text NOT NULL,
  `no_telp_pegawai` varchar(13) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kd_pegawai`, `nm_pegawai`, `bagian`, `alamat_pegawai`, `no_telp_pegawai`, `password`, `level`) VALUES
('0000', 'Anonymous', 'Admin', 'Tangerang', '081890901010', 'test', '0'),
('0001', 'hartono paulus', 'Manager', 'Tangerang', '081388250646', 'test', '4'),
('0002', 'lisa', 'Purchasing', 'Jakarta', '08979385980', 'test', '1'),
('0003', 'evi', 'Gudang', 'Jakarta', '086810036796', 'test', '2'),
('0004', 'laily', 'Finance', 'Tangerang', '085744334343', 'test', '3');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `kd_pembayaran` char(13) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `no_si` char(13) NOT NULL,
  `jumlah_pembayaran` int(9) NOT NULL,
  `file_tf` text NOT NULL,
  `nm_penerima` varchar(30) NOT NULL,
  `no_rek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kd_pembayaran`, `tgl_pembayaran`, `no_si`, `jumlah_pembayaran`, `file_tf`, `nm_penerima`, `no_rek`) VALUES
('0534251709297', '2017-09-29', '1709290533091', 206667, '29092017053807.pdf', 'PT astri duta', '99100567890'),
('0547411709295', '2017-09-29', '1709290546495', 350000, '29092017054823.pdf', 'risa', '100345689100'),
('0615441709299', '2017-09-29', '1709290614582', 1050000, '29092017061622.pdf', 'ria', '10056890001'),
('1215351709066', '2017-09-06', '1709061214510', 104167, '06092017121605.pdf', 'luffy', '616161661616161'),
('1216201709060', '2017-09-06', '1709061214510', 104167, '06092017121638.pdf', 'luffy', '616161661616161'),
('1252221710030', '2017-10-03', '1710031251383', 100000, '03102017125308.pdf', 'zzz', '010101011111111'),
('1253351710032', '2017-10-03', '1710031251538', 100000, '03102017125348.pdf', 'zzzzz', '010101011111111');

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `si_after_pembayaran` AFTER INSERT ON `pembayaran`
 FOR EACH ROW update salinan_invoice set cicilan_ke=cicilan_ke+1, total_pembayaran=total_pembayaran+new.jumlah_pembayaran
    where no_si=new.no_si
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE IF NOT EXISTS `po` (
  `kd_po` char(8) NOT NULL,
  `tgl_po` date NOT NULL,
  `status_po` enum('0','1','2','3') NOT NULL,
  `kd_pegawai` char(4) NOT NULL,
  `kd_supplier` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`kd_po`, `tgl_po`, `status_po`, `kd_pegawai`, `kd_supplier`) VALUES
('17090601', '2017-09-06', '3', '0003', '001'),
('17090602', '2017-09-06', '2', '0003', '002'),
('17090603', '2017-09-06', '3', '0003', '002'),
('17090604', '2017-09-06', '3', '0003', '002'),
('17090605', '2017-09-06', '3', '0003', '002'),
('17091001', '2017-09-10', '2', '0002', '001'),
('17091002', '2017-09-10', '1', '0002', '002'),
('17091901', '2017-09-19', '2', '0003', '001'),
('17091902', '2017-09-19', '1', '0000', '006'),
('17092901', '2017-09-29', '3', '0003', '003'),
('17092902', '2017-09-29', '1', '0003', '004'),
('17092903', '2017-09-29', '3', '0003', '004'),
('17092904', '2017-09-29', '3', '0003', '004'),
('17100301', '2017-10-03', '3', '0003', '006'),
('17100302', '2017-10-03', '3', '0003', '004');

-- --------------------------------------------------------

--
-- Table structure for table `salinan_invoice`
--

CREATE TABLE IF NOT EXISTS `salinan_invoice` (
  `no_si` char(13) NOT NULL,
  `tgl_si` date NOT NULL,
  `total_tagihan` int(9) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `batas_cicilan` int(2) NOT NULL,
  `total_pembayaran` int(9) NOT NULL,
  `cicilan_ke` int(2) NOT NULL,
  `kd_ttb` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salinan_invoice`
--

INSERT INTO `salinan_invoice` (`no_si`, `tgl_si`, `total_tagihan`, `tgl_jatuh_tempo`, `batas_cicilan`, `total_pembayaran`, `cicilan_ke`, `kd_ttb`) VALUES
('1709061157221', '2017-09-06', 4550000, '2018-04-20', 12, 0, 0, '06091701'),
('1709061203380', '2017-09-06', 950000, '2018-03-02', 12, 0, 0, '06091702'),
('1709061214510', '2017-09-06', 1250000, '2018-03-03', 12, 208334, 2, '06091703'),
('1709101411325', '2017-09-10', 1900000, '2017-10-09', 12, 0, 0, '06091704'),
('1709290533091', '2017-09-29', 620000, '2017-10-29', 3, 206667, 1, '29091701'),
('1709290546495', '2017-09-29', 1050000, '2017-10-29', 3, 350000, 1, '29091702'),
('1709290614582', '2017-09-29', 2100000, '2017-10-29', 2, 1050000, 1, '29091703'),
('1710031251383', '2017-10-03', 1840000, '2018-02-08', 10, 100000, 1, '03101701'),
('1710031251538', '2017-10-03', 600000, '2018-01-02', 10, 100000, 1, '03101702');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kd_supplier` char(3) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `npwp` char(15) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_telp_supplier` varchar(13) NOT NULL,
  `email_supplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `npwp`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`) VALUES
('001', 'PT Sinar Jaya Utama', '131566790084589', 'Jl. Karet No. 21 Kawasan Industri Karet, Cadas, Sepatan, Karet, Tangerang Banten 15520', '02159373304', 'sinarjayautama@gmail.com'),
('002', 'PT persada selaras indonesia', '133159900057007', 'Jl. Permata Raya Ruko Permata Niaga 3 No. 11-12 Taman Royal 1, Tanah Tinggi, Tangerang Banten 15119', '02129238175', 'selarasindonesia@gmail.com'),
('003', 'PT astri duta pertiwi', '136000761599842', 'Jl. H. Soleh 1 No.88 (Kebon Jeruk), Jakarta Barat, Jakarta', '02129938760', 'indonesiajaya@gmail.com'),
('004', 'PT sinar dunia logam', '130067001567899', 'Jl. Sunter Agung Utara III Blok A36C No. 16 Jakarta Utara 14350', '021230675478', 'info@sinardunialogam.com'),
('006', 'pt astra international', '150669067157393', 'Tangerang', '021335978502', 'Astrainternational@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ttb`
--

CREATE TABLE IF NOT EXISTS `ttb` (
  `kd_ttb` char(8) NOT NULL,
  `tgl_ttb` date NOT NULL,
  `no_sj` varchar(10) NOT NULL,
  `no_kendaraan` varchar(11) NOT NULL,
  `nm_supir` varchar(50) NOT NULL,
  `kd_pegawai` char(4) NOT NULL,
  `kd_po` char(8) NOT NULL,
  `status_ttb` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttb`
--

INSERT INTO `ttb` (`kd_ttb`, `tgl_ttb`, `no_sj`, `no_kendaraan`, `nm_supir`, `kd_pegawai`, `kd_po`, `status_ttb`) VALUES
('03101701', '2017-10-03', '1212333312', 'B22R', 'kardel', '0003', '17100301', '1'),
('03101702', '2017-10-03', '3323223232', 'B22DD', 'kardel', '0003', '17100302', '1'),
('06091701', '2017-09-06', '9090999999', 'B1151A', 'baron', '0003', '17090603', '1'),
('06091702', '2017-09-06', '9191291291', 'A47KA', 'aaron', '0003', '17090601', '1'),
('06091703', '2017-09-06', '9090909090', 'B121ASD', 'maaron', '0003', '17090604', '1'),
('06091704', '2017-09-06', '8880808080', 'B90SI', 'zaaron', '0003', '17090605', '1'),
('29091701', '2017-09-29', '0100', 'B6489CA', 'supri', '0003', '17092901', '1'),
('29091702', '2017-09-29', '01001', 'B3288EA', 'anton', '0002', '17092903', '1'),
('29091703', '2017-09-29', '1002', 'B3188AA', 'indra', '0003', '17092904', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detil_po`
--
ALTER TABLE `detil_po`
  ADD KEY `fkkdpo_po` (`kd_po`),
  ADD KEY `fkkdbrg_barang` (`kd_barang`);

--
-- Indexes for table `detil_ttb`
--
ALTER TABLE `detil_ttb`
  ADD KEY `detil_ttb_ibfk_1` (`kd_barang`),
  ADD KEY `kd_ttb` (`kd_ttb`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `no_si` (`no_si`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`kd_po`),
  ADD KEY `kd_supplier` (`kd_supplier`),
  ADD KEY `kd_pegawai` (`kd_pegawai`);

--
-- Indexes for table `salinan_invoice`
--
ALTER TABLE `salinan_invoice`
  ADD PRIMARY KEY (`no_si`),
  ADD KEY `kd_ttb` (`kd_ttb`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indexes for table `ttb`
--
ALTER TABLE `ttb`
  ADD PRIMARY KEY (`kd_ttb`),
  ADD KEY `ttb_ibfk_1` (`kd_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_po`
--
ALTER TABLE `detil_po`
  ADD CONSTRAINT `fkkdbrg_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `fkkdpo_po` FOREIGN KEY (`kd_po`) REFERENCES `po` (`kd_po`);

--
-- Constraints for table `detil_ttb`
--
ALTER TABLE `detil_ttb`
  ADD CONSTRAINT `detil_ttb_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_ttb_ibfk_2` FOREIGN KEY (`kd_ttb`) REFERENCES `ttb` (`kd_ttb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`no_si`) REFERENCES `salinan_invoice` (`no_si`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `po_ibfk_2` FOREIGN KEY (`kd_pegawai`) REFERENCES `pegawai` (`kd_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salinan_invoice`
--
ALTER TABLE `salinan_invoice`
  ADD CONSTRAINT `salinan_invoice_ibfk_1` FOREIGN KEY (`kd_ttb`) REFERENCES `ttb` (`kd_ttb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ttb`
--
ALTER TABLE `ttb`
  ADD CONSTRAINT `ttb_ibfk_1` FOREIGN KEY (`kd_pegawai`) REFERENCES `pegawai` (`kd_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
