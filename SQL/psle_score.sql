-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-10-27 04:42:51
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
-- 表的结构 `psle_score`
--

CREATE TABLE `psle_score` (
  `psle_id` int(11) NOT NULL,
  `psle_E_min` int(11) NOT NULL,
  `psle_E_max` int(11) NOT NULL,
  `psle_N_min` int(11) NOT NULL,
  `psle_N_max` int(11) NOT NULL,
  `psle_N/T_min` int(11) NOT NULL,
  `psle_N/T_max` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `psle_score`
--

INSERT INTO `psle_score` (`psle_id`, `psle_E_min`, `psle_E_max`, `psle_N_min`, `psle_N_max`, `psle_N/T_min`, `psle_N/T_max`, `school_id`) VALUES
(1, 200, 240, 180, 190, 150, 170, 5),
(2, 230, 276, 200, 220, 170, 190, 6),
(3, 196, 240, 167, 198, 120, 159, 17),
(4, 218, 244, 178, 199, 131, 159, 18),
(5, 247, 266, 186, 199, 139, 159, 19),
(6, 227, 251, 172, 196, 108, 159, 20),
(7, 240, 261, 0, 0, 0, 0, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `psle_score`
--
ALTER TABLE `psle_score`
  ADD PRIMARY KEY (`psle_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
