-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk ilnoise
CREATE DATABASE IF NOT EXISTS `ilnoise` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ilnoise`;

-- membuang struktur untuk table ilnoise.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.admin: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
	(1, 'ardy', 'ardy123', 'Ardillah Setiawan'),
	(2, 'azmi', 'azmi123', 'Azmi Fadillah'),
	(3, 'aldi', 'aldi123', 'M Rivaldi Setiawan'),
	(4, 'alfi', 'alfi123', 'Muhammad Alfiyannor');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.kategori: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
REPLACE INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Kaos'),
	(2, 'Jaket'),
	(3, 'Sweater'),
	(4, 'Topi');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.ongkir
CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.ongkir: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `ongkir` DISABLE KEYS */;
REPLACE INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
	(1, 'Kapuas', 60000),
	(2, 'Banjarmasin', 50000),
	(3, 'Jakarta', 10000),
	(4, 'Bandung', 10000),
	(5, 'Malang', 20000);
/*!40000 ALTER TABLE `ongkir` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `email_pelanggan` varchar(50) DEFAULT NULL,
  `password_pelanggan` varchar(50) DEFAULT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `telepon_pelanggan` varchar(20) DEFAULT NULL,
  `alamat_pelanggan` text,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.pelanggan: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
REPLACE INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
	(1, 'bambang44@gmail.com', 'bambang22', 'Bambang Permana', '089956465674', NULL),
	(2, 'navisa33@gmail.com', 'navnav22', 'Navisa Setiawan', '085537583392', 'mandomai'),
	(4, 'ardisetiawan1305@gmail.com', 'asd', 'ardillah setiawan', '081340804276', 'seroja'),
	(5, 'asd@asd.com', 'asd', 'asd', '123123123', 'asd');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.pembayaran: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
REPLACE INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
	(40, 44, 'ardillah setiawan', 'bca', 594000, '2020-07-20', '20200720174606119279.jpg'),
	(41, 48, 'bambang', 'bca', 1319000, '2020-07-22', '20200722042744dis.jpg'),
	(42, 53, 'ardi', 'bca', 418000, '2020-07-23', '20200723173316dis.jpg'),
	(43, 55, 'ardillah setiawan', 'bca', 618000, '2020-07-23', '20200723181939nota.jpg'),
	(44, 54, 'ardillah setiawan', 'bca', 288000, '2020-07-23', '20200723182108nota.jpg');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL,
  `alamat_pengiriman` text,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(50) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `distrik` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `kodepos` varchar(50) DEFAULT NULL,
  `ekspedisi` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.pembelian: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
REPLACE INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `total_berat`, `provinsi`, `distrik`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
	(45, 5, '2020-07-21', 781000, 'seroja no.95', 'Pending', NULL, 700, 'Kalimantan Tengah', 'Kapuas', 'Kabupaten', '73583', 'pos', 'Paket Kilat Khusus', 43000, '7-8 HARI'),
	(46, 5, '2020-07-21', 586000, 'asd', 'Pending', NULL, 600, 'Lampung', 'Pringsewu', 'Kabupaten', '35719', 'pos', 'Paket Kilat Khusus', 28000, '3-4 HARI'),
	(47, 5, '2020-07-21', 1111000, 'Jalan Seroja No.95', 'Pending', NULL, 1200, 'Kalimantan Tengah', 'Kapuas', 'Kabupaten', '73583', 'pos', 'Paket Kilat Khusus', 43000, '7-8 HARI'),
	(48, 5, '2020-07-21', 1319000, 'Jl. Seroja No.95', 'Barang Dikirim', '9999999', 1450, 'Kalimantan Tengah', 'Kapuas', 'Kabupaten', '73583', 'pos', 'Paket Kilat Khusus', 86000, '7-8 HARI'),
	(49, 5, '2020-07-21', 1052000, 'barito', 'Pending', NULL, 1500, 'Lampung', 'Tanggamus', 'Kabupaten', '35619', 'pos', 'Paket Kilat Khusus', 62000, '3-4 HARI'),
	(50, 5, '2020-07-21', 1374000, 'asdasdasdasdasd', 'Pending', NULL, 1450, 'Kalimantan Utara', 'Nunukan', 'Kabupaten', '77421', 'pos', 'Paket Kilat Khusus', 141000, '9-10 HARI'),
	(51, 5, '2020-07-21', 1155000, 'zzzzzzzzzzzzzzz', 'Pending', NULL, 1200, 'Bengkulu', 'Kaur', 'Kabupaten', '38911', 'pos', 'Paket Kilat Khusus', 39000, '4-5 HARI'),
	(52, 5, '2020-07-22', 733000, 'aghatis', 'Pending', NULL, 850, 'DI Yogyakarta', 'Gunung Kidul', 'Kabupaten', '55812', 'pos', 'Express Next Day Barang', 10000, '1 HARI'),
	(53, 5, '2020-07-23', 418000, 'seroja', 'Pembayaran Selesai', NULL, 750, 'Kalimantan Tengah', 'Kapuas', 'Kabupaten', '73583', 'pos', 'Paket Kilat Khusus', 43000, '7-8 HARI'),
	(54, 5, '2020-07-23', 288000, 'jl.Kuin', 'Pembelian Selesai', '98765432', 500, 'Kalimantan Selatan', 'Banjarmasin', 'Kota', '70117', 'pos', 'Paket Kilat Khusus', 38000, '6-7 HARI'),
	(55, 5, '2020-07-23', 618000, 'jl. kayu tangi', 'Pembayaran Selesai', NULL, 1000, 'Kalimantan Selatan', 'Banjarmasin', 'Kota', '70117', 'pos', 'Paket Kilat Khusus', 38000, '6-7 HARI'),
	(56, 5, '2020-07-24', 125000, 'seroja', 'Pending', NULL, 250, '', '', '', '', '', '', 0, '');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.pembelian_produk
CREATE TABLE IF NOT EXISTS `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subharga` int(11) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `subberat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.pembelian_produk: ~11 rows (lebih kurang)
/*!40000 ALTER TABLE `pembelian_produk` DISABLE KEYS */;
REPLACE INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`, `berat_produk`, `subberat`) VALUES
	(53, 50, 18, 3, 'Einstein', 165000, 495000, 250, 750),
	(54, 50, 22, 2, 'All Racism', 369000, 738000, 350, 700),
	(55, 51, 27, 2, 'Typolist', 279000, 558000, 300, 600),
	(56, 51, 28, 2, 'Boxtobox', 279000, 558000, 300, 600),
	(57, 52, 14, 1, 'Handbones', 165000, 165000, 250, 250),
	(58, 52, 27, 2, 'Typolist', 279000, 558000, 300, 600),
	(59, 53, 30, 3, 'S.O.S', 125000, 375000, 250, 750),
	(60, 54, 31, 2, 'S.O.S', 125000, 250000, 250, 500),
	(61, 55, 16, 2, 'Birth of Heaven', 165000, 330000, 250, 500),
	(62, 55, 31, 2, 'S.O.S', 125000, 250000, 250, 500),
	(63, 56, 29, 1, 'S.O.S', 125000, 125000, 250, 250);
/*!40000 ALTER TABLE `pembelian_produk` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT NULL,
  `deskripsi_produk` text,
  `stok_produk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.produk: ~17 rows (lebih kurang)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
