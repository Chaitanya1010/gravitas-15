-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 10:17 AM
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
(0, 'combo1', 1000, 100, 0, 1, 0, 0, 5),
(1, 'caption me', 100, 50, 11, 1, 0, 0, 1),
(3, 'ahhfd', 123, 123, 43, 0, 4, 6, 0),
(4, 'combo2', 500, 100, 4, 1, 0, 0, 5);

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
(1, '', '', '', '', 0, 'as', 0, 0, 0),
(2, 'rajalakshmi', '12mse0363', 'female', 'VIT', 1238927839, 'shambhavi@gmail.com', 345, 123, 1),
(5, 'Rajalakshmi', '12mse0363', 'female', 'VIT', 2147483647, 'shambhavi110@gmail.com', 345, 123, 1),
(6, 'Rajalakshmi', '12mse0363', 'female', 'VIT', 1231231312, 'leela196@gmail.com', 346, 123, 1),
(7, 'Rajalakshmi', '12mse0363', 'female', 'VIT', 1233123131, 'shambhavi10@gmail.com', 345, 123, 1),
(8, 'Rajalakshmi', '12mse0363', 'female', 'MIT', 2147483647, 'nivivenkat31@gmail.com', 345, 124, 1),
(9, 'Rajalakshmi', '12mse0363', 'male', 'VIT', 2147483647, 'shamhavi110@gmail.com', 345, 123, 1),
(12, 'Rajalakshmi', '12mse0363', 'male', 'VIT', 2147483647, 'shamhavi11@gmail.com', 345, 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE IF NOT EXISTS `online_payment` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` text NOT NULL,
  `sum` text NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `online_payment`
--

INSERT INTO `online_payment` (`trans_id`, `regno`, `sum`) VALUES
(1, '$regno', ''),
(2, '12nmh', '1123'),
(3, '12nmh', '223'),
(4, '12nmh', '100'),
(5, '12nmh', '123'),
(6, '12nmh', '123'),
(7, '12nmh', '123'),
(8, '12nmh', '123'),
(9, '12nmh', '123'),
(10, '12nmh', '123'),
(11, '12nmh', '123'),
(12, '12nmh', '100'),
(13, '12nmh', '100'),
(14, '12nmh', '100'),
(15, '12nmh', '123'),
(16, '12nmh', '600'),
(17, '12nmh', '100'),
(18, '12nmh', '500'),
(19, '12nmh', '500'),
(20, '12nmh', '500');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id`, `paid_status`) VALUES
(1, '12nmh', 1, 1, 100, 0, 16, 0),
(2, '12nmh', 4, 1, 500, 0, 16, 0),
(3, '12nmh', 1, 1, 100, 0, 17, 0),
(4, '12nmh', 4, 1, 500, 0, 18, 0),
(5, '12nmh', 4, 1, 500, 0, 19, 0),
(6, '12nmh', 4, 1, 500, 0, 20, 0);

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
