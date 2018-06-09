# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.31-MariaDB)
# Database: simkes_apotek
# Generation Time: 2018-06-03 07:40:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ak_data_statistik
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_statistik`;

CREATE TABLE `ak_data_statistik` (
  `tahun` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Jan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Feb` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Mar` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Apr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `May` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Jun` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Jul` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Aug` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Sep` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Okt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Nov` decimal(20,2) NOT NULL DEFAULT '0.00',
  `Dec` decimal(20,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ak_data_statistik` WRITE;
/*!40000 ALTER TABLE `ak_data_statistik` DISABLE KEYS */;

INSERT INTO `ak_data_statistik` (`tahun`, `Jan`, `Feb`, `Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Okt`, `Nov`, `Dec`)
VALUES
	(2018,0.00,0.00,0.00,0.00,149000.00,30600.00,0.00,0.00,0.00,0.00,0.00,0.00);

/*!40000 ALTER TABLE `ak_data_statistik` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
