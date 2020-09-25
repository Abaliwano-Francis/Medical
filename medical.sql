-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2020 at 05:11 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `name`, `status`, `date_created`) VALUES
(2, 'Admin', '1', '2020-05-13 20:21:09'),
(3, 'Security', '1', '2020-05-13 20:21:20'),
(5, 'Doctors', '1', '2020-05-13 20:21:51'),
(6, 'Pharmacy', '1', '2020-05-13 20:22:10'),
(7, 'Stock', '1', '2020-05-13 20:22:19'),
(8, 'Cleaning', '1', '2020-05-13 21:27:26'),
(9, 'Receptionist', '1', '2020-05-13 21:28:21'),
(10, 'Electrical', '1', '2020-05-16 06:15:05'),
(11, 'ICT', '1', '2020-05-16 07:48:42'),
(12, 'Planning', '0', '2020-09-16 12:18:31'),
(13, 'Research', '0', '2020-09-16 12:19:13'),
(14, 'Sports', '0', '2020-09-21 11:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(40) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `addedby` int(11) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `foreign key to doc_category table` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `category_id`, `status`, `pic`, `addedby`, `date_of_birth`, `date_added`) VALUES
(3, 'Kintu Fahad', 'fahad', '', 'fahad@gmail.com', '0700968574', 'kyanja, kampala', 2, 1, '_20170519_184430HJ.jpg', 2, '1990-12-31', '2020-05-16 07:43:16'),
(4, 'Abaliwano Francis', 'francis', '', 'francis@gmail.com', '0700968574', 'Jinja', 4, 1, '_20170519_1844304TJGW.jpg', 2, '1992-12-06', '2020-05-16 07:44:10'),
(6, 'Nambi Janet', 'jenet', '', 'jenet@gmail.com', '256778968511', 'Makerere', 1, 1, '1.jpg', 2, '1999-01-01', '2020-05-16 09:51:56'),
(7, 'Namberoy Asina', 'asina', '', 'asina123@gmail.com', '256778968511', 'Banda', 5, 1, '4.jpg', 2, '2000-12-20', '2020-05-16 09:54:22'),
(8, 'Ashley Williams', 'willl', NULL, 'asio@gmail.com', '0778101574', 'Gayaza', 3, 1, '234.jpg', 2, '2020-09-02', '2020-09-16 12:17:54'),
(10, 'Ann Taylor', 'ann', NULL, 'ann@gmail.com', '0778223443', 'Gayaza', 5, 0, 'www.jpg', 2, '2020-09-20', '2020-09-24 12:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `doc_category`
--

DROP TABLE IF EXISTS `doc_category`;
CREATE TABLE IF NOT EXISTS `doc_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `doc_category_ibfk_1` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_category`
--

INSERT INTO `doc_category` (`id`, `name`, `added_by`, `date_added`) VALUES
(1, 'Nurse', 1, '2020-05-13 20:51:05'),
(2, 'Optician', 1, '2020-05-13 20:51:27'),
(3, 'Dentist', 1, '2020-05-13 20:51:42'),
(4, 'Surgion', 1, '2020-05-13 20:52:00'),
(5, 'Midwife', 1, '2020-05-13 20:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `body`, `sender`, `receiver`, `date_time`, `status`) VALUES
(1, 'Hello', 2, 1, '2020-05-19 13:39:58', 0),
(2, 'How are you', 2, 2, '2020-05-19 13:40:43', 1),
(3, 'I wanted to see yuo todeay', 1, 1, '2020-05-20 19:47:27', 1),
(5, 'How are you doing sir', 1, 2, '2020-05-21 09:16:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `gander` text NOT NULL,
  `next_of_kin` varchar(50) DEFAULT NULL,
  `next_of_kin_contact` varchar(12) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `status1` int(1) DEFAULT NULL,
  `symptoms` varchar(255) DEFAULT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `addedby` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discharged` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_id` (`doc_id`),
  KEY `addedby` (`addedby`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `address`, `contact`, `weight`, `date_of_birth`, `gander`, `next_of_kin`, `next_of_kin_contact`, `doc_id`, `status`, `status1`, `symptoms`, `medication`, `addedby`, `date_added`, `discharged`) VALUES
(4, 'Kalenzi Fahad', 'Jinja', '07777777709', 78, '24/06/1998', 'M', 'Samuel Davis', '0778995566', 7, 1, 1, 'Wound, flue', '', 2, '2020-05-17 14:00:41', ''),
(5, 'Nambi Johnson', 'Banda', '0774590323', 80, '18/10/1989', 'F', 'Samuel Davis', '0778431009', 7, 0, 1, 'Cougg, Fever', 'Panadol, ARVs, Headex', 2, '2020-05-17 14:02:28', ''),
(6, 'Ashley Williams', 'Gayaza', '07777777777', 90, '16/09/2020', 'M', 'Sam Daniel', '0778995008', 6, 1, 1, 'death', NULL, 2, '2020-09-16 15:12:10', NULL),
(7, 'Smith Smith', 'Kabale', '07777777777', 59, '21/02/2017', 'M', 'Sam Daniel', '0778995017', 6, 0, 0, 'Hunger, Stress', 'Food', 2, '2020-09-23 18:10:46', '23/09/2020');

-- --------------------------------------------------------

--
-- Table structure for table `staffroles`
--

DROP TABLE IF EXISTS `staffroles`;
CREATE TABLE IF NOT EXISTS `staffroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `AddedBy` int(11) DEFAULT NULL,
  `Addedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffroles`
--

INSERT INTO `staffroles` (`id`, `name`, `description`, `AddedBy`, `Addedon`) VALUES
(1, 'Head of Department', 'Leading a Department', 2, '2020-09-24 12:39:49'),
(3, 'Supervisor', 'Inspecting work done', 2, '2020-09-24 12:47:12'),
(4, 'News Reporter', 'Making sure news reach staff members', 1, '2020-09-24 14:37:53'),
(5, 'Orientation', 'Showing new workers places', 2, '2020-09-24 14:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE IF NOT EXISTS `sys_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `addedby` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `role` (`role`),
  KEY `addedby` (`addedby`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `name`, `role`, `email`, `phone`, `address`, `username`, `password`, `pic`, `status`, `addedby`, `date_added`) VALUES
(1, 'Abaliwano Francis', 2, 'francis@gmail.com', '0778968574', 'kyanja, kampala', 'francis', 'francis', '_20170519_184430.JPG', 1, 2, '2020-05-13 20:25:50'),
(2, 'Gabula Pius', 3, 'pius@gmail.com', '0778968090', 'Gayaza', 'pius', 'pius', '234.jpg', 1, 2, '2020-05-16 07:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

DROP TABLE IF EXISTS `t_stock`;
CREATE TABLE IF NOT EXISTS `t_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_contact` varchar(12) NOT NULL,
  `exp_date` varchar(20) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`id`, `name`, `quantity`, `unit_price`, `total_price`, `supplier_name`, `supplier_contact`, `exp_date`, `unit_id`, `user_id`, `date_added`) VALUES
(3, 'Gloves', 4, 40000, 160000, 'Quram Plus', '256778968511', '2029-12-08', 1, 2, '2020-05-21 11:16:47'),
(4, 'Panadol', 1, 20000, 20000, 'Menthyl ', '256778968500', '2023-12-06', 1, 2, '2020-05-21 12:57:22'),
(5, 'Coatem', 100, 2500, 250000, 'Menthyl', '256778968500', '2023-02-12', 3, 2, '2020-05-21 13:00:02'),
(6, 'Cotton', 3, 10000, 30000, 'Quram', '256778968511', '2024-11-24', 1, 2, '2020-05-21 13:02:48'),
(7, 'Syring', 100, 1500, 150000, 'Menthyl', '256778968500', '2028-07-25', 4, 2, '2020-05-21 13:08:49'),
(8, 'Headex', 20, 3500, 70000, 'Cyprus', '256700968574', '2022-09-19', 3, 2, '2020-05-21 13:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `symbol` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `symol` (`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `symbol`, `user_id`, `date_time`) VALUES
(1, 'Boxes', 'boxes', 1, '2020-05-21 10:06:43'),
(2, 'Tablets', 'tabs', 1, '2020-05-21 10:09:34'),
(3, 'Packets', 'pkts', 1, '2020-05-21 10:09:57'),
(4, 'Pieces', 'pieces', 1, '2020-05-21 13:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` text,
  `address` varchar(100) DEFAULT NULL,
  `dept` int(11) DEFAULT NULL,
  `salary` int(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `addedby` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`w_id`),
  KEY `addedby` (`addedby`),
  KEY `dept` (`dept`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`w_id`, `name`, `email`, `phone`, `address`, `dept`, `salary`, `status`, `pic`, `addedby`, `date_added`) VALUES
(3, 'Kalenzi Fahad', 'fahad@gmail.com', '0774567584', 'Luwero', 8, 788766, 0, 'ken.jpg', 15, '2020-09-19 05:33:49'),
(4, 'Asinde Jenet', 'asio@gmail.com', '0774563456', 'Banda', 8, 346673, 1, '1.jpg', 15, '2020-09-19 06:13:55'),
(5, 'Andy Synoid', 'synoid@gmail.com', '0774567584', 'Jinja', 8, 776665, 1, '98f72f43-1c69-4a5a-93e8-afee47f76461.jpg', 15, '2020-09-24 09:17:31'),
(6, 'Ezekiel Ben', 'ben@gmail.com', '0774563456', 'Luwero', 8, 346673, 0, '262671e7-cb17-4ee1-8f5a-26f766c4a855.jpg', 15, '2020-09-24 12:37:57'),
(7, 'Ande Johnson', 'ande@gmail.com', '0774567584', 'Banda', 8, 388945, 1, 'c09d71f9-fb9d-4fe3-aa4c-9e6b2b1cd549.jpg', 15, '2020-09-24 12:40:50'),
(8, 'Ashley Williams', 'williams@gmail.com', '0774567584', 'Kyanja', 8, 399000, 1, 'a93e4d16-d77c-4db8-87e5-39fd24bd7704.jpg', 15, '2020-09-24 13:20:19'),
(9, 'Daniel Johnson', 'dan@gmail.com', '0774567584', 'Kyanja', 11, 575777, 1, '8e5a959f-4e0a-48db-ab65-33bfa63dd61d.jpg', 2, '2020-09-24 13:27:10'),
(10, 'Dickson Mike', 'mike@gmail.com', '0774567584', 'Gayaza', 12, 788766, 1, '9e7399ba-e434-422c-a7b9-53411c64ef03.jpg', 2, '2020-09-24 13:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `wstaffroles`
--

DROP TABLE IF EXISTS `wstaffroles`;
CREATE TABLE IF NOT EXISTS `wstaffroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_id` int(11) DEFAULT NULL,
  `RoleID` int(11) DEFAULT NULL,
  `deptID` int(11) DEFAULT NULL,
  `AddedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wstaffroles`
--

INSERT INTO `wstaffroles` (`id`, `w_id`, `RoleID`, `deptID`, `AddedOn`) VALUES
(1, 5, 1, NULL, '2020-09-24 15:34:11'),
(2, 4, 3, NULL, '2020-09-24 15:35:04');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `foreign key to doc_category table` FOREIGN KEY (`category_id`) REFERENCES `doc_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc_category`
--
ALTER TABLE `doc_category`
  ADD CONSTRAINT `doc_category_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `sys_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD CONSTRAINT `foreign key to department table` FOREIGN KEY (`role`) REFERENCES `departments` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
