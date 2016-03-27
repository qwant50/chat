-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2016 at 05:24 PM
-- Server version: 5.6.27
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'qwant', '2016-03-25 23:27:24', NULL),
(2, 1, 'qwant2', '2016-03-25 23:27:59', NULL),
(3, 1, 'qwant3', '2016-03-25 23:28:31', NULL),
(4, 2, 'qwant33', '2016-03-25 23:37:34', NULL),
(5, 2, 'qwant335', '2016-03-26 00:03:59', NULL),
(12, 3, 'new message', '2016-03-27 13:07:56', NULL),
(13, 3, 'new message2', '2016-03-27 13:12:03', NULL),
(14, 3, 'На русском корректно', '2016-03-27 13:15:30', NULL),
(15, 3, 'wrtrteeetwet\r\n', '2016-03-27 13:39:16', NULL),
(16, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:24', NULL),
(17, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:26', NULL),
(18, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:28', NULL),
(19, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:28', NULL),
(20, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:28', NULL),
(21, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:28', NULL),
(22, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:28', NULL),
(23, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:29', NULL),
(24, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:29', NULL),
(25, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:29', NULL),
(26, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:29', NULL),
(27, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:29', NULL),
(28, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:31', NULL),
(29, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:31', NULL),
(30, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:31', NULL),
(31, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:31', NULL),
(32, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(33, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(34, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(35, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(36, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(37, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:32', NULL),
(38, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:33', NULL),
(39, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:33', NULL),
(40, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:33', NULL),
(41, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:33', NULL),
(42, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:33', NULL),
(43, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:34', NULL),
(44, 3, 'wrtrteeetwet\r\nwertwerewrtw', '2016-03-27 13:39:34', NULL),
(45, 3, ':)', '2016-03-27 14:43:25', NULL),
(46, 3, ':)', '2016-03-27 14:43:45', NULL),
(47, 3, 'text :)', '2016-03-27 14:46:35', NULL),
(48, 3, 'e :)', '2016-03-27 14:49:30', NULL),
(49, 3, 'Эмоции :)  :(  :|', '2016-03-27 15:01:34', NULL),
(50, 3, 'Эмоции :)  :(  :|', '2016-03-27 15:01:43', NULL),
(51, 3, 'This is a  new message with a smile :)', '2016-03-27 17:16:41', NULL),
(52, 3, ':) :( :|\r\n', '2016-03-27 17:20:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'login', 'password', 'email', NULL, '2016-03-25 20:09:18', NULL),
(2, '121233', '123456', 'qwantonline@gmail.com', NULL, '2016-03-25 20:56:41', NULL),
(3, '123456', '123456', 'qwee@dddd.com', NULL, '2016-03-26 12:36:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
