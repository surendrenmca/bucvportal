-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:44 AM
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
-- Database: `erpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_firstname` varchar(100) NOT NULL,
  `admin_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_firstname`, `admin_status`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'Administrator, ERP CV PORTAL', 1),
(2, 'user1', '8a13a81b63c9f02d897e8b39dd21372f', 'User1', 2),
(3, 'user2', '415ae01d78998c8191a416ddd8cabe33', 'User2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `college_name` varchar(500) DEFAULT NULL,
  `college_address` varchar(1000) DEFAULT NULL,
  `cdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `user_id`, `college_name`, `college_address`, `cdate`) VALUES
(1, 2, 'A.G. Arts and Science College for Women', 'Koduvai Villa, Tirupur - 638 660', '2019-10-10'),
(2, 3, 'Adarsh Vidyala College of Arts and Science', 'Bhavani T.K. - 638 312', '2019-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `programme_details`
--

CREATE TABLE `programme_details` (
  `id` int(11) NOT NULL,
  `college_id` int(10) DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `course_name` varchar(1000) DEFAULT NULL,
  `sanctioned_strength` int(11) DEFAULT NULL,
  `total_candidates` int(11) DEFAULT NULL,
  `foreign_candidates` int(11) DEFAULT NULL,
  `other_board` int(11) DEFAULT NULL,
  `ob_ug` int(11) DEFAULT NULL,
  `ob_pg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programme_details`
--

INSERT INTO `programme_details` (`id`, `college_id`, `course_code`, `course_name`, `sanctioned_strength`, `total_candidates`, `foreign_candidates`, `other_board`, `ob_ug`, `ob_pg`) VALUES
(3, 2, '25', 'B.B.A', 60, 17, 0, 0, 0, 0),
(4, 2, '2', 'B.Com.', 120, 66, 0, 2, 2, 0),
(5, 3, '25', 'B.B.A', 60, 17, 0, 0, 0, 0),
(6, 3, '2', 'B.Com.', 120, 66, 0, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `fee` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `course_id`, `student_name`, `dob`, `fee`) VALUES
(1, 5, 'ANNAL DANCY S ', '23-10-2001', 915.00),
(2, 5, 'ARUN E', '24-03-2002', 915.00),
(3, 5, 'BHARATHI M', '30-06-2001', 915.00),
(4, 5, 'DINESHKUMAR G', '21-12-2001', 915.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme_details`
--
ALTER TABLE `programme_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programme_details`
--
ALTER TABLE `programme_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
