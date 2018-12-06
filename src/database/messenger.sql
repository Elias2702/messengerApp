-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 06, 2018 at 04:43 PM
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
(283, 2, '2018-12-06 15:45:06', '11 12');

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
-- Table structure for table `emo_react`
--

CREATE TABLE `emo_react` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `usr_pseudo` varchar(100) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `emo_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emo_react`
--

INSERT INTO `emo_react` (`id`, `usr_id`, `usr_pseudo`, `msg_id`, `emo_path`) VALUES
(19, 11, 'tutu', 395, '/emojis/2.png'),
(20, 12, 'totoro', 395, '/emojis/80.png');

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
(395, 11, 283, '2018-12-06 15:45:06', 'totoro samerlaput');

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
-- Indexes for table `emo_react`
--
ALTER TABLE `emo_react`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emo_react_ibfk_1` (`usr_id`),
  ADD KEY `emo_react_ibfk_2` (`msg_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `emo_react`
--
ALTER TABLE `emo_react`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emo_react`
--
ALTER TABLE `emo_react`
  ADD CONSTRAINT `emo_react_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emo_react_ibfk_2` FOREIGN KEY (`msg_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
