-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 04:51 AM
-- Server version: 5.1.66-0+squeeze1
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
-- Table structure for table `business_clients_list`
--

CREATE TABLE IF NOT EXISTS `business_clients_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_id` (`users_id`),
  KEY `FK_user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `business_clients_list`
--

INSERT INTO `business_clients_list` (`id`, `users_id`, `user_business_details_id`) VALUES
(3, 134, 14),
(5, 136, 14),
(6, 169, 36);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `business_employees`
--

INSERT INTO `business_employees` (`id`, `user_business_details_id`, `users_id`, `employee_type`) VALUES
(6, 14, 113, 'employee'),
(7, 14, 114, 'employee'),
(8, 14, 115, 'employee'),
(9, 14, 116, 'employee'),
(10, 14, 117, 'employee'),
(12, 14, 119, 'employee'),
(14, 14, 121, 'employee'),
(15, 14, 122, 'employee'),
(16, 14, 123, 'employee'),
(19, 14, 126, 'employee'),
(20, 14, 127, 'employee'),
(21, 14, 128, 'employee'),
(22, 30, 130, 'employee'),
(23, 30, 131, 'employee'),
(40, 36, 165, 'employee'),
(41, 41, 173, 'employee');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `business_notification_settings`
--

INSERT INTO `business_notification_settings` (`id`, `user_business_details_id`, `appointment_reminders`, `remind_before`, `cancel_reschedule_before`, `book_before`, `send_email`, `send_message`) VALUES
(3, 14, 'off', '00:05:00', '00:05:00', '00:15:00', 'on', 'off');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `business_offers`
--

INSERT INTO `business_offers` (`id`, `user_business_details_id`, `services`, `title`, `description`, `discount`, `start_date`, `end_date`, `type`) VALUES
(27, 14, '33,63,64', 'offer1', 'offer1', 12, '0000-00-00', '0000-00-00', 'combo'),
(28, 14, '63,64,66,67,75', 'offer2', 'dsadas', 32, '0000-00-00', '0000-00-00', 'combo'),
(29, 14, '75', 'ooffer343434', 'dfsdf', 34, '0000-00-00', '0000-00-00', 'individual');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `calendar_id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`calendar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendar_id`, `calendar_name`) VALUES
(1, 'Work'),
(2, 'Personal');

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
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_posted_class_id` (`user_business_posted_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `note` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` enum('booked','cancelled') CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `users_id`, `start_time`, `end_time`, `services_id`, `employee_id`, `note`, `status`) VALUES
(1, 136, '2013-06-04 00:30:00', '2013-06-04 01:15:00', '81', 0, 'Hey its Appointments', 'booked'),
(2, 136, '2013-06-06 00:30:00', '2013-06-06 01:15:00', '81', 0, 'asasa', 'booked'),
(3, 136, '2013-06-04 00:00:00', '2013-06-04 00:45:00', '82', 0, 'SEO', 'booked'),
(4, 136, '2013-06-03 01:00:00', '2013-06-03 01:15:00', '82', 0, 'SEO 2', 'booked'),
(5, 136, '2013-06-03 00:45:00', '2013-06-03 01:15:00', '81', 0, 'Hey asasasasa', 'booked'),
(6, 136, '2013-06-04 01:45:00', '2013-06-04 05:30:00', '81', 0, 'asa', 'booked'),
(7, 136, '2013-06-04 07:30:00', '2013-06-04 14:30:00', '81', 0, 'asasa', 'booked'),
(8, 136, '2013-06-08 07:30:00', '2013-06-08 14:30:00', '81', 0, 'asasa', 'booked'),
(9, 136, '2013-06-02 07:45:00', '2013-06-02 14:30:00', '81', 0, 'No Title', 'booked'),
(10, 136, '2013-06-04 07:45:00', '2013-06-03 14:30:00', '81', 0, 'No Title', 'booked'),
(11, 136, '2013-06-05 01:30:00', '2013-06-05 02:00:00', '33', 0, 'No Title', 'booked'),
(12, 136, '2013-06-05 01:30:00', '2013-06-05 02:00:00', '33', 0, 'fgfg\n', 'booked'),
(13, 136, '2013-06-07 01:30:00', '2013-06-07 02:00:00', '33', 0, 'No Title', 'booked');

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
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_availability_id` (`employee_availability_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`id`, `business_id`, `service_id`, `users_id`) VALUES
(19, 14, 33, 116),
(20, 14, 33, 115),
(31, 14, 33, 126),
(32, 14, 63, 113),
(33, 14, 64, 113),
(36, 14, 33, 128),
(45, 30, 71, 130),
(48, 30, 71, 131),
(49, 14, 67, 113),
(52, 36, 80, 165),
(53, 41, 82, 173);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `calendar_id`, `start_time`, `end_time`, `all_day`, `repeat_mode`, `repeat_count`, `day_only_weekdays`, `week_days`, `month_weeknumber`, `month_weekday`, `month_repeatdate`, `event_type`, `rel_event_id`, `repeat_end_date`, `event_delete_ind`, `recur_sequence`) VALUES
(7, 'event1', 'event1', 1, '2013-05-14 00:45:00', '2013-05-14 01:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'gfgdfgdgd', 'gfgdfgdgd', 1, '2013-05-16 09:15:00', '2013-05-16 09:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'event3', 'event3', 1, '2013-05-16 00:45:00', '2013-05-16 01:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'dgddfgdgd', 'dgddfgdgd', 1, '2013-05-16 03:30:00', '2013-05-16 03:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'fdgdfgdgdgdfgd', 'fdgdfgdgdgdfgd', 1, '2013-05-16 05:45:00', '2013-05-16 06:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'event 1st asppointme', 'event 1st asppointme', 1, '2013-05-13 01:15:00', '2013-05-13 01:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'event1', 'event1', 1, '2013-05-17 03:30:00', '2013-05-17 03:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'No Title', 'No Title', 2, '2013-05-29 02:00:00', '2013-05-29 02:15:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'No Title', 'No Title', 2, '2013-05-27 04:30:00', '2013-05-27 04:45:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'dfgdfgdfgdfg', 'dfgdfgdfgdfg', 1, '2013-05-27 14:15:00', '2013-05-27 14:30:00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `employees` varchar(50) NOT NULL,
  `businesses_offers` varchar(50) NOT NULL,
  `pictures` varchar(50) NOT NULL,
  `reports` enum('basic','enhanced') NOT NULL,
  `promotion_notifications` varchar(50) NOT NULL,
  `businesses` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=175 ;

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
(130, 'employee', 'aa@gmail.comddasdad', '', 'fghfghfghqqqqqq', 'hgfhfghdfsfs', 2147483647, 'male', '0000-00-00', '', '', 'inactive', 'c35338527208730505f1e5e22c83165b', '0000-00-00 00:00:00'),
(131, 'employee', 'aa@gmail.csadsadasdads', '', 'sdsadsa', 'sdasdasd', 2147483647, 'male', '0000-00-00', '', '', 'inactive', '939a863073db839b19e2066677457ee8', '0000-00-00 00:00:00'),
(134, 'client', 'qqqqqqq@gmial.omc', '', 'qqqqqqqq', 'qqqq', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(136, 'client', 'client@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'clinet', 'uuuuu', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(137, 'manager', 'businessmen@gmail.com', 'e6072e821b6854ced4d8fd40319c4846', 'businessmen', 'businessmen', 0, 'male', '1980-01-18', '', '', 'inactive', '8f2e695699b44b8e86d3106f6fd276d3', '0000-00-00 00:00:00'),
(138, 'manager', 'businessmen@gmail.com', 'e6072e821b6854ced4d8fd40319c4846', 'businessmen', 'businessmen', 0, 'male', '1980-01-18', '', '', 'active', '93618191e3cd411c0bf988edaac25aa9', '0000-00-00 00:00:00'),
(139, 'client', 'client1@gmail.com', '62608e08adc29a8d6dbc9754e659f125', 'client1', 'client1', 0, 'male', '1979-02-18', '', '', 'active', '0', '0000-00-00 00:00:00'),
(140, 'client', 'client2@gmail.com', '2c66045d4e4a90814ce9280272e510ec', 'client2', 'client2', 0, 'female', '2064-02-03', '', '', 'active', '0', '2013-05-23 08:45:21'),
(144, 'manager', 'swathdsfsfsdinreddy@yahoo.co.in', '8a82fd11c850085d2545d8259cb76699', 'swathiiiiiiiii', 'reddy', 0, 'female', '2063-01-02', '', '', 'active', '3f53060468d5aa2618a6187075d4a5b4', '2013-05-24 07:22:29'),
(145, 'manager', 'omryoz@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', 'omry', 'oz', 0, 'male', '2067-01-01', '', '', 'active', 'bc075345283195f38c2856746bd8678a', '2013-05-24 08:43:21'),
(161, 'employee', 'swathinreddy@yahoo.co.in', '61c31ef399c378e4e879c30c6bfe8248', 'swaaaaaa', 'rrrrrrrr', 2147483647, 'male', '0000-00-00', '', '', 'active', '1ea99cd90340f259076f0805605e8682', '0000-00-00 00:00:00'),
(162, 'client', 'nadav_dago@hotmail.com', '6a8efd1c55190b796eae21f6fe8649af', 'Nadav ', 'Dagovitch', 0, 'male', '1985-02-01', '', '', 'active', '0', '2013-05-24 15:51:30'),
(163, 'client', 'omry.eyal@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Omry', 'Oz', 0, 'male', '2065-03-05', '', '', 'active', '0', '2013-05-24 15:52:09'),
(164, 'manager', 'nadav.dago@gmail.com', '6a8efd1c55190b796eae21f6fe8649af', 'Nadav', 'Dagovitch', 0, 'male', '1985-02-01', '', '', 'inactive', 'f1266479efd4fc50a0b1e9b090385c17', '2013-05-24 15:54:07'),
(165, 'employee', 'omryoz@outlook.com', '9c2e859e3dcf0833613b5b5e6fc03f54', 'omry', 'oz', 534200022, 'male', '0000-00-00', '', '', 'inactive', '438352e06c5d1fc7d2f189169b7a05b6', '0000-00-00 00:00:00'),
(166, 'client', 'eyal_lungin@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Eyal', 'Lungin', 0, 'male', '1970-01-01', '', '', 'active', '0', '2013-05-26 17:12:34'),
(167, 'manager', 'eyallungin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Eyal', 'Lungin', 0, 'male', '1970-01-01', '', '', 'active', 'ef05d4e2721cb19fd4f7af6dc34ba0dc', '2013-05-26 17:14:10'),
(168, 'client', 'omryoz@hotmail.com', 'bc5f0b25e8afaf2ad681235c9b84bb3d', 'omry', 'oz', 0, 'male', '1979-01-18', '', '', 'active', '0', '2013-06-05 17:27:25'),
(169, 'client', 'omryoz2@gmail.com', '', 'OMRY', 'OZ', 2147483647, 'male', '0000-00-00', '', '', 'active', '', '0000-00-00 00:00:00'),
(171, 'manager', 'rakesh.chhugani@eulogik.com', '25f9e794323b453885f5181f1b624d0b', 'Rakesh', 'Chhugani', 0, 'male', '1988-10-13', '', '', 'active', '7044658ad37fb3eefb74c613006cc936', '2013-06-07 08:57:02'),
(172, 'manager', 'rakesh.chhugani@gmail.com', 'c77eeb12c6caf244f7cbbdbda7c464cd', 'Rakesh', 'Chhugani', 0, 'male', '1988-10-13', '', '', 'active', '2ca8639d7bdd360a21c5d4f4ac80786e', '2013-06-07 09:18:32'),
(173, 'employee', 'a@gmail.com', '18ac442f33458072ec333a873d37161a', 'Mark', 'Methews', 123456789, 'male', '0000-00-00', '', '', 'inactive', '85216cea7793386b6ff07ade4722501a', '0000-00-00 00:00:00'),
(174, 'manager', 'swathinreddy22@gmail.com', 'eb035ca59f01c8b0792fc796e3d4faf1', 'swathi', 'reddy', 0, 'female', '1980-11-18', '', '', 'active', '4bcc4d0848bd19c20629dd545c621ed4', '2013-06-20 09:15:46');

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
  `type` enum('employee','business') NOT NULL,
  `weekid` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lunch_start_time` time NOT NULL,
  `lunch_end_time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=412 ;

--
-- Dumping data for table `user_business_availability`
--

INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
(232, 14, 126, 'employee', 1, '09:45:00', '12:45:00', '12:45:00', '12:45:00'),
(235, 14, 128, 'employee', 1, '14:15:00', '14:15:00', '14:15:00', '14:15:00'),
(252, 30, 0, 'employee', 1, '15:00:00', '15:00:00', '00:00:00', '00:00:00'),
(253, 30, 0, 'employee', 3, '15:00:00', '15:00:00', '00:00:00', '00:00:00'),
(254, 30, 0, 'employee', 5, '15:00:00', '15:00:00', '00:00:00', '00:00:00'),
(255, 30, 0, 'employee', 7, '15:00:00', '15:00:00', '00:00:00', '00:00:00'),
(264, 30, 130, 'employee', 1, '15:15:00', '15:15:00', '00:00:00', '00:00:00'),
(265, 30, 130, 'employee', 5, '15:15:00', '15:15:00', '00:00:00', '00:00:00'),
(274, 30, 131, 'employee', 1, '07:15:00', '15:15:00', '15:15:00', '15:15:00'),
(275, 30, 131, 'employee', 2, '06:15:00', '15:15:00', '15:15:00', '15:15:00'),
(276, 30, 131, 'employee', 3, '15:15:00', '15:15:00', '15:15:00', '15:15:00'),
(277, 30, 131, 'employee', 4, '15:15:00', '15:15:00', '15:15:00', '15:15:00'),
(362, 36, 0, 'business', 1, '14:30:00', '11:30:00', '00:00:00', '00:00:00'),
(363, 36, 0, 'business', 2, '11:30:00', '11:30:00', '00:00:00', '00:00:00'),
(364, 36, 0, 'business', 3, '11:30:00', '11:30:00', '00:00:00', '00:00:00'),
(365, 36, 0, 'business', 4, '11:30:00', '11:30:00', '00:00:00', '00:00:00'),
(366, 36, 0, 'business', 5, '11:30:00', '11:30:00', '00:00:00', '00:00:00'),
(367, 36, 0, 'business', 6, '11:30:00', '11:30:00', '00:00:00', '00:00:00'),
(380, 36, 165, 'employee', 1, '05:45:00', '18:45:00', '00:00:00', '00:00:00'),
(381, 36, 165, 'employee', 2, '18:45:00', '18:45:00', '00:00:00', '00:00:00'),
(382, 36, 165, 'employee', 3, '18:45:00', '18:45:00', '00:00:00', '00:00:00'),
(383, 38, 0, 'business', 1, '20:15:00', '20:15:00', '00:00:00', '00:00:00'),
(384, 38, 0, 'business', 2, '20:15:00', '20:15:00', '00:00:00', '00:00:00'),
(385, 38, 0, 'business', 3, '20:15:00', '20:15:00', '00:00:00', '00:00:00'),
(386, 38, 0, 'business', 4, '20:15:00', '20:15:00', '00:00:00', '00:00:00'),
(387, 38, 0, 'business', 6, '20:15:00', '20:15:00', '00:00:00', '00:00:00'),
(388, 39, 0, 'business', 1, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(389, 39, 0, 'business', 2, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(390, 39, 0, 'business', 3, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(391, 39, 0, 'business', 4, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(392, 39, 0, 'business', 5, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(393, 39, 0, 'business', 6, '16:00:00', '16:00:00', '00:00:00', '00:00:00'),
(394, 40, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(395, 40, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(396, 40, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(397, 40, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(398, 40, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(399, 40, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(400, 41, 0, 'business', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(401, 41, 0, 'business', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(402, 41, 0, 'business', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(403, 41, 0, 'business', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(404, 41, 0, 'business', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(405, 41, 0, 'business', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(406, 41, 173, 'employee', 1, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(407, 41, 173, 'employee', 2, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(408, 41, 173, 'employee', 3, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(409, 41, 173, 'employee', 4, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(410, 41, 173, 'employee', 5, '10:45:00', '19:45:00', '00:00:00', '00:00:00'),
(411, 41, 173, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00');

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
  `timelength` time NOT NULL,
  `padding_time_before` time NOT NULL,
  `padding_time_after` time NOT NULL,
  `class_size` int(10) NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `user_business_details`
--

INSERT INTO `user_business_details` (`id`, `category_id`, `users_id`, `name`, `image`, `description`, `mobile_number`, `address`, `business_type`, `map_latitude`, `map_longitude`, `calendar_type`) VALUES
(14, 1, 69, 'aa', '', 'aa', '121212334234234', '', 'service', '31.046051', '34.85161199999993', 2),
(15, 2, 69, 'sadsad', '', 'asdsa', '2222222222', '', 'service', '31.046051', '34.85161199999993', -1),
(16, 2, 69, 'sada', '', 'sadasd', '3242343232', '', 'service', '31.046051', '34.85161199999993', 1),
(17, 1, 69, 'dsfsdfdsfdsf', '', 'sdssssss', '333333333333333', '', 'service', '31.046051', '34.85161199999993', 2),
(18, 2, 69, 'fsdfd', '', 'dsf', '342423423424342', '', 'service', '31.046051', '34.85161199999993', 2),
(19, 1, 69, 'asdsa', '', 'sadsad', '3432423', '', 'service', '31.046051', '34.85161199999993', 1),
(30, 1, 129, 'asasasa', '', 'ddddddddddd', '234234234234234', '', 'service', '31.046051', '34.85161199999993', 1),
(36, 1, 145, 'fgjkfdjgl', '', 'jkdljkljslkgl', '0543450610', 'israel', 'service', '31.046051', '34.85161199999993', 1),
(38, 1, 167, 'shu', '', 'sdfsdfsdfs', '056656', 'Israel', 'service', '31.046051', '34.85161199999993', 1),
(39, 1, 138, 'sfdsf', '', 'dsfdsf', '43534534534534', 'Indi, Karnataka 586209, India', 'service', '17.176911', '75.95316200000002', 1),
(40, 1, 171, 'Web Design', '', 'Web Design', '8817453284', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'service', '23.2332432', '77.4343394', 1),
(41, 1, 172, 'Bike Services', '', 'Bike Services', '142245457811445', 'Bhopal, Madhya Pradesh, India', 'service', '23.2599333', '77.41261499999996', 1);

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
  `order` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_business_photogallery`
--

INSERT INTO `user_business_photogallery` (`id`, `user_business_details_id`, `title`, `description`, `photo`, `order`) VALUES
(14, 14, 'dUpdated', 'dfgfdgf', 'Buttonset_slice_13.png', 45345),
(16, 14, 'new image', 'asdsad', 'Buttonset_slice_11.png', 4),
(17, 14, 'hello', 'fdgdfg', 'Buttonset_slice_06.png', 5),
(22, 14, 'hey', 'hghfg', 'Buttonset_slice_03.png', 4);

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
  PRIMARY KEY (`id`),
  KEY `user_business_details_id` (`user_business_classes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `user_business_services`
--

INSERT INTO `user_business_services` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `details`) VALUES
(2, 15, 'aaasdasqqqqqqqqq', 'fixed', 3242, 20, 'minutes', 0, '', 'sdfsfsdfsdfsdf dfsdf sdf sdf'),
(3, 16, 'sdsadsad', 'fixed', 4323, 0, 'minutes', 0, '', '23423423'),
(4, 15, 'qqqqqqqqqq', 'fixed', 2222, 0, 'hours', 0, '', 'aa'),
(5, 17, 'aaaaaaaaaaaaaaa', 'fixed', 3333, 60, 'minutes', 0, '', 'fsdfsdfsdfds'),
(16, 18, 'aaaaaaaaaa', 'fixed', 0, 34, 'minutes', 0, '', 'sdsadsad'),
(33, 14, 'kkkkkkkkk', 'fixed', 5464, 64, 'minutes', 56, '', 'gdfgdgdfgd'),
(63, 14, 'wwwwwww', 'fixed', 23, 23, 'minutes', 0, '', '23213213eaddasd'),
(64, 14, 'qqqq', 'fixed', 213, 23, 'minutes', 0, '', 'dfsdfsdfsd'),
(66, 14, 'uuuuuuuujkkkk', 'fixed', 34, 43, 'minutes', 6, '', 'rsfsdfsd'),
(67, 14, 'what uppp', 'fixed', 12, 12, 'minutes', 0, '', 'fffffffff'),
(71, 30, 'service12', 'fixed', 3232, 12, 'hours', 23, '', 'dcvdcvxcvxcvxc'),
(73, 30, 'hhhfgfghfgh', 'fixed', 6464, 56, 'minutes', 0, '', 'vcvbcvbcv'),
(74, 30, 'rrrrrrrraaaaa', 'fixed', 3423, 33, 'minutes', 0, '', 'sdfsdsfs'),
(75, 14, 'hghfgfgh', 'fixed', 3242, 23, 'minutes', 0, '', 'dfgdfg'),
(76, 14, 'sssss', 'fixed', 2132, 12, 'minutes', 12, 'After', 'dfdsfsdfds'),
(77, 14, 'new', 'fixed', 222, 12, 'hours', 12, 'After', 'dsdsfgdfgdf'),
(78, 14, 'zzzzzzzzzz', 'fixed', 4554, 33, 'hours', 12, 'Before & After', 'hfghgfhfghfgh'),
(80, 36, 'haircut', 'fixed', 0, 25, 'minutes', 0, 'Before', ''),
(81, 40, 'SEO', 'fixed', 20, 50, 'hours', 0, 'Before', 'We Provide SEO Services'),
(82, 41, 'Refreshing', 'fixed', 500, 30, 'hours', 0, 'Before', 'Refreshing Services...........');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_business_subscription`
--

INSERT INTO `user_business_subscription` (`id`, `version_type`, `subscription_id`, `users_id`, `start_date`, `status`, `balance_amount`, `end_date`) VALUES
(2, 'free', 3, 69, '2013-05-13', 'active', '', '2013-06-13'),
(3, 'free', 1, 69, '2013-05-13', 'active', '', '2013-06-13'),
(4, 'free', 1, 69, '2013-05-13', 'active', '', '2013-06-13'),
(5, 'free', 1, 69, '2013-05-13', 'active', '', '2013-06-13'),
(6, 'free', 2, 69, '2013-05-14', 'active', '', '2013-06-14'),
(7, 'free', 2, 69, '2013-05-14', 'active', '', '2013-06-14'),
(12, 'free', 3, 129, '2013-05-16', 'active', '', '2013-06-16'),
(13, 'free', 1, 138, '2013-05-30', 'active', '', '2013-06-30'),
(15, 'free', 1, 145, '2013-05-24', 'active', '', '2013-06-24'),
(16, 'free', 1, 167, '2013-05-26', 'active', '', '2013-06-26'),
(17, 'free', 1, 171, '2013-06-07', 'active', '', '2013-07-07'),
(18, 'free', 1, 172, '2013-06-07', 'active', '', '2013-07-07'),
(19, 'free', 2, 174, '2013-06-20', 'active', '', '2013-07-20');

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
,`image` varchar(100)
,`gender` enum('male','female')
,`phone_number` int(15)
,`date_of_birth` date
,`about_me` varchar(250)
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
,`note` varchar(50)
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
-- Table structure for table `weekdays`
--

CREATE TABLE IF NOT EXISTS `weekdays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_business_clients` AS select `business_clients_list`.`users_id` AS `users_id`,`business_clients_list`.`user_business_details_id` AS `user_business_details_id`,`users`.`email` AS `email`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`image` AS `image`,`users`.`gender` AS `gender`,`users`.`phone_number` AS `phone_number`,`users`.`date_of_birth` AS `date_of_birth`,`users`.`about_me` AS `about_me` from (`users` join `business_clients_list` on((`users`.`id` = `business_clients_list`.`users_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_details`
--
DROP TABLE IF EXISTS `view_business_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_business_details` AS select `users`.`first_name` AS `manager_firstname`,`users`.`last_name` AS `manager_lastname`,`users`.`phone_number` AS `manager_phone`,`users`.`gender` AS `gender`,`users`.`email` AS `manager_email`,`user_business_details`.`description` AS `business_description`,`user_business_details`.`mobile_number` AS `mobile_number`,`user_business_details`.`address` AS `address`,`user_business_details`.`business_type` AS `business_type`,`user_business_details`.`map_latitude` AS `map_latitude`,`user_business_details`.`map_longitude` AS `map_longitude`,`user_business_details`.`calendar_type` AS `calendar_type`,`user_business_details`.`name` AS `business_name`,`user_business_details`.`image` AS `image`,`category`.`name` AS `category_name`,`user_business_details`.`users_id` AS `users_id`,`user_business_details`.`id` AS `business_id` from ((`users` join `user_business_details` on((`users`.`id` = `user_business_details`.`users_id`))) join `category` on((`user_business_details`.`category_id` = `category`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_employees`
--
DROP TABLE IF EXISTS `view_business_employees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_business_employees` AS select `users`.`email` AS `email`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`phone_number` AS `phone_number`,`business_employees`.`user_business_details_id` AS `user_business_details_id`,`business_employees`.`users_id` AS `users_id` from (`users` join `business_employees` on((`business_employees`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_buisness_services_appointments`
--
DROP TABLE IF EXISTS `view_client_buisness_services_appointments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_client_buisness_services_appointments` AS select `user_business_details`.`category_id` AS `category_id`,`user_business_details`.`name` AS `name`,`user_business_details`.`image` AS `image`,`user_business_details`.`description` AS `description`,`user_business_services`.`id` AS `service_id`,`user_business_services`.`user_business_details_id` AS `user_business_details_id`,`user_business_services`.`name` AS `service_name`,`user_business_services`.`price_type` AS `price_type`,`user_business_services`.`price` AS `price`,`user_business_services`.`timelength` AS `timelength`,`user_business_services`.`time_type` AS `time_type`,`user_business_services`.`padding_time` AS `padding_time`,`user_business_services`.`padding_time_type` AS `padding_time_type`,`user_business_services`.`details` AS `details`,`client_service_appointments`.`start_time` AS `start_time`,`client_service_appointments`.`end_time` AS `end_time`,`client_service_appointments`.`services_id` AS `services_id`,`client_service_appointments`.`employee_id` AS `employee_id`,`client_service_appointments`.`status` AS `status`,`client_service_appointments`.`users_id` AS `users_id`,`client_service_appointments`.`note` AS `note`,`client_service_appointments`.`id` AS `id`,`users`.`user_role` AS `user_role` from (((`user_business_details` join `user_business_services` on((`user_business_details`.`id` = `user_business_services`.`user_business_details_id`))) join `client_service_appointments` on((`user_business_services`.`id` = `client_service_appointments`.`services_id`))) join `users` on((`client_service_appointments`.`users_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_employee_services`
--
DROP TABLE IF EXISTS `view_employee_services`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_employee_services` AS select `employee_services`.`service_id` AS `service_id`,`user_business_services`.`name` AS `name`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`employee_services`.`users_id` AS `users_id`,`employee_services`.`business_id` AS `business_id` from ((`employee_services` join `user_business_services` on((`employee_services`.`service_id` = `user_business_services`.`id`))) join `users` on((`employee_services`.`users_id` = `users`.`id`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_clients_list`
--
ALTER TABLE `business_clients_list`
  ADD CONSTRAINT `FK_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_business_details_id` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_employees`
--
ALTER TABLE `business_employees`
  ADD CONSTRAINT `business_employees_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_employees_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_employees_availlability`
--
ALTER TABLE `business_employees_availlability`
  ADD CONSTRAINT `business_employees_availlability_ibfk_1` FOREIGN KEY (`business_employees_id`) REFERENCES `business_employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_notification_settings`
--
ALTER TABLE `business_notification_settings`
  ADD CONSTRAINT `business_notification_settings_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_offers`
--
ALTER TABLE `business_offers`
  ADD CONSTRAINT `business_offers_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_class_booking`
--
ALTER TABLE `client_class_booking`
  ADD CONSTRAINT `client_class_booking_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_class_booking_ibfk_2` FOREIGN KEY (`user_business_posted_class_id`) REFERENCES `user_business_posted_class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_service_appointments`
--
ALTER TABLE `client_service_appointments`
  ADD CONSTRAINT `client_service_appointments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_card_details`
--
ALTER TABLE `credit_card_details`
  ADD CONSTRAINT `credit_card_details_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_availability`
--
ALTER TABLE `employee_availability`
  ADD CONSTRAINT `employee_availability_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_lunchtime`
--
ALTER TABLE `employee_lunchtime`
  ADD CONSTRAINT `employee_lunchtime_ibfk_1` FOREIGN KEY (`employee_availability_id`) REFERENCES `employee_availability` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_services`
--
ALTER TABLE `employee_services`
  ADD CONSTRAINT `employee_services_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `user_business_details` (`id`),
  ADD CONSTRAINT `employee_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `user_business_services` (`id`),
  ADD CONSTRAINT `employee_services_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favourite_businesses`
--
ALTER TABLE `favourite_businesses`
  ADD CONSTRAINT `favourite_businesses_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_businesses_ibfk_2` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photo_likes_comments`
--
ALTER TABLE `photo_likes_comments`
  ADD CONSTRAINT `photo_likes_comments_ibfk_1` FOREIGN KEY (`user_business_photogallery_id`) REFERENCES `user_business_photogallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `photo_likes_comments_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscription_features`
--
ALTER TABLE `subscription_features`
  ADD CONSTRAINT `subscription_features_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `users_details_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_availability`
--
ALTER TABLE `user_business_availability`
  ADD CONSTRAINT `user_business_availability_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_classes`
--
ALTER TABLE `user_business_classes`
  ADD CONSTRAINT `user_business_classes_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_details`
--
ALTER TABLE `user_business_details`
  ADD CONSTRAINT `user_business_details_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_business_details_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_photogallery`
--
ALTER TABLE `user_business_photogallery`
  ADD CONSTRAINT `user_business_photogallery_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_posted_class`
--
ALTER TABLE `user_business_posted_class`
  ADD CONSTRAINT `user_business_posted_class_ibfk_1` FOREIGN KEY (`user_business_classes_id`) REFERENCES `user_business_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_services`
--
ALTER TABLE `user_business_services`
  ADD CONSTRAINT `user_business_services_ibfk_1` FOREIGN KEY (`user_business_details_id`) REFERENCES `user_business_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_business_subscription`
--
ALTER TABLE `user_business_subscription`
  ADD CONSTRAINT `user_business_subscription_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_business_subscription_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_notification_settings`
--
ALTER TABLE `user_notification_settings`
  ADD CONSTRAINT `user_notification_settings_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
