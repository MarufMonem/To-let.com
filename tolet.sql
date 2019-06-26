-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2019 at 04:15 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tolet`
--

-- --------------------------------------------------------

--
-- Table structure for table `buddy`
--

CREATE TABLE `buddy` (
  `buddy_id` int(11) NOT NULL,
  `preferedArea` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buddy`
--

INSERT INTO `buddy` (`buddy_id`, `preferedArea`, `occupation`, `institution`, `message`) VALUES
(1, 'Bashundhara', 'student', 'BRACU', 'want a room mate male'),
(2, 'kaligonj', 'nachi rastay', 'rasta', 'HELP'),
(3, 'Segun Bagicha', 'student', 'UIU', ''),
(4, 'Segun Bagicha', 'student', 'UIU', ''),
(5, 'Gulshan', 'job holder', 'BRAC', 'looking for Female 2 room mates'),
(6, 'Gulshan', 'job holder', 'BRAC', 'looking for Female 2 room mates'),
(7, 'Gulshan', 'job holder', 'BRAC', 'looking for Female 2 room mates');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `ad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image`, `ad_id`) VALUES
(1, 'ad1.jpg', 1),
(2, 'ad2.jpg', 1),
(3, 'ad3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_ad`
--

CREATE TABLE `user_ad` (
  `ad_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `bedroom` int(2) NOT NULL,
  `washroom` int(2) NOT NULL,
  `drawing` int(2) NOT NULL,
  `dining` int(2) NOT NULL,
  `living` int(2) NOT NULL,
  `kitchen` int(2) NOT NULL,
  `bachelor` int(1) NOT NULL,
  `parking` int(1) NOT NULL,
  `info` varchar(200) DEFAULT NULL,
  `owner` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ad`
--

INSERT INTO `user_ad` (`ad_id`, `title`, `date`, `type`, `area`, `price`, `bedroom`, `washroom`, `drawing`, `dining`, `living`, `kitchen`, `bachelor`, `parking`, `info`, `owner`, `contact`, `mail`, `address`) VALUES
(1, 'house for rent in an area', '2019-03-05 18:00:00', 'rent', 'bashundhara', 35000, 3, 3, 1, 1, 1, 1, 0, 1, 'gdgvz dfgdfsg safg hsdfga d fsdaf ', 'someone poor', 753159, 'asdkasdhj@gmil.com', 'lkjsfuou.dsjfoasu ,dsflsodufn 1654'),
(2, 'Home', '2019-03-26 04:49:36', 'Sale', 'Banani', 750000, 2, 3, 1, 1, 1, 1, 0, 1, 'Lake side view', 'Roberts', 123456, NULL, 'banani road 11');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(11) NOT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `buddy_id` int(11) DEFAULT NULL,
  `mover_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `address`, `phone`, `phone2`, `email`, `password`, `ad_id`, `buddy_id`, `mover_id`) VALUES
(1, 'Maruf', 'GopiBagh', 123456, NULL, 'dfghj@hkasf.com', '', 1, NULL, NULL),
(2, 'anik', 'sddsfsd', 457854, 795421, 'asfdfasd@dasfsa', 'asdxsc154', NULL, 1, NULL),
(3, 'Rahim', 'Bashundhara', 12345, 456789, 'rahim@gmail.com', 'root', 2, NULL, NULL),
(9, 'Bucky Roberts', 'cantonment', 789457213, 789451, 'aasoshi91@gmail.com', 'abc123', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buddy`
--
ALTER TABLE `buddy`
  ADD PRIMARY KEY (`buddy_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `user_ad`
--
ALTER TABLE `user_ad`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buddy`
--
ALTER TABLE `buddy`
  MODIFY `buddy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_ad`
--
ALTER TABLE `user_ad`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
