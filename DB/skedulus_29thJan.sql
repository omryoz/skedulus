-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2014 at 07:28 AM
-- Server version: 5.1.73-1
-- PHP Version: 5.4.14-1~dotdeb.1

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
-- Table structure for table `businesses_photos_likes`
--

CREATE TABLE IF NOT EXISTS `businesses_photos_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  `type` enum('photos','business') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_details_id` (`details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `businesses_photos_likes`
--

INSERT INTO `businesses_photos_likes` (`id`, `users_id`, `details_id`, `type`) VALUES
(1, 129, 49, 'photos'),
(3, 129, 39, 'business'),
(4, 129, 47, 'business'),
(5, 129, 49, 'business'),
(7, 129, 52, 'business'),
(8, 129, 51, 'business'),
(20, 129, 25, 'photos'),
(23, 210, 30, 'business'),
(26, 129, 43, 'business'),
(28, 129, 29, 'photos'),
(31, 136, 17, 'photos');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `business_clients_list`
--

INSERT INTO `business_clients_list` (`id`, `users_id`, `user_business_details_id`) VALUES
(1, 193, 38),
(18, 136, 0),
(19, 136, 0),
(20, 136, 0),
(21, 136, 0),
(22, 136, 0),
(23, 136, 0),
(24, 136, 0),
(54, 223, 30),
(55, 223, 33),
(56, 224, 30),
(58, 224, 33),
(61, 225, 33),
(68, 225, 47),
(70, 225, 30),
(71, 136, 47),
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
(94, 30, 30),
(97, 313, 30),
(98, 314, 47),
(99, 315, 47),
(100, 316, 47),
(101, 317, 47),
(102, 318, 47),
(103, 319, 47),
(104, 320, 47),
(105, 321, 47),
(106, 322, 47),
(107, 323, 47),
(108, 324, 47),
(109, 325, 47),
(110, 326, 47),
(111, 327, 47),
(112, 328, 47),
(113, 329, 47),
(114, 330, 47),
(115, 331, 47),
(116, 332, 47),
(117, 333, 47),
(118, 334, 47),
(119, 335, 47),
(120, 336, 47),
(121, 337, 47),
(122, 338, 47),
(123, 339, 47),
(124, 340, 47),
(125, 341, 47),
(126, 342, 47),
(127, 343, 47),
(128, 344, 47),
(129, 345, 47),
(130, 346, 47),
(131, 347, 47),
(132, 348, 30),
(133, 348, 34),
(135, 210, 30),
(136, 349, 47),
(137, 210, 47),
(138, 350, 30),
(139, 351, 47),
(140, 352, 47),
(141, 353, 47),
(142, 354, 47),
(143, 355, 47),
(144, 358, 47),
(145, 359, 47),
(146, 360, 47),
(147, 361, 47),
(148, 362, 47),
(149, 363, 47),
(150, 364, 47),
(151, 365, 47),
(152, 366, 47),
(153, 136, 32),
(156, 129, 32),
(157, 129, 47),
(158, 129, 50),
(159, 129, 52),
(164, 129, 30),
(165, 448, 30),
(166, 449, 47),
(167, 474, 30),
(168, 525, 30),
(169, 526, 30),
(170, 136, 30),
(171, 465, 47),
(172, 129, 40),
(173, 371, 30),
(174, 371, 52),
(175, 136, 69);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

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
(75, 38, 206, 'employee'),
(76, 43, 212, 'employee'),
(77, 43, 213, 'employee'),
(78, 44, 214, 'employee'),
(79, 47, 215, 'employee'),
(81, 47, 268, 'employee'),
(83, 47, 270, 'employee'),
(84, 30, 302, 'employee'),
(86, 30, 351, 'employee'),
(87, 30, 352, 'employee'),
(88, 30, 356, 'employee'),
(89, 30, 357, 'employee'),
(91, 47, 368, 'employee'),
(92, 47, 369, 'employee'),
(94, 50, 372, 'employee'),
(95, 50, 373, 'employee'),
(96, 51, 375, 'employee'),
(98, 30, 378, 'employee'),
(99, 30, 379, 'employee'),
(101, 30, 381, 'employee'),
(102, 30, 382, 'employee'),
(103, 30, 383, 'employee'),
(106, 30, 386, 'employee'),
(107, 51, 387, 'employee'),
(115, 30, 129, 'employee'),
(118, 40, 421, 'employee'),
(119, 40, 422, 'employee'),
(122, 54, 451, 'employee'),
(124, 54, 452, 'employee'),
(125, 55, 450, 'employee'),
(127, 59, 454, 'employee'),
(128, 62, 455, 'employee'),
(131, 65, 461, 'employee'),
(149, 30, 488, 'employee'),
(151, 30, 490, 'employee'),
(154, 40, 196, 'employee'),
(155, 49, 216, 'employee'),
(156, 52, 466, 'employee'),
(157, 69, 471, 'employee');

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
  `remind_before` int(10) NOT NULL,
  `cancel_reschedule_before` int(11) NOT NULL,
  `book_before` int(11) NOT NULL,
  `book_upto` int(10) NOT NULL,
  `send_message` enum('on','off') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `business_notification_settings`
--

INSERT INTO `business_notification_settings` (`id`, `user_business_details_id`, `remind_before`, `cancel_reschedule_before`, `book_before`, `book_upto`, `send_message`) VALUES
(7, 30, 1, 1, 1, 2, 'off'),
(8, 47, 1, 1, 1, 2, 'on'),
(9, 49, 1, 1, 1, 24, 'on'),
(10, 52, 1, 1, 1, 3, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `business_offers`
--

CREATE TABLE IF NOT EXISTS `business_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `services` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `calendar_name`, `filename`) VALUES
(1, 'christian', 'list349_1386846038.csv'),
(2, 'jewish', 'list349_1386846338.csv');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Hair styles'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

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
(85, 279, 533, '2013-08-31', ''),
(86, 315, 639, '2013-10-07', 'notess '),
(87, 316, 639, '2013-10-07', 'yesss'),
(88, 317, 639, '2013-10-07', 'notes for the manager'),
(89, 318, 640, '2013-10-07', 'yeahhhhh'),
(90, 319, 639, '2013-10-07', 'sea'),
(91, 320, 639, '2013-10-07', 'sssss'),
(92, 321, 639, '2013-10-07', 'hhhh'),
(93, 322, 639, '2013-10-07', 'd'),
(94, 323, 639, '2013-10-07', 'ghfghgfh');

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
  `paddingendtime` datetime NOT NULL,
  `services_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `employee_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` enum('booked','busytime') CHARACTER SET latin1 DEFAULT NULL,
  `repeat_week_days` varchar(50) NOT NULL,
  `seriesid` int(11) NOT NULL,
  `modifiedStatus` enum('0','1') NOT NULL DEFAULT '0',
  `appointment_date` datetime NOT NULL,
  `type` enum('service','class') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `booked_by` enum('client','manager') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1405 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `user_business_details_id`, `users_id`, `start_time`, `end_time`, `paddingendtime`, `services_id`, `employee_id`, `note`, `status`, `repeat_week_days`, `seriesid`, `modifiedStatus`, `appointment_date`, `type`, `booked_by`) VALUES
(547, 47, 225, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '457', 0, 'b', 'booked', '', 0, '0', '2013-10-23 00:00:00', 'class', 'client'),
(550, 47, 225, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '466', 215, 'b', 'booked', '', 0, '0', '2013-10-23 00:00:00', 'class', 'client'),
(553, 30, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '71,', 377, 'b', 'booked', '', 0, '0', '2013-10-24 10:10:18', 'service', 'manager'),
(554, 30, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '71,', 377, 'b', 'booked', '', 0, '0', '2013-10-28 04:10:40', 'service', 'manager'),
(556, 0, 136, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '73,', 377, 'b', 'booked', '', 0, '0', '2013-10-29 06:10:55', 'service', 'client'),
(557, 0, 136, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '71,', 130, 'b', 'booked', '', 0, '0', '2013-10-29 12:10:03', 'service', 'client'),
(569, 30, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '73,74,', 377, 'b', 'booked', '', 0, '0', '2013-11-14 10:11:35', 'service', 'manager'),
(570, 30, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '71,73,', 380, 'b', 'booked', '', 0, '0', '2013-11-14 10:11:22', 'service', 'manager'),
(578, 47, 210, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '472', 0, 'b', 'booked', '', 0, '0', '2013-11-16 05:11:29', 'class', 'client'),
(584, 47, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '482', 0, 'b', 'booked', '', 0, '0', '2013-11-18 12:11:22', 'class', 'client'),
(594, 47, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '487', 367, 'b', 'booked', '', 0, '0', '2013-11-19 11:11:26', 'class', 'client'),
(598, 47, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '488', 367, 'b', 'booked', '', 0, '0', '2013-11-20 06:11:34', 'class', 'client'),
(602, 47, 210, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '516', 369, 'b', 'booked', '', 0, '0', '2013-11-20 12:11:11', 'class', 'client'),
(614, 30, 129, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '71,73,', 473, 'b', 'booked', '', 0, '0', '2013-12-02 05:12:40', 'service', 'client'),
(617, 47, 272, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '548', 215, 'b', 'booked', '', 0, '0', '2013-12-02 00:00:00', 'class', 'client'),
(619, 47, 272, '2013-12-17 14:00:00', '2013-12-17 15:00:00', '0000-00-00 00:00:00', '611', 369, 'b', 'booked', '', 0, '0', '2013-12-06 00:00:00', 'class', 'client'),
(869, 30, 129, '2013-12-16 10:00:00', '2013-12-16 10:45:00', '0000-00-00 00:00:00', '71,', 0, '0', 'booked', '', 0, '0', '2013-12-16 09:12:57', 'service', 'manager'),
(877, 30, 129, '2013-12-22 11:00:00', '2013-12-22 12:00:00', '0000-00-00 00:00:00', '71,73,', 0, 'IE', 'booked', '', 0, '0', '2013-12-16 07:12:19', 'service', 'manager'),
(878, 30, 136, '2013-12-22 08:00:00', '2013-12-22 09:00:00', '0000-00-00 00:00:00', '71,', 0, 'book', 'booked', '', 0, '0', '2013-12-17 11:12:10', 'service', 'client'),
(879, 30, 129, '2013-12-23 12:00:00', '2013-12-23 13:00:00', '0000-00-00 00:00:00', '71,', 0, 'להזמין את השירותים שלי ...', 'booked', '', 0, '0', '2013-12-21 06:12:00', 'service', 'manager'),
(880, 30, 129, '2013-12-29 08:00:00', '2013-12-29 09:00:00', '0000-00-00 00:00:00', '71,', 0, 'book', 'booked', '', 0, '0', '2013-12-21 07:12:00', 'service', 'manager'),
(905, 30, 129, '2013-12-29 11:00:00', '2013-12-29 12:00:00', '0000-00-00 00:00:00', '', 0, 'b', 'busytime', '5,6,7,4,3,2,1,', 652, '1', '2013-12-23 06:12:16', 'service', 'manager'),
(1305, 47, 267, '2013-12-30 11:00:00', '2013-12-30 12:00:00', '0000-00-00 00:00:00', '824', 0, '', 'booked', '', 0, '0', '2013-12-25 00:00:00', 'class', 'client'),
(1307, 30, 129, '2014-01-05 11:00:00', '2014-01-05 12:00:00', '0000-00-00 00:00:00', '71,', 129, 'hello1123', 'booked', '', 0, '0', '2013-12-25 12:12:04', 'service', 'manager'),
(1308, 30, 129, '2014-01-05 14:00:00', '2014-01-05 16:15:00', '0000-00-00 00:00:00', '71,73,74,', 0, '', 'booked', '', 0, '0', '2013-12-25 12:12:48', 'service', 'manager'),
(1309, 47, 129, '2014-01-09 13:00:00', '2014-01-09 14:00:00', '0000-00-00 00:00:00', '937', 0, 'book', 'booked', '', 0, '0', '2013-12-27 04:12:40', 'class', 'client'),
(1310, 47, 449, '2014-01-07 13:00:00', '2014-01-07 14:00:00', '0000-00-00 00:00:00', '936', 0, '', 'booked', '', 0, '0', '2013-12-27 00:00:00', 'class', 'client'),
(1324, 30, 129, '2014-01-05 09:00:00', '2014-01-05 09:45:00', '0000-00-00 00:00:00', '74', 129, '', 'booked', '', 0, '0', '2014-01-04 06:01:17', 'service', 'client'),
(1325, 30, 129, '2014-01-12 08:00:00', '2014-01-12 09:00:00', '0000-00-00 00:00:00', '', 0, 'my busy time', 'busytime', '4,5,6,7,3,2,1,', 819, '0', '2014-01-02 07:01:40', 'service', 'manager'),
(1326, 30, 129, '2014-01-13 08:00:00', '2014-01-13 09:00:00', '0000-00-00 00:00:00', '', 0, 'my busy time', 'busytime', '4,5,6,7,3,2,1,', 819, '0', '2014-01-02 07:01:40', 'service', 'manager'),
(1327, 30, 129, '2014-01-14 08:00:00', '2014-01-14 09:00:00', '0000-00-00 00:00:00', '', 0, 'my busy time', 'busytime', '4,5,6,7,3,2,1,', 819, '0', '2014-01-02 07:01:40', 'service', 'manager'),
(1328, 30, 129, '2014-01-15 08:00:00', '2014-01-15 09:00:00', '0000-00-00 00:00:00', '', 0, 'my busy time', 'busytime', '4,5,6,7,3,2,1,', 819, '0', '2014-01-02 07:01:40', 'service', 'manager'),
(1329, 30, 129, '2014-01-16 08:00:00', '2014-01-16 09:00:00', '0000-00-00 00:00:00', '', 0, 'my busy time', 'busytime', '4,5,6,7,3,2,1,', 819, '0', '2014-01-02 07:01:40', 'service', 'manager'),
(1331, 30, 136, '2014-01-08 10:30:00', '2014-01-08 11:16:00', '0000-00-00 00:00:00', '74,96,', 463, '', 'booked', '', 0, '0', '2014-01-08 12:01:52', 'service', 'client'),
(1333, 30, 129, '2014-02-02 09:00:00', '2014-02-02 10:00:00', '0000-00-00 00:00:00', '', 0, 'bussy time', 'busytime', '7,5,4,3,2,1,6,', 820, '0', '2014-01-03 07:01:56', 'service', 'manager'),
(1334, 30, 129, '2014-02-03 09:00:00', '2014-02-03 10:00:00', '0000-00-00 00:00:00', '', 0, 'bussy time', 'busytime', '7,5,4,3,2,1,6,', 820, '0', '2014-01-03 07:01:56', 'service', 'manager'),
(1335, 30, 129, '2014-02-04 09:00:00', '2014-02-04 10:00:00', '0000-00-00 00:00:00', '', 0, 'bussy time', 'busytime', '7,5,4,3,2,1,6,', 820, '0', '2014-01-03 07:01:56', 'service', 'manager'),
(1336, 30, 129, '2014-02-05 09:00:00', '2014-02-05 10:00:00', '0000-00-00 00:00:00', '', 0, 'bussy time', 'busytime', '7,5,4,3,2,1,6,', 820, '0', '2014-01-03 07:01:56', 'service', 'manager'),
(1337, 30, 129, '2014-02-06 09:00:00', '2014-02-06 10:00:00', '0000-00-00 00:00:00', '', 0, 'bussy time', 'busytime', '7,5,4,3,2,1,6,', 820, '0', '2014-01-03 07:01:56', 'service', 'manager'),
(1338, 30, 129, '2014-02-16 09:00:00', '2014-02-16 09:45:00', '0000-00-00 00:00:00', '74,', 0, '', 'booked', '', 0, '0', '2014-01-03 08:01:46', 'service', 'client'),
(1339, 47, 465, '2014-03-02 09:00:00', '2014-03-02 10:00:00', '0000-00-00 00:00:00', '938', 0, 'book ', 'booked', '', 0, '0', '2014-01-03 09:01:55', 'class', 'client'),
(1342, 30, 129, '2014-01-12 09:00:00', '2014-01-12 09:45:00', '0000-00-00 00:00:00', '74,', 0, '', 'booked', '', 0, '0', '2014-01-09 10:01:08', 'service', 'client'),
(1351, 30, 129, '2014-01-12 16:00:00', '2014-01-12 17:00:00', '0000-00-00 00:00:00', '71,', 0, '', 'booked', '', 0, '0', '2014-01-09 04:01:30', 'service', 'manager'),
(1353, 30, 129, '2014-01-13 10:00:00', '2014-01-13 10:45:00', '0000-00-00 00:00:00', '74,', 0, '', 'booked', '', 0, '0', '2014-01-09 11:01:17', 'service', 'manager'),
(1355, 40, 129, '2014-01-12 10:00:00', '2014-01-12 11:00:00', '0000-00-00 00:00:00', '85,', 196, '', 'booked', '', 0, '0', '2014-01-09 12:01:05', 'service', 'client'),
(1356, 47, 271, '2014-01-07 13:00:00', '2014-01-07 14:00:00', '0000-00-00 00:00:00', '936', 0, '', 'booked', '', 0, '0', '2014-01-09 00:00:00', 'class', 'client'),
(1357, 47, 271, '2014-01-08 09:00:00', '2014-01-08 10:00:00', '0000-00-00 00:00:00', '924', 0, '', 'booked', '', 0, '0', '2014-01-09 00:00:00', 'class', 'client'),
(1371, 30, 371, '2014-01-15 11:00:00', '2014-01-15 12:00:00', '0000-00-00 00:00:00', '71,', 131, '', 'booked', '', 0, '0', '2014-01-14 05:01:38', 'service', 'client'),
(1375, 30, 129, '2014-01-15 16:00:00', '2014-01-15 16:45:00', '0000-00-00 00:00:00', '74,', 0, '', 'booked', '', 0, '0', '2014-01-15 10:01:05', 'service', 'client'),
(1377, 30, 129, '2014-01-19 08:00:00', '2014-01-19 08:45:00', '0000-00-00 00:00:00', '74,', 130, '', 'booked', '', 0, '0', '2014-01-15 11:01:57', 'service', 'client'),
(1379, 30, 129, '2014-01-19 09:00:00', '2014-01-19 09:45:00', '0000-00-00 00:00:00', '74,', 130, '', 'booked', '', 0, '0', '2014-01-15 11:01:31', 'service', 'client'),
(1380, 30, 129, '2014-01-19 08:00:00', '2014-01-19 09:00:00', '0000-00-00 00:00:00', '', 129, 'btime', 'busytime', '', 829, '0', '2014-01-16 04:01:48', 'service', 'manager'),
(1381, 30, 129, '2014-01-26 14:00:00', '2014-01-26 15:00:00', '0000-00-00 00:00:00', '', 0, 'b emp time', 'busytime', '7,6,5,4,3,2,1,', 830, '0', '2014-01-16 04:01:05', 'service', 'manager'),
(1382, 30, 129, '2014-01-27 14:00:00', '2014-01-27 15:00:00', '0000-00-00 00:00:00', '', 0, 'b emp time', 'busytime', '7,6,5,4,3,2,1,', 830, '0', '2014-01-16 04:01:05', 'service', 'manager'),
(1383, 30, 129, '2014-01-28 14:00:00', '2014-01-28 15:00:00', '0000-00-00 00:00:00', '', 0, 'b emp time', 'busytime', '7,6,5,4,3,2,1,', 830, '0', '2014-01-16 04:01:05', 'service', 'manager'),
(1384, 30, 129, '2014-01-29 14:00:00', '2014-01-29 15:00:00', '0000-00-00 00:00:00', '', 0, 'b emp time', 'busytime', '7,6,5,4,3,2,1,', 830, '0', '2014-01-16 04:01:05', 'service', 'manager'),
(1385, 30, 129, '2014-01-30 14:00:00', '2014-01-30 15:00:00', '0000-00-00 00:00:00', '', 0, 'b emp time', 'busytime', '7,6,5,4,3,2,1,', 830, '0', '2014-01-16 04:01:05', 'service', 'manager'),
(1390, 30, 129, '2014-01-19 12:00:00', '2014-01-19 12:25:00', '0000-00-00 00:00:00', '117,', 0, '', 'booked', '', 0, '0', '2014-01-16 07:01:51', 'service', 'manager'),
(1391, 69, 136, '2014-01-17 09:00:00', '2014-01-17 09:30:00', '0000-00-00 00:00:00', '118', 0, '', 'booked', '', 0, '0', '2014-01-17 05:01:51', 'service', 'client'),
(1392, 69, 471, '2014-01-19 09:00:00', '2014-01-19 10:00:00', '0000-00-00 00:00:00', '', 471, '', 'busytime', '', 831, '0', '2014-01-17 05:01:41', 'service', 'manager'),
(1401, 30, 129, '2014-01-26 16:00:00', '2014-01-26 16:25:00', '2014-01-26 16:25:00', '117,', 0, '', 'booked', '', 0, '0', '2014-01-23 08:01:31', 'service', 'manager'),
(1402, 30, 129, '2014-01-26 16:25:00', '2014-01-26 17:25:00', '2014-01-26 18:25:00', '71,', 0, '', 'booked', '', 0, '0', '2014-01-23 08:01:43', 'service', 'manager'),
(1403, 30, 129, '2014-01-26 12:00:00', '2014-01-26 12:25:00', '2014-01-26 12:25:00', '117,', 129, '', 'booked', '', 0, '0', '2014-01-23 08:01:42', 'service', 'manager'),
(1404, 30, 136, '2014-01-29 12:00:00', '2014-01-29 13:00:00', '2014-01-29 14:00:00', '71', 131, '', 'booked', '', 0, '0', '2014-01-28 04:01:31', 'service', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_details`
--

