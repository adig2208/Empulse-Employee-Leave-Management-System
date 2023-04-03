-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 10:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_manage_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'Web Development'),
(2, 'Data Science'),
(3, 'Backend Development'),
(4, 'App Development'),
(7, 'Sales and Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `email`, `mobile`, `password`, `department_id`, `address`, `birthday`, `role`) VALUES
(1, 'Aditya Gurnani', 'male', 'aditya@gmail.com', '9167189321', '12345', 2, 'Mumbai', '2000-08-22', 1),
(2, 'Krish Amesur', 'male', 'krish@gmail.com', '8976541124', '12345', 1, 'Mumbai', '2000-11-14', 2),
(4, 'Ashwin Sharma', 'male', 'as@gmail.com', '9876532140', '12345', 1, 'Mumbai', '2000-08-01', 2),
(5, 'Ravi Khurana', 'male', 'ravi@gmail.com', '9087612345', '12345', 2, 'Mumbai', '1996-10-24', 2),
(6, 'Abhishek Pant', 'male', 'pant@gmail.com', '9167198250', '12345', 2, 'Mumbai', '2000-08-23', 2),
(8, 'Rohan Sharma', 'male', 'rohan@gmail.com', '9321456712', '12345', 7, 'Mumbai', '1995-02-23', 2),
(9, 'Rishi Ahuja', 'male', 'r@gmail.com', '9876541230', '12345', 3, 'Mumbai', '1990-06-21', 2),
(10, 'Shefali Narayan', 'female', 's@gmail.com', '9879876564', '12345', 1, 'Mumbai', '1997-10-22', 2),
(11, 'Zoya Ahluwalia', 'female', 'eva@gmail.com', '9876544561', '12345', 2, 'Mumbai', '1995-01-12', 2),
(12, 'Akshay Pillai', 'male', 'pillu@gmail.com', '9678123458', '12345', 7, 'Mumbai', '1993-06-21', 2),
(13, 'Dhruv Sharma', 'male', 'ds@gmail.com', '8974231789', '12345', 4, 'Mumbai', '2000-05-25', 2),
(14, 'Kartik Bedi', 'male', 'kartik@gmail.com', '9807907612', '12345', 3, 'Mumbai', '1997-07-24', 2),
(15, 'Preksha Purohit', 'female', 'pp@gmail.com', '8797431262', '12345', 7, 'Mumbai', '2000-02-28', 2),
(16, 'Ashwini Pednekar', 'female', 'ap@gmail.com', '9123871145', '12345', 4, 'Mumbai', '1998-08-12', 2),
(17, 'Vanya Mistry', 'female', 'vm@gmail.com', '9876123459', '12345', 3, 'Mumbai', '1999-09-24', 2),
(18, 'Shikha Rane', 'female', 'sr@gmail.com', '7689213450', '12345', 3, 'Mumbai', '1996-01-11', 2),
(19, 'Yashaswini Joshi', 'female', 'y@gmail.com', '8899773214', '12345', 4, 'Mumbai', '2000-05-30', 2),
(20, 'Vihan Patel', 'male', 'vp@gmail.com', '9148012355', '12345', 2, 'Mumbai', '1997-04-05', 2),
(21, 'Ansh Chawla', 'male', 'ac@gmail.com', '8989876543', '12345', 7, 'Mumbai', '1996-12-09', 2),
(22, 'Sanjana Sinha', 'female', 'ss@gmail.com', '8859213342', '12345', 2, 'Mumbai', '2000-10-14', 2),
(23, 'Advait Naik', 'male', 'advait@gmail.com', '7986321175', '12345', 1, 'Mumbai', '2000-03-18', 2),
(25, 'Niyati Sethi', 'female', 'ns@gmail.com', '8812340711', '12345', 7, 'Mumbai', '1999-11-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `days` int(50) NOT NULL,
  `leaves_left` int(50) NOT NULL,
  `leave_reason` text NOT NULL,
  `leave_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `leave_id`, `leave_from`, `leave_to`, `days`, `leaves_left`, `leave_reason`, `leave_status`) VALUES
(43, 11, 8, '2020-12-12', '2020-12-14', 2, 22, '', 2),
(44, 11, 8, '2020-12-21', '2020-12-24', 3, 19, '', 2),
(45, 11, 8, '2020-12-25', '2020-12-28', 3, 16, '', 2),
(47, 11, 9, '2020-12-12', '2021-04-12', 121, 59, '', 2),
(52, 2, 12, '2020-12-14', '2020-12-20', 6, 8, '', 2),
(53, 2, 12, '2020-12-21', '2020-12-26', 5, 3, '', 2),
(55, 2, 3, '2020-12-12', '2020-12-14', 2, 361, '', 2),
(56, 2, 10, '2020-12-15', '2020-12-17', 2, 3, '', 2),
(61, 2, 3, '2020-12-21', '2020-12-23', 2, 359, '', 2),
(62, 2, 3, '2020-12-13', '2020-12-18', 5, 354, '', 3),
(63, 2, 3, '2020-12-11', '2020-12-13', 2, 352, '', 2),
(64, 2, 12, '2020-12-13', '2020-12-15', 2, 1, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `Total_leaves` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_type`, `Total_leaves`) VALUES
(3, 'Sick Leave', 365),
(9, 'Maternity Leave', 180),
(10, 'Bereavement Leave', 7),
(11, 'Block Leave', 10),
(12, 'Paternity Leave', 14),
(14, 'Annual Paid Leave', 24);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `project_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `client_name`, `project_name`, `project_status`, `project_start_date`) VALUES
(1, 'Unilever', 'AI implementation', 'completed', '2020-01-09'),
(2, 'ONGC', 'Backend Management ', 'ongoing', '2020-02-13'),
(3, 'Starbucks', 'Strategy Planning', 'completed', '2020-01-13'),
(4, 'Honda ', 'ERP Implementation', 'completed', '2020-02-02'),
(5, 'Cisco', 'Data Analysis', 'completed', '2020-02-11'),
(6, 'ITC', 'Website Development', 'completed', '2020-02-23'),
(7, 'Lenovo ', 'Social Media Marketing', 'ongoing', '2020-03-11'),
(8, 'Asianpaints', 'Backend Management ', 'completed', '2020-04-01'),
(9, 'Nestle', 'Data Mining', 'ongoing', '2020-04-22'),
(10, 'Nike', 'Website Management', 'ongoing', '2020-05-15'),
(11, 'Pepsico', 'Data Analysis', 'completed', '2020-05-29'),
(12, 'SalesForce', 'Android Application', 'completed', '2020-06-12'),
(13, 'Ceat tyres', 'Strategy Planning', 'ongoing', '2020-07-31'),
(14, 'Gilette', 'ERP Implementation', 'ongoing', '2020-06-24'),
(15, 'Zoho', 'Website Development', 'ongoing', '2020-06-04'),
(16, 'Colgate', 'Data Analysis', 'ongoing', '2020-01-23'),
(17, 'Land Rover', 'AI Implementation', 'ongoing', '2020-06-29'),
(18, 'Dmart', 'Backend Management ', 'completed', '2020-07-14'),
(19, 'SeriesX', 'Social Media Marketing', 'ongoing', '2020-08-22'),
(20, 'Telusko', 'Website Development', 'ongoing', '2020-08-13'),
(21, 'Hyundai', 'Data Mining', 'ongoing', '2020-08-04'),
(22, 'Array', 'Strategy Planning', 'completed', '2020-03-15'),
(23, 'FilterY', 'ERP Implementation', 'completed', '2020-09-11'),
(24, 'Pixel', 'Data Analysis', 'ongoing', '2020-09-15'),
(25, 'Grammerly', 'Social Media Marketing', 'ongoing', '2020-09-28'),
(26, 'Tupperware', 'ERP Implementation', 'ongoing', '2020-11-08'),
(27, 'LG', 'Android Application Mangement', 'completed', '2020-11-19'),
(28, 'Fitbit', 'Website Development', 'completed', '2020-06-18'),
(29, 'Dynamic', 'Strategy Planning', 'completed', '2020-08-09'),
(30, 'Safola', 'Social Media Marketing', 'completed', '2020-10-12'),
(31, 'CentraL', 'Backend Management ', 'ongoing', '2020-04-19'),
(32, 'Tata', 'Strategy Planning', 'ongoing', '2020-10-17'),
(33, 'Vedanta', 'Website Development', 'completed', '2020-10-25');

