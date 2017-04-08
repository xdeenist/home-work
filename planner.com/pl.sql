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
-- Table structure for table `dependence`
--

DROP TABLE IF EXISTS `dependence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependence` (
  `d_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) DEFAULT NULL,
  `dep_task_id` int(10) DEFAULT NULL,
  UNIQUE KEY `d_id` (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependence`
--

LOCK TABLES `dependence` WRITE;
/*!40000 ALTER TABLE `dependence` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource`
--

DROP TABLE IF EXISTS `resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource` (
  `res_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `res_path` text,
  UNIQUE KEY `res_id` (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
/*!40000 ALTER TABLE `resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resource_to_task`
--

DROP TABLE IF EXISTS `resource_to_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resource_to_task` (
  `r_t_t_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) DEFAULT NULL,
  `res_id` int(10) DEFAULT NULL,
  UNIQUE KEY `r_t_t_id` (`r_t_t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_to_task`
--

LOCK TABLES `resource_to_task` WRITE;
/*!40000 ALTER TABLE `resource_to_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `resource_to_task` ENABLE KEYS */;
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
  `employer` varchar(50) DEFAULT NULL,
  `parent_task` int(10) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_deskription` text,
  `deadline` datetime DEFAULT NULL,
  `start_task` datetime DEFAULT NULL,
  `estimation` int(10) DEFAULT NULL,
  `trak_time` int(10) DEFAULT NULL,
  `status` varchar(225) NOT NULL,
  `dell` int(1) DEFAULT NULL,
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
-- Table structure for table `time_tracking`
--

DROP TABLE IF EXISTS `time_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_tracking` (
  `t_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `task_id` int(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `pause` datetime DEFAULT NULL,
  UNIQUE KEY `t_id` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_tracking`
--

LOCK TABLES `time_tracking` WRITE;
/*!40000 ALTER TABLE `time_tracking` DISABLE KEYS */;
INSERT INTO `time_tracking` VALUES (1,1,1,'2017-04-06 18:32:54','2017-04-06 22:47:18'),(3,1,1,'2017-04-06 19:07:40','2017-04-06 21:07:40'),(4,1,1,'2017-04-06 20:07:40','2017-04-06 22:07:40'),(5,1,1,'2017-04-06 20:07:40','2017-04-06 23:07:40');
/*!40000 ALTER TABLE `time_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userstatus` varchar(50) DEFAULT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'bbbooobbb','xdeenist@gmail.com','202cb962ac59075b964b07152d234b703','user'),(6,'govnouser','govnouser@gmail.com','b3575f222f7b768c25160b879699118b5','user'),(7,'выаыаыв','dsxdeenist@gmail.com','202cb962ac59075b964b07152d234b703','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-08 10:57:21
