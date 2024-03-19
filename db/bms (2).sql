-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `resident_id` int(55) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `resident_id`, `purpose`, `amount`, `issued_date`, `user_id`) VALUES
(00001, 1, ' OJT', '', '2024-03-19', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `resident_id` int(55) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `resident_id`, `purpose`, `amount`, `issued_date`, `user_id`) VALUES
(00001, 1, ' OJT', '', '2024-03-19', 'admin admin');

-- --------------------------------------------------------

--
-- Table structure for table `indigency`
--

CREATE TABLE `indigency` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `resident_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `issued_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indigency`
--

INSERT INTO `indigency` (`id`, `resident_id`, `purpose`, `issued_date`) VALUES
(00001, 00001, 'CERTIFICATION', '2024-03-19'),
(00002, 00001, 'Financial Assistance for the hospitalization of his brother JIMBOY L. TIO who is presently admitted at DOCTORS HOSPITAL, General Santos City.', '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `date_of_birth` date NOT NULL,
  `civil_status` varchar(55) NOT NULL,
  `street` varchar(155) NOT NULL,
  `purok` varchar(155) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `phone_number` varchar(155) NOT NULL,
  `telephone_number` varchar(155) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `nationality` varchar(155) NOT NULL,
  `educational_attainment` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `blood_type` varchar(55) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `del_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `gender`, `date_of_birth`, `civil_status`, `street`, `purok`, `place_of_birth`, `phone_number`, `telephone_number`, `email_address`, `nationality`, `educational_attainment`, `occupation`, `religion`, `blood_type`, `image`, `date_created`, `del_status`) VALUES
(00001, 'Troy', '', 'Garidos', '', 'Male', '1999-11-16', 'Single', '', 'Sitio Balite', 'Gensan City', '09531023180', '', 'test@gmail.com', 'Filipino', 'Elementary', 'IT', 'Catholic', '', 'default.jpeg', '2024-03-19 17:23:34', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `del_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `del_status`) VALUES
(1, 'admin', 'admin', 'admin', ''),
(2, 'Test', 'asdas', 'asdsa', 'deleted'),
(3, 'Test', '123', '123', 'deleted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indigency`
--
ALTER TABLE `indigency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indigency`
--
ALTER TABLE `indigency`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
