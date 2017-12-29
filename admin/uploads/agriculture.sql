-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 01:10 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_ads`
--

CREATE TABLE `business_ads` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ads_image` text NOT NULL,
  `filepath` text NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_ads`
--

INSERT INTO `business_ads` (`id`, `customer_name`, `title`, `ads_image`, `filepath`, `description`, `url`, `status`, `created_date`, `updated_date`, `created_id`, `updated_id`) VALUES
(22, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-17 10:47:32', '0000-00-00 00:00:00', 2, 0),
(28, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:16', '0000-00-00 00:00:00', 1, 0),
(32, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:30', '0000-00-00 00:00:00', 1, 0),
(34, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Inactive', '2017-11-18 00:46:37', '2017-11-18 03:22:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_img` text NOT NULL,
  `filepath` text NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `category_img`, `filepath`, `status`, `created_date`, `updated_date`, `created_id`, `updated_id`) VALUES
(12, 'some category', 'jhgjgjhgjhg', 'slide--31.jpg', 'http://localhost/agriculture/assets/img/category/', 'Active', '2017-11-22 07:27:18', '2017-11-22 07:29:56', 1, 1),
(13, 'rwetwert', 'werwer', 'slide--121.jpg', 'http://localhost/agriculture/assets/img/category/', 'Active', '2017-11-22 07:38:21', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `from_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `to_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_image` text NOT NULL,
  `filepath` text NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `location`, `from_date`, `to_date`, `event_image`, `filepath`, `description`, `status`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 'developement vents', 'chennai', '2017-12-07 18:30:00', '2017-12-08 18:30:00', '', 'http://localhost/agriculture/assets/img/business/', 'sdrftwerwerwe', 'Active', 2, 2, '2017-11-21 05:44:12', '2017-11-21 06:28:36'),
(2, 'wrtw3rwe', 'werwer', '2017-11-22 18:30:00', '2017-11-29 18:30:00', 'download_(1).jpg', 'http://localhost/agriculture/assets/img/business/', 'werwer', 'Active', 2, 1, '2017-11-21 07:03:07', '2017-11-21 09:26:15'),
(3, 'developement vents', 'chennai', '2017-12-01 18:30:00', '2018-01-03 18:30:00', 'download.jpg', 'http://localhost/agriculture/assets/img/business/', 'uiyhiyiuyiy', 'Active', 2, 1, '2017-11-21 07:05:22', '2017-11-21 09:29:12'),
(4, 'swfgsdf', 'sdfsdf', '2017-12-06 18:30:00', '2018-02-27 18:30:00', 'download_(2).jpg', 'http://localhost/agriculture/assets/img/business/', 'sdfsdfsdf', 'Active', 1, 1, '2017-11-21 08:16:43', '2017-11-21 09:32:50'),
(5, 'swfgsdf', 'hydrapth', '2017-11-20 18:30:00', '2017-11-20 18:30:00', 'download_(3).jpg', 'http://localhost/agriculture/assets/img/business/', 'wefwfwef', 'Active', 1, 1, '2017-11-21 08:26:54', '2017-11-21 09:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `amount`, `description`, `created_date`, `updated_date`, `created_id`, `updated_id`) VALUES
(2, 'nandhakumar', '589', 'hbjvhjfgvjhgh', '2017-11-18 00:07:40', '2017-11-17 08:56:59', 2, 1),
(4, 'vasudevan', '45', 'jsgdhkjhs', '2017-11-18 00:08:12', '2017-11-18 00:07:16', 1, 1),
(5, 'srinivasan', '45', 'jsgdhkjhs', '2017-11-18 00:08:01', '2017-11-18 00:07:19', 1, 1),
(6, 'rajasekar', '78', 'jsgdhkjhs', '2017-11-19 23:59:33', '2017-11-18 00:07:21', 1, 2),
(7, 'ramkumar', '68', 'jsgdhkjhs', '2017-11-19 23:59:23', '2017-11-18 00:07:24', 1, 2),
(9, 'tutorjoesh', '58', 'jsgdhkjhs', '2017-11-19 23:59:17', '2017-11-18 00:07:29', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'superadmin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `role`, `profile_image`) VALUES
(1, 'Sathish', 'M', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@gmail.com', 1, ''),
(2, 'mahe', 'chinnasamy', 'mahendran', '5f4dcc3b5aa765d61d8327deb882cf99', 'mahe@gmail.com', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_ads`
--
ALTER TABLE `business_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_ads`
--
ALTER TABLE `business_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
