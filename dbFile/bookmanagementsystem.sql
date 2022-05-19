-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 09:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` text NOT NULL,
  `adminStatus` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `code`, `status`, `adminStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'georges', 'boutros.georges513@gmail.com', '$2y$10$RSgZPwMFL7cZW0PQ5k1b7O0WavpNJzo9ej7v7cp.yLu/FOQNoGbma', 0, 'verified', 1, '2022-04-30 05:38:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthDate` varchar(255) NOT NULL,
  `authorBio` longtext NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` text NOT NULL,
  `authorStatus` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `password`, `birthDate`, `authorBio`, `code`, `status`, `authorStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'Gary Scott Thompson', 'boutros.georges@aut.edu', '$2y$10$ExyDTT6wXT6EIQ6U/HYsXOCkPcCcl/hPk47A6HqMJnFnmWTWXSS0a', '2020-04-23', 'author of fast and furious series', 0, 'verified', 1, '2022-05-02 13:54:56', '04-05-2022 09:46:29 AM'),
(2, 'Rowan Sebastian Atkinson', 'rowan@gmail.com', '$2y$10$yYhCEVQ48.6/YCqEc5QgyOu9YmmAmE1Jl1vJgoSc0pHzlfO5JcQIG', '1977-06-07', '     English comedian actor and writer', 359537, 'verified', 1, '2022-05-04 07:02:44', '04-05-2022 10:12:25 AM'),
(3, 'Leigh Whannell', 'leigh@gmail.com', '$2y$10$qMlytC4i6HhcPM4a9TgVTeOFyFRx3f2L3dJD6xZT7hSyOyfpgsqwS', '1980-09-22', '    Australian screenwriter, actor, film director and producer', 965236, 'verified', 1, '2022-05-04 07:08:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brief` longtext NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `coverImage` varchar(255) NOT NULL,
  `bookPrice` int(50) NOT NULL,
  `bookPriceBeforeDiscount` int(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `bookAvailability` varchar(255) NOT NULL,
  `shippingCharge` int(11) NOT NULL,
  `bookStatus` int(11) NOT NULL,
  `bookFeatured` int(11) NOT NULL,
  `publishedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookToken`, `categoryName`, `subcategoryName`, `title`, `brief`, `authorName`, `coverImage`, `bookPrice`, `bookPriceBeforeDiscount`, `status`, `bookAvailability`, `shippingCharge`, `bookStatus`, `bookFeatured`, `publishedDate`, `updatedDate`) VALUES
(1, 'XUdF84L4hoU', 'action', 'racing', 'fast and furious 5', 'contains					', 'Gary Scott Thompson', 'f5.png', 210, 240, 'published', 'In Stock', 12, 1, 1, '2022-05-04 06:57:00', ''),
(2, 'ZGHUOMNEn6h', 'action', 'racing', 'fast and furious 6', 'Filmed at Dubai					', 'Gary Scott Thompson', 'f6.png', 310, 340, 'published', 'In Stock', 12, 1, 1, '2022-05-04 06:57:42', ''),
(3, 'vY1qSxW96hu', 'action', 'racing', 'fast and furious 7', 'This serie is filmed at London, where these guys get to face one of the biggest plane ever					', 'Gary Scott Thompson', 'f7.png', 410, 440, 'draft', 'In Stock', 12, 1, 0, '2022-05-04 06:59:09', ''),
(4, 'INu4hkmMlFo', 'action', 'racing', 'fast and furious 9', 'This serie is filmed is South America. these guys will face the brother of the main character					', 'Gary Scott Thompson', 'f9.png', 510, 540, 'published', 'In Stock', 12, 1, 1, '2022-05-04 07:00:21', ''),
(5, 'yfjvxgbvaZD', 'comics', 'funny', 'Mr Bean', 'it is a british sitcom					', 'Rowan Sebastian Atkinson', 'mrbean.png', 180, 210, 'published', 'In Stock', 5, 1, 1, '2022-05-04 07:05:06', ''),
(6, 'MTIZ0PGqhxv', 'horror', 'ghosts', 'insidious', '											2010 american supernatural horror film															', 'Leigh Whannell', 'insidious.png', 640, 670, 'published', 'In Stock', 0, 1, 0, '2022-05-04 07:10:15', '04-05-2022 10:10:44 AM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `categoryStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryToken`, `categoryName`, `categoryDescription`, `categoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'MzHQNXP5VDE', 'comics', 'Contains comics books and movies', 1, '2022-05-04 06:23:28', ''),
(2, 'jAH9pjmjvRu', 'horror', 'contains horror movies and books', 1, '2022-05-04 06:24:55', ''),
(3, 'ExoXtTi5lgb', 'action', 'contains action books and movies', 1, '2022-05-04 06:25:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryToken` varchar(255) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subcategoryToken` varchar(255) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `subcategoryDescription` longtext NOT NULL,
  `subcategoryStatus` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryToken`, `categoryName`, `subcategoryToken`, `subcategoryName`, `subcategoryDescription`, `subcategoryStatus`, `createDate`, `updateDate`) VALUES
(1, 'MzHQNXP5VDE', 'comics', 'SrlgnYuE4y8', 'funny', 'contains funny sub category books and movies', 1, '2022-05-04 06:24:18', ''),
(2, 'jAH9pjmjvRu', 'horror', 'T0tO6VDXzAX', 'ghosts', 'contains ghosts movies and books from horror category', 1, '2022-05-04 06:25:23', ''),
(3, 'ExoXtTi5lgb', 'action', 'B1x4nv8u1EM', 'racing', 'contains racing cars and movies from action category', 1, '2022-05-04 06:26:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `shippingAddress` longtext NOT NULL,
  `shippingState` varchar(255) NOT NULL,
  `shippingCity` varchar(255) NOT NULL,
  `shippingPinCode` int(11) NOT NULL,
  `donationCoupon` varchar(255) NOT NULL,
  `code` mediumint(9) NOT NULL,
  `status` text NOT NULL,
  `userStatus` int(11) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPinCode`, `donationCoupon`, `code`, `status`, `userStatus`, `registrationDate`, `updateDate`) VALUES
(1, 'user', 'grg@gmail.com', '76126703', '$2y$10$RvociXtXh4Sr5X.2E.ICouyUrLkVWxK5j23JEQsz52rQJxGkVtMTC', '																						chekka, north lebanon, facing BLC Bank                        																				', 'north lebanon', 'chekka', 0, 'No', 0, 'verified', 1, '2022-05-02 19:09:12', '04-05-2022 09:46:42 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
