-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 03:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `silsilah_budi`
--

CREATE TABLE `silsilah_budi` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `generation` int(11) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `silsilah_budi`
--

INSERT INTO `silsilah_budi` (`id`, `name`, `parent_id`, `generation`, `gender`) VALUES
(3, 'budi', NULL, 1, 'male'),
(4, 'dedi', 3, 2, 'male'),
(5, 'dodi', 3, 2, 'male'),
(6, 'dede', 3, 2, 'male'),
(7, 'dewi', 3, 2, 'female'),
(8, 'feri', 4, 3, 'male'),
(9, 'farah', 4, 3, 'female'),
(10, 'gugus', 5, 3, 'male'),
(11, 'gandi', 5, 3, 'male'),
(12, 'hani', 6, 3, 'female'),
(22, 'hana', 6, 3, 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `silsilah_budi`
--
ALTER TABLE `silsilah_budi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `silsilah_budi`
--
ALTER TABLE `silsilah_budi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
