-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2018 at 04:34 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formappdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1`
--

DROP TABLE IF EXISTS `form_table_1`;
CREATE TABLE IF NOT EXISTS `form_table_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form-title` varchar(100) NOT NULL,
  `hash-id` varchar(130) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash-id` (`hash-id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_1`
--

INSERT INTO `form_table_1` (`id`, `form-title`, `hash-id`) VALUES
(1, 'Naslov', 'c5b09bc506805e4c27a46159e425db532279e68c51afdc81f1cd76f10d770b41'),
(2, 'Ð˜Ð·Ð±Ð¾Ñ€ Ð·Ð° Ð´Ð°Ñ‚ÑƒÐ¼', '73b7809232938bb5cc727d9de514b8f199ec1256b8c25f2fe1556cd4b1da73ba'),
(3, 'Party invitation', 'fb354e69b890f4b0a6d51a7dac1025dc93229899ef7dfc20b67ab2a425fed1ef'),
(4, 'Izbor za prezentiranje MIA', '9e8f9829e57869d5835a9ced1cfcdad2a4b4a403b528031c2d5a504add2c5bf8'),
(5, 'MIA prezentacija', 'dd3f848f12320292b1795c304f74859168752369e89ee7c8e4f4a364f2d6bbfb'),
(6, 'Ð˜Ð·Ð±Ð¾Ñ€ Ð·Ð° Ñ‚ÐµÑ€Ð¼Ð¸Ð½', '9f8c19a1c02de39240bb48287541afb717f62d0148c3bccef962c554c3f4b385'),
(7, 'Ð’Ñ€ÐµÐ¼Ðµ', '7ba63aa3d80c69aaf83222550482d66486fab99489ac41ae4bfbea59d2e6e7d2');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_1`
--

DROP TABLE IF EXISTS `form_table_1_1`;
CREATE TABLE IF NOT EXISTS `form_table_1_1` (
  `element_1_1_0_3` varchar(50) DEFAULT NULL,
  `element_1_1_1_3` varchar(50) DEFAULT NULL,
  `element_1_1_2_6` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_1_1`
--

INSERT INTO `form_table_1_1` (`element_1_1_0_3`, `element_1_1_1_3`, `element_1_1_2_6`) VALUES
('nekakov', NULL, '2001-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_2`
--

DROP TABLE IF EXISTS `form_table_1_2`;
CREATE TABLE IF NOT EXISTS `form_table_1_2` (
  `element_1_2_0_3` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_1_2`
--

INSERT INTO `form_table_1_2` (`element_1_2_0_3`) VALUES
('12.02.2018'),
('10.02.2018'),
('11.02.2018'),
('12.02.2018');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_3`
--

DROP TABLE IF EXISTS `form_table_1_3`;
CREATE TABLE IF NOT EXISTS `form_table_1_3` (
  `element_1_3_0_1` varchar(200) DEFAULT NULL,
  `element_1_3_1_6` varchar(10) DEFAULT NULL,
  `element_1_3_2_5` varchar(100) DEFAULT NULL,
  `element_1_3_3_2` varchar(450) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_1_3`
--

INSERT INTO `form_table_1_3` (`element_1_3_0_1`, `element_1_3_1_6`, `element_1_3_2_5`, `element_1_3_3_2`) VALUES
('nikola velickovski', '2018-07-12', 'velickovskinikola1@gmail.com', 'jdhjsahdajaansfhfsjdfhd'),
('Irina senchuk', '2018-12-12', 'irinasencuk@gmail.com', 'Cant wait to come'),
('Marija Neceva', '2018-07-14', 'mneceva@gmail.com', 'Zabava pokraj bazen'),
('Martina Shushlevska', '2018-07-19', 'martinasuslevska@yahoo.com', 'Rodendenska zabava vo villa Ina');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_4`
--

DROP TABLE IF EXISTS `form_table_1_4`;
CREATE TABLE IF NOT EXISTS `form_table_1_4` (
  `element_1_4_0_1` varchar(200) DEFAULT NULL,
  `element_1_4_1_3` varchar(50) DEFAULT NULL,
  `element_1_4_2_2` varchar(450) DEFAULT NULL,
  `element_1_4_3_2_4` varchar(50) DEFAULT NULL,
  `element_1_4_3_3_4` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_5`
--

DROP TABLE IF EXISTS `form_table_1_5`;
CREATE TABLE IF NOT EXISTS `form_table_1_5` (
  `element_1_5_0_1` varchar(200) DEFAULT NULL,
  `element_1_5_1_3` varchar(50) DEFAULT NULL,
  `element_1_5_2_2` varchar(450) DEFAULT NULL,
  `element_1_5_3_2_4` varchar(50) DEFAULT NULL,
  `element_1_5_3_3_4` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_6`
--

DROP TABLE IF EXISTS `form_table_1_6`;
CREATE TABLE IF NOT EXISTS `form_table_1_6` (
  `element_1_6_0_2_4` varchar(50) DEFAULT NULL,
  `element_1_6_0_3_4` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_table_1_7`
--

DROP TABLE IF EXISTS `form_table_1_7`;
CREATE TABLE IF NOT EXISTS `form_table_1_7` (
  `element_1_7_0_3` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_1_7`
--

INSERT INTO `form_table_1_7` (`element_1_7_0_3`) VALUES
('12_am'),
('12_pm'),
('12_am'),
('12_am');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_2`
--

DROP TABLE IF EXISTS `form_table_2`;
CREATE TABLE IF NOT EXISTS `form_table_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form-title` varchar(100) NOT NULL,
  `hash-id` varchar(130) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash-id` (`hash-id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_table_2`
--

INSERT INTO `form_table_2` (`id`, `form-title`, `hash-id`) VALUES
(1, 'Marija', '30abb514722ac8ee52cc76093d67fe4fc5e378da9176d862d0ec9b53137558be');

-- --------------------------------------------------------

--
-- Table structure for table `form_table_2_1`
--

DROP TABLE IF EXISTS `form_table_2_1`;
CREATE TABLE IF NOT EXISTS `form_table_2_1` (
  `element_2_1_0_6` varchar(10) DEFAULT NULL,
  `element_2_1_1_3` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `hash_id` varchar(130) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `name`, `password`, `token`, `hash_id`) VALUES
(1, 'VELICKOVSKINIKOLA1@GMAIL.COM', 'NVELICHKOVSKI', 'nikola velickovski', '$2y$10$QkmWmCQ3x9R.HTijUJ9pYuG9PdoiteJGM3rJ7i7GoQyFsCJmZ0VSi', '15b39f8825c194', 'fa0a9e29b707351b3b27170d8aa2fcf72f7bea033b6817be12b7a1efd9987b24'),
(2, 'MNECEVA@GMAIL.COM', 'MARIJA97', 'marija neceva', '$2y$10$cTz4G4eizOjm4Hu2gCQBaeqLsGChRlqLDWCzoYtXaU/HBFbWVChGS', NULL, '46a3048eb17d05af27ff6041f4d3eb3a7a5dcec0f6b07362896ef29eb754ea08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
