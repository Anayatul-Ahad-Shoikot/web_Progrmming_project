-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 10:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_programming`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ac_id` int(2) NOT NULL,
  `username` varchar(35) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `priority` int(3) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ac_id`, `username`, `useremail`, `userpassword`, `priority`, `img`) VALUES
(1, 'admin1', 'admin1@gmail.com', '$2y$10$pLXE2I2F6eSzmmuvQDhwhuTH9rRDRYctTSxobVn4mlaHfEbtrrt1i', 1, 'img/logo.png'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$PiOKkb3DUYP3vTlQ5tjNL.uNCoezyrLFrknbPKyh6pfuOAMwTECVm', 2, 'img/405178172_367573859371815_3682155291458542577_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(2) NOT NULL,
  `c_code` varchar(20) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_type` varchar(10) NOT NULL,
  `c_sec` varchar(5) NOT NULL,
  `c_time` varchar(15) NOT NULL,
  `c_day` varchar(10) NOT NULL,
  `Allocation` varchar(20) NOT NULL DEFAULT 'Not Assigned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_code`, `c_name`, `c_type`, `c_sec`, `c_time`, `c_day`, `Allocation`) VALUES
(17, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'A', '8:30 - 9:50', 'Sat / Tues', 'Not Assigned'),
(18, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'B', '12:31 - 1:50', 'Sat / Tues', 'Not Assigned'),
(19, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'C', '3:11 - 4:30', 'Sat / Tues', 'Not Assigned'),
(20, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'A', '9:51 - 11:10', 'Sun / Wed', 'Not Assigned'),
(21, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'B', '8:30 - 9:50', 'Sun / Wed', 'Not Assigned'),
(22, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'C', '9:51 - 11:10', 'Sat / Tues', 'Not Assigned'),
(23, 'BIO3105', 'Biology For Engineers', 'Theory', 'A', '11:11 - 12:30', 'Sun / Wed', 'Not Assigned'),
(24, 'BIO3105', 'Biology For Engineers', 'Theory', 'B', '11:11 - 12:30', 'Sat / Tues', 'Not Assigned'),
(25, 'BIO3105', 'Biology For Engineers', 'Theory', 'C', '9:51 - 11:10', 'Sat / Tues', 'Not Assigned'),
(26, 'BIO3105', 'Biology For Engineers', 'Theory', 'D', '9:51 - 11:10', 'Sun / Wed', 'Not Assigned'),
(27, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'A', '8:30 - 11:00', 'Sat', 'Not Assigned'),
(28, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'B', '8:30 - 11:00', 'Tues', 'Not Assigned'),
(29, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'E', '11:11 - 1:40', 'Sat', 'Not Assigned'),
(30, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'V', '2:00 - 4:30', 'Sun', 'Not Assigned'),
(31, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'A', '8:30 - 9:50', 'Sun / Wed', 'Not Assigned'),
(32, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'E', '12:31 - 1:50', 'Sat / Tues', 'Not Assigned'),
(33, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'X', '3:11 - 4:30', 'Sat / Tues', 'Not Assigned'),
(34, 'CSE1116/CSI212', 'Object Oriented Programming', 'Lab', 'A', '11:11 - 1:40', 'Sun', 'Not Assigned'),
(35, 'CSE1116/CSI212', 'Object Oriented Programming', 'Lab', 'E', '8:30 - 11:00', 'Tues', 'Not Assigned'),
(36, 'CSE1115/CSI211', 'Object Oriented Programming', 'Theory', 'N', '12:31 - 1:50', 'Sat / Tues', 'Not Assigned'),
(37, 'CSE1115/CSI211', 'Object Oriented Programming', 'Theory', 'A', '8:30 - 9:50', 'Sun / Wed', 'Not Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(4) NOT NULL,
  `f_name` varchar(70) NOT NULL,
  `f_code` varchar(20) NOT NULL,
  `f_mail` varchar(50) NOT NULL,
  `f_contact` varchar(11) NOT NULL,
  `f_designation` varchar(30) NOT NULL,
  `f_dept` varchar(10) NOT NULL,
  `f_load` float NOT NULL DEFAULT 0,
  `f_current_T` int(2) NOT NULL DEFAULT 0,
  `f_max_T` int(2) NOT NULL,
  `f_current_L` int(2) NOT NULL DEFAULT 0,
  `f_max_L` int(2) NOT NULL,
  `visible` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_code`, `f_mail`, `f_contact`, `f_designation`, `f_dept`, `f_load`, `f_current_T`, `f_max_T`, `f_current_L`, `f_max_L`, `visible`) VALUES
(1, 'Anayatul Ahad Shoikot', 'AAS', 'AAS@gmail.com', '01973336001', 'Student', 'CSE', 0, 0, 3, 0, 3, 1),
(2, 'Hasan Sarwar', 'HS', 'HS@gmail.com', '345636', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(3, 'Mohammad Nurul Huda', 'MNH', 'MNH', '902738432', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(4, 'Khondaker Abdullah-Al-Mamun', 'KM', 'KM', '72354793', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(5, 'Salekul Islam', 'SaIm', 'SaIm@gmail.com', '497356', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(6, 'A.K.M Muzahidul Islam', 'AKMMI', 'AKMMI@gmail.com', '37456239', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(7, 'Md. Motaharul Islam', 'MdMIm', 'MdMIm', '73256248', 'Professor', 'CSE', 0, 0, 1, 0, 1, 1),
(8, 'Dewan Md. Farid', 'DMF', 'DMF@gmail.com', '985648', 'Professor', 'CSE', 0, 0, 2, 0, 1, 1),
(9, 'Al-Sakin Khan Pathan', 'ASKP', 'ASKP@gmailcom', '32547097', 'Professor', 'CSE', 0, 0, 2, 0, 1, 1),
(10, 'Swakkar Shatabda', 'SS', 'SS@gmail.com', '39256276', 'Professor', 'CSE', 0, 0, 2, 0, 2, 1),
(11, 'Mohammad Shahriar Rahman', 'MdSR', 'MdSR@gmail.com', '23764498', 'Professor', 'CSE', 0, 0, 2, 0, 2, 1),
(12, 'Muhammad Nomani Kabir', 'MNK', 'MNK@gmail.com', '83724597', 'Associate Professor', 'CSE', 0, 0, 2, 0, 2, 1),
(13, 'Suman Ahmmed', 'SA', 'SA@gmail.com', '3436625', 'Associate Professor', 'CSE', 0, 0, 3, 0, 2, 1),
(14, 'Riasat Azim', 'RtAm', 'RtAm@gmail.com', '45632342', 'Associate Professor(car-1)', 'CSE', 0, 0, 2, 0, 3, 1),
(15, 'Mohammad Mamun Elahi', 'ME', 'ME@gmail.com', '13248765001', 'Associate Professor(car-2)', 'CSE', 0, 0, 2, 0, 3, 1),
(16, 'Rubaiya Rahtin Khan', 'RRK', 'RRK@gmail.com', '23499834', 'Assistant Professor(cat-2)', 'CSE', 0, 0, 3, 0, 2, 1),
(17, 'Md. Benzir Ahmed', 'MBAd', 'ABAd@gmail.com', '66773324', 'Assistant Professor(cat-2)', 'CSE', 0, 0, 3, 0, 2, 1),
(18, 'Nahid Hossain', 'NHn', 'Nhn@gmail.com', '32984765', 'Assistant Professor(cat-2)', 'CSE', 0, 0, 3, 0, 2, 1),
(19, 'Khushnur Binte Jahangir', 'KBJ', 'KBJ@gmail.com', '019743234', 'Assistant Professor(cat-2)', 'CSE', 0, 0, 3, 0, 3, 1),
(20, 'Minhajul Bashir', 'MiBa', 'MiBa@gmail.com', '0172312132', 'Lecturer', 'CSE', 0, 0, 3, 0, 3, 1),
(21, 'Shoib Ahmed Shourav', 'SAhSh', 'SAhSh@gmail.com', '013889731', 'Lecturer', 'CSE', 0, 0, 4, 0, 1, 1),
(37, 'Subangkar Karmaker Shanto', 'ShKS', 'ShKS@gmail.com', '018744434', 'Lecturer', 'CSE', 0, 0, 4, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `his_id` int(3) NOT NULL,
  `content_key` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL,
  `content_activity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`his_id`, `content_key`, `content`, `user`, `content_activity`) VALUES
