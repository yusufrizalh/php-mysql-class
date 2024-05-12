-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 05:46 AM
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
-- Database: `db_phpmysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Peter', 'Ackroyd', 'peter.ackroyd@gmail.com', 'London', '2024-05-12 00:51:38', '2024-05-12 00:51:38'),
(2, 'Douglas', 'Adams', 'douglas.adams@email.com', 'Manchester', '2024-05-12 00:51:46', '2024-05-12 00:51:46'),
(3, 'Isabel', 'Allende', 'isabel.allende@email.com', 'Munich', '2024-05-12 00:51:51', '2024-05-12 00:51:51'),
(4, 'Martin', 'Amis', 'martin_amis@email.com', 'London', '2024-05-12 00:51:58', '2024-05-12 00:51:58'),
(5, 'Diana', 'Athill', 'diana.athill@email.com', 'Paris', '2024-05-12 00:52:02', '2024-05-12 00:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `isbn` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `fk_author_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `price`, `fk_author_id`, `created_at`, `updated_at`) VALUES
(1, '9981237560', 'Node.js and Express', 77.77, 5, '2024-05-12 01:58:21', '2024-05-12 01:58:21'),
(2, '9283790028', 'Building Web Application with PHP & MySQL', 40.55, 1, '2024-05-12 01:58:52', '2024-05-12 01:58:52'),
(3, '9288830459', 'Fullstack Development with Node, React and MySQL', 120.00, 3, '2024-05-12 01:59:35', '2024-05-12 01:59:35'),
(4, '95574882310', 'Frontend Development using React.js', 86.66, 4, '2024-05-12 02:00:10', '2024-05-12 02:00:45'),
(5, '9956230559', 'Oracle Database Administration', 250.00, 5, '2024-05-12 02:15:47', '2024-05-12 03:37:25'),
(6, '9881277465', 'PostgreSQL Database Querying', 89.99, 5, '2024-05-12 03:38:06', '2024-05-12 03:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `active`, `password`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Yusuf Rizal', 'yusufrizal@email.com', 1, '$2y$10$4SY0P/jonQGZ8vdpcfVtU.gKExSfsEqGtZ3QhsSJOfGUJOdpg8B.a', NULL, '2024-05-10 15:53:50', NULL),
(2, 'Benazir Shea', 'benazir.shea@email.com', 1, '$2y$10$VDj.f9uKUt8Xm8lPzqyCL.ckeXOnnnJbE6EiRBPapXOb1Bul2Zx1i', NULL, '2024-05-11 22:22:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author_id` (`fk_author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`fk_author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
