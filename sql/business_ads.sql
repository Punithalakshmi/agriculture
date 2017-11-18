-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 02:21 PM
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
  `status` enum('Active','Inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_ads`
--

INSERT INTO `business_ads` (`id`, `customer_name`, `title`, `ads_image`, `filepath`, `description`, `url`, `status`) VALUES
(1, 'mahendran', 'hawalalbusiness', '', 'http://localhost/agriculture/assets/img/business/', 'wsfwefwe', '', 'Active');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
