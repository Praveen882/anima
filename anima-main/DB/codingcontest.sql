-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 10:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
('C', 'PYTHON', 'DATA STRUCTURE', '2021-02-01', '2062-01-20', '2029-01-17', '7:00 AM - 11:00 AM', '4:00 PM - 7:00 PM', '7:00 PM - 78:00 PM', '\'B\' BLOCK', '\'H\' BLOCK', '\'R\' BLOCK', 't1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
