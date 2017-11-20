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
(6, 'mathankaumar', '45', 'jsgdhkjhs', '2017-11-18 04:37:21', '2017-11-18 00:07:21', 1, 0),
(7, 'mathankaumar', '45', 'jsgdhkjhs', '2017-11-18 04:37:24', '2017-11-18 00:07:24', 1, 0),
(9, 'mathankaumar', '45', 'jsgdhkjhs', '2017-11-18 04:37:29', '2017-11-18 00:07:29', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
