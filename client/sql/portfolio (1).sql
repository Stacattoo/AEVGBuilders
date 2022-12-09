-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 03:25 AM
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
(1, 7, 7, 'Sample Title', 'sample description', '../../images/3.jpg,../../images/599622d6b0cc15ba4ab412dbeaa0e037.jpg,../../images/a7d4a3657a4e67cdd004d0477d9e920c.jpg,../../images/1c530a79b256f4406633b49e1e1b331e.jpg,../../images/0bfdcf4a26a04165fd5673053b50b765.jpg,../../images/2ff3e267d4f00f34b3830e4bb72719ce.jpg,../../images/26e0ea1bf90c767dd8f2448328fdd3d1.jpg,../../images/18d94080935c12074217fb469ae635e8.jpg,../../images/500.jpg,../../images/77fc8044dd39e7f268fb8d92593b0948.jpg', '2022-12-07 07:36:53', 'active'),
(3, 7, 7, 'Sabi ko e', 'hahahaha', '../../images/4619ead815fa3bf162aa642985d22f5c.jpg,../../images/1075055.png', '2022-12-07 07:36:53', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
