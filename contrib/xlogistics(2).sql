-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2013 at 03:14 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xlogistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_package_mapping`
--

CREATE TABLE IF NOT EXISTS `accomodation_package_mapping` (
  `accomodation_type_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  PRIMARY KEY (`accomodation_type_id`,`package_id`),
  KEY `fk_accomodation_type_details_has_package_master_package_mas_idx` (`package_id`),
  KEY `fk_accomodation_type_details_has_package_master_accomodatio_idx` (`accomodation_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accomodation_type_details`
--

CREATE TABLE IF NOT EXISTS `accomodation_type_details` (
  `accomodation_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hotel_id` bigint(20) NOT NULL,
  `lodging_id` bigint(20) NOT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`accomodation_type_id`),
  KEY `fk_accomodation_type_details_hotel_master1_idx` (`hotel_id`),
  KEY `fk_accomodation_type_details_lodging_details1_idx` (`lodging_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accomodation_type_details`
--

INSERT INTO `accomodation_type_details` (`accomodation_type_id`, `hotel_id`, `lodging_id`, `rate`) VALUES
(1, 2, 2, 1200.00),
(2, 3, 1, 1000.00),
(3, 4, 1, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bookingdate` datetime NOT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_booking_details_enquiry_details_master1_idx` (`enquiry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `bookingdate`, `enquiry_id`) VALUES
(78, '2013-08-30 15:50:45', 157),
(79, '2013-09-03 12:20:33', 159),
(80, '2013-09-03 14:10:35', 160),
(81, '2013-09-03 14:22:45', 161),
(82, '2013-09-03 15:11:17', 162),
(83, '2013-09-03 16:49:26', 163),
(85, '0000-00-00 00:00:00', 163),
(86, '0000-00-00 00:00:00', 161),
(87, '0000-00-00 00:00:00', 157),
(88, '0000-00-00 00:00:00', 161),
(89, '0000-00-00 00:00:00', 165),
(90, '0000-00-00 00:00:00', 166),
(91, '2013-09-04 12:34:47', 167),
(92, '2013-09-04 12:45:34', 168),
(93, '2013-09-04 13:04:43', 166),
(94, '2013-09-04 14:18:48', 169),
(95, '2013-09-04 14:26:39', 170),
(96, '2013-09-04 14:31:59', 171);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(64) NOT NULL,
  PRIMARY KEY (`country_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`) VALUES
(2, 'Bangladesh'),
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_accomodation_mapping`
--

CREATE TABLE IF NOT EXISTS `enquiry_accomodation_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `accomodation_type_id` bigint(20) NOT NULL,
  `checkindate` datetime DEFAULT NULL,
  `checkoutdate` datetime DEFAULT NULL,
  `noofadults` int(11) NOT NULL DEFAULT '0',
  `noofchildren` int(11) NOT NULL DEFAULT '0',
  `noofrooms` int(11) DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(11,2) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `commission` decimal(11,2) DEFAULT NULL,
  `roomtype` varchar(512) DEFAULT NULL,
  `servicetax` decimal(11,2) DEFAULT NULL,
  `vat` bigint(255) DEFAULT '0',
  PRIMARY KEY (`enquiry_id`,`accomodation_type_id`),
  KEY `fk_enquiry_details_master_has_hotel_master_enquiry_details__idx` (`enquiry_id`),
  KEY `fk_enquiry_hotel_mapping_accomodation_type_details1_idx` (`accomodation_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry_accomodation_mapping`
--

INSERT INTO `enquiry_accomodation_mapping` (`enquiry_id`, `accomodation_type_id`, `checkindate`, `checkoutdate`, `noofadults`, `noofchildren`, `noofrooms`, `amount`, `discount`, `comments`, `commission`, `roomtype`, `servicetax`, `vat`) VALUES
(124, 2, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 10, 10, 10, 1000.00, 5.00, '', 5.00, 'AC', 12.50, 0),
(126, 1, '2013-08-28 00:00:00', '2013-08-31 00:00:00', 2, 0, 1, 5000.00, 0.00, '', 5.00, 'AC', 10.00, 0),
(128, 1, '2013-08-29 00:00:00', '2013-08-30 00:00:00', 2, 0, 1, 2000.00, 10.00, '', 10.00, 'AC', 12.50, 0),
(166, 1, '2013-09-10 00:00:00', '2013-09-14 00:00:00', 7, 0, 3, 6000.00, NULL, '', NULL, 'AC', NULL, 0),
(171, 1, '2013-09-05 00:00:00', '2013-09-08 00:00:00', 2, 0, 1, 2000.00, NULL, '', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_comments_details`
--

CREATE TABLE IF NOT EXISTS `enquiry_comments_details` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` bigint(20) NOT NULL,
  `updatedate` datetime NOT NULL,
  `comment` longtext,
  PRIMARY KEY (`comment_id`),
  KEY `fk_enquiry_comments_enquiry_details1_idx` (`enquiry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `enquiry_comments_details`
--

INSERT INTO `enquiry_comments_details` (`comment_id`, `enquiry_id`, `updatedate`, `comment`) VALUES
(106, 124, '2013-08-27 14:50:37', 'New Enquiry done after edtails modify'),
(107, 125, '2013-08-27 19:39:22', 'Want to make a inquiry for Puri Trip  '),
(108, 126, '2013-08-27 19:44:36', 'asdadad'),
(110, 128, '2013-08-28 12:54:08', 'shdsdhsdh'),
(113, 131, '2013-08-29 11:45:35', 'Wants to book a Deluxe Suit at Goa.'),
(114, 132, '2013-08-29 13:18:14', 'add'),
(115, 133, '2013-08-29 13:59:05', 'WANTS TO BOOK A TRANSPORT FOR KOLKATA TO DIGHA'),
(116, 134, '2013-08-29 14:04:54', 'adadad'),
(117, 135, '2013-08-29 14:05:56', 'adadad'),
(118, 136, '2013-08-29 14:26:38', 'ABCD'),
(119, 137, '2013-08-29 14:33:32', 'asdadad'),
(120, 138, '2013-08-29 14:37:30', 'dadadad'),
(121, 139, '2013-08-29 14:38:57', 'aqwe'),
(122, 140, '2013-08-29 14:58:45', 'adadad'),
(123, 141, '2013-08-29 14:59:39', 'ASD'),
(124, 142, '2013-08-29 15:01:28', 'ADADADAD'),
(125, 143, '2013-08-29 15:09:59', 'ADADAD'),
(126, 144, '2013-08-29 15:11:52', 'ADADAD'),
(127, 145, '2013-08-29 15:57:53', 'ASDAD'),
(128, 146, '2013-08-29 16:03:47', 'WANTS A CAR FROM KOLKATA TO DIGHA'),
(129, 147, '2013-08-29 16:16:38', 'WANTS TO BOOK A CAR TO DIGHA'),
(130, 148, '2013-08-29 17:03:24', 'ADADAD'),
(131, 149, '2013-08-30 11:31:31', 'sadadad'),
(132, 150, '2013-08-30 12:02:17', 'WANTS TO BOOK A HOTEL'),
(133, 151, '2013-08-30 12:50:30', 'WANTS TO BOOK A CAR FOR DIGHA'),
(134, 152, '2013-08-30 14:31:12', 'hhdhdh'),
(135, 153, '2013-08-30 14:33:02', 'adadad'),
(136, 154, '2013-08-30 15:46:00', 'wants to book a car for digha.'),
(137, 155, '2013-08-30 15:46:39', 'wants to book a transport.'),
(138, 156, '2013-08-30 15:47:23', 'aer'),
(139, 157, '2013-08-30 15:48:15', 'asd'),
(140, 158, '2013-08-30 19:10:39', '123333'),
(141, 159, '2013-09-03 12:20:03', 'adad'),
(142, 160, '2013-09-03 14:10:07', 'sff'),
(143, 161, '2013-09-03 14:22:09', 'adadad'),
(144, 162, '2013-09-03 15:10:41', 'WANTS TO BOOA A TRANSPORT FOR PATNA'),
(145, 163, '2013-09-03 16:48:56', 'asd'),
(146, 164, '2013-09-03 16:55:56', 'lopm'),
(147, 165, '2013-09-03 18:46:16', 'WANTS TO BOOK A TRANSPORT'),
(148, 166, '2013-09-03 18:51:35', 'wants to book a hotel'),
(149, 167, '2013-09-04 12:34:08', 'ad'),
(150, 168, '2013-09-04 12:38:36', 'asd'),
(151, 169, '2013-09-04 14:18:19', 'asd'),
(152, 170, '2013-09-04 14:25:54', 'asde'),
(153, 171, '2013-09-04 14:31:21', 'hfhf');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_details`
--

CREATE TABLE IF NOT EXISTS `enquiry_details` (
  `enquiry_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `startingplace` varchar(128) DEFAULT NULL,
  `destination` varchar(128) DEFAULT NULL,
  `enquirydate` datetime DEFAULT NULL,
  `totaldiscount` decimal(11,2) DEFAULT NULL,
  `net_amount` decimal(11,2) DEFAULT NULL,
  `servicetax` decimal(11,2) DEFAULT NULL,
  `VAT` decimal(11,2) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_name` varchar(64) DEFAULT NULL,
  `state_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`enquiry_id`),
  KEY `fk_enquiry_details_user_master1_idx` (`user_id`),
  KEY `fk_enquiry_details_country_master1_idx` (`country_name`),
  KEY `fk_enquiry_details_state_master1_idx` (`state_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `enquiry_details`
--

INSERT INTO `enquiry_details` (`enquiry_id`, `startdate`, `enddate`, `startingplace`, `destination`, `enquirydate`, `totaldiscount`, `net_amount`, `servicetax`, `VAT`, `user_id`, `country_name`, `state_name`) VALUES
(124, '0000-00-00', '0000-00-00', '', '', '2013-08-27 14:50:37', 0.00, 0.00, 0.00, 0.00, 32, 'India', 'West Bangal'),
(125, NULL, NULL, NULL, NULL, '2013-08-27 19:39:22', NULL, NULL, NULL, NULL, 38, 'India', 'West Bangal'),
(126, '0000-00-00', '0000-00-00', '', '', '2013-08-27 19:44:36', 0.00, 0.00, 0.00, 0.00, 38, 'India', 'West Bangal'),
(128, '0000-00-00', '0000-00-00', '', '', '2013-08-28 12:54:08', 0.00, 0.00, 0.00, 0.00, 32, NULL, NULL),
(131, '0000-00-00', '0000-00-00', '', '', '2013-08-29 11:45:35', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(132, '0000-00-00', '0000-00-00', '', '', '2013-08-29 13:18:14', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(133, NULL, NULL, NULL, NULL, '2013-08-29 13:59:05', NULL, NULL, NULL, NULL, 42, 'India', 'West Bangal'),
(134, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:04:54', 0.00, 0.00, 0.00, 0.00, 42, NULL, NULL),
(135, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:05:56', 0.00, 0.00, 0.00, 0.00, 42, NULL, NULL),
(136, NULL, NULL, NULL, NULL, '2013-08-29 14:26:38', NULL, NULL, NULL, NULL, 43, 'India', 'West Bangal'),
(137, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:33:32', 0.00, 0.00, 0.00, 0.00, 43, NULL, NULL),
(138, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:37:30', 0.00, 0.00, 0.00, 0.00, 43, NULL, NULL),
(139, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:38:57', 0.00, 0.00, 0.00, 0.00, 43, NULL, NULL),
(140, '0000-00-00', '0000-00-00', '', '', '2013-08-29 14:58:45', 0.00, 0.00, 0.00, 0.00, 43, NULL, NULL),
(141, NULL, NULL, NULL, NULL, '2013-08-29 14:59:39', NULL, NULL, NULL, NULL, 43, 'India', 'West Bangal'),
(142, NULL, NULL, NULL, NULL, '2013-08-29 15:01:28', NULL, NULL, NULL, NULL, 45, 'India', 'West Bangal'),
(143, NULL, NULL, NULL, NULL, '2013-08-29 15:09:59', NULL, NULL, NULL, NULL, 46, 'India', 'West Bangal'),
(144, NULL, NULL, NULL, NULL, '2013-08-29 15:11:52', NULL, NULL, NULL, NULL, 47, 'India', 'West Bangal'),
(145, NULL, NULL, NULL, NULL, '2013-08-29 15:57:53', NULL, NULL, NULL, NULL, 48, 'India', 'West Bangal'),
(146, NULL, NULL, NULL, NULL, '2013-08-29 16:03:47', NULL, NULL, NULL, NULL, 49, 'India', 'West Bangal'),
(147, NULL, NULL, NULL, NULL, '2013-08-29 16:16:38', NULL, NULL, NULL, NULL, 50, 'India', 'West Bangal'),
(148, NULL, NULL, NULL, NULL, '2013-08-29 17:03:24', NULL, NULL, NULL, NULL, 51, 'India', 'West Bangal'),
(149, '0000-00-00', '0000-00-00', '', '', '2013-08-30 11:31:31', 0.00, 0.00, 0.00, 0.00, 51, NULL, NULL),
(150, NULL, NULL, NULL, NULL, '2013-08-30 12:02:17', NULL, NULL, NULL, NULL, 52, 'India', 'West Bangal'),
(151, NULL, NULL, NULL, NULL, '2013-08-30 12:50:30', NULL, NULL, NULL, NULL, 53, 'India', 'West Bangal'),
(152, '0000-00-00', '0000-00-00', '', '', '2013-08-30 14:31:12', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(153, '0000-00-00', '0000-00-00', '', '', '2013-08-30 14:33:02', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(154, '0000-00-00', '0000-00-00', '', '', '2013-08-30 15:46:00', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(155, '0000-00-00', '0000-00-00', '', '', '2013-08-30 15:46:39', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(156, '0000-00-00', '0000-00-00', '', '', '2013-08-30 15:47:23', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(157, '0000-00-00', '0000-00-00', '', '', '2013-08-30 15:48:15', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(158, '0000-00-00', '0000-00-00', '', '', '2013-08-30 19:10:39', 0.00, 0.00, 0.00, 0.00, 48, NULL, NULL),
(159, '0000-00-00', '0000-00-00', '', '', '2013-09-03 12:20:03', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(160, '0000-00-00', '0000-00-00', '', '', '2013-09-03 14:10:07', 0.00, 0.00, 0.00, 0.00, 48, NULL, NULL),
(161, '0000-00-00', '0000-00-00', '', '', '2013-09-03 14:22:09', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(162, NULL, NULL, NULL, NULL, '2013-09-03 15:10:41', NULL, NULL, NULL, NULL, 54, 'India', 'West Bangal'),
(163, '0000-00-00', '0000-00-00', '', '', '2013-09-03 16:48:56', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(164, '0000-00-00', '0000-00-00', '', '', '2013-09-03 16:55:56', 0.00, 0.00, 0.00, 0.00, 41, NULL, NULL),
(165, NULL, NULL, NULL, NULL, '2013-09-03 18:46:16', NULL, NULL, NULL, NULL, 55, 'India', 'West Bangal'),
(166, '0000-00-00', '0000-00-00', '', '', '2013-09-03 18:51:35', 0.00, 0.00, 0.00, 0.00, 55, NULL, NULL),
(167, '0000-00-00', '0000-00-00', '', '', '2013-09-04 12:34:08', 0.00, 0.00, 0.00, 0.00, 55, NULL, NULL),
(168, '0000-00-00', '0000-00-00', '', '', '2013-09-04 12:38:36', 0.00, 0.00, 0.00, 0.00, 55, NULL, NULL),
(169, '0000-00-00', '0000-00-00', '', '', '2013-09-04 14:18:19', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL),
(170, '0000-00-00', '0000-00-00', '', '', '2013-09-04 14:25:54', 0.00, 0.00, 0.00, 0.00, 48, NULL, NULL),
(171, '0000-00-00', '0000-00-00', '', '', '2013-09-04 14:31:21', 0.00, 0.00, 0.00, 0.00, 53, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_package_maping`
--

CREATE TABLE IF NOT EXISTS `enquiry_package_maping` (
  `enquiry_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `checkindate` datetime DEFAULT NULL,
  `checkoutdate` datetime DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(255) DEFAULT NULL,
  `commission` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`enquiry_id`,`package_id`),
  KEY `fk_enquiry_details_has_package_master_package_master1_idx` (`package_id`),
  KEY `fk_enquiry_details_has_package_master_enquiry_details1_idx` (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_service_mapping`
--

CREATE TABLE IF NOT EXISTS `enquiry_service_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `Service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`enquiry_id`,`Service_id`),
  KEY `fk_enquiry_details_master_has_Service_Master_Service_Master_idx` (`Service_id`),
  KEY `fk_enquiry_details_master_has_Service_Master_enquiry_detail_idx` (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_user_mapping`
--

CREATE TABLE IF NOT EXISTS `enquiry_user_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'user_id here is of a prtner or guest who makes the enquiry',
  PRIMARY KEY (`enquiry_id`,`user_id`),
  KEY `fk_enquiry_partner_mapping_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feature_master`
--

CREATE TABLE IF NOT EXISTS `feature_master` (
  `feature_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`feature_id`),
  KEY `fk_feature_master_service_master1_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feature_transport_mapping`
--

CREATE TABLE IF NOT EXISTS `feature_transport_mapping` (
  `feature_id` bigint(20) NOT NULL,
  `transport_id` bigint(20) NOT NULL,
  PRIMARY KEY (`feature_id`,`transport_id`),
  KEY `fk_feature_master_has_transport_details_transport_details1_idx` (`transport_id`),
  KEY `fk_feature_master_has_transport_details_feature_master1_idx` (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_details`
--

CREATE TABLE IF NOT EXISTS `feedback_details` (
  `feedback_id` bigint(20) NOT NULL,
  `feedbackdate` datetime DEFAULT NULL,
  `alternative_email` varchar(128) DEFAULT NULL,
  `comments` longtext,
  `booking_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`feedback_id`,`booking_id`),
  KEY `fk_Feedback_details_booking_details1_idx` (`booking_id`),
  KEY `fk_feedback_details_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_gift_master`
--

CREATE TABLE IF NOT EXISTS `guest_gift_master` (
  `gift_id` bigint(20) NOT NULL,
  `gifttype` varchar(128) NOT NULL,
  `gift_description` varchar(255) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `member_type_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`gift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_other_info`
--

CREATE TABLE IF NOT EXISTS `guest_other_info` (
  `user_id` bigint(20) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `secondaryphone` varchar(64) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `place` varchar(128) NOT NULL,
  `state_name` varchar(64) NOT NULL,
  `country_name` varchar(64) NOT NULL,
  `zip` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_guest_master_state_master1_idx` (`state_name`),
  KEY `fk_guest_master_country_master1_idx` (`country_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_feature_mapping`
--

CREATE TABLE IF NOT EXISTS `hotel_feature_mapping` (
  `hotel_master_hotel_id` bigint(20) NOT NULL,
  `feature_master_feature_id` bigint(20) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`hotel_master_hotel_id`,`feature_master_feature_id`),
  KEY `fk_hotel_master_has_feature_master_feature_master1_idx` (`feature_master_feature_id`),
  KEY `fk_hotel_master_has_feature_master_hotel_master1_idx` (`hotel_master_hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_group_master`
--

CREATE TABLE IF NOT EXISTS `hotel_group_master` (
  `hotel_group_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hotel_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE IF NOT EXISTS `hotel_master` (
  `hotel_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `place` varchar(128) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `alternativephonenumber` bigint(20) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `associationfrom` datetime DEFAULT NULL,
  `zip` varchar(45) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `hotel_grading` int(11) DEFAULT NULL,
  `hotel_group_id` bigint(20) DEFAULT NULL,
  `hotel_type_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_hotel_master_location_master1_idx` (`location_id`),
  KEY `fk_hotel_master_hotel_group_master1_idx` (`hotel_group_id`),
  KEY `fk_hotel_master_hotel_type_master1_idx` (`hotel_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`hotel_id`, `name`, `address1`, `address2`, `place`, `phonenumber`, `alternativephonenumber`, `updatedon`, `associationfrom`, `zip`, `description`, `location_id`, `hotel_grading`, `hotel_group_id`, `hotel_type_id`, `status`) VALUES
(2, 'Digha Hotel', 'Digha Amarabati park', NULL, 'Digha', 8820456327, NULL, NULL, NULL, '712311', NULL, 1, NULL, NULL, 1, 1),
(3, 'Puri Resot', 'Puri near mandir', NULL, 'Puri', 8583890253, NULL, NULL, NULL, '7123665', NULL, 2, NULL, NULL, 2, 1),
(4, 'Hotel in puri', 'Puri', NULL, 'Puri', 885265986, NULL, NULL, NULL, '712365', NULL, 2, NULL, NULL, 1, 1),
(5, 'Sea Site View', 'Goa', NULL, 'Goa', 874521365, 65214789, NULL, NULL, '12457896', NULL, 4, NULL, NULL, 1, 1),
(6, 'Glider', 'Minamar Beach', NULL, 'Goa', 987456321, NULL, NULL, NULL, '563214', NULL, 5, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_type_master`
--

CREATE TABLE IF NOT EXISTS `hotel_type_master` (
  `hotel_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `typename` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hotel_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotel_type_master`
--

INSERT INTO `hotel_type_master` (`hotel_type_id`, `typename`, `description`) VALUES
(1, 'hotel', 'Its hotel'),
(2, 'resort', 'Its resort');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_user_mapping`
--

CREATE TABLE IF NOT EXISTS `hotel_user_mapping` (
  `hotel_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `preference_rating` int(11) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_hotel_master_has_partner_master_hotel_master1_idx` (`hotel_id`),
  KEY `fk_hotel_partner_mapping_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_master`
--

CREATE TABLE IF NOT EXISTS `location_master` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `place` varchar(128) NOT NULL,
  `genre` varchar(128) DEFAULT NULL,
  `state_name` varchar(64) DEFAULT NULL,
  `country_name` varchar(64) NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `fk_location_master_state_master1_idx` (`state_name`),
  KEY `fk_location_master_country_master1_idx` (`country_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `location_master`
--

INSERT INTO `location_master` (`location_id`, `name`, `place`, `genre`, `state_name`, `country_name`) VALUES
(1, 'Digha Sea Side', 'Digha', NULL, 'West Bangal', 'India'),
(2, 'Puri Sea Side', 'Puri', NULL, 'Bihar', 'India'),
(3, 'Pune', 'Pune', NULL, 'Mumbai', 'India'),
(4, 'Panjim', 'Panjim', NULL, 'Goa', 'India'),
(5, 'Minamar Beach', 'Minamar Beach', NULL, 'Goa', 'India'),
(6, 'Chandigarh', 'Chandigarh', NULL, 'Punjab', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `lodging_details`
--

CREATE TABLE IF NOT EXISTS `lodging_details` (
  `lodging_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bedtype` varchar(128) DEFAULT NULL,
  `roomtype` varchar(128) DEFAULT NULL,
  `foodtype` varchar(128) DEFAULT NULL,
  `maxadult` int(11) NOT NULL DEFAULT '0',
  `maxchild` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lodging_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lodging_details`
--

INSERT INTO `lodging_details` (`lodging_id`, `bedtype`, `roomtype`, `foodtype`, `maxadult`, `maxchild`, `description`) VALUES
(1, 'double', 'AC', 'lunch dinner', 2, 2, 'Normal'),
(2, 'Dormetory', 'Non AC', 'breakfast lunch dinner', 8, 0, 'Group');

-- --------------------------------------------------------

--
-- Table structure for table `mgmt_news_feed_details`
--

CREATE TABLE IF NOT EXISTS `mgmt_news_feed_details` (
  `message_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `topic` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `publishdate` datetime DEFAULT NULL,
  `closingdate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_mgmt_news_feed_details_user_master1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mgmt_news_feed_details`
--

INSERT INTO `mgmt_news_feed_details` (`message_id`, `topic`, `description`, `publishdate`, `closingdate`, `status`, `user_id`) VALUES
(1, 'Kedarnath trip booking', 'Kedarnath trip booking is cancelled due to flood condition', '2013-08-27 00:00:00', '2014-01-22 00:00:00', 1, 2),
(2, 'Sikkim Booking Cancelation', 'Sikkim Booking Cancelation due to Strike on Pahar', '2013-08-28 00:00:00', NULL, 1, 2),
(3, 'Darjeeling Booking Cancelation', 'All Darjeeling booking are cancelled due to Bandh at Pahar', '2013-08-28 00:00:00', NULL, 1, 2),
(4, '20% off Bankok', '20% off at every trip at Bankok', '2013-08-28 00:00:00', NULL, 1, 2),
(5, '30% Off', '30% off at every trip to Singapore', '2013-08-28 00:00:00', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `package_master`
--

CREATE TABLE IF NOT EXISTS `package_master` (
  `package_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'user_id is partners id',
  `package_code` varchar(45) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `maxadult` int(11) NOT NULL DEFAULT '0',
  `maxchild` int(11) NOT NULL DEFAULT '0',
  `noofdays` int(11) DEFAULT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  `area_covered` longtext,
  `state_name` varchar(64) DEFAULT NULL,
  `country_name` varchar(64) NOT NULL,
  PRIMARY KEY (`package_id`),
  UNIQUE KEY `package_code_UNIQUE` (`package_code`),
  KEY `fk_package_master_user_master1_idx` (`user_id`),
  KEY `fk_package_master_state_master1_idx` (`state_name`),
  KEY `fk_package_master_country_master1_idx` (`country_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner_other_info`
--

CREATE TABLE IF NOT EXISTS `partner_other_info` (
  `user_id` bigint(20) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `addressline1` varchar(128) DEFAULT NULL,
  `addressline2` varchar(128) DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `zip` bigint(20) DEFAULT NULL,
  `country_name` varchar(64) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `state_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_partner_other_info_country_master1_idx` (`country_name`),
  KEY `fk_partner_other_info_state_master1_idx` (`state_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payee_type_details`
--

CREATE TABLE IF NOT EXISTS `payee_type_details` (
  `type_id` varchar(1) NOT NULL,
  `payeetype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_channels`
--

CREATE TABLE IF NOT EXISTS `payment_channels` (
  `channel_id` bigint(20) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) NOT NULL,
  `paidamount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `populationdate` datetime NOT NULL,
  `commisionamount` decimal(11,2) DEFAULT NULL,
  `payee` varchar(64) DEFAULT NULL,
  `totalamount` varchar(200) DEFAULT NULL,
  `paymentmode` varchar(100) DEFAULT NULL,
  `recieptno` varchar(100) DEFAULT NULL,
  `servicecharge` decimal(11,2) NOT NULL DEFAULT '0.00',
  `servicetax` decimal(11,2) NOT NULL DEFAULT '0.00',
  `grosstotal` decimal(11,2) NOT NULL DEFAULT '0.00',
  `due` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_details_booking_details1_idx` (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `booking_id`, `paidamount`, `populationdate`, `commisionamount`, `payee`, `totalamount`, `paymentmode`, `recieptno`, `servicecharge`, `servicetax`, `grosstotal`, `due`) VALUES
(52, 78, 3000.00, '2013-08-30 19:27:01', 10.00, NULL, '8000.00', NULL, NULL, 5.00, 17.50, 9800.00, 6800.00),
(53, 79, 2000.00, '2013-09-03 12:21:25', 10.00, NULL, '3000.00', NULL, NULL, 5.00, 17.50, 3675.00, 1675.00),
(56, 80, 5000.00, '2013-09-03 14:11:10', 10.00, NULL, '6000.00', NULL, NULL, 10.00, 17.60, 7656.00, 2656.00),
(57, 81, 10000.00, '2013-09-03 14:23:35', 15.00, NULL, '17500.00', NULL, NULL, 12.20, 17.50, 22697.50, 12697.50),
(58, 82, 0.00, '2013-09-03 15:11:45', 5.00, NULL, '2000.00', NULL, NULL, 15.25, 12.50, 2555.00, 2555.00),
(59, 85, 2000.00, '2013-09-03 17:37:03', 5.00, NULL, '3000.00', NULL, NULL, 12.00, 12.50, 3735.00, 1735.00),
(60, 86, 10000.00, '2013-09-03 17:39:15', 10.00, NULL, '15000.00', NULL, NULL, 5.00, 12.50, 17625.00, 7625.00),
(61, 89, 2000.00, '2013-09-03 18:47:47', 5.00, NULL, '3000.00', NULL, NULL, 8.20, 17.50, 3771.00, 1771.00),
(62, 91, 2000.00, '2013-09-04 12:35:31', 10.00, NULL, '4500.00', NULL, NULL, 6.70, 12.50, 5364.00, 3364.00),
(63, 92, 1800.00, '2013-09-04 12:46:41', 6.00, NULL, '3200.00', NULL, NULL, 5.80, 11.60, 3756.80, 1956.80),
(66, 93, 5000.00, '2013-09-04 13:47:19', 10.00, NULL, '14400.00', NULL, NULL, 7.60, 12.50, 17294.40, 12294.40),
(67, 94, 2300.00, '2013-09-04 14:19:28', 10.00, NULL, '4600.00', NULL, NULL, 6.20, 12.70, 5469.40, 3169.40),
(68, 95, 2000.00, '2013-09-04 14:27:53', 5.00, NULL, '4500.00', NULL, NULL, 5.70, 12.50, 5319.00, 3319.00);

-- --------------------------------------------------------

--
-- Table structure for table `quick_notes`
--

CREATE TABLE IF NOT EXISTS `quick_notes` (
  `notes_id` int(9) NOT NULL AUTO_INCREMENT,
  `notedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datefornotes` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`notes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quick_notes`
--

INSERT INTO `quick_notes` (`notes_id`, `notedate`, `datefornotes`, `description`) VALUES
(1, '2013-08-28 10:55:27', '2013-09-21 00:00:00', 'Have to book a cab.');

-- --------------------------------------------------------

--
-- Table structure for table `service_feedback_mapping`
--

CREATE TABLE IF NOT EXISTS `service_feedback_mapping` (
  `service_id` bigint(20) NOT NULL,
  `feedback_id` bigint(20) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `favourite` tinyint(1) NOT NULL DEFAULT '0',
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_id`,`feedback_id`),
  KEY `fk_Service_Master_has_Feedback_details_Feedback_details1_idx` (`feedback_id`),
  KEY `fk_Service_Master_has_Feedback_details_Service_Master1_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE IF NOT EXISTS `service_master` (
  `service_id` bigint(20) NOT NULL,
  `service_type` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `Service_type_UNIQUE` (`service_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `country_id` int(11) NOT NULL,
  `state_name` varchar(64) NOT NULL,
  PRIMARY KEY (`state_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`country_id`, `state_name`) VALUES
(1, 'Andra Pradesh'),
(1, 'Arunachal Pradesh'),
(1, 'Bihar'),
(1, 'Goa'),
(1, 'Hariyana'),
(1, 'Karnataka'),
(1, 'Kerala'),
(1, 'Madhya Pradesh'),
(1, 'Mumbai'),
(1, 'Orrisa'),
(1, 'Punjab'),
(1, 'Tamilnadu'),
(1, 'Uttar Pradesh'),
(1, 'West Bangal');

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

CREATE TABLE IF NOT EXISTS `status_master` (
  `status_type` int(11) NOT NULL AUTO_INCREMENT,
  `statusname` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`status_type`, `statusname`, `description`) VALUES
(1, 'Active', 'Active'),
(2, 'Inactive', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `transaction_id` bigint(20) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `description` varchar(64) DEFAULT NULL,
  `channel_id` bigint(20) NOT NULL,
  `payment_client_partner_id` bigint(20) DEFAULT NULL,
  `session_id` varchar(64) NOT NULL,
  `type_id` varchar(1) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `fk_transaction_details_payment_channels1_idx` (`channel_id`),
  KEY `fk_transaction_details_user_sessions1_idx` (`session_id`),
  KEY `fk_transaction_details_payee_type_details1_idx` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

CREATE TABLE IF NOT EXISTS `transaction_master` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_amount` decimal(11,2) NOT NULL,
  `advance_amount` decimal(11,2) NOT NULL,
  `remaining_amount` decimal(11,2) NOT NULL,
  `date` datetime NOT NULL,
  `commission_amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `payment_mode` varchar(50) DEFAULT NULL,
  `payment_id` bigint(20) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `fk` (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`transaction_id`, `total_amount`, `advance_amount`, `remaining_amount`, `date`, `commission_amount`, `payment_mode`, `payment_id`) VALUES
(7, 9800.00, 3000.00, 6800.00, '2013-08-30 19:27:01', 300.00, NULL, 52),
(8, 3675.00, 2000.00, 1675.00, '2013-09-03 12:21:25', 200.00, NULL, 53),
(13, 1675.00, 1000.00, 675.00, '2013-09-03 13:14:01', 100.00, NULL, 53),
(14, 7656.00, 5000.00, 2656.00, '2013-09-03 14:11:10', 500.00, NULL, 56),
(15, 2656.00, 2000.00, 656.00, '2013-09-03 14:13:42', 200.00, NULL, 56),
(16, 656.00, 656.00, 0.00, '2013-09-03 14:21:11', 65.60, NULL, 56),
(17, 22697.50, 10000.00, 12697.50, '2013-09-03 14:23:35', 1500.00, NULL, 57),
(18, 12697.50, 5000.00, 7697.50, '2013-09-03 14:24:23', 750.00, NULL, 57),
(20, 2555.00, 2000.00, 555.00, '2013-09-03 15:13:25', 100.00, NULL, 58),
(21, 555.00, 555.00, 0.00, '2013-09-03 15:14:06', 27.75, NULL, 58),
(22, 3735.00, 2000.00, 1735.00, '2013-09-03 17:37:03', 100.00, NULL, 59),
(23, 1735.00, 1000.00, 0.00, '2013-09-03 17:37:26', 50.00, NULL, 59),
(24, 17625.00, 10000.00, 7625.00, '2013-09-03 17:39:15', 1000.00, NULL, 60),
(25, 7625.00, 7000.00, 625.00, '2013-09-03 17:39:34', 700.00, NULL, 60),
(26, 625.00, 625.00, 0.00, '2013-09-03 17:40:17', 62.50, NULL, 60),
(27, 3771.00, 2000.00, 1771.00, '2013-09-03 18:47:47', 100.00, NULL, 61),
(28, 5364.00, 2000.00, 3364.00, '2013-09-04 12:35:31', 200.00, NULL, 62),
(29, 3364.00, 2622.00, 742.00, '2013-09-04 12:36:43', 262.20, NULL, 62),
(30, 3756.80, 1800.00, 1956.80, '2013-09-04 12:46:41', 108.00, NULL, 63),
(31, 1956.80, 1500.80, 456.00, '2013-09-04 12:47:19', 90.05, NULL, 63),
(34, 17294.40, 5000.00, 12294.40, '2013-09-04 13:47:19', 500.00, NULL, 66),
(35, 5469.40, 2300.00, 3169.40, '2013-09-04 14:19:28', 230.00, NULL, 67),
(36, 3169.40, 2100.00, 1069.40, '2013-09-04 14:20:47', 210.00, NULL, 67),
(37, 1069.40, 1069.00, 0.40, '2013-09-04 14:21:12', 106.90, NULL, 67),
(38, 5319.00, 2000.00, 3319.00, '2013-09-04 14:27:53', 100.00, NULL, 68),
(39, 3319.00, 3000.00, 319.00, '2013-09-04 14:28:41', 150.00, NULL, 68);

-- --------------------------------------------------------

--
-- Table structure for table `transport_availed_details`
--

CREATE TABLE IF NOT EXISTS `transport_availed_details` (
  `drivername` varchar(64) DEFAULT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `droptime` datetime DEFAULT NULL,
  `transport_id` bigint(20) NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transport_details`
--

CREATE TABLE IF NOT EXISTS `transport_details` (
  `transport_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(45) DEFAULT NULL,
  `vehicletype` varchar(45) DEFAULT NULL,
  `noofadults` int(11) NOT NULL DEFAULT '0',
  `airconditioning` tinyint(1) DEFAULT '0',
  `pickuptime` datetime DEFAULT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL COMMENT 'user_id here is that of the partner whos transport it is',
  `startingplace` varchar(128) DEFAULT NULL,
  `destination` varchar(128) DEFAULT NULL,
  `estimateddistance` decimal(11,2) DEFAULT NULL,
  `noofchildren` int(11) NOT NULL DEFAULT '0',
  `rate` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(11,2) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `commission` decimal(11,2) DEFAULT NULL,
  `transport_mode_id` bigint(20) DEFAULT NULL,
  `estimatedtime` datetime DEFAULT NULL,
  `servicetax` decimal(11,2) DEFAULT NULL,
  `vat` int(11) NOT NULL,
  PRIMARY KEY (`transport_id`),
  KEY `fk_transport_details_enquiry_details1_idx` (`enquiry_id`),
  KEY `fk_transport_details_user_master1_idx` (`user_id`),
  KEY `fk_transport_details_transport_mode_master1_idx` (`transport_mode_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `transport_details`
--

INSERT INTO `transport_details` (`transport_id`, `vehicle_no`, `vehicletype`, `noofadults`, `airconditioning`, `pickuptime`, `enquiry_id`, `user_id`, `startingplace`, `destination`, `estimateddistance`, `noofchildren`, `rate`, `discount`, `comments`, `commission`, `transport_mode_id`, `estimatedtime`, `servicetax`, `vat`) VALUES
(51, NULL, 'AC', 5, 0, '2013-08-31 00:00:00', 157, NULL, 'KOLKATA', 'DARJEELING', NULL, 0, 10000.00, NULL, '', NULL, NULL, '2013-09-04 00:00:00', NULL, 0),
(52, NULL, 'AC', 2, 0, '2013-09-04 00:00:00', 159, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-05 00:00:00', NULL, 0),
(53, NULL, 'AC', 7, 0, '2013-09-03 00:00:00', 160, NULL, 'KOLKATA', 'DARJEELING', NULL, 0, 5000.00, NULL, '', NULL, NULL, '2013-09-04 00:00:00', NULL, 0),
(54, NULL, 'AC', 7, 0, '2013-09-04 00:00:00', 161, NULL, 'KOLKATA', 'LADAKH', NULL, 0, 20000.00, NULL, '', NULL, NULL, '2013-09-09 00:00:00', NULL, 0),
(55, NULL, 'AC', 2, 0, '2013-09-04 00:00:00', 162, NULL, 'KOLKATA', 'PATNA', NULL, 0, 5000.00, NULL, '', NULL, NULL, '2013-09-06 00:00:00', NULL, 0),
(56, NULL, 'AC', 1, 0, '2013-09-04 00:00:00', 163, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-05 00:00:00', NULL, 0),
(57, NULL, 'AC', 7, 0, '2013-09-11 00:00:00', 165, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-14 00:00:00', NULL, 0),
(58, NULL, 'AC', 6, 0, '2013-09-05 00:00:00', 167, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-08 00:00:00', NULL, 0),
(59, NULL, 'NON-AC', 5, 0, '2013-09-08 00:00:00', 168, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 5000.00, NULL, '', NULL, NULL, '2013-09-12 00:00:00', NULL, 0),
(60, NULL, 'AC', 5, 0, '2013-09-05 00:00:00', 169, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-10 00:00:00', NULL, 0),
(61, NULL, 'AC', 7, 0, '2013-09-05 00:00:00', 170, NULL, 'KOLKATA', 'DIGHA', NULL, 0, 3000.00, NULL, '', NULL, NULL, '2013-09-10 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transport_mode_master`
--

CREATE TABLE IF NOT EXISTS `transport_mode_master` (
  `transport_mode_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `modetype` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`transport_mode_id`),
  UNIQUE KEY `modetype_UNIQUE` (`modetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transport_mode_master`
--

INSERT INTO `transport_mode_master` (`transport_mode_id`, `modetype`, `description`) VALUES
(1, 'Air', 'Aeroplane'),
(2, 'Train', 'Train');

-- --------------------------------------------------------

--
-- Table structure for table `transport_package_mapping`
--

CREATE TABLE IF NOT EXISTS `transport_package_mapping` (
  `transport_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  PRIMARY KEY (`transport_id`,`package_id`),
  KEY `fk_transport_details_has_package_master_package_master1_idx` (`package_id`),
  KEY `fk_transport_details_has_package_master_transport_details1_idx` (`transport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traveller_details`
--

CREATE TABLE IF NOT EXISTS `traveller_details` (
  `traveller_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `relation` varchar(45) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`traveller_id`),
  KEY `fk_traveller_details_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_asso_document_details`
--

CREATE TABLE IF NOT EXISTS `user_asso_document_details` (
  `document_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `document_type` varchar(128) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `fk_partner_asso_document_details_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_duebooking_payments`
--

CREATE TABLE IF NOT EXISTS `user_duebooking_payments` (
  `due_payment_id` bigint(20) NOT NULL,
  `providedserviceid` bigint(20) DEFAULT NULL COMMENT 'will be ids from accomodation_details,transport_details and package_details',
  `booking_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `amountdue` decimal(11,2) NOT NULL,
  `calulateddate` datetime DEFAULT NULL,
  PRIMARY KEY (`due_payment_id`),
  KEY `fk_partner_due_payments_booking_details1_idx` (`booking_id`),
  KEY `fk_partner_due_payments_service_master1_idx` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_enquiry_payments`
--

CREATE TABLE IF NOT EXISTS `user_enquiry_payments` (
  `enquiry_payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `providedserviceid` bigint(20) DEFAULT NULL COMMENT 'will be ids from accomodation_details,transport_details and package_details',
  `service_id` bigint(20) NOT NULL,
  `amountdue` decimal(11,2) NOT NULL,
  `calulateddate` datetime DEFAULT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  PRIMARY KEY (`enquiry_payment_id`),
  KEY `fk_partner_due_payments_service_master1_idx` (`service_id`),
  KEY `fk_partner_enquiry_payments_enquiry_details1_idx` (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_failed_logins`
--

CREATE TABLE IF NOT EXISTS `user_failed_logins` (
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remote_host` varchar(16) DEFAULT NULL,
  `subject` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_followup_enquiry_master`
--

CREATE TABLE IF NOT EXISTS `user_followup_enquiry_master` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `followupon` datetime DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_followup_enquiry_master_enquiry_details1_idx` (`enquiry_id`),
  KEY `fk_user_followup_enquiry_master_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_gift_avail_details`
--

CREATE TABLE IF NOT EXISTS `user_gift_avail_details` (
  `gift_avail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) DEFAULT NULL,
  `used_date` datetime NOT NULL,
  `gifttype` varchar(128) DEFAULT NULL,
  `giftdescription` varchar(255) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gift_avail_id`),
  KEY `fk_guest_gift_avail_details_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_map`
--

CREATE TABLE IF NOT EXISTS `user_group_map` (
  `USER_ID` bigint(20) NOT NULL,
  `GROUP_ID` int(11) NOT NULL,
  UNIQUE KEY `USER_ID` (`USER_ID`,`GROUP_ID`),
  UNIQUE KEY `USER_ID_2` (`USER_ID`,`GROUP_ID`),
  KEY `GROUP_ID` (`GROUP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_group_master`
--

CREATE TABLE IF NOT EXISTS `user_group_master` (
  `GROUP_ID` int(11) NOT NULL,
  `GROUP_NAME` varchar(64) NOT NULL,
  `GROUP_DESC` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`GROUP_ID`),
  UNIQUE KEY `GROUP_NAME` (`GROUP_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `login_expiry_date` datetime DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `user_typeid` bigint(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `member_type_id` bigint(20) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `mobile_UNIQUE` (`mobile`),
  KEY `fk_user_master_user_types1_idx` (`user_typeid`),
  KEY `fk_user_master_guest_membership_type_master1_idx` (`member_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `username`, `firstname`, `lastname`, `status`, `login_expiry_date`, `email`, `mobile`, `creation_date`, `user_typeid`, `gender`, `member_type_id`, `updatedon`) VALUES
(2, 'admin', 'Soumyajit', 'Mandal', 1, '2016-10-26 00:00:00', 'smondal@bluecoppertech.com', 9477411305, '2013-08-12 00:00:00', 1, 'MALE', 1, '2013-08-12 00:00:00'),
(3, 'user', 'Abhirup', 'Ghosh', 1, '2016-02-25 00:00:00', 'aghosh@bluecoppertech.com', 94774112365, '2013-08-12 00:00:00', 2, 'Male', 2, '2013-08-12 00:00:00'),
(32, 'Abhijit2013-08-22 19:53:22', 'Abhijit', 'Chowdhury', 1, NULL, 'softlove9891@gmail.com', 8583890253, '2013-08-22 19:53:22', 4, NULL, NULL, NULL),
(38, 'Shyamal 2013-08-27 19:39:22', 'Shyamal ', 'Mandal', 1, NULL, 'srmshyamal@gmail.com', 9903440695, '2013-08-27 19:39:22', 4, NULL, NULL, NULL),
(41, 'Abinash2013-08-28 18:00:05', 'Abinash', 'Gupta', 1, NULL, 'abinashgupta@yahoo.com', 9830124578, '2013-08-28 18:00:05', 4, NULL, NULL, NULL),
(42, 'ANIMESH2013-08-29 13:59:05', 'ANIMESH', 'RAY', 1, NULL, 'animeshray@yahoo.com', 9831000123, '2013-08-29 13:59:05', 4, NULL, NULL, NULL),
(43, 'RUBY2013-08-29 14:26:38', 'RUBY', 'RAY', 1, NULL, '', 9903121212, '2013-08-29 14:26:38', 4, NULL, NULL, NULL),
(45, 'AKASH2013-08-29 15:01:28', 'AKASH', 'GUPTA', 1, NULL, '', 9903787878, '2013-08-29 15:01:28', 4, NULL, NULL, NULL),
(46, 'ASD2013-08-29 15:09:59', 'ASD', 'AD', 1, NULL, '', 9477124578, '2013-08-29 15:09:59', 4, NULL, NULL, NULL),
(47, 'ADADAD2013-08-29 15:11:52', 'ADADAD', 'ADADAD', 1, NULL, '', 9433124578, '2013-08-29 15:11:52', 4, NULL, NULL, NULL),
(48, 'PARIJAT2013-08-29 15:57:53', 'PARIJAT', 'BOSE', 1, NULL, '', 9830789654, '2013-08-29 15:57:53', 4, NULL, NULL, NULL),
(49, 'ARUNIMA2013-08-29 16:03:47', 'ARUNIMA', 'SAMADDAR', 1, NULL, '', 9903555555, '2013-08-29 16:03:47', 4, NULL, NULL, NULL),
(50, 'RAKTIM2013-08-29 16:16:38', 'RAKTIM', 'MAJUMDER', 1, NULL, '', 9903235689, '2013-08-29 16:16:38', 4, NULL, NULL, NULL),
(51, 'ADADAD2013-08-29 17:03:24', 'ADADAD', 'ADADAD', 1, NULL, '', 9478512364, '2013-08-29 17:03:24', 4, NULL, NULL, NULL),
(52, 'ANIRUDDHA2013-08-30 12:02:17', 'ANIRUDDHA', 'SARKAR', 1, NULL, '', 8521121212, '2013-08-30 12:02:17', 4, NULL, NULL, NULL),
(53, 'SOUMYA2013-08-30 12:50:30', 'SOUMYA', 'CHATTERJEE', 1, NULL, '', 9830000001, '2013-08-30 12:50:30', 4, NULL, NULL, NULL),
(54, 'SUKUMAR2013-09-03 15:10:41', 'SUKUMAR', 'GHOSH', 1, NULL, 'sukumar@gmail.com', 9256454545, '2013-09-03 15:10:41', 4, NULL, NULL, NULL),
(55, 'SANJIVANI2013-09-03 18:46:16', 'SANJIVANI', 'MAITRA', 1, NULL, '', 9477411333, '2013-09-03 18:46:16', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_master_history`
--

CREATE TABLE IF NOT EXISTS `user_master_history` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `login_expiry_date` datetime DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `user_typeid` bigint(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `member_type_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_user_master_user_types1_idx` (`user_typeid`),
  KEY `fk_user_master_guest_membership_type_master1_idx` (`member_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_membership_type_master`
--

CREATE TABLE IF NOT EXISTS `user_membership_type_master` (
  `member_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `membershipname` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `memberminreward` int(11) DEFAULT NULL,
  PRIMARY KEY (`member_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_membership_type_master`
--

INSERT INTO `user_membership_type_master` (`member_type_id`, `membershipname`, `description`, `memberminreward`) VALUES
(1, 'admin', 'Administrator', NULL),
(2, 'management', 'Management', NULL),
(3, 'usual', 'Usual', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_other_info`
--

CREATE TABLE IF NOT EXISTS `user_other_info` (
  `user_id` bigint(20) NOT NULL,
  `attribute` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  `address1` varchar(512) NOT NULL,
  `address2` varchar(512) NOT NULL,
  `place` varchar(256) NOT NULL,
  `zip` int(128) NOT NULL,
  PRIMARY KEY (`user_id`,`attribute`),
  KEY `fk_user_other_info_user_master2_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_other_info`
--

INSERT INTO `user_other_info` (`user_id`, `attribute`, `value`, `address1`, `address2`, `place`, `zip`) VALUES
(32, '', '', 'dankuni', 'Manohorpur', 'Dankuni', 712311),
(38, '', '', 'Sonarpur', '', 'Kolkata', 700150),
(41, '', '', 'Ballugunj', '', 'Kolkata', 700075),
(42, '', '', 'JADAVPUR', '', 'KOLKATA', 700072),
(43, '', '', 'JODHPUR PARK', '', 'KOLKATA', 700073),
(45, '', '', 'GARIA', '', 'KOLKATA', 700082),
(46, '', '', 'AD', '', 'AD', 111111),
(47, '', '', 'ADADAD', '', 'ADADAD', 111111),
(48, '', '', 'SODEPUR', '', 'KOLKATA', 700142),
(49, '', '', 'SONARPUR', '', 'KOLKATA', 700150),
(50, '', '', 'SONARPUR', '', 'KOLKATA', 700150),
(51, '', '', 'ADAD', '', 'ADADAD', 123456),
(52, '', '', 'SONARPUR', '', 'KOLKATA', 700150),
(53, '', '', 'JADAVPUR', '', 'KOLKATA', 700072),
(54, '', '', 'SONARPUR', '', 'KOLKATA', 700150),
(55, '', '', 'SONARPUR', '', 'KOLKATA', 700150);

-- --------------------------------------------------------

--
-- Table structure for table `user_paid_payments`
--

CREATE TABLE IF NOT EXISTS `user_paid_payments` (
  `due_payment_id` bigint(20) NOT NULL,
  `amountpaid` decimal(11,2) NOT NULL,
  `calculationdate` datetime DEFAULT NULL,
  `paymentstatus` varchar(45) DEFAULT NULL,
  `paymentdate` datetime DEFAULT NULL,
  KEY `fk_partner_paid_payments_partner_duebooking_payments1_idx` (`due_payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_passwd_mgmt`
--

CREATE TABLE IF NOT EXISTS `user_passwd_mgmt` (
  `user_id` bigint(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `updatedon` datetime NOT NULL,
  KEY `fk_user_passwd_mgmt_user_master2_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_passwd_mgmt`
--

INSERT INTO `user_passwd_mgmt` (`user_id`, `password`, `updatedon`) VALUES
(2, '0192023a7bbd73250516f069df18b500', '2013-08-12 00:00:00'),
(3, 'ee11cbb19052e40b07aac0ca060c23ee', '2013-08-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_map`
--

CREATE TABLE IF NOT EXISTS `user_privilege_map` (
  `USER_ID` bigint(20) DEFAULT NULL,
  `privilege_id` int(11) DEFAULT NULL,
  UNIQUE KEY `USER_ID` (`USER_ID`,`privilege_id`),
  UNIQUE KEY `USER_ID_2` (`USER_ID`,`privilege_id`),
  KEY `privilege_id` (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_master`
--

CREATE TABLE IF NOT EXISTS `user_privilege_master` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(128) DEFAULT NULL,
  `privilege_desc` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`privilege_id`),
  UNIQUE KEY `privilege_name` (`privilege_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE IF NOT EXISTS `user_rating` (
  `rating` int(11) NOT NULL DEFAULT '0',
  `updatedon` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_partner_rating_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_remote_api_calls`
--

CREATE TABLE IF NOT EXISTS `user_remote_api_calls` (
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remote_host` varchar(16) DEFAULT NULL,
  `api_key` varchar(64) DEFAULT NULL,
  `subject` varchar(64) DEFAULT NULL,
  `endpoint` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_rewards`
--

CREATE TABLE IF NOT EXISTS `user_rewards` (
  `recommended_user_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`recommended_user_id`),
  KEY `fk_user_rewards_user_master1_idx` (`user_id`),
  KEY `fk_user_rewards_user_master2_idx` (`recommended_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_map`
--

CREATE TABLE IF NOT EXISTS `user_role_map` (
  `ROLE_ID` int(11) DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  UNIQUE KEY `ROLE_ID` (`ROLE_ID`,`USER_ID`),
  UNIQUE KEY `USER_ID_2` (`USER_ID`,`ROLE_ID`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_master`
--

CREATE TABLE IF NOT EXISTS `user_role_master` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(128) NOT NULL,
  `role_desc` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role_master`
--

INSERT INTO `user_role_master` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Management', 'Managing everything');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_privilege_map`
--

CREATE TABLE IF NOT EXISTS `user_role_privilege_map` (
  `ROLE_ID` int(11) DEFAULT NULL,
  `privilege_id` int(11) DEFAULT NULL,
  UNIQUE KEY `ROLE_ID` (`ROLE_ID`,`privilege_id`),
  UNIQUE KEY `privilege_id_2` (`privilege_id`,`ROLE_ID`),
  KEY `privilege_id` (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_service_mapping`
--

CREATE TABLE IF NOT EXISTS `user_service_mapping` (
  `user_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`,`service_id`),
  KEY `fk_user_master_has_service_master_service_master1_idx` (`service_id`),
  KEY `fk_user_master_has_service_master_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_service_on_booking_master`
--

CREATE TABLE IF NOT EXISTS `user_service_on_booking_master` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `processedon` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_service_on_booking_master_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `session_id` varchar(64) NOT NULL,
  `remotehost` varchar(16) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `logouttime` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_type` varchar(1) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `fk_user_sessions_user_master1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `user_typeid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `applicablefor` varchar(45) NOT NULL,
  PRIMARY KEY (`user_typeid`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_typeid`, `name`, `description`, `applicablefor`) VALUES
(1, 'Administrator', 'Administrator', 'System user'),
(2, 'Management', 'Management', 'System user'),
(3, 'User', 'Normal user', 'System user'),
(4, 'Unregistered', 'Unregistered', 'Guest'),
(5, 'registered', 'registered', 'Guest'),
(6, 'Service provider', 'Service provider', 'Partner'),
(7, 'Client Provider', 'Client Provider', 'Partner');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation_package_mapping`
--
ALTER TABLE `accomodation_package_mapping`
  ADD CONSTRAINT `fk_accomodation_type_details_has_package_master_accomodation_1` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodation_type_details` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accomodation_type_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `accomodation_type_details`
--
ALTER TABLE `accomodation_type_details`
  ADD CONSTRAINT `fk_accomodation_type_details_hotel_master1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_accomodation_type_details_lodging_details1` FOREIGN KEY (`lodging_id`) REFERENCES `lodging_details` (`lodging_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `fk_booking_details_enquiry_details_master1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_accomodation_mapping`
--
ALTER TABLE `enquiry_accomodation_mapping`
  ADD CONSTRAINT `fk_enquiry_details_master_has_hotel_master_enquiry_details_ma1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_hotel_mapping_accomodation_type_details1` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodation_type_details` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_comments_details`
--
ALTER TABLE `enquiry_comments_details`
  ADD CONSTRAINT `fk_enquiry_comments_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  ADD CONSTRAINT `fk_enquiry_details_country_master1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_details_state_master1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_package_maping`
--
ALTER TABLE `enquiry_package_maping`
  ADD CONSTRAINT `fk_enquiry_details_has_package_master_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_service_mapping`
--
ALTER TABLE `enquiry_service_mapping`
  ADD CONSTRAINT `fk_enquiry_details_master_has_Service_Master_enquiry_details_1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_details_master_has_Service_Master_Service_Master1` FOREIGN KEY (`Service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enquiry_user_mapping`
--
ALTER TABLE `enquiry_user_mapping`
  ADD CONSTRAINT `fk_enquiry_partner_mapping_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_enquiry_partner_mapping_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feature_master`
--
ALTER TABLE `feature_master`
  ADD CONSTRAINT `fk_feature_master_service_master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feature_transport_mapping`
--
ALTER TABLE `feature_transport_mapping`
  ADD CONSTRAINT `fk_feature_master_has_transport_details_feature_master1` FOREIGN KEY (`feature_id`) REFERENCES `feature_master` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feature_master_has_transport_details_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `feedback_details`
--
ALTER TABLE `feedback_details`
  ADD CONSTRAINT `fk_Feedback_details_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_feedback_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guest_other_info`
--
ALTER TABLE `guest_other_info`
  ADD CONSTRAINT `fk_guest_master_country_master1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_master_guest_id` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guest_master_state_master1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_feature_mapping`
--
ALTER TABLE `hotel_feature_mapping`
  ADD CONSTRAINT `fk_hotel_master_has_feature_master_feature_master1` FOREIGN KEY (`feature_master_feature_id`) REFERENCES `feature_master` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hotel_master_has_feature_master_hotel_master1` FOREIGN KEY (`hotel_master_hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_master`
--
ALTER TABLE `hotel_master`
  ADD CONSTRAINT `fk_hotel_master_hotel_group_master1` FOREIGN KEY (`hotel_group_id`) REFERENCES `hotel_group_master` (`hotel_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hotel_master_hotel_type_master1` FOREIGN KEY (`hotel_type_id`) REFERENCES `hotel_type_master` (`hotel_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hotel_master_location_master1` FOREIGN KEY (`location_id`) REFERENCES `location_master` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel_user_mapping`
--
ALTER TABLE `hotel_user_mapping`
  ADD CONSTRAINT `fk_hotel_master_has_partner_master_hotel_master1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hotel_partner_mapping_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `location_master`
--
ALTER TABLE `location_master`
  ADD CONSTRAINT `fk_location_master_country_master1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_location_master_state_master1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mgmt_news_feed_details`
--
ALTER TABLE `mgmt_news_feed_details`
  ADD CONSTRAINT `fk_mgmt_news_feed_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `package_master`
--
ALTER TABLE `package_master`
  ADD CONSTRAINT `fk_package_master_country_master1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_package_master_state_master1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_package_master_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `partner_other_info`
--
ALTER TABLE `partner_other_info`
  ADD CONSTRAINT `fk_partner_other_info_country_master1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partner_other_info_state_master1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partner_other_info_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `fk_payment_details_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_feedback_mapping`
--
ALTER TABLE `service_feedback_mapping`
  ADD CONSTRAINT `fk_Service_Master_has_Feedback_details_Feedback_details1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback_details` (`feedback_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Service_Master_has_Feedback_details_Service_Master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `fk_transaction_details_payee_type_details1` FOREIGN KEY (`type_id`) REFERENCES `payee_type_details` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_details_payment_channels1` FOREIGN KEY (`channel_id`) REFERENCES `payment_channels` (`channel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_details_user_sessions1` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD CONSTRAINT `fk` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`payment_id`);

--
-- Constraints for table `transport_availed_details`
--
ALTER TABLE `transport_availed_details`
  ADD CONSTRAINT `fk_transport_availed_details_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transport_details`
--
ALTER TABLE `transport_details`
  ADD CONSTRAINT `fk_transport_details_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transport_details_transport_mode_master1` FOREIGN KEY (`transport_mode_id`) REFERENCES `transport_mode_master` (`transport_mode_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transport_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transport_package_mapping`
--
ALTER TABLE `transport_package_mapping`
  ADD CONSTRAINT `fk_transport_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transport_details_has_package_master_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `traveller_details`
--
ALTER TABLE `traveller_details`
  ADD CONSTRAINT `fk_traveller_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_asso_document_details`
--
ALTER TABLE `user_asso_document_details`
  ADD CONSTRAINT `fk_partner_asso_document_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_duebooking_payments`
--
ALTER TABLE `user_duebooking_payments`
  ADD CONSTRAINT `fk_partner_due_payments_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partner_due_payments_service_master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_enquiry_payments`
--
ALTER TABLE `user_enquiry_payments`
  ADD CONSTRAINT `fk_partner_due_payments_service_master10` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partner_enquiry_payments_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_followup_enquiry_master`
--
ALTER TABLE `user_followup_enquiry_master`
  ADD CONSTRAINT `fk_user_followup_enquiry_master_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_followup_enquiry_master_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_gift_avail_details`
--
ALTER TABLE `user_gift_avail_details`
  ADD CONSTRAINT `fk_guest_gift_avail_details_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_group_map`
--
ALTER TABLE `user_group_map`
  ADD CONSTRAINT `user_group_map_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `user_group_map_ibfk_2` FOREIGN KEY (`GROUP_ID`) REFERENCES `user_group_master` (`GROUP_ID`);

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `fk_user_master_guest_membership_type_master1` FOREIGN KEY (`member_type_id`) REFERENCES `user_membership_type_master` (`member_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_master_user_types1` FOREIGN KEY (`user_typeid`) REFERENCES `user_types` (`user_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_master_history`
--
ALTER TABLE `user_master_history`
  ADD CONSTRAINT `fk_user_master_guest_membership_type_master10` FOREIGN KEY (`member_type_id`) REFERENCES `user_membership_type_master` (`member_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_master_user_types10` FOREIGN KEY (`user_typeid`) REFERENCES `user_types` (`user_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_other_info`
--
ALTER TABLE `user_other_info`
  ADD CONSTRAINT `fk_user_other_info_user_master2` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_paid_payments`
--
ALTER TABLE `user_paid_payments`
  ADD CONSTRAINT `fk_partner_paid_payments_partner_duebooking_payments1` FOREIGN KEY (`due_payment_id`) REFERENCES `user_duebooking_payments` (`due_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_passwd_mgmt`
--
ALTER TABLE `user_passwd_mgmt`
  ADD CONSTRAINT `fk_user_passwd_mgmt_user_master2` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_privilege_map`
--
ALTER TABLE `user_privilege_map`
  ADD CONSTRAINT `user_privilege_map_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `user_privilege_map_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `user_privilege_master` (`privilege_id`);

--
-- Constraints for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD CONSTRAINT `fk_partner_rating_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_rewards`
--
ALTER TABLE `user_rewards`
  ADD CONSTRAINT `fk_user_rewards_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_rewards_user_master2` FOREIGN KEY (`recommended_user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_role_map`
--
ALTER TABLE `user_role_map`
  ADD CONSTRAINT `user_role_map_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_master` (`user_id`),
  ADD CONSTRAINT `user_role_map_ibfk_2` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_role_master` (`role_id`);

--
-- Constraints for table `user_role_privilege_map`
--
ALTER TABLE `user_role_privilege_map`
  ADD CONSTRAINT `user_role_privilege_map_ibfk_1` FOREIGN KEY (`privilege_id`) REFERENCES `user_privilege_master` (`privilege_id`),
  ADD CONSTRAINT `user_role_privilege_map_ibfk_2` FOREIGN KEY (`ROLE_ID`) REFERENCES `user_role_master` (`role_id`);

--
-- Constraints for table `user_service_mapping`
--
ALTER TABLE `user_service_mapping`
  ADD CONSTRAINT `fk_user_master_has_service_master_service_master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_master_has_service_master_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_service_on_booking_master`
--
ALTER TABLE `user_service_on_booking_master`
  ADD CONSTRAINT `fk_user_service_on_booking_master_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `fk_user_sessions_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
