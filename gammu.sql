-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2014 pada 01.40
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `gammu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pemesan_ksd`
--

CREATE TABLE IF NOT EXISTS `alamat_pemesan_ksd` (
  `id_alamat` int(4) NOT NULL AUTO_INCREMENT,
  `nama_alamat` varchar(15) NOT NULL,
  `jarak_alamat` int(5) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `alamat_pemesan_ksd`
--

INSERT INTO `alamat_pemesan_ksd` (`id_alamat`, `nama_alamat`, `jarak_alamat`) VALUES
(1, 'Bojongsoang', 1),
(2, 'Pga', 0),
(3, 'Sukapura', 1),
(4, 'Kampus Telkom', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_pegawai_ksd`
--

CREATE TABLE IF NOT EXISTS `divisi_pegawai_ksd` (
  `id_divisi` int(4) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2014-05-04 13:07:44', '2014-05-06 17:00:00', '', '0787567658658', 'Default_No_Compression', 'Coba refresh', '', -1, 'Coba refresh', 20, '56546456', 'false'),
('2014-04-20 12:43:21', '2014-02-27 03:14:32', '005400680061006E006B007300200079006100200041006C006C00610068', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 2, '', 'false'),
('2014-04-20 12:43:21', '2014-02-27 03:29:15', '006D', '+6285729268583', 'Unicode_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 6, '', 'false'),
('2014-04-20 12:43:21', '2014-02-27 03:31:24', '006D', '+6285729268583', 'Unicode_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 7, '', 'false'),
('2014-04-20 12:43:21', '2014-02-27 03:34:53', '0050006C0065006100730065', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 8, '', 'false'),
('2014-04-20 12:43:21', '2014-02-27 03:34:53', '00630062', '+6285729268583', 'Unicode_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 9, '', 'false'),
('2014-04-20 04:04:37', '2014-02-27 03:51:06', '0061006C00680061006D00640075006C0069006C006C00610068', '+6285729268583', 'Unicode_No_Compression', '', '+62816124', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 12, '', 'false'),
('2014-02-27 03:51:44', '2014-02-27 03:51:10', '004200690073006D0069006C006C00610068', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Bismillah', 13, '', 'false'),
('2014-02-27 03:52:15', '2014-02-27 03:52:12', '004200690073006D0069006C006C00610068', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Bismillah', 14, '', 'false'),
('2014-02-27 03:55:24', '2014-02-27 03:55:04', '004F006B00650020007300690070', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Oke sip', 16, '', 'false'),
('2014-02-27 06:29:38', '2014-02-27 06:29:22', '0059006F0079006F0079', '+6285643838153', 'Default_No_Compression', '', '+62816124', -1, 'Yoyoy', 17, '', 'false'),
('2014-05-14 17:00:00', '2014-05-13 17:00:00', 'ccccc', '08457833993', 'Default_No_Compression', 'ccccc', '', -1, 'sms e', 19, 'sssss', 'false'),
('2014-05-04 13:13:48', '2014-05-03 17:00:00', 'sdsdfsd', 'sdfsdf', 'Default_No_Compression', 'sdfsdf', '65756756', -1, 'sdfsdfsdf', 21, 'sdfsdfsdfsdf', 'false'),
('2014-05-13 08:55:32', '2014-05-12 17:00:00', 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', '087574734', 'Default_No_Compression', '', '', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 22, '', 'false'),
('2014-05-13 08:57:33', '2014-05-12 17:00:00', 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', '021000555', 'Default_No_Compression', '', '', -1, 'Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih Pesan Ayam Bakar 1 Es teh 2 diantar ke Jalan Bojongsoang Gg.5 , Terimakasih', 23, '', 'false'),
('2014-05-13 13:36:24', '2014-05-12 17:01:00', 'sadfsaf', '23424', 'Default_No_Compression', 'sdfsdf', '', -1, 'sdfsfsdfsdfsdfsdf', 24, '', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_balasan_ksd`
--

CREATE TABLE IF NOT EXISTS `jenis_balasan_ksd` (
  `id_jenis` int(5) NOT NULL AUTO_INCREMENT,
  `isi_balasan_ksd` varchar(100) NOT NULL,
  `jenis_balasan_ksd` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jenis_balasan_ksd`
--

INSERT INTO `jenis_balasan_ksd` (`id_jenis`, `isi_balasan_ksd`, `jenis_balasan_ksd`) VALUES
(1, 'Maaf stok habis apak', 'stok habis'),
(2, 'Terima Kasih telah membeli KSD. Pesanan akan kami antar segera', 'complete'),
(4, 'Maaf kemunkginan pengiriman telat. Mau lanjutkan pemesanan? bls', 'sibuk'),
(5, 'default', 'balasan baru, silakan ketik dibawah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_menu_ksd`
--

CREATE TABLE IF NOT EXISTS `jenis_menu_ksd` (
  `kode_jenis` int(9) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  UNIQUE KEY `kode_jenis` (`kode_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_menu_ksd`
--

INSERT INTO `jenis_menu_ksd` (`kode_jenis`, `nama_jenis`) VALUES
(111, 'minuman'),
(222, 'makanan'),
(7000, 'a6cd6bfd-c65a-11e3-905f-83a5b1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE IF NOT EXISTS `level_user` (
  `id_level` int(10) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(20) NOT NULL,
  `kode_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`, `kode_level`) VALUES
(1, 'admin', '1'),
(2, 'kasir', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_ksd`
--

CREATE TABLE IF NOT EXISTS `menu_ksd` (
  `kode_menu` int(20) NOT NULL AUTO_INCREMENT,
  `kode_jenis` int(20) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga_menu` int(20) NOT NULL,
  `stok_menu` tinyint(1) NOT NULL,
  PRIMARY KEY (`kode_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `menu_ksd`
--

INSERT INTO `menu_ksd` (`kode_menu`, `kode_jenis`, `nama_menu`, `harga_menu`, `stok_menu`) VALUES
(1, 111, 'Jus Apel', 2000, 0),
(2, 222, 'Bebek Goreng', 10000, 21),
(3, 222, 'Ayam Bakar', 9000, 2),
(4, 111, 'Es Teh', 3000, 71),
(5, 222, 'Nasi Goreng', 9000, 65);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_ksd`
--

CREATE TABLE IF NOT EXISTS `pegawai_ksd` (
  `id_pegawai` int(4) NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(25) NOT NULL,
  `divisi_pegawai` int(5) NOT NULL,
  `gaji_pegawai` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pegawai_ksd`
--

INSERT INTO `pegawai_ksd` (`id_pegawai`, `nama_pegawai`, `divisi_pegawai`, `gaji_pegawai`) VALUES
(1, 'Mila', 2, '2000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `popup_set`
--

CREATE TABLE IF NOT EXISTS `popup_set` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `waktu` int(5) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reminder_print_transaksi`
--

CREATE TABLE IF NOT EXISTS `reminder_print_transaksi` (
  `id_reminder` int(4) NOT NULL AUTO_INCREMENT,
  `waktu` int(5) NOT NULL,
  PRIMARY KEY (`id_reminder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transaksi`
--

CREATE TABLE IF NOT EXISTS `status_transaksi` (
  `id_status` int(4) NOT NULL,
  `nama_status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status`, `nama_status`) VALUES
(1, 'sementara'),
(2, 'sedang'),
(4, 'ditempat'),
(5, 'sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_ksd`
--

CREATE TABLE IF NOT EXISTS `transaksi_ksd` (
  `id` int(7) NOT NULL,
  `id_transaksi` int(10) NOT NULL,
  `pemesan_transaksi` varchar(15) NOT NULL,
  `date_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(20) NOT NULL,
  `tujuan_transaksi` varchar(60) NOT NULL,
  `daerah_antar_transaksi` varchar(25) NOT NULL,
  `status_transaksi` tinyint(1) NOT NULL,
  `pengantar_transaksi` int(4) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  UNIQUE KEY `id_transaksi` (`id_transaksi`),
  KEY `id_transaksi_2` (`id_transaksi`),
  KEY `id_transaksi_3` (`id_transaksi`),
  KEY `id_transaksi_4` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_ksd`
--

INSERT INTO `transaksi_ksd` (`id`, `id_transaksi`, `pemesan_transaksi`, `date_transaksi`, `jumlah_transaksi`, `tujuan_transaksi`, `daerah_antar_transaksi`, `status_transaksi`, `pengantar_transaksi`) VALUES
(0, 1401444554, '23424', '2014-05-30 12:09:15', 14000, 'Bojongsoang gang no.23 gang pak haji, mansyur', '1', 5, 0),
(0, 1401490053, '087574734', '2014-05-31 00:47:33', 26000, 'Bojongsoang gang no.23 gang pak haji, mansyur', '1', 1, 0),
(0, 1401491295, '0787567658658', '2014-05-31 01:08:15', 20000, 'Bojongsoang gang permata buah batu', '1', 1, 0),
(0, 1401517986, '111', '2014-05-31 08:33:06', 23000, 'Bojongsoang gang 111', '1', 1, 0),
(0, 1401518011, '111', '2014-05-31 08:33:31', 20000, 'Bojongsoang gang 11', '1', 0, 0),
(0, 1401518672, '222', '2014-05-31 08:44:32', 26000, 'Bojongsoang gang 222', '1', 5, 0),
(0, 1401520455, '0', '2014-05-31 09:14:16', 20000, ' gang ', '', 5, 0),
(0, 1401520478, '021000555', '2014-05-31 09:14:38', 10000, 'Bojongsoang gang ass', '1', 2, 0),
(0, 1401711163, '0', '2014-06-02 14:12:43', 27000, ' gang ', '', 5, 0),
(0, 1401980140, '0', '2014-06-05 16:55:40', 50000, ' gang ', '', 5, 0),
(0, 1402107997, '0', '2014-06-07 04:26:37', 43000, ' gang ', '', 5, 0),
(0, 1402112556, '123', '2014-06-07 05:42:36', 20000, 'Pga gang gang 5', '2', 1, 0),
(0, 1402112583, '321', '2014-06-07 05:43:03', 20000, 'Bojongsoang gang sadad', '1', 1, 0),
(0, 1402112725, '111', '2014-06-07 05:45:25', 11000, 'Bojongsoang gang sss', '1', 1, 0),
(0, 1402112776, '222', '2014-06-07 05:46:16', 20000, 'Bojongsoang gang 2', '1', 1, 0),
(0, 1402112879, '12', '2014-06-07 05:47:59', 6000, 'Sukapura gang xds', '3', 1, 0),
(0, 1402112939, '123', '2014-06-07 05:49:00', 21000, 'Kampus Telkom gang 23e', '4', 1, 0),
(0, 1402113019, '12', '2014-06-07 05:50:19', 21000, 'Kampus Telkom gang 12', '4', 1, 0),
(0, 1402113062, '134', '2014-06-07 05:51:02', 21000, 'Kampus Telkom gang 2ed', '4', 1, 0),
(0, 1402113274, '145', '2014-06-07 05:54:34', 20000, 'Pga gang asad', '2', 1, 0),
(0, 1402113322, '222', '2014-06-07 05:55:22', 20000, 'Bojongsoang gang sss', '1', 1, 0),
(0, 1402113362, '555', '2014-06-07 05:56:02', 20000, 'Sukapura gang 555', '3', 1, 0),
(0, 1402113597, '777', '2014-06-07 05:59:58', 21000, 'Bojongsoang gang jj', '1', 1, 0),
(0, 1402113653, '777', '2014-06-07 06:00:53', 21000, 'Bojongsoang gang hh', '1', 1, 0),
(0, 1402113712, '777', '2014-06-07 06:01:52', 0, 'Bojongsoang gang h7hh', '1', 1, 0),
(0, 1402113948, '888', '2014-06-07 06:05:49', 20000, 'Bojongsoang gang ggg', '1', 1, 0),
(0, 1402113980, '444', '2014-06-07 06:06:20', 22000, 'Bojongsoang gang fff', '1', 1, 0),
(0, 1402114013, '999', '2014-06-07 06:06:54', 30000, 'Bojongsoang gang 999', '1', 1, 0),
(0, 1402114085, '0', '2014-06-07 06:08:05', 20000, ' gang ', '', 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_menu_ksd`
--

CREATE TABLE IF NOT EXISTS `transaksi_menu_ksd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(20) NOT NULL,
  `date_transaksi` datetime NOT NULL,
  `menu_transaksi` varchar(20) NOT NULL,
  `jumlah_menu` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_transaksi_2` (`id_transaksi`),
  KEY `id_transaksi_3` (`id_transaksi`),
  KEY `id_transaksi_4` (`id_transaksi`),
  KEY `id_transaksi_5` (`id_transaksi`),
  KEY `id_transaksi_6` (`id_transaksi`),
  KEY `id_transaksi_7` (`id_transaksi`),
  KEY `id_transaksi_8` (`id_transaksi`),
  KEY `id_transaksi_9` (`id_transaksi`),
  KEY `id_transaksi_10` (`id_transaksi`),
  KEY `id_transaksi_11` (`id_transaksi`),
  KEY `id_transaksi_12` (`id_transaksi`),
  KEY `idx_transaksi` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=374 ;

--
-- Dumping data untuk tabel `transaksi_menu_ksd`
--

INSERT INTO `transaksi_menu_ksd` (`id`, `id_transaksi`, `date_transaksi`, `menu_transaksi`, `jumlah_menu`) VALUES
(337, 1401444554, '2014-05-30 12:09:14', 'Jus Apel', 2),
(338, 1401444554, '2014-05-30 12:09:15', 'Bebek Goreng', 1),
(339, 1401490053, '2014-05-31 00:47:33', 'Bebek Goreng', 2),
(340, 1401490053, '2014-05-31 00:47:33', 'Es Teh', 2),
(341, 1401491295, '2014-05-31 01:08:15', 'Jus Apel', 1),
(342, 1401491295, '2014-05-31 01:08:15', 'Nasi Goreng', 2),
(343, 1401517986, '2014-05-31 08:33:06', 'Bebek Goreng', 2),
(344, 1401517986, '2014-05-31 08:33:06', 'Es Teh', 1),
(345, 1401518011, '2014-05-31 08:33:31', 'Bebek Goreng', 2),
(346, 1401518672, '2014-05-31 08:44:32', 'Bebek Goreng', 2),
(347, 1401518672, '2014-05-31 08:44:32', 'Es Teh', 2),
(348, 1401520455, '2014-05-31 09:14:15', 'Bebek Goreng', 2),
(349, 1401520478, '2014-05-31 09:14:38', 'Bebek Goreng', 1),
(350, 1401711163, '2014-06-02 14:12:43', 'Es Teh', 9),
(351, 1401980140, '2014-06-05 16:55:40', 'Bebek Goreng', 4),
(352, 1401980140, '2014-06-05 16:55:40', 'Bebek Goreng', 1),
(353, 1402107997, '2014-06-07 04:26:37', 'Bebek Goreng', 4),
(354, 1402107997, '2014-06-07 04:26:37', 'Es Teh', 1),
(355, 1402112556, '2014-06-07 05:42:36', 'Bebek Goreng', 2),
(356, 1402112583, '2014-06-07 05:43:03', 'Bebek Goreng', 2),
(357, 1402112725, '2014-06-07 05:45:25', 'Bebek Goreng', 1),
(358, 1402112776, '2014-06-07 05:46:16', 'Bebek Goreng', 2),
(359, 1402112879, '2014-06-07 05:47:59', 'Es Teh', 2),
(360, 1402112939, '2014-06-07 05:48:59', 'Bebek Goreng', 2),
(361, 1402113019, '2014-06-07 05:50:19', 'Bebek Goreng', 2),
(362, 1402113062, '2014-06-07 05:51:02', 'Bebek Goreng', 2),
(363, 1402113274, '2014-06-07 05:54:34', 'Bebek Goreng', 2),
(364, 1402113322, '2014-06-07 05:55:22', 'Bebek Goreng', 2),
(365, 1402113362, '2014-06-07 05:56:02', 'Bebek Goreng', 2),
(366, 1402113597, '2014-06-07 05:59:57', 'Bebek Goreng', 2),
(367, 1402113653, '2014-06-07 06:00:53', 'Bebek Goreng', 2),
(368, 1402113712, '2014-06-07 06:01:52', 'Bebek Goreng', 2),
(369, 1402113948, '2014-06-07 06:05:48', 'Bebek Goreng', 2),
(370, 1402113980, '2014-06-07 06:06:20', 'Bebek Goreng', 2),
(371, 1402114013, '2014-06-07 06:06:53', 'Bebek Goreng', 2),
(372, 1402114013, '2014-06-07 06:06:54', 'Es Teh', 2),
(373, 1402114085, '2014-06-07 06:08:05', 'Bebek Goreng', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(123) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `level` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`, `status`) VALUES
(1, 'kasir', 'kasir', 'kasir1', 2, 1),
(2, 'jos', 'jos', 'danang', 1, 0),
(3, 'jos', '6f7f3b0fb100c0b0fb21a0287cd72f7b', 'arip', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
