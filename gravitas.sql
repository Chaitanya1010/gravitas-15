-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2015 at 07:17 PM
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
(1, 'caption me', 100, 50, 8, 1, 0, 0, 1),
(2, 'premium', 1000, 50, 5, 2, 0, 0, 0),
(3, 'ahhfd', 123, 123, 43, 0, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE IF NOT EXISTS `online_payment` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `regno` text NOT NULL,
  `sum` text NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(15, '12nmh', '123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `regno`, `event_id`, `team`, `price`, `dd`, `trans_id`, `paid_status`) VALUES
(1, '$regno', -1, -1, 1, 1, 0, 0),
(2, '', 1, 1, 100, 123123, 0, 0),
(3, '12nmh', 3, 5, 123, 76827637, 0, 0),
(4, '12nmh', 2, 2, 1000, 76827637, 0, 0),
(5, '12nmh', 1, 1, 100, 7676, 0, 0),
(6, '12nmh', 2, 2, 1000, 7676, 0, 0),
(7, '12nmh', 1, 1, 100, 0, 0, 0),
(8, '12nmh', 3, 4, 123, 0, 2, 0),
(9, '12nmh', 2, 2, 1000, 0, 2, 0),
(10, '12nmh', 1, 1, 100, 0, 3, 0),
(11, '12nmh', 3, 6, 123, 0, 3, 0),
(12, '12nmh', 1, 1, 100, 0, 4, 0),
(13, '12nmh', 3, 4, 123, 0, 5, 0),
(14, '12nmh', 3, 4, 123, 0, 6, 0),
(15, '12nmh', 3, 4, 123, 0, 7, 0),
(16, '12nmh', 3, 4, 123, 0, 8, 0),
(17, '12nmh', 3, 4, 123, 0, 9, 0),
(18, '12nmh', 3, 4, 123, 0, 10, 0),
(19, '12nmh', 3, 4, 123, 0, 11, 0),
(20, '12nmh', 1, 1, 100, 0, 12, 0),
(21, '12nmh', 1, 1, 100, 0, 13, 0),
(22, '12nmh', 1, 1, 100, 0, 14, 0),
(23, '12nmh', 3, 4, 123, 0, 15, 0);

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
