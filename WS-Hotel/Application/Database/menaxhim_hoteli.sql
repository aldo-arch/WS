-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 04:19 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menaxhim_hoteli`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `audit_id` int(10) NOT NULL,
  `id_employee` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `id_room` int(10) DEFAULT NULL,
  `username` text,
  `event_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `table_name` text,
  `operation` text,
  `employee_name` varchar(30) DEFAULT NULL,
  `room_number` varchar(30) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) NOT NULL,
  `employee_name` varchar(30) DEFAULT NULL,
  `job` varchar(30) DEFAULT NULL,
  `salary` varchar(30) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `job`, `salary`, `created_by`, `modified_by`) VALUES
(105, 'tia', 'mjeke', '4555', NULL, NULL);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `after_insert_employee` AFTER INSERT ON `employee` FOR EACH ROW BEGIN 
INSERT INTO audit( id_employee, employee_name, table_name, `operation`) 
VALUES (new.employee_id, new.employee_name, 'employee', 'insert');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_audit` AFTER DELETE ON `employee` FOR EACH ROW BEGIN 
INSERT INTO audit( id_employee, employee_name, table_name, `operation` ) 
VALUES (OLD.employee_id, OLD.employee_name, 'employee', 'delete');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_employee` AFTER UPDATE ON `employee` FOR EACH ROW BEGIN 
INSERT INTO audit( id_employee, employee_name, table_name, `operation`) 
VALUES (new.employee_id, new.employee_name, 'employee', 'update');

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `employee_history_id` int(10) NOT NULL,
  `id_employee` int(10) DEFAULT NULL,
  `action_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`employee_history_id`, `id_employee`, `action_date`, `action`) VALUES
(1, 26, '2018-08-28 12:13:18', 'delete'),
(2, 27, '2018-08-28 12:42:45', 'delete'),
(3, 28, '2018-08-28 12:59:55', 'delete'),
(4, 41, '2018-08-28 13:43:41', 'delete'),
(5, 43, '2018-08-29 05:20:12', 'delete'),
(6, 44, '2018-08-29 05:54:54', 'delete'),
(7, 45, '2018-08-29 06:08:53', 'delete'),
(8, 46, '2018-08-29 06:08:56', 'delete'),
(9, 47, '2018-08-29 06:09:04', 'delete'),
(10, 48, '2018-08-29 06:09:10', 'delete'),
(11, 49, '2018-08-29 06:09:14', 'delete'),
(12, 50, '2018-08-29 06:10:21', 'delete'),
(13, 51, '2018-08-29 06:10:47', 'delete'),
(14, 52, '2018-08-29 06:11:35', 'delete'),
(15, 53, '2018-08-29 06:11:40', 'delete'),
(16, 54, '2018-08-29 06:11:47', 'delete'),
(17, 55, '2018-08-29 06:12:15', 'delete'),
(18, 56, '2018-08-29 06:12:18', 'delete'),
(19, 57, '2018-08-29 06:13:48', 'delete'),
(20, 58, '2018-08-29 06:14:13', 'delete'),
(21, 59, '2018-08-29 06:18:02', 'delete'),
(22, 60, '2018-08-29 06:19:59', 'delete'),
(23, 61, '2018-08-29 06:24:08', 'delete'),
(24, 62, '2018-08-29 06:24:27', 'delete'),
(25, 63, '2018-08-29 06:33:26', 'delete'),
(28, 64, '2018-08-29 10:32:37', 'delete'),
(29, 65, '2018-08-29 10:51:32', 'delete'),
(30, 66, '2018-08-30 07:09:01', 'delete'),
(31, 67, '2018-08-30 07:09:57', 'delete'),
(32, 68, '2018-08-30 07:11:41', 'delete'),
(33, 69, '2018-08-30 07:14:03', 'delete'),
(34, 70, '2018-08-30 07:16:53', 'delete'),
(35, 71, '2018-08-30 07:19:00', 'delete'),
(36, 72, '2018-08-30 07:32:13', 'delete'),
(37, 73, '2018-08-30 08:37:42', 'delete'),
(38, 74, '2018-08-30 08:37:53', 'delete'),
(39, 75, '2018-08-30 08:39:49', 'delete'),
(40, 76, '2018-08-30 08:40:01', 'delete'),
(41, 77, '2018-08-30 08:40:45', 'delete'),
(42, 78, '2018-08-30 08:40:55', 'delete'),
(43, 79, '2018-08-30 08:48:10', 'delete'),
(44, 80, '2018-08-30 08:49:44', 'delete'),
(45, 81, '2018-08-30 08:53:09', 'delete'),
(46, 83, '2018-08-30 10:12:48', 'delete'),
(47, 82, '2018-08-30 10:23:28', 'delete'),
(48, 84, '2018-08-30 10:23:50', 'delete'),
(49, 85, '2018-08-30 10:48:18', 'delete'),
(50, 86, '2018-08-30 12:16:35', 'delete'),
(51, 89, '2018-08-31 09:24:21', 'delete'),
(52, 90, '2018-08-31 10:00:09', 'delete'),
(53, 87, '2018-08-31 10:15:02', 'delete'),
(54, 91, '2018-08-31 10:26:59', 'delete'),
(55, 88, '2018-08-31 10:31:42', 'delete'),
(56, 93, '2018-09-03 06:15:09', 'delete'),
(57, 92, '2018-09-03 07:08:54', 'delete'),
(58, 94, '2018-09-03 07:08:58', 'delete'),
(59, 95, '2018-09-03 07:09:00', 'delete'),
(60, 100, '2018-09-03 07:57:57', 'delete'),
(61, 96, '2018-09-03 08:02:37', 'delete'),
(62, 97, '2018-09-03 08:02:41', 'delete'),
(63, 99, '2018-09-03 14:00:22', 'delete'),
(64, 105, '2018-09-05 07:04:31', 'delete'),
(65, 102, '2018-09-17 10:19:55', 'delete'),
(66, 98, '2018-09-17 10:57:36', 'delete'),
(67, 104, '2018-09-17 10:57:40', 'delete'),
(68, 101, '2018-09-17 10:57:46', 'delete'),
(69, 103, '2018-09-17 11:36:26', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(10) NOT NULL,
  `id_room` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`reserve_id`, `id_room`, `date`, `date_to`) VALUES
(18, 8, '2018-02-15', '2018-04-15'),
(19, 8, '2018-02-15', '2018-04-15'),
(20, 11, '2018-01-15', '2018-01-15'),
(21, 11, '2018-01-15', '2018-01-15'),
(22, 7, '2018-09-03', '2018-09-17'),
(23, 11, '2018-01-15', '2018-01-15'),
(24, 11, '2018-01-15', '2018-01-15'),
(25, 11, '2018-01-15', '2018-01-15'),
(26, 7, '2018-09-02', '2018-09-06'),
(27, 7, '2018-09-02', '2018-09-04'),
(31, 7, '2018-09-05', '2018-09-14'),
(32, 7, '2018-09-15', '2018-09-16'),
(46, 8, '2018-09-06', '2018-09-12'),
(47, 11, '2018-09-08', '2018-09-17'),
(66, 0, '0000-00-00', '2019-01-05'),
(67, 15, '0000-00-00', '2019-01-22'),
(68, 15, '2019-01-08', '2019-01-31'),
(69, 0, '2019-01-03', '2019-01-09'),
(70, 0, '0000-00-00', '0000-00-00'),
(71, 16, '0000-00-00', '0000-00-00'),
(72, 15, '0000-00-00', '0000-00-00'),
(73, 15, '0000-00-00', '0000-00-00'),
(74, 15, '2019-01-01', '2019-01-09'),
(75, 15, '2019-01-23', '2019-01-30'),
(76, 15, '2019-01-02', '2019-01-03'),
(77, 15, '2019-01-01', '2019-01-02'),
(78, 15, '2019-01-10', '2019-01-25'),
(79, 15, '2019-03-09', '2019-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `number_room` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `number_room`, `type`, `price`, `created_by`, `modified_by`) VALUES
(16, '12', 'Cift', '2222', NULL, NULL),
(17, '1', 'Tek', '12', NULL, NULL);

--
-- Triggers `room`
--
DELIMITER $$
CREATE TRIGGER `after_insert_room` AFTER INSERT ON `room` FOR EACH ROW BEGIN 
INSERT INTO audit( id_room, room_number, table_name, `operation`) 
VALUES (new.room_id, new.number_room, 'room', 'insert');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `audit_delete_room` AFTER DELETE ON `room` FOR EACH ROW BEGIN 
INSERT INTO audit( id_room, room_number, table_name, `operation` ) 
VALUES (OLD.room_id, OLD.number_room, 'room', 'delete');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `room_before_update` BEFORE UPDATE ON `room` FOR EACH ROW BEGIN INSERT INTO room_history( id_room, price ) 
VALUES (
OLD.room_id, OLD.price);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_room` AFTER UPDATE ON `room` FOR EACH ROW BEGIN 
INSERT INTO audit( id_room, room_number, table_name, `operation`) 
VALUES (new.room_id, new.number_room, 'room', 'update');

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room_history`
--

CREATE TABLE `room_history` (
  `room_history_id` int(10) NOT NULL,
  `id_room` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_history`
