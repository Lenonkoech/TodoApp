-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Mar 29, 2024 at 02:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp`
--
CREATE DATABASE
IF NOT EXISTS `todoapp` DEFAULT CHARACTER
SET utf8mb4
COLLATE utf8mb4_general_ci;
USE `todoapp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin`
(
  `id` int
(11) NOT NULL,
  `Name` varchar
(70) DEFAULT NULL,
  `username` varchar
(70) DEFAULT NULL,
  `Email` varchar
(256) DEFAULT NULL,
  `password` varchar
(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories`
(
  `id` int
(11) NOT NULL,
  `category` varchar
(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`
id`,
`category
`) VALUES
(1, 'personal'),
(2, 'shopping'),
(3, 'work'),
(4, 'errands'),
(5, 'projects');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks`
(
  `id` int
(11) NOT NULL,
  `user_id` int
(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` varchar
(400) DEFAULT NULL,
  `category` varchar
(200) DEFAULT NULL,
  `Status` varchar
(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`
id`,
`user_id
`, `start_date`, `end_date`, `description`, `category`, `Status`) VALUES
(2, 1, '2023-02-03', '2023-02-23', 'Hello world', 'personal', 'pending'),
(3, 1, '2024-03-27', '2024-03-29', 'Finish bash scripting', 'Work', 'pending'),
(4, 1, '2024-03-29', '2024-03-29', 'Buying groceries', 'Shopping', 'pending'),
(5, 1, '2024-03-28', '2024-04-06', 'Create a to-do-list App', 'Projects', 'pending'),
(6, 1, '2024-05-31', '2024-04-05', 'Pay house rent', 'Errands', 'pending'),
(10, 1, '2024-03-28', '2024-04-01', 'Create employee pay slips', 'Work', 'pending'),
(11, 1, '2024-03-26', '2024-03-27', 'Do homework', 'personal', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users`
(
  `id` int
(11) NOT NULL,
  `Name` varchar
(70) DEFAULT NULL,
  `username` varchar
(70) DEFAULT NULL,
  `Email` varchar
(256) DEFAULT NULL,
  `password` varchar
(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`
id`,
`Name
`, `username`, `Email`, `password`) VALUES
(1, 'user', 'user', 'user@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `username`
(`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
ADD PRIMARY KEY
(`id`),
ADD KEY `user_id`
(`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY
(`id`),
ADD UNIQUE KEY `username`
(`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY
(`user_id`) REFERENCES `users`
(`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
