-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 09:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(40, 2, 'basta don ', '2023-03-08', 'Mixed-Use', '7', '2323 sqm', 'High-rise Storey', 'Food and Beverages, sdasd', 'virtual', '', '../../images/Bandera.jpg', '2022-11-22', '19:23', 'pending');

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
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstName`, `middleName`, `lastName`, `company`, `password`, `email`, `contact_no`, `telephone_no`, `house_no`, `street`, `barangay`, `municipality`, `province`, `image`, `appointment_sched`, `status`) VALUES
(1, 'Elle', '', 'Pangan', 'gaebpangan', '111', 'gaebpangan@gmail.com', '09066169396', '', '7', 'purok1', 'San Pablo', 'Hagonoy', 'Bulacan', 'image/elle.jpg', '3', 'active'),
(2, 'Taylor', '', 'Swift', 'aaa', 'aaa', 'aaa@gmail.com', '09086701605', '', '0007', 'aaa', 'san agustin', 'hagonoy', 'Bulacan', 'image/taytay.jpg', '3', 'active'),
(3, 'harold', NULL, 'de leon', 'haroldski', '111', 'harold@gmail.com', '09123456789', '', '77', 'ewankoe', 'Basta lugar', 'Malapit sa Jeds', 'Bulacan', 'image/user.png', '2', 'active'),
(4, 'Ricardo', 'M.', 'Dela Cruz', 'Rickyz', 'ricardo123', 'ricardo123@gmail.com', '09393483201', '0449318992', '25', 'Dona Irenia St. Sucat', 'Warehouse H, Filipinas Benson Compound,', 'Caloocan', 'Manila', 'image/user.png', NULL, 'active'),
(5, 'Alex', 'K.', 'Dimagiba', 'DMC', 'alex123', 'alex123@gmail.com', '09495813231', '0448917522', '129', 'Aguirre Building', 'Aguire', 'Makati', 'Manila', 'image/user.png', NULL, 'active'),
(6, 'Rex', 'A.', 'Matias', 'RHS', 'rex123', 'rex00@gmail.com', '09395868909', '0448317622', '31', 'Delta Building', 'Poblacion', 'Navotas', 'Manila', 'image/user.png', NULL, 'active'),
(7, 'Adrian', 'R.', 'Delo Santos', 'ZKKS', 'adrian123', 'adrian123@gmail.com', '09298957695', '04493165433', '51', 'MC Home Depot, Ortigas Avenue Corner A. Rodriguez Avenue', 'Ibayo', 'Pasig City', 'Manila', 'image/user.png', NULL, 'active'),
(8, 'Louis', 'A.', 'Zapanta', 'DHL', 'louis123', 'louis00@gmail.com', '09385769875', '0447430768', '58', '810 Oroquieta Street ', 'Ilang ilang', 'San Juan', 'Manila', 'image/user.png', NULL, 'active');

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
  `profile_picture` varchar(255) NOT NULL DEFAULT 'image/user.jpg',
  `attempt` int(255) NOT NULL DEFAULT 3,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `middleName`, `lastName`, `username`, `employee_id`, `contactNo`, `email`, `password`, `houseNo`, `street`, `barangay`, `municipality`, `province`, `profile_picture`, `attempt`, `status`) VALUES
(1, 'hanna clarisse', NULL, 'sagun', 'admin', '2018101442', '12345', 'sagunhannaclarisse1@gmail.com', 'mori', '167', 'purok4', 'balite', 'calumpit', 'bulacan', 'image/user.png', 3, 'block'),
(2, 'Zach', 'DC.', 'Anderson', 'zach00', '', '09786543489', 'zach00@gmail.com', 'zach123', '32', 'Bagumbayan Street', 'Tambunting', 'Bulakan', 'Bulacan', 'image/user.png', 3, 'active'),
(3, 'Jerwin', 'A.', 'Pascual', 'jerwin00', '', '09896754356', 'jerwin00@gmail.com', 'jerwin123', '32', 'Purok 3', 'Kapitangan', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(4, 'Jefferson', 'K.', 'Cailipan', 'jefferson00', '', '09784138769', 'jefferson00@gmail.com', 'jefferson123', '32', 'Purok 4', 'Kapitangan', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(5, 'Keith', 'M.', 'Balagtas', 'keith00', '', '09786912845', 'keith00@gmail.com', 'keith123', '67', 'Purok 5', 'Longos', 'Malolos', 'Bulacan', 'image/user.png', 3, 'active'),
(6, 'Lincoln', 'M.', 'Arellano', 'lincoln00', '', '09786572967', 'lincoln00@gmail.com', 'lincoln123', '78', 'Purok 1', 'Sto Rosario', 'Paombong', 'Bulacan', 'image/user.png', 3, 'active'),
(7, 'Gab', '', 'Pangan', 'gabpangan', '1117', '09066169396', 'gaebpangan@gmail.com', 'aaa', '', '', 'san pablo', 'ghgh', 'bulacan', 'image/1aaaa.jpg', 3, 'active');

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
(6, 7, 7, 'ongoing', '2022-11-15 09:57:36'),
(14, 7, 2, 'ongoing', '2022-11-22 10:05:43');

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
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `client_id`, `employee_id`, `content`, `files`, `dateTime`, `status`) VALUES
(10, 2, 7, '[{\"content\":\"kamusta po\",\"dateTime\":\"2022-11-22 03:47:55\",\"sender\":\"employee\"},{\"content\":\"hello po sir, ako po si taylor!\",\"dateTime\":\"2022-11-22 03:53:40\",\"sender\":\"client\"}]', '[{\"content\":\"../../clientEmployeeFiles/1.jpg,../../clientEmployeeFiles/1rbt1.jpg,../../clientEmployeeFiles/1wing - Copy.jpg\",\"dateTime\":\"2022-11-24 01:02:30\",\"sender\":\"employee\"}]', '2022-11-16 06:54:55', 'delivered'),
(13, 7, 7, '[{\"content\":\"okay lang naman po ako\",\"dateTime\":\"2022-11-22 03:48:05\",\"sender\":\"client\"},{\"content\":\"kamusta naman po ser\",\"dateTime\":\"2022-11-22 03:53:29\",\"sender\":\"employee\"},{\"content\":\"hello po employee\",\"dateTime\":\"2022-11-22 09:01:21\",\"sender\":\"client\"},{\"content\":\"hello po\",\"dateTime\":\"2022-11-22 09:01:38\",\"sender\":\"employee\"}]', '[{\"content\":\"../../clientEmployeeFiles/1wing.jpg,../../clientEmployeeFiles/3f96fe588384a349ec01748d6ae95727.jpg\",\"dateTime\":\"2022-11-24 00:45:26\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/1hhh.jpg,../../clientEmployeeFiles/1wing.jpg\",\"dateTime\":\"2022-11-24 00:46:55\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/1aaaa.jpg,../../clientEmployeeFiles/1anne.jpg\",\"dateTime\":\"2022-11-24 00:50:56\",\"sender\":\"employee\"}]', '2022-11-17 11:04:35', 'delivered');

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
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `employee_id`, `title`, `image`, `category`, `description`, `status`) VALUES
(9, 7, 'Try Ule', 'image/pumpkin.jpg,image/applegreen.jpg,image/tomato.jpg,image/fdbaf44477b9fedde6ca0aaea5ed4208.jpg,image/ea4e6556e4d9fb790c45553909093c7e.jpg', 'Modern', 'asdsad', 'active'),
(10, 7, 'TSB', 'image/93ba7d159ad66371fcd624d9ae516215.jpg,image/117bb5f3f7ef94b804b2e0a61cb334e7.jpg,image/180e9f26f5c35b40d4d94ff9b34d8e0c.jpg', 'Interior', 'try lang mag edit ....', 'active'),
(13, 7, 'dsfsdf', 'image/a5fd2ef1e095e9976b65d87f009a1fdd.jpg,image/ab5593454faf879a5219e3f78cab1986.jpg,image/c0b23e4af3e5ea8cfba2bcd21f38715e.jpg', 'Interior', 'sdfsdf', 'active'),
(14, 7, 'sample lang uli', 'image/0bfdcf4a26a04165fd5673053b50b765.jpg,image/0ef6c28296c63e7a07184dfaedab049c.jpg,image/1c530a79b256f4406633b49e1e1b331e.jpg,image/2ff3e267d4f00f34b3830e4bb72719ce.jpg,image/3bb1db2fc1454432143e08cd67e2126b.jpg', 'Renovate', 'dasdsada', 'active');

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
(12, 2, 10, 'like');

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_client`
--
ALTER TABLE `employee_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_reaction`
--
ALTER TABLE `project_reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_reaction`
--
ALTER TABLE `project_reaction`
  ADD CONSTRAINT `fk_project_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_project_reaction` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
