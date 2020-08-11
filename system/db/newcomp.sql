-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2019 at 12:51 AM
-- Server version: 5.1.62
-- PHP Version: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newcomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `pass`) VALUES
('sanheen', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `uid` bigint(20) DEFAULT NULL,
  `pay` int(11) DEFAULT NULL,
  `udone` int(11) DEFAULT NULL,
  `adone` int(11) NOT NULL,
  `txnid` bigint(20) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`txnid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`uid`, `pay`, `udone`, `adone`, `txnid`, `date`, `time`) VALUES
(1, 5, 1, 1, 2315258965, '2019-12-19', '21:36:15'),
(2, 5, 1, 1, 2365415258, '2019-12-19', '22:07:54'),
(3, 5, 1, 1, 2458123546, '2019-12-19', '22:08:11'),
(4, 5, 1, 1, 2698452185, '2019-12-19', '22:08:23'),
(6, 5, 1, 1, 2315248166, '2019-12-19', '22:26:49'),
(7, 5, 1, 1, 2548123548, '2019-12-19', '22:26:59'),
(8, 5, 1, 1, 2698524151, '2019-12-19', '22:27:11'),
(9, 5, 1, 1, 2541852356, '2019-12-19', '22:27:27'),
(10, 5, 1, 1, 2548653215, '2019-12-19', '22:27:56'),
(12, 5, 1, 1, 2584535824, '2019-12-19', '22:28:07'),
(11, 5, 1, 1, 2845632154, '2019-12-19', '22:28:18'),
(13, 5, 1, 1, 2549852745, '2019-12-19', '22:28:29'),
(14, 5, 1, 1, 2462158423, '2019-12-19', '22:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `refexp`
--

CREATE TABLE IF NOT EXISTS `refexp` (
  `refid` varchar(50) NOT NULL DEFAULT '',
  `uid` bigint(20) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`refid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `refral`
--

CREATE TABLE IF NOT EXISTS `refral` (
  `uid` bigint(20) DEFAULT NULL,
  `refid` varchar(50) NOT NULL DEFAULT '',
  `refby` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`refid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `refral`
--

INSERT INTO `refral` (`uid`, `refid`, `refby`) VALUES
(0, 'KT395I', NULL),
(2, 'yrY6j', 'mJj2G'),
(3, '6QpR2', 'mJj2G'),
(4, 'y6MBW', 'mJj2G'),
(6, 'HZRFU', 'yrY6j'),
(7, 'xpgIf', 'yrY6j'),
(8, 'xpA2R', 'yrY6j'),
(9, 'H68vY', '6QpR2'),
(10, 'lcOGj', '6QpR2'),
(11, 'Jnwla', '6QpR2'),
(12, 'nejVh', 'y6MBW'),
(13, '3XLS1', 'y6MBW'),
(14, 'Y3sKS', 'y6MBW');

-- --------------------------------------------------------

--
-- Table structure for table `txngiv`
--

CREATE TABLE IF NOT EXISTS `txngiv` (
  `uid` bigint(20) DEFAULT NULL,
  `txnid` bigint(20) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `txnkey` varchar(50) NOT NULL,
  PRIMARY KEY (`txnid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `txngiv`
--

INSERT INTO `txngiv` (`uid`, `txnid`, `amount`, `date`, `time`, `txnkey`) VALUES
(1, 2845213542, 4, '2019-12-19', '22:16:26', 'axqfJ'),
(1, 2351852135, 8, '2019-12-19', '22:36:26', 'MSbry'),
(2, 2354612545, 6, '2019-12-19', '22:37:41', 'l7XGv'),
(3, 2354185345, 4, '2019-12-19', '22:38:28', 'kG5tH'),
(4, 2541852465, 2, '2019-12-19', '22:39:01', '7XFEv'),
(1, 2354215845, 3, '2019-12-19', '22:43:38', 'dJHmW'),
(3, 2345123546, 2, '2019-12-19', '22:47:01', 'XIFJB'),
(4, 2486123546, 4, '2019-12-19', '22:47:45', 'oYbUn');

-- --------------------------------------------------------

--
-- Table structure for table `ulogin`
--

CREATE TABLE IF NOT EXISTS `ulogin` (
  `uid` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ulogin`
--

INSERT INTO `ulogin` (`uid`, `user`, `upass`, `name`, `date`, `time`) VALUES
(2, 's2', '1234', 'Aniket Sethi', '2019-12-19', '21:38:41'),
(3, 's3', '1234', 'Ashok Sethi', '2019-12-19', '21:38:56'),
(4, 's4', '1234', 'Seema Sethi', '2019-12-19', '21:39:28'),
(6, 's5', '1234', 'Sunhin', '2019-12-19', '22:17:45'),
(7, 's6', '1234', 'BrijLal', '2019-12-19', '22:18:02'),
(8, 's7', '1234', 'Yakshya ', '2019-12-19', '22:18:23'),
(9, 's8', '1234', 'Neeraj', '2019-12-19', '22:20:24'),
(10, 's9', '1234', 'Krishna', '2019-12-19', '22:20:59'),
(11, 's11', '1234', 'Sethi Saab 2', '2019-12-19', '22:21:55'),
(12, 's10', '1234', 'Prince Sethi', '2019-12-19', '22:23:42'),
(13, 's12', '1234', 'Shikha Sethi', '2019-12-19', '22:23:56'),
(14, 's13', '1234', 'Ani', '2019-12-19', '22:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `upaytm`
--

CREATE TABLE IF NOT EXISTS `upaytm` (
  `uid` bigint(20) DEFAULT NULL,
  `paytm` bigint(11) DEFAULT NULL,
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upaytm`
--

INSERT INTO `upaytm` (`uid`, `paytm`) VALUES
(2, 9416553376),
(3, 9876354151),
(4, 6580364928),
(5, 9845231645),
(6, 9855813376),
(7, 9845231654),
(8, 9856345121),
(9, 6521354651),
(10, 9846321584),
(11, 9521364521),
(12, 9813579558),
(13, 9845231684),
(14, 9855813376);

-- --------------------------------------------------------

--
-- Table structure for table `wdreq`
--

CREATE TABLE IF NOT EXISTS `wdreq` (
  `uid` bigint(20) DEFAULT NULL,
  `request` int(11) DEFAULT NULL,
  `wamount` int(11) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `txnkey` varchar(50) NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wdreq`
--

INSERT INTO `wdreq` (`uid`, `request`, `wamount`, `DATE`, `Time`, `txnkey`) VALUES
(4, 1, 2, '2019-12-19', '22:38:48', '7XFEv'),
(3, 1, 4, '2019-12-19', '22:38:11', 'kG5tH'),
(2, 1, 6, '2019-12-19', '22:37:21', 'l7XGv'),
(4, 1, 4, '2019-12-19', '22:47:27', 'oYbUn'),
(3, 1, 2, '2019-12-19', '22:46:53', 'XIFJB');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE IF NOT EXISTS `withdrawal` (
  `uid` bigint(20) NOT NULL DEFAULT '0',
  `credit` int(11) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`uid`, `credit`, `debit`) VALUES
(1, 15, 0),
(2, 0, 6),
(3, 0, 6),
(4, 0, 6),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(12, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
