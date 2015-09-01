-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2015 at 08:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas15`
--

-- --------------------------------------------------------

--
-- Table structure for table `colg_ambassador`
--

CREATE TABLE IF NOT EXISTS `colg_ambassador` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colg_ambassador`
--

INSERT INTO `colg_ambassador` (`id`, `name`) VALUES
(2001, 'Priya'),
(2002, 'Jaya'),
(2003, 'Amulya');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `state` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `state`) VALUES
(1, 'VIT', 'vellore'),
(2, 'MIT', 'Manipal');

-- --------------------------------------------------------

--
-- Table structure for table `dd_payment`
--

CREATE TABLE IF NOT EXISTS `dd_payment` (
  `ddno` varchar(30) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `sum` int(11) NOT NULL,
  `bank_name` text NOT NULL,
  `dd_date` date NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ddno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dd_payment`
--

INSERT INTO `dd_payment` (`ddno`, `regno`, `sum`, `bank_name`, `dd_date`, `paid_status`) VALUES
('123', '12nmh', 25000, 'abc bank', '2015-07-04', 1),
('142546', '12mse0363', 1, 'indian bank', '2015-07-11', 1),
('432', '12nmh', 1, 'dfs', '2015-07-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `filled_seats` int(11) NOT NULL DEFAULT '0',
  `total_ext` int(11) NOT NULL,
  `filled_ext` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  `min` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `total_ext`, `filled_ext`, `team`, `min`, `max`, `type`) VALUES
(11, 'MUN', 20, 100, 0, 20, 7, 0, 3, 4, 1),
(12, 'Robotics', 1, 100, 0, 30, 6, 2, 0, 0, 0),
(13, 'Online Photography', 1, 100, 0, 10, 0, 0, 2, 3, 3),
(14, 'Brain Wave', 1, 100, 0, 30, 0, 0, 1, 5, 4),
(15, 'Combo 1', 1500, 100, 0, 10, 0, 1, 0, 0, 5),
(16, 'XYZ', 1, 100, 0, 100, 2, 1, 0, 0, 0),
(17, 'Combo 2', 1000, 100, 0, 100, 0, 1, 0, 0, 5),
(18, 'Combo 3', 500, 100, 0, 100, 0, 1, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `external_participants`
--

CREATE TABLE IF NOT EXISTS `external_participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `regno` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `college` text NOT NULL,
  `phno` bigint(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `vitref` int(11) NOT NULL,
  `clgref` int(11) NOT NULL,
  `acc_details` int(11) NOT NULL DEFAULT '0',
  `pword` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `regno` (`regno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `external_participants`
--

INSERT INTO `external_participants` (`id`, `name`, `regno`, `gender`, `college`, `phno`, `email`, `vitref`, `clgref`, `acc_details`, `pword`) VALUES
(1, 'S. Rajalakshmi', '12mse0363', 'female', 'VIT', 9500095982, 'shamhavi110@gmail.com', 123, 123, 1, '1'),
(15, 'Rajalakshmi', '12MSE0021', 'female', 'MIT', 9500095982, 'shambhavi110@gmail.com', 1001, 2001, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `external_registration`
--

CREATE TABLE IF NOT EXISTS `external_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `dd` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `external_registration`
--

INSERT INTO `external_registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id`, `paid_status`, `date`) VALUES
(1001, '12nmh', 11, 4, 25000, 123, 0, 1, '2015-07-20'),
(1002, '12nmh', 12, 2, 1, 0, 58, 0, '2015-07-23'),
(1003, '12mse0363', 12, 2, 1, 142546, 0, 1, '2015-07-24'),
(1004, '12mse0363', 16, 1, 1, 0, 59, 0, '2015-07-24'),
(1005, '12MSE0021', 16, 1, 1, 0, 60, 0, '2015-07-25');

-- --------------------------------------------------------

--
-- Table structure for table `internal_participants`
--

CREATE TABLE IF NOT EXISTS `internal_participants` (
  `regno` varchar(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phno` int(10) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internal_participants`
--

INSERT INTO `internal_participants` (`regno`, `name`, `phno`, `email`) VALUES
('12mse0363', 'rajalakshmi', 123456789, 'shambhavi110@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `internal_registration`
--

CREATE TABLE IF NOT EXISTS `internal_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` varchar(9) NOT NULL,
  `event_id` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`regno`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_cms`
--

CREATE TABLE IF NOT EXISTS `login_cms` (
  `regno` varchar(9) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_cms`
--

INSERT INTO `login_cms` (`regno`, `password`) VALUES
('12mse0363', '123');

-- --------------------------------------------------------

--
-- Table structure for table `login_internals`
--

CREATE TABLE IF NOT EXISTS `login_internals` (
  `regno` varchar(9) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_internals`
--

INSERT INTO `login_internals` (`regno`, `password`) VALUES
('12mse0363', '123');

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE IF NOT EXISTS `online_payment` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` text NOT NULL,
  `sum` text NOT NULL,
  `date` date NOT NULL,
  `tpslid` varchar(100) DEFAULT NULL,
  `bankrefno` varchar(100) DEFAULT NULL,
  `txndate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  `progress_level` varchar(30) NOT NULL DEFAULT 'Waiting',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`, `date`, `tpslid`, `bankrefno`, `txndate`, `status`, `paid_status`, `progress_level`) VALUES
(59, '12mse0363', '1', '2015-07-24', NULL, NULL, NULL, NULL, 0, 'Waiting'),
(60, '12MSE0021', '1', '2015-07-25', NULL, NULL, NULL, NULL, 0, 'Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `vit_ambassador`
--

CREATE TABLE IF NOT EXISTS `vit_ambassador` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vit_ambassador`
--

INSERT INTO `vit_ambassador` (`id`, `name`) VALUES
(1001, 'Rajalakshmi. S'),
(1002, 'Chaitanya T'),
(1003, 'Aiswarya Anand'),
(1004, 'Nivetha Venkat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
