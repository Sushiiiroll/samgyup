-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 12:36 PM
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
(1, 'Jasmin Jauneza', 'jasmin', '123', '2022-11-14 18:19:22', 'staff'),
(11, 'Bryce Justin Cacho', 'bryce', '123', '2022-11-14 20:30:46', 'staff'),
(12, 'Angela Mae Dimaala', 'angela', '123', '2022-11-14 20:31:35', 'staff'),
(14, 'Vaughn Scott Esteban', 'vaughn', '123', '2022-11-14 23:25:43', 'staff'),
(15, 'Admin', 'admin', 'admin123', '2022-11-14 23:54:05', 'admin');

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

--
-- Dumping data for table `delivery_staff`
--

INSERT INTO `delivery_staff` (`deliverystaff_id`, `name`, `username`, `password`, `date_created`) VALUES
(1, 'Bryce Justin Cacho', 'toktok', '123', '2022-11-15 00:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `stock_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `item`, `stock`, `unit`, `stock_date`) VALUES
(1, 'Vinegar', 40, 'Bottles', '2022-12-18 00:26:33'),
(3, 'Soy', 65, 'Bottles', '2022-12-19 10:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu`, `price`, `status`, `date_created`) VALUES
(2, 'Kimbap', 180, 'Unavailable', '2022-12-20 09:25:40'),
(3, 'Bibimbap', 150, 'Available', '2022-12-18 03:15:41'),
(4, 'Unli Zamjy', 299, 'Unavailable', '2022-12-20 09:21:23'),
(5, 'Iced Tea', 60, 'Available', '2022-12-20 09:20:22'),
(6, 'Milktea Large', 120, 'Available', '2022-12-20 09:21:14');

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

--
-- Dumping data for table `onlinecustomer`
--

INSERT INTO `onlinecustomer` (`customer_id`, `name`, `address`, `email`, `contact_number`, `date`) VALUES
(1, 'Juancho Perez', 'San Manuel, Pangasinan', 'eadjkas@gmail.com', 2147483647, '2022-12-17');

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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `order_number` int(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(58, 'juancho ', '2022-12-20'),
(60, 'Puchacik', '2022-12-20');

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
  `subtotal` float NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_orders`
--

INSERT INTO `walkin_orders` (`order_id`, `order_number`, `menu`, `quantity`, `unit_price`, `subtotal`, `order_date`, `customer_id`) VALUES
(58, '8097834', 'Bibimbap', 1, 150, 150, '2022-12-20 18:23:41', 60);

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `delivery_staff`
--
ALTER TABLE `delivery_staff`
  MODIFY `deliverystaff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `walkincustomer`
--
ALTER TABLE `walkincustomer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `walkin_orders`
--
ALTER TABLE `walkin_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
