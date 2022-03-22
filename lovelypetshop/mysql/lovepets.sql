-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 03:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovepets`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TypeId` int(11) NOT NULL,
  `prominent` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `TypeId`, `prominent`) VALUES
(1, 'Poodle', 1, 'Có'),
(2, 'Pug', 1, 'Không'),
(3, 'Corgi', 1, 'Không'),
(4, 'Husky', 1, 'Không'),
(5, 'Shiba Inu', 1, 'Không'),
(6, 'Golden', 1, 'Không'),
(7, 'Mèo Anh Lông Ngắn', 2, 'Không'),
(8, 'Mèo Munchkin', 2, 'Không'),
(9, 'Mèo Ba Tư', 2, 'Có'),
(10, 'Mèo Báo Bengal', 2, 'Không');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `CityName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `CityName`) VALUES
(1, 'TP.Hồ Chí Minh'),
(2, 'Hậu Giang'),
(3, 'Cần Thơ'),
(4, 'Hà Nội'),
(5, 'Hải Phòng'),
(6, 'Đà Nẵng'),
(7, 'Huế'),
(8, 'An Giang'),
(9, 'Cà Mau'),
(10, 'Bắc Giang');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `CommentId` int(11) NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `NameLogin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ProductId` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`CommentId`, `Content`, `NameLogin`, `ProductId`, `time`) VALUES
(1, 'Đáng yêu!', 'Jiyeon', 18, '2021-02-17 11:03:09'),
(2, 'So cute', 'Jiyeon', 19, '2021-02-18 12:48:22'),
(3, 'So cute', 'Jiyeon', 5, '2021-03-11 13:02:36'),
(4, 'So cute', 'minhthuy', 69, '2021-03-11 15:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `NameLogin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` int(11) DEFAULT NULL,
  `Address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `TypeUser` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`NameLogin`, `Password`, `FullName`, `Gender`, `Address`, `Email`, `PhoneNumber`, `Birthday`, `Status`, `TypeUser`, `code`) VALUES
