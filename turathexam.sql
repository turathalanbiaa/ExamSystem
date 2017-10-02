-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 02, 2017 at 12:25 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turathexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
CREATE TABLE IF NOT EXISTS `enrollment` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  `Mark` int(11) DEFAULT NULL,
  `Status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`ID`, `User_ID`, `Exam_ID`, `Mark`, `Status`) VALUES
(1, 1, 1, 100, '1'),
(2, 1, 2, 60, '1'),
(3, 2, 1, NULL, ''),
(4, 2, 2, NULL, ''),
(5, 1, 3, NULL, '0'),
(6, 1, 4, NULL, '0'),
(7, 2, 5, NULL, ''),
(8, 3, 4, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `CategoryOne` int(11) NOT NULL,
  `CategoryTwo` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `Name`, `Date`, `CategoryOne`, `CategoryTwo`, `Status`) VALUES
(1, 'الفقه - الوجيز', '2017-10-02', 12, 13, 1),
(2, 'العقائد - عقائدنا', '2017-10-03', 12, 13, 2),
(3, 'قواعد التجويد', '2017-10-04', 12, 13, 0),
(4, 'خلاصة المنطق', '2017-10-05', 12, 13, 1),
(5, 'متن الآجرومية ودروس في النحو', '2017-10-06', 12, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) NOT NULL,
  `Options` text NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `CategoryType` int(11) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

DROP TABLE IF EXISTS `student_answer`;
CREATE TABLE IF NOT EXISTS `student_answer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Answer_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Code` int(11) NOT NULL,
  `RegisterDate` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Phone`, `Code`, `RegisterDate`) VALUES
(1, 'ali', '0780', 31008, '2017-10-02'),
(2, 'ali', '0780', 68232, '2017-10-02'),
(3, 'ali', '0780', 97065, '2017-10-02'),
(4, 'ali', '0780', 11711, '2017-10-02'),
(5, 'ali', '0780', 89332, '2017-10-02'),
(6, 'ali', '0780', 46488, '2017-10-02'),
(7, 'ali', '0780', 85096, '2017-10-02'),
(8, 'ali', '0780', 34386, '2017-10-02'),
(9, 'ali', '0780', 51236, '2017-10-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
