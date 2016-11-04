-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-03 19:06:50
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
(0, 0, 0, 0, 0, 0, 0, 357),
(1, 196, 240, 167, 198, 120, 159, 191),
(2, 218, 244, 178, 199, 131, 159, 192),
(3, 247, 266, 186, 199, 139, 159, 193),
(4, 227, 251, 172, 196, 108, 159, 194),
(5, 240, 261, 0, 0, 0, 0, 195),
(6, 239, 248, 193, 199, 123, 157, 196),
(7, 256, 274, 0, 0, 0, 0, 197),
(8, 188, 250, 152, 199, 100, 145, 198),
(9, 0, 0, 0, 0, 0, 0, 199),
(10, 188, 251, 153, 187, 112, 150, 200),
(11, 214, 242, 164, 197, 120, 149, 201),
(12, 189, 246, 162, 198, 117, 156, 202),
(13, 0, 0, 155, 187, 103, 151, 203),
(14, 206, 232, 164, 192, 114, 156, 204),
(15, 214, 249, 167, 199, 118, 158, 206),
(16, 188, 242, 155, 195, 127, 154, 207),
(17, 193, 227, 0, 0, 98, 151, 208),
(18, 188, 241, 152, 187, 109, 153, 209),
(19, 225, 244, 181, 198, 136, 159, 210),
(20, 188, 259, 152, 186, 112, 153, 211),
(21, 222, 241, 171, 198, 115, 159, 212),
(22, 188, 260, 152, 192, 133, 151, 213),
(23, 247, 272, 190, 199, 146, 158, 214),
(24, 203, 227, 156, 195, 107, 151, 215),
(25, 194, 248, 170, 197, 132, 158, 216),
(26, 253, 270, 0, 0, 0, 0, 217),
(27, 254, 264, 0, 0, 0, 0, 218),
(28, 188, 227, 152, 188, 94, 148, 219),
(29, 247, 255, 184, 199, 109, 143, 222),
(30, 222, 235, 169, 198, 117, 151, 221),
(31, 258, 272, 0, 0, 0, 0, 224),
(32, 235, 250, 178, 199, 108, 147, 225),
(33, 200, 215, 0, 0, 83, 149, 226),
(34, 199, 245, 165, 197, 107, 151, 227),
(35, 214, 238, 173, 194, 129, 159, 228),
(36, 239, 266, 0, 0, 0, 0, 229),
(37, 237, 258, 184, 199, 138, 159, 230),
(38, 233, 243, 177, 196, 123, 158, 231),
(39, 239, 253, 183, 199, 125, 158, 233),
(40, 209, 237, 173, 199, 126, 154, 234),
(41, 203, 228, 169, 199, 125, 158, 235),
(42, 243, 260, 0, 0, 0, 0, 236),
(43, 190, 249, 152, 185, 105, 140, 237),
(44, 210, 235, 164, 198, 98, 153, 238),
(45, 188, 251, 156, 183, 112, 148, 239),
(46, 231, 248, 188, 199, 143, 159, 240),
(47, 258, 276, 0, 0, 0, 0, 241),
(48, 188, 237, 167, 196, 95, 156, 242),
(49, 188, 228, 152, 185, 105, 151, 243),
(50, 224, 250, 183, 199, 134, 152, 244),
(51, 225, 256, 180, 198, 132, 157, 245),
(52, 243, 254, 0, 0, 112, 158, 246),
(53, 188, 227, 153, 185, 87, 144, 247),
(54, 188, 252, 152, 192, 113, 151, 249),
(55, 234, 250, 180, 199, 111, 153, 250),
(56, 225, 249, 174, 199, 136, 158, 251),
(57, 223, 237, 174, 196, 137, 150, 252),
(58, 203, 244, 167, 195, 131, 159, 253),
(59, 195, 241, 162, 194, 117, 151, 254),
(60, 195, 226, 160, 172, 0, 0, 255),
(61, 197, 232, 152, 196, 97, 151, 256),
(62, 221, 239, 174, 199, 101, 159, 257),
(63, 0, 0, 0, 0, 0, 0, 258),
(64, 208, 240, 168, 197, 119, 159, 259),
(65, 229, 242, 180, 199, 122, 148, 260),
(66, 188, 247, 157, 187, 106, 154, 261),
(67, 188, 233, 166, 198, 121, 157, 262),
(68, 222, 244, 177, 199, 120, 158, 263),
(69, 260, 275, 0, 0, 0, 0, 264),
(70, 190, 241, 160, 191, 121, 153, 265),
(71, 225, 244, 176, 199, 139, 158, 266),
(72, 192, 253, 167, 196, 125, 151, 267),
(73, 200, 230, 164, 197, 118, 154, 268),
(74, 192, 242, 161, 199, 109, 155, 269),
(75, 200, 232, 152, 189, 107, 150, 270),
(76, 232, 248, 175, 199, 123, 150, 271),
(77, 232, 251, 181, 199, 0, 0, 272),
(78, 188, 247, 152, 195, 98, 151, 273),
(79, 0, 0, 0, 0, 0, 0, 274),
(80, 196, 231, 158, 195, 117, 158, 275),
(81, 235, 253, 0, 0, 0, 0, 276),
(82, 188, 247, 152, 182, 122, 156, 277),
(83, 220, 239, 165, 199, 91, 152, 278),
(84, 261, 277, 0, 0, 0, 0, 279),
(85, 189, 245, 161, 193, 103, 150, 280),
(86, 243, 266, 0, 0, 0, 0, 281),
(87, 245, 261, 0, 0, 0, 0, 282),
(88, 264, 279, 0, 0, 0, 0, 283),
(89, 258, 271, 0, 0, 0, 0, 284),
(90, 189, 251, 158, 198, 123, 155, 285),
(91, 202, 231, 154, 194, 0, 0, 286),
(92, 238, 263, 193, 199, 146, 158, 287),
(93, 0, 0, 0, 0, 0, 0, 291),
(94, 207, 236, 176, 198, 127, 159, 292),
(95, 188, 248, 159, 189, 116, 151, 288),
(96, 189, 251, 152, 184, 99, 151, 289),
(97, 0, 0, 0, 0, 0, 0, 290),
(98, 0, 0, 0, 0, 0, 0, 293),
(99, 204, 245, 172, 199, 98, 156, 294),
(100, 188, 248, 152, 185, 119, 151, 295),
(101, 221, 238, 176, 199, 134, 153, 296),
(102, 216, 252, 174, 198, 124, 155, 297),
(103, 247, 250, 175, 199, 112, 158, 298),
(104, 216, 244, 180, 199, 138, 159, 300),
(105, 188, 253, 152, 182, 102, 145, 299),
(106, 214, 229, 153, 186, 0, 0, 301),
(107, 190, 252, 152, 186, 104, 147, 302),
(108, 0, 0, 0, 0, 0, 0, 303),
(109, 233, 257, 181, 199, 130, 158, 304),
(110, 194, 242, 162, 198, 127, 152, 305),
(111, 189, 252, 157, 191, 128, 155, 306),
(112, 216, 245, 170, 196, 137, 158, 307),
(113, 260, 278, 0, 0, 0, 0, 308),
(114, 261, 276, 0, 0, 0, 0, 309),
(115, 189, 229, 162, 186, 122, 151, 310),
(116, 253, 272, 0, 0, 0, 0, 311),
(117, 232, 253, 185, 199, 142, 158, 312),
(118, 0, 0, 0, 0, 0, 0, 313),
(119, 188, 226, 160, 180, 109, 151, 314),
(120, 191, 232, 170, 197, 132, 154, 315),
(121, 188, 258, 152, 186, 108, 154, 316),
(122, 191, 234, 158, 186, 104, 152, 317),
(123, 188, 233, 152, 187, 104, 145, 318),
(124, 0, 0, 0, 0, 0, 0, 320),
(125, 0, 0, 0, 0, 0, 0, 319),
(126, 253, 270, 0, 0, 0, 0, 321),
(127, 188, 223, 152, 186, 112, 150, 323),
(128, 245, 249, 189, 199, 142, 155, 324),
(129, 219, 249, 169, 198, 113, 157, 325),
(130, 224, 244, 177, 194, 123, 159, 326),
(131, 229, 244, 186, 198, 138, 154, 327),
(132, 253, 265, 0, 0, 0, 0, 328),
(133, 244, 252, 187, 199, 126, 158, 329),
(134, 232, 244, 185, 199, 130, 151, 330),
(135, 241, 257, 184, 199, 145, 159, 331),
(136, 196, 232, 170, 197, 126, 158, 332),
(137, 188, 254, 152, 187, 98, 150, 333),
(138, 233, 259, 0, 0, 0, 0, 334),
(139, 236, 258, 0, 0, 0, 0, 335),
(140, 192, 233, 158, 190, 94, 150, 336),
(141, 233, 251, 188, 199, 143, 158, 337),
(142, 253, 265, 0, 0, 0, 0, 338),
(143, 219, 240, 176, 199, 113, 158, 339),
(144, 254, 268, 0, 0, 0, 0, 340),
(145, 221, 247, 178, 199, 132, 159, 341),
(146, 200, 242, 167, 197, 104, 157, 342),
(147, 188, 259, 152, 192, 0, 0, 343),
(148, 204, 230, 171, 199, 139, 158, 344),
(149, 188, 219, 152, 185, 129, 159, 345),
(150, 215, 237, 172, 198, 126, 156, 346),
(151, 236, 252, 184, 199, 135, 158, 347),
(152, 188, 252, 152, 196, 0, 0, 348),
(153, 201, 235, 170, 199, 126, 159, 349),
(154, 237, 262, 187, 199, 145, 159, 350),
(155, 210, 233, 168, 196, 102, 156, 351),
(156, 189, 231, 161, 191, 104, 153, 352),
(157, 188, 244, 152, 182, 112, 151, 353),
(158, 188, 227, 153, 187, 106, 151, 354),
(159, 210, 240, 167, 199, 124, 159, 355),
(160, 234, 253, 182, 199, 130, 158, 356);

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
