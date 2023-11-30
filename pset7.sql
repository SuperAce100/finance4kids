-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,9,'CRM',5),(2,4,'AAPL',5),(3,2,'AMZN',3),(4,9,'INTU',5),(5,9,'GOOG',4),(6,9,'AAPL',3),(7,9,'SBUX',7),(8,9,'YHOO',2),(9,9,'DOW',2),(10,9,'KRX',2),(11,9,'NKE',1),(14,13,'TWX',5),(15,13,'HLT',2),(16,13,'TWTR',5),(17,13,'INTU',2),(18,13,'MSFT',2),(19,13,'FB',2),(20,12,'FREE',1000),(21,13,'DAL',1),(22,13,'CMG',1),(27,12,'GOOG',2);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` char(4) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,9,'GOOG',4,'2016-12-22 00:58:14','buy',794.56),(4,9,'NKE',1,'2016-12-22 01:42:53','buy',52.3),(5,12,'INTU',5,'2016-12-22 01:48:43','buy',117.69),(7,12,'GOOG',10,'2016-12-22 01:52:28','buy',794.56),(8,12,'GOOG',4,'2016-12-22 01:52:32','sell',794.56),(9,13,'TWX',5,'2016-12-22 02:02:13','buy',95.99),(10,13,'HLT',2,'2016-12-22 02:02:44','buy',27.73),(11,13,'TWTR',5,'2016-12-22 02:03:01','buy',17.08),(12,13,'INTU',2,'2016-12-22 02:03:16','buy',117.69),(13,13,'MSFT',2,'2016-12-22 02:03:32','buy',63.54),(14,13,'FB',2,'2016-12-22 02:03:43','buy',119.04),(15,12,'FREE',1000,'2016-12-22 02:04:41','buy',1.15),(16,13,'DAL',1,'2016-12-22 02:05:28','buy',50.92),(17,13,'CMG',1,'2016-12-22 02:05:40','buy',393.5),(18,13,'GOOG',5,'2016-12-22 02:06:09','buy',794.56),(19,13,'GOOG',4,'2016-12-22 02:06:20','sell',794.56),(20,13,'GOOG',4,'2016-12-22 02:19:06','buy',794.56),(21,13,'GOOG',4,'2016-12-22 02:19:11','sell',794.56),(22,12,'ADSFSDF',0,'2016-12-22 02:35:12','buy',0),(23,12,'GOOG',0,'2016-12-22 02:36:32','buy',794.56),(24,12,'GOOG',1,'2016-12-22 03:16:27','buy',794.56),(25,12,'GOOG',1,'2016-12-22 03:16:35','buy',794.56),(26,17,'GOOG',12,'2016-12-22 03:40:56','buy',794.56),(27,17,'GOOG',4,'2016-12-22 03:41:36','sell',794.56),(28,17,'GOOG',12,'2016-12-22 03:45:30','buy',794.56),(29,17,'GOOG',4,'2016-12-22 03:45:34','sell',794.56),(30,17,'GOOG',12,'2016-12-22 03:47:18','buy',794.56),(31,17,'GOOG',12,'2016-12-22 03:49:54','sell',794.56),(32,18,'',1,'2016-12-22 04:07:53','cash',10000),(33,18,'GOOG',1,'2016-12-22 04:15:25','buy',794.56),(34,18,'GOOG',1,'2016-12-22 04:15:28','sell',794.56),(35,18,'GOOG',1,'2016-12-22 04:17:51','buy',794.56),(36,18,'GOOG',1,'2016-12-22 04:17:57','sell',794.56),(37,18,'',1,'2016-12-22 04:47:16','cash',0),(38,18,'',1,'2016-12-22 04:48:52','cash',100);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',10000.0000),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000),(9,'skroob','$2y$10$UzZiGyEj/air1zW4Hbz8EeSit1KVIHrR.FzP8nd/gojYHqA3GWxFu',9895.4000),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000),(11,'Admin','$2y$10$alThwKDd2E1SyVLCfo5JsOXemiPAwC5gkFmjy/mZAUsqEc2easowq',10000.0000),(12,'SuperAce100','$2y$10$Y.bTaaiofCdnqCsUP5zEOOyReBS9T0OAf.mAutdJ3zeU5tNqY9Vke',7260.8800),(13,'OushdaPooch','$2y$10$vk0kEj.kOeVQXQ81BujCceObH8q4nI/Pc20af.UnutnSOAT46FSCm',8335.2300),(16,'Bharat1000','$2y$10$VZGGnW1EJBZ9QSmXA5JJKOArJi90utysvrF8TymupDJNdbEhsNsau',10000.0000),(17,'Cerave','$2y$10$GalqlOiKRBK79JC4.y7ntOmE4rQ5Zi7RjiuwUnzWXM4UVD/y.JnZy',10001.0000),(18,'testuser','$2y$10$NW8QvXykdzsKrGeGpuvqgeywzmS/9gJMVlOqJVPe0merTWMu2WVWG',10102.0000);
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

-- Dump completed on 2016-12-22  4:56:18
