-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2013 at 06:18 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skedulus`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_clients_list`
--

CREATE TABLE IF NOT EXISTS `business_clients_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_id` (`users_id`),
  KEY `FK_user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `business_clients_list`
--

INSERT INTO `business_clients_list` (`id`, `users_id`, `user_business_details_id`) VALUES
(1, 193, 38),
(18, 136, 0),
(56, 224, 30),
(11, 136, 30),
(58, 224, 33),
(19, 136, 0),
(20, 136, 0),
(21, 136, 0),
(22, 136, 0),
(23, 136, 0),
(24, 136, 0),
(52, 0, 30),
(70, 225, 30),
(43, 136, 34),
(61, 225, 33),
(53, 0, 30),
(71, 136, 47),
(54, 223, 30),
(49, 136, 39),
(55, 223, 33),
(68, 225, 47);

-- --------------------------------------------------------

--
-- Table structure for table `business_employees`
--

CREATE TABLE IF NOT EXISTS `business_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `employee_type` enum('supervisor','employee') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `business_employees`
--

INSERT INTO `business_employees` (`id`, `user_business_details_id`, `users_id`, `employee_type`) VALUES
(22, 30, 130, 'employee'),
(23, 30, 131, 'employee'),
(24, 31, 148, 'employee'),
(25, 31, 149, 'employee'),
(26, 31, 150, 'employee'),
(27, 33, 151, 'employee'),
(28, 33, 152, 'employee'),
(29, 34, 154, 'employee'),
(30, 35, 156, 'employee'),
(31, 36, 158, 'employee'),
(32, 37, 160, 'employee'),
(33, 38, 161, 'employee'),
(34, 38, 162, 'employee'),
(35, 38, 163, 'employee'),
(36, 38, 164, 'employee'),
(37, 38, 165, 'employee'),
(38, 38, 166, 'employee'),
(39, 38, 167, 'employee'),
(40, 38, 168, 'employee'),
(41, 38, 169, 'employee'),
(42, 38, 170, 'employee'),
(43, 38, 171, 'employee'),
(44, 38, 172, 'employee'),
(45, 38, 173, 'employee'),
(46, 38, 174, 'employee'),
(47, 38, 175, 'employee'),
(48, 38, 176, 'employee'),
(49, 38, 177, 'employee'),
(50, 38, 178, 'employee'),
(51, 38, 179, 'employee'),
(52, 38, 180, 'employee'),
(53, 38, 181, 'employee'),
(54, 38, 182, 'employee'),
(55, 38, 183, 'employee'),
(56, 38, 184, 'employee'),
(57, 38, 185, 'employee'),
(58, 38, 186, 'employee'),
(59, 38, 187, 'employee'),
(60, 38, 188, 'employee'),
(61, 38, 189, 'employee'),
(62, 38, 190, 'employee'),
(63, 38, 191, 'employee'),
(64, 38, 192, 'employee'),
(65, 38, 194, 'employee'),
(66, 40, 197, 'employee'),
(67, 40, 198, 'employee'),
(68, 40, 199, 'employee'),
(69, 40, 200, 'employee'),
(70, 40, 201, 'employee'),
(71, 40, 202, 'employee'),
(72, 40, 203, 'employee'),
(73, 40, 204, 'employee'),
(74, 40, 205, 'employee'),
(75, 38, 206, 'employee'),
(76, 43, 212, 'employee'),
(77, 43, 213, 'employee'),
(78, 44, 214, 'employee'),
(79, 47, 215, 'employee'),
(80, 47, 226, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `business_employees_availlability`
--

CREATE TABLE IF NOT EXISTS `business_employees_availlability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_employees_id` int(11) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `saturday` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_employees_id` (`business_employees_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_notification_settings`
--

CREATE TABLE IF NOT EXISTS `business_notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `appointment_reminders` enum('on','off') CHARACTER SET latin1 NOT NULL,
  `remind_before` time NOT NULL,
  `cancel_reschedule_before` time NOT NULL,
  `book_before` time NOT NULL,
  `send_email` enum('on','off') CHARACTER SET latin1 NOT NULL,
  `send_message` enum('on','off') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `business_notification_settings`
--

INSERT INTO `business_notification_settings` (`id`, `user_business_details_id`, `appointment_reminders`, `remind_before`, `cancel_reschedule_before`, `book_before`, `send_email`, `send_message`) VALUES
(1, 31, 'on', '00:00:00', '00:00:00', '00:00:00', 'on', 'off'),
(2, 34, 'off', '01:45:00', '00:00:00', '00:00:00', 'on', 'off'),
(3, 38, 'off', '09:15:00', '10:00:00', '11:30:00', 'off', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `business_offers`
--

CREATE TABLE IF NOT EXISTS `business_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `services` varchar(50) CHARACTER SET latin1 NOT NULL,
  `title` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` varchar(100) NOT NULL,
  `discount` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` enum('combo','individual') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `calendar_id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_name` varchar(20) DEFAULT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY (`calendar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendar_id`, `calendar_name`, `user_business_details_id`) VALUES
(1, 'Work', 0),
(2, 'Personal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Hair style'),
(2, 'Boutique');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_class_booking`
--

CREATE TABLE IF NOT EXISTS `client_class_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `user_business_posted_class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_posted_class_id` (`user_business_posted_class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `client_class_booking`
--

INSERT INTO `client_class_booking` (`id`, `users_id`, `user_business_posted_class_id`, `date`) VALUES
(31, 136, 75, '2013-07-30'),
(30, 136, 78, '2013-07-30'),
(29, 136, 79, '2013-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `client_service_appointments`
--

CREATE TABLE IF NOT EXISTS `client_service_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `services_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `employee_id` int(11) NOT NULL,
  `note` text CHARACTER SET latin1 NOT NULL,
  `status` enum('booked','cancelled') CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `users_id`, `start_time`, `end_time`, `services_id`, `employee_id`, `note`, `status`) VALUES
(1, 136, '2013-06-29 14:30:00', '2013-06-29 19:30:00', 'null', 148, 'undefined', 'booked'),
(2, 136, '2013-06-25 06:00:00', '2013-06-25 07:30:00', '75, 76', 0, 'Demo', 'booked'),
(3, 0, '2013-06-26 03:30:00', '2013-06-26 03:45:00', '78', 0, 'No Title', 'booked'),
(4, 0, '2013-06-25 00:45:00', '2013-06-25 01:15:00', '78', 0, 'No Title', 'booked'),
(5, 0, '2013-06-24 02:15:00', '2013-06-24 02:30:00', '', 0, 'No Title', 'booked'),
(6, 136, '2013-06-25 13:00:00', '2013-06-25 14:30:00', '75, 76', 0, 'Demo', 'booked'),
(7, 136, '2013-06-24 09:45:00', '2013-06-24 11:15:00', '75, 76', 0, '55858', 'booked'),
(8, 136, '2013-06-26 10:45:00', '2013-06-26 12:15:00', '75, 76', 0, 'No Title', 'booked'),
(14, 0, '2013-06-26 02:45:00', '2013-06-26 03:00:00', '78', 0, 'Demo', 'booked'),
(12, 0, '2013-06-25 02:15:00', '2013-06-25 02:30:00', '78', 0, 'No Title', 'booked'),
(13, 0, '2013-06-25 00:45:00', '2013-06-25 01:00:00', '78', 0, 'No Title', 'booked'),
(15, 0, '2013-06-26 00:45:00', '2013-06-26 01:00:00', '78', 0, 'No Title', 'booked'),
(16, 0, '2013-06-26 01:15:00', '2013-06-26 01:30:00', '78', 0, 'Demo', 'booked'),
(17, 0, '2013-06-27 01:15:00', '2013-06-27 01:30:00', '78', 0, 'No Title', 'booked'),
(18, 0, '2013-06-26 00:45:00', '2013-06-26 01:00:00', '78', 0, 'No Title', 'booked'),
(19, 0, '2013-06-25 02:15:00', '2013-06-25 02:30:00', '78', 0, 'No Title', 'booked'),
(20, 0, '2013-06-25 02:00:00', '2013-06-25 02:15:00', '78', 0, 'No Title', 'booked'),
(21, 0, '2013-06-25 02:30:00', '2013-06-25 02:45:00', '78', 0, 'No Title', 'booked'),
(22, 0, '2013-06-27 02:15:00', '2013-06-27 02:30:00', '78', 0, 'No Title', 'booked'),
(23, 0, '2013-06-26 01:15:00', '2013-06-26 01:30:00', 'undefined', 0, 'No Title', 'booked'),
(24, 0, '2013-06-25 02:30:00', '2013-06-25 02:45:00', '78', 0, 'Demo', 'booked'),
(25, 0, '2013-06-25 04:15:00', '2013-06-25 04:30:00', 'null', 0, 'undefined', 'booked'),
(26, 0, '2013-06-27 04:15:00', '2013-06-27 04:30:00', 'null', 0, 'undefined', 'booked'),
(27, 0, '2013-06-25 05:30:00', '2013-06-25 05:45:00', 'null', 0, 'undefined', 'booked'),
(28, 0, '2013-06-24 07:30:00', '2013-06-24 07:45:00', 'null', 0, 'undefined', 'booked'),
(29, 0, '2013-06-25 01:30:00', '2013-06-25 01:45:00', 'null', 0, 'undefined', 'booked'),
(30, 0, '2013-06-28 03:00:00', '2013-06-28 03:15:00', 'null', 0, 'undefined', 'booked'),
(31, 0, '2013-06-26 01:30:00', '2013-06-26 01:45:00', 'null', 0, 'undefined', 'booked'),
(32, 0, '2013-06-26 01:15:00', '2013-06-26 01:30:00', '78', 0, 'undefined', 'booked'),
(33, 0, '2013-06-26 02:00:00', '2013-06-26 02:15:00', '78', 0, 'undefined', 'booked'),
(34, 0, '2013-06-26 02:30:00', '2013-06-26 02:45:00', 'null', 0, 'undefined', 'booked'),
(35, 0, '2013-06-25 02:15:00', '2013-06-25 02:30:00', 'null', 0, 'undefined', 'booked'),
(38, 136, '2013-07-07 07:45:00', '2013-07-07 08:15:00', '76', 148, 'ddasdasdasdasd', 'booked'),
(37, 136, '2013-07-07 11:00:00', '2013-07-07 11:30:00', '76', 148, 'service2', 'booked'),
(39, 136, '2013-07-08 08:30:00', '2013-07-08 09:03:00', '74', 130, 'yeahhhh', 'booked'),
(42, 69, '2013-07-12 03:00:00', '2013-07-12 03:23:00', '83', 0, 'bbb', 'booked'),
(43, 69, '2013-07-12 07:00:00', '2013-07-12 00:00:00', '83', 190, '', 'booked'),
(45, 136, '2013-07-15 10:00:00', '2013-07-15 22:23:00', '71', 130, 'appoinemntSwathi', 'booked'),
(46, 136, '2013-07-12 09:00:00', '2013-07-12 09:23:00', '83', 206, 'appoinmentSwa', 'booked'),
(47, 136, '2013-07-12 10:45:00', '2013-07-12 00:00:00', '79', 0, 'swa', 'booked'),
(62, 136, '2013-07-16 03:00:00', '2013-07-16 00:00:00', '73', 130, '', 'booked'),
(49, 136, '2013-07-12 10:45:00', '2013-07-12 00:00:00', '79', 0, '', 'booked'),
(50, 136, '2013-07-12 10:45:00', '2013-07-12 00:00:00', '79', 0, '', 'booked'),
(51, 136, '2013-07-11 01:30:00', '2013-07-11 02:30:00', '79', 0, 'ssss', 'booked'),
(52, 136, '2013-07-13 01:45:00', '2013-07-13 02:20:00', '83, 84', 0, 'sswwaa', 'booked'),
(53, 136, '2013-07-13 01:45:00', '2013-07-13 02:20:00', '83, 84', 0, 'sswwaa', 'booked'),
(54, 136, '2013-07-13 01:45:00', '2013-07-13 02:20:00', '83, 84', 0, 'sswwaa', 'booked'),
(55, 136, '2013-07-13 03:30:00', '2013-07-13 03:53:00', '83', 0, 'swaaa', 'booked'),
(56, 136, '2013-07-12 00:30:00', '2013-07-12 01:16:00', '84, 86', 0, 'aaaa', 'booked'),
(57, 136, '2013-07-12 00:30:00', '2013-07-12 01:16:00', '84, 86', 0, 'ssss', 'booked'),
(58, 136, '2013-07-12 17:30:00', '2013-07-12 18:50:00', '85', 0, 'xxxx', 'booked'),
(59, 136, '2013-07-13 13:15:00', '2013-07-13 14:35:00', '85', 0, 'xxxxdsdsadsa', 'booked'),
(60, 136, '2013-07-12 01:30:00', '2013-07-12 02:50:00', '85', 0, 'xxxx', 'booked'),
(61, 136, '2013-07-15 01:30:00', '2013-07-15 14:49:00', '71, 73', 0, 'No Title', 'booked'),
(63, 136, '2013-07-17 03:15:00', '2013-07-17 00:00:00', '73', 130, '', 'booked'),
(64, 136, '2013-07-17 03:15:00', '2013-07-17 00:00:00', '73', 130, '', 'booked'),
(65, 136, '2013-07-20 08:30:00', '2013-07-20 09:50:00', '85', 0, 'yes', 'booked'),
(66, 136, '2013-07-24 03:15:00', '2013-07-24 00:00:00', '71', 130, '', 'booked'),
(67, 136, '2013-07-20 03:00:00', '2013-07-20 00:00:00', '73', 130, '', 'booked'),
(68, 136, '2013-07-20 03:00:00', '2013-07-20 00:00:00', '73', 130, '', 'booked'),
(72, 136, '2013-07-22 11:00:00', '2013-07-22 00:00:00', '73', 130, 'ddfdsfdsf', 'booked'),
(73, 136, '2013-07-22 08:00:00', '2013-07-22 09:20:00', '71', 130, '', 'booked'),
(85, 136, '2013-07-21 06:00:00', '2013-07-21 07:20:00', '71', 0, 'No Title', 'booked'),
(84, 136, '2013-07-21 03:00:00', '2013-07-21 04:20:00', '71', 0, 'No Title', 'booked'),
(77, 136, '2013-07-21 09:00:00', '2013-07-21 09:15:00', '71', 0, 'No Title', 'booked'),
(78, 136, '2013-07-22 05:00:00', '2013-07-22 05:15:00', '71', 0, 'No Title', 'booked'),
(79, 136, '2013-07-23 05:00:00', '2013-07-23 05:15:00', '71, 73, 74', 0, 'No Title', 'booked'),
(80, 0, '2013-07-28 08:00:00', '2013-07-28 09:20:00', '71', 130, 'vdvdvvvccxv', 'booked'),
(81, 136, '2013-07-23 15:00:00', '2013-07-23 15:15:00', '71, 73', 0, 'No Title', 'booked'),
(82, 136, '2013-07-22 00:30:00', '2013-07-22 00:45:00', '71, 73, 74', 0, 'No Title', 'booked'),
(83, 136, '2013-07-22 01:15:00', '2013-07-22 02:25:00', '71', 0, 'No Title', 'booked'),
(86, 136, '2013-07-21 05:00:00', '2013-07-21 06:29:00', '73, 74', 0, 'No Title', 'booked'),
(87, 0, '2013-07-25 03:15:00', '2013-07-25 00:00:00', '73', 130, '', 'booked'),
(88, 0, '2013-07-25 03:15:00', '2013-07-25 00:00:00', '73', 130, '', 'booked'),
(89, 0, '2013-07-25 03:15:00', '2013-07-25 00:00:00', '73', 130, '', 'booked'),
(90, 0, '2013-07-26 04:45:00', '2013-07-26 05:00:00', '', 0, 'No Title', 'booked'),
(91, 136, '2013-07-23 20:00:00', '2013-07-23 22:16:00', '71, 73', 0, 'No Title', 'booked'),
(92, 136, '2013-07-21 13:00:00', '2013-07-21 13:56:00', '73', 0, 'No Title', 'booked'),
(93, 0, '2013-07-21 18:00:00', '2013-07-21 18:33:00', '74', 0, 'No Title', 'booked'),
(94, 0, '2013-07-25 07:30:00', '2013-07-25 08:26:00', '73', 0, 'No Title', 'booked'),
(95, 136, '2013-07-22 07:30:00', '2013-07-22 08:26:00', '73', 0, 'No Title', 'booked'),
(96, 136, '2013-07-23 09:45:00', '2013-07-23 10:41:00', '73', 0, 'No Title', 'booked'),
(97, 136, '2013-07-25 04:15:00', '2013-07-25 05:11:00', '73', 0, 'No Title', 'booked'),
(98, 0, '2013-07-23 13:00:00', '2013-07-23 13:33:00', '74', 0, 'No Title', 'booked'),
(99, 0, '2013-07-25 05:45:00', '2013-07-25 06:18:00', '74', 0, 'No Title', 'booked'),
(100, 136, '2013-07-23 02:30:00', '2013-07-23 03:26:00', '73', 0, 'No Title', 'booked'),
(101, 0, '2013-07-25 00:45:00', '2013-07-25 01:18:00', '74', 0, 'No Title', 'booked'),
(102, 129, '2013-07-24 22:00:00', '2013-07-24 22:56:00', '73', 0, 'No Title', 'booked'),
(103, 136, '2013-07-21 05:00:00', '2013-07-21 05:15:00', '', 0, 'No Title', 'booked'),
(104, 136, '2013-07-27 17:00:00', '2013-07-27 17:15:00', '', 0, 'No Title', 'booked'),
(105, 136, '2013-07-27 10:00:00', '2013-07-27 12:16:00', '71, 73', 0, 'No Title', 'booked'),
(106, 136, '2013-07-26 06:00:00', '2013-07-26 08:16:00', '71, 73', 0, 'No Title', 'booked'),
(107, 136, '2013-07-27 06:00:00', '2013-07-27 07:20:00', '71', 0, 'No Title', 'booked'),
(108, 136, '2013-07-27 04:00:00', '2013-07-27 06:16:00', '71, 73', 0, 'No Title', 'booked'),
(109, 136, '2013-07-24 07:15:00', '2013-07-24 08:35:00', '71', 0, 'No Title', 'booked'),
(110, 136, '2013-07-23 17:00:00', '2013-07-23 19:16:00', '71, 73', 0, 'No Title', 'booked'),
(111, 136, '2013-07-24 16:00:00', '2013-07-24 18:16:00', '71, 73', 0, 'No Title', 'booked'),
(112, 136, '2013-07-26 02:00:00', '2013-07-26 02:33:00', '74', 0, 'No Title', 'booked'),
(113, 136, '2013-07-25 14:00:00', '2013-07-25 15:20:00', '71', 0, 'No Title', 'booked'),
(114, 225, '2013-07-31 03:15:00', '2013-07-31 00:00:00', '71', 130, '', 'booked'),
(115, 136, '2013-07-22 03:30:00', '2013-07-22 03:45:00', '', 0, 'No Title', 'booked'),
(116, 136, '2013-07-24 01:00:00', '2013-07-24 01:15:00', '', 0, 'No Title', 'booked'),
(117, 136, '2013-07-21 01:00:00', '2013-07-21 03:16:00', '71, 73', 0, 'No Title', 'booked'),
(118, 225, '2013-07-27 08:00:00', '2013-07-27 10:16:00', '71, 73', 0, 'No Title', 'booked'),
(119, 136, '2013-07-28 02:00:00', '2013-07-28 04:16:00', '71, 73', 0, 'No Title', 'booked'),
(120, 136, '2013-07-29 11:00:00', '2013-07-29 12:20:00', '71', 0, 'No Title', 'booked'),
(121, 136, '2013-07-29 01:07:00', '2013-07-29 03:07:00', '71, 73', 0, 'notesss', 'booked'),
(122, 136, '2013-07-30 00:07:00', '2013-07-30 01:07:00', '73', 0, 'dfcsdf', 'booked'),
(124, 136, '2013-08-06 02:08:00', '2013-08-06 03:08:00', '71', 0, '', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_details`
--

CREATE TABLE IF NOT EXISTS `credit_card_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `card_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `credit_card_number` int(20) NOT NULL,
  `verification_number` int(20) NOT NULL,
  `expiration_month` varchar(50) CHARACTER SET latin1 NOT NULL,
  `expiration_year` smallint(5) NOT NULL,
  `address` varchar(20) CHARACTER SET latin1 NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_availability`
--

CREATE TABLE IF NOT EXISTS `employee_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `monday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tuesday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `wednesday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `thursday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `friday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `saturday` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sunday` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_availability_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_lunchtime`
--

CREATE TABLE IF NOT EXISTS `employee_lunchtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_availability_id` int(11) NOT NULL,
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_availability_id` (`employee_availability_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_services`
--

CREATE TABLE IF NOT EXISTS `employee_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_id` (`business_id`),
  KEY `service_id` (`service_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`id`, `business_id`, `service_id`, `users_id`) VALUES
(30, 33, 78, 152),
(27, 31, 75, 150),
(29, 33, 4, 151),
(26, 31, 76, 148),
(165, 30, 71, 130),
(35, 30, 73, 130),
(36, 30, 74, 130),
(37, 30, 74, 131),
(159, 38, 86, 175),
(108, 38, 84, 0),
(70, 38, 84, 190),
(156, 38, 83, 206),
(69, 38, 84, 185),
(68, 38, 84, 184),
(155, 38, 83, 190),
(154, 38, 83, 187),
(67, 38, 84, 176),
(153, 38, 83, 186),
(152, 38, 83, 180),
(158, 38, 83, 175),
(65, 38, 84, 174),
(151, 38, 83, 179),
(107, 38, 84, 192),
(84, 40, 85, 203),
(145, 38, 86, 177),
(150, 38, 83, 178),
(144, 38, 86, 176),
(138, 38, 84, 206),
(157, 38, 84, 175),
(146, 38, 86, 179),
(147, 38, 84, 186),
(149, 38, 83, 177),
(160, 43, 88, 0),
(161, 43, 88, 213),
(162, 44, 8, 214),
(164, 47, 9, 215),
(166, 47, 9, 226);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(20) DEFAULT NULL,
  `event_description` varchar(20) DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `all_day` smallint(6) DEFAULT '0',
  `repeat_mode` varchar(11) DEFAULT NULL,
  `repeat_count` int(11) DEFAULT NULL,
  `day_only_weekdays` int(11) DEFAULT NULL,
  `week_days` varchar(20) DEFAULT NULL COMMENT 'comma number of days',
  `month_weeknumber` int(11) DEFAULT NULL,
  `month_weekday` int(11) DEFAULT NULL,
  `month_repeatdate` datetime DEFAULT NULL,
  `event_type` varchar(20) DEFAULT NULL,
  `rel_event_id` int(11) DEFAULT NULL,
  `repeat_end_date` datetime DEFAULT NULL,
  `event_delete_ind` int(11) DEFAULT NULL,
  `recur_sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_ibfk_1` (`calendar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `calendar_id`, `start_time`, `end_time`, `all_day`, `repeat_mode`, `repeat_count`, `day_only_weekdays`, `week_days`, `month_weeknumber`, `month_weekday`, `month_repeatdate`, `event_type`, `rel_event_id`, `repeat_end_date`, `event_delete_ind`, `recur_sequence`) VALUES
(7, 'Hey', 'undefined', 73, '2013-06-02 00:15:00', '2013-06-02 03:15:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'gfgdfgdgd', 'gfgdfgdgd', 1, '2013-05-16 09:15:00', '2013-05-16 09:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'event3', 'event3', 1, '2013-06-05 00:15:00', '2013-06-05 01:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'asasasa', '', 74, '2013-06-24 00:45:00', '2013-06-24 02:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'asasasa', '', 74, '2013-06-27 12:30:00', '2013-06-27 14:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'event 1st asppointme', 'event 1st asppointme', 1, '2013-06-24 00:45:00', '2013-06-24 02:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'event1', 'undefined', 73, '2013-06-06 00:00:00', '2013-06-06 01:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'heyupdatekkkkkkk', 'undefined', 1, '2013-05-25 01:45:00', '2013-05-25 00:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'hjgjhjgjghjgh', 'hjgjhjgjghjgh', 2, '2013-06-21 01:15:00', '2013-06-21 03:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'ddddddddddttt', 'undefined', 74, '2013-05-31 00:45:00', '2013-05-31 01:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'june1', 'undefined', 73, '2013-06-01 05:30:00', '2013-06-01 05:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'No Title', 'No Title', 2, '2013-05-24 00:45:00', '2013-05-24 01:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'No Title', 'No Title', 1, '2013-05-24 00:15:00', '2013-05-24 00:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'appointment1', 'appointment1', 80, '2013-05-29 01:30:00', '2013-05-29 01:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'swaaaaa', 'swaaaaa', 79, '2013-05-30 10:00:00', '2013-05-30 10:15:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'service1', 'service1', 71, '2013-05-31 01:45:00', '2013-05-31 02:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_businesses`
--

CREATE TABLE IF NOT EXISTS `favourite_businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `photo_likes_comments`
--

CREATE TABLE IF NOT EXISTS `photo_likes_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_photogallery_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `likes` int(50) NOT NULL,
  `comments` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_photogallery_id` (`user_business_photogallery_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posted_class_series`
--

CREATE TABLE IF NOT EXISTS `posted_class_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_classes_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `posted_class_series`
--

INSERT INTO `posted_class_series` (`id`, `user_business_classes_id`, `date_added`) VALUES
(3, 9, '2013-08-06 15:08:42'),
(4, 9, '2013-08-06 15:08:24'),
(5, 9, '2013-08-06 15:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(250) CHARACTER SET latin1 NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` enum('active','deactive') CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `title`, `description`, `image`, `status`, `price`) VALUES
(1, 'Basic', '', '', 'active', 15),
(2, 'Silver', '', '', 'active', 25),
(3, 'Gold', '', '', 'active', 40),
(4, 'Diamond', '', '', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_features`
--

CREATE TABLE IF NOT EXISTS `subscription_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) NOT NULL,
  `employees` varchar(50) NOT NULL,
  `businesses_offers` varchar(50) NOT NULL,
  `pictures` varchar(50) NOT NULL,
  `reports` enum('basic','enhanced') NOT NULL,
  `promotion_notifications` varchar(50) NOT NULL,
  `businesses` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` enum('client','manager','employee') NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 NOT NULL,
  `activationkey` varchar(50) NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_id` (`user_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=228 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `gender`, `date_of_birth`, `about_me`, `image`, `status`, `activationkey`, `createdOn`) VALUES
(69, 'manager', 'aa@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 'aa', 'aa', 0, 'male', '1971-09-14', '', '', 'active', '68bdd623694ef981495ed163a72e70e4', '0000-00-00 00:00:00'),
(113, 'employee', 'asdas@gmail.com', '', 'sdsad', 'sdas', 0, 'male', '0000-00-00', '', '', 'inactive', '7d3e8009292c14c348c4beefb06794f8', '0000-00-00 00:00:00'),
(114, 'employee', 'sdfds@gmail.com', '', 'sssstupdateednow', 's', 0, 'male', '0000-00-00', '', '', 'inactive', '6596724e4bb415d5d95e379e424f6946', '0000-00-00 00:00:00'),
(115, 'employee', 'aa@gmail.com', '', 'aa', 'aa', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '716c34457c2bb8e197546904b7ef2b0e', '0000-00-00 00:00:00'),
(116, 'employee', 'staff@gmail.com', '', 'staff1 updated', 'sadsa', 4242423, 'male', '0000-00-00', '', '', 'inactive', 'ed2a636782ca2262cec78a5c4593bd39', '0000-00-00 00:00:00'),
(117, 'employee', '', '', '', '', 0, 'male', '0000-00-00', '', '', 'inactive', 'b4ad1bf0e411cb7166d8304f6eb1e99f', '0000-00-00 00:00:00'),
(119, 'employee', 'cc@gmail.com', '', 'timie', 'timie', 2147483647, 'male', '0000-00-00', '', '', 'inactive', 'f38269dbb83ae54220cf6df7192ec8f9', '0000-00-00 00:00:00'),
(121, 'employee', 'sad@gmail.com', '', 'satr', 'day', 435543, 'male', '0000-00-00', '', '', 'inactive', '73128657a6c089a31c56e4fa79bad4d3', '0000-00-00 00:00:00'),
(122, 'employee', 'sdfsd@gmail.como', '', 'fsdfsd', 'dsfsf', 45354354, 'male', '0000-00-00', '', '', 'inactive', 'cc062fbee6546d12b748c6cb3faddbd6', '0000-00-00 00:00:00'),
(123, 'employee', 'dfds@gmail.com', '', 'dfsf', 'sdfsdf', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '4c23d444fd210c98a0645167eb1f04cd', '0000-00-00 00:00:00'),
(126, 'employee', 'swathinreddy@yahoo.co.insds', '', 'fsfsdfsdf--- enjoy', 'dsfsdfd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '4ea333f2ecb2357c5274bfc050e04378', '0000-00-00 00:00:00'),
(127, 'employee', 'gfdgdgdg', '', 'ggdfgdfgdfg', '', 0, 'male', '0000-00-00', '', '', 'inactive', '7938369d98f30b88f80d15f617e29f11', '0000-00-00 00:00:00'),
(128, 'employee', 'aa@gmail.comjhkkhjk', '', 'hfgh', 'ghfgh', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '96245bad571d18ec7b6d3fac4cff15d6', '0000-00-00 00:00:00'),
(129, 'manager', 'ff@gmail.com', '21b8adf19ee3ef88e8d01eca8f74de64', 'ffffffffffff', 'ffffffff', 0, 'female', '1970-01-01', '', '', 'active', '533d7d9a5341068c4729f0312016c176', '0000-00-00 00:00:00'),
(130, 'employee', 'aa@gmail.comddasdad', '', 'fghfghfghqqqqqq', 'hgfhfghdfsfs', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'c35338527208730505f1e5e22c83165b', '0000-00-00 00:00:00'),
(131, 'employee', 'aa@gmail.csadsadasdads', '', 'sdsadsa', 'sdasdasd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '939a863073db839b19e2066677457ee8', '0000-00-00 00:00:00'),
(134, 'client', 'qqqqqqq@gmial.omc', '', 'qqqqqqqq', 'qqqq', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(136, 'client', 'client@gmail.com', 'fac04ca68a48af91f0290001604a2463', 'client', 'C', 2147483647, 'female', '1977-03-03', 'abuttsdd ''s  fdgdggdfg dfgdfg fdgdfg dfg this''s is  its''s''ssgfgfgdgs  dfgdfgg dfgdfg  fdgfdgdfg dfgdfgfdgdfgdfgdf dfgfdgdfgfdgdf gdddddddddddddd ddddddddddddd ddddddddd ddddddd    dddd', '', 'active', '', '0000-00-00 00:00:00'),
(137, 'manager', 'businessmen@gmail.com', 'e6072e821b6854ced4d8fd40319c4846', 'businessmen', 'businessmen', 0, 'male', '1980-01-18', '', '', 'inactive', '8f2e695699b44b8e86d3106f6fd276d3', '0000-00-00 00:00:00'),
(193, 'client', 'someone@gmail.com', '', 'client1342342424', 'client2', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(194, 'employee', 'july@gmail.com', '', '10thjjj juuu', 'julyy', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'dbda2663440b3ea5c6b6e23e93615a31', '0000-00-00 00:00:00'),
(139, 'client', 'client1@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'client1', 'client1', 0, 'male', '1979-02-18', '', '', 'active', '0', '0000-00-00 00:00:00'),
(140, 'client', 'client2@gmail.com', '2c66045d4e4a90814ce9280272e510ec', 'client2', 'client2', 0, 'female', '2064-02-03', '', '', 'active', '0', '2013-05-23 08:45:21'),
(141, 'employee', 'staffhfghfghgfhfg@gmail.com', '', 'staff1', 'staff2', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '939f03461700b15025bb308e78f24816', '0000-00-00 00:00:00'),
(142, 'employee', 'ddd@gmail.com', '', 'dddddddddd', 'ddd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '58b64851025f33df8b408fa5a69d114e', '0000-00-00 00:00:00'),
(143, 'employee', 'ddd@gmail.comfgdfgdfg', '', 'dddddddddd', 'ddd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', 'b3976bf5b826437b339f40a663e82e1f', '0000-00-00 00:00:00'),
(144, 'employee', 'ddd@gmail.comfgdfgdfg', '', 'dddddddddd', 'ddd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '6c4c4b95cb9e7f1e2e63a0f7bdc191d3', '0000-00-00 00:00:00'),
(145, 'employee', 'swathinreddy@yahoo.co.in', '', 'asdasd', 'sdasd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', 'd06d5f023562b40bd74450cd096289a5', '0000-00-00 00:00:00'),
(146, 'client', 'rakesh.chhugani@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Rakesh', 'Chhugani', 0, 'male', '1971-02-02', '', '', 'active', '0', '2013-06-06 06:16:13'),
(147, 'manager', 'rakesh.chhugani@eulogik.com', '62608e08adc29a8d6dbc9754e659f125', 'Rakesh', 'Chhugani', 0, 'male', '1988-10-13', '', '', 'active', '5e51e6f07ecf344037f108a2c887c5ca', '2013-06-07 05:56:58'),
(148, 'employee', 'staff1@gmail.com', '40a2bbbb5b438dad0a5012ef088f4aad', 'staff1', 'staff2', 2147483647, 'male', '0000-00-00', '', '', 'inactive', 'e0698b9d7669b2a09719c9bcceb27c3c', '0000-00-00 00:00:00'),
(149, 'employee', 'a@gmail.com', 'f06faa7a29e28738f4f6124da308d56a', 'Staff ', 'a', 1236456789, 'male', '0000-00-00', '', '', 'inactive', '13a92cbebb02cb2846297395492cfe47', '0000-00-00 00:00:00'),
(150, 'employee', 'b@gmail.com', '064220dfc3ef0760e8233a2a12f9e3c4', 'staff ', 'b', 123456789, 'male', '0000-00-00', '', '', 'inactive', '22c7da055a3aa6d8c38250de37b4256f', '0000-00-00 00:00:00'),
(151, 'employee', 'abc@gmail.com', '989511b37d825c72c313cdd651ca7681', 'Neeraj', 'Demo', 123456789, 'male', '0000-00-00', '', '', 'inactive', '0133302371c952e6f5e56e676eb82a10', '0000-00-00 00:00:00'),
(152, 'employee', 'abc123@gmail.com', 'cbea380bfb36e812f45cded93edc394c', 'Demo 2', 'User', 123456789, 'male', '0000-00-00', '', '', 'inactive', '6300faa6c48e2e421be8f21749f51356', '0000-00-00 00:00:00'),
(153, 'manager', 'garima@gmail.com', '2b882400855082a1b1a97cedf64cb413', 'garima', 'soni', 0, 'male', '0000-00-00', '', 'default.jpg', 'active', '82cfceac60de2c0fd15271f53afb6723', '2013-07-01 08:39:49'),
(154, 'employee', 'staff1234565@gmail.com', '1dacb368248b47d7d13cf98ebf7a3cea', 'staff1', 'affff', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '9557c036b7a0f9ca26ecbe0811990eba', '0000-00-00 00:00:00'),
(155, 'manager', 'palak@gmail.com', '462b8007ee5205bd85056a632b7fede8', 'palak', 'M', 0, 'male', '0000-00-00', '', '', 'active', 'fb1d94e2c50852805c08e5cb67ddab1e', '2013-07-02 13:44:46'),
(156, 'employee', 'aaaa!@gmail.com', 'b733f5d2617d5a8c4ef66ff1ca850838', 'staf1', 'aaaa', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'ce20f7a1fc027c30d1e20c7cc9e1ebc9', '0000-00-00 00:00:00'),
(157, 'manager', 'pankaj@gmail.com', '30cbb5b17f8849ed26d8b02c83302772', 'pankaj', 'P', 0, 'male', '0000-00-00', '', '', 'active', '43559750885789d03c5bf9aefffdfeda', '2013-07-02 13:52:28'),
(158, 'employee', 'stafffff@gmail.com', 'd77d0da89fab99bf19beb0084be4f45f', 'stafffdsfs', 'fsdf', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'bf7a842015f41a9a9598d8a7ff191c21', '0000-00-00 00:00:00'),
(159, 'manager', 'class@gmail.com', '8260ceb1773f39c110b74c08a1892253', 'class', 'c', 0, 'male', '0000-00-00', '', '', 'active', 'd8a5b61a2fe6ea8c42809a3402e70f3b', '2013-07-02 13:57:52'),
(160, 'employee', 'class_staff2@gmail.com', 'd5f48e26429715dbe1eca13628920ead', 'class staff1', 'class staff2', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '5b9e75d2811e9edc46f37f8f3264c541', '0000-00-00 00:00:00'),
(206, 'employee', 'last@gmail.com', '', 'fwww', 'lastnameee', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '9d66abaa780070934695411eb0110008', '0000-00-00 00:00:00'),
(175, 'employee', '2sdfdsfsd@gmail.com', '', 's uupppdated', '2222222', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'b9a4e5ddd35d5dccfb7388bdbba0e5e3', '0000-00-00 00:00:00'),
(176, 'employee', 'aaaaaaaaaa@gmail.com', '', 'aaaaaaaa', 'aaaaaaaaaaa', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '05bdc4e01578e7a71c4aa67ed311a486', '0000-00-00 00:00:00'),
(177, 'employee', 'bbbbbbbbbbbb@gmail.com', '', 'bbbbbbbbbbb', 'bbbbbbbbbb', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'f0d6116e019abdbaa1f863b73ce2aca4', '0000-00-00 00:00:00'),
(178, 'employee', 'bbbbbbbbbbbb@gmail.com', '', 'bbbbbbbbbbb', 'bbbbbbbbbb', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '94e83555793311e54a4d6b1fc0dc44b2', '0000-00-00 00:00:00'),
(179, 'employee', 'yyyyyyyyy@gmail.com', '', 'yyyyyyy', 'yyyy', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '398c40faa936fd750c4ba2205ae94dd4', '0000-00-00 00:00:00'),
(180, 'employee', 'ddddddddddddd@gmail.com', '', 'dddddd', 'dddddddddddd', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '9fdecab51bab823c5c5c938f12feaf5e', '0000-00-00 00:00:00'),
(181, 'employee', 'swathi@gmail.com', '', 'swathirred', 'reddy', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '171d206dc273b874421748253a24642f', '0000-00-00 00:00:00'),
(182, 'employee', 'fffffffffffffffffffffffff@gmail.com', '', 'ffffffff', 'fffffffff', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '03396f968394cbbbf9b5760ec6f92548', '0000-00-00 00:00:00'),
(184, 'employee', 'lllll@gmail.com', '0326c1eddd96c2e0dbbaad34a20849c1', 'llllllllllll', 'lllllllll', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '8f9361e9627b48e5e24e78463f2902c6', '0000-00-00 00:00:00'),
(185, 'employee', 'pppppppppp@gmail.conm', '35965ba1999deed184570d3611ac785a', 'papapapapap', 'ppppppppppp', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '5116eee41de6b5d9b5bb126f94af1a9b', '0000-00-00 00:00:00'),
(186, 'employee', 'eeee@gmail.com', '721cb5403fd291ab79a6198812ae5084', 'eulogik', 'eee', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '8ba62a5912e4a8e07c7c93856415fa27', '0000-00-00 00:00:00'),
(187, 'employee', 'euleeeeeeeeeeeogik@gmail.com', '8c6349f1f80ee7396970bdb6c6279f28', 'eeeeeee', 'eeeeeeeeeeeeeee', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'fcabe05cb71728463b9fc61fb532c886', '0000-00-00 00:00:00'),
(188, 'employee', 'ttttttttttt@gmail.com', '', 'ttttttttt', 'tttttttttttt', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '6a233152277696a5ea954dca6602b679', '0000-00-00 00:00:00'),
(189, 'employee', 'vddvv@gmail.com', '', 'vvvvwqqq', 'vvvvvvvvvvv', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'aaf54ce646d2786475ede8eb03c127fd', '0000-00-00 00:00:00'),
(190, 'employee', 'qqqqqqqqqqqqqqqqq@gmial.omc', '', 'aarrr', 'qqqqqqqqqqq', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '1102d4e44cfa7acb39098ea01f8379df', '0000-00-00 00:00:00'),
(192, 'employee', 'ddddddd@gmailo.com', '', 'dqdqrrrrrrr', 'QQ', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'fb895378b81f68f72109babb92f43f9d', '0000-00-00 00:00:00'),
(195, 'manager', 'garima.soni@gmail.com', '003b1930f338263e1c4fd8fca7342e8f', 'garima', 'soni', 0, 'male', '0000-00-00', '', '', 'active', 'acea17fbf13fcf047ec37055d117d819', '2013-07-10 12:20:18'),
(196, 'manager', 'palak.m@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'palak', 'M', 0, 'male', '0000-00-00', '', '', 'active', '2289587f8c010dcc8308b6dc1aeec296', '2013-07-10 12:36:43'),
(203, 'employee', 'dfgdfgdfgdfg@gmil.com', '', 'qrqrqrq', 'dgdfgdfg', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'e977e38404e5956eb024e461aba87c4f', '0000-00-00 00:00:00'),
(204, 'employee', 'gdfgdfgdfgdfgdfg@gmail.com', '', 'gdfgdgdfg', 'dfgdfgdfgdf', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'ee103941ab9b49d75bf7ba64b89b6378', '0000-00-00 00:00:00'),
(205, 'employee', 'dsfsdffdfsdsdfsd@gmail.com', '', 'sdfdsfsdf', 'sdfsdfsdf', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '57e9c1505cdc78b5c59e95469a9d08d9', '0000-00-00 00:00:00'),
(207, 'manager', 'pank@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'pank', 'p', 0, 'male', '0000-00-00', '', '', 'active', 'de1327df241895982162cc4867156373', '2013-07-11 10:42:57'),
(208, 'client', 'swathinreddy@yahoo.coin', '808cc384945f0fae637478615cba529b', 'Swathi', 'Reddy', 0, 'female', '1988-02-22', '', '', 'active', '0', '2013-07-15 06:50:41'),
(210, 'manager', 'class.book@gmail.com', '0e96621d282cd9581dfbf17a879a7d77', 'class', 'book', 0, 'male', '0000-00-00', '', '', 'active', '8aebf419167546c486531e748c6f4d58', '2013-07-15 07:37:21'),
(211, 'manager', 'services@gmail.com', '10cd395cf71c18328c863c08e78f3fd0', 'services', 'servicess', 0, 'male', '0000-00-00', '', '', 'active', '9b4a6c74af0260c8066779d55a81c6f4', '2013-07-15 08:14:50'),
(212, 'employee', 'staffff@gmail.com', '', 'staffs12', 'staff', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '24c35c98270bc3699937452fd34e29f3', '0000-00-00 00:00:00'),
(213, 'employee', 'asdadada@gmail.com', '', 'staff2d', 'sdasdasd', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '777e81a9f03e5382da0d3d385e79d6e1', '0000-00-00 00:00:00'),
(214, 'employee', 'classservice@gmail.com', '', 'classservice', 'classservice', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'aa70c5dbb5cd973e854a381e1c67dfa8', '0000-00-00 00:00:00'),
(215, 'employee', 'staffClas@gmail.com', '', 'staffClass', 'staffClass', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'a32299246dded8a183d28be295e251d2', '0000-00-00 00:00:00'),
(216, 'manager', 'pankaj.p@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'P', 0, 'male', '0000-00-00', '', '', 'active', 'b55b2b63ea5de18c2eef12f0672e5569', '2013-07-18 07:06:18'),
(225, 'client', 'eulogik@gmail.com', '48dc7460ddaf19fb7f462661e4c45a32', 'eulogik', 'e', 2147483647, 'male', '2064-02-02', '', 'default.jpg', 'active', '0', '2013-07-19 13:50:12'),
(226, 'employee', 'dsfsdfssdf@gmail.com', '', 'staff2', 'sdfsd', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '3b7c34d9d504249e4365bad363b55f4c', '0000-00-00 00:00:00'),
(0, '', 'dummy@gmail.com', 'dummy', 'dummy', 'dummy', 0, '', '0000-00-00', '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(50) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `phone_number` int(15) NOT NULL,
  `gender` enum('male','female') CHARACTER SET latin1 NOT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(512) CHARACTER SET latin1 NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_business_availability`
--

CREATE TABLE IF NOT EXISTS `user_business_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `type` enum('employee','business') NOT NULL,
  `weekid` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lunch_start_time` time NOT NULL,
  `lunch_end_time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1224 ;

--
-- Dumping data for table `user_business_availability`
--

INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
(1223, 30, 0, 'business', 5, '15:15:00', '15:15:00', '00:00:00', '00:00:00'),
(1222, 30, 0, 'business', 4, '15:15:00', '15:15:00', '00:00:00', '00:00:00'),
(1221, 30, 0, 'business', 3, '15:15:00', '15:15:00', '00:00:00', '00:00:00'),
(1220, 30, 0, 'business', 2, '07:00:00', '15:15:00', '00:00:00', '00:00:00'),
(1219, 30, 0, 'business', 1, '07:15:00', '15:15:00', '00:00:00', '00:00:00'),
(278, 31, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(279, 31, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(280, 31, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(281, 31, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(282, 31, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(283, 31, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(284, 32, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(285, 32, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(286, 32, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(287, 32, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(288, 32, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(289, 32, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(290, 33, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(291, 33, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(292, 33, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(293, 33, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(294, 33, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(295, 33, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(319, 31, 149, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(318, 31, 149, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(317, 31, 149, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(316, 31, 149, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(315, 31, 148, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(314, 31, 148, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(320, 31, 149, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(321, 31, 149, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(322, 31, 150, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(323, 31, 150, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(324, 31, 150, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(325, 31, 150, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(326, 31, 150, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(327, 31, 150, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(328, 33, 151, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(329, 33, 151, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(330, 33, 151, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(331, 33, 151, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(332, 33, 151, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(333, 33, 151, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(334, 33, 152, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(335, 33, 152, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(336, 33, 152, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(337, 33, 152, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(338, 33, 152, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(339, 34, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(340, 34, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(341, 34, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(342, 34, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(343, 34, 0, 'business', 7, '11:45:00', '11:45:00', '00:00:00', '00:00:00'),
(357, 34, 154, 'employee', 7, '11:45:00', '11:45:00', '00:00:00', '00:00:00'),
(356, 34, 154, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(355, 34, 154, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(354, 34, 154, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(353, 34, 154, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(358, 35, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(359, 35, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(360, 35, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(361, 35, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(362, 35, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(363, 35, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(364, 35, 156, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(365, 35, 156, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(366, 35, 156, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(367, 35, 156, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(368, 35, 156, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(369, 35, 156, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(370, 36, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(371, 36, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(372, 36, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(373, 36, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(374, 36, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(375, 36, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(376, 36, 158, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(377, 36, 158, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(378, 36, 158, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(379, 36, 158, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(380, 36, 158, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(381, 36, 158, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(405, 37, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(404, 37, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(403, 37, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(402, 37, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(401, 37, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(400, 37, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(1057, 46, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(426, 37, 160, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(425, 37, 160, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(424, 37, 160, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(423, 37, 160, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(422, 37, 160, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(1056, 45, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1055, 45, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1054, 45, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1053, 45, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1052, 45, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1051, 45, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1050, 44, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1049, 44, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(628, 39, 0, 'business', 5, '10:00:00', '17:00:00', '00:00:00', '00:00:00'),
(627, 39, 0, 'business', 4, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(626, 39, 0, 'business', 3, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(1048, 44, 0, 'business', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1047, 44, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1046, 44, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1045, 44, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(625, 39, 0, 'business', 2, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(624, 39, 0, 'business', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(629, 40, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(630, 40, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(631, 40, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(632, 40, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(633, 40, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(634, 40, 0, 'business', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(991, 43, 213, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(990, 43, 213, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(989, 43, 213, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(988, 43, 213, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(976, 43, 0, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(975, 43, 0, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(974, 43, 0, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(973, 43, 0, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(972, 43, 0, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(971, 43, 0, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(970, 43, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(969, 43, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(968, 43, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(967, 43, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(966, 43, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(965, 43, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(964, 42, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(963, 42, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(962, 42, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(961, 42, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(960, 42, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(944, 41, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(943, 41, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(942, 41, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(941, 41, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(940, 41, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1218, 47, 226, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1217, 47, 226, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1216, 47, 226, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1215, 47, 226, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1214, 47, 226, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1200, 38, 0, 'business', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1199, 38, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1198, 38, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1197, 38, 0, 'business', 4, '08:00:00', '22:00:00', '00:00:00', '00:00:00'),
(1196, 38, 0, 'business', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1195, 38, 0, 'business', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1194, 38, 0, 'business', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1058, 46, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1059, 46, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1060, 46, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1061, 46, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1062, 46, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1086, 47, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1085, 47, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1084, 47, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1083, 47, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1082, 47, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1081, 47, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1141, 48, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1097, 47, 215, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1096, 47, 215, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1095, 47, 215, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1094, 47, 215, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1093, 47, 215, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1140, 48, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1139, 48, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1138, 48, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1159, 49, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1158, 49, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1157, 49, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1156, 49, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1155, 49, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1154, 49, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_classes`
--

CREATE TABLE IF NOT EXISTS `user_business_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price_type` enum('fixed','variable','free') CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `timelength` int(11) NOT NULL,
  `time_type` enum('hours','minutes') NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') NOT NULL,
  `class_size` int(10) NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  `availability` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_business_classes`
--

INSERT INTO `user_business_classes` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `class_size`, `details`, `availability`) VALUES
(1, 33, 'Yoga 2', 'fixed', 10, 20, 'minutes', 0, 'Before', 20, 'Demos ', 20),
(4, 33, 'Yoga 1 ', 'fixed', 20, 20, 'minutes', 0, 'Before', 20, 'Demos ', 20),
(5, 37, 'class12', 'fixed', 12, 1, 'hours', 0, 'Before', 23, 'dadsad dfdsfsd ', 20),
(6, 41, 'class1', 'fixed', 21, 12, 'minutes', 0, 'Before', 10, 'descriptionssss', 20),
(7, 42, 'cl;ass1', 'fixed', 23, 1, 'hours', 0, 'Before', 20, 'rfsdfsdfdsf', 20),
(8, 44, 'classbook', 'fixed', 12, 1, 'hours', 0, 'Before', 25, 'desccccccccc', 20),
(9, 47, 'class1', 'fixed', 12, 1, 'hours', 0, 'Before', 25, 'dsdasdasd', 20),
(10, 47, 'class2', 'fixed', 23, 20, 'minutes', 10, 'Before & After', 30, 'descriptionnn', 18),
(11, 48, 'class1', 'fixed', 12, 12, 'minutes', 0, 'Before', 23, 'fdfsdf', 20);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_details`
--

CREATE TABLE IF NOT EXISTS `user_business_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(200) CHARACTER SET latin1 NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET latin1 NOT NULL,
  `address` varchar(500) NOT NULL,
  `business_type` enum('class','service') CHARACTER SET latin1 NOT NULL,
  `map_latitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `map_longitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `calendar_type` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user_business_details`
--

INSERT INTO `user_business_details` (`id`, `category_id`, `users_id`, `name`, `image`, `description`, `mobile_number`, `address`, `business_type`, `map_latitude`, `map_longitude`, `calendar_type`) VALUES
(30, 1, 129, 'asasasa', '', 'ddddddddddd', '234234234234234', 'India', 'service', '20.593684', '78.96288000000004', 1),
(31, 1, 138, 'bb', 'Sunset.jpg', 'bb', '232323232323223', 'Indiana, USA', 'service', '40.2671941', '-86.13490189999999', 1),
(32, 2, 136, 'Test Demo', '', 'Test Demo', '8817453284', 'A, Deerbrook, WI 54424, USA', 'service', '45.2801325', '-89.07150560000002', 1),
(33, 1, 147, 'Web Design', 'Sunset1.jpg', 'We are web organization', '8817453284', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'class', '23.2332432', '77.4343394', 1),
(34, 1, 153, 'business', 'Image91.png', 'this is what exatcly!!! gfdfg dfgdfg dfgdf gdfgdfg dfgdf dgdg dfgdf dfgdf gdfg gdg dggfgdfg dfgdfg dfgdfgdfg d fdgdfg dfgdgdfg dfgdfg dfgd dg dfgdfg dfgd dfg yes no wht exatly wht is not there is wht ', '123456789987686', 'India', 'service', '20.593684', '78.96288000000004', 1),
(40, 2, 196, 'name111', '', 'dasdsa das das das d asd asd as dsa d as dsa das d asd as d d as das d asd asd as das dsa ds adsa d asd as das  sad asd as das das  as sa sa das d sad asd as das d asd asdasd\r\nasd\r\nsad\r\nasdasdas dsa a', '555555555555555', 'Bhopal, Madhya Pradesh, India', 'service', '23.2599333', '77.41261499999996', 1),
(38, 1, 69, 'business namess updated', 'play.png', 'this is like not !! updated one yaar', '233232323232323', 'Essen, Germany', 'service', '51.4556432', '7.011555199999975', 1),
(39, 1, 195, 'busname', '', 'desc', '455454444444444', 'Bangalore, Karnataka, India', 'service', '12.9715987', '77.59456269999998', 2),
(47, 1, 210, 'classbook', '', 'dsfdsf', '453543543543545', 'Mumbai, Maharashtra, India', 'class', '19.0759837', '72.87765590000004', 1),
(43, 2, 211, 'services123', '', 'desc', '34343243323', 'Mangalore, Karnataka, India', 'service', '12.9141417', '74.85595680000006', 1),
(49, 1, 216, 'dfdf', '', 'dfdsf', '324234234322343', 'United States', 'class', '37.09024', '-95.71289100000001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_photogallery`
--

CREATE TABLE IF NOT EXISTS `user_business_photogallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `title` varchar(25) CHARACTER SET latin1 NOT NULL,
  `description` varchar(50) NOT NULL,
  `photo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `orderNum` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_business_photogallery`
--

INSERT INTO `user_business_photogallery` (`id`, `user_business_details_id`, `title`, `description`, `photo`, `orderNum`) VALUES
(3, 34, 'pic1', '', 'default.jpg', 2),
(4, 34, 'pic2', '', 'eulogik2-e1350592057564.png', 2),
(5, 34, 'pic3', '', 'Image91.png', 5),
(6, 38, 'pic1', 'aaa', 'default1.jpg', 1),
(7, 30, 'pic1', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_posted_class`
--

CREATE TABLE IF NOT EXISTS `user_business_posted_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_classes_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `lastdate_enroll` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `instructor` int(11) NOT NULL COMMENT 'UsersId from users table ',
  `repeat_type` enum('daily','weekly','monthly') CHARACTER SET latin1 NOT NULL,
  `repeat_all_day` enum('0','1') CHARACTER SET latin1 NOT NULL,
  `repeat_week_days` varchar(50) CHARACTER SET latin1 NOT NULL,
  `repeat_months` varchar(50) CHARACTER SET latin1 NOT NULL,
  `class_size` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `seriesid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_classes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=227 ;

--
-- Dumping data for table `user_business_posted_class`
--

INSERT INTO `user_business_posted_class` (`id`, `user_business_classes_id`, `start_date`, `end_date`, `lastdate_enroll`, `start_time`, `end_time`, `instructor`, `repeat_type`, `repeat_all_day`, `repeat_week_days`, `repeat_months`, `class_size`, `availability`, `seriesid`) VALUES
(226, 9, '2013-11-04', '2013-11-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '8,9,10,11,', 20, 20, 5),
(225, 9, '2013-10-04', '2013-10-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '8,9,10,11,', 20, 20, 5),
(224, 9, '2013-09-04', '2013-09-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '8,9,10,11,', 20, 20, 5),
(223, 9, '2013-08-04', '2013-08-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '8,9,10,11,', 20, 20, 5),
(222, 9, '2013-08-16', '2013-08-16', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(221, 9, '2013-08-14', '2013-08-14', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(220, 9, '2013-08-12', '2013-08-12', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(219, 9, '2013-08-11', '2013-08-11', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(218, 9, '2013-08-09', '2013-08-09', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(217, 9, '2013-08-07', '2013-08-07', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(216, 9, '2013-08-05', '2013-08-05', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(215, 9, '2013-08-04', '2013-08-04', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,5,7,', '', 10, 10, 4),
(214, 9, '2013-08-04', '2013-08-04', '2013-08-06', '03:00:00', '04:00:00', 226, 'daily', '1', '', '', 10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_services`
--

CREATE TABLE IF NOT EXISTS `user_business_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `price_type` enum('fixed','variable','free') CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `timelength` int(11) NOT NULL,
  `time_type` enum('hours','minutes') NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `user_business_services`
--

INSERT INTO `user_business_services` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `details`) VALUES
(71, 30, 'service12', 'fixed', 3232, 1, 'hours', 10, 'Before & After', 'dcvdcvxcvxcvxc'),
(73, 30, 'hhhfgfghfgh', 'fixed', 6464, 56, 'minutes', 0, 'Before', 'vcvbcvbcv'),
(74, 30, 'rrrrrrrraaaaa', 'fixed', 3423, 33, 'minutes', 0, 'Before', 'sdfsdsfs'),
(75, 31, 'service1', 'fixed', 123, 30, 'minutes', 30, 'Before', 'bcbcvbv '),
(76, 31, 'service2', 'fixed', 123, 15, 'minutes', 15, 'Before & After', 'bcbcvbv '),
(77, 32, 'aasa', 'variable', 20, 20, 'minutes', 0, 'Before', 'asa'),
(78, 33, 'Seo', 'variable', 200, 50, 'hours', 0, 'Before', 'Demo Description'),
(79, 34, 'service1', 'fixed', 12, 1, 'hours', 0, 'Before', 'yes!!!!'),
(80, 35, 'class1', 'fixed', 12, 1, 'hours', 0, 'Before', 'descr'),
(81, 36, 'class21', 'fixed', 23, 3, 'hours', 0, 'Before', 'erfsv fsd f sd fsdf'),
(84, 38, 'serrvice222', 'variable', 1212, 12, 'minutes', 0, 'Before', '1ddsadasdas'),
(83, 38, 'ddfsf', 'free', 45, 23, 'minutes', 0, 'Before', 'dsfsdfsdsdf'),
(85, 40, 'service123', 'fixed', 12, 1, 'hours', 20, 'Before & After', 'this si wht exacrtlycsdf dfgdf'),
(86, 38, 'nnnnnnnnnn', 'free', 0, 34, 'minutes', 0, 'Before', 'dddddddd'),
(87, 41, 'classservice', 'fixed', 12, 12, 'minutes', 0, 'Before', 'class123434556'),
(88, 43, 'services12', 'fixed', 23, 1, 'hours', 0, 'Before', 'desc servicesss'),
(89, 49, 'services1', 'fixed', 23, 23, 'minutes', 0, 'Before', 'dsfdsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_subscription`
--

CREATE TABLE IF NOT EXISTS `user_business_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version_type` enum('paid','free') NOT NULL,
  `subscription_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `status` enum('active','expired') CHARACTER SET latin1 NOT NULL DEFAULT 'active',
  `balance_amount` varchar(50) CHARACTER SET latin1 NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_business_subscription`
--

INSERT INTO `user_business_subscription` (`id`, `version_type`, `subscription_id`, `users_id`, `start_date`, `status`, `balance_amount`, `end_date`) VALUES
(2, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(3, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(4, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(5, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(6, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(7, 'free', 2, 69, '2013-07-11', 'active', '', '2013-08-11'),
(12, 'free', 3, 129, '2013-05-16', 'active', '', '2013-06-16'),
(13, 'free', 1, 138, '2013-06-06', 'active', '', '2013-07-06'),
(14, 'free', 2, 136, '2013-06-06', 'active', '', '2013-07-06'),
(15, 'free', 1, 147, '2013-06-07', 'active', '', '2013-07-07'),
(16, 'free', 2, 196, '2013-07-10', 'active', '', '2013-08-10'),
(17, 'free', 2, 210, '2013-07-15', 'active', '', '2013-08-15'),
(18, 'free', 2, 211, '2013-07-15', 'active', '', '2013-08-15'),
(19, 'free', 2, 216, '2013-07-18', 'active', '', '2013-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification_settings`
--

CREATE TABLE IF NOT EXISTS `user_notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `appointment_reminder` enum('yes','no') CHARACTER SET latin1 NOT NULL,
  `remind_before` int(11) NOT NULL,
  `send_message` enum('yes','no') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_business_clients`
--
CREATE TABLE IF NOT EXISTS `view_business_clients` (
`users_id` int(11)
,`user_business_details_id` int(11)
,`email` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`gender` enum('male','female')
,`phone_number` int(15)
,`date_of_birth` date
,`about_me` varchar(250)
,`image` varchar(100)
,`business_logo` varchar(50)
,`business_name` varchar(100)
,`category_name` varchar(100)
,`client_list_id` int(11)
,`manager_firstname` varchar(50)
,`manager_lastname` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_business_details`
--
CREATE TABLE IF NOT EXISTS `view_business_details` (
`manager_firstname` varchar(50)
,`manager_lastname` varchar(50)
,`manager_phone` int(15)
,`gender` enum('male','female')
,`manager_email` varchar(50)
,`business_description` varchar(200)
,`mobile_number` varchar(20)
,`address` varchar(500)
,`business_type` enum('class','service')
,`map_latitude` varchar(50)
,`map_longitude` varchar(50)
,`calendar_type` int(10)
,`business_name` varchar(100)
,`image` varchar(50)
,`category_name` varchar(100)
,`users_id` int(11)
,`business_id` int(11)
,`category_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_business_employees`
--
CREATE TABLE IF NOT EXISTS `view_business_employees` (
`email` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`phone_number` int(15)
,`user_business_details_id` int(11)
,`users_id` int(11)
,`image` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_classes_posted_business`
--
CREATE TABLE IF NOT EXISTS `view_classes_posted_business` (
`user_business_classes_id` int(11)
,`start_date` date
,`end_date` date
,`lastdate_enroll` date
,`start_time` time
,`end_time` time
,`instructor` int(11)
,`repeat_type` enum('daily','weekly','monthly')
,`repeat_all_day` enum('0','1')
,`repeat_week_days` varchar(50)
,`repeat_months` varchar(50)
,`user_business_details_id` int(11)
,`id` int(11)
,`name` varchar(50)
,`price` int(10)
,`price_type` enum('fixed','variable','free')
,`timelength` int(11)
,`time_type` enum('hours','minutes')
,`padding_time` int(10)
,`padding_time_type` enum('Before','After','Before & After')
,`details` varchar(50)
,`instructor_firstname` varchar(50)
,`instructor_lastname` varchar(50)
,`class_size` int(11)
,`availability` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_client_buisness_services_appointments`
--
CREATE TABLE IF NOT EXISTS `view_client_buisness_services_appointments` (
`category_id` int(11)
,`name` varchar(100)
,`image` varchar(50)
,`description` varchar(200)
,`service_id` int(11)
,`user_business_details_id` int(11)
,`service_name` varchar(50)
,`price_type` enum('fixed','variable','free')
,`price` int(10)
,`timelength` int(11)
,`time_type` enum('hours','minutes')
,`padding_time` int(10)
,`padding_time_type` enum('Before','After','Before & After')
,`details` varchar(50)
,`start_time` datetime
,`end_time` datetime
,`services_id` varchar(50)
,`employee_id` int(11)
,`status` enum('booked','cancelled')
,`users_id` int(11)
,`note` text
,`id` int(11)
,`user_role` enum('client','manager','employee')
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_employee_services`
--
CREATE TABLE IF NOT EXISTS `view_employee_services` (
`service_id` int(11)
,`name` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`users_id` int(11)
,`business_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_service_availablity`
--
CREATE TABLE IF NOT EXISTS `view_service_availablity` (
`id` int(11)
,`user_business_details_id` int(11)
,`users_id` int(11)
,`type` enum('employee','business')
,`weekid` int(11)
,`start_time` time
,`end_time` time
,`lunch_start_time` time
,`lunch_end_time` time
,`name` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE IF NOT EXISTS `weekdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`id`, `name`) VALUES
(1, 'Sunday'),
(2, 'Monday'),
(3, 'Tuesday'),
(4, 'Wednesday'),
(5, 'Thursday'),
(6, 'Friday'),
(7, 'Saturday');

-- --------------------------------------------------------

--
-- Structure for view `view_business_clients`
--
DROP TABLE IF EXISTS `view_business_clients`;

CREATE VIEW `view_business_clients` AS select `business_clients_list`.`users_id` AS `users_id`,`business_clients_list`.`user_business_details_id` AS `user_business_details_id`,`users`.`email` AS `email`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`gender` AS `gender`,`users`.`phone_number` AS `phone_number`,`users`.`date_of_birth` AS `date_of_birth`,`users`.`about_me` AS `about_me`,`users`.`image` AS `image`,`user_business_details`.`image` AS `business_logo`,`user_business_details`.`name` AS `business_name`,`category`.`name` AS `category_name`,`business_clients_list`.`id` AS `client_list_id`,`manager_details`.`first_name` AS `manager_firstname`,`manager_details`.`last_name` AS `manager_lastname` from ((((`users` join `business_clients_list` on((`users`.`id` = `business_clients_list`.`users_id`))) join `user_business_details` on((`business_clients_list`.`user_business_details_id` = `user_business_details`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`))) join `users` `manager_details` on((`user_business_details`.`users_id` = `manager_details`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_details`
--
DROP TABLE IF EXISTS `view_business_details`;

CREATE VIEW `view_business_details` AS select `users`.`first_name` AS `manager_firstname`,`users`.`last_name` AS `manager_lastname`,`users`.`phone_number` AS `manager_phone`,`users`.`gender` AS `gender`,`users`.`email` AS `manager_email`,`user_business_details`.`description` AS `business_description`,`user_business_details`.`mobile_number` AS `mobile_number`,`user_business_details`.`address` AS `address`,`user_business_details`.`business_type` AS `business_type`,`user_business_details`.`map_latitude` AS `map_latitude`,`user_business_details`.`map_longitude` AS `map_longitude`,`user_business_details`.`calendar_type` AS `calendar_type`,`user_business_details`.`name` AS `business_name`,`user_business_details`.`image` AS `image`,`category`.`name` AS `category_name`,`user_business_details`.`users_id` AS `users_id`,`user_business_details`.`id` AS `business_id`,`user_business_details`.`category_id` AS `category_id` from ((`users` join `user_business_details` on((`users`.`id` = `user_business_details`.`users_id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_employees`
--
DROP TABLE IF EXISTS `view_business_employees`;

CREATE VIEW `view_business_employees` AS select `users`.`email` AS `email`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone_number` AS `phone_number`,`business_employees`.`user_business_details_id` AS `user_business_details_id`,`business_employees`.`users_id` AS `users_id`,`users`.`image` AS `image` from (`users` join `business_employees` on((`business_employees`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_classes_posted_business`
--
DROP TABLE IF EXISTS `view_classes_posted_business`;

CREATE VIEW `view_classes_posted_business` AS select `user_business_posted_class`.`user_business_classes_id` AS `user_business_classes_id`,`user_business_posted_class`.`start_date` AS `start_date`,`user_business_posted_class`.`end_date` AS `end_date`,`user_business_posted_class`.`lastdate_enroll` AS `lastdate_enroll`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`user_business_posted_class`.`instructor` AS `instructor`,`user_business_posted_class`.`repeat_type` AS `repeat_type`,`user_business_posted_class`.`repeat_all_day` AS `repeat_all_day`,`user_business_posted_class`.`repeat_week_days` AS `repeat_week_days`,`user_business_posted_class`.`repeat_months` AS `repeat_months`,`user_business_classes`.`user_business_details_id` AS `user_business_details_id`,`user_business_posted_class`.`id` AS `id`,`user_business_classes`.`name` AS `name`,`user_business_classes`.`price` AS `price`,`user_business_classes`.`price_type` AS `price_type`,`user_business_classes`.`timelength` AS `timelength`,`user_business_classes`.`time_type` AS `time_type`,`user_business_classes`.`padding_time` AS `padding_time`,`user_business_classes`.`padding_time_type` AS `padding_time_type`,`user_business_classes`.`details` AS `details`,`users`.`first_name` AS `instructor_firstname`,`users`.`last_name` AS `instructor_lastname`,`user_business_posted_class`.`class_size` AS `class_size`,`user_business_posted_class`.`availability` AS `availability` from ((`user_business_posted_class` join `user_business_classes` on((`user_business_posted_class`.`user_business_classes_id` = `user_business_classes`.`id`))) join `users` on((`user_business_posted_class`.`instructor` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_buisness_services_appointments`
--
DROP TABLE IF EXISTS `view_client_buisness_services_appointments`;

CREATE VIEW `view_client_buisness_services_appointments` AS select `user_business_details`.`category_id` AS `category_id`,`user_business_details`.`name` AS `name`,`user_business_details`.`image` AS `image`,`user_business_details`.`description` AS `description`,`user_business_services`.`id` AS `service_id`,`user_business_services`.`user_business_details_id` AS `user_business_details_id`,`user_business_services`.`name` AS `service_name`,`user_business_services`.`price_type` AS `price_type`,`user_business_services`.`price` AS `price`,`user_business_services`.`timelength` AS `timelength`,`user_business_services`.`time_type` AS `time_type`,`user_business_services`.`padding_time` AS `padding_time`,`user_business_services`.`padding_time_type` AS `padding_time_type`,`user_business_services`.`details` AS `details`,`client_service_appointments`.`start_time` AS `start_time`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`users_id` AS `users_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`id` AS `id`,`users`.`user_role` AS `user_role` from (((`user_business_details` join `user_business_services` on((`user_business_details`.`id` = `user_business_services`.`user_business_details_id`))) join `client_service_appointments` on((`user_business_services`.`id` = `client_service_appointments`.`services_id`))) join `users` on((`client_service_appointments`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_employee_services`
--
DROP TABLE IF EXISTS `view_employee_services`;

CREATE VIEW `view_employee_services` AS select `employee_services`.`service_id` AS `service_id`,`user_business_services`.`name` AS `name`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`employee_services`.`users_id` AS `users_id`,`employee_services`.`business_id` AS `business_id` from ((`employee_services` join `user_business_services` on((`employee_services`.`service_id` = `user_business_services`.`id`))) join `users` on((`employee_services`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_service_availablity`
--
DROP TABLE IF EXISTS `view_service_availablity`;

CREATE VIEW `view_service_availablity` AS select `user_business_availability`.`id` AS `id`,`user_business_availability`.`user_business_details_id` AS `user_business_details_id`,`user_business_availability`.`users_id` AS `users_id`,`user_business_availability`.`type` AS `type`,`user_business_availability`.`weekid` AS `weekid`,`user_business_availability`.`start_time` AS `start_time`,`user_business_availability`.`end_time` AS `end_time`,`user_business_availability`.`lunch_start_time` AS `lunch_start_time`,`user_business_availability`.`lunch_end_time` AS `lunch_end_time`,`weekdays`.`name` AS `name` from (`weekdays` join `user_business_availability` on((`user_business_availability`.`weekid` = `weekdays`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
