-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 03:40 AM
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
-- Database: `locallibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_year` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `published_year`, `genre`) VALUES
(1, 'Romeo and Juliet', 'William Shakespear', '1812', 'Love'),
(2, 'Romeo and Juliet', 'William Shakespear', '1812', 'Love'),
(3, 'awd', 'awdwa', 'wada', 'dwadwa'),
(4, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(5, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(6, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(7, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(8, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(9, 'Hunter X Hunter', 'Yoshihiro Togashi', '1998', 'Action/Violence'),
(10, 'Naruto', 'Kishimoto', '1999', 'Action/Violence');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
