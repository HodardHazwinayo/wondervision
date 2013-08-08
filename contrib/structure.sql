-- MySQL dump 10.13  Distrib 5.5.8, for Win32 (x86)
--
-- Host: localhost    Database: xlogistics
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accomodation_package_mapping`
--

DROP TABLE IF EXISTS `accomodation_package_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accomodation_package_mapping` (
  `accomodation_type_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  PRIMARY KEY (`accomodation_type_id`,`package_id`),
  KEY `fk_accomodation_type_details_has_package_master_package_mas_idx` (`package_id`),
  KEY `fk_accomodation_type_details_has_package_master_accomodatio_idx` (`accomodation_type_id`),
  CONSTRAINT `fk_accomodation_type_details_has_package_master_accomodation_1` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodation_type_details` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_accomodation_type_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `accomodation_type_details`
--

DROP TABLE IF EXISTS `accomodation_type_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accomodation_type_details` (
  `accomodation_type_id` bigint(20) NOT NULL,
  `hotel_id` bigint(20) NOT NULL,
  `lodging_type` varchar(128) DEFAULT NULL,
  `bedding_type` varchar(128) DEFAULT NULL,
  `room_type` varchar(128) DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `maxperson` int(11) DEFAULT NULL,
  PRIMARY KEY (`accomodation_type_id`),
  KEY `fk_accomodation_type_details_hotel_master1_idx` (`hotel_id`),
  CONSTRAINT `fk_accomodation_type_details_hotel_master1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bed_type_master`
--

DROP TABLE IF EXISTS `bed_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bed_type_master` (
  `bed_type_id` int(11) NOT NULL,
  PRIMARY KEY (`bed_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_details` (
  `booking_id` bigint(20) NOT NULL,
  `bookingdate` datetime NOT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_booking_details_enquiry_details_master1_idx` (`enquiry_id`),
  CONSTRAINT `fk_booking_details_enquiry_details_master1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `country_master`
--

DROP TABLE IF EXISTS `country_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_master` (
  `country_name` varchar(64) NOT NULL,
  PRIMARY KEY (`country_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `country_t`
--

