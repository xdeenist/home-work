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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,2,NULL,'Jessica','What about extending the operation to the rest of the world?','2017-01-17 22:56:54'),(2,2,1,'Nn Rr','lol jesus, have some patience.. someone\'s gotta test dis shit.. :- )  calm yourself','2017-01-17 23:00:58'),(3,2,NULL,'Rosa Vasquez','Worldwide release happening anytime soon?','2017-01-17 23:02:32'),(4,3,NULL,'Harvey Birdman','I\'ve just got 1 and yet another 2 extra','2017-01-17 23:13:22'),(5,3,4,'Frédéric Donckels','Pretty cool, I hope they\'ll keep it that way','2017-01-17 23:15:02'),(6,3,NULL,'Stephan Mayer','U can get much more then 3. I have seen a screenshot with 6 keys. ','2017-01-17 23:17:06'),(7,4,NULL,'Francine Daley','Awesome. Good to see 3 kiwis on the board. Thanks','2017-01-17 23:23:05'),(8,4,NULL,'Aaron Almeida','Full results link is dead.','2017-01-17 23:23:59'),(9,4,7,'Sean Graham','Is it just bug fixes and the Luminary badge string?','2017-01-17 23:25:10'),(16,5,NULL,'дед мороз','504 points while Enlightened are in control in Setouchi','2017-01-31 14:02:06'),(17,58,NULL,'санта клаус','умер на бали','2017-01-31 14:47:36'),(18,36,NULL,'Трансент','пятьсот рублей','2017-01-31 14:55:13'),(21,36,18,'нетрансент','четыреста засранцев','2017-02-03 14:00:19'),(22,36,18,'пол трансента','триста traktoristov','2017-02-03 13:50:21'),(23,59,NULL,'Эксперт','брэд','2017-02-01 08:13:56'),(41,60,NULL,'главый 1','ываыф','2017-02-01 18:06:41'),(42,60,NULL,'главый 2','ыфч/яч/я','2017-02-01 18:07:01'),(43,60,41,'второй','ответ главному 1','2017-02-01 18:07:20'),(44,60,43,'третий','ответ второму','2017-02-01 18:07:32'),(46,60,NULL,'главный 3','вфывйыв','2017-02-01 18:09:50'),(47,60,41,'пятый','твет главному 1','2017-02-01 18:47:24'),(48,60,42,'шестой','ответ главному 2','2017-02-01 22:20:05'),(51,60,44,'седьмой','ответ третьему','2017-02-02 08:51:33'),(52,60,44,'восьмой ','ответ третьему','2017-02-02 08:51:55'),(53,60,52,'дед мороз','хохохо','2017-02-02 09:02:34'),(54,59,23,'1','1','2017-02-02 09:29:13'),(55,59,23,'выаы','выаывф','2017-02-02 09:29:17'),(56,59,NULL,'ыфвыф','фывфы','2017-02-02 09:29:22'),(57,59,54,'ываыфвф','ыфвфывыф','2017-02-02 09:29:45'),(59,36,21,'1','2','2017-02-03 10:09:59'),(60,36,21,'3','4 trakorista','2017-02-03 13:50:40'),(61,36,59,'5','6','2017-02-03 10:10:18'),(62,36,18,'7','8','2017-02-03 10:10:31'),(63,36,61,'9','10 traktoristov i sunduk','2017-02-03 13:51:11'),(64,36,NULL,'11','12ывапываываыва','2017-02-03 13:50:08'),(69,62,NULL,'комментатор 1','наркоман штоле','2017-02-03 13:52:16'),(70,62,69,'комментатор 2','нет','2017-02-03 13:52:28'),(71,62,70,'комментатор 3','да','2017-02-03 13:52:38'),(72,62,69,'комментатор 4','шерсть это жизнь','2017-02-03 13:53:07'),(73,71,NULL,'первый ','главный','2017-02-03 14:36:41'),(74,71,73,'второй','ответ первому','2017-02-03 14:36:59'),(75,71,74,'третий','ответ второму','2017-02-03 14:37:10'),(76,71,74,'четвертый','ответ второму','2017-02-03 14:37:30'),(77,71,76,'пятый','ответ четвертому','2017-02-03 14:37:47'),(78,71,73,'шестой','ответ первому главному','2017-02-03 14:38:04'),(79,71,77,'ихохо','я комментарий','2017-02-03 14:38:22'),(80,71,NULL,'второй главный комент','ывфавыфафвыаываывфы афываф ывафываф вафыаывфыфв афывафываф ывафывафыв','2017-02-03 14:39:03'),(81,71,80,'седьмой','тычо э','2017-02-03 14:39:32'),(82,71,73,'ewfwfsd','dsfdsf','2017-02-04 14:11:50'),(83,72,NULL,'dfsdff','dstrdsfgds','2017-02-04 15:15:07'),(84,80,NULL,'уываыа','ываыфва','2017-02-05 19:06:27'),(85,80,84,'ваыфва','ываываыва','2017-02-05 19:06:32'),(86,80,85,'ываыва','выаыва','2017-02-05 19:06:37'),(87,80,86,'выаыва','ываыва','2017-02-05 19:06:46'),(88,80,84,'ываыва','выаыва','2017-02-05 19:06:51');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `image_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `post_id` varchar(255) DEFAULT NULL,
  UNIQUE KEY `image_id` (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (46,'phphr0oom.jpg','102'),(47,'php9GHgiZ.jpg','71'),(49,'phpEzyRbP.png','70'),(50,'phpdPZxGU.jpg','36');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_admin`
--

DROP TABLE IF EXISTS `login_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_admin`
--

