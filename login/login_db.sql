-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2018 at 04:58 AM
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
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream` varchar(50) NOT NULL,
  `session` varchar(10) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `institution` varchar(50) NOT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `cover_pic` varchar(255) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`first_name`, `last_name`, `email`, `password`, `id`, `stream`, `session`, `roll_no`, `institution`, `activation_code`, `active`, `profile_pic`, `cover_pic`, `username`) VALUES
('Abhishek', 'Ghosh', 'Ghoshabhishek1640@gmail.com', 'Abhishek', 1, 'IT', '2015-2019', '10200215003', 'Kalyani government engineering college', NULL, NULL, NULL, NULL, 'abhishek_ghosh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `validation_code` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `validation_code`, `active`) VALUES
(1, 'Abhishek', 'Ghosh', 'abhishek_ghosh', 'c1709381201f8c81d219b18282eb4edb', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
