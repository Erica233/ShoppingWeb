-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 26, 2023 at 12:57 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `buyer_name`, `product_id`, `quantity`) VALUES
(10, '1', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `category` enum('Food','Clothes','Groceries','') NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `name`, `username`, `price`, `quantity`, `category`, `description`) VALUES
(1, 'Apple', 'admin', '3.00', 87, 'Food', 'It\'s an apple.'),
(7, 'Cola', '123', '1.50', 2000, 'Food', '1L'),
(12, 'coat', '123', '200.00', 50, 'Clothes', 'black'),
(13, 'Spoon', '123', '2.00', 300, 'Groceries', '2'),
(16, 'Water', '123', '2.00', 140, 'Food', 'mineral'),
(30, 'D', '1', '1.00', 1, 'Food', 'd');

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
(6, '2', '$2y$10$yKGBqMd5dP1ZXGZXXYrUruzkcD4b./6jPrSdZ2cNDz7xdc4ob7HaK'),
(7, 'f1', '$2y$10$MfC9BfH4Ey04G6Up9bYFwuUGRyY/7rRtr0pwR1q6ov1gFCDrfwjOO'),
(8, 'a', '$2y$10$MV/B20Gpd4q20mPUtx8.uuvGfwb7HYgIy.azPB.w2VNBc4.iwcdD2'),
(9, 'm', '$2y$10$sgOGqCBmAfEDFzoWIiAUIOBidKsJ1u2vEKhNPGCSKu52KR9gZm0I6'),
(10, 'k', '$2y$10$0MR0HwQf95RcFnavfZqqUOm38R9pGH6D0weAXYD6D14iPyuLYBzB.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
