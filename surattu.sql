-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: db_surat
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `letter_types`
--

DROP TABLE IF EXISTS `letter_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letter_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `letter_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letter_types`
--

LOCK TABLES `letter_types` WRITE;
/*!40000 ALTER TABLE `letter_types` DISABLE KEYS */;
INSERT INTO `letter_types` VALUES (1,'KS-RPT2308-A','Rapat Rutin','2023-12-18 08:27:36','2023-12-18 08:27:36'),(2,'KT-23323-A','Rapat Penting','2023-12-18 13:56:39','2023-12-18 13:56:39');
/*!40000 ALTER TABLE `letter_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `letters`
--

DROP TABLE IF EXISTS `letters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `letters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `letter_type_id` bigint unsigned NOT NULL,
  `letter_perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` json NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notulis` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `letters_notulis_foreign` (`notulis`),
  KEY `letters_letter_type_id_foreign` (`letter_type_id`),
  CONSTRAINT `letters_letter_type_id_foreign` FOREIGN KEY (`letter_type_id`) REFERENCES `letter_types` (`id`),
  CONSTRAINT `letters_notulis_foreign` FOREIGN KEY (`notulis`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `letters`
--

LOCK TABLES `letters` WRITE;
/*!40000 ALTER TABLE `letters` DISABLE KEYS */;
INSERT INTO `letters` VALUES (1,1,'Revisi Jadwal Siswa','[\"2\", \"3\"]','<p>Test</p>',NULL,2,'2023-12-18 09:13:38','2023-12-18 09:13:38'),(2,1,'Libur Akhir Tahun','[\"3\", \"4\"]','<p>Kapan libur woe</p>',NULL,4,'2023-12-18 10:27:21','2023-12-18 10:27:21'),(3,2,'Keputusan Pengeluaran','[\"3\", \"4\"]','<p>Hati hati wak</p>',NULL,3,'2023-12-18 13:57:04','2023-12-18 13:57:04'),(4,1,'Harian','[\"2\", \"3\", \"4\"]','<p>Tentang liburan</p>',NULL,3,'2023-12-18 23:19:23','2023-12-18 23:19:23'),(6,1,'Test','[\"2\", \"3\"]','<p>twst</p>','202312201649planet_3336008.png',2,'2023-12-20 09:49:02','2023-12-20 09:49:02'),(7,2,'Percepatan Waktu Libur','[\"2\", \"3\", \"4\"]','<p>Yth. Bapak/Ibu</p><p><br>Mohon untuk menghadiri rapat ini karena kita akan membahas ketersediaan Bapak/Ibu untuk waktu pengajaran tambahan<br>Rapat akan dilaksanakan pada jam <strong>12:40 WIB </strong>di gedung <i>Citra-Indah</i><br>Terimakasih.</p>',NULL,3,'2023-12-21 09:27:56','2023-12-21 09:27:56');
/*!40000 ALTER TABLE `letters` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (29,'2014_10_12_000000_create_users_table',1),(30,'2014_10_12_100000_create_password_reset_tokens_table',1),(31,'2019_08_19_000000_create_failed_jobs_table',1),(32,'2019_12_14_000001_create_personal_access_tokens_table',1),(33,'2023_12_18_062008_letter_types',1),(34,'2023_12_18_062429_letters',1),(35,'2023_12_18_063725_results',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'auth-token','718e8fc78a99ea0e8997ee0f054aef0649aa0c8f5a42def4aee7ada5a907798a','[\"*\"]',NULL,NULL,'2023-12-20 07:19:04','2023-12-20 07:19:04'),(2,'App\\Models\\User',1,'auth-token','8a7ee1bb3eea67be9efcb47f9b12c2c17ce65ac94dc5618172aebca7ea796e18','[\"*\"]',NULL,NULL,'2023-12-20 07:19:12','2023-12-20 07:19:12'),(3,'App\\Models\\User',1,'auth-token','e51e6c5b075f49e40f11e847697af18ffcabe36342fe252da83ee9b7172ef1d1','[\"*\"]',NULL,NULL,'2023-12-20 07:19:19','2023-12-20 07:19:19'),(4,'App\\Models\\User',1,'auth-token','21dcc9f7051bc7ca14f6a6e81068584993e60a5deb6eb47979dbc010348e28c1','[\"*\"]',NULL,NULL,'2023-12-20 07:19:46','2023-12-20 07:19:46'),(5,'App\\Models\\User',1,'auth-token','321f457c8ecb57fcadf978d53eb71f365fc7c7544410192e7fc99b45bc1b7d51','[\"*\"]',NULL,NULL,'2023-12-20 07:19:48','2023-12-20 07:19:48'),(6,'App\\Models\\User',1,'auth-token','bb01a1bb68cdb8c20274458ec4ff6e332daf3fe48232f5b7940a7aa2b04a7db9','[\"*\"]',NULL,NULL,'2023-12-20 07:20:39','2023-12-20 07:20:39'),(7,'App\\Models\\User',3,'auth-token','405fe34c0dfddffea87e42081e7e38eb7a5f5a19f7452cfe484bcbfde7bb664a','[\"*\"]',NULL,NULL,'2023-12-20 09:07:42','2023-12-20 09:07:42'),(8,'App\\Models\\User',3,'auth-token','9fefe2514a923cc51b27c3ab4a04e40e7c7690ae8327f0f274e9a49befa8f23c','[\"*\"]',NULL,NULL,'2023-12-20 09:07:59','2023-12-20 09:07:59');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `letter_id` bigint unsigned NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `presence_recipients` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_letter_id_foreign` (`letter_id`),
  CONSTRAINT `results_letter_id_foreign` FOREIGN KEY (`letter_id`) REFERENCES `letters` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,3,'Rrawawaa','[\"3\", \"4\"]','2023-12-18 21:04:23','2023-12-18 21:04:23'),(2,1,'jadi ini buat test','[\"2\"]','2023-12-18 21:22:16','2023-12-18 21:22:16'),(3,4,'DInda tidak hadir sakit','[\"2\", \"3\"]','2023-12-18 23:21:04','2023-12-18 23:21:04'),(4,2,'Perkiraan libur akhir tahun','[\"4\"]','2023-12-19 21:10:17','2023-12-19 21:10:17');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
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
  `role` enum('teacher','staff') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Budi','Budi@example.com',NULL,'$2y$12$W1xXgoi9bZG71Z9ltTxShOWBuMo9Ia8bwra9P7U.lrQGbMXDxya7C','staff',NULL,'2023-12-18 08:26:34','2023-12-18 08:26:34'),(2,'Fachrezi S.Pd, M. Kom.','fachrezi@example.com',NULL,'$2y$12$PzSIG1hCO6GkqQ0zzgjbou64eyEgEjrJ6/T2IY2gEwSjbVjTQXHU.','teacher',NULL,'2023-12-18 08:26:34','2023-12-18 23:37:01'),(3,'Deni T.A. S.Pd','deni@example.com',NULL,'$2y$12$qeodOf3kVVsw2HwZQsNKb.paKugnZKbFyflGpQBLRzpIc5P4KPOPK','teacher',NULL,'2023-12-18 08:26:34','2023-12-18 08:26:34'),(4,'Dinda D.T. S.Kom','dinda@example.com',NULL,'$2y$12$o/Mw73Ev2H9Fks402m7GuOl4mFtke7NeDyAmbEIzz.lZnPs9NPTbW','teacher',NULL,'2023-12-18 08:26:34','2023-12-18 08:26:34');
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

-- Dump completed on 2024-05-29 11:46:19
