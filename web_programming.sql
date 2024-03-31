-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 10:34 PM
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
(17, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'A', '8:30 - 9:50', 'Sat / Tues', 'Assigned'),
(18, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'B', '12:31 - 1:50', 'Sat / Tues', 'Not Assigned'),
(19, 'ACT2111/ACT111', 'Financial And Managerial Accounting', 'Theory', 'C', '3:11 - 4:30', 'Sat / Tues', 'Not Assigned'),
(20, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'A', '9:51 - 11:10', 'Sun / Wed', 'Assigned'),
(21, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'B', '8:30 - 9:50', 'Sun / Wed', 'Not Assigned'),
(22, 'BDS1201', 'History Of The Emergence Of Bangladesh', 'Theory', 'C', '9:51 - 11:10', 'Sat / Tues', 'Assigned'),
(23, 'BIO3105', 'Biology For Engineers', 'Theory', 'A', '11:11 - 12:30', 'Sun / Wed', 'Assigned'),
(24, 'BIO3105', 'Biology For Engineers', 'Theory', 'B', '11:11 - 12:30', 'Sat / Tues', 'Assigned'),
(25, 'BIO3105', 'Biology For Engineers', 'Theory', 'C', '9:51 - 11:10', 'Sat / Tues', 'Assigned'),
(26, 'BIO3105', 'Biology For Engineers', 'Theory', 'D', '9:51 - 11:10', 'Sun / Wed', 'Not Assigned'),
(27, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'A', '8:30 - 11:00', 'Sat', 'Not Assigned'),
(28, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'B', '8:30 - 11:00', 'Tues', 'Not Assigned'),
(29, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'E', '11:11 - 1:40', 'Sat', 'Not Assigned'),
(30, 'CSE1110', 'Introduction To Computer Systems', 'Lab', 'V', '2:00 - 4:30', 'Sun', 'Not Assigned'),
(31, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'A', '8:30 - 9:50', 'Sun / Wed', 'Not Assigned'),
(32, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'E', '12:31 - 1:50', 'Sat / Tues', 'Not Assigned'),
(33, 'CSE1111/CSI121', 'Structured Programming Language', 'Theory', 'X', '3:11 - 4:30', 'Sat / Tues', 'Assigned'),
(34, 'CSE1116/CSI212', 'Object Oriented Programming', 'Lab', 'A', '11:11 - 1:40', 'Sun', 'Assigned'),
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
  `dept` varchar(50) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `f_current_T` int(2) NOT NULL DEFAULT 0,
  `f_max_T` int(2) NOT NULL,
  `f_current_L` int(2) NOT NULL DEFAULT 0,
  `f_max_L` int(2) NOT NULL,
  `visible` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_name`, `f_code`, `f_mail`, `f_contact`, `dept`, `desig`, `f_current_T`, `f_max_T`, `f_current_L`, `f_max_L`, `visible`) VALUES
(2, 'Hasan Sarwar', 'HS', 'HS@gmail.com', '345636', '', '', 2, 2, 0, 0, 1),
(3, 'Mohammad Nurul Huda', 'MNH', 'MNH', '902738432', '', '', 0, 1, 0, 1, 1),
(4, 'Khondaker Abdullah-Al-Mamun', 'KM', 'KM', '72354793', '', '', 0, 1, 0, 1, 1),
(5, 'Salekul Islam', 'SaIm', 'SaIm@gmail.com', '497356', '', '', 0, 1, 0, 1, 1),
(6, 'A.K.M Muzahidul Islam', 'AKMMI', 'AKMMI@gmail.com', '37456239', '', '', 0, 1, 0, 1, 1),
(7, 'Md. Motaharul Islam', 'MdMIm', 'MdMIm', '73256248', '', '', 0, 1, 0, 1, 1),
(8, 'Dewan Md. Farid', 'DMF', 'DMF@gmail.com', '985648', '', '', 0, 2, 0, 1, 1),
(9, 'Al-Sakin Khan Pathan', 'ASKP', 'ASKP@gmailcom', '32547097', '', '', 0, 2, 0, 1, 1),
(10, 'Swakkar Shatabda', 'SS', 'SS@gmail.com', '39256276', '', '', 0, 2, 0, 2, 1),
(11, 'Mohammad Shahriar Rahman', 'MdSR', 'MdSR@gmail.com', '23764498', '', '', 0, 2, 0, 2, 1),
(12, 'Muhammad Nomani Kabir', 'MNK', 'MNK@gmail.com', '83724597', '', '', 0, 2, 0, 2, 1),
(13, 'Suman Ahmmed', 'SA', 'SA@gmail.com', '3436625', '', '', 0, 3, 0, 2, 1),
(14, 'Riasat Azim', 'RtAm', 'RtAm@gmail.com', '45632342', '', '', 1, 2, 0, 3, 1),
(15, 'Mohammad Mamun Elahi', 'ME', 'ME@gmail.com', '13248765001', '', '', 0, 2, 0, 3, 1),
(16, 'Rubaiya Rahtin Khan', 'RRK', 'RRK@gmail.com', '23499834', '', '', 0, 3, 0, 2, 1),
(17, 'Md. Benzir Ahmed', 'MBAd', 'ABAd@gmail.com', '66773324', '', '', 0, 3, 0, 2, 1),
(18, 'Nahid Hossain', 'NHn', 'Nhn@gmail.com', '32984765', '', '', 1, 3, 1, 2, 1),
(19, 'Khushnur Binte Jahangir', 'KBJ', 'KBJ@gmail.com', '019743234', '', '', 0, 3, 0, 3, 1),
(20, 'Minhajul Bashir', 'MiBa', 'MiBa@gmail.com', '0172312132', '', '', 1, 3, 0, 3, 1),
(21, 'Shoib Ahmed Shourav', 'SAhSh', 'SAhSh@gmail.com', '013889731', '', '', 0, 4, 0, 1, 1),
(37, 'Subangkar Karmaker Shanto', 'ShKS', 'ShKS@gmail.com', '018744434', '', '', 0, 4, 0, 2, 1);

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
(24, 'note', 'Note created for Nahid Hossain (2024/02/25  10:17) ---admin1', 'admin1', 'create'),
(25, 'Facult course', 'Faculty[Hasan Sarwar] assigned to Biology For Engineers (2024/02/25  17:22) ---admin1', 'admin1', 'Assigned'),
(26, 'Facult course', 'Faculty[Hasan Sarwar] assigned to History Of The Emergence Of Bangladesh (2024/02/25  17:22) ---admin1', 'admin1', 'Assigned'),
(27, 'Facult course', 'Faculty[Anayatul Ahad Shoikot] assigned to Financial And Managerial Accounting (2024/02/25  17:26) ---admin1', 'admin1', 'Assigned'),
(28, 'note', 'Deleted a note [Note id = 1] 2024/02/26  16:58 ---admin1', 'admin1', 'delete'),
(29, 'note', 'Deleted a note [Note id = 2] 2024/02/26  16:58 ---admin1', 'admin1', 'delete'),
(30, 'note', 'Deleted a note [Note id = 3] 2024/02/26  16:58 ---admin1', 'admin1', 'delete'),
(31, 'Facult course', 'Faculty[Riasat Azim] assigned to Biology For Engineers (2024/02/27  15:14) ---admin1', 'admin1', 'Assigned'),
(32, 'note', 'Note created for Mohammad Mamun Elahi (2024/03/14  14:14) ---admin1', 'admin1', 'create'),
(33, 'note', 'Deleted a note [Note id = 4] 2024/03/14  14:14 ---admin1', 'admin1', 'delete'),
(34, 'faculty', 'Faculty \"Jannatul Ferdous Tanjum\" added (2024/03/14  15:27) ---admin1', 'admin1', 'add'),
(35, 'Facult course', 'Faculty[Jannatul Ferdous Tanjum] assigned to History Of The Emergence Of Bangladesh (2024/03/14  15:34) ---admin1', 'admin1', 'Assigned'),
(36, 'faculty', 'Faculty \"Ahad\" added (2024/03/17  07:24) ---admin1', 'admin1', 'add'),
(37, 'faculty', 'Faculty \"Ahad2\" added (2024/03/17  07:28) ---admin1', 'admin1', 'add'),
(38, 'note', 'Note created for Nahid Hossain (2024/03/28  06:42) ---admin1', 'admin1', 'create'),
(39, 'note', 'Note created for Khushnur Binte Jahangir (2024/03/30  18:24) ---admin1', 'admin1', 'create'),
(40, 'note', 'Deleted a note [Note id = 5] 2024/03/30  18:24 ---admin1', 'admin1', 'delete'),
(41, 'note', 'Deleted a note [Note id = 6] 2024/03/30  18:24 ---admin1', 'admin1', 'delete'),
(42, 'faculty', 'Faculty \"Bbb\" added (2024/03/30  19:38) ---admin1', 'admin1', 'add'),
(43, 'course', 'Course \"Aawdasdwa\" added (2024/03/30  20:11) ---admin1', 'admin1', 'add'),
(44, 'course', 'Course \"Awd\" added (2024/03/30  21:03) ---admin1', 'admin1', 'add'),
(45, 'Facult course', 'Faculty[Nahid Hossain] assigned to Biology For Engineers (2024/03/30  21:25) ---admin1', 'admin1', 'Assigned'),
(46, 'Facult course', 'Faculty[Minhajul Bashir] assigned to Structured Programming Language (2024/03/30  21:37) ---admin1', 'admin1', 'Assigned'),
(47, 'note', 'Note created for Minhajul Bashir (2024/03/30  22:32) ---admin1', 'admin1', 'create'),
(48, 'note', 'Note created for Khondaker Abdullah-Al-Mamun (2024/03/30  22:33) ---admin1', 'admin1', 'create');

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
(7, 'Minhajul Bashir', 'ABC', 1),
(8, 'Khondaker Abdullah-Al-Mamun', 'asdwdawfsad', 1);

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
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`t_id`, `f_name`, `c_name`, `section`, `time`, `day`, `rating`, `present`) VALUES
(1, 'Nahid Hossain', 'Object Oriented Programming', 'E', '8:30 - 11:00', 'Tues', 0, 1),
(2, 'Hasan Sarwar', 'Biology For Engineers', 'A', '11:11 - 12:30', 'Sun / Wed', 0, 1),
(3, 'Hasan Sarwar', 'History Of The Emergence Of Bangladesh', 'A', '9:51 - 11:10', 'Sun / Wed', 0, 1),
(4, 'Anayatul Ahad Shoikot', 'Financial And Managerial Accounting', 'A', '8:30 - 9:50', 'Sat / Tues', 0, 1),
(5, 'Riasat Azim', 'Biology For Engineers', 'B', '11:11 - 12:30', 'Sat / Tues', 0, 1),
(6, 'Jannatul Ferdous Tanjum', 'History Of The Emergence Of Bangladesh', 'C', '9:51 - 11:10', 'Sat / Tues', 0, 1),
(7, 'Nahid Hossain', 'Biology For Engineers', 'C', '9:51 - 11:10', 'Sat / Tues', 0, 1),
(8, 'Minhajul Bashir', 'Structured Programming Language', 'X', '3:11 - 4:30', 'Sat / Tues', 0, 1);

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
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `t_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
