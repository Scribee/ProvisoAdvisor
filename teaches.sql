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
('CS270', 20),
('', 0),
('CS398', 64),
('CS398', 59),
('CS298', 64),
('ENGL175', 23),
('ENGL175', 43),
('MATH330', 28),
('CS385', 33),
('CS385', 47),
('CS385', 48),
('CS383', 99),
('POLS101', 109),
('CS383', 89),
('CS383', 79),
('CS383', 58),
('CS383', 59),
('CS383', 56),
('CS383', 41),
('CS383', 82),
('CS112', 38),
('ENGL101', 23),
('ENGL101', 32),
('HIST111', 110),
('HIST102', 110),
('SPAN101', 101),
('SPAN102', 101),
('CS415', 100),
('CS452', 4),
('CS452', 45),
('CS452', 49),
('CS452', 60),
('CS452', 61),
('CS452', 63),
('CS452', 76),
('CS452', 82),
('CHEM111', 102),
('ENVS101', 108),
('CHEM112', 102),
('CS445', 77),
('CS445', 76),
('CS445', 74),
('CS445', 6),
('CS212', 7),
('CS212', 39),
('GEOG100', 105),
('GEOL102', 104),
('PHYS111', 103),
('PHYS112', 103),
('PHIL103', 22),
('CS460', 17),
('CS460', 80),
('CS460', 18),
('CS460', 91),
('CS460', 85),
('CS460', 82),
('CS460', 2),
('CS460', 54),
('CS460', 111),
('', 0),
('CS466', 35),
('CS466', 72),
('CS466', 66),
('CS466', 40),
('CS466', 45),
('CS470', 112),
('CS470', 80),
('CS470', 106),
('CS470', 81),
('CS395', 81),
('CS395', 82);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
