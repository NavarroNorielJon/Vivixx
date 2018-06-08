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
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `visitpages` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE
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
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_registered` date NOT NULL,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('gregoriorenz','marc@gmail.com','$2y$10$nMEchw60dFTvOeeqpE/ZaO5kKWS/QI3y07adccJUKEOeRU9MHMvsW','2018-06-08','enabled','user'),('norielnavarro','noriel@gmail.com','$2y$10$b6fcyB/umBYz.3vIt56.u..JReJfVbPpp1XIuJnFff9QMyUN19y76','2018-06-05','enabled','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `birth_place` varchar(45) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `height` varchar(11) NOT NULL,
  `weight` int(3) NOT NULL,
  `blood_type` enum('o','a','b','ab') NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `residential_zip` smallint(4) NOT NULL,
  `residential_tel_no` int(7) DEFAULT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `permanent_zip` smallint(4) NOT NULL,
  `permanent_tel_no` int(7) DEFAULT NULL,
  `citizenship` varchar(45) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `civil_status` enum('single','married','widowed','annulled','separated','other') NOT NULL,
  `sss_no` int(11) DEFAULT NULL,
  `tin` int(11) DEFAULT NULL,
  `philhealth_no` int(11) DEFAULT NULL,
  `pagibig_id_no` int(11) DEFAULT NULL,
  UNIQUE KEY `user_id_UNIQUE` (`username`),
  CONSTRAINT `user` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES ('gregoriorenz','qewqe','weqeqe','wqeqwewqewqewq','2018-06-20','qwewq','09653346612','m','5\'8',232,'o','wewqeqweqw',2316,0,'qwewqeqwe',2316,0,'qwewqewq','qewqwqeq','single',0,0,0,0),('norielnavarro','noriel','','navarro','1998-12-16','','09653346611','m','0',0,'o','429 dalisay, rose park, concepcion, tarlac',0,NULL,'',0,NULL,'','','single',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-08 14:13:39
