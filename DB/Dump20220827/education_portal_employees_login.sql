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
-- Table structure for table `employees_login`
--

DROP TABLE IF EXISTS `employees_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees_login` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `User_First_Name` varchar(50) NOT NULL,
  `User_Last_Name` varchar(50) NOT NULL,
  `User_Email` varchar(80) NOT NULL,
  `User_language` varchar(200) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Phone_num` varchar(15) NOT NULL,
  `User_Role` varchar(10) NOT NULL,
  `Profile_Pic` varchar(100) NOT NULL,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `User_Email` (`User_Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees_login`
--

LOCK TABLES `employees_login` WRITE;
/*!40000 ALTER TABLE `employees_login` DISABLE KEYS */;
INSERT INTO `employees_login` VALUES (1,'Demo','User','demo197@gmail.com','Select Language','$2y$10$Lg49GYoF3gKEiJS6f1RaoOq6geIQZrlSX5M3QSW8L6qdIeucFDx2G','03458309345','Admin','jaredd-craig-HH4WBGNyltc-unsplash.jpg'),(2,'demo','demo','demo97@gmail.com','[\"Afrikaans\",\"Albanian - shqip\"]','$2y$10$SD05aB9di53gR/UcLkFw1u5OyLzViamB9t7vn/Kc9j77Cz2PvUPSK','0303323321006','Admin','s1 (1).png'),(3,'demo2','user','demo2@gmail.com','an','$2y$10$bTXoZTydW406Lyyn4d4VTOyEniuARriViIGEPQky3UDFkZtZll1aW','943434334343','Manager','demo2.png'),(4,'teacher','demo','teacherdemo@gmail.com','null','$2y$10$9UKCTuUJTDOSb5gCSdhY6.GRTP5joIdZyf5mDsuJ4zru9Q.LH/IMi','303-3221006','Teacher','photo-1633332755192-727a05c4013d.jpg');
/*!40000 ALTER TABLE `employees_login` ENABLE KEYS */;
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
