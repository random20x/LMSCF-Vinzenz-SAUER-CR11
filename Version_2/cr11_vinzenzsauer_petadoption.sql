-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 09:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_brandonlandrumjeffries_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `adoption_ready_date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `fk_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `age`, `img`, `description`, `address`, `hobbies`, `Website`, `adoption_ready_date`, `type`, `fk_id`) VALUES
(2, 'Cat', 2, 'https://cdn.pixabay.com/photo/2018/01/03/19/17/cat-3059075__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '123 Mcdonalds way', 'Jumping, Swimming', 'https://en.wikipedia.org/wiki/Animal', '2020-03-01', 'small', NULL),
(4, 'Fox', 4, 'https://cdn.pixabay.com/photo/2020/03/01/15/30/fox-4893199_1280.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 ring road', 'Jumping, swimming', 'https://en.wikipedia.org/wiki/Animal', '2020-03-02', 'small', NULL),
(5, 'Sea Turtle', 7, 'https://cdn.pixabay.com/photo/2017/05/31/18/38/sea-2361247__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 ring road', 'flying', 'https://en.wikipedia.org/wiki/Animal', '2020-03-03', 'small', NULL),
(6, 'Parrot', 3, 'https://cdn.pixabay.com/photo/2018/08/12/16/59/ara-3601194__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Flying, talking', 'https://en.wikipedia.org/wiki/Animal', '2020-03-04', 'small', NULL),
(7, 'Tiger', 9, 'https://cdn.pixabay.com/photo/2016/11/29/10/07/animal-1868911__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Tanning and grooming ', 'https://en.wikipedia.org/wiki/Animal', '2020-03-06', 'large', NULL),
(8, 'Lion', 10, 'https://cdn.pixabay.com/photo/2018/05/03/22/34/lion-3372720__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Sleeping', 'https://en.wikipedia.org/wiki/Animal', '2020-03-07', 'large, senior', NULL),
(9, 'Horse', 6, 'https://cdn.pixabay.com/photo/2017/12/10/15/16/white-horse-3010129__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Running', 'https://en.wikipedia.org/wiki/Animal', '2020-03-08', 'large', NULL),
(10, 'Husky', 9, 'https://cdn.pixabay.com/photo/2018/05/07/10/48/husky-3380548__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Dog Sledding', 'https://en.wikipedia.org/wiki/Animal', '2020-03-09', 'large, senior', NULL),
(11, 'Dog', 11, 'https://cdn.pixabay.com/photo/2014/08/21/14/51/pet-423398__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Fetch', 'https://en.wikipedia.org/wiki/Animal', '2020-03-10', 'small, senior', NULL),
(12, 'Sealion', 25, 'https://cdn.pixabay.com/photo/2020/03/11/21/06/seal-4923333__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Eating fish', 'https://en.wikipedia.org/wiki/Animal', '2020-03-11', 'large, senior', NULL),
(13, 'Owl', 7, 'https://cdn.pixabay.com/photo/2017/01/26/11/17/european-eagle-owl-2010346__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'observing', 'https://en.wikipedia.org/wiki/Animal', '2020-03-12', 'small', NULL),
(14, 'Koala', 10, 'https://cdn.pixabay.com/photo/2011/09/28/23/19/koala-bear-9960__480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, debitis sed neque rerum magnam facere ipsum, non dolorem harum ad, saepe nihil', '145 Ring Road', 'Climbing ', 'https://en.wikipedia.org/wiki/Animal', '2020-03-13', 'small, senior', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(5, 'Brandon Jeffries', 'brandonlj8@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(11, 'Serri', 'serri@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(12, 'Theo', 'theo@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(13, 'Marina', 'marina@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_id` (`fk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
