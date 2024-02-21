-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 07:17 AM
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
  `issued_date` datetime NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `resident_id`, `purpose`, `amount`, `issued_date`, `user_id`) VALUES
(00001, 15, ' take scholarship exam', '50', '2024-02-16 00:00:00', '0'),
(00002, 15, 'job application ', '50', '2024-02-16 00:00:00', '0'),
(00003, 3, ' test', '12', '2024-02-21 00:00:00', '0'),
(00004, 1, ' test', '21', '2024-02-21 00:00:00', '0'),
(00005, 1, ' test', '123', '2024-02-21 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `resident_id` int(55) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `issued_date` datetime NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `resident_id`, `purpose`, `amount`, `issued_date`, `user_id`) VALUES
(00001, 1, 'est', '23', '2024-02-21 00:00:00', ' '),
(00002, 3, ' test', '23', '2024-02-21 00:00:00', 'admin admin');

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
(00000, 'asda', 'asda', 'adsad', 'sdaad', 'Male', '2024-01-25', 'asd', 'asd', 'sd', 'sd', 'asd', 'asd', 'sd', 'ad', 'dsa', 'd', 'd', 'add', 'default.png', '0000-00-00 00:00:00', 'deleted'),
(00001, 'Tasdsa', 'dsad', 'saad', '', 'Male', '2003-11-06', 'asda', 'asd', '213', 'asd', 'asd', 'ad', 'asd', 'ada', 'ads', 'dada', 'da', 'dada', 'Tasdsa_saad.2024.01.26.jpeg', '2024-01-25 09:41:26', 'active'),
(00002, 'Troy', 'michael', 'garidos', '', 'Male', '1999-11-16', 'single', '21', '1', 'maitum', '09269833740', '', 'test@gmail.com', 'filipino', 'college', 'IT', 'catholic', 'B+', 'default.png', '2024-01-25 09:44:05', 'deleted'),
(00003, 'Herz', '', 'lia', '', 'Female', '2000-02-13', 'single', '1', '2', 'asdas', '926883740', 'qewq', 'test@gmail.com', 'Filipino', 'college', 'IT', 'asd', 'B+', 'Herz_lia.2024.01.26.jpeg', '2024-01-25 14:25:16', 'active'),
(00004, 'Test', '', 'tigo', '', 'Female', '2024-01-25', 'asdsa', 'asdsa', 'dsa', 'dsadsa', 'sadas', 'adasd', 'dasd', 'ad', 'asdsa', 'dasd', 'asdas', 'da', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNj', '2024-01-25 14:33:58', 'active'),
(00005, 'Troy', '', 'lee', '', 'Male', '1999-11-22', 'single', '1', '2', 'maitum', '09531023180', '', 'test@gmail.com', 'filipino', 'college', 'IT', 'catholic', 'B+', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNj', '2024-01-25 14:35:39', 'active'),
(00007, '123', '123123', '21312', '321', 'Female', '2024-01-25', '12312', '313', '2132', '13', '123', '123', '21321', '123', '1231', '3213', '21321', '13212', '123_21312.2024.01.25.jpeg', '2024-01-25 14:40:39', 'active'),
(00008, 'Test1', '', 'last', '', 'Female', '1999-11-23', 'single', 'Purok 15 Zone 4 Lagao. General Santos City', '213', 'asd', '09531023182', '09531023180', 'test@gmail.com', 'filipino', 'college', 'IT', 'catholic', 'B+', 'Test1_last.2024.01.29.jpeg', '2024-01-29 13:55:48', 'active'),
(00009, 'Asds', 'ada', 'dad', 'sadada', 'Female', '1111-11-11', '123213', '21321', '313', '213', '123', '2131', '321', '123', '213', '21321', '313', '1312', 'Asds_dad.2024.01.30.jpeg', '2024-01-30 15:34:52', 'active'),
(00010, 'Asd', 'asd', 'sss', 'dsad', 'Male', '1111-11-11', '123213', '321321', '321', '13213', '123', '12321', '321', '123', '21321', '321', '123', '12312', 'default.jpeg', '2024-01-30 15:36:02', 'active'),
(00011, 'Asd ', '', 'ss', 'asdad', 'Male', '0112-11-11', 'sadsad', '2321', '1321', '123', '12321', '', '', '1231', '', '', '', '', 'default.jpeg', '2024-01-30 15:37:09', 'active'),
(00012, 'Asd', 'ss', 'asda', 'asd', 'Male', '2313-11-12', 'asd', 'asd', 'sad', 'ads', 'asd', '', '', 'asd', '', '', '', '', 'default.jpeg', '2024-01-30 15:37:49', 'active'),
(00013, 'Asd', '', 'ss', '123', 'Male', '0213-12-11', '123', '13', '213', '2131', '123', '', '', '1231', '', '', '', '', 'default.jpeg', '2024-01-30 15:38:11', 'active'),
(00014, 'Asd ', '', 'ss', '', 'Male', '0000-00-00', '1231', '123', '12321', '321', '123', '', '', '123', '', '', '', '', 'default.jpeg', '2024-01-30 15:38:37', 'active'),
(00015, 'Juan', '', 'Dela Cruz', '', 'Male', '2000-11-23', 'Single', 'Test', 'Sitio Spring', 'Gensan City', '09531023180', '09531023180', 'test@gmail.com', 'Filipino', 'College', 'IT', 'Catholic', 'B+', 'Juan_Dela Cruz.2024.02.16.jpeg', '2024-02-16 17:10:15', 'active'),
(00016, 'Test', 'Test', 'Test', '', 'Male', '1998-11-23', 'Single', '1', 'Bag-o', 'Lagao General Santos City', '926883740', '12331231', 'test@gmail.com', 'Filipino', 'College', 'Teacher', 'Inc', 'B+', 'default.jpeg', '2024-02-21 14:14:21', 'active');

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
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
