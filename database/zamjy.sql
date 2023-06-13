-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 03:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `name`, `username`, `password`, `date_created`, `usertype`) VALUES
(15, 'Admin', 'admin', 'admin123', '2022-11-14 23:54:05', 'admin'),
(18, 'kin gina', 'yawa', '123', '2023-04-17 18:39:15', 'store_staff'),
(19, 'aqweqwe', 'deli', 'very', '2023-04-17 18:39:45', 'delivery_staff');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
(3, 'Food'),
(4, 'Drinks');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `item` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `stock_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu`, `category`, `price`, `description`, `stock`, `package`, `date_created`) VALUES
(27, 'Kimchi', '3', 150, 'Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description ', 1065, 'Yes', '2023-05-11 20:10:08'),
(28, 'Set A', '3', 500, 'Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description ', 1097, 'Yes', '2023-05-11 20:09:11'),
(29, 'Soju', '4', 200, 'Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description Description ', 1103, 'No', '2023-05-11 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(255) NOT NULL,
  `sales_id` int(255) NOT NULL,
  `isRead` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `sales_id`, `isRead`) VALUES
(3, 6851295, 'NO'),
(4, 7939128, 'NO'),
(5, 8511105, 'NO'),
(6, 93347, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `onlinecustomer`
--

CREATE TABLE `onlinecustomer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_orders`
--

CREATE TABLE `online_orders` (
  `order_id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `pax` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `discounted` varchar(255) NOT NULL,
  `order_category` varchar(255) NOT NULL,
  `order_number` int(20) NOT NULL,
  `order_type` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `discounted`, `order_category`, `order_number`, `order_type`, `customer_id`, `total`, `date`, `account_id`) VALUES
(60, '0', 'WALK-IN', 6851295, 'Dine In', 206, 3760, '2023-05-04 10:34:39', 18),
(61, '0.20', 'ONLINE', 7939128, 'Take Out', 207, 2678.4, '2023-05-04 10:35:11', 18),
(62, '0.20', 'WALK-IN', 8511105, 'Dine In', 208, 3749.6, '2023-05-11 20:09:41', 18),
(63, '0', 'WALK-IN', 93347, 'Dine In', 209, 4172, '2023-05-11 20:10:16', 18);

-- --------------------------------------------------------

--
-- Table structure for table `walkincustomer`
--

CREATE TABLE `walkincustomer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkincustomer`
--

INSERT INTO `walkincustomer` (`customer_id`, `name`, `date`) VALUES
(205, 'kin gina', '2023-05-04'),
(206, 'kin gina', '2023-05-04'),
(207, 'qweqwe', '2023-05-04'),
(208, 'kin gina', '2023-05-11'),
(209, 'qweqwe', '2023-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_orders`
--

CREATE TABLE `walkin_orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(10) NOT NULL,
  `menu` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_orders`
--

INSERT INTO `walkin_orders` (`order_id`, `order_number`, `menu`, `quantity`, `unit_price`, `order_date`, `customer_id`) VALUES
(223, '6851295', '27', 1, 150, '2023-05-04 10:34:26', 206),
(224, '6851295', '29', 5, 200, '2023-05-04 10:34:29', 206),
(225, '6851295', '28', 5, 500, '2023-05-04 10:34:32', 206),
(226, '7939128', '27', 5, 150, '2023-05-04 10:35:01', 207),
(227, '7939128', '28', 5, 500, '2023-05-04 10:35:04', 207),
(228, '8511105', '27', 1, 150, '2023-05-11 20:08:59', 208),
(229, '8511105', '28', 2, 500, '2023-05-11 20:09:03', 208),
(230, '8511105', '29', 3, 200, '2023-05-11 20:09:05', 208),
(231, '8511105', '27', 4, 150, '2023-05-11 20:09:07', 208),
(232, '8511105', '27', 4, 150, '2023-05-11 20:09:09', 208),
(233, '8511105', '28', 2, 500, '2023-05-11 20:09:11', 208),
(234, '8511105', '27', 4, 150, '2023-05-11 20:09:13', 208),
(235, '93347', '27', 5, 150, '2023-05-11 20:09:53', 209),
(236, '93347', '27', 2, 150, '2023-05-11 20:09:55', 209),
(237, '93347', '27', 5, 150, '2023-05-11 20:09:58', 209),
(238, '93347', '27', 5, 150, '2023-05-11 20:10:00', 209),
(239, '93347', '27', 5, 150, '2023-05-11 20:10:05', 209),
(240, '93347', '27', 5, 150, '2023-05-11 20:10:08', 209);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  ADD PRIMARY KEY (`deliverystaff_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `onlinecustomer`
--
ALTER TABLE `onlinecustomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `online_orders`
--
ALTER TABLE `online_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `sales_ibfk_1` (`customer_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  MODIFY `deliverystaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `onlinecustomer`
--
ALTER TABLE `onlinecustomer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_orders`
--
ALTER TABLE `online_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `walkincustomer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  ADD CONSTRAINT `walkin_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `walkincustomer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
