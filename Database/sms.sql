-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2026 at 09:28 AM
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
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_chat_history`
--

CREATE TABLE `ai_chat_history` (
  `id` int(11) NOT NULL,
  `user_message` text NOT NULL,
  `ai_reply` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ai_chat_history`
--

INSERT INTO `ai_chat_history` (`id`, `user_message`, `ai_reply`, `created_at`) VALUES
(1, '63 ejpt', 'AHMED SAHAL ADAM scored 98.0 in EJPT', '2026-04-27 17:08:14'),
(2, '63 oscp', 'AHMED SAHAL ADAM scored 88.0 in OSCP', '2026-04-27 17:08:22'),
(3, '63 Python', 'Ask GPA or course score', '2026-04-27 17:08:44'),
(4, '63 python', 'Ask GPA or course score', '2026-04-27 17:09:10'),
(5, '63 php', 'AHMED SAHAL ADAM scored 91.0 in PHP', '2026-04-27 17:09:45'),
(6, '63 gpa', 'AHMED SAHAL ADAM GPA is 92.43', '2026-04-27 17:10:32'),
(7, '63 gpa', 'AHMED SAHAL ADAM GPA is 92.43', '2026-04-27 17:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `exam_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`exam_id`, `student_id`, `course_code`, `course_name`, `score`, `semester`, `exam_date`) VALUES
(16, 63, 'GUB-1024', 'OSCP', 88.00, 'Semester 9', '2024-02-17'),
(17, 63, 'GUB-1029', 'EJPT', 98.00, 'Semester 2', '2025-02-19'),
(18, 63, 'GUB-9201', 'PHP', 91.00, 'Semester 3', '2018-06-17'),
(19, 63, 'GUB-0193', 'GOLANG', 79.00, 'Semester 4', '2018-11-17'),
(20, 63, 'GUB-0198', 'RUST', 95.00, 'Semester 5', '2025-12-22'),
(24, 63, 'GUB-128', 'SOC ANLYSIS', 99.00, 'Semester 3', '2024-04-29'),
(32, 63, 'GUB-1033', 'DevOps', 97.00, 'Semester 8', '2026-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `email`, `phone`) VALUES
(6, 'Mohamed Ali ', 'Mohamed@gmail.com', '0659375000'),
(8, 'salim muuse ahmed', 'ahmedsahal@gmail.com', '38378373738'),
(61, 'Mohamed Ali ', 'ahmedsahal@gmail.com', '299292'),
(63, 'AHMED SAHAL ADAM', 'ahmedsahal@gmail.com', '3738739'),
(64, 'abdilathif adam hassan', 'abdilathif@gmail.com', '98498498'),
(67, 'Mustafa Osman Mohamed', 'Mustafa@gmail.com', '8474874'),
(68, 'Abdilahi Farah Jama', 'abdilahi@gmail.com', '983893'),
(77, 'Warda sulaiman Ali', 'Warda@gmail.com', '0634782018');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` enum('admin','teacher','viewer') NOT NULL DEFAULT 'viewer',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `failed_attempts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `status`, `failed_attempts`) VALUES
(1, 'ahmedsahal', '12345', 'localhost770@gmail.com', 'admin', 'active', 0),
(2, 'user1', '1234567890', 'user1@gmail.com', 'teacher', 'active', 0),
(3, 'user2', '1234567890', '', 'viewer', 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_chat_history`
--
ALTER TABLE `ai_chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `unique_student_course` (`student_id`,`course_code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
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
-- AUTO_INCREMENT for table `ai_chat_history`
--
ALTER TABLE `ai_chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
