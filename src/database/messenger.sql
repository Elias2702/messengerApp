-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 06, 2018 at 01:27 PM
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
-- Table structure for table `conv_reg`
--

CREATE TABLE `conv_reg` (
  `id` int(11) NOT NULL,
  `num_particip` int(11) NOT NULL,
  `creation_time` datetime NOT NULL,
  `particip_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conv_reg`
--

INSERT INTO `conv_reg` (`id`, `num_particip`, `creation_time`, `particip_id`) VALUES
(253, 2, '2018-12-05 09:12:44', '1 9'),
(254, 2, '2018-12-05 09:12:49', '7 9'),
(255, 2, '2018-12-05 09:13:08', '9 11'),
(256, 2, '2018-12-05 09:29:06', '2 9'),
(257, 2, '2018-12-05 09:29:11', '6 9'),
(258, 2, '2018-12-05 09:29:14', '4 9'),
(259, 2, '2018-12-05 09:29:19', '5 9'),
(260, 2, '2018-12-05 09:33:54', '3 9'),
(261, 2, '2018-12-05 09:34:00', '9 12'),
(262, 2, '2018-12-05 09:34:07', '9 10'),
(263, 2, '2018-12-05 15:39:54', '6 11'),
(264, 2, '2018-12-06 08:37:33', '10 11'),
(265, 2, '2018-12-06 08:52:47', '5 11'),
(266, 2, '2018-12-06 08:53:02', '1 11'),
(267, 2, '2018-12-06 08:59:09', '7 11'),
(268, 2, '2018-12-06 09:00:30', '2 11'),
(269, 2, '2018-12-06 09:47:01', '11 12'),
(270, 2, '2018-12-06 10:32:48', ' 7'),
(271, 2, '2018-12-06 10:34:12', ' 1'),
(272, 2, '2018-12-06 10:34:23', ' 12'),
(273, 2, '2018-12-06 10:36:23', ' 1'),
(274, 2, '2018-12-06 10:38:22', '5 11'),
(275, 2, '2018-12-06 10:39:25', '3 11'),
(276, 2, '2018-12-06 10:39:28', '3 11'),
(277, 2, '2018-12-06 13:10:33', '4 11'),
(278, 2, '2018-12-06 13:10:36', '4 11');

-- --------------------------------------------------------

--
-- Table structure for table `emojis`
--

CREATE TABLE `emojis` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emojis`
--

INSERT INTO `emojis` (`id`, `img`) VALUES
(22, '/emojis/1.png'),
(23, '/emojis/2.png'),
(24, '/emojis/3.png'),
(25, '/emojis/4.png'),
(26, '/emojis/5.png'),
(27, '/emojis/6.png'),
(28, '/emojis/7.png'),
(29, '/emojis/8.png'),
(30, '/emojis/9.png'),
(31, '/emojis/10.png'),
(32, '/emojis/11.png'),
(33, '/emojis/12.png'),
(34, '/emojis/13.png'),
(35, '/emojis/14.png'),
(36, '/emojis/15.png'),
(37, '/emojis/16.png'),
(38, '/emojis/17.png'),
(39, '/emojis/18.png'),
(40, '/emojis/19.png'),
(41, '/emojis/20.png'),
(42, '/emojis/21.png'),
(43, '/emojis/22.png'),
(44, '/emojis/23.png'),
(45, '/emojis/24.png'),
(46, '/emojis/25.png'),
(47, '/emojis/26.png'),
(48, '/emojis/27.png'),
(49, '/emojis/28.png'),
(50, '/emojis/29.png'),
(51, '/emojis/30.png'),
(52, '/emojis/31.png'),
(53, '/emojis/32.png'),
(54, '/emojis/33.png'),
(55, '/emojis/34.png'),
(56, '/emojis/35.png'),
(57, '/emojis/36.png'),
(58, '/emojis/37.png'),
(59, '/emojis/38.png'),
(60, '/emojis/39.png'),
(61, '/emojis/40.png'),
(62, '/emojis/41.png'),
(63, '/emojis/42.png'),
(64, '/emojis/43.png'),
(65, '/emojis/44.png'),
(66, '/emojis/45.png'),
(67, '/emojis/46.png'),
(68, '/emojis/47.png'),
(69, '/emojis/48.png'),
(70, '/emojis/49.png'),
(71, '/emojis/50.png'),
(72, '/emojis/51.png'),
(73, '/emojis/52.png'),
(74, '/emojis/53.png'),
(75, '/emojis/54.png'),
(76, '/emojis/55.png'),
(77, '/emojis/56.png'),
(78, '/emojis/57.png'),
(79, '/emojis/58.png'),
(80, '/emojis/59.png'),
(81, '/emojis/60.png'),
(82, '/emojis/61.png'),
(83, '/emojis/62.png'),
(84, '/emojis/63.png'),
(85, '/emojis/64.png'),
(86, '/emojis/65.png'),
(87, '/emojis/66.png'),
(88, '/emojis/67.png'),
(89, '/emojis/68.png'),
(90, '/emojis/69.png'),
(91, '/emojis/70.png'),
(92, '/emojis/71.png'),
(93, '/emojis/72.png'),
(94, '/emojis/73.png'),
(95, '/emojis/74.png'),
(96, '/emojis/75.png'),
(97, '/emojis/76.png'),
(98, '/emojis/77.png'),
(99, '/emojis/78.png'),
(100, '/emojis/79.png'),
(101, '/emojis/80.png'),
(102, '/emojis/81.png'),
(103, '/emojis/82.png'),
(104, '/emojis/83.png'),
(105, '/emojis/84.png'),
(106, '/emojis/85.png'),
(107, '/emojis/86.png'),
(108, '/emojis/87.png'),
(109, '/emojis/88.png'),
(110, '/emojis/89.png'),
(111, '/emojis/90.png'),
(112, '/emojis/91.png'),
(113, '/emojis/92.png'),
(114, '/emojis/93.png'),
(115, '/emojis/94.png'),
(116, '/emojis/95.png'),
(117, '/emojis/96.png'),
(118, '/emojis/97.png'),
(119, '/emojis/98.png'),
(120, '/emojis/99.png'),
(121, '/emojis/100.png'),
(122, '/emojis/101.png'),
(123, '/emojis/102.png'),
(124, '/emojis/103.png');

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
(353, 9, 253, '2018-12-05 09:12:44', 'hi aaa'),
(354, 9, 254, '2018-12-05 09:12:49', 'hi totori'),
(355, 11, 255, '2018-12-05 09:13:08', 'hi test'),
(356, 9, 255, '2018-12-05 09:13:28', 'yop$'),
(357, 11, 255, '2018-12-05 09:13:33', 'yep'),
(358, 9, 255, '2018-12-05 09:20:34', 'coucou tutu'),
(359, 11, 255, '2018-12-05 09:20:41', 'coucou test'),
(360, 9, 256, '2018-12-05 09:29:06', 'yo bbb'),
(361, 9, 257, '2018-12-05 09:29:11', 'yed'),
(362, 9, 258, '2018-12-05 09:29:14', 'kk'),
(363, 9, 259, '2018-12-05 09:29:19', 'adanou'),
(364, 9, 259, '2018-12-05 09:31:10', 'sehserh'),
(365, 9, 259, '2018-12-05 09:31:16', 'sehsejhse('),
(366, 9, 260, '2018-12-05 09:33:54', 'stnjsdryn'),
(367, 9, 261, '2018-12-05 09:34:00', 'd,jdry,'),
(368, 9, 262, '2018-12-05 09:34:07', 'srtjsrtj'),
(369, 9, 256, '2018-12-05 09:53:32', 'gzergze'),
(370, 9, 262, '2018-12-05 09:58:19', 'zertjsrtj'),
(371, 9, 262, '2018-12-05 14:53:10', 'blabla'),
(372, 11, 255, '2018-12-05 14:55:07', 'hi test how are u?'),
(373, 9, 255, '2018-12-05 14:55:29', 'fine thanks'),
(374, 6, 263, '2018-12-05 15:39:54', 'bliblibli'),
(375, 6, 263, '2018-12-05 15:39:57', 'blublublu'),
(376, 11, 263, '2018-12-05 15:40:33', 'balblablab'),
(377, 11, 263, '2018-12-05 15:40:38', 'bliblibli'),
(378, 6, 263, '2018-12-05 15:51:50', 'qmzouihvnqzmrjbvnmrzeoihvqzomiehvmoqzg'),
(379, 11, 264, '2018-12-06 08:37:33', 'fgjsrjhsr'),
(380, 11, 263, '2018-12-06 08:59:04', 'drthdrthdrt'),
(381, 11, 267, '2018-12-06 08:59:09', 'rthserthseth'),
(382, 11, 268, '2018-12-06 09:00:30', 'zhserth'),
(383, 11, 264, '2018-12-06 09:01:47', 'hserthserh'),
(384, 11, 269, '2018-12-06 09:47:01', 'sensetnes'),
(385, 11, 268, '2018-12-06 10:38:00', 'zvrgv'),
(386, 11, 265, '2018-12-06 10:38:22', 'vzrvzrv'),
(387, 11, 275, '2018-12-06 10:39:28', 'serhserhserh'),
(388, 11, 265, '2018-12-06 11:06:24', 'zergerg'),
(389, 11, 268, '2018-12-06 13:10:17', 'blublu'),
(390, 11, 277, '2018-12-06 13:10:36', 'drjdfj');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `sexe`, `pseudo`, `email`, `pass`, `picture`, `bio`) VALUES
(1, 'a', 'a', 'homme', 'aaa', 'a@a.a', '', NULL, NULL),
(2, 'b', 'b', 'femme', 'bbb', 'b@b.b', '', NULL, NULL),
(3, 'c', 'c', 'homme', 'c', 'c@c.c', 'c', NULL, NULL),
(4, 'k', 'k', 'saispas', 'k', 'toto@toto.com', 'k', NULL, NULL),
(5, 'antoine', 'dannemark', 'homme', 'adan', 'antoine.dannemark@gmail.com', 'test', NULL, NULL),
(6, 'totor', 'totor', 'homme', 'totor', 'totor@totor.com', '$2y$11$y.koyn75B2e2fcMHubA0UeR1ygB8.9attQ0dA8HS5pJszCjKYdoca', NULL, NULL),
(7, 'totori', 'totori', 'homme', 'totori', 'totori@totor.com', '$2y$11$2OOFQDtiX.SN6mqXcoOvbepKCgTAGsc6zvNFzJo6FbaoyYofXzCga', NULL, NULL),
(9, 'antoine', 'dannemark', 'homme', 'test', 'test@test.com', '$2y$11$2VoQTqgDnYywvOM68j4j5.uU4a6G.MxJdwjzuwHMNFK0g0s5aCTfW', NULL, NULL),
(10, 'albert', 'einstein', 'homme', 'alein', 'al@al.com', '$2y$11$JH48cP5rPcNi.aqgGnPFKeFlEfjKLreE70UdzPmqAqm64qKXD/PFq', 'uploads/user_id_10.img', 'Coucou c\'est albertoto'),
(11, 'tutu', 'tutu', 'homme', 'tutu', 'tutu@tutu.com', '$2y$11$8ORqrbXGDjDZ3gHGOIkG4.rJrd33ZQnbIOCd5NZ68Gx8MlAv83y4O', 'uploads/user_id_11.img', NULL),
(12, 'totoro', 'totoro', 'homme', 'totoro', 'totoro@totoro.com', '$2y$11$HrjrKGlJBTv03/zQa78hLOXypF8urtq9sviCCk9fslI.jUIYjgoSe', 'uploads/user_id_12.dog', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conv_reg`
--
ALTER TABLE `conv_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emojis`
--
ALTER TABLE `emojis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conv_reg` (`conv_reg_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conv_reg`
--
ALTER TABLE `conv_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
