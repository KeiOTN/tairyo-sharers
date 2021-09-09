-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: mysql    Database: fish_app
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fishing_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime_1` datetime NOT NULL,
  `place_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_2` datetime DEFAULT NULL,
  `place_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime_3` datetime DEFAULT NULL,
  `place_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit` datetime NOT NULL,
  `process_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process_10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cool_now` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cool_give` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_or_not` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,0,'ああああ','images/bs2yTCeXci81kgJ922bVcTlIWOO30aUbY2BDJMBQ.jpg','kindof.jpeg','20-60cm魚種による','玄界灘','2021-09-07 12:59:00','fukuoka','2021-09-07 16:00:00','osaka','2021-09-07 19:00:00','福岡','2021-09-09 13:00:00',NULL,'1','1',NULL,NULL,NULL,'1',NULL,NULL,NULL,'1','1','1','tetetteetst','2021-09-07 04:00:58','2021-09-07 04:00:58',NULL),(2,0,'さかな','images/bVJ0qxdJLo79OOj0vAbYsgOb5rLjoovYWYPGf02h.jpg','aji.jpeg','10匹くらい','玄界灘','2021-09-07 13:12:00','fukuoka','2021-09-07 18:18:00','osaka','2021-09-07 19:12:00','aaa','2021-09-08 13:12:00',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'1','1','1','tetetetest','2021-09-07 04:13:04','2021-09-07 04:13:04',NULL),(3,3,'さかな','images/UZGSmwl0JUJelUgthcLQDeG2VzyawsIHhopsAR2x.jpg','kawahagi.jpeg','20-60cm魚種による','玄界灘','2021-09-07 13:22:00','東京','2021-09-07 16:22:00','osaka','2021-09-07 19:22:00','fukuoka','2021-09-08 13:22:00',NULL,NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,'1','1','1','ててててててててててててててててーーーーーすと','2021-09-07 04:23:04','2021-09-07 04:23:04',NULL),(4,3,'さかな','images/FzmlJbDys2CXPXYWgLOj5vC47qWUTpJkye1nbN0M.jpg','kijihata.jpeg','20-60cm魚種による','玄界灘','2021-09-07 15:31:00','東京','2021-09-07 19:35:00','大阪','2021-09-07 20:36:00','fukuoka','2021-09-08 15:31:00',NULL,'1',NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,'1','1','1','aaaaaaaaaaaaaaaaaa','2021-09-07 06:31:47','2021-09-07 06:31:47',NULL);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (41,'2021_09_04_051418_create_requests_table',1),(54,'2014_10_12_000000_create_users_table',2),(55,'2014_10_12_100000_create_password_resets_table',2),(56,'2019_08_19_000000_create_failed_jobs_table',2),(57,'2019_12_14_000001_create_personal_access_tokens_table',2),(58,'2021_08_28_102654_create_contents_table',2),(59,'2021_09_04_074152_create_pickups_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pickups`
--

DROP TABLE IF EXISTS `pickups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pickups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fish_id` int NOT NULL,
  `pickup_user_id` int NOT NULL,
  `pickup` int NOT NULL,
  `pickup_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pickups`
--

LOCK TABLES `pickups` WRITE;
/*!40000 ALTER TABLE `pickups` DISABLE KEYS */;
INSERT INTO `pickups` VALUES (1,4,2,3,NULL,'2021-09-07 07:17:42','2021-09-07 07:17:42');
/*!40000 ALTER TABLE `pickups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fish_id` int NOT NULL,
  `pickup` int NOT NULL,
  `pickup_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test_admin01','test_admin01@example.com',NULL,'$2y$10$l6Sbb6w22x9704g1Qe58kuYEnm/hjKMjkKZPgzMHMlfQRNVEIgrS.',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(2,'test_user01','test_user01@example.com',NULL,'$2y$10$Fc/lHnDriNB7oAGDfpAxuO6Bw0jKswEx4CJVxLBn.SK5Tdoewthay',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(3,'test_user02','test_user02@example.com',NULL,'$2y$10$ccQ9pbBIu7w4qCX1fBuJ4uXxrIHZlkWlowYtwP/bO53WfDGUhEFD2',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(4,'test_user03','test_user03@example.com',NULL,'$2y$10$kWtdZfZmecF.N7M6Ofjpge/wfGIEzuB1qbhf4wvr7GgCr5rA.H0xS',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(5,'test_user04','test_user04@example.com',NULL,'$2y$10$H0L5AKzEelDJvIAzg7GlQ.jjxYCaohjtBQnyQbq/UEhqtBlLRpIQq',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(6,'test_user05','test_user05@example.com',NULL,'$2y$10$mgzmCETP65IuWTypOj2WQulZ.dTB4XADs5eiT3VS7EgUCOrLMsjHO',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(7,'test_user06','test_user06@example.com',NULL,'$2y$10$kCvjMDpQY8GBf3U3iZb5dOBFyn4A0kHM/2ASd4oOnrreWeOt7eXqS',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(8,'test_user07','test_user07@example.com',NULL,'$2y$10$OIUqr3Ao9dn3wW9BbjSSAug4HxnifG9A2.yp4AH7cav0UTqb7J7kO',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL),(9,'test_user08','test_user08@example.com',NULL,'$2y$10$W/aQbi7oiIfq1Bbkkl.eBuHkt0UtO1N21ktFucCBY5QC7FPXV4/Cm',NULL,NULL,'',NULL,NULL,'2021-01-01 11:11:11',NULL);
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

-- Dump completed on 2021-09-08  0:35:54
