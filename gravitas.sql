-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2015 at 12:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas`
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
('123', '12nmh', 166, 'assd', '2015-07-09', 1),
('234', '12nmh', 1000, 'asd', '2015-07-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `total_seats` int(11) NOT NULL,
  `filled_seats` int(11) NOT NULL DEFAULT '0',
  `team` int(11) NOT NULL DEFAULT '0',
  `min` int(11) NOT NULL DEFAULT '0',
  `max` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `team`, `min`, `max`, `type`) VALUES
(0, 'combo1', 1000, 100, 7, 1, 0, 0, 5),
(1, 'caption me', 100, 50, 46, 1, 0, 0, 1),
(3, 'Online Photography', 1, 123, 120, 0, 4, 6, 0),
(4, 'combo2', 500, 100, 7, 1, 0, 0, 5),
(5, 'Combo 3 ', 79, 78, 2, 1, 0, 0, 5),
(6, 'Robotics', 66, 66, 12, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `external_participants`
--

CREATE TABLE IF NOT EXISTS `external_participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `external_participants`
--

INSERT INTO `external_participants` (`id`, `name`, `regno`, `gender`, `college`, `phno`, `email`, `vitref`, `clgref`, `acc_details`) VALUES
(7, 'Rajalakshmi', '12nmh', 'female', 'VIT', 1233123131, 'shambhavi10@gmail.com', 345, 123, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`, `date`, `paid_status`) VALUES
(29, '12nmh', '123', '2015-07-16', 0),
(30, '12nmh', '100', '2015-07-16', 0),
(31, '12nmh', '100', '2015-07-16', 0),
(32, '12nmh', '100', '2015-07-16', 0),
(33, '12nmh', '100', '2015-07-16', 0),
(34, '12nmh', '100', '2015-07-16', 0),
(35, '12nmh', '100', '2015-07-16', 0),
(36, '12nmh', '100', '2015-07-16', 0),
(37, '12nmh', '100', '2015-07-16', 0),
(38, '12nmh', '100', '2015-07-16', 0),
(39, '12nmh', '100', '2015-07-16', 0),
(40, '12nmh', '100', '2015-07-16', 0),
(41, '12nmh', '100', '2015-07-16', 0),
(42, '12nmh', '100', '2015-07-16', 0),
(43, '12nmh', '100', '2015-07-16', 0),
(44, '12nmh', '1000', '2015-07-16', 0),
(45, '12nmh', '123', '2015-07-16', 0),
(46, '12nmh', '500', '2015-07-16', 0),
(47, '12nmh', '123', '2015-07-16', 0),
(48, '12nmh', '123', '2015-07-16', 0),
(49, '12nmh', '1', '2015-07-16', 0),
(50, '12nmh', '100', '2015-07-16', 0),
(51, '12nmh', '1', '2015-07-16', 0),
(52, '12nmh', '66', '2015-07-17', 0),
(53, '12nmh', '1', '2015-07-17', 0),
(54, '12nmh', '1', '2015-07-17', 0),
(55, '12nmh', '1000', '2015-07-18', 0),
(56, '12nmh', '1000', '2015-07-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id`, `paid_status`, `date`) VALUES
(74, '12nmh', 1, 1, 100, 123, 0, 1, '2015-07-19'),
(75, '12nmh', 6, 2, 66, 123, 0, 1, '2015-07-19'),
(76, '12nmh', 0, 1, 1000, 234, 0, 1, '2015-07-19');

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
