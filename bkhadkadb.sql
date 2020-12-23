-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2020 at 09:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkhadkadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `randPass` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `password`, `randPass`, `email`) VALUES
(18, 'Bhawani', 'admin', '$2y$10$iusesomecrazystring22', 'bhawanikhadka9@gmail.com'),
(21, 'anshul', 'admin', '$2y$10$iusesomecrazystring22', 'example123@gmail.com'),
(22, 'abc', 'abc', '$2y$10$iusesomecrazystring22', 'abc@gmail.com'),
(23, 'aaa', 'aaa', '$2y$10$iusesomecrazystring22', 'aaa@gmail.com'),
(24, 'abcde', 'abc', '$2y$10$iusesomecrazystring22', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums');

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
(351, 'Table', 'a006', '20160401_BG_A2_SmallTbl_Tall.jpg', '2020-10-14'),
(353, 'Bed', 'b12', '10.jpeg', '2020-10-14'),
(364, 'Sofa', 'S001', 'image1.jpg', '2020-10-14'),
(366, 'Chair', 'b12', 'mid.jpeg', '2020-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT 0,
  `choice` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `choice`) VALUES
(1, 1, 0, 'A - The PHP configuration file, php.ini, is the final and most immediate way to affect PHP\'s functionality.\r\n\r\n'),
(2, 1, 0, 'B - The php.ini file is read each time PHP is initialized.'),
(3, 1, 1, 'C - Both of above'),
(4, 1, 0, 'D - Non of the above'),
(5, 2, 0, 'A - Strings'),
(6, 2, 0, 'B - Arrays'),
(7, 2, 1, 'C - Objects'),
(8, 3, 0, 'A - Booleans'),
(9, 3, 1, 'B - NULL'),
(10, 3, 0, 'C - Doubles'),
(11, 3, 0, 'D - Strings'),
(12, 4, 0, 'A - Variable names must begin with a letter or underscore character.\r\n'),
(13, 4, 0, 'B - A variable name can consist of numbers, letters, underscores.\r\n'),
(14, 4, 0, 'C - you cannot use characters like + , - , % , ( , ) . & , etc in a variable name.\r\n'),
(15, 4, 1, 'D - All of the above.\r\n'),
(16, 5, 0, 'A - If the value is a number, it is false if exactly equal to zero and true otherwise.\r\n\r\n'),
(17, 5, 0, '\r\nB - If the value is a string, it is false if the string is empty (has zero characters) or is the string \"0\", and is true otherwise.'),
(18, 5, 0, 'C - Values of type NULL are always false.\r\n'),
(19, 5, 1, 'D - All of the above');

-- --------------------------------------------------------

--
-- Table structure for table `cms_categories`
--

CREATE TABLE `cms_categories` (
  `cat_id` int(4) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_categories`
--

INSERT INTO `cms_categories` (`cat_id`, `cat_title`) VALUES
(1, 'HTML5'),
(3, 'PHP/MYSQL'),
(15, 'Apache and Linux'),
(16, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(14, 1, 'Kiran', 'paudel23@gmail.com', 'hellllll', 'unapproved', '2020-05-30'),
(15, 22, 'Bhawani', 'bhawani.khadka@triosstudent.com', 'It works awesome  but very hard to understand beginners!!!', 'approved', '2020-05-30'),
(18, 22, 'Deck Bania', 'bania111@gmail.com', 'I feel hard to type code ', 'approved', '2020-05-30'),
(19, 24, 'Kiran', 'paudel34@gmail.com', 'Nice article', 'approved', '2020-06-07'),
(20, 23, 'Sahar', 'sahar123@gmail.com', 'Wow this is a nice blog', 'unapproved', '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`, `region_id`) VALUES
(40, 'Meru', 1),
(41, 'Arusha City', 1),
(42, 'Arusha District', 1),
(43, 'Karatu', 1),
(44, 'Longido', 1),
(45, 'Monduli', 1),
(46, 'Ngorongoro', 1),
(47, 'Ilala', 2),
(48, 'Kinondoni', 2),
(49, 'Temeke', 2),
(50, 'Itilima', 25),
(51, 'Bariadi', 25),
(52, 'Meatu', 25),
(53, 'Busega', 25),
(54, 'Maswa', 25),
(55, 'Bariadi TC', 25);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`division_id`, `division_name`, `district_id`) VALUES
(100, 'Itilima', 50),
(101, 'Kanadi', 50),
(102, 'Kinang\'weli', 50),
(103, 'Bumera', 50);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `groupId` int(11) NOT NULL,
  `group_name` char(50) NOT NULL,
  `commission` varchar(50) NOT NULL,
  `group_category` varchar(50) NOT NULL,
  `group_leader` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`groupId`, `group_name`, `commission`, `group_category`, `group_leader`) VALUES
