-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `radius`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `staff`
-- 

CREATE TABLE `staff` (
  `id` int(3) NOT NULL auto_increment,
  `staff_id` varchar(5) collate utf8_unicode_ci NOT NULL,
  `staff_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `location_id` varchar(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- 
-- dump ตาราง `staff`
-- 

INSERT INTO `staff` VALUES (1, 'st01', 'สำนักงานอธิการบดี', 'sk');
INSERT INTO `staff` VALUES (2, 'st02', 'กองกลาง', 'sk');
INSERT INTO `staff` VALUES (3, 'st03', 'กองคลัง', 'sk');
INSERT INTO `staff` VALUES (4, 'st04', 'กองนโยบายและแผน', 'sk');
INSERT INTO `staff` VALUES (5, 'st05', 'กองบริหารงานบุคคล', 'sk');
INSERT INTO `staff` VALUES (6, 'st06', 'กองประชาสัมพันธ์', 'sk');
INSERT INTO `staff` VALUES (7, 'st07', 'กองพัฒนานักศึกษา', 'sk');
INSERT INTO `staff` VALUES (8, 'st08', 'กองวิเทศสัมพันและการประกันคุณภาพ', 'sk');
INSERT INTO `staff` VALUES (9, 'st09', 'กองออกแบบและพัฒนาอาคารสถานที่', 'sk');
INSERT INTO `staff` VALUES (10, 'st10', 'หน่วยตรวจสอบภายใน', 'sk');
INSERT INTO `staff` VALUES (11, 'st11', 'สำนักส่งเสริมวิชาการและงานทะเบียน', 'sk');
INSERT INTO `staff` VALUES (12, 'st12', 'สำนักวิทยบริการและเทคโนโลยีสารสนเทศ', 'sk');
INSERT INTO `staff` VALUES (13, 'st13', 'สภาคณาจารย์และข้าราชการ', 'sk');
INSERT INTO `staff` VALUES (14, 'st14', 'คณะบริหารธุรกิจ', 'sk');
INSERT INTO `staff` VALUES (15, 'st15', 'คณะวิศวกรรมศาสตร์', 'sk');
INSERT INTO `staff` VALUES (16, 'st16', 'คณะศิลปศาสตร์', 'sk');
INSERT INTO `staff` VALUES (17, 'st17', 'คณะสถาปัตยกรรมศาสตร์', 'sk');
INSERT INTO `staff` VALUES (18, 'st18', 'คณะครุศาสตร์อุตสาหกรรมและเทคโนโลยี', 'sk');
INSERT INTO `staff` VALUES (20, 'st19', 'งานสารสนเทศ', 'rat');
INSERT INTO `staff` VALUES (21, 'st20', 'งานประกันคุณภาพ', 'rat');
INSERT INTO `staff` VALUES (22, 'st21', 'งานทะเบียนและวัดผล', 'rat');
INSERT INTO `staff` VALUES (23, 'st22', 'งานวิจัยและบริการวิชาการ', 'rat');
INSERT INTO `staff` VALUES (24, 'st23', 'งานนโยบายและแผน', 'rat');
INSERT INTO `staff` VALUES (25, 'st24', 'งานบุคลากร', 'rat');
INSERT INTO `staff` VALUES (26, 'st25', 'สำนักงานวิทยาเขตตรัง', 'tr');
INSERT INTO `staff` VALUES (32, 'st26', 'วิทยาลัยอุตสาหกรรมและการจัดการ', 'ka');
