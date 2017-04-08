-- MySQL dump 10.15  Distrib 10.0.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.0.29-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `resorse`
--

DROP TABLE IF EXISTS `resorse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resorse` (
  `res_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `res_path` text,
  UNIQUE KEY `res_id` (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resorse`
--

LOCK TABLES `resorse` WRITE;
/*!40000 ALTER TABLE `resorse` DISABLE KEYS */;
/*!40000 ALTER TABLE `resorse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resourse_to_task`
--

DROP TABLE IF EXISTS `resourse_to_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resourse_to_task` (
  `r_t_t_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) DEFAULT NULL,
  `res_id` int(10) DEFAULT NULL,
  UNIQUE KEY `r_t_t_id` (`r_t_t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resourse_to_task`
--

LOCK TABLES `resourse_to_task` WRITE;
/*!40000 ALTER TABLE `resourse_to_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `resourse_to_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(225) NOT NULL,
  UNIQUE KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_to_task`
--

DROP TABLE IF EXISTS `tag_to_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_to_task` (
  `t_t_t_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  UNIQUE KEY `t_t_t_id` (`t_t_t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_to_task`
--

LOCK TABLES `tag_to_task` WRITE;
/*!40000 ALTER TABLE `tag_to_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tag_to_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `task_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner` int(10) NOT NULL,
  `employee` int(10) DEFAULT NULL,
  `parent_task` int(10) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_deskription` text,
  `deadline` datetime DEFAULT NULL,
  `start_task` datetime DEFAULT NULL,
  `estimation` int(10) DEFAULT NULL,
  `trak_time` int(10) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  UNIQUE KEY `task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_rate`
--

DROP TABLE IF EXISTS `user_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_rate` (
  `rate_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `rate` int(2) DEFAULT NULL,
  UNIQUE KEY `rate_id` (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_rate`
--

LOCK TABLES `user_rate` WRITE;
/*!40000 ALTER TABLE `user_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `userstatus` varchar(50) DEFAULT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2017-04-04 18:58:02
