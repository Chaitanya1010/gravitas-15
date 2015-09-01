-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 11:26 PM
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
(1, 'Default Value');

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

CREATE TABLE IF NOT EXISTS `combos` (
  `reg_id` int(11) NOT NULL,
  `1` int(11) NOT NULL,
  `2` int(11) NOT NULL,
  `3` int(11) NOT NULL,
  `4` int(11) NOT NULL,
  `5` int(11) NOT NULL,
  `6` int(11) NOT NULL,
  `7` int(11) NOT NULL,
  `8` int(11) NOT NULL,
  `9` int(11) NOT NULL,
  `10` int(11) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combos`
--

INSERT INTO `combos` (`reg_id`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`) VALUES
(16, 2123, 2124, 2125, 2145, 2146, 2147, 2148, 2149, 2150, 2151),
(19, 2121, 2122, 2123, 2139, 2140, 2141, 2142, 2143, 2144, 2145),
(23, 2122, 2123, 2124, 2128, 2129, 2130, 2131, 2132, 2133, 2134);

-- --------------------------------------------------------

--
-- Table structure for table `dd_payment`
--

CREATE TABLE IF NOT EXISTS `dd_payment` (
  `ddno` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `sum` int(11) NOT NULL,
  `bank_name` text NOT NULL,
  `dd_date` date NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ddno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2174 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `total_ext`, `filled_ext`, `team`, `min`, `max`, `type`) VALUES
