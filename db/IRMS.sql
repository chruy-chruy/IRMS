-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2025 at 09:22 AM
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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `section_id` varchar(100) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `subject_id`, `section_id`, `teacher_id`, `quarter`, `grade`, `remarks`, `added_at`) VALUES
(8, '2', '1', '1', '1', '1', '90', '', '2025-03-09 16:30:44'),
(9, '2', '1', '1', '1', '2', '86', '', '2025-03-09 16:31:09'),
(10, '2', '1', '1', '1', '3', '89', '', '2025-03-09 16:34:36'),
(11, '2', '1', '1', '1', '4', '75', '', '2025-03-09 16:34:38'),
(12, '2', '2', '1', '1', '1', '97', '', '2025-03-09 16:46:55'),
(13, '2', '2', '1', '1', '2', '86', '', '2025-03-09 16:46:59'),
(14, '2', '2', '1', '1', '3', '76', '', '2025-03-09 16:47:05'),
(15, '2', '2', '1', '1', '4', '87', '', '2025-03-09 16:47:09'),
(16, '2', '8', '1', '1', '1', '87', '', '2025-03-10 07:57:24'),
(17, '2', '8', '1', '1', '2', '90', '', '2025-03-10 08:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `1st_monday` varchar(100) NOT NULL,
  `2nd_monday` varchar(100) NOT NULL,
  `3rd_monday` varchar(100) NOT NULL,
  `4th_monday` varchar(100) NOT NULL,
  `5th_monday` varchar(100) NOT NULL,
  `6th_monday` varchar(100) NOT NULL,
  `7th_monday` varchar(100) NOT NULL,
  `8th_monday` varchar(100) NOT NULL,
  `1st_tuesday` varchar(100) NOT NULL,
  `2nd_tuesday` varchar(100) NOT NULL,
  `3rd_tuesday` varchar(100) NOT NULL,
  `4th_tuesday` varchar(100) NOT NULL,
  `5th_tuesday` varchar(100) NOT NULL,
  `6th_tuesday` varchar(100) NOT NULL,
  `7th_tuesday` varchar(100) NOT NULL,
  `8th_tuesday` varchar(100) NOT NULL,
  `1st_wednesday` varchar(100) NOT NULL,
  `2nd_wednesday` varchar(100) NOT NULL,
  `3rd_wednesday` varchar(100) NOT NULL,
  `4th_wednesday` varchar(100) NOT NULL,
  `5th_wednesday` varchar(100) NOT NULL,
  `6th_wednesday` varchar(100) NOT NULL,
  `7th_wednesday` varchar(100) NOT NULL,
  `8th_wednesday` varchar(100) NOT NULL,
  `1st_thursday` varchar(100) NOT NULL,
  `2nd_thursday` varchar(100) NOT NULL,
  `3rd_thursday` varchar(100) NOT NULL,
  `4th_thursday` varchar(100) NOT NULL,
  `5th_thursday` varchar(100) NOT NULL,
  `6th_thursday` varchar(100) NOT NULL,
  `7th_thursday` varchar(100) NOT NULL,
  `8th_thursday` varchar(100) NOT NULL,
  `1st_friday` varchar(100) NOT NULL,
  `2nd_friday` varchar(100) NOT NULL,
  `3rd_friday` varchar(100) NOT NULL,
  `4th_friday` varchar(100) NOT NULL,
  `5th_friday` varchar(100) NOT NULL,
  `6th_friday` varchar(100) NOT NULL,
  `7th_friday` varchar(100) NOT NULL,
  `8th_friday` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `section`, `quarter`, `1st_monday`, `2nd_monday`, `3rd_monday`, `4th_monday`, `5th_monday`, `6th_monday`, `7th_monday`, `8th_monday`, `1st_tuesday`, `2nd_tuesday`, `3rd_tuesday`, `4th_tuesday`, `5th_tuesday`, `6th_tuesday`, `7th_tuesday`, `8th_tuesday`, `1st_wednesday`, `2nd_wednesday`, `3rd_wednesday`, `4th_wednesday`, `5th_wednesday`, `6th_wednesday`, `7th_wednesday`, `8th_wednesday`, `1st_thursday`, `2nd_thursday`, `3rd_thursday`, `4th_thursday`, `5th_thursday`, `6th_thursday`, `7th_thursday`, `8th_thursday`, `1st_friday`, `2nd_friday`, `3rd_friday`, `4th_friday`, `5th_friday`, `6th_friday`, `7th_friday`, `8th_friday`) VALUES
