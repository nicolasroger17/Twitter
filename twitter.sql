-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2014 at 04:09 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` int(20) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(140) NOT NULL,
  `retweeted` int(10) NOT NULL,
  `favorited` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `date`, `text`, `retweeted`, `favorited`) VALUES
(2147483647, '0000-00-00', 'Quick #naughty #breakfast to get my day started....#morning #cheatmeal #nomnom #starbucks @ Starbucks http://t.co/KumiTjBk1u', 0, 0),
(2147483647, '0000-00-00', '#vain #sefiegenic #morning #happy http://t.co/2Oo9YfakiB', 0, 0),
(2147483647, '0000-00-00', 'RT @Dima_Bikbaev: Доброе утро, город Ангелов! #Morning #hotel #room #wakeup #usa #la #losangeles #work @ Beach Overlook… http://t.co/w5lLPn…', 0, 0),
(2147483647, '0000-00-00', 'RT @EliseSchraer: Lovejoy is off to a rough start at districts this morning #rough #start #lovejoy #districts #morning #funny #stuck http:/…', 0, 0),
(2147483647, '0000-00-00', '#me #mexicocity #mexicangay #inmycar #morning #goodday #greatday #instamood http://t.co/vL8vpqE6Sp', 0, 0),
(2147483647, '0000-00-00', 'another #morning with #Iran #stock #market', 0, 0),
(2147483647, '0000-00-00', '#Morning #singing with #millie\n#doggie #style benoitlive #dogsitting http://t.co/RNz3xsjLM4', 0, 0),
(2147483647, '0000-00-00', 'Video: Just take me out already ', 0, 0),
(2147483647, '0000-00-00', 'Mi Justdoalmance me compra peletitas #consentida #paleta #miguelito #monday #morning http://t.co/Ufq5RN0ZpC', 0, 0),
(2147483647, '0000-00-00', 'Me hacen felizz #misamores #cousins #grandma #teo #joaqui #tere #family #morning  #pic http://t.co/Sfz4K86j6i', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
