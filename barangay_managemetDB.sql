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
  `rank` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `resident_id` int DEFAULT NULL,
  PRIMARY KEY (`brg_id`),
  KEY `users_barangay_officials` (`user_id`),
  KEY `household_head_barangay_officials` (`resident_id`),
  CONSTRAINT `household_head_barangay_officials` FOREIGN KEY (`resident_id`) REFERENCES `household_head` (`resident_id`),
  CONSTRAINT `users_barangay_officials` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangay_officials`
--

LOCK TABLES `barangay_officials` WRITE;
/*!40000 ALTER TABLE `barangay_officials` DISABLE KEYS */;
INSERT INTO `barangay_officials` VALUES (1,'Barangay Captain','2019-03-03',0,3,1),(2,'Barangay Secretary','2019-03-03',0,3,2),(3,'Barangay Kagawad','2019-03-03',1,3,10),(4,'Barangay Kagawad','2019-03-03',2,3,18),(5,'Barangay Kagawad','2019-03-03',3,3,14),(6,'Barangay Kagawad','2019-03-03',4,3,12),(7,'Barangay Kagawad','2019-03-03',5,3,11),(8,'Barangay Kagawad','2019-03-03',6,3,17),(9,'Barangay Kagawad','2019-03-03',7,3,28),(10,'Barangay Kagawad','2019-03-03',8,3,29),(11,'Barangay Kagawad','2019-03-03',9,3,15),(12,'Barangay Kagawad','2019-03-03',10,3,19),(13,'Barangay Kagawad','2019-03-03',11,3,20),(14,'Barangay Kagawad','2019-03-03',12,3,31);
/*!40000 ALTER TABLE `barangay_officials` ENABLE KEYS */;
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
  PRIMARY KEY (`resident_id`),
  KEY `users_household_head` (`user_id`),
  KEY `purok_household_head` (`prk_id`),
  KEY `household_head_household_head` (`resident_id1`),
  CONSTRAINT `household_head_household_head` FOREIGN KEY (`resident_id1`) REFERENCES `household_head` (`resident_id`),
  CONSTRAINT `purok_household_head` FOREIGN KEY (`prk_id`) REFERENCES `purok` (`prk_id`),
  CONSTRAINT `users_household_head` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `household_head`
--

LOCK TABLES `household_head` WRITE;
/*!40000 ALTER TABLE `household_head` DISABLE KEYS */;
INSERT INTO `household_head` VALUES (1,1222,221,'uploads/marvin--admin-image-png-3.png','marvin','marvin','villanea','tapere','2000-06-20','Male','captain','Registered','Owner','house head','2019-03-02',3,1,NULL),(2,123,123,'uploads/kathyrnne-206881.png','kath','kathyrnne','to','madridano','2001-07-31','Female','secretary','Registered','Owner','house head','2019-03-02',3,2,NULL),(3,142,124,'uploads/jerald-26734052_983420098493812_8962454840407546309_n.jpg','jerald','jerald','remullo','bibik','2001-01-07','Male','purok leader','Registered','Owner','house head','2019-03-02',3,1,NULL),(4,1234,1234,'uploads/chandler-52896732_2194261347333077_2598061679111569408_n.jpg','ramon','chandler','manugas','ramonito','1998-05-08','Male','it','Registered','Rent','house head','2019-03-02',3,2,NULL),(5,1245,1321,'uploads/dave-48381885_2372488819460149_5528017853669703680_n.jpg','dave','dave','mosqueda','mosqueda','2000-05-29','Male','it','Registered','Rent','house head','2019-03-02',3,3,NULL),(6,156,154,'uploads/luzzane-40634320_518951331909352_6467248508914106368_n.jpg','luzzane','luzzane','villanueva','caballo','2000-06-22','Male','it','Registered','Rent','house head','2019-03-02',3,4,NULL),(7,1232,52,'uploads/duanne-52769404_1989197621382614_300047381666201600_n.jpg','june','duanne','june','duanne','2000-06-05','Male','it','Registered','Owner','house head','2019-03-02',3,5,NULL),(8,465,53,'uploads/alexander-51177897_320580548803011_7623225985831272448_n.jpg','godwin','alexander','austria','collins','2000-02-03','Male',' it','Registered','Owner','house head','2019-03-02',3,6,NULL),(9,1231,12341,'uploads/john-27972576_2042272986095047_8534504383577241189_n.jpg','mulawin','john','mulawan','tupas','2000-10-31','Male','it','Registered','Owner','house head','2019-03-02',3,7,NULL),(10,5465,2131,'uploads/bon-41827830_1725497584239273_884236442287472640_n.jpg','bon','bon','nunez','canizares','2000-04-09','Male','it','Registered','Owner','house head','2019-03-02',3,1,NULL),(11,23,145,'uploads/Jed angelo-11035610_1547077645565976_896262530675108690_n.jpg','jedy','Jed angelo','Manubag','oyan','2000-01-22','Male','student','Registered','Rent','house head','2019-03-02',3,1,NULL),(12,86,21,'uploads/Rotche-13533204_609229475912407_5732213812730285591_n.jpg','rotse','Rotche','ramirez','canoy','2000-02-15','Female','student','Registered','Owner','house head','2019-03-02',3,3,NULL),(13,33,11,'uploads/vincent-20708018_727515174100333_1908299389067957242_n.jpg','vincent','vincent','hingco','col','2000-04-07','Male','student','Registered','Rent','house head','2019-03-02',3,4,NULL),(14,5,125,'uploads/Ella-20799183_1455137587901395_4555968962055940883_n.jpg','ella','Ella','luna','canete','1999-11-13','Female','student','Registered','Rent','house head','2019-03-02',3,2,NULL),(15,47,144,'uploads/nico-23795438_348406792288881_7453815162816437904_n.jpg','nico','nico','esarza','gamutin','2001-03-20','Male','student','Registered','Owner','house head','2019-03-02',3,5,NULL),(16,642,101,'uploads/hazel-26804348_860580014123423_7137453201597621376_n.jpg','hazel','hazel','baliquig','baruman','2001-05-27','Female','student','Registered','Owner','house head','2019-03-02',3,1,NULL),(17,1,55,'uploads/zennel-39265781_1094555990694755_8137484187075608576_n.jpg','zenny','zennel','batiao','cagalawan','2000-05-09','Female','student','Registered','Rent','house head','2019-03-02',3,6,NULL),(18,245,10,'uploads/johnben-44310995_1037363933093136_4295383100373860352_n.jpg','aren','johnben','latoza','ocsio','2001-06-11','Female','student','Registered','Rent','house head','2019-03-02',3,7,NULL),(19,249,778,'uploads/angelica-46440571_1150347758454789_2796916268324618240_n.jpg','gecka','angelica','sombreno','barbero','1999-07-03','Female','student','Registered','Owner','house head','2019-03-02',3,4,NULL),(20,475,541,'uploads/stephanie-49454376_2088820237852088_3838951213521436672_n.jpg','step','stephanie','dela cerna','orate','1999-04-20','Female','student','Registered','Rent','house head','2019-03-02',3,5,NULL),(21,1222,211,'uploads/junior-Penguins.jpg','sadf','junior','villanea1','tapere1','2009-02-22','Male','student','Registered','Rent','family member','2019-03-02',3,1,1),(22,1222,512,'uploads/raymart-12246688_529753087181693_518200069100512857_n.jpg','raymart','raymart','villanea','tapere','2003-07-05','Male','student','Registered','Rent','family member','2019-03-02',3,1,1),(23,142,58,'uploads/Ester-10426711_684880118251620_4670109598342862578_n.jpg','buddy','Ester','remullo','bibik','2006-01-01','Male','student','Registered','Rent','family member','2019-03-02',3,1,3),(24,142,227,'uploads/klyde-10391022_405054169663744_7535954107558158282_n.jpg','klyde','klyde','remullo','bibik','2002-10-24','Male','student','Registered','Rent','family member','2019-03-02',3,1,3),(25,5465,219,'uploads/Rodney-19894907_1273966776059025_6509885450104692138_n.jpg','rodney','Rodney','nunez','canizares','2002-05-23','Male','student','Registered','Rent','family member','2019-03-02',3,1,10),(26,5465,477,'uploads/maria-15202782_1050707361718302_5421313999491846303_n.jpg','maria','maria','nunez','canizares','2005-12-31','Female','student','Registered','Rent','family member','2019-03-02',3,1,10),(27,23,52,'uploads/louie-gg-boy.jpg','louie','louie','Manubag','oyan','2007-09-25','Male','student','Registered','Rent','family member','2019-03-02',3,1,11),(28,23,824,'uploads/rhea-333b1d41137f74c2cea6f57ed65b41ba.jpg','rhea','rhea','manubag','oyan','2009-03-27','Female','student','Registered','Rent','family member','2019-03-02',3,1,11),(29,642,23,'uploads/lea-14358998_610982065749887_1047856738309134914_n.jpg','lea','lea','baliquig','baruman','2003-08-24','Female','student','Registered','Rent','family member','2019-03-02',3,1,16),(30,642,32,'uploads/rhona-images.jpg','rhona','rhona','baliquig','baruman','2009-11-17','Male','student','Registered','Rent','family member','2019-03-02',3,1,16),(31,123,325,'uploads/katie-30652403_2074139166204566_4199722569395339264_n.jpg','katie','katie','to','madridano','2008-06-08','Female','student','Registered','Rent','family member','2019-03-02',3,2,2),(32,123,874,'uploads/carl-19149455_1849340905385839_6272654894145485729_n.jpg','carl','carl','to','madridano','2008-10-07','Male','student','Registered','Rent','family member','2019-03-02',3,2,2),(33,1234,721,'uploads/ramon-10253885_807703409322218_246964278853105679_n.jpg','ramon','ramon','manugas','ramonito','2006-09-25','Male','student','Registered','Rent','family member','2019-03-02',3,2,4),(34,1234,97,'uploads/satur-12832382_1032932433465980_4582268017747981402_n.jpg','satur','satur','manugas','ramonito','2001-04-21','Male','student','Registered','Rent','family member','2019-03-02',3,2,4),(35,5,65,'uploads/zia-10906252_754921194589708_7249802164314601636_n.jpg','zia','zia','luna','canete','2005-12-13','Female','student','Registered','House Status','family member','2019-03-02',3,2,14),(36,5,33,'uploads/rewell-40603767_2170871643150632_2468169794927460352_n.jpg','rewell','rewell','luna','canete','2003-08-11','Male','student','Registered','House Status','family member','2019-03-02',3,2,14),(37,1245,4,'uploads/david-ss.jpg','david','david','mosqueda','scera`','2009-02-04','Male','student','Registered','House Status','family member','2019-03-02',3,3,5),(38,1245,229,'uploads/marie-30727391_2108573346093402_5014048105056281261_n.jpg','marie','marie','mosqueda','scera','2007-06-06','Female','student','Registered','House Status','family member','2019-03-02',3,3,5),(39,156,86,'uploads/losano-13124889_1112121612185945_3193233371621646853_n.jpg','losano','losano','villanueva','caballo','2003-11-20','Male','student','Registered','House Status','family member','2019-03-02',3,4,6),(40,156,541,'uploads/tristan-579045_499344063463706_9019653_n.jpg','tristan','tristan','villanueva','caballo','2010-04-05','Male','student','Registered','Rent','family member','2019-03-02',3,4,6),(41,86,5,'uploads/jairus-28277007_1636750739744767_374453202383010931_n.jpg','jairus','jairus','ramirez','canoy','2009-01-22','Male','student','Registered','House Status','family member','2019-03-02',3,3,12),(42,86,99,'uploads/rojin-45146039_1445830352216486_6644648568252530688_n.jpg','rojin','rojin','ramirez','canoy','2003-02-05','Male','student','Registered','Rent','family member','2019-03-02',3,3,12),(43,86,99,'uploads/rojin-45146039_1445830352216486_6644648568252530688_n.jpg','rojin','rojin','ramirez','canoy','2003-02-05','Male','student','Registered','Rent','family member','2019-03-02',3,3,12),(44,33,552,'uploads/veronica-collectmoney-web.jpg','nica`','veronica','hingco','c','2010-12-03','Female','student','Registered','Rent','family member','2019-03-02',3,4,13),(45,33,740,'uploads/diane-170227-hlth-A2.jpg','diane','diane','hingco','c','2011-11-04','Female','student','Registered','Rent','family member','2019-03-02',3,4,13),(46,249,302,'uploads/glory-10337698_334307340058839_6258807148568096695_n.jpg','glory','glory','sombreno','barbero','2009-12-09','Female','student','Registered','Rent','family member','2019-03-02',3,4,19),(47,249,178,'uploads/christine-15542451_725012210988348_4487277716617318658_n.jpg','christine','christine','sombreno','barbero','2002-05-23','Female','student','Registered','House Status','family member','2019-03-02',3,4,19),(48,1232,22,'uploads/wayne-14344160_1584835975152116_72717672051104418_n.jpg','wayne','wayne','june','d','2003-07-30','Male','student','Registered','Rent','family member','2019-03-02',3,5,7),(49,1232,812,'uploads/lorna-14102422_1576161959352851_6737225595847226592_n.jpg','lorna','lorna','june','d','2002-05-24','Male','student','Registered','Rent','family member','2019-03-02',3,5,7),(50,47,74,'uploads/jayson-50851670_2109194966060020_9219633121794719744_n.jpg','jayson','jayson','esarza','gamutin','2005-12-12','Male','student','Registered','House Status','family member','2019-03-02',3,5,15),(51,47,411,'uploads/jay-51661754_2111213645858152_3186014222005829632_n.jpg','jay','jay','esarza','gamutin','2007-02-02','Male','student','Registered','Rent','family member','2019-03-02',3,5,15),(52,47,411,'uploads/jay-51661754_2111213645858152_3186014222005829632_n.jpg','jay','jay','esarza','gamutin','2007-02-02','Male','student','Registered','Rent','family member','2019-03-02',3,5,15),(53,475,20,'uploads/tiffany-13254238_1050994298301359_5413345790506432310_n.jpg','tiff','tiffany','dela cerna','orate','2002-10-19','Female','student','Registered','Rent','family member','2019-03-02',3,5,20),(54,475,59,'uploads/kelly-sa.jpg','kelly','kelly','dela cerna','orate','2010-07-27','Female','student','Registered','House Status','family member','2019-03-02',3,5,20),(55,465,678,'uploads/jet-51708262_322847601909639_3801025917858349056_n.jpg','jet','jet','austria','c','2008-04-07','Male','student','Registered','House Status','family member','2019-03-02',3,6,8),(56,465,89,'uploads/alex-45280385_265155601012173_1331205481099689984_o.jpg','alex','alex','austria','c','2001-11-20','Male','student','Registered','House Status','family member','2019-03-02',3,6,8),(57,1231,378,'uploads/topher-26239886_2023654207956925_4029671396270342092_n.jpg','topher','topher','mulawan','tupas','2004-04-27','Male','student','Registered','House Status','family member','2019-03-02',3,7,9),(58,1231,665,'uploads/joshua-20708019_1936915199881786_7124019998021189199_n.jpg','josh','joshua','mulawan','tupas','2006-04-01','Male','student','Registered','House Status','family member','2019-03-02',3,7,9),(59,245,230,'uploads/grace-1463535_232775570218647_722964472_n.jpg','grace','grace','latoza','ocsio','2009-02-05','Female','student','Registered','House Status','family member','2019-03-02',3,7,18),(60,245,230,'uploads/jeremiah-931362_458523064238444_1975832863_n (1).jpg','jerry','jeremiah','latoza','ocsio','2002-12-02','Male','student','Registered','Rent','family member','2019-03-02',3,7,18),(61,21345,2134566,'uploads/logo-46762504_344086989473686_7591409864534917120_n.jpg','logo','logo','logo','logo','2000-02-02','Male','afdsaf','Registered','Owner','house head','2019-03-04',3,1,NULL),(62,132421,1242512,'uploads/carc-612scaglietti.jpg','car','carc','car','car','0555-12-24','Male','asdfdasf','Registered','Owner','house head','2019-03-04',3,7,NULL);
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
  PRIMARY KEY (`prk_id`),
  KEY `users_purok` (`user_id`),
  CONSTRAINT `users_purok` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purok`
