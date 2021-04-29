-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2021 at 04:37 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazaarceramics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountcustomer`
--

CREATE TABLE `accountcustomer` (
  `AccountCustomerID` int(3) NOT NULL,
  `AccountCustomerNumber` char(10) NOT NULL,
  `AccountBusinessName` char(30) NOT NULL,
  `AccountBusinessAddress` varchar(50) NOT NULL,
  `AccountBusinessSuburb` varchar(45) NOT NULL,
  `AccountBusinessState` varchar(5) NOT NULL,
  `AccountBusinessPostCode` varchar(45) NOT NULL,
  `AccountContactName` varchar(60) NOT NULL,
  `AccountContactNumber` char(10) NOT NULL,
  `AccountCustomerEmail` varchar(80) NOT NULL,
  `AccountCustomerURL` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountcustomer`
--

INSERT INTO `accountcustomer` (`AccountCustomerID`, `AccountCustomerNumber`, `AccountBusinessName`, `AccountBusinessAddress`, `AccountBusinessSuburb`, `AccountBusinessState`, `AccountBusinessPostCode`, `AccountContactName`, `AccountContactNumber`, `AccountCustomerEmail`, `AccountCustomerURL`) VALUES
(2, '102042', 'A Brand New Dey', '16 That St', 'Laterville', 'NSW', '2121', 'Roger Moore', '0295723641', 'sales@brandnewdey.com.au', 'www.brandnewday.com.au');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(3) NOT NULL,
  `CustomerGivenName` char(30) NOT NULL,
  `CustomerLastName` char(30) NOT NULL,
  `CustomerEmail` varchar(80) DEFAULT NULL,
  `CustomerAddress` varchar(50) NOT NULL,
  `CustomerSuburb` varchar(45) DEFAULT NULL,
  `CustomerState` varchar(5) DEFAULT NULL,
  `CustomerPostCode` varchar(4) DEFAULT NULL,
  `CustomerCountry` varchar(45) DEFAULT NULL,
  `CustomerPhoneNumber` char(10) NOT NULL,
  `CustomerAccountFlag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerGivenName`, `CustomerLastName`, `CustomerEmail`, `CustomerAddress`, `CustomerSuburb`, `CustomerState`, `CustomerPostCode`, `CustomerCountry`, `CustomerPhoneNumber`, `CustomerAccountFlag`) VALUES
(1, 'Charlie', 'Sheena', 'csheena@gmail.com', '56 This St ', 'Someplace', 'Vic', '3345', 'Australia', '0349745458', 0),
(2, 'Susan', 'Dey', 'onemoredey@hotmail.com', '21 Today St', 'Right Nowville', 'NSW', '2121', 'Australia', '0295723146', 0),
(3, 'John', 'Smith', '123@gmail.com', '1 Fake St ', 'Smithfield', 'NSW', '2164', 'Australia', '0295876554', 0),
(4, 'Rowen', 'Selby', '124@gmail.com', '2 Fake St', 'Smithfield', 'NSW', '2164', 'Australia', '0295876553', 0),
(5, 'Emma', 'Payne', '125@gmail.com', '3 Fake St', 'Smithfield', 'NSW', '2164', 'Australia', '0295876533', 0),
(6, 'Trish', 'Traves', '126@gmail.com', '4 Fake St', 'Smithfield', 'NSW', '2164', 'Australia', '0295876531', 0);

-- --------------------------------------------------------

--
-- Table structure for table `glazetype`
--

CREATE TABLE `glazetype` (
  `ProductGlazeTypeCode` char(3) NOT NULL,
  `ProductGlazeType` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glazetype`
--

INSERT INTO `glazetype` (`ProductGlazeTypeCode`, `ProductGlazeType`) VALUES
('BGC', 'Blue Green Crystalline'),
('CHN', 'Chun'),
('CPR', 'Copper Red'),
('DMC', 'Dry Matt Calcium'),
('HCA', 'High Calcium'),
('ISL', 'Iron stoneware and lustre'),
('SCG', 'Slip and clear glaze'),
('SWR', 'Slip ware');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `CustomerID` int(11) NOT NULL,
  `UserID` varchar(45) DEFAULT NULL,
  `HashedPassword` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`CustomerID`, `UserID`, `HashedPassword`) VALUES
(1, 'village', '$2y$10$lCMGg0Z4lbucU2syCdvJgeN7GNN73FpsNxyFMps2royl80BN0oNd.'),
(2, 'troops', '$2y$10$gqeSovMKdihQLoQyATr9Den8wFumLqgLtwRdXiGpt0hNHfsc0LYRi'),
(3, 'change', '$2y$10$sDQwfIBGRqguXhrqHPUqt.N3avdA6w/TKffMhorY8OjKZYSQX3u5u'),
(4, 'number', '$2y$10$07uRuECuZOl3jZppcEJWzuiLPQwKiwFDD9GGo6DuAYlHj1bk7MWVK'),
(5, 'plastic', '$2y$10$3OIcEYsETzUR.Q8Up9sVQ.pfR.YLkQXxRakV31fP3/JEPcPoJ/9I.'),
(6, 'makers', '$2y$10$uhfeEdYvlHlmt1Yx0atSvebZvwgeM9lrEFUek7nUckBS9kKRwT3YO');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `OrderID` int(11) NOT NULL,
  `ProductID` char(10) NOT NULL,
  `OrderQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`OrderID`, `ProductID`, `OrderQuantity`) VALUES
