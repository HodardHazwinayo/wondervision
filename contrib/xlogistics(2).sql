-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2013 at 02:45 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `bookingdate`, `enquiry_id`) VALUES
(47, '2013-08-27 18:12:46', 124);

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
(124, 2, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 10, 10, 10, 1000.00, 10.00, '', 10.00, 'AC', 20.00, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `enquiry_comments_details`
--

INSERT INTO `enquiry_comments_details` (`comment_id`, `enquiry_id`, `updatedate`, `comment`) VALUES
(106, 124, '2013-08-27 14:50:37', 'New Enquiry done after edtails modify');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `enquiry_details`
--

INSERT INTO `enquiry_details` (`enquiry_id`, `startdate`, `enddate`, `startingplace`, `destination`, `enquirydate`, `totaldiscount`, `net_amount`, `servicetax`, `VAT`, `user_id`, `country_name`, `state_name`) VALUES
(124, '0000-00-00', '0000-00-00', '', '', '2013-08-27 14:50:37', 0.00, 0.00, 0.00, 0.00, 32, 'India', 'West Bangal');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_details_booking_details1_idx` (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `booking_id`, `paidamount`, `populationdate`, `commisionamount`, `payee`, `totalamount`, `paymentmode`, `recieptno`) VALUES
(12, 47, 0.00, '2013-08-27 18:12:46', 300.00, NULL, '3200', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `transport_details`
--

INSERT INTO `transport_details` (`transport_id`, `vehicle_no`, `vehicletype`, `noofadults`, `airconditioning`, `pickuptime`, `enquiry_id`, `user_id`, `startingplace`, `destination`, `estimateddistance`, `noofchildren`, `rate`, `discount`, `comments`, `commission`, `transport_mode_id`, `estimatedtime`, `servicetax`, `vat`) VALUES
(29, NULL, 'AC', 15, 0, '2013-09-01 00:00:00', 124, NULL, 'dankuni', 'inuknad', NULL, 15, 2000.00, 0.00, '', 10.00, NULL, '2013-09-01 00:00:00', 5.00, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `username`, `firstname`, `lastname`, `status`, `login_expiry_date`, `email`, `mobile`, `creation_date`, `user_typeid`, `gender`, `member_type_id`, `updatedon`) VALUES
(2, 'admin', 'Soumyajit', 'Mandal', 1, '2016-10-26 00:00:00', 'smondal@bluecoppertech.com', 9477411305, '2013-08-12 00:00:00', 1, 'MALE', 1, '2013-08-12 00:00:00'),
(3, 'user', 'Abhirup', 'Ghosh', 1, '2016-02-25 00:00:00', 'aghosh@bluecoppertech.com', 94774112365, '2013-08-12 00:00:00', 2, 'Male', 2, '2013-08-12 00:00:00'),
(32, 'Abhijit2013-08-22 19:53:22', 'Abhijit', 'Chowdhury', 1, NULL, 'softlove9891@gmail.com', 8583890253, '2013-08-22 19:53:22', 4, NULL, NULL, NULL);

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
(32, '', '', 'dankuni', 'Manohorpur', 'Dankuni', 712311);

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
