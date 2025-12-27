-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2025 at 06:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gear_guard`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_catgory`
--

CREATE TABLE `equipment_catgory` (
  `eq_cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipment_master`
--

CREATE TABLE `equipment_master` (
  `eq_id` int(11) NOT NULL,
  `eq_cat_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `used_by` varchar(50) NOT NULL,
  `maintaining_team` int(11) NOT NULL,
  `assign_date` date NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `scrap_date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `work_center` varchar(50) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forget_password_master`
--

CREATE TABLE `forget_password_master` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `token_expiry` timestamp NOT NULL DEFAULT current_timestamp(),
  `used` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forget_password_master`
--

INSERT INTO `forget_password_master` (`id`, `email`, `reset_token`, `token_expiry`, `used`) VALUES
(1, 'patelaryan5636@gmail.com', 'f5c78e95826ea8a916b4f5f428ab7e99f4d6d09434596b53d8fc5aed0052a440da4254bfc795c1b423f0f57a19ed7caabac3', '2025-03-09 14:08:39', 0),
(2, 'patelaryan5636@gmail.com', 'cef666171453fa120c34663d665579e2d77daf740ba727bab64966abd8264b84fe2461ec1f9c01acbb6fec243d03328b0aed', '2025-03-09 14:35:39', 1),
(3, 'patelaryan5636@gmail.com', 'de51299f19e015d4c0b593f7f88478056ddd057fd8a379ffed7193b73c9ba17d5b5b5bd8eddf8340a05082f8dfec530529f3', '2025-03-09 15:33:06', 1),
(4, 'patelaryan5636@gmail.com', 'e9f77a1cf448425737ebc434f798adb5f89a259db03f8c5e27699aad3d74350b024cbd81bdea742dde77d85145663ae61419', '2025-03-09 15:45:13', 1),
(5, 'patelaryan5636@gmail.com', 'e5be034d5578d26d139076263d79dd39fcde0f7b07c5dba7f75c2df4709a5f527fbfc9c7dfa1da56cf973ad5bdb5060d35ac', '2025-03-09 15:48:23', 1),
(6, 'patelaryan5636@gmail.com', 'ba40846c1a808cf620151ee5696a7572aacd07451a4f1e5e39083b786d3794fd1d644b700c4e49418c14e3e6c7b01cf1795f', '2025-03-10 00:16:56', 1),
(7, 'patelaryan5636@gmail.com', 'e065d8fc589b7ac06bfbc63999c40dc13aee4e99f852b2d34e61e72b54a672e2fa89640c3d644898d367d67e73f90528bedf', '2025-03-10 00:24:44', 0),
(8, 'patelaryan5636@gmail.com', '67d9b228a909c3c76295820941d696e7ec652276bef17f2f58a0ea8b21cde366bd240a8bbae56b280b82aaf75a2caa30034d', '2025-03-10 00:29:26', 1),
(9, 'patelaryan5636@gmail.com', '558f254d25699bcdd02300b6333a443177778a2ae576c614eadd7e23d5613a1723c8427494a5331808b5feb5f1bd66b16a10', '2025-03-10 01:52:52', 0),
(10, 'sachaniaryan675@gmail.com', '9801ed64d1383ebbaac68a3e863f65b69422a518c8355d11f647db35b17c99f4444b8b848ed21a11a87a0546daac1d54e7a7', '2025-03-10 16:50:58', 0),
(11, 'patelaryan5636@gmail.com', '5f30a90c5712d7ed81a946d69798100a888cbc5d4ab6a23dad20990004686a6e5a604bfc7a8f1f5f9945f86a83ec78f052c0', '2025-03-12 09:38:11', 1),
(12, 'patelaryan5636@gmail.com', '8e0933b750aea3e9db71ddce49801a6461a8d766b7a212d471dfdd8be1f9d2aa9d88a0957dbd40231484b39cdce56a6d96c4', '2025-12-26 13:02:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_request`
--

CREATE TABLE `maintenance_request` (
  `req_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `maintenance_for` int(11) NOT NULL,
  `equipment_name` int(11) NOT NULL,
  `catogery_name` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `maintance_type` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `technician_name` varchar(50) NOT NULL,
  `schedule_date` date NOT NULL,
  `req_stage` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_team`
--

CREATE TABLE `maintenance_team` (
  `team_id` int(11) DEFAULT NULL,
  `team_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `email`, `otp`, `created_at`) VALUES
(41, '21012250410087@ljku.edu.in', '1387', '2025-03-10 19:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `technician_grp`
--

CREATE TABLE `technician_grp` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `is_confirmed` int(11) NOT NULL DEFAULT 0,
  `is_sucess` int(11) NOT NULL DEFAULT 0,
  `user_role` int(11) NOT NULL DEFAULT 3,
  `joined_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `email`, `password`, `is_verified`, `is_confirmed`, `is_sucess`, `user_role`, `joined_date`) VALUES
(19, 'user1', 'patelaryan5636@gmail.com', '$2y$10$UlzdN801Uk8GPrxx6pQfquoo2DQ.gBqwihLNhwTvuNRDf0tcDtW4y', 1, 0, 0, 3, '2025-03-31'),
(20, 'user2', 'sachaniaryan675@gmail.com', '$2y$10$8e1qrzP7Vc36Hh7ro646VuPioya3DcCbOvdk8BaxWfpIdrQp22vd2', 1, 0, 0, 3, '2025-03-31'),
(21, 'hotel1', 'mihiramin99@gmail.com', '$2y$10$TEobH91y6SahCvub2z384.PWyH5S4c0qQYLq2/PEuTdnBdbLXOR0a', 1, 0, 1, 4, '2025-03-31'),
(22, 'hotel2', 'aminmihir55@gmail.com', '$2y$10$3E6z8./QhFdNKqY0MK3r8.m7wnayV3W5TnjPwcSnjpLUij9L9Zxpi', 1, 0, 1, 4, '2025-03-31'),
(23, 'store1', 'priyanshu2512a@gmail.com', '$2y$10$jbPPoef3Fc3lzXHAXSRfMe9BmBHXa6X0n3i1lLOGkHtgiIwV./EDe', 1, 0, 1, 5, '2025-03-31'),
(24, 'store2', 'priyanshu4043a@gmail.com', '$2y$10$sfW2mjlr0Vtvc4q5hQ3mMOqG.zABLSNiKb2OJypIXQvbpc0LXA0Ie', 1, 0, 1, 5, '2025-03-31'),
(25, 'guide1', 'guide1@gmail.com', '$2y$10$NtA99qLWDYxADRHEsXx0KeiP/TpT/.pocSpeVkRGpoKBJL0JHcSHW', 1, 0, 1, 2, '2025-03-31'),
(26, 'guide2', 'guide2@gmail.com', '$2y$10$UNsDlVaCMsi1a/G8/r0rk.6GJnbeKl.r.Rt0E2QesMYz0Sh8.lYG2', 1, 0, 1, 2, '2025-03-31'),
(27, 'hotel3', 'musify868@gmail.com', '$2y$10$dVcXDRHlhuDehZHvgUU1WO6/q8AvfTSss2vRBI9owSIpscV5wR5dm', 1, 0, 1, 4, '2025-03-31'),
(28, 'admin1', 'admin1@gmail.com', '$2y$10$pPG0vPf1KAIgBfNzOZt9bO./mDzHB3wfTKGDa83ftRm7VHR0nCxKK', 1, 0, 0, 1, '2025-03-31'),
(29, 'admin2', 'admin2@gmail.com', '$2y$10$e4n5fdoIme18kwscL67lduPwfYHgEYMPxYcr6f7CqmR8rfXgWfEJ2', 1, 0, 0, 1, '2025-03-31'),
(30, 'admin3', 'admin3@gmail.com', '$2y$10$JtIFNrIOeIJ2Zfi7w4Ixme//vt2o3hf5l/mbTQjD.31jDJMbMpeU2', 1, 0, 0, 1, '2025-03-31'),
(31, 'hotel4', 'hoteltest@gmail.com', '$2y$10$AB6Q8KBvCcdbYZ4voEfBe.0RVFJjhqUL6oVkUrstKjWG7h9n0/.uq', 1, 0, 1, 4, '2025-03-31'),
(33, 'aryanpatel', 'rangatprajapatii@gmail.com', '$2y$10$QMS.p49q6beFteVERngRD.y4eISwB9TNoSLND6JYboogNrZ//sCo.', 1, 0, 0, 3, '2025-12-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_catgory`
--
ALTER TABLE `equipment_catgory`
  ADD PRIMARY KEY (`eq_cat_id`);

--
-- Indexes for table `equipment_master`
--
ALTER TABLE `equipment_master`
  ADD PRIMARY KEY (`eq_id`);

--
-- Indexes for table `forget_password_master`
--
ALTER TABLE `forget_password_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `maintenance_team`
--
ALTER TABLE `maintenance_team`
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_catgory`
--
ALTER TABLE `equipment_catgory`
  MODIFY `eq_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment_master`
--
ALTER TABLE `equipment_master`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forget_password_master`
--
ALTER TABLE `forget_password_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `maintenance_request`
--
ALTER TABLE `maintenance_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
