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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependence`
--

LOCK TABLES `dependence` WRITE;
/*!40000 ALTER TABLE `dependence` DISABLE KEYS */;
INSERT INTO `dependence` VALUES (5,85,86),(6,86,87),(7,97,98);
/*!40000 ALTER TABLE `dependence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1492963111),('m170423_153038_fix_tags',1492963121);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `notice_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `task_id` int(10) DEFAULT NULL,
  `notice_text` varchar(255) DEFAULT NULL,
  `read_n` int(1) DEFAULT NULL,
  UNIQUE KEY `notice_id` (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (276,5,107,'Task \'Tsk\' wait to submit!',1),(277,8,107,'Task \'Tsk\' was not accepted!',1),(278,5,107,'Task \'Tsk\' wait to submit!',1),(279,8,107,'Task \'Tsk\' was accepted!',1),(280,8,107,'Task \'Tsk\' wait to submit!',1),(281,5,107,'Task \'Tsk\' wait to submit!',1),(282,5,107,'Task \'Tsk\' was not accepted!',1),(283,8,107,'Task \'Tsk\' wait to submit!',1),(284,5,107,'Task \'Tsk\' was accepted!',1),(285,8,104,'Task \'sdf\' wait to submit!',1),(286,8,104,'Task \'sdf\' was accepted!',1),(287,8,108,'Task \'xczxc\' wait to submit!',1),(288,8,108,'Task \'xczxc\' was accepted!',1),(289,6,109,'Task \'dsf\' wait to submit!',NULL),(290,8,108,'Task \'xczxc\' wait to submit!',1),(291,8,110,'Task \'dfsd\' wait to submit!',1),(292,8,110,'Task \'dfsd\' was accepted!',1),(293,8,110,'Task \'dfsd\' wait to submit!',1),(294,8,110,'Task \'dfsd\' was not accepted!',1),(295,8,110,'Task \'dfsd\' wait to submit!',1),(296,8,110,'Task \'dfsd\' was not accepted!',1),(297,8,110,'Task \'dfsd\' was not accepted!',1),(298,8,105,'Task \'refg\' wait to submit!',1),(299,8,105,'Task \'refg\' was accepted!',1),(300,8,99,'Task \'546\' wait to submit!',1),(301,8,99,'Task \'546\' was not accepted!',1);
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource`
--

LOCK TABLES `resource` WRITE;
/*!40000 ALTER TABLE `resource` DISABLE KEYS */;
INSERT INTO `resource` VALUES (4,'https://github.com/2amigos/yii2-selectize-widget'),(7,'/web/uploads/favicon.ico'),(8,'https://github.com/2amigos/yii2-selectize-widget'),(10,'/web/uploads/6FU3g-bgrbr5p9xi7eXtKRV8qBlbugxt.ico');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resource_to_task`
--

LOCK TABLES `resource_to_task` WRITE;
/*!40000 ALTER TABLE `resource_to_task` DISABLE KEYS */;
INSERT INTO `resource_to_task` VALUES (4,98,4),(7,85,7),(8,85,8),(10,107,10);
/*!40000 ALTER TABLE `resource_to_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(225) NOT NULL,
  `count` int(10) NOT NULL,
  UNIQUE KEY `tag_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (6,'fuks',1),(7,'ror',-3),(8,'poo',3),(9,'poook',-6),(10,'google',3),(11,'toto',0),(12,'foo',0),(13,'doom',0),(14,'p',2);
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag_to_task`
--

DROP TABLE IF EXISTS `tag_to_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag_to_task` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  `ord` int(10) NOT NULL,
  UNIQUE KEY `t_t_t_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag_to_task`
--

