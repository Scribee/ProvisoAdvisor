-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 07:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provisoadvising`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ID` int(11) NOT NULL,
  `Subject` varchar(32) NOT NULL,
  `Course#` int(11) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Year` int(11) NOT NULL,
  `Class` varchar(32) GENERATED ALWAYS AS (concat(`Subject`,`Course#`)) VIRTUAL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `Subject`, `Course#`, `Title`, `Year`, `Credits`) VALUES
(0, 'CS', 120, 'Computer Science 1', 1, 4),
(1, 'CS', 121, 'Computer Science 2', 1, 3),
(2, 'CS', 210, 'Programming Languages', 2, 3),
(3, 'CS', 240, 'Computer Operating Systems', 2, 3),
(4, 'CS', 150, 'Computer Organization and Architecture', 1, 3),
(5, 'MATH', 176, 'Discrete Mathematics', 1, 3),
(6, 'MATH', 170, 'Calculus 1', 1, 3),
(7, 'MATH', 175, 'Calculus 2', 2, 3),
(8, 'CS', 383, 'Software Engineering', 3, 4),
(9, 'CS', 385, 'Theory of Computation', 3, 3),
(10, 'CS', 404, 'Special Projects', 0, 3),
(11, 'CS', 270, 'System Software', 2, 3),
(12, 'CS', 395, 'Analysis of Algorithms', 3, 3),
(13, 'CS', 360, 'Database Systems', 3, 4),
(14, 'CS', 480, 'Senior Capstone Design 1', 4, 3),
(15, 'CS', 481, 'Senior Capstone Design 2', 4, 3),
(16, 'CS', 400, 'Contemporary Issues in Computer Science', 4, 1),
(17, 'CS', 445, 'Compiler Design', 0, 4),
(18, 'MATH', 330, 'Linear Algebra', 3, 3),
(19, 'ENGL', 317, 'Technical Writing', 3, 3),
(20, 'ENGL', 102, 'College Writing and Rhetoric', 1, 3),
(21, 'COMM', 101, 'Fundamentals of Public Speaking', 1, 3),
(22, 'STAT', 301, 'Probability & Statistics', 3, 3),
(10056, 'ENGL', 101, 'Writing and Rhetoric', 1, 3),
(10058, 'GEOL', 102, 'Historical geology', 0, 4),
(10059, 'CS', 415, 'Computational Biology', 0, 3),
(10060, 'CS', 477, 'Python for Machine Learning', 0, 3),
(10061, 'ENGL', 175, 'Literature and Ideas', 0, 3),
(10062, 'PHIL', 103, 'Intro to Ethics', 0, 3),
(10063, 'SPAN', 101, 'Elementary Spanish I', 0, 4),
(10064, 'SPAN', 102, 'Elementary Spanish II', 0, 4),
(10065, 'HIST', 111, 'Intro to US History I', 0, 3),
(10066, 'HIST', 102, 'Intro to US History II', 0, 3),
(10067, 'POLS', 101, 'Intro to Political Science/American Government', 0, 3),
(10068, 'BIOL', 102, 'Biology and Society', 0, 3),
(10069, 'CHEM', 111, 'General Chemistry I', 0, 4),
(10070, 'CHEM', 112, 'General Chemistry II', 0, 4),
(10071, 'ENVS', 101, 'Intro to Environmental Science', 0, 3),
(10072, 'PHYS', 211, 'Engineering Physics I', 0, 4),
(10073, 'PHYS', 111, 'General Physics I', 0, 4),
(10074, 'CS', 112, 'Computational Thinking and Problem Solving', 0, 3),
(10075, 'CS', 431, 'SFS Professional Development', 0, 3),
(10076, 'CS', 452, 'Real-time Operating Systems', 0, 3),
(10077, 'CS', 460, 'Database Management Systems Design', 0, 3),
(10078, 'CS', 212, 'Practical Python', 0, 3),
(10079, 'CS', 398, 'Computer Science Cooperative Internship', 0, 2),
(10081, 'CS', 298, 'Internship', 0, 1),
(10082, 'CS', 470, 'Artificial Intelligence', 0, 3),
(10083, 'CS', 466, 'PLC Programming for Automation', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10084;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
