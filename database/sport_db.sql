-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 05:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblapp`
--

CREATE TABLE `tblapp` (
  `id` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `student_number` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `sport_code` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `id_number` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `next_of_kin_name` varchar(225) NOT NULL,
  `next_of_kin_phone` varchar(225) NOT NULL,
  `medical_condition` varchar(225) DEFAULT NULL,
  `medical_details` varchar(225) DEFAULT NULL,
  `medical_aid_name` varchar(225) DEFAULT NULL,
  `medical_aid_number` varchar(225) DEFAULT NULL,
  `signed_date` varchar(225) NOT NULL,
  `signature` varchar(225) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `CreationDate`) VALUES
(1, ' Sport Department', 'SD', '2017-11-01 07:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Av_leave` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `Av_leave`, `Phonenumber`, `Status`, `RegDate`, `role`, `location`) VALUES
(1, 'Janobe', 'Martins', 'janobe@janobe.com', '36d59e2369f00c4d9f336acf4408bae9', 'Male', '3 February, 1990', 'SD', 'N NEPO', '30', '0248865955', 1, '2017-11-10 11:29:59', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(2, 'Edem', 'Mcwilliams', 'james@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'SD', 'N NEPO', '30', '8587944255', 1, '2017-11-10 13:40:02', 'Admin', 'photo2.jpg'),
(4, 'Nathaniel', 'Nkrumah', 'nat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'SD', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(5, 'Gideon', 'Annan', 'gideon@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'SD', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Admin', 'photo5.jpg'),
(6, 'Martha', 'Arthur', 'mat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'SD', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(7, 'Bridget', 'Gafa', 'bridget@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'SD', 'N NEPO', '1', '0596667981', 1, '2017-11-10 13:40:02', 'Admin', '1920_File_logo4.png'),
(8, 'Anna', 'Mensah', 'an@gmail.com', '123456', 'Female', '3 February, 1990', 'SD', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(9, 'Leo', 'leo', 'leo@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', '12 feb 1990', 'SD', '12 DFFJKNV jd', '30', '0123456789', 1, '2022-09-26 07:23:56', 'Admin', 'NO-IMAGE-AVAILABLE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsportcodes`
--

CREATE TABLE `tblsportcodes` (
  `id` int(11) NOT NULL,
  `sport_name` varchar(225) NOT NULL,
  `trail_date` date NOT NULL DEFAULT current_timestamp(),
  `trail_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsportcodes`
--

INSERT INTO `tblsportcodes` (`id`, `sport_name`, `trail_date`, `trail_time`) VALUES
(1, 'Chess', '2022-09-28', '12:00:00'),
(2, 'Table tennis', '2022-09-28', '12:15:00'),
(3, 'Aerobics', '2022-09-28', '12:00:00'),
(4, 'Boxing', '2022-09-28', '13:00:00'),
(5, 'Pool', '2022-09-28', '08:00:00'),
(6, 'Ultimate Frisbee', '2022-09-28', '08:00:00'),
(7, 'Tennis', '2022-09-28', '09:00:00'),
(8, 'Handball', '2022-09-28', '11:00:00'),
(9, 'Softball', '2022-09-28', '11:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblapp`
--
ALTER TABLE `tblapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblsportcodes`
--
ALTER TABLE `tblsportcodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblapp`
--
ALTER TABLE `tblapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblsportcodes`
--
ALTER TABLE `tblsportcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