CREATE TABLE IF NOT EXISTS `credit_card_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `credit_card_number` varchar(20) NOT NULL,
  `verification_number` varchar(20) NOT NULL,
  `expiration_month` int(50) NOT NULL,
  `expiration_year` smallint(5) NOT NULL,
  `address` varchar(20) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `credit_card_details`
--

INSERT INTO `credit_card_details` (`id`, `users_id`, `card_name`, `credit_card_number`, `verification_number`, `expiration_month`, `expiration_year`, `address`, `state`, `city`, `zip`) VALUES
(1, 136, 'fdfdsfdsfsdf', 'aadsfdsfsdf', 'aa3224242342', 11, 2029, '', 0, 0, 0),
(2, 210, 'HDFC', '456456464', 'aa3224242342', 1, 2029, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_availability`
--

CREATE TABLE IF NOT EXISTS `employee_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=639 ;

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
(269, 50, 90, 373),
(284, 51, 91, 387),
(429, 40, 85, 421),
(430, 40, 85, 422),
(440, 54, 109, 452),
(441, 54, 109, 451),
(493, 59, 17, 454),
(494, 62, 112, 455),
(500, 65, 19, 461),
(513, 47, 13, 215),
(514, 47, 14, 215),
(540, 47, 9, 215),
(560, 47, 9, 369),
(561, 47, 12, 369),
(562, 47, 14, 369),
(572, 40, 85, 196),
(611, 30, 71, 130),
(612, 30, 71, 131),
(613, 30, 71, 386),
(614, 30, 71, 129),
(616, 30, 73, 131),
(617, 30, 73, 386),
(618, 30, 73, 129),
(620, 30, 74, 130),
(621, 30, 74, 129),
(625, 49, 20, 216),
(626, 52, 92, 466),
(631, 30, 117, 129),
(632, 30, 71, 378),
(633, 30, 73, 378),
(634, 30, 74, 378),
(635, 30, 117, 378),
(636, 69, 118, 471);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `favourite_businesses`
--

INSERT INTO `favourite_businesses` (`id`, `users_id`, `user_business_details_id`) VALUES
(7, 129, 49),
(8, 129, 51),
(13, 448, 30),
(14, 449, 47),
(21, 129, 39),
(22, 129, 30),
(24, 465, 47),
(25, 129, 47),
(26, 129, 40),
(27, 136, 30),
(29, 371, 52),
(30, 371, 30);

-- --------------------------------------------------------

--
-- Table structure for table `holidays_list`
--

CREATE TABLE IF NOT EXISTS `holidays_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_id` int(11) NOT NULL,
  `name_en` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name_heb` varchar(100) CHARACTER SET utf8 NOT NULL,
  `holiday_date` date NOT NULL,
  `length` enum('Full','Half') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `holidays_list`
--