(1, 'Active', '10%', 'A', 'Mohit'),
(2, 'Invisible', '2%', 'C', 'ABC');

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
(1, 'Active', '10%', 'B', 'Sanjeev'),
(2, 'Active', '18%', 'A', 'Mohit'),
(4, 'Active', '15%', 'C', 'Dough Jaspher');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `loan_come_from` varchar(50) NOT NULL,
  `loan_amount` varchar(50) NOT NULL,
  `loan_interest` varchar(10) NOT NULL,
  `payment_term` varchar(50) NOT NULL,
  `total_payment_with_intereset` varchar(50) NOT NULL,
  `emi_per_month` varchar(50) NOT NULL,
  `payment_schedule` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `group_id`, `loan_come_from`, `loan_amount`, `loan_interest`, `payment_term`, `total_payment_with_intereset`, `emi_per_month`, `payment_schedule`, `due_date`) VALUES
(2, '1', 'Government', '1000', '10', '2', '1200', '50', '2016-09-01', '2016-09-04'),
(3, '2', 'Government', '10000', '10', '3', '13000', '361.1111111111111', '2016-08-25', '2016-08-26'),
(4, '3', 'Council', '500000', '10', '5', '750000', '12500', '2016-08-25', '2016-08-26'),
(5, '4', 'Government', '1000000', '10', '1', '1100000', '91666.66666666667', '2016-08-24', '2016-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(50) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `group_id` int(11) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `gender`, `group_id`, `join_date`) VALUES
(1, 'AAAVVVV', 'BB', 'm', 1, '2016-08-11'),
(2, 'KHKJ', 'HKKHK', 'f', 1, '2016-08-11'),
(3, 'Adfdf', 'dfdfd', 'm', 1, '2016-08-16'),
(4, 'bbb', 'dfdf', 'm', 1, '2016-08-16'),
(5, 'ccc', 'ccdf', 'f', 1, '2016-08-16'),
(6, 'dfdf', 'ddd', 'f', 1, '2016-08-16'),
(7, 'dfdfd', 'fdfdfdf', 'f', 1, '2016-08-16'),
(8, '545', 'dfdf', 'm', 1, '2016-08-16'),
(9, 'ae', 'ed', 'm', 1, '2016-08-16'),
(11, 'Ac', 'ac', 'm', 1, '2016-08-16'),
(12, 'adddd', 'adfdfd', 'm', 1, '2016-08-16');

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
  `order_groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `orderDate`, `customerName`, `productCode`, `retail_source`, `quantity`, `price_per_item`, `total_price`, `order_groupId`) VALUES
(1, '1', '2020-10-09', 'Jack', '11', 'Clickripple Digital Solution', 2, 50, 100, 1),
(2, '201', '2020-10-12', 'Princhu', '12', 'IKEA', 1, 100, 100, 2),
(3, '8', '2020-10-13', 'Krinua Acharyaa', '3', 'Walmart Canada', 4, 5, 20, 1),
(4, '7', '2020-10-18', 'Aryan ', '109', 'Cosco Wholesale', 10, 12, 120, 4),
(7, 'A001', '2020-10-14', 'ABCD', 'A000', 'Walmart', 20, 20, 40, 1),
(13, 'A001', '2020-10-15', 'Bhawa', 'C01', 'Walmart', 40, 20, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `payment_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`payment_id`, `group_id`, `amount_paid`, `payment_date`) VALUES
(1, 1, 50, '2016-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(4) NOT NULL,
  `post_category_id` int(4) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 3, 'PHP is an awesome programming language', 'Bhawani Khadka Paudayal', '2020-06-07', 'php.png', 'Wow I really like this course', 'javascript, php, html, css', 3, 'published'),