(100, 'bcpot020', 5),
(100, 'bcpot120', 1),
(101, 'bcpot020', 10),
(101, 'bcpot030', 3),
(101, 'bcpot060', 2),
(102, 'bcpot020', 5),
(103, 'bcpot016', 4),
(104, 'bcpot014', 3),
(105, 'bcpot016', 2),
(106, 'bcpot020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(3) NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `OrderDate`) VALUES
(100, 2, '2016-09-10'),
(101, 1, '2016-05-31'),
(102, 2, '2021-03-11'),
(103, 2, '2021-03-11'),
(104, 2, '2021-03-11'),
(105, 3, '2021-03-11'),
(106, 4, '2021-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` char(10) NOT NULL,
  `ProductGlazeTypeCode` char(3) NOT NULL,
  `ProductTitle` char(30) NOT NULL,
  `ProductDescription` varchar(150) NOT NULL,
  `ProductPrice` decimal(5,2) NOT NULL DEFAULT 0.00,
  `ProductSize` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductGlazeTypeCode`, `ProductTitle`, `ProductDescription`, `ProductPrice`, `ProductSize`) VALUES
('bcpot014', 'ISL', 'Carved vase form 001', 'Carved Iron stoneware vase form.  Oxidation lustre on rim.  Fired to 1280 degrees', '450.00', '40 cm diameter'),
('bcpot016', 'DMC', 'Carved vase form 002', 'Carved dry matt calcium vase form.  Fired to 1280 degrees', '450.00', '40 cm diameter'),
('bcpot020', 'CPR', 'Copper Red Dish 001', 'Shallow Copper Red dish form showing distinctive qualities of this traditional reduction fired glaze.  Fired to 1300 degrees', '450.00', '50cm diameter'),
('bcpot030', 'CPR', 'Copper Red Vase 002', 'Tall Slim Copper Red vase form showing distinctive qualities of this traditional reduction fired glaze. Fired to 1300 degrees.', '870.00', '40cm tall'),
('bcpot060', 'HCA', 'Cyan Dish 004', 'Shallow High Calcium Cyan dish showing a distinctive burnt copper rim. Fired to 1400 degrees.', '950.00', '55cm diameter'),
('bcpot080', 'HCA', 'Light Blue Cup Set 003', 'Cup and Saucer set in Light Blue with white trim and a distinctive yellow wheat motif.', '106.00', '30cm diameter'),
('bcpot090', 'HCA', 'Tungsten Blue Dish 006', 'Deep Tungsten Blue dish form showing distinctive qualities of modern firing techniques. Fired to 1650 degrees.', '399.00', '45cm diameter'),
('bcpot120', 'ISL', 'Earthen Vase 005', 'Tall Wide Earthen Ware Vase form showing traditional glazing techniques.', '999.00', '49cm tall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountcustomer`
--
ALTER TABLE `accountcustomer`
  ADD PRIMARY KEY (`AccountCustomerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `glazetype`
--
ALTER TABLE `glazetype`
  ADD PRIMARY KEY (`ProductGlazeTypeCode`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `User` (`UserID`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `FK_OrderProduct_idx` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`,`CustomerID`),
  ADD KEY `FK_OrderCustomer` (`CustomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`,`ProductGlazeTypeCode`),
  ADD KEY `fk_Product_GlazeType1_idx` (`ProductGlazeTypeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountcustomer`
--
ALTER TABLE `accountcustomer`
  ADD CONSTRAINT `AccountFK` FOREIGN KEY (`AccountCustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `FK_CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `FK_OrderNumber` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_OrderProduct` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_OrderCustomer` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_GlazeType1` FOREIGN KEY (`ProductGlazeTypeCode`) REFERENCES `glazetype` (`ProductGlazeTypeCode`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
