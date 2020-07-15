-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 03:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `control_budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `plan_id` int(255) NOT NULL,
  `expense_id` int(255) NOT NULL,
  `expense_title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `amount_spent` bigint(255) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `bill` mediumblob NOT NULL,
  `date` date NOT NULL,
  `balance_amount` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person_names`
--

CREATE TABLE `person_names` (
  `pid` int(255) NOT NULL,
  `person_name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plan_details`
--

CREATE TABLE `plan_details` (
  `user_id` int(255) NOT NULL,
  `initial_budget` bigint(255) NOT NULL,
  `people_number` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `plan_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `contact` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'Mani SaiSankar', 'manisss180@gmail.com', '4297f44b13955235245b2497399d7a93', 8919448446),
(4, 'BSP', 'sudhee@gmail.com', '4297f44b13955235245b2497399d7a93', 8919448446),
(5, 'Raj Kumar ', 'prk7102002@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 8919448446),
(8, 'ERROR', 'test1@gmail.com', '4297f44b13955235245b2497399d7a93', 8919448446),
(9, 'ERROR_404', 'test2@gmail.com', '4297f44b13955235245b2497399d7a93', 8919448446),
(10, 'ERROR_401', 'test3@gmail.com', '4297f44b13955235245b2497399d7a93', 8919448446);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `person_names`
--
ALTER TABLE `person_names`
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `plan_details`
--
ALTER TABLE `plan_details`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `plan_details_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `plan_details`
--
ALTER TABLE `plan_details`
  MODIFY `plan_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan_details` (`plan_id`);

--
-- Constraints for table `person_names`
--
ALTER TABLE `person_names`
  ADD CONSTRAINT `person_names_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `plan_details` (`plan_id`);

--
-- Constraints for table `plan_details`
--
ALTER TABLE `plan_details`
  ADD CONSTRAINT `plan_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