(1, 'course', 'Course \"Financial And Managerial Accounting\" added (2024/02/25  08:31) ---admin1', 'admin1', 'add'),
(2, 'course', 'Course \"Financial And Managerial Accounting\" added (2024/02/25  08:31) ---admin1', 'admin1', 'add'),
(3, 'course', 'Course \"Financial And Managerial Accounting\" added (2024/02/25  08:32) ---admin1', 'admin1', 'add'),
(4, 'course', 'Course \"History Of The Emergence Of Bangladesh\" added (2024/02/25  08:33) ---admin1', 'admin1', 'add'),
(5, 'course', 'Course \"History Of The Emergence Of Bangladesh\" added (2024/02/25  08:34) ---admin1', 'admin1', 'add'),
(6, 'course', 'Course \"History Of The Emergence Of Bangladesh\" added (2024/02/25  08:34) ---admin1', 'admin1', 'add'),
(7, 'course', 'Course \"Biology For Engineers\" added (2024/02/25  08:35) ---admin1', 'admin1', 'add'),
(8, 'course', 'Course \"Biology For Engineers\" added (2024/02/25  08:36) ---admin1', 'admin1', 'add'),
(9, 'course', 'Course \"Biology For Engineers\" added (2024/02/25  08:37) ---admin1', 'admin1', 'add'),
(10, 'course', 'Course \"Biology For Engineers\" added (2024/02/25  08:38) ---admin1', 'admin1', 'add'),
(11, 'course', 'Course \"Introduction To Computer Systems\" added (2024/02/25  08:40) ---admin1', 'admin1', 'add'),
(12, 'course', 'Course \"Introduction To Computer Systems\" added (2024/02/25  08:41) ---admin1', 'admin1', 'add'),
(13, 'course', 'Course \"Introduction To Computer Systems\" added (2024/02/25  08:41) ---admin1', 'admin1', 'add'),
(14, 'course', 'Course \"Introduction To Computer Systems\" added (2024/02/25  08:42) ---admin1', 'admin1', 'add'),
(15, 'course', 'Course \"Structured Programming Language\" added (2024/02/25  08:43) ---admin1', 'admin1', 'add'),
(16, 'course', 'Course \"Structured Programming Language\" added (2024/02/25  08:44) ---admin1', 'admin1', 'add'),
(17, 'course', 'Course \"Structured Programming Language\" added (2024/02/25  08:44) ---admin1', 'admin1', 'add'),
(18, 'course', 'Course \"Object Oriented Programming\" added (2024/02/25  08:57) ---admin1', 'admin1', 'add'),
(19, 'course', 'Course \"Object Oriented Programming\" added (2024/02/25  08:58) ---admin1', 'admin1', 'add'),
(20, 'course', 'Course \"Object Oriented Programming\" added (2024/02/25  08:59) ---admin1', 'admin1', 'add'),
(21, 'course', 'Course \"Object Oriented Programming\" added (2024/02/25  09:00) ---admin1', 'admin1', 'add'),
(22, 'note', 'Note created for Nahid Hossain (2024/02/25  09:04) ---admin1', 'admin1', 'create'),
(23, 'note', 'Note created for Dewan Md. Farid (2024/02/25  09:05) ---admin1', 'admin1', 'create'),
(24, 'note', 'Note created for Nahid Hossain (2024/02/25  10:17) ---admin1', 'admin1', 'create');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(3) NOT NULL,
  `note_for` varchar(50) NOT NULL,
  `note_content` varchar(255) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note_for`, `note_content`, `visibility`) VALUES
(1, 'Nahid Hossain', 'Web Programming', 1),
(2, 'Dewan Md. Farid', 'Machine Learning', 1),
(3, 'Nahid Hossain', 'AOOP at 8:30AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `t_id` int(2) NOT NULL,
  `faculty_code` varchar(50) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `section` varchar(3) NOT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`his_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ac_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `t_id` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
