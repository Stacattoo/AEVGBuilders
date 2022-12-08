-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 03:07 AM
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
  `project_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `employee_id`, `title`, `image`, `category`, `description`, `date_time`, `project_status`) VALUES
(15, 2, 'Dentals Partners Waltermart Malolos', 'image/Dental Partners Interior Waltermart Malolos1.jpg,image/Dental Partners Interior Waltermart Malolos2.jpg', 'Commercial', 'AEVG Builders \"Dental Partners Walter Malolos Bulacan\" Project Design', '2022-12-05 15:57:32', 'disapproved'),
(16, 2, 'Contemporary Modern House', 'image/Home Project 1.jpg,image/Home Project2.jpg,image/Home Project3.jpg,image/Home Project4.jpg,image/Home Project5.jpg,image/Home Project6.jpg', 'Residentials', 'AEVG Builders \"Contemporary Modern House\" Project\r\n', '2022-12-05 15:57:32', 'disapproved'),
(17, 2, 'House Renovation Project ', 'image/House Project After Sample.jpg,image/House Project Before Sample.jpg', 'Renovation', 'AEVG Builders \" House Renovation\" Project \r\n', '2022-12-05 15:57:32', 'disapproved'),
(18, 2, 'AEVG Builders Interior Design', 'image/Interior Design 2.jpg,image/InteriorDesign1.jpg,image/InteriorDesign3.jpg', 'Interior', 'AEVG Builders \"Interior Designs\" Sample', '2022-12-05 15:57:32', 'pending'),
(21, 2, 'Modern Industrial Office Warehouse', 'image/Modern Industrial Office  Warehouse project1.jpg,image/Modern Industrial Office  Warehouse project2.jpg,image/Modern Industrial Office  Warehouse project3.jpg,image/Modern Industrial Office  Warehouse project4.jpg,image/Modern Industrial Office  War', 'Residentials', 'AEVG Builders \"Modern Industrial Office Warehouse\" Project', '2022-12-05 15:57:32', 'active'),
(22, 2, 'Private Studio x Car Garage', 'image/Private Studio x Car Garage1.jpg,image/Private Studio x Car Garage2.jpg,image/Private Studio x Car Garage3.jpg,image/Private Studio x Car Garage4.jpg,image/Private Studio x Car Garage5.jpg,image/Private Studio x Car Garage6.jpg,image/Private ', 'Modern', 'AEVG Builders \"Private Studio x Car Garage\" Project', '2022-12-05 15:57:32', 'active'),
(23, 2, 'Private Villa x Mini Pool', 'image/Private Villa w Mini Pool1.jpg,image/Private Villa w Mini Pool2.jpg,image/Private Villa w Mini Pool3.jpg', 'Commercial', 'AEVG Builders \" Private Villa With Mini Pool\" Project', '2022-12-05 15:57:32', 'active'),
(24, 2, 'House Renovation ', 'image/Sample Project Design Before.jpg,image/Sample Project Design - after.jpg', 'Renovation', 'AEVG Builders \"House Renovation\" Before and After Project', '2022-12-05 15:57:32', 'active'),
(25, 2, 'The River House', 'image/The River House 2.jpg,image/The River House 3.jpg,image/The river house AEVG.jpg', 'Residentials', 'AEVG Builders \" The River House\" Project\r\n', '2022-12-05 15:57:32', 'active'),
(26, 2, 'The Villa', 'image/The Villa1.jpg,image/The Villa2.jpg,image/The Villa3.jpg,image/The Villa4.jpg,image/The Villa5.jpg,image/The Villa6.jpg', 'Commercial', 'AEVG Builders \"The Villa\" Modern House Project', '2022-12-05 15:57:32', 'active'),
(28, 7, 'Retail Center', 'image/Retail Center 2.jpg', 'Mixed-Use', 'Retail Center Mixed-used Sample  Project\r\n', '2022-12-07 09:27:56', 'pending'),
(29, 7, 'Trammel Crow', 'image/Trammel Crow p2.jpg,image/Trammel Crow p3.jpg', 'Mixed-Use', 'Trammel Crow Mixed Used Building Design', '2022-12-07 09:33:16', 'pending'),
(30, 7, 'Diamond Exchange Capital C Amsterdam', 'image/Diamond Exchange Capital C Amsterdam p2.jpg,image/Diamond Exchange Capital C Amsterdam p3.jpg,image/Diamond Exchange Capital C Amsterdam.jpg', 'Mixed-Use', 'Diamond Exchange Capital C Amsterdam Design Project Sample Mix-Use', '2022-12-08 00:50:02', 'pending'),
(31, 7, 'Modern Luxury Fit Out Interior Design', 'image/318010158_5376940712429332_226162005567563280_n.jpg,image/318113635_1620400475058678_6335164246706418311_n.jpg,image/317711152_465410429086482_3626854125691265184_n.jpg,image/317938049_877053209973456_3514142331185492522_n.jpg,image/317851273_821645', 'Interior', 'AEVG Builders Modern Luxury Fit Out Interior Design Project', '2022-12-08 00:58:04', 'pending'),
(32, 7, 'Classic Interior blended with Architecture Design', 'image/317427990_677593293930768_4011320582283264647_n.jpg,image/317691148_197897396134244_3244959182798046334_n.jpg,image/317633047_894197404912898_1070835692850732222_n.jpg,image/317622704_891893951807219_7353941289485236904_n.jpg,image/317386052_8674033', 'Interior', 'AEVG Builders Classic Interior blended with Architecture Design Project', '2022-12-08 01:00:32', 'pending'),
(33, 7, 'Nursing And Health Science Building', 'image/Nursing And Health Science Building 3.jfif,image/Nursing And Health Science Building.jpg,image/Nursing And Health Science Building 4.jfif', 'Institutional', 'Nursing And Health Science Building Institutional Architecture Sample Design', '2022-12-08 01:04:54', 'pending'),
(34, 7, 'Ford Foundation Center for Social Justice', 'image/Ford Foundation Center for Social Justice 1.jfif,image/Ford Foundation Center for Social Justice 2.jfif,image/Ford Foundation Center for Social Justice 3.jfif', 'Institutional', 'Ford Foundation Center for Social Justice Architecture Design Sample Design\r\n', '2022-12-08 01:10:15', 'pending'),
(35, 7, 'SESC Guarulhos', 'image/SESC Guarulhos 1.jfif,image/SESC Guarulhos 2.jfif,image/SESC Guarulhos 3.jfif', 'Institutional', 'SESC Guarulhos Institutional Architecture Sample  Design\r\n', '2022-12-08 01:12:41', 'pending'),
(36, 7, 'A Rural Art Studio / Jumping House Lab', 'image/A Rural Art Studio 2.jpg,image/A Rural Art Studio 3.jpg,image/A Rural Art Studio.jpg', 'Industrial', 'A Rural Art Studio / Jumping House Lab  Sample Design', '2022-12-08 01:17:29', 'pending'),
(37, 7, 'Innovative Lab of Architecture & Art / CLAB', 'image/not-ready-innovative-lab-of-architecture-and-art-clab_1.jpg,image/not-ready-innovative-lab-of-architecture-and-art-clab_12.jpg,image/not-ready-innovative-lab-of-architecture-and-art-clab_14.jpg,image/not-ready-innovative-lab-of-architecture-and-art-', 'Industrial', 'Innovative Lab of Architecture & Art / CLAB Sample Design', '2022-12-08 01:22:06', 'pending'),
(38, 7, 'Salt WareHouse', 'image/00.jpg,image/01_.jpg,image/11.jpg', 'Industrial', 'Salt Warehouse Industrial Architecture Sample Design', '2022-12-08 01:25:50', 'pending'),
(40, 7, 'Municipal Office Interior Renovation.', 'image/291961188_756749295464930_8591588807785145067_n.jpg,image/292111685_160490809852513_4392480535881035513_n.jpg,image/291750488_2114191662092572_1642834166263333867_n.jpg,image/291626283_762444601841490_6280873211821411585_n.jpg,image/291917511_149988', 'Renovation', 'AEVG Builders Municipal Office Interior Renovation Project', '2022-12-08 01:37:23', 'pending');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
