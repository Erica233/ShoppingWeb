-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 27, 2023 at 12:17 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ShoppingWebDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders`
(
    `id`          int(11) NOT NULL,
    `buyer_name`  varchar(20) NOT NULL,
    `product_id`  int(11) NOT NULL,
    `quantity`    int(10) UNSIGNED NOT NULL,
    `total_price` decimal(10, 2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_name`, `product_id`, `quantity`, `total_price`)
VALUES (13, 'a', 1, 1, '3.00'),
       (14, '1', 1, 2, '6.00'),
       (15, 'a', 7, 1, '1.50'),
       (16, 'a', 12, 2, '400.00');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells`
(
    `id`          int(11) NOT NULL,
    `name`        varchar(100) NOT NULL,
    `username`    varchar(20)  NOT NULL,
    `price`       decimal(10, 2) UNSIGNED NOT NULL,
    `quantity`    int(10) UNSIGNED NOT NULL,
    `category`    enum('Food','Clothes','Groceries','') NOT NULL,
    `description` text         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `name`, `username`, `price`, `quantity`, `category`, `description`)
VALUES (1, 'Apple', 'admin', '3.00', 74, 'Food', 'It\'s an apple.'),
(7, 'Cola', '123', '1.50', 1999, 'Food', '1L'),
(12, 'coat', '123', '200.00', 48, 'Clothes', 'black'),
(13, 'Spoon', '123', '2.00', 299, 'Groceries', '2'),
(16, 'Water', '123', '2.00', 140, 'Food', 'mineral'),
(30, 'D', '1', '1.00', 1, 'Food', 'd'),
(31, 'Cup', 'a', '3.00', 300, 'Groceries', '500ml'),
(32, 'Toothpaste', 'a', '6.00', 300, 'Groceries', 'mint taste');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `text` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$K09yV80pyOhNwA4cZDxmcuOr79/q8qvegOeZR5Dos.zhkpbCZIQ.G'),
(2, '123', '$2y$10$wk53rsGcb.7be8s/mTBZIuN5eRvYR1d1rskjwqgnhSc7VlVcUTW0u'),
(5, '1', '$2y$10$vBPbW04ZOc.otkPv8A1Z8O/C4/pYdPYTM/m.sDCFWo8Wfvv5q1qeC'),
(11, 'a', '$2y$10$sojf3mgFpM4f6rLSosspd.u9FSBh5bUeFM87SUmMPqG2W7./5g9XG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_username` (`buyer_name`),
  ADD KEY `order_product` (`product_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productToSeller` (`username`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_product` FOREIGN KEY (`product_id`) REFERENCES `sells` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_username` FOREIGN KEY (`buyer_name`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `productToSeller` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
