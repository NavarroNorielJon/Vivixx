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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `departments` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `announcement` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`announcement_id`),
  UNIQUE KEY `announcement_id_UNIQUE` (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `announcement_attachments`
--

DROP TABLE IF EXISTS `announcement_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcement_attachments` (
  `attachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment` longblob,
  `attachment_name` varchar(100) DEFAULT NULL,
  `announcement_id` int(11) NOT NULL,
  PRIMARY KEY (`attachment_id`),
  UNIQUE KEY `attachment_it_UNIQUE` (`attachment_id`),
  KEY `announcement_id_idx` (`announcement_id`),
  CONSTRAINT `announcement_id` FOREIGN KEY (`announcement_id`) REFERENCES `announcement` (`announcement_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emergency_info_sheet`
--

DROP TABLE IF EXISTS `emergency_info_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emergency_info_sheet` (
  `eis_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coordinates` varchar(500) NOT NULL,
  `main_address` varchar(100) NOT NULL,
  `secondary_address` varchar(100) NOT NULL,
  `provincial_address` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `hmate_id` int(11) DEFAULT NULL,
  `relative_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`eis_id`),
  UNIQUE KEY `eis_id_UNIQUE` (`eis_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `relative_id_idx` (`relative_id`),
  KEY `hmate_id` (`hmate_id`),
  CONSTRAINT `info_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emp_attendance`
--

DROP TABLE IF EXISTS `emp_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time DEFAULT '00:00:00',
  `time_out` time NOT NULL DEFAULT '00:00:00',
  `total_work_hours` time DEFAULT '00:00:00',
  `total_break_hours` time DEFAULT '00:00:00',
  `total_hours` time DEFAULT '00:00:00',
  `overtime_hours` time DEFAULT '00:00:00',
  `emp_status` enum('On Time','Late','Absent','Excused') DEFAULT NULL,
  `salary_deduction` double DEFAULT NULL,
  `absence_status` varchar(50) DEFAULT NULL,
  `absence_reason` varchar(100) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `user_id_attendance_idx` (`user_id`),
  KEY `shift_id_fk_idx` (`shift_id`),
  CONSTRAINT `shift_id_fk` FOREIGN KEY (`shift_id`) REFERENCES `emp_shifts` (`shift_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `user_attendance_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emp_logs`
--

DROP TABLE IF EXISTS `emp_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL DEFAULT '00:00:00',
  `time_out` time DEFAULT '00:00:00',
  PRIMARY KEY (`log_id`),
  KEY `emplogs_users_idx` (`user_id`),
  CONSTRAINT `emplogs_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `emp_shifts`
--

DROP TABLE IF EXISTS `emp_shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emp_shifts` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shiftday` enum('Sun','Mon','Tue','Wed','Thu','Fri','Sat') NOT NULL,
  `shiftStart` time NOT NULL,
  `shiftEnd` time NOT NULL,
  PRIMARY KEY (`shift_id`),
  KEY `emplid_idx` (`user_id`),
  CONSTRAINT `emplid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_info` (
  `employee_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `persona` varchar(45) DEFAULT NULL,
  `mobile_number` varchar(45) DEFAULT NULL,
  `landline` varchar(45) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `account` varchar(200) DEFAULT NULL,
  `comp_email` varchar(45) DEFAULT NULL,
  `comp_email_password` varchar(45) DEFAULT NULL,
  `skype` varchar(45) DEFAULT NULL,
  `skype_password` varchar(45) DEFAULT NULL,
  `qq_number` varchar(45) DEFAULT NULL,
  `qq_password` varchar(45) DEFAULT NULL,
  `date_hired` date DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `employee_status` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `used` int(11) DEFAULT '0',
  `credits` int(11) DEFAULT '5',
  PRIMARY KEY (`employee_info_id`),
  UNIQUE KEY `tutor_info_id_UNIQUE` (`employee_info_id`),
  KEY `tutor_idx` (`user_id`),
  CONSTRAINT `tutor` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `housemates`
--

DROP TABLE IF EXISTS `housemates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `housemates` (
  `housemate_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) DEFAULT NULL,
  `h_name` varchar(100) DEFAULT NULL,
  `h_number` varchar(30) DEFAULT NULL,
  `h_relationship` varchar(45) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`housemate_id`),
  KEY `house-emer_idx` (`h_id`),
  CONSTRAINT `house-emer` FOREIGN KEY (`h_id`) REFERENCES `emergency_info_sheet` (`hmate_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `position` varchar(45) DEFAULT NULL,
  `date_hired` date NOT NULL,
  `date_filed` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `status` enum('accepted','rejected','pending') NOT NULL DEFAULT 'pending',
  `used` int(11) DEFAULT '0',
  `remaining` int(11) DEFAULT '5',
  PRIMARY KEY (`leave_req_id`),
  UNIQUE KEY `leave_req_id_UNIQUE` (`leave_req_id`),
  KEY `leave-user_idx` (`user_id`),
  CONSTRAINT `leave-user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` enum('new','read') NOT NULL,
  PRIMARY KEY (`id_notification`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_notif` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `relatives`
--

DROP TABLE IF EXISTS `relatives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relatives` (
  `relative_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `r_name` varchar(100) DEFAULT NULL,
  `r_number` varchar(30) DEFAULT NULL,
  `r_relationship` varchar(45) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`relative_id`),
  KEY `r_id_idx` (`r_id`),
  CONSTRAINT `r-emer` FOREIGN KEY (`r_id`) REFERENCES `emergency_info_sheet` (`relative_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `ip_address` varchar(45) NOT NULL,
  `recipient` varchar(15) NOT NULL,
  `port` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_rfid` varchar(10) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` date NOT NULL,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `type` enum('admin','user') NOT NULL DEFAULT 'user',
  `in_session` enum('0','1') NOT NULL DEFAULT '0',
  `user_type` varchar(45) NOT NULL DEFAULT 'teacher',
  PRIMARY KEY (`user_id`,`username`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `emp_rfid_UNIQUE` (`emp_rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=10090 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_background`
--

DROP TABLE IF EXISTS `user_background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_background` (
  `user_id` int(11) NOT NULL,
  `spouse_first_name` varchar(45) DEFAULT NULL,
  `spouse_middle_name` varchar(45) DEFAULT NULL,
  `spouse_last_name` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `employer` varchar(45) DEFAULT NULL,
  `business_address` varchar(45) DEFAULT NULL,
  `spouse_tel_no` varchar(45) DEFAULT NULL,
  `father_first_name` varchar(45) NOT NULL,
  `father_middle_name` varchar(45) DEFAULT NULL,
  `father_last_name` varchar(45) NOT NULL,
  `mother_first_name` varchar(45) NOT NULL,
  `mother_middle_name` varchar(45) DEFAULT NULL,
  `mother_last_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `bg_id_UNIQUE` (`user_id`),
  CONSTRAINT `bg_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  UNIQUE KEY `educ_id_UNIQUE` (`educ_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `prof_image` mediumblob,
  `signature` mediumblob,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(45) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  `facebook_link` varchar(100) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `blood_type` varchar(2) DEFAULT NULL,
  `residential_address` varchar(45) DEFAULT NULL,
  `residential_zip` int(4) DEFAULT NULL,
  `residential_tel_no` varchar(45) DEFAULT NULL,
  `permanent_address` varchar(45) DEFAULT NULL,
  `permanent_zip` int(4) DEFAULT NULL,
  `permanent_tel_no` varchar(45) DEFAULT NULL,
  `citizenship` varchar(45) DEFAULT NULL,
  `civil_status` varchar(45) DEFAULT NULL,
  `sss_no` varchar(45) DEFAULT NULL,
  `tin` varchar(45) DEFAULT NULL,
  `philhealth_no` varchar(45) DEFAULT NULL,
  `pagibig_id_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `n_id` int(11) NOT NULL,
  PRIMARY KEY (`off_id`),
  KEY `userid_idx` (`user_id`),
  CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='name and birthdate of the child/children of user';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-27 17:32:47
