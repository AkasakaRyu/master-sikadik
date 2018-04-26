-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08 Apr 2018 pada 22.22
-- Versi Server: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkes_sikadik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_data_kunjungan_pasien`
--

CREATE TABLE `ak_data_kunjungan_pasien` (
  `id_kunjungan` bigint(20) NOT NULL,
  `id_pasien` char(50) NOT NULL,
  `tanggal_kunjungan_pasien` date NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ak_data_kunjungan_pasien`
--

INSERT INTO `ak_data_kunjungan_pasien` (`id_kunjungan`, `id_pasien`, `tanggal_kunjungan_pasien`, `deleted`) VALUES
(32, 'H0001', '2018-04-01', 0),
(33, 'A0001', '2018-04-01', 0),
(34, 'T0001', '2018-04-01', 0),
(35, 'K0001', '2018-04-01', 0),
(36, 'N0001', '2018-04-01', 0),
(37, 'H0002', '2018-04-01', 0),
(38, 'N0002', '2018-04-01', 0),
(39, 'Y0001', '2018-04-01', 0),
(40, 'H0003', '2018-04-01', 0),
(41, 'H0004', '2018-04-01', 0),
(42, 'A0002', '2018-04-01', 0),
(43, 'Y0002', '2018-04-01', 0),
(44, 'Y0003', '2018-04-01', 0),
(45, 'O0002', '2018-04-01', 0),
(46, 'C0001', '2018-04-01', 0),
(47, 'O0001', '2018-04-01', 0),
(48, 'G0001', '2018-01-01', 0),
(51, 'O0003', '2018-04-01', 0),
(53, 'A0001', '2018-04-02', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_data_level`
--

CREATE TABLE `ak_data_level` (
  `id_level` int(11) NOT NULL,
  `nm_level` char(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ak_data_level`
--

INSERT INTO `ak_data_level` (`id_level`, `nm_level`, `deleted`) VALUES
(1, 'Master', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_data_log`
--

CREATE TABLE `ak_data_log` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ak_data_log`
--

INSERT INTO `ak_data_log` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('25cecbv2293jde9eenj1ab48terg2a8b', '::1', 1522790771, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323739303639323b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b),
('3ubmfg6dra5kgtngs4r37v0o6q5jt5oh', '::1', 1522740334, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323734303331373b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b),
('5p9091s973qt41lrum5td9ov2sp4elct', '::1', 1523039595, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333033393334333b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b),
('5thsl0999ril5k08tiioksa0kah91f80', '::1', 1522652780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323635323738303b),
('60um11g9fb954a7f9dae4sdptj7gt46a', '::1', 1522745009, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323734353030383b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b),
('89tidvej6atvqurfrlq1bt82jd8prdcq', '::1', 1522652885, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323635323838353b),
('djfan5ltk1qt3clb5orvmeejsmkaj2cc', '::1', 1522652780, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323635323738303b),
('h30eha5mn143qflv5hqvl0oovqohjm9e', '::1', 1522751874, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323735313634383b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b),
('ki5vbvtu4ak8oe96hf2v510v25k65otd', '::1', 1522652822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323635323738383b),
('mlt0d2kl14gqq12q2mn6pb3abq9hlqsa', '::1', 1522575765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323537353531353b6b6f64657c733a313a2231223b6e616d617c733a363a224d6173746572223b757365727c733a363a226d6173746572223b6c6576656c7c733a363a224d6173746572223b637265617465647c733a31393a22323031382d30342d30312031353a34363a3539223b69734c6f67696e7c623a313b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_data_pasien`
--

CREATE TABLE `ak_data_pasien` (
  `id_pasien` char(50) NOT NULL COMMENT 'A00001',
  `nm_pasien` char(100) NOT NULL,
  `usia_pasien` int(11) DEFAULT NULL,
  `tgl_lahir_pasien` date DEFAULT NULL,
  `alamat_pasien` text,
  `jenis_kelamin_pasien` enum('Pria','Wanita') DEFAULT NULL,
  `status_pasien` enum('Baru','Lama') NOT NULL DEFAULT 'Baru',
  `total_kunjungan_pasien` bigint(20) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ak_data_pasien`
--

INSERT INTO `ak_data_pasien` (`id_pasien`, `nm_pasien`, `usia_pasien`, `tgl_lahir_pasien`, `alamat_pasien`, `jenis_kelamin_pasien`, `status_pasien`, `total_kunjungan_pasien`, `deleted`) VALUES
('A0001', 'Akiyama Mio', 0, '1992-01-15', 'Jl. K-On Blok A No.1', 'Wanita', 'Lama', 3, 0),
('A0002', 'Akasaka Ryuunosuke', 22, '1996-01-01', 'Jl. Sakurasou Blok A No. 2', 'Pria', 'Baru', 2, 1),
('C0001', 'Chitanda Eru', 0, '1997-08-15', 'Jl. Hyouka Blok C No. 1', 'Wanita', 'Baru', 1, 0),
('G0001', 'Gilang Pratama Priadi', 21, '1996-04-05', 'Jl. Raya Banjaran No. 112 D', 'Pria', 'Baru', 1, 1),
('H0001', 'Hirasawa Yui', NULL, '1991-11-27', 'Jl. K-On Blok H No.1', 'Wanita', 'Baru', 1, 0),
('H0002', 'Hirasawa Ui', NULL, '1993-02-22', 'Jl. K-On Blok H No.1', 'Wanita', 'Baru', 1, 0),
('H0003', 'Hachiman Hikigaya', 0, '1996-08-08', 'Jl. Oregairu Blok H No. 3', 'Pria', 'Baru', 2, 0),
('H0004', 'Handa Seihuu', NULL, '1996-08-15', 'Jl. Barakamon Blok H No. 4', 'Pria', 'Baru', 1, 0),
('K0001', 'Kotobuki Tsumugi', NULL, '1991-07-02', 'Jl. K-On Blok K No.1', 'Wanita', 'Baru', 1, 0),
('N0001', 'Nakano Azusa', NULL, '1992-11-11', 'Jl. K-On Blok N No.1', 'Wanita', 'Baru', 1, 0),
('N0002', 'Nodoka Manabe', NULL, '1991-12-26', 'Jl. K-On Blok N No.2', 'Wanita', 'Baru', 1, 0),
('O0001', 'Oreki Tomoe', NULL, '1992-06-28', 'Jl. Hyouka Blok O No. 1', 'Wanita', 'Baru', 1, 0),
('O0002', 'Oreki Hotarou', 0, '1997-06-28', 'Jl. Hyouka Blok H No. 5', 'Pria', 'Baru', 1, 0),
('O0003', 'Ozora Tsubasa', NULL, '1988-07-28', 'Jl. Nankatsu Blok O No. 3', 'Pria', 'Baru', 1, 0),
('T0001', 'Tainaka Ritsu', NULL, '1991-08-21', 'Jl. K-On Blok T No.1', 'Wanita', 'Baru', 1, 1),
('Y0001', 'Yamanaka Sawako', NULL, '1985-01-31', 'Jl. K-On Blok Y No.1', 'Wanita', 'Baru', 1, 1),
('Y0002', 'Yuigahama Yui', 0, '1998-06-26', 'Jl. Oregairu Blok Y No. 2', 'Wanita', 'Baru', 1, 0),
('Y0003', 'Yukinoshita Yukino', NULL, '1998-01-03', 'Jl. Oregairu Blok Y No. 3', 'Wanita', 'Baru', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_data_user`
--

CREATE TABLE `ak_data_user` (
  `id_user` int(11) NOT NULL,
  `nm_user` char(100) NOT NULL,
  `login_user` char(50) NOT NULL,
  `pass_user` varchar(60) NOT NULL,
  `level_user` int(11) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ak_data_user`
--

INSERT INTO `ak_data_user` (`id_user`, `nm_user`, `login_user`, `pass_user`, `level_user`, `last_login`, `created_date`, `deleted`) VALUES
(1, 'Master', 'master', '$2y$10$pecyvbJsq/UFRqr7giyiOOG1YuIy5qMztsZWCLwHhKXkKV8IQvVUe', 1, '2018-04-06 00:00:00', '2018-04-01 15:46:59', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ak_data_kunjungan_pasien`
--
ALTER TABLE `ak_data_kunjungan_pasien`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `ak_data_level`
--
ALTER TABLE `ak_data_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `ak_data_log`
--
ALTER TABLE `ak_data_log`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ak_data_pasien`
--
ALTER TABLE `ak_data_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `ak_data_user`
--
ALTER TABLE `ak_data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ak_data_kunjungan_pasien`
--
ALTER TABLE `ak_data_kunjungan_pasien`
  MODIFY `id_kunjungan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `ak_data_level`
--
ALTER TABLE `ak_data_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ak_data_user`
--
ALTER TABLE `ak_data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ak_data_kunjungan_pasien`
--
ALTER TABLE `ak_data_kunjungan_pasien`
  ADD CONSTRAINT `ak_data_kunjungan_pasien_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `ak_data_pasien` (`id_pasien`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
