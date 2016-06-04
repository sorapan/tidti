-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2016 at 02:35 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imfdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_prefix_name`
--

CREATE TABLE IF NOT EXISTS `ref_prefix_name` (
  `PREFIX_NAME_ID` varchar(3) collate utf8_unicode_ci NOT NULL,
  `FULLNAME` varchar(255) collate utf8_unicode_ci NOT NULL,
  `INITIALS` varchar(255) collate utf8_unicode_ci NOT NULL,
  `รหัสกรมการปกครอง` varchar(10) collate utf8_unicode_ci NOT NULL,
  `status` varchar(1) collate utf8_unicode_ci NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ref_prefix_name`
--

INSERT INTO `ref_prefix_name` (`PREFIX_NAME_ID`, `FULLNAME`, `INITIALS`, `รหัสกรมการปกครอง`, `status`) VALUES
('001', 'เด็กชาย', 'ด.ช.', '1', '0'),
('002', 'เด็กหญิง', 'ด.ญ.', '2', '0'),
('003', 'นาย', 'นาย', '3', '1'),
('004', 'นางสาว', 'น.ส.', '4', '1'),
('005', 'นาง', 'นาง', '5', '1'),
('006', 'นักโทษชายหม่อมหลวง', 'น.ช.ม.ล.', '6', '0'),
('007', 'นักโทษชาย', 'น.ช.', '7', '0'),
('008', 'นักโทษหญิง', 'น.ญ.', '8', '0'),
('009', 'นักโทษชายจ่าสิบเอก', 'น.ช.จ.ส.อ.', '9', '0'),
('010', 'นักโทษชายจ่าเอก', 'น.ช.จ.อ.', '10', '0'),
('011', 'นักโทษชายพลทหาร', 'น.ช.พลฯ.', '11', '0'),
('012', 'นักโทษชายร้อยตรี', 'น.ช.ร.ต.', '12', '0'),
('099', 'พระเจ้าหลานเธอ พระองค์เจ้า', 'พระเจ้าหลานเธอ พระองค์เจ้า', '99', '0'),
('100', 'พระบาทสมเด็จพระเจ้าอยู่หัว', 'พระบาทสมเด็จพระเจ้าอยู่หัว', '100', '0'),
('101', 'สมเด็จพระนางเจ้า', 'สมเด็จพระนางเจ้า', '101', '0'),
('102', 'สมเด็จพระศรีนครินทราบรมราชชนนี', 'สมเด็จพระศรีนครินทราบรมราชชนนี', '102', '0'),
('103', 'พลโทสมเด็จพระบรมโอรสาธิราช', 'พลโทสมเด็จพระบรมโอรสาธิราช', '103', '0'),
('104', 'พลตรีสมเด็จพระเทพรัตนราชสุดา', 'พลตรีสมเด็จพระเทพรัตนราชสุดา', '104', '0'),
('105', 'พระเจ้าวรวงศ์เธอพระองค์หญิง', 'พระเจ้าวรวงศ์เธอพระองค์หญิง', '105', '0'),
('106', 'พระเจ้าวรวงศ์เธอ พระองค์เจ้า', 'พระเจ้าวรวงศ์เธอ พระองค์เจ้า', '106', '0'),
('107', 'สมเด็จพระราชชนนี', 'สมเด็จพระราชชนนี', '107', '0'),
('108', 'สมเด็จพระเจ้าพี่นางเธอเจ้าฟ้า', 'สมเด็จพระเจ้าพี่นางเธอเจ้าฟ้า', '108', '0'),
('109', 'สมเด็จพระ', 'สมเด็จพระ', '109', '0'),
('110', 'สมเด็จพระเจ้าลูกเธอ', 'สมเด็จพระเจ้าลูกเธอ', '110', '0'),
('111', 'สมเด็จพระเจ้าลูกยาเธอ', 'สมเด็จพระเจ้าลูกยาเธอ', '111', '0'),
('112', 'สมเด็จเจ้าฟ้า', 'สมเด็จเจ้าฟ้า', '112', '0'),
('113', 'พระเจ้าบรมวงศ์เธอ', 'พระเจ้าบรมวงศ์เธอ', '113', '0'),
('114', 'พระเจ้าวรวงศ์เธอ', 'พระเจ้าวรวงศ์เธอ', '114', '0'),
('115', 'พระเจ้าหลานเธอ', 'พระเจ้าหลานเธอ', '115', '0'),
('116', 'พระเจ้าหลานยาเธอ', 'พระเจ้าหลานยาเธอ', '116', '0'),
('117', 'พระวรวงศ์เธอ', 'พระวรวงศ์เธอ', '117', '0'),
('118', 'สมเด็จพระเจ้าภคินีเธอ', 'สมเด็จพระเจ้าภคินีเธอ', '118', '0'),
('119', 'พระองค์เจ้า', 'พระองค์เจ้า', '119', '0'),
('120', 'หม่อมเจ้า', 'ม.จ.', '120', '0'),
('121', 'หม่อมราชวงศ์', 'ม.ร.ว.', '121', '0'),
('122', 'หม่อมหลวง', 'ม.ล.', '122', '0'),
('123', 'พระยา', 'พระยา', '123', '0'),
('124', 'หลวง', 'หลวง', '124', '0'),
('125', 'ขุน', 'ขุน', '125', '0'),
('126', 'หมื่น', 'หมื่น', '126', '0'),
('127', 'เจ้าคุณ', 'เจ้าคุณ', '127', '0'),
('128', 'พระวรวงศ์เธอพระองค์เจ้า', 'พระวรวงศ์เธอพระองค์เจ้า', '128', '0'),
('130', 'คุณหญิง', 'คุณหญิง', '130', '0'),
('131', 'ท่านผู้หญิงหม่อมหลวง', 'ท่านผู้หญิง ม.ล.', '131', '0'),
('132', 'ศาสตราจารย์นายแพทย์', 'ศ.น.พ.', '132', '0'),
('133', 'แพทย์หญิงคุณหญิง', 'พ.ญ.คุณหญิง', '133', '0'),
('134', 'นายแพทย์', 'น.พ.', '134', '0'),
('135', 'แพทย์หญิง', 'พ.ญ.', '135', '0'),
('136', 'ทันตแพทย์', 'ท.พ.', '136', '0'),
('137', 'ทันตแพทย์หญิง', 'ท.ญ.', '137', '0'),
('138', 'สัตวแพทย์', 'สพ.', '138', '0'),
('139', 'สัตวแพทย์หญิง', 'สญ.', '139', '0'),
('141', 'ผู้ช่วยศาสตราจารย์', 'ผศ.', '141', '0'),
('142', 'รองศาสตราจารย์', 'รศ.', '142', '0'),
('143', 'ศาสตราจารย์', 'ศ.', '143', '0'),
('144', 'เภสัชกรชาย', 'ภก.', '144', '0'),
('145', 'เภสัชกรหญิง', 'ภญ.', '145', '0'),
('146', 'หม่อม', 'หม่อม', '146', '0'),
('147', 'รองอำมาตย์เอก', 'รองอำมาตย์เอก', '147', '0'),
('148', 'ท้าว', 'ท้าว', '148', '0'),
('149', 'เจ้า', 'เจ้า', '149', '0'),
('150', 'ท่านผู้หญิง', 'ท่านผู้หญิง', '150', '0'),
('151', 'คุณพระ', 'คุณพระ', '151', '0'),
('152', 'ศาสตราจารย์คุณหญิง', 'ศ.คุณหญิง', '152', '0'),
('153', 'ซิสเตอร์', 'ซิสเตอร์', '153', '0'),
('154', 'เจ้าชาย', 'เจ้าชาย', '154', '0'),
('155', 'เจ้าหญิง', 'เจ้าหญิง', '155', '0'),
('156', 'รองเสวกตรี', 'รองเสวกตรี', '156', '0'),
('157', 'เสด็จเจ้า', 'เสด็จเจ้า', '157', '0'),
('158', 'เอกอัครราชฑูต', 'เอกอัครราชฑูต', '158', '0'),
('159', 'พลสารวัตร', 'พลสารวัตร', '159', '0'),
('160', 'สมเด็จเจ้า', 'สมเด็จเจ้า', '160', '0'),
('161', 'เจ้าฟ้า', 'เจ้าฟ้า', '161', '0'),
('162', 'รองอำมาตย์ตรี', 'รองอำมาตย์ตรี', '162', '0'),
('163', 'หม่อมเจ้าหญิง', 'ม.จ.หญิง', '163', '0'),
('164', 'ทูลกระหม่อม', 'ทูลกระหม่อม', '164', '0'),
('166', 'เจ้านาง', 'เจ้านาง', '166', '0'),
('167', 'จ่าสำรอง', 'จ่าสำรอง', '167', '0'),
('200', 'พลเอก', 'พล.อ.', '200', '0'),
('201', 'ว่าที่พลเอก', 'ว่าที่ พล.อ.', '201', '0'),
('202', 'พลโท', 'พล.ท.', '202', '0'),
('204', 'พลตรี', 'พล.ต.', '204', '0'),
('205', 'ว่าที่พลตรี', 'ว่าที่ พล.ต.', '205', '0'),
('206', 'พันเอกพิเศษ', 'พ.อ.(พิเศษ)', '206', '0'),
('207', 'ว่าที่พันเอกพิเศษ', 'ว่าที่ พ.อ.(พิเศษ)', '207', '0'),
('208', 'พันเอก', 'พ.อ.', '208', '0'),
('209', 'ว่าที่พันเอก', 'ว่าที่ พ.อ.', '209', '0'),
('210', 'พันโท', 'พ.ท.', '210', '0'),
('211', 'ว่าที่พันโท', 'ว่าที่ พ.ท.', '211', '0'),
('212', 'พันตรี', 'พ.ต.', '212', '0'),
('213', 'ว่าที่พันตรี', 'ว่าที่ พ.ต.', '213', '0'),
('214', 'ร้อยเอก', 'ร.อ.', '214', '0'),
('215', 'ว่าที่ร้อยเอก', 'ว่าที่ ร.อ.', '215', '0'),
('216', 'ร้อยโท', 'ร.ท.', '216', '0'),
('217', 'ว่าที่ร้อยโท', 'ว่าที่ ร.ท.', '217', '0'),
('218', 'ร้อยตรี', 'ร.ต.', '218', '0'),
('219', 'ว่าที่ร้อยตรี', 'ว่าที่ ร.ต.', '219', '1'),
('220', 'จ่าสิบเอก', 'จ.ส.อ.', '220', '0'),
('221', 'จ่าสิบโท', 'จ.ส.ท.', '221', '0'),
('222', 'จ่าสิบตรี', 'จ.ส.ต.', '222', '0'),
('223', 'สิบเอก', 'ส.อ.', '223', '0'),
('224', 'สิบโท', 'ส.ท.', '224', '0'),
('225', 'สิบตรี', 'ส.ต.', '225', '0'),
('226', 'พลทหาร', 'พลฯ', '226', '0'),
('227', 'นักเรียนนายร้อย', 'นนร.', '227', '0'),
('228', 'นักเรียนนายสิบ', 'นนส.', '228', '0'),
('229', 'พลจัตวา', 'พล.จ.', '229', '0'),
('230', 'พลฯ อาสาสมัคร', 'พลฯ อาสา', '230', '0'),
('231', 'ร้อยเอกหม่อมเจ้า', 'ร.อ.ม.จ.', '231', '0'),
('232', 'พลโทหม่อมเจ้า', 'พล.ท.ม.จ.', '232', '0'),
('233', 'ร้อยตรีหม่อมเจ้า', 'ร.ต.ม.จ.', '233', '0'),
('234', 'ร้อยโทหม่อมเจ้า', 'ร.ท.ม.จ.', '234', '0'),
('235', 'พันโทหม่อมเจ้า', 'พ.ท.ม.จ.', '235', '0'),
('236', 'พันเอกหม่อมเจ้า', 'พ.อ.ม.จ.', '236', '0'),
('237', 'พันตรีหม่อมราชวงศ์', 'พ.ต.ม.ร.ว.', '237', '0'),
('238', 'พันโทหม่อมราชวงศ์', 'พ.ท.ม.ร.ว.', '238', '0'),
('239', 'สิบตรีหม่อมราชวงศ์', 'ส.ต.ม.ร.ว.', '239', '0'),
('240', 'พันเอกหม่อมราชวงศ์', 'พ.อ.ม.ร.ว.', '240', '0'),
('241', 'จ่าสิบเอกหม่อมราชวงศ์', 'จ.ส.อ.ม.ร.ว.', '241', '0'),
('242', 'ร้อยเอกหม่อมราชวงศ์', 'ร.อ.ม.ร.ว.', '242', '0'),
('243', 'ร้อยตรีหม่อมราชวงศ์', 'ร.ต.ม.ร.ว.', '243', '0'),
('244', 'สิบเอกหม่อมราชวงศ์', 'ส.อ.ม.ร.ว.', '244', '0'),
('245', 'ร้อยโทหม่อมราชวงศ์', 'ร.ท.ม.ร.ว.', '245', '0'),
('246', 'พันเอก(พิเศษ)หม่อมราชวงศ์', 'พ.อ.(พิเศษ)ม.ร.ว.', '246', '0'),
('247', 'พลฯหม่อมหลวง', 'พลฯม.ล.', '247', '0'),
('248', 'ร้อยเอกหม่อมหลวง', 'ร.อ.ม.ล.', '248', '0'),
('249', 'สิบโทหม่อมหลวง', 'ส.ท.ม.ล.', '249', '0'),
('250', 'พลโทหม่อมหลวง', 'พล.ท.ม.ล.', '250', '0'),
('251', 'ร้อยโทหม่อมหลวง', 'ร.ท.ม.ล.', '251', '0'),
('252', 'ร้อยตรีหม่อมหลวง', 'ร.ต.ม.ล.', '252', '0'),
('253', 'สิบเอกหม่อมหลวง', 'ส.อ.ม.ล.', '253', '0'),
('254', 'พลตรีหม่อมหลวง', 'พล.ต.ม.ล.', '254', '0'),
('255', 'พันตรีหม่อมหลวง', 'พ.ต.ม.ล.', '255', '0'),
('256', 'พันเอกหม่อมหลวง', 'พ.อ.ม.ล.', '256', '0'),
('257', 'พันโทหม่อมหลวง', 'พ.ท.ม.ล.', '257', '0'),
('258', 'จ่าสิบตรีหม่อมหลวง', 'จ.ส.ต.ม.ล.', '258', '0'),
('259', 'นักเรียนนายร้อยหม่อมหลวง', 'นนร.ม.ล.', '259', '0'),
('260', 'ว่าที่ร้อยตรีหม่อมหลวง', 'ว่าที่ร.ต.ม.ล.', '260', '0'),
('261', 'จ่าสิบเอกหม่อมหลวง', 'จ.ส.อ.ม.ล.', '261', '0'),
('262', 'ร้อยเอกนายแพทย์', 'ร.อ.น.พ.', '262', '0'),
('263', 'ร้อยเอกแพทย์หญิง', 'ร.อ.พ.ญ.', '263', '0'),
('264', 'ร้อยโทนายแพทย์', 'ร.ท.น.พ.', '264', '0'),
('265', 'พันตรีนายแพทย์', 'พ.ต.น.พ.', '265', '0'),
('266', 'ว่าที่ร้อยโทนายแพทย์', 'ว่าที่ ร.ท.น.พ.', '266', '0'),
('267', 'พันเอกนายแพทย์', 'พ.อ.น.พ.', '267', '0'),
('268', 'ร้อยตรีนายแพทย์', 'ร.ต.น.พ.', '268', '0'),
('269', 'ร้อยโทแพทย์หญิง', 'ร.ท.พ.ญ.', '269', '0'),
('270', 'พลตรีนายแพทย์', 'พล.ต.น.พ.', '270', '0'),
('271', 'พันโทนายแพทย์', 'พ.ท.น.พ.', '271', '0'),
('272', 'จอมพล', 'จอมพล', '272', '0'),
('273', 'พันโทหลวง', 'พ.ท.หลวง', '273', '0'),
('274', 'พันตรีพระเจ้าวรวงศ์เธอพระองค์เจ้า', 'พ.ต.พระเจ้าวรวงศ์เธอพระองค์เจ้า', '274', '0'),
('275', 'ศาสตราจารย์พันเอก', 'ศ.พ.อ.', '275', '0'),
('276', 'พันตรีหลวง', 'พ.ต.หลวง', '276', '0'),
('277', 'พลโทหลวง', 'พล.ท.หลวง', '277', '0'),
('280', 'สารวัตรทหาร', 'ส.ห.', '280', '0'),
('282', 'พันตรีคุณหญิง', 'พ.ต.คุณหญิง', '282', '0'),
('283', 'จ่าสิบตรีหม่อมราชวงศ์', 'จ.ส.ต.ม.ร.ว.', '283', '0'),
('284', 'พลจัตวาหลวง', 'พล.จ.หลวง', '284', '0'),
('285', 'พลตรีหม่อมราชวงศ์', 'พล.ต.ม.ร.ว.', '285', '0'),
('286', 'พันตรีพระเจ้าวรวงศ์เธอพระองค์', 'พ.ต.พระเจ้าวรวงศ์เธอพระองค์', '286', '0'),
('287', 'ท่านผู้หญิงหม่อมราชวงศ์', 'ท่านผู้หญิง ม.ร.ว.', '287', '0'),
('288', 'ศาสตราจารย์ร้อยเอก', 'ศ.ร.อ.', '288', '0'),
('289', 'พันโทคุณหญิง', 'พ.ท.คุณหญิง', '289', '0'),
('290', 'ร้อยตรีแพทย์หญิง', 'ร.ต.พ.ญ.', '290', '0'),
('291', 'พลเอกหม่อมหลวง', 'พล.อ.มล.', '291', '0'),
('292', 'ว่าที่ร้อยตรีหม่อมราชวงศ์', 'ว่าที่ ร.ต.ม.ร.ว.', '292', '0'),
('293', 'พันเอกหญิงคุณหญิง', 'พ.อ.หญิง คุณหญิง', '293', '0'),
('294', 'จ่าสิบเอกพิเศษ', 'จ.ส.อ.พิเศษ', '294', '0'),
('351', 'พลเรือเอก', 'พล.ร.อ.', '351', '0'),
('352', 'ว่าที่พลเรือเอก', 'ว่าที่ พล.ร.อ.', '352', '0'),
('353', 'พลเรือโท', 'พล.ร.ท.', '353', '0'),
('354', 'ว่าที่พลเรือโท', 'ว่าที่ พล.ร.ท.', '354', '0'),
('355', 'พลเรือตรี', 'พล.ร.ต.', '355', '0'),
('356', 'ว่าที่พลเรือตรี', 'ว่าที่ พล.ร.ต.', '356', '0'),
('357', 'นาวาเอกพิเศษ', 'น.อ.พิเศษ', '357', '0'),
('358', 'ว่าที่นาวาเอกพิเศษ', 'ว่าที่ น.อ.พิเศษ', '358', '0'),
('359', 'นาวาเอก', 'น.อ.', '359', '0'),
('360', 'ว่าที่นาวาเอก', 'ว่าที่ น.อ.', '360', '0'),
('361', 'นาวาโท', 'น.ท.', '361', '0'),
('362', 'ว่าที่นาวาโท', 'ว่าที่ น.ท.', '362', '0'),
('363', 'นาวาตรี', 'น.ต.', '363', '0'),
('364', 'ว่าที่นาวาตรี', 'ว่าที่ น.ต.', '364', '0'),
('365', 'เรือเอก', 'ร.อ.', '365', '0'),
('366', 'ว่าที่เรือเอก', 'ว่าที่ ร.อ.', '366', '0'),
('367', 'เรือโท', 'ร.ท.', '367', '0'),
('368', 'ว่าที่เรือโท', 'ว่าที่ ร.ท.', '368', '0'),
('369', 'เรือตรี', 'ร.ต.', '369', '0'),
('370', 'ว่าที่เรือตรี', 'ว่าที่ ร.ต.', '370', '0'),
('371', 'พันจ่าเอก', 'พ.จ.อ.', '371', '0'),
('372', 'พันจ่าโท', 'พ.จ.ท.', '372', '0'),
('373', 'พันจ่าตรี', 'พ.จ.ต.', '373', '0'),
('374', 'จ่าเอก', 'จ.อ.', '374', '0'),
('375', 'จ่าโท', 'จ.ท.', '375', '0'),
('376', 'จ่าตรี', 'จ.ต.', '376', '0'),
('377', 'พลฯทหารเรือ', 'พลฯ', '377', '0'),
('378', 'นักเรียนนายเรือ', 'นนร.', '378', '0'),
('379', 'นักเรียนจ่าทหารเรือ', 'นรจ.', '379', '0'),
('380', 'พลเรือจัตวา', 'พล.ร.จ.', '380', '0'),
('381', 'นาวาโทหม่อมเจ้า', 'น.ท.ม.จ.', '381', '0'),
('382', 'นาวาเอกหม่อมเจ้า', 'น.อ.ม.จ.', '382', '0'),
('383', 'นาวาตรีหม่อมเจ้า', 'น.ต.ม.จ.', '383', '0'),
('384', 'พลเรือตรีหม่อมราชวงศ์', 'พล.ร.ต.ม.ร.ว.', '384', '0'),
('385', 'นาวาเอกหม่อมราชวงศ์', 'น.อ.ม.ร.ว.', '385', '0'),
('386', 'นาวาโทหม่อมราชวงศ์', 'น.ท.ม.ร.ว.', '386', '0'),
('387', 'นาวาตรีหม่อมราชวงศ์', 'น.ต.ม.ร.ว.', '387', '0'),
('388', 'นาวาโทหม่อมหลวง', 'น.ท.ม.ล.', '388', '0'),
('389', 'นาวาตรีหม่อมหลวง', 'น.ต.ม.ล.', '389', '0'),
('390', 'พันจ่าเอกหม่อมหลวง', 'พ.จ.อ.ม.ล.', '390', '0'),
('391', 'นาวาตรีแพทย์หญิง', 'น.ต.พ.ญ.', '391', '0'),
('392', 'นาวาอากาศเอกหลวง', 'น.อ.หลวง', '392', '0'),
('393', 'พลเรือตรีหม่อมเจ้า', 'พล.ร.ต.ม.จ.', '393', '0'),
('395', 'นาวาตรีนายแพทย์', 'น.ต.น.พ.', '395', '0'),
('396', 'พลเรือตรีหม่อมหลวง', 'พล.ร.ต.ม.ล.', '396', '0'),
('500', 'พลอากาศเอก', 'พล.อ.อ.', '500', '0'),
('501', 'ว่าที่พลอากาศเอก', 'ว่าที่ พล.อ.อ.', '501', '0'),
('502', 'พลอากาศโท', 'พล.อ.ท.', '502', '0'),
('503', 'ว่าที่พลอากาศโท', 'ว่าที่ พล.อ.ท.', '503', '0'),
('504', 'พลอากาศตรี', 'พล.อ.ต.', '504', '0'),
('505', 'ว่าที่พลอากาศตรี', 'ว่าที่ พล.อ.ต.', '505', '0'),
('506', 'นาวาอากาศเอกพิเศษ', 'น.อ.พิเศษ', '506', '0'),
('507', 'ว่าที่นาวาอากาศเอกพิเศษ', 'ว่าที่ น.อ.พิเศษ', '507', '0'),
('508', 'นาวาอากาศเอก', 'น.อ.', '508', '0'),
('509', 'ว่าที่นาวาอากาศเอก', 'ว่าที่ น.อ.', '509', '0'),
('510', 'นาวาอากาศโท', 'น.ท.', '510', '0'),
('511', 'ว่าที่นาวาอากาศโท', 'ว่าที่ น.ท.', '511', '0'),
('512', 'นาวาอากาศตรี', 'น.ต.', '512', '0'),
('513', 'ว่าที่นาวาอากาศตรี', 'ว่าที่ น.ต.', '513', '0'),
('514', 'เรืออากาศเอก', 'ร.อ.', '514', '0'),
('515', 'ว่าที่เรืออากาศเอก', 'ว่าที่ ร.อ.', '515', '0'),
('516', 'เรืออากาศโท', 'ร.ท.', '516', '0'),
('517', 'ว่าที่เรืออากาศโท', 'ว่าที่ ร.ท.', '517', '0'),
('518', 'เรืออากาศตรี', 'ร.ต.', '518', '0'),
('519', 'ว่าที่เรืออากาศตรี', 'ว่าที่ ร.ต.', '519', '0'),
('520', 'พันจ่าอากาศเอก', 'พ.อ.อ.', '520', '0'),
('521', 'พันจ่าอากาศโท', 'พ.อ.ท.', '521', '0'),
('522', 'พันจ่าอากาศตรี', 'พ.อ.ต.', '522', '0'),
('523', 'จ่าอากาศเอก', 'จ.อ.', '523', '0'),
('524', 'จ่าอากาศโท', 'จ.ท.', '524', '0'),
('525', 'จ่าอากาศตรี', 'จ.ต.', '525', '0'),
('526', 'พลฯทหารอากาศ', 'พลฯ', '526', '0'),
('527', 'นักเรียนนายเรืออากาศ', 'นนอ.', '527', '0'),
('528', 'นักเรียนจ่าอากาศ', 'นจอ.', '528', '0'),
('529', 'นักเรียนพยาบาลทหารอากาศ', 'น.พ.อ.', '529', '0'),
('530', 'พันอากาศเอกหม่อมราชวงศ์', 'พ.อ.อ.ม.ร.ว.', '530', '0'),
('531', 'พลอากาศตรีหม่อมราชวงศ์', 'พล.อ.ต.ม.ร.ว.', '531', '0'),
('532', 'พลอากาศโทหม่อมหลวง', 'พล.อ.ท.ม.ล.', '532', '0'),
('533', 'เรืออากาศโทขุน', 'ร.ท.ขุน', '533', '0'),
('534', 'พันจ่าอากาศเอกหม่อมหลวง', 'พ.อ.อ.ม.ล.', '534', '0'),
('535', 'เรืออากาศเอกนายแพทย์', 'ร.อ.น.พ.', '535', '0'),
('536', 'พลอากาศเอกหม่อมราชวงศ์', 'พล.อ.อ.ม.ร.ว.', '536', '0'),
('537', 'พลอากาศตรีหม่อมหลวง', 'พล.อ.ต.ม.ล.', '537', '0'),
('538', 'พลอากาศจัตวา', 'พล.อ.จ.', '538', '0'),
('539', 'พลอากาศโทหม่อมราชวงศ์', 'พล.อ.ท.ม.ร.ว.', '539', '0'),
('540', 'นาวาอากาศเอกหม่อมหลวง', 'น.อ.ม.ล.', '540', '0'),
('606', 'พระครูพิบูลสมณธรรม', 'พระครูพิบูลสมณธรรม', '606', '0'),
('651', 'พลตำรวจเอก', 'พล.ต.อ.', '651', '0'),
('652', 'ว่าที่พลตำรวจเอก', 'ว่าที่ พล.ต.อ.', '652', '0'),
('653', 'พลตำรวจโท', 'พล.ต.ท.', '653', '0'),
('654', 'ว่าที่พลตำรวจโท', 'ว่าที่ พล.ต.ท.', '654', '0'),
('655', 'พลตำรวจตรี', 'พล.ต.ต.', '655', '0'),
('656', 'ว่าที่พลตำรวจตรี', 'ว่าที่ พล.ต.ต.', '656', '0'),
('657', 'พลตำรวจจัตวา', 'พล.ต.จ.', '657', '0'),
('658', 'ว่าที่พลตำรวจจัตวา', 'ว่าที่พล.ต.จ.', '658', '0'),
('659', 'พันตำรวจเอก (พิเศษ)', 'พ.ต.อ. (พิเศษ)', '659', '0'),
('660', 'ว่าที่พันตำรวจเอก(พิเศษ)', 'ว่าที่ พ.ต.อ.พิเศษ', '660', '0'),
('661', 'พันตำรวจเอก', 'พ.ต.อ.', '661', '0'),
('662', 'ว่าที่พันตำรวจเอก', 'ว่าที่ พ.ต.อ.', '662', '0'),
('663', 'พันตำรวจโท', 'พ.ต.ท.', '663', '0'),
('664', 'ว่าที่พันตำรวจโท', 'ว่าที่ พ.ต.ท.', '664', '0'),
('665', 'พันตำรวจตรี', 'พ.ต.ต.', '665', '0'),
('666', 'ว่าที่พันตำรวจตรี', 'ว่าที่ พ.ต.ต.', '666', '0'),
('667', 'ร้อยตำรวจเอก', 'ร.ต.อ.', '667', '0'),
('668', 'ว่าที่ร้อยตำรวจเอก', 'ว่าที่ ร.ต.อ.', '668', '0'),
('669', 'ร้อยตำรวจโท', 'ร.ต.ท.', '669', '0'),
('670', 'ว่าที่ร้อยตำรวจโท', 'ว่าที่ ร.ต.ท.', '670', '0'),
('671', 'ร้อยตำรวจตรี', 'ร.ต.ต.', '671', '0'),
('672', 'ว่าที่ร้อยตำรวจตรี', 'ว่าที่ ร.ต.ต.', '672', '0'),
('673', 'นายดาบตำรวจ', 'ด.ต.', '673', '0'),
('674', 'จ่าสิบตำรวจ', 'จ.ส.ต.', '674', '0'),
('675', 'สิบตำรวจเอก', 'ส.ต.อ.', '675', '0'),
('676', 'สิบตำรวจโท', 'ส.ต.ท.', '676', '0'),
('677', 'สิบตำรวจตรี', 'ส.ต.ต.', '677', '0'),
('678', 'นักเรียนนายร้อยตำรวจ', 'นรต.', '678', '0'),
('679', 'นักเรียนนายสิบตำรวจ', 'นสต.', '679', '0'),
('680', 'นักเรียนพลตำรวจ', 'นพต.', '680', '0'),
('681', 'พลตำรวจ', 'พลฯ', '681', '0'),
('682', 'พลตำรวจพิเศษ', 'พลฯพิเศษ', '682', '0'),
('683', 'พลตำรวจอาสาสมัคร', 'พลฯอาสา', '683', '0'),
('684', 'พลตำรวจสำรอง', 'พลฯสำรอง', '684', '0'),
('685', 'พลตำรวจสำรองพิเศษ', 'พลฯสำรองพิเศษ', '685', '0'),
('686', 'พลตำรวจสมัคร', 'พลฯสมัคร', '686', '0'),
('687', 'สมาชิกอาสารักษาดินแดน', 'อส.', '687', '0'),
('688', 'นายกองใหญ่', 'ก.ญ.', '688', '0'),
('689', 'นายกองเอก', 'ก.อ.', '689', '0'),
('690', 'นายกองโท', 'ก.ท.', '690', '0'),
('691', 'นายกองตรี', 'ก.ต.', '691', '0'),
('692', 'นายหมวดเอก', 'มว.อ.', '692', '0'),
('693', 'นายหมวดโท', 'มว.ท.', '693', '0'),
('694', 'นายหมวดตรี', 'มว.ต.', '694', '0'),
('695', 'นายหมู่ใหญ่', 'ม.ญ.', '695', '0'),
('696', 'นายหมู่เอก', 'ม.อ.', '696', '0'),
('697', 'นายหมู่โท', 'ม.ท.', '697', '0'),
('698', 'นายหมู่ตรี', 'ม.ต.', '698', '0'),
('699', 'สมาชิกเอก', 'สมาชิกเอก', '699', '0'),
('700', 'สมาชิกโท', 'สมาชิกโท', '700', '0'),
('701', 'สมาชิกตรี', 'สมาชิกตรี', '701', '0'),
('702', 'อาสาสมัครทหารพราน', 'อส.ทพ.', '702', '0'),
('703', 'พันตำรวจโทหม่อมเจ้า', 'พ.ต.ท.ม.จ.', '703', '0'),
('704', 'พันตำรวจเอกหม่อมเจ้า', 'พ.ต.อ.ม.จ.', '704', '0'),
('705', 'นักเรียนนายร้อยตำรวจหม่อมเจ้า', 'นรต.ม.จ.', '705', '0'),
('706', 'พลตำรวจตรีหม่อมราชวงศ์', 'พล.ต.ต.ม.ร.ว.', '706', '0'),
('707', 'พันตำรวจตรีหม่อมราชวงศ์', 'พ.ต.ต.ม.ร.ว.', '707', '0'),
('708', 'พันตำรวจโทหม่อมราชวงศ์', 'พ.ต.ท.ม.ร.ว.', '708', '0'),
('709', 'พันตำรวจเอกหม่อมราชวงศ์', 'พ.ต.อ.ม.ร.ว.', '709', '0'),
('710', 'ร้อยตำรวจเอกหม่อมราชวงศ์', 'ร.ต.อ.ม.ร.ว.', '710', '0'),
('711', 'สิบตำรวจเอกหม่อมหลวง', 'ส.ต.อ.ม.ล.', '711', '0'),
('712', 'พันตำรวจเอกหม่อมหลวง', 'พ.ต.อ.ม.ล.', '712', '0'),
('713', 'พันตำรวจโทหม่อมหลวง', 'พ.ต.ท.ม.ล.', '713', '0'),
('714', 'นักเรียนนายร้อยตำรวจหม่อมหลวง', 'นรต.ม.ล.', '714', '0'),
('715', 'ร้อยตำรวจโทหม่อมหลวง', 'ร.ต.ท.ม.ล.', '715', '0'),
('716', 'นายดาบตำรวจหม่อมหลวง', 'ด.ต.ม.ล.', '716', '0'),
('717', 'พันตำรวจตรีหม่อมหลวง', 'พ.ต.ต.ม.ล.', '717', '0'),
('718', 'ศาสตราจารย์นายแพทย์พันตำรวจเอก', 'ศ.น.พ.พ.ต.อ.', '718', '0'),
('719', 'พันตำรวจโทนายแพทย์', 'พ.ต.ท.น.พ.', '719', '0'),
('720', 'ร้อยตำรวจโทนายแพทย์', 'ร.ต.ท.น.พ.', '720', '0'),
('721', 'ร้อยตำรวจเอกนายแพทย์', 'ร.ต.อ.น.พ.', '721', '0'),
('722', 'พันตำรวจตรีนายแพทย์', 'พ.ต.ต.นพ.', '722', '0'),
('723', 'พันตำรวจเอกนายแพทย์', 'พ.ต.อ.น.พ.', '723', '0'),
('724', 'พันตำรวจตรีหลวง', 'พ.ต.ต.หลวง', '724', '0'),
('727', 'ร้อยตำรวจเอกหม่อมหลวง', 'ร.ต.อ.ม.ล.', '727', '0'),
('729', 'พันตำรวจเอกหญิง ท่านผู้หญิง', 'พ.ต.อ.หญิง ท่านผู้หญิง', '729', '0'),
('730', 'พลตำรวจตรีหม่อมหลวง', 'พล.ต.ต.ม.ล.', '730', '0'),
('731', 'พลตรีหญิง คุณหญิง', 'พล.ต.หญิง คุณหญิง', '731', '0'),
('732', 'ว่าที่สิบเอก', 'ว่าที่ ส.อ.', '732', '0'),
('800', 'สมเด็จพระสังฆราชเจ้า', 'สมเด็จพระสังฆราชเจ้า', '800', '0'),
('801', 'สมเด็จพระสังฆราช', 'สมเด็จพระสังฆราช', '801', '0'),
('802', 'สมเด็จพระราชาคณะ', 'สมเด็จพระราชาคณะ', '802', '0'),
('803', 'รองสมเด็จพระราชาคณะ', 'รองสมเด็จพระราชาคณะ', '803', '0'),
('804', 'พระราชาคณะ', 'พระราชาคณะ', '804', '0'),
('805', 'พระเปรียญธรรม', 'พระเปรียญธรรม', '805', '0'),
('806', 'พระหิรัญยบัฏ', 'พระหิรัญยบัฏ', '806', '0'),
('807', 'พระสัญญาบัตร', 'พระสัญญาบัตร', '807', '0'),
('808', 'พระราช', 'พระราช', '808', '0'),
('809', 'พระเทพ', 'พระเทพ', '809', '0'),
('810', 'พระปลัดขวา', 'พระปลัดขวา', '810', '0'),
('811', 'พระปลัดซ้าย', 'พระปลัดซ้าย', '811', '0'),
('812', 'พระครูปลัด', 'พระครูปลัด', '812', '0'),
('813', 'พระครูปลัดสุวัฒนญาณคุณ', 'พระครูปลัดสุวัฒนญาณคุณ', '813', '0'),
('814', 'พระครูปลัดอาจารย์วัฒน์', 'พระครูปลัดอาจารย์วัฒน์', '814', '0'),
('815', 'พระครูวิมลสิริวัฒน์', 'พระครูปลัดวิมลสิริวัฒน์', '815', '0'),
('816', 'พระสมุห์', 'พระสมุห์', '816', '0'),
('817', 'พระครูสมุห์', 'พระครูสมุห์', '817', '0'),
('818', 'พระครู', 'พระครู', '818', '0'),
('819', 'พระครูใบฎีกา', 'พระครูใบฎีกา', '819', '0'),
('820', 'พระครูธรรมธร', 'พระครูธรรมธร', '820', '0'),
('821', 'พระครูวิมลภาณ', 'พระครูวิมลภาณ', '821', '0'),
('822', 'พระครูศัพทมงคล', 'พระครูศัพทมงคล', '822', '0'),
('823', 'พระครูสังฆภารวิชัย', 'พระครูสังฆภารวิชัย', '823', '0'),
('824', 'พระครูสังฆรักษ์', 'พระครูสังฆรักษ์', '824', '0'),
('825', 'พระครูสังฆวิชัย', 'พระครูสังฆวิชัย', '825', '0'),
('826', 'พระครูสังฆวิชิต', 'พระครูสังฆวิชิต', '826', '0'),
('827', 'พระปิฎก', 'พระปิฎก', '827', '0'),
('828', 'พระปริยัติ', 'พระปริยัติ', '828', '0'),
('829', 'เจ้าอธิการ', 'เจ้าอธิการ', '829', '0'),
('830', 'พระอธิการ', 'พระอธิการ', '830', '0'),
('831', 'พระ', 'พระ', '831', '0'),
('832', 'สามเณร', 'ส.ณ.', '832', '0'),
('833', 'พระปลัด', 'พระปลัด', '833', '0'),
('834', 'สมเด็จพระอริยวงศาคตญาณ', 'สมเด็จพระอริยวงศาคตญาณ', '834', '0'),
('835', 'พระคาร์ดินัล', 'พระคาร์ดินัล', '835', '0'),
('836', 'พระสังฆราช', 'พระสังฆราช', '836', '0'),
('837', 'พระคุณเจ้า', 'พระคุณเจ้า', '837', '0'),
('838', 'บาทหลวง', 'บาทหลวง', '838', '0'),
('839', 'พระมหา', 'พระมหา', '839', '0'),
('840', 'พระราชปัญญา', 'พระราชปัญญา', '840', '0'),
('841', 'ภาราดา', 'ภาราดา', '841', '0'),
('842', 'พระศรีปริยัติธาดา', 'พระศรีปริยัติธาดา', '842', '0'),
('843', 'พระญาณโศภณ', 'พระญาณโศภณ', '843', '0'),
('844', 'สมเด็จพระมหาวีรวงศ์', 'สมเด็จพระมหาวีรวงศ์', '844', '0'),
('845', 'พระโสภณธรรมาภรณ์', 'พระโสภณธรรมาภรณ์', '845', '0'),
('846', 'พระวิริวัฒน์วิสุทธิ์', 'พระวิริวัฒน์วิสุทธิ์', '846', '0'),
('847', 'พระญาณ', 'พระญาณ', '847', '0'),
('848', 'พระอัครสังฆราช', 'พระอัครสังฆราช', '848', '0'),
('849', 'พระธรรม', 'พระธรรม', '849', '0'),
('850', 'พระสาสนโสภณ', 'พระสาสนโสภณ', '850', '0'),
('851', 'พระธรรมโสภณ', 'พระธรรมโสภณ', '851', '0'),
('852', 'พระอุดมสารโสภณ', 'พระอุดมสารโสภณ', '852', '0'),
('853', 'พระครูวิมลญาณโสภณ', 'พระครูวิมลญาณโสภณ', '853', '0'),
('854', 'พระครูปัญญาภรณโสภณ', 'พระครูปัญญาภรณโสภณ', '854', '0'),
('855', 'พระครูโสภณปริยัติคุณ', 'พระครูโสภณปริยัติคุณ', '855', '0'),
('856', 'พระอธิธรรม', 'พระอธิธรรม', '856', '0'),
('857', 'พระราชญาณ', 'พระราชญาณ', '857', '0'),
('858', 'พระสุธีวัชโรดม', 'พระสุธีวัชโรดม', '858', '0'),
('859', 'รองเจ้าอธิการ', 'รองเจ้าอธิการ', '859', '0'),
('860', 'พระครูวินัยธร', 'พระครูวินัยธร', '860', '0'),
('861', 'พระศรีวชิราภรณ์', 'พระศรีวชิราภรณ์', '861', '0'),
('862', 'พระราชบัณฑิต', 'พระราชบัณฑิต', '862', '0'),
('863', 'แม่ชี', 'แม่ชี', '863', '0'),
('864', 'นักบวช', 'นักบวช', '864', '0'),
('865', 'พระรัตน', 'พระรัตน', '865', '0'),
('866', 'พระโสภณปริยัติธรรม', 'พระโสภณปริยัติธรรม', '866', '0'),
('867', 'พระครูวิศาลปัญญาคุณ', 'พระครูวิศาลปัญญาคุณ', '867', '0'),
('868', 'พระศรีปริยัติโมลี', 'พระศรีปริยัติโมลี', '868', '0'),
('869', 'พระครูวัชรสีลาภรณ์', 'พระครูวัชรสีลาภรณ์', '869', '0'),
('870', 'พระครูพิพัฒน์บรรณกิจ', 'พระครูพิพัฒน์บรรณกิจ', '870', '0'),
('871', 'พระครูวิบูลธรรมกิจ', 'พระครูวิบูลธรรมกิจ', '871', '0'),
('872', 'พระครูพัฒนสารคุณ', 'พระครูพัฒนสารคุณ', '872', '0'),
('873', 'พระครูสุวรรณพัฒนคุณ', 'พระครูสุวรรณพัฒนคุณ', '873', '0'),
('874', 'พระครูพรหมวีรสุนทร', 'พระครูพรหมวีรสุนทร', '874', '0'),
('875', 'พระครูอุปถัมภ์นันทกิจ', 'พระครูอุปถัมภ์นันทกิจ', '875', '0'),
('876', 'พระครูวิจารณ์สังฆกิจ', 'พระครูวิจารณ์สังฆกิจ', '876', '0'),
('877', 'พระครูวิมลสารวิสุทธิ์', 'พระครูวิมลสารวิสุทธิ์', '877', '0'),
('878', 'พระครูไพศาลศุภกิจ', 'พระครูไพศาลศุภกิจ', '878', '0'),
('879', 'พระครูโอภาสธรรมพิมล', 'พระครูโอภาสธรรมพิมล', '879', '0'),
('880', 'พระครูพิพิธวรคุณ', 'พระครูพิพิธวรคุณ', '880', '0'),
('881', 'พระครูสุนทรปภากร', 'พระครูสุนทรปภากร', '881', '0'),
('882', 'พระครูสิริชัยสถิต', 'พระครูสิริชัยสถิต', '882', '0'),
('883', 'พระครูเกษมธรรมานันท์', 'พระครูเกษมธรรมานันท์', '883', '0'),
('884', 'พระครูถาวรสันติคุณ', 'พระครูถาวรสันติคุณ', '884', '0'),
('885', 'พระครูวิสุทธาจารวิมล', 'พระครูวิสุทธาจารวิมล', '885', '0'),
('886', 'พระครูปภัสสราธิคุณ', 'พระครูปภัสสราธิคุณ', '886', '0'),
('887', 'พระครูวรสังฆกิจ', 'พระครูวรสังฆกิจ', '887', '0'),
('888', 'พระครูไพบูลชัยสิทธิ์', 'พระครูไพบูลชัยสิทธิ์', '888', '0'),
('889', 'พระครูโกวิทธรรมโสภณ', 'พระครูโกวิทธรรมโสภณ', '889', '0'),
('890', 'พระครูสุพจน์วราภรณ์', 'พระครูสุพจน์วราภรณ์', '890', '0'),
('891', 'พระครูไพโรจน์อริญชัย', 'พระครูไพโรจน์อริญชัย', '891', '0'),
('892', 'พระครูสุนทรคณาภิรักษ์', 'พระครูสุนทรคณาภิรักษ์', '892', '0'),
('893', 'พระสรภาณโกศล', 'พระสรภาณโกศล', '893', '0'),
('894', 'พระครูประโชติธรรมรัตน์', 'พระครูประโชติธรรมรัตน์', '894', '0'),
('895', 'พระครูจารุธรรมกิตติ์', 'พระครูจารุธรรมกิตติ์', '895', '0'),
('896', 'พระครูพิทักษ์พรหมรังษี', 'พระครูพิทักษ์พรหมรังษี', '896', '0'),
('897', 'พระศรีปริยัติบัณฑิต', 'พระศรีปริยัติบัณฑิต', '897', '0'),
('898', 'พระครูพุทธิธรรมานุศาสน์', 'พระครูพุทธิธรรมานุศาสน์', '898', '0'),
('899', 'พระธรรมเมธาจารย์', 'พระธรรมเมธาจารย์', '899', '0'),
('900', 'พระครูกิตติกาญจนวงศ์', 'พระครูกิตติกาญจนวงศ์', '900', '0'),
('901', 'พระครูปลัดสัมพิพัฒนวิริยาจารย์', 'พระครูปลัดสัมพิพัฒนวิริยาจารย์', '901', '0'),
('902', 'พระครูศีลกันตาภรณ์', 'พระครูศีลกันตาภรณ์', '902', '0'),
('903', 'พระครูประกาศพุทธพากย์', 'พระครูประกาศพุทธพากย์', '903', '0'),
('904', 'พระครูอมรวิสุทธิคุณ', 'พระครูอมรวิสุทธิคุณ', '904', '0'),
('905', 'พระครูสุทัศน์ธรรมาภิรม', 'พระครูสุทัศน์ธรรมาภิรม', '905', '0'),
('906', 'พระครูอุปถัมภ์วชิโรภาส', 'พระครูอุปถัมภ์วชิโรภาส', '906', '0'),
('907', 'พระครูสุนทรสมณคุณ', 'พระครูสุนทรสมณคุณ', '907', '0'),
('908', 'พระพรหมมุนี', 'พระพรหมมุนี', '908', '0'),
('909', 'พระครูสิริคุณารักษ์', 'พระครูสิริคุณารักษ์', '909', '0'),
('910', 'พระครูวิชิตพัฒนคุณ', 'พระครูวิชิตพัฒนคุณ', '910', '0'),
('911', 'พระครูพิบูลโชติธรรม', 'พระครูพิบูลโชติธรรม', '911', '0'),
('912', 'พระพิศาลสารคุณ', 'พระพิศาลสารคุณ', '912', '0'),
('913', 'พระรัตนมงคลวิสุทธ์', 'พระรัตนมงคลวิสุทธ์', '913', '0'),
('914', 'พระครูโสภณคุณานุกูล', 'พระครูโสภณคุณานุกูล', '914', '0'),
('915', 'พระครูผาสุกวิหารการ', 'พระครูผาสุกวิหารการ', '915', '0'),
('916', 'พระครูวชิรวุฒิกร', 'พระครูวชิรวุฒิกร', '916', '0'),
('917', 'พระครูกาญจนยติกิจ', 'พระครูกาญจนยติกิจ', '917', '0'),
('918', 'พระครูบวรรัตนวงศ์', 'พระครูบวรรัตนวงศ์', '918', '0'),
('919', 'พระราชพัชราภรณ์', 'พระราชพัชราภรณ์', '919', '0'),
('920', 'พระครูพิพิธอุดมคุณ', 'พระครูพิพิธอุดมคุณ', '920', '0'),
('921', 'องสุตบทบวร', 'องสุตบทบวร', '921', '0'),
('922', 'พระครูจันทเขมคุณ', 'พระครูจันทเขมคุณ', '922', '0'),
('923', 'พระครูศีลสารวิสุทธิ์', 'พระครูศีลสารวิสุทธิ์', '923', '0'),
('924', 'พระครูสุธรรมโสภิต', 'พระครูสุธรรมโสภิต', '924', '0'),
('925', 'พระครูอุเทศธรรมนิวิฐ', 'พระครูอุเทศธรรมนิวิฐ', '925', '0'),
('926', 'พระครูบรรณวัตร', 'พระครูบรรณวัตร', '926', '0'),
('927', 'พระครูวิสุทธาจาร', 'พระครูวิสุทธาจาร', '927', '0'),
('928', 'พระครูสุนทรวรวัฒน์', 'พระครูสุนทรวรวัฒน์', '928', '0'),
('929', 'พระเทพชลธารมุนี ศรีชลบุราจารย์', 'พระเทพชลธารมุนี ศรีชลบุราจารย์', '929', '0'),
('930', 'พระครูโสภณสมุทรคุณ', 'พระครูโสภณสมุทรคุณ', '930', '0'),
('931', 'พระราชเมธาภรณ์', 'พระราชเมธาภรณ์', '931', '0'),
('932', 'พระครูศรัทธาธรรมโสภณ', 'พระครูศรัทธาธรรมโสภณ', '932', '0'),
('933', 'พระครูสังฆบริรักษ์', 'พระครูสังฆบริรักษ์', '933', '0'),
('934', 'พระมหานายก', 'พระมหานายก', '934', '0'),
('935', 'พระครูโอภาสสมาจาร', 'พระครูโอภาสสมาจาร', '935', '0'),
('936', 'พระครูศรีธวัชคุณาภรณ์', 'พระครูศรีธวัชคุณาภรณ์', '936', '0'),
('937', 'พระครูโสภิตวัชรกิจ', 'พระครูโสภิตวัชรกิจ', '937', '0'),
('938', 'พระราชวชิราภรณ์', 'พระราชวชิราภรณ์', '938', '0'),
('939', 'พระครูสุนทรวรธัช', 'พระครูสุนทรวรธัช', '939', '0'),
('940', 'พระครูอาทรโพธิกิจ', 'พระครูอาทรโพธิกิจ', '940', '0'),
('941', 'พระครูวิบูลกาญจนกิจ', 'พระครูวิบูลกาญจนกิจ', '941', '0'),
('942', 'พระพรหมวชิรญาณ', 'พระพรหมวชิรญาณ', '942', '0'),
('943', 'พระครูสุพจน์วรคุณ', 'พระครูสุพจน์วรคุณ', '943', '0'),
('944', 'พระราชาวิมลโมลี', 'พระราชวิมลโมลี', '944', '0'),
('945', 'พระครูอมรธรรมนายก', 'พระครูอมรธรรมนายก', '945', '0'),
('946', 'พระครูพิศิษฎ์ศาสนการ', 'พระครูพิศิษฎ์ศาสนการ', '946', '0'),
('947', 'พระครูเมธีธรรมานุยุต', 'พระครูเมธีธรรมานุยุต', '947', '0'),
('948', 'พระครูปิยสีลสาร', 'พระครูปิยสีลสาร', '948', '0'),
('949', 'พระครูสถิตบุญวัฒน์', 'พระครูสถิตบุญวัฒน์', '949', '0'),
('950', 'พระครูนิเทศปิยธรรม', 'พระครูนิเทศปิยธรรม', '950', '0'),
('951', 'พระครูวิสุทธิ์กิจจานุกูล', 'พระครูวิสุทธิ์กิจจานุกูล', '951', '0'),
('952', 'พระครูสถิตย์บุญวัฒน์', 'พระครูสถิตย์บุญวัฒน์', '952', '0'),
('953', 'พระครูประโชติธรรมานุกูล', 'พระครูประโชติธรรมานุกูล', '953', '0'),
('954', 'พระเทพญาณกวี', 'พระเทพญาณกวี', '954', '0'),
('955', 'พระครูพิพัฒน์ชินวงศ์', 'พระครูพิพัฒน์ชินวงศ์', '955', '0'),
('956', 'พระครูสมุทรขันตยาภรณ์', 'พระครูสมุทรขันตยาภรณ์', '956', '0'),
('957', 'พระครูภาวนาวรกิจ', 'พระครูภาวนาวรกิจ', '957', '0');
INSERT INTO `ref_prefix_name` (`PREFIX_NAME_ID`, `FULLNAME`, `INITIALS`, `รหัสกรมการปกครอง`, `status`) VALUES
('958', 'พระครูศรีศาสนคุณ', 'พระครูศรีศาสนคุณ', '958', '0'),
('959', 'พระครูวิบูลย์ธรรมศาสก์', 'พระครูวิบูลย์ธรรมศาสก์', '959', '0');
