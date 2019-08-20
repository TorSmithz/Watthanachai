-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2018 at 02:19 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbstudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblmajor`
--

DROP TABLE IF EXISTS `tblmajor`;
CREATE TABLE `tblmajor` (
  `major_id` char(5) NOT NULL COMMENT 'รหัสสาขา',
  `major_name` varchar(250) NOT NULL COMMENT 'ชื่อสาขา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmajor`
--

INSERT INTO `tblmajor` (`major_id`, `major_name`) VALUES
('100', 'วิทยาการคอมพิวเตอร์'),
('200', 'เทคโนโลยีสารสนเทศ'),
('300', 'ระบบสารสนเทศเพื่อการจัดการ');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

DROP TABLE IF EXISTS `tblstudent`;
CREATE TABLE `tblstudent` (
  `std_id` varchar(10) NOT NULL COMMENT 'รหัสนักศึกษา',
  `std_name` varchar(100) NOT NULL COMMENT 'ชื่อ-นามสกุลนักศึกษา',
  `std_address` varchar(300) NOT NULL COMMENT 'ที่อยู่',
  `std_gender` char(5) NOT NULL COMMENT 'เพศ',
  `std_birth` date NOT NULL COMMENT 'วันเกิด',
  `std_salary` float NOT NULL COMMENT 'รายได้',
  `major_id` char(5) NOT NULL COMMENT 'รหัสสาขา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`std_id`, `std_name`, `std_address`, `std_gender`, `std_birth`, `std_salary`, `major_id`) VALUES
('5940207101', 'เกสร ตรีกลางดอน', 'นครราชสีมา', 'หญิง', '1997-01-02', 20000, '100'),
('5940207103', 'ประภัสสร ยังดี', 'นครราชสีมา', 'หญิง', '1997-01-06', 50000, '100'),
('5940207121', 'พีรภัทร คูณกระโทก', 'นครราชสีมา', 'ชาย', '1998-05-06', 25000, '100'),
('5940207130', 'สิทธิกร ว่องไวคุณอนันต์', 'นครราชสีมา', 'ชาย', '1997-01-05', 30000, '100'),
('5940207132', 'สุรพล เคล้าเครือ', 'นครราชสีมา', 'ชาย', '1997-01-03', 15000, '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblmajor`
--
ALTER TABLE `tblmajor`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`std_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
