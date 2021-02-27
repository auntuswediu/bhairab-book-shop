-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 01:54 PM
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
(2, 1, 'Ashikur;Rahman', '1205', '51/A', 'Dhaka', '1205', '2019-12-09 12:57:27', 'ashik@gmail.com', 'SC IT');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `created_at`) VALUES
(1, 0, 'Books', 'books', 'book', 1, '2019-06-24 20:56:27'),
(6, 1, 'Business', 'Business Books', 'Business', 1, '2019-07-30 02:21:34'),
(7, 1, 'Kids', 'Kids', 'Kids', 1, '2019-08-30 00:38:49'),
(8, 1, 'Comics', 'Comics', 'Comics', 1, '2019-08-30 00:39:03'),
(9, 1, 'Computers & Tech', 'Computers & Tech', 'Computers & Tech', 1, '2019-08-30 00:40:37'),
(10, 1, 'Cooking', 'Cooking', 'Cooking', 1, '2019-08-30 00:40:54'),
(16, 1, 'Home & Garden', 'Home & Garden', 'Home & Garden', 1, '2019-08-30 00:49:02'),
(17, 1, 'Horror', 'Horror', 'Horror', 1, '2019-08-30 00:49:42'),
(18, 1, 'Entertainment', 'Entertainment', 'Entertainment', 1, '2019-08-30 00:49:59'),
(19, 1, 'Literature & Fiction', 'Literature & Fiction', 'Literature & Fiction', 1, '2019-08-30 00:50:16'),
(20, 1, 'Medical', 'Medical', 'Medical', 1, '2019-08-30 00:50:36'),
(21, 1, 'Mysteries', 'Mysteries', 'Mysteries', 1, '2019-08-30 00:50:49'),
(22, 1, 'Parenting', 'Parenting', 'Parenting', 1, '2019-08-30 00:51:06'),
(23, 1, 'Social Sciences', 'Social Sciences', 'Social Sciences', 1, '2019-08-30 00:51:25'),
(25, 1, 'Romance', 'Romance', 'Romance', 1, '2019-08-30 00:51:58'),
(26, 1, 'Science & Math', 'Science & Math', 'Science & Math', 1, '2019-08-30 00:52:14'),
(27, 1, 'Sci-Fi & Fantasy', 'Sci-Fi & Fantasy', 'Sci-Fi & Fantasy', 1, '2019-08-30 00:52:41'),
(28, 1, 'Self-Help', 'Self-Help', 'Self-Help', 1, '2019-08-30 00:52:57'),
(29, 1, 'Sports', 'Sports', 'Sports', 1, '2019-08-30 00:53:11'),
(30, 1, 'Teen', 'Teen', 'Teen', 1, '2019-08-30 00:53:25'),
(31, 1, 'Travel', 'Travel', 'Travel', 1, '2019-08-30 00:53:40'),
(32, 1, 'True Crime', 'True Crime', 'True Crime', 1, '2019-08-30 00:53:55');

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
(2, 2, 'Raisa;Rahman', '1205', '51/A', 'Dhaka', '1205', '2019-12-11 12:52:53', 'lk', 'ashik@gmail.com', 'SC IT');

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
(2, 1, '2019-12-09 12:57:27', 0);

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
(8, 2, 6, 1, '2019-12-09 12:57:27');

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
(21, 2, 'U-cash', '01834040969', '187jNou54', 6014, '2019-12-09 12:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(70) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `unit_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `description`, `unit_price`, `qty`, `img1`, `img2`, `img3`, `created_at`, `status`) VALUES
(5, 'Joust Duffle Bag', 10, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 480, 4, '5dc089c959dac6.21021224.jpg', '', '', '2019-11-04 14:29:02', 1),
(6, 'Chaz Kangeroo Hoodie3', 17, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 70, 10, '5dc08a9da05d07.74434876.jpg', '5dc08a9da0e527.93236823.jpg', '', '2019-11-04 14:31:25', 1),
(7, 'Driven Backpack', 9, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 1000, 1, '5dc08f3d391935.16967786.jpg', '', '', '2019-11-04 14:51:09', 1),
(8, 'Chaz Kangeroo Hoodie', 7, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 1200, 2, '5dc08f82597907.12556496.jpg', '', '', '2019-11-04 14:52:18', 1),
(9, 'Shaping Humanity', 18, '', 250, 12, '5dd0d41fd43279.16837654.jpg', '', '', '2019-11-16 23:01:19', 1),
(10, 'Desvendando Princesas', 18, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 190, 7, '5dd0d51ec15cc3.55310771.jpg', '', '', '2019-11-16 23:05:34', 1),
(11, 'Harry Potter ', 19, '', 450, 4, '5dd0d48dde6d93.17180948.jpg', '5dd0d48ddf9424.46874087.jpg', '5dd0d48de08d45.14176226.jpg', '2019-11-16 23:03:09', 1),
(12, 'Empire', 17, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 199, 10, '5dd0d461ad0fc9.85920552.jpg', '', '', '2019-11-16 23:02:25', 1),
(13, 'Costa Rice ', 6, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 999, 3, '5dd0d447e21061.39708873.jpg', '', '', '2019-11-16 23:01:59', 1),
(14, 'Blue Link', 6, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.', 1999, 10, '5dd0d4042b2f75.20418218.jpg', '', '', '2019-11-16 23:00:52', 1);

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
(1, '#', '<i class=\"fa fa-twitter\"></i>', ''),
(2, '#', '<i class=\"fa fa-google-plus\"></i>', ''),
(3, '#', '<i class=\"fa fa-facebook\"></i>', ''),
(4, '#', '<i class=\"fa fa-youtube\"></i>', ''),
(5, '#', '<i class=\"fa fa-flickr\"></i>', ''),
(6, '#', '<i class=\"fa fa-vimeo\"></i>', ''),
(7, '#', '<i class=\"fa fa-instagram\"></i>', '');

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
(1, 'Dhanmondi Dhaka - 1205, Bangladesh', 'support@rafiabookshop.com', '(+1)866-540-3229', 'Rafia Book Shop');

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
(5, 'Pakhi', 'pakhi@gmail.com', '01700254789', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2019-12-05 19:30:27', '', 'dhaka 1205');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
