-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: education_portal
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `classroom_association`
--

DROP TABLE IF EXISTS `classroom_association`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classroom_association` (
  `cr_association_id` int NOT NULL,
  `association_name` varchar(45) DEFAULT NULL,
  `member_type` enum('admin','manager','teacher','student') DEFAULT 'student',
  `member_id_fk` int NOT NULL,
  `association_slug` varchar(45) NOT NULL,
  `association_domain_fk` int DEFAULT NULL,
  PRIMARY KEY (`cr_association_id`),
  UNIQUE KEY `association_slug_UNIQUE` (`association_slug`),
  KEY `user_id_fk_idx` (`member_id_fk`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`member_id_fk`) REFERENCES `employees_login` (`User_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_association`
--

LOCK TABLES `classroom_association` WRITE;
/*!40000 ALTER TABLE `classroom_association` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom_association` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-27 15:08:30
