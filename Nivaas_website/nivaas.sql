-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 06:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nivaas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(2, 'vijay ', 'vijay'),
(3, 'pratik', 'pratik'),
(4, 'viranch', 'viranch'),
(5, 'harsh', 'harsh');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `phno` bigint(20) NOT NULL,
  `shop_category` varchar(20) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `email`, `phno`, `shop_category`, `added_on`) VALUES
(4, 'vijay', '1,Nivaas,Bharuch', 9725146587, 'General store', '2021-04-04 21:17:03'),
(5, 'pratik', 'pratikpatel@gmail.com', 9865212567, 'Gym', '2021-04-04 21:20:23'),
(6, 'harsh', 'harshkumar@gmail.com', 7854226541, 'Gym', '2021-04-04 21:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `name`, `email`, `phno`) VALUES
(3, 'vijay', 'vijayparmar@gmail.com', 7712568943),
(4, 'pratik', 'pratikpatel@gmail.com', 9856432156),
(5, 'harsh', 'harshkumar@gmail.com', 7854621456);

-- --------------------------------------------------------

--
-- Table structure for table `common_plot_booking`
--

CREATE TABLE `common_plot_booking` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `phno` bigint(20) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `number_persons` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_plot_booking`
--

INSERT INTO `common_plot_booking` (`id`, `name`, `email`, `phno`, `event_name`, `starting_date`, `ending_date`, `number_persons`, `added_on`) VALUES
(6, 'vijay', 'vijayparmar@gmail.com', 9725733644, 'DJ night', '2021-04-09', '2021-04-11', '', '2021-04-04 21:15:23'),
(7, 'pratik', 'pratikpatel@gmail.com', 8652136549, 'Family get together', '2021-04-23', '2021-04-24', '', '2021-04-04 21:19:57'),
(8, 'harsh', 'harshkumar@gmail.com', 7587512463, 'Football league', '2021-05-02', '2021-05-27', '', '2021-04-04 21:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phn` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phn`, `comment`, `added_on`) VALUES
(7, 'vijay', 'vijayparmar@gmail.com', 97251336589, 'Please repair the wall behind the residence', '2021-04-04 21:18:38'),
(8, 'pratik', 'pratikpatel@gmail.com', 9856421356, 'I am not able to see the notice in my account.', '2021-04-04 21:22:09'),
(9, 'harsh', 'harsh@gmail.com', 9725462412, 'The water pump in street 3 is not working', '2021-04-04 21:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_notice`
--

CREATE TABLE `emergency_notice` (
  `id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_notice`
--

INSERT INTO `emergency_notice` (`id`, `text`, `time`, `status`) VALUES
(6, 'All society members please submit their maintainance cheque  as today is the last date', '2021-04-04 21:11:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `text`, `time`, `status`) VALUES
(12, 'Due to lockdown guidlines seeing current situation , Ganesh chaturthi and ganesh visarjan function will not be help in the residence premises.', '2021-04-04 21:10:15', 1),
(13, '[edited]The project fair will start at 9 AM', '2021-04-05 13:02:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `occupation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `name`, `phno`, `email`, `address`, `occupation`) VALUES
(5, 'Vijay parmar', 9725133699, 'vijayparmar@gmail.com', '1,Nivaas,Bharuch', 'Engineer'),
(6, 'Viranch solanki', 9725468951, 'viranchsolanki@gmail.com', '2,nivaas,bharuch', 'Scientist'),
(7, 'Pratik', 8754269851, 'pratikpatel@gmail.com', '3,Nivaas,Bharuch', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `number_plate` varchar(20) NOT NULL,
  `arrival_time` datetime NOT NULL,
  `departure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `number_plate`, `arrival_time`, `departure_time`) VALUES
(14, '6,416 7 8719', '2021-04-04 21:29:03', '0000-00-00 00:00:00'),
(19, 'XTRAH', '2021-04-04 22:09:55', '2021-04-04 22:10:32'),
(30, 'XTRAN', '2021-04-05 10:17:31', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_plot_booking`
--
ALTER TABLE `common_plot_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_notice`
--
ALTER TABLE `emergency_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `common_plot_booking`
--
ALTER TABLE `common_plot_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emergency_notice`
--
ALTER TABLE `emergency_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
