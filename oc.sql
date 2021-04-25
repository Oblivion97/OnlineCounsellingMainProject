-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 06:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'Oblivion', '97');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'ldfckgm', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:35:54', 'no', 59),
(2, 'aed;fklgm', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:35:57', 'no', 59),
(3, 'laskjdn', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:36:03', 'no', 59),
(4, '.ksndfj g', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:36:11', 'no', 58),
(5, 'l;sjdngv', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:36:14', 'no', 58),
(6, 'kashdfbv', 'fatiha_islam', 'fatiha_islam', '2019-01-06 22:36:17', 'no', 58),
(7, 'c;l ', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:36', 'no', 61),
(8, 'skldjfb', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:39', 'no', 61),
(9, 'lsak;gn', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:44', 'no', 62),
(10, 'lw;skngr', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:47', 'no', 62),
(11, 'iklasjbg', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:52', 'no', 63),
(12, 'aklsjbg', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 03:03:55', 'no', 63),
(13, 'k;sdlfjgn', 'mahmudul_hasan', 'mdtoufiquehasan_hemel', '2019-01-07 09:50:23', 'no', 56),
(14, 'l;\'fkdemb', 'mahmudul_hasan', 'mahmudul_hasan', '2019-01-07 09:50:27', 'no', 60),
(15, ';flgkh', 'tom_cruise', 'tom_cruise', '2019-01-11 21:33:29', 'no', 68),
(16, 'folp;i', 'tom_cruise', 'tom_cruise', '2019-01-11 21:33:33', 'no', 67),
(17, 'dfcjdfcjfcvk', 'fatiha_islam', 'fatiha_islam', '2019-01-11 22:56:17', 'no', 69);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(250) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `credit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `credit`) VALUES
(10, 'PHY 106', 'Physics Lab', '1.00'),
(11, 'SOC 101', 'Society, Technology and Engineering Ethics', '3.00'),
(12, 'ACT 111', 'Financial and Managerial Accounting', '3.00'),
(13, 'ECO 213', 'Economics', '3.00'),
(14, 'IPE 401', 'Industrial Management', '3.00'),
(15, 'PSY 101', 'Psychology', '3.00'),
(16, 'MGT 101', 'Principles of Management', '3.00'),
(17, 'SOC 103', 'Sociology', '3.00'),
(18, 'ENG 005', 'Spoken English', '3.00'),
(19, 'ENG 101', 'English I', '3.00'),
(20, 'ENG 103', 'English II', '3.00'),
(21, 'MATH 003', 'Elementary Calculus', '3.00'),
(22, 'MATH 151', 'Differential and Integral Calculus', '3.00'),
(23, 'MATH 183', 'Linear Algebra, Ordinary & Partial Differential Equations', '3.00'),
(24, 'MATH 187', 'Fourier and Laplace Transformations and Complex Variables', '3.00'),
(25, 'MATH 201', 'Coordinate geometry and Vector Analysis', '3.00'),
(26, 'STAT 205', 'Probability and Statistics', '3.00'),
(27, 'CSI 121', 'Structured Programming Language', '3.00'),
(28, 'CSI 122', 'Structured Programming Language Lab', '1.00'),
(29, 'CSI 124', 'Advanced Programming Laboratory', '1.00'),
(30, 'CSI 211', 'Object-Oriented Programming', '3.00'),
(31, 'CSI 212', 'Object-Oriented Programming Laboratory', '1.00'),
(32, 'CSI 217', 'Data Structure', '3.00'),
(33, 'CSI 218', 'Data Structure Laboratory', '1.00'),
(34, 'CSI 219', 'Discrete Mathematics', '3.00'),
(35, 'CSI 221', 'Database Management Systems', '3.00'),
(36, 'CSI 222', 'Database Management Systems Laboratory', '1.00'),
(37, 'CSI 227', 'Algorithms', '3.00'),
(38, 'CSI 228', 'Algorithms Laboratory', '1.00'),
(39, 'CSI 229', 'Numerical Methods', '3.00'),
(40, 'CSI 233', 'Theory of Computing', '3.00'),
(41, 'CSI 309', 'Operating System Concepts', '3.00'),
(42, 'CSI 310', 'Operating System Concepts Laboratory', '1.00'),
(43, 'CSI 311', 'System Analysis and Design', '3.00'),
(44, 'CSI 312', 'System Analysis and Design Laboratory', '1.00'),
(45, 'CSI 321', 'Software Engineering', '3.00'),
(46, 'CSI 322', 'Software Engineering Laboratory', '1.00'),
(47, 'CSI 341 ', 'Artificial Intelligence', '3.00'),
(48, 'CSI 342 ', 'Artificial Intelligence Laboratory', '1.00'),
(49, 'CSI 411  ', 'Compiler', '3.00'),
(50, 'CSI 412  ', 'Compiler Laboratory', '1.00'),
(51, 'CSE 113 ', 'Electrical Circuits', '3.00'),
(52, 'CSE 123   ', 'Electronics', '3.00'),
(53, 'CSE 124   ', 'Electronics Laboratory', '1.00'),
(54, 'CSE 225   ', 'Digital Logic Design', '3.00'),
(55, 'CSE 226   ', 'Digital Logic Design Laboratory', '1.00'),
(56, 'CSE 236  ', 'Assembly Programming Laboratory', '1.00'),
(57, 'CSE 313  ', ' Computer Architecture', '3.00'),
(58, 'CSE 315   ', 'Data Communication', '3.00'),
(59, 'CSE 323   ', 'Computer Networks', '3.00'),
(60, 'CSE 324   ', 'Computer Networks Laboratory', '1.00'),
(61, 'CSE 429   ', 'Digital System Design', '3.00'),
(62, 'CSE 430   ', 'Digital System Design Laboratory', '1.00'),
(63, 'CSE 425   ', 'Microprocessor, Microcontroller and Interfacing', '3.00'),
(64, 'CSE 426   ', 'Microprocessor, Microcontroller and Interfacing Laboratory', '1.00'),
(65, 'CSI 415   ', 'Pattern Recognition ', '3.00'),
(66, 'CSI 416   ', 'Pattern Recognition Laboratory ', '1.00'),
(67, 'CSI 421     ', 'Computer Graphics', '3.00'),
(68, 'CSI 422    ', 'Computer Graphics Laboratory', '1.00'),
(69, 'CSI 423    ', 'Simulation & Modeling', '3.00'),
(70, 'CSI 424 ', '   Simulation & Modeling Laboratory', '1.00'),
(71, 'CSI 447    ', 'Multimedia Systems Design', '3.00'),
(72, 'CSI 448   ', ' Multimedia Systems Design Laboratory', '1.00'),
(73, 'CSE 427   ', 'VLSI Design', '3.00'),
(74, 'CSE 428  ', ' VLSI Design Laboratory', '1.00'),
(75, 'CSE 471   ', 'Advanced Object Oriented Programming', '3.00'),
(76, 'CSE 472   ', 'Advanced Object Oriented Programming Laboratory', '1.00'),
(77, 'CSE 453   ', 'Optical Fiber Communication', '3.00'),
(78, 'CSE 457  ', ' Mobile Cellular Communication', '3.00'),
(79, 'CSE 461   ', 'Wireless Communication', '3.00'),
(80, 'CSE 463   ', 'E-Commerce', '3.00'),
(81, 'CSE 465   ', 'Web Programming', '3.00'),
(82, 'CSE 467   ', 'Advanced DBMS', '3.00'),
(83, 'CSE 469   ', 'Project Management', '3.00'),
(84, 'CSE 473   ', 'Advanced Network Services and Management', '3.00'),
(85, 'CSE 475   ', 'Mobile Computing', '3.00'),
(86, 'CSE 477   ', 'Network Security', '3.00'),
(87, 'CSE 479   ', 'Embedded Systems', '3.00'),
(88, 'CSE 481   ', 'Mobile Application Development', '3.00'),
(89, 'CSE 483   ', 'Digital Image Processing', '3.00'),
(90, 'CSE 485   ', 'Game Design & Development', '3.00'),
(91, 'CSE 487   ', 'Cloud Computing', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_profile`
--

CREATE TABLE `course_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_profile`
--

INSERT INTO `course_profile` (`id`, `username`, `course_code`, `course_name`) VALUES
(174, 'username_1', 'CSI 222', 'Database Management Systems Laboratory'),
(175, 'username_1', 'CSE 315   ', 'Data Communication'),
(176, 'username_1', 'CSI 309', 'Operating System Concepts'),
(177, 'username_1', 'CSI 310', 'Operating System Concepts Laboratory'),
(178, 'username_1', 'CSE 236  ', 'Assembly Programming Laboratory'),
(179, 'fatiha_islam', 'PHY105', 'Physics'),
(180, 'fatiha_islam', 'SOC 101', 'Society, Technology and Engineering Ethics'),
(181, 'fatiha_islam', 'ECO 213', 'Economics'),
(183, 'mdtoufiquehasan_hemel', 'PHY 106', 'Physics Lab'),
(184, 'mdtoufiquehasan_hemel', 'SOC 101', 'Society, Technology and Engineering Ethics'),
(185, 'mdtoufiquehasan_hemel', 'CSI 222', 'Database Management Systems Laboratory'),
(186, 'fatiha_islam', 'CSI 222', 'Database Management Systems Laboratory'),
(187, 'mdtoufiquehasan_hemel', 'PHY 105', 'Physics'),
(188, 'mahmudul_hasam', 'PHY 105', 'Physics'),
(189, 'mahmudul_hasam', 'PHY 106', 'Physics Lab'),
(190, 'mahmudul_hasam', 'SOC 101', 'Society, Technology and Engineering Ethics'),
(191, 'mahmudul_hasam', 'CSI 222', 'Database Management Systems Laboratory'),
(192, 'mdtoufiquehasan_hemel', 'ECO 213', 'Economics'),
(193, 'mahmudul_hasan', 'PHY 106', 'Physics Lab'),
(194, 'mahmudul_hasan', 'SOC 101', 'Society, Technology and Engineering Ethics'),
(195, 'mahmudul_hasan', 'ACT 111', 'Financial and Managerial Accounting'),
(196, 'mahmudul_hasan', 'ECO 213', 'Economics'),
(197, 'tom_cruise', 'PHY 106', 'Physics Lab'),
(198, 'tom_cruise', 'SOC 101', 'Society, Technology and Engineering Ethics'),
(199, 'tom_cruise', 'ACT 111', 'Financial and Managerial Accounting'),
(200, 'tom_cruise', 'ECO 213', 'Economics');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `user_from` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `user_to`, `user_from`) VALUES
(8, 'mahmudul_hasan', 'tom_cruise'),
(9, 'mdtoufiquehasan_hemel', 'mahmudul_hasam'),
(10, 'tom_cruise', 'mahmudul_hasam'),
(12, 'mahmudul_hasan', 'mahmudul_hasam');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(1, 'mdtoufiquehasan_hemel', 56),
(2, 'fatiha_islam', 55),
(3, 'fatiha_islam', 53),
(4, 'fatiha_islam', 56),
(5, 'fatiha_islam', 54),
(7, 'fatiha_islam', 58),
(8, 'mahmudul_hasan', 63),
(9, 'mahmudul_hasan', 62),
(10, 'mahmudul_hasan', 61),
(11, 'mahmudul_hasan', 60),
(12, 'mahmudul_hasan', 53),
(13, 'tom_cruise', 68),
(14, 'tom_cruise', 67),
(15, 'tom_cruise', 66),
(16, 'fatiha_islam', 69);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `user_from` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'hello fatiha', '2019-01-11 18:44:14', 'yes', 'no', 'no'),
(2, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'xhjkldfn', '2019-01-11 18:46:40', 'yes', 'no', 'no'),
(3, 'fatiha_islam', 'fatiha_islam', 'hello fatiha', '2019-01-11 18:52:32', 'yes', 'no', 'no'),
(4, 'fatiha_islam', 'fatiha_islam', 'hello fatiha', '2019-01-11 18:54:32', 'yes', 'no', 'no'),
(5, 'fatiha_islam', 'fatiha_islam', 'lf;khm', '2019-01-11 18:54:40', 'yes', 'no', 'no'),
(6, 'fatiha_islam', 'fatiha_islam', 'xhjkldfn', '2019-01-11 18:55:42', 'yes', 'no', 'no'),
(7, 'fatiha_islam', 'fatiha_islam', 'o;ngch', '2019-01-11 18:55:48', 'yes', 'no', 'no'),
(8, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'l;fkgm\r\n', '2019-01-11 18:56:15', 'yes', 'no', 'no'),
(9, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'pgimhbd', '2019-01-11 18:56:19', 'yes', 'no', 'no'),
(10, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'o;ngch', '2019-01-11 18:56:25', 'yes', 'no', 'no'),
(11, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'pgv[ohjk,', '2019-01-11 18:56:33', 'yes', 'no', 'no'),
(12, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'p\'fgyo\'', '2019-01-11 18:56:40', 'yes', 'no', 'no'),
(13, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'p[]fogk,', '2019-01-11 18:56:45', 'yes', 'no', 'no'),
(14, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'p[]fogk,', '2019-01-11 18:56:48', 'yes', 'no', 'no'),
(15, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'fp[gogjkfyjop[', '2019-01-11 18:57:20', 'yes', 'no', 'no'),
(16, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'dfp[ghkdf[0ph', '2019-01-11 18:57:24', 'yes', 'no', 'no'),
(17, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'xopdfiughdf9pgh', '2019-01-11 18:57:28', 'yes', 'no', 'no'),
(18, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'pgv[ohjk,', '2019-01-11 18:57:34', 'yes', 'no', 'no'),
(19, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'xopdfiughdf9pgh', '2019-01-11 19:04:45', 'yes', 'no', 'no'),
(20, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'pgv[ohjk,', '2019-01-11 19:08:05', 'yes', 'no', 'no'),
(21, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'tpgyjkg', '2019-01-11 19:08:11', 'yes', 'no', 'no'),
(22, 'fatiha_islam', 'fatiha_islam', 'lf;kghj', '2019-01-11 19:14:44', 'yes', 'no', 'no'),
(23, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'dfol;bndfgb', '2019-01-11 19:15:38', 'yes', 'no', 'no'),
(24, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'dfol;bndfgb', '2019-01-11 19:17:03', 'yes', 'no', 'no'),
(25, 'fatiha_islam', 'mdtoufiquehasan_hemel', 'dfol;bndfgb', '2019-01-11 19:22:09', 'yes', 'no', 'no'),
(26, 'mahmudul_hasan', 'mdtoufiquehasan_hemel', 'doifughdog', '2019-01-11 20:18:26', 'no', 'no', 'no'),
(27, 'mahmudul_hasan', 'mdtoufiquehasan_hemel', 'idxfhbdjiksgv', '2019-01-11 20:18:30', 'no', 'no', 'no'),
(28, 'mdtoufiquehasan_hemel', 'fatiha_islam', 'fyjfgyjfgyj', '2019-01-11 22:55:33', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `user_from` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `opened` varchar(3) NOT NULL,
  `viewed` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `options` varchar(100) NOT NULL,
  `added_by` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `options`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`) VALUES
(7, 'dfol;khgn', 'Physics', 'fatiha_islam', 'non', '2018-12-15 23:54:36', 'no', 'yes', 0),
(8, 'dfol;khgn', 'Physics', 'fatiha_islam', 'non', '2018-12-15 23:55:24', 'no', 'yes', 0),
(9, 'seiow``dofgndlgm eorkgmdl;\'rgm edl;krmg', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2018-12-15 23:56:11', 'no', 'yes', 0),
(10, 'dgl;hmd', 'Economics', 'fatiha_islam', 'non', '2018-12-15 23:57:20', 'no', 'yes', 0),
(11, 'f;hlj fgm\'fl, ;flghm,fop;\'hk m,f;, p[hp[o fmpohm p mptmhdfpo thmp', 'Physics', 'fatiha_islam', 'non', '2018-12-15 23:58:25', 'no', 'yes', 0),
(12, 'shcjcb,vbvjbv vmbddmbdb ekbvekbe kjvbkebvbv', 'Physics', 'mdtoufiquehasan_hemel', 'non', '2018-12-16 01:20:32', 'no', 'yes', 0),
(13, 'ayufgkjshbdcksjd4\r\n', 'Database Management Systems Laboratory', 'fatiha_islam', 'non', '2018-12-20 11:33:31', 'no', 'yes', 0),
(14, 'sahcgvacuaycfgauyd\r\n', 'Database Management Systems Laboratory', 'mdtoufiquehasan_hemel', 'non', '2018-12-20 11:33:56', 'no', 'yes', 0),
(15, 'lkhbkzvb ', 'Database Management Systems Laboratory', 'mdtoufiquehasan_hemel', 'non', '2018-12-20 13:01:02', 'no', 'yes', 0),
(16, 'sidvbskvjsb', 'Physics Lab', 'mdtoufiquehasan_hemel', 'non', '2018-12-20 13:01:12', 'no', 'yes', 0),
(32, 'sdvbs,bs,mv\r\nsbx,vbs,jvbd\r\nxcvbx,vbsd.vn\r\nsjvb,xjvbd,vb', 'Physics', 'fatiha_islam', 'non', '2018-12-21 16:12:43', 'no', 'yes', 0),
(33, 'akcb,vbc\r\nsdhgvcshbc', 'Physics', 'fatiha_islam', 'non', '2018-12-21 16:13:01', 'no', 'yes', 0),
(34, 'szcvkcvakb', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2018-12-21 16:14:53', 'no', 'yes', 0),
(35, 'szcvkcvakb', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2018-12-21 16:16:01', 'no', 'yes', 0),
(36, 'dkjbskjbsrg', 'Physics', 'fatiha_islam', 'non', '2018-12-21 18:08:44', 'no', 'yes', 0),
(37, 'sdcvskhcbsljb', 'Physics', 'fatiha_islam', 'non', '2018-12-21 18:08:48', 'no', 'yes', 0),
(38, 'shdkbskdbslb', 'Physics', 'fatiha_islam', 'non', '2018-12-21 18:08:52', 'no', 'no', 0),
(39, 'sjkdbslnslv', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2018-12-21 18:08:59', 'no', 'yes', 0),
(40, 'jcb djnvd;vn', 'Economics', 'fatiha_islam', 'non', '2018-12-21 18:09:06', 'no', 'yes', 0),
(41, ',jcjsnvflsjvn;lvn', 'Physics', 'fatiha_islam', 'non', '2018-12-21 18:09:11', 'no', 'yes', 0),
(42, 'xncb jxbvfdlv', 'Physics', 'fatiha_islam', 'non', '2018-12-21 18:09:14', 'no', 'yes', 0),
(43, 'zjcndlnvdln', 'Database Management Systems Laboratory', 'fatiha_islam', 'non', '2018-12-21 18:09:21', 'no', 'yes', 0),
(44, 'this is a physics lab post\r\n', 'Physics Lab', 'mdtoufiquehasan_hemel', 'non', '2018-12-26 08:45:09', 'no', 'no', 0),
(45, 'this is a soc problem post\r\n', 'Society, Technology and Engineering Ethics', 'mdtoufiquehasan_hemel', 'non', '2018-12-26 08:45:26', 'no', 'no', 0),
(46, 'this is a dbms lab problem post', 'Database Management Systems Laboratory', 'mdtoufiquehasan_hemel', 'non', '2018-12-26 08:45:50', 'no', 'no', 0),
(47, 'this is a physics problem post', 'Physics', 'mdtoufiquehasan_hemel', 'non', '2018-12-26 08:46:08', 'no', 'yes', 0),
(48, 'this is a physics problem post -f', 'Physics', 'fatiha_islam', 'non', '2018-12-26 08:46:47', 'no', 'no', 0),
(49, 'this is a soc problem post -f', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2018-12-26 08:47:04', 'no', 'no', 0),
(50, 'this is a dbms lab problem post', 'Database Management Systems Laboratory', 'fatiha_islam', 'non', '2018-12-26 08:47:19', 'no', 'no', 0),
(51, 'physics', 'Physics', 'mahmudul_hasam', 'non', '2018-12-26 08:51:31', 'no', 'no', 0),
(52, 's,kvdhbjxhvb', 'Physics Lab', 'mahmudul_hasam', 'non', '2018-12-26 08:51:41', 'no', 'no', 0),
(53, 'siudhsvbsk', 'Society, Technology and Engineering Ethics', 'mahmudul_hasam', 'non', '2018-12-26 08:51:47', 'no', 'no', 2),
(54, 'kldfbidb', 'Database Management Systems Laboratory', 'mahmudul_hasam', 'non', '2018-12-26 08:51:52', 'no', 'no', 1),
(55, 'kldfbidb', 'Database Management Systems Laboratory', 'mahmudul_hasam', 'non', '2018-12-26 09:02:00', 'no', 'no', 1),
(56, 'sjhdcjksdvcs', 'Economics', 'mdtoufiquehasan_hemel', 'non', '2018-12-26 09:29:49', 'no', 'yes', 2),
(57, 'gvhpokjnifpo[l;fj', 'Physics', 'fatiha_islam', 'non', '2019-01-06 16:28:51', 'no', 'no', 0),
(58, 'gvhpokjnifpo[l;fj', 'Physics', 'fatiha_islam', 'non', '2019-01-06 16:32:00', 'no', 'no', 1),
(59, 'gvhpokjnifpo[l;fj', 'Physics', 'fatiha_islam', 'non', '2019-01-06 16:40:12', 'no', 'no', 0),
(60, 'xklcjbn ', 'Physics Lab', 'mahmudul_hasan', 'non', '2019-01-07 00:30:33', 'no', 'no', 1),
(61, 'k.jsdfv', 'Society, Technology and Engineering Ethics', 'mahmudul_hasan', 'non', '2019-01-07 00:30:38', 'no', 'yes', 1),
(62, 'lskdnv', 'Financial and Managerial Accounting', 'mahmudul_hasan', 'non', '2019-01-07 00:30:45', 'no', 'yes', 1),
(63, 'k.asjdv', 'Economics', 'mahmudul_hasan', 'non', '2019-01-07 00:30:50', 'no', 'yes', 1),
(64, 'kdjfgbndb', 'Physics Lab', 'mdtoufiquehasan_hemel', 'non', '2019-01-11 21:02:31', 'no', 'no', 0),
(65, 'dikfhgbd', 'Physics Lab', 'tom_cruise', 'non', '2019-01-11 21:28:08', 'no', 'no', 0),
(66, 'jkshdvb', 'Society, Technology and Engineering Ethics', 'tom_cruise', 'non', '2019-01-11 21:28:13', 'no', 'no', 1),
(67, 'zxjkhfvb', 'Financial and Managerial Accounting', 'tom_cruise', 'non', '2019-01-11 21:28:19', 'no', 'no', 1),
(68, 'iosdfuh', 'Economics', 'tom_cruise', 'non', '2019-01-11 21:28:25', 'no', 'no', 1),
(69, 'dxfhdfgjfk', 'Society, Technology and Engineering Ethics', 'fatiha_islam', 'non', '2019-01-11 22:55:08', 'no', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(3) NOT NULL,
  `friend_array` text NOT NULL,
  `userpreferences` varchar(7) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`, `userpreferences`, `student_id`) VALUES
(12, 'Imam', 'Hasan', 'imam_hasan', 'Imam@gmail.com', '7c79dd68b400e6b0c9f99f8f221dae26', '2018-11-08', 'assets/images/profile_pics/defaults/head_wet_asphalt.png', 0, 0, 'no', ',', 'Teacher', 0),
(13, 'Mdtoufiquehasan', 'Hemel', 'mdtoufiquehasan_hemel', 'Hemel@gmail.com', 'dbe17e15bbab4931a65982bb79222ec0', '2018-12-06', 'assets/images/profile_pics/mdtoufiquehasan_hemelc63f241f63c1bca837cc1e776dd584e1n.jpeg', 25, 2, 'no', ',mahmudul_hasan,fatiha_islam,mdtoufiquehasan_hemel,mdtoufiquehasan_hemel,tom_cruise,', 'Student', 11152036),
(14, 'Ross', 'Geller', 'ross_geller', 'Ross@gmail.com', 'e3db88713cfd1c2eddf44713264f71ad', '2018-12-08', 'assets/images/profile_pics/defaults/propic.png', 0, 0, 'no', ',', 'Student', 11152041),
(17, 'Fatiha', 'Islam', 'fatiha_islam', 'Fatiha@gmail.com', '97d6cc2f3ea40ce063a5f7c46825ff7e', '2018-12-15', 'assets/images/profile_pics/fatiha_islamd20ff5c4b8b8441e59387c934877e8f9n.jpeg', 22, 2, 'no', ',mdtoufiquehasan_hemel,mahmudul_hasan,tom_cruise,tom_cruise,mahmudul_hasam,', 'Student', 11152041),
(18, 'Mahmudul', 'Hasam', 'mahmudul_hasam', 'Mahmudul@gmail.com', '0a25e512bc10934eb76bd0652f2a2a2e', '2018-12-26', 'assets/images/profile_pics/mahmudul_hasamcdae94df168817ea322f7ab4d6ddba5an.jpeg', 5, 4, 'no', ',fatiha_islam,', 'Student', 11152041),
(19, 'Mahmudul', 'Hasan', 'mahmudul_hasan', 'Mahmudul1@gmail.com', '20917c851c4a54f2a054390dac9085b7', '2019-01-07', 'assets/images/profile_pics/defaults/head_wet_asphalt.png', 4, 4, 'no', ',mdtoufiquehasan_hemel,fatiha_islam,', 'Student', 11152041),
(20, 'Tom', 'Cruise', 'tom_cruise', 'Tom@gmail.com', '6b032d14925d609eb5637ed370367944', '2019-01-11', 'assets/images/profile_pics/tom_cruisef8af93a5cd56f8aec45e9d07d97a7e3fn.jpeg', 4, 3, 'no', ',fatiha_islam,fatiha_islam,mdtoufiquehasan_hemel,', 'Student', 11152041);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_profile`
--
ALTER TABLE `course_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `course_profile`
--
ALTER TABLE `course_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
