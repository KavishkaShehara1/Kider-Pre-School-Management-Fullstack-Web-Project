-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 06:47 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(38) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `message` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Rio', 'rio@gmail.com', 123456789, 'I want to join web development course, Thank you');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`name`, `email`, `subject`, `message`, `id`) VALUES
('Real Rider', 'shehara@gmail.com', 'toner', 'hh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher`, `age`, `time`, `capacity`, `price`, `image`) VALUES
(1, 'Color Management', '1', '18 Years', '6 Month', '30ty', 9000, '../images/classes-1.jpg'),
(2, 'Art & Drawing', '1', '5-8 Years', '6month', '40ty', 100, '../images/classes-4.jpg'),
(3, 'Language & Speaking', '2', '18 Years', '6month', '40ty', 11, '../images/classes-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_child_form`
--

DROP TABLE IF EXISTS `guardian_child_form`;
CREATE TABLE IF NOT EXISTS `guardian_child_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `guardian_name` varchar(255) NOT NULL,
  `guardian_email` varchar(255) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `child_age` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guardian_child_form`
--

INSERT INTO `guardian_child_form` (`id`, `guardian_name`, `guardian_email`, `child_name`, `child_age`, `message`) VALUES
(1, 'Kanthi', 'kanthi@gmail.com', 'Kavishka', '22', 'hi'),
(2, 'kumara', 'kumara@gmail.com', 'Shehara', '20', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(38) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(38) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(38) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(1, 'John Doe', 'Web Designer', '../images/team-2.jpg'),
(2, 'John Doe', 'Web Designer', '../images/team-3.jpg'),
(3, 'John Doe', 'Web Designer', '../images/team-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_applications`
--

DROP TABLE IF EXISTS `teacher_applications`;
CREATE TABLE IF NOT EXISTS `teacher_applications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `specialized_subject` varchar(255) NOT NULL,
  `teaching_experience` int NOT NULL,
  `additional_skills` text,
  `resume_path` varchar(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher_applications`
--

INSERT INTO `teacher_applications` (`id`, `full_name`, `email`, `dob`, `contact`, `address`, `qualification`, `specialized_subject`, `teaching_experience`, `additional_skills`, `resume_path`, `photo_path`, `submission_date`) VALUES
(1, 'E.A Kavishka Shehara', 'sheharakavishka62@gmail.com', '2003-10-16', '0783807980', '49/A, Halewila, Kandewaththa, Handapangoda', 'Diploma', 'Software Developer', 2, 'Web Design', 'uploads/private school management.pdf', 'uploads/kavishka.jpg', '2024-12-09 06:20:33'),
(2, 'Real Rider', 'riderreal307@gmail.com', '2000-12-13', '0783807980', 'Kandewaththa ,handapangoda\r\nKaluthara', 'Degree', 'Software Developer', 7, 'no', 'uploads/private school management.pdf', 'uploads/kavishka.jpg', '2024-12-09 06:27:29'),
(3, 'Real Rider', 'shehara@gmail.com', '2024-12-12', '0783807980', 'Kandewaththa ,handapangoda\r\nKaluthara', 'Master&#039;s', 'toner', 7, 'dd', 'uploads/private school management.pdf', 'uploads/kavishka.jpg', '2024-12-09 06:32:08'),
(4, 'Real Rider', 'shehara@gmail.com', '2024-12-20', '0783807980', 'Kandewaththa ,handapangoda\r\nKaluthara', 'Other', '23rqr', 3, 'ss', 'uploads/private school management.pdf', 'uploads/Blue and Yellow Modern Digital Marketing Flyer (1).png', '2024-12-09 06:34:29'),
(5, 'Real Rider', 'riderreal307@gmail.com', '2024-12-07', '0783807980', 'Kandewaththa ,handapangoda\r\nKaluthara', 'Degree', 'fgbd', 14, 'dd', 'uploads/private school management.pdf', 'uploads/kavishka.jpg', '2024-12-09 06:38:25'),
(6, 'Real Rider', 'Kavishka@gmail.com', '2024-12-20', '0783807980', 'Kandewaththa ,handapangoda\r\nKaluthara', 'Diploma', '32', 1, 'yy', 'uploads/private school management.pdf', 'uploads/kavishka.jpg', '2024-12-09 06:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usertype` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', 123456789, 'admin@gmail.com', 'admin', '1234'),
(21, 'Jane', 123456789, 'jane@gmail.com', 'student', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
