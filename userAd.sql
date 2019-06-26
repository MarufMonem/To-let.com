-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2019 at 03:54 PM
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
-- Table structure for table `userAd`
--

CREATE TABLE `userad` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `bedroom` int(2) NOT NULL,
  `washroom` int(2) NOT NULL,
  `drawing` int(1) NOT NULL,
  `dining` int(1) NOT NULL,
  `living` int(1) NOT NULL,
  `kitchen` int(1) NOT NULL,
  `bachelor` int(1) NOT NULL,
  `parking` int(1) NOT NULL,
  `info` varchar(200) DEFAULT NULL,
  `owner` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userAd`
--

INSERT INTO `userAd` (`id`, `title`, `type`, `area`, `price`, `bedroom`, `washroom`, `drawing`, `dining`, `living`, `kitchen`, `bachelor`, `parking`, `info`, `owner`, `contact`, `mail`, `address`, `image`) VALUES
(1, 'house for rent in an area', 'rent', 'bashundhara', 35000, 3, 3, 1, 1, 1, 1, 0, 1, 'gdgvz dfgdfsg safg hsdfga d fsdaf ', 'someone poor', 753159, 'asdkasdhj@gmil.com', 'lkjsfuou.dsjfoasu ,dsflsodufn 1654', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userAd`
--
ALTER TABLE `userAd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userAd`
--
ALTER TABLE `userAd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
