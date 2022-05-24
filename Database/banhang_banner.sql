-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 24, 2022 lúc 11:43 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(16, 'asdasd', 1, 'asdasdas', 'dsadas', '123123123', 'zcas', 'dasdas', '&lt;p&gt;asdasdas&lt;/p&gt;&lt;p&gt;d&lt;/p&gt;&lt;p&gt;asd&lt;/p&gt;&lt;p&gt;as&lt;/p&gt;&lt;p&gt;das&lt;img src=&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeoAAABeCAIAAAEUJPAsAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAACFnSURBVHhe7Z2JW1vXmf/nb5hnWi+Js7eTZGZ+v3baOJ2kSdtJYqd1mqTpkjTPNHXjOBlnd5y02YzXODhObBabxQaziEUgBBgQ+y6QQIAQAiEBQkLsO9pA7J6vdK5v4LKDJCTlfJ73uc973/veo6OjV997dCXd+083b94Ud0ljGhM5hrgrmHMSaMre9YMFH0h7alRDmmxdYUV3Fey1oo9n5mYdj+Vk8Kg2m63VgVqtHh4e1ul08/PzpDcWi6W9vZ1krom968A2M8kxEvdk7F0fn7CRlaXMzc0z3saxTU0znmvw8q5bx23jK2C1Whlv45jMFsZzAd92HV0Ui8VMeAGu6Prf+InPR10PqqiQGQwdIyNFLS0n8vJult1nzbuXd/L282/uhK/d+5T+iRes5VJmnyVsz6gPjxmX2oR5cKFZh4aJMfssgem6l+LRXZ+d/fbYgqNBaWl5cUlpdCyPRDy665lZIiynpqbwHHC0IkEWLy8YzuyFGNnsXByzDyeApuz9/lHSgc+qvvp3/tNP3PjL/YlPKoeaH0h8yvFAzqe5uXlwcLDFgUwmQ0Sj0bS1tWm1WpVKhVlNT08PyVwde7858xZiZLPH4q0l7s39Zo5I3sM29Pvh4CDTxISwoSFRLi9ua/tJUODhFMHe4KDp0vswUYG9/cfv2fpK0KvuNz7AvIXZbTHb0G+zxcKZqMCMZvPCuQrSmOnK6BjZiwPTb2/Ec/vNzlKMJlNuQTGcallNV1c3CXrBeOMJsM+Bxcvr5GDBBzi2P5i4718Tn4Tj8O12y98HI76LTmB8d1g04usxOuJbhBlxfFq2TU5t1MZtk5yIe8xsneBEvMLIUDMjTk5off3111lZWQKBoLe3F0uyaRXm5uarqqqwC5/Pz8vLY6ILSExM5PF4cXFxzPrKQKezs7MjIyMTEhI++uij+Pj48PBwZtsSXH2ezKUsGvGNspWzi1vBF0acnINDfVVUVHR1daHExsbG6urqDAYDmUQuy5qn55KTk6VSKT76wm9sbMQbgsS3yIZOqGLuv07DBwLyaWBZw+cDfDLgGPMY64MM9aIR3yhbOSG6FZwy4j+/cpkTcfeIY/Q2ahYM+ZKgG2zUaDaZLF5nZKiZEadsCEGKEB8imRXHeVDGu3nTbDYx3grQEd8k5WIx4y3GZrPPQebn5ycnJz/+7Dj86elFx3k64u6Gjri7YUac86XPSpalXeZjjsdCviTyEEiXmOF+wHGuCsv7l5xFWWiPpLxA8j2fmZkZxvMMyIh/O9xNQ+rnsw+fkQXtFTz3fsWZmr56ka7wxYL3B6yDVxvjvqoL+0HCE1433Dh24aNcWVlZbW2tTqcbHR3VaDRw9Hp9R0cHErRa7ezsLJY4suEzGj6gYRWf+IaGhtra2uA3NDS0trY6mtwS3OFej9Hq3jSLhpvzBfJKNn9ze06e+Ay3hnvJuUS32ZjZyon4pC2q7m3EMr6Zk5ReB3e44+PjeTxeREQEljExMbGxscyGVbl06VJcXNxK581xtImMjGRWVgDDja7gEaOjo9EUDlnw13P23Lug1e1W6HC7lUXDzZyj3Q7GjGbG82m4w52TkzM2NlZfXz8wMADpxEeDlpYWiC/J3hwVFRXp6ekymQytJSYmMtHFuHq4Od8qrGLTbcGcLxkWGuerBti4bQPf0qxY3YODg8764mZiYoLxVsYNwy1u135RWHBIkFxjMPwyLDRYLD6anp6iUHwsyjLbbDkqVUyNjB3uvx74l5Gsu4sCblfF3WlIuTPD/zb/t3aR4W5/9Dfah/f1vvfpoH+Q04bbzXzXq9vNuHq4Ob+2XMWQvPCHmIttyDo6yv6NhBhpf50sGu6FXwy62TDcnMiaxvlK0Cts0XBT3AMd7g3ToFT29fVnZmWTVVK264QO94bB+M47zqSTVcziVGpNQ6MKPhwsu7q6vr4UaLFYZDW1xSWl7x790JFohw73ZhgZtUN8DDeWnNPrCE45QHzhL9jpcG+GiMiomtpa4qPMMaAsJLgSdLjdCh1ut0KH260sGu5XC49xvgveov1c+Af67xOn42nfensaC6fmi+qb/GfqR0kH5ubnzFOW50SvhTbynhUd/mPOm1/Jw7HppCzgijLmlcIPpD2yQ0X/+E3Wq+dqr9yf+NSrxf9QDqr2pjwfpUo+LQs6VxtC6vuRlBdofTsdtr5bW1t1Oh1eTjInamlpMZvN7e3tIyMjiGDSZDKZyM9kpqenyave09PT0dGBTaQRLLGKTSqVCkE4JN7W1ka26vV6NoiZrUajIY+FIPLRLIIkAUvEPYGFPVmmvmGfSPw/kZx/MHHf/fx9/8bf/wP+vv8S/t5e31UXH+AjuP9nwhce4O9/gP90ZU814vYfvdlX9/1H0gEsH7j1Z01a366AVBsL6gwQBy8tqWwCu5WtP/isgyXiju32BOLg7UEcgCDeMKRNJLONs82S4MJVT4B0ibCovoPqrqJwnWifVpxjmqY4D5SdhbIyK9Y3heJjLKrvzf27eHNs13+Sl8UNPzLy6v9Cexcr6jdb34mJiVVVVcQHQ0NDWEqlUrLqFEh9Y7aHjyyVlZXwh4eHHVvWy8IeLvQ3AVvfAoEgMzOT+ID9lahSqVwY3wS0vt3G2vWNT+Varbazs7O7uzs8PBwfMhCRyWT4NI0P4Gv+ong9kPrGOwcN9vb24iEwc8IjwicJa9LW1oruYZeEhAR0j4luCra+8T5BUyMjI42NjTU1NVglpxfQT7wVTSbT4OAg4iR5Q9D6dhtr17cboPMTiotYsb43d+WTzeGsn906BVf/chG49FLjlIXQ+ubi1fXtl5P95/g459q7aWkTRsOc7NlN2LjV2Pm3dzr+fHgV63z1Hab3LmDt+haLxSkpKTwer6CgoK6uLiwsTCKRnDp1is/nIx4UFIQ5aGxsLDI3/R+Trdc3OoMPpmVlZegS/IaGBgSxhI+58o0bN0jaevDq+mb/JLDv2tXno6Pg5KvVZW1te4MCiSGyNzjok+xsLIn/6JXLl8rKyCa/3Nzc5mZ7HMm3moLD/uUg/dztORf2vPbs9+bL7jt16PudKXeZc+5h/3sQ/pH9Dx9hH+5SRt9JIuzFvdofe0b70JPah/eZ0rMtecV2f+9Tvcf8NvEXhQ1B9ZuLb9T3JyLRmfx8OGGSynCJJE+tDigtPZIqfDzkSqJc/qZQGFBWhuAbwpSnIyLi62pf5PEeCgp8Syj8pqTELycnp7k5Slb9VqqQU9+xn++O99s9W2L3/Y/syjx/e9mVO+Bg1ZJ7T1HAHsX1O86+vjPi490kn63vzpff0P3yOf2+PwwHXh0OumbOKug9enwo8Cqtb3fjG/XtRLPXt/YyqdeNmq2/jFTw6kbr233Qz5e+xIr1TaH4GLS+KW5l5NZfzNwDrW+KO6itqxMIhWHh1zIys9rbuV82Y7LKeEsgVztmWTj3WA+0vinbD1vfRpNpZIQR+KycfGmVbGF9d3Z2DQ8Pnzx9NuxqRFOTinwBXlxSGhMbV1hsvwfcUmh9U9zH8ZOn/S98Uynh/lBv/fq9UWh9U3wZWt8UX4bWN8WX+ba+Z+Zm4lUCzo1HtmKxTXzj5Bo3V6JsgjnKqjDD5ODb+i7vlJA/vTvRBJp0pnWK89jiRy7fZvzWvRcJ39Z3WWclW5fsTY7Y23UvNPa+3bdWmatBLDVa366A1vcqrF3f3ZY+v+pLU7NTj6W9FNqY4F8X8t/pL+/P/OtvRYeOlH4eq075VfrLz4kOf1kb8krBBy/lvXO9WfBumd8XtVcu1IXty3jlE+n5/Rmv0Pp2HaS+p6amqqur29vbZxxXkyQXMDGbzXK5nKwiZ3BwcHp6mlyZhETw8isUCnI9E8RxNEcEDtJIAiLYyl4PSKVSEaejo6OlpQWZZF8kkCsHNTc3I0KCnsDa9W0wdf8p750R2xj0+/OqiyJdYW1fvbSn9nj1xXxD2dulfuVdUnF31StFH1V2yyJVSZHNgmeyDn0o/UraVxfWEJ3XUZqjL6b17TpY/dZqtSgy1LRer0d1NjQ0qNVqFFx/fz/qDwnd3d2oPKlUSu4Ah0hPTw9ykD88PKxUKtEC3idNTU1w0AI2kfvDwUfL2Ku+vh6NTE5OajQa+EhDC+SNgQTsiEy0xrnqyDaydn0/K3rtE8n5g+RahPx9pQYxCv1B/j7U94+Tn0EEE5IH+fsfSNwX0RjvV33xAf7++/lPY/UhwXOOq1g5jNa3y2DrG3UGiMNGUJ3sKqlpsrpQnhEBqGa2KEmOwWDAm4REyKaBgQHiIIHd0bHdHgFolo14AmvXtxON1rcroPPvVVixvttG25+68T+cC6xtxR5L/WOJYflbhFO2gtFodFyHjLIMY2NjzDA5+La+wfTcNOfmrVuxydkppl0KZZtYVN8Uio+xqL4nbJOcWxq7yEyWcU5k/eaNN5O2Ttg4EWouMpQWU80OFtW32z4I443EeBvHDdeacjozHnN62OfhlBatb3dA69ttrF3f1dXVBQUFC68WW1lZ2dnZyaw4A7YTGo2mpaUFTn5+PomsCVvfU1PM51dnfbOg1+tbW1vZ1sgNl+G0tbVhZLbyKLS+3ca69Lu/vz8gIKChoQERvOQikSguLo7P5wuFQrVaTXK2AtuJ5OTkmpoaHo/X29sbGxurUNST+Cqw9Y36Kysrk8vlRUVFJLJFYmJi0KZYLM7Ly4uPj09ISEDHgEqlwoAgiOeOtzoekdlh3dD6dhvrqu/Z2dnGxkaj0YiITCYj1y+2Wq1QcVQ5ydkKbCfwEENDQ+zFl7FK4qvA1jdKDZ0cGOh31rEFz5H0p66uTqFQoNYHBwfRNwRR2X19fXJ5HYYCQWaHdUPr222sq75dDacTG4LOvymrQOt7G6D17TZofW8DtL7dxmr17bZLAhpNm7/enxuuFeh0LBYPutiib2M0W5hqdkDr2x3Q+nYbtL63AdfV95jZ/PKSuy9s3ToHB2cVr3JuzLAem1F/NiaRce7WsNTGZHXME3A2a9d3Tk5OaGhoRUWFTCbr7+/v6+tTKBSjo6Pt7e0k2N3d3dLSgsyzZ8/ad9g4TqnvvLy88PBwi8WCzojFYr1er9Pp5HI5uop+km9nPATX1Xd2UxPn0t1Oscvl5Zyreq/fOg+9x7nU91LrfOMo8wSczdr1nZubOzAwoFQqk5OT4+Pjo6OjpVIpiiYzMxPVg5JCPC0tzWg0ZmVlOdrcME6pb7wPY2JiSktLsUQP+Xy+SCRCUCgUwre57PLpm8AN9b03OOhQchKcx0KuvMTjPR4aYg/euuUInI+zRfDJap66mfgn8/N+EhT4y7BQNg1LGFvfKWd2517Yk3Phtu7Uu+P9dhcF7Dn92vfZUr4pvm+u9D7x5T2TRfeyQba+DS/8tfOlw/Zq/vPr+l//SfvQkyNh0dtf30tBATHeYjZ9jXo6P3EWbH2fzM2dmp19K1WISrVMTiq6uyt1Ov/iYpmh4+201M9ycr4qKRa3t8NkHR0Vel2hRtPc13cqP/+wQPBpdrbMYMhVN9d3d3HqO/bzXc2xdxx5wV7TQe/vQjWfO7Ljwts74/xuu3x0R9Cx3VXhe+JO7KqPumO+nFvfkyqNMSUDzuzImEmYNV5Rbc5l7sLjWfXtdGh9Owu2vn8RGnKxpORAZOTPQ678OuLax1lZn2aLDicnXywtgZYnyuWvJiV9cONGkFic3qhMUyqPYxZaWXFYkBwukbwUxztbUPC3JH6mimmNre+W+Dsh2xnnb4NfGLBHGX3niVd3vP/i94cz7xFfvr04+I5u4V2X3t3ZmXKXNY+56RRb30MXQ0euxsLR/+alnjeODX5x0ZxTSOt7DWh9L4TOvznQ+t4GXFffuSoVpzSdYiFiMadq120/6Dx8lFPNS63zyDHmCTgbWt/bgOvqGwyPGZ1u9nYtxgnz4EZt3Gq/jZZ1aHh1G3fZyS1a39uAS+ubspA16ts9hvrmRNZvqG9OxPPNbLGaTBZqbrBRo5mpZgeL6ptC8TFofVN8GVrfFF+G1jfF5WSKsrXadolEeiU0XNGgXHq3NJNp+ft8kGuCbgVa3xSXkyXKVqs1gcFXLlwMCLoSIkgRMhtuQa5zuyzkQs8snMsLrgmtb4rLIRdWhhjbbDYsl1YziZz+8kJ0HD9JyFxz+MALL2HJ1vdnx0+UlYvr6xV5+QVqTYte34Hg60fexlJer4iOjXNkcaH1Tdl+SH3H81Oi4xITklJI8FpULJZsfQcEBZ88ffbQ4Tc0LS1+J0/HxsUjKMrOMTiunhAVw3NkcaH1TXEfVqv9ekkqVTNZZSH1zfn7r6KhEUu2vqemppAAkJx+I0NaVY0gjgaNjU1wONMYFlrfFDeBEtTp9F9fCkzewvx7o9D6priPMnFFavqN7Nw8Zv0WJpMJJb6Urd+pgtY3xd1w5iEuhdY3xZeh9U3xZWh9U3wZWt8UX4bWN8WXWb6+m4davq4JeTT1Dz9O/q1n2k8Fz75f6legL2F6TKF4MDMzM0aj0UqhbBxUzko3j1levss6Kw8WfMC517an2SMpLwg06TNzK37zRaF4COSnZcwKhbIRxsfHtyTfDyY+9Y38anV/vbSvVtZfn6rN/nHyM/+TfzS4IRp2sPDY/bcyWYf4sI8l/s+JDsN5Of/di/KrnDTiYHlSFvBExl/+nb8/ojH+Xx3Bnwl/F68W/qfgt9hKjOzCGpVvirfAke/5+flJB+QnY0x0AbO3fm6G9y3A7kNDQ2QTB5K5OqQdZmUJ2MT2YfXWlm519G75llfZBBY2tZ6n8F1mq/L9o6QDLaNaP1nAz9Nfeq/ibNNIy/PZdkX+rOqrz6suHhOfiWtOUQ6qSrskJ6ovSXpqHuTvP159MapZIB9oTG7NhAPRz9YX+deGSHvrRPqiUCUvr6O0YbApQHE9UpV0f+KTkc0C7ajutaJ/NA2pYzWpF+ThKa1ZDYOqy/WR6e15yiFNeGN8SpvohwlPsr2i8k3xFpbOvvGG1Gq10E0sJRJJY2OjTCaTy+XT09NIbmpqUiqV3d3dXV1dCoUCWw0GAxKqqqpUKhW5QSc2IQ1BrHZ0dCC/ubkZTn19PXKwL3IaGhr0ej1aQKS3t1cqlcI3m+3Xz0BaS0sLHrG9vR3tk0yNRoN20CCaAjqdDj66h15BZOEgiJ5gLzh4CLSGfBxaEEELo6OjeEboEvqGVWxCck1NDR4Lxypsgo+HwAORppBGmkK30be6ujqyF3s4oYCtyvf/4/9aO6afvzmf3VEyOTs5MWN7OvMVyPffK8/9vdL/bE0wtFsx0AgtlvcrI1V87AL5Vg+31vTXhyl5bxR/WmwQfyMPrx9ojFUL49RpLxcczWrPz9WXQKyJfF9R8vyqLmbrivL1Je9VfHFZcb15WKM3GsIUUWdkgWltOQcLP4Sg/zDhCbZXVL4p3sKy8g1xhE5BPdva2iwWC+QVYgeZg1AiAnFsbW3FEtoHRYPSQSWRgKawC1qACkNb4SMfTUH4iLbCgaz39fUhB3shghZIpLOzc2RkBCKLTbW1tdgdyUiAOkNAAVqAlENe8ShYYhN0XywWE/nGoyCOJTlCoHEILvQXvcUSnRwbs7eMVWyCsqNxOHhEPLTVasWTxb544ugz6TY5tKBvSAMkDZtWUqvvJluV7zXt/ycf4EQeTvnd3pTnOUGOPSL8/YGsV/+Nv58TX6dR+aZ4C0vle9tZj0RCcNHz1TPpTNnVbFi+xV3S1wo/4silp9njqX8UaG7MUvmmeDweKN8Ub2HD8j07N1fbp4A48puFnmlJ6rSijjLrFPcSXxSKZ4JZKoWyOZgaWsLy8k2hUCgUD2dF+YbkYw5OjRo1atS21xhRXsKK8j0+YVtl0u6lTNgm5+a24UlZxr3gvKdXdHJ1ZmZnbVNbukohheJpOFRrI+e+AZVvJ0Ll2z1Q+ab4Hs6UbwRXipPHmHXcgIIEPY2V5JvtPIDD+s7Cq+UbLyjjLYbzKi8sABJxP1S+Kb6HE+R7cnIyJiZmdHQ0IyNDKBTW1NQkJycbDAbkFBYWJiYmtrS0fPPNNyUlJTqdLioqqqOjIzU19caNGz09PchEDtPQtsKR76qqKn9//+LiYjwdtvPR0dHoPJ6jwEFXVxeTvQU4yojhmpiYmJ6exviIxWK9Xh8fH4+BKi0tZTK2g4WdxMuKLg0MDGRlZYWEhOAVbG9vb2pqKisrq6ioqK+vb25uvn79ulqtxhCJRCLkY2t+fn51dXVgYGBKSgr2xRiSTDzfkZERpmlXQuWb4ns4Z/aN9/Pg4GBERATEDu9PjUaD9zZyrl69Wl5enpmZiXcvcpKTk2pra9PT0+FjCYWCKkVGRjKtbCtL5VulUp05cwbPKC8vz9H5ZLbz6DmkB3Emewtw5BuNt7a24qHT0tJwUExKSsJj4QgXF7f8be3cA6eT0OWGhgYMCHqLgcI4QIXDw8MlEgkOz+gwHIVCgQR0G4ciyPe1a9eKioqwiiMiKgSvO/bF4RA5dXV1TLuuhMo3xfdwjnyvBGSI8ZbDarViVgvdZ9a3FY58u42VzksQ8Np4wvis3kkCugrVnpqaYtY9DCrfFN/DtfLtRXimfHsIXtHJ1aHyTfE9qHwzUPleBSrfFIoHshn5toxPmMwWk9nqSzY6ZjaatuFJjYyZOBEPNK/o5Oo2ZrKMGs2cIDVqXm0o6Q3Lt3XcZrWO+xhGDMZ2PKsxo5nxPBiv6OTqWCwodwuzQqH4BEazhcq3HSrfq0DlextBWXoFTHfHreixm4yFE9+ceSFOkO/e3l6lUtnf369QKEZHR/FCVlZWGo1GZvMCzGZTXV0dHLlcPjY2BsdkMlVUVFgs3PcVWkNTzIpb8BD51mq1ZrNZpVJVV1dPTEwgguHFcJGtK0FuudLa2sqsOxsq39tCsUb9cHCQt9i1ysrp9rCbZfe50X5o66/sevMj7d6ntm5d73w8brMxQ+8lOEG+c3JyUlNTQ0JCyA+i09PTIyMj4+LiEBQKhTweLzg4WCAQSCQSKPK5c+fS0tIQxNbc3Nzk5OTLly9jiYTQ0NCwsDAIOtrMyspqa2sj7bsHD5Hv6OhoDBF6Eh4ejoFqaGgQiUQIxsTEwMnLy0tISEBaZmZmUVERhhGbyO+sMeZwbK6pPyrf20J2UxNHIpe1nwYFYvmQY7m6PRZyBcYJEvtFSMh/XQ5eGHn8VvITYWE/W7xpqe0NDrpcXj7dFrxQXudL7xsW3T2YabeJwnuni+/9dms548yWLAgutplb+WhnrnT5NFtfSeeh9zhCzLWfPvHt8pa1P/pr3a+eWxjpfOPod1G+MU/s7OyEU1ZWhsmjWCzOyMggf8fQaDQQd3DhwgWZTIYpeWFhYXZ2NpSopaUFmVB5CBCUSK1WYzU/P5/It1QqJW26DQ+RbwgxPpdgxMrLy5uamjChxkERq/hAg8Hs6OiAgzSMrV6vr6+vx2p7e3tiYiIyMcJkwu50qHxvC0vl+/Ps7Ibu7lqDwWSzhUskvwgNQfBsQUHLwMD16up/iLJkHR0fZmYWt7RWdejzNZpUZQNE+VdhoSKVKletPldU1Nzfl1Anx74H+YmC+vrk+vrjOdnni4qqOzoyGhu/Li2t1OkuV4jR7OmC/AipNFEul+h0NQbDsYyMQHG5RK9/IyUloqqqQtf+Jx6P7diy8h37+a7pUrtTG7HnwKP/fOXYrqmie81595x5fed44b3Jp2/Lv7Tn9Gs7NPF3fvXWrhOv7uxJvRvJ8SduO/63HYroO99/cccnr+w0pNwd8fFu/yM7S4Nuf/HJ743n3cO2D1sq34NfBsyOGkeuxs6Nj3f95U1Eeo8dn2zRmgQZ3QffHi+vGg6O6H33kwm5cuDMN9q9T7I7fkflez1sizJuCHruexWofG8LHPmGCodWVlwoLpbodZFVVcHi8j/xYhEPl0pK29qyVCp5Z+eFkpLTeXnVHfpT+fnnS0qQ+d/hYW8KU9KUyi8KCoLFYr/cXCg18s8VFFTodJfKy/Ujw1+XFOeo1SEVFQKF4q3U1Oa+vp8EBUK+m/r6QiorCzWad9PSclSqmk7De+np2BeHEDzcibw8tm/LynfUp7sg05n+t8X77Uo6vXtMZFfe8fx7jx/c0Z9xd9D7u86+vgMizjt5G9S5NvKOhBO3I+HqRzuGMu4KPLY74L1dyqg7BGd2f/LKjnP/u1MRdceXR3bOL2gftlS+e49+Pj9hg17PDA4ZfvcKIkP+gdZyiaWwzCTM6vvg+HhFtTm7cDSaby2TaB+i8u0TUPleBSrf28JKJ08eCgqEXC5cdSztGgoHy72OBIfD5DCrt4JYIvjolSsFGs2h5KSFCfBJg2TV/liORtitnGQ2slS+7VZ+y5bGy+6DoJdf3jNTeh9EfJmcW6aMvssgsE/Ml9ryJ0+IKLPSvOzqQsdhVL69GCrfq0Dle1tY57lvT7AV5dvFtq5z3+szKt9eDJXvVaDyvS30joz8ecH5ZU+230RENBgMtqH6eckjN8t+6B6bq/39uLl/KCWj/bFnOFq8UWt//JnhtCxm3L0HKt8MVL5Xgco3heKBUPlmoPK9ClS+KRQPZDPyPTU9PT5h8zGzH5OWBN1g2/KgGzWv6OTqhqcwPT0zNzdPjZovGSPKS1hRvikUCoXiyVD5plAoFK+EyjeFQvEFOgyG4ZERo9HUrtNVy2omJyd58Ynn/L9a/82h5ubmrFared2Mj49v700RqHxTKBRfIEuU/elxv5Onz/KTkgODr/CTBHb5/vI8IqlpN1LTbzB5KwAtnpmZYVbWzcTExCb2chZUvikUii9QVFyqVmswB8/OzY2O5Uml1afOnoNwx/DiDIZOUU4uk7cCmHfPzs4S32az1dTVY/7e29cnTM8cGh4hcQLSRLkFxEfm9PSiGzxJJNJkgVCQkqrXd4RfjThx6iyzYQmYuTepVD09PfD7+vp6enrb2rRtWi3Zuh6ofFMoFMoi+Qbx/BSjyZSQlGKxWqN4CUzUQU2dvLhM3Kxugb9UvkFAUHBXV/c5/6/Sb2ScOvPF60fejomNw1Hk/WN/j4rhxcYllJSWkbMuouyc4pLSubm5M198iXYKi0uQQBpZD1S+KRQKhSvfNzKzzRZLeaX0YlBoXb2CiTqolSv+8PJBTJbhLyvf1yKu9/b2xfDi/U6eSU2/ceGbi1qtNiEx6Ysvz7/z/ge8+MSoaB6R78Ki4kqJJJGfRCbd4orKpOQURxvrgso3hULxNSwW6+v/+1advP7UmXMZmVmDg0MNykZm2wpw5HudLCvfKzE6OqrT6ZkVZ0Dlm0Kh+CBfXwwYGBjExDY2LgGzWkGKkNmwAjbbxPqFmGVzX3g6CyrfFArFB5l3YHdu3uzq6i4Xi0l8FZA/OTk5sW42IffOhco3hUKheCVUvikUCsUrofJNoVAoXgmVbwqFQvFKqHxTKBSKV0Llm0KhULyQmzf/DyX1s5Ly0KAAAAAAAElFTkSuQmCC&quot; style=&quot;width: 490px;&quot; data-filename=&quot;17.png&quot;&gt;&lt;/p&gt;&lt;p&gt;dsdasdas&lt;/p&gt;&lt;p&gt;sdfs&lt;/p&gt;&lt;p&gt;dfds&lt;/p&gt;&lt;p&gt;fds&lt;/p&gt;&lt;p&gt;fds&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '/public/upload/12.png', '1231231', 1);

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
