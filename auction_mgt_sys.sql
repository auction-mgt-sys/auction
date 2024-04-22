-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 09:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_mgt_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidform`
--

CREATE TABLE `bidform` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_id` int(12) NOT NULL,
  `amount` int(15) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `bid_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=bid,2=confirmed,3=cancelled',
  `data_crated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `product_id`, `bid_amount`, `status`, `data_crated`) VALUES
(1, 50, 3, 2222, 1, '2024-04-11 11:29:35'),
(2, 50, 4, 22, 1, '2024-04-11 11:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'desk'),
(2, 'foods'),
(3, 'books');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(30) NOT NULL,
  `sender_id` text DEFAULT NULL,
  `user_type` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=bidder,1=auctioneer,2=commitee,3=admin',
  `reciver_id` text DEFAULT NULL,
  `comment_type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=sent,1=resived',
  `title` varchar(100) DEFAULT NULL,
  `detail` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `sender_id`, `user_type`, `reciver_id`, `comment_type`, `title`, `detail`, `date`, `status`) VALUES
(1, '5', 4, '17', 0, '', '', '2024-03-22 15:39:06', 'unread'),
(2, '27', 2, '11', 1, 'drrfghjkl', 'dfghj', '2024-03-25 15:44:07', 'read'),
(3, '5', 4, '7', 0, 'sdfgh', 'jjkj', '2024-03-28 10:51:31', 'unread'),
(4, '9', 2, '11', 1, 'jjjj', 'jjjj', '2024-04-01 10:26:40', 'read'),
(5, '10', 2, '11', 1, 'jjjj', 'kkk', '2024-04-03 13:48:16', 'read'),
(6, '50', 2, '11', 1, 'ssss', 'sss', '2024-04-11 11:15:06', 'read'),
(7, '51', 3, '50', 0, 'kkk', 'kkk', '2024-04-11 11:16:52', 'read'),
(8, '5', 4, '65', 0, '', 'qwerty', '2024-04-19 13:45:26', 'unread'),
(9, '5', 4, '64', 0, '', 'asdfgh', '2024-04-19 13:45:36', 'unread'),
(10, '5', 4, '63', 0, '', '', '2024-04-19 13:45:51', 'unread'),
(11, '5', 4, '61', 0, '', '', '2024-04-19 13:45:59', 'unread'),
(12, '5', 4, '60', 0, '', '', '2024-04-19 13:46:05', 'unread'),
(13, '5', 4, '62', 0, '', '', '2024-04-19 13:46:10', 'unread'),
(14, '5', 4, '66', 0, '', 'asdfghj', '2024-04-19 13:46:24', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(30) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bidder_id` int(30) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0=request,1=new,2=used',
  `date_payed` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `reason`, `pro_id`, `amount`, `bidder_id`, `transaction_id`, `status`, `date_payed`, `photo`) VALUES
