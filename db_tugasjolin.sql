-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 03:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tugasjolin`
--

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE IF NOT EXISTS `boats` (
  `bid` int(11) NOT NULL,
  `bname` varchar(32) DEFAULT NULL,
  `color` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boats`
--

INSERT INTO `boats` (`bid`, `bname`, `color`) VALUES
(101, 'Cavelary Boats', 'Green Army'),
(102, 'Interlake', 'red'),
(103, 'Clipper', 'Green'),
(104, 'Marine', 'red'),
(111, 'Boats Triple One', 'Red'),
(121, 'Patrol Marine Police', 'Grey White');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `sid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `days` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`sid`, `bid`, `days`) VALUES
(64, 101, '15/10/98'),
(22, 102, '11/10/98'),
(29, 102, '01/01/24'),
(31, 102, '14/10/98'),
(64, 102, '16/10/98'),
(22, 103, '12/10/98'),
(29, 103, '10/12/23'),
(31, 103, '15/10/98'),
(74, 103, '17/10/98'),
(22, 104, '13/10/98'),
(31, 104, '14/10/98'),
(74, 111, '26/12/23');

-- --------------------------------------------------------

--
-- Table structure for table `sailors`
--

CREATE TABLE IF NOT EXISTS `sailors` (
  `sid` int(11) NOT NULL,
  `sname` varchar(32) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `age` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sailors`
--

INSERT INTO `sailors` (`sid`, `sname`, `rating`, `age`) VALUES
(2, 'Sutiyem Hadayani', 8, 75.5),
(10, 'Budiman Handuk', 9, 49.5),
(15, 'Jukiman Anwar Sadat', 7, 40.5),
(17, 'Suharto Salim', 8, 35.5),
(22, 'Dustin', 7, 45),
(29, 'Brutus', 1, 33),
(31, 'Lubber', 8, 55),
(32, 'Andy', 8, 25),
(58, 'Rusty', 10, 55),
(64, 'Horatio', 7, 35),
(71, 'Zorba', 10, 16),
(74, 'Horatio', 9, 35),
(85, 'Art', 3, 25.5),
(95, 'Bob', 3, 63.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
 ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
 ADD PRIMARY KEY (`sid`,`bid`,`days`), ADD KEY `FK_reserves1` (`bid`);

--
-- Indexes for table `sailors`
--
ALTER TABLE `sailors`
 ADD PRIMARY KEY (`sid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
ADD CONSTRAINT `FK_reserves` FOREIGN KEY (`sid`) REFERENCES `sailors` (`sid`),
ADD CONSTRAINT `FK_reserves1` FOREIGN KEY (`bid`) REFERENCES `boats` (`bid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
