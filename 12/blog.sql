-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) DEFAULT NULL,
  `comment_parent_id` bigint(20) DEFAULT NULL,
  `comment_username` varchar(255) DEFAULT NULL,
  `comment_text` text,
  `comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,2,NULL,'Jessica','What about extending the operation to the rest of the world?','2017-01-17 22:56:54');
INSERT INTO `comment` VALUES (2,2,1,'Nn Rr','lol jesus, have some patience.. someone\'s gotta test dis shit.. :- )  calm yourself','2017-01-17 23:00:58');
INSERT INTO `comment` VALUES (3,2,NULL,'Rosa Vasquez','Worldwide release happening anytime soon?','2017-01-17 23:02:32');
INSERT INTO `comment` VALUES (4,3,NULL,'Harvey Birdman','I\'ve just got 1 and yet another 2 extra','2017-01-17 23:13:22');
INSERT INTO `comment` VALUES (5,3,4,'Frédéric Donckels','Pretty cool, I hope they\'ll keep it that way','2017-01-17 23:15:02');
INSERT INTO `comment` VALUES (6,3,NULL,'Stephan Mayer','U can get much more then 3. I have seen a screenshot with 6 keys. ','2017-01-17 23:17:06');
INSERT INTO `comment` VALUES (7,4,NULL,'Francine Daley','Awesome. Good to see 3 kiwis on the board. Thanks','2017-01-17 23:23:05');
INSERT INTO `comment` VALUES (8,4,NULL,'Aaron Almeida','Full results link is dead.','2017-01-17 23:23:59');
INSERT INTO `comment` VALUES (9,4,7,'Sean Graham','Is it just bug fixes and the Luminary badge string?','2017-01-17 23:25:10');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_text` text,
  `post_create_datetime` datetime DEFAULT NULL,
  `post_update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'subject','text body','2017-01-18 00:10:46','2017-01-17 22:10:46');
INSERT INTO `post` VALUES (2,'Operation Portal Recon','Reports are coming in of the first portals to go live that were reviewed via Operation Portal Recon. Rejection e-mails from reviewed portals are also reported to be going out.','2017-01-18 00:20:43','2017-01-17 22:20:43');
INSERT INTO `post` VALUES (3,'3 keys','Get up to 3 keys without a fracker? A game changing tweak explored with Sean Graham﻿','2017-01-18 00:22:07','2017-01-17 22:22:07');
INSERT INTO `post` VALUES (4,'IngressFS','Another month, another set of results from #IngressFS  Jordon Mizzi takes you through the results including the special two year anniversary with some gifts.﻿﻿','2017-01-18 00:23:38','2017-01-17 22:23:38');
INSERT INTO `post` VALUES (5,'ViaLuxLive','Right now, Resistance are leading significantly in Singapore by 704 points and Macau by 504 points while Enlightened are in control in Setouchi by 570 points. Mumbai looks to be a close battle with Resistance in the lead by 34 points.','2017-01-18 00:25:12','2017-01-17 22:25:12');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_to_tag`
--

DROP TABLE IF EXISTS `post_to_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_to_tag` (
  `post_to_tag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) DEFAULT NULL,
  `tag_id` bigint(20) DEFAULT NULL,
  UNIQUE KEY `post_to_tag_id` (`post_to_tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_to_tag`
--

LOCK TABLES `post_to_tag` WRITE;
/*!40000 ALTER TABLE `post_to_tag` DISABLE KEYS */;
INSERT INTO `post_to_tag` VALUES (1,1,2);
INSERT INTO `post_to_tag` VALUES (2,2,5);
INSERT INTO `post_to_tag` VALUES (3,5,1);
INSERT INTO `post_to_tag` VALUES (4,3,4);
INSERT INTO `post_to_tag` VALUES (5,1,6);
INSERT INTO `post_to_tag` VALUES (6,4,5);
INSERT INTO `post_to_tag` VALUES (7,2,1);
INSERT INTO `post_to_tag` VALUES (8,3,1);
INSERT INTO `post_to_tag` VALUES (9,5,1);
/*!40000 ALTER TABLE `post_to_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `tag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(128) DEFAULT NULL,
  UNIQUE KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'#tag');
INSERT INTO `tag` VALUES (2,'#mytag');
INSERT INTO `tag` VALUES (3,'#yourtag');
INSERT INTO `tag` VALUES (4,'#mazeltof');
INSERT INTO `tag` VALUES (5,'#karamba');
INSERT INTO `tag` VALUES (6,'#people');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-25 15:10:55