LOCK TABLES `tag_to_task` WRITE;
/*!40000 ALTER TABLE `tag_to_task` DISABLE KEYS */;
INSERT INTO `tag_to_task` VALUES (11,88,7,0),(157,101,8,1),(168,103,8,0),(169,103,9,1),(170,103,14,2),(178,100,8,0),(179,100,9,1),(180,100,14,2),(181,104,8,0),(182,105,10,0),(183,97,8,0),(184,97,10,1),(185,106,8,0),(186,107,8,0),(187,108,8,0),(188,108,10,1),(189,110,8,0);
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
  `owner` int(10) DEFAULT NULL,
  `employer` int(10) DEFAULT NULL,
  `parent_task` int(10) DEFAULT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_deskription` text,
  `deadline` date DEFAULT NULL,
  `percentcomplete` int(10) DEFAULT NULL,
  `estimation` int(10) DEFAULT NULL,
  `track_time` int(10) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'WaitSubmit',
  `dell` int(1) DEFAULT NULL,
  UNIQUE KEY `task_id` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (80,5,8,NULL,'Task for yoba','edfsd',NULL,NULL,4,0,'Finish',NULL),(81,8,5,NULL,'xcvx','cxvxc','2017-04-19',NULL,7,NULL,'Finish',NULL),(82,5,8,NULL,'werrf','dsfsd',NULL,47,4,111,'InWork',NULL),(83,8,8,NULL,'dsfd','sdf','2017-04-20',NULL,7,0,'Finish',NULL),(84,5,8,NULL,'retr','sdf','2017-04-27',2,1,1,'InWork',NULL),(85,8,5,NULL,'asdas','asdassad','2017-04-27',NULL,1,NULL,'InWork',NULL),(86,5,5,85,'ghj','gfbcv','2017-04-26',NULL,1,NULL,'InWork',NULL),(87,5,9,86,'gbfdfg','fdgsg',NULL,NULL,6,NULL,'WaitSubmit',NULL),(88,5,8,NULL,'dfg','dsf',NULL,NULL,6,1,'WaitConfirm',NULL),(96,8,6,NULL,'dsf','sdfp','2017-04-26',NULL,4,0,'InWork',NULL),(97,8,8,NULL,'Task 1','wersdf','2017-04-27',1,15,7,'InWork',NULL),(99,8,8,NULL,'546','546','2017-04-07',2,5,4,'InWork',NULL),(100,8,9,NULL,'fgdf','dsfsdr',NULL,NULL,5,NULL,'WaitSubmit',NULL),(101,8,8,NULL,'y','y','2017-04-25',22,5,64,'InWork',NULL),(102,8,5,NULL,'yy','y','2017-04-19',NULL,NULL,NULL,'InWork',NULL),(103,8,6,NULL,'thfdg','gfhf','2017-04-25',NULL,6,NULL,'InWork',NULL),(104,8,8,97,'sdf','dsfsd','2017-04-26',100,4,929,'Finish',NULL),(105,8,8,97,'refg','fdgfd','2017-04-19',100,1,65,'Finish',NULL),(106,8,9,NULL,'Task 1','sdfdsf','2017-04-21',NULL,12,NULL,'WaitSubmit',NULL),(107,8,5,NULL,'Tsk','Zbs','2017-04-28',5,1,3,'Finish',NULL),(108,8,8,NULL,'xczxc','fdsfd','2017-04-30',4,25,53,'InWork',NULL),(109,8,6,NULL,'dsf','saddsc','2017-04-29',NULL,4,NULL,'WaitSubmit',NULL),(110,8,8,NULL,'dfsd','sdfsdf','2017-04-30',1,43,1,'InWork',NULL);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetracking`
--

