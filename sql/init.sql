-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 30, 2021 at 02:48 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpfinalmovies`
use phpfinalmovies;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` int(11) UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(255) UNIQUE NOT NULL,
    `email` varchar(255) UNIQUE NOT NULL,
    `password` varchar(1000) NOT NULL,
    `first_name` varchar(255) NULL,
    `last_name` varchar(255) NULL,
    `permissions` int(11) DEFAULT 1,
    `date_created` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `permissions`, `date_created`) VALUES
    (1, 'system', 'system@mov.io', '$2y$10$PPUquDQo/Hd3GYL7CVyfVeJoY5FXQZMVpBXTFAuB6nZFRpGu3rpBC', NULL, NULL, 0, '2024-01-01 00:00:01'),
    (2, 'admin', 'admin@mov.io', '$2y$10$yhMvogSFkxkJu8FPfuhs5up6EO9qRL05Nqjzrywc2x0TDA0aiFLSy', NULL, NULL, 1, '2024-01-01 00:01:01');

--
-- Table structure for table `resetTokens`
--

CREATE TABLE `resetTokens` (
    `id` int(11) AUTO_INCREMENT PRIMARY KEY,
    `email` varchar(255) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `expiration` datetime  NOT NULL,
    `date_created` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `movie_cover` varchar(1000) NULL,
    `age_rating` varchar(255) NOT NULL,
    `duration` int(5) NOT NULL,
    `director` varchar(255) NULL,
    `description` varchar(10000) NULL,
    `release_date` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `movie_cover`, `age_rating`, `duration`,`director`, `description`,`release_date`) VALUES
    (1, 'The Shawshank Redemption',
        'the-shawshank-redemption.jpg',
        'R',
        '142',
        'Frank Darabont',
        'Over the course of several years, two convicts form a friendship, seeking consolation and, eventually, redemption through basic compassion.',
        '1994-09-10 00:00:00'
     ),
    (2, 'The Godfather',
         'the-godfather.jpg',
         'R',
         '175',
         'Francis Ford Coppola',
         'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.',
         '1972-03-14 00:00:00'
    ),
    (3, 'The Dark Knight',
         'the-dark-knight.jpg',
         'PG-13',
         '152',
         'Christopher Nolan',
         'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
         '2008-07-14 00:00:00'
    );

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
    (1, 'Drama'),
    (2, 'Crime'),
    (3, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
    `id` int(11) UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` int(11) NOT NULL,
    `movie_id` int(11) NOT NULL,
    `library_status` BIT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
    FOREIGN KEY (`movie_id`) REFERENCES `movies`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
