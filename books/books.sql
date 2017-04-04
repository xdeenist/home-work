-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: books
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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) NOT NULL,
  `book_serial` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `discr` text NOT NULL,
  `edition_add` text NOT NULL,
  `year_add` int(4) NOT NULL,
  `genre_add_id` int(5) NOT NULL,
  `book_create_datetime` datetime NOT NULL,
  `book_update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_img` varchar(50) DEFAULT NULL,
  `book_file` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL,
  UNIQUE KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (30,'акнига','серия','genre_add_id','Описание азаза','genre_add_id',5465,104,'2017-02-28 13:42:44','2017-03-07 13:20:33','phpaG6uQy.jpg','phpPVtA4L.doc',7),(31,'Книга','серия','genre_add_id','Описание азаза','genre_add_id',5465,28,'2017-02-28 14:18:11','2017-03-04 09:46:33','phpbKfSFD.jpg','php3o0Kaz.doc',7),(37,'Книга','серия','genre_add_id','Описание азаза','genre_add_id',5465,26,'2017-03-02 14:07:36','2017-03-15 18:32:31','phpmcFdqM.jpg','php3o0Kaz.doc',9),(38,'Книга','Книга 5 Книга 5 м','genre_add_id',' Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза  Описание азаза ','genre_add_id',5465,28,'2017-03-02 14:55:02','2017-03-07 14:24:23','phpSqF7fv.jpg','phpgjgl0z.pdf',9),(42,'Книга 4','fКнига 4','Книга 4 Книга 4','Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 Книга 4 ','Книга 4 ',4353,44,'2017-03-04 14:32:15','2017-03-04 12:32:15','phptPYKV5.jpg','php3oIh2T.doc',7),(43,'Книга 5','Книга 5 Книга 5 м','Книга 5 Книга 5','Книга 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 мКнига 5 Книга 5 м','Книга 5 Книга 5 м',4654,38,'2017-03-04 19:36:53','2017-03-04 17:36:53','phpJc50fc.jpg','phpNycWMQ.pdf',7),(44,'erf rewkj hrfkew ',' ew jekwh kfakj ',' awert art re',' awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re awert art re','we dweqr eqwr ',1231,24,'2017-03-15 23:56:18','2017-03-15 21:56:18','phpNZkQzI.jpg','phpoK4gAI.pdf',15),(45,'ewriewt vweak b','ads adsjf asd aLS',' ASDRAGR ','EWR WFDSG JKSDFH JGHSDFKLJG HLKSADJ HKAJH KLASJH LKASJDFH KLSAJH GKLSDJF HJKLG HKJkjh fkldjs h lksjdfhlksjdf  hgklsdfjh ksdfjh lksdfjh lksdfj hlkjdfh sd sdf dsfg dfsg dfg ','regertw',4534,25,'2017-03-16 00:22:35','2017-03-15 22:22:35','php06YvtO.jpg','phpRtp0wH.pdf',15);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(5) NOT NULL,
  `comment_parent_id` int(5) DEFAULT NULL,
  `comment_username` varchar(50) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,31,NULL,'Allah','1-2-1-3-1-3-1-3-1-3--4-5-','2017-03-06 12:55:49'),(2,31,NULL,'Allah','вапывфаыфваыв','2017-03-04 23:11:37'),(3,31,NULL,'Allah','выавыафавыфа','2017-03-04 23:12:34'),(4,31,3,'azaza','sdfgsdgfsdkjhsdfjgsdfkjlgjkhdfs','2017-03-05 18:45:41'),(5,31,4,'azaza','sdfgsdgfsdkjhsdfjgsdfkjlgjkhdfs','2017-03-05 18:45:57'),(6,31,5,'azaza','sdfgsdgfsdkjhsdfjgsdfkjlgjkhdfs','2017-03-05 18:46:12'),(7,31,2,'azaza','sdfgsdgfsdkjhsdfjgsdfkjlgjkhdfs','2017-03-05 18:46:18'),(8,31,NULL,'Allah','ываолдвыпрыфва омйыоар ждфылрп фдлоп фуеуеы р','2017-03-06 00:10:24'),(9,31,8,'Allah','sgsdfgfsdg sdfg gs df sg sg ','2017-03-06 11:07:17'),(10,31,9,'Allah','re tgvewrttwertvbwer wertrvrt wet eet terw we trt ','2017-03-06 11:07:33'),(11,31,8,'Allah','erwt wert wert we twet we et sg gdhg hdf','2017-03-06 11:07:46'),(12,31,7,'Allah','4567984531xcsd ','2017-03-06 12:10:30'),(13,31,1,'Allah','=6=4=3==2=4=5=65=7==8=5=4==3=3=5=6==7=7=6','2017-03-06 12:56:04'),(15,38,NULL,'Gud','klasdf jgas ','2017-03-06 12:58:00'),(16,38,15,'Gud','123','2017-03-06 13:09:13'),(17,42,NULL,'Gud','789','2017-03-06 13:30:25'),(19,42,18,'Gud','tr ytrhgd hfdg hdg gdfgh fg hdfg','2017-03-06 13:30:11'),(20,43,NULL,'Gud','dsaf fasdsd asd ','2017-03-06 13:42:55'),(24,43,23,'Gud','sdfgedgdfdfsgff ','2017-03-06 13:51:42'),(25,30,NULL,'Allah','dsfd bfsdfs','2017-03-06 14:29:54'),(26,37,NULL,'Allah','fd fads asdkjh sdak hdaf','2017-03-15 21:54:12'),(27,37,26,'Allah',' sdfgklsdfj gasdfklj asl asp q\'p;','2017-03-15 21:54:20'),(28,37,27,'Allah','re re kljsdf asdl aldsk ads ','2017-03-15 21:54:28'),(29,37,26,'Allah','df lfkdfas klsdah fkdsafj ds','2017-03-15 21:54:36'),(30,44,NULL,'Qwerty','465','2017-03-15 21:56:34'),(32,44,NULL,'Qwerty','fdg asd dsf asd fasd ','2017-03-15 21:56:51'),(33,44,30,'Qwerty',' sd  8665\r\n3513131\r\n','2017-03-15 22:20:09'),(34,42,NULL,'Qwerty','cvxbxzc zsdf sdfa szdf as asd','2017-03-15 22:21:06'),(35,45,NULL,'Qwerty','1','2017-03-15 22:23:01');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `contact_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(100) DEFAULT NULL,
  `cont_mail` varchar(100) DEFAULT NULL,
  `cont_text` text,
  `user_id` int(5) DEFAULT NULL,
  `reed` int(1) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `contact_id` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (4,'dsfsdfsdf','xdeenist@gmail.com','sdfsfasdfadsf  asdf sdfsfasdfadsf  asdfsdfsfasdfadsf  asdf sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-26 16:56:05'),(5,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 13:28:28'),(6,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,1,'2017-03-21 15:14:40'),(7,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,1,'2017-03-21 15:14:39'),(8,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,1,'2017-03-21 15:14:37'),(9,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,1,'2017-03-21 15:13:44'),(10,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:06'),(11,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:06'),(12,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:06'),(14,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:06'),(15,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:07'),(16,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:07'),(17,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:07'),(18,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:07'),(19,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:07'),(20,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:08'),(21,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:08'),(22,'dsfsdfsdf','dsfdsfsd@dd.dd','sdfsfasdfadsf  asdf ',NULL,NULL,'2017-03-21 15:18:09');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre_list`
