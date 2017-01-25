-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: dictionary
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `dictionary`
--

DROP TABLE IF EXISTS `dictionary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dictionary` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `dictionarys` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dictionary`
--

LOCK TABLES `dictionary` WRITE;
/*!40000 ALTER TABLE `dictionary` DISABLE KEYS */;
INSERT INTO `dictionary` VALUES (1,'Толковый');
INSERT INTO `dictionary` VALUES (2,'Орфографический');
/*!40000 ALTER TABLE `dictionary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stable_exp`
--

DROP TABLE IF EXISTS `stable_exp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stable_exp` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `stable_exp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stable_exp`
--

LOCK TABLES `stable_exp` WRITE;
/*!40000 ALTER TABLE `stable_exp` DISABLE KEYS */;
INSERT INTO `stable_exp` VALUES (1,'back and forth');
INSERT INTO `stable_exp` VALUES (2,'back down');
INSERT INTO `stable_exp` VALUES (3,'baker dozen');
INSERT INTO `stable_exp` VALUES (4,'balance out');
INSERT INTO `stable_exp` VALUES (5,'bald apot');
INSERT INTO `stable_exp` VALUES (6,'ball park');
/*!40000 ALTER TABLE `stable_exp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `synonim`
--

DROP TABLE IF EXISTS `synonim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `synonim` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `synonims` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `synonim`
--

LOCK TABLES `synonim` WRITE;
/*!40000 ALTER TABLE `synonim` DISABLE KEYS */;
INSERT INTO `synonim` VALUES (1,'recover');
INSERT INTO `synonim` VALUES (2,'recuperate');
INSERT INTO `synonim` VALUES (3,'bakehouse');
INSERT INTO `synonim` VALUES (4,'Libra');
INSERT INTO `synonim` VALUES (5,'barefaced');
INSERT INTO `synonim` VALUES (6,'egg');
/*!40000 ALTER TABLE `synonim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `words`
--

DROP TABLE IF EXISTS `words`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `en` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dictionary` int(10) NOT NULL,
  `stable_exp` int(10) NOT NULL,
  `synonim` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dictionary` (`dictionary`,`stable_exp`,`synonim`),
  KEY `dictionary_2` (`dictionary`,`stable_exp`,`synonim`),
  KEY `stable_exp` (`stable_exp`),
  KEY `synonim` (`synonim`),
  CONSTRAINT `words_ibfk_1` FOREIGN KEY (`dictionary`) REFERENCES `dictionary` (`id`),
  CONSTRAINT `words_ibfk_2` FOREIGN KEY (`stable_exp`) REFERENCES `stable_exp` (`id`),
  CONSTRAINT `words_ibfk_3` FOREIGN KEY (`synonim`) REFERENCES `synonim` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `words`
--

LOCK TABLES `words` WRITE;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` VALUES (1,'назад','back',1,1,1);
INSERT INTO `words` VALUES (2,'назад','back',1,1,1);
INSERT INTO `words` VALUES (3,'пекарь','baker',1,1,1);
INSERT INTO `words` VALUES (4,'баланс','balance',2,1,1);
INSERT INTO `words` VALUES (5,'лысый','bald',1,1,1);
INSERT INTO `words` VALUES (6,'мяч','ball',1,1,1);
/*!40000 ALTER TABLE `words` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-11 16:48:01