INSERT INTO `holidays_list` (`id`, `calendar_id`, `name_en`, `name_heb`, `holiday_date`, `length`) VALUES
(133, 3, 'New Year', 'ראש השנה', '2014-01-01', 'Full'),
(132, 3, 'Thanks giving', 'תודה מתן', '2013-11-01', 'Full'),
(128, 10, 'New Year', 'ראש השנה', '2014-01-01', 'Full'),
(129, 10, 'New Year', 'ראש השנה', '2014-01-01', 'Full'),
(130, 10, 'New Year', 'ראש השנה', '2014-01-01', 'Full'),
(131, 3, 'Christmas', 'חג המולד', '2013-12-15', 'Full'),
(118, 2, 'Pesach VI', 'פסח VI', '2014-01-01', 'Full'),
(117, 2, 'Pesach I', 'פסח אני', '2013-11-02', 'Full'),
(116, 2, 'Erev Pesach', 'ערב פסח', '2013-12-08', 'Full'),
(115, 1, 'New Year', 'ראש השנה', '2014-01-01', 'Full'),
(114, 1, 'Thanks giving', 'תודה מתן', '2013-11-01', 'Full'),
(113, 1, 'Christmas', 'חג המולד', '2013-12-15', 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `photo_comments`
--

CREATE TABLE IF NOT EXISTS `photo_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_photogallery_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_photogallery_id` (`user_business_photogallery_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `photo_comments`
--

INSERT INTO `photo_comments` (`id`, `user_business_photogallery_id`, `users_id`, `comments`) VALUES
(1, 29, 129, 'Great work'),
(2, 17, 129, 'Cool'),
(3, 17, 129, 'dd'),
(4, 17, 129, 'yrthgrfhy'),
(5, 17, 129, 'fghfghgfhfhg'),
(6, 17, 129, 'fghfghfghfghfghfghfghfghfghfghfghgf fghfghfghfghfg'),
(7, 17, 129, 'dfgdfgd'),
(8, 16, 129, 'good one g'),
(9, 16, 129, 'onefhghfghfghf fghfgh'),
(10, 29, 129, 'dfgfdgfdgdfg'),
(11, 25, 129, 'yes'),
(12, 16, 129, 'fgdfhfhdh'),
(13, 29, 349, 'y'),
(14, 17, 460, 'c x z fdsfdsf dsfdsfdsds dfdsfds f'),
(15, 25, 129, 'test comment'),
(16, 25, 129, 'test comment2\n'),
(17, 17, 129, 'good'),
(18, 29, 129, 'hey'),
(19, 30, 129, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `posted_class_series`
--

CREATE TABLE IF NOT EXISTS `posted_class_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_classes_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=833 ;

--
-- Dumping data for table `posted_class_series`
--

INSERT INTO `posted_class_series` (`id`, `user_business_classes_id`, `business_id`, `date_added`) VALUES
(3, 9, 0, '2013-08-06 15:08:42'),
(4, 9, 0, '2013-08-06 15:08:24'),
(5, 9, 0, '2013-08-06 15:08:22'),
(6, 10, 0, '2013-08-07 06:08:40'),
(7, 9, 0, '2013-08-07 06:08:01'),
(8, 9, 0, '2013-08-07 09:08:05'),
(9, 9, 0, '2013-08-07 09:08:11'),
(10, 9, 0, '2013-08-07 09:08:58'),
(11, 9, 0, '2013-08-07 09:08:38'),
(12, 9, 0, '2013-08-07 09:08:47'),
(13, 10, 0, '2013-08-07 09:08:01'),
(14, 9, 0, '2013-08-07 10:08:28'),
(15, 9, 0, '2013-08-07 10:08:02'),
(16, 9, 0, '2013-08-07 10:08:43'),
(17, 9, 0, '2013-08-07 10:08:42'),
(18, 9, 0, '2013-08-07 10:08:23'),
(19, 9, 0, '2013-08-07 10:08:56'),
(20, 9, 0, '2013-08-07 11:08:14'),
(21, 10, 0, '2013-08-07 11:08:58'),
(22, 9, 0, '2013-08-07 11:08:07'),
(23, 9, 0, '2013-08-07 12:08:29'),
(24, 10, 0, '2013-08-07 12:08:03'),
(25, 9, 0, '2013-08-07 12:08:08'),
(26, 9, 0, '2013-08-07 12:08:26'),
(27, 9, 0, '2013-08-07 12:08:24'),
(28, 9, 0, '2013-08-07 12:08:40'),
(29, 10, 0, '2013-08-07 12:08:49'),
(30, 9, 0, '2013-08-08 13:08:20'),
(31, 9, 0, '2013-08-08 13:08:12'),
(32, 9, 0, '2013-08-08 13:08:24'),
(33, 9, 0, '2013-08-08 13:08:49'),
(34, 9, 0, '2013-08-08 13:08:49'),
(35, 9, 0, '2013-08-08 13:08:44'),
(36, 9, 0, '2013-08-08 15:08:54'),
(37, 9, 0, '2013-08-08 15:08:12'),
(38, 0, 0, '2013-08-09 07:08:50'),
(39, 9, 0, '2013-08-12 06:08:58'),
(40, 9, 0, '2013-08-12 06:08:21'),
(41, 9, 0, '2013-08-12 09:08:11'),
(42, 9, 0, '2013-08-12 09:08:45'),
(43, 9, 0, '2013-08-13 11:08:24'),
(44, 9, 0, '2013-08-13 12:08:00'),
(45, 9, 0, '2013-08-13 12:08:08'),
(46, 9, 0, '2013-08-13 12:08:46'),
(47, 9, 0, '2013-08-13 12:08:11'),
(48, 9, 0, '2013-08-13 12:08:14'),
(49, 9, 0, '2013-08-13 12:08:45'),
(50, 9, 0, '2013-08-13 12:08:03'),
(51, 9, 0, '2013-08-13 12:08:24'),
(52, 9, 0, '2013-08-13 13:08:14'),
(53, 9, 0, '2013-08-13 13:08:27'),
(54, 9, 0, '2013-08-13 13:08:58'),
(55, 9, 0, '2013-08-13 13:08:10'),
(56, 9, 0, '2013-08-13 13:08:19'),
(57, 9, 0, '2013-08-14 06:08:26'),
(58, 9, 0, '2013-08-14 06:08:04'),
(59, 0, 0, '2013-08-14 08:08:45'),
(60, 0, 0, '2013-08-14 08:08:54'),
(61, 0, 0, '2013-08-14 08:08:42'),
(62, 9, 0, '2013-08-14 08:08:11'),
(63, 9, 0, '2013-08-14 08:08:10'),
(64, 9, 0, '2013-08-14 08:08:30'),
(65, 9, 0, '2013-08-26 07:08:11'),
(66, 9, 0, '2013-08-26 11:08:12'),
(67, 9, 0, '2013-08-26 11:08:04'),
(68, 9, 0, '2013-08-26 12:08:17'),
(69, 9, 0, '2013-08-26 13:08:03'),
(70, 9, 0, '2013-08-26 13:08:24'),
(71, 9, 0, '2013-08-27 07:08:28'),
(72, 9, 0, '2013-08-27 07:08:33'),
(73, 10, 0, '2013-08-27 13:08:00'),
(74, 10, 0, '2013-08-27 13:08:07'),
(75, 10, 0, '2013-08-27 13:08:25'),
(76, 10, 0, '2013-08-27 13:08:12'),
(77, 10, 0, '2013-08-27 13:08:36'),
(78, 10, 0, '2013-08-27 13:08:26'),
(79, 10, 0, '2013-08-27 13:08:44'),
(80, 9, 0, '2013-08-27 13:08:45'),
(81, 9, 0, '2013-08-27 13:08:13'),
(82, 9, 0, '2013-08-27 14:08:31'),
(83, 9, 0, '2013-08-27 14:08:20'),
(84, 9, 0, '2013-08-27 14:08:09'),
(85, 9, 0, '2013-08-27 14:08:22'),
(86, 9, 0, '2013-08-27 14:08:26'),
(87, 10, 0, '2013-08-27 14:08:15'),
(88, 9, 0, '2013-08-27 14:08:43'),
(89, 9, 0, '2013-08-27 14:08:11'),
(90, 9, 0, '2013-08-29 07:08:21'),
(91, 10, 0, '2013-08-29 07:08:30'),
(92, 9, 0, '2013-08-29 07:08:49'),
(93, 9, 0, '2013-08-29 07:08:19'),
(94, 9, 0, '2013-08-29 07:08:06'),
(95, 9, 0, '2013-08-29 07:08:50'),
(96, 9, 0, '2013-08-29 07:08:17'),
(97, 9, 0, '2013-09-04 08:09:05'),
(98, 9, 0, '2013-09-04 08:09:50'),
(99, 9, 0, '2013-09-04 09:09:12'),
(100, 9, 0, '2013-09-27 05:09:58'),
(101, 9, 0, '2013-09-27 05:09:23'),
(102, 9, 0, '2013-10-04 06:10:39'),
(103, 9, 0, '2013-10-04 13:10:47'),
(104, 9, 0, '2013-10-05 05:10:10'),
(105, 9, 0, '2013-10-05 05:10:01'),
(106, 9, 0, '2013-10-05 05:10:16'),
(107, 9, 0, '2013-10-05 06:10:17'),
(108, 9, 0, '2013-10-05 06:10:06'),
(109, 9, 0, '2013-10-05 06:10:00'),
(110, 9, 0, '2013-10-05 07:10:26'),
(111, 9, 0, '2013-10-05 07:10:49'),
(112, 9, 0, '2013-10-05 07:10:35'),
(113, 10, 0, '2013-10-05 09:10:22'),
(114, 9, 0, '2013-10-05 10:10:03'),
(115, 9, 0, '2013-10-05 10:10:05'),
(116, 9, 0, '2013-10-05 10:10:13'),
(117, 9, 0, '2013-10-05 12:10:53'),
(118, 9, 0, '2013-10-07 05:10:10'),
(119, 9, 0, '2013-10-07 05:10:06'),
(120, 9, 0, '2013-10-07 05:10:11'),
(121, 9, 0, '2013-10-07 09:10:00'),
(122, 9, 0, '2013-10-07 10:10:46'),
(123, 9, 0, '2013-10-07 10:10:45'),
(124, 9, 0, '2013-10-07 10:10:23'),
(125, 9, 0, '2013-10-07 10:10:37'),
(126, 9, 0, '2013-10-07 10:10:53'),
(127, 9, 0, '2013-10-07 10:10:15'),
(128, 9, 0, '2013-10-07 10:10:53'),
(129, 9, 0, '2013-10-07 10:10:28'),
(130, 9, 0, '2013-10-07 11:10:42'),
(131, 9, 0, '2013-10-07 11:10:07'),
(132, 9, 0, '2013-10-07 11:10:40'),
(133, 9, 0, '2013-10-07 11:10:34'),
(134, 9, 0, '2013-10-07 11:10:01'),
(135, 9, 0, '2013-10-07 12:10:59'),
(136, 9, 0, '2013-10-08 07:10:34'),
(137, 9, 0, '2013-10-08 11:10:00'),
(138, 9, 0, '2013-10-08 11:10:06'),
(139, 9, 0, '2013-10-08 11:10:41'),
(140, 9, 0, '2013-10-08 11:10:19'),
(141, 9, 0, '2013-10-08 11:10:48'),
(142, 9, 0, '2013-10-08 12:10:37'),
(143, 9, 0, '2013-10-08 12:10:53'),
(144, 9, 0, '2013-10-08 12:10:07'),
(145, 9, 0, '2013-10-08 12:10:05'),
(146, 9, 0, '2013-10-08 12:10:03'),
(147, 9, 0, '2013-10-08 12:10:26'),
(148, 9, 0, '2013-10-08 12:10:43'),
(149, 9, 0, '2013-10-08 12:10:12'),
(150, 9, 0, '2013-10-08 12:10:31'),
(151, 9, 0, '2013-10-08 12:10:10'),
(152, 9, 0, '2013-10-08 12:10:09'),
(153, 9, 0, '2013-10-08 12:10:27'),
(154, 9, 0, '2013-10-08 12:10:50'),
(155, 9, 0, '2013-10-08 12:10:05'),
(156, 9, 0, '2013-10-08 12:10:21'),
(157, 9, 0, '2013-10-08 12:10:10'),
(158, 9, 0, '2013-10-08 12:10:04'),
(159, 9, 0, '2013-10-08 12:10:29'),
(160, 9, 0, '2013-10-08 12:10:16'),
(161, 9, 0, '2013-10-08 12:10:31'),
(162, 9, 0, '2013-10-08 12:10:44'),
(163, 9, 0, '2013-10-08 12:10:55'),
(164, 9, 0, '2013-10-08 12:10:15'),
(165, 9, 0, '2013-10-08 12:10:30'),
(166, 9, 0, '2013-10-08 13:10:39'),
(167, 9, 0, '2013-10-08 13:10:59'),
(168, 9, 0, '2013-10-08 13:10:16'),
(169, 9, 0, '2013-10-09 04:10:19'),
(170, 9, 0, '2013-10-09 04:10:21'),
(171, 9, 0, '2013-10-09 05:10:41'),
(172, 9, 0, '2013-10-09 05:10:38'),
(173, 9, 0, '2013-10-09 05:10:47'),
(174, 9, 0, '2013-10-09 05:10:56'),
(175, 9, 0, '2013-10-09 05:10:48'),
(176, 9, 0, '2013-10-09 05:10:26'),
(177, 9, 0, '2013-10-09 05:10:56'),
(178, 9, 0, '2013-10-09 05:10:32'),
(179, 0, 0, '0000-00-00 00:00:00'),
(180, 0, 0, '0000-00-00 00:00:00'),
(181, 0, 0, '0000-00-00 00:00:00'),
(182, 0, 0, '0000-00-00 00:00:00'),
(183, 0, 0, '0000-00-00 00:00:00'),
(184, 0, 0, '0000-00-00 00:00:00'),
(185, 53, 0, '0000-00-00 00:00:00'),
(186, 69, 0, '0000-00-00 00:00:00'),
(187, 0, 0, '0000-00-00 00:00:00'),
(188, 75, 0, '0000-00-00 00:00:00'),
(189, 78, 0, '0000-00-00 00:00:00'),
(190, 73, 0, '0000-00-00 00:00:00'),
(191, 0, 0, '0000-00-00 00:00:00'),
(192, 85, 0, '0000-00-00 00:00:00'),
(193, 94, 0, '0000-00-00 00:00:00'),
(194, 0, 0, '0000-00-00 00:00:00'),
(195, 105, 0, '0000-00-00 00:00:00'),
(196, 106, 0, '0000-00-00 00:00:00'),
(197, 106, 0, '0000-00-00 00:00:00'),
(198, 106, 0, '0000-00-00 00:00:00'),
(199, 106, 0, '0000-00-00 00:00:00'),
(200, 130, 0, '0000-00-00 00:00:00'),
(201, 106, 0, '0000-00-00 00:00:00'),
(202, 106, 0, '0000-00-00 00:00:00'),
(203, 0, 0, '0000-00-00 00:00:00'),
(204, 161, 0, '0000-00-00 00:00:00'),
(205, 161, 0, '0000-00-00 00:00:00'),
(206, 0, 0, '0000-00-00 00:00:00'),
(207, 0, 0, '0000-00-00 00:00:00'),
(208, 0, 0, '0000-00-00 00:00:00'),
(209, 0, 0, '0000-00-00 00:00:00'),
(210, 0, 0, '0000-00-00 00:00:00'),
(211, 0, 0, '0000-00-00 00:00:00'),
(212, 0, 0, '0000-00-00 00:00:00'),
(213, 0, 0, '0000-00-00 00:00:00'),
(214, 0, 0, '0000-00-00 00:00:00'),
(215, 0, 0, '0000-00-00 00:00:00'),
(216, 0, 0, '0000-00-00 00:00:00'),
(217, 0, 0, '0000-00-00 00:00:00'),
(218, 0, 0, '0000-00-00 00:00:00'),
(219, 0, 0, '0000-00-00 00:00:00'),
(220, 0, 0, '0000-00-00 00:00:00'),
(221, 0, 0, '0000-00-00 00:00:00'),
(222, 0, 0, '0000-00-00 00:00:00'),
(223, 0, 0, '0000-00-00 00:00:00'),
(224, 0, 0, '0000-00-00 00:00:00'),
(225, 309, 0, '0000-00-00 00:00:00'),
(226, 0, 0, '0000-00-00 00:00:00'),
(227, 0, 0, '0000-00-00 00:00:00'),
(228, 0, 0, '0000-00-00 00:00:00'),
(229, 0, 0, '0000-00-00 00:00:00'),
(230, 0, 0, '0000-00-00 00:00:00'),
(231, 0, 0, '0000-00-00 00:00:00'),
(232, 0, 0, '0000-00-00 00:00:00'),
(233, 0, 0, '0000-00-00 00:00:00'),
(234, 0, 0, '0000-00-00 00:00:00'),
(235, 0, 0, '0000-00-00 00:00:00'),
(236, 0, 0, '0000-00-00 00:00:00'),
(237, 0, 0, '0000-00-00 00:00:00'),
(238, 0, 0, '0000-00-00 00:00:00'),
(239, 0, 0, '0000-00-00 00:00:00'),
(240, 0, 0, '0000-00-00 00:00:00'),
(241, 0, 0, '0000-00-00 00:00:00'),
(242, 117, 0, '0000-00-00 00:00:00'),
(243, 116, 0, '0000-00-00 00:00:00'),
(244, 0, 0, '0000-00-00 00:00:00'),
(245, 0, 0, '0000-00-00 00:00:00'),
(246, 0, 0, '0000-00-00 00:00:00'),
(247, 0, 0, '0000-00-00 00:00:00'),
(248, 0, 0, '0000-00-00 00:00:00'),
(249, 0, 0, '0000-00-00 00:00:00'),
(250, 0, 0, '0000-00-00 00:00:00'),
(251, 0, 0, '0000-00-00 00:00:00'),
(252, 0, 0, '0000-00-00 00:00:00'),
(253, 0, 0, '0000-00-00 00:00:00'),
(254, 162, 0, '0000-00-00 00:00:00'),
(255, 162, 0, '0000-00-00 00:00:00'),
(256, 153, 0, '0000-00-00 00:00:00'),
(257, 153, 0, '0000-00-00 00:00:00'),
(258, 153, 0, '0000-00-00 00:00:00'),
(259, 0, 0, '0000-00-00 00:00:00'),
(260, 175, 0, '0000-00-00 00:00:00'),
(261, 177, 0, '0000-00-00 00:00:00'),
(262, 182, 0, '0000-00-00 00:00:00'),
(263, 182, 0, '0000-00-00 00:00:00'),
(264, 103, 0, '0000-00-00 00:00:00'),
(265, 0, 0, '0000-00-00 00:00:00'),
(266, 194, 0, '0000-00-00 00:00:00'),
(267, 197, 0, '0000-00-00 00:00:00'),
(268, 197, 0, '0000-00-00 00:00:00'),
(269, 0, 0, '0000-00-00 00:00:00'),
(270, 223, 0, '0000-00-00 00:00:00'),
(271, 0, 0, '0000-00-00 00:00:00'),
(272, 229, 0, '0000-00-00 00:00:00'),
(273, 0, 0, '0000-00-00 00:00:00'),
(274, 0, 0, '0000-00-00 00:00:00'),
(275, 239, 0, '0000-00-00 00:00:00'),
(276, 232, 0, '0000-00-00 00:00:00'),
(277, 0, 0, '0000-00-00 00:00:00'),
(278, 249, 0, '0000-00-00 00:00:00'),
(279, 0, 0, '0000-00-00 00:00:00'),
(280, 0, 0, '0000-00-00 00:00:00'),
(281, 0, 0, '0000-00-00 00:00:00'),
(282, 0, 0, '0000-00-00 00:00:00'),
(283, 0, 0, '0000-00-00 00:00:00'),
(284, 0, 0, '0000-00-00 00:00:00'),
(285, 0, 0, '0000-00-00 00:00:00'),
(286, 0, 0, '0000-00-00 00:00:00'),
(287, 0, 0, '0000-00-00 00:00:00'),
(288, 0, 0, '0000-00-00 00:00:00'),
(289, 0, 0, '0000-00-00 00:00:00'),
(290, 0, 0, '0000-00-00 00:00:00'),
(291, 0, 0, '0000-00-00 00:00:00'),
(292, 0, 0, '0000-00-00 00:00:00'),
(293, 0, 0, '0000-00-00 00:00:00'),
(294, 39, 0, '0000-00-00 00:00:00'),
(295, 39, 0, '0000-00-00 00:00:00'),
(296, 21, 0, '0000-00-00 00:00:00'),
(297, 1, 0, '0000-00-00 00:00:00'),
(298, 0, 0, '0000-00-00 00:00:00'),
(299, 76, 0, '0000-00-00 00:00:00'),
(300, 97, 0, '0000-00-00 00:00:00'),
(301, 95, 0, '0000-00-00 00:00:00'),
(302, 0, 0, '0000-00-00 00:00:00'),
(303, 106, 0, '0000-00-00 00:00:00'),
(304, 0, 0, '0000-00-00 00:00:00'),
(305, 132, 0, '0000-00-00 00:00:00'),
(306, 132, 0, '0000-00-00 00:00:00'),
(307, 132, 0, '0000-00-00 00:00:00'),
(308, 0, 0, '0000-00-00 00:00:00'),
(309, 170, 0, '0000-00-00 00:00:00'),
(310, 170, 0, '0000-00-00 00:00:00'),
(311, 0, 0, '0000-00-00 00:00:00'),
(312, 194, 0, '0000-00-00 00:00:00'),
(313, 194, 0, '0000-00-00 00:00:00'),
(314, 132, 0, '0000-00-00 00:00:00'),
(315, 0, 0, '0000-00-00 00:00:00'),
(316, 211, 0, '0000-00-00 00:00:00'),
(317, 211, 0, '0000-00-00 00:00:00'),
(318, 0, 0, '0000-00-00 00:00:00'),
(319, 227, 0, '0000-00-00 00:00:00'),
(320, 227, 0, '0000-00-00 00:00:00'),
(321, 238, 0, '0000-00-00 00:00:00'),
(322, 238, 0, '0000-00-00 00:00:00'),
(323, 0, 0, '0000-00-00 00:00:00'),
(324, 253, 0, '0000-00-00 00:00:00'),
(325, 0, 0, '0000-00-00 00:00:00'),
(326, 0, 0, '0000-00-00 00:00:00'),
(327, 0, 0, '0000-00-00 00:00:00'),
(328, 0, 0, '0000-00-00 00:00:00'),
(329, 0, 0, '0000-00-00 00:00:00'),
(330, 279, 0, '0000-00-00 00:00:00'),
(331, 0, 0, '0000-00-00 00:00:00'),
(332, 292, 0, '0000-00-00 00:00:00'),
(333, 0, 0, '0000-00-00 00:00:00'),
(334, 298, 0, '0000-00-00 00:00:00'),
(335, 299, 0, '0000-00-00 00:00:00'),
(336, 292, 0, '0000-00-00 00:00:00'),
(337, 294, 0, '0000-00-00 00:00:00'),
(338, 318, 0, '0000-00-00 00:00:00'),
(339, 0, 0, '0000-00-00 00:00:00'),
(340, 323, 0, '0000-00-00 00:00:00'),
(341, 323, 0, '0000-00-00 00:00:00'),
(342, 0, 0, '0000-00-00 00:00:00'),
(343, 330, 0, '0000-00-00 00:00:00'),
(344, 330, 0, '0000-00-00 00:00:00'),
(345, 330, 0, '0000-00-00 00:00:00'),
(346, 345, 0, '0000-00-00 00:00:00'),
(347, 349, 0, '0000-00-00 00:00:00'),
(348, 0, 0, '0000-00-00 00:00:00'),
(349, 0, 0, '0000-00-00 00:00:00'),
(350, 330, 0, '0000-00-00 00:00:00'),
(351, 0, 0, '0000-00-00 00:00:00'),
(352, 350, 0, '0000-00-00 00:00:00'),
(353, 350, 0, '0000-00-00 00:00:00'),
(354, 350, 0, '0000-00-00 00:00:00'),
(355, 0, 0, '0000-00-00 00:00:00'),
(356, 361, 0, '0000-00-00 00:00:00'),
(357, 370, 0, '0000-00-00 00:00:00'),
(358, 0, 0, '0000-00-00 00:00:00'),
(359, 375, 0, '0000-00-00 00:00:00'),
(360, 0, 0, '0000-00-00 00:00:00'),
(361, 381, 0, '0000-00-00 00:00:00'),
(362, 381, 0, '0000-00-00 00:00:00'),
(363, 381, 0, '0000-00-00 00:00:00'),
(364, 0, 0, '0000-00-00 00:00:00'),
(365, 395, 0, '0000-00-00 00:00:00'),
(366, 402, 0, '0000-00-00 00:00:00'),
(367, 0, 0, '0000-00-00 00:00:00'),
(368, 411, 0, '0000-00-00 00:00:00'),
(369, 0, 0, '0000-00-00 00:00:00'),
(370, 423, 0, '0000-00-00 00:00:00'),
(371, 423, 0, '0000-00-00 00:00:00'),
(372, 0, 0, '0000-00-00 00:00:00'),
(373, 435, 0, '0000-00-00 00:00:00'),
(374, 0, 0, '0000-00-00 00:00:00'),
(375, 447, 0, '0000-00-00 00:00:00'),
(376, 447, 0, '0000-00-00 00:00:00'),
(377, 457, 0, '0000-00-00 00:00:00'),
(378, 454, 0, '0000-00-00 00:00:00'),
(379, 461, 0, '0000-00-00 00:00:00'),
(380, 461, 0, '0000-00-00 00:00:00'),
(381, 0, 0, '0000-00-00 00:00:00'),
(382, 0, 0, '0000-00-00 00:00:00'),
(383, 474, 0, '0000-00-00 00:00:00'),
(384, 474, 0, '0000-00-00 00:00:00'),
(385, 0, 0, '0000-00-00 00:00:00'),
(386, 0, 0, '0000-00-00 00:00:00'),
(387, 483, 0, '0000-00-00 00:00:00'),
(388, 483, 0, '0000-00-00 00:00:00'),
(389, 0, 0, '0000-00-00 00:00:00'),
(390, 489, 0, '0000-00-00 00:00:00'),
(391, 0, 0, '0000-00-00 00:00:00'),
(392, 0, 0, '0000-00-00 00:00:00'),
(393, 0, 0, '0000-00-00 00:00:00'),
(394, 516, 0, '0000-00-00 00:00:00'),
(395, 516, 0, '0000-00-00 00:00:00'),
(396, 0, 0, '0000-00-00 00:00:00'),
(397, 529, 0, '0000-00-00 00:00:00'),
(398, 0, 0, '0000-00-00 00:00:00'),
(399, 0, 0, '0000-00-00 00:00:00'),
(400, 0, 0, '0000-00-00 00:00:00'),
(401, 0, 0, '0000-00-00 00:00:00'),
(402, 0, 0, '0000-00-00 00:00:00'),
(403, 0, 0, '0000-00-00 00:00:00'),
(404, 0, 0, '0000-00-00 00:00:00'),
(405, 0, 0, '0000-00-00 00:00:00'),
(406, 0, 0, '0000-00-00 00:00:00'),
(407, 0, 0, '0000-00-00 00:00:00'),
(408, 0, 0, '0000-00-00 00:00:00'),
(409, 597, 0, '0000-00-00 00:00:00'),
(410, 0, 0, '0000-00-00 00:00:00'),
(411, 0, 0, '0000-00-00 00:00:00'),
(412, 0, 0, '0000-00-00 00:00:00'),
(413, 600, 0, '0000-00-00 00:00:00'),
(414, 600, 0, '0000-00-00 00:00:00'),
(415, 600, 0, '0000-00-00 00:00:00'),
(416, 600, 0, '0000-00-00 00:00:00'),
(417, 625, 0, '0000-00-00 00:00:00'),
(418, 0, 0, '0000-00-00 00:00:00'),
(419, 636, 0, '0000-00-00 00:00:00'),
(420, 636, 0, '0000-00-00 00:00:00'),
(421, 636, 0, '0000-00-00 00:00:00'),
(422, 625, 0, '0000-00-00 00:00:00'),
(423, 0, 0, '0000-00-00 00:00:00'),
(426, 0, 30, '2013-12-07 04:12:51'),
(427, 0, 30, '2013-12-07 04:12:34'),
(428, 0, 30, '2013-12-07 04:12:08'),
(429, 0, 30, '2013-12-07 04:12:38'),
(430, 0, 30, '2013-12-07 06:12:29'),
(431, 0, 30, '2013-12-07 06:12:39'),
(432, 0, 30, '2013-12-07 09:12:16'),
(433, 0, 30, '2013-12-07 09:12:32'),
(434, 0, 30, '2013-12-07 09:12:04'),
(435, 0, 30, '2013-12-07 09:12:16'),
(436, 0, 30, '2013-12-07 09:12:39'),
(437, 0, 30, '2013-12-07 09:12:56'),
(438, 0, 30, '2013-12-07 09:12:13'),
(439, 0, 30, '2013-12-07 09:12:39'),
(440, 0, 30, '2013-12-07 09:12:54'),
(441, 0, 30, '2013-12-07 09:12:00'),
(442, 0, 30, '2013-12-07 10:12:29'),
(443, 0, 30, '2013-12-07 10:12:46'),
(444, 0, 30, '2013-12-07 10:12:37'),
(445, 0, 30, '2013-12-07 10:12:00'),
(446, 0, 30, '2013-12-07 10:12:39'),
(447, 0, 30, '2013-12-07 10:12:13'),
(448, 0, 30, '2013-12-07 10:12:33'),
(449, 0, 30, '2013-12-07 11:12:07'),
(450, 0, 30, '2013-12-07 11:12:35'),
(451, 0, 30, '2013-12-07 11:12:40'),
(452, 0, 30, '2013-12-07 11:12:05'),
(453, 0, 30, '2013-12-07 11:12:31'),
(454, 0, 30, '2013-12-07 11:12:22'),
(455, 0, 30, '2013-12-07 11:12:16'),
(456, 0, 30, '2013-12-07 11:12:30'),
(457, 0, 30, '2013-12-07 11:12:48'),
(458, 0, 30, '2013-12-07 11:12:06'),
(459, 0, 30, '2013-12-07 11:12:58'),
(460, 0, 30, '2013-12-07 11:12:21'),
(461, 0, 30, '2013-12-09 04:12:31'),
(462, 0, 30, '2013-12-09 04:12:54'),
(463, 0, 30, '2013-12-09 04:12:10'),
(464, 0, 30, '2013-12-09 04:12:25'),
(465, 0, 30, '2013-12-09 04:12:49'),
(466, 0, 30, '2013-12-09 04:12:16'),
(467, 0, 30, '2013-12-09 04:12:44'),
(468, 0, 30, '2013-12-09 04:12:07'),
(469, 0, 30, '2013-12-09 04:12:41'),
(470, 0, 30, '2013-12-09 04:12:23'),
(471, 0, 30, '2013-12-09 04:12:53'),
(472, 0, 30, '2013-12-09 05:12:39'),
(473, 0, 30, '2013-12-09 05:12:56'),
(474, 0, 30, '2013-12-09 05:12:42'),
(475, 0, 30, '2013-12-09 05:12:04'),
(476, 0, 30, '2013-12-09 05:12:44'),
(477, 0, 30, '2013-12-09 05:12:27'),
(478, 0, 30, '2013-12-09 05:12:46'),
(479, 0, 30, '2013-12-09 06:12:19'),
(480, 0, 30, '2013-12-09 06:12:06'),
(481, 0, 30, '2013-12-09 06:12:25'),
(482, 0, 30, '2013-12-09 06:12:23'),
(483, 0, 30, '2013-12-09 07:12:45'),
(484, 0, 30, '2013-12-09 08:12:06'),
(485, 0, 30, '2013-12-09 08:12:42'),
(486, 0, 30, '2013-12-09 08:12:01'),
(487, 0, 30, '2013-12-09 08:12:20'),
(488, 0, 30, '2013-12-09 09:12:56'),
(489, 0, 30, '2013-12-09 09:12:16'),
(490, 0, 30, '2013-12-09 09:12:44'),
(491, 0, 30, '2013-12-09 09:12:16'),
(492, 0, 30, '2013-12-09 09:12:08'),
(493, 0, 30, '2013-12-09 09:12:23'),
(494, 0, 30, '2013-12-09 09:12:52'),
(495, 0, 30, '2013-12-09 10:12:22'),
(496, 0, 30, '2013-12-09 11:12:29'),
(497, 0, 30, '2013-12-09 11:12:18'),
(498, 0, 30, '2013-12-09 11:12:35'),
(499, 0, 30, '2013-12-09 12:12:37'),
(500, 0, 30, '2013-12-09 12:12:19'),
(501, 0, 30, '2013-12-09 12:12:09'),
(502, 0, 30, '2013-12-10 04:12:16'),
(503, 0, 30, '2013-12-10 06:12:54'),
(504, 0, 30, '2013-12-10 06:12:25'),
(505, 0, 30, '2013-12-10 06:12:45'),
(506, 0, 30, '2013-12-10 06:12:56'),
(507, 0, 30, '2013-12-10 06:12:49'),
(508, 0, 30, '2013-12-10 06:12:13'),
(509, 0, 30, '2013-12-10 06:12:15'),
(510, 0, 30, '2013-12-10 06:12:18'),
(511, 0, 30, '2013-12-10 06:12:17'),
(512, 0, 30, '2013-12-10 06:12:20'),
(513, 0, 30, '2013-12-10 06:12:11'),
(514, 0, 30, '2013-12-10 06:12:18'),
(515, 0, 30, '2013-12-10 06:12:55'),
(516, 0, 30, '2013-12-10 06:12:16'),
(517, 0, 30, '2013-12-10 06:12:30'),
(518, 0, 30, '2013-12-10 07:12:43'),
(519, 0, 30, '2013-12-10 07:12:35'),
(520, 0, 30, '2013-12-10 07:12:50'),
(521, 0, 30, '2013-12-10 07:12:42'),
(522, 0, 30, '2013-12-10 07:12:53'),
(523, 0, 30, '2013-12-10 07:12:05'),
(524, 0, 30, '2013-12-10 07:12:19'),
(525, 0, 30, '2013-12-10 07:12:15'),
(526, 0, 30, '2013-12-10 07:12:25'),
(527, 0, 30, '2013-12-10 07:12:16'),
(528, 0, 30, '2013-12-10 07:12:43'),
(529, 0, 30, '2013-12-10 07:12:12'),
(530, 0, 30, '2013-12-10 07:12:51'),
(531, 0, 30, '2013-12-10 07:12:26'),
(532, 0, 30, '2013-12-10 07:12:12'),
(533, 0, 30, '2013-12-10 07:12:52'),
(534, 0, 30, '2013-12-10 07:12:25'),
(535, 0, 30, '2013-12-10 08:12:32'),
(536, 0, 30, '2013-12-10 08:12:45'),
(537, 0, 30, '2013-12-10 08:12:09'),
(538, 0, 30, '2013-12-10 08:12:21'),
(539, 0, 30, '2013-12-10 08:12:39'),
(540, 0, 30, '2013-12-10 08:12:51'),
(541, 0, 30, '2013-12-10 08:12:02'),
(542, 0, 30, '2013-12-10 08:12:05'),
(543, 0, 30, '2013-12-10 08:12:04'),
(544, 0, 30, '2013-12-10 08:12:11'),
(545, 0, 30, '2013-12-10 09:12:02'),
(546, 0, 30, '2013-12-10 09:12:21'),
(547, 0, 30, '2013-12-10 09:12:47'),
(548, 0, 30, '2013-12-10 09:12:50'),
(549, 0, 30, '2013-12-10 09:12:46'),
(550, 0, 30, '2013-12-10 09:12:19'),
(551, 0, 30, '2013-12-10 09:12:48'),
(552, 0, 30, '2013-12-10 09:12:55'),
(553, 0, 30, '2013-12-10 09:12:41'),
(554, 0, 30, '2013-12-10 09:12:51'),
(555, 0, 30, '2013-12-10 11:12:17'),
(556, 0, 0, '0000-00-00 00:00:00'),
(557, 0, 30, '2013-12-11 05:12:20'),
(558, 0, 30, '2013-12-11 05:12:34'),
(559, 0, 30, '2013-12-11 05:12:06'),
(560, 0, 30, '2013-12-11 05:12:31'),
(561, 0, 30, '2013-12-11 05:12:58'),
(562, 0, 30, '2013-12-11 05:12:31'),
(563, 0, 30, '2013-12-11 05:12:25'),
(564, 0, 30, '2013-12-11 05:12:49'),
(565, 0, 30, '2013-12-11 05:12:22'),
(566, 0, 30, '2013-12-11 05:12:47'),
(567, 0, 30, '2013-12-11 05:12:15'),
(568, 0, 30, '2013-12-11 05:12:44'),
(569, 0, 30, '2013-12-11 05:12:12'),
(570, 0, 30, '2013-12-11 05:12:45'),
(571, 0, 30, '2013-12-11 05:12:54'),
(572, 0, 30, '2013-12-11 05:12:33'),
(573, 0, 30, '2013-12-11 05:12:25'),
(574, 0, 30, '2013-12-11 06:12:36'),
(575, 0, 30, '2013-12-11 06:12:45'),
(576, 0, 30, '2013-12-11 06:12:02'),
(577, 0, 30, '2013-12-11 06:12:15'),
(578, 0, 30, '2013-12-11 06:12:28'),
(579, 0, 30, '2013-12-11 06:12:27'),
(580, 0, 30, '2013-12-11 06:12:28'),
(581, 0, 30, '2013-12-11 06:12:08'),
(582, 0, 30, '2013-12-11 06:12:54'),
(583, 0, 30, '2013-12-11 06:12:10'),
(584, 0, 30, '2013-12-11 06:12:05'),
(585, 0, 30, '2013-12-11 06:12:20'),
(586, 0, 30, '2013-12-11 06:12:52'),
(587, 0, 30, '2013-12-11 07:12:01'),
(588, 0, 30, '2013-12-11 07:12:27'),
(589, 0, 30, '2013-12-11 07:12:05'),
(590, 0, 30, '2013-12-11 07:12:43'),
(591, 0, 30, '2013-12-11 07:12:05'),
(592, 0, 30, '2013-12-11 07:12:18'),
(593, 0, 30, '2013-12-11 07:12:04'),
(594, 0, 30, '2013-12-11 07:12:37'),
(595, 0, 30, '2013-12-11 07:12:17'),
(596, 0, 30, '2013-12-11 07:12:12'),
(597, 0, 30, '2013-12-11 07:12:37'),
(598, 0, 30, '2013-12-11 07:12:02'),
(599, 0, 30, '2013-12-11 07:12:55'),
(600, 0, 30, '2013-12-11 07:12:16'),
(601, 0, 30, '2013-12-11 07:12:45'),
(602, 0, 30, '2013-12-11 08:12:51'),
(603, 0, 30, '2013-12-13 11:12:24'),
(604, 0, 30, '2013-12-13 11:12:41'),
(605, 0, 30, '2013-12-13 11:12:14'),
(606, 0, 0, '0000-00-00 00:00:00'),
(607, 0, 0, '0000-00-00 00:00:00'),
(608, 662, 0, '0000-00-00 00:00:00'),
(609, 661, 0, '0000-00-00 00:00:00'),
(610, 0, 0, '0000-00-00 00:00:00'),
(611, 0, 0, '0000-00-00 00:00:00'),
(612, 0, 0, '0000-00-00 00:00:00'),
(613, 0, 0, '0000-00-00 00:00:00'),
(614, 0, 0, '0000-00-00 00:00:00'),
(615, 0, 0, '0000-00-00 00:00:00'),
(616, 0, 0, '0000-00-00 00:00:00'),
(617, 699, 0, '0000-00-00 00:00:00'),
(618, 699, 0, '0000-00-00 00:00:00'),
(619, 711, 0, '0000-00-00 00:00:00'),
(620, 711, 0, '0000-00-00 00:00:00'),
(621, 0, 30, '2013-12-13 12:12:01'),
(622, 0, 0, '0000-00-00 00:00:00'),
(623, 724, 0, '0000-00-00 00:00:00'),
(624, 0, 0, '0000-00-00 00:00:00'),
(625, 731, 0, '0000-00-00 00:00:00'),
(626, 731, 0, '0000-00-00 00:00:00'),
(627, 731, 0, '0000-00-00 00:00:00'),
(628, 731, 0, '0000-00-00 00:00:00'),
(629, 0, 0, '0000-00-00 00:00:00'),
(630, 0, 0, '0000-00-00 00:00:00'),
(631, 759, 0, '0000-00-00 00:00:00'),
(632, 731, 0, '0000-00-00 00:00:00'),
(633, 0, 30, '2013-12-23 04:12:48'),
(634, 0, 30, '2013-12-23 04:12:41'),
(635, 0, 30, '2013-12-23 04:12:16'),
(636, 0, 30, '2013-12-23 05:12:03'),
(637, 0, 30, '2013-12-23 05:12:58'),
(638, 0, 30, '2013-12-23 05:12:51'),
(639, 0, 30, '2013-12-23 05:12:11'),
(640, 0, 30, '2013-12-23 05:12:43'),
(641, 0, 30, '2013-12-23 05:12:46'),
(642, 0, 30, '2013-12-23 05:12:30'),
(643, 0, 30, '2013-12-23 05:12:46'),
(644, 0, 30, '2013-12-23 05:12:11'),
(645, 0, 30, '2013-12-23 05:12:02'),
(646, 0, 30, '2013-12-23 05:12:05'),
(647, 0, 30, '2013-12-23 05:12:15'),
(648, 0, 30, '2013-12-23 05:12:35'),
(649, 0, 30, '2013-12-23 05:12:34'),
(650, 0, 30, '2013-12-23 05:12:49'),
(651, 0, 30, '2013-12-23 06:12:17'),
(652, 0, 30, '2013-12-23 06:12:29'),
(653, 0, 30, '2013-12-23 06:12:19'),
(654, 0, 30, '2013-12-23 06:12:34'),
(655, 0, 30, '2013-12-23 06:12:48'),
(656, 0, 30, '2013-12-23 06:12:38'),
(657, 0, 30, '2013-12-23 06:12:07'),
(658, 0, 30, '2013-12-23 06:12:29'),
(659, 0, 30, '2013-12-23 06:12:45'),
(660, 0, 47, '2013-12-23 12:12:41'),
(661, 0, 47, '2013-12-23 12:12:24'),
(662, 0, 47, '2013-12-23 01:12:38'),
(663, 0, 47, '2013-12-23 01:12:19'),
(664, 0, 47, '2013-12-23 01:12:13'),
(665, 0, 30, '2013-12-24 04:12:52'),
(666, 0, 30, '2013-12-24 04:12:13'),
(667, 0, 30, '2013-12-24 04:12:40'),
(668, 0, 30, '2013-12-24 04:12:25'),
(669, 0, 30, '2013-12-24 04:12:42'),
(670, 0, 30, '2013-12-24 04:12:02'),
(671, 0, 30, '2013-12-24 04:12:30'),
(672, 0, 47, '2013-12-24 04:12:40'),
(673, 0, 47, '2013-12-24 04:12:45'),
(674, 0, 47, '2013-12-24 04:12:11'),
(675, 0, 47, '2013-12-24 05:12:35'),
(676, 0, 47, '2013-12-24 05:12:58'),
(677, 0, 47, '2013-12-24 05:12:18'),
(678, 0, 47, '2013-12-24 05:12:54'),
(679, 0, 47, '2013-12-24 05:12:49'),
(680, 0, 47, '2013-12-24 05:12:54'),
(681, 0, 47, '2013-12-24 07:12:13'),
(682, 0, 47, '2013-12-24 07:12:45'),
(683, 0, 47, '2013-12-24 07:12:12'),
(684, 0, 47, '2013-12-24 07:12:50'),
(685, 0, 47, '2013-12-24 07:12:31'),
(686, 0, 47, '2013-12-24 07:12:50'),
(687, 0, 47, '2013-12-24 07:12:24'),
(688, 0, 47, '2013-12-24 08:12:47'),
(689, 0, 47, '2013-12-24 08:12:39'),
(690, 0, 47, '2013-12-24 08:12:46'),
(691, 0, 47, '2013-12-24 08:12:07'),
(692, 0, 47, '2013-12-24 08:12:12'),
(693, 0, 47, '2013-12-24 08:12:01'),
(694, 0, 47, '2013-12-24 08:12:05'),
(695, 0, 47, '2013-12-24 08:12:31'),
(696, 0, 47, '2013-12-24 08:12:06'),
(697, 0, 47, '2013-12-24 08:12:01'),
(698, 0, 47, '2013-12-24 08:12:21'),
(699, 0, 47, '2013-12-24 08:12:34'),
(700, 0, 47, '2013-12-24 08:12:45'),
(701, 0, 47, '2013-12-24 08:12:52'),
(702, 0, 47, '2013-12-24 08:12:41'),
(703, 0, 47, '2013-12-24 08:12:45'),
(704, 0, 47, '2013-12-24 08:12:23'),
(705, 0, 47, '2013-12-24 09:12:37'),
(706, 0, 47, '2013-12-24 09:12:53'),
(707, 0, 47, '2013-12-24 09:12:15'),
(708, 0, 47, '2013-12-24 09:12:13'),
(709, 0, 47, '2013-12-24 09:12:36'),
(710, 0, 47, '2013-12-24 09:12:49'),
(711, 0, 47, '2013-12-24 09:12:35'),
(712, 0, 47, '2013-12-24 09:12:45'),
(713, 0, 47, '2013-12-24 09:12:58'),
(714, 0, 47, '2013-12-24 09:12:15'),
(715, 0, 47, '2013-12-24 09:12:30'),
(716, 0, 47, '2013-12-24 09:12:40'),
(717, 0, 47, '2013-12-24 09:12:15'),
(718, 0, 47, '2013-12-24 09:12:34'),
(719, 0, 47, '2013-12-24 09:12:01'),
(720, 0, 47, '2013-12-24 09:12:27'),
(721, 0, 47, '2013-12-24 09:12:22'),
(722, 0, 47, '2013-12-24 09:12:03'),
(723, 0, 47, '2013-12-24 09:12:40'),
(724, 0, 47, '2013-12-24 09:12:21'),
(725, 0, 47, '2013-12-24 09:12:51'),
(726, 0, 47, '2013-12-24 10:12:01'),
(727, 0, 47, '2013-12-24 10:12:30'),
(728, 0, 47, '2013-12-24 10:12:59'),
(729, 0, 47, '2013-12-24 10:12:08'),
(730, 0, 47, '2013-12-24 10:12:28'),
(731, 0, 47, '2013-12-24 10:12:10'),
(732, 0, 47, '2013-12-24 10:12:26'),
(733, 0, 47, '2013-12-24 11:12:44'),
(734, 0, 47, '2013-12-24 11:12:52'),
(735, 0, 30, '2013-12-25 04:12:57'),
(736, 0, 30, '2013-12-25 04:12:28'),
(737, 0, 30, '2013-12-25 05:12:24'),
(738, 0, 30, '2013-12-25 05:12:38'),
(739, 0, 30, '2013-12-25 05:12:34'),
(740, 0, 30, '2013-12-25 09:12:20'),
(741, 0, 30, '2013-12-25 09:12:36'),
(742, 0, 30, '2013-12-25 09:12:46'),
(743, 0, 30, '2013-12-25 10:12:56'),
(744, 0, 30, '2013-12-25 10:12:28'),
(745, 0, 30, '2013-12-25 10:12:28'),
(746, 0, 30, '2013-12-25 10:12:56'),
(747, 0, 30, '2013-12-25 10:12:53'),
(748, 0, 30, '2013-12-25 10:12:05'),
(749, 0, 30, '2013-12-25 10:12:49'),
(750, 0, 30, '2013-12-25 10:12:22'),
(751, 0, 30, '2013-12-25 10:12:49'),
(752, 0, 30, '2013-12-25 10:12:35'),
(753, 0, 47, '2013-12-25 11:12:10'),
(754, 0, 47, '2013-12-25 11:12:30'),
(755, 0, 47, '2013-12-25 11:12:41'),
(756, 0, 47, '2013-12-25 11:12:55'),
(757, 0, 47, '2013-12-25 11:12:06'),
(758, 0, 47, '2013-12-25 11:12:26'),
(759, 0, 47, '2013-12-25 11:12:38'),
(760, 0, 47, '2013-12-25 11:12:09'),
(761, 0, 47, '2013-12-25 11:12:22'),
(762, 0, 47, '2013-12-25 11:12:46'),
(763, 0, 47, '2013-12-26 09:12:41'),
(764, 0, 47, '2013-12-26 10:12:21'),
(765, 0, 47, '2013-12-26 10:12:34'),
(766, 0, 47, '2013-12-26 10:12:26'),
(767, 0, 47, '2013-12-26 10:12:30'),
(768, 0, 47, '2013-12-26 10:12:32'),
(769, 0, 47, '2013-12-26 10:12:24'),
(770, 0, 47, '2013-12-26 10:12:05'),
(771, 0, 47, '2013-12-26 10:12:58'),
(772, 0, 47, '2013-12-26 10:12:24'),
(773, 0, 47, '2013-12-26 10:12:38'),
(774, 0, 47, '2013-12-26 10:12:43'),
(775, 0, 47, '2013-12-26 10:12:46'),
(776, 0, 47, '2013-12-26 11:12:00'),
(777, 0, 47, '2013-12-26 11:12:40'),
(778, 0, 47, '2013-12-26 11:12:26'),
(779, 0, 47, '2013-12-26 11:12:09'),
(780, 0, 47, '2013-12-26 11:12:00'),
(781, 0, 47, '2013-12-26 11:12:54'),
(782, 0, 47, '2013-12-26 12:12:30'),
(783, 0, 47, '2013-12-26 12:12:06'),
(784, 0, 47, '2013-12-26 01:12:00'),
(785, 0, 47, '2013-12-26 01:12:53'),
(786, 0, 47, '2013-12-26 01:12:52'),
(787, 0, 47, '2013-12-26 01:12:17'),
(788, 0, 47, '2013-12-26 01:12:46'),
(789, 0, 47, '2013-12-26 01:12:00'),
(790, 0, 47, '2013-12-26 01:12:00'),
(791, 0, 47, '2013-12-26 01:12:16'),
(792, 0, 47, '2013-12-26 01:12:34'),
(793, 0, 47, '2013-12-26 01:12:41'),
(794, 0, 47, '2013-12-26 01:12:52'),
(795, 0, 47, '2013-12-26 01:12:08'),
(796, 0, 47, '2013-12-26 01:12:14'),
(797, 0, 47, '2013-12-26 01:12:23'),
(798, 0, 47, '2013-12-26 01:12:42'),
(799, 0, 47, '2013-12-26 01:12:51'),
(800, 0, 47, '2013-12-26 01:12:05'),
(801, 0, 47, '2013-12-26 01:12:37'),
(802, 0, 47, '2013-12-26 01:12:31'),
(803, 0, 47, '2013-12-27 04:12:25'),
(804, 0, 47, '2013-12-27 04:12:04'),
(805, 0, 47, '2013-12-27 04:12:25'),
(806, 0, 47, '2013-12-27 04:12:37'),
(807, 0, 47, '2013-12-27 04:12:59'),
(808, 0, 47, '2013-12-27 04:12:17'),
(809, 0, 47, '2013-12-27 04:12:12'),
(810, 0, 47, '2013-12-27 04:12:46'),
(811, 0, 47, '2013-12-27 04:12:10'),
(812, 0, 47, '2013-12-27 04:12:33'),
(813, 0, 30, '2013-12-27 12:12:12'),
(814, 0, 30, '2013-12-27 12:12:40'),
(815, 0, 30, '2013-12-27 12:12:02'),
(816, 0, 30, '2014-01-02 07:01:40'),
(817, 0, 30, '2014-01-03 07:01:56'),
(818, 0, 47, '2014-01-03 09:01:12'),
(819, 0, 30, '2014-01-03 09:01:34'),
(820, 0, 30, '2014-01-09 08:01:45'),
(821, 0, 47, '2014-01-11 06:01:48'),
(822, 0, 30, '2014-01-13 10:01:30'),
(823, 0, 30, '2014-01-13 12:01:00'),
(824, 0, 30, '2014-01-13 01:01:46'),
(825, 0, 49, '2014-01-14 04:01:43'),
(826, 0, 49, '2014-01-14 04:01:09'),
(827, 0, 49, '2014-01-14 04:01:07'),
(828, 0, 49, '2014-01-14 04:01:23'),
(829, 0, 30, '2014-01-16 04:01:48'),
(830, 0, 30, '2014-01-16 04:01:05'),
(831, 0, 69, '2014-01-17 05:01:41'),
(832, 0, 50, '2014-01-24 11:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
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
  `users_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `users_num` int(11) NOT NULL,
  `offers_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `offer_num` int(11) NOT NULL,
  `pictures_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture_num` int(11) NOT NULL,
  `reports` enum('basic','enhanced') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `promotion_notifications` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `business_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `business_num` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subscription_features`
--

INSERT INTO `subscription_features` (`id`, `subscription_id`, `users_type`, `users_num`, `offers_type`, `offer_num`, `pictures_type`, `picture_num`, `reports`, `promotion_notifications`, `business_type`, `business_num`) VALUES
(1, 1, 'upto', 1, '', 0, 'upto', 5, 'basic', '0', 'upto', 1),
(2, 2, 'upto', 3, '', 0, 'upto', 15, 'enhanced', '5', 'upto', 1),
(3, 3, 'upto', 10, '', 0, 'unlimited', 1, 'enhanced', '10', 'upto', 2),
(4, 4, 'morethan', 10, '', 0, 'unlimited', 0, 'enhanced', '20', 'morethan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` enum('client','manager','employee','admin') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `verify_phone` enum('inactive','active') NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` enum('active','inactive') CHARACTER SET latin1 NOT NULL,
  `profile_id` bigint(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_image` text NOT NULL,
  `register_with` enum('facebook','twitter') NOT NULL,
  `activationkey` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `random_key` varchar(15) NOT NULL,
  `createdOn` datetime NOT NULL,
  `statusflag` enum('0','1') NOT NULL DEFAULT '0',
  `passwordresetdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_role_id` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=477 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `email`, `password`, `first_name`, `last_name`, `phone_number`, `verify_phone`, `gender`, `date_of_birth`, `about_me`, `image`, `address`, `status`, `profile_id`, `username`, `profile_image`, `register_with`, `activationkey`, `random_key`, `createdOn`, `statusflag`, `passwordresetdate`) VALUES
(0, 'employee', 'demo@gmail.com', '', '', '', '', 'active', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', '', '0989947a71890daaa5cb3f05a837e1c3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(69, 'manager', 'aa@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 'aa', 'aa', '0', 'active', 'male', '1971-09-14', '', '', '', 'active', 0, '', '0', 'facebook', '68bdd623694ef981495ed163a72e70e4', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(113, 'employee', 'asdas@gmail.com', '', 'sdsad', 'sdas', '0', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '7d3e8009292c14c348c4beefb06794f8', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(114, 'employee', 'sdfds@gmail.com', '', 'sssstupdateednow', 's', '0', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '6596724e4bb415d5d95e379e424f6946', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(115, 'employee', 'aa@gmail.com', '', 'aa', 'aa', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '716c34457c2bb8e197546904b7ef2b0e', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(116, 'employee', 'staff@gmail.com', '', 'staff1 updated', 'sadsa', '4242423', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', 'ed2a636782ca2262cec78a5c4593bd39', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(119, 'employee', 'cc@gmail.com', '', 'timie', 'timie', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', 'f38269dbb83ae54220cf6df7192ec8f9', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(121, 'employee', 'sad@gmail.com', '', 'satr', 'day', '435543', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '73128657a6c089a31c56e4fa79bad4d3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(122, 'employee', 'sdfsd@gmail.como', '', 'fsdfsd', 'dsfsf', '45354354', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', 'cc062fbee6546d12b748c6cb3faddbd6', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(123, 'employee', 'dfds@gmail.com', '', 'dfsf', 'sdfsdf', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '4c23d444fd210c98a0645167eb1f04cd', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(126, 'employee', 'swathinreddy@yahoo.co.insds', '', 'fsfsdfsdf--- enjoy', 'dsfsdfd', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '4ea333f2ecb2357c5274bfc050e04378', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(127, 'employee', 'gfdgdgdg', '', 'ggdfgdfgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '7938369d98f30b88f80d15f617e29f11', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(128, 'employee', 'aa@gmail.comjhkkhjk', '', 'hfgh', 'ghfgh', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '96245bad571d18ec7b6d3fac4cff15d6', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(129, 'manager', 'services@gmail.com', '10cd395cf71c18328c863c08e78f3fd0', 'Swathi', 'N', '8889595954', 'active', 'female', '1990-02-14', '', '', 'MP nagar bhopal', 'active', 0, 'swathi', '', '', '', '', '0000-00-00 00:00:00', '1', '0000-00-00 00:00:00'),
(130, 'employee', 'aa@gmail.comddasdad', '', 'staff1', '1', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', 'f3119515fa0ec755a3bcc8e96ff03e24', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(131, 'employee', 'aa@gmail.csadsadasdads', '', 'staff2', '2', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '005d9fcdd83985139dbf49be0121df81', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(134, 'client', 'qqqqqqq@gmial.omc', '', 'qqqqqqqq', 'qqqq', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(136, 'client', 'client@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'clientt', 'C', '2147483647', 'active', 'male', '1977-03-03', 'abuttsdd ''s  fdgdggdfg dfgdfg fdgdfg dfg this''s is  its''s''ssgfgfgdgs  dfgdfgg dfgdfg  fdgfdgdfg dfgdfgfdgdfgdfgdf dfgfdgdfgfdgdf gdddddddddddddd ddddddddddddd ddddddddd ddddddd    dddd', '', 'India', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(137, 'manager', 'businessmen@gmail.com', 'e6072e821b6854ced4d8fd40319c4846', 'businessmen', 'businessmen', '0', 'active', 'male', '1980-01-18', '', '', '', 'inactive', 0, '', '0', 'facebook', '8f2e695699b44b8e86d3106f6fd276d3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(139, 'client', 'client1@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'client1', 'client1', '0', 'active', 'male', '1979-02-18', '', '', '', 'active', 0, '', '0', 'facebook', '0', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(141, 'employee', 'staffhfghfghgfhfg@gmail.com', '', 'staff1', 'staff2', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '939f03461700b15025bb308e78f24816', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(142, 'employee', 'ddd@gmail.com', '', 'dddddddddd', 'ddd', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '58b64851025f33df8b408fa5a69d114e', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(143, 'employee', 'ddd@gmail.comfgdfgdfg', '', 'dddddddddd', 'ddd', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', 'b3976bf5b826437b339f40a663e82e1f', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(144, 'employee', 'ddd@gmail.comfgdfgdfg', '', 'dddddddddd', 'ddd', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '6c4c4b95cb9e7f1e2e63a0f7bdc191d3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(146, 'client', 'rakesh.chhugani@gmail.comaa', '25f9e794323b453885f5181f1b624d0b', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1971-02-02', '', '', '', 'inactive', 0, '', '0', 'facebook', '0', '', '2013-06-06 06:16:13', '0', '0000-00-00 00:00:00'),
(147, 'manager', 'rakesh.chhugania@eulogik.com', '25f9e794323b453885f5181f1b624d0b', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 0, '', '0', 'facebook', '5e51e6f07ecf344037f108a2c887c5ca', '', '2013-06-07 05:56:58', '0', '0000-00-00 00:00:00'),
(148, 'employee', 'staff1@gmail.com', '40a2bbbb5b438dad0a5012ef088f4aad', 'staff1', 'staff2', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', 'e0698b9d7669b2a09719c9bcceb27c3c', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(149, 'employee', 'a@gmail.com', 'f06faa7a29e28738f4f6124da308d56a', 'Staff ', 'a', '1236456789', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '13a92cbebb02cb2846297395492cfe47', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(150, 'employee', 'b@gmail.com', '064220dfc3ef0760e8233a2a12f9e3c4', 'staff ', 'b', '123456789', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '22c7da055a3aa6d8c38250de37b4256f', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(151, 'employee', 'abc@gmail.com', '989511b37d825c72c313cdd651ca7681', 'Neeraj', 'Demo', '123456789', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '0133302371c952e6f5e56e676eb82a10', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(152, 'employee', 'abc123@gmail.com', 'cbea380bfb36e812f45cded93edc394c', 'Demo 2', 'User', '123456789', 'active', 'male', '0000-00-00', '', '', '', 'inactive', 0, '', '0', 'facebook', '6300faa6c48e2e421be8f21749f51356', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(153, 'manager', 'garima@gmail.com', '2b882400855082a1b1a97cedf64cb413', 'garima', 'soni', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '82cfceac60de2c0fd15271f53afb6723', '', '2013-07-01 08:39:49', '0', '0000-00-00 00:00:00'),
(154, 'employee', 'staff1234565@gmail.com', '1dacb368248b47d7d13cf98ebf7a3cea', 'staff1', 'affff', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '9557c036b7a0f9ca26ecbe0811990eba', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(155, 'manager', 'palak@gmail.com', '462b8007ee5205bd85056a632b7fede8', 'palak', 'M', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', 'fb1d94e2c50852805c08e5cb67ddab1e', '', '2013-07-02 13:44:46', '0', '0000-00-00 00:00:00'),
(156, 'employee', 'aaaa!@gmail.com', 'b733f5d2617d5a8c4ef66ff1ca850838', 'staf1', 'aaaa', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'ce20f7a1fc027c30d1e20c7cc9e1ebc9', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(157, 'manager', 'pankaj@gmail.com', '30cbb5b17f8849ed26d8b02c83302772', 'pankaj', 'P', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '43559750885789d03c5bf9aefffdfeda', '', '2013-07-02 13:52:28', '0', '0000-00-00 00:00:00'),
(158, 'employee', 'stafffff@gmail.com', 'd77d0da89fab99bf19beb0084be4f45f', 'stafffdsfs', 'fsdf', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'bf7a842015f41a9a9598d8a7ff191c21', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(160, 'employee', 'class_staff2@gmail.com', 'd5f48e26429715dbe1eca13628920ead', 'class staff1', 'class staff2', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '5b9e75d2811e9edc46f37f8f3264c541', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(175, 'employee', '2sdfdsfsd@gmail.com', '', 's uupppdated', '2222222', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'b9a4e5ddd35d5dccfb7388bdbba0e5e3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(176, 'employee', 'aaaaaaaaaa@gmail.com', '', 'aaaaaaaa', 'aaaaaaaaaaa', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '05bdc4e01578e7a71c4aa67ed311a486', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(177, 'employee', 'bbbbbbbbbbbb@gmail.com', '', 'bbbbbbbbbbb', 'bbbbbbbbbb', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'f0d6116e019abdbaa1f863b73ce2aca4', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(178, 'employee', 'bbbbbbbbbbbb@gmail.com', '', 'bbbbbbbbbbb', 'bbbbbbbbbb', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '94e83555793311e54a4d6b1fc0dc44b2', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(179, 'employee', 'yyyyyyyyy@gmail.com', '', 'yyyyyyy', 'yyyy', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '398c40faa936fd750c4ba2205ae94dd4', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(180, 'employee', 'ddddddddddddd@gmail.com', '', 'dddddd', 'dddddddddddd', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '9fdecab51bab823c5c5c938f12feaf5e', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(181, 'employee', 'swathi@gmail.com', '', 'swathirred', 'reddy', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '171d206dc273b874421748253a24642f', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(182, 'employee', 'fffffffffffffffffffffffff@gmail.com', '', 'ffffffff', 'fffffffff', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '03396f968394cbbbf9b5760ec6f92548', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(184, 'employee', 'lllll@gmail.com', '0326c1eddd96c2e0dbbaad34a20849c1', 'llllllllllll', 'lllllllll', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '8f9361e9627b48e5e24e78463f2902c6', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(185, 'employee', 'pppppppppp@gmail.conm', '35965ba1999deed184570d3611ac785a', 'papapapapap', 'ppppppppppp', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '5116eee41de6b5d9b5bb126f94af1a9b', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(186, 'employee', 'eeee@gmail.com', '721cb5403fd291ab79a6198812ae5084', 'eulogik', 'eee', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '8ba62a5912e4a8e07c7c93856415fa27', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(187, 'employee', 'euleeeeeeeeeeeogik@gmail.com', '8c6349f1f80ee7396970bdb6c6279f28', 'eeeeeee', 'eeeeeeeeeeeeeee', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'fcabe05cb71728463b9fc61fb532c886', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(188, 'employee', 'ttttttttttt@gmail.com', '', 'ttttttttt', 'tttttttttttt', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '6a233152277696a5ea954dca6602b679', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(189, 'employee', 'vddvv@gmail.com', '', 'vvvvwqqq', 'vvvvvvvvvvv', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'aaf54ce646d2786475ede8eb03c127fd', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(190, 'employee', 'qqqqqqqqqqqqqqqqq@gmial.omc', '', 'aarrr', 'qqqqqqqqqqq', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '1102d4e44cfa7acb39098ea01f8379df', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(192, 'employee', 'ddddddd@gmailo.com', '', 'dqdqrrrrrrr', 'QQ', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'fb895378b81f68f72109babb92f43f9d', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(193, 'client', 'someone@gmail.com', '', 'client1342342424', 'client2', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(194, 'employee', 'july@gmail.com', '', '10thjjj juuu', 'julyy', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'dbda2663440b3ea5c6b6e23e93615a31', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(195, 'manager', 'garima.soni@gmail.com', '003b1930f338263e1c4fd8fca7342e8f', 'garima', 'soni', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', 'acea17fbf13fcf047ec37055d117d819', '', '2013-07-10 12:20:18', '0', '0000-00-00 00:00:00'),
(196, 'manager', 'palak.m@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'palak', 'M', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '2289587f8c010dcc8308b6dc1aeec296', '', '2013-07-10 12:36:43', '0', '0000-00-00 00:00:00'),
(206, 'employee', 'last@gmail.com', '', 'fwww', 'lastnameee', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '9d66abaa780070934695411eb0110008', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(207, 'manager', 'pank@gmail.com', '2f6206866b1ec5985f04e5125eb4ec5f', 'pank', 'p', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', 'de1327df241895982162cc4867156373', '', '2013-07-11 10:42:57', '0', '0000-00-00 00:00:00'),
(208, 'client', 'swathinreddy@yahoo.coin', '808cc384945f0fae637478615cba529b', 'Swathi', 'Reddy', '0', 'active', 'female', '1988-02-22', '', '', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-07-15 06:50:41', '0', '0000-00-00 00:00:00'),
(210, 'manager', 'class@gmail.com', 'a2f2ed4f8ebc2cbb4c21a29dc40ab61d', 'class', 'book', '+918889596984', 'inactive', 'male', '1970-02-02', 'fghg fghghgfhg fghgfh', 'default.jpg', 'אינדיאנה, ארצות הברית', 'active', 0, '', '0', 'facebook', '8aebf419167546c486531e748c6f4d58', '28430', '2013-07-15 07:37:21', '0', '0000-00-00 00:00:00'),
(211, 'manager', 'services@gmail.com', '10cd395cf71c18328c863c08e78f3fd0', 'services', 'servicess', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '9b4a6c74af0260c8066779d55a81c6f4', '', '2013-07-15 08:14:50', '0', '0000-00-00 00:00:00'),
(213, 'employee', 'asdadada@gmail.com', '', 'staff2d', 'sdasdasd', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '777e81a9f03e5382da0d3d385e79d6e1', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(214, 'employee', 'classservice@gmail.com', '', 'classservice', 'classservice', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'aa70c5dbb5cd973e854a381e1c67dfa8', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(215, 'employee', 'staffClas@gmail.com', '', 'staffClass', '1', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '638c15dbff4b0950716a5170691035b1', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(216, 'manager', 'pankaj.p@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'P', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', 'b55b2b63ea5de18c2eef12f0672e5569', '', '2013-07-18 07:06:18', '0', '0000-00-00 00:00:00'),
(225, 'client', 'eulogik@gmail.com', '48dc7460ddaf19fb7f462661e4c45a32', 'eulogik', 'e', '2147483647', 'active', 'male', '2064-02-02', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-07-19 13:50:12', '0', '0000-00-00 00:00:00'),
(228, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(229, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(230, 'client', 'fdgdfg@gmail.com', '', 'fgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(231, 'client', '', '', '', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(232, 'client', '', '', '', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(233, 'client', 'dfds', '', 'dsfdsfds', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(234, 'client', 'dfds', '', 'dsfdsfdssdsadas', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(235, 'client', 'dfds', '', 'sssssssssssssssssss', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(236, 'client', 'dfds', '', 'sssssssssssssssssss', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(237, 'client', 'dfds', '', 'sssssssssssssssssss', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(238, 'client', 'dfds', '', 'sssssssssssssssssss', '', '5435', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(239, 'client', 'dfg', '', 'gdffdfgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(240, 'client', 'dfg', '', 'gdffdfgdfg', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(264, 'client', '', '', 'aaa', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(265, 'client', '', '', '3-4', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(266, 'client', '', '', 'yes', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(267, 'client', '', '', 'swathi ', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(271, 'client', 'name@gmail.com', '', 'names', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(272, 'client', 'names1@gmail.com', '', 'names1', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(273, 'client', '', '', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '', '', '2013-08-27 06:35:39', '0', '0000-00-00 00:00:00'),
(274, 'client', 'name123@gmail.com', '5f25b6a0b984f370afd14aebc3140226', 'name', 'name1', '2147483647', 'active', 'male', '1979-02-18', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-08-27 06:36:24', '0', '0000-00-00 00:00:00'),
(275, 'client', 'pankaj14@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'pawar', '2147483647', 'active', 'male', '1990-02-14', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-08-27 06:37:57', '0', '0000-00-00 00:00:00'),
(276, 'client', 'name1234@gmail.com', 'a00f94d2c469ff7e3e9d708b8ac6ed30', 'name123', 'name12', '2147483647', 'active', 'female', '1978-10-17', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-08-27 06:42:42', '0', '0000-00-00 00:00:00'),
(278, 'client', '', 'e10adc3949ba59abbe56e057f20f883e', 'client2', 'c', '453534535345353', 'active', 'male', '1990-02-14', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-08-27 07:14:34', '0', '0000-00-00 00:00:00'),
(279, 'client', '', '', 'name', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(295, 'client', '', '', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '', '', '2013-09-02 09:23:16', '0', '0000-00-00 00:00:00'),
(297, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'd2162abb0f2c7070c637f752fe3ac3d3', '', '2013-09-02 09:26:35', '0', '0000-00-00 00:00:00'),
(298, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '8721e68c25bbd3641343897fe6d70c60', '', '2013-09-02 09:28:48', '0', '0000-00-00 00:00:00'),
(299, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '42696bb5aa61704cf7dd6efe1a98e548', '', '2013-09-02 09:29:31', '0', '0000-00-00 00:00:00'),
(300, 'manager', 'name12345@gmail.com', 'dc791f8d534ca064ed609d24567d7774', 'name1', 'name2', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'f2b86dac6b99805f0d1ed23db8dbef81', '', '2013-09-02 09:32:07', '0', '0000-00-00 00:00:00'),
(301, 'manager', 'firstname@gmail.com', '342f5c77ed008542e78094607ce1f7f3', 'firstname', 'lastname', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '30a24dbd3eda1f53e7bf928e4a18e2ef', '', '2013-09-02 09:34:49', '0', '0000-00-00 00:00:00'),
(304, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:23:12', '0', '0000-00-00 00:00:00'),
(305, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:23:25', '0', '0000-00-00 00:00:00'),
(306, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:23:36', '0', '0000-00-00 00:00:00'),
(307, 'client', 'fdgdfgfdg', '9ea6028419d46f5cf1986a4cad97f579', 'dfdfgdfgdfg', 'dgdfgdf', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:26:47', '0', '0000-00-00 00:00:00'),
(308, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:41:45', '0', '0000-00-00 00:00:00'),
(309, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:41:55', '0', '0000-00-00 00:00:00'),
(310, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:43:50', '0', '0000-00-00 00:00:00'),
(311, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 04:51:34', '0', '0000-00-00 00:00:00'),
(312, 'client', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-09-28 10:30:07', '0', '0000-00-00 00:00:00'),
(313, 'client', 'pankajpawar@gmail.com', '95deb5011a8fe1ccf6552bb5bcda2ff0', 'pankaj', 'p', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-10-05 08:44:53', '0', '0000-00-00 00:00:00'),
(314, 'client', 'eulogik123@gmail.com', '45b0c8c63483b644aadf3f54d5953d3e', 'swathi n reddy', 'reddy', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-10-07 06:14:01', '0', '0000-00-00 00:00:00'),
(315, 'client', 'addclient@gmail.com', '', 'addclient', '', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(334, 'client', 'name@gmail.com', '', 'name', '', '3', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(335, 'client', 'name!gmail.com', '', 'name1', '', '3', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(336, 'client', 'n@gg', '', 'n', '', '4', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(337, 'client', 'names@gmail.com', '', 'namess', '', '3', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(338, 'client', 'eu@gmail.com', '', 'eu', '', '3', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(339, 'client', 's', '', 's', '', '2', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(340, 'client', 'name@gmail.com', '', 'names', '', '23456789', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(341, 'client', 'p@gmail.com', '', 'pankaj', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(342, 'client', 'dsv', '', 'bd', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(343, 'client', 'c', '', 'c', '', '444', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(347, 'client', 'eu@gmail.com', '', 'eu', '', '20013', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(348, 'client', 'manu.anirudh@gmail.com', 'ef03a96292ba745176dbbb0ec2a4c914', 'Manu', 'Sharma', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-10-09 10:59:15', '0', '0000-00-00 00:00:00'),
(349, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', '0', 'active', NULL, '0000-00-00', '', '', '', 'active', 0, '', '', '', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(350, 'client', 'test@gmail.com', '05a671c66aefea124cc08b76ea6d30bb', 'test', 't', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '0', '', '2013-10-12 06:28:30', '0', '0000-00-00 00:00:00'),
(353, 'client', 'client1@gmail.com', '', 'client1', '', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(355, 'client', 'client1@gmail.com', '', 'client1', '', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(358, 'client', 'businessmen@gmail.com', '', 'client', '', '2147483647', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(360, 'client', 'sujata@gmail.com', '', 'client 2', '', '97845685', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(362, 'client', 'garima.soni@eulogik.com', '', 'client 4', '', '97845685', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(363, 'client', 'goendra@gmail.com', '', 'client5 ', '', '97845685', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(364, 'client', '', '', 'add', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(365, 'client', '', '', 'swathi', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(366, 'client', '', '', 's', '', '0', 'active', 'male', '0000-00-00', '', '', '', 'active', 0, '', '0', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(369, 'employee', 'sdfsgani@gmail.com', '', 'trainer 3', '3', '46465465', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', 'c6b1ecc011f264870182b0707747011f', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(371, 'manager', 'omryoz@gmail.com', 'bc5f0b25e8afaf2ad681235c9b84bb3d', 'James', 'Bond', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '862eecef91775574fe59a6a2e44afffa', '', '2013-10-18 12:00:05', '0', '0000-00-00 00:00:00'),
(373, 'employee', 'Fdsf@fdf.com', '', 'gjfiodjgoi', 'omfidgj', '43958095', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', 'cd2ed1930a7652d86e03991b1c3c12a6', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(374, 'manager', 'omryoz@outlook.com', '1b48c249664ac19f0c9665dd2c04f1bc', 'omryo', 'oz', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '9bb15bdc4b5ea677695b363bfdeac730', '', '2013-10-18 12:19:24', '0', '0000-00-00 00:00:00'),
(378, 'employee', 'ddassad@gmail.com', '', 'להזמין את המינוי', 'להזמין את המינוי', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', '1cbb16372b6b00edcff3beacf4336e76', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(386, 'manager', 'kobinemni@gmail.com', 'aecd70e76ab9e2234149e7b57a4e962e', 'Kobi', 'Nemni', '0', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', 'bca7ad7abbf22084568c140cfa20c09b', '', '2013-11-09 12:16:09', '0', '0000-00-00 00:00:00'),
(387, 'employee', 'kobi@gmail.com', '', 'kobi', 'nemni', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '0', 'facebook', 'c694017ca018a36468afe1af8db3c75b', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(394, 'client', 'chhugani.forever198825@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rakesh', 'Chhugani', '2147483647', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '0', 'facebook', '0', '', '2013-11-12 09:57:15', '0', '0000-00-00 00:00:00'),
(395, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(396, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(397, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(398, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(399, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(400, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(401, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(402, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(403, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 2147483647, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(404, 'client', 'chhugani.forever1988@gmail.com', '', 'Rakesh', 'Chhugani', '0', 'active', 'male', '1988-10-13', '', '', '', 'inactive', 100000279377540, '', 'https://gra', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(405, 'client', NULL, '', 'rakesh.chhugani', '', '0', 'active', NULL, '0000-00-00', '', '', '', 'inactive', 547679070, 'rakeshchhugani', 'http://abs.', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(407, 'manager', 'chhugani.forever19881@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rakesh ', 'chhugani', '0', 'active', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '819c75ff7f30ceb23833667c99e619d9', '', '2013-11-13 06:06:06', '0', '0000-00-00 00:00:00'),
(410, 'admin', 'admin123@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin12', '', '0', 'active', NULL, '0000-00-00', '', '', '', 'active', 0, '', '', 'facebook', '13f6ae9be2808cef7054a51caf8e93ee', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(411, 'admin', 'admin5@gmail.com', '26a91342190d515231d7238b0c5438e1', 'admin5', '', '0', 'active', NULL, '0000-00-00', '', '', '', 'active', 0, '', '', 'facebook', '3cf9c61c78a04a5271817198323e9da3', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(413, 'client', 'swathinreddy1@yahoo.co.in', '8a82fd11c850085d2545d8259cb76699', 'Swathi', 'Reddy', '0', 'active', 'female', '1988-02-22', '', '', '', 'active', 1666834946, 'Swathi N Reddy', 'https://graph.facebook.com/1666834946/picture?width=150&height=150', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(442, 'client', 'manu@eulogik.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'Manu', 'S', '+919584322224', 'active', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '0', '05984', '2013-11-22 05:46:23', '0', '0000-00-00 00:00:00'),
(449, 'client', 'name12346788@gmail.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'name', 'n', '+918889596984', 'active', 'male', '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', 'c7bbccd414cbc9d491bfe437b1cc37b7', '82943', '2013-11-23 04:44:56', '0', '0000-00-00 00:00:00'),
(450, 'manager', 'eulogik#123@gmail.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'pp', 'p', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', 'e5951fd7476dd409896bfb81da126293', '13809', '2013-11-23 09:38:06', '0', '0000-00-00 00:00:00'),
(451, 'employee', 'aaggg@gmail.com', '', 'swathi', 'y', '2147483647', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', 'eb86708f9cfc73ae7eb74b44c0420254', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(452, 'employee', '', '', 'swathi', 'aa', '2147483647', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '935de244c054d0ac97faf5d922ec57c6', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(454, 'employee', 'aasdfsdff@gmail.com', '', 'eulogik', 'aannn', '2147483647', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', 'a6ac1e08d24eb00218f7305bd3aa5562', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(455, 'employee', '', '', 'sdfsfs', 'sdfsf', '454353453453', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', 'ed0a073bae0db71e576a551c65bb5572', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(461, 'employee', 'staff2@gmail.com', '', 'staff1', '2', '342423423424234', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '3ffc9e9460a9cd2b1dc9e060bd699e60', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(464, 'manager', 'rakesh.chuugani@eulogik.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'Rakesh', 'C', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'inactive', 0, '', '', 'facebook', 'bd09d62467e61f683737e0fa019616b5', '36174', '2013-12-11 05:19:06', '0', '0000-00-00 00:00:00'),
(465, 'client', 'client2@gmail.com', '2c66045d4e4a90814ce9280272e510ec', 'client2', 'c', '+918889596984', 'active', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '2b31317bbcc3fb9971c26c25887d400d', '54709', '2014-01-03 09:16:27', '0', '0000-00-00 00:00:00'),
(466, 'employee', '', 'f7f4b21d0d89b0e56b4261f6d3fd34a6', 'Kobi', 'N', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '0d8fb533fb4ea1881196b1e2fcb02093', '74958', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(471, 'manager', 'swathi.n@eulogik.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'garima', 'g', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '391184625cb85b55f13aed4ec378008d', '39517', '2014-01-17 05:25:26', '1', '0000-00-00 00:00:00'),
(472, 'manager', 'omry.oz@sapiens.com', 'bc5f0b25e8afaf2ad681235c9b84bb3d', 'Omry', 'Oz', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '6b422576e897b5f84a38c285a2a529b3', '83045', '2014-01-22 13:03:10', '1', '0000-00-00 00:00:00'),
(473, 'client', 'omryoz@gmail.com', '', 'Omry', 'Oz', '+972534200022', 'active', 'male', '1983-03-23', '', '', '', 'active', 510589164, 'Omry Oz', 'https://graph.facebook.com/510589164/picture?width=150&height=150', 'facebook', '', '', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(474, 'client', 'swathinreddy22@gmail.com', '51ad9d0c9bb09df081ad455c228cf8dc', 'Manu', 'S', '+919584322224', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 0, '', '', 'facebook', '42f59a6dff22135f30d070a17ee16867', '64037', '2014-01-23 04:35:50', '0', '0000-00-00 00:00:00'),
(475, 'client', 'swathinreddy@yahoo.co.in', '51ad9d0c9bb09df081ad455c228cf8dc', 'Swathi', 'Reddy', '', 'inactive', NULL, '0000-00-00', '', 'default.jpg', '', 'active', 1666834946, '', '', 'facebook', 'b2267f4f2269f140cb4f308ad7ced13e', '17294', '2014-01-23 09:03:29', '0', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3231 ;

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
(1619, 30, 303, 'employee', 5, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1620, 30, 303, 'employee', 6, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1621, 30, 303, 'employee', 7, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1909, 47, 269, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1910, 47, 269, 'employee', 2, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1911, 47, 269, 'employee', 3, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(1912, 47, 269, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1913, 47, 269, 'employee', 5, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1914, 47, 269, 'employee', 6, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(1915, 47, 269, 'employee', 7, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1956, 30, 356, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1957, 30, 356, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(1958, 30, 356, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1959, 30, 356, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1960, 30, 357, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1961, 47, 226, 'employee', 2, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1962, 47, 226, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1963, 47, 226, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1964, 47, 226, 'employee', 5, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1965, 47, 226, 'employee', 6, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1966, 47, 226, 'employee', 7, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1973, 47, 215, 'employee', 2, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1974, 47, 215, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1975, 47, 215, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1976, 47, 215, 'employee', 5, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1977, 47, 215, 'employee', 6, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1978, 47, 215, 'employee', 7, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(1992, 47, 368, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1993, 47, 368, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1994, 47, 368, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1995, 47, 368, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1996, 47, 368, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1997, 47, 368, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(1998, 47, 367, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(1999, 47, 367, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2000, 47, 367, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2001, 47, 367, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2002, 47, 367, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2003, 47, 367, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2004, 47, 367, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2036, 50, 373, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2037, 50, 373, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2038, 50, 373, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2039, 51, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2040, 51, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2041, 51, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2042, 51, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2043, 51, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2044, 51, 0, 'business', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2148, 30, 377, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2149, 30, 377, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2150, 30, 377, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2151, 30, 377, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2152, 30, 377, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2153, 30, 377, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2184, 30, 381, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2185, 30, 381, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2186, 30, 381, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2187, 30, 381, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2188, 30, 381, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2189, 30, 381, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2190, 30, 382, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2191, 30, 382, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2192, 30, 382, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2193, 30, 382, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2194, 30, 382, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2195, 30, 382, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2196, 30, 383, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2197, 30, 383, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2198, 30, 383, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2199, 30, 383, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2200, 30, 383, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2201, 30, 383, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2202, 30, 380, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2203, 30, 380, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2204, 30, 380, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2205, 30, 380, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2206, 30, 380, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2207, 30, 380, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2214, 30, 384, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2215, 30, 384, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2216, 30, 384, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2217, 30, 384, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2218, 30, 384, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2219, 30, 384, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2220, 30, 385, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2221, 30, 385, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2222, 30, 385, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2223, 30, 385, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2224, 30, 385, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2225, 30, 385, 'employee', 6, '07:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2250, 51, 387, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2251, 51, 387, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2252, 51, 387, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2253, 51, 387, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2254, 51, 387, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2255, 51, 387, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2256, 52, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2257, 52, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2258, 52, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2259, 52, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2260, 52, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2261, 52, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2262, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2263, 30, 0, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2264, 30, 0, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2265, 30, 0, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2266, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2267, 30, 0, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2268, 30, 0, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2269, 30, 0, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2270, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2271, 30, 0, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2272, 30, 0, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2273, 30, 0, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2283, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2284, 30, 0, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2285, 30, 0, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2286, 30, 0, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2287, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2288, 30, 0, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2289, 30, 0, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2290, 30, 0, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2291, 30, 0, 'employee', 5, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2292, 30, 0, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2306, 30, 417, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2307, 30, 417, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2308, 30, 417, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2309, 30, 417, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2318, 30, 418, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2319, 30, 418, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2320, 30, 418, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2321, 30, 418, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2322, 30, 418, 'employee', 5, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2332, 30, 419, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2333, 30, 419, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2334, 30, 419, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2335, 30, 419, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2341, 30, 420, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2342, 30, 420, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2343, 30, 420, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2344, 30, 420, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2345, 47, 370, 'employee', 1, '08:00:00', '18:00:00', '00:00:00', '00:00:00'),
(2346, 47, 370, 'employee', 2, '08:00:00', '18:00:00', '00:00:00', '00:00:00'),
(2347, 47, 370, 'employee', 3, '08:00:00', '18:00:00', '00:00:00', '00:00:00'),
(2348, 47, 370, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2360, 47, 210, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2361, 47, 210, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2362, 47, 210, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2363, 47, 210, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2364, 47, 210, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2365, 47, 210, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2366, 47, 210, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2367, 40, 196, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2368, 40, 196, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2369, 40, 196, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2370, 40, 196, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2371, 40, 196, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2372, 40, 196, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2373, 40, 421, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2374, 40, 421, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2375, 40, 421, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2376, 40, 421, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2377, 40, 421, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2378, 40, 421, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2379, 40, 422, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2380, 40, 422, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2381, 40, 422, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2382, 40, 422, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2383, 40, 422, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2384, 40, 422, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2477, 53, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2478, 53, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2479, 53, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2480, 53, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2484, 54, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2485, 54, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2486, 54, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2487, 54, 450, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2488, 54, 450, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2489, 54, 450, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2490, 54, 450, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2491, 54, 450, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2492, 54, 450, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2496, 54, 450, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2497, 54, 450, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2498, 54, 450, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2499, 54, 452, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2500, 54, 452, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2501, 54, 452, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2502, 54, 451, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2503, 54, 451, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2504, 54, 451, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2527, 55, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2528, 55, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2529, 55, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2530, 55, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2531, 55, 450, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2532, 55, 450, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2533, 55, 450, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2534, 55, 450, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2535, 56, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2536, 56, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2537, 56, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2538, 57, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2539, 57, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2540, 57, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2541, 57, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2542, 57, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2543, 57, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2548, 58, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2549, 58, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2550, 58, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2551, 58, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2552, 58, 453, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2553, 58, 453, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2554, 58, 453, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2555, 58, 453, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2565, 59, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2566, 59, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2567, 59, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2654, 59, 454, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2655, 59, 454, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2656, 59, 454, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2657, 60, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2658, 60, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2659, 60, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2660, 60, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2661, 61, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2662, 61, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2663, 61, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2664, 61, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2665, 61, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2666, 61, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2667, 62, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2668, 62, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2669, 62, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2670, 62, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2671, 62, 455, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2672, 62, 455, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2673, 62, 455, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2674, 62, 455, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2684, 63, 457, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2685, 63, 457, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2686, 63, 457, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2687, 63, 457, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2688, 63, 457, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2694, 63, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2695, 63, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2696, 63, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2697, 63, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2698, 63, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2699, 64, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2700, 64, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2701, 64, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2702, 64, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2703, 64, 459, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2704, 64, 459, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2705, 64, 459, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2706, 64, 459, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2728, 65, 461, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2729, 65, 461, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2730, 65, 461, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2731, 65, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2732, 65, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2733, 65, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2734, 65, 0, 'business', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2735, 65, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2736, 65, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2756, 66, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2757, 66, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2758, 66, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2759, 66, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2760, 66, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2761, 66, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2762, 66, 462, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2763, 66, 462, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2764, 66, 462, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2765, 66, 462, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2766, 66, 462, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2767, 66, 462, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(2768, 67, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2769, 67, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2770, 67, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2771, 67, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2772, 68, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2773, 68, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2774, 68, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2775, 68, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(2787, 30, 472, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2788, 30, 472, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2789, 30, 472, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2790, 30, 472, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2791, 30, 472, 'employee', 5, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2792, 30, 472, 'employee', 6, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2798, 30, 473, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2799, 30, 473, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2800, 30, 473, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2801, 30, 473, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2802, 30, 473, 'employee', 5, '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(2803, 30, 475, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2804, 30, 475, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2805, 30, 475, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2806, 30, 475, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2807, 47, 210, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2808, 47, 210, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2809, 47, 210, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2810, 47, 210, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2811, 47, 210, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2812, 47, 210, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2813, 47, 210, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2814, 30, 476, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2815, 30, 476, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2816, 30, 476, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2817, 30, 476, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2818, 30, 477, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2819, 30, 477, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2820, 30, 477, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2821, 30, 477, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2822, 30, 478, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2823, 30, 478, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2824, 30, 478, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2825, 30, 478, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2826, 30, 479, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2827, 30, 479, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2828, 30, 479, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2829, 30, 479, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2830, 30, 480, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2831, 30, 480, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2832, 30, 480, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2833, 30, 480, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2834, 30, 481, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2835, 30, 481, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2836, 30, 481, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2837, 30, 481, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2838, 30, 482, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2839, 30, 482, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2840, 30, 482, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2841, 30, 482, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2842, 30, 483, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2843, 30, 483, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2844, 30, 483, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2845, 30, 483, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2850, 30, 484, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2851, 30, 484, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2852, 30, 484, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2853, 30, 484, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2854, 30, 485, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2855, 30, 485, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2856, 30, 485, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2857, 30, 485, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2858, 30, 486, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2859, 30, 486, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2860, 30, 486, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2861, 30, 486, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2862, 30, 487, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2863, 30, 487, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2864, 30, 487, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2865, 30, 487, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2866, 30, 488, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2867, 30, 488, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2868, 30, 488, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2869, 30, 488, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2870, 30, 489, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2871, 30, 489, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2872, 30, 489, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2873, 30, 489, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2874, 30, 490, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2875, 30, 490, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2876, 30, 490, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2877, 30, 490, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2878, 30, 495, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2879, 30, 495, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2880, 30, 495, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2881, 30, 495, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2882, 30, 496, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2883, 30, 496, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2884, 30, 496, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2885, 30, 496, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2886, 30, 497, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2887, 30, 497, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2888, 30, 497, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2889, 30, 497, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2890, 30, 498, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2891, 30, 498, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2892, 30, 498, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2893, 30, 498, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2894, 30, 499, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2895, 30, 499, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2896, 30, 499, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2897, 30, 499, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2898, 30, 500, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2899, 30, 500, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2900, 30, 500, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2901, 30, 500, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2902, 30, 501, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2903, 30, 501, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2904, 30, 501, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2905, 30, 501, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2906, 30, 502, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2907, 30, 502, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2908, 30, 502, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2909, 30, 502, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2910, 30, 503, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2911, 30, 503, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2912, 30, 503, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2913, 30, 503, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2914, 30, 504, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2915, 30, 504, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2916, 30, 504, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2917, 30, 504, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2918, 30, 505, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2919, 30, 505, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2920, 30, 505, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2921, 30, 505, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2922, 30, 506, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2923, 30, 506, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2924, 30, 506, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2925, 30, 506, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2926, 30, 507, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2927, 30, 507, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2928, 30, 507, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2929, 30, 507, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2930, 30, 508, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2931, 30, 508, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2932, 30, 508, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2933, 30, 508, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2934, 30, 509, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2935, 30, 509, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2936, 30, 509, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2937, 30, 509, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2938, 30, 510, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2939, 30, 510, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2940, 30, 510, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2941, 30, 510, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2942, 30, 511, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2943, 30, 511, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2944, 30, 511, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2945, 30, 511, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2946, 30, 511, 'employee', 5, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2947, 30, 511, 'employee', 6, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(2948, 30, 512, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2949, 30, 512, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2950, 30, 512, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2951, 30, 512, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2952, 30, 513, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2953, 30, 513, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2954, 30, 513, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2955, 30, 513, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2956, 30, 514, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2957, 30, 514, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2958, 30, 514, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2959, 30, 514, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2960, 30, 515, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2961, 30, 515, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2962, 30, 515, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2963, 30, 515, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2964, 30, 516, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2965, 30, 516, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(2966, 30, 516, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2967, 30, 516, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(2976, 47, 517, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2977, 47, 517, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2978, 47, 517, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2979, 47, 517, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2980, 47, 517, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2981, 47, 517, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2982, 47, 517, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2983, 47, 519, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2984, 47, 519, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2985, 47, 519, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2986, 47, 519, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2987, 47, 519, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2988, 47, 519, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2989, 47, 519, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2997, 47, 521, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2998, 47, 521, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(2999, 47, 521, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3000, 47, 521, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3001, 47, 521, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3002, 47, 521, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3003, 47, 521, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3004, 30, 522, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3005, 30, 522, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3006, 30, 522, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00');
INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
(3007, 30, 522, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3008, 30, 523, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3009, 30, 523, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3010, 30, 523, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3011, 30, 523, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3012, 30, 524, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3013, 30, 524, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3014, 30, 524, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3015, 30, 524, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3016, 30, 462, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3017, 30, 462, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3018, 30, 462, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3019, 30, 462, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3020, 30, 462, 'employee', 5, '07:00:00', '07:00:00', '00:00:00', '00:00:00'),
(3039, 47, 0, 'business', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3040, 47, 0, 'business', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3041, 47, 0, 'business', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3042, 47, 0, 'business', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3043, 47, 0, 'business', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3044, 47, 0, 'business', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3045, 47, 0, 'business', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3069, 47, 369, 'employee', 1, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3070, 47, 369, 'employee', 2, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3071, 47, 369, 'employee', 3, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3072, 47, 369, 'employee', 4, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3073, 47, 369, 'employee', 5, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3074, 47, 369, 'employee', 6, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3075, 47, 369, 'employee', 7, '08:00:00', '23:45:00', '00:00:00', '00:00:00'),
(3096, 40, 196, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3097, 40, 196, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3098, 40, 196, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3099, 40, 196, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3100, 40, 196, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3101, 40, 196, 'employee', 7, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3112, 30, 463, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3113, 30, 463, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3114, 30, 463, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3115, 30, 463, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3116, 30, 129, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3117, 30, 129, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3118, 30, 129, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3119, 30, 129, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3120, 30, 129, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3131, 30, 131, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3132, 30, 131, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3133, 30, 131, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3134, 30, 131, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3135, 30, 131, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3141, 30, 386, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3142, 30, 386, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3143, 30, 386, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3144, 30, 130, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3145, 30, 130, 'employee', 2, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3151, 49, 216, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3152, 49, 216, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3153, 49, 216, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3154, 49, 216, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3155, 49, 216, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3156, 49, 216, 'employee', 6, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3157, 52, 466, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3158, 52, 466, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3159, 52, 466, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3160, 52, 466, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3161, 52, 466, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3162, 52, 466, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3168, 30, 0, 'business', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3169, 30, 0, 'business', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3170, 30, 0, 'business', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3171, 30, 0, 'business', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3172, 30, 0, 'business', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3173, 30, 378, 'employee', 1, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3174, 30, 378, 'employee', 2, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3175, 30, 378, 'employee', 3, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3176, 30, 378, 'employee', 4, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3177, 30, 378, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3202, 69, 471, 'employee', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3203, 69, 471, 'employee', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3204, 69, 471, 'employee', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3205, 69, 471, 'employee', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3206, 69, 471, 'employee', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3207, 69, 471, 'employee', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3214, 69, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3215, 69, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3216, 69, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3217, 69, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3218, 69, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3219, 69, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3220, 50, 0, 'business', 1, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3221, 50, 0, 'business', 2, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3222, 50, 0, 'business', 3, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3223, 50, 0, 'business', 4, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3224, 50, 0, 'business', 5, '08:00:00', '19:00:00', '00:00:00', '00:00:00'),
(3225, 50, 0, 'business', 6, '08:00:00', '15:00:00', '00:00:00', '00:00:00'),
(3226, 30, 476, 'employee', 1, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3227, 30, 476, 'employee', 2, '08:00:00', '23:30:00', '00:00:00', '00:00:00'),
(3228, 30, 476, 'employee', 3, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3229, 30, 476, 'employee', 4, '08:00:00', '23:00:00', '00:00:00', '00:00:00'),
(3230, 30, 476, 'employee', 5, '08:00:00', '15:00:00', '00:00:00', '00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
(9, 47, 'class1', 'fixed', 12, 1, 'hours', 0, 'Before', 25, 'dsdasdasd', 25),
(11, 48, 'class1', 'fixed', 12, 12, 'minutes', 0, 'Before', 23, 'fdfsdf', 20),
(12, 47, 'class3', 'fixed', 40, 45, 'minutes', 0, 'Before', 10, '', 10),
(13, 47, 'class1', 'fixed', 12, 15, 'minutes', 0, 'Before', 45, 'gfdgfdgfd', 45),
(14, 47, 'class2u', 'fixed', 23, 20, 'minutes', 0, 'Before & After', 0, 'descriptionnn', 0),
(16, 55, 'class1', 'fixed', 12, 12, 'minutes', 0, 'Before', 0, '', 0),
(17, 59, 'clasds', 'fixed', 12, 30, 'minutes', 5, 'Before', 0, 'sfsfsdfsd', 0),
(19, 65, 'class1', 'fixed', 12, 12, 'minutes', 0, 'Before', 0, '', 0),
(20, 49, 'yoga', 'free', 0, 30, 'minutes', 0, 'Before', 0, 'yoga class ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_details`
--

CREATE TABLE IF NOT EXISTS `user_business_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `image` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(1000) NOT NULL,
  `mobile_number` varchar(20) CHARACTER SET latin1 NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `business_type` enum('class','service') CHARACTER SET latin1 NOT NULL,
  `map_latitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `map_longitude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `calendar_type` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `user_business_details`
--

INSERT INTO `user_business_details` (`id`, `category_id`, `users_id`, `username`, `name`, `image`, `description`, `mobile_number`, `address`, `business_type`, `map_latitude`, `map_longitude`, `calendar_type`, `status`) VALUES
(30, 1, 129, 'swathi', 'swathi''s salon', 'img129_1382610970.jpg', 'I have been an artist in the hair industry for 10 years and now working at the very popular Salon. I have  managed several salon locations. I was trained at the  Cosmetology School', '344444444444445', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'service', '23.2332432', '77.4343394', 3, 'active'),
(31, 1, 138, '', 'service2', 'Sunset.jpg', 'bb', '232323232323223', 'Indiana, USA', 'service', '40.2671941', '-86.13490189999999', 1, 'active'),
(40, 2, 196, '', 'Palak''s boutique', '', 'dasdsa das das das d asd asd as dsa d as dsa das d asd as d d as das d asd asd as das dsa ds adsa d asd as das  sad asd as das das  as sa sa das d sad asd as das d asd asdasd\nasd\nsad\nasdasdas dsa a', '555555555555555', 'Bhopal, Madhya Pradesh, India', 'service', '23.2599333', '77.41261499999996', 1, 'active'),
(43, 2, 211, '', 'Al''s salon', '', 'I have been an artist in the hair industry for 10 years and now working at the very popular Salon. I have  managed several salon locations. I was trained at the  Cosmetology School', '34343243323', 'Mangalore, Karnataka, India', 'service', '12.9141417', '74.85595680000006', 1, 'active'),
(47, 1, 210, '', 'class businessName  ', '', 'I have conduction the classes for 25 years.', '453543543543545', 'India', 'class', '19.0759837', '72.87765590000004', 2, 'active'),
(49, 1, 216, '', 'class2 businessname', '', 'I have conduction the classes for 15 years.Many people have been benifited  ', '324234234322343', 'United States', 'class', '37.09024', '-95.71289100000001', 1, 'active'),
(50, 2, 371, '', 'James spa', '', 'I have been an artist in the hair industry for 10 years and now working at the very popular Salon. I have  managed several salon locations. I was trained at the  Cosmetology School', '38747927589437', 'אפרים קישון 24 באר יעקב\n', 'service', '31.94189769999999', '34.844052499999975', 1, 'active'),
(51, 1, 374, '', 'Unique hair saloon', '', 'hdfhks', '495789347', 'אפרים קישון 24 באר יעקב', 'service', '31.94189769999999', '34.844052499999975', 1, 'active'),
(52, 1, 386, 'kobihair', 'Kobi HairStyle', '', 'bla bla', '0545489585', 'Snunit 247, Hagor, Israel', 'service', '32.1323227', '34.94390909999993', 2, 'active'),
(62, 1, 450, '', 'Javed habib hair stylis', '', 'I have been an artist in the hair industry for 10 years and now working at the very popular Salon. I have  managed several salon locations. I was trained at the  Cosmetology School', '453453534534534', 'Salta Province, Argentina', 'service', '-25.2529539', '-64.71624150000002', 1, 'active'),
(63, 1, 456, 'swathinreddy', 'business name', '', 'afdf dfsdf sdf dsfds fd ssdfds dsfdsfds', '231313123123123', 'Indi, Karnataka 586209, India', 'service', '17.176911', '75.95316200000002', 1, 'active'),
(65, 1, 460, 'swathinreddy22', 'class name', '', 'descriptionssss', '423424324324234', 'New Delhi, Delhi, India', 'class', '28.635308', '77.22496000000001', 2, 'active'),
(66, 1, 462, 'fdg', 'gdfgdfgdgdfgfdg', '', 'dfg', '254325345353545', 'India', 'service', '20.593684', '78.96288000000004', 1, 'active'),
(67, 1, 464, 'dfsd', 'dfsf', '', 'dsfdsf', '455345345345334', 'South Dakota, USA', 'service', '43.9695148', '-99.90181310000003', 1, 'active'),
(68, 1, 466, 'Jay', 'Cookery classes', '', 'I have conduction the classes for 15 years.Many people have been benifited  ', '654645654646465', 'Formosa Province, Argentina', 'class', '-25.3945969', '-58.73736339999999', 1, 'active'),
(69, 1, 471, '', 'rose salon', 'img471_1389936732.jpg', 'Hi all, its been 25 years started with my own salon. We provide solutions to any kind of problems related to the skin,hair. We provide the best service with highly hygiene environment.Do have a  visit and enjoy our services!!', '888898989898', 'Vidhyaranya, 2nd Main Road, Kasturi Bai Nagar, Adyar, Chennai, Tamil Nadu 600020, India', 'service', '13.0055744', '80.25127709999992', 1, 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_business_photogallery`
--

INSERT INTO `user_business_photogallery` (`id`, `user_business_details_id`, `title`, `description`, `photo`, `orderNum`) VALUES
(3, 34, 'pic1', '', 'default.jpg', 2),
(4, 34, 'pic2', '', 'eulogik2-e1350592057564.png', 2),
(5, 34, 'pic3', '', 'Image91.png', 5),
(6, 38, 'pic1', 'aaa', 'default1.jpg', 1),
(16, 30, 'view water park', 'desss', 'img129_1382598931.jpg', 4),
(17, 30, 'classbook', '', 'img129_1382599008.jpg', 0),
(25, 30, 'pic', 'desc', 'img129_1382608127.jpg', 0),
(28, 30, 'Hello World', 'descccc', 'img129_1385530494.JPG', 5),
(29, 30, 'classbook', '', 'img129_1382610923.jpg', 0),
(30, 47, 'pic1', '', 'img210_1383889734.jpg', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1004 ;

--
-- Dumping data for table `user_business_posted_class`
--

INSERT INTO `user_business_posted_class` (`id`, `user_business_classes_id`, `start_date`, `end_date`, `lastdate_enroll`, `start_time`, `end_time`, `instructor`, `repeat_type`, `repeat_all_day`, `repeat_week_days`, `repeat_months`, `class_size`, `availability`, `seriesid`, `modifiedStatus`) VALUES
(447, 9, '2013-10-20', '2013-10-20', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 1, 0, 376, 1),
(454, 9, '2013-10-21', '2013-10-21', '1970-01-01', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 15, 15, 378, 0),
(457, 9, '2013-10-24', '2013-10-24', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 20, 19, 377, 1),
(459, 9, '2013-10-25', '2013-10-25', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 20, 20, 377, 0),
(460, 9, '2013-10-22', '2013-10-22', '1970-01-01', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 15, 15, 378, 0),
(461, 9, '2013-10-23', '2013-10-23', '1970-01-01', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 15, 15, 380, 0),
(464, 9, '2013-10-24', '2013-10-24', '1970-01-01', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 15, 15, 380, 0),
(465, 9, '2013-10-25', '2013-10-25', '1970-01-01', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 15, 15, 380, 0),
(466, 9, '2013-10-28', '2013-10-28', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 3, 381, 1),
(467, 9, '2013-10-29', '2013-10-29', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 4, 381, 1),
(468, 9, '2013-10-30', '2013-10-30', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 4, 381, 0),
(469, 9, '2013-10-31', '2013-10-31', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 4, 381, 0),
(470, 9, '2013-11-01', '2013-11-01', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 4, 381, 0),
(471, 9, '2013-11-02', '2013-11-02', '1970-01-01', '08:00:00', '09:00:00', 215, 'daily', '1', '', '', 4, 4, 381, 0),
(472, 9, '2013-11-17', '2013-11-17', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 9, 382, 1),
(473, 9, '2013-11-18', '2013-11-18', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 10, 382, 1),
(474, 9, '2013-11-19', '2013-11-19', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 10, 384, 0),
(479, 9, '2013-11-20', '2013-11-20', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 10, 384, 0),
(480, 9, '2013-11-21', '2013-11-21', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 9, 384, 1),
(481, 9, '2013-11-22', '2013-11-22', '1970-01-01', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 10, 8, 384, 1),
(482, 9, '2013-11-19', '2013-11-19', '1970-01-01', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 6, 5, 385, 1),
(483, 9, '2013-11-20', '2013-11-20', '1970-01-01', '11:00:00', '12:00:00', 367, 'weekly', '', '6,5,', '', 5, 5, 388, 1),
(487, 9, '2013-11-22', '2013-11-22', '1970-01-01', '11:00:00', '12:00:00', 367, 'weekly', '', '6,5,', '', 5, 3, 388, 1),
(488, 9, '2013-11-23', '2013-11-23', '1970-01-01', '11:00:00', '12:00:00', 367, 'weekly', '', '6,5,', '', 5, 3, 388, 1),
(502, 10, '2013-11-24', '2013-11-24', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(503, 10, '2013-11-25', '2013-11-25', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(504, 10, '2013-11-26', '2013-11-26', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(505, 10, '2013-11-27', '2013-11-27', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(506, 10, '2013-11-28', '2013-11-28', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(507, 10, '2013-11-29', '2013-11-29', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(508, 10, '2013-11-30', '2013-11-30', '1970-01-01', '10:00:00', '10:20:00', 369, 'daily', '1', '', '', 20, 20, 391, 0),
(509, 15, '2013-11-24', '2013-11-24', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(510, 15, '2013-11-25', '2013-11-25', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(511, 15, '2013-11-26', '2013-11-26', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(512, 15, '2013-11-27', '2013-11-27', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(513, 15, '2013-11-28', '2013-11-28', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(514, 15, '2013-11-29', '2013-11-29', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(515, 15, '2013-11-30', '2013-11-30', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 56, 56, 392, 0),
(516, 12, '2013-11-24', '2013-11-24', '1970-01-01', '09:00:00', '09:45:00', 369, 'daily', '1', '', '', 50, 49, 395, 1),
(529, 12, '2013-11-25', '2013-11-25', '1970-01-01', '09:00:00', '09:45:00', 369, 'daily', '1', '', '', 65, 65, 397, 1),
(533, 12, '2013-11-26', '2013-11-26', '1970-01-01', '09:00:00', '09:45:00', 369, 'daily', '1', '', '', 55, 55, 397, 0),
(534, 12, '2013-11-27', '2013-11-27', '1970-01-01', '09:00:00', '09:45:00', 369, 'daily', '1', '', '', 55, 55, 397, 0),
(535, 12, '2013-11-28', '2013-11-28', '1970-01-01', '09:00:00', '09:45:00', 369, 'daily', '1', '', '', 55, 55, 397, 0),
(536, 9, '2013-11-25', '2013-11-25', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 398, 1),
(542, 9, '2013-11-26', '2013-11-26', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(543, 9, '2013-11-27', '2013-11-27', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(544, 9, '2013-11-28', '2013-11-28', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(545, 9, '2013-11-29', '2013-11-29', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(548, 9, '2013-12-03', '2013-12-03', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 5, 399, 1),
(549, 9, '2013-12-04', '2013-12-04', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(550, 9, '2013-12-05', '2013-12-05', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(551, 9, '2013-12-06', '2013-12-06', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 0),
(552, 9, '2013-12-07', '2013-12-07', '1970-01-01', '10:00:00', '11:00:00', 215, 'daily', '1', '', '', 6, 6, 399, 1),
(558, 17, '2013-11-24', '2013-11-24', '1970-01-01', '11:00:00', '11:30:00', 0, 'daily', '1', '', '', 4, 4, 402, 0),
(559, 17, '2013-11-25', '2013-11-25', '1970-01-01', '11:00:00', '11:30:00', 0, 'daily', '1', '', '', 4, 4, 402, 0),
(560, 17, '2013-11-26', '2013-11-26', '1970-01-01', '11:00:00', '11:30:00', 0, 'daily', '1', '', '', 4, 4, 402, 0),
(597, 14, '2013-12-02', '2013-12-02', '1970-01-01', '09:00:00', '09:20:00', 0, 'daily', '1', '', '', 23, 23, 409, 0),
(598, 12, '2013-12-03', '2013-12-03', '1970-01-01', '12:00:00', '12:45:00', 369, 'daily', '1', '', '', 40, 40, 410, 0),
(600, 9, '2013-12-08', '2013-12-08', '1970-01-01', '11:30:00', '12:30:00', 369, 'daily', '1', '', '', 8, 8, 416, 0),
(611, 9, '2013-12-13', '2013-12-13', '1970-01-01', '12:45:00', '13:45:00', 369, 'daily', '1', '', '', 8, 7, 413, 1),
(655, 9, '2013-12-08', '2013-12-08', '1970-01-01', '14:00:00', '15:00:00', 0, 'weekly', '', '1,3,5,7,', '', 5, 5, 423, 0),
(656, 9, '2013-12-09', '2013-12-09', '1970-01-01', '14:00:00', '15:00:00', 0, 'weekly', '', '1,3,5,7,', '', 5, 5, 423, 0),
(657, 9, '2013-12-11', '2013-12-11', '1970-01-01', '14:00:00', '15:00:00', 0, 'weekly', '', '1,3,5,7,', '', 5, 5, 423, 0),
(658, 9, '2013-12-13', '2013-12-13', '1970-01-01', '14:00:00', '15:00:00', 0, 'weekly', '', '1,3,5,7,', '', 5, 5, 423, 0),
(699, 9, '2013-12-15', '2013-12-15', '1970-01-01', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 4, 4, 618, 1),
(718, 9, '2013-12-19', '2013-12-19', '1970-01-01', '09:30:00', '10:30:00', 0, 'daily', '1', '', '', 4, 4, 619, 1),
(731, 9, '2013-12-22', '2013-12-22', '1970-01-01', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 632, 1),
(758, 9, '2013-12-22', '2013-12-22', '1970-01-01', '11:00:00', '12:00:00', 0, 'daily', '1', '', '', 4, 4, 629, 0),
(824, 9, '2013-12-30', '2013-12-30', '0000-00-00', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 3, 2, 762, 1),
(832, 9, '2014-01-02', '2014-01-02', '0000-00-00', '11:30:00', '12:30:00', 0, 'daily', '1', '', '', 3, 3, 762, 1),
(901, 9, '2014-01-09', '2014-01-09', '0000-00-00', '08:00:00', '09:00:00', 0, 'daily', '1', '', '', 6, 6, 793, 1),
(916, 9, '2014-01-09', '2014-01-09', '0000-00-00', '10:00:00', '11:00:00', 0, 'daily', '1', '', '', 6, 6, 798, 1),
(922, 9, '2014-01-06', '2014-01-06', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 798, 0),
(923, 9, '2014-01-07', '2014-01-07', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 798, 0),
(924, 9, '2014-01-08', '2014-01-08', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 5, 798, 1),
(928, 9, '2014-01-08', '2014-01-08', '0000-00-00', '12:00:00', '13:00:00', 0, 'daily', '1', '', '', 4, 4, 803, 1),
(935, 9, '2014-01-06', '2014-01-06', '0000-00-00', '13:00:00', '14:00:00', 0, 'daily', '1', '', '', 4, 4, 803, 0),
(936, 9, '2014-01-07', '2014-01-07', '0000-00-00', '13:00:00', '14:00:00', 0, 'daily', '1', '', '', 4, 2, 803, 1),
(937, 9, '2014-01-09', '2014-01-09', '0000-00-00', '13:00:00', '14:00:00', 0, 'daily', '1', '', '', 4, 3, 803, 1),
(938, 9, '2014-03-02', '2014-03-02', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 4, 818, 1),
(939, 9, '2014-03-03', '2014-03-03', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 818, 0),
(940, 9, '2014-03-04', '2014-03-04', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 818, 0),
(941, 9, '2014-03-05', '2014-03-05', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 818, 0),
(942, 9, '2014-03-06', '2014-03-06', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 818, 0),
(943, 9, '2014-03-07', '2014-03-07', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 5, 5, 818, 0),
(944, 9, '2014-01-12', '2014-01-12', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 1),
(945, 9, '2014-01-13', '2014-01-13', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 0),
(946, 9, '2014-01-14', '2014-01-14', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 0),
(947, 9, '2014-01-15', '2014-01-15', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 0),
(948, 9, '2014-01-16', '2014-01-16', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 0),
(949, 9, '2014-01-17', '2014-01-17', '0000-00-00', '09:00:00', '10:00:00', 0, 'daily', '1', '', '', 6, 6, 821, 1),
(974, 20, '2014-01-19', '2014-01-19', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(975, 20, '2014-01-20', '2014-01-20', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(976, 20, '2014-01-21', '2014-01-21', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(977, 20, '2014-01-22', '2014-01-22', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(978, 20, '2014-01-23', '2014-01-23', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(979, 20, '2014-01-24', '2014-01-24', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(980, 20, '2014-01-26', '2014-01-26', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(981, 20, '2014-01-27', '2014-01-27', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(982, 20, '2014-01-28', '2014-01-28', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(983, 20, '2014-01-29', '2014-01-29', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(984, 20, '2014-01-30', '2014-01-30', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(985, 20, '2014-01-31', '2014-01-31', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(986, 20, '2014-02-02', '2014-02-02', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(987, 20, '2014-02-03', '2014-02-03', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(988, 20, '2014-02-04', '2014-02-04', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(989, 20, '2014-02-05', '2014-02-05', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(990, 20, '2014-02-06', '2014-02-06', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(991, 20, '2014-02-07', '2014-02-07', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(992, 20, '2014-02-09', '2014-02-09', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(993, 20, '2014-02-10', '2014-02-10', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(994, 20, '2014-02-11', '2014-02-11', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(995, 20, '2014-02-12', '2014-02-12', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(996, 20, '2014-02-13', '2014-02-13', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(997, 20, '2014-02-14', '2014-02-14', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(998, 20, '2014-02-16', '2014-02-16', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(999, 20, '2014-02-17', '2014-02-17', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(1000, 20, '2014-02-18', '2014-02-18', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(1001, 20, '2014-02-19', '2014-02-19', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(1002, 20, '2014-02-20', '2014-02-20', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0),
(1003, 20, '2014-02-21', '2014-02-21', '0000-00-00', '10:00:00', '10:30:00', 0, 'daily', '1', '', '', 7, 7, 828, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_services`
--

CREATE TABLE IF NOT EXISTS `user_business_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_business_details_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price_type` enum('fixed','variable','free') CHARACTER SET latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `timelength` int(11) NOT NULL,
  `time_type` enum('hours','minutes') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `user_business_services`
--

INSERT INTO `user_business_services` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `details`) VALUES
(71, 30, 'service1', 'fixed', 3232, 1, 'hours', 30, 'Before & After', 'dcvdcvxcvxcvxc'),
(73, 30, 'service2', 'fixed', 6464, 30, 'minutes', 0, 'Before', 'vcvbcvbcv'),
(74, 30, 'service3', 'fixed', 3423, 45, 'minutes', 15, 'Before', 'sdfsdsfs'),
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
(90, 50, 'jfhskdjhfkj', 'fixed', 10, 30, '', 10, 'Before', ''),
(91, 51, 'הצוותים', 'fixed', 12, 27, 'minutes', 0, 'Before', ''),
(92, 52, 'Men''s Haircut', 'fixed', 15, 30, 'minutes', 0, 'Before', ''),
(107, 53, 'service1', 'fixed', 12, 12, 'minutes', 0, 'Before', ''),
(109, 54, 'service12', 'fixed', 12, 12, 'minutes', 0, 'Before', 'sdsadas'),
(111, 58, 'service1', 'fixed', 3423, 12, 'minutes', 0, 'Before', 'cvfdfdgfdgfd'),
(112, 62, 'fsdfsdf', 'fixed', 12, 1, 'minutes', 0, 'Before', 'dsfsfsd'),
(116, 66, 'service1', 'fixed', 12, 12, 'minutes', 0, 'Before', 'fdgfdg'),
(117, 30, 'servcie4', 'free', 0, 25, 'minutes', 0, 'Before', ''),
(118, 69, 'mens hair cut', 'free', 0, 30, 'minutes', 0, 'Before', 'free hair cut!');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

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
(19, 'free', 2, 216, '2013-07-18', 'active', '', '2013-08-18'),
(20, 'free', 2, 371, '2013-10-18', 'active', '', '2013-11-18'),
(21, 'free', 2, 374, '2013-10-18', 'active', '', '2013-11-18'),
(22, 'free', 2, 386, '2013-11-09', 'active', '', '2013-12-09'),
(23, 'free', 2, 450, '2013-11-23', 'active', '', '2013-12-23'),
(24, 'free', 2, 456, '2013-11-26', 'active', '', '2013-12-26'),
(25, 'free', 2, 458, '2013-11-26', 'active', '', '2013-12-26'),
(26, 'free', 2, 460, '2013-11-26', 'active', '', '2013-12-26'),
(27, 'free', 2, 462, '2013-11-27', 'active', '', '2013-12-27'),
(28, 'free', 2, 464, '2013-11-28', 'active', '', '2013-12-28'),
(29, 'free', 2, 466, '2013-11-28', 'active', '', '2013-12-28'),
(30, 'free', 2, 471, '2014-01-17', 'active', '', '2014-02-17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_notification_settings`
--

INSERT INTO `user_notification_settings` (`id`, `users_id`, `appointment_reminder`, `remind_before`, `send_message`) VALUES
(2, 210, 'yes', 1, 'no');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_businesses_photos_likes`
--
CREATE TABLE IF NOT EXISTS `view_businesses_photos_likes` (
`id` int(11)
,`users_id` int(11)
,`details_id` int(11)
,`type` enum('photos','business')
,`first_name` varchar(50)
,`last_name` varchar(50)
,`profile_image` varchar(100)
);
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
,`phone_number` varchar(15)
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
,`manager_phone` varchar(15)
,`gender` enum('male','female')
,`manager_email` varchar(50)
,`business_description` varchar(1000)
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
,`business_status` enum('active','inactive')
,`user_status` enum('active','inactive')
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_business_employees`
--
CREATE TABLE IF NOT EXISTS `view_business_employees` (
`email` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`phone_number` varchar(15)
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
,`seriesid` int(11)
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
,`status` enum('booked','busytime')
,`appointment_date` datetime
,`end_time` datetime
,`users_id` int(11)
,`category_name` varchar(100)
,`clients_first_name` varchar(50)
,`clients_last_name` varchar(50)
,`business_details_id` int(11)
,`clients_email` varchar(50)
,`clients_phonenumber` varchar(15)
,`user_role` enum('client','manager','employee','admin')
,`booked_by` enum('client','manager')
,`paddingendtime` datetime
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_client_buisness_services_appointments`
--
CREATE TABLE IF NOT EXISTS `view_client_buisness_services_appointments` (
`category_id` int(11)
,`name` varchar(100)
,`image` varchar(50)
,`description` varchar(1000)
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
,`status` enum('booked','busytime')
,`users_id` int(11)
,`note` text
,`id` int(11)
,`user_role` enum('client','manager','employee','admin')
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
,`phone_number` varchar(15)
,`email` varchar(50)
,`start_time` time
,`end_time` time
,`id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_employee_classes`
--
CREATE TABLE IF NOT EXISTS `view_employee_classes` (
`business_id` int(11)
,`service_id` int(11)
,`users_id` int(11)
,`name` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
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
-- Stand-in structure for view `view_favourite_businesses`
--
CREATE TABLE IF NOT EXISTS `view_favourite_businesses` (
`user_business_details_id` int(11)
,`manager_firstname` varchar(50)
,`manager_lastname` varchar(50)
,`category_name` varchar(100)
,`business_logo` varchar(50)
,`favourite_id` int(11)
,`users_id` int(11)
,`business_name` varchar(100)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_photo_comments`
--
CREATE TABLE IF NOT EXISTS `view_photo_comments` (
`id` int(11)
,`user_business_photogallery_id` int(11)
,`users_id` int(11)
,`comments` text
,`first_name` varchar(50)
,`last_name` varchar(50)
,`profile_image` varchar(100)
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
-- Stand-in structure for view `view_subscription_plans`
--
CREATE TABLE IF NOT EXISTS `view_subscription_plans` (
`price` int(10)
,`users_type` varchar(50)
,`users_num` int(11)
,`offers_type` varchar(50)
,`offer_num` int(11)
,`pictures_type` varchar(50)
,`picture_num` int(11)
,`reports` enum('basic','enhanced')
,`promotion_notifications` varchar(50)
,`business_type` varchar(50)
,`business_num` int(11)
,`title` varchar(50)
,`subscription_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_subscription`
--
CREATE TABLE IF NOT EXISTS `view_user_subscription` (
`users_id` int(10)
,`email` varchar(50)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`business_name` varchar(100)
,`subscription_name` varchar(50)
,`business_id` int(11)
,`subscription_id` int(11)
,`status` enum('active','inactive')
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
-- Structure for view `view_businesses_photos_likes`
--
DROP TABLE IF EXISTS `view_businesses_photos_likes`;

CREATE VIEW `view_businesses_photos_likes` AS select `businesses_photos_likes`.`id` AS `id`,`businesses_photos_likes`.`users_id` AS `users_id`,`businesses_photos_likes`.`details_id` AS `details_id`,`businesses_photos_likes`.`type` AS `type`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `profile_image` from (`businesses_photos_likes` join `users` on((`businesses_photos_likes`.`users_id` = `users`.`id`)));

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

CREATE VIEW `view_business_details` AS select `users`.`first_name` AS `manager_firstname`,`users`.`last_name` AS `manager_lastname`,`users`.`phone_number` AS `manager_phone`,`users`.`gender` AS `gender`,`users`.`email` AS `manager_email`,`user_business_details`.`description` AS `business_description`,`user_business_details`.`mobile_number` AS `mobile_number`,`user_business_details`.`address` AS `address`,`user_business_details`.`business_type` AS `business_type`,`user_business_details`.`map_latitude` AS `map_latitude`,`user_business_details`.`map_longitude` AS `map_longitude`,`user_business_details`.`calendar_type` AS `calendar_type`,`user_business_details`.`name` AS `business_name`,`user_business_details`.`image` AS `image`,`category`.`name` AS `category_name`,`user_business_details`.`users_id` AS `users_id`,`user_business_details`.`id` AS `business_id`,`user_business_details`.`category_id` AS `category_id`,`user_business_details`.`status` AS `business_status`,`users`.`status` AS `user_status` from ((`users` join `user_business_details` on((`users`.`id` = `user_business_details`.`users_id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`)));

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

CREATE VIEW `view_classes_posted_business` AS select `user_business_posted_class`.`user_business_classes_id` AS `user_business_classes_id`,`user_business_posted_class`.`start_date` AS `start_date`,`user_business_posted_class`.`end_date` AS `end_date`,`user_business_posted_class`.`lastdate_enroll` AS `lastdate_enroll`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`user_business_posted_class`.`instructor` AS `instructor`,`user_business_posted_class`.`repeat_type` AS `repeat_type`,`user_business_posted_class`.`repeat_all_day` AS `repeat_all_day`,`user_business_posted_class`.`repeat_week_days` AS `repeat_week_days`,`user_business_posted_class`.`repeat_months` AS `repeat_months`,`user_business_classes`.`user_business_details_id` AS `user_business_details_id`,`user_business_posted_class`.`id` AS `id`,`user_business_classes`.`name` AS `name`,`user_business_classes`.`price` AS `price`,`user_business_classes`.`price_type` AS `price_type`,`user_business_classes`.`timelength` AS `timelength`,`user_business_classes`.`time_type` AS `time_type`,`user_business_classes`.`padding_time` AS `padding_time`,`user_business_classes`.`padding_time_type` AS `padding_time_type`,`user_business_classes`.`details` AS `details`,`users`.`first_name` AS `instructor_firstname`,`users`.`last_name` AS `instructor_lastname`,`user_business_posted_class`.`class_size` AS `class_size`,`user_business_posted_class`.`availability` AS `availability`,`category`.`name` AS `category_name`,`user_business_posted_class`.`seriesid` AS `seriesid` from ((((`user_business_posted_class` join `user_business_classes` on((`user_business_posted_class`.`user_business_classes_id` = `user_business_classes`.`id`))) join `users` on((`user_business_posted_class`.`instructor` = `users`.`id`))) join `user_business_details` on((`user_business_classes`.`user_business_details_id` = `user_business_details`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_appoinment_details`
--
DROP TABLE IF EXISTS `view_client_appoinment_details`;

CREATE VIEW `view_client_appoinment_details` AS select `client_service_appointments`.`id` AS `id`,`client_service_appointments`.`start_time` AS `start_time`,`users`.`last_name` AS `employee_last_name`,`client_service_appointments`.`type` AS `type`,`user_business_details`.`name` AS `business_name`,`users`.`first_name` AS `employee_first_name`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`user_business_details_id` AS `user_business_details_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`appointment_date` AS `appointment_date`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`users_id` AS `users_id`,`category`.`name` AS `category_name`,`clients_details`.`first_name` AS `clients_first_name`,`clients_details`.`last_name` AS `clients_last_name`,`user_business_details`.`id` AS `business_details_id`,`clients_details`.`email` AS `clients_email`,`clients_details`.`phone_number` AS `clients_phonenumber`,`clients_details`.`user_role` AS `user_role`,`client_service_appointments`.`booked_by` AS `booked_by`,`client_service_appointments`.`paddingendtime` AS `paddingendtime` from ((((`client_service_appointments` join `user_business_details` on((`client_service_appointments`.`user_business_details_id` = `user_business_details`.`id`))) join `users` on((`client_service_appointments`.`employee_id` = `users`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`))) join `users` `clients_details` on((`client_service_appointments`.`users_id` = `clients_details`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_buisness_services_appointments`
--
DROP TABLE IF EXISTS `view_client_buisness_services_appointments`;

CREATE VIEW `view_client_buisness_services_appointments` AS select `user_business_details`.`category_id` AS `category_id`,`user_business_details`.`name` AS `name`,`user_business_details`.`image` AS `image`,`user_business_details`.`description` AS `description`,`user_business_services`.`id` AS `service_id`,`user_business_services`.`user_business_details_id` AS `user_business_details_id`,`user_business_services`.`name` AS `service_name`,`user_business_services`.`price_type` AS `price_type`,`user_business_services`.`price` AS `price`,`user_business_services`.`timelength` AS `timelength`,`user_business_services`.`time_type` AS `time_type`,`user_business_services`.`padding_time` AS `padding_time`,`user_business_services`.`padding_time_type` AS `padding_time_type`,`user_business_services`.`details` AS `details`,`client_service_appointments`.`start_time` AS `start_time`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`users_id` AS `users_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`id` AS `id`,`users`.`user_role` AS `user_role` from (((`user_business_details` join `user_business_services` on((`user_business_details`.`id` = `user_business_services`.`user_business_details_id`))) join `client_service_appointments` on((`user_business_services`.`id` = `client_service_appointments`.`services_id`))) join `users` on((`client_service_appointments`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_class_booking`
--
DROP TABLE IF EXISTS `view_client_class_booking`;

CREATE VIEW `view_client_class_booking` AS select `client_class_booking`.`note` AS `note`,`client_class_booking`.`date` AS `date`,`client_class_booking`.`user_business_posted_class_id` AS `user_business_posted_class_id`,`client_class_booking`.`users_id` AS `users_id`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone_number` AS `phone_number`,`users`.`email` AS `email`,`user_business_posted_class`.`start_time` AS `start_time`,`user_business_posted_class`.`end_time` AS `end_time`,`client_class_booking`.`id` AS `id` from ((`client_class_booking` join `users` on((`client_class_booking`.`users_id` = `users`.`id`))) join `user_business_posted_class` on((`client_class_booking`.`user_business_posted_class_id` = `user_business_posted_class`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_employee_classes`
--
DROP TABLE IF EXISTS `view_employee_classes`;

CREATE VIEW `view_employee_classes` AS select `employee_services`.`business_id` AS `business_id`,`employee_services`.`service_id` AS `service_id`,`employee_services`.`users_id` AS `users_id`,`user_business_classes`.`name` AS `name`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name` from ((`employee_services` join `users` on((`employee_services`.`users_id` = `users`.`id`))) join `user_business_classes` on(((`employee_services`.`business_id` = `user_business_classes`.`user_business_details_id`) and (`employee_services`.`service_id` = `user_business_classes`.`id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_employee_services`
--
DROP TABLE IF EXISTS `view_employee_services`;

CREATE  VIEW `view_employee_services` AS select `employee_services`.`service_id` AS `service_id`,`user_business_services`.`name` AS `name`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`employee_services`.`users_id` AS `users_id`,`employee_services`.`business_id` AS `business_id` from ((`employee_services` join `user_business_services` on((`employee_services`.`service_id` = `user_business_services`.`id`))) join `users` on((`employee_services`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_favourite_businesses`
--
DROP TABLE IF EXISTS `view_favourite_businesses`;

CREATE VIEW `view_favourite_businesses` AS select `favourite_businesses`.`user_business_details_id` AS `user_business_details_id`,`users`.`first_name` AS `manager_firstname`,`users`.`last_name` AS `manager_lastname`,`category`.`name` AS `category_name`,`user_business_details`.`image` AS `business_logo`,`favourite_businesses`.`id` AS `favourite_id`,`favourite_businesses`.`users_id` AS `users_id`,`user_business_details`.`name` AS `business_name` from (((`favourite_businesses` join `user_business_details` on((`favourite_businesses`.`user_business_details_id` = `user_business_details`.`id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`))) join `users` on((`users`.`id` = `user_business_details`.`users_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_photo_comments`
--
DROP TABLE IF EXISTS `view_photo_comments`;

CREATE VIEW `view_photo_comments` AS select `photo_comments`.`id` AS `id`,`photo_comments`.`user_business_photogallery_id` AS `user_business_photogallery_id`,`photo_comments`.`users_id` AS `users_id`,`photo_comments`.`comments` AS `comments`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `profile_image` from (`photo_comments` join `users` on((`photo_comments`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_service_availablity`
--
DROP TABLE IF EXISTS `view_service_availablity`;

CREATE VIEW `view_service_availablity` AS select `user_business_availability`.`id` AS `id`,`user_business_availability`.`user_business_details_id` AS `user_business_details_id`,`user_business_availability`.`users_id` AS `users_id`,`user_business_availability`.`type` AS `type`,`user_business_availability`.`weekid` AS `weekid`,`user_business_availability`.`start_time` AS `start_time`,`user_business_availability`.`end_time` AS `end_time`,`user_business_availability`.`lunch_start_time` AS `lunch_start_time`,`user_business_availability`.`lunch_end_time` AS `lunch_end_time`,`weekdays`.`name` AS `name` from (`weekdays` join `user_business_availability` on((`user_business_availability`.`weekid` = `weekdays`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_subscription_plans`
--
DROP TABLE IF EXISTS `view_subscription_plans`;

CREATE VIEW `view_subscription_plans` AS select `subscription`.`price` AS `price`,`subscription_features`.`users_type` AS `users_type`,`subscription_features`.`users_num` AS `users_num`,`subscription_features`.`offers_type` AS `offers_type`,`subscription_features`.`offer_num` AS `offer_num`,`subscription_features`.`pictures_type` AS `pictures_type`,`subscription_features`.`picture_num` AS `picture_num`,`subscription_features`.`reports` AS `reports`,`subscription_features`.`promotion_notifications` AS `promotion_notifications`,`subscription_features`.`business_type` AS `business_type`,`subscription_features`.`business_num` AS `business_num`,`subscription`.`title` AS `title`,`subscription`.`id` AS `subscription_id` from (`subscription` join `subscription_features` on((`subscription`.`id` = `subscription_features`.`subscription_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_user_subscription`
--
DROP TABLE IF EXISTS `view_user_subscription`;

CREATE VIEW `view_user_subscription` AS select `user_business_subscription`.`users_id` AS `users_id`,`users`.`email` AS `email`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`user_business_details`.`name` AS `business_name`,`subscription`.`title` AS `subscription_name`,`user_business_details`.`id` AS `business_id`,`subscription`.`id` AS `subscription_id`,`user_business_details`.`status` AS `status` from (((`users` join `user_business_subscription` on((`user_business_subscription`.`users_id` = `users`.`id`))) join `user_business_details` on((`users`.`id` = `user_business_details`.`users_id`))) join `subscription` on((`user_business_subscription`.`subscription_id` = `subscription`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
