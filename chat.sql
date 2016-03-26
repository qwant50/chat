-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2016 at 02:14 PM
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
(6, 2, 'Ð¢ÑƒÑ‚ Ñ‚ÑƒÑÑÑ‚ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð¿ÐµÑ€Ñ†Ñ‹', '2016-03-26 00:34:28', NULL),
(7, 2, 'Ð¢ÑƒÑ‚ Ñ‚ÑƒÑÑÑ‚ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð¿ÐµÑ€Ñ†Ñ‹', '2016-03-26 00:38:10', NULL),
(8, 2, 'Ð¢ÑƒÑ‚ Ñ‚ÑƒÑÑÑ‚ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð¿ÐµÑ€Ñ†Ñ‹. Ð˜ ÑÑƒÐ¿ÐµÑ€ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð½Ð¸ÑˆÑ‚ÑÐºÐ¸.', '2016-03-26 00:38:33', NULL),
(9, 2, 'Ð¢ÑƒÑ‚ Ñ‚ÑƒÑÑÑ‚ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð¿ÐµÑ€Ñ†Ñ‹. Ð˜ ÑÑƒÐ¿ÐµÑ€ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð½Ð¸ÑˆÑ‚ÑÐºÐ¸.', '2016-03-26 00:39:39', NULL),
(10, 2, 'Ð¢ÑƒÑ‚ Ñ‚ÑƒÑÑÑ‚ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð¿ÐµÑ€Ñ†Ñ‹. Ð˜ ÑÑƒÐ¿ÐµÑ€ ÐºÑ€ÑƒÑ‚Ñ‹Ðµ Ð½Ð¸ÑˆÑ‚ÑÐºÐ¸.', '2016-03-26 00:39:40', NULL);

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
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
