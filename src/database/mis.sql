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
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('gregorio',13,'gregorio@gmail.com','$2y$10$Jjtf1JTMDAe7PudECXY2uulyMoR7GFESp2ZAIGZO1PGWbIBt4lc1W','2018-06-13','enabled','user'),('gregoriorenz',12,'gregoriorenz@gmail.com','$2y$10$gn8kN5XswbF/LhtG9RCdoOPUhVn5FHI/6HnWuu1cWaAQuXQWPLgii','2018-06-12','enabled','user'),('marc1234',8,'marc1234@gmail.com','$2y$10$dtWYv56w.prmPXio2c6UOOpnHaudp3AhtkCGKBi8JZ4uRrBDYXv2K','2018-06-12','enabled','user'),('norielj',10,'noriel@gmail.com','$2y$10$pvceVzKF0QuZIsPex.N22e.f0WGu1gFcuwvLnjQrJbfMsETxvArg2','2018-06-12','enabled','user'),('norieljon',9,'norieljon@email.com','$2y$10$ph5R6IThhzW6DXDu/dHnX.KBncFqMAPN5KhC/NEpK0TQEjLGqgroy','2018-06-12','enabled','user');
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
INSERT INTO `user_background` VALUES (8,'','','','','','','','mike','fidel','ramos','mama','bigmom','kaido'),(12,'','','','','','','','okimwa','navarro','abuiza','noriel','pangilinan','navarro');
/*!40000 ALTER TABLE `user_background` ENABLE KEYS */;
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
INSERT INTO `user_info` VALUES (8,'Marc Lawrence','Sison','Gregorio','1998-12-13','Quezon City','09653346612','m','5\'7',55,'o','429 Dalisay St. Caluluan, Concepcion, Tarlac',2316,'09653346612','429 Dalisay St. Caluluan, Concepcion, Tarlac',2316,'09653346612','Filipino','Catholic','single',213133,21323113,123212131,132131212),(9,'Noriel','Pangilinan','Navarro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'Noriel jon','Pangilinan','Navarro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'Marc Lawrence','Sison','Gregorio','1998-12-13','quezon city','09653346613','m','5\'7',60,'o','429 Dalisay St. Caluluan, Concepcion, Tarlac',2316,'09653346612','429 Dalisay St. Caluluan, Concepcion, Tarlac',2316,'09653346612','Filipino','Catholic','Others',13121123,132131231,132131213,2147483647),(13,'Marc Lawrence','Sison','Gregorio','2018-06-14',NULL,'09123456789','m','131',123,'a','qwertuio',1234,'2131212','qwertuio',1232,'2131231','qwertuio','qwertuio','single',1232131313,2147483647,12313,3123);
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
  `child_name` varchar(50) NOT NULL,
  `child_birth_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`off_id`),
  UNIQUE KEY `user_id_UNIQUE` (`off_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='name and birthdate of the child/children of user';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_offspring`
--

LOCK TABLES `user_offspring` WRITE;
/*!40000 ALTER TABLE `user_offspring` DISABLE KEYS */;
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

-- Dump completed on 2018-06-13 14:45:39
