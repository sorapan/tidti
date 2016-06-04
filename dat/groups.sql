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
-- โครงสร้างตาราง `groups`
-- 

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL auto_increment,
  `gname` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gdesc` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gupload` int(11) NOT NULL default '0',
  `gdownload` int(11) NOT NULL default '0',
  `gexpire` varchar(25) NOT NULL default '0000-00-00T00:00:00',
  `glimited` int(11) NOT NULL default '0',
  `gstatus` int(11) NOT NULL default '0',
  `location_id` varchar(5) NOT NULL,
  PRIMARY KEY  (`gid`),
  KEY `gname` (`gname`),
  KEY `gdesc` (`gdesc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2246 ;

-- 
-- dump ตาราง `groups`
-- 

INSERT INTO `groups` VALUES (2190, 'group20110524102433', 'บ้านเดี่ยว', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2169, 'group20100202133610', 'ARIT_WiFi', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2168, 'group20100202133504', 'บุคคลทั่วไป', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2167, 'group20100202133413', 'เจ้าหน้าที่', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2166, 'group20100202133332', 'อาจารย์', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2165, 'group20100202133149', 'นักศึกษา : ปกติ', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2170, 'group20100202205642', 'นักศึกษา : สมทบ', 50, 50, '0000-00-00T00:00:00 ', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2171, 'group20100203095708', 'นักศึกษา : แลกเปลี่ยน', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2178, 'group20100316140829', 'นักศึกษาฝึกงาน', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2183, 'group20100601092757', 'เจ้าหน้าที่สารสนเทศ', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2163, 'group20100201132041', 'ห้องอบรม', 50, 50, '0000-00-00T00:00:00 ', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2184, 'group20100730122620', 'ลูกจ้างชั่วคราว', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2186, 'group20110114093036', 'หอพัก43 ยูนิต', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2192, 'group20110621135722', 'E_Passport', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2187, 'group20110114093115', 'หอพัก 16 ยูนิต', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2188, 'group20110114093146', 'หอพักหญิง', 100, 100, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2189, 'group20110224144430', 'หอพัก30 ยูนิต', 50, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2241, 'group20150325132906', 'งานสารสนเทศ', 30, 30, '0000-00-00T00:00:00', 0, 0, 'ka');
INSERT INTO `groups` VALUES (2240, 'group20150325132849', 'งานสารบัญ', 50, 50, '0000-00-00T00:00:00', 0, 0, 'ka');
INSERT INTO `groups` VALUES (2242, 'group20150325133024', 'งานสัตวศาสตร์', 50, 60, '0000-00-00T00:00:00', 0, 0, 'tr');
INSERT INTO `groups` VALUES (2243, 'group20150325133053', 'งานเพาะชำ', 50, 10, '0000-00-00T00:00:00', 0, 0, 'tr');
INSERT INTO `groups` VALUES (2244, 'group20151211101510', 'อาจารย์เกษียณ', 0, 0, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2211, 'group20110922095929', 'อาจารย์จ้างสอน', 40, 50, '0000-00-00T00:00:00', 0, 0, 'sk');
INSERT INTO `groups` VALUES (2245, 'group20160121141230', 'เจ้าหน้าที่.', 0, 0, '0000-00-00T00:00:00', 0, 0, 'ka');
