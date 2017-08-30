CREATE DATABASE  IF NOT EXISTS `impact` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `impact`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: impact
-- ------------------------------------------------------
-- Server version	5.6.34-log

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Sheril','37dbb6ac19dcd69f9e1b6c4540fcd416','sheril@email.com','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id_idx` (`admin_id`),
  CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (11,'Title1','Description 1 Description 1 Description 1 Description 1 Description 1 Description 1','Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Content1 Con','slug1','2017-08-29 14:45:18','2017-08-29 14:45:18',1),(12,'Title2','Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2 Content 2','slug2','Description 2 Description 2 Description 2 Description 2 Description 2 Description 2 Description 2','2017-08-29 15:14:43','2017-08-29 15:14:43',1),(15,'Title3','contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3contenr3','slug3','des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2des2','2017-08-29 15:38:40','2017-08-29 15:38:40',1),(17,'Title3','content6 content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6content6','slug5','awsertyuioptrawdgjl;lutrwertyuiop','2017-08-29 15:52:16','2017-08-29 15:52:16',1),(18,'Testdata','test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content test content','testslug','test description test description test description test description','2017-08-29 16:34:24','2017-08-29 16:34:24',1),(19,'Shshshsh','contsh contshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontshcontsh','slugsh','desh deshdeshdeshdeshdeshdeshdesdeshdesh','2017-08-29 16:37:38','2017-08-29 16:37:38',1),(20,'Testing','testing content testing contenttesting contenttesting contenttesting contenttesting contenttesting contenttesting contenttesting contenttesting contenttesting contenttesting content','slug','Testing description Testing description Testing description','2017-08-29 17:24:00','2017-08-29 17:24:00',1),(21,'dfsgbs','fgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr t','ghj','fgh hfhgnrtdtttr tfgh hfhgnrtdtttr t','2017-08-29 17:31:05','2017-08-29 17:31:05',1),(22,'bhfhnjhgfds','fgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr t','fhfdf','dfgbdrbrnbesrnyntnytsdvdsgrnbsystnyd','2017-08-29 17:32:04','2017-08-29 17:32:04',1),(23,'ghbfghfnhhffj hjhmfhyj','fgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr t','fgh hfhgnrtdtttr t','fgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr tfgh hfhgnrtdtttr t','2017-08-29 17:33:02','2017-08-29 17:33:02',1);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galary`
--

DROP TABLE IF EXISTS `galary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_id_idx` (`admin_id`),
  CONSTRAINT `admin_gallery_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galary`
--

LOCK TABLES `galary` WRITE;
/*!40000 ALTER TABLE `galary` DISABLE KEYS */;
/*!40000 ALTER TABLE `galary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-30 10:34:28
