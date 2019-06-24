-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2019 at 05:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grievancehck`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `rollno` varchar(10) NOT NULL,
  `complaint` text NOT NULL,
  `yearofstudy` varchar(15) NOT NULL,
  `program` varchar(10) NOT NULL,
  `gtype` varchar(30) NOT NULL,
  `raisedon` varchar(20) NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `grievanceid` varchar(20) NOT NULL,
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`rollno`, `complaint`, `yearofstudy`, `program`, `gtype`, `raisedon`, `lastmodified`, `status`, `grievanceid`, `slno`, `month`) VALUES
('1', 'nohoihoih', '1', 'btech', 'academics', '30-03-2019 13:07:45', '2019-03-30 13:07:45', 'solved', 'grievance00001', 11, 0),
('16001A0502', 'i have a problem', '1', 'btech', 'academics', '30-03-2019 14:39:19', '2019-03-30 14:39:19', 'solved', 'grievance00015', 15, 3),
('1600A0525', 'I have a ragging issue', '3', 'btech', 'ragging', '30-03-2019 14:51:28', '2019-03-30 14:51:28', 'rejected', 'grievance00016', 16, 3),
('1', 'hh', '1', 'btech', 'academics', '30-03-2019 13:13:05', '2019-03-30 13:13:05', 'rejected', 'grievance00013', 13, 3),
('1', 'sbskbb', '1', 'mtech', 'academics', '30-03-2019 13:37:43', '2019-03-30 13:37:43', 'rejected', 'grievance00014', 14, 3),
('1600A0525', 'jcdjcduhdchij', '3', 'btech', 'academics', '03-04-2019 04:03:06', '2019-04-03 04:03:06', 'processing', 'grievance00017', 17, 4),
('16001A0502', 'not so clean', '3', 'btech', 'boarding&lodging', '16-04-2019 06:56:28', '2019-04-16 06:56:28', 'new', 'grievance00018', 18, 4),
('16001A0502', 'jn  hhbh', '3', 'btech', 'examinations', '16-04-2019 16:17:59', '2019-04-16 16:17:59', 'new', 'grievance00019', 19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `rollno` varchar(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`rollno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`rollno`, `name`, `mail`, `pwd`) VALUES
('fijioji', 'byna', 'hjgcigcuicguicgu@gmail.com', 'bbub'),
('2222', 'byna', 'hjgcigcuicguicgu@gmail.com', 'jijijijijij'),
('222200', 'byna', 'hjgcigcuicguicgu@gmail.com', 'jhuhuh'),
('12344', 'prani', 'hjgcigcuicguicgu@gmail.com', 'inm'),
('jjd', '12344', 'hjgcigcuicguicgu@gmail.com', 'ddd'),
('1', '1', 'hjgcigcuicguicgu@gmail.com', '1'),
('ee', 'ee', 'hjgcigcuicguicgu@gmail.com', 'ee'),
('jfjd', 'jgfjfh', 'fhjbfk@gmail.com', 'ehddja'),
('dhchdskc', 'dbcbsdcn', 'fhhff@gm', 'dc nmdcb'),
('6', 'byna', 'gmail@gmail.com', '123'),
('123', 'byna', 'fhhff@gm', '123'),
('321', 'byna123', 'dnmsn@gm', '123'),
('12345', 'btrdfd', 'dbf@gm', '098'),
('234', 'bynajjj12', 'nn@gm', '234'),
('123445', 'cbbcm', 'vb@gm', '123'),
('wqw', 'ahjdjad', 'dshbsjd@gm', '123'),
('123456', 'gxhas', 'bbsmcm@gm', '123'),
('1234567', 'fbd', 'nbndmcbm@gm', '1234'),
('1452', 'nmdn', 'fhhff@gm', '12345'),
('14526', 'vhachh', 'fhhff@gm', '321'),
('123654', 'byna123', 'cnnsm@gm', '123'),
('chbchb', 'n mz', 'hjgcigcuicguicgu@gmail.com', '12345'),
('12345678', 'bynajjj123', 'hjgcigcuicguicgu@gmail.com', '123'),
('16001A0502', 'jelly', 'gmalluru99@gmail.com', 'chanti123'),
('16001a0525', '16001a0525', 'fhhff@gm', '123'),
('1600A0525', 'jalandhar', 'gmalluru99@gmail.com', 'chanti123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
