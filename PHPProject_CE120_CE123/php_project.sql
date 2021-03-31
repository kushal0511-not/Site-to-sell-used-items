-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 12:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `seller_address` varchar(255) NOT NULL,
  `buyer_address` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `buyer_email` varchar(255) NOT NULL,
  `seller_phone_no` varchar(255) NOT NULL,
  `buyer_phone_no` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `buyer_id`, `item_id`, `seller_id`, `product_name`, `seller_name`, `buyer_name`, `seller_address`, `buyer_address`, `seller_email`, `buyer_email`, `seller_phone_no`, `buyer_phone_no`, `price`, `image_name`) VALUES
(6, 12, 13, 11, 'iphone', 'kushal shah', 'shail shah', 'Nadiad, Gujarat', '22 MAN MANDIR APPT 44 JAGABHAI PARK LG HOSPITAL', 'kushal1@gmail.com', 'shahshail2001@gmail.com', '9898989898', '786593492', 10000, 'iphone.jpg'),
(7, 11, 17, 12, 'iphone', 'shail shah', 'kushal shah', '22 MAN MANDIR APPT 44 JAGABHAI PARK LG HOSPITAL', 'Nadiad, Gujarat', 'shahshail2001@gmail.com', 'kushal1@gmail.com', '786593492', '9898989898', 20000, 'iphone.jpg'),
(8, 11, 18, 12, 'iphone', 'shail shah', 'kushal shah', '22 MAN MANDIR APPT 44 JAGABHAI PARK LG HOSPITAL', 'Nadiad, Gujarat', 'shahshail2001@gmail.com', 'kushal1@gmail.com', '786593492', '9898989898', 10000, 'iphone.jpg'),
(9, 11, 19, 14, 'iphone', 'shail', 'kushal shah', '22 MAN MANDIR APPT 44 JAGABHAI PARK LG HOSPITAL', 'Nadiad, Gujarat', 'shahshail2001@gmail.com', 'kushal1@gmail.com', '7869475634', '9898989898', 25000, 'iphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `email`, `address`, `phone_no`) VALUES
(11, 'kushal', 'a3VzaGFs', 'kushal shah', 'kushal1@gmail.com', 'Nadiad, Gujarat', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `seller_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