(2, '1', '1', 'Science', 'English', 'Test', 'math', 'Science', 'math', 'Science', 'math', 'Science', 'English', 'Test', 'math', 'Science', 'math', 'Science', 'math', 'Science', 'English', 'Test', 'math', 'Science', 'math', 'Science', 'math', 'Science', 'English', 'Test', 'math', 'Science', 'math', 'Science', 'math', 'Science', 'English', 'Test', 'math', 'Science', 'math', 'Science', 'math');

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

CREATE TABLE `scheduler` (
  `id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `quarter` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `time_slot` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`id`, `section`, `quarter`, `day`, `time_slot`, `subject`, `school_year`) VALUES
(52, '1', 1, 'Monday', '7:30am - 8:30am', '1', '2025-2026'),
(53, '1', 1, 'Tuesday', '7:30am - 8:30am', '1', '2025-2026'),
(54, '1', 1, 'Wednesday', '7:30am - 8:30am', '1', '2025-2026'),
(55, '1', 1, 'Thursday', '7:30am - 8:30am', '1', '2025-2026'),
(56, '1', 1, 'Friday', '7:30am - 8:30am', '1', '2025-2026'),
(57, '1', 1, 'Monday', '8:31am - 9:30am', '10', '2025-2026'),
(59, '1', 1, 'Tuesday', '8:31am - 9:30am', '2', '2025-2026'),
(60, '1', 1, 'Wednesday', '4:01pm - 5:00pm', '1', '2025-2026'),
(67, '1', 1, 'Wednesday', '8:31am - 9:30am', '1', '2025-2026');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `grade_level` int(5) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `grade_level`, `teacher_id`, `school_year`, `del_status`) VALUES
(1, 'Molave', 7, '1', '2025-2026', 'active'),
(2, 'Narra', 7, '2', '2025-2026', 'active'),
(3, 'Mahogani', 7, '3', '2025-2026', 'active'),
(6, 'Test', 7, '4', '2025-2026', 'active'),
(7, 'Balite', 8, '5', '2025-2026', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `section_student`
--

CREATE TABLE `section_student` (
  `id` int(11) NOT NULL,
  `student` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_student`
--

INSERT INTO `section_student` (`id`, `student`, `section`, `quarter`, `school_year`) VALUES
(8, '3', '2', '1', '2025-2026'),
(9, '2', '1', '1', '2025-2026'),
(10, '4', '7', '1', '2025-2026'),
(12, '1', '1', '1', '2025-2026');

-- --------------------------------------------------------

--
-- Table structure for table `section_subject`
--

CREATE TABLE `section_subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `teacher` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_subject`
--

INSERT INTO `section_subject` (`id`, `subject`, `section`, `teacher`, `quarter`, `school_year`) VALUES
(16, '1', '1', '1', '1', '2025-2026'),
(17, '2', '1', '1', '1', '2025-2026'),
(19, '10', '1', '2', '1', '2025-2026'),
(20, '1', '2', '1', '1', '2025-2026'),
(21, '2', '2', '1', '1', '2025-2026'),
(22, '10', '2', '2', '1', '2025-2026'),
(23, '11', '7', '1', '1', '2025-2026'),
(24, '13', '7', '5', '1', '2025-2026'),
(25, '14', '2', '5', '1', '2025-2026'),
(30, '1', '6', '1', '1', '2025-2026'),
(31, '8', '1', '1', '1', '2025-2026');

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
  `transferee` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `del_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `gender`, `age`, `address`, `contact_number`, `birthdate`, `birthplace`, `nationality`, `religion`, `father_name`, `father_occupation`, `father_contact`, `mother_name`, `mother_occupation`, `mother_contact`, `guardian_name`, `guardian_contact`, `elementary_name`, `elementary_address`, `elementary_year`, `email`, `grade_level`, `lrn_number`, `section`, `grade7_section`, `grade8_section`, `grade9_section`, `grade10_section`, `transferee`, `username`, `password`, `del_status`) VALUES
(1, 'Student', '', 'Last', '', 'Male', 15, 'Purok 15 Zone 4 Lagao. General Santos City', '09531023180', '2010-02-11', 'asd', 'asd', 'ads', '', '', '', '', '', '', '', '', '', '', '', 'test@gmail.com', '7', '123131231', '1', '', '', '', '', '', '123131231', 'studentlast252', 'active'),
(2, 'Test', '', 'Last', '', 'Male', 20, 'Purok 15 Zone 4 Lagao. General Santos City', '09531023180', '2004-12-11', 'asd', 'filipino', 'catholic', 'test', 'test', '123', 'test', 'test', '123', 'test', '123', 'test', 'test', '', 'test2@gmail.com', '7', '1234561232132', '2', '', '', '', '', 'No', '1234561232132', 'testlast279', 'active'),
(3, 'Tt', '', 'test', '', 'Male', 21, '123', '13', '2004-02-10', '123', '123', '123', '', '', '', '', '', '', '', '', '', '', '', 'onyok@gmail.com', '8', '123213213123', '', '', '', '', '', 'No', '123213213123', 'tttest411', 'active'),
(4, 'te', '', 'ot', '', 'Male', 22, '13', '123', '2002-03-12', '13', '123', '131', '', '', '', '', '', '', '', '', '', '', '', '', '8', '1231232131231', '', '', '', '', '', 'No', '1231232131231', 'teot832', 'active');

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
(2, 'English 7', '7', 'English', '', '1', 'active'),
(8, 'PE 101', '7', 'Physical Education', '', '1', 'active'),
(9, '123', '2', '123', '', '1', 'deleted'),
(10, 'Math101', '7', 'Math', '', '2', 'active'),
(11, '13', '8', '123', '', '1', 'active'),
(12, 'test', '9', 'Grade 9 Subject', '', '3', 'active'),
(13, '123', '8', 'Grade 8 Subject', '', '5', 'active');

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
  `extension_name` varchar(100) NOT NULL,
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

INSERT INTO `teacher` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `extension_name`, `email`, `gender`, `contact_number`, `username`, `password`, `date_created`, `del_status`) VALUES
(1, 'Cheryl', '', 'Dela Cerna', '', 'LPT', 'Cheryl@gmail.com', 'Female', '09531023180', 'Cheryl@gmail.com', 'cheryldela cerna260', '2024-10-24 23:23:51', 'active'),
(2, 'Sharon', '', 'Calida', '', '', 'Sharon@gmail.com', 'Female', '09531023180', 'Sharon@gmail.com', 'sharoncalida591', '2024-11-30 23:40:58', 'active'),
(3, 'Momina', '', 'Mutin', '', '', 'Momina@gmai.com', 'Female', '09568755542', 'Momina@gmai.com', 'mominamutin535', '2024-12-28 23:51:58', 'active'),
(4, 'Test', '', '123', '', '', 'test', 'Male', '09531023180', 'test', 'test123759', '2025-01-08 00:41:43', 'active'),
(5, 'Teacher', '123', '13', '123123', 'MIT, PHD', 'onyok@gmail.com', 'Male', '09531023180', 'onyok@gmail.com', 'teacher13108', '2025-02-06 00:20:06', 'active'),
(6, 'Asd', '', 'Asd', 'asd', 'asd', 'asd', 'Male', '123', 'asd', 'asdasd321', '2025-03-09 23:16:15', 'active');

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
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_schedule` (`section`,`quarter`,`day`,`time_slot`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_student`
--
ALTER TABLE `section_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_subject`
--
ALTER TABLE `section_subject`
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
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scheduler`
--
ALTER TABLE `scheduler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `section_student`
--
ALTER TABLE `section_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `section_subject`
--
ALTER TABLE `section_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
