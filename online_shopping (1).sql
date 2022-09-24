-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 02:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `Cat_Des` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('S001', 'Shirt', 'A good cotton shirt'),
('S002', 'Vest', 'a good quality'),
('S003', 'Shoe', 'A good  shoes '),
('S004', 'A new bag', 'a good bag');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `CustName` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CusDate` int(11) NOT NULL,
  `CusMonth` int(11) NOT NULL,
  `CusYear` int(11) NOT NULL,
  `SSN` varchar(10) DEFAULT NULL,
  `ActiveCode` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `CustName`, `gender`, `Address`, `telephone`, `email`, `CusDate`, `CusMonth`, `CusYear`, `SSN`, `ActiveCode`, `state`) VALUES
('Dat', 'e10adc3949ba59abbe56e057f20f883e', 'Thanh Dat', 0, 'Can Tho', '01223352155', 'Dat@gmail.com', 16, 9, 1987, '', '', 0),
('Finn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Hung Dung', 0, 'Can Tho', '0903100550', 'nhdung.CPL@gmail.com', 31, 8, 1980, '', '', 0),
('Lap', 'fcea920f7412b5da7be0cf42b8c93759', 'Nguyen Van Lap', 0, 'CT', '0907136566', 'lap@gmail.com', 13, 10, 2005, '', '', 1),
('Nam', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Thanh Nam', 0, 'Can Tho city', '0126145658', 'Nam@gmail.com', 18, 11, 1987, '', '', 0),
('nhdung', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyen Hung Dung', 0, 'Can Thow', '0903100550', 'nhdung@gmail.com', 31, 8, 1980, '', '', 0),
('Tang', 'e10adc3949ba59abbe56e057f20f883e', 'Tran Ngoc Tang', 0, 'Can Tho', '0126111888', 'Tang@gmail.com', 1, 11, 2002, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(6) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `DeliveryDate` datetime NOT NULL,
  `Delivery_loca` varchar(200) NOT NULL,
  `Payment` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `oldPrice` decimal(12,2) NOT NULL,
  `SmallDesc` varchar(1000) NOT NULL,
  `DetailDesc` text NOT NULL,
  `ProDate` datetime NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  `Pro_image` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `oldPrice`, `SmallDesc`, `DetailDesc`, `ProDate`, `Pro_qty`, `Pro_image`, `Cat_ID`) VALUES
('I001', 'A red Shirt', 150000, '0.00', 'a new shirt', 'high quality', '2022-05-11 02:30:03', 30, 'shirt4.jpg', 'S001'),
('I0010', 'A black shoe', 1500000, '0.00', '', '', '2022-05-11 04:01:17', 10, 'shoe2.jpg', 'S003'),
('I0011', 'A grey shoe', 1500000, '0.00', '', '', '2022-05-11 04:02:23', 10, 'shoe7.jpg', 'S003'),
('I0012', 'A white shoe', 1500000, '0.00', '', '', '2022-05-11 04:41:24', 10, 'shoe5.jpg', 'S003'),
('I0013', 'A brown vest', 1500000, '0.00', '', '', '2022-05-12 05:00:41', 10, 'vest3.jpg', 'S002'),
('I0014', 'a shirt', 1500000, '0.00', '', '', '2022-05-12 05:18:37', 10, 'T-Shirt.jpeg', 'S001'),
('I0015', 'a new shirt', 1500000, '0.00', '', '', '2022-05-12 05:21:10', 10, 'T-shirt1.jpg', 'S001'),
('I0017', 'shoes 11', 15000, '0.00', '', '', '2022-05-12 05:54:48', 10, 'shoe3.jpg', 'S003'),
('I002', 'A greyShirt', 150000, '0.00', 'a new shirt', 'high quality', '2022-05-11 02:57:20', 30, 'shirt2.jpg', 'S001'),
('I003', 'A white Shirt1', 150000, '0.00', 'a new shirt', 'high quality', '2022-05-11 12:31:35', 15, 'T-Shirt1.jpg', 'S001'),
('I004', 'A white Shirt', 150000, '0.00', '', '', '2022-05-11 12:31:02', 10, 'shirt1.jpg', 'S001'),
('I006', 'A grey vest', 1500000, '0.00', '', '', '2022-05-11 04:22:41', 15, 'vest1.jpg', 'S002'),
('I007', 'A black vest', 150000, '0.00', '', '', '2022-05-11 04:21:43', 10, 'vest2.jpg', 'S002'),
('I008', 'A rosevest', 1500000, '0.00', '', '', '2022-05-11 03:46:08', 10, 'vest4.jpg', 'S002'),
('I009', 'A brown shoe', 1500000, '0.00', '', '', '2022-05-11 03:56:33', 10, 'shoe.jpg', 'S003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`Username`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
