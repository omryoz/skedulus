-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2013 at 02:57 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

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
(80, 271, 47),
(61, 225, 33),
(53, 0, 30),
(71, 136, 47),
(73, 129, 30),
(54, 223, 30),
(49, 136, 39),
(55, 223, 33),
(68, 225, 47),
(74, 129, 0),
(75, 263, 47),
(76, 264, 47),
(77, 265, 47),
(78, 266, 47),
(79, 267, 47),
(81, 272, 47),
(82, 278, 0),
(83, 278, 30),
(85, 278, 34),
(86, 278, 38),
(87, 278, 39),
(88, 278, 47),
(89, 278, 32),
(90, 278, 40),
(92, 279, 47);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

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
(80, 47, 226, 'employee'),
(81, 47, 268, 'employee'),
(82, 47, 269, 'employee'),
(83, 47, 270, 'employee');

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
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `business_notification_settings`
--

INSERT INTO `business_notification_settings` (`id`, `user_business_details_id`, `appointment_reminders`, `remind_before`, `cancel_reschedule_before`, `book_before`, `send_email`, `send_message`) VALUES
(1, 31, 'on', '00:00:00', '00:00:00', '00:00:00', 'on', 'off'),
(2, 34, 'off', '01:45:00', '00:00:00', '00:00:00', 'on', 'off'),
(3, 38, 'off', '09:15:00', '10:00:00', '11:30:00', 'off', 'off'),
(4, 47, 'on', '07:30:00', '19:45:00', '08:30:00', 'off', 'on');

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
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_posted_class_id` (`user_business_posted_class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `client_class_booking`
--

INSERT INTO `client_class_booking` (`id`, `users_id`, `user_business_posted_class_id`, `date`, `note`) VALUES
(73, 272, 430, '2013-08-26', 'yesss'),
(72, 271, 430, '2013-08-26', 'yes'),
(71, 267, 0, '2013-08-17', ''),
(70, 266, 359, '2013-08-16', ''),
(69, 265, 359, '2013-08-16', ''),
(68, 264, 360, '2013-08-14', ''),
(67, 263, 360, '2013-08-14', ''),
(66, 262, 360, '2013-08-14', ''),
(65, 261, 360, '2013-08-14', ''),
(64, 260, 360, '2013-08-14', ''),
(63, 259, 360, '2013-08-14', ''),
(62, 258, 360, '2013-08-14', ''),
(61, 257, 360, '2013-08-14', ''),
(60, 256, 360, '2013-08-14', 'dddd'),
(59, 255, 360, '2013-08-14', 'dddd'),
(58, 254, 360, '2013-08-14', 'notesss'),
(57, 253, 360, '2013-08-14', 'notess'),
(56, 252, 360, '2013-08-14', 'notess'),
(82, 136, 319, '2013-08-27', 'on 27thaug'),
(77, 136, 430, '2013-08-26', ''),
(83, 136, 318, '2013-08-27', 'on 27thaug'),
(80, 136, 320, '2013-08-26', 'new class booking'),
(81, 136, 445, '2013-08-26', 'yeahh'),
(84, 136, 431, '2013-08-27', ''),
(85, 279, 533, '2013-08-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `client_service_appointments`
--

CREATE TABLE IF NOT EXISTS `client_service_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `services_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `employee_id` int(11) NOT NULL,
  `note` text CHARACTER SET latin1 NOT NULL,
  `status` enum('booked','cancelled') CHARACTER SET latin1 DEFAULT NULL,
  `appointment_date` datetime NOT NULL,
  `type` enum('service','class') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `user_business_details_id`, `users_id`, `start_time`, `end_time`, `services_id`, `employee_id`, `note`, `status`, `appointment_date`, `type`) VALUES
(166, 30, 0, '2013-09-15 01:09:00', '1970-01-01 01:01:00', '71', 0, 'hh', 'booked', '2013-09-16 12:09:56', 'service'),
(165, 30, 136, '2013-09-15 14:09:00', '1970-01-01 01:01:00', '71,73', 0, '', 'booked', '2013-09-16 08:09:00', 'service'),
(162, 47, 136, '2013-09-07 01:00:00', '2013-09-07 02:00:00', '493', 0, '', 'booked', '2013-09-02 07:09:49', 'class'),
(161, 47, 136, '2013-09-05 01:00:00', '2013-09-05 02:00:00', '491', 0, '', 'booked', '2013-09-02 07:09:45', 'class'),
(160, 47, 136, '2013-09-04 07:00:00', '2013-09-04 08:00:00', '224', 0, '', 'booked', '2013-09-02 07:09:37', 'class'),
(159, 30, 129, '2013-09-02 03:09:00', '2013-09-02 04:09:00', '71', 0, '2sept', 'booked', '2013-08-31 09:08:18', 'service'),
(158, 30, 129, '2013-09-01 06:09:00', '2013-09-01 07:09:00', '71', 0, '1sept for client1234', 'booked', '2013-08-31 09:08:39', 'service'),
(154, 30, 136, '2013-09-01 09:15:00', '2013-09-01 10:11:00', '73', 130, 'm', 'booked', '2013-08-30 00:00:00', 'service'),
(155, 30, 136, '2013-08-27 01:08:00', '2013-08-27 03:08:00', '71,73,74', 0, 'book', 'booked', '2013-08-30 01:08:25', 'service'),
(156, 30, 136, '2013-08-28 04:08:00', '2013-08-28 06:08:00', '71,73,74', 0, 'booked', 'booked', '2013-08-30 01:08:15', 'service'),
(150, 47, 136, '2013-08-26 04:00:00', '2013-08-26 05:00:00', '448', 0, '', 'booked', '2013-08-30 08:08:52', 'class'),
(149, 47, 136, '2013-08-26 01:30:00', '2013-08-26 02:30:00', '533', 0, '', 'booked', '2013-08-30 08:08:48', 'class'),
(163, 47, 136, '2013-09-02 01:00:00', '2013-09-02 02:00:00', '488', 0, '', 'booked', '2013-09-04 09:09:26', 'class'),
(164, 47, 136, '2013-09-15 04:00:00', '2013-09-15 05:00:00', '494', 0, '', 'booked', '2013-09-16 07:09:13', 'class'),
(157, 30, 129, '2013-08-31 04:08:00', '2013-08-31 05:08:00', '71', 0, 'service to client', 'booked', '2013-08-31 07:08:54', 'service'),
(147, 30, 136, '2013-08-26 01:08:00', '2013-08-26 04:08:00', '71,73', 0, 'yeahh', 'booked', '2013-08-30 08:08:51', 'service');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

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
(166, 47, 9, 226),
(167, 47, 9, 268),
(168, 47, 9, 269);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `posted_class_series`
--

