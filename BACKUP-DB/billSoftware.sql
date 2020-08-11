-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2020 at 06:14 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billSoftware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(12, 'sanheensethi', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `bill_number` bigint(20) NOT NULL,
  `shop_id` bigint(20) NOT NULL,
  `money_without_gst` double NOT NULL,
  `cgstMoney` double NOT NULL,
  `sgstMoney` double NOT NULL,
  `TotalAmount` double NOT NULL,
  `CustomerName` varchar(50) NOT NULL,
  `CustomerAddress` varchar(250) NOT NULL,
  `CustomerContact` bigint(20) NOT NULL,
  `CustomerAlternativeContact` bigint(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` varchar(50) NOT NULL,
  `paid_as` int(11) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `PaidDate` date NOT NULL,
  `PaidTime` time NOT NULL,
  `Comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`bill_number`, `shop_id`, `money_without_gst`, `cgstMoney`, `sgstMoney`, `TotalAmount`, `CustomerName`, `CustomerAddress`, `CustomerContact`, `CustomerAlternativeContact`, `Date`, `Time`, `Status`, `paid_as`, `transaction_id`, `PaidDate`, `PaidTime`, `Comment`) VALUES
(5, 3, 1000, 80, 80, 3360, 'ANIKET SETHI', '1669 SECTOR 26 PKL', 9876354151, 0, '2020-05-04', '10:18:18', 'paid', 23, '626YWYH6WY', '2020-05-04', '10:17:00', 'Paid'),
(6, 3, 40, 2.25, 2.25, 94.5, 'Aniket Sethi', 'hi', 679, 4646, '2020-05-06', '21:57:10', 'pending', 22, 'haha', '2020-05-04', '13:14:00', 'hau'),
(7, 3, 1500, 37.5, 37.5, 1575, 'tY', 'a6a6', 4343, 4676, '2020-05-04', '13:21:20', 'paid', 22, 'hahah', '2020-05-04', '13:17:00', 'a6ay'),
(8, 3, 4500, 112.5, 112.5, 4725, 'Sanheen Sethi', 'Sector 26 Panchkula', 9876354151, 8360638685, '2020-05-06', '11:18:41', 'paid', 22, '0', '2020-05-06', '11:18:00', 'No Comments'),
(9, 3, 11800, 295, 295, 12390, 'vuc', 'ivig', 38686, 93838, '2020-05-06', '22:13:06', 'paid', 22, '8g8g', '2020-05-06', '22:12:00', 'gif7f');

-- --------------------------------------------------------

--
-- Table structure for table `bill_data`
--

CREATE TABLE `bill_data` (
  `bill_number` bigint(20) NOT NULL,
  `bill_cdata` varchar(250) NOT NULL,
  `piece` int(11) NOT NULL,
  `price_per_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill_data`
--

INSERT INTO `bill_data` (`bill_number`, `bill_cdata`, `piece`, `price_per_piece`) VALUES
(5, 'SHIRT', 2, 500),
(5, 'PANT', 2, 700),
(5, 'SHOES', 1, 800),
(7, 'hagay', 2, 500),
(7, 'gaga', 1, 500),
(8, 'Suit', 1, 1400),
(8, 'Sale Suit', 2, 500),
(8, 'Sale Suit', 2, 700),
(8, 'Shirt Pant', 1, 700),
(6, 'hshs', 1, 40),
(6, 'susu', 1, 50),
(9, 'hcy', 2, 1400),
(9, 'uc', 5, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `paidAs`
--

CREATE TABLE `paidAs` (
  `paidAsID` int(11) NOT NULL,
  `paidAsName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paidAs`
--

INSERT INTO `paidAs` (`paidAsID`, `paidAsName`) VALUES
(21, 'Card'),
(22, 'Cash'),
(23, 'Paytm'),
(24, 'Google Pay'),
(25, 'Phone Pay'),
(26, 'BHIM UPI');

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `shop_id` bigint(20) NOT NULL,
  `admin_id` bigint(20) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact1` bigint(20) NOT NULL,
  `contact2` bigint(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `propname` varchar(20) NOT NULL,
  `gstNum` varchar(50) NOT NULL,
  `cgstper` float NOT NULL,
  `sgstper` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`shop_id`, `admin_id`, `company_name`, `contact1`, `contact2`, `address`, `propname`, `gstNum`, `cgstper`, `sgstper`) VALUES
(3, 12, 'Sethi Cloth House', 9876354151, 9416553376, 'Ramgarh,Panchkula,Haryana', 'Gautam Sethi', 'SHGAYGA1652GSG71YGS', 2.5, 2.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`bill_number`),
  ADD KEY `shops` (`shop_id`),
  ADD KEY `paid` (`paid_as`);

--
-- Indexes for table `bill_data`
--
ALTER TABLE `bill_data`
  ADD KEY `bill` (`bill_number`);

--
-- Indexes for table `paidAs`
--
ALTER TABLE `paidAs`
  ADD PRIMARY KEY (`paidAsID`);

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`shop_id`),
  ADD KEY `anycons` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `bill_number` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paidAs`
--
ALTER TABLE `paidAs`
  MODIFY `paidAsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `shop_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD CONSTRAINT `paid` FOREIGN KEY (`paid_as`) REFERENCES `paidAs` (`paidAsID`),
  ADD CONSTRAINT `shops` FOREIGN KEY (`shop_id`) REFERENCES `shop_details` (`shop_id`);

--
-- Constraints for table `bill_data`
--
ALTER TABLE `bill_data`
  ADD CONSTRAINT `bill` FOREIGN KEY (`bill_number`) REFERENCES `billing_details` (`bill_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD CONSTRAINT `anycons` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
