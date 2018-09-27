-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2018 at 02:42 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE IF NOT EXISTS `CUSTOMER` (
  `CustID` int(8) NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `GivenName` varchar(16) NOT NULL,
  `LastName` varchar(16) NOT NULL,
  `Address` varchar(32) NOT NULL,
  `CreditCard` int(16) NOT NULL,
  `Email` varchar(32) NOT NULL,
  PRIMARY KEY (`CustID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`CustID`, `UserName`, `Password`, `GivenName`, `LastName`, `Address`, `CreditCard`, `Email`) VALUES
(1000, 'AAA', '1234abcd', 'Bill', 'John', '3 First Ave, Eastwood, Sydney', 2147483647, 'b.john@wsu.edu.au'),
(2000, 'BBB', 'abcd1234', 'Leon', 'Jack', '1 Third Road, Parramatta, Sydney', 2147483647, 'l.jack@navitas.com');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER`
--

CREATE TABLE IF NOT EXISTS `ORDER` (
  `OrderID` int(8) NOT NULL,
  `CustID` int(8) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderTime` time NOT NULL,
  `OrderStatus` varchar(16) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`OrderID`,`CustID`),
  KEY `CustID` (`CustID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ORDER`
--

INSERT INTO `ORDER` (`OrderID`, `CustID`, `OrderDate`, `OrderTime`, `OrderStatus`) VALUES
(1, 2000, '2018-01-01', '12:30:00', 'Pending'),
(2, 2000, '2017-12-25', '17:00:00', 'Pending'),
(3, 1000, '2018-01-02', '18:00:00', 'Pending'),
(4, 1000, '2017-11-01', '20:00:00', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_DETAILS`
--

CREATE TABLE IF NOT EXISTS `ORDER_DETAILS` (
  `OrderID` int(8) NOT NULL,
  `PizzaID` int(8) NOT NULL,
  `SauceID` int(8) NOT NULL,
  `Quantity` int(2) NOT NULL,
  PRIMARY KEY (`OrderID`,`PizzaID`,`SauceID`),
  KEY `PizzaID` (`PizzaID`),
  KEY `SauceID` (`SauceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ORDER_DETAILS`
--

INSERT INTO `ORDER_DETAILS` (`OrderID`, `PizzaID`, `SauceID`, `Quantity`) VALUES
(1, 222, 101, 2),
(1, 333, 202, 1),
(2, 111, 202, 3),
(3, 222, 303, 2),
(3, 555, 101, 1),
(4, 222, 202, 3),
(4, 444, 202, 4);

-- --------------------------------------------------------

--
-- Table structure for table `PIZZA`
--

CREATE TABLE IF NOT EXISTS `PIZZA` (
  `PizzaID` int(8) NOT NULL,
  `PizzaName` varchar(16) NOT NULL,
  `Price` decimal(4,2) NOT NULL,
  `Size` int(2) NOT NULL,
  `Picture` varchar(30) NOT NULL,
  PRIMARY KEY (`PizzaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PIZZA`
--

INSERT INTO `PIZZA` (`PizzaID`, `PizzaName`, `Price`, `Size`, `Picture`) VALUES
(111, 'Supreme', '19.95', 7, 'supreme.jpg'),
(222, 'Veggie', '15.95', 7, 'vege.jpg'),
(333, 'Hawaii', '16.95', 7, 'hawaii.jpg'),
(444, 'Meatlover', '19.95', 7, 'meatlover.jpg'),
(555, 'Four seasons', '22.95', 7, 'fourseasons.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `SAUCE`
--

CREATE TABLE IF NOT EXISTS `SAUCE` (
  `SauceID` int(8) NOT NULL,
  `SauceName` varchar(16) NOT NULL,
  `SauceCost` decimal(4,2) NOT NULL,
  `SaucePic` varchar(20) NOT NULL,
  PRIMARY KEY (`SauceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SAUCE`
--

INSERT INTO `SAUCE` (`SauceID`, `SauceName`, `SauceCost`, `SaucePic`) VALUES
(101, 'BBQ', '5.95', 'bbq.jpg'),
(202, 'Hot chilli', '4.95', 'salsa.jpg'),
(303, 'Tomato', '4.95', 'tomato.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD CONSTRAINT `ORDER_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `CUSTOMER` (`CustID`) ON UPDATE CASCADE;

--
-- Constraints for table `ORDER_DETAILS`
--
ALTER TABLE `ORDER_DETAILS`
  ADD CONSTRAINT `ORDER_DETAILS_ibfk_1` FOREIGN KEY (`PizzaID`) REFERENCES `PIZZA` (`PizzaID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ORDER_DETAILS_ibfk_4` FOREIGN KEY (`OrderID`) REFERENCES `ORDER` (`OrderID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ORDER_DETAILS_ibfk_5` FOREIGN KEY (`SauceID`) REFERENCES `SAUCE` (`SauceID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
