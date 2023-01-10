-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 03:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aevgbuildersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `targetConsDate` varchar(255) NOT NULL,
  `projectType` varchar(255) NOT NULL,
  `projectImage` varchar(255) NOT NULL,
  `lotArea` varchar(255) NOT NULL,
  `numberFloors` varchar(255) NOT NULL,
  `businessType` varchar(255) NOT NULL,
  `meetingType` varchar(255) NOT NULL,
  `meetingLocation` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `meetingDate` varchar(255) NOT NULL,
  `meetingTime` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `client_id`, `barangay`, `province`, `municipality`, `targetConsDate`, `projectType`, `projectImage`, `lotArea`, `numberFloors`, `businessType`, `meetingType`, `meetingLocation`, `image`, `meetingDate`, `meetingTime`, `status`) VALUES
(39, 7, '007 San Pablo Hagonoy Bulacan fsdf', '', '', '2022-11-22', 'Residential', '1', '1000 sqm', 'Three-Storey', 'Food and Beverages', 'virtual', '', '', '2022-11-22', '22:45', 'Finished'),
(64, 16, '1234', 'Agusan del Sur', 'Prosperidad', '2023-01-23', 'Commercial/Retail Design', '4', '123', 'One-Storey', 'Outsourcing / BPO Offices', 'meetUp', '', '', '2023-01-20', '15:25', 'pending'),
(65, 4, '1234 main st', '', '', '2022-12-27', 'Commercial/Retail Design', '4', '123', 'One-Storey', 'Food and Beverages', 'virtual', '', '', '2022-12-29', '15:12', 'ongoing'),
(66, 14, 'adsa', '', '', '2022-12-28', '', '4', '1221', 'Three-Storey', 'Retail Store', 'virtual', '', '', '2022-12-25', '13:29', 'ongoing'),
(67, 8, '1234', 'Agusan del Norte', 'Butuan', '2023-01-31', 'Mixed-Use', '9', '123123', 'High-rise Storey', 'Sports and Recreation', 'meetUp', 'SM Megamall', '', '2023-01-27', '13:12', 'pending'),
(68, 17, 'fffffffff', '', '', '2022-12-24', 'Institutional', '1', '212', 'One-Storey', 'Local Business Office', 'meetUp', 'Shangri-la', '../../images/client (1).sql', '2022-12-22', '13:28', 'ongoing'),
(69, 18, 'hahshhd', '', '', '2022-12-31', 'Residential', '1', '123', 'One-Storey', 'Outsourcing / BPO Offices', 'meetUp', 'Shangri-la', '', '2022-12-29', '10:17', 'canceled'),
(70, 23, 'hbsdg', '', '', '2022-12-31', 'Industrial', '7', '436', 'Three-Storey', 'Retail Store', 'meetUp', 'Shangri-la', '', '2022-12-28', '17:02', 'ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
