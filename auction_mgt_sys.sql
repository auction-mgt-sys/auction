-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 10:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `auctionitem`
--

CREATE TABLE `auctionitem` (
  `id` int(11) NOT NULL,
  `common_name` varchar(255) DEFAULT NULL,
  `common_type` varchar(255) DEFAULT NULL,
  `common_measurement` varchar(255) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `total_price` int(30) DEFAULT NULL,
  `statuss` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=not post,1=post',
  `staup` tinyint(2) NOT NULL DEFAULT 2 COMMENT '0=upload,1=see',
  `dateupload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auctionitem`
--

INSERT INTO `auctionitem` (`id`, `common_name`, `common_type`, `common_measurement`, `total_quantity`, `price`, `total_price`, `statuss`, `staup`, `dateupload`) VALUES
(33, 'desktop', 'opttiplex500', 'ram,cpu,generation', 7, 100, 700, 1, 1, '2024-04-30 16:25:32'),
(34, 'clocth', 'kkkk', 'wert', 16, 10, 80, 1, 1, '2024-04-30 16:31:08'),
(38, 'clocth', 'cloth', 'quality, collour,djhs', 14, 12, 168, 1, 1, '2024-05-05 21:45:25'),
(39, 'desktop', 'opttiplex500', 'ram,cpu,generation', 12, 12, 144, 1, 1, '2024-05-05 21:45:36'),
(40, 'table', 'chair', 'wood', 13, 12, 156, 1, 1, '2024-05-05 21:45:37');

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
  `date_created` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `product_id`, `bid_amount`, `status`, `date_created`) VALUES