INSERT INTO `posted_class_series` (`id`, `user_business_classes_id`, `date_added`) VALUES
(3, 9, '2013-08-06 15:08:42'),
(4, 9, '2013-08-06 15:08:24'),
(5, 9, '2013-08-06 15:08:22'),
(6, 10, '2013-08-07 06:08:40'),
(7, 9, '2013-08-07 06:08:01'),
(8, 9, '2013-08-07 09:08:05'),
(9, 9, '2013-08-07 09:08:11'),
(10, 9, '2013-08-07 09:08:58'),
(11, 9, '2013-08-07 09:08:38'),
(12, 9, '2013-08-07 09:08:47'),
(13, 10, '2013-08-07 09:08:01'),
(14, 9, '2013-08-07 10:08:28'),
(15, 9, '2013-08-07 10:08:02'),
(16, 9, '2013-08-07 10:08:43'),
(17, 9, '2013-08-07 10:08:42'),
(18, 9, '2013-08-07 10:08:23'),
(19, 9, '2013-08-07 10:08:56'),
(20, 9, '2013-08-07 11:08:14'),
(21, 10, '2013-08-07 11:08:58'),
(22, 9, '2013-08-07 11:08:07'),
(23, 9, '2013-08-07 12:08:29'),
(24, 10, '2013-08-07 12:08:03'),
(25, 9, '2013-08-07 12:08:08'),
(26, 9, '2013-08-07 12:08:26'),
(27, 9, '2013-08-07 12:08:24'),
(28, 9, '2013-08-07 12:08:40'),
(29, 10, '2013-08-07 12:08:49'),
(30, 9, '2013-08-08 13:08:20'),
(31, 9, '2013-08-08 13:08:12'),
(32, 9, '2013-08-08 13:08:24'),
(33, 9, '2013-08-08 13:08:49'),
(34, 9, '2013-08-08 13:08:49'),
(35, 9, '2013-08-08 13:08:44'),
(36, 9, '2013-08-08 15:08:54'),
(37, 9, '2013-08-08 15:08:12'),
(38, 0, '2013-08-09 07:08:50'),
(39, 9, '2013-08-12 06:08:58'),
(40, 9, '2013-08-12 06:08:21'),
(41, 9, '2013-08-12 09:08:11'),
(42, 9, '2013-08-12 09:08:45'),
(43, 9, '2013-08-13 11:08:24'),
(44, 9, '2013-08-13 12:08:00'),
(45, 9, '2013-08-13 12:08:08'),
(46, 9, '2013-08-13 12:08:46'),
(47, 9, '2013-08-13 12:08:11'),
(48, 9, '2013-08-13 12:08:14'),
(49, 9, '2013-08-13 12:08:45'),
(50, 9, '2013-08-13 12:08:03'),
(51, 9, '2013-08-13 12:08:24'),
(52, 9, '2013-08-13 13:08:14'),
(53, 9, '2013-08-13 13:08:27'),
(54, 9, '2013-08-13 13:08:58'),
(55, 9, '2013-08-13 13:08:10'),
(56, 9, '2013-08-13 13:08:19'),
(57, 9, '2013-08-14 06:08:26'),
(58, 9, '2013-08-14 06:08:04'),
(59, 0, '2013-08-14 08:08:45'),
(60, 0, '2013-08-14 08:08:54'),
(61, 0, '2013-08-14 08:08:42'),
(62, 9, '2013-08-14 08:08:11'),
(63, 9, '2013-08-14 08:08:10'),
(64, 9, '2013-08-14 08:08:30'),
(65, 9, '2013-08-26 07:08:11'),
(66, 9, '2013-08-26 11:08:12'),
(67, 9, '2013-08-26 11:08:04'),
(68, 9, '2013-08-26 12:08:17'),
(69, 9, '2013-08-26 13:08:03'),
(70, 9, '2013-08-26 13:08:24'),
(71, 9, '2013-08-27 07:08:28'),
(72, 9, '2013-08-27 07:08:33'),
(73, 10, '2013-08-27 13:08:00'),
(74, 10, '2013-08-27 13:08:07'),
(75, 10, '2013-08-27 13:08:25'),
(76, 10, '2013-08-27 13:08:12'),
(77, 10, '2013-08-27 13:08:36'),
(78, 10, '2013-08-27 13:08:26'),
(79, 10, '2013-08-27 13:08:44'),
(80, 9, '2013-08-27 13:08:45'),
(81, 9, '2013-08-27 13:08:13'),
(82, 9, '2013-08-27 14:08:31'),
(83, 9, '2013-08-27 14:08:20'),
(84, 9, '2013-08-27 14:08:09'),
(85, 9, '2013-08-27 14:08:22'),
(86, 9, '2013-08-27 14:08:26'),
(87, 10, '2013-08-27 14:08:15'),
(88, 9, '2013-08-27 14:08:43'),
(89, 9, '2013-08-27 14:08:11'),
(90, 9, '2013-08-29 07:08:21'),
(91, 10, '2013-08-29 07:08:30'),
(92, 9, '2013-08-29 07:08:49'),
(93, 9, '2013-08-29 07:08:19'),
(94, 9, '2013-08-29 07:08:06'),
(95, 9, '2013-08-29 07:08:50'),
(96, 9, '2013-08-29 07:08:17'),
(97, 9, '2013-09-04 08:09:05'),
(98, 9, '2013-09-04 08:09:50'),
(99, 9, '2013-09-04 09:09:12');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=302 ;

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
(129, 'manager', 'ff@gmail.com', '21b8adf19ee3ef88e8d01eca8f74de64', 'Eulogik', 'Service', 0, 'female', '1970-01-01', '', '', 'active', '533d7d9a5341068c4729f0312016c176', '0000-00-00 00:00:00'),
(130, 'employee', 'aa@gmail.comddasdad', '', 'staff1', '1', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'c35338527208730505f1e5e22c83165b', '0000-00-00 00:00:00'),
(131, 'employee', 'aa@gmail.csadsadasdads', '', 'staff2', '2', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '939a863073db839b19e2066677457ee8', '0000-00-00 00:00:00'),
(134, 'client', 'qqqqqqq@gmial.omc', '', 'qqqqqqqq', 'qqqq', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(136, 'client', 'client@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'client', 'C', 2147483647, 'female', '1977-03-03', 'abuttsdd ''s  fdgdggdfg dfgdfg fdgdfg dfg this''s is  its''s''ssgfgfgdgs  dfgdfgg dfgdfg  fdgfdgdfg dfgdfgfdgdfgdfgdf dfgfdgdfgfdgdf gdddddddddddddd ddddddddddddd ddddddddd ddddddd    dddd', '', 'active', '', '0000-00-00 00:00:00'),
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
(0, '', 'dummy@gmail.com', 'dummy', '', '', 0, '', '0000-00-00', '', '', '', '', '0000-00-00 00:00:00'),
(228, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(229, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(230, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(231, 'client', '', '', '', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(232, 'client', '', '', '', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(233, 'client', 'dfds', '', 'dsfdsfds', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(234, 'client', 'dfds', '', 'dsfdsfdssdsadas', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(235, 'client', 'dfds', '', 'sssssssssssssssssss', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(236, 'client', 'dfds', '', 'sssssssssssssssssss', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(237, 'client', 'dfds', '', 'sssssssssssssssssss', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(238, 'client', 'dfds', '', 'sssssssssssssssssss', '', 5435, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(239, 'client', 'dfg', '', 'gdffdfgdfg', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(240, 'client', 'dfg', '', 'gdffdfgdfg', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(275, 'client', 'pankaj14@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'pawar', 2147483647, 'male', '1990-02-14', '', 'default.jpg', 'active', '0', '2013-08-27 06:37:57'),
(274, 'client', 'name123@gmail.com', '5f25b6a0b984f370afd14aebc3140226', 'name', 'name1', 2147483647, 'male', '1979-02-18', '', 'default.jpg', 'active', '0', '2013-08-27 06:36:24'),
(273, 'client', '', '', '', '', 0, 'male', '0000-00-00', '', 'default.jpg', 'active', '', '2013-08-27 06:35:39'),
(272, 'client', 'names1@gmail.com', '', 'names1', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(271, 'client', 'name@gmail.com', '', 'names', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(279, 'client', '', '', 'name', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(269, 'employee', 'demo@gmail.com', '', 'demo', 'd', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '305f2beaf4f9cd78928b10d763732296', '0000-00-00 00:00:00'),
(280, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'f596849d5f34a54b02918298ec8b64fe', '2013-09-02 08:54:54'),
(267, 'client', '', '', 'swathi', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(266, 'client', '', '', 'yes', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(265, 'client', '', '', '3-4', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(264, 'client', '', '', 'aaa', '', 0, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(276, 'client', 'name1234@gmail.com', 'a00f94d2c469ff7e3e9d708b8ac6ed30', 'name123', 'name12', 2147483647, 'female', '1978-10-17', '', 'default.jpg', 'active', '0', '2013-08-27 06:42:42'),
(277, 'client', 'swathi.n@eulogik.com', '83c3c785a0e2ff39f562eeb0fff54f68', 'swathi', 'reddy', 2147483647, 'female', '1980-02-19', '', 'default.jpg', 'active', '0', '2013-08-27 06:45:02'),
(278, 'client', 'ash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ash', 'a', 2147483647, 'male', '1990-02-14', '', 'default.jpg', 'active', '0', '2013-08-27 07:14:34'),
(281, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '32a77d33cf8aec8995192b9a0a38b7c5', '2013-09-02 08:56:42'),
(282, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '48a7d6e9930ec06fb57f7414aef9159a', '2013-09-02 08:57:50'),
(283, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'b8896e2ee9c0d7e26e86e0784f61c9e0', '2013-09-02 09:01:53'),
(284, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '50d1861701eafe293d20cbefea42fbcf', '2013-09-02 09:02:06'),
(285, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '70c88de44aa3ff0c907a76c0685c5099', '2013-09-02 09:02:32'),
(286, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '1289e28feb055992b4ae1980984238b2', '2013-09-02 09:02:55'),
(287, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '58daa217bd3ca3c85697caa0d77851d6', '2013-09-02 09:13:37'),
(288, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '40e66b1767eb3f09a49381b0d5e90652', '2013-09-02 09:14:42'),
(289, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'b9b2e7b0c98135ed39c205f36d8d3d05', '2013-09-02 09:16:17'),
(290, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '9d439764679c99a27d95f65110a2d9db', '2013-09-02 09:17:08'),
(291, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'cbcc7f9f924a22b9ddcbcb180acfca9f', '2013-09-02 09:17:13'),
(292, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'c1deb582ade0e8b648d9fd1c6ead7393', '2013-09-02 09:17:42'),
(293, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '74724f3f76925dd9e3e80323b07bcf9a', '2013-09-02 09:22:31'),
(294, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '3a61cf7634608d9d97f7b289bca9faa7', '2013-09-02 09:22:35'),
(295, 'client', '', '', '', '', 0, 'male', '0000-00-00', '', 'default.jpg', 'active', '', '2013-09-02 09:23:16'),
(296, 'manager', 'ss@gmail.com', '05a3763b4f5834ef6fcfe3cb799c6cc7', 'service provide', 'service', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'fb338cda74b0bc73f4566bad68cd733b', '2013-09-02 09:24:11'),
(297, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'd2162abb0f2c7070c637f752fe3ac3d3', '2013-09-02 09:26:35'),
(298, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '8721e68c25bbd3641343897fe6d70c60', '2013-09-02 09:28:48'),
(299, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '42696bb5aa61704cf7dd6efe1a98e548', '2013-09-02 09:29:31'),
(300, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'f2b86dac6b99805f0d1ed23db8dbef81', '2013-09-02 09:32:07'),
(301, 'manager', 'firstname@gmail.com', '342f5c77ed008542e78094607ce1f7f3', 'firstname', 'lastname', 0, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '30a24dbd3eda1f53e7bf928e4a18e2ef', '2013-09-02 09:34:49');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1251 ;

--
-- Dumping data for table `user_business_availability`
--

INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
(1233, 47, 268, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1232, 30, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1231, 30, 0, 'business', 4, '07:00:00', '15:15:00', '00:00:00', '00:00:00'),
(1230, 30, 0, 'business', 3, '07:00:00', '15:15:00', '00:00:00', '00:00:00'),
(1229, 30, 0, 'business', 2, '07:00:00', '15:15:00', '00:00:00', '00:00:00'),
(1228, 30, 0, 'business', 1, '07:00:00', '15:15:00', '00:00:00', '00:00:00'),
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
(1154, 49, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1234, 47, 268, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1235, 47, 268, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1236, 47, 268, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1237, 47, 268, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1238, 47, 268, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1239, 47, 269, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1240, 47, 269, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1241, 47, 269, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1242, 47, 269, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1243, 47, 269, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1244, 47, 269, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1245, 30, 130, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1246, 30, 130, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1247, 30, 130, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1249, 30, 130, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1250, 30, 130, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00');

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
(30, 1, 129, 'service1', '', 'ddddddddddd', '234234234234234', 'India', 'service', '20.593684', '78.96288000000004', 1),
(31, 1, 138, 'service2', 'Sunset.jpg', 'bb', '232323232323223', 'Indiana, USA', 'service', '40.2671941', '-86.13490189999999', 1),
(32, 2, 136, 'service3', '', 'Test Demo', '8817453284', 'A, Deerbrook, WI 54424, USA', 'service', '45.2801325', '-89.07150560000002', 1),
(33, 1, 147, 'class1', 'Sunset1.jpg', 'We are web organization', '8817453284', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'class', '23.2332432', '77.4343394', 1),
(34, 1, 153, 'service4', 'Image91.png', 'this is what exatcly!!! gfdfg dfgdfg dfgdf gdfgdfg dfgdf dgdg dfgdf dfgdf gdfg gdg dggfgdfg dfgdfg dfgdfgdfg d fdgdfg dfgdgdfg dfgdfg dfgd dg dfgdfg dfgd dfg yes no wht exatly wht is not there is wht ', '123456789987686', 'India', 'service', '20.593684', '78.96288000000004', 1),
(40, 2, 196, 'service5', '', 'dasdsa das das das d asd asd as dsa d as dsa das d asd as d d as das d asd asd as das dsa ds adsa d asd as das  sad asd as das das  as sa sa das d sad asd as das d asd asdasd\r\nasd\r\nsad\r\nasdasdas dsa a', '555555555555555', 'Bhopal, Madhya Pradesh, India', 'service', '23.2599333', '77.41261499999996', 1),
(38, 1, 69, 'service6', 'play.png', 'this is like not !! updated one yaar', '233232323232323', 'Essen, Germany', 'service', '51.4556432', '7.011555199999975', 1),
(39, 1, 195, 'service7', '', 'desc', '455454444444444', 'Bangalore, Karnataka, India', 'service', '12.9715987', '77.59456269999998', 2),
(47, 1, 210, 'classbook', '', 'dsfdsf', '453543543543545', 'Mumbai, Maharashtra, India', 'class', '19.0759837', '72.87765590000004', 1),
(43, 2, 211, 'services8', '', 'desc', '34343243323', 'Mangalore, Karnataka, India', 'service', '12.9141417', '74.85595680000006', 1),
(49, 1, 216, 'class3', '', 'dfdsf', '324234234322343', 'United States', 'class', '37.09024', '-95.71289100000001', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_business_photogallery`
--

INSERT INTO `user_business_photogallery` (`id`, `user_business_details_id`, `title`, `description`, `photo`, `orderNum`) VALUES
(3, 34, 'pic1', '', 'default.jpg', 2),
(4, 34, 'pic2', '', 'eulogik2-e1350592057564.png', 2),
(5, 34, 'pic3', '', 'Image91.png', 5),
(6, 38, 'pic1', 'aaa', 'default1.jpg', 1),
(7, 30, 'pic1', '', '', 0),
(8, 47, 'pic1', 'desc', '', 0),
(9, 47, 'pic2', 'fggfd', 'voice_it_negativ_small2.png', 2),
(10, 47, 'cloud', '', '', 0);

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
  `modifiedStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_classes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=564 ;

--
-- Dumping data for table `user_business_posted_class`
--

INSERT INTO `user_business_posted_class` (`id`, `user_business_classes_id`, `start_date`, `end_date`, `lastdate_enroll`, `start_time`, `end_time`, `instructor`, `repeat_type`, `repeat_all_day`, `repeat_week_days`, `repeat_months`, `class_size`, `availability`, `seriesid`, `modifiedStatus`) VALUES
(321, 10, '2013-08-04', '2013-08-04', '2013-08-07', '04:00:00', '04:50:00', 226, 'daily', '1', '', '', 10, 9, 29, 0),
(242, 10, '2013-08-10', '2013-08-10', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 5, 13, 0),
(241, 10, '2013-08-09', '2013-08-09', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(240, 10, '2013-08-08', '2013-08-08', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(239, 10, '2013-08-07', '2013-08-07', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(238, 10, '2013-08-06', '2013-08-06', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(237, 10, '2013-08-05', '2013-08-05', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(236, 10, '2013-08-04', '2013-08-04', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(284, 10, '2013-08-06', '2013-08-06', '2013-08-08', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 1),
(259, 10, '2013-08-05', '2013-08-05', '2013-08-07', '10:00:00', '10:40:00', 215, 'daily', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(232, 10, '2013-08-10', '2013-08-10', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(231, 10, '2013-08-09', '2013-08-09', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(230, 9, '2013-08-07', '2013-08-07', '2013-08-07', '09:00:00', '10:00:00', 215, 'daily', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(229, 10, '2013-08-06', '2013-08-06', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(228, 10, '2013-08-05', '2013-08-05', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(227, 9, '2013-08-04', '2013-08-04', '2013-08-07', '09:00:00', '10:00:00', 215, 'daily', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(226, 9, '2013-11-04', '2013-11-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 20, 5, 0),
(225, 9, '2013-10-04', '2013-10-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 20, 5, 0),
(224, 9, '2013-09-04', '2013-09-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 19, 5, 0),
(264, 10, '2013-08-04', '2013-08-04', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(265, 10, '2013-08-05', '2013-08-05', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(433, 9, '2013-08-26', '2013-08-26', '2013-08-26', '08:00:00', '09:00:00', 226, 'daily', '1', '', '', 9, 9, 66, 1),
(432, 9, '2013-08-31', '2013-08-31', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 3, 65, 0),
(220, 9, '2013-08-12', '2013-08-12', '2013-08-06', '05:00:00', '06:00:00', 215, 'daily', '', '1,3,5,7,', '', 10, 10, 4, 1),
(431, 9, '2013-08-30', '2013-08-30', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 2, 65, 0),
(424, 0, '2013-08-12', '2013-08-12', '1970-01-01', '02:45:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 61, 0),
(286, 10, '2013-08-08', '2013-08-08', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(287, 10, '2013-08-09', '2013-08-09', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(423, 0, '2013-08-11', '2013-08-11', '1970-01-01', '01:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 60, 0),
(285, 10, '2013-08-07', '2013-08-07', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(244, 9, '2013-08-04', '2013-08-04', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,7,', '', 0, 0, 16, 0),
(245, 9, '2013-08-05', '2013-08-05', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,7,', '', 0, 0, 16, 0),
(278, 9, '2013-08-06', '2013-08-06', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(247, 9, '2013-08-04', '2013-08-04', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(248, 9, '2013-08-05', '2013-08-05', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(249, 10, '2013-08-06', '2013-08-06', '2013-08-07', '19:00:00', '19:40:00', 215, 'daily', '1', '', '', 10, 10, 18, 0),
(250, 9, '2013-08-07', '2013-08-07', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(251, 9, '2013-08-08', '2013-08-08', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(252, 9, '2013-08-09', '2013-08-09', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(253, 9, '2013-08-10', '2013-08-10', '2013-08-07', '19:00:00', '20:00:00', 226, 'daily', '1', '', '', 10, 10, 18, 0),
(254, 9, '2013-08-05', '2013-08-05', '2013-08-07', '20:00:00', '21:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 19, 0),
(255, 9, '2013-08-06', '2013-08-06', '2013-08-07', '20:00:00', '21:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 19, 0),
(256, 9, '2013-08-07', '2013-08-07', '2013-08-07', '20:00:00', '21:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 19, 0),
(257, 9, '2013-08-08', '2013-08-08', '2013-08-07', '20:00:00', '21:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 19, 0),
(283, 9, '2013-08-05', '2013-08-05', '2013-08-07', '13:45:00', '14:45:00', 226, 'daily', '1', '', '', 10, 10, 24, 1),
(260, 9, '2013-08-06', '2013-08-06', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(261, 10, '2013-08-07', '2013-08-07', '2013-08-07', '10:00:00', '10:40:00', 215, 'daily', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(262, 9, '2013-08-08', '2013-08-08', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(263, 9, '2013-08-09', '2013-08-09', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(266, 10, '2013-08-06', '2013-08-06', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(267, 10, '2013-08-07', '2013-08-07', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(268, 10, '2013-08-08', '2013-08-08', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(269, 10, '2013-08-09', '2013-08-09', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(270, 10, '2013-08-10', '2013-08-10', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(271, 10, '2013-08-04', '2013-08-04', '2013-08-07', '17:00:00', '17:40:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(272, 9, '2013-08-05', '2013-08-05', '2013-08-07', '17:00:00', '18:00:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(273, 10, '2013-08-06', '2013-08-06', '2013-08-07', '17:00:00', '17:40:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(274, 9, '2013-08-07', '2013-08-07', '2013-08-07', '17:00:00', '18:00:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(275, 9, '2013-08-08', '2013-08-08', '2013-08-07', '17:00:00', '18:00:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(276, 9, '2013-08-09', '2013-08-09', '2013-08-07', '17:00:00', '18:00:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(277, 9, '2013-08-10', '2013-08-10', '2013-08-07', '17:00:00', '18:00:00', 215, 'daily', '1', '', '', 10, 10, 22, 0),
(279, 10, '2013-08-07', '2013-08-07', '2013-08-07', '18:00:00', '18:40:00', 215, 'daily', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(280, 9, '2013-08-08', '2013-08-08', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(281, 9, '2013-08-09', '2013-08-09', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(282, 9, '2013-08-10', '2013-08-10', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(288, 10, '2013-08-10', '2013-08-10', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(409, 9, '2013-10-11', '2013-10-11', '1970-01-01', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 0, 0, 55, 0),
(410, 9, '2013-08-11', '2013-08-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(411, 9, '2013-09-11', '2013-09-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(408, 9, '2013-09-11', '2013-09-11', '1970-01-01', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 0, 0, 55, 0),
(404, 9, '2013-10-11', '2013-10-11', '2013-08-12', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 3, 3, 53, 0),
(403, 9, '2013-09-11', '2013-09-11', '2013-08-12', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 3, 3, 53, 0),
(429, 9, '2013-08-17', '2013-08-17', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(428, 9, '2013-08-16', '2013-08-16', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(362, 9, '2013-08-13', '2013-08-13', '1970-01-01', '02:00:00', '03:00:00', 215, 'daily', '1', '', '', 0, 0, 40, 0),
(430, 9, '2013-08-29', '2013-08-29', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 2, 65, 0),
(360, 9, '2013-08-11', '2013-08-11', '1970-01-01', '02:00:00', '03:00:00', 215, 'daily', '1', '', '', 0, 0, 40, 0),
(359, 9, '2013-08-11', '2013-08-11', '2013-08-12', '03:00:00', '04:00:00', 215, 'daily', '1', '', '', 8, 8, 39, 0),
(358, 0, '2013-08-04', '2013-08-04', '1970-01-01', '03:15:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 38, 0),
(316, 9, '2013-08-27', '2013-08-27', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(317, 9, '2013-08-28', '2013-08-28', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 18, 28, 0),
(353, 9, '2013-08-06', '2013-08-06', '2013-08-08', '01:15:00', '02:15:00', 226, 'daily', '1', '', '', 10, 10, 37, 1),
(318, 9, '2013-08-29', '2013-08-29', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 18, 28, 0),
(319, 9, '2013-08-30', '2013-08-30', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(320, 9, '2013-08-31', '2013-08-31', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(322, 10, '2013-08-05', '2013-08-05', '2013-08-07', '04:00:00', '04:40:00', 226, 'daily', '1', '', '', 10, 10, 29, 1),
(323, 10, '2013-08-06', '2013-08-06', '2013-08-07', '04:00:00', '04:40:00', 215, 'daily', '1', '', '', 10, 10, 29, 0),
(324, 9, '2013-08-07', '2013-08-07', '2013-08-07', '04:00:00', '05:00:00', 215, 'daily', '1', '', '', 10, 10, 29, 0),
(325, 10, '2013-08-08', '2013-08-08', '2013-08-07', '04:00:00', '04:40:00', 215, 'daily', '1', '', '', 10, 10, 29, 0),
(326, 10, '2013-08-09', '2013-08-09', '2013-08-07', '04:00:00', '04:50:00', 215, 'daily', '1', '', '', 10, 10, 29, 0),
(327, 10, '2013-08-10', '2013-08-10', '2013-08-07', '04:00:00', '04:40:00', 215, 'daily', '1', '', '', 10, 10, 29, 0),
(328, 9, '2013-08-04', '2013-08-04', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(329, 9, '2013-08-05', '2013-08-05', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(330, 9, '2013-08-06', '2013-08-06', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(331, 9, '2013-08-07', '2013-08-07', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(332, 9, '2013-08-08', '2013-08-08', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(333, 9, '2013-08-09', '2013-08-09', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,2,3,4,5,7,', '', 0, 0, 30, 0),
(350, 9, '2013-08-07', '2013-08-07', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(349, 9, '2013-08-06', '2013-08-06', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(348, 9, '2013-08-05', '2013-08-05', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(427, 9, '2013-08-15', '2013-08-15', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(392, 10, '2013-08-13', '2013-08-13', '2013-08-13', '06:00:00', '06:40:00', 215, 'daily', '', '2,3,4,5,6,', '', 10, 10, 50, 1),
(347, 9, '2013-08-04', '2013-08-04', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(351, 10, '2013-08-10', '2013-08-10', '2013-08-08', '02:00:00', '02:40:00', 215, 'daily', '1', '', '', 10, 10, 35, 1),
(412, 9, '2013-10-11', '2013-10-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(413, 9, '2013-11-11', '2013-11-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(414, 9, '2013-12-11', '2013-12-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(422, 0, '2013-08-12', '2013-08-12', '1970-01-01', '00:45:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 59, 0),
(421, 9, '2013-08-16', '2013-08-16', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(420, 9, '2013-08-15', '2013-08-15', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(419, 9, '2013-08-14', '2013-08-14', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(443, 9, '2013-08-25', '2013-08-25', '2013-08-26', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 4, 4, 68, 0),
(442, 9, '2013-08-31', '2013-08-31', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(441, 9, '2013-08-30', '2013-08-30', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(440, 9, '2013-08-29', '2013-08-29', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(439, 9, '2013-08-28', '2013-08-28', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(487, 9, '2013-09-01', '2013-09-01', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 3, 82, 0),
(446, 9, '2013-08-30', '2013-08-30', '2013-08-29', '06:15:00', '07:30:00', 270, 'daily', '1', '', '', 4548, 4548, 71, 0),
(447, 9, '2013-08-31', '2013-08-31', '2013-08-29', '06:15:00', '07:30:00', 270, 'daily', '1', '', '', 4548, 4548, 71, 0),
(448, 9, '2013-08-26', '2013-08-26', '2013-08-28', '04:00:00', '05:00:00', 269, 'daily', '', '1,3,5,7,', '', 55, 53, 72, 1),
(449, 9, '2013-08-28', '2013-08-28', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(450, 9, '2013-08-30', '2013-08-30', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(451, 9, '2013-09-01', '2013-09-01', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(452, 9, '2013-09-02', '2013-09-02', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(453, 10, '2013-08-26', '2013-08-26', '2013-08-27', '03:00:00', '03:40:00', 226, 'daily', '', '1,2,3,4,5,6,', '', 4, 3, 73, 1),
(488, 9, '2013-09-02', '2013-09-02', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 2, 82, 0),
(486, 9, '2013-08-29', '2013-08-29', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 6, 81, 0),
(485, 9, '2013-08-28', '2013-08-28', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 6, 81, 0),
(467, 10, '2013-08-27', '2013-08-27', '2013-08-27', '03:00:00', '03:40:00', 215, 'weekly', '', '1,2,3,4,', '', 4, 3, 77, 0),
(484, 9, '2013-08-27', '2013-08-27', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 5, 81, 0),
(489, 9, '2013-09-03', '2013-09-03', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 3, 82, 0),
(490, 9, '2013-09-04', '2013-09-04', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 3, 82, 0),
(491, 9, '2013-09-05', '2013-09-05', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 2, 82, 0),
(492, 9, '2013-09-06', '2013-09-06', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 3, 82, 0),
(493, 9, '2013-09-07', '2013-09-07', '2013-08-27', '01:15:00', '00:00:00', 226, 'daily', '1', '', '', 3, 2, 82, 1),
(494, 9, '2013-09-15', '2013-09-15', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 1, 83, 0),
(495, 9, '2013-09-16', '2013-09-16', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(496, 9, '2013-09-18', '2013-09-18', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(497, 9, '2013-09-20', '2013-09-20', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(498, 9, '2013-09-22', '2013-09-22', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(499, 9, '2013-09-23', '2013-09-23', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(500, 9, '2013-09-25', '2013-09-25', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(501, 9, '2013-09-27', '2013-09-27', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(502, 9, '2013-09-29', '2013-09-29', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(503, 9, '2013-09-30', '2013-09-30', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 2, 83, 0),
(504, 9, '2013-09-17', '2013-09-17', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(505, 9, '2013-09-19', '2013-09-19', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(506, 9, '2013-09-21', '2013-09-21', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(507, 9, '2013-09-24', '2013-09-24', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(508, 9, '2013-09-26', '2013-09-26', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(509, 9, '2013-09-28', '2013-09-28', '2013-09-08', '06:00:00', '07:00:00', 269, 'weekly', '', '2,4,6,', '', 2, 2, 84, 0),
(510, 9, '2013-09-16', '2013-09-16', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(511, 9, '2013-09-17', '2013-09-17', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(512, 9, '2013-09-18', '2013-09-18', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(513, 9, '2013-09-19', '2013-09-19', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(514, 9, '2013-09-20', '2013-09-20', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(515, 9, '2013-09-21', '2013-09-21', '2013-09-15', '09:00:00', '10:00:00', 226, 'weekly', '', '1,2,3,4,5,6,', '', 1, 1, 85, 0),
(516, 9, '2013-09-16', '2013-09-16', '2013-09-15', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 3, 3, 86, 0),
(517, 9, '2013-09-17', '2013-09-17', '2013-09-15', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 3, 3, 86, 0),
(518, 9, '2013-09-18', '2013-09-18', '2013-09-15', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 3, 3, 86, 0),
(519, 10, '2013-09-15', '2013-09-15', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(520, 10, '2013-09-16', '2013-09-16', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(521, 10, '2013-09-18', '2013-09-18', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(522, 10, '2013-09-20', '2013-09-20', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(523, 10, '2013-09-22', '2013-09-22', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(524, 10, '2013-09-23', '2013-09-23', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(525, 10, '2013-09-25', '2013-09-25', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(526, 10, '2013-09-27', '2013-09-27', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(527, 10, '2013-09-29', '2013-09-29', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
(528, 9, '2013-09-15', '2013-09-15', '2013-09-07', '16:00:00', '17:00:00', 226, 'weekly', '', '7,1,3,5,', '', 10, 10, 88, 0),
(529, 9, '2013-09-16', '2013-09-16', '2013-09-07', '16:00:00', '17:00:00', 226, 'weekly', '', '7,1,3,5,', '', 10, 10, 88, 0),
(530, 9, '2013-09-18', '2013-09-18', '2013-09-07', '16:00:00', '17:00:00', 226, 'weekly', '', '7,1,3,5,', '', 10, 10, 88, 0),
(531, 9, '2013-09-20', '2013-09-20', '2013-09-07', '16:00:00', '17:00:00', 226, 'weekly', '', '7,1,3,5,', '', 10, 10, 88, 0),
(532, 9, '2013-09-22', '2013-09-22', '2013-09-07', '16:00:00', '17:00:00', 226, 'weekly', '', '7,1,3,5,', '', 10, 10, 88, 0),
(533, 9, '2013-08-26', '2013-08-26', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 2, 89, 0),
(534, 9, '2013-08-27', '2013-08-27', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 4, 89, 0),
(535, 9, '2013-08-28', '2013-08-28', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 4, 89, 0),
(536, 9, '2013-08-29', '2013-08-29', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 3, 89, 0),
(537, 9, '2013-08-30', '2013-08-30', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 4, 89, 0),
(538, 9, '2013-08-31', '2013-08-31', '2013-08-27', '01:30:00', '02:30:00', 215, 'daily', '1', '', '', 4, 4, 89, 0),
(539, 9, '2013-08-26', '2013-08-26', '2013-08-29', '18:00:00', '19:00:00', 215, 'daily', '1', '', '', 6, 6, 90, 0),
(540, 10, '2013-08-25', '2013-08-25', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(541, 10, '2013-08-26', '2013-08-26', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(542, 10, '2013-08-27', '2013-08-27', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(543, 10, '2013-08-28', '2013-08-28', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(544, 10, '2013-08-29', '2013-08-29', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(545, 10, '2013-08-31', '2013-08-31', '2013-08-29', '20:00:00', '20:40:00', 215, 'weekly', '', '1,2,3,4,6,7,', '', 7, 7, 91, 0),
(546, 9, '2013-08-25', '2013-08-25', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(547, 9, '2013-08-26', '2013-08-26', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(548, 9, '2013-08-27', '2013-08-27', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(549, 9, '2013-08-28', '2013-08-28', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(550, 9, '2013-08-29', '2013-08-29', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(551, 9, '2013-08-30', '2013-08-30', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(552, 9, '2013-08-31', '2013-08-31', '2013-08-29', '12:00:00', '13:00:00', 215, 'daily', '1', '', '', 4, 4, 94, 0),
(553, 9, '2013-08-25', '2013-08-25', '2013-08-29', '21:00:00', '22:00:00', 269, 'daily', '1', '', '', 3, 3, 95, 0),
(554, 9, '2013-08-25', '2013-08-25', '2013-08-29', '22:00:00', '23:00:00', 269, 'daily', '1', '', '', 4, 4, 96, 0),
(563, 9, '2013-09-01', '2013-09-01', '2013-09-04', '02:45:00', '00:00:00', 215, 'daily', '1', '', '', 25, 25, 99, 0),
(562, 9, '2013-09-01', '2013-09-01', '2013-09-04', '05:00:00', '00:00:00', 215, 'daily', '1', '', '', 10, 10, 98, 0);

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
,`category_name` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_client_appoinment_details`
--
CREATE TABLE IF NOT EXISTS `view_client_appoinment_details` (
`id` int(11)
,`start_time` datetime
,`employee_last_name` varchar(50)
,`type` enum('service','class')
,`business_name` varchar(100)
,`employee_first_name` varchar(50)
,`services_id` varchar(50)
,`user_business_details_id` int(11)
,`employee_id` int(11)
,`note` text
,`status` enum('booked','cancelled')
,`appointment_date` datetime
,`end_time` datetime
,`users_id` int(11)
,`category_name` varchar(100)
,`clients_first_name` varchar(50)
,`clients_last_name` varchar(50)
,`business_details_id` int(11)
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
-- Stand-in structure for view `view_client_class_booking`
--
CREATE TABLE IF NOT EXISTS `view_client_class_booking` (
`note` varchar(100)
,`date` date
,`user_business_posted_class_id` int(11)
,`users_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`phone_number` int(15)
,`email` varchar(50)
,`start_time` time
,`end_time` time
,`id` int(11)
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

CREATE VIEW `view_classes_posted_business` AS select `user_business_posted_class`.`user_business_classes_id` AS `user_business_classes_id`,`user_business_posted_class`.`start_date` AS `start_date`,`user_business_posted_class`.`end_date` AS `end_date`,`user_business_posted_class`.`lastdate_enroll` AS `lastdate_enroll`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`user_business_posted_class`.`instructor` AS `instructor`,`user_business_posted_class`.`repeat_type` AS `repeat_type`,`user_business_posted_class`.`repeat_all_day` AS `repeat_all_day`,`user_business_posted_class`.`repeat_week_days` AS `repeat_week_days`,`user_business_posted_class`.`repeat_months` AS `repeat_months`,`user_business_classes`.`user_business_details_id` AS `user_business_details_id`,`user_business_posted_class`.`id` AS `id`,`user_business_classes`.`name` AS `name`,`user_business_classes`.`price` AS `price`,`user_business_classes`.`price_type` AS `price_type`,`user_business_classes`.`timelength` AS `timelength`,`user_business_classes`.`time_type` AS `time_type`,`user_business_classes`.`padding_time` AS `padding_time`,`user_business_classes`.`padding_time_type` AS `padding_time_type`,`user_business_classes`.`details` AS `details`,`users`.`first_name` AS `instructor_firstname`,`users`.`last_name` AS `instructor_lastname`,`user_business_posted_class`.`class_size` AS `class_size`,`user_business_posted_class`.`availability` AS `availability`,`category`.`name` AS `category_name` from ((((`user_business_posted_class` join `user_business_classes` on((`user_business_posted_class`.`user_business_classes_id` = `user_business_classes`.`id`))) join `users` on((`user_business_posted_class`.`instructor` = `users`.`id`))) join `user_business_details` on((`user_business_classes`.`user_business_details_id` = `user_business_details`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_appoinment_details`
--
DROP TABLE IF EXISTS `view_client_appoinment_details`;

CREATE VIEW `view_client_appoinment_details` AS select `client_service_appointments`.`id` AS `id`,`client_service_appointments`.`start_time` AS `start_time`,`users`.`last_name` AS `employee_last_name`,`client_service_appointments`.`type` AS `type`,`user_business_details`.`name` AS `business_name`,`users`.`first_name` AS `employee_first_name`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`user_business_details_id` AS `user_business_details_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`appointment_date` AS `appointment_date`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`users_id` AS `users_id`,`category`.`name` AS `category_name`,`clients_details`.`first_name` AS `clients_first_name`,`clients_details`.`last_name` AS `clients_last_name`,`user_business_details`.`id` AS `business_details_id` from ((((`client_service_appointments` join `user_business_details` on((`client_service_appointments`.`user_business_details_id` = `user_business_details`.`id`))) join `users` on((`client_service_appointments`.`employee_id` = `users`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`))) join `users` `clients_details` on((`client_service_appointments`.`users_id` = `clients_details`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_buisness_services_appointments`
--
DROP TABLE IF EXISTS `view_client_buisness_services_appointments`;

CREATE  VIEW `view_client_buisness_services_appointments` AS select `user_business_details`.`category_id` AS `category_id`,`user_business_details`.`name` AS `name`,`user_business_details`.`image` AS `image`,`user_business_details`.`description` AS `description`,`user_business_services`.`id` AS `service_id`,`user_business_services`.`user_business_details_id` AS `user_business_details_id`,`user_business_services`.`name` AS `service_name`,`user_business_services`.`price_type` AS `price_type`,`user_business_services`.`price` AS `price`,`user_business_services`.`timelength` AS `timelength`,`user_business_services`.`time_type` AS `time_type`,`user_business_services`.`padding_time` AS `padding_time`,`user_business_services`.`padding_time_type` AS `padding_time_type`,`user_business_services`.`details` AS `details`,`client_service_appointments`.`start_time` AS `start_time`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`users_id` AS `users_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`id` AS `id`,`users`.`user_role` AS `user_role` from (((`user_business_details` join `user_business_services` on((`user_business_details`.`id` = `user_business_services`.`user_business_details_id`))) join `client_service_appointments` on((`user_business_services`.`id` = `client_service_appointments`.`services_id`))) join `users` on((`client_service_appointments`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_class_booking`
--
DROP TABLE IF EXISTS `view_client_class_booking`;

CREATE  VIEW `view_client_class_booking` AS select `client_class_booking`.`note` AS `note`,`client_class_booking`.`date` AS `date`,`client_class_booking`.`user_business_posted_class_id` AS `user_business_posted_class_id`,`client_class_booking`.`users_id` AS `users_id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone_number` AS `phone_number`,`users`.`email` AS `email`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`client_class_booking`.`id` AS `id` from ((`client_class_booking` join `users` on((`client_class_booking`.`users_id` = `users`.`id`))) join `user_business_posted_class` on((`client_class_booking`.`user_business_posted_class_id` = `user_business_posted_class`.`id`)));

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
