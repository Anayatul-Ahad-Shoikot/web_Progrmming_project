-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 10:46 AM
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
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_code`, `c_name`, `c_type`, `c_sec`, `c_time`, `c_day`, `status`) VALUES
(3, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'U', '2:00 - 4:30', 'Tues', 0),
(4, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'L', '8:30 - 11:00', 'Sat', 0),
(5, 'CSE 1110', 'Introduction to Computer Systems', 'Lab', 'F', '11:11 - 1:40', 'Sun', 0),
(6, 'CSE1111', 'Structured Programmimg Language', 'Theory', 'L', '9:51 - 11:10', 'Sun/Wed', 0),
(7, 'CSE1111', 'Structured Programmimg Language', 'Theory', 'Q', '1:51 - 3:10', 'Sat/Tues', 0),
(8, 'CSE1112', 'Structured Programmimg Language', 'Lab', 'B', '11:11 - 1:40', 'Tues', 0),
(9, 'CSE1112', 'Structured Programmimg Language', 'Lab', 'H', '8:30 - 11:00', 'Sat', 0),
(10, 'CSE1116', 'Object Oriented Programming', 'Lab', 'F', '2:00 - 4:30', 'Sat', 0),
(11, 'CSE1115', 'Object Oriented Programming', 'Theory', 'I', '12:31 - 1:50', 'Sat/Tues', 0),
(12, 'CSE1115', 'Object Oriented Programming', 'Theory', 'H', '11:11 - 12:30', 'Sun/Wed', 0);

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
(1, 'Image', 'Image updated (2024/02/18  16:42) ---admin1', 'admin1', 'change'),
(2, 'Image', 'Image updated (2024/02/18  16:48) ---admin2', 'admin2', 'change'),
(3, 'new', 'new Admin added (2024/02/18  17:16) ---admin1', 'admin1', 'add'),
(4, 'faculty', 'Faculty Anayatul Ahad Shoikot added (2024/02/21  07:21) ---admin1', 'admin1', 'add'),
(5, 'faculty', 'Faculty \"Hasan Sarwar\" added (2024/02/21  07:58) ---admin1', 'admin1', 'add'),
(6, 'faculty', 'Faculty \"Mohammad Nurul Huda\" added (2024/02/21  07:58) ---admin1', 'admin1', 'add'),
(7, 'faculty', 'Faculty \"Khondaker Abdullah-Al-Mamun\" added (2024/02/21  07:59) ---admin1', 'admin1', 'add'),
(8, 'faculty', 'Faculty \"Salekul Islam\" added (2024/02/21  08:00) ---admin1', 'admin1', 'add'),
(9, 'faculty', 'Faculty \"A.K.M Muzahidul Islam\" added (2024/02/21  08:13) ---admin1', 'admin1', 'add'),
(10, 'faculty', 'Faculty \"Md. Motaharul Islam\" added (2024/02/21  08:14) ---admin1', 'admin1', 'add'),
(11, 'faculty', 'Faculty \"Dewan Md. Farid\" added (2024/02/21  08:21) ---admin1', 'admin1', 'add'),
(12, 'faculty', 'Faculty \"Al-Sakin Khan Pathan\" added (2024/02/21  08:22) ---admin1', 'admin1', 'add'),
(13, 'faculty', 'Faculty \"Swakkar Shatabda\" added (2024/02/21  08:23) ---admin1', 'admin1', 'add'),
(14, 'faculty', 'Faculty \"Mohammad Shahriar Rahman\" added (2024/02/21  08:24) ---admin1', 'admin1', 'add'),
(15, 'faculty', 'Faculty \"Muhammad Nomani Kabir\" added (2024/02/21  08:25) ---admin1', 'admin1', 'add'),
(16, 'faculty', 'Faculty \"Suman Ahmmed\" added (2024/02/21  08:30) ---admin1', 'admin1', 'add'),
(17, 'faculty', 'Faculty \"Riasat Azim\" added (2024/02/21  08:34) ---admin1', 'admin1', 'add'),
(18, 'faculty', 'Faculty \"Mohammad Mamun Elahi\" added (2024/02/21  08:34) ---admin1', 'admin1', 'add'),
(19, 'faculty', 'Faculty \"Rubaiya Rahtin Khan\" added (2024/02/21  08:48) ---admin1', 'admin1', 'add'),
(20, 'faculty', 'Faculty \"Md. Benzir Ahmed\" added (2024/02/21  08:56) ---admin1', 'admin1', 'add'),
(21, 'faculty', 'Faculty \"Nahid Hossain\" added (2024/02/21  08:57) ---admin1', 'admin1', 'add'),
(22, 'faculty', 'Faculty \"Khushnur Binte Jahangir\" added (2024/02/21  08:58) ---admin1', 'admin1', 'add'),
(23, 'faculty', 'Faculty \"Minhajul Bashir\" added (2024/02/21  08:59) ---admin1', 'admin1', 'add'),
(24, 'faculty', 'Faculty \"Shoib Ahmed Shourav\" added (2024/02/21  09:01) ---admin1', 'admin1', 'add'),
(25, 'faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(26, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(27, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(28, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(29, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(30, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(31, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(32, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(33, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(34, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(35, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(36, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(37, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(38, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(39, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:04) ---admin1', 'admin1', 'add'),
(40, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:05) ---admin1', 'admin1', 'add'),
(41, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:05) ---admin1', 'admin1', 'add'),
(42, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:05) ---admin1', 'admin1', 'add'),
(43, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:05) ---admin1', 'admin1', 'add'),
(44, 'Faculty', 'Faculty \"Subangkar Karmaker Shanto\" added (2024/02/21  09:05) ---admin1', 'admin1', 'add'),
(45, 'course', 'Course \"Introduction to Computer Systems\" added (2024/02/21  12:25) ---admin1', 'admin1', 'add'),
(46, 'course', 'Course \"Introduction to Computer Systems\" added (2024/02/21  12:37) ---admin1', 'admin1', 'add'),
(47, 'course', 'Course \"Introduction to Computer Systems\" added (2024/02/21  12:40) ---admin1', 'admin1', 'add'),
(48, 'course', 'Course \"Introduction to Computer Systems\" added (2024/02/21  12:42) ---admin1', 'admin1', 'add'),
(49, 'course', 'Course \"Introduction to Computer Systems\" added (2024/02/21  12:42) ---admin1', 'admin1', 'add'),
(50, 'course', 'Course \"Structured Programmimg Language\" added (2024/02/21  12:45) ---admin1', 'admin1', 'add'),
(51, 'course', 'Course \"Structured Programmimg Language\" added (2024/02/21  12:46) ---admin1', 'admin1', 'add'),
(52, 'course', 'Course \"Structured Programmimg Language\" added (2024/02/21  12:47) ---admin1', 'admin1', 'add'),
(53, 'course', 'Course \"Structured Programmimg Language\" added (2024/02/21  12:48) ---admin1', 'admin1', 'add'),
(54, 'course', 'Course \"Object Oriented Programming\" added (2024/02/21  12:49) ---admin1', 'admin1', 'add'),
(55, 'course', 'Course \"Object Oriented Programming\" added (2024/02/21  12:50) ---admin1', 'admin1', 'add'),
(56, 'course', 'Course \"Object Oriented Programming\" added (2024/02/21  12:50) ---admin1', 'admin1', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(3) NOT NULL,
  `note_for` varchar(20) NOT NULL,
  `note_content` varchar(255) NOT NULL,
  `visibility` int(2) NOT NULL DEFAULT 1
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
  MODIFY `c_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
