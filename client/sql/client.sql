-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:51 PM
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
(2, 'Taylor', '', 'Swift', 'aaa', '123', 'aaa@gmail.com', '09086701605', '', '0007', 'aaa', 'san agustin', 'hagonoy', 'Bulacan', 'image/taytay.jpg', '3', '2022-11-30 12:57:57', 'active'),
(3, 'harold', NULL, 'de leon', 'haroldski', '111', 'harold@gmail.com', '09123456789', '', '77', 'ewankoe', 'Basta lugar', 'Malapit sa Jeds', 'Bulacan', 'image/user.png', '2', '2022-11-30 12:57:57', 'active'),
(4, 'Ricardo', 'M.', 'Dela Cruz', 'Rickyz', 'ricardo123', 'ricardo123@gmail.com', '09393483201', '0449318992', '25', 'Dona Irenia St. Sucat', 'Warehouse H, Filipinas Benson Compound,', 'Caloocan', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(5, 'Alex', 'K.', 'Dimagiba', 'DMC', 'alex123', 'alex123@gmail.com', '09495813231', '0448917522', '129', 'Aguirre Building', 'Aguire', 'Makati', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(6, 'Rex', 'A.', 'Matias', 'RHS', 'rex123', 'rex00@gmail.com', '09395868909', '0448317622', '31', 'Delta Building', 'Poblacion', 'Navotas', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(7, 'Adrian', 'R.', 'Delo Santos', 'ZKKS', 'adrian123', 'adrian123@gmail.com', '09298957695', '04493165433', '51', 'MC Home Depot, Ortigas Avenue Corner A. Rodriguez Avenue', 'Ibayo', 'Pasig City', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(8, 'Louis', 'A.', 'Zapanta', 'DHL', 'louis123', 'louis00@gmail.com', '09385769875', '0447430768', '58', '810 Oroquieta Street ', 'Ilang ilang', 'San Juan', 'Manila', 'image/user.png', NULL, '2022-11-30 12:57:57', 'active'),
(10, 'hanna', '', 'sagun', '', 'XyW42r&n', 'sagunhannaclarisse@gmail.com', '123', NULL, '', '', 'Balite', 'calumpit', 'bulacan', 'image/user.png', NULL, '2022-12-05 23:57:10', 'active'),
(14, 'brit', '', 'macahilig', '', '123', 'brit@gmail.com', '123456', NULL, '', '', 'sta rita', 'guiguinto', 'bulacan', 'image/user.png', NULL, '2022-12-06 00:17:20', 'active'),
(15, 'Christian', '', 'Aniag', '', 'xtianemard', 'sjdsjfbsf@gmail.com', '12345', NULL, '1', '12', '123', '12345', '123456', 'image/user.png', NULL, '2022-12-08 17:26:16', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`company`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
