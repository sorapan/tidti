-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for imfdb1
DROP DATABASE IF EXISTS `imfdb1`;
CREATE DATABASE IF NOT EXISTS `imfdb1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `imfdb1`;


-- Dumping structure for table imfdb1.admin_data
DROP TABLE IF EXISTS `admin_data`;
CREATE TABLE IF NOT EXISTS `admin_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table imfdb1.e_pass
DROP TABLE IF EXISTS `e_pass`;
CREATE TABLE IF NOT EXISTS `e_pass` (
  `usre` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`usre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table imfdb1.mac
DROP TABLE IF EXISTS `mac`;
CREATE TABLE IF NOT EXISTS `mac` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `std_id` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `mac` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `device` tinytext COLLATE utf8_unicode_ci,
  `date` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table imfdb1.uoc_std
DROP TABLE IF EXISTS `uoc_std`;
CREATE TABLE IF NOT EXISTS `uoc_std` (
  `ID` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `PREFIX_NAME_ID` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `STD_FNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STD_LNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FAC_ID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `PROGRAM_ID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TELEPHONE` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
