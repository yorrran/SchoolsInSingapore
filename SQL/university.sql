-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-10-27 04:43:34
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eis`
--

-- --------------------------------------------------------

--
-- 表的结构 `university`
--

CREATE TABLE `university` (
  `uni_id` int(50) NOT NULL,
  `University_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `poly_10_percent` float NOT NULL,
  `poly_90_percent` float NOT NULL,
  `JC_10_percent` varchar(255) NOT NULL,
  `JC_90_percent` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `university`
--

INSERT INTO `university` (`uni_id`, `University_name`, `course_name`, `poly_10_percent`, `poly_90_percent`, `JC_10_percent`, `JC_90_percent`, `school_id`) VALUES
(1, 'NUS', 'Law*', 3.83, 3.99, 'AAA/A', 'AAA/A', 384),
(2, 'NUS', 'Medicine*', 3.92, 4, 'AAA/A', 'AAA/A', 384),
(3, 'NUS', 'Nursing*', 3.42, 3.92, 'CCC/B', 'AAA/A', 384),
(4, 'NUS', 'Dentistry*', 3.96, 3.96, 'AAA/A', 'AAA/A', 384),
(5, 'NUS', 'Architecture*', 3.72, 3.98, 'ABB/B', 'AAA/A', 384),
(6, 'NUS', 'Industrial Design*', 3.59, 3.91, 'BBB/B', 'AAA/A', 384),
(7, 'NUS', 'Project & Facilities Management', 3.74, 3.9, 'BBC/C', 'AAB/B', 384),
(8, 'NUS', 'Real Estate', 3.71, 3.92, 'BBC/C', 'AAB/B', 384),
(9, 'NUS', 'Engineering', 0, 0, 'BBC/B', 'AAA/A', 384),
(10, 'NUS', 'Biomedical Engineering', 3.82, 3.93, 'BBB/C', 'AAA/A', 384),
(11, 'NUS', 'Chemical Engineering', 3.87, 3.99, 'AAA/B', 'AAA/A', 384),
(12, 'NUS', 'Civil Engineering', 3.72, 3.98, 'BBC/B', 'AAA/A', 384),
(13, 'NUS', 'Electrical Engineering', 3.7, 3.98, 'BBB/C', 'AAA/A', 384),
(14, 'NUS', 'Environmental Engineering', 3.69, 3.93, 'BBC/B', 'AAA/A', 384),
(15, 'NUS', 'Engineering Science', 0, 3.96, 'BBB/C', 'AAA/A', 384),
(16, 'NUS', 'Industrial & Systems Engineering', 0, 0, 'ABB/C', 'AAA/A', 384),
(17, 'NUS', 'Materials Science & Engineering', 3.94, 4, 'BBC/B', 'AAA/A', 384),
(18, 'NUS', 'Mechanical Engineering', 3.83, 3.99, 'BBB/B', 'AAA/A', 384),
(19, 'NUS', 'Mechanical Engineering (Aeronautical)', 0, 0, 'AAA/A', 'AAA/A', 384),
(20, 'NUS', 'Computing', 0, 0, 'NA', 'NA', 384),
(21, 'NUS', 'Computing (Business Analytics)', 3.81, 3.93, 'AAA/A', 'AAA/A', 384),
(22, 'NUS', 'Computing (Computer Science)', 3.74, 4, 'AAA/A', 'AAA/A', 384),
(23, 'NUS', 'Computing (Information Security)', 0, 0, 'AAA/B', 'AAA/A', 384),
(24, 'NUS', 'Computing (Information Systems)', 3.67, 3.96, 'AAA/B', 'AAA/A', 384),
(25, 'NUS', 'Computer Engineering?', 3.77, 3.97, 'BBB/B', 'AAA/A', 384),
(26, 'NUS', 'Pharmacy', 3.92, 4, 'AAA/A', 'AAA/A', 384),
(27, 'NUS', 'Science', 0, 0, 'BBB/C', 'AAA/A', 384),
(28, 'NUS', 'Science (Chemistry)', 3.74, 3.96, 'NA', 'NA', 384),
(29, 'NUS', 'Science (Computational Biology)', 0, 0, 'NA', 'NA', 384),
(30, 'NUS', 'Applied Science (Food Science & Technology)', 3.75, 3.92, 'NA', 'NA', 384),
(31, 'NUS', 'Science (Life Sciences)', 3.74, 3.98, 'NA', 'NA', 384),
(32, 'NUS', 'Science (Physics)', 3.77, 3.86, 'NA', 'NA', 384),
(33, 'NUS', 'Business Admin', 3.85, 3.98, 'AAA/C', 'AAA/A', 384),
(34, 'NUS', 'Business Admin (Accountancy)', 3.87, 4, 'AAA/A', 'AAA/A', 384),
(35, 'NUS', 'Arts & Social Sciences', 3.74, 3.94, 'BBB/B', 'AAA/A', 384),
(36, 'NUS', 'Arts & Social Sciences (MT related)', 0, 0, 'BBC/C', 'AAA/B', 384),
(37, 'NUS', 'Environmental Studies', 3.83, 3.98, 'AAA/C', 'AAA/A', 384),
(38, 'NTU', 'Medicine*', 0, 0, 'AAA/A', 'AAA/A', 385),
(39, 'NTU', 'Renaissance Engineering*', 0, 0, 'AAA/A', 'AAA/A', 385),
(40, 'NTU', 'Aerospace Engineering', 3.88, 4, 'AAA/B', 'AAA/A', 385),
(41, 'NTU', 'Bioengineering', 3.42, 3.94, 'BBC/D', 'AAA/A', 385),
(42, 'NTU', 'Chemical & Biomolecular Engineering', 3.64, 3.97, 'AAB/C', 'AAA/A', 385),
(43, 'NTU', 'Civil Engineering', 3.55, 3.97, 'BCC/D', 'AAA/A', 385),
(44, 'NTU', 'Computer Engineering', 3.53, 3.97, 'BCC/D', 'AAA/A', 385),
(45, 'NTU', 'Computer Science', 3.54, 3.96, 'BCC/D', 'AAA/A', 385),
(46, 'NTU', 'Electrical & Electronic Engineering', 3.44, 3.95, 'CCD/C', 'AAA/B', 385),
(47, 'NTU', 'Engineering', 0, 0, 'BCC/D', 'AAB/C', 385),
(48, 'NTU', 'Environmental Engineering', 3.7, 3.97, 'BBC/D', 'AAA/A', 385),
(49, 'NTU', 'Information Engineering & Media', 3.53, 3.94, 'BCC/D', 'AAA/C', 385),
(50, 'NTU', 'Maritime Studies', 3.69, 3.96, 'ABC/D', 'AAA/B', 385),
(51, 'NTU', 'Materials Engineering', 3.46, 3.91, 'BCC/D', 'AAA/A', 385),
(52, 'NTU', 'Mechanical Engineering', 3.46, 3.91, 'CCC/D', 'AAA/A', 385),
(53, 'NTU', 'Biological Sciences*', 3.54, 3.97, 'ABC/D', 'AAA/A', 385),
(54, 'NTU', 'Chemistry & Biological Chemistry', 3.46, 3.93, 'BCC/D', 'AAA/A', 385),
(55, 'NTU', 'Environmental Earth Systems Science*', 0, 0, 'AAA/B', 'AAA/A', 385),
(56, 'NTU', 'Mathematical Sciences', 3.56, 3.93, 'BBC/D', 'AAA/A', 385),
(57, 'NTU', 'Mathematics & Economics', 0, 0, 'ABC/D', 'AAA/A', 385),
(58, 'NTU', 'Physics / Applied Physics', 3.47, 3.86, 'CCD/D', 'AAA/A', 385),
(59, 'NTU', 'Accountancy*', 3.78, 3.97, 'AAA/C', 'AAA/A', 385),
(60, 'NTU', 'Business*', 3.8, 3.97, 'AAC/B', 'AAA/A', 385),
(61, 'NTU', 'Art, Design & Media*^', 3.23, 3.79, 'CCD/C', 'AAA/B', 385),
(62, 'NTU', 'Chinese', 3.37, 3.84, 'BCC/D', 'AAB/C', 385),
(63, 'NTU', 'Communication Studies*', 3.74, 3.96, 'ABC/B', 'AAA/A', 385),
(64, 'NTU', 'Economics', 3.63, 3.83, 'ABC/C', 'AAA/A', 385),
(65, 'NTU', 'English*', 3.32, 3.71, 'BCC/C', 'AAA/A', 385),
(66, 'NTU', 'History*', 3.38, 3.74, 'BCC/B', 'AAB/B', 385),
(67, 'NTU', 'Linguistics & Multilingual Studies*', 3.44, 3.79, 'BBC/B', 'AAA/A', 385),
(68, 'NTU', 'Philosophy*', 3.48, 3.72, 'BCC/B', 'AAB/B', 385),
(69, 'NTU', 'Psychology', 3.71, 3.94, 'ABC/B', 'AAA/A', 385),
(70, 'NTU', 'Public Policy & Global Affairs', 3.62, 3.95, 'ABC/C', 'AAA/A', 385),
(71, 'NTU', 'Sociology*', 3.58, 3.8, 'BCC/B', 'AAA/C', 385),
(72, 'NTU', 'Sport Science & Management', 3.64, 3.91, 'ABC/C', 'AAA/A', 385),
(73, 'NTU', 'Arts (Education)*', 0, 0, 'ABC/D', 'AAA/A', 385),
(74, 'NTU', 'Science (Education)*', 0, 0, 'AAC/C', 'AAA/A', 385),
(75, 'SMU', 'Accountancy', 3.71, 3.93, 'AAB/C', 'AAA/A', 386),
(76, 'SMU', 'Business Management', 3.7, 3.93, 'BBB/B', 'AAA/A', 386),
(77, 'SMU', 'Laws', 0, 0, 'AAA/A', 'AAA/A', 386),
(78, 'SMU', 'Science (Economics)', 3.71, 3.94, 'BBC/C', 'AAA/A', 386),
(79, 'SMU', 'Science (Information System Management)', 3.5, 3.93, 'BCC/C', 'AAA/A', 386),
(80, 'SMU', 'Social Sciences', 3.71, 3.89, 'BBC/C', 'AAA/A', 386);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uni_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
