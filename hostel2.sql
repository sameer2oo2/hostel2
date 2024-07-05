-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2023 at 06:01 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE IF NOT EXISTS `beds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `roomid` int NOT NULL,
  `roomno` varchar(120) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `fee` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `internetfee` varchar(10) NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` varchar(20) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `egycontactno` varchar(20) NOT NULL,
  `guardianName` varchar(50) NOT NULL,
  `guardianRelation` varchar(80) NOT NULL,
  `guardianContactno` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `roomid`, `roomno`, `studentid`, `fee`, `type`, `internetfee`, `stayfrom`, `duration`, `contactno`, `email`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `city`, `address`, `status`) VALUES
(1, 1, '100', '', '3000', 'Exective', '1500', '0000-00-00', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `feeName` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `Refundable` varchar(10) NOT NULL,
  `Charges` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `feeName`, `type`, `Refundable`, `Charges`) VALUES
(1, 'Admission fee', 'One time', 'no', 10000),
(2, 'Security (Refundable)', 'One time', 'yes', 5000),
(3, 'Generator charges (for 6 months)', '6 months', 'no', 7900),
(4, 'Internet charges (for 6 months)', '6 months', 'no', 7600);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `roomno` int NOT NULL,
  `seater` int NOT NULL,
  `feespm` int NOT NULL,
  `foodstatus` int NOT NULL,
  `stayfrom` date NOT NULL,
  `duration` int NOT NULL,
  `course` varchar(500) NOT NULL,
  `regno` int NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `middleName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `egycontactno` bigint NOT NULL,
  `guardianName` varchar(500) NOT NULL,
  `guardianRelation` varchar(500) NOT NULL,
  `guardianContactno` bigint NOT NULL,
  `corresAddress` varchar(500) NOT NULL,
  `corresCIty` varchar(500) NOT NULL,
  `corresState` varchar(500) NOT NULL,
  `corresPincode` int NOT NULL,
  `pmntAddress` varchar(500) NOT NULL,
  `pmntCity` varchar(500) NOT NULL,
  `pmnatetState` varchar(500) NOT NULL,
  `pmntPincode` int NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(6, 100, 5, 8000, 0, '2016-04-22', 5, 'Bachelor  of Technology', 10806121, 'code', '', 'projects', 'male', 8285703354, 'code.lpu1@gmail.com', 0, 'XYZ', 'Mother', 8285703354, 'H n0 18/1 Bihari Puram Phase-1 Melrose Bye Pass', 'Aligarh', 'EPE', 202001, 'H n0 18/1 Bihari Puram Phase-1 Melrose Bye Pass', 'Aligarh', 'EPE', 202001, '2016-04-16 03:24:09', ''),
(7, 100, 5, 8000, 1, '2016-06-17', 4, 'Bachelor of Engineering', 108061211, 'code', 'test', 'projects', 'male', 8467067344, 'test@gmail.com', 8285703354, 'test', 'test', 9999857868, 'H no- 18/1 Bihari puram phase-1 melrose bye pass', 'Aligarh', 'EPE', 202001, 'H no- 18/1 Bihari puram phase-1 melrose bye pass', 'Aligarh', 'EPE', 202001, '2016-06-23 06:54:35', ''),
(8, 112, 3, 4000, 0, '2016-06-27', 5, 'Bachelor  of Science', 102355, 'Harry', 'projects', 'Singh', 'male', 6786786786, 'Harry@gmail.com', 789632587, 'demo', 'demo', 1234567890, 'New Delhi', 'Delhi', 'Delhi (NCT)', 110001, 'New Delhi', 'Delhi', 'Delhi (NCT)', 110001, '2016-06-26 11:31:08', ''),
(9, 132, 5, 2000, 1, '2016-06-28', 6, 'Bachelor of Engineering', 586952, 'Benjamin', '', 'projects', 'male', 8596185625, 'Benjamin@gmail.com', 8285703354, 'demo', 'demo', 8285703354, 'H no- 18/1 Bihari puram phase-1 melrose bye pass', 'Aligarh', 'EPE', 202001, 'H no- 18/1 Bihari puram phase-1 melrose bye pass', 'Aligarh', 'EPE', 202001, '2016-06-26 11:40:07', ''),
(10, 201, 3, 3243, 1, '0000-00-00', 0, 'Bachelor  of Technology', 108061211, 'code', 'test', 'projects', 'male', 8467067344, 'test@gmail.com', 23, '123', '123', 123, '1231', '2123', 'Kerala', 7, '123', '123', 'Bihar', 54000, '2023-09-28 04:21:07', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seater` int NOT NULL,
  `room_no` int NOT NULL,
  `level` int NOT NULL,
  `fees` int NOT NULL,
  `ac` varchar(10) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `level`, `fees`, `ac`, `campus`, `posting_date`) VALUES
(1, 5, 100, 1, 8000, '', '1', '2016-04-11 17:45:43'),
(2, 2, 201, 1, 6000, '', '1', '2016-04-11 20:30:47'),
(3, 2, 200, 1, 6000, '', '1', '2016-04-11 20:30:58'),
(4, 3, 112, 1, 4000, '', '2', '2016-04-11 20:31:07'),
(5, 5, 132, 1, 2000, '', '3', '2016-04-11 20:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(1, 10, 'test@gmail.com', '', '', '', '2016-06-22 01:16:42'),
(2, 10, 'test@gmail.com', '', '', '', '2016-06-24 06:20:28'),
(4, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-24 06:22:47'),
(5, 10, 'test@gmail.com', 0x3a3a31, '', '', '2016-06-26 10:37:40'),
(6, 20, 'Benjamin@gmail.com', 0x3a3a31, '', '', '2016-06-26 11:40:57'),
(7, 10, 'test@gmail.com', 0x3a3a31, '', '', '2023-09-28 04:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

DROP TABLE IF EXISTS `userregistration`;
CREATE TABLE IF NOT EXISTS `userregistration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint NOT NULL,
  `emergencyContact` varchar(20) NOT NULL,
  `cnic` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `GuardianName` varchar(50) NOT NULL,
  `GuardianCnic` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `Disability` varchar(30) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `emergencyContact`, `cnic`, `email`, `password`, `GuardianName`, `GuardianCnic`, `address`, `Disability`, `regDate`, `updationDate`, `passUdateDate`, `roll`, `status`) VALUES
(10, '108061211', 'code', 'test', 'projects', 'male', 8467067344, '', '', 'test@gmail.com', 'Test@123', '', '', '', '', '2016-06-21 23:21:33', '23-06-2016 11:04:15', '22-06-2016 05:16:49', '', ''),
(19, '102355', 'Harry', 'projects', 'Singh', 'male', 6786786786, '', '', 'Harry@gmail.com', '6786786786', '', '', '', '', '2016-06-26 11:33:36', '', '', '', ''),
(20, '586952', 'Benjamin', '', 'projects', 'male', 8596185625, '', '', 'Benjamin@gmail.com', '8596185625', '', '', '', '', '2016-06-26 11:40:07', '', '', '', ''),
(21, 'jhj', 'hjh', '', '', 'Male', 0, 'jhjh', 'jhjh', 'jh@hh.com', 'jhjh', 'jhj', 'hjh', 'jhhj', 'jh', '2023-10-30 10:52:57', '', '', 'User', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
