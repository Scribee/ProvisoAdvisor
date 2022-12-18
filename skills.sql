-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 07:30 PM
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
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `Name`, `Description`) VALUES
(0, 'C++', 'Good understanding of C++ design and programming principles.'),
(1, 'C', 'Good understanding of low level programming in C.'),
(2, 'Research', ''),
(3, 'Java', ''),
(4, 'Memory management', ''),
(5, 'Prolog', ''),
(6, 'YACC', ''),
(7, 'Python', ''),
(8, 'SML', ''),
(9, 'R', ''),
(10, 'C#', ''),
(11, 'Unity', ''),
(12, 'CSS', ''),
(13, 'HTML', ''),
(14, 'Bootstrap', ''),
(15, 'PHP', ''),
(16, 'Laravel', ''),
(17, 'SQL', ''),
(18, 'MySQL', ''),
(19, 'Bash', ''),
(20, 'Unix', ''),
(21, 'Batch', ''),
(22, 'Ethics', ''),
(23, 'Technical writing', ''),
(24, 'Makefile', ''),
(25, 'Git', ''),
(26, 'GitHub', ''),
(27, 'Command line editors', ''),
(28, 'Calculus', ''),
(29, 'Relational algebra', ''),
(30, 'Design patterns', ''),
(31, 'Time management diagrams', ''),
(32, 'Oral communication', ''),
(33, 'Formal logic', ''),
(34, 'Integrated circuits', ''),
(35, 'Digital logic', ''),
(36, 'Statistics', ''),
(37, 'Probability', ''),
(38, 'Object oriented programming', ''),
(39, 'Scripting', ''),
(40, 'Networking', ''),
(41, 'Unit testing', ''),
(42, 'JavaScript', ''),
(43, 'Research papers', ''),
(44, 'Ruby on Rails', ''),
(45, 'Binary', ''),
(46, 'Regular expressions', ''),
(47, 'Finite state machines', ''),
(48, 'Turing machines', ''),
(49, 'Operating systems', ''),
(50, 'Debugging', ''),
(51, 'Software development experience', ''),
(52, 'Completed BS CS', ''),
(53, 'Full stack development', ''),
(54, 'Distributed systems', ''),
(55, 'AWS platform', ''),
(56, 'Client communication', ''),
(57, 'Agile development', ''),
(58, 'Team programming', ''),
(59, '1 year of experience', ''),
(60, 'OS design', ''),
(61, 'Embedded platforms', ''),
(62, 'Linux', ''),
(63, 'Working in kernel space', ''),
(64, 'Internship experience', ''),
(65, 'Microsoft office suite', ''),
(66, 'Ladder logic', ''),
(67, 'iOS development', ''),
(68, 'Android development', ''),
(69, 'Windows app development', ''),
(70, 'Engineering statics/dynamics', ''),
(71, 'Power electronics', ''),
(72, 'Control systems', ''),
(73, 'Seeking BS CS', ''),
(74, 'Hardware architecture', ''),
(75, 'Reverse engineering', ''),
(76, 'Low level debugging', ''),
(77, 'Compiler design', ''),
(78, 'Device drivers', ''),
(79, 'Basic game design', ''),
(80, 'Data structures', ''),
(81, 'Algorithm design', ''),
(82, 'Performance optimization', ''),
(83, 'REST architectural style', ''),
(84, 'Node.js', ''),
(85, 'MongoDB', ''),
(86, 'Server design', ''),
(87, 'React', ''),
(88, 'Clojure', ''),
(89, '3D graphics', ''),
(90, 'Flask', ''),
(91, 'Database transaction logging', ''),
(92, 'TypeScript', ''),
(93, 'Kubernetes', ''),
(94, 'Apache', ''),
(95, 'Apache Tomcat', ''),
(96, 'Spring Framework', ''),
(97, 'AngularJS', ''),
(98, '.NET', ''),
(99, 'Leadership', ''),
(100, 'Biology', ''),
(101, 'Spanish', ''),
(102, 'Chemistry', ''),
(103, 'Physics', ''),
(104, 'Geology', ''),
(105, 'Geography', ''),
(106, 'Machine Learning', ''),
(107, 'TensorFlow', ''),
(108, 'Environmental Science', ''),
(109, 'Government', ''),
(110, 'U.S. History', ''),
(111, 'Security', ''),
(112, 'Lisp', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
