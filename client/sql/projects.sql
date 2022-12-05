-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 10:09 AM
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `project_status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `employee_id`, `title`, `image`, `category`, `description`, `date_time`, `project_status`) VALUES
(15, 2, 'Dentals Partners Waltermart Malolos', 'image/Dental Partners Interior Waltermart Malolos1.jpg,image/Dental Partners Interior Waltermart Malolos2.jpg', 'Modern', 'AEVG Builders \"Dental Partners Walter Malolos Bulacan\" Project Design', '2022-12-05 15:57:32', 'pending'),
(16, 2, 'Contemporary Modern House', 'image/Home Project 1.jpg,image/Home Project2.jpg,image/Home Project3.jpg,image/Home Project4.jpg,image/Home Project5.jpg,image/Home Project6.jpg', 'Modern', 'AEVG Builders \"Contemporary Modern House\" Project\r\n', '2022-12-05 15:57:32', 'active'),
(17, 2, 'House Renovation Project ', 'image/House Project After Sample.jpg,image/House Project Before Sample.jpg', 'Renovate', 'AEVG Builders \" House Renovation\" Project \r\n', '2022-12-05 15:57:32', 'active'),
(18, 2, 'AEVG Builders Interior Designs ', 'image/Interior Design 2.jpg,image/InteriorDesign1.jpg,image/InteriorDesign3.jpg', 'Interior', 'AEVG Builders \"Interior Designs\" Sample', '2022-12-05 15:57:32', 'active'),
(21, 2, 'Modern Industrial Office Warehouse', 'image/Modern Industrial Office  Warehouse project1.jpg,image/Modern Industrial Office  Warehouse project2.jpg,image/Modern Industrial Office  Warehouse project3.jpg,image/Modern Industrial Office  Warehouse project4.jpg,image/Modern Industrial Office  War', 'Modern', 'AEVG Builders \"Modern Industrial Office Warehouse\" Project', '2022-12-05 15:57:32', 'active'),
(22, 2, 'Private Studio x Car Garage', 'image/Private Studio x Car Garage1.jpg,image/Private Studio x Car Garage2.jpg,image/Private Studio x Car Garage3.jpg,image/Private Studio x Car Garage4.jpg,image/Private Studio x Car Garage5.jpg,image/Private Studio x Car Garage6.jpg,image/Private ', 'Modern', 'AEVG Builders \"Private Studio x Car Garage\" Project', '2022-12-05 15:57:32', 'active'),
(23, 2, 'Private Villa x Mini Pool', 'image/Private Villa w Mini Pool1.jpg,image/Private Villa w Mini Pool2.jpg,image/Private Villa w Mini Pool3.jpg', 'Modern', 'AEVG Builders \" Private Villa With Mini Pool\" Project', '2022-12-05 15:57:32', 'active'),
(24, 2, 'House Renovation ', 'image/Sample Project Design Before.jpg,image/Sample Project Design - after.jpg', 'Renovate', 'AEVG Builders \"House Renovation\" Before and After Project', '2022-12-05 15:57:32', 'active'),
(25, 2, 'The River House', 'image/The River House 2.jpg,image/The River House 3.jpg,image/The river house AEVG.jpg', 'Modern', 'AEVG Builders \" The River House\" Project\r\n', '2022-12-05 15:57:32', 'active'),
(26, 2, 'The Villa', 'image/The Villa1.jpg,image/The Villa2.jpg,image/The Villa3.jpg,image/The Villa4.jpg,image/The Villa5.jpg,image/The Villa6.jpg', 'Modern', 'AEVG Builders \"The Villa\" Modern House Project', '2022-12-05 15:57:32', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
