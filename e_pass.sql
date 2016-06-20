-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2016 at 09:42 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imfdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `e_pass`
--

CREATE TABLE IF NOT EXISTS `e_pass` (
  `usre` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `e_pass`
--

INSERT INTO `e_pass` (`usre`, `pass`, `name`, `status`, `location_id`) VALUES
('s155404130050', 'gggg', 'อาคม', 'student', 'sk'),
('s155404140007', 'cccc', 'จิรวัฒน์', '', ''),
('s155404140023', 'bbbb', 'นัจติดา', '', ''),
('s155404140037', 'aaaa', 'วิชุฑา', '', ''),
('s155404170017', 'ffff', 'วัชรพล', '', ''),
('s155404190025', 'hhhh', 'ธิดารัตน์', '', ''),
('s155404710076', 'eeee', 'สุนันทา', '', ''),
('s157404150016', 'dddd', 'วรนารี', '', ''),
('santi.p', '1234', 'santi', 'staff', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_pass`
--
ALTER TABLE `e_pass`
  ADD PRIMARY KEY (`usre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
