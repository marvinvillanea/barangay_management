-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: barangay_management
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barangay_officials`
--

DROP TABLE IF EXISTS `barangay_officials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barangay_officials` (
  `brg_id` int NOT NULL AUTO_INCREMENT,
  `brg_position` varchar(255) NOT NULL,
  `brg_year_declered` date DEFAULT NULL,
  `rank` int NOT NULL DEFAULT '0',
  `user_id` int DEFAULT NULL,
  `resident_id` int DEFAULT NULL,
  PRIMARY KEY (`brg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangay_officials`
--

LOCK TABLES `barangay_officials` WRITE;
/*!40000 ALTER TABLE `barangay_officials` DISABLE KEYS */;
/*!40000 ALTER TABLE `barangay_officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blotter`
--

DROP TABLE IF EXISTS `blotter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blotter` (
  `idblotter` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idblotter`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blotter`
--

LOCK TABLES `blotter` WRITE;
/*!40000 ALTER TABLE `blotter` DISABLE KEYS */;
INSERT INTO `blotter` VALUES (2,'Marvin T. Villanea','dsafdsafsad','2022-11-25 05:14:23','2022-11-25 05:14:23');
/*!40000 ALTER TABLE `blotter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `household_head`
--

DROP TABLE IF EXISTS `household_head`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `household_head` (
  `resident_id` int NOT NULL AUTO_INCREMENT,
  `household_no` int DEFAULT NULL,
  `id_no` int DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `house_status` varchar(255) DEFAULT NULL,
  `house_head` varchar(40) DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `prk_id` int DEFAULT NULL,
  `resident_id1` int DEFAULT NULL,
  PRIMARY KEY (`resident_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household_head`
--

LOCK TABLES `household_head` WRITE;
/*!40000 ALTER TABLE `household_head` DISABLE KEYS */;
INSERT INTO `household_head` VALUES (69,123,2321,'uploads/12321-1_EComvNu0UXdXSwPMp7vv2Q@2x.jpeg','321312','12321','3123','221','2022-11-25','Gender','12321','Registered','Owner','house head','2022-11-25',3,9,NULL);
/*!40000 ALTER TABLE `household_head` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purok`
--

DROP TABLE IF EXISTS `purok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purok` (
  `prk_id` int NOT NULL AUTO_INCREMENT,
  `purok_no` varchar(40) DEFAULT NULL,
  `purok_leader` varchar(40) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`prk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purok`
--

LOCK TABLES `purok` WRITE;
/*!40000 ALTER TABLE `purok` DISABLE KEYS */;
INSERT INTO `purok` VALUES (9,'1','Marvin T. Villanea',3);
/*!40000 ALTER TABLE `purok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `report_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `report_datetime` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (170,'Admin','Marvin T. Villanea Purok Leader is Registered','2022-11-25 12:39:33',3),(171,'Admin','Marvin T. Villanea is Registered','2022-11-25 12:40:21',3),(172,'Admin','The Barangay Captain Marvin T. Villanea has been successfully registered','2022-11-25 12:46:04',3),(173,'Admin','Marvin T. Villanea Blotter','2022-11-25 13:13:57',3),(174,'Admin','Marvin T. Villanea Blotter','2022-11-25 13:14:23',3),(175,'secretary','secretary is logged in','2022-11-25 13:19:26',4),(176,'admin','admin is logged in','2022-11-25 13:21:28',3),(177,'Admin','Marvin T. Villanea Purok Leader is Registered','2022-11-25 13:21:51',3),(178,'Admin','12321 2. 3123 is Registered','2022-11-25 13:22:12',3);
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `transaction_item` varchar(255) NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `ctc_no` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `resident_id` int DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_type` int DEFAULT NULL,
  `profile_user` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'admin','admin','marvin_bound@yahoo.com',1,'uploads/-admin-image-png-3.png'),(4,'secretary','secretary','kathrynne@gmail.com',0,'uploads/-206881.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-25 13:24:01
