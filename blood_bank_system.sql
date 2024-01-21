-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 09:17 AM
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
-- Database: `blood_bank_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_samples`
--

CREATE TABLE `blood_samples` (
  `id` int(11) NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_samples`
--

INSERT INTO `blood_samples` (`id`, `hospital_id`, `blood_group`) VALUES
(1, 3, 'A+'),
(2, 5, 'O+'),
(3, 5, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `receiver_id`, `blood_group`) VALUES
(1, 2, 'A '),
(2, 2, 'A '),
(3, 2, 'A '),
(4, 2, 'A '),
(5, 2, 'A '),
(6, 2, 'A '),
(7, 2, 'A '),
(8, 2, 'A '),
(9, 2, 'A '),
(10, 2, 'A '),
(11, 2, 'A '),
(12, 2, 'A '),
(13, 2, 'A '),
(14, 2, 'A '),
(15, 2, 'A '),
(16, 2, 'A '),
(17, 2, 'A '),
(18, 2, 'A '),
(19, 2, 'A '),
(20, 2, 'A '),
(21, 2, 'A '),
(22, 2, 'O '),
(23, 2, 'A '),
(24, 2, 'O '),
(25, 2, 'O '),
(26, 2, 'B-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('hospital','receiver') NOT NULL,
  `blood_group` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `blood_group`) VALUES
(1, 'Dr. Ravi ', '$2y$10$eWx03PGMRQ4Q748rN.ou5OvT0Qzhy3xHxMaeMehTQuVGsypBs.lZ.', 'hospital', NULL),
(2, 'rohitc', '$2y$10$61mgcNC2/5L23IRBfQvdaet0/P3nYywhWplKkBkr1bsPxOOR4qwwe', 'receiver', 'A+'),
(3, 'Krushna ', '$2y$10$2r0j23pQQWLb0x1ehKt0YuA2LsG5c8srz6.kvJTlrDtxGR5ejRvE.', 'hospital', NULL),
(5, 'Dr. Jotiba', '$2y$10$UY.PBN5CpeVSgAknYVpMsOKWcPSjMs0QjSIhgfIE.dl/l94Fb/PU6', 'hospital', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_samples`
--
ALTER TABLE `blood_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_samples`
--
ALTER TABLE `blood_samples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_samples`
--
ALTER TABLE `blood_samples`
  ADD CONSTRAINT `blood_samples_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
