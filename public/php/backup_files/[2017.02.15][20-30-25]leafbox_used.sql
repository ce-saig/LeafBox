-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: leafbox
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.21-MariaDB
-- Date: Wed, 15 Feb 2017 20:30:25 +0700

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
-- Table structure for table `book`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_eng` varchar(50) DEFAULT NULL,
  `author` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `translate` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `grade` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `number` int(11) NOT NULL,
  `c_no` int(11) NOT NULL,
  `cd_no` int(11) NOT NULL,
  `b_no` int(11) NOT NULL,
  `d_no` int(11) NOT NULL,
  `dvd_no` int(11) NOT NULL,
  `b_master` int(11) DEFAULT NULL,
  `c_master` int(11) DEFAULT NULL,
  `d_master` int(11) DEFAULT NULL,
  `cd_master` int(11) DEFAULT NULL,
  `dvd_master` int(11) DEFAULT NULL,
  `bm_status` tinyint(4) DEFAULT '0',
  `bm_note` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bm_date` timestamp NULL DEFAULT NULL,
  `setcs_status` tinyint(4) DEFAULT '0',
  `setcs_note` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `setcs_date` timestamp NULL DEFAULT NULL,
  `setds_status` tinyint(4) DEFAULT '0',
  `setds_note` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `setds_date` timestamp NULL DEFAULT NULL,
  `setcd_status` tinyint(4) DEFAULT '0',
  `setcd_note` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `setcd_date` timestamp NULL DEFAULT NULL,
  `setdvd_status` tinyint(4) DEFAULT '0',
  `setdvd_note` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `setdvd_date` timestamp NULL DEFAULT NULL,
  `abstract` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `book_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `produce_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `original_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pu_month` int(11) DEFAULT NULL,
  `pub_year` int(11) NOT NULL,
  `pub_no` int(11) NOT NULL,
  `publisher` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regis_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8246 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

