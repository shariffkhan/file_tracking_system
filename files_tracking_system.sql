-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 07:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `files_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabinets`
--

CREATE TABLE `cabinets` (
  `cabinet_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabinets`
--

INSERT INTO `cabinets` (`cabinet_id`, `name`, `file_type_id`) VALUES
(1, 'ifm/cabinet/300', 1),
(2, 'ifm/cabsub/65', 2);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `volume` int(11) NOT NULL,
  `file_type_id` int(11) NOT NULL,
  `cabinet_id` int(11) NOT NULL,
  `shelf_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `is_open` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_id`, `name`, `volume`, `file_type_id`, `cabinet_id`, `shelf_id`, `status`, `is_open`) VALUES
(5, 'imc/bcs/15/79466', 'paul- files', 1, 1, 1, 1, 1, 1),
(6, 'imc/bcs/15/79465', 'testing', 1, 1, 1, 1, 1, 1),
(7, 'imc/bcs/15/79468', 'khan', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_type`
--

CREATE TABLE `file_type` (
  `filetype_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_type`
--

INSERT INTO `file_type` (`filetype_id`, `name`) VALUES
(1, 'Personal'),
(2, 'subject');

-- --------------------------------------------------------

--
-- Table structure for table `folio`
--

CREATE TABLE `folio` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folio`
--

INSERT INTO `folio` (`id`, `name`, `file_id`, `status`) VALUES
(7, 'folio number 1', 5, 0),
(8, 'folio number 2', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', '{"admin":0,"add":1}'),
(2, 'Adminstrator', '{"admin":1,"add":1,"delete":1,"users":1}');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`level_id`, `name`) VALUES
(1, 'level 1'),
(2, 'level 2'),
(3, 'level 3'),
(4, 'level 4'),
(5, 'level 5'),
(6, 'level 6');

-- --------------------------------------------------------

--
-- Table structure for table `sections_levels_list`
--

CREATE TABLE `sections_levels_list` (
  `sections_levels_list_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `section_levels_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections_levels_list`
--

INSERT INTO `sections_levels_list` (`sections_levels_list_id`, `name`, `level`, `section_levels_id`) VALUES
(10, 'Registry-office', 1, 10),
(11, 'Rector office', 1, 11),
(12, 'Academics office', 2, 12),
(13, 'Administration office', 2, 13),
(14, 'Computer Science and Information Technology', 3, 14),
(15, 'Cascef', 3, 15),
(16, 'DHRA OFFICE', 3, 16),
(18, 'New Libray', 3, 19),
(19, 'Banking and Finance', 3, 14),
(20, 'Head of Department', 4, 20),
(21, 'Head of Department', 4, 21),
(22, 'Deans offfice', 4, 22);

-- --------------------------------------------------------

--
-- Table structure for table `section_levels`
--

CREATE TABLE `section_levels` (
  `section_levels_id` int(11) NOT NULL,
  `header` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `upper_office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_levels`
--

INSERT INTO `section_levels` (`section_levels_id`, `header`, `name`, `level`, `upper_office_id`) VALUES
(10, 'Registry-Table', 'Registry', 1, 0),
(11, 'Rector-Table', 'Rector', 1, 0),
(12, 'Academics-Table', 'Academics', 2, 11),
(13, 'Administrator-Table', 'Administrator', 2, 11),
(14, 'Faculty-Table', 'Faculty', 3, 12),
(15, 'Cascef-Table', 'Cascef', 3, 12),
(16, 'DHRA-Table', 'DHRA', 3, 13),
(19, 'Library-Table', 'Library', 3, 12),
(20, 'Information Technology-Table', 'Information Technology', 4, 14),
(21, 'Computer Science-Table', 'Computer Science', 4, 14),
(22, 'Dean Computer science and IT-Table', 'Dean Computer science and IT', 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `security_level`
--

CREATE TABLE `security_level` (
  `id` int(11) NOT NULL,
  `levels` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_level`
--

INSERT INTO `security_level` (`id`, `levels`) VALUES
(1, 'normal user'),
(2, 'Super-Adminstrator');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cabinet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_id`, `name`, `cabinet_id`) VALUES
(1, 'ifm/shelfs/600', 1),
(2, 'ifm/shelfsub/768', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `middle` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `inside_section_list_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `security_level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_id`, `fname`, `middle`, `lname`, `email`, `inside_section_list_id`, `phone`, `username`, `password`, `security_level_id`) VALUES
(1, 'imc/bcs/15/79466', 'Paul', 'Madoshi', 'Manoni', '01paulmanoni@gmail.com', 10, 683996134, '79466Manoni', '4d834b7ef3ec3604215fb4e50fd551a2233a3ca8', 2),
(2, 'imc/bcs/15/79609', 'Machaba', 'E', 'Machaba', 'machaba@machaba.com', 11, 683996134, '79609Machaba', '6860e40295ea906a7831cc1ae614ed3465ef01c8', 1),
(3, 'imc/bcs/15/7607', 'Maabad', 'A', 'Mwaliko', 'rich@rich.com', 12, 2147483647, '7607Mwaliko', '1643250bd70d856898d17b0e671e8f49cc2fbcc1', 1),
(4, 'imc/bcs/15/607', 'sharrif', 'k', 'sharrif', 'sharrif@sharrif.com', 13, 2147483647, '607sharrif', '86f8b029bb1072a2004113471473567a65c8d114', 1),
(5, 'imc/bcs/15/7608', 'Effort', 'A', 'Effort', 'effort@effort.com', 16, 2147483647, '7608Effort', 'ed75fb4cdcf8e22eb6008aaae00b1216ce7022b6', 1),
(6, 'imc/bcs/15/79607', 'Mimi', 'A', 'Mimi', 'mimi@mimi.com', 15, 859679878, '79607Mimi', '8912d0d5d448f08ba987792c741c2bc44f379514', 1),
(7, 'imc/bcs/15/8967', 'hgjkjhj', 'jhg', 'ytjghf', 'kgjhk@jnfgjknf.com', 14, 2147483647, '8967ytjghf', 'b11e7ce9a1ba921e42a43bff40328cf5d96d8a4a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `track_files`
--

CREATE TABLE `track_files` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `is_notified` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_files`
--

INSERT INTO `track_files` (`id`, `sender_id`, `receiver_id`, `file_id`, `is_notified`, `status`, `time`) VALUES
(90, 10, 11, 5, 1, 0, '2017-10-30 22:09:55'),
(91, 11, 10, 5, 1, 1, '2017-10-30 22:10:18'),
(92, 10, 11, 5, 1, 0, '2017-10-30 22:10:57'),
(93, 11, 10, 5, 1, 1, '2017-10-30 22:17:28'),
(94, 10, 11, 5, 1, 0, '2017-10-30 22:18:40'),
(95, 11, 10, 5, 1, 1, '2017-10-30 22:18:58'),
(96, 10, 11, 5, 1, 0, '2017-10-30 22:52:42'),
(97, 11, 10, 5, 1, 1, '2017-10-30 22:52:52'),
(98, 10, 11, 5, 1, 0, '2017-10-30 23:39:20'),
(99, 11, 10, 5, 1, 1, '2017-10-30 23:56:54'),
(100, 10, 11, 5, 1, 0, '2017-10-30 23:58:05'),
(101, 11, 10, 5, 1, 1, '2017-10-30 23:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `creadeted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD PRIMARY KEY (`cabinet_id`),
  ADD KEY `file_type_id` (`file_type_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_name` (`shelf_id`);

--
-- Indexes for table `file_type`
--
ALTER TABLE `file_type`
  ADD PRIMARY KEY (`filetype_id`);

--
-- Indexes for table `folio`
--
ALTER TABLE `folio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `sections_levels_list`
--
ALTER TABLE `sections_levels_list`
  ADD PRIMARY KEY (`sections_levels_list_id`),
  ADD KEY `section_levels_id` (`section_levels_id`);

--
-- Indexes for table `section_levels`
--
ALTER TABLE `section_levels`
  ADD PRIMARY KEY (`section_levels_id`);

--
-- Indexes for table `security_level`
--
ALTER TABLE `security_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_id`),
  ADD KEY `cabinet_id` (`cabinet_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_files`
--
ALTER TABLE `track_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabinets`
--
ALTER TABLE `cabinets`
  MODIFY `cabinet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `file_type`
--
ALTER TABLE `file_type`
  MODIFY `filetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `folio`
--
ALTER TABLE `folio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sections_levels_list`
--
ALTER TABLE `sections_levels_list`
  MODIFY `sections_levels_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `section_levels`
--
ALTER TABLE `section_levels`
  MODIFY `section_levels_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `security_level`
--
ALTER TABLE `security_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `track_files`
--
ALTER TABLE `track_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabinets`
--
ALTER TABLE `cabinets`
  ADD CONSTRAINT `cabinets_ibfk_1` FOREIGN KEY (`file_type_id`) REFERENCES `file_type` (`filetype_id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`shelf_id`) REFERENCES `shelf` (`shelf_id`),
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`shelf_id`) REFERENCES `shelf` (`shelf_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`shelf_id`) REFERENCES `shelf` (`shelf_id`);

--
-- Constraints for table `sections_levels_list`
--
ALTER TABLE `sections_levels_list`
  ADD CONSTRAINT `sections_levels_list_ibfk_1` FOREIGN KEY (`section_levels_id`) REFERENCES `section_levels` (`section_levels_id`) ON DELETE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinets` (`cabinet_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
