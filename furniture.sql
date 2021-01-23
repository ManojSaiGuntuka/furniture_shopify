-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 10:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(10) CHARACTER SET latin1 NOT NULL,
  `randPass` varchar(255) CHARACTER SET latin1 DEFAULT ' $2y$10$iusesomecrazystring22 ',
  `email` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `password`, `randPass`, `email`) VALUES
(1, 'manoj', 'admin', ' $2y$10$iusesomecrazystring22 ', 'manoj@clickripple.com'),
(2, 'manoj', 'admin', ' $2y$10$iusesomecrazystring22 ', 'manoj@clickripple.com'),
(3, 'manojsai', 'user', ' $2y$10$iusesomecrazystring22 ', 'manoj1@clickrippe.com'),
(4, 'manojuser', 'user1', ' $2y$10$iusesomecrazystring22 ', 'manoj@clickripple.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_tags` varchar(255) NOT NULL,
  `cat_image` text NOT NULL,
  `cat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_tags`, `cat_image`, `cat_date`) VALUES
(351, 'Table', 'a006', 'tr3.png', '2020-10-14'),
(353, 'Bed', 'b12', '5.png', '2020-10-14'),
(364, 'Sofa', 'S001', '12.png', '2020-10-14'),
(366, 'Chair', 'b12', '4.png', '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupId` int(11) NOT NULL,
  `group_name` char(50) NOT NULL,
  `commission` varchar(50) NOT NULL,
  `group_category` varchar(50) NOT NULL,
  `group_leader` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupId`, `group_name`, `commission`, `group_category`, `group_leader`) VALUES
(1, 'Active', '10%', 'B', 'Ankit'),
(2, 'Active', '18%', 'A', 'Mohit'),
(4, 'Active', '12%', 'C', 'Manoj Sai');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `mat_id` int(11) NOT NULL,
  `mat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`mat_id`, `mat_title`) VALUES
