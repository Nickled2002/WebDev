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
-- Table structure for table `cmp306_Records`
--

CREATE TABLE `cmp306_Records` (
  `id` int(30) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `transaction_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp306_Records`
--

INSERT INTO `cmp306_Records` (`id`, `itemname`, `address`, `email`, `name`, `transaction_name`) VALUES
(8, 'John Doe', 'Nowhere street', 'JohnDoe@gmail.com', 'John Doe', 'nl212345'),
(9, 'John Doe2', 'Nowhere street2', 'JohnDoe2@gmail.com', 'John Doe2', 'nl212345'),
(10, 'John Doe3', 'Nowhere street3', 'JohnDoe3@gmail.com', 'John Doe3', 'nl212345'),
(11, 'John Doe3', 'Nowhere street3', 'JohnDoe3@gmail.com', 'John Doe3', 'nl212345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmp306_Records`
--
ALTER TABLE `cmp306_Records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmp306_Records`
--
ALTER TABLE `cmp306_Records`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
