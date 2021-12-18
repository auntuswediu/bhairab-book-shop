-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 09:13 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(30) NOT NULL,
  `company_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `user_id`, `name`, `phone`, `address`, `city`, `post_code`, `created_at`, `email`, `company_name`) VALUES
(1, 2, 'Md Ashikur;Rahman', '01731002123', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar', 'Dhaka', '1205', '2019-11-29 18:15:24', 'farfia@gmail.com', 'SC IT'),
(2, 1, 'Ashikur;Rahman', '1205', '51/A', 'Dhaka', '1205', '2019-12-09 12:57:27', 'ashik@gmail.com', 'SC IT'),
(3, 6, 'Ashik;Rahman', '01731002123', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar Road, Panthapath', 'Dhaka', '1205', '2019-12-28 21:42:02', 'ashikurashik.sc@gmail.com', 'SoftCare IT');

-- --------------------------------------------------------

--
-- Table structure for table `book_condition`
--

CREATE TABLE `book_condition` (
  `id` int(11) NOT NULL,
  `condition` varchar(252) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_condition`
--

INSERT INTO `book_condition` (`id`, `condition`, `created_at`) VALUES
(1, 'con1', '2020-02-18 09:30:45'),
(2, 'con2', '2020-02-18 09:30:45'),
(3, 'con3', '2020-02-18 09:30:45'),
(4, 'con4', '2020-02-18 09:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sl_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `sl_no`, `parent_id`, `name`, `description`, `url`, `status`, `created_at`) VALUES
(1, '516-00010', 0, 'novel', 'novel', 'novel', 1, NULL),
(2, '517-00010', 0, 'ddnovel2', 'ddnovel2', 'ddnovel2', 1, NULL),
(3, '518-00010', 0, 'anything23', 'anything23', 'anything23', 1, NULL),
(4, '519-00010', 0, 'ddddd', 'ddddd', 'ddddd', 1, NULL),
(5, '7520-00010', 0, 'dddelctro', 'dddelctro', 'dddelctro', 1, NULL),
(6, '521-00010', 0, 'reprise', 'reprise', 'reprise', 1, NULL),
(7, '522-00010', 0, 'hello', 'hello', 'hello', 1, NULL),
(8, '523-00010', 0, 'no way', 'no way', 'no way', 1, NULL),
(9, '524-00010', 0, 'nope', 'nope', 'nope', 1, NULL),
(10, '525-00010', 0, 'keep23', 'keep23', 'keep23', 1, NULL),
(11, '526-00010', 0, 'tree', 'tree', 'tree', 1, NULL),
(12, '527-00010', 0, 'lol23', 'lol23', 'lol23', 1, NULL),
(13, '520-000101', 0, 'dddelctro', 'dddelctro', 'dddelctro', 1, NULL),
(14, '521-000102', 0, 'reprise', 'reprise', 'reprise', 1, NULL),
(15, '521-000103', 0, 'reprise', 'reprise', 'reprise', 1, NULL),
(16, '523-000104', 0, 'no way', 'no way', 'no way', 1, NULL),
(17, '524-000105', 0, 'nope', 'nope', 'nope', 1, NULL),
(18, '525-000106', 0, 'keep23', 'keep23', 'keep23', 1, NULL),
(19, '526-000107', 0, 'tree', 'tree', 'tree', 1, NULL),
(20, '527-000108', 0, 'lol23', 'lol23', 'lol23', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(24) NOT NULL,
  `email` varchar(70) NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `address`, `phone`, `email`, `map`) VALUES
(1, 'Dhanmondi Dhaka - 1205, Bangladesh', '(800) 0123 4567 890 ', 'info@rafiabookshop.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8241322429526!2d90.38020181434848!3d23.753650094570375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8afa8ee676d%3A0x2baedd80bc2f414b!2sSoftCare%20IT!5e0!3m2!1sen!2sbd!4v1574070294824!5m2!1sen!2sbd\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `company_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_info`
--

INSERT INTO `delivery_info` (`id`, `invoice_id`, `name`, `phone`, `address`, `city`, `post_code`, `created_at`, `note`, `email`, `company_name`) VALUES
(1, 1, 'Abira;Rahman', '01731452123', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar', 'Dhaka', '1205', '2019-12-11 12:51:50', '', 'farfia@gmail.com', 'SC IT'),
(2, 2, 'Raisa;Rahman', '1205', '51/A', 'Dhaka', '1205', '2019-12-11 12:52:53', 'lk', 'ashik@gmail.com', 'SC IT'),
(3, 3, 'Ashik;Rahman', '01731002123', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar Road, Panthapath', 'Dhaka', '1205', '2019-12-28 21:42:02', '', 'ashikurashik.sc@gmail.com', 'SoftCare IT'),
(4, 4, 'Ashik;Rahman', '01731002123', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar Road, Panthapath', 'Dhaka', '1205', '2019-12-28 21:46:18', 'hfghf', 'ashikurashik.sc@gmail.com', 'SoftCare IT');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delivery_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `created_at`, `delivery_status`) VALUES
(1, 2, '2019-12-02 05:38:08', 1),
(2, 1, '2019-12-09 12:57:27', 0),
(3, 6, '2019-12-28 21:42:02', 0),
(4, 6, '2019-12-28 21:46:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Rafia', 'rafia@gmail.com', 'Test message', 'Demo message ', '2019-11-16 06:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `invoice_id`, `product_id`, `qty`, `created_at`) VALUES
(1, 1, 12, 1, '2019-12-02 05:35:45'),
(2, 1, 10, 1, '2019-12-02 05:35:45'),
(3, 1, 6, 1, '2019-12-02 05:35:45'),
(4, 2, 14, 2, '2019-12-09 12:57:27'),
(5, 2, 12, 4, '2019-12-09 12:57:27'),
(6, 2, 11, 2, '2019-12-09 12:57:27'),
(7, 2, 10, 1, '2019-12-09 12:57:27'),
(8, 2, 6, 1, '2019-12-09 12:57:27'),
(9, 3, 10, 1, '2019-12-28 21:42:02'),
(10, 4, 12, 1, '2019-12-28 21:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `trx_method` varchar(30) NOT NULL,
  `trx_phone` varchar(16) NOT NULL,
  `trx_id` varchar(20) NOT NULL,
  `trx_amount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `invoice_id`, `trx_method`, `trx_phone`, `trx_id`, `trx_amount`, `created_at`) VALUES
(1, 3, 'Rocket', '01834040969', '187jNou54', 33, '2019-11-28 20:26:18'),
(2, 1, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:04:06'),
(3, 2, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:04:31'),
(4, 3, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:05:41'),
(5, 4, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:05:44'),
(6, 5, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:06:33'),
(7, 6, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:06:38'),
(8, 7, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:07:06'),
(9, 8, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:07:23'),
(10, 9, 'U-cash', '01834040969', '187jNou54', 2258, '2019-11-28 21:08:59'),
(11, 10, 'Rocket', '01834040969', '187jNou54', 2258, '2019-11-28 21:27:36'),
(12, 11, 'B-kash', '', '', 0, '2019-11-28 21:33:40'),
(13, 12, 'B-kash', '', '', 0, '2019-11-28 21:34:35'),
(14, 13, 'B-kash', '', '', 0, '2019-11-28 21:35:05'),
(15, 14, 'B-kash', '', '', 0, '2019-11-28 22:53:55'),
(16, 15, 'B-kash', '', '', 0, '2019-11-28 23:08:19'),
(17, 16, 'Rocket', '01731002123', '457kuF5', 1539, '2019-11-29 17:55:51'),
(18, 1, 'Rocket', '01834040969', '187jNou54', 610, '2019-11-29 18:08:36'),
(19, 2, 'Rocket', '01834040969', '187jNou54', 20050, '2019-11-29 20:36:47'),
(20, 1, 'Rocket', '01834040969', '187jNou54', 2258, '2019-12-02 05:35:45'),
(21, 2, 'U-cash', '01834040969', '187jNou54', 6014, '2019-12-09 12:57:27'),
(22, 3, 'B-kash', '', '', 0, '2019-12-28 21:42:02'),
(23, 4, 'B-kash', '', '', 0, '2019-12-28 21:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `market_price` double NOT NULL,
  `nilkhet_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `writer_name` text NOT NULL,
  `published_year` varchar(10) NOT NULL,
  `book_condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `description`, `market_price`, `nilkhet_price`, `qty`, `img1`, `img2`, `img3`, `created_at`, `status`, `writer_name`, `published_year`, `book_condition`) VALUES
(5, 'Normal Package', 3, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 100, 99, 64, '5e4c0612696987.58659099.png', '', '5e4c08a6b375d4.23555991.png', '2020-02-18 17:32:32', 1, '', '2020', 'con3'),
(6, 'Medium Package ', 16, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 10000, 0, 10, '5e07cefa757a73.76015336.jpg', '5dc08a9da0e527.93236823.jpg', '', '2019-12-28 21:54:02', 1, '', '', ''),
(7, 'Professional Package ', 16, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 20000, 0, 1, '5e07d042224de3.81139036.jpg', '', '', '2019-12-28 21:59:30', 1, '', '', ''),
(12, 'Mini Package ', 17, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 2000, 0, 10, '5e07d084365c24.10815831.jpg', '', '', '2019-12-28 22:00:36', 1, '', '', ''),
(13, 'Normal Package   ', 17, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 5000, 0, 3, '5e07d12d6f7e83.16015592.jpg', '', '', '2019-12-28 22:03:25', 1, '', '', ''),
(14, 'Corporate ', 17, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 10000, 0, 10, '5e07d149c0f810.28490478.jpg', '', '', '2019-12-28 22:03:53', 1, '', '', ''),
(15, 'Family tour ', 18, '', 15000, 0, 0, '5e07d1e0a35892.02747853.jpg', '', '', '2019-12-28 22:06:24', 1, '', '', ''),
(16, 'Family Function ', 18, '', 20000, 0, 0, '5e07d20c55a1d6.77932208.jpg', '', '', '2019-12-28 22:07:08', 1, '', '', ''),
(17, 'Farewell Party ', 19, '', 50000, 0, 0, '5e07d29a4a6cc7.14370320.jpg', '', '', '2019-12-28 22:09:30', 1, '', '', ''),
(18, 'Just For Kids ', 20, '', 5000, 0, 0, '5e07d2b1cdbab2.86182735.jpg', '', '', '2019-12-28 22:09:53', 1, '', '', ''),
(19, 'Normal Package', 5, 'ffhh', 150, 100, 50, '', '', '', '2020-02-18 16:05:41', 1, 'Sujoy', '2020', 'con4'),
(20, '', 0, '', 0, 0, 666, '', '', '', '2020-02-18 16:49:35', 1, '', '', ''),
(21, 'Normal Package', 1, 'rter', 100, 222, 40, '5e4e3e748f7256.15722422.jpg', '', '', '2020-02-20 08:08:20', 1, 'Ashik', '222', 'con2');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `url`, `icon`, `name`) VALUES
(1, '#', '<i class=\"fa fa-twitter\"></i>', 'twitter'),
(2, '#', '<i class=\"fa fa-google-plus\"></i>', 'google'),
(3, '#', '<i class=\"fa fa-facebook\"></i>', 'facebook'),
(4, '#', '<i class=\"fa fa-youtube\"></i>', 'youtube'),
(5, '#', '<i class=\"fa fa-flickr\"></i>', 'flickr'),
(6, '#', '<i class=\"fa fa-vimeo\"></i>', 'vimeo'),
(7, '#', '<i class=\"fa fa-instagram\"></i>', 'instagram');

-- --------------------------------------------------------

--
-- Table structure for table `store_info`
--

CREATE TABLE `store_info` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_info`
--

INSERT INTO `store_info` (`id`, `address`, `email`, `phone`, `company_name`) VALUES
(1, 'Rajshahi, Bangladesh', 'support@eventmanagement.com', '(+1)866-540-3229', 'EVENT MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `created_at`, `img`, `address`) VALUES
(1, 'Admin', 'admin@gmail.com', '01731002123', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2019-10-27 18:55:45', '', ''),
(2, 'Rafia', 'rafia@gmail.com', '01731002124', '202cb962ac59075b964b07152d234b70', 'user', '2019-11-04 18:06:55', '', ''),
(3, 'g', 'demo@gmail.com', '017310021', '202cb962ac59075b964b07152d234b70', 'user', '2019-11-17 06:46:54', '', ''),
(4, 'MAHMUDA KHATUN', 'mahamuda@gmail.com', '01731002125', '202cb962ac59075b964b07152d234b70', 'user', '2019-12-05 07:41:52', '', ''),
(5, 'Pakhi', 'pakhi@gmail.com', '01700254789', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2019-12-05 19:30:27', '', 'dhaka 1205'),
(6, 'Ashik', 'ashikurashik.sc@gmail.com', '01731002123', '202cb962ac59075b964b07152d234b70', 'user', '2019-12-28 21:09:12', '', 'House # 51/A/1 1st Floor Flat # A-1 West RazaBazar Road, Panthapath');

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`id`, `name`) VALUES
(1, 'Ashik'),
(2, 'Sujoy'),
(3, 'Cosmic'),
(4, 'Shojib'),
(5, 'Masum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_condition`
--
ALTER TABLE `book_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sl_no` (`sl_no`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_condition`
--
ALTER TABLE `book_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_info`
--
ALTER TABLE `store_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD CONSTRAINT `contact_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `messages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
