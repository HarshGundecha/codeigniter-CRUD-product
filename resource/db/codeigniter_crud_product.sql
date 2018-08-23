-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2018 at 04:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_crud_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `CategorySlug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `CategorySlug`) VALUES
(1, 'SmartPhone', 'smartphone'),
(2, 'Laptop', 'laptop');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductSlug` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `CategorySlug` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductSlug`, `Name`, `Price`, `Description`, `CategorySlug`, `Status`) VALUES
(1, 'moto-g5-plus', 'Moto G5 plus', 17000, 'blablabla', 'smartphone', 1),
(2, 'lenovo-ideapad-500', 'Lenovo ideapad 500', 53000, 'great laptop for both work and entertainment', 'laptop', 1),
(3, 'samsung-j7', 'Samsung J7', 25000, 'good shit phone', 'smartphone', 1),
(4, 'moto-g6', 'Moto g6', 17000, 'budget phone of 2k18', 'smartphone', 1),
(5, 'pixel-2', 'Pixel 2', 50000, 'Dreamphone', 'smartphone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Slug` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `OTP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Slug`, `Email`, `Phone`, `Password`, `Address`, `OTP`) VALUES
(1, 'Harsh Gundecha', 'harsh-gundecha', 'harsh.gundecha@gmail.com', '7567934387', '$2y$10$oURVO2XtakIZoM/LgLFI.OLtqfHJXcHvCbdIex5qTqTM1fCtvJd1.', 'Somwhere in Globe', ''),
(2, 'Jeni Biliyawala', 'jeni-biliyawala', 'jeni@gmail.com', '7418520963', '$2y$10$mutEMnZuPXWQGgAK1AYycORBOaYDLrQaPRBn5mot8UFS4DMTgaomK', 'Somwhere in Globe', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategorySlug` (`CategorySlug`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ProductSlug` (`ProductSlug`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
