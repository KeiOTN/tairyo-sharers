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
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_expired` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES (1,1,'真鯛、蓮子鯛10匹','','','20-50cm','玄界灘','2021-09-01 11:11:11','aa漁港','2021-09-01 12:12:12','bb釣具店','2021-09-01 13:13:13','ccスーパー駐車場','2021-09-01 13:00:00','','1','1','','','1','','','','','1','1','条件に合う方の受け取りをお待ちしています！',0,'2021-09-01 10:10:10',NULL,NULL),(2,1,'ブリ2匹','','','50-60cm','玄界灘','2021-09-01 11:11:11','aa漁港','2021-09-01 12:12:12','bb釣具店','2021-09-01 13:13:13','ccスーパー駐車場','2021-09-01 13:00:00','','1','1','','1','','1','','','','1','1','小ぶりですが捌きやすいと思います',0,'2021-09-01 10:10:10',NULL,NULL),(3,1,'アジ30匹くらい','','','20-50cm','玄界灘','2021-09-10 11:11:11','xx漁港','2021-09-10 12:12:12','yy釣具店','2021-09-10 13:13:13','zzスーパー駐車場','2021-09-10 13:00:00','','','','1','','','1','','','','1','1','まとめて貰ってくれるかた',0,'2021-09-10 10:10:10',NULL,NULL),(4,2,'ブリ','','','50-70cm','玄界灘','2021-09-15 11:11:11','aa漁港','2021-09-15 12:12:12','bb釣具店','2021-09-15 13:13:13','ccスーパー駐車場','2021-09-15 13:00:00','','1','1','','1','','1','','','','1','1','一人１本いかがでしょうか？',0,'2021-09-15 10:10:10',NULL,NULL),(5,2,'太刀魚全部で20本','','','指3-5本','玄界灘','2021-09-10 11:11:11','oo駅','2021-09-10 12:12:12','ppコンビニ駐車場','2021-09-10 13:13:13','qq公園前','2021-09-10 13:00:00','','1','','1','','1','','','','','1','1','塩焼き美味しいですよ',0,'2021-09-10 10:10:10',NULL,NULL),(6,2,'イトヨリ10匹','','','20-40cm','対馬周辺','2021-09-10 11:11:11','dee漁港','2021-09-10 12:12:12','bee釣具店','2021-09-10 13:13:13','ceeスーパー駐車場','2021-09-01 13:00:00','','1','1','','','1','','','','','1','1','その他条件、ご相談ください',0,'2021-09-01 10:10:10',NULL,NULL),(7,3,'アコウ8匹','','','20-30cm','','2021-09-11 11:11:11','apple漁港','2021-09-11 12:12:12','peach釣具店','2021-09-11 13:13:13','bananaスーパー駐車場','2021-09-11 13:00:00','','1','1','','','1','','','','','1','1','冷凍でよければ期限後も受け付けます',0,'2021-09-11 10:10:10',NULL,NULL),(8,3,'真鯛、蓮子鯛10匹','','','20-50cm','鹿児島','2021-09-12 11:11:11','super漁港','2021-09-12 12:12:12','big釣具店','2021-09-12 13:13:13','okスーパー駐車場','2021-09-12 13:00:00','1','','','','','1','','','','','1','1','条件に合う方の受け取りをお待ちしています！',0,'2021-09-12 10:10:10',NULL,NULL),(9,4,'ブリ5匹','','','50-70cm','鹿児島','2021-09-13 11:11:11','where漁港','2021-09-13 12:12:12','grape釣具店','2021-09-13 13:13:13','nonoスーパー駐車場','2021-09-14 13:00:00','1','','','','','1','','','','','1','1','条件に合う方の受け取りをお待ちしています！',0,'2021-09-13 10:10:10',NULL,NULL),(10,2,'さかな','','itoyori.jpeg',NULL,NULL,'2021-10-02 19:00:00','ふくおか',NULL,NULL,NULL,NULL,'2021-10-02 20:58:00',NULL,'1',NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,'1','1',NULL,NULL,'2021-10-02 08:58:53','2021-10-02 08:58:53',NULL);
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
-- Table structure for table `like_users`
--

DROP TABLE IF EXISTS `like_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `like_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `liked_user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_users_user_id_foreign` (`user_id`),
  KEY `like_users_liked_user_id_foreign` (`liked_user_id`),
  CONSTRAINT `like_users_liked_user_id_foreign` FOREIGN KEY (`liked_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `like_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_users`
