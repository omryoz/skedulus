-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2013 at 12:56 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `business_clients_list`
--

INSERT INTO `business_clients_list` (`id`, `users_id`, `user_business_details_id`) VALUES
(1, 193, 38),
(11, 136, 30),
(18, 136, 0),
(19, 136, 0),
(20, 136, 0),
(21, 136, 0),
(22, 136, 0),
(23, 136, 0),
(24, 136, 0),
(49, 136, 39),
(52, 0, 30),
(53, 0, 30),
(54, 223, 30),
(55, 223, 33),
(56, 224, 30),
(58, 224, 33),
(61, 225, 33),
(68, 225, 47),
(70, 225, 30),
(71, 136, 47),
(73, 129, 30),
(74, 129, 0),
(75, 263, 47),
(76, 264, 47),
(77, 265, 47),
(78, 266, 47),
(79, 267, 47),
(80, 271, 47),
(81, 272, 47),
(82, 278, 0),
(83, 278, 30),
(85, 278, 34),
(86, 278, 38),
(87, 278, 39),
(88, 278, 47),
(89, 278, 32),
(90, 278, 40),
(92, 279, 47),
(94, 30, 30);

-- --------------------------------------------------------

--
-- Table structure for table `business_employees`
--

CREATE TABLE IF NOT EXISTS `business_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `employee_type` enum('supervisor','employee') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=180 ;

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
(83, 47, 270, 'employee'),
(84, 30, 227, 'employee'),
(85, 30, 228, 'employee'),
(86, 30, 229, 'employee'),
(87, 30, 230, 'employee'),
(88, 30, 231, 'employee'),
(89, 30, 232, 'employee'),
(90, 30, 233, 'employee'),
(91, 30, 234, 'employee'),
(92, 30, 228, 'employee'),
(93, 30, 229, 'employee'),
(94, 30, 230, 'employee'),
(95, 30, 231, 'employee'),
(96, 30, 232, 'employee'),
(97, 30, 233, 'employee'),
(98, 30, 234, 'employee'),
(99, 30, 235, 'employee'),
(100, 30, 236, 'employee'),
(101, 30, 237, 'employee'),
(102, 30, 238, 'employee'),
(103, 30, 239, 'employee'),
(104, 30, 240, 'employee'),
(105, 30, 241, 'employee'),
(106, 30, 242, 'employee'),
(107, 30, 243, 'employee'),
(108, 30, 244, 'employee'),
(109, 30, 245, 'employee'),
(110, 30, 246, 'employee'),
(111, 30, 247, 'employee'),
(112, 30, 248, 'employee'),
(113, 30, 249, 'employee'),
(114, 30, 250, 'employee'),
(115, 30, 251, 'employee'),
(116, 30, 252, 'employee'),
(117, 30, 253, 'employee'),
(118, 30, 254, 'employee'),
(119, 30, 255, 'employee'),
(120, 30, 256, 'employee'),
(121, 30, 257, 'employee'),
(122, 30, 258, 'employee'),
(123, 30, 259, 'employee'),
(124, 30, 260, 'employee'),
(125, 30, 261, 'employee'),
(126, 30, 262, 'employee'),
(127, 30, 263, 'employee'),
(128, 30, 264, 'employee'),
(129, 30, 265, 'employee'),
(130, 30, 266, 'employee'),
(131, 30, 267, 'employee'),
(132, 30, 268, 'employee'),
(133, 30, 269, 'employee'),
(134, 30, 270, 'employee'),
(135, 30, 271, 'employee'),
(136, 30, 272, 'employee'),
(137, 30, 273, 'employee'),
(138, 30, 274, 'employee'),
(139, 30, 275, 'employee'),
(140, 30, 276, 'employee'),
(141, 30, 277, 'employee'),
(142, 30, 278, 'employee'),
(143, 30, 279, 'employee'),
(144, 30, 280, 'employee'),
(145, 30, 281, 'employee'),
(146, 30, 282, 'employee'),
(147, 30, 283, 'employee'),
(148, 30, 284, 'employee'),
(149, 30, 285, 'employee'),
(150, 30, 286, 'employee'),
(151, 30, 287, 'employee'),
(152, 30, 288, 'employee'),
(153, 30, 289, 'employee'),
(154, 30, 290, 'employee'),
(155, 30, 291, 'employee'),
(156, 30, 292, 'employee'),
(157, 30, 293, 'employee'),
(158, 30, 294, 'employee'),
(159, 30, 295, 'employee'),
(160, 30, 296, 'employee'),
(161, 30, 297, 'employee'),
(162, 30, 298, 'employee'),
(163, 30, 299, 'employee'),
(164, 30, 300, 'employee'),
(165, 30, 301, 'employee'),
(166, 30, 302, 'employee'),
(167, 30, 303, 'employee'),
(168, 30, 304, 'employee'),
(169, 30, 305, 'employee'),
(170, 30, 306, 'employee'),
(171, 30, 307, 'employee'),
(172, 30, 308, 'employee'),
(173, 30, 309, 'employee'),
(174, 30, 310, 'employee'),
(175, 30, 311, 'employee'),
(176, 30, 312, 'employee'),
(177, 30, 313, 'employee'),
(178, 30, 314, 'employee'),
(179, 47, 315, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `business_employees_availlability`
--

CREATE TABLE IF NOT EXISTS `business_employees_availlability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_employees_id` int(11) NOT NULL,
  `monday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thursday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `business_employees_id` (`business_employees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_notification_settings`
--

CREATE TABLE IF NOT EXISTS `business_notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `appointment_reminders` enum('on','off') CHARACTER SET latin1 NOT NULL,
  `remind_before` time NOT NULL,
  `cancel_reschedule_before` int(11) NOT NULL,
  `book_before` int(11) NOT NULL,
  `send_email` enum('on','off') CHARACTER SET latin1 NOT NULL,
  `send_message` enum('on','off') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `business_notification_settings`
--

INSERT INTO `business_notification_settings` (`id`, `user_business_details_id`, `appointment_reminders`, `remind_before`, `cancel_reschedule_before`, `book_before`, `send_email`, `send_message`) VALUES
(1, 31, 'on', '00:00:00', 0, 0, 'on', 'off'),
(2, 34, 'off', '01:45:00', 0, 0, 'on', 'off'),
(3, 38, 'off', '09:15:00', 10, 11, 'off', 'off'),
(4, 47, 'on', '07:30:00', 19, 8, 'off', 'on'),
(5, 30, 'on', '07:00:00', 2, 2, 'on', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `business_offers`
--

CREATE TABLE IF NOT EXISTS `business_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `services` varchar(50) CHARACTER SET latin1 NOT NULL,
  `title` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` enum('combo','individual') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `calendar_id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY (`calendar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_class_booking`
--

CREATE TABLE IF NOT EXISTS `client_class_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `user_business_posted_class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_posted_class_id` (`user_business_posted_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `client_class_booking`
--

INSERT INTO `client_class_booking` (`id`, `users_id`, `user_business_posted_class_id`, `date`, `note`) VALUES
(56, 252, 360, '2013-08-14', 'notess'),
(57, 253, 360, '2013-08-14', 'notess'),
(58, 254, 360, '2013-08-14', 'notesss'),
(59, 255, 360, '2013-08-14', 'dddd'),
(60, 256, 360, '2013-08-14', 'dddd'),
(61, 257, 360, '2013-08-14', ''),
(62, 258, 360, '2013-08-14', ''),
(63, 259, 360, '2013-08-14', ''),
(64, 260, 360, '2013-08-14', ''),
(65, 261, 360, '2013-08-14', ''),
(66, 262, 360, '2013-08-14', ''),
(67, 263, 360, '2013-08-14', ''),
(68, 264, 360, '2013-08-14', ''),
(69, 265, 359, '2013-08-16', ''),
(70, 266, 359, '2013-08-16', ''),
(71, 267, 0, '2013-08-17', ''),
(72, 271, 430, '2013-08-26', 'yes'),
(73, 272, 430, '2013-08-26', 'yesss'),
(77, 136, 430, '2013-08-26', ''),
(80, 136, 320, '2013-08-26', 'new class booking'),
(81, 136, 445, '2013-08-26', 'yeahh'),
(82, 136, 319, '2013-08-27', 'on 27thaug'),
(83, 136, 318, '2013-08-27', 'on 27thaug'),
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
  `type` enum('service','class') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `booked_by` enum('client','manager') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=234 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `user_business_details_id`, `users_id`, `start_time`, `end_time`, `services_id`, `employee_id`, `note`, `status`, `appointment_date`, `type`, `booked_by`) VALUES
(147, 30, 136, '2013-10-04 13:00:00', '2013-10-04 14:00:00', '73', 0, 'yeah', 'booked', '2013-10-04 07:10:11', 'service', 'client'),
(149, 47, 136, '2013-08-26 01:30:00', '2013-08-26 02:30:00', '533', 0, '', 'booked', '2013-08-30 08:08:48', 'class', 'client'),
(150, 47, 136, '2013-08-26 04:00:00', '2013-08-26 05:00:00', '448', 0, '', 'booked', '2013-08-30 08:08:52', 'class', 'client'),
(154, 30, 136, '2013-09-01 10:00:00', '2013-09-01 10:56:00', '73', 130, 'm', 'booked', '2013-09-18 09:09:58', 'service', 'client'),
(155, 30, 136, '2013-08-27 01:08:00', '2013-08-27 03:08:00', '71,73,74', 0, 'book', 'booked', '2013-08-30 01:08:25', 'service', 'client'),
(156, 30, 136, '2013-08-28 04:08:00', '2013-08-28 06:08:00', '71,73,74', 0, 'booked', 'booked', '2013-08-30 01:08:15', 'service', 'client'),
(157, 30, 129, '2013-08-31 04:08:00', '2013-08-31 05:08:00', '71', 0, 'service to client', 'booked', '2013-08-31 07:08:54', 'service', 'client'),
(158, 30, 129, '2013-09-01 06:09:00', '2013-09-01 07:09:00', '71', 0, '1sept for client1234', 'booked', '2013-08-31 09:08:39', 'service', 'client'),
(159, 30, 129, '2013-09-02 03:09:00', '2013-09-02 04:09:00', '71', 0, '2sept', 'booked', '2013-08-31 09:08:18', 'service', 'client'),
(160, 47, 136, '2013-09-04 07:00:00', '2013-09-04 08:00:00', '224', 0, '', 'booked', '2013-09-02 07:09:37', 'class', 'client'),
(162, 47, 136, '2013-09-07 01:00:00', '2013-09-07 02:00:00', '493', 0, '', 'booked', '2013-09-02 07:09:49', 'class', 'client'),
(163, 47, 136, '2013-09-02 01:00:00', '2013-09-02 02:00:00', '488', 0, '', 'booked', '2013-09-04 09:09:26', 'class', 'client'),
(164, 47, 136, '2013-09-15 04:00:00', '2013-09-15 05:00:00', '494', 0, '', 'booked', '2013-09-16 07:09:13', 'class', 'client'),
(165, 30, 136, '2013-09-15 14:09:00', '1970-01-01 01:01:00', '71,73', 0, '', 'booked', '2013-09-16 08:09:00', 'service', 'client'),
(166, 30, 0, '2013-09-15 01:09:00', '1970-01-01 01:01:00', '71', 0, 'hh', 'booked', '2013-09-16 12:09:56', 'service', 'client'),
(167, 30, 30, '2013-09-17 10:00:00', '2013-09-17 00:00:00', '0', 130, 'todaysss', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(168, 30, 30, '2013-09-17 10:00:00', '2013-09-17 00:00:00', '0', 130, '17septfemberrr', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(169, 30, 30, '2013-09-17 10:00:00', '2013-09-17 00:00:00', '0', 130, '17septfemberrr', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(170, 30, 30, '2013-09-18 10:00:00', '2013-09-18 00:00:00', '0', 0, 'mmm', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(171, 30, 30, '2013-09-18 10:00:00', '2013-09-18 00:00:00', '71,73,', 130, '', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(172, 30, 30, '2013-09-18 10:00:00', '2013-09-18 00:00:00', '71,73,', 130, '', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(173, 30, 136, '2013-09-15 02:09:00', '1970-01-01 01:01:00', '71,73', 0, 'noteeee', 'booked', '2013-09-17 11:09:34', 'service', 'client'),
(174, 30, 30, '2013-09-17 10:00:00', '2013-09-17 00:00:00', '71,73', 0, '', 'booked', '2013-09-17 00:00:00', 'service', 'client'),
(177, 0, 136, '2013-09-01 10:00:00', '2013-09-01 00:00:00', '73', 130, 'm', 'booked', '2013-09-18 08:09:10', 'service', 'client'),
(181, 0, 136, '2013-09-01 10:00:00', '2013-09-01 00:00:00', '73', 130, 'm', 'booked', '2013-09-18 08:09:40', 'service', 'client'),
(189, 30, 136, '2013-09-19 10:00:00', '2013-09-19 10:56:00', '73,', 0, 'mesage', 'booked', '2013-09-19 12:09:42', 'service', 'client'),
(197, 30, 136, '2013-09-20 01:09:00', '1970-01-01 01:01:00', '71', 0, '', 'booked', '2013-09-19 09:09:15', 'service', 'client'),
(199, 30, 136, '2013-09-17 17:09:00', '2013-09-17 17:09:00', '', 0, '', 'booked', '2013-09-19 09:09:56', 'service', 'client'),
(201, 30, 136, '2013-09-19 00:00:00', '2013-09-19 00:00:00', '', 0, '', 'booked', '2013-09-19 01:09:16', 'service', 'client'),
(203, 0, 129, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 'SelectService', 0, '', 'booked', '2013-09-19 01:09:13', 'service', 'client'),
(204, 30, 136, '2013-09-21 03:30:00', '1970-01-01 01:00:00', '71,73', 0, '', 'booked', '2013-09-20 08:09:49', 'service', 'client'),
(206, 30, 0, '2013-09-24 06:00:00', '1970-01-01 01:00:00', '71', 130, 'fdsfsdf', 'booked', '2013-09-23 02:09:08', 'service', 'client'),
(207, 30, 0, '2013-09-25 03:15:00', '1970-01-01 01:00:00', '71', 130, 'sss', 'booked', '2013-09-23 02:09:44', 'service', 'client'),
(208, 30, 136, '2013-09-22 01:45:00', '1970-01-01 01:00:00', '71', 0, '', 'booked', '2013-09-24 08:09:25', 'service', 'client'),
(209, 30, 136, '2013-09-26 10:00:00', '2013-09-26 10:30:00', '71', 0, '', 'booked', '2013-09-24 11:09:26', 'service', 'client'),
(215, 47, 136, '2013-09-23 15:00:00', '2013-09-23 15:40:00', '524', 0, 's', 'booked', '2013-09-25 02:09:33', 'class', 'client'),
(216, 47, 136, '2013-09-23 04:00:00', '2013-09-23 05:00:00', '499', 0, 'ss', 'booked', '2013-09-25 02:09:40', 'class', 'client'),
(217, 30, 136, '2013-09-28 17:00:00', '1970-01-01 01:00:00', '73', 0, '×¡×¤×¨', 'booked', '2013-09-27 02:09:12', 'service', 'client'),
(218, 30, 136, '2013-09-29 16:00:00', '1970-01-01 01:00:00', '71', 0, '×¡×¤×¨', 'booked', '2013-09-27 02:09:27', 'service', 'client'),
(219, 0, 129, '2013-10-03 10:00:00', '2013-10-03 00:00:00', '73,', 0, '', 'booked', '2013-09-30 12:09:35', 'service', 'client'),
(220, 0, 129, '2013-10-06 09:00:00', '2013-10-06 00:00:00', '', 0, '', 'booked', '2013-09-30 01:09:34', 'service', 'client'),
(221, 30, 129, '2013-09-30 11:45:00', '2013-09-30 00:00:00', '', 0, '', 'booked', '2013-09-30 02:09:34', 'service', 'client'),
(222, 30, 129, '2013-09-30 12:00:00', '2013-09-30 00:00:00', '', 0, '', 'booked', '2013-09-30 02:09:55', 'service', 'client'),
(223, 47, 136, '2013-08-04 09:00:00', '2013-08-04 10:00:00', '227', 0, '', 'booked', '2013-10-01 07:10:30', 'class', 'client'),
(224, 47, 136, '2013-08-05 13:45:00', '2013-08-05 14:45:00', '283', 0, '', 'booked', '2013-10-01 07:10:18', 'class', 'client'),
(225, 0, 136, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '230', 0, '0', 'booked', '2013-10-01 07:10:26', 'class', 'client'),
(226, 47, 136, '2013-08-07 09:00:00', '2013-08-07 10:00:00', '230', 0, '', 'booked', '2013-10-01 07:10:26', 'class', 'client'),
(227, 0, 136, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '410', 0, '0', 'booked', '2013-10-01 07:10:29', 'class', 'client'),
(228, 47, 136, '2013-08-11 09:00:00', '2013-08-11 10:00:00', '410', 0, '', 'booked', '2013-10-01 07:10:29', 'class', 'client'),
(229, 47, 136, '2013-08-26 08:00:00', '2013-08-26 09:00:00', '433', 0, '', 'booked', '2013-10-01 07:10:33', 'class', 'client'),
(230, 0, 136, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '433', 0, '0', 'booked', '2013-10-01 07:10:33', 'class', 'client'),
(231, 30, 136, '2013-09-29 09:00:00', '2013-09-29 00:00:00', ' ', 0, '', 'booked', '2013-10-01 08:10:24', 'service', 'client'),
(232, 30, 136, '2013-10-03 12:00:00', '2013-10-03 00:00:00', '71,73,', 0, '', 'booked', '2013-10-03 08:10:06', 'service', 'client'),
(233, 47, 136, '2013-10-11 09:00:00', '2013-10-11 10:00:00', '412', 0, '', 'booked', '2013-10-09 12:10:06', 'class', 'client');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_lunchtime`
--

CREATE TABLE IF NOT EXISTS `employee_lunchtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_availability_id` int(11) NOT NULL,
  `monday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tuesday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wednesday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thursday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `saturday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sunday` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_availability_id` (`employee_availability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=309 ;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`id`, `business_id`, `service_id`, `users_id`) VALUES
(26, 31, 76, 148),
(27, 31, 75, 150),
(29, 33, 4, 151),
(30, 33, 78, 152),
(65, 38, 84, 174),
(67, 38, 84, 176),
(68, 38, 84, 184),
(69, 38, 84, 185),
(70, 38, 84, 190),
(84, 40, 85, 203),
(107, 38, 84, 192),
(108, 38, 84, 0),
(138, 38, 84, 206),
(144, 38, 86, 176),
(145, 38, 86, 177),
(146, 38, 86, 179),
(147, 38, 84, 186),
(149, 38, 83, 177),
(150, 38, 83, 178),
(151, 38, 83, 179),
(152, 38, 83, 180),
(153, 38, 83, 186),
(154, 38, 83, 187),
(155, 38, 83, 190),
(156, 38, 83, 206),
(157, 38, 84, 175),
(158, 38, 83, 175),
(159, 38, 86, 175),
(160, 43, 88, 0),
(161, 43, 88, 213),
(162, 44, 8, 214),
(166, 47, 9, 226),
(167, 47, 9, 268),
(170, 30, 73, 130),
(171, 30, 74, 130),
(172, 30, 74, 131),
(175, 30, 71, 130),
(176, 30, 71, 131),
(177, 30, 71, 227),
(179, 47, 12, 226),
(180, 47, 9, 215),
(187, 30, 71, 228),
(188, 30, 73, 228),
(191, 30, 71, 229),
(192, 30, 73, 229),
(193, 30, 71, 230),
(194, 30, 73, 230),
(195, 30, 71, 231),
(198, 30, 71, 232),
(199, 30, 73, 232),
(200, 30, 71, 233),
(201, 30, 71, 234),
(202, 30, 71, 235),
(203, 30, 71, 236),
(204, 30, 73, 236),
(205, 30, 71, 239),
(206, 30, 73, 239),
(207, 30, 71, 240),
(208, 30, 73, 240),
(209, 30, 71, 241),
(210, 30, 73, 241),
(211, 30, 71, 242),
(212, 30, 73, 242),
(213, 30, 71, 243),
(214, 30, 73, 243),
(215, 30, 71, 244),
(216, 30, 73, 244),
(217, 30, 71, 245),
(218, 30, 73, 245),
(219, 30, 71, 246),
(220, 30, 73, 246),
(221, 30, 71, 256),
(222, 30, 73, 256),
(223, 30, 71, 269),
(224, 30, 73, 269),
(225, 30, 71, 272),
(226, 30, 73, 272),
(227, 30, 71, 273),
(228, 30, 73, 273),
(229, 30, 71, 274),
(230, 30, 73, 274),
(231, 30, 71, 275),
(232, 30, 71, 277),
(233, 30, 73, 277),
(234, 30, 71, 279),
(235, 30, 71, 280),
(236, 30, 73, 280),
(237, 30, 71, 281),
(238, 30, 73, 281),
(239, 30, 71, 282),
(240, 30, 73, 282),
(241, 30, 71, 283),
(242, 30, 73, 283),
(243, 30, 71, 284),
(244, 30, 73, 284),
(245, 30, 71, 285),
(246, 30, 73, 285),
(247, 30, 71, 286),
(248, 30, 71, 287),
(249, 30, 71, 288),
(250, 30, 73, 288),
(251, 30, 71, 289),
(252, 30, 73, 289),
(253, 30, 71, 290),
(254, 30, 73, 290),
(255, 30, 71, 291),
(256, 30, 74, 291),
(257, 30, 71, 292),
(262, 30, 71, 294),
(263, 30, 74, 294),
(265, 30, 71, 297),
(266, 30, 71, 298),
(267, 30, 73, 298),
(268, 30, 71, 299),
(269, 30, 73, 299),
(270, 30, 71, 300),
(271, 30, 73, 300),
(272, 30, 71, 301),
(273, 30, 73, 301),
(274, 30, 71, 302),
(275, 30, 73, 302),
(276, 30, 71, 303),
(277, 30, 73, 303),
(278, 30, 71, 304),
(279, 30, 73, 304),
(280, 30, 71, 305),
(281, 30, 73, 305),
(282, 30, 71, 306),
(283, 30, 73, 306),
(291, 30, 71, 308),
(293, 30, 71, 309),
(294, 30, 73, 309),
(295, 30, 74, 309),
(296, 30, 71, 310),
(297, 30, 73, 310),
(298, 30, 71, 311),
(299, 30, 73, 311),
(300, 30, 71, 312),
(301, 30, 71, 313),
(302, 30, 73, 313),
(303, 30, 71, 314),
(304, 30, 73, 314),
(305, 30, 74, 314),
(308, 47, 9, 315);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_description` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `calendar_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `all_day` smallint(6) DEFAULT '0',
  `repeat_mode` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `repeat_count` int(11) DEFAULT NULL,
  `day_only_weekdays` int(11) DEFAULT NULL,
  `week_days` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'comma number of days',
  `month_weeknumber` int(11) DEFAULT NULL,
  `month_weekday` int(11) DEFAULT NULL,
  `month_repeatdate` datetime DEFAULT NULL,
  `event_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rel_event_id` int(11) DEFAULT NULL,
  `repeat_end_date` datetime DEFAULT NULL,
  `event_delete_ind` int(11) DEFAULT NULL,
  `recur_sequence` int(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `events_ibfk_1` (`calendar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posted_class_series`
--

CREATE TABLE IF NOT EXISTS `posted_class_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_classes_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

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
(99, 9, '2013-09-04 09:09:12'),
(100, 9, '2013-09-27 07:09:25'),
(101, 9, '2013-09-27 09:09:56'),
(102, 9, '2013-09-27 09:09:09'),
(103, 9, '2013-10-01 08:10:17'),
(104, 9, '2013-10-01 08:10:54'),
(105, 9, '2013-10-01 08:10:18'),
(106, 9, '2013-10-01 08:10:52'),
(107, 9, '2013-10-03 11:10:57'),
(108, 9, '2013-10-03 13:10:28'),
(109, 9, '2013-10-03 13:10:33'),
(110, 9, '2013-10-03 13:10:13'),
(111, 9, '2013-10-03 13:10:49'),
(112, 9, '2013-10-03 13:10:12'),
(113, 9, '2013-10-04 07:10:33'),
(114, 10, '2013-10-04 07:10:59'),
(115, 9, '2013-10-04 07:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(250) CHARACTER SET latin1 NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','deactive') CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
  `employees` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `businesses_offers` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pictures` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reports` enum('basic','enhanced') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `promotion_notifications` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `businesses` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` enum('client','manager','employee') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(15) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 NOT NULL,
  `activationkey` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_id` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=316 ;

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
(136, 'client', 'client@gmail.com', 'fac04ca68a48af91f0290001604a2463', 'client', 'C', 2147483647, 'female', '1977-03-03', 'abuttsdd ''s  fdgdggdfg dfgdfg fdgdfg dfg this''s is  its''s''ssgfgfgdgs  dfgdfgg dfgdfg  fdgfdgdfg dfgdfgfdgdfgdfgdf dfgfdgdfgfdgdf gdddddddddddddd ddddddddddddd ddddddddd ddddddd    ddddpp', '', 'active', '', '0000-00-00 00:00:00'),
(137, 'manager', 'businessmen@gmail.com', 'e6072e821b6854ced4d8fd40319c4846', 'businessmen', 'businessmen', 0, 'male', '1980-01-18', '', '', 'inactive', '8f2e695699b44b8e86d3106f6fd276d3', '0000-00-00 00:00:00'),
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
(193, 'client', 'someone@gmail.com', '', 'client1342342424', 'client2', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(194, 'employee', 'july@gmail.com', '', '10thjjj juuu', 'julyy', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'dbda2663440b3ea5c6b6e23e93615a31', '0000-00-00 00:00:00'),
(195, 'manager', 'garima.soni@gmail.com', '003b1930f338263e1c4fd8fca7342e8f', 'garima', 'soni', 0, 'male', '0000-00-00', '', '', 'active', 'acea17fbf13fcf047ec37055d117d819', '2013-07-10 12:20:18'),
(196, 'manager', 'palak.m@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'palak', 'M', 0, 'male', '0000-00-00', '', '', 'active', '2289587f8c010dcc8308b6dc1aeec296', '2013-07-10 12:36:43'),
(203, 'employee', 'dfgdfgdfgdfg@gmil.com', '', 'qrqrqrq', 'dgdfgdfg', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'e977e38404e5956eb024e461aba87c4f', '0000-00-00 00:00:00'),
(204, 'employee', 'gdfgdfgdfgdfgdfg@gmail.com', '', 'gdfgdgdfg', 'dfgdfgdfgdf', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'ee103941ab9b49d75bf7ba64b89b6378', '0000-00-00 00:00:00'),
(205, 'employee', 'dsfsdffdfsdsdfsd@gmail.com', '', 'sdfdsfsdf', 'sdfsdfsdf', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '57e9c1505cdc78b5c59e95469a9d08d9', '0000-00-00 00:00:00'),
(206, 'employee', 'last@gmail.com', '', 'fwww', 'lastnameee', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '9d66abaa780070934695411eb0110008', '0000-00-00 00:00:00'),
(207, 'manager', 'pank@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'pank', 'p', 0, 'male', '0000-00-00', '', '', 'active', 'de1327df241895982162cc4867156373', '2013-07-11 10:42:57'),
(208, 'client', 'swathinreddy@yahoo.coin', '808cc384945f0fae637478615cba529b', 'Swathi', 'Reddy', 0, 'female', '1988-02-22', '', '', 'active', '0', '2013-07-15 06:50:41'),
(210, 'manager', 'class.book@gmail.com', '0e96621d282cd9581dfbf17a879a7d77', 'class', 'book', 0, 'male', '0000-00-00', '', '', 'active', '8aebf419167546c486531e748c6f4d58', '2013-07-15 07:37:21'),
(211, 'manager', 'services@gmail.com', '10cd395cf71c18328c863c08e78f3fd0', 'services', 'servicess', 0, 'male', '0000-00-00', '', '', 'active', '9b4a6c74af0260c8066779d55a81c6f4', '2013-07-15 08:14:50'),
(212, 'employee', 'staffff@gmail.com', '', 'staffs12', 'staff', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '24c35c98270bc3699937452fd34e29f3', '0000-00-00 00:00:00'),
(213, 'employee', 'asdadada@gmail.com', '', 'staff2d', 'sdasdasd', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '777e81a9f03e5382da0d3d385e79d6e1', '0000-00-00 00:00:00'),
(214, 'employee', 'classservice@gmail.com', '', 'classservice', 'classservice', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'aa70c5dbb5cd973e854a381e1c67dfa8', '0000-00-00 00:00:00'),
(215, 'employee', 'staffClas@gmail.com', '', 'staffClass1', 'staffClass', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '0e6cfb03564b283c89bb73b7f873971e', '0000-00-00 00:00:00'),
(216, 'manager', 'pankaj.p@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'P', 0, 'male', '0000-00-00', '', '', 'active', 'b55b2b63ea5de18c2eef12f0672e5569', '2013-07-18 07:06:18'),
(225, 'client', 'eulogik@gmail.com', '48dc7460ddaf19fb7f462661e4c45a32', 'eulogik', 'e', 2147483647, 'male', '2064-02-02', '', 'default.jpg', 'active', '0', '2013-07-19 13:50:12'),
(226, 'employee', 'dsfsdfssdf@gmail.com', '', 'staff2', 'class', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '24b05b1d1c6d82d64a196597bee54a60', '0000-00-00 00:00:00'),
(227, 'employee', 'staffs3@gmail.com', '', 'staff3', '3', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '081d6e390d584d6bd074050a2f13c943', '0000-00-00 00:00:00'),
(314, 'employee', 'staff4@gmail.com', '', 'staff4', 'ss', 2147483647, 'male', '0000-00-00', '', 'default.jpg', 'inactive', 'b8aaca1f7274452fbc775c9059d852d0', '0000-00-00 00:00:00'),
(315, 'employee', 'sdasdas@gmail.com', '', 'sssadasd', 'asdasd', 432432432, 'male', '0000-00-00', '', 'default.jpg', 'inactive', '8dee7b9851b5de862cfe741aba2761a1', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_business_availability`
--

CREATE TABLE IF NOT EXISTS `user_business_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `type` enum('employee','business') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weekid` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lunch_start_time` time NOT NULL,
  `lunch_end_time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1729 ;

--
-- Dumping data for table `user_business_availability`
--

INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
(278, 31, 0, 'business', 1, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(279, 31, 0, 'business', 2, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(280, 31, 0, 'business', 3, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(281, 31, 0, 'business', 4, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(282, 31, 0, 'business', 5, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(283, 31, 0, 'business', 6, '10:00:00', '19:00:00', '00:00:00', '00:00:00'),
(290, 33, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(291, 33, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(292, 33, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(293, 33, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(294, 33, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(295, 33, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(314, 31, 148, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(315, 31, 148, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(316, 31, 149, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(317, 31, 149, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(318, 31, 149, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(319, 31, 149, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
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
(353, 34, 154, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(354, 34, 154, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(355, 34, 154, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(356, 34, 154, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(357, 34, 154, 'employee', 7, '11:45:00', '11:45:00', '00:00:00', '00:00:00'),
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
(400, 37, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(401, 37, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(402, 37, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(403, 37, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(404, 37, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(405, 37, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(422, 37, 160, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(423, 37, 160, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(424, 37, 160, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(425, 37, 160, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(426, 37, 160, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(624, 39, 0, 'business', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(625, 39, 0, 'business', 2, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(626, 39, 0, 'business', 3, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(627, 39, 0, 'business', 4, '09:00:00', '17:00:00', '00:00:00', '00:00:00'),
(628, 39, 0, 'business', 5, '10:00:00', '17:00:00', '00:00:00', '00:00:00'),
(629, 40, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(630, 40, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(631, 40, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(632, 40, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(633, 40, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(634, 40, 0, 'business', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(940, 41, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(941, 41, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(942, 41, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(943, 41, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(944, 41, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(960, 42, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(961, 42, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(962, 42, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(963, 42, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(964, 42, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(965, 43, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(966, 43, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(967, 43, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(968, 43, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(969, 43, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(970, 43, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(971, 43, 0, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(972, 43, 0, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(973, 43, 0, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(974, 43, 0, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(975, 43, 0, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(976, 43, 0, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(988, 43, 213, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(989, 43, 213, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(990, 43, 213, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(991, 43, 213, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1045, 44, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1046, 44, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1047, 44, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1048, 44, 0, 'business', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1049, 44, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1050, 44, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1051, 45, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1052, 45, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1053, 45, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1054, 45, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1055, 45, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1056, 45, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1057, 46, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1058, 46, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1059, 46, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1060, 46, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1061, 46, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1062, 46, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1081, 47, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1082, 47, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1083, 47, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1084, 47, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1085, 47, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1086, 47, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1138, 48, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1139, 48, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1140, 48, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1141, 48, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1154, 49, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1155, 49, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1156, 49, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1157, 49, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1158, 49, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1159, 49, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1194, 38, 0, 'business', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1195, 38, 0, 'business', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1196, 38, 0, 'business', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1197, 38, 0, 'business', 4, '08:00:00', '22:00:00', '00:00:00', '00:00:00'),
(1198, 38, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1199, 38, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1200, 38, 0, 'business', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1214, 47, 226, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1215, 47, 226, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1216, 47, 226, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1217, 47, 226, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1218, 47, 226, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1233, 47, 268, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1234, 47, 268, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1235, 47, 268, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1236, 47, 268, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1237, 47, 268, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1238, 47, 268, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1335, 32, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1336, 32, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1337, 32, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1338, 32, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1339, 32, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1340, 32, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1341, 30, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1342, 30, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1343, 30, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1344, 30, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1345, 30, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1346, 30, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1353, 30, 130, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1354, 30, 130, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1355, 30, 130, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1356, 30, 130, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1357, 30, 130, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1360, 30, 131, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1361, 30, 131, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1362, 30, 131, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1363, 30, 227, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1364, 30, 227, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1365, 30, 227, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1366, 30, 227, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1367, 30, 227, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1368, 30, 227, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1373, 47, 215, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1374, 47, 215, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1375, 47, 215, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1376, 47, 215, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1377, 47, 215, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1378, 47, 215, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1389, 30, 228, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1390, 30, 228, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1391, 30, 228, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1392, 30, 228, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1393, 30, 228, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1394, 30, 228, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1401, 30, 229, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1402, 30, 229, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1403, 30, 229, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1404, 30, 229, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1405, 30, 229, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1406, 30, 229, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1407, 30, 230, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1408, 30, 230, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1409, 30, 230, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1410, 30, 230, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1411, 30, 230, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1412, 30, 230, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1413, 30, 231, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1414, 30, 231, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1415, 30, 231, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1416, 30, 231, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1417, 30, 231, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1418, 30, 231, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1425, 30, 232, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1426, 30, 232, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1427, 30, 232, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1428, 30, 232, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1429, 30, 232, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1430, 30, 232, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1431, 30, 233, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1432, 30, 233, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1433, 30, 233, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1434, 30, 233, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1435, 30, 233, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1436, 30, 233, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1437, 30, 234, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1438, 30, 234, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1439, 30, 234, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1440, 30, 234, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1441, 30, 234, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1442, 30, 234, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1443, 30, 235, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1444, 30, 235, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1445, 30, 235, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1446, 30, 235, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1447, 30, 235, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1448, 30, 235, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1449, 30, 236, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1450, 30, 236, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1451, 30, 236, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1452, 30, 236, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1453, 30, 236, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1454, 30, 236, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1455, 30, 239, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1456, 30, 239, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1457, 30, 239, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1458, 30, 239, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1459, 30, 239, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1460, 30, 239, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1461, 30, 240, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1462, 30, 240, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1463, 30, 240, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1464, 30, 240, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1465, 30, 240, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1466, 30, 240, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1467, 30, 243, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1468, 30, 243, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1469, 30, 243, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1470, 30, 243, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1471, 30, 243, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1472, 30, 243, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1473, 30, 244, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1474, 30, 244, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1475, 30, 244, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1476, 30, 244, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1477, 30, 244, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1478, 30, 244, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1479, 30, 245, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1480, 30, 245, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1481, 30, 245, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1482, 30, 245, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1483, 30, 245, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1484, 30, 245, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1485, 30, 246, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1486, 30, 246, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1487, 30, 246, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1488, 30, 246, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1489, 30, 246, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1490, 30, 246, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1491, 30, 256, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1492, 30, 256, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1493, 30, 256, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1494, 30, 256, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1495, 30, 256, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1496, 30, 256, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1497, 30, 269, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1498, 30, 269, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1499, 30, 269, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1500, 30, 269, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1501, 30, 269, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1502, 30, 269, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1503, 30, 272, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1504, 30, 272, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1505, 30, 272, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1506, 30, 272, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1507, 30, 272, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1508, 30, 272, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1509, 30, 273, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1510, 30, 273, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1511, 30, 273, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1512, 30, 273, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1513, 30, 273, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1514, 30, 273, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1515, 30, 274, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1516, 30, 274, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1517, 30, 274, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1518, 30, 274, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1519, 30, 274, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1520, 30, 274, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1521, 30, 275, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1522, 30, 275, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1523, 30, 275, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1524, 30, 275, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1525, 30, 275, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1526, 30, 275, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1527, 30, 277, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1528, 30, 277, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1529, 30, 277, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1530, 30, 277, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1531, 30, 277, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1532, 30, 277, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1533, 30, 279, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1534, 30, 279, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1535, 30, 279, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1536, 30, 279, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1537, 30, 279, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1538, 30, 279, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1539, 30, 280, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1540, 30, 280, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1541, 30, 280, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1542, 30, 280, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1543, 30, 280, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1544, 30, 280, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1545, 30, 281, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1546, 30, 281, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1547, 30, 281, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1548, 30, 281, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1549, 30, 281, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1550, 30, 281, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1551, 30, 282, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1552, 30, 282, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1553, 30, 282, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1554, 30, 282, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1555, 30, 282, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1556, 30, 282, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1557, 30, 283, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1558, 30, 283, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1559, 30, 283, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1560, 30, 283, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1561, 30, 283, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1562, 30, 283, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1563, 30, 284, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1564, 30, 284, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1565, 30, 284, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1566, 30, 284, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1567, 30, 284, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1568, 30, 284, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1569, 30, 285, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1570, 30, 285, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1571, 30, 285, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1572, 30, 285, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1573, 30, 285, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1574, 30, 285, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1575, 30, 286, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1576, 30, 286, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1577, 30, 286, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1578, 30, 286, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1579, 30, 286, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1580, 30, 286, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1581, 30, 288, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1582, 30, 288, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1583, 30, 288, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1584, 30, 288, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1585, 30, 288, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1586, 30, 288, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1593, 30, 292, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1594, 30, 292, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1595, 30, 292, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1596, 30, 292, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1597, 30, 292, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1598, 30, 292, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1599, 30, 295, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1600, 30, 295, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1601, 30, 295, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1602, 30, 295, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1603, 30, 295, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1604, 30, 295, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1605, 30, 298, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1606, 30, 298, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1607, 30, 299, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1608, 30, 299, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1609, 30, 299, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1610, 30, 300, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1611, 30, 300, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1612, 30, 300, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1613, 30, 300, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1614, 30, 301, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1615, 30, 301, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1616, 30, 301, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1617, 30, 301, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1618, 30, 301, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1619, 30, 301, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1620, 30, 302, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1621, 30, 302, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1622, 30, 302, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1623, 30, 302, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1624, 30, 302, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1625, 30, 302, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1626, 30, 303, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1627, 30, 303, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1628, 30, 303, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1629, 30, 303, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1630, 30, 303, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1631, 30, 303, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1632, 30, 304, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1633, 30, 304, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1634, 30, 304, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1635, 30, 304, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1636, 30, 304, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1637, 30, 304, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1638, 30, 305, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1639, 30, 305, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1640, 30, 305, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1641, 30, 305, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1642, 30, 305, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1643, 30, 305, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1644, 30, 306, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1645, 30, 306, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1646, 30, 306, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1647, 30, 306, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1648, 30, 306, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1649, 30, 306, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1676, 30, 308, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1677, 30, 308, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1678, 30, 308, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1679, 30, 308, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1680, 30, 308, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1681, 30, 308, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1682, 30, 309, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1683, 30, 309, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1684, 30, 309, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1685, 30, 309, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1686, 30, 309, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1687, 30, 309, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1688, 30, 309, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1689, 30, 310, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1690, 30, 310, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1691, 30, 310, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1692, 30, 310, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1693, 30, 310, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1694, 30, 310, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1695, 30, 311, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1696, 30, 311, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1697, 30, 311, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1698, 30, 311, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1699, 30, 311, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1700, 30, 311, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1701, 30, 312, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1702, 30, 312, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1703, 30, 312, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1704, 30, 312, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1705, 30, 312, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1706, 30, 312, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1707, 30, 313, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1708, 30, 313, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1709, 30, 313, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1710, 30, 313, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1711, 30, 313, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1712, 30, 313, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1719, 30, 314, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1720, 30, 314, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1721, 30, 314, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(1728, 47, 315, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00');

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
  `time_type` enum('hours','minutes') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_size` int(10) NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  `availability` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

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
(11, 48, 'class1', 'fixed', 12, 12, 'minutes', 0, 'Before', 23, 'fdfsdf', 20),
(12, 47, 'class3', 'fixed', 2, 2, 'hours', 10, 'Before', 20, 'desc', 20);

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
  `description` varchar(200) NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET latin1 NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `business_type` enum('class','service') CHARACTER SET latin1 NOT NULL,
  `map_latitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `map_longitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `calendar_type` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user_business_details`
--

INSERT INTO `user_business_details` (`id`, `category_id`, `users_id`, `name`, `image`, `description`, `mobile_number`, `address`, `business_type`, `map_latitude`, `map_longitude`, `calendar_type`) VALUES
(30, 1, 129, 'service1', '', 'מה שלומך', '444444444444444', 'Isreal', 'service', '20.593684', '78.96288000000004', 1),
(31, 1, 138, 'service2', 'Sunset.jpg', 'bb', '232323232323223', 'Indiana, USA', 'service', '40.2671941', '-86.13490189999999', 1),
(32, 2, 136, 'service3', '', 'Test Demo', '8817453284', 'A, Deerbrook, WI 54424, USA', 'service', '45.2801325', '-89.07150560000002', 1),
(33, 1, 147, 'class1', 'Sunset1.jpg', 'We are web organization', '8817453284', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'class', '23.2332432', '77.4343394', 1),
(34, 1, 153, 'service4', 'Image91.png', 'this is what exatcly!!! gfdfg dfgdfg dfgdf gdfgdfg dfgdf dgdg dfgdf dfgdf gdfg gdg dggfgdfg dfgdfg dfgdfgdfg d fdgdfg dfgdgdfg dfgdfg dfgd dg dfgdfg dfgd dfg yes no wht exatly wht is not there is wht ', '123456789987686', 'India', 'service', '20.593684', '78.96288000000004', 1),
(38, 1, 69, 'service6', 'play.png', 'this is like not !! updated one yaar', '233232323232323', 'Essen, Germany', 'service', '51.4556432', '7.011555199999975', 1),
(39, 1, 195, 'service7', '', 'desc', '455454444444444', 'Bangalore, Karnataka, India', 'service', '12.9715987', '77.59456269999998', 2),
(40, 2, 196, 'service5', '', 'dasdsa das das das d asd asd as dsa d as dsa das d asd as d d as das d asd asd as das dsa ds adsa d asd as das  sad asd as das das  as sa sa das d sad asd as das d asd asdasd\r\nasd\r\nsad\r\nasdasdas dsa a', '555555555555555', 'Bhopal, Madhya Pradesh, India', 'service', '23.2599333', '77.41261499999996', 1),
(43, 2, 211, 'services8', '', 'desc', '34343243323', 'Mangalore, Karnataka, India', 'service', '12.9141417', '74.85595680000006', 1),
(47, 1, 210, 'classbook', '', 'dsfdsf', '453543543543545', 'Mumbai, Maharashtra, India', 'class', '19.0759837', '72.87765590000004', 1),
(49, 1, 216, 'class3', '', 'dfdsf', '324234234322343', 'United States', 'class', '37.09024', '-95.71289100000001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_photogallery`
--

CREATE TABLE IF NOT EXISTS `user_business_photogallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `title` varchar(25) CHARACTER SET latin1 NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `orderNum` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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
(10, 47, 'cloud', '', '', 0),
(11, 47, 'pic3', 'pic', '', 4),
(12, 47, 'pic', 'yes', '', 3),
(13, 47, 'Skedulus', 'h', '', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=574 ;

--
-- Dumping data for table `user_business_posted_class`
--

INSERT INTO `user_business_posted_class` (`id`, `user_business_classes_id`, `start_date`, `end_date`, `lastdate_enroll`, `start_time`, `end_time`, `instructor`, `repeat_type`, `repeat_all_day`, `repeat_week_days`, `repeat_months`, `class_size`, `availability`, `seriesid`, `modifiedStatus`) VALUES
(220, 9, '2013-08-12', '2013-08-12', '2013-08-06', '05:00:00', '06:00:00', 215, 'daily', '', '1,3,5,7,', '', 10, 10, 4, 1),
(224, 9, '2013-09-04', '2013-09-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 19, 5, 0),
(225, 9, '2013-10-04', '2013-10-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 20, 5, 0),
(226, 9, '2013-11-04', '2013-11-04', '2013-08-06', '07:00:00', '08:00:00', 226, 'monthly', '', '', '''8'',''9'',''10'',''11''', 20, 20, 5, 0),
(227, 9, '2013-08-04', '2013-08-04', '2013-08-07', '09:00:00', '10:00:00', 215, 'daily', '', '1,2,3,5,6,7,', '', 10, 9, 6, 0),
(228, 10, '2013-08-05', '2013-08-05', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(229, 10, '2013-08-06', '2013-08-06', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(230, 9, '2013-08-07', '2013-08-07', '2013-08-07', '09:00:00', '10:00:00', 215, 'daily', '', '1,2,3,5,6,7,', '', 10, 9, 6, 0),
(231, 10, '2013-08-09', '2013-08-09', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(232, 10, '2013-08-10', '2013-08-10', '2013-08-07', '09:00:00', '09:40:00', 215, 'weekly', '', '1,2,3,5,6,7,', '', 10, 10, 6, 0),
(236, 10, '2013-08-04', '2013-08-04', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(237, 10, '2013-08-05', '2013-08-05', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(238, 10, '2013-08-06', '2013-08-06', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(239, 10, '2013-08-07', '2013-08-07', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(240, 10, '2013-08-08', '2013-08-08', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(241, 10, '2013-08-09', '2013-08-09', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 6, 13, 0),
(242, 10, '2013-08-10', '2013-08-10', '2013-08-07', '16:00:00', '16:40:00', 226, 'daily', '1', '', '', 6, 5, 13, 0),
(244, 9, '2013-08-04', '2013-08-04', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,7,', '', 0, 0, 16, 0),
(245, 9, '2013-08-05', '2013-08-05', '1970-01-01', '06:00:00', '07:00:00', 215, 'weekly', '', '1,7,', '', 0, 0, 16, 0),
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
(259, 10, '2013-08-05', '2013-08-05', '2013-08-07', '10:00:00', '10:40:00', 215, 'daily', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(260, 9, '2013-08-06', '2013-08-06', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(261, 10, '2013-08-07', '2013-08-07', '2013-08-07', '10:00:00', '10:40:00', 215, 'daily', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(262, 9, '2013-08-08', '2013-08-08', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(263, 9, '2013-08-09', '2013-08-09', '2013-08-07', '10:00:00', '11:00:00', 226, 'weekly', '', '1,2,3,4,5,', '', 10, 10, 20, 0),
(264, 10, '2013-08-04', '2013-08-04', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
(265, 10, '2013-08-05', '2013-08-05', '2013-08-06', '07:00:00', '07:40:00', 226, 'daily', '1', '', '', 20, 20, 21, 0),
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
(278, 9, '2013-08-06', '2013-08-06', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(279, 10, '2013-08-07', '2013-08-07', '2013-08-07', '18:00:00', '18:40:00', 215, 'daily', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(280, 9, '2013-08-08', '2013-08-08', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(281, 9, '2013-08-09', '2013-08-09', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(282, 9, '2013-08-10', '2013-08-10', '2013-08-07', '18:00:00', '19:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 23, 0),
(283, 9, '2013-08-05', '2013-08-05', '2013-08-07', '13:45:00', '14:45:00', 226, 'daily', '1', '', '', 10, 9, 24, 1),
(284, 10, '2013-08-06', '2013-08-06', '2013-08-08', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 1),
(285, 10, '2013-08-07', '2013-08-07', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(286, 10, '2013-08-08', '2013-08-08', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(287, 10, '2013-08-09', '2013-08-09', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(288, 10, '2013-08-10', '2013-08-10', '2013-08-07', '13:45:00', '14:25:00', 215, 'daily', '1', '', '', 10, 10, 24, 0),
(316, 9, '2013-08-27', '2013-08-27', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(317, 9, '2013-08-28', '2013-08-28', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 18, 28, 0),
(318, 9, '2013-08-29', '2013-08-29', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 18, 28, 0),
(319, 9, '2013-08-30', '2013-08-30', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(320, 9, '2013-08-31', '2013-08-31', '2013-08-08', '01:00:00', '01:15:00', 215, 'daily', '1', '', '', 20, 19, 28, 0),
(321, 10, '2013-08-04', '2013-08-04', '2013-08-07', '04:00:00', '04:50:00', 226, 'daily', '1', '', '', 10, 9, 29, 0),
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
(347, 9, '2013-08-04', '2013-08-04', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(348, 9, '2013-08-05', '2013-08-05', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(349, 9, '2013-08-06', '2013-08-06', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(350, 9, '2013-08-07', '2013-08-07', '2013-08-08', '02:00:00', '03:00:00', 226, 'weekly', '', '1,2,3,7,', '', 10, 10, 34, 0),
(351, 10, '2013-08-10', '2013-08-10', '2013-08-08', '02:00:00', '02:40:00', 215, 'daily', '1', '', '', 10, 10, 35, 1),
(353, 9, '2013-08-06', '2013-08-06', '2013-08-08', '01:15:00', '02:15:00', 226, 'daily', '1', '', '', 10, 10, 37, 1),
(358, 0, '2013-08-04', '2013-08-04', '1970-01-01', '03:15:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 38, 0),
(359, 9, '2013-08-11', '2013-08-11', '2013-08-12', '03:00:00', '04:00:00', 215, 'daily', '1', '', '', 8, 8, 39, 0),
(360, 9, '2013-08-11', '2013-08-11', '1970-01-01', '02:00:00', '03:00:00', 215, 'daily', '1', '', '', 0, 0, 40, 0),
(362, 9, '2013-08-13', '2013-08-13', '1970-01-01', '02:00:00', '03:00:00', 215, 'daily', '1', '', '', 0, 0, 40, 0),
(392, 10, '2013-08-13', '2013-08-13', '2013-08-13', '06:00:00', '06:40:00', 215, 'daily', '', '2,3,4,5,6,', '', 10, 10, 50, 1),
(403, 9, '2013-09-11', '2013-09-11', '2013-08-12', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 3, 3, 53, 0),
(404, 9, '2013-10-11', '2013-10-11', '2013-08-12', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 3, 3, 53, 0),
(408, 9, '2013-09-11', '2013-09-11', '1970-01-01', '04:00:00', '05:00:00', 226, 'monthly', '', '', '9,10', 0, 0, 55, 0),
(410, 9, '2013-08-11', '2013-08-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 6, 56, 0),
(411, 9, '2013-09-11', '2013-09-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(412, 9, '2013-10-11', '2013-10-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 7, 56, 0),
(413, 9, '2013-11-11', '2013-11-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(414, 9, '2013-12-11', '2013-12-11', '2013-08-13', '09:00:00', '10:00:00', 226, 'monthly', '', '', '8,9,10,11,12', 8, 8, 56, 0),
(419, 9, '2013-08-14', '2013-08-14', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(420, 9, '2013-08-15', '2013-08-15', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(421, 9, '2013-08-16', '2013-08-16', '2013-08-06', '05:00:00', '06:00:00', 226, 'weekly', '', '1,3,2,4,7,5,', '', 10, 10, 58, 0),
(422, 0, '2013-08-12', '2013-08-12', '1970-01-01', '00:45:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 59, 0),
(423, 0, '2013-08-11', '2013-08-11', '1970-01-01', '01:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 60, 0),
(424, 0, '2013-08-12', '2013-08-12', '1970-01-01', '02:45:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 61, 0),
(427, 9, '2013-08-15', '2013-08-15', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(428, 9, '2013-08-16', '2013-08-16', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(429, 9, '2013-08-17', '2013-08-17', '2013-08-13', '06:00:00', '07:00:00', 226, 'weekly', '', '2,3,4,5,6,', '', 10, 10, 64, 0),
(430, 9, '2013-08-29', '2013-08-29', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 2, 65, 0),
(431, 9, '2013-08-30', '2013-08-30', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 2, 65, 0),
(432, 9, '2013-08-31', '2013-08-31', '2013-08-26', '04:00:00', '05:00:00', 226, 'weekly', '', '6,5,4,', '', 4, 3, 65, 0),
(433, 9, '2013-08-26', '2013-08-26', '2013-08-26', '08:00:00', '09:00:00', 226, 'daily', '1', '', '', 9, 7, 66, 1),
(439, 9, '2013-08-28', '2013-08-28', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(440, 9, '2013-08-29', '2013-08-29', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(441, 9, '2013-08-30', '2013-08-30', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(442, 9, '2013-08-31', '2013-08-31', '2013-08-26', '08:00:00', '09:00:00', 269, 'daily', '1', '', '', 9, 9, 67, 0),
(443, 9, '2013-08-25', '2013-08-25', '2013-08-26', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 4, 4, 68, 0),
(446, 9, '2013-08-30', '2013-08-30', '2013-08-29', '06:15:00', '07:30:00', 270, 'daily', '1', '', '', 4548, 4548, 71, 0),
(447, 9, '2013-08-31', '2013-08-31', '2013-08-29', '06:15:00', '07:30:00', 270, 'daily', '1', '', '', 4548, 4548, 71, 0),
(448, 9, '2013-08-26', '2013-08-26', '2013-08-28', '04:00:00', '05:00:00', 269, 'daily', '', '1,3,5,7,', '', 55, 53, 72, 1),
(449, 9, '2013-08-28', '2013-08-28', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(450, 9, '2013-08-30', '2013-08-30', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(451, 9, '2013-09-01', '2013-09-01', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(452, 9, '2013-09-02', '2013-09-02', '2013-08-28', '16:15:00', '17:15:00', 269, 'weekly', '', '1,3,5,7,', '', 55, 55, 72, 0),
(453, 10, '2013-08-26', '2013-08-26', '2013-08-27', '03:00:00', '03:40:00', 226, 'daily', '', '1,2,3,4,5,6,', '', 4, 3, 73, 1),
(467, 10, '2013-08-27', '2013-08-27', '2013-08-27', '03:00:00', '03:40:00', 215, 'weekly', '', '1,2,3,4,', '', 4, 3, 77, 0),
(484, 9, '2013-08-27', '2013-08-27', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 5, 81, 0),
(485, 9, '2013-08-28', '2013-08-28', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 6, 81, 0),
(486, 9, '2013-08-29', '2013-08-29', '2013-08-27', '06:00:00', '07:00:00', 215, 'weekly', '', '2,3,4,', '', 6, 6, 81, 0),
(487, 9, '2013-09-01', '2013-09-01', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 3, 82, 0),
(488, 9, '2013-09-02', '2013-09-02', '2013-08-27', '01:00:00', '02:00:00', 215, 'daily', '1', '', '', 3, 2, 82, 0),
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
(499, 9, '2013-09-23', '2013-09-23', '2013-08-27', '04:00:00', '05:00:00', 215, 'weekly', '', '1,3,5,7,', '', 2, 1, 83, 0),
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
(524, 10, '2013-09-23', '2013-09-23', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 9, 87, 0),
(525, 10, '2013-09-25', '2013-09-25', '2013-09-15', '15:00:00', '15:40:00', 269, 'weekly', '', '1,3,5,7,', '', 10, 10, 87, 0),
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
(562, 9, '2013-09-01', '2013-09-01', '2013-09-04', '05:00:00', '00:00:00', 215, 'daily', '1', '', '', 10, 10, 98, 0),
(563, 9, '2013-09-01', '2013-09-01', '2013-09-04', '02:45:00', '00:00:00', 215, 'daily', '1', '', '', 25, 25, 99, 0),
(564, 9, '2013-09-22', '2013-09-22', '2013-09-28', '09:00:00', '00:00:00', 269, 'daily', '1', '', '', 20, 20, 100, 0),
(565, 9, '2013-09-22', '2013-09-22', '1970-01-01', '10:00:00', '00:00:00', 215, 'daily', '1', '', '', 0, 0, 101, 0),
(566, 9, '2013-09-22', '2013-09-22', '2013-09-27', '10:00:00', '00:00:00', 226, 'daily', '1', '', '', 0, 0, 102, 0),
(567, 9, '2013-10-03', '2013-10-03', '1970-01-01', '09:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 103, 0),
(568, 9, '2013-10-04', '2013-10-04', '1970-01-01', '08:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 104, 0),
(569, 9, '2013-10-03', '2013-10-03', '1970-01-01', '09:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 105, 0),
(570, 9, '2013-10-04', '2013-10-04', '2013-10-04', '09:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 106, 0),
(571, 9, '2013-10-04', '2013-10-04', '2013-10-03', '10:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 107, 0),
(572, 9, '2013-10-04', '2013-10-04', '2013-10-04', '13:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 108, 0),
(573, 9, '2013-10-05', '2013-10-05', '2013-10-04', '10:00:00', '00:00:00', 0, 'daily', '1', '', '', 0, 0, 109, 0);

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
  `time_type` enum('hours','minutes') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `user_business_services`
--

INSERT INTO `user_business_services` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `details`) VALUES
(71, 30, 'service1', 'fixed', 3232, 1, 'hours', 10, 'Before & After', 'dcvdcvxcvxcvxc'),
(73, 30, 'service2', 'fixed', 6464, 45, 'minutes', 10, 'Before', 'vcvbcvbcv'),
(74, 30, 'service3', 'fixed', 3423, 30, 'minutes', 0, 'Before', 'sdfsdsfs'),
(75, 31, 'service1', 'fixed', 123, 30, 'minutes', 30, 'Before', 'bcbcvbv '),
(76, 31, 'service2', 'fixed', 123, 15, 'minutes', 15, 'Before & After', 'bcbcvbv '),
(77, 32, 'aasa', 'variable', 20, 20, 'minutes', 0, 'Before', 'asa'),
(78, 33, 'Seo', 'variable', 200, 50, 'hours', 0, 'Before', 'Demo Description'),
(79, 34, 'service1', 'fixed', 12, 1, 'hours', 0, 'Before', 'yes!!!!'),
(80, 35, 'class1', 'fixed', 12, 1, 'hours', 0, 'Before', 'descr'),
(81, 36, 'class21', 'fixed', 23, 3, 'hours', 0, 'Before', 'erfsv fsd f sd fsdf'),
(83, 38, 'ddfsf', 'free', 45, 23, 'minutes', 0, 'Before', 'dsfsdfsdsdf'),
(84, 38, 'serrvice222', 'variable', 1212, 12, 'minutes', 0, 'Before', '1ddsadasdas'),
(85, 40, 'service123', 'fixed', 12, 1, 'hours', 20, 'Before & After', 'this si wht exacrtlycsdf dfgdf'),
(86, 38, 'nnnnnnnnnn', 'free', 0, 34, 'minutes', 0, 'Before', 'dddddddd'),
(87, 41, 'classservice', 'fixed', 12, 12, 'minutes', 0, 'Before', 'class123434556'),
(88, 43, 'services12', 'fixed', 23, 1, 'hours', 0, 'Before', 'desc servicesss'),
(89, 49, 'services1', 'fixed', 23, 23, 'minutes', 0, 'Before', 'dsfdsfsdf'),
(90, 30, 'gdfgdfgdf', 'fixed', 6, 5, 'minutes', 0, 'Before', 'jkhkjj');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_subscription`
--

CREATE TABLE IF NOT EXISTS `user_business_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version_type` enum('paid','free') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subscription_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `status` enum('active','expired') CHARACTER SET latin1 NOT NULL DEFAULT 'active',
  `balance_amount` varchar(50) CHARACTER SET latin1 NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
,`clients_email` varchar(50)
,`clients_phonenumber` int(15)
,`user_role` enum('client','manager','employee')
,`booked_by` enum('client','manager')
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
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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

CREATE  VIEW `view_client_appoinment_details` AS select `client_service_appointments`.`id` AS `id`,`client_service_appointments`.`start_time` AS `start_time`,`users`.`last_name` AS `employee_last_name`,`client_service_appointments`.`type` AS `type`,`user_business_details`.`name` AS `business_name`,`users`.`first_name` AS `employee_first_name`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`user_business_details_id` AS `user_business_details_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`appointment_date` AS `appointment_date`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`users_id` AS `users_id`,`category`.`name` AS `category_name`,`clients_details`.`first_name` AS `clients_first_name`,`clients_details`.`last_name` AS `clients_last_name`,`user_business_details`.`id` AS `business_details_id`,`clients_details`.`email` AS `clients_email`,`clients_details`.`phone_number` AS `clients_phonenumber`,`clients_details`.`user_role` AS `user_role`,`client_service_appointments`.`booked_by` AS `booked_by` from ((((`client_service_appointments` join `user_business_details` on((`client_service_appointments`.`user_business_details_id` = `user_business_details`.`id`))) join `users` on((`client_service_appointments`.`employee_id` = `users`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`))) join `users` `clients_details` on((`client_service_appointments`.`users_id` = `clients_details`.`id`)));

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

CREATE VIEW `view_client_class_booking` AS select `client_class_booking`.`note` AS `note`,`client_class_booking`.`date` AS `date`,`client_class_booking`.`user_business_posted_class_id` AS `user_business_posted_class_id`,`client_class_booking`.`users_id` AS `users_id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone_number` AS `phone_number`,`users`.`email` AS `email`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`client_class_booking`.`id` AS `id` from ((`client_class_booking` join `users` on((`client_class_booking`.`users_id` = `users`.`id`))) join `user_business_posted_class` on((`client_class_booking`.`user_business_posted_class_id` = `user_business_posted_class`.`id`)));

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
