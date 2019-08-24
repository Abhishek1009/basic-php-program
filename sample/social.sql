-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2018 at 05:03 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_closed` varchar(4) NOT NULL,
  `deleted` varchar(4) NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(10, 'this is sample post', 'ayan_chowdhury', 'none', '2018-02-13 13:20:30', 'no', 'no', 0),
(9, 'this is my third post', 'abhishek_ghosh', 'none', '2018-01-30 19:06:35', 'no', 'no', 0),
(8, 'this is my second post guys', 'abhishek_ghosh', 'none', '2018-01-30 15:58:40', 'no', 'no', 0),
(7, 'This is a sample post', 'abhishek_ghosh', 'none', '2018-01-30 15:52:54', 'no', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `removed` varchar(4) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(4) NOT NULL,
  `friend_array` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`) VALUES
(19, 'Ayan', 'Chowdhury', 'ayan_chowdhury', 'a@a.com', 'a3092b8eb4ada265af20617b9c0eb6c7', '2018-02-13 13:19:07', 'assets/images/profile_pics/defaults/head_emerald.png', 1, 0, 'no', ','),
(18, 'Abhishek', 'Ghosh', 'abhishek_ghosh', 'ghoshabhishek1640@gmail.com', '3bc8471bb664e23c0ce91ea1872fcb85', '2018-01-28 14:56:00', 'assets/images/profile_pics/defaults/head_emerald.png', 3, 0, 'no', ',');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