(1, 'Memory Foam'),
(2, 'Oak'),
(3, 'Teak Wood'),
(4, 'Royal Oak'),
(5, 'Foam');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` varchar(11) NOT NULL,
  `orderDate` date NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `productCode` varchar(11) NOT NULL,
  `retail_source` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_item` double NOT NULL,
  `total_price` double DEFAULT NULL,
  `order_groupId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `orderDate`, `customerName`, `productCode`, `retail_source`, `quantity`, `price_per_item`, `total_price`, `order_groupId`, `productName`) VALUES
(1, '1', '2020-10-09', 'Jack', '11', 'Clickripple Digital Solution', 2, 50, 100, 1, 'Queen Bed'),
(2, '201', '2020-10-12', 'Mohit', '12', 'IKEA', 1, 100, 100, 1, 'TeaTable'),
(3, '8', '2020-10-13', 'Krinua Acharyaa', '3', 'Walmart Canada', 4, 5, 20, 1, 'Dinning Chair'),
(4, '7', '2020-10-18', 'Aryan ', '109', 'Cosco Wholesale', 10, 12, 120, 4, 'BlackChair'),
(7, 'A001', '2020-10-14', 'ABCD', 'A000', 'Walmart', 20, 20, 40, 1, 'Small Sofa'),
(13, 'A001', '2020-10-15', 'Manoj', 'C01', 'Walmart', 40, 20, 40, 1, 'Tea Table');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `productId` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `productCode` varchar(50) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productStatus` varchar(50) DEFAULT NULL,
  `productImage` text DEFAULT NULL,
  `shippingDate` datetime DEFAULT NULL,
  `productColor` varchar(50) DEFAULT NULL,
  `productSize` varchar(50) DEFAULT NULL,
  `productPrice` float DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `cat_title` varchar(255) DEFAULT NULL,
  `mat_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `variant_inventory_tracker` varchar(255) DEFAULT 'Clickripplefurniture',
  `variant_inventory_policy` varchar(255) DEFAULT 'allow',
  `available` varchar(255) DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`productId`, `product_id`, `user_id`, `categoryId`, `productCode`, `productName`, `productStatus`, `productImage`, `shippingDate`, `productColor`, `productSize`, `productPrice`, `Stock`, `Description`, `cat_title`, `mat_id`, `vendor_id`, `variant_inventory_tracker`, `variant_inventory_policy`, `available`) VALUES
(1, 1, 1, 0, '', 'Queen Bed', '', '', '0000-00-00 00:00:00', '', '', 0, 0, '                                                                                      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D                                                                               ', '', 0, 0, 'Clickripplefurniture', 'allow', 'true'),
(2, 30, 1, 0, '', 'Teatable 1', '', '', '0000-00-00 00:00:00', '', '', 0, 0, '                                                                                  Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark \"W x 20.5\"D                                                                               ', '', 0, 0, 'Clickripplefurniture', 'allow', 'true'),
(3, 1, 1, 0, '', 'Queen Bedsadsa', '', '', '0000-00-00 00:00:00', '', '', 0, 0, '                                                                                      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D                                                                               ', '', 0, 0, 'Clickripplefurniture', 'allow', 'true'),
(5, 1, 1, 0, '', 'Queen Bed', 'active', '', '0000-00-00 00:00:00', 'Black', '4', 0, 0, '                                                                                      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D                                                                               ', '', 0, 0, '', '', ''),
(10, NULL, 1, NULL, NULL, 'Queen Bed', NULL, NULL, NULL, NULL, NULL, 0, NULL, '                                                                                      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D                                                                               ', NULL, NULL, NULL, 'Clickripplefurniture', 'allow', 'true'),
(11, NULL, 1, NULL, NULL, 'Teatable', NULL, NULL, NULL, NULL, NULL, 0, NULL, '                                                                                  Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D                                                                               ', NULL, NULL, NULL, 'Clickripplefurniture', 'allow', 'true'),
(13, 0, 1, NULL, NULL, 'Black Chair New Edit ', NULL, 'tr4.png', NULL, NULL, NULL, 0, 0, 'Black wood chair with solid wood legs with fabric upholstered seat from homedot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D \r\n\r\nSeat Height -->\r\n18\"\r\nWeight (lbs) -->\r\n11\r\nWood Stain -->\r\nBlack\r\nMaterials -->\r\nSolid and veneered Oak, plywood\r\nBox Dimensions -->\r\n22\" x 29\" x 42\"\r\nSKU No -->\r\nSKU11396                                                                              ', NULL, NULL, NULL, 'Clickripplefurniture', 'allow', 'true'),
(14, 0, 1, NULL, NULL, 'Black Chair ccc', NULL, '', NULL, NULL, NULL, 0, 0, '', NULL, NULL, NULL, 'Clickripplefurniture', 'allow', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productStatus` varchar(50) NOT NULL,
  `productImage` text NOT NULL,
  `shippingDate` datetime NOT NULL,
  `productColor` varchar(50) NOT NULL,
  `productSize` varchar(50) NOT NULL,
  `productPrice` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Description` text NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `mat_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `variant_inventory_tracker` varchar(255) NOT NULL DEFAULT 'Clickripplefurniture',
  `variant_inventory_policy` varchar(255) NOT NULL DEFAULT 'allow',
  `available` varchar(255) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `categoryId`, `productCode`, `productName`, `productStatus`, `productImage`, `shippingDate`, `productColor`, `productSize`, `productPrice`, `Stock`, `Description`, `cat_title`, `mat_id`, `vendor_id`, `variant_inventory_tracker`, `variant_inventory_policy`, `available`) VALUES