(2000, 'Code to create', 400, 450, 25, 50, 0, 5, 0, 0, 0),
(2001, 'Gameathon-DOTA 2', 1000, 150, 5, 60, 0, 5, 0, 0, 0),
(2002, 'Gameathon-COD', 1000, 250, 0, 75, 0, 5, 0, 0, 0),
(2003, 'Gameathon-CS', 1000, 250, 0, 75, 0, 5, 0, 0, 0),
(2004, 'Gameathon-AOE', 400, 80, 0, 16, 0, 2, 0, 0, 0),
(2005, 'Gameathon-FIFA', 150, 250, 0, 50, 0, 1, 0, 0, 0),
(2006, 'Gameathon-NFS', 150, 200, 0, 20, 0, 1, 0, 0, 0),
(2007, 'Aerodominator ', 1500, 50, 0, 150, 0, 5, 0, 0, 0),
(2008, 'COOK OFF', 100, 450, 0, 50, 0, 1, 0, 0, 0),
(2009, 'Code-a-Thon', 200, 450, 0, 50, 0, 1, 0, 0, 0),
(2010, 'Merchantry', 750, 180, 0, 20, 0, 5, 0, 0, 0),
(2011, 'The Ultimate Engineer', 100, 250, 0, 50, 0, 1, 0, 0, 0),
(2012, 'FUTUREPRENEURS', 300, 170, 0, 10, 0, 2, 0, 0, 0),
(2013, 'START UP STREET', 500, 450, 0, 250, 0, 1, 0, 0, 0),
(2014, 'Gravitas Quiz Series', 200, 350, 0, 50, 0, 2, 0, 0, 0),
(2015, 'Lanka Reloaded ', 300, 180, 6, 60, 0, 3, 0, 0, 2),
(2016, 'Cric-o-bot ', 100, 99, 0, 51, 0, 3, 0, 0, 2),
(2017, 'RoboGP', 500, 400, 5, 100, 0, 5, 0, 0, 2),
(2018, 'AquaBot', 300, 150, 0, 50, 0, 2, 0, 0, 2),
(2019, 'Dimensions', 300, 255, 0, 45, 0, 3, 0, 0, 2),
(2020, 'Magneto(with Bot)', 300, 60, 0, 30, 0, 3, 0, 0, 2),
(2021, 'RoboMaze', 400, 160, 0, 40, 0, 4, 0, 0, 2),
(2022, 'Bug Tracker', 100, 150, 0, 50, 0, 2, 0, 0, 2),
(2023, 'C Tycoon ', 100, 200, 0, 40, 0, 2, 0, 0, 2),
(2024, 'Code Scrooge', 100, 150, 0, 20, 0, 1, 0, 0, 2),
(2025, 'Code-o-poly', 100, 140, 0, 20, 0, 2, 0, 0, 2),
(2026, 'Code Relay', 100, 80, 0, 20, 0, 1, 0, 0, 2),
(2027, 'Crack Jack ', 100, 190, 0, 10, 0, 2, 0, 0, 2),
(2028, 'FTP Maze ', 100, 170, 0, 30, 0, 1, 0, 0, 2),
(2029, 'Game of Codes', 100, 120, 0, 30, 0, 1, 0, 0, 2),
(2030, 'Jumble Coding ', 100, 170, 0, 30, 0, 1, 0, 0, 2),
(2031, 'Polyglot', 100, 90, 0, 10, 0, 2, 0, 0, 2),
(2032, 'Sudo-code', 100, 80, 0, 20, 0, 1, 0, 0, 2),
(2033, 'Virtual Getaway', 100, 120, 0, 20, 0, 2, 0, 0, 2),
(2034, 'Chem-E-Clock', 400, 80, 0, 40, 0, 4, 0, 0, 2),
(2035, 'Chem-E-Car', 300, 45, 0, 15, 0, 3, 0, 0, 2),
(2036, 'Apollo Infinite ', 500, 80, 0, 100, 0, 5, 0, 0, 2),
(2037, 'Aquanaut ', 150, 150, 0, 0, 0, 3, 0, 0, 2),
(2038, 'Bucket Chute ', 150, 300, 0, 0, 0, 3, 0, 0, 2),
(2039, 'CADPRO ', 200, 135, 0, 15, 0, 2, 0, 0, 2),
(2040, 'Chain Reaction ', 200, 80, 0, 20, 0, 2, 0, 0, 2),
(2041, 'Chem-o-Matics  ', 100, 60, 0, 40, 0, 2, 0, 0, 2),
(2042, 'Craft Racing ', 100, 80, 0, 10, 0, 2, 0, 0, 2),
(2043, 'Gear Up ', 100, 160, 0, 40, 0, 2, 0, 0, 2),
(2044, 'Hydranoid Ascent ', 100, 160, 0, 40, 0, 2, 0, 0, 2),
(2045, 'Interstellar', 100, 75, 0, 5, 0, 2, 0, 0, 2),
(2046, 'Catapult ', 150, 120, 0, 30, 0, 3, 0, 0, 2),
(2047, 'Mech-a-niser', 200, 70, 0, 80, 0, 2, 0, 0, 2),
(2048, 'Reverse Engineering', 100, 130, 0, 0, 0, 2, 0, 0, 2),
(2049, 'Roller Coaster ', 150, 120, 0, 10, 0, 3, 0, 0, 2),
(2050, 'The Self made Engineer', 200, 130, 0, 20, 0, 2, 0, 0, 2),
(2051, 'Swing-O-Golf', 150, 150, 0, 0, 0, 3, 0, 0, 2),
(2052, 'Maze hustle', 150, 180, 0, 0, 0, 3, 0, 0, 2),
(2053, 'Contraptions', 250, 60, 0, 40, 0, 5, 0, 0, 2),
(2054, 'Master of Morse Decoding', 100, 120, 0, 0, 0, 2, 0, 0, 2),
(2055, 'Bull Street Strategist', 100, 120, 2, 30, 0, 2, 0, 0, 3),
(2056, 'Magnas ', 100, 90, 0, 15, 0, 3, 0, 0, 3),
(2057, 'Management Guru ', 100, 80, 0, 20, 0, 1, 0, 0, 3),
(2058, 'OP-ERA', 150, 90, 0, 30, 0, 2, 0, 0, 3),
(2059, 'The Last Second', 100, 120, 0, 0, 0, 2, 0, 0, 3),
(2060, 'House of Brands', 200, 90, 0, 10, 0, 2, 0, 0, 3),
(2061, 'Vyapaar Mantra', 100, 100, 0, 20, 0, 2, 0, 0, 3),
(2062, 'BattleField ', 100, 120, 0, 0, 0, 2, 0, 0, 4),
(2063, 'Battlefield Scientifica', 100, 80, 0, 0, 0, 1, 0, 0, 4),
(2064, 'BEYBLADE', 50, 200, 0, 50, 0, 1, 0, 0, 4),
(2065, 'Caption Me!', 100, 120, 0, 0, 0, 2, 0, 0, 4),
(2066, 'Desi Safari ', 100, 150, 0, 50, 0, 1, 0, 0, 4),
(2067, 'Dynasty ', 100, 50, 0, 20, 0, 2, 0, 0, 4),
(2068, 'Faking News', 100, 60, 2, 20, 0, 2, 0, 0, 4),
(2069, 'Forensics', 50, 100, 0, 10, 0, 1, 0, 0, 4),
(2070, 'Junkyard Genius ', 100, 100, 0, 80, 0, 2, 0, 0, 4),
(2071, 'One Hundred Forty', 100, 150, 0, 50, 0, 1, 0, 0, 4),
(2072, 'R.O.A.R. : Reach out act respond', 0, 200, 0, 50, 0, 1, 0, 0, 4),
(2073, 'SNOOK ball', 50, 800, 0, 100, 0, 1, 0, 0, 4),
(2074, 'Suits', 100, 80, 0, 40, 0, 2, 0, 0, 4),
(2075, 'Switches', 50, 60, 0, 10, 0, 1, 0, 0, 4),
(2076, 'Trekker Ingredients', 50, 150, 0, 50, 0, 1, 0, 0, 4),
(2077, 'Visionmania', 100, 70, 0, 30, 0, 1, 0, 0, 4),
(2078, 'PAC-WAY', 150, 350, 0, 50, 0, 1, 0, 0, 4),
(2079, 'The Amazing Race', 100, 300, 0, 0, 0, 2, 0, 0, 4),
(2080, 'Dark Race', 0, 0, 0, 0, 0, 1, 0, 0, 4),
(2081, 'Hassle Free City', 150, 280, 0, 40, 0, 4, 0, 0, 2),
(2082, 'Bitzer', 100, 240, 0, 30, 0, 3, 0, 0, 2),
(2083, 'Brick Up', 150, 120, 0, 30, 0, 3, 0, 0, 2),
(2084, 'Krazy Bridge', 100, 100, 0, 20, 0, 2, 0, 0, 2),
(2085, 'City Tycoon ', 100, 140, 0, 40, 0, 2, 0, 0, 2),
(2086, 'Clash of Clans', 200, 320, 0, 80, 0, 4, 0, 0, 2),
(2087, 'Connectify', 150, 210, 0, 30, 0, 3, 0, 0, 2),
(2088, 'Crane-o-logy', 150, 140, 0, 0, 0, 2, 0, 0, 2),
(2089, 'Zenith', 150, 120, 0, 30, 0, 3, 0, 0, 2),
(2090, 'Equilibre', 200, 200, 0, 40, 0, 40, 0, 0, 2),
(2091, 'Cranamonia', 100, 240, 0, 230, 0, 3, 0, 0, 2),
(2092, 'Jenga Reloaded', 50, 200, 0, 250, 0, 1, 0, 0, 2),
(2093, 'Maglev ', 150, 210, 0, 60, 0, 3, 0, 0, 2),
(2094, 'Minify', 100, 120, 0, 40, 0, 2, 0, 0, 2),
(2095, 'Popstick-o-fest', 150, 120, 0, 40, 0, 2, 0, 0, 2),
(2096, 'The Discoverer', 100, 120, 0, 40, 0, 2, 0, 0, 2),
(2097, 'THE TRAFFIC-KING', 100, 160, 0, 40, 0, 2, 0, 0, 2),
(2098, 'TILTATORRE', 100, 270, 0, 30, 0, 3, 0, 0, 2),
(2099, 'Build 2 Destroy', 100, 240, 0, 60, 0, 2, 0, 0, 2),
(2100, 'Via Ropes', 150, 120, 0, 10, 0, 2, 0, 0, 2),
(2101, 'Suspendo', 150, 195, 0, 45, 0, 3, 0, 0, 2),
(2102, 'LabVIEW Genius', 100, 100, 0, 20, 0, 1, 0, 0, 2),
(2103, 'Impedance', 100, 150, 0, 20, 0, 2, 0, 0, 2),
(2104, 'Scrapper', 100, 120, 0, 0, 0, 2, 0, 0, 2),
(2105, 'Electricity', 100, 75, 0, 5, 0, 2, 0, 0, 2),
(2106, 'Greatest Heist', 100, 100, 0, 20, 0, 2, 0, 0, 2),
(2107, 'Circuitrix', 50, 90, 0, 10, 0, 1, 0, 0, 2),
(2108, 'Nuclear Plasma Component Design', 100, 40, 0, 10, 0, 2, 0, 0, 2),
(2109, 'Electropedia', 100, 170, 0, 30, 0, 2, 0, 0, 2),
(2110, 'graVITas Guess Challenge', 0, 100, 0, 50, 0, 1, 0, 0, 2),
(2111, 'String Theory ', 50, 60, 0, 0, 0, 1, 0, 0, 2),
(2112, 'Meme Wars', 0, 130, 0, 20, 0, 1, 0, 0, 2),
(2113, 'graVITas Premier League ', 0, 1300, 0, 300, 0, 1, 0, 0, 2),
(2114, 'Wolf of Wall Street', 100, 100, 0, 0, 0, 1, 0, 0, 2),
(2115, 'Biowizard ', 100, 100, 0, 20, 0, 2, 0, 0, 2),
(2116, 'Grey House Theory', 100, 60, 0, 60, 0, 2, 0, 0, 2),
(2117, 'True Detective', 100, 50, 0, 20, 0, 2, 0, 0, 2),
(2118, 'Bio Warfare', 150, 80, 0, 20, 0, 2, 0, 0, 2),
(2119, '3D Maya Workshop', 100, 100, 1, 20, 0, 1, 0, 0, 1),
(2120, '3-D Printing', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2121, 'Aero Modeling Workshop', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2122, 'Antenna Design', 100, 90, 2, 10, 0, 2, 0, 0, 1),
(2123, 'Automotive workshop', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2124, 'Big Data Analysis', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2125, 'Bionic proE', 100, 80, 1, 20, 0, 1, 0, 0, 1),
(2126, 'Brandwagon', 200, 120, 0, 30, 0, 1, 0, 0, 1),
(2127, 'CAD modelling workshop', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2128, 'Cloud Computing', 600, 150, 0, 20, 0, 1, 0, 0, 1),
(2129, 'Comic Designing Workshop', 200, 100, 0, 20, 0, 1, 0, 0, 1),
(2130, 'Forensic and the Science of Deduction', 500, 160, 0, 40, 0, 1, 0, 0, 1),
(2131, 'Idea Pitching', 100, 90, 0, 10, 0, 1, 0, 0, 1),
(2132, 'Invent-o-pi', 4400, 120, 0, 20, 0, 4, 0, 0, 1),
(2133, 'Robotix Workshop', 4000, 720, 0, 80, 0, 4, 0, 0, 1),
(2134, 'Mozilla Firefox OS App Days ', 300, 200, 0, 50, 0, 1, 0, 0, 1),
(2135, 'Phone Gap ', 100, 110, 0, 20, 0, 1, 0, 0, 1),
(2136, 'Python and Google App Engine for the Beginner Developer', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2137, 'Sensored', 2400, 140, 0, 20, 0, 4, 0, 0, 1),
(2138, 'SFX Workshop', 100, 80, 0, 10, 0, 1, 0, 0, 1),
(2139, 'Star Party', 200, 130, 0, 20, 0, 1, 0, 0, 1),
(2140, 'Stockgyaan', 200, 180, 0, 20, 0, 1, 0, 0, 1),
(2141, 'Studio To Stage', 100, 130, 0, 20, 0, 1, 0, 0, 1),
(2142, 'THE iOS FUSION', 300, 200, 0, 50, 0, 1, 0, 0, 1),
(2143, 'The Ultimate Designer', 300, 200, 0, 50, 0, 1, 0, 0, 1),
(2144, 'Under The Hood', 100, 300, 0, 50, 0, 2, 0, 0, 1),
(2145, 'Artificial Intelligence', 0, 80, 0, 20, 0, 1, 0, 0, 1),
(2146, 'Augmented Reality', 500, 130, 0, 20, 0, 1, 0, 0, 1),
(2147, 'CRYPTORAMA', 0, 70, 0, 10, 0, 1, 0, 0, 1),
(2148, 'IOT', 500, 110, 0, 30, 0, 1, 0, 0, 1),
(2149, 'Introduction to Web Development', 200, 100, 0, 20, 0, 1, 0, 0, 1),
(2150, 'Animatronic Hand Workshop', 7000, 135, 0, 25, 0, 5, 0, 0, 1),
(2151, 'Gesture controlled Robotics Workshop', 6000, 135, 0, 25, 0, 5, 0, 0, 1),
(2152, 'SAP 2000', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2153, 'CellTech (Do it yourself)', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2154, 'Design Engineering workshop', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2155, 'How to claim your IP', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2156, 'Unravel your creativity', 0, 0, 0, 0, 0, 1, 0, 0, 1),
(2157, 'Engineers The Tooners', 100, 80, 0, 20, 0, 2, 0, 0, 4),
(2158, 'Fact or Fiction', 100, 0, 0, 50, 0, 2, 0, 0, 4),
(2159, 'Minute To Win IT', 100, 100, 0, 100, 0, 2, 0, 0, 4),
(2160, 'Quiz Relay', 0, 0, 0, 0, 0, 1, 0, 0, 4),
(2161, 'All About VIT', 100, 80, 0, 0, 0, 2, 0, 0, 4),
(2162, 'Day 1 - 25th September', 200, 0, 0, 3000, 0, 1, 0, 0, 6),
(2163, 'Day 2 - 28th September', 200, 0, 0, 3000, 0, 1, 0, 0, 6),
(2164, 'Day 3 - 29th September', 200, 0, 0, 3000, 0, 1, 0, 0, 6),
(2165, 'Combo 1', 1000, 500, 4, 500, 0, 1, 0, 0, 5),
(2166, 'Combo 2', 1500, 500, 0, 500, 0, 1, 0, 0, 5),
(2167, 'Combo 3', 2000, 500, 1, 500, 0, 1, 0, 0, 5),
(2168, 'Combo 4', 3000, 500, 1, 500, 0, 1, 0, 0, 5),
(2169, 'Combo 5', 5000, 500, 1, 300, 0, 1, 0, 0, 5),
(2170, 'VIT Rubik''s Cube Challenge', 50, 10, 0, 140, 0, 1, 0, 0, 0),
(2171, 'VIT Auto Expo', 200, 2800, 0, 200, 0, 1, 0, 0, 0),
(2172, 'RoboWars''15', 300, 180, 0, 60, 0, 3, 0, 0, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10000 ;

-- --------------------------------------------------------

--
-- Table structure for table `external_registration`
--

CREATE TABLE IF NOT EXISTS `external_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `event_id` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `dd` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300000 ;

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
  `time` time NOT NULL,
  `rrno` varchar(20) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `cord_login` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `internal_registration`
--

INSERT INTO `internal_registration` (`id`, `regno`, `event_id`, `team`, `price`, `date`, `time`, `rrno`, `phno`, `cord_login`) VALUES
(14, '12mse0363', 2015, 3, 900, '2015-08-04', '02:17:11', '57868768', '2390849830', '12mse0363'),
(15, '12mse0363', 2017, 5, 2500, '2015-08-04', '02:17:11', '57868768', '2390849830', '12mse0363'),
(16, '12mse0363', 2165, 1, 1000, '2015-08-04', '02:17:11', '57868768', '2390849830', '12mse0363'),
(17, '12mse0363', 2168, 1, 3000, '2015-08-04', '02:17:11', '57868768', '2390849830', '12mse0363'),
(18, '12mse0363', 2000, 5, 2000, '2015-08-04', '02:21:26', '123', '1287189028', '12mse0363'),
(19, '12mse0363', 2169, 1, 5000, '2015-08-04', '02:21:26', '123', '1287189028', '12mse0363'),
(20, '12mse0363', 2001, 5, 5000, '2015-08-04', '02:21:57', 'cash', '1298839284', '12mse0363'),
(21, '12sey3682', 2000, 5, 2000, '2015-08-04', '02:23:38', 'cash', '2348930948', '12mse0363'),
(22, '12mse0021', 2000, 5, 2000, '2015-08-04', '02:24:26', '3424', '1238928109', '12mse0363'),
(23, '12mse0021', 2165, 1, 1000, '2015-08-04', '02:25:51', 'cash', '1239928103', '12mse0363');

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
('12mse0363', '1');

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
('12mse0363', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50000 ;

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
(1, 'Default Value');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