--

LOCK TABLES `purok` WRITE;
/*!40000 ALTER TABLE `purok` DISABLE KEYS */;
INSERT INTO `purok` VALUES (1,'1','Jerald B. Remullo',3),(2,'2','Chandler R. Manugas',3),(3,'3','Dave M. Mosqueda',3),(4,'4','Luzzane C. Villanueva',3),(5,'5','Duanne D. June',3),(6,'6','Alexander C. Austria',3),(7,'7','John T. Mulawan',3);
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
  PRIMARY KEY (`report_id`),
  KEY `users_reports` (`user_id`),
  CONSTRAINT `users_reports` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (5,'admin','admin is logged in','2019-03-02 16:43:04',3),(6,'secretary','secretary is logged in','2019-03-02 16:43:18',4),(7,'admin','admin is logged in','2019-03-02 16:43:28',3),(8,'Admin','Marvin T. Villanea is Registered','2019-03-02 16:44:15',3),(9,'Admin','Kathyrnne M. To is Registered','2019-03-02 16:46:14',3),(10,'Admin','The Barangay Captain Marvin T. Villanea has been successfully registered','2019-03-02 16:46:25',3),(11,'Admin','The Barangay Secretary Kathyrnne M. To has been successfully registered','2019-03-02 16:46:37',3),(12,'Admin','Jerald B. Remullo is Registered','2019-03-02 16:48:43',3),(13,'Admin','Jerald B. Remullo Purok Leader is Registered','2019-03-02 16:50:56',3),(14,'Admin','Chandler R. Manugas is Registered','2019-03-02 16:53:47',3),(15,'Admin','Dave M. Mosqueda is Registered','2019-03-02 16:55:05',3),(16,'Admin','Chandler R. Manugas Purok Leader is Registered','2019-03-02 16:55:19',3),(17,'Admin','Dave M. Mosqueda Purok Leader is Registered','2019-03-02 16:55:26',3),(18,'admin','Marvin T. Villanea is Updated','2019-03-02 16:56:12',3),(19,'admin','Kathyrnne M. To is Updated','2019-03-02 16:56:27',3),(20,'Admin','Luzzane C. Villanueva is Registered','2019-03-02 16:58:31',3),(21,'Admin','Duanne D. June is Registered','2019-03-02 17:00:06',3),(22,'Admin','Alexander C. Austria is Registered','2019-03-02 17:01:47',3),(23,'Admin','John T. Mulawan is Registered','2019-03-02 17:04:15',3),(24,'Admin','Bon C. Nunez is Registered','2019-03-02 17:05:24',3),(25,'Admin','Luzzane C. Villanueva Purok Leader is Registered','2019-03-02 17:05:42',3),(26,'Admin','Duanne D. June Purok Leader is Registered','2019-03-02 17:05:51',3),(27,'Admin','Alexander C. Austria Purok Leader is Registered','2019-03-02 17:05:58',3),(28,'Admin','John T. Mulawan Purok Leader is Registered','2019-03-02 17:06:07',3),(29,'admin','Jerald B. Remullo is Updated','2019-03-02 17:07:16',3),(30,'admin','Chandler R. Manugas is Updated','2019-03-02 17:07:32',3),(31,'admin','Dave M. Mosqueda is Updated','2019-03-02 17:07:48',3),(32,'admin','Luzzane C. Villanueva is Updated','2019-03-02 17:08:03',3),(33,'admin','Duanne D. June is Updated','2019-03-02 17:08:24',3),(34,'admin','Alexander C. Austria is Updated','2019-03-02 17:08:52',3),(35,'admin','John T. Mulawan is Updated','2019-03-02 17:09:09',3),(36,'admin','Marvin T. Villanea is Updated','2019-03-02 17:11:27',3),(37,'admin','Marvin T. Villanea is Updated','2019-03-02 17:12:15',3),(38,'admin','admin is logged in','2019-03-02 17:14:31',3),(39,'Admin','secretary is Deleted','2019-03-02 17:26:37',3),(40,'Admin','secretary is Deleted','2019-03-02 17:26:39',3),(41,'Admin','Jed angelo O. Manubag is Registered','2019-03-02 17:27:07',3),(42,'Admin','Rotche C. Ramirez is Registered','2019-03-02 17:28:06',3),(43,'Admin','Vincent C. Hingco is Registered','2019-03-02 17:29:43',3),(44,'Admin','Ella C. Luna is Registered','2019-03-02 17:30:50',3),(45,'Admin','secretary is Deleted','2019-03-02 17:30:59',3),(46,'Admin','secretary is Deleted','2019-03-02 17:31:49',3),(47,'Admin','Nico G. Esarza is Registered','2019-03-02 17:32:22',3),(48,'Admin','secretary is Deleted','2019-03-02 17:32:59',3),(49,'Admin','secretary is Deleted','2019-03-02 17:33:02',3),(50,'Admin','Hazel B. Baliquig is Registered','2019-03-02 17:33:30',3),(51,'Admin','Zennel C. Batiao is Registered','2019-03-02 17:34:42',3),(52,'Admin','Johnben O. Latoza is Registered','2019-03-02 17:35:24',3),(53,'Admin','secretary is Deleted','2019-03-02 17:36:34',3),(54,'Admin','Angelica B. Sombreno is Registered','2019-03-02 17:36:43',3),(55,'Admin','Stephanie O. Dela cerna is Registered','2019-03-02 17:37:51',3),(56,'Admin','la is Registered','2019-03-02 17:42:43',3),(57,'Admin','Jorge T. Villanea is Registered','2019-03-02 17:43:12',3),(58,'Admin','dfafd is Registered','2019-03-02 17:44:21',3),(59,'Admin','Raymart T. Villanea is Registered','2019-03-02 17:46:44',3),(60,'Admin','Ester B. Remullo is Registered','2019-03-02 17:50:46',3),(61,'Admin','Klyde B. Remullo is Registered','2019-03-02 17:54:20',3),(62,'Admin','Rodney C. Nunez is Registered','2019-03-02 17:57:15',3),(63,'Admin','Maria C. Nunez is Registered','2019-03-02 17:58:22',3),(64,'Admin','Louie O. Manubag is Registered','2019-03-02 18:04:39',3),(65,'Admin','Rhea O. Manubag is Registered','2019-03-02 18:06:19',3),(66,'Admin','Lea B. Baliquig is Registered','2019-03-02 18:08:41',3),(67,'Admin','Rhona B. Baliquig is Registered','2019-03-02 18:12:08',3),(68,'Admin','Katie M. To is Registered','2019-03-02 18:14:52',3),(69,'Admin','Carl M. To is Registered','2019-03-02 18:16:16',3),(70,'Admin','Ramon R. Manugas is Registered','2019-03-02 18:18:54',3),(71,'Admin','Satur R. Manugas is Registered','2019-03-02 18:20:01',3),(72,'Admin','Zia C. Luna is Registered','2019-03-02 18:24:54',3),(73,'Admin','Rewell C. Luna is Registered','2019-03-02 18:27:28',3),(74,'Admin','David S. Mosqueda is Registered','2019-03-02 18:29:18',3),(75,'Admin','Marie S. Mosqueda is Registered','2019-03-02 18:31:11',3),(76,'Admin','Losano C. Villanueva is Registered','2019-03-02 18:33:30',3),(77,'Admin','Tristan C. Villanueva is Registered','2019-03-02 18:34:48',3),(78,'Admin','Jairus C. Ramirez is Registered','2019-03-02 18:44:50',3),(79,'Admin','Rojin C. Ramirez is Registered','2019-03-02 18:46:44',3),(80,'Admin','Rojin C. Ramirez is Registered','2019-03-02 18:46:44',3),(81,'Admin','Veronica C. Hingco is Registered','2019-03-02 18:51:00',3),(82,'Admin','Diane C. Hingco is Registered','2019-03-02 18:52:27',3),(83,'Admin','Glory B. Sombreno is Registered','2019-03-02 18:56:38',3),(84,'Admin','Christine B. Sombreno is Registered','2019-03-02 18:57:54',3),(85,'Admin','Wayne D. June is Registered','2019-03-02 19:01:14',3),(86,'Admin','Lorna D. June is Registered','2019-03-02 19:03:17',3),(87,'Admin','Jayson G. Esarza is Registered','2019-03-02 19:05:14',3),(88,'Admin','Jay G. Esarza is Registered','2019-03-02 19:06:59',3),(89,'Admin','Jay G. Esarza is Registered','2019-03-02 19:07:00',3),(90,'Admin','Tiffany O. Dela cerna is Registered','2019-03-02 19:09:35',3),(91,'Admin','Kelly O. Dela cerna is Registered','2019-03-02 19:11:28',3),(92,'Admin','Jet C. Austria is Registered','2019-03-02 19:14:23',3),(93,'Admin','Alex C. Austria is Registered','2019-03-02 19:17:33',3),(94,'Admin','Topher T. Mulawan is Registered','2019-03-02 19:20:45',3),(95,'Admin','Joshua T. Mulawan is Registered','2019-03-02 19:22:02',3),(96,'Admin','Grace O. Latoza is Registered','2019-03-02 19:26:35',3),(97,'Admin','Jeremiah O. Latoza is Registered','2019-03-02 19:28:17',3),(98,'Admin','The Barangay Kagawad Bon C. Nunez has been successfully registered','2019-03-02 19:39:29',3),(99,'Admin','The Barangay Kagawad Johnben O. Latoza has been successfully registered','2019-03-02 19:39:53',3),(100,'Admin','The Barangay Kagawad Ella C. Luna has been successfully registered','2019-03-02 19:40:09',3),(101,'Admin','The Barangay Kagawad Rotche C. Ramirez has been successfully registered','2019-03-02 19:40:32',3),(102,'Admin','The Barangay Kagawad Jed angelo O. Manubag has been successfully registered','2019-03-02 19:40:44',3),(103,'Admin','The Barangay Kagawad Zennel C. Batiao has been successfully registered','2019-03-02 19:41:04',3),(104,'Admin','The Barangay Kagawad Rhea O. Manubag has been successfully registered','2019-03-02 19:41:27',3),(105,'Admin','The Barangay Kagawad Lea B. Baliquig has been successfully registered','2019-03-02 19:42:09',3),(106,'Admin','The Barangay Kagawad Nico G. Esarza has been successfully registered','2019-03-02 19:42:26',3),(107,'Admin','The Barangay Kagawad Angelica B. Sombreno has been successfully registered','2019-03-02 19:42:39',3),(108,'Admin','The Barangay Kagawad Stephanie O. Dela cerna has been successfully registered','2019-03-02 19:42:54',3),(109,'Admin','The Barangay Kagawad Katie M. To has been successfully registered','2019-03-02 19:43:31',3),(110,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-02 19:57:48',3),(111,'Admin','Jerald B. Remullo Release Barangay Clearance','2019-03-02 19:58:11',3),(112,'Admin','Bon C. Nunez Release Barangay Clearance','2019-03-02 19:58:30',3),(113,'Admin','Jed angelo O. Manubag Release Barangay Clearance','2019-03-02 19:58:45',3),(114,'secretary','secretary is logged in','2019-03-02 20:17:20',4),(115,'admin','admin is logged in','2019-03-02 21:10:24',3),(116,'secretary','secretary is logged in','2019-03-02 21:11:03',4),(117,'Secretary','Hazel B. Baliquig Release Barangay Clearance','2019-03-02 21:11:12',4),(118,'admin','admin is logged in','2019-03-02 21:11:37',3),(119,'admin','admin is logged in','2019-03-02 21:14:32',3),(120,'secretary','secretary is logged in','2019-03-02 21:42:49',4),(121,'admin','admin is logged in','2019-03-02 21:55:05',3),(122,'admin','admin is logged in','2019-03-03 03:31:43',3),(123,'secretary','secretary is logged in','2019-03-03 04:09:11',4),(124,'admin','admin is logged in','2019-03-03 04:18:10',3),(125,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-03 04:29:56',3),(126,'admin','admin is logged in','2019-03-03 04:48:25',3),(127,'Admin','Jerald B. Remullo Release Barangay Clearance','2019-03-03 04:56:32',3),(128,'secretary','secretary is logged in','2019-03-03 04:57:48',4),(129,'admin','admin is logged in','2019-03-03 07:28:19',3),(130,'admin','User is logged in','2019-03-03 14:06:40',3),(131,'admin','User is logged in','2019-03-03 15:07:54',3),(132,'admin','admin is logged in','2019-03-04 00:26:16',3),(133,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-04 00:27:07',3),(134,'admin','admin is logged in','2019-03-04 00:28:41',3),(135,'Admin','Logo L. Logo is Registered','2019-03-04 00:29:51',3),(136,'admin','admin is logged in','2019-03-04 00:54:26',3),(137,'Admin','Carc C. Car is Registered','2019-03-04 00:57:19',3),(138,'admin','1111 1. 1111 is Updated','2019-03-04 01:06:54',3),(139,'admin','Marvin T. Villanea is Updated','2019-03-04 01:09:32',3),(140,'Admin','Penguin P. Penguin is Registered','2019-03-04 01:11:19',3),(141,'Admin','Tulips T. Tulips is Registered','2019-03-04 01:11:57',3),(142,'Admin','123 1. 1231 is Registered','2019-03-04 01:12:29',3),(143,'Admin','1231 1. 21321 is Registered','2019-03-04 01:22:01',3),(144,'Admin','Fdsaf D. Dasfdsa is Registered','2019-03-04 01:25:34',3),(145,'Admin','Junior T. Villanea1 has been succesfully updated','2019-03-04 01:29:22',3),(146,'Admin','Junior T. Villanea1 Release Barangay Clearance','2019-03-04 01:29:42',3),(147,'Admin','Raymart T. Villanea Release Barangay Clearance','2019-03-04 01:30:29',3),(148,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-04 01:35:40',3),(149,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-04 01:36:23',3),(150,'secretary','secretary is logged in','2019-03-04 01:39:00',4),(151,'Secretary','Marvin T. Villanea Release Barangay Clearance','2019-03-04 01:41:45',4),(152,'admin','admin is logged in','2019-03-04 01:43:29',3),(153,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-04 01:49:14',3),(154,'Admin','Marvin T. Villanea Release Barangay Clearance','2019-03-04 01:49:36',3),(155,'secretary','secretary is logged in','2019-03-04 01:58:15',4),(156,'admin','admin is logged in','2019-03-04 02:12:54',3),(157,'admin','admin is logged in','2022-11-11 14:02:28',3),(158,'Admin','Junior T. Villanea1 Release Barangay Clearance','2022-11-11 14:08:17',3),(159,'secretary','secretary is logged in','2022-11-11 14:11:00',4),(160,'admin','admin is logged in','2022-11-13 17:18:17',3),(161,'Admin','Marvin T. Villanea Release Barangay Clearance','2022-11-13 17:18:29',3),(162,'admin','admin is logged in','2022-11-13 17:33:46',3),(163,'Admin','Marvin T. Villanea Release Barangay Clearance','2022-11-13 17:38:26',3),(164,'secretary','secretary is logged in','2022-11-13 17:49:14',4),(165,'Secretary','Marvin T. Villanea Release Barangay Clearance','2022-11-13 17:49:21',4),(166,'admin','admin is logged in','2022-11-14 16:26:38',3),(167,'Admin','Marvin T. Villanea Release Barangay Clearance','2022-11-14 17:14:25',3),(168,'secretary','secretary is logged in','2022-11-14 17:17:43',4),(169,'Secretary','Marvin T. Villanea Release Barangay Clearance','2022-11-14 17:23:02',4);
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
  PRIMARY KEY (`transaction_id`),
  KEY `household_head_transaction` (`resident_id`),
  KEY `users_transaction` (`user_id`),
  CONSTRAINT `household_head_transaction` FOREIGN KEY (`resident_id`) REFERENCES `household_head` (`resident_id`),
  CONSTRAINT `users_transaction` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (1,'Marvin T. Villanea','Barangay Clearance','2019-03-02 19:57:48',NULL,'ANY LEGAL PURPOSE',3,1),(2,'Jerald B. Remullo','Barangay Clearance','2019-03-02 19:58:11',NULL,'ANY LEGAL PURPOSE',3,3),(3,'Bon C. Nunez','Barangay Clearance','2019-03-02 19:58:30',NULL,'ANY LEGAL PURPOSE',3,10),(4,'Jed angelo O. Manubag','Barangay Clearance','2019-03-02 19:58:45',NULL,'ANY LEGAL PURPOSE',3,11),(5,'Hazel B. Baliquig','Barangay Clearance','2019-03-02 21:11:12',NULL,'ANY LEGAL PURPOSE',4,16),(6,'Marvin T. Villanea','Barangay Clearance','2019-03-03 04:29:56',NULL,'ANY LEGAL PURPOSE',3,1),(7,'Jerald B. Remullo','Barangay Clearance','2019-03-03 04:56:32',NULL,'ANY LEGAL PURPOSE',3,3),(8,'Marvin T. Villanea','Barangay Clearance','2019-03-04 00:27:07',NULL,'ANY LEGAL PURPOSE',3,1),(9,'Junior T. Villanea1','Barangay Clearance','2019-03-04 01:29:42',NULL,'ANY LEGAL PURPOSE',3,21),(10,'Raymart T. Villanea','Barangay Clearance','2019-03-04 01:30:29',NULL,'ANY LEGAL PURPOSE',3,22),(11,'Marvin T. Villanea','Barangay Clearance','2019-03-04 01:35:40',NULL,'ANY LEGAL PURPOSE',3,1),(12,'Marvin T. Villanea','Barangay Clearance','2019-03-04 01:36:23',NULL,'ANY LEGAL PURPOSE',3,1),(13,'Marvin T. Villanea','Barangay Clearance','2019-03-04 01:41:45',NULL,'ANY LEGAL PURPOSE',4,1),(14,'Marvin T. Villanea','Barangay Clearance','2019-03-04 01:49:14',NULL,'ANY LEGAL PURPOSE',3,1),(15,'Marvin T. Villanea','Barangay Clearance','2019-03-04 01:49:36',NULL,'ANY LEGAL PURPOSE',3,1),(16,'Junior T. Villanea1','Barangay Clearance','2022-11-11 14:08:17',NULL,'ANY LEGAL PURPOSE',3,21),(17,'Marvin T. Villanea','Barangay Clearance','2022-11-13 17:18:29',NULL,'ANY LEGAL PURPOSE',3,1),(18,'Marvin T. Villanea','Barangay Clearance','2022-11-13 17:38:26',NULL,'ANY LEGAL PURPOSE',3,1),(19,'Marvin T. Villanea','Barangay Clearance','2022-11-13 17:49:21',NULL,'ANY LEGAL PURPOSE',4,1),(20,'Marvin T. Villanea','Barangay Clearance','2022-11-14 17:14:25',NULL,'ANY LEGAL PURPOSE',3,1),(21,'Marvin T. Villanea','Barangay Clearance','2022-11-14 17:23:02',NULL,'ANY LEGAL PURPOSE',4,1);
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

-- Dump completed on 2022-11-15 18:54:40
