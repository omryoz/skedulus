-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2013 at 10:47 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `skedulus`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_clients_list`
--

CREATE TABLE IF NOT EXISTS `business_clients_list` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_users_id` (`users_id`),
  KEY `FK_user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_clients_list`
--


-- --------------------------------------------------------

--
-- Table structure for table `business_employees`
--

CREATE TABLE IF NOT EXISTS `business_employees` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `employee_type` enum('supervisor','employee') default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

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
(28, 33, 152, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `business_employees_availlability`
--

CREATE TABLE IF NOT EXISTS `business_employees_availlability` (
  `id` int(11) NOT NULL auto_increment,
  `business_employees_id` int(11) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `saturday` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `business_employees_id` (`business_employees_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_employees_availlability`
--


-- --------------------------------------------------------

--
-- Table structure for table `business_notification_settings`
--

CREATE TABLE IF NOT EXISTS `business_notification_settings` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `appointment_reminders` enum('on','off') character set latin1 NOT NULL,
  `remind_before` time NOT NULL,
  `cancel_reschedule_before` time NOT NULL,
  `book_before` time NOT NULL,
  `send_email` enum('on','off') character set latin1 NOT NULL,
  `send_message` enum('on','off') character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_notification_settings`
--


-- --------------------------------------------------------

--
-- Table structure for table `business_offers`
--

CREATE TABLE IF NOT EXISTS `business_offers` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `services` varchar(50) character set latin1 NOT NULL,
  `title` varchar(20) character set latin1 NOT NULL,
  `description` varchar(100) NOT NULL,
  `discount` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `type` enum('combo','individual') NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `business_offers`
--


-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `calendar_id` int(11) NOT NULL auto_increment,
  `calendar_name` varchar(20) default NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY  (`calendar_id`)
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `city`
--


-- --------------------------------------------------------

--
-- Table structure for table `client_class_booking`
--

CREATE TABLE IF NOT EXISTS `client_class_booking` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `user_business_posted_class_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_posted_class_id` (`user_business_posted_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `client_class_booking`
--


-- --------------------------------------------------------

--
-- Table structure for table `client_service_appointments`
--

CREATE TABLE IF NOT EXISTS `client_service_appointments` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `services_id` varchar(50) character set latin1 NOT NULL,
  `employee_id` int(11) NOT NULL,
  `note` text character set latin1 NOT NULL,
  `status` enum('booked','cancelled') character set latin1 default NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_service_appointments`
--

INSERT INTO `client_service_appointments` (`id`, `users_id`, `start_time`, `end_time`, `services_id`, `employee_id`, `note`, `status`) VALUES
(1, 0, '2013-06-29 14:30:00', '2013-06-29 19:30:00', '4', 0, 'undefined', 'booked');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_details`
--

CREATE TABLE IF NOT EXISTS `credit_card_details` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `card_name` varchar(50) character set latin1 NOT NULL,
  `credit_card_number` int(20) NOT NULL,
  `verification_number` int(20) NOT NULL,
  `expiration_month` varchar(50) character set latin1 NOT NULL,
  `expiration_year` smallint(5) NOT NULL,
  `address` varchar(20) character set latin1 NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `zip` int(15) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `credit_card_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee_availability`
--

CREATE TABLE IF NOT EXISTS `employee_availability` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `monday` varchar(50) character set latin1 NOT NULL,
  `tuesday` varchar(50) character set latin1 NOT NULL,
  `wednesday` varchar(50) character set latin1 NOT NULL,
  `thursday` varchar(50) character set latin1 NOT NULL,
  `friday` varchar(50) character set latin1 NOT NULL,
  `saturday` varchar(50) character set latin1 NOT NULL,
  `sunday` varchar(50) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_availability_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employee_availability`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee_lunchtime`
--

CREATE TABLE IF NOT EXISTS `employee_lunchtime` (
  `id` int(11) NOT NULL auto_increment,
  `employee_availability_id` int(11) NOT NULL,
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `employee_availability_id` (`employee_availability_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employee_lunchtime`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee_services`
--

CREATE TABLE IF NOT EXISTS `employee_services` (
  `id` int(11) NOT NULL auto_increment,
  `business_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `business_id` (`business_id`),
  KEY `service_id` (`service_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `employee_services`
--

INSERT INTO `employee_services` (`id`, `business_id`, `service_id`, `users_id`) VALUES
(30, 33, 78, 152),
(27, 31, 75, 150),
(29, 33, 4, 151),
(26, 31, 76, 148);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL auto_increment,
  `event_name` varchar(20) default NULL,
  `event_description` varchar(20) default NULL,
  `calendar_id` int(11) default NULL,
  `start_time` datetime default NULL,
  `end_time` datetime default NULL,
  `all_day` smallint(6) default '0',
  `repeat_mode` varchar(11) default NULL,
  `repeat_count` int(11) default NULL,
  `day_only_weekdays` int(11) default NULL,
  `week_days` varchar(20) default NULL COMMENT 'comma number of days',
  `month_weeknumber` int(11) default NULL,
  `month_weekday` int(11) default NULL,
  `month_repeatdate` datetime default NULL,
  `event_type` varchar(20) default NULL,
  `rel_event_id` int(11) default NULL,
  `repeat_end_date` datetime default NULL,
  `event_delete_ind` int(11) default NULL,
  `recur_sequence` int(11) default NULL,
  PRIMARY KEY  (`event_id`),
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
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `user_business_details_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `favourite_businesses`
--


-- --------------------------------------------------------

--
-- Table structure for table `photo_likes_comments`
--

CREATE TABLE IF NOT EXISTS `photo_likes_comments` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_photogallery_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `likes` int(50) NOT NULL,
  `comments` varchar(100) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_photogallery_id` (`user_business_photogallery_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `photo_likes_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(50) character set latin1 NOT NULL,
  `description` varchar(250) character set latin1 NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` enum('active','deactive') character set latin1 NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `subscription_id` int(11) NOT NULL,
  `employees` varchar(50) NOT NULL,
  `businesses_offers` varchar(50) NOT NULL,
  `pictures` varchar(50) NOT NULL,
  `reports` enum('basic','enhanced') NOT NULL,
  `promotion_notifications` varchar(50) NOT NULL,
  `businesses` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subscription_features`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `user_role` enum('client','manager','employee') NOT NULL,
  `email` varchar(50) character set latin1 NOT NULL,
  `password` varchar(50) character set latin1 NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(250) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('active','inactive') character set latin1 NOT NULL,
  `activationkey` varchar(50) NOT NULL,
  `createdOn` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_role_id` (`user_role`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=153 ;

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
(152, 'employee', 'abc123@gmail.com', 'cbea380bfb36e812f45cded93edc394c', 'Demo 2', 'User', 123456789, 'male', '0000-00-00', '', '', 'inactive', '6300faa6c48e2e421be8f21749f51356', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(50) NOT NULL,
  `first_name` varchar(50) character set latin1 NOT NULL,
  `last_name` varchar(50) character set latin1 NOT NULL,
  `phone_number` int(15) NOT NULL,
  `gender` enum('male','female') character set latin1 NOT NULL,
  `date_of_birth` date NOT NULL,
  `about_me` varchar(512) character set latin1 NOT NULL,
  `image` varchar(100) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_business_availability`
--

CREATE TABLE IF NOT EXISTS `user_business_availability` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `type` enum('employee','business') NOT NULL,
  `weekid` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `lunch_start_time` time NOT NULL,
  `lunch_end_time` time NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=339 ;

--
-- Dumping data for table `user_business_availability`
--

INSERT INTO `user_business_availability` (`id`, `user_business_details_id`, `users_id`, `type`, `weekid`, `start_time`, `end_time`, `lunch_start_time`, `lunch_end_time`) VALUES
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
(338, 33, 152, 'employee', 6, '10:45:00', '19:45:00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_classes`
--

CREATE TABLE IF NOT EXISTS `user_business_classes` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `name` varchar(50) character set latin1 NOT NULL,
  `price_type` enum('fixed','variable','free') character set latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `timelength` int(11) NOT NULL,
  `time_type` enum('hours','minutes') NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') NOT NULL,
  `class_size` int(10) NOT NULL,
  `details` varchar(50) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_business_classes`
--

INSERT INTO `user_business_classes` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `class_size`, `details`) VALUES
(1, 33, 'Yoga 2', 'fixed', 10, 20, 'minutes', 0, 'Before', 20, 'Demos '),
(4, 33, 'Yoga 1 ', 'fixed', 20, 20, 'minutes', 0, 'Before', 20, 'Demos ');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_details`
--

CREATE TABLE IF NOT EXISTS `user_business_details` (
  `id` int(11) NOT NULL auto_increment,
  `category_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `name` varchar(100) character set latin1 NOT NULL,
  `image` varchar(50) character set latin1 NOT NULL,
  `description` varchar(200) character set latin1 NOT NULL,
  `mobile_number` varchar(20) character set latin1 NOT NULL,
  `address` varchar(500) NOT NULL,
  `business_type` enum('class','service') character set latin1 NOT NULL,
  `map_latitude` varchar(50) character set latin1 NOT NULL,
  `map_longitude` varchar(50) character set latin1 NOT NULL,
  `calendar_type` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `category_id` (`category_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user_business_details`
--

INSERT INTO `user_business_details` (`id`, `category_id`, `users_id`, `name`, `image`, `description`, `mobile_number`, `address`, `business_type`, `map_latitude`, `map_longitude`, `calendar_type`) VALUES
(30, 1, 129, 'asasasa', '', 'ddddddddddd', '234234234234234', '', 'service', '31.046051', '34.85161199999993', 1),
(31, 1, 138, 'bb', 'Sunset.jpg', 'bb', '232323232323223', 'Indiana, USA', 'service', '40.2671941', '-86.13490189999999', 1),
(32, 2, 136, 'Test Demo', '', 'Test Demo', '8817453284', 'A, Deerbrook, WI 54424, USA', 'service', '45.2801325', '-89.07150560000002', 1),
(33, 1, 147, 'Web Design', 'Sunset1.jpg', 'We are web organization', '8817453284', 'Maharana Pratap Nagar, Bhopal, Madhya Pradesh, India', 'class', '23.2332432', '77.4343394', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_business_photogallery`
--

CREATE TABLE IF NOT EXISTS `user_business_photogallery` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `title` varchar(25) character set latin1 NOT NULL,
  `description` varchar(50) NOT NULL,
  `photo` varchar(50) character set latin1 NOT NULL,
  `order` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_business_photogallery`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_business_posted_class`
--

CREATE TABLE IF NOT EXISTS `user_business_posted_class` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_classes_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `lastdate_enroll` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `instructor` int(11) NOT NULL COMMENT 'UsersId from users table ',
  `repeat_type` enum('daily','weekly','monthly') character set latin1 NOT NULL,
  `repeat_all_day` enum('0','1') character set latin1 NOT NULL,
  `repeat_week_days` varchar(50) character set latin1 NOT NULL,
  `repeat_months` varchar(50) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_classes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_business_posted_class`
--

INSERT INTO `user_business_posted_class` (`id`, `user_business_classes_id`, `start_date`, `end_date`, `lastdate_enroll`, `start_time`, `end_time`, `instructor`, `repeat_type`, `repeat_all_day`, `repeat_week_days`, `repeat_months`) VALUES
(2, 1, '2013-07-02', '2013-07-25', '2013-07-24', '00:30:00', '01:15:00', 152, 'monthly', '0', '', ''),
(3, 4, '2013-07-02', '2013-07-02', '2013-07-25', '01:30:00', '01:45:00', 152, 'monthly', '0', '', ''),
(4, 4, '2013-07-05', '2013-07-05', '2013-07-25', '02:00:00', '02:15:00', 152, 'weekly', '0', '', ''),
(5, 4, '2013-07-01', '2013-07-01', '2013-07-17', '03:00:00', '03:15:00', 151, 'daily', '0', '', ''),
(6, 4, '2013-07-01', '2013-07-01', '2013-07-19', '00:30:00', '04:45:00', 151, 'daily', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_services`
--

CREATE TABLE IF NOT EXISTS `user_business_services` (
  `id` int(11) NOT NULL auto_increment,
  `user_business_details_id` int(11) NOT NULL,
  `name` varchar(50) character set latin1 NOT NULL,
  `price_type` enum('fixed','variable','free') character set latin1 NOT NULL,
  `price` int(10) NOT NULL,
  `timelength` int(11) NOT NULL,
  `time_type` enum('hours','minutes') NOT NULL,
  `padding_time` int(10) NOT NULL,
  `padding_time_type` enum('Before','After','Before & After') NOT NULL,
  `details` varchar(50) character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_business_details_id` (`user_business_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `user_business_services`
--

INSERT INTO `user_business_services` (`id`, `user_business_details_id`, `name`, `price_type`, `price`, `timelength`, `time_type`, `padding_time`, `padding_time_type`, `details`) VALUES
(71, 30, 'service12', 'fixed', 3232, 12, 'hours', 23, '', 'dcvdcvxcvxcvxc'),
(73, 30, 'hhhfgfghfgh', 'fixed', 6464, 56, 'minutes', 0, '', 'vcvbcvbcv'),
(74, 30, 'rrrrrrrraaaaa', 'fixed', 3423, 33, 'minutes', 0, '', 'sdfsdsfs'),
(75, 31, 'service1', 'fixed', 123, 30, 'minutes', 30, 'Before', 'bcbcvbv '),
(76, 31, 'service2', 'fixed', 123, 15, 'minutes', 15, 'Before & After', 'bcbcvbv '),
(77, 32, 'aasa', 'variable', 20, 20, 'minutes', 0, 'Before', 'asa'),
(78, 33, 'Seo', 'variable', 200, 50, 'hours', 0, 'Before', 'Demo Description');

-- --------------------------------------------------------

--
-- Table structure for table `user_business_subscription`
--

CREATE TABLE IF NOT EXISTS `user_business_subscription` (
  `id` int(11) NOT NULL auto_increment,
  `version_type` enum('paid','free') NOT NULL,
  `subscription_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `status` enum('active','expired') character set latin1 NOT NULL default 'active',
  `balance_amount` varchar(50) character set latin1 NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `subscription_id` (`subscription_id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(13, 'free', 1, 138, '2013-06-06', 'active', '', '2013-07-06'),
(14, 'free', 2, 136, '2013-06-06', 'active', '', '2013-07-06'),
(15, 'free', 1, 147, '2013-06-07', 'active', '', '2013-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification_settings`
--

CREATE TABLE IF NOT EXISTS `user_notification_settings` (
  `id` int(11) NOT NULL auto_increment,
  `users_id` int(11) NOT NULL,
  `appointment_reminder` enum('yes','no') character set latin1 NOT NULL,
  `remind_before` int(11) NOT NULL,
  `send_message` enum('yes','no') character set latin1 NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_notification_settings`
--


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
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_business_clients` AS select `skedulus`.`business_clients_list`.`users_id` AS `users_id`,`skedulus`.`business_clients_list`.`user_business_details_id` AS `user_business_details_id`,`skedulus`.`users`.`email` AS `email`,`skedulus`.`users`.`first_name` AS `first_name`,`skedulus`.`users`.`last_name` AS `last_name`,`skedulus`.`users`.`image` AS `image`,`skedulus`.`users`.`gender` AS `gender`,`skedulus`.`users`.`phone_number` AS `phone_number`,`skedulus`.`users`.`date_of_birth` AS `date_of_birth`,`skedulus`.`users`.`about_me` AS `about_me` from (`skedulus`.`users` join `skedulus`.`business_clients_list` on((`skedulus`.`users`.`id` = `skedulus`.`business_clients_list`.`users_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_details`
--
DROP TABLE IF EXISTS `view_business_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_business_details` AS select `skedulus`.`users`.`first_name` AS `manager_firstname`,`skedulus`.`users`.`last_name` AS `manager_lastname`,`skedulus`.`users`.`phone_number` AS `manager_phone`,`skedulus`.`users`.`gender` AS `gender`,`skedulus`.`users`.`email` AS `manager_email`,`skedulus`.`user_business_details`.`description` AS `business_description`,`skedulus`.`user_business_details`.`mobile_number` AS `mobile_number`,`skedulus`.`user_business_details`.`address` AS `address`,`skedulus`.`user_business_details`.`business_type` AS `business_type`,`skedulus`.`user_business_details`.`map_latitude` AS `map_latitude`,`skedulus`.`user_business_details`.`map_longitude` AS `map_longitude`,`skedulus`.`user_business_details`.`calendar_type` AS `calendar_type`,`skedulus`.`user_business_details`.`name` AS `business_name`,`skedulus`.`user_business_details`.`image` AS `image`,`skedulus`.`category`.`name` AS `category_name`,`skedulus`.`user_business_details`.`users_id` AS `users_id`,`skedulus`.`user_business_details`.`id` AS `business_id` from ((`skedulus`.`users` join `skedulus`.`user_business_details` on((`skedulus`.`users`.`id` = `skedulus`.`user_business_details`.`users_id`))) join `skedulus`.`category` on((`skedulus`.`user_business_details`.`category_id` = `skedulus`.`category`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_business_employees`
--
DROP TABLE IF EXISTS `view_business_employees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_business_employees` AS select `skedulus`.`users`.`email` AS `email`,`skedulus`.`users`.`first_name` AS `first_name`,`skedulus`.`users`.`last_name` AS `last_name`,`skedulus`.`users`.`phone_number` AS `phone_number`,`skedulus`.`business_employees`.`user_business_details_id` AS `user_business_details_id`,`skedulus`.`business_employees`.`users_id` AS `users_id` from (`skedulus`.`users` join `skedulus`.`business_employees` on((`skedulus`.`business_employees`.`users_id` = `skedulus`.`users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_classes_posted_business`
--
DROP TABLE IF EXISTS `view_classes_posted_business`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_classes_posted_business` AS select `skedulus`.`user_business_posted_class`.`user_business_classes_id` AS `user_business_classes_id`,`skedulus`.`user_business_posted_class`.`start_date` AS `start_date`,`skedulus`.`user_business_posted_class`.`end_date` AS `end_date`,`skedulus`.`user_business_posted_class`.`lastdate_enroll` AS `lastdate_enroll`,`skedulus`.`user_business_posted_class`.`start_time` AS `start_time`,`skedulus`.`user_business_posted_class`.`end_time` AS `end_time`,`skedulus`.`user_business_posted_class`.`instructor` AS `instructor`,`skedulus`.`user_business_posted_class`.`repeat_type` AS `repeat_type`,`skedulus`.`user_business_posted_class`.`repeat_all_day` AS `repeat_all_day`,`skedulus`.`user_business_posted_class`.`repeat_week_days` AS `repeat_week_days`,`skedulus`.`user_business_posted_class`.`repeat_months` AS `repeat_months`,`skedulus`.`user_business_classes`.`user_business_details_id` AS `user_business_details_id`,`skedulus`.`user_business_posted_class`.`id` AS `id`,`skedulus`.`user_business_classes`.`name` AS `name` from (`skedulus`.`user_business_posted_class` join `skedulus`.`user_business_classes` on((`skedulus`.`user_business_posted_class`.`user_business_classes_id` = `skedulus`.`user_business_classes`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_client_buisness_services_appointments`
--
DROP TABLE IF EXISTS `view_client_buisness_services_appointments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_client_buisness_services_appointments` AS select `skedulus`.`user_business_details`.`category_id` AS `category_id`,`skedulus`.`user_business_details`.`name` AS `name`,`skedulus`.`user_business_details`.`image` AS `image`,`skedulus`.`user_business_details`.`description` AS `description`,`skedulus`.`user_business_services`.`id` AS `service_id`,`skedulus`.`user_business_services`.`user_business_details_id` AS `user_business_details_id`,`skedulus`.`user_business_services`.`name` AS `service_name`,`skedulus`.`user_business_services`.`price_type` AS `price_type`,`skedulus`.`user_business_services`.`price` AS `price`,`skedulus`.`user_business_services`.`timelength` AS `timelength`,`skedulus`.`user_business_services`.`time_type` AS `time_type`,`skedulus`.`user_business_services`.`padding_time` AS `padding_time`,`skedulus`.`user_business_services`.`padding_time_type` AS `padding_time_type`,`skedulus`.`user_business_services`.`details` AS `details`,`skedulus`.`client_service_appointments`.`start_time` AS `start_time`,`skedulus`.`client_service_appointments`.`end_time` AS `end_time`,`skedulus`.`client_service_appointments`.`services_id` AS `services_id`,`skedulus`.`client_service_appointments`.`employee_id` AS `employee_id`,`skedulus`.`client_service_appointments`.`status` AS `status`,`skedulus`.`client_service_appointments`.`users_id` AS `users_id`,`skedulus`.`client_service_appointments`.`note` AS `note`,`skedulus`.`client_service_appointments`.`id` AS `id`,`skedulus`.`users`.`user_role` AS `user_role` from (((`skedulus`.`user_business_details` join `skedulus`.`user_business_services` on((`skedulus`.`user_business_details`.`id` = `skedulus`.`user_business_services`.`user_business_details_id`))) join `skedulus`.`client_service_appointments` on((`skedulus`.`user_business_services`.`id` = `skedulus`.`client_service_appointments`.`services_id`))) join `skedulus`.`users` on((`skedulus`.`client_service_appointments`.`users_id` = `skedulus`.`users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_employee_services`
--
DROP TABLE IF EXISTS `view_employee_services`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_employee_services` AS select `skedulus`.`employee_services`.`service_id` AS `service_id`,`skedulus`.`user_business_services`.`name` AS `name`,`skedulus`.`users`.`first_name` AS `first_name`,`skedulus`.`users`.`last_name` AS `last_name`,`skedulus`.`employee_services`.`users_id` AS `users_id`,`skedulus`.`employee_services`.`business_id` AS `business_id` from ((`skedulus`.`employee_services` join `skedulus`.`user_business_services` on((`skedulus`.`employee_services`.`service_id` = `skedulus`.`user_business_services`.`id`))) join `skedulus`.`users` on((`skedulus`.`employee_services`.`users_id` = `skedulus`.`users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_service_availablity`
--
DROP TABLE IF EXISTS `view_service_availablity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skedulus`.`view_service_availablity` AS select `skedulus`.`user_business_availability`.`id` AS `id`,`skedulus`.`user_business_availability`.`user_business_details_id` AS `user_business_details_id`,`skedulus`.`user_business_availability`.`users_id` AS `users_id`,`skedulus`.`user_business_availability`.`type` AS `type`,`skedulus`.`user_business_availability`.`weekid` AS `weekid`,`skedulus`.`user_business_availability`.`start_time` AS `start_time`,`skedulus`.`user_business_availability`.`end_time` AS `end_time`,`skedulus`.`user_business_availability`.`lunch_start_time` AS `lunch_start_time`,`skedulus`.`user_business_availability`.`lunch_end_time` AS `lunch_end_time`,`skedulus`.`weekdays`.`name` AS `name` from (`skedulus`.`weekdays` join `skedulus`.`user_business_availability` on((`skedulus`.`user_business_availability`.`weekid` = `skedulus`.`weekdays`.`id`)));