REPLACE INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
	(13, 2, 'Wolf Tree', 369000, 350, '9603978281080_1375896007.jpg', '                ', 19),
	(14, 1, 'Handbones', 165000, 250, '6603285589019_17976807922.jpg', '', 19),
	(15, 1, 'Individual', 165000, 250, '9601340271061_9440971492.jpg', '', 20),
	(16, 1, 'Birth of Heaven', 165000, 250, '9601520494240_7886023795.jpg', '', 20),
	(17, 1, 'You Love', 165000, 250, '9608679867612_6168956533.jpg', '', 24),
	(18, 1, 'Einstein', 165000, 250, '9601036122732_8212849838.jpg', '', 21),
	(19, 1, 'Granma Sale', 165000, 250, '9609597543810_7313702632.jpg', '', 22),
	(20, 1, 'Fear', 165000, 250, '9609989709501_5194454738.jpg', '', 22),
	(21, 2, 'Blacktypo', 369000, 350, '9601902922801_5764951324.jpg', '', 24),
	(22, 2, 'All Racism', 369000, 350, '9602123824621_2072577810.jpg', '', 21),
	(23, 2, 'Freedom', 369000, 350, '960947693537_7154469090.jpg', '', 23),
	(24, 2, 'Hackseald', 369000, 350, '9609313286357_4850222230.jpg', '', 24),
	(25, 2, 'Faketypo', 369000, 350, '9602700042831_9364285161.jpg', '                ', 24),
	(26, 3, 'Longbeach', 279000, 300, '960742362302_4259654752.jpg', '                ', 23),
	(27, 3, 'Typolist', 279000, 300, '9606527652124_8065280598.jpg', '', 20),
	(28, 3, 'Boxtobox', 279000, 300, '9601352206792_3587017606.jpg', '', 21),
	(29, 1, 'S.O.S', 125000, 250, '1.jpg', '', 23);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- membuang struktur untuk table ilnoise.produk_foto
