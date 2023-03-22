-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2020 at 09:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sql2001975`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `cmp306_Instruments` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `image` varchar(36) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `cmp306_Instruments` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'Yamaha PSR F52 Portable Keyboard X Frame Package', 'itm1.jpg', 'Play any style of music with one instrument. The Yamaha PSR-F52s extensive range of 144 different voices includes pianos, organs, guitars, strings, wind instruments and more, allowing you to delve into different types of music from classical to rock. This feature is ideal for beginners who may be new to the world of music-making, helping to expand their knowledge of musical styles and genres. Yamahas instrument-making expertise and experience feeds into creating high-quality, accurate sounds. The Sound Boost function allows players to add power to their sound.', 119),
(2, 'Dean Edge 09M Bass, Satin Natural', 'itm2.jpg', 'The Edge 09M incorporates a soapbar style pickup in the bridge position to deliver a powerful and dynamic tone. The bridge pickup delivers a no noise output with a warm and deep tone which can be balanced with the dome pickup knob to create a range of unique bass tones.', 149),
(3, 'pBugle Plastic Musical Instrument', 'itm3.jpg', 'There’s plenty of research to show that early exposure to musical instruments has a positive impact on brain development in younger children. Not only does it support social, language, and reasoning skills, but it also supports effective memory development.', 30),
(4, 'Hartwood Renaissance Tenor Ukulele, Natural', 'itm4.jpg', 'Crafted from carefully selected materials. The Hartwood Renaissance Tenor Ukulele has mahogany back and sides, with a solid spruce top. This combination helps produce a warm and balanced sound, enhancing your ukuleles mid-range. The solid spruce top also increases projection and volume, so you can be clearly cut through the mix when you play in a band. The neck is made from okoume – a hardwood known to be strong and resistant to moisture. This is topped with a smooth fingerboard with 18 frets. Built from sustainable artificial rosewood, the fingerboard provides an excellent touch response – for instinctive and natural playing.', 49),
(5, 'Tanglewood TWBB SFCE Blackbird Electro Acoustic, Smokestack Black', 'itm5.jpg', 'Rich, resonant, distinctive. The Tanglewood Blackbird delivers an indulgent dark warmth. And its all-mahogany construction gives it an instantly recognisable tone thats been an influential part of music history. Mahogany delivers warmth and resonance in abundance, bringing you a tone youve all heard before on your favourite old-school records. And it oozes authentic class.', 199),
(6, 'Danmar Triangle, 10 Inch', 'itm6.jpg', 'The Danmar Triangle is an American-made 10'' triangle with a beater, striker and holder. This triangle is handmade using a custom heat-treated carbon steel alloy, 1/2'' in diameter. A thin satin chrome finish is used in order to maximize the response. This combination of material and craftsmanship yields a bright shimmering tone with a full spectrum of complex overtones, along with great sustain.', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `cmp306_Instruments`
  ADD PRIMARY KEY (`id`);