LOCK TABLES `login_admin` WRITE;
/*!40000 ALTER TABLE `login_admin` DISABLE KEYS */;
INSERT INTO `login_admin` VALUES (1,'admin','1');
/*!40000 ALTER TABLE `login_admin` ENABLE KEYS */;
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
  `post_min_text` text,
  `post_text` text,
  `post_create_datetime` timestamp NULL DEFAULT NULL,
  `post_update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'subject','look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni look at my poni ','                        text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body	  text body		        	','2017-01-17 22:10:46','2017-01-28 22:47:14'),(2,'Operation Portal Becon','                             Reports are coming in of the first portals to go live that were reviewed                                                                             ','                         Reports are coming in of the first portals to go live that were reviewed via Operation Portal Recon. Rejection e-mails from reviewed portals are also reported to be going out.		        			        	','2017-01-17 22:20:43','2017-01-29 12:51:26'),(3,'18','                               Get up to 3 keys without a fracker?                                                                           ','                        Get up to 3 keys without a fracker? A game changing tweak explored with Sean Graham﻿		        			        	','2017-01-17 22:22:07','2017-01-29 12:52:00'),(4,'IngressFS','                             Another month, another set of results from #IngressFS                                                                              ','                                                Another month, another set of results from #IngressFS  Jordon Mizzi takes you through the results including the special two year anniversary with some gifts.﻿﻿		        			        	    ','2017-01-17 22:23:38','2017-02-02 10:02:50'),(5,'ViaLuxLive','  dfsasdfdsfasga132546544357                               ','                                                Right now, Resistance are leading significantly in Singapore by 704 points and Macau by 504 points while Enlightened are in control in Setouchi by 570 points. Mumbai looks to be a close battle with Resistance in the lead by 34 points.		        			        	','2017-01-17 22:25:12','2017-01-29 15:12:58'),(14,'wsdasds','dasdasdas','dasdasdasdd','2017-01-29 12:56:28','2017-01-29 12:56:28'),(36,'dsfsdafgdsafdsfdsfdsf','                                                                                                                    kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh                                                                                                ','                                                                                                jhkhjkghjkhjkhjk		        	    		        	    		        	    		        	    kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        kjghjhkjhkjkggjh        ','2017-01-29 20:59:06','2017-02-05 22:51:31'),(70,'Ни о чем','                                                                                       Первый бесполезный пост                                                                                                                                                ','                                                                                                                                                Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего Тут нет ничего 		        	    		        	    		        	    		        	    		        	    		        	    ','2017-02-03 14:08:30','2017-02-05 22:46:54'),(71,'Ни о чем II','                                                                                                                    Второй бесполезный пост                                                                                                ','                                                                                                Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет Тут все еще ничего нет 		        	    		        	    		        	    		        	    ','2017-02-03 14:10:20','2017-02-05 22:46:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=1033 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_to_tag`
--

LOCK TABLES `post_to_tag` WRITE;
/*!40000 ALTER TABLE `post_to_tag` DISABLE KEYS */;
INSERT INTO `post_to_tag` VALUES (1,1,2),(2,2,5),(3,5,1),(4,3,4),(5,1,6),(6,4,5),(7,2,1),(8,3,1),(9,5,1),(10,1,7),(11,14,2),(12,14,7),(13,15,2),(14,15,5),(21,37,43),(22,37,44),(23,37,45),(29,38,51),(30,38,52),(31,38,53),(32,38,54),(33,39,55),(34,40,56),(35,40,57),(36,40,58),(37,41,59),(42,50,60),(43,51,61),(44,52,62),(45,52,63),(46,54,64),(47,57,1),(48,58,1),(60,59,1),(61,59,66),(62,60,1),(63,60,66),(64,60,5),(65,60,67),(66,4,67),(67,59,41),(71,60,1),(72,60,74),(73,59,1),(80,61,1),(81,61,4),(82,61,5),(83,61,74),(890,63,98),(891,64,37),(892,64,38),(893,64,39),(894,65,37),(895,65,38),(896,65,39),(900,66,37),(901,66,38),(902,66,39),(931,68,37),(932,68,38),(933,68,39),(947,69,1),(948,69,4),(949,69,5),(950,69,99),(951,62,40),(952,62,86),(953,62,88),(954,62,89),(955,62,100),(998,72,102),(999,72,103),(1000,73,104),(1004,83,91),(1005,80,105),(1006,80,106),(1007,80,107),(1012,71,1),(1013,71,4),(1014,71,5),(1015,71,100),(1022,70,1),(1023,70,40),(1024,70,86),(1025,70,88),(1026,70,89),(1027,70,100),(1028,36,40),(1029,36,41),(1030,36,42),(1031,36,65),(1032,36,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'tag'),(2,'mytag'),(3,'yourtag'),(4,'mazeltof'),(5,'karamba'),(6,'people'),(7,'ztramp'),(12,'tag2'),(13,'tag3'),(14,'tag25'),(15,'tag12'),(16,'tag8'),(37,'zxczxc'),(38,'xzcxzc'),(39,'xzczxc'),(40,'karl'),(41,'gravicapa'),(42,'kacap'),(43,'ksssarl'),(44,'grasssvicapa'),(45,'kadxfsfcap'),(51,'ksssarl'),(52,'grasssvicapa'),(65,'tag45'),(66,'мазелтоф'),(67,'Возвращение'),(70,'karamba'),(86,'этотупо'),(87,'тупоkarl'),(88,'дваночи'),(89,'диспинаконец'),(90,'ночи'),(91,'1'),(94,'newtag'),(95,'жаба'),(96,'жопа'),(97,'жопа2'),(98,'12tag'),(99,'narkomaia'),(100,'narkomania'),(101,'q'),(102,'123'),(103,'321'),(104,'asa'),(105,'ыцвб'),(106,'ыывы'),(107,'ывыв');
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

-- Dump completed on 2017-02-06  1:00:11