('Bae', '1c9bffd3c98936a081a941ef6e420245', 'mt', 1, 'Viet Nam', 'bae@gmail.com', '0939974419', '1990-03-02', 1, 'Khách hành', ''),
('Jiyeon', '6925d483ca95b19295feafcae5ff2f4c', 'Minh Thuy', 1, 'VN', 'jiyeon@gmail.com', '0939974419', '1993-06-07', 1, 'Khách hàng', ''),
('minhthuy', '1c9bffd3c98936a081a941ef6e420245', 'Minh Thuy', 1, 'Cần Thơ, Viet Nam', 'sunflowermt278@gmail.com', '0939974419', '2001-08-27', 1, 'Khách hành', '216fef14569fd543472df1899208e4636049d0f322109'),
('sunflower', '1c9bffd3c98936a081a941ef6e420245', 'Minh Thuy', 1, 'Cần Thơ', 'ttmthuya19044@cusc.ctu.edu.vn', '0939974419', '2001-08-27', 1, 'Admin', '7d9fbebdb133d26b911c61e0492a54136049b358c1191');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `idd` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `DistrictName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`idd`, `id`, `DistrictName`) VALUES
(1, 1, 'Quận 1'),
(2, 1, 'Quận 2'),
(3, 1, 'Quận 3'),
(19, 1, 'Quận Bình Thạnh'),
(20, 1, 'Quận Gò Vấp'),
(23, 1, 'Quận Thủ Đức'),
(24, 1, 'Quận Tân Phú'),
(25, 2, 'Thị xã Ngã Bảy'),
(26, 2, 'Huyện Vị Thủy'),
(27, 3, 'Quận Ninh Kiều '),
(28, 3, 'Quận Bình Thủy'),
(29, 3, 'Quận Cái Răng'),
(30, 3, 'Quận Ô Môn'),
(31, 3, 'Quận Thốt Nốt'),
(32, 4, 'Quận Ba Vì'),
(33, 4, 'Quận Đống Đa'),
(34, 4, 'Quận Long Biên'),
(35, 4, 'Quận Hoàng Kiếm'),
(36, 5, 'Huyện An Lão'),
(37, 5, 'Huyện An Dương'),
(38, 5, 'Quận Hải An'),
(39, 5, 'Quận Dương Kinh'),
(40, 5, 'Huyện Bạch Long Vĩ'),
(41, 6, 'Huyện Hòa Vang'),
(42, 6, 'Huyện Hoàng Sa'),
(46, 7, 'Huyện Phong Điền'),
(47, 7, 'Huyện Phú Lộc'),
(50, 7, 'Thị Xã Hương Trà'),
(51, 8, 'Huyện An Phú'),
(53, 8, 'Huyện Châu Thành'),
(54, 8, 'Thành Phố Châu Đốc'),
(55, 8, 'Thành Phố Long Xuyên'),
(56, 9, 'Huyện U Minh'),
(57, 9, 'Huyện Đầm Dơi'),
(59, 9, 'Thành Phố Cà Mau'),
(60, 9, 'Huyện Năm Căn'),
(61, 10, 'Huyện Lục Ngạn'),
(62, 10, 'Huyện Lục Nam'),
(63, 10, 'Huyện Lạng Giang');

-- --------------------------------------------------------

--
-- Table structure for table `imageproduct`
--

CREATE TABLE `imageproduct` (
  `ImageId` int(11) NOT NULL,
  `FileName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imageproduct`
--

INSERT INTO `imageproduct` (`ImageId`, `FileName`, `ProductId`) VALUES
(1, 'imageproduct/poodlenaudo.jpg', 1),
(2, 'imageproduct/poodlenaudo3.jpg', 1),
(3, 'imageproduct/poodlemautrang2.jpeg', 4),
(4, 'imageproduct/poodlemautrang3.jpg', 4),
(5, 'imageproduct/poodlevangkem2.jpg', 2),
(7, 'imageproduct/poodlemauden4.jpg', 7),
(8, 'imageproduct/poodlemauden1.jpg', 7),
(9, 'imageproduct/chopugp21.jpg', 16),
(10, 'imageproduct/chopugp22.jpg', 16),
(11, 'imageproduct/chopug1.jpeg', 13),
(12, 'imageproduct/chopug2.jpg', 13),
(13, 'imageproduct/chopugmautrang.jpg', 15),
(14, 'imageproduct/chopugmautrang2.jpg', 15),
(15, 'imageproduct/poodlemauxam.jpg', 6),
(16, 'imageproduct/poodlevangcam1.jpg', 8),
(18, 'imageproduct/chocorgi.jpg', 17),
(19, 'imageproduct/chocorgi2.jpg', 17),
(20, 'imageproduct/poodlevangkem4.png', 2),
(21, 'imageproduct/poodlebosua.jpg', 3),
(22, 'imageproduct/poodlebosua2.jpg', 3),
(23, 'imageproduct/poodlenaudo.jpg', 5),
(24, 'imageproduct/poodleteacuptrang.jpg', 18),
(25, 'imageproduct/poodleteacupnau1.jpg', 19),
(26, 'imageproduct/chopugmauden1.jpg', 14),
(27, 'imageproduct/chopugc1.jpg', 20),
(28, 'imageproduct/chopuga.jpg', 21),
(29, 'imageproduct/chopugb1.jpg', 22),
(30, 'imageproduct/chocorgia.jpg', 24),
(31, 'imageproduct/chocorgib1.jpg', 25),
(32, 'imageproduct/chocorgic1.jpg', 26),
(33, 'imageproduct/chocorgid1.jpg', 27),
(34, 'imageproduct/chocorgig1.jpg', 28),
(35, 'imageproduct/chocorgif.jpg', 29),
(36, 'imageproduct/chocorgie.jpg', 30),
(37, 'imageproduct/chohuskyc1.jpg', 31),
(38, 'imageproduct/chohuskya1.jpg', 32),
(39, 'imageproduct/chohuskyd1.jpg', 33),
(40, 'imageproduct/chohuskyb1.jpg', 34),
(41, 'imageproduct/shibac1.jpg', 35),
(42, 'imageproduct/shibad1.jpg', 36),
(43, 'imageproduct/shibaa.jpg', 37),
(44, 'imageproduct/shibab1.jpg', 38),
(45, 'imageproduct/goldenb1.jpg', 39),
(46, 'imageproduct/goldenc1.jpg', 40),
(47, 'imageproduct/goldena.jpg', 41),
(48, 'imageproduct/goldend.jpg', 42),
(49, 'imageproduct/meoanhlongnganb1.jpg', 43),
(50, 'imageproduct/meoanhlongnganc.jpg', 44),
(51, 'imageproduct/meoanhlongngand.jpg', 45),
(52, 'imageproduct/meoanhlongngana1.jpeg', 46),
(53, 'imageproduct/munchkinb1.jpg', 47),
(54, 'imageproduct/munchkinc.jpg', 48),
(55, 'imageproduct/munchkina1.jpg', 49),
(56, 'imageproduct/munchkind.jpg', 50),
(57, 'imageproduct/meobatuc1.jpg', 54),
(58, 'imageproduct/meobatub.jpg', 53),
(59, 'imageproduct/meobatub.jpg', 53),
(60, 'imageproduct/meobatua1.jpg', 52),
(61, 'imageproduct/meobatud1.jpg', 51),
(62, 'imageproduct/meobaobengald1.jpg', 55),
(63, 'imageproduct/meobaobengalc1.jpg', 56),
(64, 'imageproduct/meobaobengala.jpg', 57),
(65, 'imageproduct/meobaobegalb.jpg', 58),
(66, 'imageproduct/poodlenaudo5.jpg', 59),
(67, 'imageproduct/pug1a.jpg', 60),
(68, 'imageproduct/pug2a.jpg', 61),
(69, 'imageproduct/pug3.jpg', 62),
(70, 'imageproduct/pug4.jpg', 63),
(71, 'imageproduct/corgi1.jpg', 64),
(72, 'imageproduct/corgi2.jpg', 65),
(73, 'imageproduct/corgi3a.jpg', 66),
(74, 'imageproduct/corgi4.jpg', 67),
(75, 'imageproduct/husky1.jpg', 68),
(76, 'imageproduct/husky2a.jpg', 69),
(77, 'imageproduct/husky3a.jpg', 70),
(78, 'imageproduct/husky4.png', 71),
(79, 'imageproduct/shibainu1a.jpg', 72),
(80, 'imageproduct/shibainu2a.jpg', 73),
(81, 'imageproduct/shibainu3a.jpg', 74),
(82, 'imageproduct/shibainu4a.jpg', 75),
(83, 'imageproduct/golden1a.jpg', 76),
(84, 'imageproduct/golden2a.jpg', 77),
(85, 'imageproduct/golden3a.jpg', 78),
(86, 'imageproduct/golden4a.jpg', 79),
(87, 'imageproduct/meobatu1a.jpg', 80),
(88, 'imageproduct/meobatu2a.jpg', 81),
(89, 'imageproduct/meobatu3a.jpg', 82),
(90, 'imageproduct/meobatu4a.jpg', 83),
(91, 'imageproduct/bengal1a.jpg', 84),
(92, 'imageproduct/bengal3.jpg', 86),
(93, 'imageproduct/bengal4a.jpg', 87),
(94, 'imageproduct/munchkin1a.jpg', 88),
(95, 'imageproduct/munchkin2a.jpg', 89),
(96, 'imageproduct/munchkin3.jpg', 90),
(97, 'imageproduct/munchkin4a.jpg', 91),
(98, 'imageproduct/meoanhlongngan1.jpg', 92),
(99, 'imageproduct/meoanhlongngan2a.jpg', 93),
(100, 'imageproduct/meoanhlongngan3a.jpg', 94),
(101, 'imageproduct/meoanhlongngan4a.jpg', 95),
(102, 'imageproduct/poodleteacua1.jpg', 99);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetailId`, `ProductId`, `OrderId`) VALUES
(25, 71, 12),
(26, 19, 12),
(36, 95, 18),
(37, 14, 18),
(39, 89, 20),
(40, 59, 20),
(51, 22, 31);

