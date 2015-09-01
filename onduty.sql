-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2015 at 08:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onduty`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) NOT NULL,
  `pword` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pword`) VALUES
(1, 'registration@gravitas15', 'MTIz'),
(2, 'finance@gravitas15', 'MTIz'),
(3, 'guestcare@gravitas15', 'MTIz'),
(4, 'splguestcare@gravitas15', 'MTIz'),
(5, 'events@gravitas15', 'MTIz'),
(6, 'publicity@gravitas15', 'MTIz'),
(7, 'design@gravitas15', 'MTIz'),
(8, 'sponsorship@gravitas15', 'MTIz'),
(9, 'preetika@gravitas15', 'MTIz'),
(10, 'skk@gravitas15', 'MTIz'),
(11, 'naiju@gravitas15', 'MTIz');

-- --------------------------------------------------------

--
-- Table structure for table `od_list`
--

CREATE TABLE IF NOT EXISTS `od_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(9) NOT NULL,
  `name` text NOT NULL,
  `school` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `work_done` text NOT NULL,
  `od_date` date NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `committee` varchar(30) NOT NULL,
  `preetika` int(11) NOT NULL DEFAULT '0',
  `skk` int(11) NOT NULL DEFAULT '0',
  `naiju` int(11) NOT NULL DEFAULT '0',
  `dsw` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `od_list`
--

INSERT INTO `od_list` (`id`, `regno`, `name`, `school`, `year`, `work_done`, `od_date`, `from_time`, `to_time`, `committee`, `preetika`, `skk`, `naiju`, `dsw`) VALUES
(1, '12mse0363', 'Rajalakshmi', 'site', '4', 'reg portal', '2015-07-09', '08:00:00', '18:00:00', 'registration', 1, 1, 1, 0),
(8, '12mse0353', '123', 'site', '1', '123', '2015-07-01', '08:00:00', '18:00:00', 'registration', 1, 0, 0, 0),
(9, '12mdg2222', 'saddsaa', 'site', '4', 'asD', '2015-07-01', '08:00:00', '18:00:00', 'registration', 1, 0, 1, 0),
(10, '12NMH2172', 'QWED', 'site', '4', 'QWE', '2015-07-06', '08:00:00', '18:00:00', 'registration', 1, 0, 0, 0),
(11, '13bce0267', 'Chaitanya. T', 'ssl', '4', 'nothing', '2015-07-01', '08:00:00', '18:00:00', 'finance', 1, 0, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
