-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 12:33 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Gaming', 'This is the gaming category'),
(2, 'Programming', 'This is the blog category'),
(3, 'Music', 'This is music category'),
(4, 'Business', 'This is business category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `postid` int NOT NULL,
  `parentid` int DEFAULT NULL,
  `text` text NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `parentid`, `text`, `createdat`) VALUES
(129, 1, 3, NULL, 'Level 1 comment', '2020-05-17 10:23:24'),
(144, 39, 7, NULL, 'Comment 6', '2020-05-25 10:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `auth` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `auth`) VALUES
(1, 'Home', 'index.php', 2),
(2, 'Login', 'index.php?page=login&width=1', 0),
(3, 'Register', 'index.php?page=register&width=1', 0),
(5, 'My profile', 'index.php?page=profile&width=1', 1),
(6, 'Logout', 'models/user/logout.php', 1),
(7, 'Search', 'index.php?page=search', 2),
(8, 'Author', 'index.php?page=author', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `userid` int NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoryid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `userid`, `createdat`, `categoryid`) VALUES
(1, 'How to install Python and run qweqweqwe', '', 37, '2020-05-08 12:09:31', 2),
(2, 'Hello this is my second post', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 37, '2020-05-08 12:13:07', 4),
(3, 'This is admin post', 'Hello this is admin post', 1, '2020-05-13 09:06:58', 3),
(5, 'New post 1', 'Desc of new post', 37, '2020-05-19 11:40:22', 1),
(7, 'New post 3', 'Desc of new post 3', 1, '2020-05-19 11:40:24', 4),
(9, 'New post 5', 'Desc of new post 5', 39, '2020-05-19 11:40:26', 3),
(10, 'New post 6', 'Desc of new post 6', 39, '2020-05-19 11:40:28', 3),
(12, 'New post 8', 'Desc of new post 8', 37, '2020-05-19 11:40:29', 1),
(13, 'New post 9', 'Desc of new post 9', 39, '2020-05-19 11:40:30', 4),
(14, 'New post 10', 'Desc of new post 10', 37, '2020-05-19 11:40:21', 3),
(15, 'This is admin made post', 'admin made post ', 37, '2014-12-31 23:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `upvotepost`
--

CREATE TABLE `upvotepost` (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `postid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotepost`
--

INSERT INTO `upvotepost` (`id`, `userid`, `postid`) VALUES
(28, 1, 2),
(29, 1, 1),
(34, 39, 2),
(35, 39, 3),
(37, 1, 10),
(39, 1, 13),
(40, 1, 12),
(41, 39, 12),
(43, 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `profileimg` varchar(100) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `randnum` varchar(64) NOT NULL,
  `isverified` int NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `bio`, `profileimg`, `createdat`, `randnum`, `isverified`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$LdScS8YHyDyR.xihOUhFD.OTgkfMaE22Jn18r01VX742q2TQX89LK', 'Hello i am admin. 123', '1590075782.jpg', '2020-05-05 13:05:15', '', 1, 1),
(37, 'nciganovic', 'nciganovic99@gmail.com', '$2y$10$AElP1UqREx22Lk8Gel2dfuFDJ7OtZUTzgmGw28VvvLk0BmesbD1AO', NULL, NULL, '2020-05-07 14:23:42', '0', 1, 0),
(39, 'nikolac', 'nikolac123@hotmail.com', '$2y$10$dnUKyqhFZQxjHeJ.aL3llOKeOATMTLWFQ3jErPyW6Dj3mwDa9WL/m', 'hello', '', '2020-06-17 09:42:07', '0', 1, 0),
(42, 'cigalo', 'nikola.ciganovic.40.18@ict.edu.rs', '$2y$10$zqGWO7B1eVOAIuzR1mgz2OvAUUbIghIgMSg.tb4FASQcQAf.WjqEG', NULL, NULL, '2020-05-26 13:19:54', '0', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `postid` (`postid`),
  ADD KEY `parentid` (`parentid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `upvotepost`
--
ALTER TABLE `upvotepost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `upvotepost`
--
ALTER TABLE `upvotepost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parentid`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upvotepost`
--
ALTER TABLE `upvotepost`
  ADD CONSTRAINT `upvotepost_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upvotepost_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
