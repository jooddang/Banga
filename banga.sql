-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2013 at 11:55 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `ciid` int(16) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `iid` int(16) NOT NULL,
  `quantity` int(3) NOT NULL,
  `tid` int(16) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `checked_out` tinyint(1) NOT NULL,
  `checkout_date` varchar(10) NOT NULL,
  PRIMARY KEY (`ciid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`ciid`, `uid`, `iid`, `quantity`, `tid`, `amount`, `checked_out`, `checkout_date`) VALUES
(4, 10, 1, 3, 0, '0', 0, '0000-00-00'),
(7, 1, 1, 3, 0, '2.1', 1, '10/24/2013'),
(8, 1, 6, 1, 0, '5.65', 1, '10/24/2013'),
(9, 1, 5, 1, 0, '0.65', 1, '10/24/2013');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `usd` float NOT NULL,
  `eur` float NOT NULL,
  `inr` float NOT NULL,
  `pkr` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`usd`, `eur`, `inr`, `pkr`) VALUES
(158.4, 115.9, 9704, 16810);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `iid` int(16) NOT NULL,
  `uid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`iid`, `uid`, `name`, `price`, `unit`, `photo`, `description`) VALUES
(1, 5, 'Tomato', '0.70', 'lbs', 'images/items/tomato.jpeg', 'Organic tomato produced from Derik''s farm.'),
(2, 5, 'Rice', '0.54', 'lbs', 'images/items/rice.jpg', 'Organic rice of wonderful quality! '),
(3, 5, 'Straus Milk', '1.35', 'ea', 'images/items/milk.jpg', 'This is the only non-gmo milk in Bangalaw area!'),
(4, 5, 'Chick-Chick Chicken', '4.25', 'ea', 'images/items/chicken.jpg', 'We serve cage-free chicken only!'),
(5, 2, 'Rice', '0.65', 'lbs', 'images/items/rice.jpg', 'This is world best quality of rice!'),
(6, 2, 'Brians Chicken', '5.65', 'ea', 'images/items/chicken.jpg', 'Brian knows the best way to feed chickens.'),
(7, 1, 'Refrigerator', '300', 'ea', 'images/items/friger.jpg', 'Keep your food fresh!'),
(8, 4, 'Table', '120', 'ea', 'images/items/table.jpg', 'A great wooden table.'),
(9, 4, 'Shelve', '64', 'ea', 'images/items/shelve.jpg', 'A great wooden shelve.'),
(10, 6, 'Harry Porter', '64', 'ea', 'images/items/harry.jpg', 'a legendary wizard - harry potter.'),
(11, 3, 'Mens cut', '12', 'ea', 'images/items/menscut.jpg', 'haircut for men');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `uid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `reputation` int(2) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`uid`, `name`, `photo`, `reputation`) VALUES
(2, 'ABC Grocery', 'images/ABC_Grocery.png', 3),
(5, 'Akash''s Grocery', 'images/grocery-store.jpg', 1),
(1, 'Bungalow Electronics', 'images/electronic-store.jpg', 5),
(4, 'Home Supply', 'images/home.jpg', 0),
(6, 'Indu''s Bookstore', 'images/bookstore.jpg', 2),
(3, 'Jay Haircut', 'images/hair-salon.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(16) NOT NULL AUTO_INCREMENT,
  `uid_from` int(16) NOT NULL,
  `uid_to` int(16) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `send_date` varchar(8) NOT NULL,
  `receive_date` varchar(8) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `uid_from`, `uid_to`, `amount`, `send_date`, `receive_date`) VALUES
(11, 9, 1, '90', '10/19/13', ''),
(12, 9, 2, '1', '10/19/13', ''),
(13, 9, 2, '1', '10/19/13', ''),
(14, 9, 1, '908', '10/19/13', ''),
(15, 10, 1, '10', '10/19/13', ''),
(16, 1, 2, '17', '10/19/13', ''),
(17, 1, 2, '8.40', '10/19/13', ''),
(18, 1, 9, '100', '10/19/13', ''),
(19, 1, 2, '10', '10/19/13', ''),
(20, 1, 2, '10', '10/19/13', ''),
(21, 1, 2, '10', '10/19/13', ''),
(22, 1, 2, '10', '10/19/13', ''),
(23, 1, 2, '10', '10/19/13', ''),
(24, 1, 2, '10', '10/19/13', ''),
(25, 1, 2, '10', '10/19/13', ''),
(26, 1, 2, '10', '10/19/13', ''),
(27, 1, 2, '10', '10/19/13', ''),
(28, 1, 2, '10', '10/19/13', ''),
(29, 1, 2, '10', '10/19/13', ''),
(30, 1, 2, '10', '10/19/13', ''),
(31, 1, 2, '10', '10/19/13', ''),
(32, 1, 2, '10', '10/19/13', ''),
(33, 1, 2, '10', '10/19/13', ''),
(34, 1, 2, '10', '10/19/13', ''),
(35, 1, 2, '10', '10/19/13', ''),
(36, 1, 2, '10', '10/19/13', ''),
(37, 1, 2, '10', '10/19/13', ''),
(38, 1, 2, '10', '10/19/13', ''),
(39, 1, 2, '10', '10/19/13', ''),
(40, 1, 2, '10', '10/19/13', ''),
(41, 1, 2, '10', '10/19/13', ''),
(42, 1, 2, '10', '10/19/13', ''),
(43, 1, 2, '10', '10/19/13', ''),
(44, 1, 2, '10', '10/19/13', ''),
(45, 1, 2, '10', '10/19/13', ''),
(46, 1, 2, '10', '10/19/13', ''),
(47, 1, 2, '10', '10/19/13', ''),
(48, 1, 2, '10', '10/19/13', ''),
(49, 1, 2, '10', '10/19/13', ''),
(50, 1, 2, '10', '10/19/13', ''),
(51, 1, 2, '10', '10/19/13', ''),
(52, 1, 2, '10', '10/19/13', ''),
(53, 1, 2, '10', '10/19/13', ''),
(54, 1, 2, '10', '10/19/13', ''),
(55, 1, 9, '800', '10/19/13', ''),
(56, 1, 9, '1300', '10/20/13', ''),
(57, 1, 9, '', '10/23/13', ''),
(58, 1, 9, '10', '10/23/13', ''),
(59, 1, 10, '10', '10/23/13', ''),
(60, 1, 10, '10', '10/23/13', ''),
(61, 1, 9, '86.11', '10/23/13', ''),
(62, 11, 1, '10', '10/24/13', ''),
(63, 1, 2, '200', '10/24/13', ''),
(65, 10, 11, '10', '10/24/13', ''),
(66, 1, 9, '400', '10/24/13', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `cell_number` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `deposit` varchar(30) NOT NULL DEFAULT '0',
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `card_expiration` varchar(5) DEFAULT NULL,
  `card_secret` varchar(4) DEFAULT NULL,
  `currency` varchar(8) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `cell_number`, `password`, `first_name`, `last_name`, `deposit`, `address`, `city`, `state`, `zipcode`, `country`, `card_number`, `card_expiration`, `card_secret`, `currency`) VALUES
(1, '4156870581', 'e7356a60999ecf64cdea8b875f8899ae', 'Dirk', 'de Wit', '2500', '2299 Piedmont Ave', 'Berkeley', 'California', '94720', '', '1234123412341234', '08/1', '399', '$'),
(2, '14151234567', 'e7356a60999ecf64cdea8b875f8899ae', 'Bob', 'Johnson', '1119.3', '', '', '', '', '', '', '', '', '&#x20B9;'),
(9, '15555555555', '5f4dcc3b5aa765d61d8327deb882cf99', 'Brian', 'Bloomer', '2696.11', '2299 Piedmont Ave', 'Berkeley', 'Calfornia', '94720', 'US', '1234123412341234', '01/13', '123', '$'),
(10, '14156789123', 'a19bdafa581c698039b74432701a2257', 'Ronald', 'Murphy', '1000', 'blablabla street', 'Oakland', 'PA', '92124', 'US', '1234567890098765', '01/14', '456', '€'),
(11, '15101234567', 'a19bdafa581c698039b74432701a2257', 'Jen', 'Fisher', '108.05', '1995 University Ave', 'Berkeley', 'CA', '94720', 'US', '8234623912488641', '01/18', '344', '£');
