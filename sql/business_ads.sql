-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 06:29 AM
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
(20, 'arunkumar', 'business ethicks', 'slide--1110.jpg', 'http://localhost/agriculture/assets/img/business/', 'edrgergter', 'www.izaaptech.com', 'Active', '2017-11-17 10:42:26', '2017-11-17 10:46:39', 0, 2),
(22, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-17 10:47:32', '0000-00-00 00:00:00', 2, 0),
(23, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:14:39', '0000-00-00 00:00:00', 1, 0),
(27, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:14', '0000-00-00 00:00:00', 1, 0),
(28, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:16', '0000-00-00 00:00:00', 1, 0),
(29, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:19', '0000-00-00 00:00:00', 1, 0),
(30, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:23', '0000-00-00 00:00:00', 1, 0),
(31, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:27', '0000-00-00 00:00:00', 1, 0),
(32, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:30', '0000-00-00 00:00:00', 1, 0),
(33, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:34', '0000-00-00 00:00:00', 1, 0),
(34, 'mahe', 'huihyuhyiu', 'slide--1111.jpg', 'http://localhost/agriculture/assets/img/business/', 'kjghkjhjkhkjkj', 'iuhiuhuih', 'Active', '2017-11-18 00:46:37', '0000-00-00 00:00:00', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_ads`
--
ALTER TABLE `business_ads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_ads`
--
ALTER TABLE `business_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
