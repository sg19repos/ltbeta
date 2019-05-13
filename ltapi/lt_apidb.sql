-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 02:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lt_apidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_group_shells`
--

CREATE TABLE `lt_group_shells` (
  `group_shell_id` int(10) NOT NULL,
  `group_shell_user` int(10) NOT NULL,
  `group_shell_list` text NOT NULL COMMENT 'Contains csv of users subscribed by this user'
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `lt_group_shells`
--

INSERT INTO `lt_group_shells` (`group_shell_id`, `group_shell_user`, `group_shell_list`) VALUES
(1, 1, '2,3'),
(3, 2, '3');

-- --------------------------------------------------------

--
-- Table structure for table `lt_tracks`
--

CREATE TABLE `lt_tracks` (
  `track_id` int(10) NOT NULL,
  `track_name` varchar(32) NOT NULL,
  `track_description` text NOT NULL,
  `track_ownerid` decimal(10,0) NOT NULL,
  `track_category` int(11) NOT NULL,
  `track_created_date` datetime NOT NULL,
  `track_created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `track_image` varchar(256) NOT NULL,
  `track_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lt_tracks`
--

INSERT INTO `lt_tracks` (`track_id`, `track_name`, `track_description`, `track_ownerid`, `track_category`, `track_created_date`, `track_created_time`, `track_image`, `track_url`) VALUES
(1, 'Tropical house', 'Tropical Volumes by Thomas Jack', '1000000001', 0, '0000-00-00 00:00:00', '2019-05-12 05:40:56', '', ''),
(2, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:16:22', '', ''),
(3, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:16:22', '', ''),
(4, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:20:24', '', ''),
(5, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:20:24', '', ''),
(6, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:21:19', '', ''),
(7, 'Tropical house2', 'Tropical Volumes by Thomas Jack2', '1000000002', 0, '0000-00-00 00:00:00', '2019-05-12 06:21:19', '', ''),
(8, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:03', '', ''),
(9, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:03', '', ''),
(10, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:17', '', ''),
(11, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:17', '', ''),
(12, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:57', '', ''),
(13, 'Tropical house3', 'Tropical Volumes by Thomas Jack3', '1000000003', 0, '0000-00-00 00:00:00', '2019-05-12 06:22:57', '', ''),
(14, 'Tropical house4', 'Tropical Volumes by Thomas Jack4', '1000000004', 0, '0000-00-00 00:00:00', '2019-05-12 06:23:54', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lt_users`
--

CREATE TABLE `lt_users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_password` varchar(6) NOT NULL,
  `user_emailid` varchar(256) NOT NULL,
  `user_mobileno` varchar(20) NOT NULL,
  `user_addeddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_addedtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_geolocation` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `lt_users`
--

INSERT INTO `lt_users` (`user_id`, `user_name`, `user_password`, `user_emailid`, `user_mobileno`, `user_addeddate`, `user_addedtime`, `user_geolocation`) VALUES
(1, 'Kygo', '121212', 'kygo@email.com', '1111111111', '2019-05-12 15:22:40', '2019-05-12 09:52:40', 'Test location'),
(2, 'TJack', '141414', 'tjack@email.com', '2222222222', '2019-05-12 19:51:40', '2019-05-12 14:21:40', 'Test location'),
(3, 'MGaye', '151515', 'mgaye@email.com', '3333333333', '2019-05-12 20:15:50', '2019-05-12 14:45:50', 'Test location');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_group_shells`
--
ALTER TABLE `lt_group_shells`
  ADD PRIMARY KEY (`group_shell_id`),
  ADD UNIQUE KEY `group_shell_user` (`group_shell_user`);

--
-- Indexes for table `lt_tracks`
--
ALTER TABLE `lt_tracks`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `lt_users`
--
ALTER TABLE `lt_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_emailid` (`user_emailid`),
  ADD UNIQUE KEY `user_mobileno` (`user_mobileno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_group_shells`
--
ALTER TABLE `lt_group_shells`
  MODIFY `group_shell_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lt_tracks`
--
ALTER TABLE `lt_tracks`
  MODIFY `track_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lt_users`
--
ALTER TABLE `lt_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
