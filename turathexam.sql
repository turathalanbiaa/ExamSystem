-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2017 at 12:17 PM
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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Question_ID` int(11) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ID`, `User_ID`, `Question_ID`, `Answer`, `Time`) VALUES
(3, 1, 1, 'صح', '2017-10-03 12:10:03');

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
  `CorrectAnswer` text NOT NULL,
  `Category` int(11) NOT NULL,
  `Exam_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `Title`, `Options`, `CorrectAnswer`, `Category`, `Exam_ID`) VALUES
(1, 'البحث في العقيدة ضرورة لابد منها يستهدف معرفة مبدأ الانسانية ومصيرها. ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(2, 'الاعتقاد من وظائف الروح ولا علاقة له بالعمل سواء كان موافقاً له او لا . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(3, 'المعرفة هي مجموعة الاعتقادات الراسخة في القلب . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(4, 'دفع الخوف واجب شرعي.', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(5, 'ليس كل العقلاء والاتجاهات يؤمنون بالقانون الأخلاقي القائل بوجوب شكر المنعم .', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(6, 'عن ابي عبد ا... (عليه السلام) قال:\" اياك وخصلتين ففيهما هلك من هلك , إياك ان تفتي الناس برأيك او تدين بما لا تعلم . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'صح', 1, 1),
(7, 'الصفة هي الامارة بذات الموصوف الذي يعرف بها.', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(8, 'العالم هو المنكشفة له الاشياء بحيث تكون حاضرة غير غائبة عنه. ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(9, 'أصول الدين كالنبوة والامامة والمعاد لا تتوقف على العدل الألهي . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(10, 'من شرائط التكليف قدرة المكلف على إنجاز التكليف . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(11, 'الجاهل القاصر عن تحصيل العلم  بالتكليف معذور عند ا... تعالى. ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(12, 'نعتقد أنه تعالى لابد أن يكلف عباده ويسنَّ لهم الشرائع وما فيه صلاحهم وخيرهم.', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(13, 'انه تعالى لا  مصلحة له و لا منفعة في تكليفنا بالواجبات ونهينا عن فعل المحرمات . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(14, 'قال المجبرة أن الفاعل الحقيقي هو ا... وانما تنسب الافعال الى البشر لأنهم محلها . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(15, 'النبي هو الانسان المخبر عن ا... تعالى بغير واسطة بشر . ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1),
(16, 'إمام هذا العصر هو الثاني عشر من أهل البيت (عليهم السلام) وهو الحجة المولود سنة 250 هـ', '[\r\n\"صح\",\r\n\"خطأ\"\r\n]', 'answer 1', 1, 1);

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
