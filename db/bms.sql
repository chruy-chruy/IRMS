-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 09:53 AM
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
(00000, 'asda', 'asda', 'adsad', 'sdaad', 'Male', '2024-01-25', 'asd', 'asd', 'sd', 'sd', 'asd', 'asd', 'sd', 'ad', 'dsa', 'd', 'd', 'add', 'asda_adsad.2024.01.25.jpeg', '0000-00-00 00:00:00', '[value-22]'),
(00001, 'Tasdsa', 'dsad', 'saad', '', 'Male', '2003-11-06', 'asda', 'asd', '213', 'asd', 'asd', 'ad', 'asd', 'ada', 'ads', 'dada', 'da', 'dada', 'Tasdsa_saad.2024.01.25.jpeg', '2024-01-25 09:41:26', 'active'),
(00002, 'Troy', 'michael', 'garidos', '', 'Male', '1999-11-16', 'single', '21', '1', 'maitum', '09269833740', '', 'test@gmail.com', 'filipino', 'college', 'IT', 'catholic', 'B+', 'Troy_garidos.2024.01.25.jpeg', '2024-01-25 09:44:05', 'active'),
(00003, 'Herz', '', 'lia', '', 'Female', '2000-02-13', 'single', '1', '2', 'asdas', '926883740', 'qewq', 'test@gmail.com', 'Filipino', 'college', 'IT', 'asd', 'B+', 'Herz_lia.2024.01.25.jpeg', '2024-01-25 14:25:16', 'active'),
(00004, 'Test', '', 'tigo', '', 'Female', '2024-01-25', 'asdsa', 'asdsa', 'dsa', 'dsadsa', 'sadas', 'adasd', 'dasd', 'ad', 'asdsa', 'dasd', 'asdas', 'da', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNj', '2024-01-25 14:33:58', 'active'),
(00005, 'Troy', '', 'lee', '', 'Male', '1999-11-22', 'single', '1', '2', 'maitum', '09531023180', '', 'test@gmail.com', 'filipino', 'college', 'IT', 'catholic', 'B+', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNj', '2024-01-25 14:35:39', 'active'),
(00007, '123', '123123', '21312', '321', 'Female', '2024-01-25', '12312', '313', '2132', '13', '123', '123', '21321', '123', '1231', '3213', '21321', '13212', '123_21312.2024.01.25.jpeg', '2024-01-25 14:40:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
