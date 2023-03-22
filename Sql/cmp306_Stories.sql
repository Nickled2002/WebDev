-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 11:46 AM
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
-- Table structure for table `cmp306_Stories`
--

CREATE TABLE `cmp306_Stories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp306_Stories`
--

INSERT INTO `cmp306_Stories` (`id`, `name`, `description`, `date`) VALUES
(1, 'Strep A: Grandmother says four-year-old Camila Burns getting better', 'A four-year-old who was fighting for her life with a strep A infection is recovering, her grandmother says.', '2022-10-09'),
(2, 'Our job is to keep people out of the emergency department', 'An innovative scheme in Manchester is pioneering a new way to make sure patients get the best care possible.', '2022-12-09'),
(3, 'Nursery staff who wiped children\'s noses did not wash hands', 'Inspectors also found poor quality teaching and a choking hazard that put children\'s safety at risk.', '2022-12-09'),
(4, 'Man charged with attempted murder of Blackpool toddler', 'The boy was found with injuries to the face and neck at a home in Blackpool, police say.', '2022-12-09'),
(5, 'Alan Ball: 1966 World Cup winner\'s medal sells for 200,000 pounds', 'Alan Ball was the youngest member of the legendary 1966 England team which won the tournament.', '2022-12-09'),
(6, 'Millwall v Wigan Athletic', 'Live coverage of Saturday\'s Championship game between Millwall and Wigan Athletic.', '2022-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmp306_Stories`
--
ALTER TABLE `cmp306_Stories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmp306_Stories`
--
ALTER TABLE `cmp306_Stories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
