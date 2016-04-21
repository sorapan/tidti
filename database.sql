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
CREATE DATABASE IF NOT EXISTS `imfdb1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `imfdb1`;


-- Dumping structure for table imfdb1.admin_data
CREATE TABLE IF NOT EXISTS `admin_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `password` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table imfdb1.admin_data: ~0 rows (approximately)
DELETE FROM `admin_data`;
/*!40000 ALTER TABLE `admin_data` DISABLE KEYS */;
INSERT INTO `admin_data` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `admin_data` ENABLE KEYS */;


-- Dumping structure for table imfdb1.e_pass
CREATE TABLE IF NOT EXISTS `e_pass` (
  `usre` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`usre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table imfdb1.e_pass: ~8 rows (approximately)
DELETE FROM `e_pass`;
/*!40000 ALTER TABLE `e_pass` DISABLE KEYS */;
INSERT INTO `e_pass` (`usre`, `pass`, `name`) VALUES
	('s155404130050', 'gggg', 'อาคม'),
	('s155404140007', 'cccc', 'จิรวัฒน์'),
	('s155404140023', 'bbbb', 'นัจติดา'),
	('s155404140037', 'aaaa', 'วิชุฑา'),
	('s155404170017', 'ffff', 'วัชรพล'),
	('s155404190025', 'hhhh', 'ธิดารัตน์'),
	('s155404710076', 'eeee', 'สุนันทา'),
	('s157404150016', 'dddd', 'วรนารี');
/*!40000 ALTER TABLE `e_pass` ENABLE KEYS */;


-- Dumping structure for table imfdb1.mac
CREATE TABLE IF NOT EXISTS `mac` (
  `num` int(15) NOT NULL AUTO_INCREMENT,
  `std_id` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `mac` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `device` tinytext COLLATE utf8_unicode_ci,
  `date` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `ID` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `PREFIX_NAME_ID` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `STD_FNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `STD_LNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FAC_ID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `PROGRAM_ID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TELEPHONE` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table imfdb1.mac: ~3 rows (approximately)
DELETE FROM `mac`;
/*!40000 ALTER TABLE `mac` DISABLE KEYS */;
INSERT INTO `mac` (`num`, `std_id`, `mac`, `device`, `date`, `ID`, `PREFIX_NAME_ID`, `STD_FNAME`, `STD_LNAME`, `FAC_ID`, `PROGRAM_ID`, `EMAIL`, `TELEPHONE`) VALUES
	(26, '155404130050', 'yhy8uuu', 'comp', '1461063206', '', '', '', '', '', '', '', ''),
	(27, '155404130050', 'hhhhhhhhhhhhh', 'tablet', '1461063212', '', '', '', '', '', '', '', ''),
	(28, '155404130050', 'fffffffffffffffffffffffffffffffffff', 'phone', '1461063245', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `mac` ENABLE KEYS */;


-- Dumping structure for table imfdb1.uoc_std
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

-- Dumping data for table imfdb1.uoc_std: ~25 rows (approximately)
DELETE FROM `uoc_std`;
/*!40000 ALTER TABLE `uoc_std` DISABLE KEYS */;
INSERT INTO `uoc_std` (`ID`, `PREFIX_NAME_ID`, `STD_FNAME`, `STD_LNAME`, `FAC_ID`, `PROGRAM_ID`, `EMAIL`, `TELEPHONE`) VALUES
	('155404130050', '003', 'อาคม', 'กีบเสน', '00004', '000013', 'chbj;;;,[][\'fyyii', '5678997654'),
	('155404140007', '003', 'จิรวัฒน์', 'ศรีใหม่', '00004', '000014', 'tyiuoi', '1234567890'),
	('155404140037', '004', 'วิชุฑา', 'แก้วบุญ', '00004', '000014', 'wichutha_tidtee@hotmail.com', '0855874798'),
	('155404160040', '003', 'กวินนา', 'จันทกูล', '00004', '000016', 'ryyp[,hvzlk\'\'', '1234554321'),
	('155404170017', '003', 'วัชรพล', 'สว่างเอี่ยม', '00004', '000017', 'dhguhlj,', '4532112345'),
	('155404180024', '003', 'อานัด', 'แดวามาลัย', '00004', '000018', 'gjl;\'\'', '1235467890'),
	('155404190025', '004', 'ธิดารัตน์', 'ปานเกลียง', '00004', '000019', 'eryin[[pl[[lkljkhugf', '1234567899'),
	('155404710076', '004', 'สนันทา', 'เหมสนิท', '00004', '000071', 'rrivhi;[po', '6688786760'),
	('155404810028', '003', 'การผลิต', 'วิศวะ', '00004', '000081', 'ei[\'9hhlk;\'ldgg', '0988757338'),
	('155405060074', '004', 'พรมนิดา', 'ปลอดคง', '00005', '000006', 'fgp[[', '1122334455'),
	('155405090053', '004', 'พนิดา', 'ทองแท้', '00005', '000009', 'ertyo[', '1234565489'),
	('155405100042', '004', 'สายฝน', 'แสงเขียว', '00005', '000010', 'e5g;hn;', '5679934000'),
	('155405110065', '003', 'จตุรนิธ', 'ศรีรักษ์', '00005', '000011', 'tilu;\'lk\'', '1212345600'),
	('155410250013', '004', 'มูนา', 'บิลลาเต๊ะ', '00010', '000025', 'vhdkd', '0974567234'),
	('155410260014', '003', 'สุวรรณณา', 'แย่งกุลเชาว์', '00010', '000026', 'CHfkkf', '0912345568'),
	('155514290025', '004', 'ลาลิเดีย', 'บิลดูหมิด', '00014', '000029', 'dfghtj', '1234123456'),
	('155514300037', '003', 'อาหลีม', 'หลีหาด', '00014', '000030', 'jdj,jggjsj;', '0988757338'),
	('156401010001', '004', 'กจกร', 'จำนงค์', '00001', '000001', 'sdg,mgnksgnjfglr', '0900879934'),
	('156401020052', '004', 'ชนัฏธิการต์', 'บุญคง', '00001', '000002', 'fhkjfhladhjhfj,;', '0987573381'),
	('156410040036', '004', 'สุนิสา', 'บุญช่วย', '00001', '000004', 'fvngmnk,s.', '0900045609'),
	('156410240024', '004', 'อมรรัตน์', 'พวงแก้ว', '00010', '000024', 'dggdh', '0974563412'),
	('156414770061', '003', 'ศราวุฒิ', 'คงจันทร์', '00014', '000077', 'dddddddddd', '6789098000'),
	('156510270053', '004', 'พุทธกุล', 'พุทกูล', '00010', '000027', 'ddnfmnv', '0987653345'),
	('156514280039', '004', 'แคทรียา', 'สิงสุขา', '00014', '000028', 'etgfg', '0986534287'),
	('157205080007', '003', 'ณัฐดนัย', 'ชูสวัสดิ์', '00005', '000008', 'gohpp', '1234554321');
/*!40000 ALTER TABLE `uoc_std` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