CREATE TABLE IF NOT EXISTS `produk_foto` (
  `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `nama_produk_foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_produk_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel ilnoise.produk_foto: ~68 rows (lebih kurang)
/*!40000 ALTER TABLE `produk_foto` DISABLE KEYS */;
REPLACE INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
	(13, 9, '2.jpg'),
	(15, 9, '20200716185540321312.JPG'),
	(16, 10, 'sos.jpg'),
	(17, 11, 'brainwash.jpg'),
	(18, 12, '6631340271061_9440971492.jpg'),
	(19, 13, '9603978281080_1375896007.jpg'),
	(20, 13, '9633978281080_1375896007.jpg'),
	(21, 13, '9613978281080_1375896007.jpg'),
	(22, 13, '9623978281080_1375896007.jpg'),
	(23, 14, '6603285589019_17976807922.jpg'),
	(24, 14, '6603285589019_1797680792.jpg'),
	(25, 15, '9601340271061_9440971492.jpg'),
	(26, 15, '6631340271061_9440971492.jpg'),
	(27, 15, '9611340271061_9440971492.jpg'),
	(28, 15, '9621340271061_9440971492.jpg'),
	(29, 16, '9601520494240_7886023795.jpg'),
	(30, 16, '9631520494240_7886023795.jpg'),
	(31, 16, '9611520494240_7886023795.jpg'),
	(32, 16, '9621520494240_7886023795.jpg'),
	(33, 17, '9608679867612_6168956533.jpg'),
	(34, 17, '9608457859430_576732389.jpg'),
	(35, 17, '9618679867612_6168956533.jpg'),
	(36, 17, '9628679867612_6168956533.jpg'),
	(37, 18, '9601036122732_8212849838.jpg'),
	(38, 18, '9631036122732_8212849838.jpg'),
	(39, 18, '9611036122732_8212849838.jpg'),
	(40, 18, '9621036122732_8212849838.jpg'),
	(41, 19, '9609597543810_7313702632.jpg'),
	(42, 19, '9619597543810_7313702632.jpg'),
	(43, 20, '9609989709501_5194454738.jpg'),
	(44, 20, '9619989709501_5194454738.jpg'),
	(45, 21, '9601902922801_5764951324.jpg'),
	(46, 21, '961904443820_3164263980.jpg'),
	(47, 21, '960904443820_3164263980.jpg'),
	(48, 22, '9602123824621_2072577810.jpg'),
	(49, 22, '9612123824621_2072577810.jpg'),
	(50, 23, '960947693537_7154469090.jpg'),
	(51, 23, '961947693537_7154469090.jpg'),
	(52, 23, '962947693537_7154469090.jpg'),
	(53, 24, '9609313286357_4850222230.jpg'),
	(54, 24, '9629313286357_4850222230.jpg'),
	(55, 24, '9619313286357_4850222230.jpg'),
	(56, 25, '9602700042831_9364285161.jpg'),
	(57, 25, '9632700042831_9364285161.jpg'),
	(58, 25, '9612700042831_9364285161.jpg'),
	(59, 25, '9622700042831_9364285161.jpg'),
	(60, 26, '960742362302_4259654752.jpg'),
	(61, 26, '962742362302_4259654752.jpg'),
	(62, 26, '961742362302_4259654752.jpg'),
	(63, 27, '9606527652124_8065280598.jpg'),
	(64, 27, '9626527652124_8065280598.jpg'),
	(65, 27, '9616527652124_8065280598.jpg'),
	(66, 28, '9601352206792_3587017606.jpg'),
	(67, 28, '9631352206792_3587017606.jpg'),
	(68, 28, '9611352206792_3587017606.jpg'),
	(69, 28, '9621352206792_3587017606.jpg'),
	(70, 29, 'sos.jpg'),
	(71, 29, 'brainwash.jpg'),
	(72, 30, 'sos.jpg'),
	(73, 30, 'brainwash.jpg'),
	(75, 31, '1.jpg'),
	(76, 31, '2.jpg'),
	(77, 31, '3.jpg'),
	(78, 31, '4.jpg'),
	(79, 29, '1.jpg'),
	(80, 29, '2.jpg'),
	(81, 29, '3.jpg'),
	(82, 29, '4.jpg');
/*!40000 ALTER TABLE `produk_foto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