(7, 'sjjsjs', 4, 99, 10, '7778gggg', 1, '2024-04-03 15:29:10', ''),
(8, 'ggggg', 4, 99, 50, 'gffff', 1, '2024-04-08 19:10:23', ''),
(9, 'asdfg', 4, 100, 50, '123', 1, '2024-04-08 20:12:48', ''),
(11, 'wwww', 3, 6666, 50, '4764', 2, '2024-04-11 11:27:51', ''),
(12, 'wwww', 4, 500, 50, '476431', 2, '2024-04-11 11:52:33', ''),
(13, 'gift', 3, 10, 57, 'hana3', 1, '2024-04-19 14:59:23', ''),
(14, 'gift', 3, 0, 57, 'hana300', 0, '2024-04-19 15:01:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(25) NOT NULL,
  `category_id` int(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `measurement` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price_for_form` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_bid` float NOT NULL,
  `regular_price` float NOT NULL,
  `bid_end_datetime` datetime NOT NULL,
  `img_fname` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `measurement`, `quantity`, `price_for_form`, `total_price`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`, `date_created`) VALUES
(3, 1, 'wewr', 'asfd', '333', '3', '33', 'qsdf', 230, 220, '2024-04-24 11:14:00', '3.jpg', '2024-03-20 12:09:35'),
(4, 1, 'TY', 'JKJJ', '1', '99', '70', 'GHGH', 90, 70, '2024-04-18 20:15:00', '4.jpg', '2024-03-25 16:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(30) NOT NULL,
  `price` int(30) NOT NULL,
  `total_price` int(30) NOT NULL,
  `requesteditem_name` varchar(100) NOT NULL,
  `requesteditem_type` varchar(100) NOT NULL,
  `requesteditem_description` varchar(200) NOT NULL,
  `requesteditem_measurment` varchar(200) NOT NULL,
  `requesteditem_quantity` int(11) NOT NULL,
  `requesteditem_deptname` varchar(100) NOT NULL,
  `requesteditem_id` int(30) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=newrequest,1=reporteditem,',
  `auctionstatus` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0=new,1=approved,2=canclled',
  `auction` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=notpost,1=post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `price`, `total_price`, `requesteditem_name`, `requesteditem_type`, `requesteditem_description`, `requesteditem_measurment`, `requesteditem_quantity`, `requesteditem_deptname`, `requesteditem_id`, `status`, `auctionstatus`, `auction`) VALUES
(41, 6, 6, 'desktop', 'xklzl', 'zz,xm', 'askgajks76', 1, 'IS', 119, 1, 0, 0),
(42, 0, 0, 'dfghjk', 'dfghjkl', 'tyuiopkk', 'kkk', 1, 'IS', 121, 0, 0, 0),
(43, 0, 0, 'xcvbnm,.', 'ghjkl;', 'kkk', 'kkk', 1, 'IS', 122, 0, 0, 0),
(44, 0, 0, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 'IS', 124, 0, 0, 0),
(45, 0, 0, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 'IS', 125, 0, 0, 0),
(46, 0, 0, 'chair', 'djsahf', 'suyfhc', 'scxz', 9, 'IS', 126, 0, 0, 0),
(47, 0, 0, 'dfgh', 'dfgh', 'cvbn', 'sdfgh', 7, 'IS', 127, 0, 0, 0),
(48, 0, 0, 'we', 'love', 'you', 'ha', 4, 'IS', 128, 0, 0, 0),
(49, 0, 0, 'ki', 'lk', 'iuy', 'lkjhvc', 5, 'IS', 129, 0, 0, 0),
(50, 0, 0, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 'IS', 130, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `requesteditem`
--

CREATE TABLE `requesteditem` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  `measurment` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=new,1=accepted,2=rejected',
  `deptname` varchar(100) NOT NULL,
  `depheadname` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requesteditem`
--

INSERT INTO `requesteditem` (`id`, `name`, `type`, `description`, `measurment`, `quantity`, `status`, `deptname`, `depheadname`, `reason`) VALUES
(119, 'desktop', 'xklzl', 'zz,xm', 'askgajks76', 1, 1, 'IS', 'esayas wakajri', ''),
(120, 'table', 'kjkjk', 'vnm,', 'kjjkh', 1, 2, 'IS', 'esayas wakajri', 'there is shortge of item'),
(121, 'dfghjk', 'dfghjkl', 'tyuiopkk', 'kkk', 1, 1, 'IS', 'esayas wakajri', ''),
(122, 'xcvbnm,.', 'ghjkl;', 'kkk', 'kkk', 1, 1, 'IS', 'esayas wakajri', ''),
(123, 'JJJ', 'JJJJ', 'KKK', 'KKK', 1, 2, 'IS', 'esayas wakajri', 'ioiii'),
(124, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 1, 'IS', 'abdu melike', ''),
(125, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 1, 'IS', 'abdu melike', ''),
(126, 'chair', 'djsahf', 'suyfhc', 'scxz', 9, 1, 'IS', 'abdu melike', ''),
(127, 'dfgh', 'dfgh', 'cvbn', 'sdfgh', 7, 1, 'IS', 'abdu melike', ''),
(128, 'we', 'love', 'you', 'ha', 4, 1, 'IS', 'abdu melike', ''),
(129, 'ki', 'lk', 'iuy', 'lkjhvc', 5, 1, 'IS', 'abdu melike', ''),
(130, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 1, 'IS', 'abdu melike', ''),
(131, 'chair', 'djsahf', 'suyfhc', 'scxz', 4, 1, 'IS', 'abdu melike', ''),
(132, 'dfgh', 'dfgh', 'cvbn', 'sdfgh', 9, 0, 'IS', 'abdu melike', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(25) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'WPCSC AUCTION SYSTEM', 'wolktiepolytecheniccollege@gmail.com', '0113301647', '', 'ABOUT US WOLKITE POLYTECHNIC COLLEGE The purpose of the college is to provide quality and project-based result-oriented training in formal and informal training fields, producing qualified entrepreneurs and motivated citizens at the basic and intermediate levels. Empowering women and disabled people.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL,
  `TIN_number` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=nutral,1=accepted,2=reject,3=new',
  `type` tinyint(2) NOT NULL DEFAULT 7 COMMENT '1=admin,2=bidder,3=auctioneer,4=commitee,5=department,6=finance,7=president',
  `photo` text NOT NULL,
  `deptname` varchar(100) NOT NULL,
  `data_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `gender`, `username`, `password`, `email`, `contact`, `address`, `age`, `TIN_number`, `status`, `type`, `photo`, `deptname`, `data_created`) VALUES
(1, 'Administrator', '', '', 'admin', '25d55ad283aa400af464c76d713c07ad', 'admin@gmail.com', '0923222120', 'wolkite', 0, '', 0, 1, '', '', '2024-03-05 23:28:49'),
(4, 'finance', 'ss', '', 'fan', '25d55ad283aa400af464c76d713c07ad', '', '', '', 33, '', 0, 6, '', '', '2024-03-05 23:39:51'),
(5, 'commitee', 'dd', '', 'hana', '25d55ad283aa400af464c76d713c07ad', '', '', '', 32, '', 0, 4, '', '', '2024-03-05 23:40:29'),
(6, 'president', 'ww', '', 'pre', '25d55ad283aa400af464c76d713c07ad', '', '', '', 34, '', 0, 7, '', '', '2024-03-05 23:41:17'),
(50, 'Elshadai Melesse', 'wdwe', 'Femal', 'qqq', '1bbd886460827015e5d605ed44252251', 'd@gmail.com', '66556', 'hhh', 77, '12121212', 1, 2, 'photos/', '', '2024-04-08 19:09:13'),
(57, 'hanna', 'semu', 'Femal', 'han', '25f9e794323b453885f5181f1b624d0b', 'hannasemu25@gmail.com', '+25134567890', 'aa', 23, 'nbj', 1, 2, 'photos/120730838.jfif', '', '2024-04-16 20:04:40'),
(58, 'eleni ', 'beyene', '', 'elu', '25d55ad283aa400af464c76d713c07ad', '', '', '', 33, '', 0, 3, '', '', '2024-04-16 20:14:36'),
(59, 'abdu', 'melike', '', 'iss', '25d55ad283aa400af464c76d713c07ad', '', '', '', 34, '', 0, 5, '', 'IS', '2024-04-17 13:13:46'),
(61, 'hanna', 'semu', 'Femal', 'aaa', '25d55ad283aa400af464c76d713c07ad', 'hannsemuhg4@gmail.com', '+25190999', 'df', 54, '123', 2, 2, 'photos/', '', '2024-04-18 12:14:16'),
(64, 'robel', 'aklilu', 'Male', 'roba', '25d55ad283aa400af464c76d713c07ad', 'asdfghj@gmail.com', '+251909999999', 'aa', 22, '78', 2, 2, 'photos/', '', '2024-04-18 12:49:04'),
(79, 'roba', 'ak', '', 'robaak', 'af8b15342aa4f0646490ebc23d2f816d', '', '', '', 0, '', 0, 3, '', '', '2024-04-21 21:26:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidform`
--
ALTER TABLE `bidform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requesteditem`
--
ALTER TABLE `requesteditem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidform`
--
ALTER TABLE `bidform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `requesteditem`
--
ALTER TABLE `requesteditem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
