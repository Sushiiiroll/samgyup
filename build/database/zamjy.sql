-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 05:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zamjy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `username`, `password`, `date_created`, `usertype`) VALUES
(1, 'Jasmin Jauneza', 'jasmin', '123', '2022-11-14 18:19:22', 'staff'),
(11, 'Bryce Justin Cacho', 'bryce', '123', '2022-11-14 20:30:46', 'staff'),
(12, 'Angela Mae Dimaala', 'angela', '123', '2022-11-14 20:31:35', 'staff'),
(14, 'Vaughn Scott Esteban', 'vaughn', '123', '2022-11-14 23:25:43', 'staff'),
(15, 'Admin', 'admin', 'admin123', '2022-11-14 23:54:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_staff`
--

CREATE TABLE `delivery_staff` (
  `deliverystaff_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_staff`
--

INSERT INTO `delivery_staff` (`deliverystaff_id`, `name`, `username`, `password`, `date_created`) VALUES
(1, 'Bryce Justin Cacho', 'toktok', '123', '2022-11-15 00:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  ADD PRIMARY KEY (`deliverystaff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  MODIFY `deliverystaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
