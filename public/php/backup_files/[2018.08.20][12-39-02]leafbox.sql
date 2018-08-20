-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: leafbox
-- ------------------------------------------------------
-- Server version 	5.5.5-10.1.32-MariaDB
-- Date: Mon, 20 Aug 2018 12:39:02 +0700

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
  `pub_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `publisher` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `regis_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `book` VALUES (1,'','วิธีชนะ และสร้างสุข','','เดล คาร์เนกี้','อาหาขอจิต์เบตต์','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,'0000-00-00 00:00:00',4,NULL,'2018-06-10 05:22:41',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00','','','',NULL,NULL,-543,'','','2018-06-10 07:00:00','2018-06-10 11:10:12','2018-06-10 12:22:41'),(2,'','วิธีชนะมิตรและจงใจคน','','เดล คาร์ เนกี้','ยอจิตต์เมตต์','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,4,NULL,'2018-06-10 05:36:29',0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,'','','',NULL,NULL,-543,'','','2018-06-10 11:15:41','2018-06-10 11:15:41','2018-06-10 12:36:29'),(3,'','เจ้าชายน้อย','','แซงต์ เอ๊กซือ เปรี','อำพัน โอตะกูล','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,'','','',NULL,NULL,-543,'','','2018-06-10 12:39:44','2018-06-10 12:39:44','2018-06-10 12:39:44'),(4,'','JAZZ MUSIC','','','','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00','','','',NULL,NULL,-543,'','2561','2018-06-10 07:00:00','2018-06-10 12:42:44','2018-06-10 12:43:14'),(5,'','บันทึกพระยาตรง','','','','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00',0,NULL,'0000-00-00 00:00:00','','','',NULL,NULL,1998,'','','2018-06-10 07:00:00','2018-06-10 12:44:03','2018-06-10 12:44:31'),(6,'','ทางชนะความพิการ','','','','',0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,0,NULL,NULL,'','','',NULL,NULL,1983,'','','2018-06-10 12:45:18','2018-06-10 12:45:18','2018-06-10 12:45:18');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `bookprod`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookprod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('ACTIVE','DELETE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `media_type` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `act_date` datetime DEFAULT NULL,
  `finish_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `bookProd_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookprod`
--

LOCK TABLES `bookprod` WRITE;
/*!40000 ALTER TABLE `bookprod` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `bookprod` VALUES (1,1,9,'DELETE',1,0,'2018-03-04 00:00:00','2018-03-28 00:00:00','2018-06-10 12:21:23','0000-00-00 00:00:00'),(2,1,9,'ACTIVE',1,0,'2018-06-05 00:00:00','2018-06-05 00:00:00','2018-06-10 12:21:57','0000-00-00 00:00:00'),(3,1,9,'ACTIVE',1,1,'2018-06-05 00:00:00','2018-06-05 00:00:00','2018-06-10 12:22:10','0000-00-00 00:00:00'),(4,1,9,'ACTIVE',1,2,'2018-06-05 00:00:00','2018-06-05 00:00:00','2018-06-10 12:22:19','0000-00-00 00:00:00'),(5,1,9,'ACTIVE',1,3,'2018-06-05 00:00:00','2018-06-05 00:00:00','2018-06-10 12:22:31','0000-00-00 00:00:00'),(6,1,9,'ACTIVE',1,4,'2018-06-05 00:00:00','2018-06-05 00:00:00','2018-06-10 12:22:41','0000-00-00 00:00:00'),(7,2,9,'ACTIVE',1,0,'2018-06-06 00:00:00','2018-06-06 00:00:00','2018-06-10 12:35:46','0000-00-00 00:00:00'),(8,2,9,'ACTIVE',1,1,'2018-06-06 00:00:00','2018-06-06 00:00:00','2018-06-10 12:35:57','0000-00-00 00:00:00'),(9,2,9,'ACTIVE',1,2,'2018-06-06 00:00:00','2018-06-06 00:00:00','2018-06-10 12:36:10','0000-00-00 00:00:00'),(10,2,9,'ACTIVE',1,3,'2018-06-06 00:00:00','2018-06-06 00:00:00','2018-06-10 12:36:20','0000-00-00 00:00:00'),(11,2,9,'ACTIVE',1,4,'2018-06-06 00:00:00','2018-06-06 00:00:00','2018-06-10 12:36:29','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bookprod` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `braille`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `braille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `numpart` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `examiner_id` int(11) DEFAULT NULL,
  `produced_date` date NOT NULL,
  `pages` int(11) NOT NULL,
  `notes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `original_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `examiner_id` (`examiner_id`),
  CONSTRAINT `braille_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `braille`
--

LOCK TABLES `braille` WRITE;
/*!40000 ALTER TABLE `braille` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `braille` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `brailleborrow`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brailleborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `braille_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `actual_returned` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `braille_id` (`braille_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `brailleborrow_ibfk_1` FOREIGN KEY (`braille_id`) REFERENCES `braille` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `brailleborrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brailleborrow`
--

LOCK TABLES `brailleborrow` WRITE;
/*!40000 ALTER TABLE `brailleborrow` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `brailleborrow` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `brailledetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brailledetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `braille_id` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `braile_id` (`braille_id`),
  CONSTRAINT `brailledetail_ibfk_1` FOREIGN KEY (`braille_id`) REFERENCES `braille` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brailledetail`
--

LOCK TABLES `brailledetail` WRITE;
/*!40000 ALTER TABLE `brailledetail` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `brailledetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cassette`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cassette` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `numpart` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `produced_date` date NOT NULL,
  `notes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `original_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `cassette_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cassette`
--

LOCK TABLES `cassette` WRITE;
/*!40000 ALTER TABLE `cassette` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `cassette` VALUES (1,1,100,13,0,'2018-06-10','','001',1,'2018-06-10 12:23:14','0000-00-00 00:00:00'),(2,2,120,12,0,'2018-06-10','','002',1,'2018-06-10 12:36:53','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cassette` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cassetteborrow`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cassetteborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `cassette_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `actual_returned` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `cassette_id` (`cassette_id`),
  CONSTRAINT `cassetteborrow_ibfk_1` FOREIGN KEY (`cassette_id`) REFERENCES `cassette` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cassetteborrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cassetteborrow`
--

LOCK TABLES `cassetteborrow` WRITE;
/*!40000 ALTER TABLE `cassetteborrow` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cassetteborrow` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cassettedetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cassettedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cassette_id` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cassette_id` (`cassette_id`),
  CONSTRAINT `cassettedetail_ibfk_1` FOREIGN KEY (`cassette_id`) REFERENCES `cassette` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cassettedetail`
--

LOCK TABLES `cassettedetail` WRITE;
/*!40000 ALTER TABLE `cassettedetail` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `cassettedetail` VALUES (1,1,1,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(2,1,2,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(3,1,3,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(4,1,4,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(5,1,5,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(6,1,6,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(7,1,7,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(8,1,8,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(9,1,9,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(10,1,10,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(11,1,11,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(12,1,12,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(13,1,13,'0','2018-06-10 12:23:14','','2018-06-10 12:23:14','0000-00-00 00:00:00'),(14,2,1,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(15,2,2,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(16,2,3,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(17,2,4,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(18,2,5,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(19,2,6,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(20,2,7,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(21,2,8,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(22,2,9,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(23,2,10,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(24,2,11,'0','2018-06-10 12:36:53','','2018-06-10 12:36:53','0000-00-00 00:00:00'),(25,2,12,'0','2018-06-10 12:36:54','','2018-06-10 12:36:54','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cassettedetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cd`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `numpart` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `produced_date` date NOT NULL,
  `notes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `original_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `cd_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd`
--

LOCK TABLES `cd` WRITE;
/*!40000 ALTER TABLE `cd` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cd` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cdborrow`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cdborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `cd_id` int(7) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `actual_returned` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `cd_id` (`cd_id`),
  CONSTRAINT `cdborrow_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cdborrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cdborrow`
--

LOCK TABLES `cdborrow` WRITE;
/*!40000 ALTER TABLE `cdborrow` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cdborrow` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `cddetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cddetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_id` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `track_fr` int(11) NOT NULL,
  `track_to` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cd_id` (`cd_id`),
  CONSTRAINT `cddetail_ibfk_1` FOREIGN KEY (`cd_id`) REFERENCES `cd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cddetail`
--

LOCK TABLES `cddetail` WRITE;
/*!40000 ALTER TABLE `cddetail` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cddetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `daisy`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daisy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `numpart` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `produced_date` date NOT NULL,
  `notes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `original_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daisy`
--

LOCK TABLES `daisy` WRITE;
/*!40000 ALTER TABLE `daisy` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `daisy` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `daisyborrow`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daisyborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `daisy_id` int(11) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date NOT NULL,
  `actual_returned` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `daisy_id` (`daisy_id`),
  CONSTRAINT `daisyborrow_ibfk_1` FOREIGN KEY (`daisy_id`) REFERENCES `daisyborrow` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `daisyborrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daisyborrow`
--

LOCK TABLES `daisyborrow` WRITE;
/*!40000 ALTER TABLE `daisyborrow` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `daisyborrow` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `daisydetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daisydetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daisy_id` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `daisy_id` (`daisy_id`),
  CONSTRAINT `daisydetail_ibfk_1` FOREIGN KEY (`daisy_id`) REFERENCES `daisy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daisydetail`
--

LOCK TABLES `daisydetail` WRITE;
/*!40000 ALTER TABLE `daisydetail` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `daisydetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `dvd`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dvd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `numpart` int(11) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `produced_date` date NOT NULL,
  `notes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  `original_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dvd`
--

LOCK TABLES `dvd` WRITE;
/*!40000 ALTER TABLE `dvd` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `dvd` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `dvdborrow`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dvdborrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dvd_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL,
  `date_returned` datetime NOT NULL,
  `actual_returned` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dvd_id` (`dvd_id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `dvdborrow_ibfk_1` FOREIGN KEY (`dvd_id`) REFERENCES `dvd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dvdborrow_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dvdborrow`
--

LOCK TABLES `dvdborrow` WRITE;
/*!40000 ALTER TABLE `dvdborrow` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `dvdborrow` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `dvddetail`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dvddetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dvd_id` int(11) NOT NULL,
  `part` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dvd_id` (`dvd_id`),
  CONSTRAINT `dvddetail_ibfk_1` FOREIGN KEY (`dvd_id`) REFERENCES `dvd` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dvddetail`
--

LOCK TABLES `dvddetail` WRITE;
/*!40000 ALTER TABLE `dvddetail` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `dvddetail` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `member`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(141) DEFAULT NULL,
  `gender` varchar(4) DEFAULT NULL,
  `address` varchar(212) DEFAULT NULL,
  `district` varchar(133) DEFAULT NULL,
  `province_postcode` varchar(52) DEFAULT NULL,
  `phone_no` varchar(90) DEFAULT NULL,
  `member_status` varchar(130) DEFAULT NULL,
  `col2` varchar(70) DEFAULT NULL,
  `col3` varchar(18) DEFAULT NULL,
  `col4` varchar(19) DEFAULT NULL,
  `col5` varchar(21) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(320) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (9,'kamphon  sudsao','oleole006@gmail.com','oleole006@gmail.com','$2y$10$HgEeXjNOmojHUJ8P.ee.Seamv0v.tDjwD39ouVJQl3SYl8Yyt6Myu','n94olEgZVt7RmFAXFZPnC4NcAed3g5DvBw0aX4vD9OyWD5bmM5Afk1xE6W0w','2018-03-21 11:10:08','2018-03-21 11:34:02','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 20 Aug 2018 12:39:02 +0700
