-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mis
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

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
-- Table structure for table `leave_req`
--

DROP TABLE IF EXISTS `leave_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave_req` (
  `leave_req_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(45) NOT NULL,
  `date_hired` date NOT NULL,
  `date_filed` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  PRIMARY KEY (`leave_req_id`),
  UNIQUE KEY `leave_req_id_UNIQUE` (`leave_req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave_req`
--

LOCK TABLES `leave_req` WRITE;
/*!40000 ALTER TABLE `leave_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `visit_pages` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `status` enum('enabled','disabled') DEFAULT 'enabled',
  `type` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`username`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('HRWqeyuiyr',2,'hello123@email.cm','$2y$10$WLBB1PG5y3gCP9sRh/qSceeynyPJtKsfELTZlgwoDWxJzJHKWAXNm','2018-06-14','enabled','user'),('MLGregorio',1,'gregorio12@gmail.com','$2y$10$a1QKsNjx5LmrqBglLJcG7..NzyRgkPQ4LRLrSpDJ.IlzExNx6BFAK','2018-06-14','enabled','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_background`
--

DROP TABLE IF EXISTS `user_background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_background` (
  `bg_id` int(11) NOT NULL,
  `spouse_first_name` varchar(45) DEFAULT NULL,
  `spouse_middle_name` varchar(45) DEFAULT NULL,
  `spouse_last_name` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `employer` varchar(45) DEFAULT NULL,
  `business_address` varchar(45) DEFAULT NULL,
  `spouse_tel_no` varchar(45) DEFAULT NULL,
  `father_first_name` varchar(45) NOT NULL,
  `father_middle_name` varchar(45) NOT NULL,
  `father_last_name` varchar(45) NOT NULL,
  `mother_first_name` varchar(45) NOT NULL,
  `mother_middle_name` varchar(45) NOT NULL,
  `mother_last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`bg_id`),
  CONSTRAINT `bg_id` FOREIGN KEY (`bg_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_background`
--

LOCK TABLES `user_background` WRITE;
/*!40000 ALTER TABLE `user_background` DISABLE KEYS */;
INSERT INTO `user_background` VALUES (1,'','','','','','','','MLGregorio','MLGregorio','MLGregorio','MLGregorio','MLGregorio','MLGregorio'),(2,'','','','','','','','wqertyu','qwerty','wqerty','werty','werty','werty');
/*!40000 ALTER TABLE `user_background` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_educ`
--

DROP TABLE IF EXISTS `user_educ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_educ` (
  `educ_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `elementary` varchar(100) NOT NULL,
  `secondary` varchar(100) NOT NULL,
  `college` varchar(100) DEFAULT NULL,
  `post_grad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`educ_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_educ`
--

LOCK TABLES `user_educ` WRITE;
/*!40000 ALTER TABLE `user_educ` DISABLE KEYS */;
INSERT INTO `user_educ` VALUES (1,2,'wqertyu,wert,','wertyui,werty,','werty,,qwertyui',',,');
/*!40000 ALTER TABLE `user_educ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  `gender` enum('m','f') DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `blood_type` enum('o','a','b','ab') DEFAULT NULL,
  `residential_address` varchar(45) DEFAULT NULL,
  `residential_zip` int(4) DEFAULT NULL,
  `residential_tel_no` varchar(45) DEFAULT NULL,
  `permanent_address` varchar(45) DEFAULT NULL,
  `permanent_zip` int(4) DEFAULT NULL,
  `permanent_tel_no` varchar(45) DEFAULT NULL,
  `citizenship` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `sss_no` int(11) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `philhealth_no` int(11) DEFAULT NULL,
  `pagibig_id_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'marc','lawrence','gregorio','2018-06-01','MLGregorio','123456789','m','3456',234,'a','MLGregorio',2134,'12345','MLGregorio',3245,'123456','MLGregorio','MLGregorio','married',234567,2435678,2345678,2345678),(2,'hello','rw6etyuio','wqeyuiyr','2018-06-14','qwretyu','678123456','f','wqerty',231,'a','13233213213',2321,'1232132','21321123213',1321,'1321321','wqertyu','wqertyui','annulled',12345678,2134567890,2134567890,213456789);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_offspring`
--

DROP TABLE IF EXISTS `user_offspring`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_offspring` (
  `off_id` int(11) NOT NULL AUTO_INCREMENT,
  `child_name` varchar(50) DEFAULT NULL,
  `child_birth_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`off_id`),
  UNIQUE KEY `user_id_UNIQUE` (`off_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='name and birthdate of the child/children of user';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_offspring`
--

LOCK TABLES `user_offspring` WRITE;
/*!40000 ALTER TABLE `user_offspring` DISABLE KEYS */;
INSERT INTO `user_offspring` VALUES (1,'','0000-00-00',1),(2,'wqertyu','2018-06-12',2);
/*!40000 ALTER TABLE `user_offspring` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-14 13:58:24
