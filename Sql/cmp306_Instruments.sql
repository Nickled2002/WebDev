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
-- Table structure for table `cmp306_Instruments`
--

CREATE TABLE `cmp306_Instruments` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(36) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cmp306_Instruments`
--

INSERT INTO `cmp306_Instruments` (`id`, `name`, `image`, `description`, `price`, `stock`) VALUES
(1, 'Yamaha PSR F52 Portable Keyboard X Frame Package', 'itm1.jpg', 'Play any style of music with one instrument. The Yamaha PSR-F52s extensive range of 144 different voices includes pianos, organs, guitars, strings, wind instruments and more allowing you to delve into different types of music from classical to rock. This feature is ideal for beginners who may be new to the world of music-making helping to expand their knowledge of musical styles and genres.', 119, 8),
(2, 'Dean Edge 09M Bass Satin Natural', 'itm2.jpg', 'The Edge 09M incorporates a soapbar-style pickup in the bridge position to deliver a powerful and dynamic tone. The bridge pickup delivers a no-noise output with a warm and deep tone which can be balanced with the dome pickup knob to create a range of unique bass tones. This product is perfect for beginners and young players.', 149, 9),
(3, 'pBugle Plastic Musical Instrument', 'itm3.jpg', 'Theres plenty of research to show that early exposure to musical instruments has a positive impact on brain development in younger children. Not only does it support social language and reasoning skills but it also supports effective memory development. The manufacturers of pInstruments are the first  instrument manufacturer to offer only carbon-neutral instruments.', 30, 11),
(4, 'Hartwood Renaissance Tenor Ukulele', 'itm4.jpg', 'Crafted from carefully selected materials. The Hartwood Renaissance Tenor Ukulele has mahogany back and sides, with a solid spruce top. This combination helps produce a warm and balanced sound, enhancing your ukulele\'s mid-range. The solid spruce top also increases projection and volume, so you can be clearly cut through the mix when you play in a band.', 49, 4),
(5, 'Tanglewood TWBB SFCE Blackbird Electro Acoustic', 'itm5.jpg', 'Rich, resonant, distinctive. The Tanglewood Blackbird delivers an indulgent dark warmth. And its all-mahogany construction gives it an instantly recognisable tone that\'s been an influential part of music history. Mahogany delivers warmth and resonance in abundance, bringing you a tone you\'ve all heard before on your favourite old-school records. And it exudes authentic class.', 199, 4),
(6, 'Danmar Triangle, 10 Inch', 'itm6.jpg', 'The Danmar Triangle is an American-made 10\'\' triangle with a beater, striker and holder. This triangle is handmade using a custom heat-treated carbon steel alloy, 1/2\'\' in diameter. A thin satin chrome finish is used in order to maximize the response. This combination of material and craftsmanship yields a bright shimmering tone with a full spectrum of complex overtones.', 38, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cmp306_Instruments`
--
ALTER TABLE `cmp306_Instruments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cmp306_Instruments`
--
ALTER TABLE `cmp306_Instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
