-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 10:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostex`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `user_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`user_id`, `username`, `phone`, `email`, `password`) VALUES
('6572e2f05722e', 'Vijay', '2345634523', 'asf@gmail.com', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `user_id` varchar(20) NOT NULL,
  `guardian` text NOT NULL,
  `relation` text NOT NULL,
  `gphone` varchar(12) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `nationality` text NOT NULL,
  `state` text NOT NULL,
  `district` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `clg_name` varchar(50) NOT NULL,
  `clg_id` blob NOT NULL,
  `Aadhaar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_list`
--

CREATE TABLE `hostel_list` (
  `hostel_id` int(11) NOT NULL,
  `hname` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_list`
--
ALTER TABLE `account_list`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hostel_list`
--
ALTER TABLE `hostel_list`
  ADD PRIMARY KEY (`hostel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hostel_list`
--
ALTER TABLE `hostel_list`
  MODIFY `hostel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD CONSTRAINT `foreign1` FOREIGN KEY (`user_id`) REFERENCES `account_list` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
