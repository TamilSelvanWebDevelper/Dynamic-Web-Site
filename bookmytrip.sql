-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 09:38 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmytrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotelID` int(11) NOT NULL,
  `hotelName` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` text NOT NULL,
  `facilities` text NOT NULL,
  `imagePath` text NOT NULL,
  `rating` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotelID`, `hotelName`, `location`, `price`, `rooms`, `facilities`, `imagePath`, `rating`) VALUES
(1, 'Mariott', 'Melbourne, Australia', 2000, '', '', 'popular-mariott', 4.6),
(2, 'Mont', 'Calella, Spain', 1600, '', '', 'popular-mont', 4.1),
(3, 'Taj', 'Mumbai, India', 1200, '', '', 'popular-taj', 4.3),
(4, 'Hilton', 'Hyderabad, India', 400, '', '', 'hilton', 4.1),
(5, 'Leela Palace', 'Bangalore, India', 500, '', '', 'leela', 4.3),
(6, 'Oberoi', 'Mumbai, India', 400, '', '', 'oberoi', 4),
(7, 'Radisson Blu', 'Goa, India', 390, '', '', 'blu', 4.2),
(8, 'Hyatt', 'Chennai, India', 400, '', '', 'hyatt', 4.5),
(9, 'ITC Grand Chola', 'Bangalore, India', 349, '', '', 'itc', 4.3);

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `userid` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `salt` varchar(22) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` varchar(10) NOT NULL,
  `subscription` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`userid`, `firstname`, `lastname`, `email`, `password`, `salt`, `mobile`, `gender`, `city`, `subscription`) VALUES
('Radhika', 'Radhika', 'JP', 'radhikajp@gmail.com', '$2y$10$YjQyMDA5N2M4ZWQ5Njc5Me5wZFohyLhcSYgq5huso6i4Iu460lww2', 'YjQyMDA5N2M4ZWQ5Njc5Mm', 9876543210, 'female', 'Bangalore', 0),
('Divya', 'Divya', 'TC', 'divyatc@gmail.com', '$2y$10$NDcyOGQxZDY0M2NjZTAwYuTEAOWMkqXTO75GTOGrLuyciFVaBOpH2', 'NDcyOGQxZDY0M2NjZTAwYz', 9123456789, 'female', 'Chennai', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
