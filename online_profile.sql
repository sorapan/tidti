-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 03:06 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radius`
--

-- --------------------------------------------------------

--
-- Table structure for table `manual_user`
--

CREATE TABLE IF NOT EXISTS `manual_user` (
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cleartext-Password',
  `pname` varchar(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idcard` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000000',
  `mailaddr` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `discipline` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateregis` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `encryption` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual_user`
--

INSERT INTO `manual_user` (`username`, `password`, `pname`, `firstname`, `lastname`, `idcard`, `mailaddr`, `discipline`, `department`, `year`, `dateregis`, `encryption`, `status`, `location_id`) VALUES
('11-11-11-11-11-11', 'Liu;b=yp;kpakp', 'นาย', 'กนกพล', 'เมืองรักษ์', '3800800567142', 'kanokpon.m@rmutsv.ac.th', '107', 'st12', '-', '2016-05-11 15:00:29', 'Cleartext-Password', 'เจ้าหน้าที่สารสนเทศ', 'sk'),
('11-11-11-11-22-22', 'Liu;b=yp;kpakp', 'นาย', 'กนกพล', 'เมืองรักษ์', '3800800567142', 'kanokpon.m@rmutsv.ac.th', '107', 'st12', '-', '2016-05-11 15:04:28', 'Cleartext-Password', 'เจ้าหน้าที่สารสนเทศ', 'sk'),
('s155404130050', 'Cleartext-Password', 'นาย', 'อาคกี', 'กีบเสน', '155404130050', 'chbj;;;,[][''fyyii', '', '', '-', '2016-06-03 13:18:47', '', 'นักศึกษา', 'sk'),
('santi.p', 'Cleartext-Password', 'นาย', 'asdsdsad', 'asdasd', '123544444444', 'asdasd@dsdsdsd', 'งานสารสนเทศ', 'de05', '', '0000-00-00 00:00:00', '', 'อาจารย์', 'sk'),
('yongyut', 'Cleartext-Password', '', '', '', '0000000000000', '', '', '', '', '0000-00-00 00:00:00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manual_user`
--
ALTER TABLE `manual_user`
  ADD PRIMARY KEY (`username`), ADD KEY `username` (`username`), ADD KEY `department` (`department`), ADD KEY `discipline` (`discipline`), ADD KEY `status` (`status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
