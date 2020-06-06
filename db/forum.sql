-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 02:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

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
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `id` int(5) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`id`, `text`, `img`) VALUES
(2, 'I\'m Nikola Ciganović 40/18, a Web Developer from Belgrade, Serbia. I\'m currently a college student in ICT College of Vocational studies, studying Web Development. My favorite thing to do is to create stuff using my programming knowledge.', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `parentid` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `parentid`, `text`, `createdat`) VALUES
(129, 1, 3, NULL, 'Level 1 comment', '2020-05-17 10:23:24'),
(144, 39, 7, NULL, 'Comment 6', '2020-05-25 10:15:06'),
(147, 1, 13, NULL, 'Post 9 Level 1', '2020-05-29 12:08:12'),
(148, 1, 13, 147, 'Post 9 Level 2', '2020-05-29 12:08:21'),
(149, 1, 13, NULL, 'Post 9 Level 1.1', '2020-05-29 12:08:33'),
(150, 1, 13, 149, 'Post 9 Level 2.1', '2020-05-29 12:08:54'),
(151, 1, 13, 148, 'Post 9 Level 3', '2020-05-29 12:09:03'),
(152, 1, 13, 148, 'Post 9 Level 3', '2020-05-29 12:15:13'),
(153, 1, 13, 148, 'Post 9 Level 3', '2020-05-29 12:15:18'),
(154, 1, 13, 151, 'qwe', '2020-05-29 12:16:12'),
(155, 1, 13, NULL, 'qwe', '2020-05-29 12:17:22'),
(156, 1, 13, 151, 'qweqwe', '2020-05-29 12:18:23'),
(157, 1, 13, NULL, 'qwe', '2020-05-29 12:19:06'),
(158, 1, 13, 151, 'asd', '2020-05-29 12:19:17'),
(159, 1, 13, NULL, 'LEVEL 1', '2020-05-29 12:24:53'),
(160, 1, 13, 159, 'LEVEL 2', '2020-05-29 12:25:10'),
(161, 1, 13, 160, 'LEVEL 3', '2020-05-29 12:25:15'),
(162, 1, 13, 160, 'LEVEL 3', '2020-05-29 12:26:04'),
(163, 1, 13, 161, 'LEVEL 4', '2020-05-29 12:26:10'),
(164, 1, 13, 160, 'LEVEL 3', '2020-05-29 12:32:49'),
(165, 1, 13, 162, 'LVL 4', '2020-05-29 12:32:55'),
(166, 1, 13, 163, 'lvl 5', '2020-05-29 12:35:09'),
(167, 1, 13, NULL, 'new lvl1', '2020-05-29 12:35:26'),
(168, 1, 13, NULL, 'lvl1', '2020-05-29 12:35:39'),
(169, 1, 13, 168, 'lvl2', '2020-05-29 12:35:47'),
(170, 1, 13, 168, 'lvl 21', '2020-05-29 12:35:54'),
(171, 1, 13, 169, 'lvl3', '2020-05-29 12:36:00'),
(172, 1, 13, 170, 'lvl 31', '2020-05-29 12:36:05'),
(173, 1, 13, 169, 'lvl3', '2020-05-29 12:38:40'),
(174, 1, 13, 171, 'lvl4', '2020-05-29 12:38:47'),
(175, 1, 13, NULL, 'lvl 4', '2020-05-29 12:38:53'),
(176, 1, 13, 175, 'err', '2020-05-29 12:38:59'),
(177, 1, 13, 176, 'errerqwe', '2020-05-29 12:39:03'),
(178, 1, 13, NULL, 'qwe', '2020-05-29 12:39:13'),
(179, 1, 13, 178, 'qwe', '2020-05-29 12:39:19'),
(180, 1, 19, NULL, 'qwe', '2020-05-31 20:29:46'),
(181, 1, 19, 180, 'asd', '2020-05-31 20:29:50'),
(182, 1, 19, 181, 'zxc', '2020-05-31 20:30:06'),
(183, 1, 19, NULL, 'qwe', '2020-05-31 20:30:08'),
(184, 1, 19, 183, 'zxc', '2020-05-31 20:30:10'),
(185, 1, 19, 182, 'zxc', '2020-05-31 20:44:30'),
(186, 1, 19, NULL, 'rty', '2020-06-01 09:59:40'),
(187, 1, 19, NULL, 'ghj', '2020-06-01 10:01:45'),
(188, 1, 19, 187, 'ghj', '2020-06-01 10:01:49'),
(189, 1, 19, 188, 'ghj', '2020-06-01 10:01:52'),
(190, 1, 19, 189, 'ghj', '2020-06-01 10:01:54'),
(191, 1, 19, 190, 'Hey man this is great post keep it up. I am currently doing almost same thing as you do.', '2020-06-01 10:02:35'),
(192, 1, 19, 191, 'zxc', '2020-06-01 10:05:04'),
(193, 1, 19, 192, 'qwe', '2020-06-01 10:05:31'),
(194, 1, 19, NULL, 'dfg', '2020-06-01 11:47:59'),
(195, 37, 19, NULL, 'zxc', '2020-06-01 11:50:24'),
(196, 37, 19, NULL, 'zxc', '2020-06-01 11:57:37'),
(197, 37, 19, NULL, 'zxc', '2020-06-01 11:58:41'),
(198, 1, 19, 196, 'hello', '2020-06-01 11:59:11'),
(224, 1, 20, NULL, 'This is me.', '2020-06-02 11:54:06'),
(225, 1, 20, 224, 'Yes', '2020-06-02 11:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `href` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `href`, `class`) VALUES
(1, 'https://github.com/nciganovic', 'fab fa-github'),
(2, 'https://www.linkedin.com/in/nikola-ciganovi%C4%87-938255167/', 'fab fa-linkedin'),
(3, 'models/posts/export_excel.php', 'far fa-file-excel');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `auth` int(11) NOT NULL
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
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `userid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoryid` int(11) NOT NULL
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
(15, 'This is admin made post', 'admin made post ', 37, '2014-12-31 23:00:00', 4),
(16, 'My new blog', 'Hey this is my new blog', 37, '2020-05-29 18:55:35', 2),
(17, 'Second blog', 'Hey man this is my second blog this day.', 37, '2020-05-29 18:59:02', 1),
(18, 'qwerty uiop asdfg', 'zxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczxczc', 1, '2020-05-30 13:09:07', 1),
(19, 'This is my new post people', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 39, '2020-05-31 12:14:38', 3),
(20, 'Blog with image', 'Hey this is my new description of the post.', 1, '2020-06-01 13:51:35', 1),
(21, 'post made in admin panel', 'post made in admin panel', 42, '2014-12-31 23:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `upvotepost`
--

CREATE TABLE `upvotepost` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotepost`
--

INSERT INTO `upvotepost` (`id`, `userid`, `postid`) VALUES
(29, 1, 1),
(34, 39, 2),
(35, 39, 3),
(37, 1, 10),
(39, 1, 13),
(40, 1, 12),
(41, 39, 12),
(43, 37, 2),
(44, 1, 17),
(45, 1, 5),
(46, 1, 19),
(47, 1, 16),
(51, 1, 9),
(52, 37, 14),
(54, 43, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `profileimg` varchar(100) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `randnum` varchar(64) NOT NULL,
  `isverified` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `bio`, `profileimg`, `createdat`, `randnum`, `isverified`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$ppXRse9ti/vCUa5ih9.lJeKX93MiI8FRsLtGKBzCMwWnmGbIn1bzC', '', '1591020065.jpg', '2020-05-05 13:05:15', '', 1, 1),
(37, 'nciganovic', 'nciganovic99@gmail.com', '$2y$10$AElP1UqREx22Lk8Gel2dfuFDJ7OtZUTzgmGw28VvvLk0BmesbD1AO', NULL, NULL, '2020-05-07 14:23:42', '0', 1, 0),
(39, 'nikolac', 'nikolac123@hotmail.com', '$2y$10$dnUKyqhFZQxjHeJ.aL3llOKeOATMTLWFQ3jErPyW6Dj3mwDa9WL/m', 'hello', '', '2020-06-17 09:42:07', '0', 1, 0),
(42, 'cigalo', 'nikola.ciganovic.41.18@ict.edu.rs', '$2y$10$zqGWO7B1eVOAIuzR1mgz2OvAUUbIghIgMSg.tb4FASQcQAf.WjqEG', NULL, NULL, '2020-05-26 13:19:54', '0', 1, 0),
(43, 'test_user_2', 'nikola.ciganovic.40.18@ict.edu.rs', '$2y$10$/47mpanWMPKi36h1JwBgPeMl6dtkgT7aqS9y7WaApTctYDUuT6Gqu', NULL, NULL, '2020-05-30 12:41:40', '0', 1, 0),
(44, 'qweqweqwe', 'qweqweqwe@gmail.com', '$2y$10$osNqzh2WQY43QsYrdOiHXetvH2f/IVMgrgJfOEjECBI6777qtJW1C', NULL, NULL, '2020-05-30 12:47:59', '7d7d9a05f22279a1a08fdfabf1b55410d7edd25df0d2beed34ca504c469d4155', 0, 0),
(45, 'qweqweq', 'qweqweqweq@gmail.com', '$2y$10$2hCRTkuePEJB2H93rkfqW..gFpR9kTkhRuzrtmHpSRW2OBtQ/dVti', NULL, NULL, '2020-05-30 12:48:39', '4b2f1133da31d0f074e130861944b500ee3db0d792dab33196a1dca9f8f498d1', 0, 0),
(49, 'user123', 'user123@gmail.com', '$2y$10$mtuwsUa1RiYAGfiIW/kQSOI8zi9IYIMzG37tZ9kJHLC2eTh5THqkm', NULL, NULL, '2020-06-02 10:16:40', 'b51b4518bd0b3c5b8c4b7003e509fdbfb0c28a59507004c1d192fe65068fe8c0', 0, 0),
(50, 'user1234', 'user1234@gmail.com', '$2y$10$jp9yu7wqhJZHLb7bLxiAq.RXOV2ZiAXQGrxWhNzSR472SAzFXbmyS', NULL, NULL, '2020-06-02 11:37:05', 'c4da2acfdcfb02eccae36b222e2ff6e1d5e549fbdb72e0b495353659bf915478', 0, 0),
(51, 'qweqwe', 'pera12345@gmail.com', '$2y$10$lCjIcAXUWHHlmKLGUh7EaeGIqY4Fp1SeY.tepC.Ff7kcZR9M55vcO', NULL, NULL, '2020-06-02 11:43:28', '78f9e8e26e5346e6ea4acab3656a38249df3d636734fce081de6020a8f2c4502', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bio`
--
ALTER TABLE `bio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `upvotepost`
--
ALTER TABLE `upvotepost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
