-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 12:50 PM
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
-- Database: `aevgbuildersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `contactNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `houseNo` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `baranggay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `attempt` int(255) NOT NULL DEFAULT 3,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `middleName`, `lastName`, `username`, `employee_id`, `contactNo`, `email`, `password`, `houseNo`, `street`, `baranggay`, `municipality`, `province`, `attempt`, `status`) VALUES
(1, 'hanna clarisse', NULL, 'sagun', 'admin', '2018101442', '12345', 'sagunhannaclarisse1@gmail.com', 'mori', '167', 'purok4', 'balite', 'calumpit', 'bulacan', 3, 'active'),
(2, 'Zach', 'DC.', 'Anderson', 'zach00', '', '09786543489', 'zach00@gmail.com', 'zach123', '32', 'Bagumbayan Street', 'Tambunting', 'Bulakan', 'Bulacan', 3, 'active'),
(3, 'Jerwin', 'A.', 'Pascual', 'jerwin00', '', '09896754356', 'jerwin00@gmail.com', 'jerwin123', '32', 'Purok 3', 'Kapitangan', 'Paombong', 'Bulacan', 3, 'active'),
(4, 'Jefferson', 'K.', 'Cailipan', 'jefferson00', '', '09784138769', 'jefferson00@gmail.com', 'jefferson123', '32', 'Purok 4', 'Kapitangan', 'Paombong', 'Bulacan', 3, 'active'),
(5, 'Keith', 'M.', 'Balagtas', 'keith00', '', '09786912845', 'keith00@gmail.com', 'keith123', '67', 'Purok 5', 'Longos', 'Malolos', 'Bulacan', 3, 'active'),
(6, 'Lincoln', 'M.', 'Arellano', 'lincoln00', '', '09786572967', 'lincoln00@gmail.com', 'lincoln123', '78', 'Purok 1', 'Sto Rosario', 'Paombong', 'Bulacan', 3, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
