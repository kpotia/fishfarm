-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2020 at 12:25 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `expid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(35) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `exp_date` date NOT NULL,
  `note` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL,
  PRIMARY KEY (`expid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expid`, `type`, `amount`, `exp_date`, `note`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Taxes', '30000.00', '2020-10-21', 'The taxes pay for this year at FIRS           ', 'paid', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 'salary', '4000.00', '2020-10-21', 'The staff salary paid for this month successfully            ', 'paid', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 'water', '4000.00', '2020-10-21', 'The water bill pay for this month on Nigerian water supply               ', 'paid', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

DROP TABLE IF EXISTS `fish`;
CREATE TABLE IF NOT EXISTS `fish` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fishname` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`id`, `name`, `price`, `description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Red fish', '9090.00', 'The fish growth up to feeding ', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00'),
(5, 'Red fish 3', '9090.00', 'test the red fish its awesome ', '', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fish_tank`
--

DROP TABLE IF EXISTS `fish_tank`;
CREATE TABLE IF NOT EXISTS `fish_tank` (
  `tk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fish_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`tk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fish_tank`
--

INSERT INTO `fish_tank` (`tk_id`, `fish_id`, `qty`, `birthdate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 14, '2020-07-18', '2020-08-19 00:00:00', '2020-08-19 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 45, '2020-08-18', '2020-08-19 00:00:00', '2020-08-19 00:00:00', '0000-00-00 00:00:00'),
(3, 4, 6700, '2020-01-31', '2020-10-17 15:58:25', '2020-10-17 15:58:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `fd_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  `name` varchar(35) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`fd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fd_id`, `type`, `name`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'food', 'grains', 644, '2020-08-19 16:07:01', '2020-08-19 16:07:01', NULL),
(4, 'food', 'hfyfyufyu', 8999, '2020-10-17 16:50:08', '2020-10-17 16:50:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_history`
--

DROP TABLE IF EXISTS `food_history`;
CREATE TABLE IF NOT EXISTS `food_history` (
  `fh_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `tank_id` int(11) NOT NULL,
  `fish_id` int(11) NOT NULL,
  `fishqty` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`fh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_history`
--

INSERT INTO `food_history` (`fh_id`, `food_id`, `tank_id`, `fish_id`, `fishqty`, `qty`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 3, 4, 6700, 300, '2020-12-31', '2020-10-17 17:05:30', '2020-10-17 17:05:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(35) NOT NULL,
  `type` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `date`, `name`, `type`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2020-12-31', 'An Item ', 'Type', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2020-12-31', 'An Item 1', 'Type', 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `orderdate` date NOT NULL,
  `client` varchar(45) NOT NULL,
  `paymeth` enum('cash','cheque') NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`or_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `orderdate`, `client`, `paymeth`, `total`, `created_at`, `updated_at`) VALUES
(22, '2020-10-19', 'test ', 'cash', '6100.00', '2020-10-19 13:30:58', '2020-10-19 13:30:58'),
(23, '2020-10-19', 'test ', 'cash', '6100.00', '2020-10-19 13:32:18', '2020-10-19 13:32:18'),
(24, '2020-10-19', 'client name', 'cash', '5200.00', '2020-10-19 14:26:37', '2020-10-19 14:26:37'),
(25, '2020-10-19', 'Ahmed Lawan', 'cash', '307.00', '2020-10-19 18:21:39', '2020-10-19 18:21:39'),
(26, '2020-10-19', 'Abdul Majid', 'cash', '4000.00', '2020-10-19 18:25:04', '2020-10-19 18:25:04'),
(27, '2020-10-20', '', 'cash', '4402.00', '2020-10-20 09:46:25', '2020-10-20 09:46:25'),
(28, '2020-10-20', '', 'cheque', '9390.00', '2020-10-20 10:08:16', '2020-10-20 10:08:16'),
(29, '2020-10-21', 'Usman Jidda Shuwa ', 'cash', '16291.00', '2020-10-21 05:17:30', '2020-10-21 05:17:30'),
(30, '2020-10-21', 'JAMES JOE', 'cash', '41800.00', '2020-10-21 05:29:59', '2020-10-21 05:29:59'),
(31, '2020-10-21', 'SADIQ ', 'cheque', '99999.99', '2020-10-21 07:12:15', '2020-10-21 07:12:15'),
(32, '2020-10-21', '', 'cash', '8000.00', '2020-10-21 13:43:16', '2020-10-21 13:43:16'),
(33, '2020-10-21', '', 'cheque', '22900.00', '2020-10-21 13:44:28', '2020-10-21 13:44:28'),
(34, '2020-10-21', 'Lawan ', 'cash', '12000.00', '2020-10-21 13:52:23', '2020-10-21 13:52:23'),
(35, '2020-10-21', 'JAMES biden ', 'cash', '13400.00', '2020-10-22 01:25:01', '2020-10-22 01:25:01'),
(36, '2020-10-28', 'ATIKU', 'cash', '14900.00', '2020-10-28 05:42:09', '2020-10-28 05:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `qty`, `price`, `subtotal`) VALUES
(22, 2, 4, '700.00', 2800),
(22, 3, 11, '300.00', 3300),
(23, 2, 4, '700.00', 2800),
(23, 3, 11, '300.00', 3300),
(24, 2, 4, '700.00', 2800),
(24, 3, 8, '300.00', 2400),
(25, 2, 1, '7.00', 7),
(25, 3, 1, '300.00', 300),
(26, 8, 1, '999.99', 4000),
(27, 2, 1, '7.00', 7),
(27, 3, 1, '300.00', 300),
(27, 4, 1, '5.00', 5),
(27, 7, 1, '90.00', 90),
(27, 8, 1, '999.99', 4000),
(28, 5, 1, '999.99', 9090),
(28, 3, 1, '300.00', 300),
(29, 2, 3, '7.00', 21),
(29, 7, 3, '90.00', 270),
(29, 8, 4, '999.99', 16000),
(30, 2, 1, '999.99', 8000),
(30, 3, 2, '400.00', 800),
(30, 8, 3, '999.99', 12000),
(30, 9, 2, '999.99', 12000),
(30, 10, 2, '999.99', 9000),
(31, 2, 3, '999.99', 24000),
(31, 3, 3, '400.00', 1200),
(31, 8, 6, '999.99', 24000),
(31, 9, 5, '999.99', 30000),
(31, 10, 5, '999.99', 22500),
(32, 2, 1, '999.99', 8000),
(33, 2, 1, '999.99', 8000),
(33, 3, 1, '400.00', 400),
(33, 8, 1, '999.99', 4000),
(33, 9, 1, '999.99', 6000),
(33, 10, 1, '999.99', 4500),
(34, 2, 1, '999.99', 8000),
(34, 8, 1, '999.99', 4000),
(35, 10, 2, '999.99', 9000),
(35, 8, 1, '999.99', 4000),
(35, 3, 1, '400.00', 400),
(36, 8, 1, '999.99', 4000),
(36, 9, 1, '999.99', 6000),
(36, 10, 1, '999.99', 4500),
(36, 3, 1, '400.00', 400);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `name`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'frozen', 'RED FISH ', 8000.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'smoked', 'FRESH FISH ', 400.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'smoked', 'TILAPIA FISH ', 4000.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'frozen', 'TALAPIA FISH ', 6000.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'frozen', 'RED FISH ', 4500.00, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `purid` int(11) NOT NULL AUTO_INCREMENT,
  `ref` int(25) NOT NULL,
  `purdate` date NOT NULL,
  `type` varchar(200) NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paid` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL,
  PRIMARY KEY (`purid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purid`, `ref`, `purdate`, `type`, `amount`, `note`, `status`, `supplier`, `quantity`, `paid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 0, '2020-10-20', 'FOOD ITEMS ', '50000.00', 'Glodues ', 'delivered', 3, 81, 'paid', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 6789, '2020-01-02', 'tyuio', '4565.00', '2345678hbgfd', 'delivered', 3, 23456, 'paid', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `salesusers`
--

DROP TABLE IF EXISTS `salesusers`;
CREATE TABLE IF NOT EXISTS `salesusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesusers`
--

INSERT INTO `salesusers` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Sales ', 'Person', 'salesperson@gmail.com', '$2y$10$oXclpw3BaAUlpNjXOiThLuEXI7fB5vfoCCcA7mZZq/9U1AqAa8BVK', '2020-09-18 06:27:38', '2020-09-18 06:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `role` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` text,
  `salary` decimal(7,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `surname`, `role`, `email`, `contact`, `address`, `salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'AHMAD', 'LAWAN', 'living ', 'ahmedlawa530@hotmail.com', '0548843631', 'APO LEGISLATIVE QUARTERS ZONE D', '900.00', '2020-10-03 17:01:22', '2020-10-03 17:01:22', NULL),
(3, 'MUSA ', 'ALIYU', 'Sales', 'Aliyu01@gmail.com', '0548843631', 'Nima Police station ', '35000.00', '2020-10-19 20:19:13', '2020-10-19 20:19:13', NULL),
(4, 'JOE ', 'JAMES', 'R/Keeper ', 'Joe@hotmail.com', '07038886652', 'Real Estate ', '35000.00', '2020-10-21 06:56:00', '2020-10-21 06:56:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `description` text NOT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `description`, `contact`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'John Mike ', 'John@gre.ac.uk ', 'Supplying farm product every month for the farm ', '027000656', 'Circle ', '2020-10-17 16:32:06', '2020-10-17 16:32:06', NULL),
(4, 'KELVIN  NELSON', 'KELVIN@gre.ac.uk ', 'The Fish Suppllies ', '0548843631', 'MADINA', '2020-10-21 07:09:01', '2020-10-21 07:09:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'patrick', 'Ametepe', 'patmtp@mail.com', '$2y$10$GgKYao5jncfv4yIuzXdXquRrQviGozFD3Qy/p6apOur5Wt6FEdoKi', '2020-08-11 09:42:58', '2020-08-11 09:42:58'),
(2, 'Admin', 'Super', 'admin@gmail.com', '$2y$10$.spE3gDUFxoplc03YFP7ReU20PFPYliLt8j8sIC7ZY3eiixgqmPjK', '2020-08-27 17:09:54', '2020-08-27 17:09:54'),
(3, 'Patrick ', 'Ametepe', 'patrickamtepe@gmail.com', '$2y$10$m7eLdtoPn/hWpgQrUGnBhOZSKnA0yfjdkJPnKmPvJepQ3SJXFFScy', '2020-09-17 20:31:17', '2020-09-17 20:31:17'),
(4, 'Patrick2', 'Ametepe', 'patrickmtp@gmail.com', '$2y$10$KYupqUHRl8dngKmgT5Pa8OeZgQBkGzNBbU00aFE9eO/.JLBlQEiSa', '2020-09-20 13:15:59', '2020-09-20 13:15:59'),
(5, 'AHMAD', 'LAWAN', 'Ahmedlawan02@gmail.com', '$2y$10$tSABC408wA.XU1Y9WDPk0O9cbx1r24T213hbu.yjy1LCvrSXsXv8W', '2020-09-22 16:44:53', '2020-09-22 16:44:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
