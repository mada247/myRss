-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2016 at 04:11 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zendC`
--

-- --------------------------------------------------------

--
-- Table structure for table `rss`
--

CREATE TABLE IF NOT EXISTS `rss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rName` varchar(255) NOT NULL,
  `rUrl` varchar(255) NOT NULL,
  `rDesc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `rss`
--

INSERT INTO `rss` (`id`, `rName`, `rUrl`, `rDesc`, `user_id`) VALUES
(16, 'Mina Amir', 'http://rss.cnn.com/rss/edition_meast.rss', 'mohammed', 7),
(17, 'youm7', 'http://rss.cnn.com/rss/edition_meast.rss', 'mohammed ali', 7),
(19, 'test', 'http://www.youm7.com/rss/SectionRss?SectionID=65', 'hello', 7),
(21, 'alwatan', 'http://rss.cnn.com/rss/edition_meast.rss', 'ttttt', 7),
(24, 'almasry alyoum', 'http://rss.cnn.com/rss/edition_meast.rss', 'test jjjjj', 7),
(25, 'almasry alyoum', 'http://rss.cnn.com/rss/edition_meast.rss', 'ya rab ', 7),
(26, '3alamia', 'http://www.youm7.com/rss/SectionRss?SectionID=286', 'number1', 7),
(27, '3arabia', 'http://www.youm7.com/rss/SectionRss?SectionID=88', 'number2', 7),
(28, 'masrya', 'http://www.youm7.com/rss/SectionRss?SectionID=97', 'number3', 7),
(29, '3agela', 'http://www.youm7.com/rss/SectionRss?SectionID=65', 'number4', 7),
(31, 'test', 'http://www.youm7.com/rss/SectionRss?SectionID=65', 'test', 11),
(32, '7awadeth', 'http://www.youm7.com/rss/SectionRss?SectionID=203', '7awadeth', 12),
(33, 'almasry alyoum', 'youm7', 'youm7', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `prof_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `prof_pic`) VALUES
(1, NULL, NULL, 'moh_ali2523@yahoo.com', NULL, '2147483647', '3.jpg'),
(2, NULL, NULL, 'moh_ali2523@yahoo.com', NULL, '2147483647', '1.jpg'),
(3, 'dsadsadsadasdasasd', 'jhgkjk', 'ay@yahoo.com', NULL, '2147483647', '1.jpg'),
(4, 'Ahmed', 'Sobhy', 'ahmed@hotmail.com', 'shika', '4297', '1.jpg'),
(5, 'amamam', 'oioioioiko', 'khaled@yahoo.com', 'jjjj', '2147483647', '1.jpg'),
(6, 'mina', 'amir', 'mina@hotmail.com', 'mamir', '2147483647', '1.jpg'),
(7, 'Mohammed', 'Ali', 'mada247@gmail.com', 'mali', '81e49e31110a2c4d85a0613072045294', '1.jpg'),
(11, 'ali', 'ali', 'hany@hotmail.com', 'ali', '81e49e31110a2c4d85a0613072045294', '4.jpg'),
(12, 'fathy', 'tarek', 'ftarek@yahoo.com', 'fathy', '81e49e31110a2c4d85a0613072045294', '1.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rss`
--
ALTER TABLE `rss`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