--

LOCK TABLES `like_users` WRITE;
/*!40000 ALTER TABLE `like_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pickup_id` int NOT NULL,
  `from` int NOT NULL,
  `to` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,2,1,'少し遅れそうです。',NULL,'2021-09-01 10:21:10',NULL),(2,1,1,2,'了解しました。',NULL,'2021-09-01 10:22:10',NULL),(3,2,3,1,'明日の都合良いお時間ありますか？',NULL,'2021-09-01 10:35:10',NULL),(4,2,1,3,'18時以降いかがでしょうか。',NULL,'2021-09-01 10:40:10',NULL),(5,2,3,1,'大丈夫です！',NULL,'2021-09-01 10:50:10',NULL),(6,3,1,4,'赤い車で行きます！よろしくお願いします！',NULL,'2021-09-13 10:31:10',NULL),(7,3,4,1,'こちらは黒のハイエースです！',NULL,'2021-09-13 10:35:10',NULL),(8,4,1,2,'hello',NULL,'2021-10-02 08:57:03','2021-10-02 08:57:03'),(9,4,2,1,'ダメです',NULL,'2021-10-02 08:57:53','2021-10-02 08:57:53');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2021_08_28_102654_create_contents_table',1),(6,'2021_09_04_074152_create_pickups_table',1),(7,'2021_09_15_114214_create_messages_table',1),(8,'2021_10_01_050327_create_like_users_table',1);
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
  `result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_answered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_expired` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pickups`
--

LOCK TABLES `pickups` WRITE;
/*!40000 ALTER TABLE `pickups` DISABLE KEYS */;
INSERT INTO `pickups` VALUES (1,1,2,1,'',NULL,NULL,NULL,NULL,'2021-09-01 10:20:10',NULL),(2,1,3,4,'日時変更希望です。',NULL,NULL,NULL,NULL,'2021-09-01 10:30:10',NULL),(3,9,1,3,'',NULL,NULL,NULL,NULL,'2021-09-13 10:30:10',NULL),(4,4,1,1,NULL,'2','1',NULL,NULL,'2021-10-02 08:56:36','2021-10-02 08:56:36');
/*!40000 ALTER TABLE `pickups` ENABLE KEYS */;
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
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giver` int DEFAULT NULL,
  `receiver` int DEFAULT NULL,
  `is_admin` int NOT NULL,
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
INSERT INTO `users` VALUES (1,'釣太郎','test_user01@example.com',NULL,'$2y$10$ov1ZNwEA7HhG95Otnw6ABOV.dlwca9nNSWtCDN81e8/I7J6KKnpFO','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(2,'ブリ次郎','test_user02@example.com',NULL,'$2y$10$Ajc97ZGoEU8OQlOdG0UIbeluo83FiBADLA7148edSdyoHZ8csInPm','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(3,'タコ仙人','test_user03@example.com',NULL,'$2y$10$MbRT3zLq1NDRmfmorawV0etclGYVQPPQlg1mVVomqIie7Nd2BYd/a','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(4,'釣りガールsaya','test_user04@example.com',NULL,'$2y$10$6oC29W1JDu4uKn4ek0RYoOnrSCGV26/6cD8pOiWBkoL3NlwfM1jYm','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(5,'セミプロ料理人takuya','test_user05@example.com',NULL,'$2y$10$PxGkqjEINOLyoEa6EQfAoOJFzlw88L611sJxxJGagOZ2ujfH1yF0e','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(6,'魚好き主婦ai','test_user06@example.com',NULL,'$2y$10$QlDYgkLaQ1beLr.N/naC2.z9w9En..WoFRI/N.7DJA1sIfHyrcUOq','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(7,'学生田中','test_user07@example.com',NULL,'$2y$10$VZNVUX869yX72mG6hyUjH.RcISX911KwEwj4BrD3Cc7tWIiorKaGG','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(8,'山田ボウズ','test_user08@example.com',NULL,'$2y$10$mFJUSQu9RiNx64y3.up2ruL.dB9I2FGuPl0E2Ya5jK2y/u5I/5Sem','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL),(9,'test_admin01','test_admin01@example.com',NULL,'$2y$10$FGmxsY2f88IcD8qomWYObep6oTI17TIAJSF0W77ddQt6Z8mFc.Nd.','','',NULL,NULL,NULL,0,NULL,NULL,'2021-01-01 11:11:11',NULL);
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

-- Dump completed on 2021-10-03 13:19:58