(1, 50, 3, 2222, 3, '2024-04-11 21:31:44'),
(2, 50, 4, 22, 1, '2024-04-11 11:54:10'),
(4, 77, 12, 300, 3, '2024-04-24 10:54:36'),
(5, 58, 31, 66, 2, '2024-04-30 18:06:51'),
(6, 89, 31, 70, 1, '2024-04-30 18:04:39'),
(7, 57, 47, 200, 1, '2024-05-07 18:41:41'),
(8, 93, 47, 300, 1, '2024-05-07 18:42:48'),
(9, 94, 47, 200, 1, '2024-05-07 18:44:21'),
(10, 95, 47, 100, 3, '2024-05-07 21:16:23'),
(11, 93, 48, 66, 2, '2024-05-07 21:17:33'),
(12, 57, 48, 67, 1, '2024-05-07 19:30:20'),
(13, 94, 48, 66, 1, '2024-05-07 19:36:59'),
(14, 96, 47, 89, 3, '2024-05-07 22:55:09'),
(15, 94, 49, 777, 1, '2024-05-08 00:16:49'),
(16, 93, 49, 665, 1, '2024-05-09 19:53:49');

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
(3, 'books'),
(4, 'clothes'),
(5, 'machine'),
(6, 'ink '),
(7, 'paper'),
(8, 'construction'),
(9, 'table'),
(10, 'chair');

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
(8, '51', 3, '50', 0, 'kuytfdfyguhio', 'vvvvgguujhjksasdfghujik', '2024-04-11 21:31:44', 'read'),
(9, '51', 3, '58', 0, 'jjj', 'jjjjkjk', '2024-04-12 11:59:21', 'read'),
(10, '51', 3, '58', 0, '', '', '2024-04-23 08:57:00', 'unread'),
(11, '51', 3, '77', 0, '', '', '2024-04-24 10:54:36', 'unread'),
(12, '51', 3, '58', 0, '', '', '2024-04-24 10:56:30', 'unread'),
(13, '58', 2, '11', 1, 'sdfgh', 'UWYJQWHHQW', '2024-04-24 16:22:00', 'read'),
(14, '5', 4, '72', 0, '', '', '2024-04-25 00:46:57', 'unread'),
(15, '5', 4, '78', 0, '', '', '2024-04-25 00:47:03', 'unread'),
(16, '58', 2, '11', 1, 'lklkkk', 'jkjkjjkj', '2024-04-29 12:17:22', 'read'),
(17, '5', 4, '73', 0, '', '', '2024-04-29 15:05:01', 'unread'),
(18, '5', 4, '75', 0, 'jjj', 'ggg', '2024-04-30 10:33:52', 'unread'),
(19, '58', 2, '11', 1, 'sjshjdh', 'jkjkhjhh', '2024-04-30 11:55:01', 'read'),
(20, '5', 4, '79', 0, '', '', '2024-05-01 10:45:12', 'unread'),
(21, '5', 4, '80', 0, '', '', '2024-05-01 10:45:19', 'unread'),
(22, '5', 4, '82', 0, '', '', '2024-05-01 10:45:24', 'unread'),
(23, '51', 3, '58', 0, 'kkkk', 'kkkkkk', '2024-05-02 22:38:55', 'unread'),
(24, '51', 3, '58', 0, 'trherre', 'jesuss is my living hope', '2024-05-02 22:39:27', 'read'),
(25, '5', 4, '71', 0, '', '', '2024-05-05 21:38:44', 'unread'),
(26, '5', 4, '83', 0, '', '', '2024-05-05 21:38:50', 'unread'),
(27, '5', 4, '86', 0, '', '', '2024-05-05 21:39:07', 'unread'),
(28, '58', 2, '11', 1, 'asdfghjkliiiiiiiiii', 'yyyyyyyyyyyyyyyyyyyyyyyy', '2024-05-06 20:09:14', 'read'),
(29, '51', 3, '', 0, '', '', '2024-05-07 18:38:14', 'unread'),
(30, '51', 3, '', 0, '', '', '2024-05-07 18:38:20', 'unread'),
(31, '51', 3, '', 0, '', '', '2024-05-07 18:38:24', 'unread'),
(32, '51', 3, '', 0, '', '', '2024-05-07 18:38:29', 'unread'),
(33, '51', 3, '', 0, '', '', '2024-05-07 18:38:34', 'unread'),
(34, '51', 3, '', 0, '', '', '2024-05-07 18:38:39', 'unread'),
(35, '51', 3, '', 0, '', '', '2024-05-07 18:38:45', 'unread'),
(36, '51', 3, '', 0, '', '', '2024-05-07 18:38:51', 'unread'),
(37, '51', 3, '', 0, '', '', '2024-05-07 18:38:56', 'unread'),
(38, '51', 3, '95', 0, '', '', '2024-05-07 21:16:23', 'unread'),
(39, '51', 3, '96', 0, 'vvvvvv', 'jjjjjjjjj', '2024-05-07 22:55:09', 'unread'),
(40, '51', 3, '57', 0, 'kk', 'kk', '2024-05-10 01:58:57', 'unread');

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
  `photo` text NOT NULL,
  `bphoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `reason`, `pro_id`, `amount`, `bidder_id`, `transaction_id`, `status`, `date_payed`, `photo`, `bphoto`) VALUES
(14, 'buy', 14, 500, 58, 'rrrtr55', 2, '2024-04-12 11:43:07', '', ''),
(15, 'buy', 12, 500, 58, '	rrrtr55', 1, '2024-04-12 11:52:36', '', ''),
(29, 'kkk', 31, 1000, 58, '4764', 2, '2024-04-30 17:56:41', '', ''),
(30, 'HU', 31, 1000, 89, 'qwer', 2, '2024-04-30 18:02:50', '', ''),
(36, 'yyy', 47, 1000, 57, 'qww', 2, '2024-05-07 18:31:09', '', ''),
(37, 'iiiii', 47, 1000, 93, 'ooooo', 2, '2024-05-07 18:36:11', '', ''),
(38, 'jhh', 47, 1000, 94, 'ertrtr', 2, '2024-05-07 18:36:58', '', ''),
(39, 'III', 47, 1000, 95, 'UUU', 2, '2024-05-07 18:50:28', '', ''),
(40, 'QWERT', 48, 6666, 93, 'QWERT', 2, '2024-05-07 19:25:26', '', ''),
(41, 'QWERT1', 48, 6666, 57, 'QWERT1', 2, '2024-05-07 19:29:18', '', ''),
(42, 'QWERT11', 48, 6666, 94, 'QWERT11', 1, '2024-05-07 19:35:16', '', ''),
(43, 'IIIII', 47, 100, 96, 'JJJJJJ', 2, '2024-05-07 21:11:51', '', ''),
(67, 'IUI', 49, 100, 93, 'UIU', 2, '2024-05-09 19:52:10', 'uploads/', 'uploads/'),
(68, 'jjj', 49, 0, 57, 'kkk', 0, '2024-05-09 22:05:13', 'uploads/', 'uploads/'),
(69, 'ouiui', 49, 0, 57, 'k', 0, '2024-05-09 22:48:59', 'uploads/', ''),
(70, 'jjjj', 49, 0, 57, 'kkkk', 0, '2024-05-09 22:51:22', 'uploads/', '');

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
(47, 4, 'clocth', 'quality, collour,djhs', '14', '90', '168', 'jjjjjjjjjjjjjjj', 90, 12, '2024-05-07 21:46:00', '47.jpg', '2024-05-05 21:47:18'),
(48, 1, 'desktop', 'ram,cpu,generation', '12', '70', '144', 'lllllllllllllllllllll', 90, 12, '2024-05-07 19:48:00', '48.jpg', '2024-05-05 21:48:06'),
(49, 10, 'table', 'wood', '13', '80', '156', 'jjjjjjjjjjjjjjj', 70, 12, '2024-05-13 21:48:00', '49.jpg', '2024-05-05 21:48:43'),
(51, 10, '', '', '1', '66', '0', 'yfdd', 60, 0, '2024-05-10 01:52:00', '', '2024-05-10 01:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `profle`
--

CREATE TABLE `profle` (
  `id` int(30) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profle`
