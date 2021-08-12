-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 02:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opportunitymanagement`
--
CREATE DATABASE IF NOT EXISTS `opportunitymanagement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `opportunitymanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Mobile` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountId`, `UserId`, `Name`, `Address`, `Mobile`, `Email`) VALUES
(5, 1, 'Telkom', '1212 Nairobi', '0772000000', 'telkom@customercare.co.ke'),
(6, 1, 'Safaricom', '123 Nairobi', '0790000000', 'support@safaricom.co.ke');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `AccountId` int(11) NOT NULL,
  `OpportunityId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Amount` varchar(250) NOT NULL,
  `Stage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`AccountId`, `OpportunityId`, `UserId`, `Name`, `Amount`, `Stage`) VALUES
(6, 1, 1, 'System Support for Safaricom', 'Ksh 100,000', 'Negotiations'),
(6, 5, 1, 'Network Security Opportunity', 'Ksh 10,000', 'Discovery'),
(5, 10, 1, 'Telkom Network Opportunity', 'Ksh 50,000', 'Proposal shared');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Username`, `Password`) VALUES
(1, 'Kipling27', '$2y$10$.rcLCPsOO6v5KTWBqPnLVewBZP6lRRw2cNoiPRNUBzAz94HjaFDBW'),
(2, 'User1', '$2y$10$XW04rIDorUMsHuROpbfWeuGT1S8LIt3bXEb7LAXOeaMA/3Gc982IO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountId`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`OpportunityId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `OpportunityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