DROP TABLE IF EXISTS `country_t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_t` (
  `country_id` int(5) NOT NULL AUTO_INCREMENT,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(80) NOT NULL DEFAULT '',
  `long_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(6) DEFAULT NULL,
  `un_member` varchar(12) DEFAULT NULL,
  `calling_code` varchar(8) DEFAULT NULL,
  `cctld` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_accomodation_mapping`
--

DROP TABLE IF EXISTS `enquiry_accomodation_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_accomodation_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `accomodation_type_id` bigint(20) NOT NULL,
  `checkindate` datetime DEFAULT NULL,
  `checkoutdate` datetime DEFAULT NULL,
  `noofperson` int(11) DEFAULT NULL,
  `noofrooms` int(11) DEFAULT NULL,
  `amount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(255) DEFAULT NULL,
  `commission` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`enquiry_id`,`accomodation_type_id`),
  KEY `fk_enquiry_details_master_has_hotel_master_enquiry_details__idx` (`enquiry_id`),
  KEY `fk_enquiry_hotel_mapping_accomodation_type_details1_idx` (`accomodation_type_id`),
  CONSTRAINT `fk_enquiry_details_master_has_hotel_master_enquiry_details_ma1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enquiry_hotel_mapping_accomodation_type_details1` FOREIGN KEY (`accomodation_type_id`) REFERENCES `accomodation_type_details` (`accomodation_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_comments_details`
--

DROP TABLE IF EXISTS `enquiry_comments_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_comments_details` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` bigint(20) NOT NULL,
  `updatedate` datetime NOT NULL,
  `comment` longtext,
  PRIMARY KEY (`comment_id`),
  KEY `fk_enquiry_comments_enquiry_details1_idx` (`enquiry_id`),
  CONSTRAINT `fk_enquiry_comments_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_details`
--

DROP TABLE IF EXISTS `enquiry_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_details` (
  `enquiry_id` bigint(20) NOT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `startingplace` varchar(128) DEFAULT NULL,
  `destination` varchar(128) DEFAULT NULL,
  `enquirydate` datetime DEFAULT NULL,
  `session_id` varchar(64) NOT NULL,
  `totaldiscount` decimal(11,2) DEFAULT NULL,
  `net_amount` decimal(11,2) DEFAULT NULL,
  `servicetax` decimal(11,2) DEFAULT NULL,
  `VAT` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`enquiry_id`),
  KEY `fk_enquiry_details_master_user_sessions1_idx` (`session_id`),
  CONSTRAINT `fk_enquiry_details_master_user_sessions1` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_guest_mapping`
--

DROP TABLE IF EXISTS `enquiry_guest_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_guest_mapping` (
  `guest_id` bigint(20) NOT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  PRIMARY KEY (`guest_id`,`enquiry_id`),
  KEY `fk_enquiry_guest_mapping_enquiry_details1_idx` (`enquiry_id`),
  CONSTRAINT `fk_enquiry_guest_mapping_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enquiry_guest_mapping_guest_master1` FOREIGN KEY (`guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_package_maping`
--

DROP TABLE IF EXISTS `enquiry_package_maping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_package_maping` (
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
  KEY `fk_enquiry_details_has_package_master_enquiry_details1_idx` (`enquiry_id`),
  CONSTRAINT `fk_enquiry_details_has_package_master_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enquiry_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_partner_mapping`
--

DROP TABLE IF EXISTS `enquiry_partner_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_partner_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `partner_id` bigint(20) NOT NULL,
  PRIMARY KEY (`enquiry_id`,`partner_id`),
  KEY `fk_enquiry_partner_mapping_partner_master1_idx` (`partner_id`),
  CONSTRAINT `fk_enquiry_partner_mapping_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enquiry_partner_mapping_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `enquiry_service_mapping`
--

DROP TABLE IF EXISTS `enquiry_service_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry_service_mapping` (
  `enquiry_id` bigint(20) NOT NULL,
  `Service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`enquiry_id`,`Service_id`),
  KEY `fk_enquiry_details_master_has_Service_Master_Service_Master_idx` (`Service_id`),
  KEY `fk_enquiry_details_master_has_Service_Master_enquiry_detail_idx` (`enquiry_id`),
  CONSTRAINT `fk_enquiry_details_master_has_Service_Master_enquiry_details_1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enquiry_details_master_has_Service_Master_Service_Master1` FOREIGN KEY (`Service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feature_master`
--

DROP TABLE IF EXISTS `feature_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_master` (
  `feature_id` bigint(20) NOT NULL,
  `feature_name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feature_transport_mapping`
--

DROP TABLE IF EXISTS `feature_transport_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_transport_mapping` (
  `feature_id` bigint(20) NOT NULL,
  `transport_id` bigint(20) NOT NULL,
  PRIMARY KEY (`feature_id`,`transport_id`),
  KEY `fk_feature_master_has_transport_details_transport_details1_idx` (`transport_id`),
  KEY `fk_feature_master_has_transport_details_feature_master1_idx` (`feature_id`),
  CONSTRAINT `fk_feature_master_has_transport_details_feature_master1` FOREIGN KEY (`feature_id`) REFERENCES `feature_master` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_feature_master_has_transport_details_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feedback_details`
--

DROP TABLE IF EXISTS `feedback_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_details` (
  `feedback_id` bigint(20) NOT NULL,
  `feedbackdate` datetime DEFAULT NULL,
  `alternative_email` varchar(128) DEFAULT NULL,
  `comments` longtext,
  `guest_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  PRIMARY KEY (`feedback_id`,`booking_id`),
  KEY `fk_Feedback_details_guest_master1_idx` (`guest_id`),
  KEY `fk_Feedback_details_booking_details1_idx` (`booking_id`),
  CONSTRAINT `fk_Feedback_details_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Feedback_details_guest_master1` FOREIGN KEY (`guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_gift_avail_details`
--

DROP TABLE IF EXISTS `guest_gift_avail_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_gift_avail_details` (
  `guest_id` bigint(20) NOT NULL,
  `gift_id` bigint(20) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `used_date` datetime NOT NULL,
  KEY `fk_guest_gift_avail_details_guest_master1_idx` (`guest_id`),
  KEY `fk_guest_gift_avail_details_guest_gift_master1_idx` (`gift_id`),
  CONSTRAINT `fk_guest_gift_avail_details_guest_gift_master1` FOREIGN KEY (`gift_id`) REFERENCES `guest_gift_master` (`gift_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_gift_avail_details_guest_master1` FOREIGN KEY (`guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_gift_master`
--

DROP TABLE IF EXISTS `guest_gift_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_gift_master` (
  `gift_id` bigint(20) NOT NULL,
  `gifttype` varchar(128) NOT NULL,
  `gift_description` varchar(255) DEFAULT NULL,
  `amount` decimal(11,2) DEFAULT NULL,
  `guest_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`gift_id`),
  KEY `fk_guest_gift_master_guest_membership_type_master1_idx` (`guest_type_id`),
  CONSTRAINT `fk_guest_gift_master_guest_membership_type_master1` FOREIGN KEY (`guest_type_id`) REFERENCES `guest_membership_type_master` (`guest_member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_master`
--

DROP TABLE IF EXISTS `guest_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_master` (
  `guest_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `guest_typeid` bigint(20) NOT NULL,
  `guest_member_typeid` bigint(20) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `place` varchar(128) DEFAULT NULL,
  `state` varchar(64) NOT NULL,
  `country` varchar(128) NOT NULL,
  `zip` varchar(128) DEFAULT NULL,
  `membershipfrom` datetime NOT NULL,
  `guest_code` varchar(256) NOT NULL,
  PRIMARY KEY (`guest_id`),
  UNIQUE KEY `primaryemail_UNIQUE` (`email`),
  KEY `fk_guest_master_guest_types1_idx` (`guest_typeid`),
  KEY `fk_guest_master_guest_membership_type_master1_idx` (`guest_member_typeid`),
  CONSTRAINT `fk_guest_master_guest_membership_type_master1` FOREIGN KEY (`guest_member_typeid`) REFERENCES `guest_membership_type_master` (`guest_member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_master_guest_types1` FOREIGN KEY (`guest_typeid`) REFERENCES `guest_types` (`guest_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_membership_type_master`
--

DROP TABLE IF EXISTS `guest_membership_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_membership_type_master` (
  `guest_member_id` bigint(20) NOT NULL,
  `membershipname` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `memberminreward` int(11) DEFAULT NULL,
  PRIMARY KEY (`guest_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_rewards`
--

DROP TABLE IF EXISTS `guest_rewards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_rewards` (
  `updatedon` datetime DEFAULT NULL,
  `rewardpoints` int(11) NOT NULL DEFAULT '0',
  `guest_id` bigint(20) NOT NULL,
  `recommend_guest_id` bigint(20) DEFAULT NULL,
  `recommend_partner_id` bigint(20) DEFAULT NULL,
  `reward_id` bigint(20) NOT NULL,
  `recommend_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`reward_id`),
  KEY `fk_guest_rewards_guest_master1_idx` (`guest_id`),
  KEY `fk_guest_rewards_recommend_type_master1_idx` (`recommend_type_id`),
  KEY `fk_guest_rewards_guest_master2` (`recommend_guest_id`),
  KEY `fk_guest_rewards_partner_master1` (`recommend_partner_id`),
  CONSTRAINT `fk_guest_rewards_guest_master1` FOREIGN KEY (`guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_rewards_guest_master2` FOREIGN KEY (`recommend_guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_rewards_partner_master1` FOREIGN KEY (`recommend_partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_rewards_recommend_type_master1` FOREIGN KEY (`recommend_type_id`) REFERENCES `recommend_type_master` (`recommend_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `guest_types`
--

DROP TABLE IF EXISTS `guest_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guest_types` (
  `guest_typeid` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`guest_typeid`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel_feature_mapping`
--

DROP TABLE IF EXISTS `hotel_feature_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_feature_mapping` (
  `hotel_master_hotel_id` bigint(20) NOT NULL,
  `feature_master_feature_id` bigint(20) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`hotel_master_hotel_id`,`feature_master_feature_id`),
  KEY `fk_hotel_master_has_feature_master_feature_master1_idx` (`feature_master_feature_id`),
  KEY `fk_hotel_master_has_feature_master_hotel_master1_idx` (`hotel_master_hotel_id`),
  CONSTRAINT `fk_hotel_master_has_feature_master_feature_master1` FOREIGN KEY (`feature_master_feature_id`) REFERENCES `feature_master` (`feature_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotel_master_has_feature_master_hotel_master1` FOREIGN KEY (`hotel_master_hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel_group_master`
--

DROP TABLE IF EXISTS `hotel_group_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_group_master` (
  `hotel_group_id` bigint(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hotel_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel_master`
--

DROP TABLE IF EXISTS `hotel_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_master` (
  `hotel_id` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `place` varchar(128) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `alternativephonenumber` varchar(45) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `associationfrom` datetime DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `hotel_grading` int(11) DEFAULT NULL,
  `hotel_group_id` bigint(20) DEFAULT NULL,
  `hotel_type_id` bigint(20) NOT NULL,
  `status_type` varchar(1) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_hotel_master_location_master1_idx` (`location_id`),
  KEY `fk_hotel_master_hotel_group_master1_idx` (`hotel_group_id`),
  KEY `fk_hotel_master_hotel_type_master1_idx` (`hotel_type_id`),
  KEY `fk_hotel_master_status_master1_idx` (`status_type`),
  CONSTRAINT `fk_hotel_master_hotel_group_master1` FOREIGN KEY (`hotel_group_id`) REFERENCES `hotel_group_master` (`hotel_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotel_master_hotel_type_master1` FOREIGN KEY (`hotel_type_id`) REFERENCES `hotel_type_master` (`hotel_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotel_master_location_master1` FOREIGN KEY (`location_id`) REFERENCES `location_master` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotel_master_status_master1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel_partner_mapping`
--

DROP TABLE IF EXISTS `hotel_partner_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_partner_mapping` (
  `hotel_id` bigint(20) NOT NULL,
  `partner_id` bigint(20) NOT NULL,
  `preference_rating` int(11) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `fk_hotel_master_has_partner_master_partner_master1_idx` (`partner_id`),
  KEY `fk_hotel_master_has_partner_master_hotel_master1_idx` (`hotel_id`),
  CONSTRAINT `fk_hotel_master_has_partner_master_hotel_master1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_master` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotel_master_has_partner_master_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `hotel_type_master`
--

DROP TABLE IF EXISTS `hotel_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_type_master` (
  `hotel_type_id` bigint(20) NOT NULL,
  `typename` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`hotel_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `location_master`
--

DROP TABLE IF EXISTS `location_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_master` (
  `location_id` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `place` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `genre` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mgmt_news_feed_details`
--

DROP TABLE IF EXISTS `mgmt_news_feed_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mgmt_news_feed_details` (
  `message_id` bigint(20) NOT NULL,
  `topic` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `publishdate` datetime DEFAULT NULL,
  `closingdate` datetime DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  `user_sessions_session_id` varchar(64) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_mgmt_new_feed_details_status_master1_idx` (`status_type`),
  KEY `fk_mgmt_news_feed_details_user_sessions1_idx` (`user_sessions_session_id`),
  CONSTRAINT `fk_mgmt_news_feed_details_user_sessions1` FOREIGN KEY (`user_sessions_session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mgmt_new_feed_details_status_master1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `package_master`
--

DROP TABLE IF EXISTS `package_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package_master` (
  `package_id` bigint(20) NOT NULL,
  `package_code` varchar(45) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `rate` decimal(11,2) DEFAULT NULL,
  `maxperson` int(11) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL,
  `area_covered` longtext,
  `state` varchar(45) DEFAULT NULL,
  `partner_id` bigint(20) NOT NULL,
  PRIMARY KEY (`package_id`),
  UNIQUE KEY `package_code_UNIQUE` (`package_code`),
  KEY `fk_package_master_partner_master1_idx` (`partner_id`),
  CONSTRAINT `fk_package_master_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_asso_document_details`
--

DROP TABLE IF EXISTS `partner_asso_document_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_asso_document_details` (
  `document_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `partner_id` bigint(20) NOT NULL,
  `document_type` varchar(128) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `updatedon` datetime NOT NULL,
  PRIMARY KEY (`document_id`),
  KEY `fk_partner_asso_document_details_partner_master1_idx` (`partner_id`),
  CONSTRAINT `fk_partner_asso_document_details_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_duebooking_payments`
--

DROP TABLE IF EXISTS `partner_duebooking_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_duebooking_payments` (
  `due_payment_id` bigint(20) NOT NULL,
  `providedserviceid` bigint(20) DEFAULT NULL COMMENT 'will be ids from accomodation_details,transport_details and package_details',
  `booking_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `amountdue` decimal(11,2) NOT NULL,
  `calulateddate` datetime DEFAULT NULL,
  PRIMARY KEY (`due_payment_id`),
  KEY `fk_partner_due_payments_booking_details1_idx` (`booking_id`),
  KEY `fk_partner_due_payments_service_master1_idx` (`service_id`),
  CONSTRAINT `fk_partner_due_payments_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_due_payments_service_master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_enquiry_payments`
--

DROP TABLE IF EXISTS `partner_enquiry_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_enquiry_payments` (
  `enquiry_payment_id` bigint(20) NOT NULL,
  `providedserviceid` bigint(20) DEFAULT NULL COMMENT 'will be ids from accomodation_details,transport_details and package_details',
  `service_id` bigint(20) NOT NULL,
  `amountdue` decimal(11,2) NOT NULL,
  `calulateddate` datetime DEFAULT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  PRIMARY KEY (`enquiry_payment_id`),
  KEY `fk_partner_due_payments_service_master1_idx` (`service_id`),
  KEY `fk_partner_enquiry_payments_enquiry_details1_idx` (`enquiry_id`),
  CONSTRAINT `fk_partner_due_payments_service_master10` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_enquiry_payments_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_master`
--

DROP TABLE IF EXISTS `partner_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_master` (
  `partner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `partnershipfrom` datetime NOT NULL,
  `partner_type_id` bigint(20) NOT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `addressline1` varchar(128) NOT NULL,
  `addressline2` varchar(128) DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  `updatedon` datetime NOT NULL,
  `state_name` varchar(64) DEFAULT NULL,
  `country_name` varchar(64) NOT NULL,
  PRIMARY KEY (`partner_id`),
  KEY `fk_partner_master_partner_type1_idx` (`partner_type_id`),
  KEY `fk_partner_master_status_master1_idx` (`status_type`),
  KEY `fk_partner_master_state1_idx` (`state_name`),
  KEY `fk_partner_master_country1_idx` (`country_name`),
  CONSTRAINT `fk_partner_master_country1` FOREIGN KEY (`country_name`) REFERENCES `country_master` (`country_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_master_partner_type1` FOREIGN KEY (`partner_type_id`) REFERENCES `partner_type` (`partner_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_master_state1` FOREIGN KEY (`state_name`) REFERENCES `state_master` (`state_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_master_status_master1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_master_history`
--

DROP TABLE IF EXISTS `partner_master_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_master_history` (
  `partner_id` bigint(20) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `partnershipfrom` datetime NOT NULL,
  `partner_type_id` bigint(20) NOT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `addressline1` varchar(128) DEFAULT NULL,
  `addressline2` varchar(128) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `place` varchar(45) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `partner_mastercol` bigint(20) DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_paid_payments`
--

DROP TABLE IF EXISTS `partner_paid_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_paid_payments` (
  `due_payment_id` bigint(20) NOT NULL,
  `amountpaid` decimal(11,2) NOT NULL,
  `calculationdate` datetime DEFAULT NULL,
  `paymentstatus` varchar(45) DEFAULT NULL,
  `paymentdate` datetime DEFAULT NULL,
  KEY `fk_partner_paid_payments_partner_duebooking_payments1_idx` (`due_payment_id`),
  CONSTRAINT `fk_partner_paid_payments_partner_duebooking_payments1` FOREIGN KEY (`due_payment_id`) REFERENCES `partner_duebooking_payments` (`due_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_rating`
--

DROP TABLE IF EXISTS `partner_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_rating` (
  `rating` int(11) NOT NULL DEFAULT '0',
  `updatedon` datetime NOT NULL,
  `partner_id` bigint(20) NOT NULL,
  PRIMARY KEY (`partner_id`),
  CONSTRAINT `fk_partner_rating_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_rewards`
--

DROP TABLE IF EXISTS `partner_rewards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_rewards` (
  `updatedon` datetime DEFAULT NULL,
  `rewardpoints` int(11) NOT NULL DEFAULT '0',
  `recommend_partner_id` bigint(20) DEFAULT NULL,
  `reward_id` bigint(20) NOT NULL,
  `recommend_type_id` bigint(20) NOT NULL,
  `partner_id` bigint(20) NOT NULL,
  `recommend_guest_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`reward_id`),
  KEY `fk_guest_rewards_recommend_type_master1_idx` (`recommend_type_id`),
  KEY `fk_partner_rewards_partner_master1_idx` (`partner_id`),
  KEY `fk_partner_rewards_guest_master1_idx` (`recommend_guest_id`),
  KEY `fk_guest_rewards_partner_master10` (`recommend_partner_id`),
  CONSTRAINT `fk_guest_rewards_partner_master10` FOREIGN KEY (`recommend_partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guest_rewards_recommend_type_master10` FOREIGN KEY (`recommend_type_id`) REFERENCES `recommend_type_master` (`recommend_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_rewards_guest_master1` FOREIGN KEY (`recommend_guest_id`) REFERENCES `guest_master` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_rewards_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_service_mapping`
--

DROP TABLE IF EXISTS `partner_service_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_service_mapping` (
  `partner_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  PRIMARY KEY (`partner_id`,`service_id`),
  KEY `fk_partner_master_has_Service_Master_Service_Master1_idx` (`service_id`),
  KEY `fk_partner_master_has_Service_Master_partner_master1_idx` (`partner_id`),
  CONSTRAINT `fk_partner_master_has_Service_Master_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_partner_master_has_Service_Master_Service_Master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partner_type`
--

DROP TABLE IF EXISTS `partner_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_type` (
  `partner_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `typename` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`partner_type_id`),
  UNIQUE KEY `typename_UNIQUE` (`typename`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payee_type_details`
--

DROP TABLE IF EXISTS `payee_type_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payee_type_details` (
  `type_id` varchar(1) NOT NULL,
  `payeetype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_channels`
--

DROP TABLE IF EXISTS `payment_channels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_channels` (
  `channel_id` bigint(20) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_details` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) NOT NULL,
  `paidamount` decimal(11,2) NOT NULL,
  `populationdate` datetime NOT NULL,
  `commisionamount` decimal(11,2) DEFAULT NULL,
  `payee` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_details_booking_details1_idx` (`booking_id`),
  CONSTRAINT `fk_payment_details_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recommend_type_master`
--

DROP TABLE IF EXISTS `recommend_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommend_type_master` (
  `recommend_type_id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`recommend_type_id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `room_type_master`
--

DROP TABLE IF EXISTS `room_type_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_type_master` (
  `room_type_id` bigint(20) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_feedback_mapping`
--

DROP TABLE IF EXISTS `service_feedback_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_feedback_mapping` (
  `service_id` bigint(20) NOT NULL,
  `feedback_id` bigint(20) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `favourite` tinyint(1) NOT NULL DEFAULT '0',
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`service_id`,`feedback_id`),
  KEY `fk_Service_Master_has_Feedback_details_Feedback_details1_idx` (`feedback_id`),
  KEY `fk_Service_Master_has_Feedback_details_Service_Master1_idx` (`service_id`),
  CONSTRAINT `fk_Service_Master_has_Feedback_details_Feedback_details1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback_details` (`feedback_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Service_Master_has_Feedback_details_Service_Master1` FOREIGN KEY (`service_id`) REFERENCES `service_master` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `service_master`
--

DROP TABLE IF EXISTS `service_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_master` (
  `service_id` bigint(20) NOT NULL,
  `service_type` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  UNIQUE KEY `Service_type_UNIQUE` (`service_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `state_master`
--

DROP TABLE IF EXISTS `state_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state_master` (
  `state_name` varchar(64) NOT NULL,
  PRIMARY KEY (`state_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `status_master`
--

DROP TABLE IF EXISTS `status_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_master` (
  `status_type` varchar(1) NOT NULL,
  `statusname` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transaction_details`
--

DROP TABLE IF EXISTS `transaction_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_details` (
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
  KEY `fk_transaction_details_payee_type_details1_idx` (`type_id`),
  CONSTRAINT `fk_transaction_details_payee_type_details1` FOREIGN KEY (`type_id`) REFERENCES `payee_type_details` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_details_payment_channels1` FOREIGN KEY (`channel_id`) REFERENCES `payment_channels` (`channel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction_details_user_sessions1` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transport_availed_details`
--

DROP TABLE IF EXISTS `transport_availed_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transport_availed_details` (
  `drivername` varchar(64) NOT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `droptime` datetime DEFAULT NULL,
  `transport_id` bigint(20) NOT NULL,
  PRIMARY KEY (`transport_id`),
  CONSTRAINT `fk_transport_availed_details_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transport_details`
--

DROP TABLE IF EXISTS `transport_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transport_details` (
  `transport_id` bigint(20) NOT NULL,
  `vehicle_no` varchar(45) DEFAULT NULL,
  `vehicletype` varchar(45) DEFAULT NULL,
  `noofseats` int(11) DEFAULT NULL,
  `airconditioning` tinyint(1) DEFAULT '0',
  `pickuptime` datetime DEFAULT NULL,
  `startingplace` varchar(128) DEFAULT NULL,
  `destination` varchar(128) DEFAULT NULL,
  `estimateddistance` decimal(11,2) DEFAULT NULL,
  `rate` decimal(11,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(11,2) NOT NULL DEFAULT '0.00',
  `enquiry_id` bigint(20) NOT NULL,
  `partner_id` bigint(20) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `commission` decimal(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`transport_id`),
  KEY `fk_transport_details_enquiry_details1_idx` (`enquiry_id`),
  KEY `fk_transport_details_partner_master1_idx` (`partner_id`),
  CONSTRAINT `fk_transport_details_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transport_details_partner_master1` FOREIGN KEY (`partner_id`) REFERENCES `partner_master` (`partner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transport_package_mapping`
--

DROP TABLE IF EXISTS `transport_package_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transport_package_mapping` (
  `transport_id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  PRIMARY KEY (`transport_id`,`package_id`),
  KEY `fk_transport_details_has_package_master_package_master1_idx` (`package_id`),
  KEY `fk_transport_details_has_package_master_transport_details1_idx` (`transport_id`),
  CONSTRAINT `fk_transport_details_has_package_master_package_master1` FOREIGN KEY (`package_id`) REFERENCES `package_master` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transport_details_has_package_master_transport_details1` FOREIGN KEY (`transport_id`) REFERENCES `transport_details` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_followup_enquiry_master`
--

DROP TABLE IF EXISTS `user_followup_enquiry_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_followup_enquiry_master` (
  `task_id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `followupon` datetime DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  `enquiry_id` bigint(20) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_followup_enquiry_master_followup_service_status_mas_idx` (`status_type`),
  KEY `fk_user_followup_enquiry_master_enquiry_details1_idx` (`enquiry_id`),
  KEY `fk_user_followup_enquiry_master_user_sessions1_idx` (`session_id`),
  CONSTRAINT `fk_user_followup_enquiry_master_enquiry_details1` FOREIGN KEY (`enquiry_id`) REFERENCES `enquiry_details` (`enquiry_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_followup_enquiry_master_followup_service_status_master1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_followup_enquiry_master_user_sessions1` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_master` (
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_user_master_user_types1_idx` (`user_typeid`),
  CONSTRAINT `fk_user_master_user_types1` FOREIGN KEY (`user_typeid`) REFERENCES `user_types` (`user_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_other_info`
--

DROP TABLE IF EXISTS `user_other_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_other_info` (
  `user_id` bigint(20) NOT NULL,
  `attribute` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`attribute`),
  KEY `fk_user_other_info_user_master2_idx` (`user_id`),
  CONSTRAINT `fk_user_other_info_user_master2` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_passwd_mgmt`
--

DROP TABLE IF EXISTS `user_passwd_mgmt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_passwd_mgmt` (
  `user_id` bigint(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `updatedon` datetime NOT NULL,
  KEY `fk_user_passwd_mgmt_user_master2_idx` (`user_id`),
  CONSTRAINT `fk_user_passwd_mgmt_user_master2` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_service_on_booking_master`
--

DROP TABLE IF EXISTS `user_service_on_booking_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_service_on_booking_master` (
  `task_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `processedon` datetime DEFAULT NULL,
  `status_type` varchar(1) NOT NULL,
  `session_id` varchar(64) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `fk_user_service_on_booking_master_followup_service_status_m_idx` (`status_type`),
  KEY `fk_user_service_on_booking_master_booking_details1_idx` (`booking_id`),
  KEY `fk_user_service_on_booking_master_user_sessions1_idx` (`session_id`),
  CONSTRAINT `fk_user_service_on_booking_master_booking_details1` FOREIGN KEY (`booking_id`) REFERENCES `booking_details` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_service_on_booking_master_followup_service_status_mas1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_service_on_booking_master_user_sessions1` FOREIGN KEY (`session_id`) REFERENCES `user_sessions` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_sessions`
--

DROP TABLE IF EXISTS `user_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_sessions` (
  `session_id` varchar(64) NOT NULL,
  `remotehost` varchar(16) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `logouttime` varchar(45) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status_type` varchar(1) NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `fk_user_sessions_user_master1_idx` (`user_id`),
  KEY `fk_user_sessions_status_master1_idx` (`status_type`),
  CONSTRAINT `fk_user_sessions_status_master1` FOREIGN KEY (`status_type`) REFERENCES `status_master` (`status_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_sessions_user_master1` FOREIGN KEY (`user_id`) REFERENCES `user_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_types` (
  `user_typeid` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_typeid`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-07 17:58:32
