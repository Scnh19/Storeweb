-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 12, 2024 at 07:29 PM
-- Server version: 11.4.2-MariaDB-ubu2404
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storeweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(6) UNSIGNED NOT NULL,
  `sku` int(10) DEFAULT NULL,
  `productname` varchar(30) NOT NULL,
  `price` int(5) DEFAULT NULL,
  `stocks` int(5) DEFAULT NULL,
  `dateadded` timestamp NULL DEFAULT current_timestamp(),
  `datemodified` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `addedby` varchar(30) DEFAULT NULL,
  `modifiedby` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `sku`, `productname`, `price`, `stocks`, `dateadded`, `datemodified`, `addedby`, `modifiedby`) VALUES
(1, 9762, 'Apple', 14, 500, '2024-06-12 18:41:11', '2024-06-12 18:41:11', 'Test1', NULL),
(2, 876298, 'Banana', 12, 1000, '2024-06-12 18:43:36', '2024-06-12 18:43:36', 'test2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
