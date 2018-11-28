-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 26, 2018 at 06:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `conv_reg_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `owner_id`, `conv_reg_id`, `time`, `content`) VALUES
(1, 1, 3, '2018-11-25 00:00:00', 'zzz zzz'),
(2, 2, 2, '2018-11-25 00:00:01', 'blaaaa'),
(12, 1, 3, '2018-11-25 00:00:01', 'sfsd'),
(13, 1, 3, '2018-11-25 00:00:01', 'sfsd'),
(14, 1, 3, '2018-11-25 00:00:01', 'cad cad'),
(15, 1, 2, '2018-11-25 00:00:01', 'bad bad'),
(17, 1, 4, '2018-11-25 17:47:15', 'qerqr'),
(18, 1, 5, '2018-11-25 17:48:29', 'caw caw caw'),
(19, 1, 9, '2018-11-25 17:58:11', 'bat bat bat'),
(20, 1, 10, '2018-11-25 18:00:47', 'gad gad gad'),
(21, 1, 11, '2018-11-25 20:56:11', ''),
(22, 1, 12, '2018-11-25 20:57:15', ''),
(23, 1, 13, '2018-11-26 09:09:51', 'fjjthjdhj'),
(24, 1, 14, '2018-11-26 09:49:04', 'dededede'),
(43, 1, 1, '2018-11-26 12:50:18', 'drdrdrdrdrdr'),
(44, 1, 2, '2018-11-26 12:57:38', 'oioioioioioioio'),
(45, 1, 3, '2018-11-26 12:58:20', 'gthgthgthgth'),
(46, 1, 4, '2018-11-26 12:59:58', 'werqwrwerqr'),
(47, 1, 4, '2018-11-26 13:00:10', 'gaston'),
(48, 1, 3, '2018-11-26 13:03:54', 'aqws'),
(49, 1, 3, '2018-11-26 13:04:24', '123456789'),
(50, 1, 3, '2018-11-26 14:33:59', ''),
(51, 1, 4, '2018-11-26 14:34:50', ''),
(52, 1, 3, '2018-11-26 15:25:16', 'zxcvbnm,'),
(53, 1, 2, '2018-11-26 15:48:00', '13131231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conv_reg` (`conv_reg_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `conv_reg` FOREIGN KEY (`conv_reg_id`) REFERENCES `conv_reg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
