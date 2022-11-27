-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 02:14 AM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `Description`) VALUES
(0, 'Amazon', '• Collaborate with experienced cross-disciplinary Amazonians to conceive, design, and bring innovative products and services to market.\r\n• Design and build innovative technologies in a large distributed computing environment and help lead fundamental changes in the industry.\r\n• Create solutions to run predictions on distributed systems with exposure to innovative technologies at incredible scale and speed.\r\n• Build distributed storage, index, and query systems that are scalable, fault-tolerant, low cost, and easy to manage/use.\r\n• Design and code the right solutions starting with broadly defined problems.\r\n• Work in an agile environment to deliver high-quality software.'),
(1, 'Cisco', '• Designing and implementing (usually in C/C++) features to improve the reliability, simplicity, and performance of our devices, as well as make them more flexible and powerful\r\n• Bringing up our Linux-based system on new hardware platforms\r\n• Collaborating with our hardware engineers on the design of new platforms'),
(2, 'Siemens', '• Developing a proof-of-concept system for automation customers\r\n• Upgrading demo equipment for the marketing team, or creating a new demo as new products and features are released\r\n• Debugging, improving, or documenting both customer programs and internal demos\r\n• Assisting experienced Siemens Applications Engineers with their ongoing projects, which can include any of the above and more'),
(3, 'Citrix', '• Plans, designs, develops and tests software systems and/or applications for software enhancements and new products.\r\n• Apps--Uses Agile development methodology to develop user-level applications on a variety of platforms including desktop operating systems (Windows, Linux, Mac) and/or mobile operating systems (iOS, Android).\r\n• Works at any level of the application stack for different users of the product (IT vs corporate user).\r\n• Systems software--Uses virtualization technologies and techniques to develop operating systems, device drivers, utilities, and software; development tools (e.g., assemblers, compilers, etc.) for different operating system architectures (Windows, Linux, Mac OS), driver development, experience with inserting (\"\"hooking\"\") custom code into normal operating path in order to modify operation of platform.'),
(4, 'Epic Games', '• Debugging CPU, GPU, and/or peripherals of modern game consoles\r\n• Performance analysis and optimization on game consoles\r\n• Development of workflow tools for game console targets\r\n• Assist in various improvements to the EOS Client SDK.\r\n• This work could cover direct feature implementation or support (such as voice, lobbies, new features), or assist with the integration effort of the SDK into Fortnite. \r\n• Get exposure to first party platform SDK work while hooking up our crossplay features backed by Switch/XBL/PSN platform APIs. \r\n• Implement and address external team feedback and quality of life feature requests\r\n• Leverage Data from Infrastructure metrics and other resources to understand where best to implement automation\r\n• Work with the Global Infrastructure team to build requirements for automation / project for deliverable\r\n• Create documentation and presentation for what they want to implement\r\n• Working with Senior Developers/Mentor to submit code to central repository for peer reviews and feedback'),
(5, 'Climate', '• Front-end/Web Applications - JavaScript and CSS development for our web applications. We leverage several leading edge JS frameworks (including React, D3, and more). You will work primarily on the Web Interfaces for these applications, which are used by farmers to manage and insure their farms and crops. \r\n• Back-end/Platform Services - Large-scale distributed services for applications and data management. We use a mix of Java, Ruby on Rails, Python and Clojure code. You will work primarily on the back-end services that power our web and mobile applications. These cloud based services are built on AWS infrastructure and are designed for 7x24 operation, with manageability, availability, reliability and scalability in mind. \r\n• Mobile - Phone and Tablet application development for both the iOS and Android platforms. The applications complement our Web Applications by providing unique mobile device specific capabilities and core functionality to improve farming and insurance operations. \r\n• Science - Large-scale distributed data services for scientific computing (we use Clojure) \r\n• Data Analytics- we work with big-data, and invest considerably in our analytics capabilities. You will work with Hadoop/Map Reduce, RDBMS and data visualization tools '),
(6, 'Microsoft', '• Applies engineering principles to solve complex problems through sound and creative engineering. \r\n• Quickly learns new engineering methods and incorporates them into his or her work processes. \r\n• Seeks feedback and applies internal or industry best practices to improve his or her technical solutions. \r\n• Demonstrates skill in time management and completing software projects in a cooperative team environment. '),
(7, 'TuSimple', '• Research and prototype development using deep learning and machine learning algorithms for the most challenging problems in multi-sensor perception and fusion, including camera, LiDAR, RADAR, etc. \r\n• Deliver high-quality, robust, and reliable codes for the perception system on the L4 autonomous driving trucks. \r\n• Collaborate with other engineers on cross-functional efforts.'),
(8, 'Addepar', '• Manage individual project priorities, deadlines, and deliverables.\r\n• Collaborate effectively with product managers, engineers and team members on your project.\r\n• Document software functionality, system design, and project plans; this includes clean, readable code with comments.\r\n• Learn and demonstrate engineering standard processes and principles.\r\n• Produce a retrospective and demonstrate your summer project to an internal audience.'),
(9, 'Coda', '• Work with our product, design and growth teams to enhance Coda, while working with new product features, APIs, performance, quality, and scale—we will match you to a project based on your interests\r\n• Learn and deepen your experience with React, TypeScript, NodeJS, Kubernetes, and AWS\r\n• Work in a collaborative environment across multiple geo-located offices (locations in Seattle, San Francisco, and Mountain View). Like many of our engineers, you can also work remotely\r\n• Help ensure our customers have an excellent experience using Coda');

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
-- Table structure for table `requires`
--