(1, 351, 'B0011', 'Queen Bed', 'Regular', 'queen_bed.jpg', '2020-12-03 17:20:22', 'Black', '25lbs', 1533, 10, '      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 1, 1, 'Clickripplefurniture', 'true', 'true'),
(30, 351, 'A000', 'Teatable', 'Regular', 'tr2.png', '2020-10-14 22:42:18', 'Black', '25lbs', 16.99, 5, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 4, 2, 'Clickripplefurniture', 'true', 'true'),
(31, 351, 'c004', 'Dinning chair', 'Sell', 'tr3.png', '2020-10-14 22:43:16', 'Gray', '25lbs', 200.12, 3, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 3, 1, 'Clickripplefurniture', 'true', 'true'),
(41, 353, 'B007', 'Twin Size Bed', 'Regular', 'queen_bed.jpg', '2020-11-04 01:37:12', 'White', '35lbs', 199, 4, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 5, 3, 'Clickripplefurniture', 'true', 'true'),
(47, 364, 'A02', 'Small Sofa ', 'sell', 'tr3.png', '2020-11-04 01:55:49', 'Gray', '10lbs', 2000, 5, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 3, 2, 'Clickripplefurniture', 'true', 'true'),
(57, 351, 'B009', 'Tea Table', 'Regular', 'tr1.png', '2020-11-04 09:52:55', 'White', '10lbs', 200.12, 8, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 2, 1, 'Clickripplefurniture', 'true', 'true'),
(58, 364, 'B005', 'Double Size bed ', 'Regular', 'queen_bed.jpg', '2020-11-04 09:54:44', 'White', '45lbs', 400.24, 9, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 2, 2, 'Clickripplefurniture', 'true', 'true'),
(59, 353, 'B0012', 'Stylists Bed', 'Regular', 'queen_bed.jpg', '2020-11-04 09:58:33', 'Blue', '45lbs', 500.22, 8, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 5, 3, 'Clickripplefurniture', 'true', 'true'),
(61, 351, 'C01', 'Teatable', 'Regular', 'tr1.png', '2020-11-04 11:45:32', 'Brown', '10lbs', 16.99, 12, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 4, 1, 'Clickripplefurniture', 'true', 'true'),
(62, 353, 'B008', 'King Bed', 'Regular', 'queen_bed.jpg', '2020-11-04 13:00:27', 'Black', '45lbs', 799, 19, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 1, 1, 'Clickripplefurniture', 'true', 'true'),
(63, 353, 'B0067', 'bed', 'Regular', 'queen_bed.jpg', '2020-11-04 14:01:46', 'white', '45lbs', 200.12, 1, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 2, 3, 'Clickripplefurniture', 'true', 'true'),
(64, 351, 'C1', 'Black Chair', 'Regular', 'tr4.png', '2020-12-03 17:24:14', 'Black', '20lbs', 152, 4, ' Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D \r\n\r\nSeat Height -->\r\n18\"\r\nWeight (lbs) -->\r\n11\r\nWood Stain -->\r\nBlack\r\nMaterials -->\r\nSolid and veneered Oak, plywood\r\nBox Dimensions -->\r\n22\" x 29\" x 42\"\r\nSKU No -->\r\nSKU11396', '', 0, 1, 'Clickripplefurniture', 'true', 'true'),
(66, 366, 'B1526', 'Black Chair', 'Regular', 'tr4.png', '2021-01-06 11:49:29', 'Black', '48KG', 120, 200, '      Black wood chair with solid wood legs with f...', '', 0, 0, 'Clickripplefurniture', 'allow', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `retailer_id` int(11) NOT NULL,
  `retailer_address` varchar(255) NOT NULL,
  `retailer_name` varchar(255) NOT NULL,
  `retailer_group` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`retailer_id`, `retailer_address`, `retailer_name`, `retailer_group`) VALUES
(1, ' 200 wellesley st east', 'Costco Wholesale', 'A'),
(2, '100 Gerrard Square Shopping Centre', 'Walmart Canada', 'D'),
(3, '10000 Gerrard Square Shopping Centre', 'NoFrills', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `shopifybd`
--

CREATE TABLE `shopifybd` (
  `id` int(8) UNSIGNED NOT NULL,
  `store_url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `access_token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `install_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopifybd`
--

INSERT INTO `shopifybd` (`id`, `store_url`, `access_token`, `install_date`) VALUES
(1, 'clickrippleappfurniture.myshopify.com', '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', '2020-12-12 01:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `typeId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `matId` int(11) NOT NULL,
  `styleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`typeId`, `catId`, `matId`, `styleName`) VALUES
(1, 353, 1, 'Queen '),
(2, 353, 2, 'King'),
(3, 353, 3, 'Twin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT 'user123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'manojuser', 'admin', 'manoj', 'sai', 'manoj@click.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `watchListId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productCode` varchar(50) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productStatus` varchar(50) NOT NULL,
  `productImage` text NOT NULL,
  `shippingDate` datetime NOT NULL,
  `productColor` varchar(50) NOT NULL,
  `productSize` varchar(50) NOT NULL,
  `productPrice` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Description` text NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `mat_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `variant_inventory_tracker` varchar(255) NOT NULL DEFAULT 'Clickripplefurniture',
  `variant_inventory_policy` varchar(255) NOT NULL DEFAULT 'allow',
  `available` varchar(255) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`watchListId`, `user_id`, `productId`, `categoryId`, `productCode`, `productName`, `productStatus`, `productImage`, `shippingDate`, `productColor`, `productSize`, `productPrice`, `Stock`, `Description`, `cat_title`, `mat_id`, `vendor_id`, `variant_inventory_tracker`, `variant_inventory_policy`, `available`) VALUES
(25, 1, 1, 351, 'B0011', 'Queen Bed', 'Regular', 'queen_bed.jpg', '2020-12-03 17:20:22', 'Black', '4/4', 1533, 10, '      Black wood chair with solid wood legs with fabric upholstered seat from homedotdot / 2xhome. Inspiration for light concrete floor with dark wood table for dining room, remodel with white painted walls.      General Dimensions -->  31\"H x 18.5\"W x 20.5\"D ', '', 1, 1, 'Clickripplefurniture', 'true', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`mat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`retailer_id`);

--
-- Indexes for table `shopifybd`
--
ALTER TABLE `shopifybd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`typeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`watchListId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopifybd`
--
ALTER TABLE `shopifybd`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `watchListId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
