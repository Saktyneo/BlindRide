-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2015 at 05:55 PM
-- Server version: 5.5.16-log
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blindride`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY` varchar(30) NOT NULL,
  `AREA` varchar(500) NOT NULL,
  `SUBAREA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`ID`, `CITY`, `AREA`, `SUBAREA`) VALUES
(3, 'PUNE', 'Wakad Chowk', ''),
(4, 'PUNE', 'Wakad Bridge', ''),
(5, 'PUNE', 'Wakad', 'Costa Rica'),
(6, 'PUNE', 'Wakad', 'Dutta Mandir'),
(7, 'PUNE', 'Pimple Saudagar', 'Jagtap Dairy'),
(8, 'PUNE', 'Pimple Saudagar', 'Shivar Chowk'),
(9, 'PUNE', 'Hinjewadi', 'Phase 1'),
(10, 'PUNE', 'Hinjewadi', 'Phase 2 Infosys'),
(11, 'PUNE', 'Hinjewadi', 'Phase 2 Wipro'),
(12, 'PUNE', 'Hinjewadi', 'Phase 3 Cognizant CDC'),
(13, 'PUNE', 'Hinjewadi', 'Phase 2 DLF');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emailid`, `password`, `firstname`, `lastname`) VALUES
(1, 'shabbirbohri@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Shabbir', 'Burhanpurwalla'),
(2, 'safal.tyagi@blindride.in', '827ccb0eea8a706c4c34a16891f84e7b', 'Safal', 'Tyagi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
