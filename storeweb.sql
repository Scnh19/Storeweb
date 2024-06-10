-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 08:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `sku` varchar(30) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` int(5) DEFAULT NULL,
  `dateadded` varchar(20) DEFAULT NULL,
  `datemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modifiedby` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `sku`, `productname`, `price`, `dateadded`, `datemodified`, `modifiedby`) VALUES
(1, '1001', 'Dragon', 500, NULL, '2024-06-07 20:48:08', 'Admin12345'),
(2, '1002', 'Lizard', 500, '06/08/2024 04:53 AM', '2024-06-07 20:49:54', 'Admin12345'),
(3, '880273', 'Special Mango', 123, '2024-06-05T04:02', '2024-06-07 20:59:41', 'Admin'),
(4, '98765', 'Mango Tea', 658, '2024-06-11T10:01', '2024-06-07 21:01:34', 'Employee1'),
(5, '123134', 'Tune', 500, '2024-05-29T05:10', '2024-06-07 21:08:54', 'Employee1'),
(6, '1237866', 'Mario', 900, '2024-06-03T16:26', '2024-06-10 04:22:46', 'Admin'),
(7, '76756', 'Mayo', 865, '2024-06-03T07:43', '2024-06-10 18:43:39', 'Admin');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
