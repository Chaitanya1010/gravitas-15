-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2015 at 04:43 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `name` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `mode` int(2) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`name`, `pass`, `mode`) VALUES
('add_1', 'add_1', 0),
('app_1', 'app_1', 1),
('app_2', 'app_2', 2),
('app_3', 'app_3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `basic_expenditure_info`
--

CREATE TABLE IF NOT EXISTS `basic_expenditure_info` (
  `unique_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `name_person` varchar(30) NOT NULL,
  `purpose_expenditure` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `mode` int(2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`unique_id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `basic_expenditure_info`
--

INSERT INTO `basic_expenditure_info` (`unique_id`, `category`, `name_person`, `purpose_expenditure`, `amount`, `phno`, `mode`, `remarks`) VALUES
(1, 13, 'alsdc', 'lkmsd', '5000', '', 0, ''),
(2, 15, 'sdlm', 'pomsd', '5000', '', 0, ''),
(3, 16, 'hello', 'hi there ', '5000', '89745674567', 0, 'asjdcnlascdlaksndcadc'),
(4, 11, 'asdc', 'lkmsld', '5000', '68455464', 1, 'lskmclskcm'),
(5, 12, 'asdc_2', 'asd', '500', '54646464', 1, 'lsdmkclaskcmlsac'),
(6, 16, 'hi there', 'he;;o', '55500', '9092658797', 0, 'lkdsmlaskc'),
(7, 13, 'aslkc', 'ajsdc', '500', '6565164', 0, 'ksjdcksadcn'),
(8, 16, 'asdc', 'sacasc', '1500', '44545454', 0, 'askldmclaskmdlaskmc'),
(9, 16, 'Chaitu', 'portal', '5550', '5165651651', 0, 'sdckjnalksdcnaksjdcn sdjkc'),
(10, 17, 'new try', 'my purpose', '5000', '9092658797', 1, 'hi there'),
(11, 18, 'T-shirts', 'buying shirts', '5000', '9092658797', 1, 'laskdc sjc jndckajdc kjsadc'),
(12, 19, 'heri', 'ambassador', '9000', '9092658797', 1, 'lkdcmasc jsndc kjdcka scd jn'),
(13, 19, 'hey', 'hello', '600', '659797412', 0, 'aksjd akjdc kajsdc asc '),
(14, 20, 'wrkshp_1', 'teaching', '600', '98563210', 1, 'akshdc hasbdc jhbsdc sac'),
(15, 21, 'merits', 'thanksgiving', '600', '9092658797', 2, 'sajdc akjd ujasdc  asdcjasd cnas'),
(16, 22, 'misc', 'missssccc', '600', '9092658797', 3, 'ksdc  aklsdclas dcajsdcnas dc'),
(17, 22, 'sanmdc ', 'njdc', '600', '90926589', 2, 'alskjcn kjasc kjasc ');

-- --------------------------------------------------------

--
-- Table structure for table `basic_info`
--

CREATE TABLE IF NOT EXISTS `basic_info` (
  `unique_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `company_name` varchar(30) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `mode` int(2) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`unique_id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `basic_info`
--

INSERT INTO `basic_info` (`unique_id`, `category`, `event_name`, `company_name`, `amount`, `phno`, `email_id`, `mode`, `remarks`) VALUES
(1, 0, 'dddddd', 'fddddddd', '800', '6565165165', 'sdcasdc@saac.com', 1, 'sakjdcasc'),
(3, 0, 'asdcasdc', 'nnnnnnn', '800', '5165151651', 'asdcasdca@sdc.com', 3, 'sdcas'),
(4, 0, 'Caption Me', 'C.R.A.P', '500', '1234567890', 'asd@gmail.com', 0, 'qwekj'),
(5, 0, 'caption1 me', 'c.r.a.p.1', '8000', '9092658797', 'ascdasc@scas.com', 0, 'ascascalskdcmalsdcasdcascdalskmclaskmcasdc;alskmclaksmdclaksmcascksmcla'),
(6, 0, 'new EVENT try', 'TCS Kiran', '5000', '', '', 0, ''),
(7, 0, 'Mask', 'Jim Carry', '16320', '9092658797', 'teteasd@sd.com', 1, 'sdkjcnaskjnksjdcnaksjcn'),
(9, 0, 'again_1', 'sndujnsdcn', '500', '68454465456', 'sdcas@as.com', 0, 'sdclaskdckasjnc'),
(10, 0, 'again_2', 'tcs hiran', '5000', '5135151651', 'sdcascas@scd.com', 2, 'skjdcnakjscdkajsdckajscn'),
(12, 2, 'again_2', 'hari', '600', '9092789845', '', 0, '[object HTMLTextAreaElement]'),
(13, 2, 'food_1', 'fool_1', '5000', '9092658797', '', 0, '[object HTMLTextAreaElement]'),
(14, 2, 'yyyyy', 'zzzzz', '500', '416656', '', 1, 'lkmdclaskmlkmas'),
(15, 3, 'T shirt incharge', '2015-07-23', '800', '65651651651', '85', 0, 'alskmcalksmdclaksmdclkamsclm'),
(16, 3, 'T-shits_again', '2015-07-23', '500', '65651651', '85', 0, 'skmdclksmdclaksmclksmc'),
(17, 3, 'shirt sales', '2015-07-23', '890', '684651118', '6', 0, 'lkdmalskmdlksmdlaksmclksmdclskm'),
(18, 3, 'wrkshp_1', 'wrk_comp', '500', '565646468', 'lksdcalsk', 0, 'lskclaskmalsc'),
(19, 4, 'wrk_shp_1', 'wrkshp comp', '5000', '51351513515', 'sdcascasc@sfds.com', 0, 'jsdckajsdnlkasjdckjn'),
(20, 0, 'lakshmi', 'raje', '50000', '9500090982', 'akkjadnckajs@asc.com', 0, 'askjcnakscnkasjcnkdcn ksjndckajsndckajdc jsndckajnsdka kjnsdkajsdc jasndkjasdc jnaskdc asdckjnaksd cajsdcnkas dckjnsdcka sdchasd cajsndcas dcuaod caskudcks dcaishdc sdcoi aslic, sdciosdc a,sdcniasd caksidc laksc slkdcn'),
(21, 0, 'aksjc', 'lksmdclk', '5000', '515153151', 'sdcasdc@sd.com', 0, 'osaidiasjdclasicj'),
(22, 5, 'nivi', 'akka', '50000', '53311165165', 'asdcascda@sdc.com', 0, 'ksjdnciansdcksjcn'),
(23, 0, 'hello', 'hi there', '5000', '65465451', 'asdcasdc@sd.com', 0, 'reamarks '),
(24, 0, 'ddddd', 'dddddd', '5000', '51651651', 'sdcs@sd.com', 1, 'sdcascjascd ajsdnc'),
(25, 0, 'new perosn', 'kjsanc', '5000', '9092658797', 'ajsdcna@as.com', 0, 'sakjdnksjdnc skjdbcsk ujbsdc '),
(26, 0, 'joker', 'joker_1', '5000', '5454543543', 'sjbdhc@jsd.com', 0, 'asdmc kjsbdck kjbsdc '),
(27, 1, 'hey there', 'IIT hyderabad', '5000', '9092658797', '5', 0, 'ajs dc aksjdcas ckjsa c'),
(28, 0, '', '', '', '', '', 3, ''),
(29, 0, '', '', '', '', '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `data_externals`
--

CREATE TABLE IF NOT EXISTS `data_externals` (
  `unique_id_externals` int(11) NOT NULL AUTO_INCREMENT,
  `number_external` int(11) NOT NULL,
  `amount_external` int(11) NOT NULL,
  `update_ext_date` date NOT NULL,
  `update_ext_id` int(11) NOT NULL,
  `remarks_external` text NOT NULL,
  `approval_1` int(11) DEFAULT NULL,
  `approval_2` int(11) DEFAULT NULL,
  `approval_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`unique_id_externals`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `data_externals`
--

INSERT INTO `data_externals` (`unique_id_externals`, `number_external`, `amount_external`, `update_ext_date`, `update_ext_id`, `remarks_external`, `approval_1`, `approval_2`, `approval_3`) VALUES
(1, 0, 0, '0000-00-00', 0, '[object HTMLTextAreaElement]', 0, 0, 0),
(2, 201, 651651, '2015-07-21', 0, 'sadcascd', 0, 0, 0),
(3, 0, 0, '0000-00-00', 0, '', 0, 0, 0),
(4, 20, 60000, '2015-07-25', 0, 'jfvjf lksdclaks isancdlas iasndcas insdca inoasd', 0, 0, 0),
(5, 250, 6000, '2015-07-25', 500, 'alsndclsc sldnc;las ins;da', 0, 0, 0),
(6, 0, 0, '0000-00-00', 0, '', 0, 0, 0),
(7, 0, 0, '0000-00-00', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_internals`
--

CREATE TABLE IF NOT EXISTS `data_internals` (
  `unique_id_internals` int(11) NOT NULL AUTO_INCREMENT,
  `number_internal` int(11) NOT NULL,
  `amount_internal` int(11) NOT NULL,
  `update_int_date` date NOT NULL,
  `update_int_id` int(11) NOT NULL,
  `remarks_internal` text NOT NULL,
  `approval_1` int(11) DEFAULT NULL,
  `approval_2` int(11) DEFAULT NULL,
  `approval_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`unique_id_internals`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_internals`
--

INSERT INTO `data_internals` (`unique_id_internals`, `number_internal`, `amount_internal`, `update_int_date`, `update_int_id`, `remarks_internal`, `approval_1`, `approval_2`, `approval_3`) VALUES
(1, 500, 500, '2015-07-25', 220, 'kjca kjac nasdnca jnsd', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_prizes_money`
--

CREATE TABLE IF NOT EXISTS `event_prizes_money` (
  `unique_id_prize` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id_event` int(11) NOT NULL,
  `event_name_prize` varchar(30) NOT NULL,
  `prize_1` int(11) NOT NULL,
  `prize_2` int(11) NOT NULL,
  `prize_3` int(11) NOT NULL,
  PRIMARY KEY (`unique_id_prize`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_prizes_money`
--

INSERT INTO `event_prizes_money` (`unique_id_prize`, `unique_id_event`, `event_name_prize`, `prize_1`, `prize_2`, `prize_3`) VALUES
(1, 2, '', 2000, 200, 20),
(2, 8, '1', 500, 500, 500),
(3, 9, '1', 5000, 500, 50);

-- --------------------------------------------------------

--
-- Table structure for table `mode_cash`
--

CREATE TABLE IF NOT EXISTS `mode_cash` (
  `note_1` int(11) DEFAULT NULL,
  `note_2` int(11) DEFAULT NULL,
  `note_5` int(11) DEFAULT NULL,
  `note_10` int(11) DEFAULT NULL,
  `note_20` int(11) DEFAULT NULL,
  `note_50` int(11) DEFAULT NULL,
  `note_100` int(11) DEFAULT NULL,
  `note_500` int(11) DEFAULT NULL,
  `note_1000` int(11) DEFAULT NULL,
  `unique_id_note` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  `approval_1` int(2) DEFAULT NULL,
  `approval_2` int(2) DEFAULT NULL,
  `approval_3` int(2) DEFAULT NULL,
  PRIMARY KEY (`unique_id_note`),
  UNIQUE KEY `unique_id_note` (`unique_id_note`,`unique_id_basic`),
  UNIQUE KEY `unique_id_basic` (`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mode_cash`
--

INSERT INTO `mode_cash` (`note_1`, `note_2`, `note_5`, `note_10`, `note_20`, `note_50`, `note_100`, `note_500`, `note_1000`, `unique_id_note`, `category`, `unique_id_basic`, `approval_1`, `approval_2`, `approval_3`) VALUES
(0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 4, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 8, 2, 0, 5, 1, 1, 1),
(0, 0, 0, 0, 0, 0, 0, 2, 4, 3, 0, 6, 1, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 1, 0, 6, 0, 9, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 1, 1, 0, 7, 2, 12, 1, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 5, 8, 2, 13, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 3, 1, 0, 9, 3, 15, 1, 1, 1),
(0, 0, 0, 0, 0, 0, 5, 0, 0, 10, 3, 16, 0, 0, 0),
(0, 0, 0, 0, 2, 1, 8, 0, 0, 11, 3, 17, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 1, 0, 12, 3, 18, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 5, 13, 4, 19, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 2, 49, 14, 0, 20, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 5, 15, 0, 21, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 50, 16, 5, 22, 1, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 2, 4, 17, 0, 23, 1, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 5, 18, 0, 25, 1, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 2, 4, 19, 0, 26, 1, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 2, 4, 20, 1, 27, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mode_cash_expenditure`
--

CREATE TABLE IF NOT EXISTS `mode_cash_expenditure` (
  `note_1` int(11) DEFAULT NULL,
  `note_2` int(11) DEFAULT NULL,
  `note_5` int(11) DEFAULT NULL,
  `note_10` int(11) DEFAULT NULL,
  `note_20` int(11) DEFAULT NULL,
  `note_50` int(11) DEFAULT NULL,
  `note_100` int(11) DEFAULT NULL,
  `note_500` int(11) DEFAULT NULL,
  `note_1000` int(11) DEFAULT NULL,
  `unique_id_note` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  PRIMARY KEY (`unique_id_note`),
  UNIQUE KEY `unique_id_note` (`unique_id_note`,`unique_id_basic`),
  UNIQUE KEY `unique_id_basic` (`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mode_cash_expenditure`
--

INSERT INTO `mode_cash_expenditure` (`note_1`, `note_2`, `note_5`, `note_10`, `note_20`, `note_50`, `note_100`, `note_500`, `note_1000`, `unique_id_note`, `category`, `unique_id_basic`) VALUES
(20, 3, 4, 5, 20, 0, 0, 0, 2, 1, 5, 6),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 13, 0),
(0, 0, 0, 0, 0, 0, 0, 1, 0, 5, 13, 7),
(0, 0, 0, 0, 0, 0, 0, 1, 1, 6, 16, 8),
(0, 0, 0, 0, 0, 1, 0, 1, 5, 7, 16, 9),
(0, 0, 0, 0, 0, 0, 1, 1, 0, 8, 19, 13);

-- --------------------------------------------------------

--
-- Table structure for table `mode_cheque`
--

CREATE TABLE IF NOT EXISTS `mode_cheque` (
  `cheque_number` varchar(30) NOT NULL,
  `branch_name_chq` varchar(30) NOT NULL,
  `bank_name_chq` varchar(30) NOT NULL,
  `issue_date_chq` date NOT NULL,
  `unique_id_chq` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  `approval_1` int(2) DEFAULT NULL,
  `approval_2` int(2) DEFAULT NULL,
  `approval_3` int(2) DEFAULT NULL,
  PRIMARY KEY (`unique_id_chq`),
  UNIQUE KEY `unique_id_dd` (`unique_id_chq`,`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mode_cheque`
--

INSERT INTO `mode_cheque` (`cheque_number`, `branch_name_chq`, `bank_name_chq`, `issue_date_chq`, `unique_id_chq`, `category`, `unique_id_basic`, `approval_1`, `approval_2`, `approval_3`) VALUES
('kasndckjac', 'lkmsc', 'lskmdclaksc', '2015-07-23', 2, 0, 10, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mode_cheque_expenditure`
--

CREATE TABLE IF NOT EXISTS `mode_cheque_expenditure` (
  `cheque_number` varchar(30) NOT NULL,
  `branch_name_chq` varchar(30) NOT NULL,
  `bank_name_chq` varchar(30) NOT NULL,
  `issue_date_chq` date NOT NULL,
  `unique_id_chq` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  PRIMARY KEY (`unique_id_chq`),
  UNIQUE KEY `unique_id_dd` (`unique_id_chq`,`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mode_cheque_expenditure`
--

INSERT INTO `mode_cheque_expenditure` (`cheque_number`, `branch_name_chq`, `bank_name_chq`, `issue_date_chq`, `unique_id_chq`, `category`, `unique_id_basic`) VALUES
('merit_nuber', 'bank of merit', 'merit_bank', '2015-07-26', 1, 21, 15),
('kjdca ', 'kjsdc ', 'kjsdc ', '2015-07-26', 2, 22, 17);

-- --------------------------------------------------------

--
-- Table structure for table `mode_dd`
--

CREATE TABLE IF NOT EXISTS `mode_dd` (
  `dd_number` varchar(30) NOT NULL,
  `branch_name_dd` varchar(30) NOT NULL,
  `bank_name_dd` varchar(30) NOT NULL,
  `issue_date_dd` date NOT NULL,
  `unique_id_dd` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  `approval_1` int(2) DEFAULT NULL,
  `approval_2` int(2) DEFAULT NULL,
  `approval_3` int(2) DEFAULT NULL,
  PRIMARY KEY (`unique_id_dd`),
  UNIQUE KEY `unique_id_dd` (`unique_id_dd`,`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mode_dd`
--

INSERT INTO `mode_dd` (`dd_number`, `branch_name_dd`, `bank_name_dd`, `issue_date_dd`, `unique_id_dd`, `category`, `unique_id_basic`, `approval_1`, `approval_2`, `approval_3`) VALUES
('sdcasdcw34r34r34r', 'kjfnkjn', 'skjd', '2015-07-21', 3, 0, 1, 1, 0, 0),
('8465151351843', 'zimbambe', 'carolina', '2015-07-22', 4, 0, 7, 1, 1, 1),
('kmldc', 'lkmsdlk', 'lkmslck', '2015-07-23', 7, 2, 14, 0, 0, 0),
('sjc', 'kjnsc', 'kjnc', '2015-07-25', 8, 0, 24, 1, 1, 0),
('', '', '', '0000-00-00', 9, 0, 29, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mode_dd_expenditure`
--

CREATE TABLE IF NOT EXISTS `mode_dd_expenditure` (
  `dd_number` varchar(30) NOT NULL,
  `branch_name_dd` varchar(30) NOT NULL,
  `bank_name_dd` varchar(30) NOT NULL,
  `issue_date_dd` date NOT NULL,
  `unique_id_dd` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  PRIMARY KEY (`unique_id_dd`),
  UNIQUE KEY `unique_id_dd` (`unique_id_dd`,`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mode_dd_expenditure`
--

INSERT INTO `mode_dd_expenditure` (`dd_number`, `branch_name_dd`, `bank_name_dd`, `issue_date_dd`, `unique_id_dd`, `category`, `unique_id_basic`) VALUES
('asdc', 'lkmsd', 'kdc', '2015-07-23', 2, 11, 4),
('slkcm', 'lkmsdc', 'aslkdc', '2015-04-23', 3, 12, 5),
('asdcasdc300', 'sadcsc', 'sdcsc', '2015-07-21', 4, 17, 10),
('skjc asndc ', 'sadjnc', 'aslkdcac', '2015-07-26', 5, 18, 11),
('hello', 'jokerr', 'hi there', '2015-07-26', 6, 19, 12),
('ddnumb1234', 'kijuhygt', 'ddbanck', '2015-07-26', 7, 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `mode_net`
--

CREATE TABLE IF NOT EXISTS `mode_net` (
  `trans_id` varchar(30) NOT NULL,
  `bank_name_net` varchar(30) NOT NULL,
  `issue_date_net` date NOT NULL,
  `unique_id_net` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  `approval_1` int(2) DEFAULT NULL,
  `approval_2` int(2) DEFAULT NULL,
  `approval_3` int(2) DEFAULT NULL,
  PRIMARY KEY (`unique_id_net`),
  UNIQUE KEY `unique_id_basic` (`unique_id_basic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mode_net`
--

INSERT INTO `mode_net` (`trans_id`, `bank_name_net`, `issue_date_net`, `unique_id_net`, `category`, `unique_id_basic`, `approval_1`, `approval_2`, `approval_3`) VALUES
('', '', '0000-00-00', 1, 0, 28, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mode_net_expenditure`
--

CREATE TABLE IF NOT EXISTS `mode_net_expenditure` (
  `trans_id` varchar(30) NOT NULL,
  `bank_name_net` varchar(30) NOT NULL,
  `issue_date_net` date NOT NULL,
  `unique_id_net` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(2) NOT NULL,
  `unique_id_basic` int(11) NOT NULL,
  PRIMARY KEY (`unique_id_net`),
  UNIQUE KEY `unique_id_basic` (`unique_id_basic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mode_net_expenditure`
--

