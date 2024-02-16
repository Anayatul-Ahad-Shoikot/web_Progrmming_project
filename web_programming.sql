-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 06:48 PM
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
(4, 'AHAD', 'a@gmail.com', '$2y$10$NAyLysF7W3vke9rNO0JcTerVWmswzrhkhdL5aE8egs0.mdvKiLrwi', 1, 'img/416226397_799008138910419_2788070358869374265_n.jpg'),
(6, 'admin2', 'admin2@gmail.com', '$2y$10$1QZurPwfplIFUkArBaG1H.L991kCMiLaRHtjXNlHm9VnxcbO3v3Xq', 1, 'img/011212107.jpg'),
(12, 'admin9', 'admin9@gmail.com', '$2y$10$evLQ7Ch4Iz48TSdOMQtAqOxLcOP/FOzO5O.Bqzvmu5zJ8v/VY3zmS', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `his_id` int(3) NOT NULL,
  `key_word` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`his_id`, `key_word`, `content`) VALUES
(1, 'note created', 'A note is created for ahad at 2024-02-15 20:04.'),
(2, 'note created', 'A note is created for KMAE at 2024/02/16  04:29.'),
(3, 'Note Deleted', 'You deleted a note note id (4) at 2024/02/16  04:44.'),
(4, 'Note Deleted', 'You deleted a note note id (3) at 2024/02/16  10:18.'),
(5, 'note created', 'A note is created for AAS at 2024/02/16  10:20.'),
(6, 'Note Deleted', 'You deleted a note note id (5) at 2024/02/16  10:20.'),
(7, 'note created', 'A note is created for aas at 2024/02/16  10:20.'),
(8, 'note created', 'A note is created for asdwd at 2024/02/16  10:21.'),
(9, 'note created', 'A note is created for awds at 2024/02/16  10:22.'),
(10, 'Note Deleted', 'You deleted a note note id (6) at 2024/02/16  10:22.'),
(11, 'Note Deleted', 'You deleted a note note id (7) at 2024/02/16  10:22.'),
(12, 'Note Deleted', 'You deleted a note note id (8) at 2024/02/16  10:22.'),
(13, 'note created', 'A note is created for awdsa at 2024/02/16  10:24.'),
(14, 'note created', 'A note is created for awds at 2024/02/16  10:24.'),
(15, 'Note Deleted', 'You deleted a note note id (9) at 2024/02/16  10:27.'),
(16, 'Note Deleted', 'You deleted a note note id (10) at 2024/02/16  10:27.'),
(17, 'Notes Created', 'Note created for test by (2024/02/16  11:07).'),
(18, 'Note Deleted', 'admin deleted a note(Note id = 11) at 2024/02/16  11:08.'),
(19, 'Notes Created', 'Note created for asdwad by admin(2024/02/16  11:09).'),
(20, 'Note Deleted', 'admin deleted a note(Note id = 12) at 2024/02/16  11:23.'),
(21, 'Notes Created', 'Note created for efe by admin(2024/02/16  11:30).'),
(22, 'Note Deleted', 'admin deleted a note(Note id = 13) at 2024/02/16  11:30.'),
(23, 'Username changed', 'Username changed from admin to admin by admin at 2024/02/16  11:44).'),
(24, 'Image Update', 'Image updated byadmin at 2024/02/16  11:57).'),
(25, 'Username changed', 'Username changed from admin to AHAD by admin at (2024/02/16  11:59).'),
(26, 'Useremail changed', 'Email changed from  to ahad@gmail.com by -AHAD at (2024/02/16  12:01).'),
(27, 'Useremail changed', 'Email changed from  to a@gmail.com by -AHAD at (2024/02/16  12:02).'),
(28, 'Note', 'Note created for Nahid Hossain by AHAD(2024/02/16  12:14).');

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
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note_for`, `note_content`, `visibility`) VALUES
(3, 'ahad', 'this is second test for me', 0),
(4, 'KMAE', '2nd test.', 0),
(5, 'AAS', 'don\'t know how to implement', 0),
(6, 'aas', 'asdweafasdf', 0),
(7, 'asdwd', 'asdWd', 0),
(8, 'awds', 'awd', 0),
(9, 'awdsa', 'asdWdf', 0),
(10, 'awds', 'adsadw', 0),
(11, 'test', 'test test test test test test test test test test test test.', 0),
(12, 'asdwad', 'SdcrfugpSDOJF LASJ:KFHa', 0),
(13, 'efe', 'ASDFqwd', 0),
(14, 'Nahid Hossain', 'Web Programming - (2:00pm-4:30pm)', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `useremail` (`useremail`),
  ADD UNIQUE KEY `username_2` (`username`,`useremail`);

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
  MODIFY `ac_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `his_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
