-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 08:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `AID` int(11) NOT NULL,
  `ANAME` varchar(150) NOT NULL,
  `APASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `BID` int(11) NOT NULL,
  `BNAME` varchar(150) NOT NULL,
  `CONTENT` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`BID`, `BNAME`, `CONTENT`) VALUES
(1, 'img/1505908661ban5.jpg', 'Enjoy Shopping'),
(2, 'img/1505908686ban1.jpg', 'Secure Shopping'),
(3, 'img/1505908711ban4.jpg', 'All Brands Are comming soon'),
(4, 'img/1505908755ban6.jpg', 'Largest Sales'),
(5, 'img/1505908771ban2.jpg', 'Easy to use');

-- --------------------------------------------------------

--
-- Table structure for table `bulkorder`
--

CREATE TABLE `bulkorder` (
  `BID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `MID` int(11) NOT NULL,
  `FNAME` varchar(150) NOT NULL,
  `LNAME` varchar(150) NOT NULL,
  `MAIL` varchar(150) NOT NULL,
  `PHONE` varchar(150) NOT NULL,
  `MES` varchar(150) NOT NULL,
  `LOGS` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `OID` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`OID`, `PID`) VALUES
(1, 4),
(2, 5),
(3, 6),
(4, 9),
(5, 12),
(6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(4, 5, 19990.00, '2025-03-03 17:25:51', '2025-03-03 17:25:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 2, 1, 1),
(4, 3, 53, 1),
(5, 3, 55, 10),
(6, 3, 1, 2),
(7, 4, 1, 1),
(8, 5, 17, 1),
(9, 6, 1, 1),
(10, 6, 2, 5),
(11, 7, 1, 3),
(12, 7, 10, 1),
(13, 1, 3, 1),
(14, 2, 4, 1),
(15, 3, 1, 13),
(16, 4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PID` int(11) NOT NULL,
  `PNAME` varchar(150) NOT NULL,
  `TNAME` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CID` int(11) NOT NULL,
  `OPRICE` varchar(150) NOT NULL,
  `NPRICE` varchar(150) NOT NULL,
  `STARS` int(11) NOT NULL,
  `REVIEW` int(11) NOT NULL,
  `DES` text NOT NULL,
  `DES2` varchar(150) NOT NULL,
  `LOC` varchar(150) NOT NULL,
  `SUB_PRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `PNAME`, `TNAME`, `CID`, `OPRICE`, `NPRICE`, `STARS`, `REVIEW`, `DES`, `DES2`, `LOC`, `SUB_PRO`) VALUES
(1, 'Apple iphone 6 (space grey,16gb)', NULL, 1, '35210', '30380', 4, 23, '1. 4.7-inch (diagonal) Retina HD display with 1334-by-750 resolution.\r\n2.A8 chip with M8 motion coprocessor\r\n', '3.8-megapixel iSight camera with Focus Pixels and True Tone flash\r\n4.1080p HD video recording at 60 fps and slo-mo video recording at 240 fps\r\n', '15059053311.jpg', 0),
(2, 'Lenovo Vibe K5', NULL, 1, '8000', '7500', 5, 45, '1.13MP primary camera with auto focus, LED flash and 5MP front facing camera\r\n2.12.7 centimeters (5-inch) HD IPS capacitive touchscreen with 1280 x 720 pixels resolution\r\n', '3.Twin high quality stereo speakers with Dolby Atmos\r\n4.Dedicated expandable microSD card slot\r\n', '15059054741.jpg', 0),
(3, 'Redmi 4A ', NULL, 1, '7999', '5999', 3, 12, '13MP primary camera with 5-elements lens, f/2.2 aperture, PDAF, high dynamic range (HDR), panaroma, 1080p full HD video recording and 5MP front facing camera\r\n12.7 centimeters (5-inch) IPS capacitive touchscreen with 1280 x 720 pixels resolution and 296 ppi pixel density\r\n', 'Android v6.0.1 Marshmallow Miui 8 operating system with 1.4GHz Cortex A53 64-bit Qualcomm snapdragon 425 quad core processor, 2GB RAM, 16GB internal m', '15059060751.png', 0),
(4, 'Moto G5 Plus ', NULL, 1, '16999', '14990', 5, 52, '12MP primary camera (f1.7) with dual auto focus pixels and 5MP front facing camera, color balancing dual LED flash, 8x digital zoom for photos, 4x for video, drag to focus exposure\r\n4GB RAM and 32GB internal memory expandable up to 128GB\r\n', 'Android v7 Nougat operating system | Qualcomm Snapdragon 625 octa-core processor (2GHz) with Adreno 506 GPU\r\nDual nano SIM with dual-standby (4G+4G)\r\n', '15059061821.jpg', 0),
(5, 'Lenovo110', NULL, 4, '23990', '21990', 4, 54, '2.5GHz AMD A8-7410 processor\r\n4GB DDR3L RAM\r\n', '1TB 5400rpm Serial ATA hard drive\r\n15.6-inch screen, Integrated Graphics\r\nWindows 10 Home operating system\r\n2.2kg laptop\r\n', '15059063371.jpg', 0),
(6, 'HP 15-bg008AU ', NULL, 4, '22450', '19990', 4, 12, '1.8GHz AMD E2-7110 processor\r\n4GB DDR3L RAM\r\n500GB 5400rpm Serial ATA hard drive\r\n', '15.6-inch screen, AMD Radeon R2 Series Graphics\r\nWindows 10 Home (64-bit) operating system\r\n2.19kg laptop\r\nHP TrueVision HD webcam with 1280 x 720 by ', '15059065201.jpg', 0),
(7, 'Acer Switch 10E ', NULL, 4, '15990', '12990', 4, 12, '1.44GHz Intel Atom x5-Z8300 processor\r\n2GB DDR3L RAM\r\n32GB flash storage\r\n', 'Windows 10 Home operating system\r\n12 hours battery life, 1.2kg laptop\r\n', '15059066151.jpg', 0),
(8, 'Dell Vostro ', NULL, 4, '35990', '31990', 4, 56, '2.4GHz Intel i3 - 7100U 7th Gen processor\r\n4GB DDR4 RAM\r\n1TB 5400rpm Serial ATA hard drive\r\n', 'Windows 10 operating system\r\nVGA+HDMI connectivity option - Only notebook in the range with this option\r\nAnti glare display\r\n', '15059067131.jpg', 0),
(9, 'SanDisk Cruzer', NULL, 2, '520', '379', 4, 14, 'Compact Design for Maximum Portability.\r\nStore more with capacities up to 16gb 5-year limited warranty.\r\nHigh-Capacity Drive Accommodates Your Favorite Media Files\r\n', 'SanDisk SecureAccess Software Protects Drive from Unauthorized Access\r\nThe models are different because production is from different countries. Otherw', '15059068621.jpg', 0),
(10, 'SanDisk Ultra ', NULL, 2, '1200', '803', 4, 21, 'Free up space on your OTG-enabled Android phone\r\nBack up your mobile photos, videos and contacts\r\nRetractable design with dual micro-USB and USB 3.0 connectors\r\n', 'High-speed USB 3.0 performance with up to 130mbps file transfer from drive to computer\r\nSanDisk Memory Zone application (available on Google Play) let', '15059069351.jpg', 0),
(11, 'HP V215B ', NULL, 0, '2200', '1800', 7, 41, 'Compact cap-less design\r\nDurable metal finish\r\n', 'Creative HP logo charm\r\nCompatible with Windows 2000, 7, 8, XP, Vista\r\n', '', 0),
(12, 'HP V215B ', NULL, 2, '2200', '1800', 4, 47, 'Compact cap-less design\r\nDurable metal finish\r\n', 'Creative HP logo charm\r\nCompatible with Windows 2000, 7, 8, XP, Vista\r\n', '15059070961.jpg', 0),
(13, 'Sony Micro ', NULL, 2, '850', '650', 3, 45, 'super sleek design\r\nplug and play\r\n', 'metal body\r\nhigh speed data transfer\r\nusb 2.0 with 16gb memory\r\n', '15059072021.jpg', 0),
(14, 'SanDisk Ultra SD', NULL, 3, '854', '649', 5, 42, 'Capacities up to 32GB to capture, carry and keep it all\r\nFast transfer speeds of up to 80mbps\r\nFeaturing Class 10 for full HD video\r\n', 'Waterproof, X-ray proof, temperature proof and shockproof\r\nClass 10 speed rating for full HD video capture\r\nDurable design\r\n', '15059072941.jpg', 0),
(15, 'Transcend TS', NULL, 3, '854', '680', 3, 15, 'Extra-large capacity for storing high resolution movies and pictures\r\nBuilt-in error correction code (ECC) to automatically detect and fix transfer errors\r\n', 'Exceptional reliability and long-life data retention\r\nSupports content protection for recordable media (CPRM)\r\n', '15059073601.jpg', 0),
(16, 'Samsung', NULL, 3, '4533', '3099', 5, 45, 'Class 10', 'High Performance', '15059075561.jpg', 0),
(17, 'Strontium', NULL, 3, '325', '259', 4, 15, 'Ultra-Portable with Small Physical Size\r\nVersatile: Convert to SD Card with Adaptor\r\nEasy Plug and Play\r\n', 'Support SD System Specification Version 2.2\r\nMin Data Transfer Rate of: 6MB/s for Class 8\r\nLifetime Strontium Limited Warranty\r\n', '15059076401.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_fav`
--

CREATE TABLE `product_fav` (
  `FID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `IP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_fav`
--

INSERT INTO `product_fav` (`FID`, `UID`, `PID`, `IP`) VALUES
(3, 2, 1, ''),
(4, 2, 2, ''),
(5, 2, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `pro_category`
--

CREATE TABLE `pro_category` (
  `CID` int(11) NOT NULL,
  `CNAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pro_category`
--

INSERT INTO `pro_category` (`CID`, `CNAME`) VALUES
(1, 'Mobiles'),
(2, 'Pen drive'),
(3, 'Memory Card'),
(4, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `rate_review`
--

CREATE TABLE `rate_review` (
  `CRID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `PID` int(11) NOT NULL,
  `MSG` varchar(150) NOT NULL,
  `LOG` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IP` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `RID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `MES` text NOT NULL,
  `LOGS` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`RID`, `UID`, `MES`, `LOGS`) VALUES
(2, 5, 'very useful', '2025-03-03 16:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `shop_keeper`
--

CREATE TABLE `shop_keeper` (
  `SKID` int(11) NOT NULL,
  `SKNAME` varchar(150) NOT NULL,
  `SKPASS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_keeper`
--

INSERT INTO `shop_keeper` (`SKID`, `SKNAME`, `SKPASS`) VALUES
(1, 'keeper', 'keeper');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `UID` int(11) NOT NULL,
  `STR1` text NOT NULL,
  `STR2` text NOT NULL,
  `LAND` text NOT NULL,
  `UNAME` varchar(150) NOT NULL,
  `UPASS` varchar(150) NOT NULL,
  `UMAIL` varchar(150) NOT NULL,
  `UPHONE` varchar(150) NOT NULL,
  `UPLACE` varchar(150) NOT NULL,
  `APHONE` varchar(150) NOT NULL,
  `LOGS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`UID`, `STR1`, `STR2`, `LAND`, `UNAME`, `UPASS`, `UMAIL`, `UPHONE`, `UPLACE`, `APHONE`, `LOGS`) VALUES
(4, '', '', '', 'Latha', '12345678', 'latha@gmai.com', '5698741230', 'salem', '', '2025-03-03 17:15:54'),
(5, '7arts', 'cherry road', 'college near', 'mahes', '12345678', 'mahes@gmail.com', '8529637410', 'salem', '7896541230', '2025-03-03 17:18:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `bulkorder`
--
ALTER TABLE `bulkorder`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `product_fav`
--
ALTER TABLE `product_fav`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `pro_category`
--
ALTER TABLE `pro_category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `rate_review`
--
ALTER TABLE `rate_review`
  ADD PRIMARY KEY (`CRID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `shop_keeper`
--
ALTER TABLE `shop_keeper`
  ADD PRIMARY KEY (`SKID`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bulkorder`
--
ALTER TABLE `bulkorder`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `OID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_fav`
--
ALTER TABLE `product_fav`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pro_category`
--
ALTER TABLE `pro_category`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rate_review`
--
ALTER TABLE `rate_review`
  MODIFY `CRID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_keeper`
--
ALTER TABLE `shop_keeper`
  MODIFY `SKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
