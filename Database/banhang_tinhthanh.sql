-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 31, 2022 lúc 12:55 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_admin`
--

DROP TABLE IF EXISTS `nn_admin`;
CREATE TABLE IF NOT EXISTS `nn_admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Address` text,
  `Province` varchar(10) DEFAULT NULL,
  `District` varchar(10) DEFAULT NULL,
  `Ward` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Phone` (`Phone`),
  UNIQUE KEY `Email_2` (`Email`,`Phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_admin`
--

INSERT INTO `nn_admin` (`Id`, `Fullname`, `Username`, `Email`, `Phone`, `Password`, `Address`, `Province`, `District`, `Ward`) VALUES
(1, 'Nguyen Văn Tèo', 'teonv', 'teonguyen@gmail.com', '036669741', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hcm', '79', '791', '79100'),
(2, 'Abc', 'teonv@gmail.com', 'teonvw@gmail.com', '43234234234', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2', '41', '645');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_banner`
--

DROP TABLE IF EXISTS `nn_banner`;
CREATE TABLE IF NOT EXISTS `nn_banner` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Description` longtext NOT NULL,
  `STT` int(11) NOT NULL,
  `UrlImages` text NOT NULL,
  `Link` text NOT NULL,
  `GroupsName` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_banner`
--

INSERT INTO `nn_banner` (`Id`, `Name`, `Description`, `STT`, `UrlImages`, `Link`, `GroupsName`) VALUES
(1, 'Banner1 ', '<h1 style=\"margin: 115px 0px 10px; font-size: 48px; font-family: abel; line-height: 1.1; color: rgb(180, 177, 171);\"><span style=\"color: rgb(254, 152, 15);\">E</span>-SHOPPER</h1><h2 style=\"font-family: Roboto, sans-serif; font-weight: 700; line-height: 1.1; color: rgb(54, 52, 50); margin-top: 10px; margin-bottom: 22px; font-size: 28px;\">Free E-Commerce Template</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(54, 52, 50); font-family: Roboto, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 0, '/public/banner/16.png', '#', 'BannerHome'),
(2, 'Banner1 ', '<h1><span>E</span>-SHOPPER</h1>\r\n                                        <h2>Free E-Commerce Template</h2>\r\n                                        <p>\r\n                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\n                                            sed do eiusmod tempor incididunt ut labore et dolore magna\r\n                                            aliqua.\r\n                                        </p>\r\n                                        <button type=\"button\" class=\"btn btn-default get\">\r\n                                            Get it now\r\n                                        </button>', 0, '/public/banner/Toroi_Phone_op2.png', '#aaa', 'BannerHome'),
(3, 'Banner1 ', '', 0, '/public/banner/14.png', '#', 'BannerHome');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_danhmuc`
--

DROP TABLE IF EXISTS `nn_danhmuc`;
CREATE TABLE IF NOT EXISTS `nn_danhmuc` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Decription` text NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_danhmuc`
--

INSERT INTO `nn_danhmuc` (`Id`, `Name`, `Decription`, `IsDelete`) VALUES
(1, 'Iphone 13', 'Iphone 13', 0),
(2, 'Iphone', 'Iphone', 0),
(3, 'Phụ Kiện', 'Phụ Kiện', 0),
(4, 'aaaa', 'asdas', 0),
(5, 'Abc', 'Abc asdasdas', 1),
(6, 'aaaaaaaaaaa', 'aaaaaaaaa', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_menu`
--

DROP TABLE IF EXISTS `nn_menu`;
CREATE TABLE IF NOT EXISTS `nn_menu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Link` text NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `STT` int(11) NOT NULL,
  `Icon` text,
  `CapCha` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_menu`
--

INSERT INTO `nn_menu` (`Id`, `Name`, `Link`, `GroupName`, `STT`, `Icon`, `CapCha`) VALUES
(1, 'Account', '/', 'MenuTopHeader', 0, 'fa fa-user', 0),
(2, 'Wishlist', '/', 'MenuTopHeader', 0, 'fa fa-star', 0),
(3, 'Checkout', '/gioi-thieu', 'MenuTopHeader', 1, 'fa fa-crosshairs', 0),
(4, 'Trang Chủ', '/', 'FooterMenu', 0, '', 0),
(5, 'Trang Chủ', '/', 'MainMenu', 0, '', 0),
(6, 'Sản Phẩm', '#', 'MainMenu', 1, '', 0),
(7, 'Giới thiệu', '#', 'MainMenu', 2, '', 0),
(8, 'Liên Hệ', '#', 'MainMenu', 3, '', 0),
(9, 'Sản Phẩm Mới', '#', 'MainMenu', 2, '', 6),
(10, 'Sản Phẩm Bán Chạy', '#', 'MainMenu', 1, '', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_options`
--

DROP TABLE IF EXISTS `nn_options`;
CREATE TABLE IF NOT EXISTS `nn_options` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `GroupName` (`GroupName`,`Code`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_options`
--

INSERT INTO `nn_options` (`Id`, `Code`, `Name`, `Description`, `GroupName`) VALUES
(1, 'MenuTopHeader', 'Menu Top Header ', 'Menu Top Header a', 'MenuGroupName'),
(2, 'MenuGroupName', 'Nhóm Menu', 'Danh Sách Menu', 'Menu'),
(3, 'FooterMenu', 'FooterMenu 1', 'FooterMenu 1', 'MenuGroupName'),
(4, 'FooterMenu2', 'FooterMenu2', 'FooterMenu2', 'MenuGroupName'),
(5, 'FooterMenu3', 'FooterMenu3', 'FooterMenu3', 'MenuGroupName'),
(6, 'MainMenu', 'Menu Chính', 'Menu ', 'MenuGroupName'),
(7, 'FooterMenu4', 'FooterMenu4', 'FooterMenu4', 'MenuGroupName'),
(8, 'ThuongHieu', 'Thương Hiệu', 'Thương Hiệu', 'Product'),
(9, 'ACNE', 'ACNE', 'ACNE', 'ThuongHieu'),
(10, '2', 'Grüne Erde', 'Grüne Erde', 'ThuongHieu'),
(11, 'ALBIRO', 'ALBIRO', 'ALBIRO', 'ThuongHieu'),
(12, 'RONHILL', 'RONHILL', 'RONHILL', 'ThuongHieu'),
(13, 'ODDMOLLY', 'ODDMOLLY', 'ODDMOLLY', 'ThuongHieu'),
(14, 'BOUDESTIJN', 'BOUDESTIJN', 'BOUDESTIJN', 'ThuongHieu'),
(15, '3', 'RÖSCH CREATIVE CULTURE', 'RÖSCH CREATIVE CULTURE', 'ThuongHieu'),
(16, 'BannerHome', 'Banner Trang Chu', 'BannerGroupName', 'BannerGroupName');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_order`
--

DROP TABLE IF EXISTS `nn_order`;
CREATE TABLE IF NOT EXISTS `nn_order` (
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
  `PaymentStatus` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_order_detail`
--

DROP TABLE IF EXISTS `nn_order_detail`;
CREATE TABLE IF NOT EXISTS `nn_order_detail` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `IdOrder` varchar(50) NOT NULL,
  `IdProduct` int(11) NOT NULL,
  `Numbers` int(11) NOT NULL,
  `Price` decimal(18,0) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `IdOrder` (`IdOrder`,`IdProduct`),
  KEY `IdProduct` (`IdProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_sanpham`
--

DROP TABLE IF EXISTS `nn_sanpham`;
CREATE TABLE IF NOT EXISTS `nn_sanpham` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(50) NOT NULL,
  `IdDM` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Decription` text,
  `Price` decimal(18,0) DEFAULT '0',
  `Keyword` text,
  `Title` text,
  `Content` longtext,
  `UrlImages` text,
  `SalePrice` decimal(18,0) DEFAULT '0',
  `Active` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Code` (`Code`),
  UNIQUE KEY `Code_2` (`Code`),
  KEY `IdDM` (`IdDM`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_sanpham`
--

INSERT INTO `nn_sanpham` (`Id`, `Code`, `IdDM`, `Name`, `Decription`, `Price`, `Keyword`, `Title`, `Content`, `UrlImages`, `SalePrice`, `Active`) VALUES
(1, 'iphone-13-pro-masdas', 3, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', 'asdas', '20000000', 'asd', 'sdas', '&lt;p&gt;asdasdasd&lt;/p&gt;&lt;p&gt;as&lt;/p&gt;&lt;p&gt;da&lt;/p&gt;&lt;p&gt;s&lt;/p&gt;&lt;p&gt;da&lt;/p&gt;&lt;p&gt;sdas&lt;/p&gt;', '/public/upload/7.png', '20000000', 1),
(3, 'iphone-13-pro-max-128gb', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '10000', NULL, NULL, NULL, NULL, '0', 0),
(4, 'iphone-13-pro-max-128gc', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '0', NULL, NULL, NULL, NULL, '0', 0),
(5, 'iphone-13-pro-max-128gd', 1, 'iPhone 13 Pro Max 128GB Chính hãng VN/A (Mới - Chưa kích hoạt)', NULL, '0', NULL, NULL, NULL, NULL, '0', 0),
(6, 'asdasdas', 1, 'asdasd', '', '3333333333', '', 'dfsf sdfsfds', '', '', '33333333', 1),
(7, 'aaaaaaaaaaaa', 1, 'ssssssssssss', '', '2123', '', '', '', '', '123123123', 1),
(8, 'aaabbbbbbb', 4, 'aaa', 'da', '324234', 'sdas', 'as', '<p>sdasd</p>', '', '23423', 1),
(9, 'aasdasvvvv', 1, 'aaaaaaaaaasssssssssss', 'dasd', '2131', 'as', 'asdas', '<p>dasd</p>', '', '2312', 1),
(10, '2222222222222wwww', 1, '2222222222222wwww', 'asdas', '2131231', 'adas', 'dasdas', '&lt;p&gt;asdas&lt;/p&gt;', '', '123123', 1),
(11, 'asdasdaseeeeee', 1, '32234444444444', '', '23423', '', '', '', NULL, '423423', 1),
(14, 'asdasasxxxx', 1, 'asdasasxxxx', '', '0', '', '', '', NULL, '0', 1),
(15, 'aaaaaassssssssss', 1, 'aaaaaaaaassssssssss', '', '12312', '', '', '', NULL, '3123123', 1),
(16, 'asdasd', 1, 'asdasdas', 'dsadas', '123123123', 'zcas', 'dasdas', '&lt;p&gt;asdasdas&lt;/p&gt;&lt;p&gt;d&lt;/p&gt;&lt;p&gt;asd&lt;/p&gt;&lt;p&gt;as&lt;/p&gt;&lt;p&gt;das&lt;img src=&quot;data:image/png;base64,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&quot; style=&quot;width: 490px;&quot; data-filename=&quot;17.png&quot;&gt;&lt;/p&gt;&lt;p&gt;dsdasdas&lt;/p&gt;&lt;p&gt;sdfs&lt;/p&gt;&lt;p&gt;dfds&lt;/p&gt;&lt;p&gt;fds&lt;/p&gt;&lt;p&gt;fds&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '/public/upload/12.png', '1231231', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_setting`
--

DROP TABLE IF EXISTS `nn_setting`;
CREATE TABLE IF NOT EXISTS `nn_setting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Description` longtext NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_setting`
--

INSERT INTO `nn_setting` (`Id`, `Code`, `Name`, `Description`) VALUES
(1, 'Logo', 'Logo', 'http://nhatnghe.com/images/assets/logonn.png'),
(2, 'SDT', 'Số Diện Thoại', '0366997840'),
(3, 'Email', 'Email', 'abs@gmail.com'),
(4, 'Copyright', 'Copyright', '2022 nhatnghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_tinhthanh`
--

DROP TABLE IF EXISTS `nn_tinhthanh`;
CREATE TABLE IF NOT EXISTS `nn_tinhthanh` (
  `Id` varchar(20) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Alias` varchar(200) NOT NULL,
  `IDP` int(11) NOT NULL,
  `isShow` int(1) NOT NULL,
  `Note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_tinhthanh`
--

INSERT INTO `nn_tinhthanh` (`Id`, `Name`, `Alias`, `IDP`, `isShow`, `Note`) VALUES
('1', 'Hà Nội', '', 0, 1, '{\"en\":\"Ha Noi\"}'),
('10', 'Gia Lâm', '', 1, 1, ''),
('100', 'Huyện Lục Ngạn', '', 96, 1, ''),
('101', 'Huyện Sơn Động', '', 96, 1, ''),
('102', 'Huyện Tân Yên', '', 96, 1, ''),
('103', 'Huyện Việt Yên', '', 96, 1, ''),
('104', 'Huyện Yên Dũng', '', 96, 1, ''),
('105', 'Huyện Yên Thế', '', 96, 1, ''),
('106', 'Thành phố Bắc Giang', '', 96, 1, ''),
('107', 'Bạc Liêu', '', 0, 1, ''),
('108', 'Huyện Đông Hải', '', 107, 1, ''),
('109', 'Huyện Giá Rai', '', 107, 1, ''),
('11', 'Hà Đông', '', 1, 1, ''),
('110', 'Huyện Hoà Bình', '', 107, 1, ''),
('111', 'Huyện Hồng Dân', '', 107, 1, ''),
('112', 'Huyện Phước Long', '', 107, 1, ''),
('113', 'Huyện Vĩnh Lợi', '', 107, 1, ''),
('114', 'Thành phố Bạc Liêu', '', 107, 1, ''),
('115', 'Bắc Ninh', '', 0, 1, ''),
('116', 'Huyện Gia Bình', '', 115, 1, ''),
('117', 'Huyện Lương Tài', '', 115, 1, ''),
('118', 'Huyện Quế Võ', '', 115, 1, ''),
('119', 'Huyện Thuận Thành', '', 115, 1, ''),
('12', 'Hai Bà Trưng', '', 1, 1, ''),
('120', 'Huyện Tiên Du', '', 115, 1, ''),
('121', 'Huyện Yên Phong', '', 115, 1, ''),
('122', 'Thành phố Bắc Ninh', '', 115, 1, ''),
('123', 'Thị xã Từ Sơn', '', 115, 1, ''),
('124', 'Bến Tre', '', 0, 1, ''),
('125', 'Huyện Ba Tri', '', 124, 1, ''),
('126', 'Huyện Bình Đại', '', 124, 1, ''),
('127', 'Huyện Châu Thành', '', 124, 1, ''),
('128', 'Huyện Chợ Lách', '', 124, 1, ''),
('129', 'Huyện Giồng Trôm', '', 124, 1, ''),
('13', 'Hoài Đức', '', 1, 1, ''),
('130', 'Huyện Mỏ Cày Bắc', '', 124, 1, ''),
('131', 'Huyện Mỏ Cày Nam', '', 124, 1, ''),
('132', 'Huyện Thạnh Phú', '', 124, 1, ''),
('133', 'Thành phố Bến Tre', '', 124, 1, ''),
('134', 'Bình Định', '', 0, 1, ''),
('135', 'Huyện An Lão', '', 134, 1, ''),
('136', 'Huyện An Nhơn', '', 134, 1, ''),
('137', 'Huyện Hoài Ân', '', 134, 1, ''),
('138', 'Huyện Hoài Nhơn', '', 134, 1, ''),
('139', 'Huyện Phù Cát', '', 134, 1, ''),
('14', 'Hoàn Kiếm', '', 1, 1, ''),
('140', 'Huyện Phù Mỹ', '', 134, 1, ''),
('141', 'Huyện Tây Sơn', '', 134, 1, ''),
('142', 'Huyện Tuy Phước', '', 134, 1, ''),
('143', 'Huyện Vân Canh', '', 134, 1, ''),
('144', 'Huyện Vĩnh Thạnh', '', 134, 1, ''),
('145', 'Thành phố Qui Nhơn', '', 134, 1, ''),
('146', 'Bình Dương', '', 0, 1, ''),
('147', 'Huyện Bắc Tân Uyên', '', 146, 1, ''),
('148', 'Huyện Bàu Bàng', '', 146, 1, ''),
('149', 'Huyện Dầu Tiếng', '', 146, 1, ''),
('15', 'Hoàng Mai', '', 1, 1, ''),
('150', 'Huyện Phú Giáo', '', 146, 1, ''),
('151', 'Thành phố Thủ Dầu Một', '', 146, 1, ''),
('152', 'Thị xã Bến Cát', '', 146, 1, ''),
('153', 'Thị xã Dĩ An', '', 146, 1, ''),
('154', 'Thị xã Tân Uyên', '', 146, 1, ''),
('155', 'Thị xã Thuận An', '', 146, 1, ''),
('156', 'Bình Phước', '', 0, 1, ''),
('157', 'Huyện Bù Đăng', '', 156, 1, ''),
('158', 'Huyện Bù Đốp', '', 156, 1, ''),
('159', 'Huyện Bù Gia Mập', '', 156, 1, ''),
('16', 'Long Biên', '', 1, 1, ''),
('160', 'Huyện Chơn Thành', '', 156, 1, ''),
('161', 'Huyện Đồng Phú', '', 156, 1, ''),
('162', 'Huyện Hớn Quản', '', 156, 1, ''),
('163', 'Huyện Lộc Ninh', '', 156, 1, ''),
('164', 'Huyện Phú Riềng', '', 156, 1, ''),
('165', 'Thị xã Bình Long', '', 156, 1, ''),
('166', 'Thị xã Đồng Xoài', '', 156, 1, ''),
('167', 'Thị xã Phước Long', '', 156, 1, ''),
('168', 'Bình Thuận', '', 0, 1, ''),
('169', 'Huyện Bắc Bình', '', 168, 1, ''),
('17', 'Mê Linh', '', 1, 1, ''),
('170', 'Huyện Đức Linh', '', 168, 1, ''),
('171', 'Huyện Hàm Tân', '', 168, 1, ''),
('172', 'Huyện Hàm Thuận Bắc', '', 168, 1, ''),
('173', 'Huyện Hàm Thuận Nam', '', 168, 1, ''),
('174', 'Huyện Tánh Linh', '', 168, 1, ''),
('175', 'Huyện Tuy Phong', '', 168, 1, ''),
('176', 'Huyện đảo Phú Quý', '', 168, 1, ''),
('177', 'Thành phố Phan Thiết', '', 168, 1, ''),
('178', 'Thị xã La Gi', '', 168, 1, ''),
('179', 'Cà Mau', '', 0, 1, ''),
('18', 'Mỹ Đức', '', 1, 1, ''),
('180', 'Huyện Cái Nước', '', 179, 1, ''),
('181', 'Huyện Đầm Dơi', '', 179, 1, ''),
('182', 'Huyện Năm Căn', '', 179, 1, ''),
('183', 'Huyện Ngọc Hiển', '', 179, 1, ''),
('184', 'Huyện Phú Tân', '', 179, 1, ''),
('185', 'Huyện Thới Bình', '', 179, 1, ''),
('186', 'Huyện Trần Văn Thời', '', 179, 1, ''),
('187', 'Huyện U Minh', '', 179, 1, ''),
('188', 'Thành phố Cà Mau', '', 179, 1, ''),
('189', 'Cần Thơ', '', 0, 1, ''),
('19', 'Nam Từ Liêm', '', 1, 1, ''),
('190', 'Huyện Cờ Đỏ', '', 189, 1, ''),
('191', 'Huyện Phong Điền', '', 189, 1, ''),
('192', 'Huyện Thới Lai', '', 189, 1, ''),
('193', 'Huyện Vĩnh Thạnh', '', 189, 1, ''),
('194', 'Quận Bình Thủy', '', 189, 1, ''),
('195', 'Quận Cái Răng', '', 189, 1, ''),
('196', 'Quận Ninh Kiều', '', 189, 1, ''),
('197', 'Quận Ô Môn', '', 189, 1, ''),
('198', 'Quận Thốt Nốt', '', 189, 1, ''),
('199', 'Cao Bằng', '', 0, 1, ''),
('2', 'Ba Đình', '', 1, 1, ''),
('20', 'Phú Xuyên', '', 1, 1, ''),
('200', 'Huyện Bảo Lạc', '', 199, 1, ''),
('201', 'Huyện Bảo Lâm', '', 199, 1, ''),
('202', 'Huyện Hạ Lang', '', 199, 1, ''),
('203', 'Huyện Hà Quảng', '', 199, 1, ''),
('204', 'Huyện Hòa An', '', 199, 1, ''),
('205', 'Huyện Nguyên Bình', '', 199, 1, ''),
('206', 'Huyện Phục Hòa', '', 199, 1, ''),
('207', 'Huyện Quảng Uyên', '', 199, 1, ''),
('208', 'Huyện Thạch An', '', 199, 1, ''),
('209', 'Huyện Thông Nông', '', 199, 1, ''),
('21', 'Phúc Thọ', '', 1, 1, ''),
('210', 'Huyện Trà Lĩnh', '', 199, 1, ''),
('211', 'Huyện Trùng Khánh', '', 199, 1, ''),
('212', 'Thị xã Cao Bằng', '', 199, 1, ''),
('213', 'Đắc Lắc', '', 0, 1, ''),
('214', 'Huyện Buôn Đôn', '', 213, 1, ''),
('215', 'Huyện Cư Kuin', '', 213, 1, ''),
('216', 'Huyện Cư Mgar', '', 213, 1, ''),
('218', 'Huyện Ea Kar', '', 213, 1, ''),
('219', 'Huyện Ea Súp', '', 213, 1, ''),
('22', 'Quốc Oai', '', 1, 1, ''),
('220', 'Huyện Krông Ana', '', 213, 1, ''),
('221', 'Huyện Krông Bông', '', 213, 1, ''),
('222', 'Huyện Krông Búk', '', 213, 1, ''),
('223', 'Huyện Krông Năng', '', 213, 1, ''),
('224', 'Huyện Krông Pắk', '', 213, 1, ''),
('225', 'Huyện Lăk', '', 213, 1, ''),
('227', 'Thành phố Buôn Ma Thuột', '', 213, 1, ''),
('228', 'Thị xã Buôn Hồ', '', 213, 1, ''),
('229', 'Đắc Nông', '', 0, 1, ''),
('23', 'Sóc Sơn', '', 1, 1, ''),
('230', 'Huyện Cư Jút', '', 229, 1, ''),
('231', 'Huyện Đăk Glong', '', 229, 1, ''),
('232', 'Huyện Đăk Mil', '', 229, 1, ''),
('234', 'Huyện Đăk Song', '', 229, 1, ''),
('235', 'Huyện Krông Nô', '', 229, 1, ''),
('236', 'Huyện Tuy Đức', '', 229, 1, ''),
('237', 'Thị xã Gia Nghĩa', '', 229, 1, ''),
('238', 'Điện Biên', '', 0, 1, ''),
('239', 'Huyện Điện Biên', '', 238, 1, ''),
('24', 'Tây Hồ', '', 1, 1, ''),
('240', 'Huyện Điện Biên Đông', '', 238, 1, ''),
('241', 'Huyện Mường Ảng', '', 238, 1, ''),
('242', 'Huyện Mường Chà', '', 238, 1, ''),
('243', 'Huyện Mường Nhé', '', 238, 1, ''),
('244', 'Huyện Nậm Pồ', '', 238, 1, ''),
('245', 'Huyện Tủa Chùa', '', 238, 1, ''),
('246', 'Huyện Tuần Giáo', '', 238, 1, ''),
('247', 'Thành phố Điện Biên Phủ', '', 238, 1, ''),
('248', 'Thị xã Mường Lay', '', 238, 1, ''),
('249', 'Đồng Nai', '', 0, 1, ''),
('25', 'Thạch Thất', '', 1, 1, ''),
('250', 'Huyện Cẩm Mỹ', '', 249, 1, ''),
('251', 'Huyện Định Quán', '', 249, 1, ''),
('252', 'Huyện Long Thành', '', 249, 1, ''),
('253', 'Huyện Nhơn Trạch', '', 249, 1, ''),
('254', 'Huyện Tân Phú', '', 249, 1, ''),
('255', 'Huyện Thống Nhất', '', 249, 1, ''),
('256', 'Huyện Trảng Bom', '', 249, 1, ''),
('257', 'Huyện Vĩnh Cửu', '', 249, 1, ''),
('258', 'Huyện Xuân Lộc', '', 249, 1, ''),
('259', 'Thành phố Biên Hòa', '', 249, 1, ''),
('26', 'Thanh Oai', '', 1, 1, ''),
('260', 'Thị xã Long Khánh', '', 249, 1, ''),
('261', 'Đồng Tháp', '', 0, 1, ''),
('262', 'Huyện Cao Lãnh', '', 261, 1, ''),
('263', 'Huyện Châu Thành', '', 261, 1, ''),
('264', 'Huyện Hồng Ngự', '', 261, 1, ''),
('265', 'Huyện Lai Vung', '', 261, 1, ''),
('266', 'Huyện Lấp Vò', '', 261, 1, ''),
('267', 'Huyện Tam Nông', '', 261, 1, ''),
('268', 'Huyện Tân Hồng', '', 261, 1, ''),
('269', 'Huyện Thanh Bình', '', 261, 1, ''),
('27', 'Thanh Trì', '', 1, 1, ''),
('270', 'Huyện Tháp Mười', '', 261, 1, ''),
('271', 'Thành phố Cao Lãnh', '', 261, 1, ''),
('272', 'Thị xã Hồng Ngự', '', 261, 1, ''),
('273', 'Thị xã Sa Đéc', '', 261, 1, ''),
('274', 'Gia Lai', '', 0, 1, ''),
('275', 'Huyện Chư Păh', '', 274, 1, ''),
('276', 'Huyện Chư Prông', '', 274, 1, ''),
('277', 'Huyện Chư Pưh', '', 274, 1, ''),
('278', 'Huyện Chư Sê', '', 274, 1, ''),
('279', 'Huyện Đăk Đoa', '', 274, 1, ''),
('28', 'Thanh Xuân', '', 1, 1, ''),
('280', 'Huyện Đắk Pơ', '', 274, 1, ''),
('281', 'Huyện Đức Cơ', '', 274, 1, ''),
('282', 'Huyện Ia Grai', '', 274, 1, ''),
('283', 'Huyện Ia Pa', '', 274, 1, ''),
('284', 'Huyện Kbang', '', 274, 1, ''),
('285', 'Huyện Kông Chro', '', 274, 1, ''),
('286', 'Huyện Krông Pa', '', 274, 1, ''),
('287', 'Huyện Mang Yang', '', 274, 1, ''),
('288', 'Huyện Phú Thiện', '', 274, 1, ''),
('289', 'Thành phố Pleiku', '', 274, 1, ''),
('29', 'Thị xã Sơn Tây', '', 1, 1, ''),
('290', 'Thị xã An Khê', '', 274, 1, ''),
('291', 'Thị xã Ayun Pa', '', 274, 1, ''),
('292', 'Hà Giang', '', 0, 1, ''),
('293', 'Huyện Bắc Mê', '', 292, 1, ''),
('294', 'Huyện Bắc Quang', '', 292, 1, ''),
('295', 'Huyện Đồng Văn', '', 292, 1, ''),
('296', 'Huyện Hoàng Su Phì', '', 292, 1, ''),
('297', 'Huyện Mèo Vạc', '', 292, 1, ''),
('298', 'Huyện Quản Bạ', '', 292, 1, ''),
('299', 'Huyện Quang Bình', '', 292, 1, ''),
('3', 'Ba Vì', '', 1, 1, ''),
('30', 'Thường Tín', '', 1, 1, ''),
('300', 'Huyện Vị Xuyên', '', 292, 1, ''),
('301', 'Huyện Xín Mần', '', 292, 1, ''),
('302', 'Huyện Yên Minh', '', 292, 1, ''),
('303', 'Thành phố Hà Giang', '', 292, 1, ''),
('304', 'Hà Nam', '', 0, 1, ''),
('305', 'Huyện Bình Lục', '', 304, 1, ''),
('306', 'Huyện Duy Tiên', '', 304, 1, ''),
('307', 'Huyện Kim Bảng', '', 304, 1, ''),
('308', 'Huyện Lý Nhân', '', 304, 1, ''),
('309', 'Huyện Thanh Liêm', '', 304, 1, ''),
('31', 'Ứng Hòa', '', 1, 1, ''),
('310', 'Thành phố Phủ Lý', '', 304, 1, ''),
('311', 'Hà Tĩnh', '', 0, 1, ''),
('312', 'Huyện Cẩm Xuyên', '', 311, 1, ''),
('313', 'Huyện Can Lộc', '', 311, 1, ''),
('314', 'Huyện Đức Thọ', '', 311, 1, ''),
('315', 'Huyện Hương Khê', '', 311, 1, ''),
('316', 'Huyện Hương Sơn', '', 311, 1, ''),
('317', 'Huyện Kỳ Anh', '', 311, 1, ''),
('318', 'Huyện Lộc Hà', '', 311, 1, ''),
('319', 'Huyện Nghi Xuân', '', 311, 1, ''),
('32', 'Hồ Chí Minh', '', 0, 1, ''),
('320', 'Huyện Thạch Hà', '', 311, 1, ''),
('321', 'Huyện Vũ Quang', '', 311, 1, ''),
('322', 'Thành phố Hà Tĩnh', '', 311, 1, ''),
('323', 'Thị xã Hồng Lĩnh', '', 311, 1, ''),
('324', 'Thị xã Kỳ Anh', '', 311, 1, ''),
('325', 'Hải Dương', '', 0, 1, ''),
('326', 'Huyện Bình Giang', '', 325, 1, ''),
('327', 'Huyện Cẩm Giàng', '', 325, 1, ''),
('328', 'Huyện Gia Lộc', '', 325, 1, ''),
('329', 'Huyện Kim Thành', '', 325, 1, ''),
('33', 'Bình Tân', '', 32, 1, ''),
('330', 'Huyện Kinh Môn', '', 325, 1, ''),
('331', 'Huyện Nam Sách', '', 325, 1, ''),
('332', 'Huyện Ninh Giang', '', 325, 1, ''),
('333', 'Huyện Thanh Hà', '', 325, 1, ''),
('334', 'Huyện Thanh Miện', '', 325, 1, ''),
('335', 'Huyện Tứ Kỳ', '', 325, 1, ''),
('336', 'Thành phố Hải Dương', '', 325, 1, ''),
('337', 'Thị xã Chí Linh', '', 325, 1, ''),
('338', 'Hải Phòng', '', 0, 1, ''),
('339', 'Huyện An Dương', '', 338, 1, ''),
('34', 'Bình Thạnh', '', 32, 1, ''),
('340', 'Huyện An Lão', '', 338, 1, ''),
('341', 'Huyện Kiến Thụy', '', 338, 1, ''),
('342', 'Huyện Thuỷ Nguyên', '', 338, 1, ''),
('343', 'Huyện Tiên Lãng', '', 338, 1, ''),
('344', 'Huyện Vĩnh Bảo', '', 338, 1, ''),
('345', 'Huyện đảo Bạch Long Vĩ', '', 338, 1, ''),
('346', 'Huyện đảo Cát Hải', '', 338, 1, ''),
('347', 'Quận Đồ Sơn', '', 338, 1, ''),
('348', 'Quận Dương Kinh', '', 338, 1, ''),
('349', 'Quận Hải An', '', 338, 1, ''),
('35', 'Củ Chi', '', 32, 1, ''),
('350', 'Quận Hồng Bàng', '', 338, 1, ''),
('351', 'Quận Kiến An', '', 338, 1, ''),
('352', 'Quận Lê Chân', '', 338, 1, ''),
('353', 'Quận Ngô Quyền', '', 338, 1, ''),
('354', 'Hậu Giang', '', 0, 1, ''),
('355', 'Huyện Châu Thành', '', 354, 1, ''),
('356', 'Huyện Châu Thành A', '', 354, 1, ''),
('357', 'Huyện Long Mỹ', '', 354, 1, ''),
('358', 'Huyện Phụng Hiệp', '', 354, 1, ''),
('359', 'Huyện Vị Thủy', '', 354, 1, ''),
('36', 'Gò Vấp', '', 32, 1, ''),
('360', 'Thành phố Vị Thanh', '', 354, 1, ''),
('361', 'Thị xã Long Mỹ', '', 354, 1, ''),
('362', 'Thị xã Ngã Bảy', '', 354, 1, ''),
('363', 'HòaBình', '', 0, 1, ''),
('364', 'Huyện Cao Phong', '', 363, 1, ''),
('365', 'Huyện Đà Bắc', '', 363, 1, ''),
('366', 'Huyện Kim Bôi', '', 363, 1, ''),
('367', 'Huyện Kỳ Sơn', '', 363, 1, ''),
('368', 'Huyện Lạc Sơn', '', 363, 1, ''),
('369', 'Huyện Lạc Thủy', '', 363, 1, ''),
('37', 'Hóc Môn', '', 32, 1, ''),
('370', 'Huyện Lương Sơn', '', 363, 1, ''),
('371', 'Huyện Mai Châu', '', 363, 1, ''),
('372', 'Huyện Tân Lạc', '', 363, 1, ''),
('373', 'Huyện Yên Thủy', '', 363, 1, ''),
('374', 'Thành phố Hoà Bình', '', 363, 1, ''),
('375', 'Hưng Yên', '', 0, 1, ''),
('376', 'Huyện Ân Thi', '', 375, 1, ''),
('377', 'Huyện Khoái Châu', '', 375, 1, ''),
('378', 'Huyện Kim Động', '', 375, 1, ''),
('379', 'Huyện Mỹ Hào', '', 375, 1, ''),
('38', 'Huyện Bình Chánh', '', 32, 1, ''),
('380', 'Huyện Phù Cừ', '', 375, 1, ''),
('381', 'Huyện Tiên Lữ', '', 375, 1, ''),
('382', 'Huyện Văn Giang', '', 375, 1, ''),
('383', 'Huyện Văn Lâm', '', 375, 1, ''),
('384', 'Huyện Yên Mỹ', '', 375, 1, ''),
('385', 'Thành phố Hưng Yên', '', 375, 1, ''),
('386', 'Khách Hòa', '', 0, 1, ''),
('387', 'Huyện Cam Lâm', '', 386, 1, ''),
('388', 'Huyện Diên Khánh', '', 386, 1, ''),
('389', 'Huyện Khánh Sơn', '', 386, 1, ''),
('39', 'Huyện Cần Giờ', '', 32, 1, ''),
('390', 'Huyện Khánh Vĩnh', '', 386, 1, ''),
('391', 'Huyện Vạn Ninh', '', 386, 1, ''),
('392', 'Huyện đảo Trường Sa', '', 386, 1, ''),
('393', 'Thành phố Cam Ranh', '', 386, 1, ''),
('394', 'Thành phố Nha Trang', '', 386, 1, ''),
('395', 'Thị xã Ninh Hòa', '', 386, 1, ''),
('396', 'Kiên Giang', '', 0, 1, ''),
('397', 'Huyện An Biên', '', 396, 1, ''),
('398', 'Huyện An Minh', '', 396, 1, ''),
('399', 'Huyện Châu Thành', '', 396, 1, ''),
('4', 'Bắc Từ Liêm', '', 1, 1, ''),
('40', 'Huyện Nhà Bè', '', 32, 1, ''),
('400', 'Huyện Giang Thành', '', 396, 1, ''),
('401', 'Huyện Giồng Riềng', '', 396, 1, ''),
('402', 'Huyện Gò Quao', '', 396, 1, ''),
('403', 'Huyện Hòn Đất', '', 396, 1, ''),
('404', 'Huyện Kiên Lương', '', 396, 1, ''),
('405', 'Huyện Tân Hiệp', '', 396, 1, ''),
('406', 'Huyện U Minh Thượng', '', 396, 1, ''),
('407', 'Huyện Vĩnh Thuận', '', 396, 1, ''),
('408', 'Huyện đảo Kiên Hải', '', 396, 1, ''),
('409', 'Huyện đảo Phú Quốc', '', 396, 1, ''),
('41', 'Phú Nhuận', '', 32, 1, ''),
('410', 'Thành phố Rạch Giá', '', 396, 1, ''),
('411', 'Thị xã Hà Tiên', '', 396, 1, ''),
('412', 'Kom Tum', '', 0, 1, ''),
('413', 'Huyện Đắk Glei', '', 412, 1, ''),
('414', 'Huyện Đắk Hà', '', 412, 1, ''),
('415', 'Huyện Đăk Tô', '', 412, 1, ''),
('417', 'Huyện Kon Plông', '', 412, 1, ''),
('418', 'Huyện Kon Rẫy', '', 412, 1, ''),
('419', 'Huyện Ngọc Hồi', '', 412, 1, ''),
('42', 'Quận 1', '', 32, 1, ''),
('420', 'Huyện Sa Thầy', '', 412, 1, ''),
('421', 'Huyện Tu Mơ Rông', '', 412, 1, ''),
('422', 'Thành phố Kon Tum', '', 412, 1, ''),
('423', 'Lai Châu', '', 0, 1, ''),
('424', 'Huyện Mường Tè', '', 423, 1, ''),
('425', 'Huyện Nậm Nhùn', '', 423, 1, ''),
('426', 'Huyện Phong Thổ', '', 423, 1, ''),
('427', 'Huyện Sìn Hồ', '', 423, 1, ''),
('428', 'Huyện Tam Đường', '', 423, 1, ''),
('429', 'Huyện Tân Uyên', '', 423, 1, ''),
('43', 'Quận 10', '', 32, 1, ''),
('430', 'Huyện Than Uyên', '', 423, 1, ''),
('431', 'Thị xã Lai Châu', '', 423, 1, ''),
('432', 'Lâm Đồng', '', 0, 1, ''),
('433', 'Huyện Bảo Lâm', '', 432, 1, ''),
('434', 'Huyện Cát Tiên', '', 432, 1, ''),
('435', 'Huyện Đạ Huoai', '', 432, 1, ''),
('436', 'Huyện Đạ Tẻh', '', 432, 1, ''),
('437', 'Huyện Đam Rông', '', 432, 1, ''),
('438', 'Huyện Di Linh', '', 432, 1, ''),
('439', 'Huyện Đức Trọng', '', 432, 1, ''),
('44', 'Quận 11', '', 32, 1, ''),
('440', 'Huyện Lạc Dương', '', 432, 1, ''),
('441', 'Huyện Lâm Hà', '', 432, 1, ''),
('442', 'Thành phố Bảo Lộc', '', 432, 1, ''),
('443', 'Thành phố Đà Lạt', '', 432, 1, ''),
('444', 'Huyện Đơn Dương', '', 432, 1, ''),
('445', 'Lạng Sơn', '', 0, 1, ''),
('446', 'Huyện Bắc Sơn', '', 445, 1, ''),
('447', 'Huyện Bình Gia', '', 445, 1, ''),
('448', 'Huyện Cao Lộc', '', 445, 1, ''),
('449', 'Huyện Chi Lăng', '', 445, 1, ''),
('45', 'Quận 12', '', 32, 1, ''),
('450', 'Huyện Đình Lập', '', 445, 1, ''),
('451', 'Huyện Hữu Lũng', '', 445, 1, ''),
('452', 'Huyện Lộc Bình', '', 445, 1, ''),
('453', 'Huyện Văn Lãng', '', 445, 1, ''),
('454', 'Huyện Văn Quan', '', 445, 1, ''),
('455', 'Thành phố Lạng Sơn', '', 445, 1, ''),
('456', 'Huyện Tràng Định', '', 445, 1, ''),
('457', 'Lào Cai', '', 0, 1, ''),
('458', 'Huyện Bắc Hà', '', 457, 1, ''),
('459', 'Huyện Bảo Thắng', '', 457, 1, ''),
('46', 'Quận 2', '', 32, 1, ''),
('460', 'Huyện Bảo Yên', '', 457, 1, ''),
('461', 'Huyện Bát Xát', '', 457, 1, ''),
('462', 'Huyện Mường Khương', '', 457, 1, ''),
('463', 'Huyện Sa Pa', '', 457, 1, ''),
('464', 'Huyện Si Ma Cai', '', 457, 1, ''),
('465', 'Huyện Văn Bàn', '', 457, 1, ''),
('466', 'Thành phố Lào Cai', '', 457, 1, ''),
('467', 'Long An', '', 0, 1, ''),
('468', 'Huyện Bến Lức', '', 467, 1, ''),
('469', 'Huyện Cần Đước', '', 467, 1, ''),
('47', 'Quận 3', '', 32, 1, ''),
('470', 'Huyện Cần Giuộc', '', 467, 1, ''),
('471', 'Huyện Châu Thành', '', 467, 1, ''),
('472', 'Huyện Đức Hòa', '', 467, 1, ''),
('473', 'Huyện Đức Huệ', '', 467, 1, ''),
('474', 'Huyện Mộc Hóa', '', 467, 1, ''),
('475', 'Huyện Tân Hưng', '', 467, 1, ''),
('476', 'Huyện Tân Thạnh', '', 467, 1, ''),
('477', 'Huyện Tân Trụ', '', 467, 1, ''),
('478', 'Huyện Thạnh Hóa', '', 467, 1, ''),
('479', 'Huyện Thủ Thừa', '', 467, 1, ''),
('48', 'Quận 4', '', 32, 1, ''),
('480', 'Huyện Vĩnh Hưng', '', 467, 1, ''),
('481', 'Thành phố Tân An', '', 467, 1, ''),
('482', 'Thị xã Kiến Tường', '', 467, 1, ''),
('483', 'Nam Định', '', 0, 1, ''),
('484', 'Huyện Giao Thủy', '', 483, 1, ''),
('485', 'Huyện Hải Hậu', '', 483, 1, ''),
('486', 'Huyện Mỹ Lộc', '', 483, 1, ''),
('487', 'Huyện Nam Trực', '', 483, 1, ''),
('488', 'Huyện Nghĩa Hưng', '', 483, 1, ''),
('489', 'Huyện Trực Ninh', '', 483, 1, ''),
('49', 'Quận 5', '', 32, 1, ''),
('490', 'Huyện Vụ Bản', '', 483, 1, ''),
('491', 'Huyện Xuân Trường', '', 483, 1, ''),
('492', 'Huyện Ý Yên', '', 483, 1, ''),
('493', 'Thành phố Nam Định', '', 483, 1, ''),
('494', 'Nghệ An', '', 0, 1, ''),
('495', 'Huyện Anh Sơn', '', 494, 1, '{\"en\":\"Province Anh Son\"}'),
('496', 'Huyện Con Cuông', '', 494, 1, ''),
('497', 'Huyện Diễn Châu', '', 494, 1, ''),
('498', 'Huyện Đô Lương', '', 494, 1, ''),
('499', 'Huyện Hưng Nguyên', '', 494, 1, ''),
('5', 'Cầu Giấy', '', 1, 1, ''),
('50', 'Quận 6', '', 32, 1, ''),
('500', 'Huyện Kỳ Sơn', '', 494, 1, ''),
('501', 'Huyện Nam Đàn', '', 494, 1, ''),
('502', 'Huyện Nghi Lộc', '', 494, 1, ''),
('503', 'Huyện Nghĩa Đàn', '', 494, 1, ''),
('504', 'Huyện Quế Phong', '', 494, 1, ''),
('505', 'Huyện Quỳ Châu', '', 494, 1, ''),
('506', 'Huyện Quỳ Hợp', '', 494, 1, ''),
('507', 'Huyện Quỳnh Lưu', '', 494, 1, ''),
('508', 'Huyện Tân Kỳ', '', 494, 1, ''),
('509', 'Huyện Thanh Chương', '', 494, 1, ''),
('51', 'Quận 7', '', 32, 1, ''),
('510', 'Huyện Tương Dương', '', 494, 1, ''),
('511', 'Huyện Yên Thành', '', 494, 1, ''),
('512', 'Thành phố Vinh', '', 494, 1, ''),
('513', 'Thị xã Cửa Lò', '', 494, 1, ''),
('514', 'Thị xã Hoàng Mai', '', 494, 1, ''),
('515', 'Thị xã Thái Hòa', '', 494, 1, ''),
('516', 'Ninh Bình', '', 0, 1, ''),
('517', 'Huyện Gia Viễn', '', 516, 1, ''),
('518', 'Huyện Hoa Lư', '', 516, 1, ''),
('519', 'Huyện Kim Sơn', '', 516, 1, ''),
('52', 'Quận 8', '', 32, 1, ''),
('520', 'Huyện Nho Quan', '', 516, 1, ''),
('521', 'Huyện Yên Khánh', '', 516, 1, ''),
('522', 'Huyện Yên Mô', '', 516, 1, ''),
('523', 'Thành phố Ninh Bình', '', 516, 1, ''),
('524', 'Thị xã Tam Điệp', '', 516, 1, ''),
('525', 'Ninh Thuận', '', 0, 1, ''),
('526', 'Huyện Bác Ái', '', 525, 1, ''),
('527', 'Huyện Ninh Hải', '', 525, 1, ''),
('528', 'Huyện Ninh Phước', '', 525, 1, ''),
('529', 'Huyện Ninh Sơn', '', 525, 1, ''),
('53', 'Quận 9', '', 32, 1, ''),
('530', 'Huyện Thuận Bắc', '', 525, 1, ''),
('531', 'Huyện Thuận Nam', '', 525, 1, ''),
('532', 'Thành phố Phan Rang-Tháp Chàm', '', 525, 1, ''),
('533', 'Phú Thọ', '', 0, 1, ''),
('534', 'Huyện Cẩm Khê', '', 533, 1, ''),
('535', 'Huyện Đoan Hùng', '', 533, 1, ''),
('536', 'Huyện Hạ Hòa', '', 533, 1, ''),
('537', 'Huyện Lâm Thao', '', 533, 1, ''),
('538', 'Huyện Phù Ninh', '', 533, 1, ''),
('539', 'Huyện Tam Nông', '', 533, 1, ''),
('54', 'Tân Bình', '', 32, 1, ''),
('540', 'Huyện Tân Sơn', '', 533, 1, ''),
('541', 'Huyện Thanh Ba', '', 533, 1, ''),
('542', 'Huyện Thanh Sơn', '', 533, 1, ''),
('543', 'Huyện Thanh Thủy', '', 533, 1, ''),
('544', 'Huyện Yên Lập', '', 533, 1, ''),
('545', 'Thành phố Việt Trì', '', 533, 1, ''),
('546', 'Thị xã Phú Thọ', '', 533, 1, ''),
('547', 'Phú Yên', '', 0, 1, ''),
('548', 'Huyện Đông Hòa', '', 547, 1, ''),
('549', 'Huyện Đồng Xuân', '', 547, 1, ''),
('55', 'Tân Phú', '', 32, 1, ''),
('550', 'Huyện Phú Hòa', '', 547, 1, ''),
('551', 'Huyện Sơn Hòa', '', 547, 1, ''),
('552', 'Huyện Sông Hin', '', 547, 1, ''),
('553', 'Huyện Tây Hòa', '', 547, 1, ''),
('554', 'Huyện Tuy An', '', 547, 1, ''),
('555', 'Thành phố Tuy Hòa', '', 547, 1, ''),
('556', 'Thị xã Sông Cầu', '', 547, 1, ''),
('557', 'Quảng Bình', '', 0, 1, ''),
('558', 'Huyện Bố Trạch', '', 557, 1, ''),
('559', 'Huyện Lệ Thủy', '', 557, 1, ''),
('56', 'Thủ Đức', '', 32, 1, ''),
('560', 'Huyện Minh Hóa', '', 557, 1, ''),
('561', 'Huyện Quảng Ninh', '', 557, 1, ''),
('562', 'Huyện Quảng Trạch', '', 557, 1, ''),
('563', 'Huyện Tuyên Hóa', '', 557, 1, ''),
('564', 'Thành phố Đồng Hới', '', 557, 1, ''),
('565', 'Thị xã Ba Đồn', '', 557, 1, ''),
('566', 'Quảng Nam', '', 0, 1, ''),
('567', 'Huyện Bắc Trà My', '', 566, 1, ''),
('568', 'Huyện Đại Lộc', '', 566, 1, ''),
('569', 'Huyện Điện Bàn', '', 566, 1, ''),
('57', 'Đà Nẵng', '', 0, 1, ''),
('570', 'Huyện Đông Giang', '', 566, 1, ''),
('571', 'Huyện Duy Xuyên', '', 566, 1, ''),
('572', 'Huyện Hiệp Đức', '', 566, 1, ''),
('573', 'Huyện Nam Giang', '', 566, 1, ''),
('574', 'Huyện Nam Trà My', '', 566, 1, ''),
('575', 'Huyện Nông Sơn', '', 566, 1, ''),
('576', 'Huyện Núi Thành', '', 566, 1, ''),
('577', 'Huyện Phú Ninh', '', 566, 1, ''),
('578', 'Huyện Phước Sơn', '', 566, 1, ''),
('579', 'Huyện Quế Sơn', '', 566, 1, ''),
('58', 'Huyện Hòa Vang', '', 57, 1, ''),
('580', 'Huyện Tây Giang', '', 566, 1, ''),
('581', 'Huyện Thăng Bình', '', 566, 1, ''),
('582', 'Huyện Tiên Phước', '', 566, 1, ''),
('583', 'Thành phố Hội An', '', 566, 1, ''),
('584', 'Thành phố Tam Kỳ', '', 566, 1, ''),
('585', 'Quảng Nam', '', 0, 1, ''),
('586', 'Huyện Bắc Trà My', '', 585, 1, ''),
('587', 'Huyện Đại Lộc', '', 585, 1, ''),
('588', 'Huyện Điện Bàn', '', 585, 1, ''),
('589', 'Huyện Đông Giang', '', 585, 1, ''),
('59', 'Huyện đảo Hoàng Sa', '', 57, 1, ''),
('590', 'Huyện Duy Xuyên', '', 585, 1, ''),
('591', 'Huyện Hiệp Đức', '', 585, 1, ''),
('592', 'Huyện Nam Giang', '', 585, 1, ''),
('593', 'Huyện Nam Trà My', '', 585, 1, ''),
('594', 'Huyện Nông Sơn', '', 585, 1, ''),
('595', 'Huyện Núi Thành', '', 585, 1, ''),
('596', 'Huyện Phú Ninh', '', 585, 1, ''),
('597', 'Huyện Phước Sơn', '', 585, 1, ''),
('598', 'Huyện Quế Sơn', '', 585, 1, ''),
('599', 'Huyện Tây Giang', '', 585, 1, ''),
('6', 'Chương Mỹ', '', 1, 1, ''),
('60', 'Quận Cẩm Lệ', '', 57, 1, ''),
('600', 'Huyện Thăng Bình', '', 585, 1, ''),
('601', 'Huyện Tiên Phước', '', 585, 1, ''),
('602', 'Thành phố Hội An', '', 585, 1, ''),
('603', 'Thành phố Tam Kỳ', '', 585, 1, ''),
('604', 'Quảng Ninh', '', 0, 1, ''),
('605', 'Huyện Ba Chẽ', '', 604, 1, ''),
('606', 'Huyện Bình Liêu', '', 604, 1, ''),
('607', 'Huyện Đầm Hà', '', 604, 1, ''),
('608', 'Huyện Đông Triều', '', 604, 1, ''),
('609', 'Huyện Hải Hà', '', 604, 1, ''),
('61', 'Quận Hải Châu', '', 57, 1, ''),
('610', 'Huyện Hoành Bồ', '', 604, 1, ''),
('611', 'Huyện Tiên Yên', '', 604, 1, ''),
('612', 'Huyện Tư Nghĩa', '', 604, 1, ''),
('613', 'Huyện Vân Đồn', '', 604, 1, ''),
('614', 'Huyện Yên Hưng', '', 604, 1, ''),
('615', 'Huyện đảo Cô Tô', '', 604, 1, ''),
('616', 'Thành phố Cẩm Phả', '', 604, 1, ''),
('617', 'Thành phố Hạ Long', '', 604, 1, ''),
('618', 'Thành phố Móng Cái', '', 604, 1, ''),
('619', 'Thành phố Uông Bí', '', 604, 1, ''),
('62', 'Quận Liên Chiểu', '', 57, 1, ''),
('620', 'Thị Xã Quảng Yên', '', 604, 1, ''),
('621', 'Quảng Trị', '', 0, 1, ''),
('622', 'Huyện Cam Lộ', '', 621, 1, ''),
('623', 'Huyện Đa Krông', '', 621, 1, ''),
('624', 'Huyện Gio Linh', '', 621, 1, ''),
('625', 'Huyện Hải Lăng', '', 621, 1, ''),
('626', 'Huyện Hướng Hóa', '', 621, 1, ''),
('627', 'Huyện Triệu Phong', '', 621, 1, ''),
('628', 'Huyện Vĩnh Linh', '', 621, 1, ''),
('629', 'Huyện đảo Cồn Cỏ', '', 621, 1, ''),
('63', 'Quận Ngũ Hành Sơn', '', 57, 1, ''),
('630', 'Thành phố Đông Hà', '', 621, 1, ''),
('631', 'Thị xã Quảng Trị', '', 621, 1, ''),
('632', 'Sóc Trăng', '', 0, 1, ''),
('633', 'Huyện Châu Thành', '', 632, 1, ''),
('634', 'Huyện Cù Lao Dung', '', 632, 1, ''),
('635', 'Huyện Kế Sách', '', 632, 1, ''),
('636', 'uyện Long Phú', '', 632, 1, ''),
('637', 'Huyện Mỹ Tú', '', 632, 1, ''),
('638', 'Huyện Mỹ Xuyên', '', 632, 1, ''),
('639', 'Huyện Ngã Năm', '', 632, 1, ''),
('64', 'Quận Sơn Trà', '', 57, 1, ''),
('640', 'Huyện Thạnh Trị', '', 632, 1, ''),
('641', 'Huyện Trần Đề', '', 632, 1, ''),
('642', 'Huyện Vĩnh Châu', '', 632, 1, ''),
('643', 'Thành phố Sóc Trăng', '', 632, 1, ''),
('644', 'Sơn La', '', 0, 1, ''),
('645', 'Huyện Bắc Yên', '', 644, 1, ''),
('646', 'Huyện Mai Sơn', '', 644, 1, ''),
('647', 'Huyện Mộc Châu', '', 644, 1, ''),
('648', 'Huyện Mường La', '', 644, 1, ''),
('649', 'Huyện Phù Yên', '', 644, 1, ''),
('65', 'Quận Thanh Khê', '', 57, 1, ''),
('650', 'Huyện Quỳnh Nhai', '', 644, 1, ''),
('651', 'Huyện Sông Mã', '', 644, 1, ''),
('652', 'Huyện Sốp Cộp', '', 644, 1, ''),
('653', 'Huyện Thuận Châu', '', 644, 1, ''),
('654', 'Huyện Vân Hồ', '', 644, 1, ''),
('655', 'Huyện Yên Châu', '', 644, 1, ''),
('656', 'Thành phố Sơn La', '', 644, 1, ''),
('657', 'Tây Ninh', '', 0, 1, ''),
('658', 'Huyện Bến Cầu', '', 657, 1, ''),
('659', 'Huyện Châu Thành', '', 657, 1, ''),
('66', 'An Gian', '', 0, 1, ''),
('660', 'Huyện Dương Minh Châu', '', 657, 1, ''),
('661', 'Huyện Gò Dầu', '', 657, 1, ''),
('662', 'Huyện Hòa Thành', '', 657, 1, ''),
('663', 'Huyện Tân Biên', '', 657, 1, ''),
('664', 'Huyện Tân Châu', '', 657, 1, ''),
('665', 'Huyện Trảng Bàng', '', 657, 1, ''),
('666', 'Thị xã Tây Ninh', '', 657, 1, ''),
('667', 'Thái Bình', '', 0, 1, ''),
('668', 'Huyện Đông Hưng', '', 667, 1, ''),
('669', 'Huyện Hưng Hà', '', 667, 1, ''),
('67', 'Huyện An Phú', '', 66, 1, ''),
('670', 'Huyện Kiến Xương', '', 667, 1, ''),
('671', 'Huyện Quỳnh Phụ', '', 667, 1, ''),
('672', 'Huyện Thái Thụy', '', 667, 1, ''),
('673', 'Huyện Tiền Hải', '', 667, 1, ''),
('674', 'Huyện Vũ Thư', '', 667, 1, ''),
('675', 'Thành phố Thái Bình', '', 667, 1, ''),
('676', 'Thái Nguyên', '', 0, 1, ''),
('677', 'Huyện Đại Từ', '', 676, 1, ''),
('678', 'Huyện Định Hóa', '', 676, 1, ''),
('679', 'Huyện Đồng Hỷ', '', 676, 1, ''),
('68', 'Huyện Châu Phú', '', 66, 1, ''),
('680', 'Huyện Phổ Yên', '', 676, 1, ''),
('681', 'Huyện Phú Bình', '', 676, 1, ''),
('682', 'Huyện Phú Lương', '', 676, 1, ''),
('683', 'Huyện Võ Nhai', '', 676, 1, ''),
('684', 'Thành phố Thái Nguyên', '', 676, 1, ''),
('685', 'Thị xã Sông Công', '', 676, 1, ''),
('686', 'Thanh Hóa', '', 0, 1, ''),
('687', 'Huyện Bá Thước', '', 686, 1, ''),
('688', 'Huyện Cẩm Thủy', '', 686, 1, ''),
('689', 'Huyện Đông Sơn', '', 686, 1, ''),
('69', 'Huyện Châu Thành', '', 66, 1, ''),
('690', 'Huyện Hà Trung', '', 686, 1, ''),
('691', 'Huyện Hậu Lộc', '', 686, 1, ''),
('692', 'Huyện Hoằng Hóa', '', 686, 1, ''),
('693', 'Huyện Lang Chánh', '', 686, 1, ''),
('694', 'Huyện Mường Lát', '', 686, 1, ''),
('695', 'Huyện Nga Sơn', '', 686, 1, ''),
('696', 'Huyện Ngọc Lặc', '', 686, 1, ''),
('697', 'Huyện Như Thanh', '', 686, 1, ''),
('698', 'Huyện Như Xuân', '', 686, 1, ''),
('699', 'Huyện Nông Cống', '', 686, 1, ''),
('7', 'Đan Phượng', '', 1, 1, ''),
('70', 'Huyện Chợ Mới', '', 66, 1, ''),
('700', 'Huyện Quan Hóa', '', 686, 1, ''),
('701', 'Huyện Quan Sơn', '', 686, 1, ''),
('702', 'Huyện Quảng Xương', '', 686, 1, ''),
('703', 'Huyện Thạch Thành', '', 686, 1, ''),
('704', 'Huyện Thiệu Hóa', '', 686, 1, ''),
('705', 'Huyện Thọ Xuân', '', 686, 1, ''),
('706', 'Huyện Thường Xuân', '', 686, 1, ''),
('707', 'Huyện Tĩnh Gia', '', 686, 1, ''),
('708', 'Huyện Triệu Sơn', '', 686, 1, ''),
('709', 'Huyện Vĩnh Lộc', '', 686, 1, ''),
('71', 'Huyện Thoại Sơn', '', 66, 1, ''),
('710', 'Huyện Yên Định', '', 686, 1, ''),
('711', 'Thành phố Thanh Hóa', '', 686, 1, ''),
('712', 'Thị xã Bỉm Sơn', '', 686, 1, ''),
('713', 'Thị xã Sầm Sơn', '', 686, 1, ''),
('714', 'Thừa Thiên Huế', '', 0, 1, ''),
('715', 'Huyện A Lưới', '', 714, 1, ''),
('716', 'Huyện Nam Đông', '', 714, 1, ''),
('717', 'Huyện Phong Điền', '', 714, 1, ''),
('718', 'Huyện Phú Lộc', '', 714, 1, ''),
('719', 'Huyện Phú Vang', '', 714, 1, ''),
('72', 'Huyện Tịnh Biên', '', 66, 1, ''),
('720', 'Huyện Quảng Điền', '', 714, 1, ''),
('721', 'Thành phố Huế', '', 714, 1, ''),
('722', 'Thị xã Hương Thủy', '', 714, 1, ''),
('723', 'Thị xã Hương Trà', '', 714, 1, ''),
('724', 'Tiền Giang', '', 0, 1, ''),
('725', 'Huyện Cái Bè', '', 724, 1, ''),
('726', 'Huyện Cai Lậy', '', 724, 1, ''),
('727', 'Huyện Châu Thành', '', 724, 1, ''),
('728', 'Huyện Chợ Gạo', '', 724, 1, ''),
('729', 'Huyện Gò Công Đông', '', 724, 1, ''),
('73', 'Huyện Tri Tôn', '', 66, 1, ''),
('730', 'Huyện Gò Công Tây', '', 724, 1, ''),
('731', 'Huyện Tân Phú Đông', '', 724, 1, ''),
('732', 'Huyện Tân Phước', '', 724, 1, ''),
('733', 'Thành phố Mỹ Tho', '', 724, 1, ''),
('734', 'Thị xã Cai Lậy', '', 724, 1, ''),
('735', 'Thị xã Gò Công', '', 724, 1, ''),
('736', 'Trà Vinh', '', 0, 1, ''),
('737', 'Huyện Càng Long', '', 736, 1, ''),
('738', 'Huyện Cầu Kè', '', 736, 1, ''),
('739', 'Huyện Cầu Ngang', '', 736, 1, ''),
('74', 'Phú Tân', '', 66, 1, ''),
('740', 'Huyện Châu Thành', '', 736, 1, ''),
('741', 'Huyện Duyên Hải', '', 736, 1, ''),
('742', 'Huyện Tiểu Cần', '', 736, 1, ''),
('743', 'Huyện Trà Cú', '', 736, 1, ''),
('744', 'Thành phố Trà Vinh', '', 736, 1, ''),
('745', 'Thị xã Duyên Hải', '', 736, 1, ''),
('746', 'Tuyên Quang', '', 0, 1, ''),
('747', 'Huyện Chiêm Hóa', '', 746, 1, ''),
('748', 'Huyện Hàm Yên', '', 746, 1, ''),
('749', 'Huyện Lâm Bình', '', 746, 1, ''),
('75', 'Thành Phố Châu Đốc', '', 66, 1, ''),
('750', 'Huyện Na Hang', '', 746, 1, ''),
('751', 'Huyện Sơn Dương', '', 746, 1, ''),
('752', 'Huyện Yên Sơn', '', 746, 1, ''),
('753', 'Thành phố Tuyên Quang', '', 746, 1, ''),
('754', 'Vĩnh Long', '', 0, 1, ''),
('755', 'Huyện Bình Minh', '', 754, 1, ''),
('756', 'Huyện Bình Tân', '', 754, 1, ''),
('757', 'Huyện Long Hồ', '', 754, 1, ''),
('758', 'Huyện Mang Thít', '', 754, 1, ''),
('759', 'Huyện Tam Bình', '', 754, 1, ''),
('76', 'Thành phố Long Xuyên', '', 66, 1, ''),
('760', 'Huyện Trà Ôn', '', 754, 1, ''),
('761', 'Huyện Vũng Liêm', '', 754, 1, ''),
('762', 'Thành phố Vĩnh Long', '', 754, 1, ''),
('763', 'Vĩnh Phúc', '', 0, 1, ''),
('764', 'Huyện Bình Xuyên', '', 763, 1, ''),
('765', 'Huyện Lập Thạch', '', 763, 1, ''),
('766', 'Huyện Sông Lô', '', 763, 1, ''),
('767', 'Huyện Tam Đảo', '', 763, 1, ''),
('768', 'Huyện Tam Dương', '', 763, 1, ''),
('769', 'Huyện Vĩnh Tường', '', 763, 1, ''),
('77', 'Thị xã Tân Châu', '', 66, 1, ''),
('770', 'Huyện Yên Lạc', '', 763, 1, ''),
('771', 'Thành phố Vĩnh Yên', '', 763, 1, ''),
('772', 'Thị xã Phúc Yên', '', 763, 1, ''),
('773', 'Yên Bái', '', 0, 1, ''),
('774', 'Huyện Lục Yên', '', 773, 1, ''),
('775', 'Huyện Mù Căng Chải', '', 773, 1, ''),
('776', 'Huyện Trạm Tấu', '', 773, 1, ''),
('777', 'Huyện Trấn Yên', '', 773, 1, ''),
('778', 'Huyện Văn Chấn', '', 773, 1, ''),
('779', 'Huyện Văn Yên', '', 773, 1, ''),
('78', 'Bà Rịa - Vũng Tàu', '', 0, 1, ''),
('780', 'Huyện Yên Bình', '', 773, 1, ''),
('781', 'Thành phố Yên Bái', '', 773, 1, ''),
('782', 'Thị xã Nghĩa Lộ', '', 773, 1, ''),
('79', 'Huyện Châu Đức', '', 78, 1, ''),
('8', 'Đông Anh', '', 1, 1, ''),
('80', 'Huyện Côn Đảo', '', 78, 1, ''),
('81', 'Huyện Đất Đỏ', '', 78, 1, ''),
('82', 'Huyện Long Điền', '', 78, 1, ''),
('83', 'Huyện Tân Thành', '', 78, 1, ''),
('84', 'Huyện Xuyên Mộc', '', 78, 1, ''),
('85', 'Thành phố Vũng Tàu', '', 78, 1, ''),
('86', 'Thị xã Bà Rịa', '', 78, 1, ''),
('87', 'Bắc Cạn', '', 0, 1, ''),
('88', 'Huyện Ba Bể', '', 87, 1, ''),
('89', 'Huyện Bạch Thông', '', 87, 1, ''),
('9', 'Đống Đa', '', 1, 1, ''),
('90', 'Huyện Chợ Đồn', '', 87, 1, ''),
('91', 'Huyện Chợ Mới', '', 87, 1, ''),
('92', 'Huyện Na Rì', '', 87, 1, ''),
('93', 'Huyện Ngân Sơn', '', 87, 1, ''),
('94', 'Huyện Pác Nặm', '', 87, 1, ''),
('95', 'Thị xã Bắc Kạn', '', 87, 1, ''),
('96', 'Bắc Giang', '', 0, 1, ''),
('97', 'Huyện Hiệp Hòa', '', 96, 1, ''),
('98', 'Huyện Lạng Giang', '', 96, 1, ''),
('99', 'Huyện Lục Nam', '', 96, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_users`
--

DROP TABLE IF EXISTS `nn_users`;
CREATE TABLE IF NOT EXISTS `nn_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fullname` text NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Address` text,
  `Province` varchar(10) DEFAULT NULL,
  `District` varchar(10) DEFAULT NULL,
  `Ward` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Phone` (`Phone`),
  UNIQUE KEY `Email_2` (`Email`,`Phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nn_users`
--

INSERT INTO `nn_users` (`Id`, `Fullname`, `Username`, `Email`, `Phone`, `Password`, `Address`, `Province`, `District`, `Ward`) VALUES
(1, 'Nguyen Văn Tèo', 'teonv', 'teonguyen@gmail.com', '036669741', '123456', 'hcm', '79', '791', '79100');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nn_users_address`
--

DROP TABLE IF EXISTS `nn_users_address`;
CREATE TABLE IF NOT EXISTS `nn_users_address` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `Address` text NOT NULL,
  `Province` varchar(10) NOT NULL,
  `District` varchar(10) NOT NULL,
  `Wad` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nn_order`
--
ALTER TABLE `nn_order`
  ADD CONSTRAINT `nn_order_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `nn_users` (`Id`);

--
-- Các ràng buộc cho bảng `nn_order_detail`
--
ALTER TABLE `nn_order_detail`
  ADD CONSTRAINT `nn_order_detail_ibfk_1` FOREIGN KEY (`IdOrder`) REFERENCES `nn_order` (`Id`),
  ADD CONSTRAINT `nn_order_detail_ibfk_2` FOREIGN KEY (`IdProduct`) REFERENCES `nn_sanpham` (`Id`);

--
-- Các ràng buộc cho bảng `nn_sanpham`
--
ALTER TABLE `nn_sanpham`
  ADD CONSTRAINT `nn_sanpham_ibfk_1` FOREIGN KEY (`IdDM`) REFERENCES `nn_danhmuc` (`Id`);

--
-- Các ràng buộc cho bảng `nn_users_address`
--
ALTER TABLE `nn_users_address`
  ADD CONSTRAINT `nn_users_address_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `nn_users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
