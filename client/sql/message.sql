-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 03:02 AM
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
(13, 7, 7, '[{\"content\":\"okay lang naman po ako\",\"dateTime\":\"2022-11-22 03:48:05\",\"sender\":\"client\"},{\"content\":\"kamusta naman po ser\",\"dateTime\":\"2022-11-22 03:53:29\",\"sender\":\"employee\"},{\"content\":\"hello po employee\",\"dateTime\":\"2022-11-22 09:01:21\",\"sender\":\"client\"},{\"content\":\"hello po\",\"dateTime\":\"2022-11-22 09:01:38\",\"sender\":\"employee\"},{\"content\":\"chat jan\",\"dateTime\":\"2022-11-27 04:16:50\",\"sender\":\"employee\"},{\"content\":\"hello\",\"dateTime\":\"2022-11-27 04:18:18\",\"sender\":\"employee\"},{\"content\":\"hello isang order ng 1 piece chicken joy\",\"dateTime\":\"2022-11-28 12:33:07\",\"sender\":\"employee\"},{\"content\":\"asdasd\",\"dateTime\":\"2022-12-05 15:12:54\",\"sender\":\"employee\"},{\"content\":\"asdasd\",\"dateTime\":\"2022-12-05 15:12:54\",\"sender\":\"employee\"},{\"content\":\"hhahahaha\",\"dateTime\":\"2022-12-05 15:26:28\",\"sender\":\"employee\"},{\"content\":\"hhahahaha\",\"dateTime\":\"2022-12-05 15:26:28\",\"sender\":\"employee\"},{\"content\":\"hahaha\",\"dateTime\":\"2022-12-05 15:27:06\",\"sender\":\"employee\"},{\"content\":\"hahaha\",\"dateTime\":\"2022-12-05 15:27:06\",\"sender\":\"employee\"},{\"content\":\"hahahaha\",\"dateTime\":\"2022-12-05 15:28:23\",\"sender\":\"employee\"},{\"content\":\"hahahaha\",\"dateTime\":\"2022-12-05 15:28:23\",\"sender\":\"employee\"},{\"content\":\"hahaha\",\"dateTime\":\"2022-12-05 15:30:53\",\"sender\":\"employee\"},{\"content\":\"hahaha\",\"dateTime\":\"2022-12-05 15:30:54\",\"sender\":\"employee\"},{\"content\":\"doble\",\"dateTime\":\"2022-12-05 15:31:52\",\"sender\":\"employee\"},{\"content\":\"doble\",\"dateTime\":\"2022-12-05 15:31:52\",\"sender\":\"employee\"},{\"content\":\"hehehhe\",\"dateTime\":\"2022-12-05 15:53:46\",\"sender\":\"client\"},{\"content\":\"hi\",\"dateTime\":\"2022-12-05 16:44:40\",\"sender\":\"client\"},{\"content\":\"hahahahah\",\"dateTime\":\"2022-12-05 18:46:15\",\"sender\":\"client\"},{\"content\":\"123\",\"dateTime\":\"2022-12-05 18:48:02\",\"sender\":\"client\"},{\"content\":\"45\",\"dateTime\":\"2022-12-05 18:50:04\",\"sender\":\"client\"},{\"content\":\"12\",\"dateTime\":\"2022-12-05 18:54:12\",\"sender\":\"client\"},{\"content\":\"asd\",\"dateTime\":\"2022-12-05 18:59:13\",\"sender\":\"client\"},{\"content\":\"22\",\"dateTime\":\"2022-12-05 19:05:23\",\"sender\":\"client\"},{\"content\":\"12312\",\"dateTime\":\"2022-12-05 19:05:58\",\"sender\":\"client\"},{\"content\":\"asdasd\",\"dateTime\":\"2022-12-05 19:23:02\",\"sender\":\"employee\"},{\"content\":\"asdasd\",\"dateTime\":\"2022-12-05 19:23:02\",\"sender\":\"employee\"},{\"content\":\"secret\",\"dateTime\":\"2022-12-05 19:23:51\",\"sender\":\"employee\"},{\"content\":\"secret\",\"dateTime\":\"2022-12-05 19:23:51\",\"sender\":\"employee\"},{\"content\":\"asdas\",\"dateTime\":\"2022-12-05 19:27:52\",\"sender\":\"employee\"},{\"content\":\"oki\",\"dateTime\":\"2022-12-05 19:28:31\",\"sender\":\"employee\"},{\"content\":\"oki\",\"dateTime\":\"2022-12-05 19:28:31\",\"sender\":\"employee\"},{\"content\":\"haha\",\"dateTime\":\"2022-12-05 19:30:23\",\"sender\":\"employee\"},{\"content\":\"haha\",\"dateTime\":\"2022-12-05 19:30:23\",\"sender\":\"employee\"},{\"content\":\"faafa\",\"dateTime\":\"2022-12-05 19:31:37\",\"sender\":\"employee\"},{\"content\":\"work\",\"dateTime\":\"2022-12-06 02:51:03\",\"sender\":\"employee\"},{\"content\":\"work\",\"dateTime\":\"2022-12-06 02:51:03\",\"sender\":\"employee\"}]', '[{\"content\":\"../../clientEmployeeFiles/3.jpg\",\"dateTime\":\"2022-11-29 10:53:02\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/namjin.jpg\",\"dateTime\":\"2022-11-29 11:01:49\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/a.jpg,../../clientEmployeeFiles/steven.jpg\",\"dateTime\":\"2022-11-30 08:00:16\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/Sample_resignation_letter_1.doc\",\"dateTime\":\"2022-11-30 12:57:59\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-01 16:56:31\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-01 16:56:51\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/0ef6c28296c63e7a07184dfaedab049c.jpg\",\"dateTime\":\"2022-12-02 06:42:24\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/PLOTTING1.docx\",\"dateTime\":\"2022-12-05 09:55:48\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/3.jpg\",\"dateTime\":\"2022-12-05 15:30:49\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/3.jpg\",\"dateTime\":\"2022-12-05 15:30:49\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:30:53\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:30:54\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:31:52\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:31:52\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/QUESTIONNAIRE.docx\",\"dateTime\":\"2022-12-05 19:24:20\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/QUESTIONNAIRE.docx\",\"dateTime\":\"2022-12-05 19:24:20\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 19:30:23\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 19:30:23\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/BSIT-Capstone_.docx\",\"dateTime\":\"2022-12-05 19:32:10\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/applegreen.jpg,../../clientEmployeeFiles/pumpkin.jpg\",\"dateTime\":\"2022-12-06 02:51:33\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/applegreen.jpg,../../clientEmployeeFiles/pumpkin.jpg\",\"dateTime\":\"2022-12-06 02:51:33\",\"sender\":\"employee\"}]', '[{\"content\":\"\",\"dateTime\":\"2022-12-05 19:30:23\",\"sender\":\"employee\"}]', '2022-11-17 11:04:35', 'delivered'),
(16, 2, 7, '[{\"content\":\"hello\",\"dateTime\":\"2022-11-24 18:40:43\",\"sender\":\"client\"},{\"content\":\"hello client\",\"dateTime\":\"2022-11-27 13:04:22\",\"sender\":\"employee\"},{\"content\":\"hello po uli\",\"dateTime\":\"2022-11-27 13:04:56\",\"sender\":\"employee\"},{\"content\":\"hello po\",\"dateTime\":\"2022-11-30 14:03:14\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-11-30 14:04:05\",\"sender\":\"employee\"},{\"content\":\"gagaga\",\"dateTime\":\"2022-12-05 15:29:39\",\"sender\":\"employee\"},{\"content\":\"gagaga\",\"dateTime\":\"2022-12-05 15:29:39\",\"sender\":\"employee\"}]', '[{\"content\":\"../../clientEmployeeFiles/2.jpg\",\"dateTime\":\"2022-11-29 10:47:44\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/1ha.jpg,../../clientEmployeeFiles/1hhh.jpg\",\"dateTime\":\"2022-11-29 10:48:10\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-11-30 14:03:13\",\"sender\":\"employee\"},{\"content\":\"../../clientEmployeeFiles/springnails-1646240990.png,../../clientEmployeeFiles/cement.jpg\",\"dateTime\":\"2022-11-30 14:04:05\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:29:38\",\"sender\":\"employee\"},{\"content\":\"\",\"dateTime\":\"2022-12-05 15:29:39\",\"sender\":\"employee\"}]', NULL, '2022-11-25 01:40:43', 'delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
