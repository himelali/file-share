-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2017 at 09:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herebd`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_all_products`
--

CREATE TABLE `shop_all_products` (
  `product_id` mediumint(6) NOT NULL,
  `cat_id` smallint(4) NOT NULL,
  `sub_cat_id` smallint(4) NOT NULL,
  `product_name` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` smallint(4) NOT NULL,
  `product_price` decimal(6,2) DEFAULT NULL,
  `product_old_price` decimal(6,2) DEFAULT NULL,
  `product_code` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_desc` text COLLATE utf8_unicode_ci,
  `product_spec` text COLLATE utf8_unicode_ci,
  `product_image` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_size` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_weight` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `inserted_ip` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `shop_all_users`
--

CREATE TABLE `shop_all_users` (
  `user_id` mediumint(6) NOT NULL,
  `username` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` enum('admin','customer') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `user_mobile` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `user_address1` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address2` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_city` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_district` varchar(63) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_dob` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_image` varchar(31) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `shop_all_users`
--

INSERT INTO `shop_all_users` (`user_id`, `username`, `password`, `full_name`, `user_role`, `user_mobile`, `user_email`, `user_address1`, `user_address2`, `user_city`, `user_district`, `user_dob`, `user_gender`, `user_image`, `user_registration`, `user_ip`, `user_status`) VALUES
(100001, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Md. Abdul Wadud', 'admin', '01791144445', 'wadudit@gmail.com', NULL, NULL, NULL, NULL, NULL, 'male', NULL, '2017-03-30 20:59:09', '[::1]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `cat_id` smallint(4) NOT NULL,
  `cat_name` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8_unicode_ci,
  `cat_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_details`
--

CREATE TABLE `shop_order_details` (
  `details_id` mediumint(7) NOT NULL,
  `order_id` mediumint(6) NOT NULL,
  `product_id` mediumint(6) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` smallint(4) NOT NULL DEFAULT '1',
  `product_discount` decimal(5,2) DEFAULT NULL,
  `discount_type` enum('p','t') COLLATE utf8_unicode_ci DEFAULT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `details_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `details_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_masters`
--

CREATE TABLE `shop_order_masters` (
  `order_id` mediumint(6) NOT NULL,
  `order_token` varchar(31) COLLATE utf8_unicode_ci NOT NULL,
  `user_details` text COLLATE utf8_unicode_ci,
  `user_id` mediumint(6) NOT NULL,
  `total_product` smallint(4) NOT NULL,
  `product_quantity` decimal(6,2) NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `total_discount` decimal(5,2) DEFAULT NULL,
  `discount_type` enum('p','t') COLLATE utf8_unicode_ci DEFAULT NULL,
  `grand_total` decimal(7,2) NOT NULL,
  `order_ip` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `order_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_confirmation` enum('pending','received','delivered','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `order_comments` text COLLATE utf8_unicode_ci,
  `order_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_sub_categories`
--

CREATE TABLE `shop_sub_categories` (
  `sub_cat_id` smallint(4) NOT NULL,
  `cat_id` smallint(4) NOT NULL,
  `sub_cat_name` varchar(63) COLLATE utf8_unicode_ci NOT NULL,
  `sub_cat_desc` text COLLATE utf8_unicode_ci,
  `sub_cat_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sub_cat_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_all_products`
--
ALTER TABLE `shop_all_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`);

--
-- Indexes for table `shop_all_users`
--
ALTER TABLE `shop_all_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `shop_order_details`
--
ALTER TABLE `shop_order_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shop_order_masters`
--
ALTER TABLE `shop_order_masters`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_token` (`order_token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shop_sub_categories`
--
ALTER TABLE `shop_sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_all_products`
--
ALTER TABLE `shop_all_products`
  MODIFY `product_id` mediumint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_all_users`
--
ALTER TABLE `shop_all_users`
  MODIFY `user_id` mediumint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `cat_id` smallint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_order_details`
--
ALTER TABLE `shop_order_details`
  MODIFY `details_id` mediumint(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_order_masters`
--
ALTER TABLE `shop_order_masters`
  MODIFY `order_id` mediumint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_sub_categories`
--
ALTER TABLE `shop_sub_categories`
  MODIFY `sub_cat_id` smallint(4) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_all_products`
--
ALTER TABLE `shop_all_products`
  ADD CONSTRAINT `shop_all_products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `shop_categories` (`cat_id`),
  ADD CONSTRAINT `shop_all_products_ibfk_2` FOREIGN KEY (`sub_cat_id`) REFERENCES `shop_sub_categories` (`sub_cat_id`);

--
-- Constraints for table `shop_order_details`
--
ALTER TABLE `shop_order_details`
  ADD CONSTRAINT `shop_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `shop_order_masters` (`order_id`),
  ADD CONSTRAINT `shop_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `shop_all_products` (`product_id`);

--
-- Constraints for table `shop_order_masters`
--
ALTER TABLE `shop_order_masters`
  ADD CONSTRAINT `shop_order_masters_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `shop_all_users` (`user_id`);

--
-- Constraints for table `shop_sub_categories`
--
ALTER TABLE `shop_sub_categories`
  ADD CONSTRAINT `shop_sub_categories_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `shop_categories` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
