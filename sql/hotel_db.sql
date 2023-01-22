-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 12:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `surname`, `email`, `message`) VALUES
(30, '123', '123', '123', 'Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Ipsum'),
(31, 'Harry', 'Potter', 'potterh@localhost.com', 'Are there TVs in the standard rooms?'),
(32, 'Average', 'Joe', 'avejoe@localhost.com', 'This is a spam message');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) NOT NULL,
  `room` text NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_name` text NOT NULL,
  `user_surname` text NOT NULL,
  `user_number` text NOT NULL,
  `user_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room`, `qty`, `date_start`, `date_end`, `username`, `user_name`, `user_surname`, `user_number`, `user_email`) VALUES
(70, '1 Single Bed Luxury', 1, '2022-06-21', '2022-06-30', 'YankoBog', 'Bogdan', 'Yanko', '6969696969', 'yankobog@localhost.com'),
(73, '2 Double Beds Luxury', 2, '2022-06-24', '2022-07-09', 'admin', 'Admin', 'Number1', '6900000000', 'admin@localhost.com'),
(74, '1 Single Bed Luxury', 5, '2022-06-19', '2022-06-30', 'admin', 'Administrator', 'Number2', '0000000000', 'admin@here.com'),
(75, '1 Double Bed Simple', 5, '2022-06-18', '2022-06-26', 'admin', 'Administrator', 'Number3', '9090909090', 'admin@localhost.com');

--
-- Triggers `reservations`
--
DELIMITER $$
CREATE TRIGGER `afterNewReservation` AFTER INSERT ON `reservations` FOR EACH ROW UPDATE rooms SET rooms.available = rooms.available-new.qty where rooms.type = new.room
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `beforeReservationDelete` BEFORE DELETE ON `reservations` FOR EACH ROW UPDATE rooms SET rooms.available = rooms.available+old.qty where rooms.type = old.room
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) NOT NULL,
  `type` text NOT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type`, `available`) VALUES
(1, '1 Single Bed Simple', 25),
(2, '2 Single Beds Simple', 25),
(3, '1 Double Bed Simple', 20),
(4, '2 Double Beds Simple', 25),
(5, '1 Single Bed Luxury', 4),
(6, '2 Single Beds Luxury', 10),
(7, '1 Double Bed Luxury', 10),
(8, '2 Double Beds Luxury', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `permission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `email`, `password`, `number`, `create_datetime`, `permission`) VALUES
(10, 'YankoBog', 'Bogdan', 'Yanko', 'yankobog@localhost.com', '098f6bcd4621d373cade4e832627b4f6', '0123456789', '2022-06-13 22:22:44', 'user'),
(11, 'admin', 'Administrator', 'Administrator', 'admin@localhost.com', '21232f297a57a5a743894a0e4a801fc3', '6969696969', '2022-06-13 22:25:32', 'admin'),
(12, 'JohnD', 'John', 'Doe', 'johnd@localhost.com', '098f6bcd4621d373cade4e832627b4f6', '1234567890', '2022-06-13 22:27:41', 'user'),
(13, 'supervisor', 'Supervisor', 'Account', 'supervisor@outlook.com', '21232f297a57a5a743894a0e4a801fc3', '0123456789', '2022-06-13 23:57:38', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
