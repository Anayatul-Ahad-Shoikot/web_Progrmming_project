-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 09:57 PM
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
  `c_startTime` varchar(15) DEFAULT NULL,
  `c_endTime` varchar(15) NOT NULL,
  `c_day1` varchar(10) DEFAULT NULL,
  `c_day2` varchar(10) NOT NULL,
  `Allocation` varchar(20) NOT NULL DEFAULT 'Not Assigned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_code`, `c_name`, `c_type`, `c_sec`, `c_startTime`, `c_endTime`, `c_day1`, `c_day2`, `Allocation`) VALUES
(43, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'L', '08:30', '11:00', 'Sat', '', 'Assigned'),
(44, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'E', '11:11', '13:40', 'Sat', '', 'Not Assigned'),
(45, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'Y', '14:00', '16:30', 'Sat', '', 'Assigned'),
(46, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'A', '08:30', '11:00', 'Sat', '', 'Not Assigned'),
(47, 'CSE 1111', 'Structured Programming Language', 'Theory', 'V', '15:11', '16:30', 'Sat', 'Tue', 'Assigned'),
(48, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Z', '15:11', '16:30', 'Sat', 'Tue', 'Assigned'),
(49, 'CSE 1111', 'Structured Programming Language', 'Theory', 'H', '11:11', '12:30', 'Sat', 'Tue', 'Assigned'),
(50, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Q', '13:51', '15:10', 'Sat', 'Tue', 'Not Assigned'),
(51, 'CSE 1111', 'Structured Programming Language', 'Theory', 'P', '12:31', '13:50', 'Sat', 'Tue', 'Assigned'),
(52, 'CSE 1111', 'Structured Programming Language', 'Theory', 'Y', '15:11', '16:30', 'Sat', 'Tue', 'Assigned'),
(53, 'CSE 1111', 'Structured Programming Language', 'Theory', 'S', '13:51', '15:10', 'Sat', 'Tue', 'Assigned'),
(54, 'CSE 1111', 'Structured Programming Language', 'Theory', 'K', '09:51', '11:10', 'Sat', 'Tue', 'Not Assigned'),
(55, 'CSE 1111', 'Structured Programming Language', 'Theory', 'E', '12:31', '13:50', 'Sat', 'Tue', 'Not Assigned'),
(56, 'CSE 1111', 'Structured Programming Language', 'Theory', 'D', '09:51', '11:10', 'Sat', 'Tue', 'Not Assigned'),
(57, 'CSE 1111', 'Structured Programming Language', 'Theory', 'I', '11:11', '12:30', 'Sat', 'Tue', 'Not Assigned'),
(58, 'CSE 1111', 'Structured Programming Language', 'Theory', 'O', '13:51', '15:10', 'Sat', 'Tue', 'Not Assigned'),
(59, 'CSE 1111', 'Structured Programming Language', 'Theory', 'X', '15:11', '16:30', 'Sat', 'Tue', 'Not Assigned'),
(60, 'CSE 1111', 'Structured Programming Language', 'Theory', 'T', '08:30', '09:50', 'Sat', 'Tue', 'Not Assigned'),
(61, 'CSE 1111', 'Structured Programming Language', 'Theory', 'AA', '09:51', '11:10', 'Sat', 'Tue', 'Not Assigned'),
(62, 'CSE 1111', 'Structured Programming Language', 'Theory', 'B', '08:30', '09:50', 'Sat', 'Tue', 'Assigned'),
(63, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'V', '08:30', '11:00', 'Sat', '', 'Not Assigned'),
(64, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'AE', '08:30', '11:00', 'Sat', '', 'Not Assigned'),
(65, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'H', '08:30', '11:00', 'Sat', '', 'Not Assigned'),
(66, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'O', '14:00', '16:30', 'Sat', '', 'Not Assigned'),
(67, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'E', '14:00', '16:30', 'Sat', '', 'Not Assigned'),
(68, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'L', '14:00', '16:30', 'Sat', '', 'Not Assigned'),
(69, 'CSE 1112', 'Structured Programming Language Laboratory', 'Lab', 'A', '11:11', '13:40', 'Sat', '', 'Not Assigned'),
(70, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'I', '12:31', '13:50', 'Sun', 'Wed', 'Not Assigned'),
(71, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'G', '13:51', '15:10', 'Sun', '', 'Not Assigned'),
(72, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'B', '08:30', '09:50', 'Wed', '', 'Not Assigned'),
(73, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'E', '11:11', '12:30', 'Wed', '', 'Not Assigned'),
(74, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'L', '15:11', '16:30', 'Sat', 'Tue', 'Not Assigned'),
(75, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'K', '13:51', '15:10', 'Sat', 'Tue', 'Not Assigned'),
(76, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'J', '13:51', '15:10', 'Sat', 'Tue', 'Not Assigned'),
(77, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'F', '12:31', '13:50', 'Sat', 'Tue', 'Not Assigned'),
(78, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'C', '09:51', '11:10', 'Sat', 'Tue', 'Not Assigned'),
(79, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'N', '12:31', '13:50', 'Sat', 'Tue', 'Not Assigned'),
(80, 'CSE 1115', 'Object Oriented Programming', 'Theory', 'M', '12:31', '13:50', 'Sat', 'Tue', 'Not Assigned'),
(81, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'J', '11:11', '13:40', 'Sat', '', 'Not Assigned'),
(82, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'C', '11:11', '13:40', 'Sat', '', 'Not Assigned'),
(83, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'K', '11:11', '13:40', 'Sat', '', 'Not Assigned'),
(84, 'CSE 1116', 'Object Oriented Programming Laboratory', 'Lab', 'F', '14:00', '16:30', 'Sat', '', 'Assigned');

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
(1, 'Hasan Sarwar', 'HS', '', '', 'CSE', 'Professor', 1001, 2, 0, 0, 0, 1),
(2, 'Mohammad Nurul Huda', 'MNH', '', '', 'CSE', 'Professor', 1002, 0, 0, 0, 0, 1),
(3, 'Khondaker Abdullah -Al-Mamun', 'KM', '', '', 'CSE', 'Professor', 1003, 0, 2, 0, 2, 1),
(4, 'Salekul Islam', 'SaIm', '', '', 'CSE', 'Professor', 1004, 0, 0, 0, 0, 1),
(5, 'A.K.M. Muzahidul Islam', 'AKMMI', '', '', 'CSE', 'Professor', 1005, 0, 0, 0, 0, 1),
(6, 'Md. Motaharul Islam', 'MdMIm', '', '', 'CSE', 'Professor', 1006, 0, 0, 0, 0, 1),
(7, 'Dewan Md. Farid', 'DMF', '', '', 'CSE', 'Professor', 1007, 1, 2, 0, 4, 1),
(8, 'Al-Sakib Khan Pathan', 'ASKP', '', '', 'CSE', 'Professor', 1008, 0, 0, 0, 0, 1),
(9, 'Swakkhar Shatabda', 'SS', '', '', 'CSE', 'Professor', 1009, 0, 0, 0, 0, 1),
(10, 'Mohammad Shahriar Rahman', 'MdSR', '', '', 'CSE', 'Professor', 1010, 0, 0, 0, 0, 1),
(11, 'Muhammad Nomani Kabir', 'MNK', '', '', 'CSE', 'Associate Professor', 1011, 1, 4, 1, 3, 1),
(12, 'Suman Ahmmed', 'SA', '', '', 'CSE', 'Associate Professor', 1012, 0, 0, 0, 0, 1),
(13, 'Riasat Azim', 'RtAm', '', '', 'CSE', 'Assistant Professor (Category 1)', 1013, 0, 0, 0, 0, 1),
(14, 'Mohammad Mamun Elahi', 'ME', '', '', 'CSE', 'Assistant Professor (Category 2)', 1014, 0, 5, 0, 2, 1),
(15, 'Rubaiya Rahtin Khan', 'RRK', '', '', 'CSE', 'Assistant Professor (Category 2)', 1015, 0, 0, 0, 0, 1),
(16, 'Md. Benzir Ahmed', 'MBAd', '', '', 'CSE', 'Assistant Professor (Category 2)', 1016, 0, 0, 0, 0, 1),
(17, 'Nahid Hossain', 'NHn', '', '', 'CSE', 'Assistant Professor (Category 2)', 1017, 0, 0, 0, 0, 1),
(18, 'Khushnur Binte Jahangir', 'KBJ', '', '', 'CSE', 'Lecturer', 1018, 0, 3, 0, 3, 1),
(19, 'Minhajul Bashir', 'MiBa', '', '', 'CSE', 'Lecturer', 1019, 0, 0, 0, 0, 1),
(20, 'Shoib Ahmed Shourav', 'SAhSh', '', '', 'CSE', 'Lecturer', 1020, 0, 0, 0, 0, 1),
(21, 'Subangkar Karmaker Shanto', 'ShKS', '', '', 'CSE', 'Lecturer', 1021, 0, 0, 0, 0, 1),
(22, 'Ahad', 'AAS', 'ashoikot@gmailcom', '01312404674', 'CSE', 'Lecturer', 801, 3, 4, 0, 2, 1);

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
(55, 'import', 'Course list imported at (2024/04/20  17:49) ---admin1', 'admin1', 'add'),
(56, 'note', 'Note created for Dewan Md. Farid (2024/04/23  10:43) ---admin1', 'admin1', 'create'),
(57, 'note', 'Note created for DMF (2024/04/23  11:08) ---admin1', 'admin1', 'create'),
(58, 'note', 'Deleted a note [Note id = 10] 2024/04/23  17:30 ---admin1', 'admin1', 'delete'),
(59, 'faculty', 'Faculty \"Ahad\" added (2024/04/23  17:33) ---admin1', 'admin1', 'add'),
(60, 'note', 'Note created for AAS (2024/04/23  17:33) ---admin1', 'admin1', 'create'),
(61, 'note', 'Note created for AAS (2024/04/23  17:33) ---admin1', 'admin1', 'create'),
(62, 'import', 'Course list imported at (2024/04/24  06:45) ---admin1', 'admin1', 'add'),
(63, 'import', 'Course list imported at (2024/04/24  18:00) ---admin1', 'admin1', 'add'),
(64, 'import', 'Course list imported at (2024/04/24  18:09) ---admin1', 'admin1', 'add'),
(65, 'import', 'Course list imported at (2024/04/24  18:10) ---admin1', 'admin1', 'add'),
(66, 'import', 'Course list imported at (2024/04/24  18:13) ---admin1', 'admin1', 'add'),
(67, 'note', 'Note created for DMF (2024/04/28  20:45) ---admin1', 'admin1', 'create'),
(68, 'course', 'Course \"Xxxxzzzxxxx\" added (2024/04/30  07:26) ---admin1', 'admin1', 'add'),
(69, 'import', 'Course list imported at (2024/04/30  07:35) ---admin1', 'admin1', 'add'),
(70, 'import', 'Course list imported at (2024/05/01  17:40) ---admin1', 'admin1', 'add'),
(71, 'note', 'Deleted a note [Note id = 10] 2024/05/02  16:31 ---admin1', 'admin1', 'delete'),
(72, 'note', 'Deleted a note [Note id = 13] 2024/05/02  16:31 ---admin1', 'admin1', 'delete'),
(73, 'Assigned', 'Hasan Sarwar assigned [47] at (2024/05/04  18:09) ---admin1', 'admin1', 'Faculty course'),
(74, 'Assigned', 'Ahad assigned [48] at (2024/05/04  18:47) ---admin1', 'admin1', 'Faculty course'),
(75, 'Assigned', 'Ahad assigned [49] at (2024/05/04  19:14) ---admin1', 'admin1', 'Faculty course'),
(76, 'Assigned', 'Hasan Sarwar assigned [53] at (2024/05/04  19:16) ---admin1', 'admin1', 'Faculty course'),
(77, 'Assigned', 'Ahad assigned [62] at (2024/05/04  19:17) ---admin1', 'admin1', 'Faculty course'),
(78, 'Assigned', 'Muhammad Nomani Kabir assigned [45] at (2024/05/04  20:50) ---admin1', 'admin1', 'Faculty course'),
(79, 'Assigned', 'Muhammad Nomani Kabir assigned [51] at (2024/05/04  21:56) ---admin1', 'admin1', 'Faculty course'),
(80, 'Assigned', 'Dewan Md. Farid assigned [52] at (2024/05/04  21:56) ---admin1', 'admin1', 'Faculty course');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(3) NOT NULL,
  `f_code` varchar(50) NOT NULL,
  `note_content` varchar(255) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `f_code`, `note_content`, `visibility`) VALUES
(11, 'AAS', 'BIO', 1),
(12, 'AAS', 'Physics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `t_id` int(2) NOT NULL,
  `f_code` varchar(15) NOT NULL,
  `c_id` varchar(15) NOT NULL,
  `present` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`t_id`, `f_code`, `c_id`, `present`) VALUES
(11, 'HS', '53', 1),
(13, 'MNK', '45', 1),
(14, 'MNK', '51', 1),
(15, 'DMF', '52', 1);

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
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `t_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
