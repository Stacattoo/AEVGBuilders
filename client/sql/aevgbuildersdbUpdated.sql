-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 04:15 AM
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
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `client_id`, `status_message`, `date_time`) VALUES
(1, 7, 'registered', '2022-11-30 12:57:57'),
(2, 2, 'registered', '2022-11-18 12:57:57'),
(3, 16, 'Registration Date: ', '2022-12-08 22:22:01'),
(4, 16, 'Set an Appointment ', '2022-12-08 22:26:03'),
(5, 16, 'Send a Cost Estimate ', '2022-12-08 22:30:50'),
(6, 16, 'Send a Cost Estimate ', '2022-12-08 22:37:19'),
(7, 4, 'Set an Appointment ', '2022-12-09 11:12:55'),
(8, 14, 'Set an Appointment ', '2022-12-09 11:29:28'),
(9, 8, 'Set an Appointment ', '2022-12-09 20:12:27'),
(10, 17, 'Registration Date ', '2022-12-09 23:16:47'),
(11, 17, 'Set an Appointment ', '2022-12-09 23:28:39'),
(12, 17, 'Send a Cost Estimate ', '2022-12-09 23:42:19'),
(13, 18, 'Registration Date ', '2022-12-10 18:10:17'),
(14, 18, 'Set an Appointment ', '2022-12-10 18:17:36'),
(26, 7, 'Change Transaction Status into: Ongoing', '2022-12-12 01:29:50'),
(27, 7, 'Change Transaction Status into: Onhold', '2022-12-12 01:30:18'),
(28, 19, 'Registration Date ', '2022-12-12 12:43:39'),
(29, 20, 'Registration Date ', '2022-12-12 12:44:42'),
(30, 21, 'Registration Date ', '2022-12-12 12:47:11'),
(31, 22, 'Registration Date ', '2022-12-12 12:49:07'),
(32, 23, 'Registration Date ', '2022-12-12 12:50:29'),
(33, 23, 'Set an Appointment ', '2022-12-12 13:02:26'),
(34, 2, 'Change Transaction Status into: Finished', '2022-12-12 13:07:11'),
(35, 23, 'Change Transaction Status into: Finished', '2022-12-12 13:11:34'),
(36, 6, 'Set an Appointment ', '2022-12-12 13:29:38'),
(37, 24, 'Registration Date ', '2022-12-12 22:22:34'),
(38, 7, 'Change Transaction Status into: Ongoing', '2022-12-12 22:44:49'),
(39, 7, 'Send a Cost Estimate ', '2022-12-13 10:04:45'),
(40, 16, 'Change Transaction Status into: Stopped', '2022-12-13 10:28:13'),
(41, 16, 'Change Transaction Status into: Finished', '2022-12-13 10:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `image`) VALUES
(1, 'admin', 'sagunhannaclarisse@gmail.com', 'admin123', ''),
(2, 'admin2', 'cedmartin031@gmail.com', 'admin1234', ''),
(3, 'gabpangan', 'gaebpangan@gmail.com', 'aaa', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `projectLocation` varchar(255) NOT NULL,
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

INSERT INTO `appointment` (`id`, `client_id`, `projectLocation`, `targetConsDate`, `projectType`, `projectImage`, `lotArea`, `numberFloors`, `businessType`, `meetingType`, `meetingLocation`, `image`, `meetingDate`, `meetingTime`, `status`) VALUES
(39, 7, '007 San Pablo Hagonoy Bulacan fsdf', '2022-11-22', 'Residential', '1', '1000 sqm', 'Three-Storey', 'Food and Beverages', 'virtual', '', '', '2022-11-22', '22:45', 'ongoing'),
(64, 16, '1234', '2022-12-19', 'Commercial/Retail Design', '4', '123', 'One-Storey', 'Outsourcing / BPO Offices', 'meetUp', 'Shangri-la', '', '2022-12-21', '15:25', 'ongoing'),
(65, 4, '1234 main st', '2022-12-27', 'Commercial/Retail Design', '4', '123', 'One-Storey', 'Food and Beverages', 'virtual', '', '', '2022-12-29', '15:12', 'ongoing'),
(66, 14, 'adsa', '2022-12-28', '', '4', '1221', 'Three-Storey', 'Retail Store', 'virtual', '', '', '2022-12-25', '13:29', 'ongoing'),
(67, 8, '123', '2022-12-29', 'Mixed-Use', '9', '123123', 'High-rise Storey', 'Sports and Recreation', 'meetUp', 'SM Megamall', '', '2022-12-27', '13:12', 'ongoing'),
(68, 17, 'fffffffff', '2022-12-24', 'Institutional', '1', '212', 'One-Storey', 'Local Business Office', 'meetUp', 'Shangri-la', '../../images/client (1).sql', '2022-12-22', '13:28', 'ongoing'),
(69, 18, 'hahshhd', '2022-12-31', 'Residential', '1', '123', 'One-Storey', 'Outsourcing / BPO Offices', 'meetUp', 'Shangri-la', '', '2022-12-29', '10:17', 'canceled'),
(70, 23, 'hbsdg', '2022-12-31', 'Industrial', '7', '436', 'Three-Storey', 'Retail Store', 'meetUp', 'Shangri-la', '', '2022-12-28', '17:02', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `telephone_no` varchar(255) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'image/user.png',
  `appointment_sched` varchar(255) DEFAULT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `middleName`, `lastName`, `company`, `password`, `email`, `contact_no`, `telephone_no`, `house_no`, `street`, `barangay`, `municipality`, `province`, `image`, `appointment_sched`, `registration_date`, `status`) VALUES
(1, 'Elle', '', 'Pangan', 'gaebpangan', '111', 'gaebpangan@gmail.com', '09066169396', '', '7', 'purok1', 'San Pablo', 'Hagonoy', 'Bulacan', 'image/elle.jpg', '3', '2022-11-30 12:57:57', 'active'),
(2, 'Taylor', '', 'Swift', 'aaa', '123', 'taylor@gmail.com', '09086701605', '', '0007', 'Ricardo St', 'san agustin', 'hagonoy', 'Bulacan', 'image/taytay.jpg', '3', '2022-11-30 12:57:57', 'active'),
(3, 'harold', NULL, 'de leon', 'haroldski', '111', 'harold@gmail.com', '09123456789', '', '77', 'Archins', 'La Residencia', 'Calumpit', 'Bulacan', 'image/user.png', '2', '2022-11-30 12:57:57', 'active'),
(4, 'Ricardo', 'M.', 'Dela Cruz', 'Rickyz', 'ricardo123', 'ricardo123@gmail.com', '09393483201', '0449318992', '25', 'Dona Irenia St. Sucat', 'Warehouse H, Filipinas Benson Compound,', 'Caloocan', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(5, 'Alex', 'K.', 'Dimagiba', 'DMC', 'alex123', 'alex123@gmail.com', '09495813231', '0448917522', '129', 'Aguirre Building', 'Aguire', 'Makati', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(6, 'Rex', 'A.', 'Matias', 'RHS', 'rex123', 'rex00@gmail.com', '09395868909', '0448317622', '31', 'Delta Building', 'Poblacion', 'Navotas', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(7, 'Adrian', 'R.', 'Delo Santos', 'ZKKS', 'adrian123', 'adrian123@gmail.com', '09298957695', '04493165433', '51', 'MC Home Depot, Ortigas Avenue Corner A. Rodriguez Avenue', 'Ibayo', 'Pasig City', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(8, 'Louis', 'A.', 'Zapanta', 'DHL', 'louis123', 'louis00@gmail.com', '09385769875', '0447430768', '58', '810 Oroquieta Street ', 'Ilang ilang', 'San Juan', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(10, 'hanna', '', 'sagun', '', 'U0c$Cb&6', 'sagunhannaclarisse@gmail.com', '09612346285', NULL, '', '', 'Balite', 'calumpit', 'bulacan', 'image/user.png', NULL, '2022-12-05 23:57:10', 'active'),
(14, 'brit', '', 'macahilig', '', '123', 'brit@gmail.com', '09785392001', NULL, '', '', 'sta rita', 'guiguinto', 'bulacan', 'image/user.png', NULL, '2022-12-06 00:17:20', 'active'),
(15, 'Christian', '', 'Aniag', '', 'QMhfk#@D', 'chrisx@gmail.com', '09564319803', NULL, '1', '12', 'Poblacion', 'Bocue', 'Bulacan', 'image/user.png', NULL, '2022-12-08 17:26:16', 'active'),
(16, 'Nathalie', '', 'Sagun', '', 'magnum123', 'nath@gmail.com', '09231769945', NULL, '123', 'Purok 4', 'Balite', 'Calumpit', 'Bulacan', 'image/user.png', NULL, '2022-12-08 22:22:01', 'active'),
(17, 'Jaye', '', 'Junatas', '', '12345678', 'jaye2@gmail.com', '09195463991', NULL, '123', 'Street', 'eme', 'Sta Maria', 'Bulacan', 'image/user.png', NULL, '2022-12-09 23:16:47', 'active'),
(18, 'hanna', '', 'sagun', '', '12345678', '123@gmail.com', '09174378530', NULL, '', '', 'balite', 'calumpit', 'bulacan', 'image/user.png', NULL, '2022-12-10 18:10:17', 'active'),
(23, 'Ced', '', 'Martin', '', '12345678', 'cedmartin@gmail.com', '09357768035', NULL, '', '', 'Balite', 'Malolos', 'Bulacan', 'image/user.png', NULL, '2022-12-12 12:50:29', 'active'),
(24, 'Mikaela', 'J.', 'Reyes', '', '12345678', 'mika@gmail.com', '09274512845', NULL, '123', 'Purok 3', 'Bugion ', 'Calumpit', 'Bulacan', 'image/user.png', NULL, '2022-12-12 22:22:34', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'image/user.png',
  `attempt` int(255) NOT NULL DEFAULT 3,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `middleName`, `lastName`, `username`, `employee_id`, `contactNo`, `email`, `password`, `houseNo`, `street`, `barangay`, `municipality`, `province`, `profile_picture`, `attempt`, `status`) VALUES
(1, 'hanna clarisse', NULL, 'sagun', 'admin', '2018101442', '12345', 'sagunhannaclarisse@gmail.com', 'mori', '167', 'purok4', 'balite', 'calumpit', 'bulacan', 'image/user.png', 3, 'active'),
(2, 'Zach', 'DC.', 'Anderson', 'zach00', '', '09786543489', 'zach00@gmail.com', 'zach123', '32', 'Bagumbayan Street', 'Tambunting', 'Bulakan', 'Bulacan', 'image/user.png', 3, 'active'),
(3, 'Jerwin', 'A.', 'Pascual', 'jerwin00', '', '09896754356', 'jerwin00@gmail.com', 'jerwin123', '32', 'Purok 3', 'Kapitangan', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(4, 'Jefferson', 'K.', 'Cailipan', 'jefferson00', '', '09784138769', 'jefferson00@gmail.com', 'jefferson123', '32', 'Purok 4', 'Kapitangan', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(5, 'Keith', 'M.', 'Balagtas', 'keith00', '', '09786912845', 'keith00@gmail.com', 'keith123', '67', 'Purok 5', 'Longos', 'Malolos', 'Bulacan', 'image/user.png', 3, 'active'),
(6, 'Lincoln', 'M.', 'Arellano', 'lincoln00', '', '09786572967', 'lincoln00@gmail.com', 'lincoln123', '78', 'Purok 1', 'Sto Rosario', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(7, 'Gab', 'G', 'Pangan', 'gabpangan', '1117', '09066169396', 'gaebpangan@gmail.com', 'aaa', '', '', 'san pablo', 'ghgh', 'bulacan', 'image/1aaaa.jpg', 3, 'active'),
(8, 'Brit', 'M', 'Macahilig', 'brit2', '', '092832972', 'brit2@gmail.com', 'peaBkg4b', '123', 'Sitio 1', 'Roxas', 'Macabebe', 'Pampanga', 'image/user.png', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_client`
--

CREATE TABLE `employee_client` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_client`
--

INSERT INTO `employee_client` (`id`, `employee_id`, `client_id`, `status`, `transaction_date`) VALUES
(1, 1, 1, 'ongoing', '2022-11-15 09:57:36'),
(6, 7, 7, 'Ongoing', '2022-11-15 09:57:36'),
(14, 7, 2, 'Finished', '2022-11-22 10:05:43'),
(15, 7, 16, 'Finished', '2022-12-08 22:28:41'),
(19, 7, 4, 'ongoing', '2022-12-09 15:52:02'),
(20, 7, 8, 'ongoing', '2022-12-09 20:12:43'),
(29, 1, 3, 'ongoing', '2022-12-13 00:47:59'),
(32, 7, 23, 'ongoing', '2022-12-13 10:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `feedback` longtext NOT NULL,
  `feedback_status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `client_id`, `feedback`, `feedback_status`, `date`) VALUES
(1, 1, 'Good work!', 'approved', '2022-12-10 10:22:45'),
(2, 16, 'A teammate went above and beyond to deliver work', 'approved', '2022-12-10 10:31:40'),
(3, 18, 'Good quality services and easy to approach. Thanks', 'approved', '2022-12-10 18:19:14'),
(4, 23, 'Minor conflict with schedule, but overall good work.', 'approved', '2022-12-12 13:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `remaining_stock` varchar(255) DEFAULT '0',
  `initial_stock` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `code`, `name`, `image`, `category`, `description`, `remaining_stock`, `initial_stock`, `status`) VALUES
(12, '6363', 'Sementoaur', '../image/cement.jpg', 'Cement', 'sementaur naur!~', '45345435', '45345435', NULL),
(13, '0203', 'Nail', '../image/springnails-1646240990.png', 'Nails', 'Purr', '45345', '45345', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `files` varchar(2555) DEFAULT NULL,
  `costEstimate` varchar(2555) DEFAULT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `client_id`, `employee_id`, `content`, `files`, `costEstimate`, `dateTime`, `status`) VALUES
(19, 7, 7, '[{\"content\":\"hello\",\"dateTime\":\"2022-12-13 03:04:29\",\"sender\":\"employee\",\"type\":\"text\"},{\"content\":\"Cost Estimate has been sent! Kindly Check your profile to view and download\",\"dateTime\":\"2022-12-13 03:04:45\",\"sender\":\"employee\",\"type\":\"text\"}]', NULL, '[{\"content\":\"../../clientEmployeeFiles/COST-ESTIMATES_02142022_FINAL.xlsx\",\"dateTime\":\"2022-12-13 03:04:45\",\"sender\":\"employee\",\"type\":\"costEstimate\"}]', '2022-12-13 10:04:29', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `employee_id`, `client_id`, `title`, `description`, `image`, `dateTime`, `status`) VALUES
(1, 7, 7, 'Onsite ', 'Onsite Clearing Operation', '../../images/site.jpg', '2022-12-07 07:36:53', 'active'),
(3, 7, 7, 'Cleaning', 'Excavation and Structuring', '../../images/building.jpg,../../images/esy-028594966.jpg,../../images/skeleton.jpg', '2022-12-07 07:36:53', 'active'),
(4, 7, 23, 'Project Renovation', 'Finishing toucher', '../../images/house.jpg', '2022-12-12 13:15:16', 'active');

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
(15, 2, 'Dentals Partners Waltermart Malolos[edited from employee]', 'image/Dental Partners Interior Waltermart Malolos1.jpg,image/Dental Partners Interior Waltermart Malolos2.jpg', 'Commercial', 'AEVG Builders \"Dental Partners Walter Malolos Bulacan\" Project Design', '2022-12-05 15:57:32', 'disapproved'),
(16, 2, 'Contemporary Modern House', 'image/Home Project 1.jpg,image/Home Project2.jpg,image/Home Project3.jpg,image/Home Project4.jpg,image/Home Project5.jpg,image/Home Project6.jpg', 'Residentials', 'AEVG Builders \"Contemporary Modern House\" Project\r\n', '2022-12-05 15:57:32', 'disapproved'),
(17, 2, 'House Renovation Project ', 'image/House Project After Sample.jpg,image/House Project Before Sample.jpg', 'Renovation', 'AEVG Builders \" House Renovation\" Project \r\n', '2022-12-05 15:57:32', 'disapproved'),
(21, 2, 'Modern Industrial Office Warehouse', 'image/Modern Industrial Office  Warehouse project1.jpg,image/Modern Industrial Office  Warehouse project2.jpg,image/Modern Industrial Office  Warehouse project3.jpg,image/Modern Industrial Office  Warehouse project4.jpg,image/Modern Industrial Office  War', 'Residentials', 'AEVG Builders \"Modern Industrial Office Warehouse\" Project', '2022-12-05 15:57:32', 'active'),
(22, 2, 'Private Studio x Car Garage', 'image/Private Studio x Car Garage1.jpg,image/Private Studio x Car Garage2.jpg,image/Private Studio x Car Garage3.jpg,image/Private Studio x Car Garage4.jpg,image/Private Studio x Car Garage5.jpg,image/Private Studio x Car Garage6.jpg,image/Private ', 'Modern', 'AEVG Builders \"Private Studio x Car Garage\" Project', '2022-12-05 15:57:32', 'active'),
(23, 2, 'Private Villa x Mini Pool', 'image/Private Villa w Mini Pool1.jpg,image/Private Villa w Mini Pool2.jpg,image/Private Villa w Mini Pool3.jpg', 'Commercial', 'AEVG Builders \" Private Villa With Mini Pool\" Project', '2022-12-05 15:57:32', 'active'),
(24, 2, 'House Renovation ', 'image/Sample Project Design Before.jpg,image/Sample Project Design - after.jpg', 'Renovation', 'AEVG Builders \"House Renovation\" Before and After Project', '2022-12-05 15:57:32', 'active'),
(25, 2, 'The River House', 'image/The River House 2.jpg,image/The River House 3.jpg,image/The river house AEVG.jpg', 'Residentials', 'AEVG Builders \" The River House\" Project\r\n', '2022-12-05 15:57:32', 'active'),
(26, 2, 'The Villa', 'image/The Villa1.jpg,image/The Villa2.jpg,image/The Villa3.jpg,image/The Villa4.jpg,image/The Villa5.jpg,image/The Villa6.jpg', 'Commercial', 'AEVG Builders \"The Villa\" Modern House Project', '2022-12-05 15:57:32', 'active'),
(29, 7, 'Trammel Crow [edited must be pending from disapprove]', 'image/Trammel Crow p2.jpg,image/Trammel Crow p3.jpg', 'Mixed-Use', 'Trammel Crow Mixed Used Building Design', '2022-12-07 09:33:16', 'pending'),
(30, 7, 'Diamond Exchange Capital C Amsterdam', 'image/Diamond Exchange Capital C Amsterdam p2.jpg,image/Diamond Exchange Capital C Amsterdam p3.jpg,image/Diamond Exchange Capital C Amsterdam.jpg', 'Mixed-Use', 'Diamond Exchange Capital C Amsterdam Design Project Sample Mix-Use', '2022-12-08 00:50:02', 'active'),
(31, 7, 'Modern Luxury Fit Out Interior Design', 'image/318010158_5376940712429332_226162005567563280_n.jpg,image/318113635_1620400475058678_6335164246706418311_n.jpg,image/317711152_465410429086482_3626854125691265184_n.jpg,image/317938049_877053209973456_3514142331185492522_n.jpg,image/317851273_821645', 'Interior', 'AEVG Builders Modern Luxury Fit Out Interior Design Project', '2022-12-08 00:58:04', 'active'),
(32, 7, 'Classic Interior blended with Architecture Design', 'image/317427990_677593293930768_4011320582283264647_n.jpg,image/317691148_197897396134244_3244959182798046334_n.jpg,image/317633047_894197404912898_1070835692850732222_n.jpg,image/317622704_891893951807219_7353941289485236904_n.jpg,image/317386052_8674033', 'Interior', 'AEVG Builders Classic Interior blended with Architecture Design Project', '2022-12-08 01:00:32', 'active'),
(33, 7, 'Nursing And Health Science Building', 'image/Nursing And Health Science Building 3.jfif,image/Nursing And Health Science Building.jpg,image/Nursing And Health Science Building 4.jfif', 'Institutional', 'Nursing And Health Science Building Institutional Architecture Sample Design', '2022-12-08 01:04:54', 'active'),
(34, 7, 'Ford Foundation Center for Social Justice', 'image/Ford Foundation Center for Social Justice 1.jfif,image/Ford Foundation Center for Social Justice 2.jfif,image/Ford Foundation Center for Social Justice 3.jfif', 'Institutional', 'Ford Foundation Center for Social Justice Architecture  Sample Design\r\n', '2022-12-08 01:10:15', 'active'),
(35, 7, 'SESC Guarulhos', 'image/SESC Guarulhos 1.jfif,image/SESC Guarulhos 2.jfif,image/SESC Guarulhos 3.jfif', 'Institutional', 'SESC Guarulhos Institutional Architecture Sample  Design\r\n', '2022-12-08 01:12:41', 'active'),
(36, 7, 'A Rural Art Studio / Jumping House Lab', 'image/A Rural Art Studio 2.jpg,image/A Rural Art Studio 3.jpg,image/A Rural Art Studio.jpg', 'Industrial', 'A Rural Art Studio / Jumping House Lab  Sample Design', '2022-12-08 01:17:29', 'active'),
(37, 7, 'Innovative Lab of Architecture & Art / CLAB', 'image/not-ready-innovative-lab-of-architecture-and-art-clab_1.jpg,image/not-ready-innovative-lab-of-architecture-and-art-clab_12.jpg,image/not-ready-innovative-lab-of-architecture-and-art-clab_14.jpg', 'Industrial', 'Innovative Lab of Architecture & Art / CLAB Sample Design', '2022-12-08 01:22:06', 'pending'),
(38, 7, 'Salt WareHouse', 'image/00.jpg,image/01_.jpg,image/11.jpg', 'Industrial', 'Salt Warehouse Industrial Architecture Sample Design', '2022-12-08 01:25:50', 'active'),
(40, 7, 'Municipal Office Interior Renovation.', 'image/291961188_756749295464930_8591588807785145067_n.jpg,image/292111685_160490809852513_4392480535881035513_n.jpg,image/291750488_2114191662092572_1642834166263333867_n.jpg,image/291626283_762444601841490_6280873211821411585_n.jpg,image/291917511_149988', 'Renovation', 'AEVG Builders Municipal Office Interior Renovation Project', '2022-12-08 01:37:23', 'disapproved'),
(41, 7, 'hanna sample [edit]', 'image/mansion.jpg,image/house.jpg', 'Institutional', 'Proper Desc', '2022-12-09 10:27:17', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `project_reaction`
--

CREATE TABLE `project_reaction` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `reaction` varchar(11) NOT NULL DEFAULT 'like'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_reaction`
--

INSERT INTO `project_reaction` (`id`, `client_id`, `project_id`, `reaction`) VALUES
(1, 17, 15, 'like'),
(2, 2, 15, 'like'),
(3, 2, 16, 'like'),
(4, 2, 17, 'like'),
(5, 2, 21, 'like'),
(6, 2, 22, 'like'),
(7, 2, 23, 'like'),
(8, 2, 24, 'like'),
(9, 2, 25, 'like'),
(10, 2, 26, 'like'),
(11, 2, 29, 'like'),
(12, 2, 30, 'like'),
(13, 2, 31, 'like'),
(14, 2, 33, 'like'),
(15, 2, 37, 'like'),
(16, 14, 15, 'like'),
(17, 14, 16, 'like'),
(18, 14, 25, 'like'),
(19, 14, 26, 'like'),
(20, 14, 29, 'like'),
(21, 14, 33, 'like'),
(23, 14, 37, 'like'),
(24, 14, 35, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `materials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`materials`)),
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `employee_id`, `dateStart`, `dateEnd`, `reason`, `status`) VALUES
(1, 1, 1, '2022-09-30 16:38:35', '', 'dasda', 'pending'),
(2, 1, 0, '2022-09-30 16:47:21', '', 'sa wakas huehue', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`company`,`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_client`
--
ALTER TABLE `employee_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientID_clientTbl` (`client_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_reaction`
--
ALTER TABLE `project_reaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_id` (`client_id`,`project_id`),
  ADD KEY `fk_project_reaction` (`project_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_client`
--
ALTER TABLE `employee_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `project_reaction`
--
ALTER TABLE `project_reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