DROP TABLE IF EXISTS `timetracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetracking` (
  `t_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `task_id` int(10) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `pause` datetime DEFAULT NULL,
  UNIQUE KEY `t_id` (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetracking`
--

LOCK TABLES `timetracking` WRITE;
/*!40000 ALTER TABLE `timetracking` DISABLE KEYS */;
INSERT INTO `timetracking` VALUES (28,8,74,'2017-04-20 22:50:39','2017-04-20 22:50:51'),(29,8,80,'2017-04-21 21:47:37','2017-04-21 21:47:39'),(30,8,80,'2017-04-21 21:47:40','2017-04-21 21:47:41'),(31,8,82,'2017-04-21 22:48:20','2017-04-21 22:48:20'),(32,8,82,'2017-04-21 22:49:19','2017-04-21 22:49:20'),(33,8,82,'2017-04-21 22:49:32','2017-04-21 22:49:38'),(34,8,83,'2017-04-22 05:57:06','2017-04-22 05:57:40'),(35,8,88,'2017-04-22 09:35:34','2017-04-22 10:56:23'),(36,8,96,'2017-04-23 11:53:49','2017-04-23 11:54:00'),(37,8,105,'2017-04-24 21:41:52','2017-04-24 21:49:27'),(39,8,105,'2017-04-24 21:49:45','2017-04-24 21:52:04'),(40,8,105,'2017-04-24 21:52:07','2017-04-24 22:10:09'),(41,8,105,'2017-04-24 22:13:21','2017-04-24 22:13:36'),(42,8,105,'2017-04-24 22:16:39','2017-04-24 22:16:42'),(43,8,105,'2017-04-24 22:17:29','2017-04-24 22:17:33'),(44,8,105,'2017-04-24 22:18:07','2017-04-24 22:18:08'),(45,8,105,'2017-04-24 22:19:00','2017-04-24 22:19:02'),(46,8,105,'2017-04-24 22:22:21','2017-04-24 22:24:26'),(47,8,105,'2017-04-24 22:24:28','2017-04-24 22:25:13'),(48,8,105,'2017-04-24 22:26:02','2017-04-24 22:26:04'),(49,8,105,'2017-04-24 22:26:25','2017-04-24 22:26:27'),(50,8,104,'2017-04-24 22:27:19','2017-04-24 22:27:32'),(51,8,98,'2017-04-24 22:28:24','2017-04-24 22:29:47'),(52,8,97,'2017-04-24 22:30:16','2017-04-24 22:31:53'),(53,8,105,'2017-04-24 22:32:56','2017-04-24 22:32:59'),(54,8,105,'2017-04-24 22:34:11','2017-04-24 22:34:12'),(55,8,105,'2017-04-24 22:35:31','2017-04-24 22:35:32'),(56,8,105,'2017-04-24 22:36:45','2017-04-24 22:36:46'),(57,8,105,'2017-04-24 22:37:11','2017-04-24 22:37:12'),(58,8,105,'2017-04-24 22:37:49','2017-04-24 22:37:50'),(59,8,105,'2017-04-24 22:47:41','2017-04-24 22:47:42'),(60,8,105,'2017-04-24 22:48:49','2017-04-24 22:48:50'),(61,8,105,'2017-04-24 22:52:30','2017-04-24 22:52:31'),(62,8,105,'2017-04-24 22:53:02','2017-04-24 22:53:03'),(63,8,105,'2017-04-24 22:53:48','2017-04-24 22:53:49'),(64,8,97,'2017-04-24 22:57:29','2017-04-24 22:57:33'),(65,8,105,'2017-04-24 22:57:46','2017-04-24 22:57:49'),(66,8,104,'2017-04-24 23:01:31','2017-04-24 23:11:09'),(67,8,104,'2017-04-24 23:11:15','2017-04-25 07:25:51'),(68,8,104,'2017-04-25 07:29:09','2017-04-25 07:29:11'),(69,8,104,'2017-04-25 07:30:21','2017-04-25 07:30:26'),(70,8,104,'2017-04-25 07:30:58','2017-04-25 07:30:59'),(71,8,104,'2017-04-25 07:31:53','2017-04-25 07:31:55'),(72,8,104,'2017-04-25 07:35:08','2017-04-25 07:35:09'),(74,8,105,'2017-04-25 07:58:58','2017-04-25 07:58:59'),(75,8,105,'2017-04-25 07:59:00','2017-04-25 07:59:00'),(76,8,105,'2017-04-25 07:59:45','2017-04-25 08:04:13'),(77,8,104,'2017-04-25 08:00:32','2017-04-25 08:00:42'),(78,8,104,'2017-04-25 08:00:43','2017-04-25 08:01:25'),(80,8,104,'2017-04-25 08:04:19','2017-04-25 15:11:12'),(81,5,107,'2017-04-25 21:32:27','2017-04-25 21:36:11'),(82,5,107,'2017-04-25 21:36:13','2017-04-25 21:36:14'),(83,8,105,'2017-04-25 22:58:27','2017-04-25 23:13:46'),(84,8,105,'2017-04-25 23:13:53','2017-04-25 23:13:58'),(85,8,101,'2017-04-26 08:41:36','2017-04-26 09:42:24'),(86,8,97,'2017-04-26 09:42:27','2017-04-26 09:42:27'),(87,8,105,'2017-04-26 09:43:01','2017-04-26 09:43:02'),(88,8,105,'2017-04-26 09:43:40','2017-04-26 09:43:40'),(89,8,101,'2017-04-26 09:44:10','2017-04-26 09:44:11'),(90,8,101,'2017-04-26 09:44:11','2017-04-26 09:44:23'),(91,8,105,'2017-04-26 14:17:56','2017-04-26 14:18:04'),(92,8,82,'2017-04-26 15:39:04','2017-04-26 17:30:50'),(93,8,84,'2017-04-26 23:49:27','2017-04-26 23:51:17'),(94,8,105,'2017-04-27 14:05:35','2017-04-27 14:10:10'),(95,8,108,'2017-04-27 16:05:38','2017-04-27 16:28:19'),(96,8,108,'2017-04-27 16:32:16','2017-04-27 16:32:18'),(97,8,108,'2017-04-27 16:36:07','2017-04-27 16:36:08'),(98,8,108,'2017-04-27 17:26:46','2017-04-27 17:26:57'),(99,8,108,'2017-04-27 17:36:21','2017-04-27 17:36:31'),(100,8,108,'2017-04-27 17:36:34','2017-04-27 17:37:08'),(101,8,108,'2017-04-27 17:37:11','2017-04-27 17:37:27'),(102,8,108,'2017-04-27 17:37:31','2017-04-27 17:37:33'),(103,8,108,'2017-04-27 17:37:35','2017-04-27 17:37:38'),(104,8,108,'2017-04-27 17:37:41','2017-04-27 17:37:48'),(105,8,108,'2017-04-27 17:37:49','2017-04-27 17:38:27'),(106,8,108,'2017-04-27 17:38:28','2017-04-27 17:38:32'),(107,8,108,'2017-04-27 17:38:34','2017-04-27 17:38:40'),(108,8,108,'2017-04-27 17:39:49','2017-04-27 17:39:50'),(109,8,108,'2017-04-27 17:39:53','2017-04-27 17:39:54'),(110,8,108,'2017-04-27 17:40:05','2017-04-27 17:40:05'),(111,8,108,'2017-04-27 17:43:46','2017-04-27 17:43:50'),(112,8,108,'2017-04-27 17:43:54','2017-04-27 17:44:00'),(113,8,108,'2017-04-27 17:44:02','2017-04-27 17:44:32'),(114,8,108,'2017-04-27 17:44:34','2017-04-27 17:44:38'),(115,8,108,'2017-04-27 17:44:39','2017-04-27 18:12:55'),(116,8,108,'2017-04-27 18:12:56','2017-04-27 18:12:57'),(117,8,108,'2017-04-27 18:13:26','2017-04-27 18:13:27'),(118,8,108,'2017-04-27 18:14:35','2017-04-27 18:14:35'),(119,8,108,'2017-04-27 18:16:01','2017-04-27 18:17:04'),(120,8,108,'2017-04-27 18:17:05','2017-04-27 18:17:32'),(121,8,108,'2017-04-27 18:17:33','2017-04-27 18:17:40'),(122,8,108,'2017-04-27 18:17:41','2017-04-27 18:17:52'),(123,8,108,'2017-04-27 18:17:53','2017-04-27 18:17:56'),(124,8,108,'2017-04-27 18:17:56','2017-04-27 18:18:01'),(125,8,108,'2017-04-27 18:18:02','2017-04-27 18:18:08'),(126,8,108,'2017-04-27 18:21:12','2017-04-27 18:21:47'),(127,8,108,'2017-04-27 18:21:48','2017-04-27 18:21:49'),(128,8,108,'2017-04-27 18:21:49','2017-04-27 18:22:02'),(129,8,108,'2017-04-27 18:22:19','2017-04-27 18:22:25'),(130,8,108,'2017-04-27 18:22:26','2017-04-27 18:22:26'),(131,8,108,'2017-04-27 20:22:28','2017-04-27 20:22:29'),(132,8,108,'2017-04-27 20:22:30','2017-04-27 20:22:31'),(133,8,108,'2017-04-27 20:22:32','2017-04-27 20:22:33'),(134,8,108,'2017-04-27 20:22:34','2017-04-27 20:22:36'),(135,8,108,'2017-04-27 20:25:25','2017-04-27 20:25:31'),(136,8,108,'2017-04-27 20:25:31','2017-04-27 20:25:32'),(137,8,108,'2017-04-27 20:25:32','2017-04-27 20:25:33'),(138,8,108,'2017-04-27 20:25:33','2017-04-27 20:25:33'),(139,8,108,'2017-04-27 20:25:33','2017-04-27 20:25:34'),(140,8,108,'2017-04-27 20:25:34','2017-04-27 20:25:34'),(141,8,108,'2017-04-27 20:25:34','2017-04-27 20:25:34'),(142,8,108,'2017-04-27 20:25:35','2017-04-27 20:25:35'),(143,8,108,'2017-04-27 20:25:48','2017-04-27 20:25:56'),(144,8,108,'2017-04-27 20:31:52','2017-04-27 20:31:55'),(145,8,108,'2017-04-27 20:31:57','2017-04-27 20:32:01'),(146,8,108,'2017-04-27 20:32:02','2017-04-27 20:32:05'),(147,8,108,'2017-04-27 20:32:23','2017-04-27 20:32:26'),(148,8,108,'2017-04-27 20:32:29','2017-04-27 20:32:30'),(149,8,108,'2017-04-27 20:32:30','2017-04-27 20:32:31'),(150,8,108,'2017-04-27 20:33:49','2017-04-27 20:33:50'),(151,8,108,'2017-04-27 20:33:51','2017-04-27 20:33:54'),(152,8,108,'2017-04-27 20:33:56','2017-04-27 20:33:59'),(153,8,108,'2017-04-27 20:34:00','2017-04-27 20:34:04'),(154,8,108,'2017-04-27 20:34:05','2017-04-27 20:34:08'),(155,8,108,'2017-04-27 20:34:16','2017-04-27 20:34:25'),(156,8,108,'2017-04-27 20:34:39','2017-04-27 20:35:40'),(157,8,108,'2017-04-27 20:35:41','2017-04-27 20:36:10'),(158,8,108,'2017-04-27 20:36:11','2017-04-27 20:36:13'),(159,8,108,'2017-04-27 20:36:14','2017-04-27 20:36:15'),(160,8,108,'2017-04-27 20:36:16','2017-04-27 20:36:17'),(161,8,108,'2017-04-27 20:36:17','2017-04-27 20:37:57'),(162,8,108,'2017-04-27 20:37:58','2017-04-27 20:38:00'),(163,8,108,'2017-04-27 20:38:00','2017-04-27 20:38:01'),(164,8,108,'2017-04-27 20:38:02','2017-04-27 20:38:02'),(165,8,108,'2017-04-27 20:47:55','2017-04-27 20:48:01'),(166,8,108,'2017-04-27 20:48:50','2017-04-27 20:48:53'),(167,8,108,'2017-04-27 20:49:05','2017-04-27 20:49:10'),(168,8,108,'2017-04-27 20:49:11','2017-04-27 20:49:14'),(169,8,108,'2017-04-27 21:00:26','2017-04-27 21:00:28'),(170,8,108,'2017-04-27 21:00:29','2017-04-27 21:00:36'),(171,8,108,'2017-04-27 21:00:40','2017-04-27 21:00:42'),(172,8,108,'2017-04-27 21:02:00','2017-04-27 21:02:01'),(173,8,108,'2017-04-27 21:02:03','2017-04-27 21:02:06'),(174,8,108,'2017-04-27 21:03:15','2017-04-27 21:03:16'),(175,8,108,'2017-04-27 21:03:17','2017-04-27 21:03:21'),(176,8,108,'2017-04-27 21:10:08','2017-04-27 21:10:12'),(177,8,108,'2017-04-27 21:10:31','2017-04-27 21:10:48'),(178,8,108,'2017-04-27 21:13:43','2017-04-27 21:13:45'),(179,8,108,'2017-04-27 21:13:48','2017-04-27 21:14:17'),(180,8,108,'2017-04-27 21:14:18','2017-04-27 21:14:24'),(181,8,108,'2017-04-27 21:14:25','2017-04-27 21:14:44'),(182,8,108,'2017-04-27 21:14:46','2017-04-27 21:14:51'),(183,8,108,'2017-04-27 21:17:19','2017-04-27 21:17:20'),(184,8,108,'2017-04-27 21:17:21','2017-04-27 21:17:26'),(185,8,108,'2017-04-27 21:17:27','2017-04-27 21:17:33'),(186,8,108,'2017-04-27 21:17:33','2017-04-27 21:17:39'),(187,8,101,'2017-04-27 21:22:35','2017-04-27 21:22:38'),(188,8,101,'2017-04-27 21:22:44','2017-04-27 21:24:49'),(189,8,101,'2017-04-27 21:24:50','2017-04-27 21:24:56'),(190,8,101,'2017-04-27 21:25:20','2017-04-27 21:25:26'),(191,8,101,'2017-04-27 21:25:51','2017-04-27 21:25:55'),(192,8,101,'2017-04-27 21:25:57','2017-04-27 21:26:00'),(193,8,101,'2017-04-27 21:26:16','2017-04-27 21:26:18'),(194,8,101,'2017-04-27 21:28:55','2017-04-27 21:28:56'),(195,8,101,'2017-04-27 21:30:25','2017-04-27 21:30:28'),(196,8,101,'2017-04-27 21:30:31','2017-04-27 21:30:46'),(197,8,101,'2017-04-27 21:31:05','2017-04-27 21:31:13'),(198,8,101,'2017-04-27 21:31:22','2017-04-27 21:33:32'),(199,8,101,'2017-04-27 21:33:36','2017-04-27 21:33:39'),(200,8,101,'2017-04-27 21:33:47','2017-04-27 21:33:51'),(201,8,101,'2017-04-27 21:34:00','2017-04-27 21:34:11'),(202,8,101,'2017-04-27 21:34:13','2017-04-27 21:34:36'),(203,8,110,'2017-04-27 21:35:37','2017-04-27 21:35:43'),(204,8,110,'2017-04-27 21:36:32','2017-04-27 21:36:33'),(205,8,105,'2017-04-28 01:17:38','2017-04-28 01:17:51'),(206,8,105,'2017-04-28 01:17:52','2017-04-28 01:31:25'),(207,8,105,'2017-04-28 01:32:21','2017-04-28 01:32:22'),(208,8,105,'2017-04-28 01:32:23','2017-04-28 01:32:23'),(209,8,97,'2017-04-28 01:33:10','2017-04-28 01:37:20'),(210,8,97,'2017-04-28 01:37:23','2017-04-28 01:39:26'),(211,8,110,'2017-04-28 01:40:28','2017-04-28 01:42:27'),(212,8,99,'2017-04-28 13:35:04','2017-04-28 13:35:06'),(213,8,99,'2017-04-28 14:12:37','2017-04-28 14:13:43'),(214,8,99,'2017-04-28 14:54:52','2017-04-28 14:55:04'),(215,8,99,'2017-04-28 14:55:11','2017-04-28 14:58:32');
/*!40000 ALTER TABLE `timetracking` ENABLE KEYS */;
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
  `auth_key` varchar(255) DEFAULT NULL,
  `regdata` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (5,'bbbooobbb','xdeenist@gmail.com','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:01:36'),(6,'govnouser','govnouser@gmail.com','b3575f222f7b768c25160b879699118b5','user',NULL,'2017-04-15 20:01:36'),(7,'выаыаыв','dsxdeenist@gmail.com','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:01:36'),(8,'yoba','yoba@eto.ty','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:01:36'),(9,'sergey','serg@serg.com','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:01:36'),(10,'bbbooobbb2ee','exdeenist@gmail.com','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:10:55'),(11,'bbbooobbbsada','xdeesadasdnist@gmail.com','202cb962ac59075b964b07152d234b703','user',NULL,'2017-04-15 20:21:40'),(12,'bbboosadfasdobbb','xasdasddeenist@gmail.com','202cb962ac59075b964b07152d234b703','user','67XeTMiYGnrjKEP0IYWzp63dS7Gt32Sq','2017-04-15 20:23:46'),(13,'bbboodfsobbb','xdesdfddenist@gmail.com','202cb962ac59075b964b07152d234b703','user','wsqvBETLFhD5OyMlWlbSahF4hC8GGKyP','2017-04-16 15:02:04'),(14,'asmer','asmer.free@gmail.com','4297f44b13955235245b2497399d7a936','user','J_fce6msns4TOuNYun3PWJXwCVaifhGB','2017-04-18 16:59:30');
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

-- Dump completed on 2017-04-28 16:11:32