(22, 15, 'An Apache web server can host multiple websites on the SAME server. ', 'Doug Jaspher', '2020-05-30', 'apa.png', 'In order to configure name based virtual hosting, you have to set the IP address on which you are going to receive the Apache requests for all the desired websites.You do not need separate server machine and apache software for each website. This can achieved using the concept of Virtual Host or VHost.\r\n', 'Install npm, set Permissions, Ip address ', 4, 'published'),
(23, 1, 'HTML5 is the latest and most enhanced version of HTML', 'Bean Piterson', '2020-05-31', 'html5.png', '\r\nHTML5 is a cooperation between the World Wide Web Consortium (W3C) and the Web Hypertext Application Technology Working Group (WHATWG).', 'Class, CSS, Style', 2, 'published'),
(24, 16, 'Java is used to develop mobile apps, web apps, desktop apps, games and much more', 'Doug Jaspher', '2020-06-07', 'java.png', '\r\nWe can write Java code in a text editor. However, it is possible to write Java in an Integrated Development Environment, such as IntelliJ IDEA, Netbeans or Eclipse, which are particularly useful when managing larger collections of Java files.', 'Class, inmplements, inheritance, functions', 2, 'published'),
(25, 1, 'Advance Web Technology', 'Bhawani', '2020-06-07', 'pimage.jpg', '\r\nAwesome!!!', 'Override, Class, css', 1, 'Draft'),
(26, 1, '', '', '2020-10-10', '', '\r\n', '', 1, ''),
(27, 1, '', '', '2020-10-10', '', '\r\n', '', 1, '');

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
  `productPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `categoryId`, `productCode`, `productName`, `productStatus`, `productImage`, `shippingDate`, `productColor`, `productSize`, `productPrice`) VALUES
(30, 351, 'A000', 'Teatable', 'Regular', 'Home-Wooden-Coffee-Table-Simple-Sofa.webp', '2020-10-14 22:42:18', 'Black', '2/4', 16.99),
(31, 351, 'c004', 'Dinning chair', 'Sell', '20160401_BG_A2_SmallTbl_Tall.jpg', '2020-10-14 22:43:16', 'Gray', '4/4', 200.12),
(41, 353, 'B007', 'Twin Size Bed', 'Regular', '10.jpeg', '2020-11-04 01:37:12', 'White', '5/6', 199),
(47, 364, 'A02', 'Small Sofa ', 'sell', 'image1.jpg', '2020-11-04 01:55:49', 'Gray', '20inc', 2000),
(57, 351, 'B009', 'Tea Table', 'Regular', 'mid.jpeg', '2020-11-04 09:52:55', 'White', '4/4', 200.12),
(58, 364, 'B005', 'Double Size bed ', 'Regular', 'download.jpeg', '2020-11-04 09:54:44', 'White', '5/6', 400.24),
(59, 353, 'B0012', 'Stylists Bed', 'Regular', 'default_name.png', '2020-11-04 09:58:33', 'Blue', '5/6', 500.22),
(61, 351, 'C01', 'Teatable', 'Regular', 'table.png', '2020-11-04 11:45:32', 'Brown', '2/4', 16.99),
(62, 353, 'B008', 'Queen Bed', 'Regular', 's-l400.jpg', '2020-11-04 13:00:27', 'Black', '4/4', 799),
(63, 353, 'B0067', 'bed', 'Regular', 'DinningTable.jpeg', '2020-11-04 14:01:46', 'white', '5/6', 200.12);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `question` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `question`) VALUES
(1, 'Which of the following is true about php.ini file?'),
(2, 'Which of the following type of variables are instances of programmer-defined classes?'),
(3, 'Which of the following is correct about NULL?'),
(4, ' Which of the following is correct about variable naming rules?\r\n'),
(5, 'Which of the following is correct about determine the \"truth\" of any value not already of the\r\nBoolean type?');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `region_name`) VALUES
(1, 'Arusha'),
(2, 'Dar es salaam'),
(3, 'Dodoma'),
(4, 'Geita'),
(5, 'Iringa'),
(6, 'Kagera'),
(7, 'Katavi'),
(8, 'Kigoma'),
(9, 'Kilimanjaro'),
(10, 'Lindi'),
(11, 'Manyara'),
(12, 'Mara'),
(13, 'Mbeya'),
(14, 'Songwe'),
(15, 'Morogoro'),
(16, 'Mtwara'),
(17, 'Mwanza'),
(18, 'Njombe'),
(19, 'Pemba North'),
(20, 'Pemba South'),
(21, 'Pwani'),
(22, 'Rukwa'),
(23, 'Ruvuma'),
(24, 'Shinyanga'),
(25, 'Simiyu'),
(26, 'Singida'),
(27, 'Tabora'),
(28, 'Tanga'),
(29, 'Zanzibar North'),
(30, 'Zanzibar South'),
(31, 'Zanzibar Urban West');

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
(4, '10000 Gerrard Square Shopping Centre', 'NoFrills', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `shopifybd`
--

CREATE TABLE `shopifybd` (
  `id` int(8) UNSIGNED NOT NULL,
  `store_url` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `install_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopifybd`
--

INSERT INTO `shopifybd` (`id`, `store_url`, `access_token`, `install_date`) VALUES
(2, 'clickrippleapp.myshopify.com', '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', '2020-10-07 17:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentnumber` char(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentnumber`, `firstname`, `lastname`, `city`) VALUES
('AB001', 'Bugs', 'Bunny', 'Toronto'),
('AB002', 'Tweety', 'Bird', 'Toronto'),
('AB003', 'Goat', 'Goat', 'Toronto'),
('AB004', 'kiran', 'paudel', 'Toronto');

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
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Bhawani', '123', 'Bhawani', 'Khadka paudayal', 'bhawani12@gmail.com', '', 'admin', ''),
(6, 'Doug Jaspher', 'password', 'Doug ', 'Jaspher', 'doug12@gmail.com', '', 'admin', ''),
(13, 'Avinav paudel', '$1$5IGGUoeB$iJ1KlKjwhlw1FUxQCRt8v0', 'Avinav', 'Paudel', 'paudel44@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystring22');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(4) NOT NULL,
  `full-name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone-number` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `gender` char(6) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `full-name`, `password`, `phone-number`, `created`, `gender`, `address`) VALUES
(2, 'Doug Jashper', 'password', '777-777-777', '2020-09-15', 'Male', '240 wellewley,st,east'),
(3, 'Bhawani khadka', '123', '647-704-4444', '2020-09-15', 'Female', '222-valyvellage east,ca');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `village_id` int(11) NOT NULL,
  `village_name` varchar(255) NOT NULL,
  `ward_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`village_id`, `village_name`, `ward_id`) VALUES
