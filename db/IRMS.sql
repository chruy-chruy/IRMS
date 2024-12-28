-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 07:39 PM
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
-- Database: `irms`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `1st_monday` varchar(100) NOT NULL,
  `2nd_monday` varchar(100) NOT NULL,
  `3rd_monday` varchar(100) NOT NULL,
  `4th_monday` varchar(100) NOT NULL,
  `5th_monday` varchar(100) NOT NULL,
  `6th_monday` varchar(100) NOT NULL,
  `7th_monday` varchar(100) NOT NULL,
  `1st_tuesday` varchar(100) NOT NULL,
  `2nd_tuesday` varchar(100) NOT NULL,
  `3rd_tuesday` varchar(100) NOT NULL,
  `4th_tuesday` varchar(100) NOT NULL,
  `5th_tuesday` varchar(100) NOT NULL,
  `6th_tuesday` varchar(100) NOT NULL,
  `7th_tuesday` varchar(100) NOT NULL,
  `1st_wednesday` varchar(100) NOT NULL,
  `2nd_wednesday` varchar(100) NOT NULL,
  `3rd_wednesday` varchar(100) NOT NULL,
  `4th_wednesday` varchar(100) NOT NULL,
  `5th_wednesday` varchar(100) NOT NULL,
  `6th_wednesday` varchar(100) NOT NULL,
  `7th_wednesday` varchar(100) NOT NULL,
  `1st_thursday` varchar(100) NOT NULL,
  `2nd_thursday` varchar(100) NOT NULL,
  `3rd_thursday` varchar(100) NOT NULL,
  `4th_thursday` varchar(100) NOT NULL,
  `5th_thursday` varchar(100) NOT NULL,
  `7th_thursday` varchar(100) NOT NULL,
  `1st_friday` varchar(100) NOT NULL,
  `2nd_friday` varchar(100) NOT NULL,
  `3rd_friday` varchar(100) NOT NULL,
  `4th_friday` varchar(100) NOT NULL,
  `5th_friday` varchar(100) NOT NULL,
  `6th_friday` varchar(100) NOT NULL,
  `7_friday` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `grade_level` int(5) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `grade_level`, `teacher_id`, `del_status`) VALUES
(1, 'Molave', 7, '1', 'active'),
(2, 'Narra', 7, '2', 'active'),
(3, 'Mahogani', 7, '3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_contact` varchar(20) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_contact` varchar(20) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_contact` varchar(20) DEFAULT NULL,
  `elementary_name` varchar(255) DEFAULT NULL,
  `elementary_address` varchar(255) DEFAULT NULL,
  `elementary_year` varchar(4) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `grade_level` varchar(50) NOT NULL,
  `lrn_number` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  `grade7_section` varchar(100) DEFAULT NULL,
  `grade8_section` varchar(100) DEFAULT NULL,
  `grade9_section` varchar(100) DEFAULT NULL,
  `grade10_section` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `gender`, `age`, `address`, `contact_number`, `birthdate`, `birthplace`, `nationality`, `religion`, `father_name`, `father_occupation`, `father_contact`, `mother_name`, `mother_occupation`, `mother_contact`, `guardian_name`, `guardian_contact`, `elementary_name`, `elementary_address`, `elementary_year`, `email`, `grade_level`, `lrn_number`, `section`, `grade7_section`, `grade8_section`, `grade9_section`, `grade10_section`, `username`, `password`, `del_status`) VALUES
(1, 'Student', '', 'Last', '', 'Male', 15, 'Purok 15 Zone 4 Lagao. General Santos City', '09531023180', '2010-02-11', 'asd', 'asd', 'ads', '', '', '', '', '', '', '', '', '', '', '', 'test@gmail.com', '8', '12313', '1', '', '', '', '', '12313', 'studentlast252', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `grade_level`, `name`, `details`, `teacher_id`, `del_status`) VALUES
(1, 'Science 7', '7', 'Science', '', '1', 'active'),
(2, 'English 7', '', 'English', '', '1', 'active'),
(3, 'Math 7', '', 'Math', '', '1', 'active'),
(4, 'History 7', '', 'History', '', '2', 'active'),
(5, 'Music 7', '', 'Music', '', '3', 'active'),
(6, 'PE 7', '', 'PE', '', '2', 'active'),
(7, 'Art 7', '', 'Art', '', '3', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(100) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `del_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `email`, `gender`, `contact_number`, `username`, `password`, `date_created`, `del_status`) VALUES
(1, 'Cheryl', '', 'Dela Cerna', '', 'Cheryl@gmail.com', 'Female', '09531023180', 'Cheryl@gmail.com', 'cheryldela cerna260', '2024-10-24 23:23:51', 'active'),
(2, 'Sharon', '', 'Calida', '', 'Sharon@gmail.com', 'Female', '09531023180', 'Sharon@gmail.com', 'sharoncalida591', '2024-11-30 23:40:58', 'active'),
(3, 'Momina', '', 'Mutin', '', 'Momina@gmai.com', 'Female', '09568755542', 'Momina@gmai.com', 'mominamutin535', '2024-12-28 23:51:58', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `del_status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `name`, `del_status`) VALUES
(1, 'admin', 'admin', 'administrator', 'Super Admin', ''),
(4, 'test', '1234', 'Administrator', '', 'deleted'),
(5, 'Test@gmail.com', '123', 'registrar', 'Juan Dela Cruz', ''),
(6, 'Troy123', '123', 'registrar', 'Troy Garidos', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