CREATE TABLE `requires` (
  `CompanyID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requires`
--

INSERT INTO `requires` (`CompanyID`, `SkillID`, `priority`) VALUES
(0, 51, 0),
(0, 52, 1),
(0, 53, 2),
(0, 54, 1),
(0, 55, 1),
(0, 56, 1),
(0, 58, 1),
(0, 59, 0),
(0, 0, -1),
(0, 1, -1),
(0, 3, -1),
(0, 7, -1),
(0, 10, -1),
(0, 15, -1),
(0, 42, -1),
(1, 52, 0),
(1, 1, -1),
(1, 0, -1),
(1, 49, -1),
(1, 60, 1),
(1, 40, 0),
(1, 61, 0),
(1, 62, 0),
(1, 63, 0),
(1, 20, 0),
(1, 64, 1),
(1, 58, 0),
(2, 52, 0),
(2, 65, 0),
(2, 66, -1),
(2, 10, -1),
(2, 1, -1),
(2, 0, -1),
(2, 3, -1),
(2, 7, -1),
(2, 67, -1),
(2, 68, -1),
(2, 42, -1),
(2, 15, -1),
(2, 40, 1),
(2, 69, 1),
(2, 70, 2),
(2, 71, 2),
(2, 72, 1),
(3, 73, 0),
(3, 57, 1),
(3, 51, 0),
(3, 34, 0),
(3, 1, -1),
(3, 0, -1),
(3, 3, -1),
(3, 74, 0),
(3, 75, 0),
(3, 76, 0),
(3, 78, 1),
(3, 49, 1),
(4, 73, 0),
(4, 0, 0),
(4, 79, 0),
(4, 80, 0),
(4, 81, 0),
(4, 82, 1),
(4, 26, 1),
(4, 10, 1),
(4, 40, 0),
(4, 54, 0),
(4, 64, 1),
(4, 83, 1),
(4, 7, 1),
(4, 39, 1),
(4, 84, 2),
(4, 19, 2),
(4, 85, 1),
(4, 38, 0),
(5, 73, 0),
(5, 38, 0),
(5, 40, 0),
(5, 51, 0),
(5, 86, 0),
(5, 50, 1),
(5, 59, 1),
(5, 20, 1),
(5, 27, 1),
(5, 62, 1),
(5, 42, 1),
(5, 12, 2),
(5, 87, 2),
(5, 88, 2),
(5, 3, 1),
(5, 7, 1),
(5, 44, 2),
(5, 67, 2),
(5, 68, 2),
(7, 52, 0),
(7, 64, 0),
(7, 7, -1),
(7, 0, -1),
(7, 42, 0),
(7, 87, 0),
(7, 84, 0),
(7, 89, 1),
(7, 90, 1),
(7, 55, 1),
(8, 73, 0),
(8, 38, 0),
(8, 51, 0),
(8, 23, 0),
(8, 58, 0),
(8, 33, 1),
(8, 40, 0),
(8, 83, 0),
(8, 7, 0),
(8, 3, 0),
(8, 55, 0),
(8, 42, 0),
(8, 17, 0),
(8, 91, 0),
(8, 62, 0),
(8, 39, 0),
(9, 58, 0),
(9, 73, 0),
(9, 0, -1),
(9, 1, -1),
(9, 3, -1),
(9, 7, -1),
(9, 10, -1),
(9, 42, -1),
(9, 44, -1),
(9, 92, 1),
(9, 87, 1),
(9, 84, 1),
(9, 55, 1),
(9, 93, 1),
(9, 56, 1);

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
(58, 'Coding on a team', ''),
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
(93, 'Kubernetes', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Password` varchar(64) NOT NULL,
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
(2, 'daeccf0ad3c1fc8c8015205c332f5b42', 'Molly', 'Meadows', 'Computer Science', 3),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Carson', 'Sus', 'CS', 1),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Bob', 'Joe', 'Computer Science', 2),
(5, 'p', 'Billy', 'Bob', 'Computer Science', 2),
(6, '6', '6', '6', 'Computer Science', 2),
(7, '$2y$10$a2nrNGYkDAKroNxm6WM23eGPSiPFTPXCm7aPZX0/wvmqkdul53zea', '7', '7', 'CS', 2),
(8, '$2y$10$i5nd7Jgb4jmXhZcI8wY4AOjqLymSeeQmlQgO2qZtXAinnQdhDFKWS', '8', '8', 'CS', 3),
(9, '$2y$10$kxknGERlFFXmc0Y0yIqgEecd8jiafhmpLl86MLM78y2i9qqvXw2Fu', '9', '9', '9', 9),
(10, '$2y$10$662bmVRhNUi.nRyR5oVNk.WNBkD7Rz8cqCpo8ZIFM8mMJ5EIvMs7O', '10', '10', '10', 10),
(11, '$2y$10$v2AVgCDo30piBQdZqaBJD.xu.gJe9RzdeuR0z073slcFrIZ5BIRtW', '11', '11', '11', 11),
(12, '$2y$10$/xe9tv5OJ9L5sgKaGqWcxudPDUsXM0tx19i99ioxRCG/YgL8COQ5u', '12', '12', '12', 12),
(13, '$2y$10$2YvuIFfujz1nnuYGpQ.B4.45LckFiFktHrj5dQKMgl6Zu51h.8Hde', '13', '13', '13', 13),
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
(1234, 'CS120', 1),
(2, 'CS120', 1),
(2, 'CS120', 1),
(4, 'CS120', 1),
(4, 'CS480', 4);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `created_at` timestamp NULL DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`created_at`, `email`, `email_verified_at`, `id`, `name`, `password`, `remember_token`, `updated_at`) VALUES
('2022-11-24 08:27:52', '13', NULL, 1, '13 13', '$2y$10$HAlv.ZdzTbtVfPU.SqQLO.F3HhwfWA27UcAnHsCi68bR5vSPmtmL6', NULL, '2022-11-24 08:27:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10056;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
