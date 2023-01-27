-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 03:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'Fruits'),
(3, 'Vegetables'),
(4, 'Toiletries'),
(5, 'Canned Goods'),
(6, 'Dairy'),
(7, 'Snacks'),
(10, 'Frozen Goods'),
(11, 'Pasta and Rice'),
(12, 'Condiments'),
(16, 'Sus'),
(17, 'Beverages'),
(18, 'Poultry');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `house_no` int(5) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `contact_num` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `courier_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `first_name`, `middle_name`, `last_name`, `house_no`, `street`, `barangay`, `municipality`, `province`, `contact_num`, `email`, `password`, `user_ip`, `courier_img`) VALUES
(1, 'ssaad', 'Guevarra', 'Dela Cruz', 0, '', '', '', '', 9393367327, 'jayciecourier@gmail.com', 'courier', '', ''),
(2, 'Jaycie', 'Guevarra', 'Dela Cruz', 2122, 'Fajardo St.', 'Lamao', 'Limay', 'Bataan', 9393367327, 'jayciedcourier@gmail.com', '$2y$10$WvYJ/SKSMkrs.Hady3/Q7uwYrRBmU4ZGzc8H0ZL4XXb78R8cLEmBW', '::1', '7fc6a759241f9352bf2ae3361ee80cb0.jpg'),
(6, 'Steph', '', 'King', 2123, 'sadasd', 'asdasda', 'dasdasda', 'sda', 21312344, 'stephking@gmail.com', '$2y$10$9OFvk7i4q/PcGfQsxxJ5Xej3iVpdvtdkk5mc4ZUDCS0TR5f4gdYue', '::1', '066fdfabf1385da52e73017d65751eef.gif');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `house_no` int(5) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(30) NOT NULL,
  `contact_num` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `customer_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `middle_name`, `last_name`, `house_no`, `street`, `barangay`, `municipality`, `province`, `contact_num`, `email`, `password`, `user_ip`, `customer_img`) VALUES
(1, 'Nixon', '', 'Somoza', 123, '123', '123', 'Mariveles', 'Bataan', 9494026824, 'nix334on.somoza@gmail.com', '$2y$10$3wQ9Ds7458PsO0fNr0kA8.THB9aeBFakLu.KIfB0.XW6sXMuI4g2q', '::1', ''),
(2, 'Nixon', '123', 'Somoza', 123, '123', '123', 'Mariveles', 'Bataan', 9494026824, 'n411241@gmail.com', '$2y$10$ELEQtXaHwGpKZXdLt2baOOKT.7LeSoOr2pVcAvLYbAL4DjgPFpTuW', '::1', ''),
(3, 'Nixon', '', 'Somoza', 123, '123', '123', 'Mariveles', 'Bataan', 9494026824, 'nix44123n.somoza@gmail.com', '$2y$10$n88.i/LxO4qeHZiGF4IideA4NDidw8NJFkP0aYPICD6wVnwfpv7w6', '::1', ''),
(4, 'Jaycie', '', 'Dela Cruz', 2122, 'Fajardo St.', 'Lamao', 'Limay', 'Bataan', 9393367327, 'jaycie.delacruz12@gmail.com', '$2y$10$ICn45X5.HSpyZ1btId/6VOXXskpCQZN6QuYYMymLHsb/t4pMFySJa', '::1', '7fc6a759241f9352bf2ae3361ee80cb0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `brands` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `product_description`, `product_keywords`, `brands`, `category_id`, `product_image`, `product_price`, `date`, `product_stock`) VALUES
(2, 'Kalabasa', 'Masustansya', 'gulay, Fresh', '', 3, 'Kalabasa-1.jpg', 89, '2023-01-26 10:41:36', 5),
(3, 'Mansanas', 'An apple a day keeps the doctor away', 'fruit, red, matamis', 'Yum', 2, 'apple.jpg', 156, '2023-01-27 01:41:42', 68),
(4, 'Colgate', 'Strengthen teeth and prevent tooth decay.', '', '', 4, 'Colgate.png', 130, '2023-01-26 10:39:57', 75),
(5, 'CDO Corned Beef', 'Filipino-style corned beef that has a delicious guisado taste.', '', '', 5, 'beef.jpg', 150, '2023-01-27 01:42:42', 20),
(6, 'Milk', 'He need some milk.', '', '', 6, 'milk.jpg', 100, '2023-01-26 10:42:04', 61),
(7, 'Rebisco crackers', 'Ang sarap ng filling mo', '', '', 7, 'rebisco.jpg', 10, '2023-01-26 10:42:11', 4),
(9, 'Longganisa', 'The best in Pampanga', '', '', 10, 'Longgadog.png', 130, '2023-01-27 01:41:42', 7),
(10, 'Ben\'s Original Ready Rice', 'Whole grain brown rice', '', '', 11, 'Rice.png', 1500, '2023-01-26 10:38:43', 63),
(11, 'Doña Elena pure olive oil', '250mL of pure olive oil', '', '', 12, 'oil.jpg', 150, '2023-01-26 10:40:06', 64);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `review` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `house_no` int(5) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `contact_num` bigint(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `seller_img` varchar(255) NOT NULL,
  `store_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `first_name`, `middle_name`, `last_name`, `house_no`, `street`, `barangay`, `municipality`, `province`, `contact_num`, `email`, `password`, `user_ip`, `seller_img`, `store_name`) VALUES
(1, 'Jaycie', 'Guevarra', 'Dela', 2122, 'Fajardo', 'Lamao', 'Limayan', 'Bataan', 9393367327, 'jycdelacruz12@gmail.com', '$2y$10$avcUpAFWdWcjYHHRzZfdt.KL0SPqEd5DReoQL063i4/NpbTFMHl/C', '::1', '642a8c7abe5fc5aef915c5c0753e054b_6777849928976849090.gif', 'sdadasda');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `courier_id` int(255) NOT NULL,
  `seller_id` int(255) NOT NULL,
  `price` double(7,2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customer_id`, `product_id`, `courier_id`, `seller_id`, `price`, `quantity`, `date`, `order_status`) VALUES
(1, 4, 10, 0, 0, 1500.00, 1, '2023-01-26 04:29:40', 'complete'),
(2, 4, 6, 0, 0, 100.00, 1, '2023-01-26 04:29:29', 'complete'),
(3, 4, 11, 0, 0, 150.00, 1, '2023-01-26 04:29:24', 'complete'),
(4, 4, 3, 0, 0, 156.00, 1, '2023-01-26 04:52:22', 'complete'),
(5, 4, 10, 0, 0, 1500.00, 1, '2023-01-26 04:52:21', 'complete'),
(6, 4, 5, 0, 0, 150.00, 1, '2023-01-26 04:52:21', 'complete'),
(7, 4, 9, 0, 0, 390.00, 3, '2023-01-27 01:59:20', 'Complete'),
(8, 4, 6, 0, 0, 300.00, 3, '2023-01-27 01:59:20', 'Complete'),
(9, 4, 5, 0, 0, 450.00, 3, '2023-01-27 01:59:19', 'Complete'),
(10, 4, 3, 0, 0, 624.00, 4, '2023-01-27 01:59:19', 'Complete'),
(11, 4, 9, 0, 0, 390.00, 3, '2023-01-27 01:57:21', 'Complete'),
(12, 4, 5, 0, 0, 150.00, 1, '2023-01-27 01:57:20', 'Complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `courier_id` (`courier_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
