-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 09:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2021_ridas`
--
CREATE DATABASE IF NOT EXISTS `project2021_ridas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project2021_ridas`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(24) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `item_id` int(34) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `qty` int(234) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(122) NOT NULL,
  `recipe` int(112) NOT NULL,
  `foodName` varchar(111) NOT NULL,
  `price` varchar(112) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `recipe`, `foodName`, `price`, `img`) VALUES
(1, 2, 'fngjkd', '3246', '1643486594Capture3.PNG'),
(2, 2, 'sdfjm', '345', '1643486620Capture2.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `foodorders`
--

CREATE TABLE `foodorders` (
  `sn` int(255) NOT NULL,
  `food` longtext NOT NULL,
  `seat` int(255) NOT NULL,
  `modeOfPayment` varchar(23) NOT NULL,
  `price` int(223) NOT NULL,
  `balance` int(244) NOT NULL,
  `cMail` varchar(233) NOT NULL,
  `AccOde` varchar(43) NOT NULL,
  `FoodStatus` int(10) NOT NULL DEFAULT 0,
  `dateT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodorders`
--

INSERT INTO `foodorders` (`sn`, `food`, `seat`, `modeOfPayment`, `price`, `balance`, `cMail`, `AccOde`, `FoodStatus`, `dateT`) VALUES
(1, 'ebube,', 3, 'cash', 100, 0, '', 'H07m4y1d', 1, '2022-01-19 18:43:13'),
(2, 'ebube,ebube,ebube,', 0, 'cash', 150, 1081, '', 'NdYtlyjm', 1, '2022-01-19 19:14:45'),
(3, 'ert,', 4, 'card', 245, 0, '', 'EVDuHkxP', 1, '2022-01-29 11:23:03'),
(4, 'skdj,', 0, 'cash', 376489, 1965856, '', '1LEpCJeV', 0, '2022-01-29 17:35:22'),
(5, 'skdj,', 0, 'cash', 376489, 389082449, '', 'mhF0Xn8w', 0, '2022-01-29 18:03:37'),
(6, 'skdj,', 23, 'cash', 376489, 232076665, '34576', 'lvmwFoLM', 0, '2022-01-29 18:19:28'),
(7, 'skdj,', 0, 'cash', 376489, 59280, '3', 'P9QXGy8f', 0, '2022-01-29 18:23:30'),
(8, 'fngjkd,', 0, 'cash', 3246, 20209, '09077644842', 'Vhy2jc51', 0, '2022-01-29 21:13:52'),
(9, 'fngjkd,', 0, 'cash', 3246, 20166, '08107124093', 'Nf8vhs4e', 0, '2022-01-29 21:34:31'),
(10, 'fngjkd,', 0, 'cash', 3246, 30988, '341', '1gaDJjcn', 0, '2022-01-29 21:34:58'),
(11, 'sdfjm,', 0, 'card', 345, 0, '', 'iuSnMd4R', 0, '2022-01-29 21:35:49'),
(12, 'sdfjm,fngjkd,', 0, 'card', 3591, 0, '', '73DepnNa', 0, '2022-01-29 21:42:50'),
(13, 'fngjkd,sdfjm,', 0, 'card', 3591, 0, '', 'VeaWHxA1', 0, '2022-02-08 07:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `dateT`) VALUES
(2, 'rice', '2022-01-19 18:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullName` varchar(212) NOT NULL,
  `phone` varchar(34) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `phone`, `email`, `pwd`, `role`) VALUES
(1, 'ebube ebube', '08130075358', 'ebuberoderick2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1),
(2, 'emma ike', '09032708150', 'emma@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodorders`
--
ALTER TABLE `foodorders`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
