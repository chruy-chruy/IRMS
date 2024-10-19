-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 04:01 PM
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
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `grade_level`, `teacher_id`, `del_status`) VALUES
(2, 'Molave', '7', '00004', 'active'),
(3, 'Narra', '7', '00003', 'active'),
(5, 'Mahogani', '7', '00005', 'active');

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
(1, 'Jhon', '', 'Doe', '', 'Male', 24, 'Purok 15 Zone 4 Lagao. General Santos City', '09531023180', '1999-11-16', 'Maitum Sarangani', 'filipino', 'catholic', 'Tedmer Garidos', 'Mechanic', '09123455678', 'Mary Ann Garidos', 'Sales Agent', '09123456678', '', '', 'Balite Elementary School', 'Balite Lagao General Santos City', '2012', 'Jhon123@gmail.com', '7', '12312312', '2', '', '', '', '', '', 'jhondoe644', 'active'),
(2, 'Asd', '', 'Ad', NULL, 'Male', 24, 'Purok 15 Zone 4 Lagao. General Santos City', '09531023180', '1999-12-11', 'Maitum Sarangani', 'filipino', 'catholic', '', '', '', '', '', '', '', '', '', '', '', 'garidostroymichael@gmail.com', '7', '12312312', '2', '', '', '', '', 'garidostroymichael@gmail.com', '', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `code`, `name`, `details`, `teacher_id`, `del_status`) VALUES
(1, 'E123', 'English', '', '00003', 'active'),
(2, 'M123', 'Math', '', '', 'deleted'),
(3, 'PE123', 'PE', '', '00004', 'active'),
(4, 'SC101', 'Science', '', '00003', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
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
(00003, 'Troy', 'Ancino', 'Garidos', '', 'garidostroymichael@gmail.com', 'Male', '0912354688', 'garidostroymichael@gmail.com', 'troygaridos515', '2024-10-04 00:35:13', 'active'),
(00004, 'Juan', '', 'Dela Cruz', '', 'Juan@gmail.com', 'Male', '09269883740', 'Juan@gmail.com', 'juandela cruz498', '2024-10-16 21:37:26', 'active'),
(00005, 'Cardo', '', 'Dalisay', '', 'cardo@gmail.com', 'Male', '09531023180', 'cardo@gmail.com', 'cardodalisay555', '2024-10-19 21:08:29', 'active');

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
(3, 'Test', '123', '123', 'deleted'),
(4, 'test', '1234', 'admin', '');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
