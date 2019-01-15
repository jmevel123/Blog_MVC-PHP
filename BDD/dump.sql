-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: todo_php
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.17.10.1

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
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `creation_date` datetime NOT NULL,
  `edition_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (2,'youpi','c\'est le début du rush de la mort','2018-11-27 13:00:03','2018-11-27 13:00:03'),(3,'cha','on teste le fetch all','2018-11-27 13:15:08','2018-11-27 13:15:31'),(4,'test','palala','2018-11-27 16:12:45','2018-11-27 16:12:45'),(5,'testouille','palalalouille','2018-11-27 16:12:45','2018-11-27 16:12:45'),(6,'plaf','flouf','2018-11-27 16:12:45','2018-11-27 18:53:44'),(7,'test','palala','2018-11-27 16:13:46','2018-11-27 16:13:46'),(8,'testouille','palalalouille','2018-11-27 16:13:46','2018-11-27 16:13:46'),(9,'mzerdul',NULL,'2018-11-27 16:13:46','2018-11-27 16:13:46'),(11,'testcreate2','on teste encooooore le retour','2018-11-27 17:15:31','2018-11-27 17:15:31'),(12,'testcreate3',NULL,'2018-11-27 17:16:00','2018-11-27 17:16:00'),(13,'testcreation',NULL,'2018-11-27 17:32:22','2018-11-27 17:32:22'),(14,'testcréationleretour',NULL,'2018-11-27 17:34:04','2018-11-27 17:34:04'),(15,'testcréationleretourduretour',NULL,'2018-11-27 17:34:55','2018-11-27 17:34:55'),(16,'ontestelasécu','ouaisouais','2018-11-27 17:41:27','2018-11-27 17:41:27'),(17,'','','2018-11-27 17:54:04','2018-11-27 17:54:04'),(18,'jkdsmfj','youplaboum','2018-11-27 17:59:37','2018-11-27 17:59:37'),(19,'','','2018-11-27 18:01:41','2018-11-27 18:01:41'),(20,'testons',NULL,'2018-11-27 18:09:00','2018-11-27 18:09:00');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-27 19:49:29
