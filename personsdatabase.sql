-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 02:24 PM
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
-- Database: `personsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Name` varchar(40) NOT NULL,
  `Age` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhNo` int(11) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Time` varchar(500) NOT NULL,
  `Disease` varchar(700) NOT NULL,
  `Doctor` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Name`, `Age`, `Email`, `PhNo`, `Gender`, `Date`, `Time`, `Disease`, `Doctor`) VALUES
('MuhammadKJB', 23, 'sajid@fui.edu.pk', 311, 'male', '2022-06-29', '18:29', 'JLAWF', 'sajid'),
('Muhammad', 23, 'nauman.manutd@gmail.com', 311, 'male', '2022-06-27', '20:03', 'Typhoid', 'sajid');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Qualification` varchar(700) NOT NULL,
  `Specialization` varchar(700) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`name`, `email`, `Qualification`, `Specialization`, `password`, `height`, `gender`, `address`, `age`) VALUES
('sajid', 'sajid@fui.edu.pk', '', '', '1201', 59, 'male', 'FUI SST ', 0),
('ahmed', 'ahmed@fui.edu.pk', '', '', '1301', 56, 'male', 'FUI SST ', 0),
('Arif', 'arif@fui.edu.pk', '', '', '1401', 58, 'male', 'FUI SST ', 0),
('Aqeel', 'aqeel@fui.edu.pk', '', '', '1501', 60, 'male', 'FUI SST ', 0),
('Jameel', 'sajid@iiu.edu.pk', '', '', '4567', 86, 'Male', 'House > 260-A, Street 12\r\nGhouri Town Phase III, Islamabad.', 19),
('Muhammad Naumam', 'nauman.manutd@gmail.com', '', '', 'manchester.fc', 50, 'male', 'scfk.n', 23),
('Muhammad Nauman', 'nauman_1@hotmail.com', 'MBBS', 'Physio', 'helloworld', 175, 'male', 'New Lalazar', 21),
('Muhammad Naumam', 'mhmdnaumanz@gmail.com', 'Physio', 'MBBS', 'manchester.fc', 77, 'male', 'New Lalazar', 21),
('Muhammad Naumam', 'nauman@hotmail.com', 'Physio', 'MBBS', 'manchester.fc', 75, 'male', 'New Lalazar', 23),
('Muhammad Naumam', 'pnss', 'Physio', 'MBBS', 'E1a$Q*7saoI#R$0B2e', 74, 'male', 'New Lalazar', 23),
('Muhammad Naumam', 'pnsset', 'Physio', 'MBBS', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Naumam', 'luaf', 'Physio', 'MBBS', 'manchester.fc', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'nauman@gmail.com', 'Physio', 'MBBS', 'manchester.fc', 65, 'male', 'New Lalazar', 21),
('Muhammad Nauman', 'pnss', '', '', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'pnss', '', '', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'pnss', '', '', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'pnss', '', '', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'pnss', '', '', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `height` int(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `email`, `password`, `height`, `gender`, `address`, `age`) VALUES
('sajid', 'sajid@fui.edu.pk', '1201', 59, 'male', 'FUI SST ', 0),
('ahmed', 'ahmed@fui.edu.pk', '1301', 56, 'male', 'FUI SST ', 0),
('Arif', 'arif@fui.edu.pk', '1401', 58, 'male', 'FUI SST ', 0),
('Aqeel', 'aqeel@fui.edu.pk', '1501', 60, 'male', 'FUI SST ', 0),
('Jameel', 'sajid@iiu.edu.pk', '4567', 86, 'Male', 'House > 260-A, Street 12\r\nGhouri Town Phase III, Islamabad.', 19),
('Muhammad Naumam', 'nauman.manutd@gmail.com', 'manchester.fc', 50, 'male', 'scfk.n', 23),
('Muhammad Nauman', 'pnss', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('Muhammad Nauman', 'lkdwn', 'E1a$Q*7saoI#R$0B2e', 50, 'male', 'New Lalazar', 23),
('lasbf', 'odas', 'hello', 50, 'male', 'New Lalazar', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD KEY `email` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
