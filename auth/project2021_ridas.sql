-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 11:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
(3, 2, ' rice', '2000', '16713504061643023671fried_rice.jpg'),
(4, 5, 'egusi soup', '2400', '16713504941645803531egusi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodorders`
--

CREATE TABLE `foodorders` (
  `sn` int(255) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `food` longtext NOT NULL,
  `seat` int(255) NOT NULL,
  `modeOfPayment` varchar(23) NOT NULL,
  `paymentstatus` int(11) NOT NULL DEFAULT 0,
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

INSERT INTO `foodorders` (`sn`, `fullname`, `food`, `seat`, `modeOfPayment`, `paymentstatus`, `price`, `balance`, `cMail`, `AccOde`, `FoodStatus`, `dateT`) VALUES
(1, 'peter chigozirim', 'egusi soup, rice,', 2, 'crypto', 1, 13600, 0, '', 'eZAcJ40m', 1, '2022-12-19 07:03:49'),
(2, 'prince', ' rice,egusi soup,', 1, 'crypto', 0, 37200, 0, '', '2Qjp1ugM', 0, '2022-12-19 10:43:00');

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
(2, 'rice', '2022-01-19 18:40:09'),
(3, 'beans', '2022-12-18 07:56:32'),
(4, 'sack', '2022-12-18 07:56:43'),
(5, 'soup', '2022-12-18 08:00:39');

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
(2, 'emma ike', '09032708150', 'emma@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'Chigozirim Peter', '0810926010', 'peterchigozirim@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `walletName` varchar(25) NOT NULL,
  `walletAddress` varchar(255) NOT NULL,
  `walletQr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `walletName`, `walletAddress`, `walletQr`) VALUES
(2, 'Eth', 'cvbnmcfcdhdjd', '16713556191643473317Capture3.PNG'),
(3, 'bitcoin', 'fghjksghjddghedujeuebdhdbcjdjdjkdujdeenjed', '16713565001643486620Capture2.PNG');

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
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(122) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `sn` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