--

DROP TABLE IF EXISTS `genre_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre_list` (
  `genre_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `genre_parent_id` bigint(20) DEFAULT NULL,
  `genre_add_title` varchar(100) DEFAULT NULL,
  UNIQUE KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre_list`
--

LOCK TABLES `genre_list` WRITE;
/*!40000 ALTER TABLE `genre_list` DISABLE KEYS */;
INSERT INTO `genre_list` VALUES (1,NULL,'Деловая литература'),(2,NULL,'Детективы и Триллеры'),(3,NULL,'Документальная литература'),(4,NULL,'Дом и семья'),(5,NULL,'Драматургия'),(6,NULL,'Искусство, Дизайн'),(7,NULL,'Компьютеры и Интернет'),(8,NULL,'Литература для детей'),(9,NULL,'Любовные романы'),(10,NULL,'Наука, Образование'),(11,NULL,'Поэзия'),(12,NULL,'Приключения'),(13,NULL,'Проза'),(14,NULL,'Прочее'),(15,NULL,'Религия, духовность'),(16,NULL,'Справочная литература'),(17,NULL,'Старинное'),(18,NULL,'Техника'),(19,NULL,'Учебники и пособия'),(20,NULL,'Фантастика'),(21,NULL,'Фольклор'),(22,NULL,'Юмор'),(23,1,'Карьера, кадры'),(24,1,'Экономика'),(25,1,'Маркетинг, PR'),(26,1,'Финансы'),(27,1,'Деловая литература'),(28,2,'Детективы'),(29,2,'Триллер'),(30,2,'Боевик'),(31,2,'Классический детектив'),(32,2,'Шпионский детектив'),(33,2,'Иронический детектив, дамский детективный роман'),(34,2,'Исторический детектив'),(35,2,'Криминальный детектив'),(36,2,'Полицейский детектив'),(37,2,'Крутой детектив'),(38,2,'Политический детектив'),(39,2,'Про маньяков'),(40,3,'Биографии и Мемуары'),(41,3,'Биографии и Мемуары'),(42,3,'Публицистика'),(43,3,'Документальная литература'),(44,3,'Военная документалистика и аналитика'),(45,3,'Военное дело'),(46,4,'Здоровье'),(47,4,'Боевые искусства, спорт'),(48,4,'Домоводство'),(49,4,'Семейные отношения, секс'),(50,4,'Хобби и ремесла'),(51,4,'Кулинария'),(52,4,'Домашние животные'),(53,4,'Развлечения'),(54,4,'Сделай сам'),(55,4,'Сад и огород'),(56,4,'Педагогика, воспитание детей, литература для родителей'),(57,4,'Автомобили и ПДД'),(58,5,'Драматургия'),(59,5,'Сценарий'),(60,6,'Культурология'),(61,6,'Критика'),(62,6,'Искусство и Дизайн'),(63,6,'Музыка'),(64,6,'Кино'),(65,7,'Зарубежная компьютерная, околокомпьютерная литература'),(66,7,'ОС и Сети, интернет'),(67,7,'Компьютерное \'железо\' (аппаратное обеспечение), цифровая обработка сигналов'),(68,7,'Программирование, программы, базы данных'),(69,8,'Проза для детей'),(70,8,'Сказки народов мира'),(71,8,'Фантастика для детей'),(72,8,'Детская литература'),(73,8,'Детская остросюжетная литература'),(74,8,'Детская образовательная литература'),(75,8,'Стихи для детей'),(76,8,'Зарубежная литература для детей'),(77,9,'Короткие любовные романы'),(78,9,'Современные любовные романы'),(79,9,'Исторические любовные романы'),(80,9,'Любовное фэнтези, любовно-фантастические романы'),(81,9,'Остросюжетные любовные романы'),(82,9,'Эротическая литература'),(83,9,'Любовные романы'),(84,9,'Порно'),(85,10,'История'),(86,10,'Политика'),(87,10,'Психология и психотерапия'),(88,10,'Научная литература'),(89,10,'Философия'),(90,10,'Медицина'),(91,10,'Языкознание, иностранные языки'),(92,10,'Биология, биофизика, биохимия'),(93,10,'Физика'),(94,10,'Военная история'),(95,10,'Альтернативная медицина'),(96,10,'Юриспруденция'),(97,10,'Математика'),(98,10,'Зарубежная образовательная литература, зарубежная прикладная, научно-популярная литература'),(99,10,'Литературоведение'),(100,10,'Астрономия и Космос'),(101,10,'Химия'),(102,10,'Государство и право'),(103,10,'Геология и география'),(104,10,'Обществознание, социология'),(105,10,'Экономика'),(106,10,'Зоология'),(107,11,'Поэзия'),(108,11,'Юмористические стихи, басни'),(109,12,'Исторические приключения'),(110,12,'Приключения'),(111,12,'Путешествия и география'),(112,12,'Природа и животные'),(113,12,'Приключения для детей и подростков'),(114,12,'Морские приключения'),(115,12,'Вестерн, про индейцев'),(116,13,'Современная русская и зарубежная проза'),(117,13,'Классическая проза'),(118,13,'Историческая проза'),(119,13,'Проза о войне'),(120,13,'Русская классическая проза'),(121,13,'Советская классическая проза'),(122,13,'Контркультура'),(123,13,'Проза'),(124,13,'Классическая проза ХX века'),(125,13,'Афоризмы, цитаты'),(126,13,'Зарубежная классическая проза'),(127,13,'Классическая проза ХIX века'),(128,13,'Роман, повесть'),(129,14,'Неотсортированное'),(130,14,'Журналы, газеты'),(131,14,'Фанфик'),(132,15,'Эзотерика, эзотерическая литература'),(133,15,'Самосовершенствование'),(134,15,'Религиоведение'),(135,15,'Религия, религиозная литература'),(136,15,'Буддизм'),(137,15,'Православие'),(138,15,'Христианство'),(139,15,'Ислам'),(140,15,'Язычество'),(141,15,'Индуизм'),(142,15,'Иудаизм'),(143,16,'Энциклопедии'),(144,16,'Руководства'),(145,16,'Справочная литература'),(146,16,'Справочники'),(147,16,'Путеводители, карты, атласы'),(148,16,'Словари'),(149,17,'antique'),(150,17,'Европейская старинная литература'),(151,17,'Древневосточная литература'),(152,17,'Античная литература'),(153,17,'Древнерусская литература'),(154,18,'Технические науки'),(155,18,'Военное дело, военная техника и вооружение'),(156,18,'Транспорт и авиация'),(157,18,'Строительство и сопромат'),(158,19,'Учебники и пособия'),(159,20,'Фэнтези'),(160,20,'Научная Фантастика'),(161,20,'Боевая фантастика'),(162,20,'Альтернативная история, попаданцы'),(163,20,'Космическая фантастика'),(164,20,'Юмористическая фантастика'),(165,20,'Ужасы'),(166,20,'Социально-психологическая фантастика'),(167,20,'Эпическая фантастика'),(168,20,'Героическая фантастика'),(169,20,'Киберпанк'),(170,20,'Детективная фантастика'),(171,20,'Городское фэнтези'),(172,20,'Постапокалипсис'),(173,20,'Мистика'),(174,20,'Фантастика'),(175,20,'Мифологическое фэнтези'),(176,21,'Мифы. Легенды. Эпос'),(177,22,'Юмористическая проза'),(178,22,'Юмор'),(179,22,'Анекдоты'),(180,22,'Сатира');
/*!40000 ALTER TABLE `genre_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rate` (
  `rate_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `rate` int(2) NOT NULL,
  UNIQUE KEY `rate_id` (`rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` VALUES (52,42,9,3),(53,38,9,5),(54,37,9,1),(55,37,7,4),(56,30,7,2),(57,38,7,3),(58,43,7,0),(59,31,7,5),(60,43,13,2),(61,31,9,1),(63,44,15,0),(64,45,15,0),(65,45,15,1),(66,38,15,5),(67,44,15,1),(68,31,15,4),(69,42,15,2);
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(20) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'Allah','c20ad4d76fe97759aa27a0c99bff67102','admin','ss@ss.ss'),(9,'Kitkat','c20ad4d76fe97759aa27a0c99bff67102','user','sss@ss.ss'),(10,'rigor_1','d41d8cd98f00b204e9800998ecf8427e0','user','Igor@yahoo.conn'),(11,'rigor_1','d41d8cd98f00b204e9800998ecf8427e0','user','Igor@yahoo.conn'),(12,'Drrigor_1','d41d8cd98f00b204e9800998ecf8427e0','user','Igor@yahoo.conn'),(13,'rigor_65','202cb962ac59075b964b07152d234b703','admin','Igor@yahoo.conn'),(15,'Qwerty','e10adc3949ba59abbe56e057f20f883e6','user','11@qq.qq');
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

-- Dump completed on 2017-03-28  9:17:01
