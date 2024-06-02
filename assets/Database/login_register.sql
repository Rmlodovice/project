-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 03:46 PM
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
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `receiptNumber` int(255) NOT NULL,
  `receiptValue` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `email`, `receiptNumber`, `receiptValue`) VALUES
(1, 'randellmaire@gmail.com', 123455677, 500),
(2, 'randellmaire@gmail.com', 1234567, 1000),
(3, 'testing@gmail.com', 150001, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`) VALUES
(8, 'Randell Maire Lodovice', 'randellmaire@gmail.com', '$2y$10$fXyYYO/Nr28xxzb5F1TEt.QTljOEQi0qrWtceGqKrn4mtlzwyokUK'),
(10, 'Earl Tuyor', 'earltyront@gmail.com', '$2y$10$pa5WbrHyzU3s.OaA7URi3OBqzBnCR/5QiRtyzUP.zYOsUFZreqzR.'),
(11, 'Keith Dela Cruz', 'keithdelacruz@gmail.com', '$2y$10$7SpHoM48RqoHnsfVRJQwmeTzaMOBwID4huUQQ72E8D8rNAH1qx.cy'),
(12, 'Rogin Dale Lercana', 'rogindale.lercana@gmail.com', '$2y$10$n9vYJ/iF/nhgjc088QL0luOFO0.b06aN/NJa6vIpwkT9c/6gQaNVm'),
(13, 'Ryan Mendez', 'ryan.seno66@gmail.com', '$2y$10$6g4uu5GpEx9pHwyAfpndsOheDfFeFpbFOVv9aEiMTjadv73LAA4I6'),
(16, 'Randell Maire Lodovice', 'lodovicerandell@gmail.com', '$2y$10$m/iMdXdbblIKNRPxYVGp3OnW0nSaamYcQwYuYkg0OQ9XeHuugplm.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
