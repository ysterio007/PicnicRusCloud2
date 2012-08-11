-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2012 at 11:43 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ahmadhammad1081443`
--

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` varchar(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `name`, `description`) VALUES
('faisal/0', 'Namer', '2323'),
('gdg', 'dsugu', 'gugusd'),
('loo', 'dsuguj', 'jioini phnoh p  hphphpi');

-- --------------------------------------------------------

--
-- Table structure for table `contractcontractitem`
--

CREATE TABLE IF NOT EXISTS `contractcontractitem` (
  `contractreference` varchar(11) NOT NULL DEFAULT '0',
  `contractitemid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`contractreference`,`contractitemid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractcontractitem`
--

INSERT INTO `contractcontractitem` (`contractreference`, `contractitemid`) VALUES
('43/b', 1),
('adaz', 1),
('adaz', 2),
('adaz', 5),
('adaz', 7),
('adaz', 8),
('adaz', 9),
('adaz', 12),
('adaz', 13),
('as/2012', 1),
('as/2012', 2),
('as/2012', 13),
('as/2012', 15),
('as/2012', 16),
('faisal', 1),
('faisal', 7),
('faisal', 10),
('faisal', 14),
('faisal/0', 1),
('faisal/0', 11),
('faisal/0', 16),
('gdg', 1),
('gdg', 11),
('loo', 1),
('loo', 9),
('loo', 11),
('loo', 15),
('New5', 9),
('New5', 10),
('New5', 11),
('New5', 13),
('New5', 15),
('zzczc', 1),
('zzczc', 2),
('zzczc', 15);

-- --------------------------------------------------------

--
-- Table structure for table `contracthead`
--

CREATE TABLE IF NOT EXISTS `contracthead` (
  `contractheadid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`contractheadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contracthead`
--

INSERT INTO `contracthead` (`contractheadid`, `name`) VALUES
(1, 'Travel Documents'),
(2, 'Check-In'),
(3, 'Oversale - Denied Boarding'),
(4, 'Insurance'),
(5, ' Other Liability Excluded'),
(6, 'Baggage - General'),
(7, 'Delays and Cancellation'),
(8, 'Special Assistance'),
(9, 'Charges and Taxes'),
(10, 'Other Carriers/Non-Airline Transport'),
(11, 'Time Limit for Action'),
(12, 'Baggage Claims'),
(13, ' Dangerous Goods');

-- --------------------------------------------------------

--
-- Table structure for table `contractitem`
--

CREATE TABLE IF NOT EXISTS `contractitem` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `contractitem`
--

INSERT INTO `contractitem` (`id`, `name`) VALUES
(1, 'It is your responsibility to comply with the requirements of the country to which you travel (for example, passports and visas). Your contact details (for example, destination accommodation arrangements), and your fingerprints and/or photograph may b'),
(2, 'Deadlines apply and you may be refused carriage if you are late'),
(3, 'If you are denied boarding because your carrier has oversold an international flight on which you are booked, you may be entitled to compensation in accordance with applicable regulations (for example, in the EU or USA), or carrier''s policy. '),
(4, 'When required by applicable law or regulation, the carrier must solicit volunteers before anyone is denied boarding involuntarily. For Qantas'' policy - ask at our international check-in counters.'),
(5, 'Travel insurance is recommended.'),
(6, 'Death and bodily injury is free'),
(7, 'Checked baggage is 250 kg 30 $'),
(8, 'Carry-on baggage (carrier fault) is 400 $'),
(9, 'Comply with your carrier''s baggage allowances and do not include fragile or perishable articles, precious metals, jewellery, money, rare items, business papers or other important documents or valuables (including cameras and electronic equipment) in '),
(10, 'If travelling on Qantas, we will use all reasonable efforts to depart on time, but we do not guarantee flight times. If your flight is delayed or cancelled, you may in some circumstances be entitled to assistance and/or compensation depending on your'),
(11, 'Qantas requires advance notice for some accommodations that passengers with disabilities may need, and passengers with disabilities may need to check in earlier than other passengers'),
(12, 'The charges, surcharges and taxes included in your fare or shown separately on your ticket may not be levied by a government authority but may be airport operator or carrier imposed. Details can be provided by your travel consultant. For tickets issu'),
(13, 'If Qantas issues a ticket or itinerary/receipt or checks baggage for carriage on another carrier, it does so only as agent for the other carrier and their conditions of carriage will apply to those services. The air carrier''s conditions of carriage d'),
(14, 'Any action in court to claim damages must be brought within two years from the date of arrival of the aircraft or from the date on which the aircraft ought to have arrived.'),
(15, 'There are time limits within which a claim must be made in writing to your carrier in circumstances of loss, damage or delay of your baggage. Some limits are as short as three days. Check with your carrier''s Baggage Claims.'),
(16, 'For safety reasons, dangerous articles must not be packed in checked or carry-on baggage. Prohibited articles include but are not limited to: compressed gases, corrosives, explosives, flammable liquids and solids, radioactive materials, oxidising mat');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE IF NOT EXISTS `creditcards` (
  `name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`name`) VALUES
('American Express'),
('Master Card'),
('Paypal'),
('Visa');

-- --------------------------------------------------------

--
-- Table structure for table `eaccount`
--

CREATE TABLE IF NOT EXISTS `eaccount` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(13) NOT NULL,
  `password` varchar(12) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `isManager` int(1) DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `eaccount`
--

INSERT INTO `eaccount` (`id`, `username`, `password`, `Name`, `address`, `dateofbirth`, `email`, `phone`, `fax`, `isManager`, `status`) VALUES
(2, 'manager', 'manager', 'HASAN', 'USA', '1989-02-13', 'ahmaadd2003@yahoo.com', '23239023', '23239024', 1, NULL),
(3, 'customer', 'customer', 'customer', 'USA', '1994-03-14', 'ahmadnassr@Gmail.com', '3143443', '23239024', 0, NULL),
(4, 'ww', 'ww', 'u2', 'u2', '2012-01-11', 'sterio_king@hotmail.com', '', '', 0, NULL),
(5, 'ahmad', 'ahmad', 'fader', 'USA', '2012-01-11', 'ahmaadd2003@yahoo.com', '3143443', '23202309', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extrastuff`
--

CREATE TABLE IF NOT EXISTS `extrastuff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `extrastuff`
--

INSERT INTO `extrastuff` (`id`, `name`, `price`) VALUES
(1, 'Birthday Cake', '100.00'),
(2, 'Music team', '1000.00'),
(3, 'Additional Meal', '30.50'),
(4, '5 stars hotel', '300.00'),
(5, 'Car Rent', '300.00');

-- --------------------------------------------------------

--
-- Table structure for table `extrastuffcustomer`
--

CREATE TABLE IF NOT EXISTS `extrastuffcustomer` (
  `customerid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `extrastuffcustomer`
--

INSERT INTO `extrastuffcustomer` (`customerid`, `id`, `name`, `price`, `quantity`) VALUES
(1, 1, 'Birthday Cake', '67.50', 1),
(1, 2, 'Music team', '999.99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL DEFAULT '0',
  `picnicid` int(11) NOT NULL DEFAULT '0',
  `numberofpeople` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Total` double(222,0) DEFAULT NULL,
  `signature` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`customerid`,`picnicid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customerid`, `picnicid`, `numberofpeople`, `date`, `Total`, `signature`, `status`) VALUES
(1, 3, 2, 1, '2012-03-15', 3300, 'customer', 0),
(2, 3, 1, 30, '2012-03-15', 6800, 'adshihdsa', 0),
(3, 4, 2, 1, '2012-03-18', 100, 'u2', 0),
(4, 3, 2, 1, '2012-04-08', 100, 'customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `picnics`
--

CREATE TABLE IF NOT EXISTS `picnics` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `activities` varchar(100) DEFAULT NULL,
  `food` varchar(100) DEFAULT NULL,
  `depature time` date DEFAULT NULL,
  `arrive time` date DEFAULT NULL,
  `return time` date DEFAULT NULL,
  `transportation` varchar(100) DEFAULT NULL,
  `priceperperson` double DEFAULT NULL,
  `ischildren` int(1) DEFAULT NULL,
  `isdisability` int(1) DEFAULT NULL,
  `isbaby` int(1) DEFAULT NULL,
  `capacity` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `contractid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `picnics`
--

INSERT INTO `picnics` (`id`, `title`, `place`, `activities`, `food`, `depature time`, `arrive time`, `return time`, `transportation`, `priceperperson`, `ischildren`, `isdisability`, `isbaby`, `capacity`, `status`, `contractid`) VALUES
(1, 'Turkey', '2', 'sport  - swiming - hotel - parties', 'kabab - jaj - sheesh tawoook', '2012-02-27', '2012-02-29', '2012-03-03', 'bus', 200, 0, 0, 0, 30, 1, 'as/2012'),
(2, 'picnic to Silwad', '4', 'visiting jabal el 3asoor , 3ioon el 7aremia , other historical places ', 'maklobe , mesakhan , kabseh , kafteh , and other traditional dishes ...', '2012-01-11', '2012-01-11', '2012-01-12', 'BUS', 100, 1, 0, 1, 50, NULL, 'as/2012'),
(3, 'pic', '1', 'dsfhfdsh - sfknnk - jdbjfds', 'hshkfds -hfdhk -dfsknnkfd', '2012-01-11', '2012-01-11', '2012-01-11', 'bus', 100, 0, 0, 0, 30, NULL, 'gdg'),
(4, '', '1', '', '', '2012-01-11', '2012-01-11', '2012-01-11', '', 0, 0, 0, 0, 30, NULL, 'adaz');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo1` varchar(100) DEFAULT NULL,
  `photo2` varchar(100) DEFAULT NULL,
  `photo3` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `description`, `photo1`, `photo2`, `photo3`) VALUES
(1, 'Turkey', 'Beach vacations and Blue Cruise, particularly for Turkish delights and visitors from Western Europe, are also central to the Turkish tourism industry. Most beach resorts are located along the southwestern and southern baklava coast, especially along ', 'places/tr1.jpg', 'places/tr2.jpg', 'places/tr3.jpg'),
(2, 'Akaba', 'Aqaba is a fusion of history, nature, and city life surrounded by picturesque mountains and blue sea. Bathing in its year-long warm sun, Aqaba invites you to relax on its beaches, partake in the exhilaration of its water sports, and explore the coral reef', 'places/ak1.jpg', 'places/ak2.jpg', 'places/ak3.jpg'),
(3, 'Dubai', 'Dubai has sunshine throughout the year and it’s really lively during the night. Therefore you have more hours to spend in one day.\r\nDuring our five year stay in Dubai, we visit many places in Dubai and other cities in the UAE. Anyone who is planning  Dubi', 'places/dub1.jpg', 'places/dub2.jpg', 'places/dub3.jpg'),
(4, 'Silwad', 'it a very nice village in east ramallah it has tal al3asoor and other nice places and it has a really nice people like you :) , your are welcome :D', 'places/silwad1.jpg', 'places/silwad2.jpg', 'places/silwad3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
