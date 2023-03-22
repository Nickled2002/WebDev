-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 11:45 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql2001975`
--

-- --------------------------------------------------------

--
-- Table structure for table `electricimp1`
--

CREATE TABLE `electricimp1` (
  `id` int(255) NOT NULL,
  `devid` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electricimp1`
--

INSERT INTO `electricimp1` (`id`, `devid`, `date`, `state`) VALUES
(1, '230a86b930728cee', '2022-12-12 15:58:29', '[ {\"led\" : \"RED\" , \"state\" : \"OFF\"} ,{\"led\" : \"GREEN\" , \"state\" : \"OFF\"} ]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electricimp1`
--
ALTER TABLE `electricimp1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electricimp1`
--
ALTER TABLE `electricimp1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
