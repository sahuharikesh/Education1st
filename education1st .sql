-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2022 at 04:39 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education1st`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `text`) VALUES
(1, ' Educationâ€™1st Institute provides students with a supportive and higher education environment. We rank the enhancement of students education outcomes and welfare as the highest priority of the Institute. Students are encouraged and supported to participate in classes to develop the personal skills and confidence necessary to gain a career. Educationâ€™1st Institute is the right choice to further your education.....! ');

-- --------------------------------------------------------

--
-- Table structure for table `aboutimg`
--

DROP TABLE IF EXISTS `aboutimg`;
CREATE TABLE IF NOT EXISTS `aboutimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `images` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutimg`
--

INSERT INTO `aboutimg` (`id`, `images`, `status`) VALUES
(5, 'about2.jpg', 1),
(2, 'about1.jpg', 0),
(3, 'about.jpg', 0),
(4, 'about3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `design` varchar(255) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `design`, `descrip`, `images`, `status`) VALUES
(20, 'Aman Yadav', 'MSc in Maths', 'Proffesor', 'professor.jpg', NULL),
(14, 'Prabhakar Vishwakrama', 'MCA', 'Develoer', 'teacher4.jpg', 1),
(21, 'Priya Mishra', 'C.A', 'Proffesor', 'professor3.jpg', NULL),
(22, 'Kishan Gupta', 'B.E', 'Chemical Engg', 'proffesor2.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `std` int(11) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `paid_fee` int(11) NOT NULL,
  `remain_fee` int(11) NOT NULL,
  `date` date NOT NULL,
  `stream` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`f_id`, `sid`, `name`, `std`, `medium`, `total_fee`, `paid_fee`, `remain_fee`, `date`, `stream`) VALUES
(24, 96, 'Rekha', 10, 'English', 10000, 2000, 8000, '2021-11-20', ''),
(25, 97, 'Suraj', 11, 'English', 7000, 2000, 5000, '2021-11-21', 'Commerce'),
(22, 94, 'Hina', 12, 'English', 18000, 2000, 8000, '2021-11-24', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `newstudent`
--

DROP TABLE IF EXISTS `newstudent`;
CREATE TABLE IF NOT EXISTS `newstudent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `S_name` varchar(255) NOT NULL,
  `S_mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `F_name` varchar(255) NOT NULL,
  `F_mobile` varchar(255) NOT NULL,
  `Std` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `medium` varchar(255) NOT NULL,
  `add_status` varchar(100) NOT NULL,
  `stream` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newstudent`
--

INSERT INTO `newstudent` (`id`, `S_name`, `S_mobile`, `email`, `F_name`, `F_mobile`, `Std`, `Address`, `medium`, `add_status`, `stream`) VALUES
(99, 'harikesh', '8765432100', 'sahu@gmail.com', 'jp', '8765432907', '4', 'ncccmv', 'English', 'yes', ''),
(100, 'Sonal', '9876543321', 'sonal@gmail.com', 'Sapkak', '8765432190', '11', 'Nerul', 'English', 'yes', 'Commerce'),
(94, 'Hina', '8765432190', 'hk@gmail.com', 'Khan', '9876543210', '12', 'Yadav nagar', 'English', 'yes', 'Science'),
(96, 'Rekha', '9876543210', 'rekha@gmail.com', 'Rajbhar', '8765432112', '10', 'Digha', 'English', 'yes', ''),
(97, 'Suraj', '9876543210', 's@gmail.com', 'ram', '8765432100', '11', 'digha', 'English', 'yes', 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `mobile`, `password`) VALUES
(1, 'Harikesh Sahu', 'sahu@gmail.com', '8422053857', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `topper`
--

DROP TABLE IF EXISTS `topper`;
CREATE TABLE IF NOT EXISTS `topper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) NOT NULL,
  `board` varchar(255) NOT NULL,
  `percent` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topper`
--

INSERT INTO `topper` (`id`, `s_name`, `board`, `percent`, `images`) VALUES
(4, 'Abhishek Tiwari', 'HSC', 56, 'student4.jpg'),
(5, 'Rehana Bhatt', 'CBSC', 89, 'student5.jpg'),
(6, 'Rahul Rao', 'ICSE', 90, 'student3.jpg'),
(7, 'Riya Patil', 'SSC', 95, 'student2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(50) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tr_id`, `s_id`, `amount`, `status`, `date`) VALUES
(71, '100', '100.00', 'TXN_SUCCESS', '2021-12-18 11:52:19'),
(68, '97', '100.00', 'TXN_SUCCESS', '2021-11-21 21:38:33'),
(70, '99', '100.00', 'TXN_SUCCESS', '2021-12-11 11:17:07'),
(58, '94', '100.00', 'TXN_SUCCESS', '2021-11-20 14:15:10'),
(67, '96', '100.00', 'TXN_SUCCESS', '2021-11-20 14:51:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
