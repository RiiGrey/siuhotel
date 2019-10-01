-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.40-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk sisfohotel
CREATE DATABASE IF NOT EXISTS `sisfohotel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sisfohotel`;

-- membuang struktur untuk table sisfohotel.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `idkamar` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  PRIMARY KEY (`idkamar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.kamar: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`) VALUES
	(1, 'Superior', 5, 410000, 'Standard.jpg'),
	(2, 'Deluxe', 41, 450000, 'Superior.jpg'),
	(3, 'Junior Suite', 4, 700000, 'Deluxe.jpg'),
	(4, 'Executive', 2, 1200000, 'Junior-Suite.jpg');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;

-- membuang struktur untuk table sisfohotel.kontak
CREATE TABLE IF NOT EXISTS `kontak` (
  `idkontak` int(11) NOT NULL AUTO_INCREMENT,
  `idtamu` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pesanuser` text NOT NULL,
  `pesanadmin` text NOT NULL,
  PRIMARY KEY (`idkontak`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.kontak: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` (`idkontak`, `idtamu`, `username`, `pesanuser`, `pesanadmin`) VALUES
	(48, 10, 'ali', 'Halooo....', ''),
	(49, 10, 'ali', '', 'Yoooo'),
	(50, 11, 'inka', 'Tesssss...', '');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;

-- membuang struktur untuk table sisfohotel.login
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.login: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`username`, `password`) VALUES
	('admin', '96010b1989fdee88816b0753c8b6cfc4');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- membuang struktur untuk table sisfohotel.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpesan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_bayaran` int(11) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `norek` varchar(15) NOT NULL,
  `namarek` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.pembayaran: ~13 rows (lebih kurang)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `idpesan`, `nama`, `jumlah_bayaran`, `bank`, `norek`, `namarek`, `bukti_pembayaran`) VALUES
	(1, '37', 'Aljumad', 450000, 'BCA', '1234567890', 'ALJUMAD', '2.jpg'),
	(2, '39', 'Inka Ardya Indrawan', 1400000, 'Mandiri', '33344455566666', 'Inka', '5.jpg'),
	(3, '40', 'Muh. Fahrizal', 1800000, 'BNI', '677777777777777', 'Fahri', '7.jpg'),
	(4, '42', 'Muh. Ade Furkan', 1350000, 'BRI', '493111122233344', 'Furkan', '5.jpg'),
	(5, '45', 'testing', 410000, 'BCA', '123123123123123', 'test', '060.png'),
	(6, '50', 'Aljumad', 43, 'BCA', '123', 'test', '50.jpg'),
	(7, '51', 'Aljumad', 42, 'BCA', '123', 'test', '.jpg'),
	(8, '51', 'Aljumad', 42, 'BCA', '', '', '.jpg'),
	(9, '52', 'Aljumad', 5, 'BCA', '123', 'test', '.jpg'),
	(10, '53', 'Aljumad', 41, 'BCA', '123', 'test', '.png'),
	(15, '51', 'Aljumad', 41, 'BCA', '123', 'test', '.png');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- membuang struktur untuk table sisfohotel.pemesanan
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `idpesan` int(11) NOT NULL AUTO_INCREMENT,
  `tglpesan` datetime NOT NULL,
  `batasbayar` datetime NOT NULL,
  `idkamar` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idtamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lamahari` int(11) NOT NULL DEFAULT '0',
  `totalbayar` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'Pending...',
  PRIMARY KEY (`idpesan`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.pemesanan: ~16 rows (lebih kurang)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
INSERT INTO `pemesanan` (`idpesan`, `tglpesan`, `batasbayar`, `idkamar`, `tipe`, `harga`, `jumlah`, `idtamu`, `nama`, `alamat`, `telepon`, `tglmasuk`, `tglkeluar`, `lamahari`, `totalbayar`, `status`) VALUES
	(36, '2018-05-22 18:26:42', '2018-05-22 23:26:42', 1, 'Superior', 410000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2018-05-22', '2018-05-23', 1, 410000, 'Dibatalkan'),
	(37, '2018-05-22 18:27:45', '2018-05-23 23:27:45', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2018-05-22', '2018-05-23', 1, 450000, 'Dibatalkan'),
	(38, '2018-05-22 22:03:17', '2018-05-23 03:03:17', 2, 'Deluxe', 450000, 1, 11, 'Inka Ardya Indrawan', 'Jl. abcd', '088111222333', '2018-05-22', '2018-05-23', 1, 450000, 'Dibatalkan'),
	(39, '2018-05-22 22:04:53', '2018-05-23 03:04:53', 3, 'Junior Suite', 700000, 1, 11, 'Inka Ardya Indrawan', 'Jl. abcd', '088111222333', '2018-05-23', '2018-05-25', 2, 1400000, 'Dibatalkan'),
	(40, '2018-05-22 22:13:51', '2018-05-23 03:13:51', 2, 'Deluxe', 450000, 2, 12, 'Muh. Fahrizal', 'Jl....', '1234567777', '2018-05-22', '2018-05-24', 2, 1800000, 'Dibatalkan'),
	(41, '2018-05-22 22:24:20', '2018-05-23 03:24:20', 2, 'Deluxe', 450000, 1, 12, 'Muh. Fahrizal', 'Jl....', '1234567777', '2018-05-21', '2018-05-22', 1, 450000, 'Dibatalkan'),
	(42, '2018-05-22 22:29:27', '2018-05-23 03:29:27', 2, 'Deluxe', 450000, 1, 13, 'Muh. Ade Furkan', 'Jlll', '088777888999', '2018-05-22', '2018-05-25', 3, 1350000, 'Berhasil'),
	(43, '2018-05-23 10:19:17', '2018-05-23 15:19:17', 2, 'Deluxe', 450000, 2, 12, 'Muh. Fahrizal', 'Jl....', '1234567777', '2018-05-23', '2018-05-25', 2, 1800000, 'Berhasil'),
	(44, '2018-07-14 14:19:36', '2018-07-14 19:19:36', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2018-07-14', '2018-07-16', 2, 900000, 'Dibatalkan'),
	(45, '2019-09-20 15:40:17', '2019-09-20 20:40:17', 1, 'Superior', 410000, 1, 10, 'testing', 'Jl. qwerty', '081222333444', '2019-09-01', '2019-09-02', 1, 410000, 'Dibatalkan'),
	(46, '2019-09-23 09:18:50', '2019-09-23 14:18:50', 4, 'Executive', 1200000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-01', '2019-09-25', 24, 28800000, 'Dibatalkan'),
	(47, '2019-09-23 09:08:38', '0000-00-00 00:00:00', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-23', '2019-09-24', 1, 450000, 'Dibatalkan'),
	(48, '2019-09-23 09:11:24', '0000-00-00 00:00:00', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-23', '2019-09-24', 1, 450000, 'Dibatalkan'),
	(49, '2019-09-23 10:42:46', '2019-09-23 15:42:46', 1, 'Superior', 410000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-22', '2019-09-23', 1, 410000, 'Dibatalkan'),
	(50, '2019-09-23 20:01:03', '2019-09-24 01:01:03', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-02', '2019-09-24', 22, 9900000, 'Berhasil'),
	(51, '2019-09-24 19:52:47', '2019-09-25 00:52:47', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-24', '2019-09-26', 2, 900000, 'Berhasil'),
	(52, '2019-09-24 19:57:11', '2019-09-25 00:57:11', 1, 'Superior', 410000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-09-23', '2019-09-24', 1, 410000, 'Pending...'),
	(53, '2019-10-01 21:26:05', '2019-10-02 02:26:05', 2, 'Deluxe', 450000, 1, 10, 'Aljumad', 'Jl. qwerty', '081222333444', '2019-10-01', '2019-10-02', 1, 450000, 'Pending...');
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- membuang struktur untuk table sisfohotel.tamu
CREATE TABLE IF NOT EXISTS `tamu` (
  `idtamu` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `level_user` enum('1','2') DEFAULT NULL,
  PRIMARY KEY (`idtamu`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel sisfohotel.tamu: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tamu` DISABLE KEYS */;
INSERT INTO `tamu` (`idtamu`, `username`, `password`, `email`, `nama`, `alamat`, `telepon`, `foto`, `level_user`) VALUES
	(10, 'ali', '202cb962ac59075b964b07152d234b70', 'ali@gmail.com', 'Aljumad', 'Jl. qwerty', '081222333444', 'favicon.png', '2'),
	(11, 'inka', '202cb962ac59075b964b07152d234b70', 'inka@gmail.com', 'Inka Ardya Indrawan', 'Jl. abcd', '088111222333', '', NULL),
	(12, 'fahri', '202cb962ac59075b964b07152d234b70', 'fahri@gmail.com', 'Muh. Fahrizal', 'Jl....', '1234567777', '', NULL),
	(13, 'furkan', '202cb962ac59075b964b07152d234b70', 'furkan@gmail.com', 'Muh. Ade Furkan', 'Jlll', '088777888999', '', NULL),
	(14, 'admin', '202cb962ac59075b964b07152d234b70', '', '', '', '', NULL, '1');
/*!40000 ALTER TABLE `tamu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
