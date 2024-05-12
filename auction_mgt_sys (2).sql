-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 05:45 PM
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
(40, 'table', 'chair', 'wood', 13, 12, 156, 1, 1, '2024-05-05 21:45:37'),
(41, 'computers', 'pc', 'RAM,cpu', 10, 80, 800, 1, 1, '2024-05-11 20:42:55'),
(42, 'Cloths', 'cotton fabric', 'Meter', 50, 1000, 50000, 1, 1, '2024-05-12 13:25:35'),
(43, 'Thread', 'textile', 'piece', 100, 45, 4500, 1, 1, '2024-05-12 13:27:38'),
(44, 'charger sockets', 'power plug', 'Number', 100, 100, 10000, 1, 1, '2024-05-12 13:31:52'),
(45, 'Computer', 'Dell', 'Number', 100, 25000, 2500000, 1, 1, '2024-05-12 13:34:41');

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
(11, 'electronics'),
(12, 'computer');

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
(41, '103', 2, '11', 1, 'asdfghj', 'qwertyuiolkjhgfd', '2024-05-12 12:27:01', 'unread'),
(42, '103', 2, '11', 1, 'qwertyuijbvcdxs', 'asdfghjm v', '2024-05-12 12:27:43', 'read'),
(43, '51', 3, '103', 0, 'wertyuk', 'qwertyujmnbvcxd', '2024-05-12 16:39:01', 'read'),
(44, '103', 2, '11', 1, 'please', 'i will be nice', '2024-05-12 16:40:14', 'unread');

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
  `user_id` int(20) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0=request,1=new,2=used',
  `date_payed` datetime NOT NULL DEFAULT current_timestamp(),
  `photo` text NOT NULL,
  `bphoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `reason`, `pro_id`, `amount`, `bidder_id`, `user_id`, `transaction_id`, `status`, `date_payed`, `photo`, `bphoto`) VALUES
(1, 'selling', 53, 50, 103, 0, 'hana300', 1, '2024-05-12 14:44:52', 'uploads/', ''),
(2, 'gift', 53, 200, 103, 0, 'hana30', 1, '2024-05-12 15:54:57', 'uploads/', '');

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
(53, 4, 'Cloths', 'Meter', '50', '200', '50000', 'For garment  and fashion student', 10000, 1000, '2024-05-13 13:27:00', '53.jpg', '2024-05-12 13:27:28'),
(54, 4, 'Thread', 'piece', '100', '250', '4500', 'For garment and fashion student', 5000, 45, '2024-05-13 20:00:00', '54.jpg', '2024-05-12 13:29:04'),
(55, 11, 'charger sockets', 'Number', '100', '400', '10000', 'socket charger by 3 ports', 15000, 100, '2024-05-14 19:00:00', '55.jpg', '2024-05-12 13:34:19'),
(56, 12, 'Computer', 'Number', '100', '350', '2500000', 'we need Dell computers for our computer Libraries and for staff!', 100000, 25000, '2024-05-14 13:36:00', '56.jpg', '2024-05-12 13:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `profle`
--

CREATE TABLE `profle` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 9, 63, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 1, 1, 2, 0, 'IS', '', 'we don\'t have beget', '2024-05-11 23:34:33', '2024-05-11 23:34:33'),
(3, 1000, 50000, 'Cloths', 'cotton fabric', 'We need it for garment student', 'Meter', 50, 2, 1, 1, 1, 'Garement', '', '', '2024-05-12 13:16:08', '2024-05-12 13:16:08'),
(4, 45, 4500, 'Thread', 'textile', 'We need it for garment student', 'piece', 100, 3, 1, 1, 1, 'Garement', '', '', '2024-05-12 13:16:08', '2024-05-12 13:16:08'),
(6, 25000, 2500000, 'Computer', 'Dell', 'we need Dell computers for our computer Libraries and for staff!', 'Number', 100, 4, 1, 1, 1, 'IS', '', '', '2024-05-12 13:30:13', '2024-05-12 13:30:13'),
(7, 100, 10000, 'charger sockets', 'power plug', 'socket charger by 3 ports', 'Number', 100, 5, 1, 1, 1, 'IS', '', '', '2024-05-12 13:30:13', '2024-05-12 13:30:13'),
(9, 125, 18750, 'Ardino materials', 'plug', 'Electronics, branch of physics and electrical engineering that deals with the emission, behaviour, and effects of electrons and with electronic devices.', 'number', 150, 6, 1, 1, 0, 'software', '', '', '2024-05-12 13:46:40', '2024-05-12 13:46:40'),
(10, 0, 0, 'Pc', 'HP', 'for software student and staff worker', 'Number', 50, 7, 0, 0, 0, 'software', '', '', '2024-05-12 14:26:44', '2024-05-12 14:26:44');

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
(1, 'table', 'habhgd', 'i need the table', 'hhdjskbwe6', 7, 1, 'IS', 'abdu melike', '', '2024-05-11 22:41:22'),
(2, 'Cloths', 'cotton fabric', 'We need it for garment student', 'Meter', 50, 1, 'Garement', 'Elshadai Melesse', '', '2024-05-12 13:13:05'),
(3, 'Thread', 'textile', 'We need it for garment student', 'piece', 100, 1, 'Garement', 'Elshadai Melesse', '', '2024-05-12 13:13:05'),
(4, 'Computer', 'Dell', 'we need Dell computers for our computer Libraries and for staff!', 'Number', 100, 1, 'IS', 'abdu melike', '', '2024-05-12 13:19:14'),
(5, 'charger sockets', 'power plug', 'socket charger by 3 ports', 'Number', 100, 1, 'IS', 'abdu melike', '', '2024-05-12 13:24:00'),
(6, 'Ardino materials', 'plug', 'Electronics, branch of physics and electrical engineering that deals with the emission, behaviour, and effects of electrons and with electronic devices.', 'number', 150, 1, 'software', 'Robel', 'for it student', '2024-05-12 13:45:00'),
(7, 'Pc', 'HP', 'for software student and staff worker', 'Number', 50, 1, 'software', 'Robel aklilu', '', '2024-05-12 14:26:05');

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
(101, 'hanna', 'semu', 'Femal', 'hhss', 'edb4453919043acca51d2ee7817d604c', 'hannasemu30@gmail.com', '909999677', 'aa', 23, 'hh', 3, 2, 'photos/120730838.jfif', 'photos/photo_2023-12-14_21-09-46.jpg', '', '2024-05-10 12:26:49', 0),
(103, 'hanna', 'semu', 'Femal', 'han', 'edb4453919043acca51d2ee7817d604c', 'hannasemu25@gmail.com', '987879877', 'aa', 23, '143', 1, 2, 'photos/watching-sunset-near-rice-paddies-field-wallpaper-1280x800_3.jpg', 'photos/photo_2023-12-14_21-09-46.jpg', '', '2024-05-11 20:22:45', 0),
(104, 'abdu', 'melike', '', 'iss', '25d55ad283aa400af464c76d713c07ad', '', '', '', 35, '', 0, 5, '', '', 'IS', '2024-05-11 20:32:35', 0),
(105, 'Elshadai', 'Melesse', '', 'elshu', '25d55ad283aa400af464c76d713c07ad', '', '', '', 28, '', 0, 5, '', '', 'Garement', '2024-05-12 12:52:15', 0),
(106, 'Robel', 'aklilu', '', 'software', '25d55ad283aa400af464c76d713c07ad', '', '', '', 25, '', 0, 5, '', '', 'software', '2024-05-12 13:38:31', 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidform_product_id_qw` (`product_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bids_user_id_we` (`user_id`),
  ADD KEY `bids_product_id_e` (`product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_bidder_id_fr` (`bidder_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_id` (`category_id`);

--
-- Indexes for table `profle`
--
ALTER TABLE `profle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prfle_user_id` (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_requesteditem_id_er` (`requesteditem_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `bidform`
--
ALTER TABLE `bidform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `profle`
--
ALTER TABLE `profle`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requesteditem`
--
ALTER TABLE `requesteditem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidform`
--
ALTER TABLE `bidform`
  ADD CONSTRAINT `bidform_product_id_qw` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_product_id_e` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `bids_user_id_we` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_bidder_id_fr` FOREIGN KEY (`bidder_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `profle`
--
ALTER TABLE `profle`
  ADD CONSTRAINT `prfle_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_requesteditem_id_er` FOREIGN KEY (`requesteditem_id`) REFERENCES `requesteditem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
