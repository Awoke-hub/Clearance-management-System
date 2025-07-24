-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 03:48 PM
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
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicstaff_clearance`
--

CREATE TABLE `academicstaff_clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `role` enum('superadmin','staff','manager') NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `last_name`, `username`, `password`, `email`, `phone`, `role`) VALUES
(1, 'Awoke', 'Derssie', 'admin123', '$2y$10$nIWSWPzLoXwBlT4.xePNuOD7wyikIM4lUDDB58nLtDF.m9w5Z6YZ.', 'admin@university.edu', '0912345678', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `cafeteria_clearance`
--

CREATE TABLE `cafeteria_clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cafeteria_clearance`
--

INSERT INTO `cafeteria_clearance` (`id`, `student_id`, `name`, `last_name`, `department`, `reason`, `status`, `requested_at`) VALUES
(1, 0, 'gr', 'r', 'r', 'r', 'pending', '2025-07-23 13:13:51'),
(2, 0, 'Azanaw', 'nega', 'It', 'end of the year', 'pending', '2025-07-23 13:15:11'),
(3, 0, 'Azanaw', 'nega', 'It', 'end of the year', 'pending', '2025-07-23 13:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_request`
--

CREATE TABLE `clearance_request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clearance_request`
--

INSERT INTO `clearance_request` (`id`, `name`, `last_name`, `department`, `reason`, `status`) VALUES
(1, 'Awoke', 'Derssie', 'It', 'end of the year', 'rejected'),
(2, 'Awoke', 'Derssie', 'It', 'grgeg', 'pending'),
(3, 'gr', 'r', 'r', 'r', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `department_clearance`
--

CREATE TABLE `department_clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dormitory_clearance`
--

CREATE TABLE `dormitory_clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dormitory_clearance`
--

INSERT INTO `dormitory_clearance` (`id`, `student_id`, `name`, `last_name`, `department`, `reason`, `status`, `requested_at`) VALUES
(1, 0, 'Awoke', 'Derssie', 'It', 'end of the year', 'pending', '2025-07-23 13:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `library_clearance`
--

CREATE TABLE `library_clearance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `library_clearance`
--

INSERT INTO `library_clearance` (`id`, `student_id`, `name`, `last_name`, `department`, `reason`, `status`, `requested_at`) VALUES
(1, 0, 'Awoke', 'Derssie', 'It', 'qaqsz', 'rejected', '2025-07-23 13:14:06'),
(2, 0, 'Awoke', 'Derssie', 'It', 'asddf', 'approved', '2025-07-23 13:18:49'),
(3, 0, 'Awoke', 'Derssie', 'It', 'asddf', 'approved', '2025-07-23 13:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `last_name`, `phone`, `email`, `department`, `username`, `password`) VALUES
('DBU001', 'Awoke', 'Derssie', '0912345678', 'awoke@example.com', 'Computer Science', 'awoke123', '$2y$10$nIWSWPzLoXwBlT4.xePNuOD7wyikIM4lUDDB58nLtDF.m9w5Z6YZ.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicstaff_clearance`
--
ALTER TABLE `academicstaff_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cafeteria_clearance`
--
ALTER TABLE `cafeteria_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_request`
--
ALTER TABLE `clearance_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_clearance`
--
ALTER TABLE `department_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormitory_clearance`
--
ALTER TABLE `dormitory_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_clearance`
--
ALTER TABLE `library_clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academicstaff_clearance`
--
ALTER TABLE `academicstaff_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cafeteria_clearance`
--
ALTER TABLE `cafeteria_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearance_request`
--
ALTER TABLE `clearance_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_clearance`
--
ALTER TABLE `department_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dormitory_clearance`
--
ALTER TABLE `dormitory_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `library_clearance`
--
ALTER TABLE `library_clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
