-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:17 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `nn_danhmuc`
--

CREATE TABLE `nn_danhmuc` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Decription` text NOT NULL,
  `IsDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_danhmuc`
--

INSERT INTO `nn_danhmuc` (`Id`, `Name`, `Decription`, `IsDelete`) VALUES
(1, 'Iphone 13', 'Iphone 13', 0),
(2, 'Iphone', 'Iphone', 0),
(3, 'Phụ Kiện', 'Phụ Kiện', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nn_order`
--

CREATE TABLE `nn_order` (
  `Id` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `AddressId` int(11) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Note` text NOT NULL,
  `TotalPrice` decimal(18,0) NOT NULL,
  `CountProduct` int(11) NOT NULL,
  `DateTransfer` date NOT NULL,
  `DateCreate` date NOT NULL,
  `Status` int(11) NOT NULL,
  `PaymentStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nn_order_detail`
--

CREATE TABLE `nn_order_detail` (
  `Id` int(11) NOT NULL,
  `IdOrder` varchar(50) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Numbers` int(11) NOT NULL,
  `Price` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nn_sanpham`
--

CREATE TABLE `nn_sanpham` (
  `Id` int(11) NOT NULL,
  `Code` varchar(50) NOT NULL,
  `IdDM` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Decription` text DEFAULT NULL,
  `Price` decimal(18,0) DEFAULT 0,
  `Keyword` text DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `UrlImages` text DEFAULT NULL,
  `SalePrice` decimal(18,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nn_sanpham`
--

INSERT INTO `nn_sanpham` (`Id`, `Code`, `IdDM`, `Name`, `Decription`, `Price`, `Keyword`, `Title`, `Content`, `UrlImages`, `SalePrice`) VALUES
(1, 'iphone-13-pro-max-128gb-chinh-hang-vn-a-moi-chua-k', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '200000', NULL, NULL, NULL, NULL, '0'),
(3, 'iphone-13-pro-max-128gb', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '10000', NULL, NULL, NULL, NULL, '0'),
(4, 'iphone-13-pro-max-128gc', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '0', NULL, NULL, NULL, NULL, '0'),
(5, 'iphone-13-pro-max-128gd', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '0', NULL, NULL, NULL, NULL, '0'),
(6, 'abc', 1, 'Samsung', '', '200000', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nn_users`
--

CREATE TABLE `nn_users` (
  `Id` int(11) NOT NULL,
  `Fullname` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Address` text DEFAULT NULL,
  `Province` varchar(10) DEFAULT NULL,
  `District` varchar(10) DEFAULT NULL,
  `Ward` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nn_users_address`
--

CREATE TABLE `nn_users_address` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Province` varchar(10) NOT NULL,
  `District` varchar(10) NOT NULL,
  `Wad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nn_danhmuc`
--
ALTER TABLE `nn_danhmuc`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nn_order`
--
ALTER TABLE `nn_order`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `nn_order_detail`
--
ALTER TABLE `nn_order_detail`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IdOrder` (`IdOrder`,`IdProduct`),
  ADD KEY `IdProduct` (`IdProduct`);

--
-- Indexes for table `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Code` (`Code`),
  ADD UNIQUE KEY `Code_2` (`Code`),
  ADD KEY `IdDM` (`IdDM`);

--
-- Indexes for table `nn_users`
--
ALTER TABLE `nn_users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`),
  ADD UNIQUE KEY `Email_2` (`Email`,`Phone`);

--
-- Indexes for table `nn_users_address`
--
ALTER TABLE `nn_users_address`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nn_danhmuc`
--
ALTER TABLE `nn_danhmuc`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nn_order_detail`
--
ALTER TABLE `nn_order_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nn_users`
--
ALTER TABLE `nn_users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nn_users_address`
--
ALTER TABLE `nn_users_address`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nn_order`
--
ALTER TABLE `nn_order`
  ADD CONSTRAINT `nn_order_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `nn_users` (`Id`);

--
-- Constraints for table `nn_order_detail`
--
ALTER TABLE `nn_order_detail`
  ADD CONSTRAINT `nn_order_detail_ibfk_1` FOREIGN KEY (`IdOrder`) REFERENCES `nn_order` (`Id`),
  ADD CONSTRAINT `nn_order_detail_ibfk_2` FOREIGN KEY (`IdProduct`) REFERENCES `nn_sanpham` (`Id`);

--
-- Constraints for table `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  ADD CONSTRAINT `nn_sanpham_ibfk_1` FOREIGN KEY (`IdDM`) REFERENCES `nn_danhmuc` (`Id`);

--
-- Constraints for table `nn_users_address`
--
ALTER TABLE `nn_users_address`
  ADD CONSTRAINT `nn_users_address_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `nn_users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
