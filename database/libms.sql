-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 09:27 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libms`
--
CREATE DATABASE IF NOT EXISTS `libms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libms`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `isbn` char(13) NOT NULL,
  `name` varchar(30) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `pb_name` varchar(45) CHARACTER SET utf16 NOT NULL,
  `pb_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `name`, `a_name`, `pb_name`, `pb_year`) VALUES
('9087675643245', 'Hunting for Silence', 'Robert Thier', 'Wattpad', 2017),
('9123456738275', 'The Host', 'Stephenie Meyer', 'Sphere', 2013),
('9567843567456', 'Arabian Nights', 'Simone Shirazi', 'Wattpad', 2016),
('9767456123456', 'After', 'Anna Todd', 'One Direction', 2013),
('9785231567843', 'Origin', 'Dan Brown', 'Bantam Press', 2017),
('9785678435671', 'Dryland', 'Simone Shirazi', 'Radish', 2016),
('9806785436548', 'Angels and Demons', 'Dan Brown', 'Corgi', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `book_copies`
--

DROP TABLE IF EXISTS `book_copies`;
CREATE TABLE `book_copies` (
  `book_id` int(11) NOT NULL,
  `isbn` char(13) NOT NULL,
  `avbl` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_copies`
--

INSERT INTO `book_copies` (`book_id`, `isbn`, `avbl`) VALUES
(1, '9785231567843', 1),
(2, '9785231567843', 1),
(3, '9806785436548', 0),
(4, '9806785436548', 1),
(5, '9123456738275', 0),
(6, '9123456738275', 1),
(7, '9567843567456', 0),
(8, '9567843567456', 1),
(9, '9785678435671', 1),
(10, '9785678435671', 1),
(11, '9087675643245', 0),
(12, '9767456123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_lending`
--

DROP TABLE IF EXISTS `book_lending`;
CREATE TABLE `book_lending` (
  `book_id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_lending`
--

INSERT INTO `book_lending` (`book_id`, `card_no`, `issue_date`, `due_date`) VALUES
(3, 5, '2018-11-24', '2018-12-01'),
(5, 1, '2018-11-24', '2018-12-01'),
(7, 1, '2018-11-24', '2018-12-01'),
(11, 9, '2018-11-24', '2018-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE `card` (
  `card_no` int(11) NOT NULL,
  `no_of_books` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_no`, `no_of_books`) VALUES
(1, 2),
(2, 0),
(3, 0),
(4, 0),
(5, 1),
(6, 0),
(7, 0),
(8, 0),
(9, 1),
(10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `book_id` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`book_id`, `genre`) VALUES
(1, 'Thriller'),
(2, 'Thriller'),
(3, 'Thriller'),
(4, 'Thriller'),
(5, 'Mystery'),
(6, 'Mystery'),
(7, 'Young Adult'),
(8, 'Young Adult'),
(9, 'Romance'),
(10, 'Romance'),
(11, 'Adventure/Historic'),
(12, 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription` (
  `card_no` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phno` char(10) NOT NULL,
  `sub_dur` int(11) NOT NULL,
  `sub_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`card_no`, `name`, `address`, `phno`, `sub_dur`, `sub_amt`) VALUES
(1, 'Ash', 'River Heights', '8976785034', 3, 300),
(2, 'Addy', 'Knowhere', '9908765892', 2, 200),
(3, 'Gammy', 'Themyscira', '9674463453', 6, 600),
(4, 'Bhugzie', 'Toronto', '9827613340', 4, 400),
(5, 'Zayn ', 'Bradford', '9867802345', 8, 800),
(6, 'Rihan', 'Bangalore', '8769567856', 3, 300),
(7, 'Virat', 'Bangalore', '8897876785', 2, 200),
(8, 'Bruce', 'Gotham', '8898789675', 8, 800),
(9, 'Steve Banner', 'Asgard', '6785789467', 5, 500),
(10, 'Scott Lang', 'Anthill', '9897678567', 4, 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `book_lending`
--
ALTER TABLE `book_lending`
  ADD PRIMARY KEY (`book_id`,`card_no`),
  ADD KEY `card_no` (`card_no`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`card_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_copies`
--
ALTER TABLE `book_copies`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `card_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_copies`
--
ALTER TABLE `book_copies`
  ADD CONSTRAINT `book_copies_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_lending`
--
ALTER TABLE `book_lending`
  ADD CONSTRAINT `book_lending_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_copies` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_lending_ibfk_2` FOREIGN KEY (`card_no`) REFERENCES `subscription` (`card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`card_no`) REFERENCES `subscription` (`card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book_copies` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
