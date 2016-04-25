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

-- Dumping data for table imfdb1.mac: ~2 rows (approximately)
DELETE FROM `mac`;
/*!40000 ALTER TABLE `mac` DISABLE KEYS */;
INSERT INTO `mac` (`num`, `std_id`, `mac`, `device`, `date`, `ID`, `PREFIX_NAME_ID`, `STD_FNAME`, `STD_LNAME`, `FAC_ID`, `PROGRAM_ID`, `EMAIL`, `TELEPHONE`) VALUES
	(26, '155404130050', 'yhy8uuu', 'comp', '1461063206', '', '', '', '', '', '', '', ''),
	(28, '155404130050', 'fffffffffffffffffffffffffffffffffff', 'phone', '1461063245', '', '', '', '', '', '', '', '');
/*!40000 ALTER TABLE `mac` ENABLE KEYS */;


-- Dumping structure for table imfdb1.ref_fac
CREATE TABLE IF NOT EXISTS `ref_fac` (
  `FAC_ID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `FAC_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table imfdb1.ref_fac: 14 rows
DELETE FROM `ref_fac`;
/*!40000 ALTER TABLE `ref_fac` DISABLE KEYS */;
INSERT INTO `ref_fac` (`FAC_ID`, `FAC_NAME`) VALUES
	('00006', 'คณะเกษตรศาสตร์'),
	('00039', 'คณะบริหารธุรกิจ'),
	('00083', 'คณะวิทยาศาสตร์และเทคโนโลยี'),
	('01275', 'คณะวิทยาศาสตร์และเทคโนโลยีการประมง'),
	('00088', 'คณะวิศวกรรมศาสตร์'),
	('00096', 'คณะศิลปศาสตร์'),
	('00112', 'คณะสัตวแพทยศาสตร์'),
	('00202', 'คณะอุตสาหกรรมเกษตร'),
	('00180', 'คณะสถาปัตยกรรมศาสตร์'),
	('00825', 'คณะเทคโนโลยีการจัดการ'),
	('00917', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี'),
	('01277', 'วิทยาลัยเทคโนโลยีอุตสาหกรรมและการจัดการ'),
	('01131', 'วิทยาลัยรัตภูมิ'),
	('01276', 'วิทยาลัยการโรงแรมและการท่องเที่ยว');
/*!40000 ALTER TABLE `ref_fac` ENABLE KEYS */;


-- Dumping structure for table imfdb1.ref_program
CREATE TABLE IF NOT EXISTS `ref_program` (
  `PROGRAM_ID` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `PROGRAM_NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FAC_ID` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table imfdb1.ref_program: 41 rows
DELETE FROM `ref_program`;
/*!40000 ALTER TABLE `ref_program` DISABLE KEYS */;
INSERT INTO `ref_program` (`PROGRAM_ID`, `PROGRAM_NAME`, `FAC_ID`) VALUES
	('000101', 'การตลาด', '00039'),
	('000024', 'การจัดการ', '00039'),
	('003744', 'การบัญชี', '00039'),
	('000811', 'ระบบสารสนเทศ', '00039'),
	('003118', 'วิศวกรรมแมคคาทรอนิกส์', '00917'),
	('001032', 'วิศวกรรมอุตสาหการ', '00088'),
	('001062', 'วิศวกรรมไฟฟ้า', '00088'),
	('001057', 'วิศวกรรมโยธา', '00088'),
	('001037', 'วิศวกรรมเครื่องกล', '00088'),
	('003702', 'วิศวกรรมโทรคมนาคม', '00088'),
	('001375', 'เทคโนโลยีคอมพิวเตอร์', '00088'),
	('002421', 'การผังเมือง', '00180'),
	('000994', 'วิศวกรรมคอมพิวเตอร์', '00088'),
	('001026', 'วิศวกรรมอิเล็กทรอนิกส์', '00088'),
	('001020', 'วิศวกรรมสำรวจ', '00088'),
	('001041', 'วิศวกรรมเครื่องนุ่งห่ม', '00088'),
	('001457', 'เทคโนโลยีเครื่องกล', '00088'),
	('001455', 'เทคโนโลยีอุตสาหการ', '00088'),
	('001478', 'เทคโนโลยีโทรคมนาคม', '00088'),
	('001469', 'เทคโนโลยีเสื้อผ้า', '00088'),
	('000107', 'การท่องเที่ยว', '00096'),
	('000343', 'การโรงแรม', '00096'),
	('000766', 'ภาษาอังกฤษเพื่อการสื่อสารสากล', '00096'),
	('001251', 'อาหารและโภชนาการ', '00096'),
	('000374', 'คหกรรมศาสตร์ศึกษา', '00096'),
	('003688', 'ธุรกิจคหกรรมศาสตร์', '00096'),
	('001422', 'เทคโนโลยีสถาปัตยกรรม', '00180'),
	('000071', 'การจัดการผังเมือง', '00180'),
	('000394', 'จิตรกรรม', '00180'),
	('001824', 'การออกแบบแฟชั่นและสิ่งทอ', '00180'),
	('001119', 'สถาปัตยกรรม', '00180'),
	('001032', 'วิศวกรรมอุตสาหการ', '00917'),
	('001032', 'ค.อ.บ.วิศวกรรมอุตสาหการ', '00917'),
	('001029', 'วิศวกรรมอิเล็กทรอนิกส์และโทรคมนาคม', '00917'),
	('001436', 'เทคโนโลยีสื่อสารมวลชน', '00917'),
	('002159', 'ระบบสารสนเทศทางธุรกิจ', '00039'),
	('', '', ''),
	('000985', 'วิศวกรรมการผลิต', '00088'),
	('000318', 'การเงิน', '00039'),
	('006380', 'การจัดการธุรกิจขนาดกลางและขนาดย่อม	', '00039'),
	('001397', 'เทคโนโลยีปิโตรเลียม', '00917');
/*!40000 ALTER TABLE `ref_program` ENABLE KEYS */;


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
  `CITIZEN_ID` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000000',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table imfdb1.uoc_std: ~25 rows (approximately)
DELETE FROM `uoc_std`;
/*!40000 ALTER TABLE `uoc_std` DISABLE KEYS */;
INSERT INTO `uoc_std` (`ID`, `PREFIX_NAME_ID`, `STD_FNAME`, `STD_LNAME`, `FAC_ID`, `PROGRAM_ID`, `EMAIL`, `TELEPHONE`, `CITIZEN_ID`) VALUES
	('155404130050', '003', 'อาคม', 'กีบเสน', '00088', '001062', 'chbj;;;,[][\'fyyii', '5678997654', '0000000000000'),
	('155404140007', '003', 'จิรวัฒน์', 'ศรีใหม่', '00088', '000994', 'tyiuoi', '1234567890', '0000000000000'),
	('155404140037', '004', 'วิชุฑา', 'แก้วบุญ', '00088', '000994', 'wichutha_tidtee@hotmail.com', '0855874798', '0000000000000'),
	('155404160040', '003', 'กวินนา', 'จันทกูล', '00088', '001020', 'ryyp[,hvzlk\'\'', '1234554321', '0000000000000'),
	('155404170017', '003', 'วัชรพล', 'สว่างเอี่ยม', '00088', '001457', 'dhguhlj,', '4532112345', '0000000000000'),
	('155404180024', '003', 'อานัด', 'แดวามาลัย', '00088', '001032', 'gjl;\'\'', '1235467890', '0000000000000'),
	('155404190025', '004', 'ธิดารัตน์', 'ปานเกลียง', '00088', '001041', 'eryin[[pl[[lkljkhugf', '1234567899', '0000000000000'),
	('155404710076', '004', 'สนันทา', 'เหมสนิท', '00088', '003702', 'rrivhi;[po', '6688786760', '0000000000000'),
	('155404810028', '003', 'การผลิต', 'วิศวะ', '00088', '000985', 'ei[\'9hhlk;\'ldgg', '0988757338', '0000000000000'),
	('155405060074', '004', 'พรมนิดา', 'ปลอดคง', '00039', '000024', 'fgp[[', '1122334455', '0000000000000'),
	('155405090053', '004', 'พนิดา', 'ทองแท้', '00039', '000101', 'ertyo[', '1234565489', '0000000000000'),
	('155405100042', '004', 'สายฝน', 'แสงเขียว', '00039', '003744', 'e5g;hn;', '5679934000', '0000000000000'),
	('155405110065', '003', 'จตุรนิธ', 'ศรีรักษ์', '00039', '000811', 'tilu;\'lk\'', '1212345600', '0000000000000'),
	('155410250013', '004', 'มูนา', 'บิลลาเต๊ะ', '00180', '001824', 'vhdkd', '0974567234', '0000000000000'),
	('155410260014', '003', 'สุวรรณณา', 'แย่งกุลเชาว์', '00180', '002421', 'CHfkkf', '0912345568', '0000000000000'),
	('155514290025', '004', 'ลาลิเดีย', 'บิลดูหมิด', '00917', '001029', 'dfghtj', '1234123456', '0000000000000'),
	('155514300037', '003', 'อาหลีม', 'หลีหาด', '00917', '003118', 'jdj,jggjsj;', '0988757338', '0000000000000'),
	('156401010001', '004', 'กจกร', 'จำนงค์', '00096', '000107', 'sdg,mgnksgnjfglr', '0900879934', '0000000000000'),
	('156401020052', '004', 'ชนัฏธิการต์', 'บุญคง', '00096', '000343', 'fhkjfhladhjhfj,;', '0987573381', '0000000000000'),
	('156410040036', '004', 'สุนิสา', 'บุญช่วย', '00096', '001251', 'fvngmnk,s.', '0900045609', '0000000000000'),
	('156410240024', '004', 'อมรรัตน์', 'พวงแก้ว', '00180', '000394', 'dggdh', '0974563412', '0000000000000'),
	('156414770061', '003', 'ศราวุฒิ', 'คงจันทร์', '00917', '001436', 'dddddddddd', '6789098000', '0000000000000'),
	('156510270053', '004', 'พุทธกุล', 'พุทกูล', '00180', '001119', 'ddnfmnv', '0987653345', '0000000000000'),
	('156514280039', '004', 'แคทรียา', 'สิงสุขา', '00917', '001032', 'etgfg', '0986534287', '0000000000000'),
	('157205080007', '003', 'ณัฐดนัย', 'ชูสวัสดิ์', '00039', '000008', 'gohpp', '1234554321', '0000000000000');
/*!40000 ALTER TABLE `uoc_std` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
