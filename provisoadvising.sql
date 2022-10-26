-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 11:13 PM
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
  `Class` varchar(32) GENERATED ALWAYS AS (concat(`Subject`,`Course#`)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `Subject`, `Course#`, `Title`, `Year`) VALUES
(0, 'CS', 120, 'Computer Science 1', 1),
(1, 'CS', 121, 'Computer Science 2', 1),
(2, 'CS', 210, 'Programming Languages', 2),
(3, 'CS', 240, 'Computer Operating Systems', 2),
(4, 'CS', 150, 'Computer Organization and Architecture', 1),
(5, 'MATH', 176, 'Discrete Mathematics', 1),
(6, 'MATH', 170, 'Calculus 1', 1),
(7, 'MATH', 175, 'Calculus 2', 2),
(8, 'CS', 383, 'Software Engineering', 3),
(9, 'CS', 385, 'Theory of Computation', 3),
(10, 'CS', 404, 'Special Projects', 4),
(11, 'CS', 270, 'System Software', 2),
(12, 'CS', 395, 'Analysis of Algorithms', 3),
(13, 'CS', 360, 'Database Systems', 3),
(14, 'CS', 480, 'Senior Capstone Design 1', 4),
(15, 'CS', 481, 'Senior Capstone Design 2', 4),
(16, 'CS', 400, 'Contemporary Issues in Computer Science', 4),
(17, 'CS', 445, 'Compiler Design', 4),
(18, 'MATH', 330, 'Linear Algebra', 3),
(19, 'ENGL', 317, 'Technical Writing', 3),
(20, 'ENGL', 102, 'College Writing and Rhetoric', 1),
(21, 'COMM', 101, 'Fundamentals of Public Speaking', 1),
(22, 'STAT', 301, 'Probability & Statistics', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE `prerequisites` (
  `Class` varchar(32) NOT NULL,
  `Prereq` varchar(32) NOT NULL,
  `Requirement` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`Class`, `Prereq`, `Requirement`) VALUES
('CS121', 'CS120', ''),
('CS121', 'MATH176', ''),
('MATH175', 'MATH170', 'C or better'),
('CS270', 'CS121', ''),
('CS240', 'CS270', 'Corequisite'),
('CS240', 'CS121', ''),
('CS240', 'CS150', ''),
('CS210', 'CS121', ''),
('STAT301', 'MATH175', ''),
('CS383', 'CS210', ''),
('CS383', 'CS240', ''),
('CS383', 'CS270', ''),
('MATH330', 'MATH170', 'MATH175 recommended'),
('CS395', 'MATH175', ''),
('CS395', 'CS121', ''),
('CS360', 'CS240', ''),
('CS360', 'CS270', ''),
('ENGL317', 'ENGL102', 'Junior standing'),
('CS480', 'CS383', 'Senior standing'),
('CS480', 'ENGL317', 'Senior standing'),
('CS445', 'CS210', ''),
('CS445', 'CS385', ''),
('CS481', 'CS480', '');

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
(23, 'Technical Writing', ''),
(24, 'Makefile', ''),
(25, 'Git', ''),
(26, 'GitHub', ''),
(27, 'Command line editors', ''),
(28, 'Calculus', ''),
(29, 'Relational algebra', ''),
(30, 'Design diagrams', ''),
(31, 'Time management diagrams', ''),
(32, 'Public speaking', ''),
(33, 'Formal logic', ''),
(34, 'Integrated circuits', ''),
(35, 'Digital logic', ''),
(36, 'Statistics', ''),
(37, 'Probability', ''),
(38, 'Object oriented programming', ''),
(39, 'Scripting', ''),
(40, 'Networking', ''),
(41, 'Graphical IDEs', ''),
(42, 'JavaScript', ''),
(43, 'Research papers', ''),
(44, 'Ruby', ''),
(45, 'Binary', ''),
(46, 'Regular expressions', ''),
(47, 'Finite state machines', ''),
(48, 'Turing machines', ''),
(49, 'Operating systems', ''),
(50, 'Debugging', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `First` varchar(32) NOT NULL,
  `Last` varchar(32) NOT NULL,
  `Major` varchar(32) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Password`, `First`, `Last`, `Major`, `Year`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Jane', 'Doe', 'Computer Science', 1),
(1234, 'd41d8cd98f00b204e9800998ecf8427e', 'John', 'Doe', 'Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `ID` int(11) NOT NULL,
  `Class` varchar(8) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`ID`, `Class`, `Year`) VALUES
(1234, 'MATH170', 1),
(1234, 'MATH176', 1),
(1234, 'ENGL102', 1),
(1234, 'COMM101', 1),
(1234, 'CS120', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `Class` varchar(32) NOT NULL,
  `SkillID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`Class`, `SkillID`) VALUES
('CS120', 0),
('CS121', 0),
('CS121', 1),
('ENGL317', 2),
('ENGL102', 2),
('CS480', 2),
('CS481', 2),
('CS383', 10),
('CS383', 11),
('CS383', 25),
('CS383', 26),
('CS383', 30),
('CS383', 31),
('CS150', 45),
('CS150', 35),
('CS150', 34),
('CS210', 3),
('CS210', 5),
('CS210', 6),
('CS210', 7),
('CS210', 8),
('CS360', 12),
('CS360', 13),
('CS360', 14),
('CS360', 15),
('CS360', 16),
('CS360', 17),
('CS360', 18),
('ENGL317', 23),
('COMM101', 32),
('STAT301', 36),
('STAT301', 37),
('MATH170', 28),
('MATH175', 28),
('CS121', 45),
('CS240', 19),
('CS270', 19),
('CS121', 27),
('CS210', 27),
('CS240', 27),
('CS270', 27),
('MATH176', 33),
('MATH176', 37),
('CS270', 39),
('CS385', 46),
('CS385', 29),
('CS240', 49),
('CS150', 47),
('CS150', 48),
('CS480', 43),
('CS481', 43),
('ENGL317', 43),
('CS240', 21),
('CS270', 40),
('CS210', 38),
('CS120', 38),
('CS400', 22),
('CS240', 20),
('CS270', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10056;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
