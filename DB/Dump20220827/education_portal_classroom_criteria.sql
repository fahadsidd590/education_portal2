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
-- Table structure for table `classroom_criteria`
--

DROP TABLE IF EXISTS `classroom_criteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classroom_criteria` (
  `criteria_id` int NOT NULL,
  `criteria_slug` varchar(45) DEFAULT NULL,
  `criteria_name` varchar(45) DEFAULT NULL,
  `criteria_type` varchar(45) NOT NULL,
  `criteria_subject_fk` int NOT NULL,
  `criteria_subject_level` int NOT NULL,
  `criteria_unit` int NOT NULL,
  `criteria_domain_id_fk` int DEFAULT NULL,
  `criteria_language_id` int DEFAULT NULL,
  PRIMARY KEY (`criteria_id`),
  UNIQUE KEY `criteria_slug_UNIQUE` (`criteria_slug`),
  KEY `criteria_subject_fk_idx` (`criteria_subject_fk`),
  KEY `criteria_level_fk_idx` (`criteria_subject_level`),
  KEY `criteria_unit_fk_idx` (`criteria_unit`),
  KEY `criteria_domain_fk_idx` (`criteria_domain_id_fk`),
  CONSTRAINT `criteria_domain_fk` FOREIGN KEY (`criteria_domain_id_fk`) REFERENCES `classroom` (`classroom_id`),
  CONSTRAINT `criteria_level_fk` FOREIGN KEY (`criteria_subject_level`) REFERENCES `subject_levels` (`Level_ID`),
  CONSTRAINT `criteria_subject_fk` FOREIGN KEY (`criteria_subject_fk`) REFERENCES `subjects` (`Subject_ID`),
  CONSTRAINT `criteria_unit_fk` FOREIGN KEY (`criteria_unit`) REFERENCES `subject_levels_units` (`Units_ID`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classroom_criteria`
--

LOCK TABLES `classroom_criteria` WRITE;
/*!40000 ALTER TABLE `classroom_criteria` DISABLE KEYS */;
/*!40000 ALTER TABLE `classroom_criteria` ENABLE KEYS */;
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