(130, 'Bumera', 105),
(131, 'Bulolambeshi', 105),
(132, 'Mwazimbi', 105),
(133, 'Mwandulu', 105),
(134, 'Habiya', 105),
(135, 'Ikindilo', 106),
(136, 'Ntenga', 106),
(137, 'Mwamungeshi', 106),
(138, 'Mwabuki', 106),
(139, 'Nyang\'ombe', 106),
(140, 'Mwamtani', 107),
(141, 'Manasubi', 107),
(142, 'Mbogo', 107),
(143, 'Mwamakili', 107),
(144, 'Mwaswale', 108),
(145, 'Nding\'ho', 108),
(146, 'Ng\'walali', 108),
(147, 'Mwamalize', 108),
(148, 'Nkuyu', 109),
(149, 'Nyantugutu', 109),
(150, 'Lung\'wa', 109),
(151, 'Pijulu', 109),
(152, 'Sagata', 110),
(153, 'Gaswa', 110),
(154, 'Laini A', 110),
(155, 'Laini B', 110),
(156, 'Mwalushu', 111),
(157, 'Mwamigagani', 111),
(158, 'Mwamanyangu', 111),
(159, 'Mwanunui', 111),
(160, 'Ng\'homango', 111),
(161, 'Ntagaswa', 111),
(162, 'Mwamapalala', 112),
(163, 'Nkololo Itilima', 112),
(164, 'Ngeme', 112),
(165, 'Mwamunhu', 112),
(166, 'Idoselo', 112),
(167, 'Nkoma', 113),
(168, 'Dasina', 113),
(169, 'Gambasingu', 113),
(170, 'Ng\'wang\'wita', 113),
(171, 'Musoma', 113),
(172, 'Mwambagwa', 113),
(173, 'Nyamalapa', 114),
(174, 'Kimali', 114),
(175, 'Itilima', 114),
(176, 'B/Mbugani', 114),
(177, 'Isakang\'hwale', 114),
(178, 'Mitobo', 115),
(179, 'Budalabujiga', 115),
(180, 'Mwakatale', 115),
(181, 'Mwabasabi', 115),
(182, 'Nanga', 116),
(183, 'Chinamili', 116),
(184, 'Senani', 116),
(185, 'Sali', 116),
(186, 'Lagangabilili', 117),
(187, 'Isengwa', 117),
(188, 'Nguno', 117),
(189, 'Lali', 117),
(190, 'Ng\'esha', 117),
(191, 'Shishani', 118),
(192, 'Mwanhunda', 118),
(193, 'Migato', 118),
(194, 'Simiyu', 118),
(195, 'Longalombogo', 118),
(196, 'Madilana', 119),
(197, 'Mhunze', 119),
(198, 'Ngando', 119),
(199, 'Ng\'wabulugu', 119),
(200, 'Nangale', 120),
(201, 'Ng\'wanyitanga', 120),
(202, 'Ndolelezi', 120),
(203, 'Ng\'waogama', 120),
(204, 'Mwakilangi', 121),
(205, 'Isengwa', 121),
(206, 'Kinang\'weli', 121),
(207, 'Mwagimagi', 121),
(208, 'Lalang\'ombe', 121),
(209, 'Luguru', 122),
(210, 'Ikungulipu', 122),
(211, 'Itubilo', 122),
(212, 'Inalo', 122),
(213, 'Kidula', 123),
(214, 'Sunzula', 123),
(215, 'Ng\'hesha Itilima', 123),
(216, 'Mwamnemha', 123),
(217, 'Nhobora', 124),
(218, 'Mwabuyunge', 124),
(219, 'Mwaumisheni', 124),
(220, 'Tagawi', 124),
(221, 'Kilugala', 124),
(222, 'Sawida', 125),
(223, 'Isagala', 125),
(224, 'Mahembe', 125),
(225, 'Songambele', 125),
(226, 'Bukingwamizi', 126),
(227, 'Zanzui', 126),
(228, 'Mlimani', 126),
(229, 'Sasago', 126),
(230, 'Kabale', 126),
(231, 'Kashishi', 126);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(11) NOT NULL,
  `ward_name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `division_id`) VALUES
(105, 'Bumera', 103),
(106, 'Ikindilo', 103),
(107, 'Mwamtani', 103),
(108, 'Mwaswale', 103),
(109, 'Nkuyu', 103),
(110, 'Sagata', 103),
(111, 'Mwalushu', 100),
(112, 'Mwamapalala', 100),
(113, 'Nkoma', 100),
(114, 'Nyamalapa', 100),
(115, 'Budalabujiga', 101),
(116, 'Chinamili', 101),
(117, 'Lagangabilili', 101),
(118, 'Migato', 101),
(119, 'Mhunze', 101),
(120, 'Ndolelezi', 101),
(121, 'Kinang\'weli', 102),
(122, 'Luguru', 102),
(123, 'Mbita', 102),
(124, 'Nhobora', 102),
(125, 'Sawida', 102),
(126, 'Zagayu', 102);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_categories`
--
ALTER TABLE `cms_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`) USING BTREE;

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentnumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`village_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cms_categories`
--
ALTER TABLE `cms_categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `retailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shopifybd`
--
ALTER TABLE `shopifybd`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
