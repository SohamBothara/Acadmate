-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 11:09 AM
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
-- Database: `acadmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `body`, `created_at`) VALUES
(25, 34, 'great explaination', '2024-04-08 02:55:59'),
(26, 34, 'liked it', '2024-04-08 03:00:23'),
(36, 94, 'even i do not know\r\n', '2024-04-10 09:05:45'),
(37, 94, 'even i do not know\r\n', '2024-04-10 09:06:02'),
(38, 95, 'good\r\n\r\n', '2024-04-10 09:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upvotes` int(11) NOT NULL DEFAULT 0,
  `downvotes` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `semester`, `branch`, `subject`, `description`, `tags`, `file_path`, `upvotes`, `downvotes`, `created_at`) VALUES
(14, '', 'sem3', 'Comps', 'ITVC', 'ITVC Formula', '', 'uploads/ITVC Formula.pdf', 0, 0, '2024-04-13 19:17:54'),
(15, '', 'sem4', 'Comps', 'TAC', 'TAC Notes', '', 'uploads/vaibhav sir TACD notes.pdf', 5, 1, '2024-04-13 19:19:17'),
(16, '', 'sem4', 'Comps', 'TAC', 'Tacd Notes 2', '', 'uploads/TACD_ISE_Comps-A_VPV.pdf', 3, 0, '2024-04-13 20:05:01'),
(17, '', 'sem3', 'Comps', 'COA', 'IMP qs', '', 'uploads/IMP QUESTIONS MODULE 2.pdf', 0, 0, '2024-04-13 20:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `body`, `created_at`, `author`) VALUES
(34, 'Quadratic Equations', 'Quadratic Equation = 1234567890', '2024-04-08 02:55:48', 'John Doe'),
(94, 'From where to study php', 'help ', '2024-04-10 09:05:32', 'soham'),
(95, 'php', 'hello', '2024-04-10 09:45:33', 'raghav'),
(98, 'Html', 'html css js frontend', '2024-04-14 09:07:55', 'raghav');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_like` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `college` varchar(128) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `semester` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `uid`, `pwd`, `college`, `branch`, `semester`) VALUES
(1, 'Soham', 'soham.bot@gmail.com', 'soham.bot', '$2y$10$rM6nkDalQpLbnsJP2alS7uP/lQLIcTHrqoCJGae/r3CR4TPfTiTR2', 'kjsce', 'Computers', '4'),
(2, 'Raghav Garg', 'raghav.garg@somaiya.edu', 'raghav.garg', '$2y$10$N5GdP5kair42w2ds/aJ3auxXutEvPVwte284klhm3GP6iLYNVn21K', 'kjsce', 'Computers', '5'),
(3, 'abc', '123@gmail.com', 'abc', '$2y$10$J1vo59kWAgdpNqPPIhOebunWEx4pG2KRtsdbQF3.z4h/ak2Q1hfny', 'kjsce', 'Computers', '4'),
(4, 'abc', 'abcd@gmail.com', 'abcd@gmail.com', '$2y$10$Md8.PnEG3.bvWNcmxx3QAey7Jt2YGdYXZthARW0TSzhG1TZ0doqxa', 'kjsce', 'Computers', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