-- --------------------------------------------------------

--
-- Table structure for table `orderproduct`
--

CREATE TABLE `orderproduct` (
  `OrderId` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `DateDelivery` datetime NOT NULL,
  `Status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `AddressReceive` text COLLATE utf8_unicode_ci NOT NULL,
  `NameLogin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `PayForm` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `totalMoney` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderproduct`
--

INSERT INTO `orderproduct` (`OrderId`, `OrderDate`, `DateDelivery`, `Status`, `AddressReceive`, `NameLogin`, `Phone`, `Email`, `PayForm`, `totalMoney`) VALUES
(12, '2021-02-23 15:58:57', '2021-02-23 18:24:00', 'Đã hoàn', 'Viet Nam', 'Jiyeon', '0939974419', 'sunflowermt278@gmail.com', 'Thanh toán bằng tiền mặt', '30000000.00'),
(18, '2021-03-11 09:41:25', '2021-03-11 10:07:00', 'Đã hoàn', 'Cần Thơ', 'Jiyeon', '0939974419', 'sunflowermt278@gmail.com', 'Thanh toán bằng tiền mặt', '21800000.00'),
(20, '2021-03-11 15:14:29', '2021-03-11 15:19:00', 'Đã hoàn', 'Cần Thơ, Viet Nam', 'minhthuy', '0939974419', 'sunflowermt278@gmail.com', 'Thanh toán bằng tiền mặt', '25000000.00'),
(31, '2021-03-22 20:37:22', '0000-00-00 00:00:00', 'Chưa hoàn', 'Phường An Phú,Quận Ninh Kiều,Cần Thơ', 'Jiyeon', '0939974419', 'sunflowermt278@gmail.com', 'Thanh toán bằng thẻ ATM', '11000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Price` decimal(12,2) NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `RealName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DateUpdate` datetime DEFAULT current_timestamp(),
  `ImageProduct` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `SaleId` int(11) DEFAULT NULL,
  `CategoryId` int(11) NOT NULL,
  `StatusProduct` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `Price`, `Description`, `RealName`, `DateUpdate`, `ImageProduct`, `SaleId`, `CategoryId`, `StatusProduct`) VALUES
