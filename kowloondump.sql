-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: kowloon
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


CREATE DATABASE /*!32312 IF NOT EXISTS*/ `robindeher63001` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `robindeher63001`;

--
-- Table structure for table `carouselimages`
--

DROP TABLE IF EXISTS `carouselimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carouselimages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carouselimages`
--

LOCK TABLES `carouselimages` WRITE;
/*!40000 ALTER TABLE `carouselimages` DISABLE KEYS */;
INSERT INTO `carouselimages` VALUES (1,'carousel-1.png'),(2,'carousel-2.png'),(3,'carousel-3.png');
/*!40000 ALTER TABLE `carouselimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Honden','Chiens','dog'),(2,'Katten','Chats','cat'),(3,'Vissen','Poisson','fish'),(4,'Vogels','Oiseaux','bird'),(5,'Kleine dieren','Petits animaux','hamster'),(6,'Andere','Autre','other');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colors_product_id_foreign` (`product_id`),
  CONSTRAINT `colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (4,'#3e59a4',1,'2016-12-28 18:35:57','2016-12-28 18:35:57'),(5,'#ffffff',1,'2016-12-28 18:35:57','2016-12-28 18:35:57'),(6,'#123123',1,'2016-12-28 18:35:57','2016-12-28 18:35:57');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dimensions`
--

DROP TABLE IF EXISTS `dimensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dimensions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dimensions_product_id_foreign` (`product_id`),
  CONSTRAINT `dimensions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dimensions`
--

LOCK TABLES `dimensions` WRITE;
/*!40000 ALTER TABLE `dimensions` DISABLE KEYS */;
INSERT INTO `dimensions` VALUES (4,'S - Ø 53x18cm',3,NULL,NULL),(5,'M - Ø 53x18cm',3,NULL,NULL),(6,'L - Ø 53x18cm',4,NULL,NULL),(7,'S - Ø 53x18cm',1,'2016-12-28 18:35:57','2016-12-28 18:35:57'),(8,'M - Ø 53x18cm',1,'2016-12-28 18:35:57','2016-12-28 18:35:57'),(9,'L - Ø 53x18cm',1,'2016-12-28 18:35:57','2016-12-28 18:35:57');
/*!40000 ALTER TABLE `dimensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotitems`
--

DROP TABLE IF EXISTS `hotitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotitems_product_id_foreign` (`product_id`),
  CONSTRAINT `hotitems_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotitems`
--

LOCK TABLES `hotitems` WRITE;
/*!40000 ALTER TABLE `hotitems` DISABLE KEYS */;
INSERT INTO `hotitems` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(3,3,NULL,NULL),(4,3,NULL,NULL);
/*!40000 ALTER TABLE `hotitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (497,'2014_10_12_000000_create_users_table',1),(498,'2014_10_12_100000_create_password_resets_table',1),(499,'2016_11_26_083617_create_categories_table',1),(500,'2016_11_26_083618_create_products_table',1),(501,'2016_11_26_083708_create_productimages_table',1),(502,'2016_11_26_083724_create_tags_table',1),(503,'2016_11_26_083741_create_subscribers_table',1),(504,'2016_11_26_083812_create_questions_table',1),(505,'2016_11_26_085407_create_product_tag_table',1),(506,'2016_12_02_201223_create_carouselimages_table',1),(507,'2016_12_03_133647_create_hotitems_table',1),(508,'2016_12_09_212341_create_messages_table',1),(509,'2016_12_16_153151_create_product_question_table',1),(510,'2016_12_24_095150_create_colors_table',1),(511,'2016_12_24_095200_create_dimensions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_question`
--

DROP TABLE IF EXISTS `product_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_question`
--

LOCK TABLES `product_question` WRITE;
/*!40000 ALTER TABLE `product_question` DISABLE KEYS */;
INSERT INTO `product_question` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,2,1,NULL,NULL),(4,4,1,NULL,NULL),(5,5,1,NULL,NULL),(6,5,2,NULL,NULL),(7,6,2,NULL,NULL),(8,7,2,NULL,NULL);
/*!40000 ALTER TABLE `product_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_tag_tag_id_foreign` (`tag_id`),
  KEY `product_tag_product_id_foreign` (`product_id`),
  CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (1,2,1,NULL,NULL),(2,3,2,NULL,NULL),(3,4,2,NULL,NULL),(4,1,3,NULL,NULL),(5,3,4,NULL,NULL),(6,4,6,NULL,NULL),(7,5,8,NULL,NULL),(8,1,1,NULL,NULL),(9,1,5,NULL,NULL),(10,1,6,NULL,NULL),(11,1,7,NULL,NULL);
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productimages`
--

DROP TABLE IF EXISTS `productimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productimages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productimages_product_id_foreign` (`product_id`),
  CONSTRAINT `productimages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productimages`
--

LOCK TABLES `productimages` WRITE;
/*!40000 ALTER TABLE `productimages` DISABLE KEYS */;
INSERT INTO `productimages` VALUES (1,'cooling_mat.png','Voorbeeld','Example',1,NULL,NULL),(2,'cooling_mat.png','Voorbeeld','Example',5,NULL,NULL),(3,'cooling_mat.png','Voorbeeld','Example',6,NULL,NULL),(4,'cooling_mat.png','Voorbeeld','Example',7,NULL,NULL),(5,'cooling_mat.png','Voorbeeld','Example',1,NULL,NULL),(6,'dog-villa.jpg','Voorbeeld','Example',1,NULL,NULL),(7,'dog-villa.jpg','Voorbeeld','Example',2,NULL,NULL),(8,'cat-pole.jpg','Voorbeeld','Example',3,NULL,NULL),(9,'cat-pole.jpg','Voorbeeld','Example',1,NULL,NULL),(10,'cat-pole.jpg','Voorbeeld','Example',4,NULL,NULL),(11,'vissenvoer.jpg','Voorbeeld','Example',8,NULL,NULL);
/*!40000 ALTER TABLE `productimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `technical_description_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `technical_description_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Koelmat','Mat fraîche',15.99,'Koelmat voor honden','Mat fraîche pour des chiens','Technische beschrijving van een koelmat','Description technique d\'un mat fraîche',1,NULL,NULL),(2,'Hondenvilla','Chienvilla',58.95,'Villa voor honden','Villa pour des chiens','Technische beschrijving van een hondenvilla','Description technique chienvilla',1,NULL,NULL),(3,'Kattenkrabpaal','Chat griffoir',29.99,'Average sized cat pole.','Average sized cat pole.','Very average sized cat pole.','Very average sized cat pole.',2,NULL,NULL),(4,'Kattenkrabpaal 2.0','Chat griffoir 2.0',39.99,'Average sized cat pole.','Average sized cat pole.','Very average sized cat pole.','Very average sized cat pole.',2,NULL,NULL),(5,'Koelmat 2.0','Mat fraîche 2.0',25.99,'Koelmat voor honden','Mat fraîche pour des chiens','Technische beschrijving van een koelmat','Description technique d\'un mat fraîche',1,NULL,NULL),(6,'Koelmat 3.0','Mat fraîche 3.0',35.99,'Koelmat voor honden','Mat fraîche pour des chiens','Technische beschrijving van een koelmat','Description technique d\'un mat fraîche',1,NULL,NULL),(7,'Koelmat 4.0','Mat fraîche 4.0',505.99,'Koelmat voor honden','Mat fraîche pour des chiens','Technische beschrijving van een koelmat','Description technique d\'un mat fraîche',1,NULL,NULL),(8,'Vissenvoer','Aliments poissons',4.95,'Voeding voor vissen','Aliments pour poissons','Technische beschrijving voor voeding voor vissen','Description technique aliments pour poissons',3,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Hoe werkt dit product?','Comment fonctionne ce produit?','Nieuwe technologie','Nouvelle technologie',NULL,NULL),(2,'Kan mijn hond onderkoeld raken?','Mon chien peut-il obtenir l\'hypothermie?','No.','Non.',NULL,NULL),(3,'Hoe contacteer ik Kowloon?','Hoe contacteer ik Kowloon?','Vul het contactformulier in op de \'about\' pagina','Remplissez le formulaire de contact sur la page \'about\'',NULL,NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (1,'admin@kowloon.be','nl','2016-12-28 18:53:21','2016-12-28 18:53:21'),(14,'robin.deherdt@student.kdg.be','nl','2016-12-28 19:04:31','2016-12-28 19:04:31'),(15,'robindh95@gmail.com','nl','2016-12-28 19:05:02','2016-12-28 19:05:02'),(17,'rdh_robin@hotmail.com','nl','2016-12-28 19:06:50','2016-12-28 19:06:50'),(18,'bob@bouwer.be','fr','2016-12-28 19:09:31','2016-12-28 19:09:31');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_nl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_fr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Verkoeling','Fraicheur'),(2,'Luxe','Luxe'),(3,'Nieuw','Nouveau'),(4,'Korting','En soldes'),(5,'Voeding','Nourriture');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@kowloon.be','$2y$10$4s8ckgX1X.k.P59.tjfGS.n/AdsQ8eQJ5Kf/oB33aQnREFci6ZjkC',NULL,'2016-12-28 18:49:14','CHA3JBL84GZrjGrbRdhIYS9kkEolpvDTMWBxgP1wDVX4uETFPEYUjLL4VaZq');
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

-- Dump completed on 2016-12-28 21:17:11
