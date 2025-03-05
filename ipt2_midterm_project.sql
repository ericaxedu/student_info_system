-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 05:38 AM
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
-- Database: `ipt2_midterm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL COMMENT 'Auto-increment ID',
  `student_id` varchar(20) NOT NULL COMMENT 'Unique Student ID',
  `first_name` varchar(50) NOT NULL COMMENT 'Student''s first name',
  `last_name` varchar(50) NOT NULL COMMENT 'Student''s last name',
  `age` int(11) NOT NULL COMMENT 'Student''s age',
  `course` varchar(100) NOT NULL COMMENT 'Course (BSIT, BSCS, etc.)',
  `year_level` tinyint(1) NOT NULL COMMENT 'Year level',
  `email` varchar(100) NOT NULL COMMENT 'Unique email',
  `phone` varchar(15) NOT NULL COMMENT 'Contact number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `last_name`, `age`, `course`, `year_level`, `email`, `phone`) VALUES
(1, '23162992', 'Erica', 'Muring', 19, 'BSIT', 2, 'ericamuring@gmail.com', '096243781087'),
(15, '23169425', 'Bhea', 'Gibaga', 20, 'BSIT', 2, 'gibagabhea6@gmail.com', '09158731466');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id_unique` (`student_id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto-increment ID', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
