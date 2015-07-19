-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2015 at 08:39 PM
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
(123, 'abc'),
(124, 'sda');

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
('123', '12nmh', 25000, 'abc bank', '2015-07-04', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `total_ext`, `filled_ext`, `team`, `min`, `max`, `type`) VALUES
(11, 'Nivi Event', 25000, 100, 0, 20, 7, 0, 3, 4, 1),
(12, 'Robotics', 1, 100, 0, 30, 2, 2, 0, 0, 0),
(13, 'Online Photography', 1, 100, 0, 2, 0, 0, 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `external_participants`
--

CREATE TABLE IF NOT EXISTS `external_participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(75) NOT NULL,
  `name` text NOT NULL,
  `regno` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `college` text NOT NULL,
  `phno` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `vitref` int(11) NOT NULL,
  `clgref` int(11) NOT NULL,
  `acc_details` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `fb_id` (`fb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `external_participants`
--

INSERT INTO `external_participants` (`id`, `fb_id`, `name`, `regno`, `gender`, `college`, `phno`, `email`, `vitref`, `clgref`, `acc_details`) VALUES
(7, '12334', 'Rajalakshmi', '12nmh', 'female', 'VIT', 1233123131, 'shambhavi10@gmail.com', 345, 123, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1003 ;

--
-- Dumping data for table `external_registration`
--

INSERT INTO `external_registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id`, `paid_status`, `date`) VALUES
(1001, '12nmh', 11, 4, 25000, 123, 0, 1, '2015-07-20'),
(1002, '12nmh', 12, 2, 1, 0, 57, 1, '2015-07-20');

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
('12mse0363', '234');

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE IF NOT EXISTS `online_payment` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` text NOT NULL,
  `sum` text NOT NULL,
  `date` date NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`, `date`, `paid_status`) VALUES
(57, '12nmh', '1', '2015-07-20', 1);

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
(345, 'lorem'),
(346, 'ipsum');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
