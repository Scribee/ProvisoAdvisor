-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 06:22 PM
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Responsibilities` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `Responsibilities`) VALUES
(0, 'Amazon', '• Collaborate with experienced cross-disciplinary Amazonians to conceive, design, and bring innovative products and services to market.\r\n• Design and build innovative technologies in a large distributed computing environment and help lead fundamental changes in the industry.\r\n• Create solutions to run predictions on distributed systems with exposure to innovative technologies at incredible scale and speed.\r\n• Build distributed storage, index, and query systems that are scalable, fault-tolerant, low cost, and easy to manage/use.\r\n• Design and code the right solutions starting with broadly defined problems.\r\n• Work in an agile environment to deliver high-quality software.'),
(1, 'Cisco', '• Designing and implementing (usually in C/C++) features to improve the reliability, simplicity, and performance of our devices, as well as make them more flexible and powerful\r\n• Bringing up our Linux-based system on new hardware platforms\r\n• Collaborating with our hardware engineers on the design of new platforms'),
(2, 'Siemens', '• Developing a proof-of-concept system for automation customers\r\n• Upgrading demo equipment for the marketing team, or creating a new demo as new products and features are released\r\n• Debugging, improving, or documenting both customer programs and internal demos\r\n• Assisting experienced Siemens Applications Engineers with their ongoing projects, which can include any of the above and more'),
(3, 'Citrix', '• Plans, designs, develops and tests software systems and/or applications for software enhancements and new products.\r\n• Apps--Uses Agile development methodology to develop user-level applications on a variety of platforms including desktop operating systems (Windows, Linux, Mac) and/or mobile operating systems (iOS, Android).\r\n• Works at any level of the application stack for different users of the product (IT vs corporate user).\r\n• Systems software--Uses virtualization technologies and techniques to develop operating systems, device drivers, utilities, and software; development tools (e.g., assemblers, compilers, etc.) for different operating system architectures (Windows, Linux, Mac OS), driver development, experience with inserting (\"\"hooking\"\") custom code into normal operating path in order to modify operation of platform.'),
(4, 'Epic Games', '• Debugging CPU, GPU, and/or peripherals of modern game consoles\r\n• Performance analysis and optimization on game consoles\r\n• Development of workflow tools for game console targets\r\n• Assist in various improvements to the EOS Client SDK.\r\n• This work could cover direct feature implementation or support (such as voice, lobbies, new features), or assist with the integration effort of the SDK into Fortnite. \r\n• Get exposure to first party platform SDK work while hooking up our crossplay features backed by Switch/XBL/PSN platform APIs. \r\n• Implement and address external team feedback and quality of life feature requests\r\n• Leverage Data from Infrastructure metrics and other resources to understand where best to implement automation\r\n• Work with the Global Infrastructure team to build requirements for automation / project for deliverable\r\n• Create documentation and presentation for what they want to implement\r\n• Working with Senior Developers/Mentor to submit code to central repository for peer reviews and feedback'),
(5, 'Climate', '• Front-end/Web Applications - JavaScript and CSS development for our web applications. We leverage several leading edge JS frameworks (including React, D3, and more). You will work primarily on the Web Interfaces for these applications, which are used by farmers to manage and insure their farms and crops. \r\n• Back-end/Platform Services - Large-scale distributed services for applications and data management. We use a mix of Java, Ruby on Rails, Python and Clojure code. You will work primarily on the back-end services that power our web and mobile applications. These cloud based services are built on AWS infrastructure and are designed for 7x24 operation, with manageability, availability, reliability and scalability in mind. \r\n• Mobile - Phone and Tablet application development for both the iOS and Android platforms. The applications complement our Web Applications by providing unique mobile device specific capabilities and core functionality to improve farming and insurance operations. \r\n• Science - Large-scale distributed data services for scientific computing (we use Clojure) \r\n• Data Analytics- we work with big-data, and invest considerably in our analytics capabilities. You will work with Hadoop/Map Reduce, RDBMS and data visualization tools '),
(6, 'Microsoft', '• Applies engineering principles to solve complex problems through sound and creative engineering. \r\n• Quickly learns new engineering methods and incorporates them into his or her work processes. \r\n• Seeks feedback and applies internal or industry best practices to improve his or her technical solutions. \r\n• Demonstrates skill in time management and completing software projects in a cooperative team environment. '),
(7, 'TuSimple', '• Research and prototype development using deep learning and machine learning algorithms for the most challenging problems in multi-sensor perception and fusion, including camera, LiDAR, RADAR, etc. \r\n• Deliver high-quality, robust, and reliable codes for the perception system on the L4 autonomous driving trucks. \r\n• Collaborate with other engineers on cross-functional efforts.'),
(8, 'Addepar', '• Manage individual project priorities, deadlines, and deliverables.\r\n• Collaborate effectively with product managers, engineers and team members on your project.\r\n• Document software functionality, system design, and project plans; this includes clean, readable code with comments.\r\n• Learn and demonstrate engineering standard processes and principles.\r\n• Produce a retrospective and demonstrate your summer project to an internal audience.'),
(9, 'Coda', '• Work with our product, design and growth teams to enhance Coda, while working with new product features, APIs, performance, quality, and scale—we will match you to a project based on your interests\r\n• Learn and deepen your experience with React, TypeScript, NodeJS, Kubernetes, and AWS\r\n• Work in a collaborative environment across multiple geo-located offices (locations in Seattle, San Francisco, and Mountain View). Like many of our engineers, you can also work remotely\r\n• Help ensure our customers have an excellent experience using Coda'),
(10, 'IXL Learning', 'As a Software Engineer, you will build the back-end wiring, application logic, and UI that engage our users. You will find and use the best technologies to add features and create new products. You’ll be involved in all aspects of the development process – including design, coding, testing, debugging, and tuning. You will own your projects from start to end as they travel through our fast-paced development cycle. In addition to working with your fellow engineers, you’ll collaborate with other teams to design amazing products that meet the needs of our users, who are students and teachers all over the world.'),
(11, 'iboss', '• Ability to design and develop clean and maintainable code\r\n• Quickly understand and extend engineering architectural patterns\r\n• Document engineering designs\r\n• Analyze and estimate development efforts\r\n• Deliver high quality code that has been thoroughly tested'),
(12, 'Oracle', '• Work individually or as part of a team of problem solvers, using a structured project delivery method to help solve complex business issues from strategy to execution in cloud-based environments. \r\n• Deliver high-quality projects, identify and make suggestions for improvements when problems or opportunities arise, advise on industry best practices, and manage gaps in customer requirements and NetSuite functionality.\r\n• Consult with clients to understand their business requirements, map them to NetSuite, and support them in configuring their NetSuite systems. You will help them transition to new ways of working by designing and developing creative scripted solutions, leveraging the powerful features of the NetSuite SuiteCloud platform.'),
(13, 'Carson last\'s custom selection', 'Custom skills.'),
(15, '19 19\'s custom selection', 'Custom skills.'),
(16, 'carson sloan\'s custom selection', 'Custom skills.'),
(20, 'IBM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
