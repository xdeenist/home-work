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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependence`
--

LOCK TABLES `dependence` WRITE;
/*!40000 ALTER TABLE `dependence` DISABLE KEYS */;
INSERT INTO `dependence` VALUES (1,72,73);
/*!40000 ALTER TABLE `dependence` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (27,14,72,'Task \'Task 1\' wait to submit!',NULL),(28,9,73,'Task \'345\' wait to submit!',NULL),(29,8,74,'Task \'Task 4\' wait to submit!',1),(30,8,74,'Task \'Task 4\' was accepted!',1),(31,8,74,'Task \'Task 4\' wait to submit!',NULL),(32,8,74,'Task \'Task 4\' was accepted!',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (70,14,8,NULL,'To Be Yellow','Yoba, это ты?','2017-04-28',NULL,2,NULL,'WaitSubmit',NULL),(71,14,8,70,'Part1','','2017-04-20',NULL,1,NULL,'WaitSubmit',NULL),(72,8,14,NULL,'Task 1','dsfsadf saf sdf ','2017-04-28',NULL,1,NULL,'WaitSubmit',NULL),(73,8,9,72,'345','dsfgh gh ds','2017-04-19',NULL,4,NULL,'WaitSubmit',NULL),(74,8,8,NULL,'Task 4',' dfsg dfsg sdf ','2017-04-26',NULL,5,0,'Finish',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetracking`
--

LOCK TABLES `timetracking` WRITE;
/*!40000 ALTER TABLE `timetracking` DISABLE KEYS */;
INSERT INTO `timetracking` VALUES (28,8,74,'2017-04-20 22:50:39','2017-04-20 22:50:51');
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

-- Dump completed on 2017-04-21  1:55:43