(1, 'Poodle nâu đỏ - Abby', '5000000.00', 'Bé Abby 2 tháng tuổi,thuộc giống cái, màu sắc nâu đỏ, thuộc loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Abby', NULL, 'imageproduct/poodlenaudo1.jpg', 0, 1, 'Có sẵn'),
(2, 'Poodle vàng kem - Addie', '5000000.00', 'Bé Addie 2 tháng tuổi, thuộc giống đực, màu vàng kem, thuộc loại Poodle Tiny.\r\n Khách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Addie', NULL, 'imageproduct/poodlevangkem5.jpg', 0, 1, 'Có sẵn'),
(3, 'Poodle màu bò sữa - Cow', '7000000.00', 'Bé Cow 3 tháng tuổi, thuộc giống cái, màu bò sữa, thuộc giống Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Cow', NULL, 'imageproduct/poodlemaubosua.jpg', 0, 1, 'Có Sẵn'),
(4, 'Poodle màu trắng - Angel', '6000000.00', 'Bé Angel 2 tháng tuổi, thuộc giống cái, màu trắng, thuộc loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Angel', NULL, 'imageproduct/poodlemautrang.jpg', 0, 1, 'Có sẵn'),
(5, 'Poodle màu nâu - Koko', '7000000.00', 'Bé KoKo 2 tháng tuổi, thuộc giống đực, màu nâu, thuộc loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.\r\n', 'KoKo', NULL, 'imageproduct/poodlenaudo2.jpg', 0, 1, 'Có sẵn'),
(6, 'Poodle màu xám khói - Koda', '7000000.00', 'Bé Koda 2 tháng tuổi,thuộc giống đực, màu xám khói, thuộc loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Koda', NULL, 'imageproduct/poodlemauxams.jpg', 0, 1, 'Có sẵn'),
(7, 'Poodle màu đen - White', '6000000.00', 'Bé White 3 tháng tuổi, màu đen, thuộc giống đực, loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'White', NULL, 'imageproduct/poodlemauden3.jpg', 0, 1, 'Có sẵn'),
(8, 'Poodle vàng cam - Logan', '6000000.00', 'Bé Logan 2 tháng tuổi, màu vàng cam, thuộc giống cái, loại Poodle Tiny.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle  con thuần chủng của thương hiệu chúng tôi vì:\r\n-Hợp đồng mua bán rõ ràng.\r\n-Bảo hành sức khỏe dài hạn.\r\n-Tiêm phòng, tẩy giun đầy đủ.\r\n-Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.', 'Logan', NULL, 'imageproduct/poodlevangcam.jpg', 0, 1, 'Có Sẵn'),
(13, 'Chó Pug vàng kim -  Buddy', '9000000.00', 'Bé Buddy 3 tháng tuổi,màu vàng kim thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng', 'Buddy', NULL, 'imageproduct/chopug.jpg', 0, 2, 'Có Sẵn'),
(14, 'Chó Pug màu đen - Buster', '9000000.00', '  Bé Buster 3 tháng tuổi, màu đen, giống đực.\r\n   Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                   ', 'Buster', NULL, 'imageproduct/chopugmauden2.jpg', 0, 2, 'Không có sẵn'),
(15, 'Chó Pug màu trắng - Sam', '10000000.00', '  Bé Sam 2 tháng tuổi, màu trắng, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                      ', 'Sam', NULL, 'imageproduct/chopugmautrang1.jpg', 0, 2, 'Có Sẵn'),
(16, 'Chó Pug -  Bear', '11000000.00', ' Bé Bear 3 tháng tuổi, màu trắng, thuộc giống cái.\r\n  Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                     ', 'Bear', NULL, 'imageproduct/chopugp2.jpg', 0, 2, 'Có sẵn'),
(17, 'Chó Corgi -   Oscar', '11000000.00', ' Bé Oscar 2 tháng tuổi, thuộc giống cái,thuộc loại Corgi Pembroke.     \r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                  ', 'Oscar', NULL, 'imageproduct/chocorgib.jpg', 0, 3, 'Có Sẵn'),
(18, 'Chó Poodle trắng - Lucky', '12000000.00', ' Bé Lucky 2 tháng tuổi, màu trắng, thuộc giống cái,thuộc loại Poodle teacup.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                       ', 'Lucky', NULL, 'imageproduct/poodleteacuptrang1.jpg', 0, 1, 'Có sẵn'),
(19, 'Chó Poodle màu nâu - Milo', '12000000.00', 'Bé Milo 2 tháng tuổi, màu nâu, thuộc giống cái, thuộc loại Poodle teacup.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                        ', 'Milo', NULL, 'imageproduct/poodleteacupnau.jpg', 0, 1, 'Không có sẵn'),
(20, 'Chó Pug màu đen -  Beau', '10000000.00', ' Bé Beau 2 tháng tuổi , thuộc giống đực, màu đen.\r\nKhách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                       ', 'Beau', NULL, 'imageproduct/chopugc.jpg', 0, 2, 'Có sẵn'),
(21, 'Chó Pug - Mickey', '11000000.00', 'Bé Mickey 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                        ', 'Mickey', NULL, 'imageproduct/chopuga1.jpg', 0, 2, 'Có Sẵn'),
(22, 'Chó Pug trắng - Henry', '11000000.00', ' Bé Henry 2 tháng tuổi, màu trắng, thuộc giống đực.\r\n Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                      ', 'Henry', NULL, 'imageproduct/chopugb.jpg', 0, 2, 'Không có sẵn'),
(23, 'Chó Pug - Leo', '9000000.00', ' Bé Leo 3 tháng tuổi, thuộc giống đực.           \r\nKhách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                            ', 'Leo', NULL, 'imageproduct/chopugd.jpg', 0, 2, 'Có Sẵn'),
(24, 'Chó Corgi - Spike', '12000000.00', ' Bé Spike 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                       ', 'Spike', NULL, 'imageproduct/chocorgia1.jpg', 0, 3, 'Có Sẵn'),
(25, 'Chó Corgi - CoCo', '15000000.00', ' Bé CoCo 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'CoCo', NULL, 'imageproduct/chocorgib.jpg', 0, 3, 'Có Sẵn'),
(26, 'Chó Corgi - Otis', '11000000.00', ' Bé Otis 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Otis', NULL, 'imageproduct/chocorgic.jpg', 0, 3, 'Có Sẵn'),
(27, 'Chó Corgi - Chance', '16000000.00', '  Bé Spike 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                              ', 'Chance', NULL, 'imageproduct/chocorgid.jpg', 0, 3, 'Có Sẵn'),
(28, 'Chó Corgi -   Blue', '17000000.00', ' Bé Blue 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Blue', NULL, 'imageproduct/chocorgig.jpg', 0, 3, 'Có Sẵn'),
(29, 'Chó Corgi -   Orange', '11000000.00', ' Bé Orange 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Orange', NULL, 'imageproduct/chocorgi1.jpg', 0, 3, 'Có Sẵn'),
(30, 'Chó Corgi - Mine', '10000000.00', ' Bé Mine 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Mine', NULL, 'imageproduct/chocorgie.jpg', 0, 3, 'Có Sẵn'),
(31, 'Chó Husky - Oreo', '7000000.00', ' Bé Oreo 3 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Oreo', NULL, 'imageproduct/chohuskyc.jpg', 0, 4, 'Có Sẵn'),
(32, 'Chó Husky - LiLy', '10000000.00', ' Bé Lily 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'LiLy', NULL, 'imageproduct/chohuskya.jpg', 0, 4, 'Có Sẵn'),
(33, 'Chó Husky - Emma', '10000000.00', '   Bé Emma 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                             ', 'Emma', NULL, 'imageproduct/chohuskyd.jpg', 0, 4, 'Có Sẵn'),
(34, 'Chó Husky - Grey', '6000000.00', ' Bé Grey 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Grey', NULL, 'imageproduct/chohuskyb.jpg', 0, 4, 'Có Sẵn'),
(35, 'Chó Shiba Inu - Ruby', '20000000.00', '  Bé Ruby 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                              ', 'Ruby', NULL, 'imageproduct/shibac.jpg', 0, 5, 'Có Sẵn'),
(36, 'Chó Shiba Inu - Diamond', '25000000.00', '  Bé Diamond 3 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                              ', 'Diamond', NULL, 'imageproduct/shibad.jpg', 0, 5, 'Có Sẵn'),
(37, 'Chó Shiba Inu - Mike', '22000000.00', ' Bé Mike 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Shiba Inu  con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Mike', NULL, 'imageproduct/shiba1.jpg', 0, 5, 'Có Sẵn'),
(38, 'Chó Shiba Inu - Princess', '30000000.00', ' Bé Princess 3 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Shiba Inu  con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Princess', NULL, 'imageproduct/shibab.jpg', 0, 5, 'Có Sẵn'),
(39, 'Chó Golden - Mia', '10000000.00', ' Bé Mia 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Mia', NULL, 'imageproduct/goldenb.jpg', 0, 6, 'Có Sẵn'),
(40, 'Chó Golden - Sandy', '11000000.00', '  Bé Sandy 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                              ', 'Sandy', NULL, 'imageproduct/goldenc.jpg', 0, 6, 'Có Sẵn'),
(41, 'Chó Golden - Sky', '15000000.00', ' Bé Sky 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Sky', NULL, 'imageproduct/goldena.jpg', 0, 6, 'Có Sẵn'),
(42, 'Chó Golden - Happy', '10000000.00', ' Bé Happy 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'Happy', NULL, 'imageproduct/goldend1.jpg', 0, 6, 'Có Sẵn'),
(43, 'Mèo Anh Lông Ngắn - LuLu', '10000000.00', ' Bé Lulu 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                               ', 'LuLu', NULL, 'imageproduct/meoanhlongnganb.jpg', 0, 7, 'Có sẵn'),
(44, 'Mèo Anh Lông Ngắn - Luna', '9000000.00', ' Bé Luna 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                       ', 'Luna', NULL, 'imageproduct/meoanhlongnganc1.jpg', 0, 7, 'Có Sẵn'),
(45, 'Mèo Anh Lông Ngắn - Luce', '7000000.00', '  Bé Luce 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                     ', 'Luce', NULL, 'imageproduct/meoanhlongngand1.jpg', 0, 7, 'Có Sẵn'),
(46, 'Mèo Anh Lông Ngắn - Joy', '10000000.00', '  Bé Joy 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                      ', 'Joy', NULL, 'imageproduct/meoanhlongngana.jpg', 0, 7, 'Có Sẵn'),
(47, 'Mèo Munchkin - Cookie', '15000000.00', '  Bé Lulu 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                      ', 'Cookie', NULL, 'imageproduct/munchkinb.jpg', 0, 8, 'Có Sẵn'),
(48, 'Mèo Munchkin - Shadow', '11000000.00', ' Bé Shadow 2 tháng tuổi, thuộc giống đực.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                       ', 'Shadow', NULL, 'imageproduct/munchkinc1.jpg', 0, 8, 'Có Sẵn'),
(49, 'Mèo Munchkin - Shine', '10000000.00', ' Bé Shine 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                       ', 'Shine', NULL, 'imageproduct/munchkina.jpg', 0, 8, 'Có sẵn'),
(50, 'Mèo Munchkin - Hann', '11000000.00', '  Bé Han 2 tháng tuổi, thuộc giống cái.\r\nKhách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng\r\n                                                                                                                      ', 'Hann', NULL, 'imageproduct/munchkind1.jpg', 0, 8, 'Có Sẵn'),
(51, 'Mèo Ba Tư - Blossom', '7000000.00', '  Bé Blossom 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Mèo Ba Tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                      ', 'Blossom', NULL, 'imageproduct/meobatud.jpg', 0, 9, 'Có Sẵn'),
(52, 'Mèo Ba Tư - Benny', '10000000.00', 'Bé Benny 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Mèo Ba Tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                        ', 'Benny', NULL, 'imageproduct/meobatua.jpg', 0, 9, 'Có Sẵn'),
(53, 'Mèo Ba Tư - Buddy', '10000000.00', 'Bé Buddy 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Ba Tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                        ', 'Buddy', NULL, 'imageproduct/meobatub1.jpg', 0, 9, 'Có Sẵn'),
(54, 'Mèo Ba Tư - Prince', '7000000.00', 'Bé Prince 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Ba Tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                        ', 'Prince', NULL, 'imageproduct/meobatuc.jpg', 0, 9, 'Có Sẵn'),
(55, 'Mèo Báo Bengal - Destiny', '15000000.00', 'Bé Destiny 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Báo Bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Destiny', NULL, 'imageproduct/meobaobengald.jpg', 0, 10, 'Có sẵn'),
(56, 'Mèo Báo Bengal - Chico', '16000000.00', 'Bé Chico 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Mèo Báo Bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                ', 'Chico', NULL, 'imageproduct/meobaobengalc.jpg', 0, 10, 'Có sẵn'),
(57, 'Mèo Báo Bengal - Simon', '15000000.00', '  Bé Simon 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Báo Bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                              ', 'Simon', NULL, 'imageproduct/meobaobengala1.jpg', 0, 10, 'Có sẵn'),
(58, 'Mèo Báo Bengal - Star', '17000000.00', '  Bé Star 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Báo Bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                              ', 'Star', NULL, 'imageproduct/meobaogalb1.jpg', 0, 10, 'Có Sẵn'),
(59, 'Chó Poodle - Rainbow', '10000000.00', ' Bé Rainbow 2 tháng tuổi, thuộc giống cái, màu sắc nâu đỏ, thuộc loại Poodle Teacup.\r\nKhách hàng hoàn toàn an tâm khi mua Poodle con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng                                       ', 'Rainbow', NULL, 'imageproduct/poodle.jpg', 0, 1, 'Không có sẵn'),
(60, 'Chó Pug - Cody', '15000000.00', 'Bé Cody 2 tháng tuổi, màu vàng kim, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                     ', 'Cody', NULL, 'imageproduct/pug1.jpg', 0, 2, 'Có Sẵn'),
(61, 'Chó Pug - Cash', '10000000.00', 'Bé Cash 2 tháng tuổi, màu vàng kim, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.\r\n                                        ', 'Cash', NULL, 'imageproduct/pug2.jpg', 0, 2, 'Có sẵn'),
(62, 'Chó Pug - Loki', '11000000.00', ' Bé Loki 2 tháng tuổi, màu đen, thuộc giống cái Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Loki', NULL, 'imageproduct/pug3a.jpg', 0, 2, 'Có sẵn'),
(63, 'Chó Pug - Summer', '11000000.00', ' Bé Summer 2 tháng tuổi, màu vàng kim, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Pug con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Summer', NULL, 'imageproduct/pug4a.jpg', 0, 2, 'Có Sẵn'),
(64, 'Chó Corgi - Molly', '15000000.00', ' Bé Molly 2 tháng tuổi,thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Molly', NULL, 'imageproduct/corgi1a.jpg', 0, 3, 'Có Sẵn'),
(65, 'Chó Corgi - Sugar', '15000000.00', 'Bé Sugar 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Sugar', NULL, 'imageproduct/corgi2.jpg', 0, 3, 'Có Sẵn'),
(66, 'Chó Corgi - Winner', '18000000.00', 'Bé Winner 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Winner', NULL, 'imageproduct/corgi3.jpg', 0, 3, 'Có Sẵn'),
(67, 'Chó Corgi - Darling', '15000000.00', ' Bé Darling 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Corgi con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Darling', NULL, 'imageproduct/corgi4a.jpg', 0, 3, 'Có Sẵn'),
(68, 'Chó Husky - Funny', '15000000.00', 'Bé Funny 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Funny', NULL, 'imageproduct/husky1a.jpg', 0, 4, 'Có Sẵn'),
(69, 'Chó Husky - Cloud', '15000000.00', ' Bé Cloud 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                               ', 'Cloud', NULL, 'imageproduct/husky2.jpg', 0, 4, 'Có Sẵn'),
(70, 'Chó Husky - Sweet', '18000000.00', '  Bé Sweet 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                      ', 'Sweet', NULL, 'imageproduct/husky3.jpg', 0, 4, 'Có Sẵn'),
(71, 'Chó Husky - Treasure', '18000000.00', ' Bé Treasure 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Husky con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                       ', 'Treasure', NULL, 'imageproduct/husky4a.jpg', 0, 4, 'Không có sẵn'),
(72, 'Chó Shiba Inu - Gold', '25000000.00', '   Bé Gold 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                     ', 'Gold', NULL, 'imageproduct/shibainu1.jpg', 0, 5, 'Có Sẵn'),
(73, 'Chó Shiba Inu - Mindy', '15000000.00', '     Bé Mindy 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                           ', 'Mindy', NULL, 'imageproduct/shibainu2.jpg', 0, 5, 'Có Sẵn'),
(74, 'Chó Shiba Inu - Min', '19000000.00', '   Bé Min 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                             ', 'Min', NULL, 'imageproduct/shibainu3.jpg', 0, 5, 'Có Sẵn'),
(75, 'Chó Shiba Inu - Candy', '20000000.00', '     Bé Candy 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Shiba Inu con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                           ', 'Candy', NULL, 'imageproduct/shibainu4.jpg', 0, 5, 'Có Sẵn'),
(76, 'Chó Golden - Miss', '15000000.00', '      Bé Miss 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                          ', 'Miss', NULL, 'imageproduct/golden1.jpg', 0, 6, 'Có Sẵn'),
(77, 'Chó Golden - Sun', '15000000.00', '    Bé Sun 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                            ', 'Sun', NULL, 'imageproduct/golden2.jpg', 0, 6, 'Có Sẵn'),
(78, 'Chó Golden - Bảo bối', '11000000.00', '   Bé Bảo bối 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                             ', 'Bảo bối', NULL, 'imageproduct/golden3.jpg', 0, 6, 'Có Sẵn'),
(79, 'Chó Golden - Tea', '15000000.00', '    Bé Tea 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Golden con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                    ', 'Tea', NULL, 'imageproduct/golden4.jpg', 0, 6, 'Có Sẵn'),
(80, 'Mèo ba tư - Smooth', '15000000.00', '   Bé Smooth 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo ba tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                     ', 'Smooth', NULL, 'imageproduct/meobatu1.jpg', 0, 9, 'Có Sẵn'),
(81, 'Mèo ba tư - Fresh', '10000000.00', '   Bé Fresh 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo ba tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                             ', 'Fresh', NULL, 'imageproduct/meobatu2.jpg', 0, 9, 'Có Sẵn'),
(82, 'Mèo Ba Tư - Sea', '15000000.00', '   Bé Sea 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo ba tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                             ', 'Sea', NULL, 'imageproduct/meobatu3.jpg', 0, 9, 'Có Sẵn'),
(83, 'Mèo Ba Tư - Sone', '11000000.00', '     Bé Sone 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo ba tư con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                           ', 'Sone', NULL, 'imageproduct/meobatu4.png', 0, 9, 'Có Sẵn'),
(84, 'Mèo Báo Bengal - Mark', '15000000.00', '    Bé Mark 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo báo bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                            ', 'Mark', NULL, 'imageproduct/bengal1.jpg', 0, 10, 'Có Sẵn'),
(85, 'Mèo Báo Bengal - Nico', '14000000.00', '     Bé Nico 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo báo bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                                                                   ', 'Nico', NULL, 'imageproduct/bengal2.jpg', 0, 10, 'Có Sẵn'),
(86, 'Mèo Báo Bengal - Tiger', '15000000.00', '     Bé Tiger 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo báo bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                                                                                                                                                                                                                   ', 'Tiger', NULL, 'imageproduct/bengal3a.jpg', 0, 10, 'Có Sẵn'),
(87, 'Mèo Báo Bengal - Toshio ', '15000000.00', 'Bé Toshio 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo báo bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Toshio ', NULL, 'imageproduct/bengal4.jpg', 0, 10, 'Có Sẵn'),
(88, 'Mèo Munchkin - Yori', '12000000.00', 'Bé Yori 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Yori', NULL, 'imageproduct/munchkin1.jpg', 0, 8, 'Có Sẵn'),
(89, 'Mèo Munchkin - Masa', '15000000.00', ' Bé Masa 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo báo bengal con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Masa', NULL, 'imageproduct/munchkin2.jpg', 0, 8, 'Không có sẵn'),
(90, 'Mèo Báo Bengal - Shin', '10000000.00', 'Bé Shin 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Shin', NULL, 'imageproduct/munchkin3a.jpg', 0, 8, 'Có sẵn'),
(91, 'Mèo báo bengal - Kin', '10000000.00', ' Bé Kin 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Munchkin con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                       ', 'Kin', NULL, 'imageproduct/munchkin4.jpg', 0, 8, 'Có Sẵn'),
(92, 'Mèo Anh Lông Ngắn - Jun', '10000000.00', 'Bé Jun 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                        ', 'Jun', NULL, 'imageproduct/meoanhlongngan1a.jpg', 0, 7, 'Có Sẵn'),
(93, 'Mèo Anh Lông Ngắn - Seto', '11000000.00', 'Bé Seto 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                ', 'Seto', NULL, 'imageproduct/meoanhlongngan2.jpg', 0, 7, 'Có sẵn'),
(94, 'Mèo Anh Lông Ngắn - Kuma', '11000000.00', ' Bé Kuma 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                               ', 'Kuma', NULL, 'imageproduct/meoanhlongngan3.jpg', 0, 7, 'Có sẵn'),
(95, 'Mèo Anh Lông Ngắn - Sho', '16000000.00', 'Bé Sho 2 tháng tuổi, thuộc giống đực. Khách hàng hoàn toàn an tâm khi mua Mèo Anh Lông Ngắn con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Mèo con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                                                                ', 'Sho', NULL, 'imageproduct/meoanhlongngan4.jpg', 1, 7, 'Không có sẵn'),
(99, 'Chó Poodle - Bae', '7000000.00', 'Bé Bae 2 tháng tuổi, thuộc giống cái. Khách hàng hoàn toàn an tâm khi mua Poodle con thuần chủng của thương hiệu chúng tôi vì: -Hợp đồng mua bán rõ ràng. -Bảo hành sức khỏe dài hạn. -Tiêm phòng, tẩy giun đầy đủ. -Chó con có nguồn gốc rõ ràng. Được kiểm tra nghiêm ngặt về sức khỏe mới giao cho khách hàng.                                   ', 'Bae', '2021-03-11 09:03:12', 'imageproduct/poodleteacupa.jpg', 0, 1, 'Có sẵn');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `TypeId` int(11) NOT NULL,
  `TypeName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`TypeId`, `TypeName`) VALUES
(1, 'Chó'),
(2, 'Mèo');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `SaleId` int(11) NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `DecreasePercent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`SaleId`, `Content`, `StartDate`, `EndDate`, `DecreasePercent`) VALUES
(0, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(1, 'Giảm giá nhân dịp tết', '2021-03-10 19:24:50', '2021-03-11 09:44:00', 20),
(2, 'Ngày lễ...', '2021-03-11 15:20:00', '2021-03-11 15:50:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `FileName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `FileName`) VALUES
(1, 'imageslide/poodle2.jpg'),
(2, 'imageslide/doglove.jpg'),
(4, 'imageslide/dog10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `idw` int(11) NOT NULL,
  `idd` int(11) NOT NULL,
  `WardName` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`idw`, `idd`, `WardName`) VALUES
(1, 25, 'Xã Tân Thành'),
(3, 1, 'Phường Phạm Ngũ Lão'),
(4, 1, 'Nguyễn Cư Trinh'),
(5, 1, 'Phường Tân Định'),
(6, 2, 'Phường An Khánh'),
(7, 2, 'Phường Thủ Thiêm'),
(8, 2, 'Phường An Phú'),
(9, 2, 'Phường Bình An'),
(10, 2, 'Phường Bình Trưng Tây'),
(11, 3, 'Phường 1'),
(12, 3, 'Phường 2'),
(13, 3, 'Phường 3'),
(14, 3, 'Phường 4'),
(15, 19, 'Phường 1'),
(16, 19, 'Phường 3'),
(17, 19, 'Phường 5'),
(18, 19, 'Phường 6'),
(19, 20, 'Phường 1'),
(20, 20, 'Phường 3'),
(21, 20, 'Phường 5'),
(22, 20, 'Phường 7'),
(23, 23, 'Phường Tam Bình'),
(24, 23, 'Phường Tam Phú'),
(25, 23, 'Phường Trường Thọ'),
(26, 23, 'Phường Linh Tây'),
(27, 24, 'Phường Phú Trung'),
(28, 24, 'Phường Sơn Kỳ'),
(29, 24, 'Phường Tân Quý'),
(30, 24, 'Phường Tân Sơn Nhì'),
(31, 25, 'Xã Đại Thành'),
(32, 25, 'Xã Hiệp Lợi'),
(33, 25, 'Phường Lái Hiếu'),
(34, 25, 'Phường Lái Thành'),
(35, 25, 'Phường Hiệp Thành'),
(36, 26, 'Xã Vị Bình'),
(37, 26, 'Xã Vị Thủy'),
(38, 26, 'Xã Vị Thanh'),
(39, 26, 'Xã Vị Trung'),
(40, 27, 'Phường An Phú'),
(42, 27, 'Phường An Cư'),
(43, 27, 'Phường Xuân Khánh'),
(44, 27, 'Phường Hưng Lợi'),
(45, 27, 'Phường An Nghiệp'),
(46, 28, 'Phường Long Tuyền'),
(47, 28, 'Phường Trà Nóc'),
(48, 28, 'Phường Trà An'),
(49, 28, 'Phường Long Hòa'),
(50, 28, 'Phường An Thới'),
(51, 29, 'Phường Ba Láng'),
(52, 29, 'Phường Hưng Phú'),
(53, 29, 'Phường Tân Phú'),
(54, 29, 'Phường Hưng Thạnh'),
(55, 29, 'Phường Thường Thạnh'),
(56, 30, 'Phường Thới An'),
(57, 30, 'Phường Thới Hòa'),
(58, 30, 'Phường Phước Thới'),
(59, 30, 'Phường Thới Long'),
(60, 30, 'Phường Trường Lạc'),
(61, 31, 'Phường Tân Hưng'),
(62, 31, 'Phường Tân Lộc'),
(63, 31, 'Phường Trung Kiên'),
(64, 31, 'Phường Thuận Hưng'),
(65, 31, 'Phường Thuận An '),
(66, 32, 'Xã Đông Quang'),
(67, 32, 'Xã Tuyên Phong'),
(68, 32, 'Xã Thụy An'),
(69, 32, 'Xã Thuần Mỹ'),
(70, 32, 'Xã Yên Bài'),
(71, 33, 'Phường Quang Trung'),
(72, 33, 'Phường Quốc Tử Giám'),
(73, 33, 'Phường Quang Mai'),
(74, 34, 'Phường Bồ Đề'),
(75, 34, 'Phường Gia Thụy'),
(76, 34, 'Phường Long Biên'),
(77, 35, 'Phường Cửa Nam'),
(79, 35, 'Phường Cửa Đông'),
(80, 35, 'Phường Lý Thái Tổ'),
(81, 35, 'Phường Phan Chu Trinh'),
(83, 35, 'Phường Cửa Đông'),
(86, 36, 'Xã An Thái'),
(87, 36, 'Xã Tân Viên'),
(88, 36, 'Xã Thái Sơn'),
(89, 36, 'Xã Trường Thọ'),
(90, 37, 'Xã An Hòa'),
(91, 37, 'Xã An Hồng'),
(92, 37, 'Xã An Hưng'),
(93, 37, 'Xã Lê Thiện'),
(94, 38, 'Phường Đông Hải'),
(95, 38, 'Phường Đằng Giang'),
(96, 38, 'Phường Đằng Lâm'),
(97, 38, 'Phường Đông Hải 1'),
(98, 39, 'Phường Hưng Đạo'),
(99, 39, 'Phường Tân Thành'),
(100, 39, 'Phường Đa Phúc'),
(101, 39, 'Phường Hòa Nghĩa'),
(102, 40, 'Thị Trấn Bạch Long Vĩ'),
(103, 41, 'Xã Hòa Châu'),
(104, 41, 'Xã Hòa Phú'),
(105, 41, 'Xã Hòa Phước'),
(106, 41, 'Xã Hòa Ninh'),
(107, 42, 'Đảo Nam'),
(108, 42, 'Đảo Hoàng Sa'),
(109, 42, 'Xã Linh Côn'),
(110, 46, 'Xã Phong Điền'),
(111, 46, 'Xã Phong Mỹ'),
(112, 46, 'Xã Phong Sơn'),
(113, 47, 'Xã Lộc Thủy'),
(114, 47, 'Xã Lộc Bình'),
(115, 47, 'Xã Lộc Sơn'),
(116, 50, 'Xã Hương An'),
(117, 50, 'Xã Hương Bình'),
(118, 50, 'Xã Hương Hồ'),
(119, 51, 'Xã Phú Hội'),
(120, 51, 'Xã Phú Hữu'),
(121, 51, 'Xã Phước Hưng'),
(122, 53, 'Xã Vĩnh An'),
(123, 53, 'Xã Vĩnh Bình'),
(124, 53, 'Xã Tân Phú'),
(125, 54, 'Phường Núi Sam'),
(126, 54, 'Phường Châu Đốc A'),
(127, 54, 'Phường Châu Đốc B'),
(128, 55, 'Phường Bình Khánh'),
(129, 55, 'Phường Bình Đức'),
(130, 55, 'Phường Mỹ Phước'),
(131, 56, 'Xã Khánh Hội'),
(132, 56, 'Xã Khánh Hòa'),
(133, 56, 'Thị Trấn U Minh'),
(134, 57, 'Xã Tân Đức'),
(135, 57, 'Xã Tân Tiến'),
(136, 57, 'Xã Tạ An Khương'),
(137, 59, 'Phường 1'),
(138, 59, 'Phường 2'),
(139, 59, 'Phường 4'),
(140, 59, 'Phường 5'),
(141, 59, 'Phường 6'),
(142, 59, 'Phường 7'),
(143, 60, 'Xã Tam Giang'),
(145, 60, 'Thị Trấn Năm Căn'),
(146, 61, 'Xã Hồng Giang'),
(147, 61, 'Xã Biển Động'),
(148, 61, 'Xã Hồng Giang'),
(149, 62, 'Xã Cẩm Lý'),
(150, 62, 'Xã Bình Sơn'),
(151, 62, 'Xã Bảo Đài'),
(152, 63, 'Xã An Hà'),
(153, 63, 'Xã Tân Thanh'),
(154, 63, 'Xã Tân Thịnh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`),
  ADD KEY `TypeId` (`TypeId`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `NameLogin` (`NameLogin`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`NameLogin`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`idd`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD PRIMARY KEY (`ImageId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetailId`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `NameLogin` (`NameLogin`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `SaleId` (`SaleId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`TypeId`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`SaleId`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`idw`),
  ADD KEY `idd` (`idd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `imageproduct`
--
ALTER TABLE `imageproduct`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orderproduct`
--
ALTER TABLE `orderproduct`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `idw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`TypeId`) REFERENCES `producttype` (`TypeId`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`NameLogin`) REFERENCES `customer` (`NameLogin`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`id`) REFERENCES `city` (`id`);

--
-- Constraints for table `imageproduct`
--
ALTER TABLE `imageproduct`
  ADD CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orderproduct` (`OrderId`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`);

--
-- Constraints for table `orderproduct`
--
ALTER TABLE `orderproduct`
  ADD CONSTRAINT `orderproduct_ibfk_1` FOREIGN KEY (`NameLogin`) REFERENCES `customer` (`NameLogin`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SaleId`) REFERENCES `sale` (`SaleId`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`idd`) REFERENCES `district` (`idd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
