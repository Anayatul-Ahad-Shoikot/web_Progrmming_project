-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 09:56 PM
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
(1, 'admin1', 'admin1@gmail.com', '$2y$10$pLXE2I2F6eSzmmuvQDhwhuTH9rRDRYctTSxobVn4mlaHfEbtrrt1i', 1, 'img/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(2) NOT NULL,
  `c_code` varchar(20) DEFAULT NULL,
  `c_name` varchar(50) DEFAULT NULL,
  `c_type` varchar(10) DEFAULT NULL,
  `c_sec` varchar(5) DEFAULT NULL,
  `c_time` varchar(15) DEFAULT NULL,
  `c_day1` varchar(10) DEFAULT NULL,
  `c_day2` varchar(10) DEFAULT NULL,
  `Allocation` varchar(20) NOT NULL DEFAULT 'Not Assigned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_code`, `c_name`, `c_type`, `c_sec`, `c_time`, `c_day1`, `c_day2`, `Allocation`) VALUES
(1, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'U', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(2, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'L', '08:30:AM - 11:0', 'Sat', '', 'Not Assigned'),
(3, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'X ', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(4, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'G', '11:11:AM - 01:4', 'Tue', '', 'Not Assigned'),
(5, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'M', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(6, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'B', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(7, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'F', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(8, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'E', '11:11:AM - 01:4', 'Sat', '', 'Not Assigned'),
(9, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'Y ', '02:00:PM - 04:3', 'Sat', '', 'Not Assigned'),
(10, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'J ', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(11, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'Z ', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(12, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'O', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(13, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'D', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(14, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'K', '02:00:PM - 04:3', 'Sun', '', 'Not Assigned'),
(15, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'H', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(16, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'C', '08:30:AM - 11:0', 'Sun', '', 'Not Assigned'),
(17, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'A', '08:30:AM - 11:0', 'Sat', '', 'Not Assigned'),
(18, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'N', '08:30:AM - 11:0', 'Sun', '', 'Not Assigned'),
(19, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'S ', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(20, 'CSE 1111', 'Structured Programming Language', 'Theory', 'L', '09:51:AM - 11:1', 'Sun', 'Wed', 'Not Assigned'),
(21, 'CSE 1111', 'Structured Programming Language', 'Theory', 'AB', '09:51:AM - 11:1', 'Sun', 'Wed', 'Not Assigned'),
(22, 'CSE 1111', 'Structured Programming Language', 'Theory', 'V', '03:11:PM - 04:3', 'Sat', 'Tue', 'Not Assigned'),
(23, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Z', '03:11:PM - 04:3', 'Sat', 'Tue', 'Not Assigned'),
(24, 'CSE 1111', 'Structured Programming Language', 'Theory', 'H', '11:11:AM - 12:3', 'Sat', 'Tue', 'Not Assigned'),
(25, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Q', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(26, 'CSE 1111', 'Structured Programming Language', 'Theory', 'W', '12:31:PM - 01:5', 'Sun', 'Wed', 'Not Assigned'),
(27, 'CSE 1111', 'Structured Programming Language', 'Theory', 'G', '12:31:PM - 01:5', 'Sun', 'Wed', 'Not Assigned'),
(28, 'CSE 1111', 'Structured Programming Language', 'Theory', 'A', '08:30:AM - 09:5', 'Sun', 'Wed', 'Not Assigned'),
(29, 'CSE 1111', 'Structured Programming Language', 'Theory', 'P', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(30, 'CSE 1111', 'Structured Programming Language', 'Theory', 'J', '12:31:PM - 01:5', 'Sun', 'Wed', 'Not Assigned'),
(31, 'CSE 1111', 'Structured Programming Language', 'Theory', 'F', '11:11:AM - 12:3', 'Sun', 'Wed', 'Not Assigned'),
(32, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Y', '03:11:PM - 04:3', 'Sat', 'Tue', 'Not Assigned'),
(33, 'CSE 1111', 'Structured Programming Language', 'Theory', 'S', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(34, 'CSE 1111', 'Structured Programming Language', 'Theory', 'K', '09:51:AM - 11:1', 'Sat', 'Tue', 'Not Assigned'),
(35, 'CSE 1111', 'Structured Programming Language', 'Theory', 'E', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(36, 'CSE 1111', 'Structured Programming Language', 'Theory', 'D', '09:51:AM - 11:1', 'Sat', 'Tue', 'Not Assigned'),
(37, 'CSE 1111', 'Structured Programming Language', 'Theory', 'I', '11:11:AM - 12:3', 'Sat', 'Tue', 'Not Assigned'),
(38, 'CSE 1111', 'Structured Programming Language', 'Theory', 'C', '09:51:AM - 11:1', 'Sun', 'Wed', 'Not Assigned'),
(39, 'CSE 1111', 'Structured Programming Language', 'Theory', 'N', '08:30:AM - 09:5', 'Sun', 'Wed', 'Not Assigned'),
(40, 'CSE 1111', 'Structured Programming Language', 'Theory', 'O', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(41, 'CSE 1111', 'Structured Programming Language', 'Theory', 'X', '03:11:PM - 04:3', 'Sat', 'Tue', 'Not Assigned'),
(42, 'CSE 1111', 'Structured Programming Language', 'Theory', 'T', '08:30:AM - 09:5', 'Sat', 'Tue', 'Not Assigned'),
(43, 'CSE 1111', 'Structured Programming Language', 'Theory', 'AA', '09:51:AM - 11:1', 'Sat', 'Tue', 'Not Assigned'),
(44, 'CSE 1111', 'Structured Programming Language', 'Theory', 'B', '08:30:AM - 09:5', 'Sat', 'Tue', 'Not Assigned'),
(45, 'CSE 1111', 'Structured Programming Language', 'Theory', 'U', '11:11:AM - 12:3', 'Sun', 'Wed', 'Not Assigned'),
(46, 'CSE 1111', 'Structured Programming Language', 'Theory', 'M', '08:30:AM - 09:5', 'Sun', 'Wed', 'Not Assigned'),
(47, 'CSE 1111', 'Structured Programming Language', 'Theory', 'R', '01:51:PM - 03:1', 'Sun', 'Wed', 'Not Assigned'),
(48, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'B', '11:11:AM - 01:4', 'Tue', '', 'Not Assigned'),
(49, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'R', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(50, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AA', '11:11:AM - 01:4', 'Tue', '', 'Not Assigned'),
(51, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AC', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(52, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AG ', '02:00:PM - 04:3', 'Wed', '', 'Not Assigned'),
(53, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'D', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(54, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'X', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(55, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AD', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(56, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'V', '08:30:AM - 11:0', 'Sat', '', 'Not Assigned'),
(57, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AB', '11:11:AM - 01:4', 'Tue', '', 'Not Assigned'),
(58, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AE', '08:30:AM - 11:0', 'Sat', '', 'Not Assigned'),
(59, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'H', '08:30:AM - 11:0', 'Sat', '', 'Not Assigned'),
(60, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'C', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(61, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'N', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(62, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'G', '02:00:PM - 04:3', 'Sun', '', 'Not Assigned'),
(63, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'Z', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(64, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'S', '08:30:AM - 11:0', 'Sun', '', 'Not Assigned'),
(65, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'P', '02:00:PM - 04:3', 'Sun', '', 'Not Assigned'),
(66, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'O', '02:00:PM - 04:3', 'Sat', '', 'Not Assigned'),
(67, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'I', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(68, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'T', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(69, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'U', '02:00:PM - 04:3', 'Sun', '', 'Not Assigned'),
(70, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'E', '02:00:PM - 04:3', 'Sat', '', 'Not Assigned'),
(71, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'M', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(72, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'W', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(73, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'F', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(74, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'L', '02:00:PM - 04:3', 'Sat', '', 'Not Assigned'),
(75, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'K', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(76, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'Y', '08:30:AM - 11:0', 'Wed', '', 'Not Assigned'),
(77, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'J', '08:30:AM - 11:0', 'Sun', '', 'Not Assigned'),
(78, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'A', '11:11:AM - 01:4', 'Sat', '', 'Not Assigned'),
(79, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'I', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(80, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'G', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(81, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'A', '08:30:AM - 09:5', 'Sun', 'Wed', 'Not Assigned'),
(82, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'B', '08:30:AM - 09:5', 'Sat', 'Tue', 'Not Assigned'),
(83, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'E', '11:11:AM - 12:3', 'Sat', 'Tue', 'Not Assigned'),
(84, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'H', '11:11:AM - 12:3', 'Sun', 'Wed', 'Not Assigned'),
(85, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'L', '03:11:PM - 04:3', 'Sat', 'Tue', 'Not Assigned'),
(86, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'K', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(87, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'J', '01:51:PM - 03:1', 'Sat', 'Tue', 'Not Assigned'),
(88, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'D', '09:51:AM - 11:1', 'Sun', 'Wed', 'Not Assigned'),
(89, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'F', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(90, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'C', '09:51:AM - 11:1', 'Sat', 'Tue', 'Not Assigned'),
(91, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'N', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(92, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'M', '12:31:PM - 01:5', 'Sat', 'Tue', 'Not Assigned'),
(93, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'G', '08:30:AM - 11:0', 'Sun', '', 'Not Assigned'),
(94, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'M', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(95, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'J', '11:11:AM - 01:4', 'Sat', '', 'Not Assigned'),
(96, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'B', '11:11:AM - 01:4', 'Tue', '', 'Not Assigned'),
(97, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'E', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(98, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'I', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(99, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'L', '08:30:AM - 11:0', 'Tue', '', 'Not Assigned'),
(100, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'C', '11:11:AM - 01:4', 'Sat', '', 'Not Assigned'),
(101, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'H', '02:00:PM - 04:3', 'Tue', '', 'Not Assigned'),
(102, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'K', '11:11:AM - 01:4', 'Sat', '', 'Not Assigned'),
(103, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'A', '11:11:AM - 01:4', 'Sun', '', 'Not Assigned'),
(104, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'D', '11:11:AM - 01:4', 'Wed', '', 'Not Assigned'),
(105, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'F', '02:00:PM - 04:3', 'Sat', '', 'Not Assigned');

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
  `dept` varchar(50) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `f_room` int(5) NOT NULL,
  `f_current_T` int(2) NOT NULL DEFAULT 0,
  `f_max_T` int(2) NOT NULL DEFAULT 0,
  `f_current_L` int(2) NOT NULL DEFAULT 0,
  `f_max_L` int(2) NOT NULL DEFAULT 0,
  `visible` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_code`, `f_mail`, `f_contact`, `dept`, `desig`, `f_room`, `f_current_T`, `f_max_T`, `f_current_L`, `f_max_L`, `visible`) VALUES
(1, 'Hasan Sarwar', '[HS]', '', '', 'CSE', 'Professor', 1001, 0, 2, 0, 1, 1),
(2, 'Mohammad Nurul Huda', 'MNH', '', '', 'CSE', 'Professor', 1002, 0, 2, 0, 1, 1),
(3, 'Khondaker Abdullah -Al-Mamun', 'KM', '', '', 'CSE', 'Professor', 1003, 0, 2, 0, 2, 1),
(4, 'Salekul Islam', 'SaIm', '', '', 'CSE', 'Professor', 1004, 0, 0, 0, 0, 1),
(5, 'A.K.M. Muzahidul Islam', 'AKMMI', '', '', 'CSE', 'Professor', 1005, 0, 0, 0, 0, 1),
(6, 'Md. Motaharul Islam', 'MdMIm', '', '', 'CSE', 'Professor', 1006, 0, 0, 0, 0, 1),
(7, 'Dewan Md. Farid', 'DMF', '', '', 'CSE', 'Professor', 1007, 0, 2, 0, 4, 1),
(8, 'Al-Sakib Khan Pathan', 'ASKP', '', '', 'CSE', 'Professor', 1008, 0, 0, 0, 0, 1),
(9, 'Swakkhar Shatabda', 'SS', '', '', 'CSE', 'Professor', 1009, 0, 0, 0, 0, 1),
(10, 'Mohammad Shahriar Rahman', 'MdSR', '', '', 'CSE', 'Professor', 1010, 0, 0, 0, 0, 1),
(11, 'Muhammad Nomani Kabir', 'MNK', '', '', 'CSE', 'Associate Professor', 1011, 0, 4, 0, 3, 1),
(12, 'Suman Ahmmed', 'SA', '', '', 'CSE', 'Associate Professor', 1012, 0, 0, 0, 0, 1),
(13, 'Riasat Azim', 'RtAm', '', '', 'CSE', 'Assistant Professor (Category 1)', 1013, 0, 0, 0, 0, 1),
(14, 'Mohammad Mamun Elahi', 'ME', '', '', 'CSE', 'Assistant Professor (Category 2)', 1014, 0, 5, 0, 2, 1),
(15, 'Rubaiya Rahtin Khan', 'RRK', '', '', 'CSE', 'Assistant Professor (Category 2)', 1015, 0, 0, 0, 0, 1),
(16, 'Md. Benzir Ahmed', 'MBAd', '', '', 'CSE', 'Assistant Professor (Category 2)', 1016, 0, 0, 0, 0, 1),
(17, 'Nahid Hossain', 'NHn', '', '', 'CSE', 'Assistant Professor (Category 2)', 1017, 0, 0, 0, 0, 1),
(18, 'Khushnur Binte Jahangir', 'KBJ', '', '', 'CSE', 'Lecturer', 1018, 0, 3, 0, 3, 1),
(19, 'Minhajul Bashir', 'MiBa', '', '', 'CSE', 'Lecturer', 1019, 0, 0, 0, 0, 1),
(20, 'Shoib Ahmed Shourav', 'SAhSh', '', '', 'CSE', 'Lecturer', 1020, 0, 0, 0, 0, 1),
(21, 'Subangkar Karmaker Shanto', 'ShKS', '', '', 'CSE', 'Lecturer', 1021, 0, 4, 0, 4, 1);

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
(1, 'import', 'Excel file imported at (2024/03/31  16:51) ---admin1', 'admin1', 'add'),
(2, 'faculty', 'Faculty \"\" removed (2024/03/31  16:52) ---admin1', 'admin1', 'add'),
(3, 'import', 'Excel file imported at (2024/03/31  16:52) ---admin1', 'admin1', 'add'),
(4, 'faculty', 'Faculty \"\" removed (2024/03/31  16:54) ---admin1', 'admin1', 'add'),
(5, 'import', 'Excel file imported at (2024/03/31  16:55) ---admin1', 'admin1', 'add'),
(6, 'faculty', 'Faculty \"Anayatul Ahad Shoikot\" added (2024/03/31  17:09) ---admin1', 'admin1', 'add'),
(7, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(8, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(9, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(10, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(11, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(12, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(13, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(14, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(15, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(16, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(17, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(18, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(19, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(20, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(21, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(22, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(23, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(24, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(25, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(26, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(27, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(28, 'faculty', 'Faculty \"\" removed (2024/04/02  18:07) ---admin1', 'admin1', 'add'),
(29, 'import', 'Excel file imported at (2024/04/02  18:09) ---admin1', 'admin1', 'add'),
(30, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(31, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(32, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(33, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(34, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(35, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(36, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(37, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(38, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(39, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(40, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(41, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(42, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(43, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(44, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(45, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(46, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(47, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(48, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(49, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(50, 'faculty', 'Faculty \"\" removed (2024/04/20  17:14) ---admin1', 'admin1', 'add'),
(51, 'course', 'Course \"Biology For Engineers\" added (2024/04/20  17:30) ---admin1', 'admin1', 'add'),
(52, 'import', 'Course list imported at (2024/04/20  17:31) ---admin1', 'admin1', 'add'),
(53, 'import', 'Excel file imported at (2024/04/20  17:32) ---admin1', 'admin1', 'add'),
(54, 'import', 'Course list imported at (2024/04/20  17:36) ---admin1', 'admin1', 'add'),
(55, 'import', 'Course list imported at (2024/04/20  17:49) ---admin1', 'admin1', 'add');

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
(1, 'Nahid Hossain', 'Web Programming', 0),
(2, 'Dewan Md. Farid', 'Machine Learning', 0),
(3, 'Nahid Hossain', 'AOOP at 8:30AM', 0),
(4, 'Mohammad Mamun Elahi', 'adwasdw', 0),
(5, 'Nahid Hossain', 'adwdsadw', 0),
(6, 'Khushnur Binte Jahangir', 'ADWDAWDAWD', 0),
(7, 'Minhajul Bashir', 'ABC', 0),
(8, 'Khondaker Abdullah-Al-Mamun', 'asdwdawfsad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `t_id` int(2) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `section` varchar(3) NOT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `present` int(11) NOT NULL DEFAULT 1
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
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `t_id` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
