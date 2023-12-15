-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 07:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `password` varchar(20) NOT NULL,
  `fullname` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`user_id`, `username`, `phone`, `email`, `password`, `fullname`, `address`) VALUES
('6572e2f05722e', 'Vijay', '2345634523', 'asf@gmail.com', 'asdasd', NULL, NULL),
('657472dc2bff5', 'eren', '1234567890', 'eren@paradis.com', 'mikasa', NULL, NULL),
('65747935ba4b2', 'mikasa', '1234567891', 'mikasa@paradis.com', 'eren', NULL, NULL);

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
  `price` float NOT NULL,
  `hphone` varchar(12) NOT NULL,
  `haddress` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `photo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_list`
--

INSERT INTO `hostel_list` (`hostel_id`, `hname`, `location`, `price`, `hphone`, `haddress`, `description`, `photo`) VALUES
(1, 'Priyanka vihar boys hostel', 'Kariavattom', 5000, '', 'Near kariavattom bus stop\nGovt college karivatom and keralauniversiy in 1km,\nHospital with in 3km.\nNearby post office,medicalshops supermarket,atm are situated', '.Floor:3\n\n.Food and accommodation \n.Room with 3 bed \n.sharable rooms only available(no single bed rooms)\n.free Wifi available \n.Time -10:00pm(if any valid reason for late coming notify the warden earlier otherwise students should enter the hostel within 10pm )\n. Monthly ₹ 5500/- including food and gst\nFood :breakfast,lunch,dinner only\n.per day rent ₹300/- (no food)', ''),
(7, 'Lilly Ladies Hostel', 'Kazhakkoottam', 5500, '8555467898', 'Lilly ladies hostel  Nila nagar,Ambalathinkara, kazhakootam,695022', 'Owner :Lilly Contact number:+91 8555467898  .100m away from NH, Arts and engineering college in 1km, Hospital with in 2km. Nearby post office, supermarket,atm are situated ...  .Floor:3 .Food and accommodation  .Room with 3 beds .Wifi not available  .Time -7:00pm(students should enter the hos within 7pm)  . Monthly ₹ 5500/- .per day rent ₹300/- (with 2-time food)', NULL),
(8, 'Panchajanyam ladies hostel', 'Kariavattom', 3600, '8555515654', 'Panchajanyam ladies hostel Kariavattom, Thiruvananthapuram 695581', 'Owner : Sudha  Contact number:+91 8555515654  .Opposite to Ayyappan temple,karivattom .50m away from NH, .University college of Engineering in 1km, Hospital with in 2km. Nearby post office, stationary shop,ATM are situated ...  .Floor:2 .Study hall for all students are available. .Food and accommodation / accomodation only .Room share with 4 beds .Switch off the lights in all room excluding study hall in 10pm .Wifi not available  .Time -8:00pm(students should enter the hos within 8pm)  . Monthly', NULL),
(9, 'Unique ladies hostel', 'Kazhakkoottam', 4000, '8921854581', 'Unique ladies hostel Kazhakootam ,tvm', 'Near kseb substation kazhakootam 150 m away from NH keralauniversiy in 1km Hospital with in 3km, Nearby post office,medicalshops supermarket,atm are situated ...  .Floor:5 .Food and accommodation  .Ac /non Ac room avilable .seperate 2 common halls available  .roof top study hall( desk and bech provided) .Room with 4 bed ,2 bed available .sharable rooms only available(no single bed rooms) .free Wifi available  .Time -No time restriction Non Ac . Monthly ₹ 5000/- including foodand gst Food :breakf', NULL),
(10, 'Sona Ladies Hostel ', 'Kazhakkoottam', 3300, '9999479647', 'Sona Ladies Hostel', 'Back side of HDFC BANK  Railway station ( kazhakootam station)in 2km Govt college karivatom and  universiy engineering college in 3km, Hospital with in 1km. Nearby post office,medicalshops supermarket,atm are situated ...  .Floor:4  .Food and accommodation or only accomodation available .Room with 2,3,4 beds are available(no single bed rooms) .other friends (non-hostelers) have no entry .Free Wifi available  .Time -11:00 pm( if any valid reason notify the warder earlier) . Monthly ₹ 6000/- inclu', NULL),
(11, 'Tech ladies hostel', 'Kariavattom', 3000, '8921854681', 'Tech ladies hostel Kariavattom,tvm 695022', 'Owner :Jacob Contact number:+918921854681  Opposite to govt college karivatom Within 400m from kariavatom jn keralauniversiy in 2km,govt college within 100m Hospital with in 3km, Nearby post office,medicalshops supermarket,atm are situated ...  .Floor:4 .Food and accommodation  .common study hall with Ac( desk and bech provided) .Room with 4 bed ,3 bed rooms avalailable  .single pc with internet facility available  .Time -No time restriction .visitors can visit in weekends . Monthly ₹ 5500/- inc', NULL);

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
  MODIFY `hostel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
