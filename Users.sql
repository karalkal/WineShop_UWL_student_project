-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2019 at 11:29 AM
-- Server version: 5.5.56
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `21354000`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(8) NOT NULL,
  `username` varchar(22) NOT NULL,
  `email` varchar(44) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(8) DEFAULT NULL,
  `userage` int(3) NOT NULL,
  `registrationTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `username`, `email`, `password`, `role`, `userage`, `registrationTime`) VALUES
(11, 'aaaa', 'aaaa@example.com', 'password', NULL, 44, '2019-03-31 23:00:00'),
(12, 'bbbb', 'bbbb@example.com', 'password', NULL, 44, '2019-02-08 00:00:00'),
(13, 'cccc', 'cccc@example.com', 'password', NULL, 44, '2019-04-01 11:42:14'),
(14, 'harry', 'harry.r466@gmail.com', 'password', 'admin', 27, '2019-04-01 11:50:14'),
(15, 'dddd', 'dddd@example.com', 'password', NULL, 44, '2019-04-01 12:15:43'),
(16, 'emanuel.fakhar', 'emanuelfakh@gmail.com', 'password', NULL, 39, '2019-04-06 11:12:39'),
(17, 'ffff', 'ffff@example.com', 'password', NULL, 30, '2019-04-10 00:20:32'),
(18, 'gggg', 'gggg@example.com', 'cb07fd90b596d6b39c48f1f3ae7eb9a126ed9859', NULL, 26, '2019-04-10 00:36:51'),
(19, 'kkkk', 'kkkk@example.com', '44742924140b91fa57e0cca3fb62249f70a7753d', NULL, 66, '2019-04-11 09:16:30'),
(21, 'zzz', 'zzzz@gmail.com', '96b9c8fa9c4b72afe62db771d8eb0f48b12ba243', NULL, 20, '2019-04-11 09:34:50'),
(22, 'rrrr', 'rrrr@example.com', '3abd21fa71192da67c2e664260796d10d125f7f1', NULL, 88, '2019-04-23 04:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userID` (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