--

INSERT INTO `profle` (`id`, `user_id`, `image_path`) VALUES
(2, '58', 'uploads/662fdb7bcd635_logo.jpg'),
(4, '58', 'uploads/662fdbb46c369_hanni.jpg'),
(5, '58', 'uploads/662fdbf9c35de_hanni.jpg');

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
  `requesteditem_id` int(30) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=newrequest,1=reporteditem,',
  `auctionstatus` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0=new,1=approved,2=canclled',
  `groupitem` tinyint(2) NOT NULL COMMENT '0=ungrouped,1=grouped',
  `requesteditem_deptname` varchar(100) NOT NULL,
  `requesteditem_depheadname` varchar(100) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `reported_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dateapprove` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `price`, `total_price`, `requesteditem_name`, `requesteditem_type`, `requesteditem_description`, `requesteditem_measurment`, `requesteditem_quantity`, `requesteditem_id`, `status`, `auctionstatus`, `groupitem`, `requesteditem_deptname`, `requesteditem_depheadname`, `reason`, `reported_date`, `dateapprove`) VALUES
(32, 8, 8, 'dfghjk', 'dfghjkl', 'tyuiopkk', 'kkk', 1, 121, 1, 1, 1, '', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(33, 5, 5, 'xcvbnm,.', 'ghjkl;', 'kkk', 'kkk', 1, 122, 1, 2, 0, '', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(35, 3, 18, 'desktop', 'desktop', 'zz,xm', 'askgajks76', 6, 125, 1, 1, 1, '', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(36, 0, 0, 'desktop', 'desktop', 'zz,xm', 'askgajks76', 1, 119, 1, 1, 1, 'IS', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(37, 88, 352, 'desktop', 'cmputer', 'sadfghj', 'ram', 4, 124, 1, 1, 1, 'ISjj', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(39, 30, 180, 'laptop', 'desktop', 'ggffgf', 'ram, cpu', 6, 126, 1, 1, 1, '', '', '', '2024-04-24 12:33:10', '2024-04-30 11:26:05'),
(40, 7, 35, 'clocth', 'cloth', 'dfghjk', 'quality, collour,djhs', 5, 129, 1, 1, 1, 'ISjj', '', '', '2024-04-29 21:24:29', '2024-03-30 11:26:05'),
(41, 7, 42, 'clocth', 'cloth', 'dfghj', 'quality, collour,djhs', 6, 130, 1, 1, 1, 'ISjj', '', '', '2024-04-29 21:24:29', '2024-04-30 11:26:05'),
(42, 8, 56, 'clocth', 'cloth', 'liuytr', 'quality, collour,djhs', 7, 131, 1, 1, 1, 'ISjj', '', '', '2024-04-29 21:24:29', '2024-04-30 11:26:05'),
(43, 100, 700, 'desktop', 'opttiplex500', 'there is storage this devince in my department', 'ram,cpu,generation', 7, 132, 1, 1, 1, 'ISjj', '', '', '2024-04-30 10:36:44', '2024-04-30 11:26:05'),
(44, 8, 72, 'desktop', 'opttiplex500', 'there is storage this devince in my department', 'zlszm', 9, 134, 1, 1, 1, 'ISjj', '', '', '2024-04-30 16:29:08', '2024-04-30 16:29:08'),
(45, 7, 7, 'desktop', 'opttiplex500', 'jhgfd', 'zlszm', 1, 135, 1, 1, 1, 'ISjj', '', '', '2024-04-30 16:29:08', '2024-04-30 16:29:08'),
(46, 5, 40, 'clocth', 'kkkk', 'hhj', 'wert', 8, 136, 1, 1, 1, 'ISjj', '', '', '2024-04-30 16:29:08', '2024-04-30 16:29:08'),
(47, 5, 40, 'clocth', 'kkkk', 'uy', 'wert', 8, 137, 1, 1, 1, 'ISjj', '', '', '2024-04-30 16:29:08', '2024-04-30 16:29:08'),
(48, 12, 144, 'desktop', 'opttiplex500', 'zz,xm', 'ram,cpu,generation', 12, 138, 1, 1, 1, 'CS', '', '', '2024-05-05 21:42:20', '2024-05-05 21:42:20'),
(49, 12, 156, 'table', 'chair', 'vnm,', 'wood', 13, 139, 1, 1, 1, 'CS', '', '', '2024-05-05 21:42:20', '2024-05-05 21:42:20'),
(50, 12, 168, 'clocth', 'cloth', 'tyuiopkk', 'quality, collour,djhs', 14, 140, 1, 1, 1, 'CS', '', '', '2024-05-05 21:42:20', '2024-05-05 21:42:20'),
(51, 1, 5, 'ggg', 'mmm', 'hhh', 'hhh', 5, 141, 1, 2, 0, 'software', '', 'jhgggfgffdfdfd', '2024-05-09 14:32:35', '2024-05-09 14:32:35'),
(52, 12, 132, '11', '111', '111', '11', 11, 142, 1, 2, 0, 'software', 'gech pro', '', '2024-05-09 14:44:52', '2024-05-09 14:44:52'),
(53, 33, 363, '11', '111', '111', '11', 11, 143, 1, 2, 0, 'software', 'gech pro', 'jhjhjhj', '2024-05-09 14:44:52', '2024-05-09 14:44:52');

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
  `reason` varchar(200) NOT NULL,
  `sent_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requesteditem`
--

INSERT INTO `requesteditem` (`id`, `name`, `type`, `description`, `measurment`, `quantity`, `status`, `deptname`, `depheadname`, `reason`, `sent_date`) VALUES
(119, 'desktop', 'xklzl', 'zz,xm', 'askgajks76', 1, 1, 'IS', 'esayas wakajri', '', '2024-04-24 11:10:59'),
(120, 'table', 'kjkjk', 'vnm,', 'kjjkh', 1, 2, 'IS', 'esayas wakajri', 'there is shortge of item', '2024-04-24 11:10:59'),
(121, 'dfghjk', 'dfghjkl', 'tyuiopkk', 'kkk', 1, 1, 'IS', 'esayas wakajri', '', '2024-04-24 11:10:59'),
(122, 'xcvbnm,.', 'ghjkl;', 'kkk', 'kkk', 1, 1, 'IS', 'esayas wakajri', '', '2024-04-24 11:10:59'),
(123, 'JJJ', 'JJJJ', 'KKK', 'KKK', 1, 2, 'IS', 'esayas wakajri', 'ioiii', '2024-04-24 11:10:59'),
(124, 'desktop', 'cmputer', 'sadfghj', 'ram', 4, 1, 'ISjj', 'abeb kebde', '', '2024-04-24 11:10:59'),
(125, 'desktop', 'xklzl', 'zz,xm', 'zlszm', 6, 1, 'ISjj', 'abeb kebde', '', '2024-04-24 11:10:59'),
(126, 'laptop', 'desktop', 'ggffgf', 'ram, cpu', 6, 1, 'ISjj', 'abeb kebde', '', '2024-04-24 11:10:59'),
(127, 'desktop', 'opttiplex500', 'zz,xm', 'zlszm', 99, 2, 'ISjj', 'abeb kebde', 'jhgfgf', '2024-04-24 11:14:52'),
(128, 'desktop', 'opttiplex500', 'zz,xm', 'zlszm', 99, 2, 'ISjj', 'abeb kebde', 'jkuuuuuuuuuuuu', '2024-04-24 11:17:52'),
(129, 'clocth', 'cloth', 'dfghjk', 'quality, collour,djhs', 5, 1, 'ISjj', 'abeb kebde', '', '2024-04-29 21:23:40'),
(130, 'clocth', 'cloth', 'dfghj', 'quality, collour,djhs', 6, 1, 'ISjj', 'abeb kebde', '', '2024-04-29 21:23:40'),
(131, 'clocth', 'cloth', 'liuytr', 'quality, collour,djhs', 7, 1, 'ISjj', 'abeb kebde', '', '2024-04-29 21:23:40'),
(132, 'desktop', 'opttiplex500', 'there is storage this devince in my department', 'ram,cpu,generation', 7, 1, 'ISjj', 'abeb kebde', '', '2024-04-30 10:35:05'),
(133, 'jkjk', 'chair', 'vnm,', 'wood', 9, 2, 'ISjj', 'abeb kebde', 'gyyyyyy', '2024-04-30 10:35:05'),
(134, 'desktop', 'opttiplex500', 'there is storage this devince in my department', 'zlszm', 9, 1, 'ISjj', 'abeb kebde', '', '2024-04-30 16:28:15'),
(135, 'desktop', 'opttiplex500', 'jhgfd', 'zlszm', 1, 1, 'ISjj', 'abeb kebde', '', '2024-04-30 16:28:15'),
(136, 'clocth', 'kkkk', 'hhj', 'wert', 8, 1, 'ISjj', 'abeb kebde', '', '2024-04-30 16:28:15'),
(137, 'clocth', 'kkkk', 'uy', 'wert', 8, 1, 'ISjj', 'abeb kebde', '', '2024-04-30 16:28:15'),
(138, 'desktop', 'opttiplex500', 'zz,xm', 'ram,cpu,generation', 12, 1, 'CS', 'gech pro', '', '2024-05-05 21:37:55'),
(139, 'table', 'chair', 'vnm,', 'wood', 13, 1, 'CS', 'gech pro', '', '2024-05-05 21:37:55'),
(140, 'clocth', 'cloth', 'tyuiopkk', 'quality, collour,djhs', 14, 1, 'CS', 'gech pro', '', '2024-05-05 21:37:55'),
(141, 'ggg', 'mmm', 'hhh', 'hhh', 5, 1, 'software', 'gech pro', '', '2024-05-09 14:31:56'),
(142, '11', '111', '111', '11', 11, 1, 'software', 'gech pro', '', '2024-05-09 14:43:54'),
(143, '11', '111', '111', '11', 11, 1, 'software', 'gech pro', '', '2024-05-09 14:43:54');

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
(1, 'WPCSC AUCTION SYSTEM', 'wolktiepolytecheniccollege@gmail.com', '0113301647', '1714589880_1714388760_wpcsc.jpg', '&lt;h5 style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;text-align:justify&quot;&gt;&lt;sup style=&quot;text-align:justify&quot;&gt;&lt;span style=&quot;text-align:justify&quot;&gt;WOLKITE POLYTECHNIC COLLEGE and &amp;nbsp;SATELLITE CAMPUS is a leading institution that provides quality education and training in various technical fields. With itscommitment to excellence, the college offers a wide range of programs andcourses that are designed to meet the needs of both students and employers. Ourdedicated faculty and staff work tirelessly to ensure a high standard ofeducation, fostering creativity and innovation in our students. We are proud toserve our community by empowering individuals, particularly women andunderrepresented groups, to pursue rewarding careers in their chosen fields.&lt;/span&gt;&lt;/sup&gt;&lt;/span&gt;&lt;/h5&gt;&lt;p class=&quot;MsoNormal&quot; style=&quot;text-align:justify&quot;&gt;&lt;o:p style=&quot;text-align:justify&quot;&gt;&lt;/o:p&gt;&lt;/p&gt;');

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
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL,
  `TIN_number` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=nutral,1=accepted,2=reject,3=new',
  `type` tinyint(2) NOT NULL DEFAULT 7 COMMENT '1=admin,2=bidder,3=auctioneer,4=commitee,5=department,6=finance,7=president',
  `photo` text NOT NULL,
  `bphoto` text NOT NULL,
  `deptname` varchar(100) NOT NULL,
  `data_created` datetime NOT NULL DEFAULT current_timestamp(),
  `sta` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=active,1=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `gender`, `username`, `password`, `email`, `contact`, `address`, `age`, `TIN_number`, `status`, `type`, `photo`, `bphoto`, `deptname`, `data_created`, `sta`) VALUES
(1, 'Administrator', '', '', 'admin', '8ce87b8ec346ff4c80635f667d1592ae', 'admin@gmail.com', '0923222120', 'wolkite', 0, '', 0, 1, '', '', '', '2024-03-05 23:28:49', 0),
(4, 'finance', 'ss', '', 'fan', '25d55ad283aa400af464c76d713c07ad', '', '', '', 33, '', 0, 6, '', '', '', '2024-03-05 23:39:51', 0),
(5, 'commitee', 'dd', '', 'hana', '8ce87b8ec346ff4c80635f667d1592ae', '', '', '', 32, '', 0, 4, '', '', '', '2024-03-05 23:40:29', 0),
(6, 'president', 'ww', '', 'pre', '25d55ad283aa400af464c76d713c07ad', '', '', '', 34, '', 0, 7, '', '', '', '2024-03-05 23:41:17', 0),
(51, 'auctioneer', 'nnn', '', 'eleni', 'e807f1fcf82d132f9bb018ca6738a19f', '', '', '', 44, '', 0, 3, '', '', '', '2024-04-08 19:17:02', 0),
(52, 'esayasl', 'wakajrii', '', 'mrr', '885873cb8b9305303ff867f7a71f29f9', '', '', '', 40, '', 0, 5, '', '', 'IS', '2024-04-09 13:10:01', 0),
(53, 'gech', 'pro', '', 'proj', '8ce87b8ec346ff4c80635f667d1592ae', '', '', '', 235, '', 0, 5, '', '', 'software', '2024-04-09 14:21:51', 0),
(57, 'Elshadai', 'kebde', '', 'elshadaim', '8ce87b8ec346ff4c80635f667d1592ae', '', '', '', 30, 'UUU', 1, 2, '', 'book.jpg', '', '2024-04-12 11:15:30', 0),
(93, 'mole', 'mele', 'Male', 'molsh', 'ea499afdeef66ded657c70864f0c7b95', 'elshadaimelesse47@gmail.com', '978675334', 'adisdkkk', 25, 'jj', 1, 2, 'photos/marker.jpg', 'photos/download (2).jpg', '', '2024-05-07 18:33:18', 0),
(94, 'habte', 'dddd', 'Male', 'habtsh', '358b8237d5369d5eedbc8f059c0ab094', 'elshadaimelesse50@gmail.com', '923434332', 'wolkite', 27, 'JJJJJ', 1, 2, 'photos/download (1).jpg', 'photos/download (2).jpg', '', '2024-05-07 18:34:34', 0),
(95, 'elee', 'eee', 'Male', 'eeeeeee', '9a5168b3dc835c08411f690beac1eb1d', 'beyeneeleni2@gmail.com', '753434342', 'eeee', 33, 'DHSJ', 1, 2, 'photos/table.jpg', 'photos/download (3).jpg', '', '2024-05-07 18:49:18', 0),
(96, 'dfgh', 'wdwe', 'Male', 'vvv', 'd4012cfa3d0013a59f5312088218595f', 'elshadaimelesse47@gmail.com', '908978686', 'kk', 77, '22HHHHHHHHH', 1, 2, 'photos/marker.jpg', 'photos/download (2).jpg', '', '2024-05-07 21:10:38', 0),
(99, 'dfgh', 'ddg', 'Male', 'jj', 'a77a743eb9e67ce2fe1bd78c6521768e', 'd@gmail.com', '787667788', 'hhh', 77, 'jjjjjj', 3, 2, 'photos/download (1).jpg', 'photos/download (2).jpg', '', '2024-05-08 13:35:05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctionitem`
--
ALTER TABLE `auctionitem`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profle`
--
ALTER TABLE `profle`
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
-- AUTO_INCREMENT for table `auctionitem`
--
ALTER TABLE `auctionitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bidform`
--
ALTER TABLE `bidform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `profle`
--
ALTER TABLE `profle`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `requesteditem`
--
ALTER TABLE `requesteditem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
