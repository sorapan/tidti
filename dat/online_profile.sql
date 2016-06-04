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
-- โครงสร้างตาราง `online_profile`
-- 

CREATE TABLE `online_profile` (
  `username` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL default 'Cleartext-Password',
  `pname` varchar(7) character set utf8 collate utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idcard` varchar(25) character set utf8 collate utf8_unicode_ci NOT NULL default '0000000000000',
  `mailaddr` varchar(200) character set utf8 collate utf8_unicode_ci NOT NULL,
  `discipline` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `department` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `year` varchar(5) character set utf8 collate utf8_unicode_ci NOT NULL,
  `dateregis` datetime NOT NULL default '0000-00-00 00:00:00',
  `encryption` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `status` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `location_id` varchar(5) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`username`),
  KEY `username` (`username`),
  KEY `department` (`department`),
  KEY `discipline` (`discipline`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `online_profile`
-- 

INSERT INTO `online_profile` VALUES ('11-11-11-11-11-11', 'Liu;b=yp;kpakp', 'นาย', 'กนกพล', 'เมืองรักษ์', '3800800567142', 'kanokpon.m@rmutsv.ac.th', '107', 'st12', '-', '2016-05-11 15:00:29', 'Cleartext-Password', 'เจ้าหน้าที่สารสนเทศ', 'sk');
INSERT INTO `online_profile` VALUES ('11-11-11-11-22-22', 'Liu;b=yp;kpakp', 'นาย', 'กนกพล', 'เมืองรักษ์', '3800800567142', 'kanokpon.m@rmutsv.ac.th', '107', 'st12', '-', '2016-05-11 15:04:28', 'Cleartext-Password', 'เจ้าหน้าที่สารสนเทศ', 'sk');
