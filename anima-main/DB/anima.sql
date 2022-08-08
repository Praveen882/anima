-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 04:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anima`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `codingcontest`
--

CREATE TABLE `codingcontest` (
  `BLanguage` varchar(30) NOT NULL,
  `ILanguage` varchar(30) NOT NULL,
  `ALanguage` varchar(30) NOT NULL,
  `BDate` date NOT NULL,
  `IDate` date NOT NULL,
  `ADate` date NOT NULL,
  `BTime` varchar(30) NOT NULL,
  `ITime` varchar(30) NOT NULL,
  `ATime` varchar(30) NOT NULL,
  `BPlace` varchar(30) NOT NULL,
  `IPlace` varchar(30) NOT NULL,
  `APlace` varchar(30) NOT NULL,
  `TableID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codingcontest`
--

INSERT INTO `codingcontest` (`BLanguage`, `ILanguage`, `ALanguage`, `BDate`, `IDate`, `ADate`, `BTime`, `ITime`, `ATime`, `BPlace`, `IPlace`, `APlace`, `TableID`) VALUES
('JAVA', 'PYTHON', 'DATA STRUCTURE', '2021-02-01', '2022-01-20', '2029-01-17', '7:00 AM - 11:00 AM', '4:00 PM - 7:00 PM', '7:00 PM - 78:00 PM', '', '', '', 't1'),
('C', 'PYTHON', 'DATA STRUCTURE', '2021-02-01', '2062-01-20', '2029-01-17', '7:00 AM - 11:00 AM', '4:00 PM - 7:00 PM', '7:00 PM - 78:00 PM', '\'B\' BLOCK', '\'H\' BLOCK', '\'R\' BLOCK', 't1');

-- --------------------------------------------------------

--
-- Table structure for table `conferencecontest`
--

CREATE TABLE `conferencecontest` (
  `BLanguage` varchar(30) NOT NULL,
  `ILanguage` varchar(30) NOT NULL,
  `ALanguage` varchar(30) NOT NULL,
  `BDate` date NOT NULL,
  `IDate` date NOT NULL,
  `ADate` date NOT NULL,
  `BTime` varchar(30) NOT NULL,
  `ITime` varchar(30) NOT NULL,
  `ATime` varchar(30) NOT NULL,
  `BPlace` varchar(30) NOT NULL,
  `IPlace` varchar(30) NOT NULL,
  `APlace` varchar(30) NOT NULL,
  `TableID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conferencecontest`
--

INSERT INTO `conferencecontest` (`BLanguage`, `ILanguage`, `ALanguage`, `BDate`, `IDate`, `ADate`, `BTime`, `ITime`, `ATime`, `BPlace`, `IPlace`, `APlace`, `TableID`) VALUES
('IIT', 'AGILE', 'DEVOPS', '2022-02-04', '2022-02-01', '2022-02-07', '7:00 AM - 11:00 AM', '7:00 AM - 11:00 AM', '7:00 AM - 11:00 AM', '', '', '', 't1');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('praveen88@gmail.com', '987654321'),
('student01@gmail.com', 'student@123'),
('praveen@gmail.com', 'praveen1234');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `RegID` bigint(20) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `contestname` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `sno` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `date`, `RegID`, `phone`, `contestname`, `level`, `sno`) VALUES
('User01', 'praveen@gmail.com', '2022-02-06', 9607, 9876543210, 'coding_contest', 'low', 0),
('User01', 'praveen@gmail.com', '2022-02-06', 5539, 9876543210, 'coding_contest', 'low', 0),
('user02', 'praveen@gmail.com', '2022-02-06', 4614, 1234567890, 'coding_contest', 'mid', 0),
('user02', 'praveen@gmail.com', '2022-02-06', 7698, 1234567890, 'coding_contest', 'mid', 0),
('user4', 'praveen@gmail.com', '2022-02-06', 3710, 123456789, 'coding_contest', 'high', 0),
('user4', 'praveen@gmail.com', '2022-02-06', 1737, 123456789, 'coding_contest', 'high', 0),
('aaaaaaa', 'praveen@gmail.com', '2022-02-06', 1412, 1111111111111, 'coding_contest', 'low', 0),
('asdfg', 'praveen@gmail.com', '2022-02-06', 7201, 1029384756, 'coding_contest', 'low', 1),
('USUSUS', 'praveen@gmail.com', '2022-02-06', 9675, 12345654321, 'conference_contest', 'a_block', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