--

INSERT INTO `room_history` (`room_history_id`, `id_room`, `date`, `price`) VALUES
(1, 2, NULL, '22'),
(2, 3, NULL, 'ooooooo'),
(3, 4, NULL, '2'),
(4, 5, NULL, '11'),
(9, 7, NULL, '123'),
(11, 10, NULL, '12'),
(54, 10, NULL, '12'),
(57, 8, NULL, '22'),
(58, 8, NULL, '22'),
(59, 12, NULL, '234'),
(60, 12, NULL, '2345'),
(61, 16, NULL, '222'),
(62, 15, NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `name`, `celular`, `role`, `created_by`, `modified_by`) VALUES
(262, 'rtet', '45242271c640ab12c95a6cf8fbc23872', 'tret@rtre', 'retet', '43654', 'admin', NULL, NULL),
(263, 'caccac', 'd0fcdf1d37f265f1f041181227881561', 'caca@fdbvgdfbv', 'bdbd', '3453456', 'admin', NULL, NULL),
(264, 'aaaaa', '31223a4e5d32813303fe453f3a37f244', 'anisa.haxhillari@yahoo.com', 'anisa', '3523622', 'user', NULL, NULL),
(265, 'az', 'e46c0023c48d1b8744b6d04203eeaa39', 'Ardit.Zurbo@hotmail.com', 'ardit', '3523622', 'user', NULL, NULL),
(266, 'isreh', '1c75a3d5b3c32d50db9d8c12899404e4', 'arditi@hotmail.com', 'hersiisreh', '3523622', 'admin', NULL, NULL),
(267, 'ina', 'a0fb2daa33c637d078d1d276dd453ea2', 'ina@gmail.com', 'inaL', '35453312', 'admin', NULL, NULL),
(269, 'aldo', '67c1f5f1cbbfd964acadc2914633550a', 'aldo.qejvani@fshnstudent.info', 'aldo', '123455677', 'admin', NULL, NULL),
(270, 'z', 'fbade9e36a3f36d3d676c1b808451dd7', 'q@q.com', 'zz', '134432211', 'user', NULL, NULL),
(271, 'zzz', 'f3abb86bd34cf4d52698f14c0da1dc60', 'z@z.com', 'zzz', '11111111', 'user', NULL, NULL),
(272, 'qqqo', 'b2ca678b4c936f905fb82f2733f5297f', 'q@q.com', 'qqq', '123456789', 'user', NULL, NULL);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN 
INSERT INTO audit( id_user, username, table_name, `operation`, created_by) 
VALUES (new.user_id, new.username, 'user', 'insert', new.created_by);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `audit_delete_user` AFTER DELETE ON `user` FOR EACH ROW BEGIN 
INSERT INTO audit( id_user, username, table_name, `operation` ) 
VALUES (OLD.user_id, OLD.username, 'user', 'delete');

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user` AFTER UPDATE ON `user` FOR EACH ROW BEGIN 
INSERT INTO audit( id_user, username, table_name, `operation`, modified_by) 
VALUES (new.user_id, new.username, 'user', 'update', old.modified_by);

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`employee_history_id`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`reserve_id`),
  ADD KEY `id_room` (`id_room`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `number_room` (`number_room`);

--
-- Indexes for table `room_history`
--
ALTER TABLE `room_history`
  ADD PRIMARY KEY (`room_history_id`),
  ADD KEY `id_room` (`id_room`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `employee_history_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `reserve_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room_history`
--
ALTER TABLE `room_history`
  MODIFY `room_history_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
