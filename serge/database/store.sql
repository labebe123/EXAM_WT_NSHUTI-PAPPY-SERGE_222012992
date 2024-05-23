-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:51 AM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `image`, `password`) VALUES
(1, 'admin@gmail.com', '42.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessmentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `assessmentName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessmentId`, `courseId`, `assessmentName`, `description`, `createdAt`) VALUES
(1, 1, 'Customer Service Basics Assessment', 'Assessment for Customer Service Basics course.', '2024-05-22 20:00:58'),
(2, 2, 'Advanced Interaction Assessment', 'Assessment for Advanced Customer Interaction course.', '2024-05-22 20:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(6) NOT NULL,
  `total` int(10) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `image`, `quantity`, `price`, `total`, `email`) VALUES
(77, 'robe-t-shirt-blanche-petite', 'robe-t-shirt-blanche-petite.jpg', 1, 34000, 34000, 'tuganeamiel@gmail.com'),
(78, 'Jordan2015', 'Jordan2015_14-006_1.jpg', 1, 30000, 30000, 'tuganeamiel@gmail.com'),
(79, '46-blueshirt', '46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp (1).jpeg', 1, 50000, 50000, 'tuganeamiel@gmail.com'),
(80, 'Marshmello-jumper', 'Marshmello (1).jpg', 1, 30000, 30000, 'tuganeamiel@gmail.com'),
(81, 'Marshmello-jumper', 'Marshmello (1).jpg', 1, 30000, 30000, 'tuganeamiel@gmail.com'),
(82, 'Jordan2015', 'Jordan2015_14-006_1.jpg', 2, 30000, 60000, 'tuganeamiel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `firstname`, `lastname`, `country`, `phone`, `email`, `comment`) VALUES
(1, 'tugane', 'amiel', 'rwanda', 2147483647, 'tuganeamiel@gmail.com', 't may have been moved or deleted.t may have been moved or deleted.vvvt may have been moved or deleted.t may have been moved or deleted.t may have been moved or deleted.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `description`, `createdBy`, `createdAt`) VALUES
(1, 'Customer Service Basics', 'An introductory course on customer service principles.', 1, '2024-05-22 20:00:25'),
(2, 'Advanced Customer Interaction', 'A course on advanced techniques for interacting with customers.', 1, '2024-05-22 20:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`) VALUES
(3, 'tuganeamiel@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollmentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `enrollmentDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollmentId`, `courseId`, `userId`, `enrollmentDate`) VALUES
(1, 1, 2, '2024-05-22 20:01:28'),
(2, 2, 2, '2024-05-22 20:01:28'),
(3, 1, 4, '2024-05-22 20:01:28'),
(4, 2, 4, '2024-05-22 20:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lessonId` int(11) NOT NULL,
  `moduleId` int(11) NOT NULL,
  `lessonName` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonId`, `moduleId`, `lessonName`, `content`, `createdAt`) VALUES
(1, 1, 'What is Customer Service?', 'Lesson content for what is customer service.', '2024-05-22 20:00:47'),
(2, 1, 'Importance of Customer Service', 'Lesson content for importance of customer service.', '2024-05-22 20:00:47'),
(3, 2, 'Verbal Communication', 'Lesson content for verbal communication.', '2024-05-22 20:00:47'),
(4, 2, 'Non-verbal Communication', 'Lesson content for non-verbal communication.', '2024-05-22 20:00:47'),
(5, 3, 'Understanding Customer Needs', 'Lesson content for understanding customer needs.', '2024-05-22 20:00:47'),
(6, 3, 'De-escalation Techniques', 'Lesson content for de-escalation techniques.', '2024-05-22 20:00:47'),
(7, 4, 'Problem Identification', 'Lesson content for problem identification.', '2024-05-22 20:00:47'),
(8, 4, 'Solution Implementation', 'Lesson content for solution implementation.', '2024-05-22 20:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `moduleId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `moduleName` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`moduleId`, `courseId`, `moduleName`, `content`, `createdAt`) VALUES
(1, 1, 'Introduction to Customer Service', 'Content for introduction module.', '2024-05-22 20:00:34'),
(2, 1, 'Communication Skills', 'Content for communication skills module.', '2024-05-22 20:00:34'),
(3, 2, 'Handling Difficult Customers', 'Content for handling difficult customers module.', '2024-05-22 20:00:34'),
(4, 2, 'Effective Problem Solving', 'Content for effective problem solving module.', '2024-05-22 20:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `optionId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `optionText` varchar(255) NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`optionId`, `questionId`, `optionText`, `isCorrect`) VALUES
(1, 1, 'To satisfy customer needs and exceed expectations.', 1),
(2, 1, 'To make sales at any cost.', 0),
(3, 1, 'To avoid customer complaints.', 0),
(4, 1, 'To follow company policy.', 0),
(5, 2, 'TRUE', 1),
(6, 2, 'FALSE', 0),
(7, 4, 'TRUE', 0),
(8, 4, 'FALSE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `cost` int(5) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `cost`, `quantity`, `price`) VALUES
(2, 'Marshmello-jumper', 'Marshmello (1).jpg', 20000, 32, 30000),
(4, '46-blueshirt', '46-bfrybluesht02-being-fab-original-imaekjr8ymhnxznp (1).jpeg', 2000, 13, 50000),
(8, 'Jordan2015', 'Jordan2015_14-006_1.jpg', 17000, 34, 30000),
(12, 'robe-t-shirt-blanche-petite', 'robe-t-shirt-blanche-petite.jpg', 23000, 34, 34000);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progressId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `lessonId` int(11) NOT NULL,
  `status` enum('not_started','in_progress','completed') NOT NULL,
  `lastAccessed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progressId`, `userId`, `lessonId`, `status`, `lastAccessed`) VALUES
(1, 2, 1, 'completed', '2024-05-22 20:01:38'),
(2, 2, 2, 'in_progress', '2024-05-22 20:01:38'),
(3, 2, 3, 'not_started', '2024-05-22 20:01:38'),
(4, 4, 1, 'completed', '2024-05-22 20:01:38'),
(5, 4, 2, 'completed', '2024-05-22 20:01:38'),
(6, 4, 3, 'in_progress', '2024-05-22 20:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionId` int(11) NOT NULL,
  `assessmentId` int(11) NOT NULL,
  `questionText` text NOT NULL,
  `questionType` enum('multiple_choice','true_false','short_answer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionId`, `assessmentId`, `questionText`, `questionType`) VALUES
(1, 1, 'What is the primary goal of customer service?', 'multiple_choice'),
(2, 1, 'True or False: Listening is an important part of communication.', 'true_false'),
(3, 2, 'Describe a technique for handling difficult customers.', 'short_answer'),
(4, 2, 'True or False: All customers are easy to deal with.', 'true_false');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `resultId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `assessmentId` int(11) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `completedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','trainer','trainee') NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `role`, `createdAt`) VALUES
(1, 'Alice', 'Johnson', 'alice.johnson@example.com', 'password123', 'trainer', '2024-05-22 20:00:15'),
(2, 'Bob', 'Smith', 'bob.smith@example.com', 'password456', 'trainee', '2024-05-22 20:00:15'),
(3, 'Charlie', 'Brown', 'charlie.brown@example.com', 'password789', 'admin', '2024-05-22 20:00:15'),
(4, 'Dana', 'White', 'dana.white@example.com', 'password101', 'trainee', '2024-05-22 20:00:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessmentId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `createdBy` (`createdBy`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollmentId`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonId`),
  ADD KEY `moduleId` (`moduleId`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`moduleId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progressId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `lessonId` (`lessonId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionId`),
  ADD KEY `assessmentId` (`assessmentId`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`resultId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `assessmentId` (`assessmentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `moduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `resultId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `users` (`userId`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`moduleId`) REFERENCES `modules` (`moduleId`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courses` (`courseId`);

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `questions` (`questionId`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`lessonId`) REFERENCES `lessons` (`lessonId`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`assessmentId`) REFERENCES `assessments` (`assessmentId`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`assessmentId`) REFERENCES `assessments` (`assessmentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
