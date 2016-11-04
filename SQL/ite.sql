-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-03 15:53:44
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
-- 表的结构 `ite`
--

CREATE TABLE `ite` (
  `ite_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `ITE_Course` varchar(255) NOT NULL,
  `Certification` varchar(255) NOT NULL,
  `english` int(11) NOT NULL,
  `mathematics` int(11) NOT NULL,
  `onesubject` int(11) NOT NULL,
  `twosubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ite`
--

INSERT INTO `ite` (`ite_id`, `school_id`, `school_name`, `ITE_Course`, `Certification`, `english`, `mathematics`, `onesubject`, `twosubject`) VALUES
(1, 383, 'ITE', 'Higher Nitec in Accounting', 'Olevel', 8, 7, 1, 0),
(2, 383, 'ITE', 'Higher Nitec in Banking Services', 'Olevel', 8, 7, 1, 0),
(3, 383, 'ITE', 'Higher Nitec in Beauty & Spa Management', 'Olevel', 7, 7, 0, 1),
(4, 383, 'ITE', 'Higher Nitec in Biotechnology', 'Olevel', 7, 8, 0, 0),
(5, 383, 'ITE', 'Higher Nitec in Broadcast & Media Technology', 'Olevel', 7, 8, 0, 0),
(6, 383, 'ITE', 'Higher Nitec in Business Information Systems', 'Olevel', 7, 8, 0, 0),
(7, 383, 'ITE', 'Higher Nitec in Chemical Technology', 'Olevel', 7, 8, 1, 0),
(8, 383, 'ITE', 'Higher Nitec in Civil & Structural Engineering Design', 'Olevel', 7, 8, 1, 0),
(9, 383, 'ITE', 'Higher Nitec in Cyber & Network Security', 'Olevel', 7, 8, 1, 0),
(10, 383, 'ITE', 'Higher Nitec in Early Childhood Education', 'Olevel', 6, 0, 1, 0),
(11, 383, 'ITE', 'Higher Nitec in Electrical Engineering', 'Olevel', 7, 8, 1, 0),
(12, 383, 'ITE', 'Higher Nitec in Electronics Engineering', 'Olevel', 7, 8, 1, 0),
(13, 383, 'ITE', 'Higher Nitec in Engineering with Business', 'Olevel', 7, 8, 1, 0),
(14, 383, 'ITE', 'Higher Nitec in Event Management', 'Olevel', 7, 8, 1, 0),
(15, 383, 'ITE', 'Higher Nitec in Facility Management', 'Olevel', 7, 8, 1, 0),
(16, 383, 'ITE', 'Higher Nitec in Facility Systems Design', 'Olevel', 7, 8, 1, 0),
(17, 383, 'ITE', 'Higher Nitec in Filmmaking (Cinematography)', 'Olevel', 8, 7, 1, 0),
(18, 383, 'ITE', 'Higher Nitec in Games Art & Design', 'Olevel', 7, 8, 1, 0),
(19, 383, 'ITE', 'Higher Nitec in Games Programming & Development', 'Olevel', 7, 8, 1, 0),
(20, 383, 'ITE', 'Higher Nitec in Hospitality Operations', 'Olevel', 7, 7, 0, 1),
(21, 383, 'ITE', 'Higher Nitec in Human Resource & Administration', 'Olevel', 8, 7, 0, 0),
(22, 383, 'ITE', 'Higher Nitec in Information Technology', 'Olevel', 7, 8, 1, 0),
(23, 383, 'ITE', 'Higher Nitec in Interactive Design', 'Olevel', 7, 8, 1, 0),
(24, 383, 'ITE', 'Higher Nitec in Leisure & Travel Operations', 'Olevel', 7, 7, 0, 1),
(25, 383, 'ITE', 'Higher Nitec in Logistics for International Trade', 'Olevel', 8, 7, 1, 0),
(26, 383, 'ITE', 'Higher Nitec in Marine & Offshore Technology', 'Olevel', 7, 8, 1, 0),
(27, 383, 'ITE', 'Higher Nitec in Marine Engineering', 'Olevel', 7, 8, 1, 0),
(28, 383, 'ITE', 'Higher Nitec in Mechanical Engineering', 'Olevel', 7, 8, 1, 0),
(29, 383, 'ITE', 'Higher Nitec in Mechatronics Engineering', 'Olevel', 7, 8, 1, 0),
(30, 383, 'ITE', 'Higher Nitec in Mobile Unified Communications', 'Olevel', 7, 8, 1, 0),
(31, 383, 'ITE', 'Higher Nitec in Offshore & Marine Engineering Design', 'Olevel', 7, 8, 1, 0),
(32, 383, 'ITE', 'Higher Nitec in Paramedic & Emergency Care', 'Nlevel', 0, 0, 0, 0),
(33, 383, 'ITE', 'Higher Nitec in Passenger Services', 'Olevel', 7, 0, 0, 1),
(34, 383, 'ITE', 'Higher Nitec in Performance Production', 'Olevel', 0, 7, 1, 0),
(35, 383, 'ITE', 'Higher Nitec in Precision Engineering - New!', 'Nlevel', 0, 0, 0, 0),
(36, 383, 'ITE', 'Higher Nitec in Process Plant Design', 'Olevel', 7, 8, 1, 0),
(37, 383, 'ITE', 'Higher Nitec in Rapid Transit Engineering', 'Olevel', 7, 8, 1, 0),
(38, 383, 'ITE', 'Higher Nitec in Retail Merchandising', 'Olevel', 8, 7, 1, 0),
(39, 383, 'ITE', 'Higher Nitec in Security System Integration', 'Olevel', 7, 8, 1, 0),
(40, 383, 'ITE', 'Higher Nitec in Service Management', 'Olevel', 7, 8, 1, 0),
(41, 383, 'ITE', 'Higher Nitec in Shipping Operations & Services', 'Olevel', 8, 0, 1, 0),
(42, 383, 'ITE', 'Higher Nitec in Space Design Technology', 'Olevel', 7, 8, 1, 0),
(43, 383, 'ITE', 'Higher Nitec in Sport Management', 'Olevel', 8, 7, 1, 0),
(44, 383, 'ITE', 'Higher Nitec in Visual Merchandising', 'Olevel', 0, 7, 0, 1),
(45, 383, 'ITE', 'Higher Nitec in e-Business Programming', 'Olevel', 7, 8, 1, 0),
(46, 383, 'ITE', 'Nitec in Aerospace Avionics', 'Olevel', 0, 0, 0, 1),
(47, 383, 'ITE', 'Nitec in Aerospace Machining Technology', 'Olevel', 0, 0, 0, 1),
(48, 383, 'ITE', 'Nitec in Applied Food Science', 'Olevel', 0, 0, 0, 1),
(49, 383, 'ITE', 'Nitec in Asian Culinary Arts', 'Olevel/Nlevel', 0, 0, 0, 0),
(50, 383, 'ITE', 'Nitec in Automotive Technology (Heavy Vehicles)', 'Olevel/Nlevel', 0, 0, 0, 0),
(51, 383, 'ITE', 'Nitec in Automotive Technology (Light Vehicles)', 'Olevel/Nlevel', 0, 0, 0, 0),
(52, 383, 'ITE', 'Nitec in Beauty & Wellness', 'Olevel/Nlevel', 0, 0, 0, 0),
(53, 383, 'ITE', 'Nitec in Beauty & Wellness (3-year)', 'Nlevel', 0, 0, 0, 0),
(54, 383, 'ITE', 'Nitec in Business Services', 'Olevel', 1, 0, 0, 1),
(55, 383, 'ITE', 'Nitec in Chemical Process Technology', 'Olevel', 1, 0, 0, 1),
(56, 383, 'ITE', 'Nitec in Community Care & Social Services', 'Olevel', 1, 0, 0, 1),
(57, 383, 'ITE', 'Nitec in Digital Animation', 'Olevel/Nlevel', 0, 0, 0, 0),
(58, 383, 'ITE', 'Nitec in Digital Audio & Video Production', 'Olevel', 1, 0, 0, 1),
(59, 383, 'ITE', 'Nitec in Electrical Technology (Lighting & Sound)', 'Olevel', 1, 0, 0, 1),
(60, 383, 'ITE', 'Nitec in Electrical Technology (Power & Control)', 'Olevel', 1, 0, 0, 1),
(61, 383, 'ITE', 'Nitec in Electronics (Broadband Technology & Services)', 'Olevel', 1, 0, 0, 1),
(62, 383, 'ITE', 'Nitec in Electronics (Computer & Networking)', 'Olevel', 1, 0, 0, 1),
(63, 383, 'ITE', 'Nitec in Electronics (Display Technology)', 'Olevel', 1, 0, 0, 1),
(64, 383, 'ITE', 'Nitec in Electronics (Instrumentation)', 'Olevel', 1, 0, 0, 1),
(65, 383, 'ITE', 'Nitec in Electronics (Microelectronics)', 'Olevel', 1, 0, 0, 1),
(66, 383, 'ITE', 'Nitec in Electronics (Mobile Devices)', 'Olevel', 1, 0, 0, 1),
(67, 383, 'ITE', 'Nitec in Facility Technology (Air-Conditioning & Refrigeration)', 'Olevel/Nlevel', 0, 0, 0, 0),
(68, 383, 'ITE', 'Nitec in Facility Technology (Landscaping Services)', 'Olevel/Nlevel', 0, 0, 0, 0),
(69, 383, 'ITE', 'Nitec in Facility Technology (Mechanical & Electrical Services)', 'Olevel/Nlevel', 0, 0, 0, 0),
(70, 383, 'ITE', 'Nitec in Facility Technology (Mechanical & Electrical Services) (3-year)', 'Nlevel', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ite`
--
ALTER TABLE `ite`
  ADD PRIMARY KEY (`ite_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
