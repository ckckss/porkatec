-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: granja_c
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
-- Table structure for table `cubriciones`
--

DROP TABLE IF EXISTS `cubriciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cubriciones` (
  `id_cubricion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_cerda` bigint unsigned NOT NULL,
  `fecha_cubricion` date NOT NULL,
  `estado` enum('vacia','repetida','aborto','sucia','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_parto` date DEFAULT NULL,
  `nacidos_vivos` int DEFAULT NULL,
  `nacidos_muertos` int DEFAULT NULL,
  `nacidos_momificados` int DEFAULT NULL,
  `num_adoptados` int DEFAULT NULL,
  `num_cedidos` int DEFAULT NULL,
  `num_bajas` int DEFAULT NULL,
  `fecha_destete` date DEFAULT NULL,
  `num_destetados` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cubricion`),
  KEY `cerda` (`id_cerda`),
  CONSTRAINT `cerda` FOREIGN KEY (`id_cerda`) REFERENCES `fichas_cerdas` (`id_cerda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cubriciones`
--

LOCK TABLES `cubriciones` WRITE;
/*!40000 ALTER TABLE `cubriciones` DISABLE KEYS */;
INSERT INTO `cubriciones` VALUES (1,3872,'2002-02-08','repetida','2002-10-07',16,3,1,3,6,2,'2002-10-08',18,'2024-05-02 15:41:57','2024-06-06 15:34:40'),(2,3872,'2024-02-02','sucia','2024-05-02',15,1,2,3,4,4,'2024-05-02',21,'2024-05-02 18:40:08','2024-05-27 13:39:43'),(3,3872,'2024-05-08','vacia','2024-05-08',3,1,3,2,2,2,'2024-05-08',2,'2024-05-08 16:56:44','2024-05-27 13:39:35'),(4,5124,'2024-05-08','vacia','2024-02-08',3,1,3,2,2,2,'2024-05-01',2,'2024-05-08 16:56:44','2024-05-27 15:41:01'),(5,5124,'2002-02-08','repetida','2002-03-07',16,3,1,3,6,0,'2002-01-09',18,'2024-05-02 15:41:57','2024-05-27 15:42:00'),(6,5130,'2024-02-02','sucia','2024-05-02',15,1,2,3,4,4,'2024-05-02',21,'2024-05-02 18:40:08','2024-05-27 13:39:43'),(7,5131,'2024-05-08','vacia','2024-05-08',3,1,3,2,2,2,'2024-05-08',2,'2024-05-08 16:56:44','2024-05-27 13:39:35'),(24,3872,'2024-05-28','aborto','2024-06-05',100,2,2,1,1,1,'2024-06-20',99,'2024-05-28 16:01:19','2024-06-07 12:55:09'),(25,3872,'2024-05-28',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-05-28 16:03:54','2024-05-28 16:03:54'),(26,3872,'2024-06-01','sucia','2024-06-05',15,5,3,NULL,NULL,NULL,NULL,NULL,'2024-06-01 16:33:43','2024-06-06 15:45:47'),(27,5131,'2024-06-02',NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-02 12:53:46','2024-06-02 12:53:50'),(28,3872,'2024-06-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-03 14:46:13','2024-06-03 14:46:13'),(29,5124,'2024-06-03',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,'2024-06-03 16:06:29','2024-06-03 16:06:34'),(30,3872,'2024-06-04',NULL,'2024-06-05',10,2,2,2,2,1,'2024-06-11',0,'2024-06-04 13:10:38','2024-06-06 15:14:52'),(32,5142,'2024-06-04',NULL,'2024-06-12',12,8,20,11,8,12,'2024-06-05',22,'2024-06-04 13:55:03','2024-06-04 13:55:29'),(33,3872,'2024-06-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-04 14:42:37','2024-06-04 14:42:37'),(34,3872,'2024-06-06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-06 15:10:02','2024-06-06 15:10:02'),(35,3872,'2024-06-06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-06 15:10:10','2024-06-06 15:10:10'),(36,3872,'2024-06-06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-06 15:10:27','2024-06-06 15:10:27'),(37,5124,'2024-06-06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-06 15:11:58','2024-06-06 15:11:58'),(38,3872,'2024-06-07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-07 12:55:49','2024-06-07 12:55:49');
/*!40000 ALTER TABLE `cubriciones` ENABLE KEYS */;
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
-- Table structure for table `fichas_cerdas`
--

DROP TABLE IF EXISTS `fichas_cerdas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichas_cerdas` (
  `id_cerda` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_nave` bigint unsigned NOT NULL,
  `nfc` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cerda`),
  KEY `nave` (`id_nave`),
  CONSTRAINT `nave` FOREIGN KEY (`id_nave`) REFERENCES `naves` (`id_nave`)
) ENGINE=InnoDB AUTO_INCREMENT=5144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichas_cerdas`
--

LOCK TABLES `fichas_cerdas` WRITE;
/*!40000 ALTER TABLE `fichas_cerdas` DISABLE KEYS */;
INSERT INTO `fichas_cerdas` VALUES (3872,2,1344,'2024-05-02 15:41:57','2024-06-07 12:29:06'),(5124,3,1311,'2024-05-02 15:41:57','2024-05-03 11:52:39'),(5130,1,2,'2024-05-27 14:19:47','2024-05-27 14:19:47'),(5131,1,5130,'2024-05-27 14:28:52','2024-05-27 14:28:52'),(5133,2,313133,'2024-05-28 16:04:15','2024-05-28 16:04:15'),(5134,2,41431,'2024-05-28 16:05:16','2024-05-28 16:05:16'),(5135,2,13,'2024-05-28 16:06:03','2024-05-28 16:06:03'),(5136,1,3131,'2024-06-01 16:42:32','2024-06-01 16:42:32'),(5142,2,121,'2024-06-04 13:55:00','2024-06-04 13:55:00'),(5143,2,1,'2024-06-07 12:28:26','2024-06-07 12:28:26');
/*!40000 ALTER TABLE `fichas_cerdas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamentos`
--

DROP TABLE IF EXISTS `medicamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamentos`
--

LOCK TABLES `medicamentos` WRITE;
/*!40000 ALTER TABLE `medicamentos` DISABLE KEYS */;
INSERT INTO `medicamentos` VALUES (1,'Antibiotico X','10 mg'),(2,'Antibiotico Y','7 mg'),(7,'a','dsa'),(8,'42','112');
/*!40000 ALTER TABLE `medicamentos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_05_01_171917_create_sessions_table',1),(7,'2024_05_01_172235_create_permission_tables',1),(8,'2024_04_29_142334_create_nave',2),(9,'2024_04_29_142335_create_ficha_cerda',2),(10,'2024_04_29_142802_create_cubricion',2),(14,'2024_05_01_171917_create_medicamentos_table',3),(15,'2024_05_01_171917_create_tratamientos_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',2),(3,'App\\Models\\User',35),(2,'App\\Models\\User',37);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `naves`
--

DROP TABLE IF EXISTS `naves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `naves` (
  `id_nave` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_nave`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `naves`
--

LOCK TABLES `naves` WRITE;
/*!40000 ALTER TABLE `naves` DISABLE KEYS */;
INSERT INTO `naves` VALUES (1,'cubricion1231','2024-05-02 15:41:57','2024-06-07 12:30:14'),(2,'cubricion23','2024-05-03 13:43:20','2024-05-28 14:43:45'),(3,'partos12','2024-05-03 13:51:12','2024-05-28 14:43:34'),(7,'df','2024-05-28 16:06:10','2024-05-28 16:06:10'),(10,'nave3','2024-06-07 12:30:20','2024-06-07 12:30:20'),(12,'414','2024-06-07 12:56:26','2024-06-07 12:56:26');
/*!40000 ALTER TABLE `naves` ENABLE KEYS */;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create_cerda','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(2,'read_cerda','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(3,'update_cerda','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(4,'delete_cerda','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(5,'create_user','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(6,'read_user','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(7,'update_user','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(8,'delete_user','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(9,'create_nave','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(10,'read_nave','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(11,'update_nave','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(12,'delete_nave','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(13,'admin_bypass','web','2024-05-02 16:58:12','2024-05-02 16:58:15');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(1,2),(2,2),(3,2),(5,2),(6,2),(7,2),(9,2),(10,2),(11,2),(1,3),(2,3),(3,3),(10,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(2,'encargado','web','2024-05-02 14:44:40','2024-05-02 14:44:40'),(3,'usuario','web','2024-05-02 14:44:40','2024-05-02 14:44:40');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('7tCXYQQaRO6qAf0yS7QPavZtSBc3VxUcYoUWgL0r',NULL,'127.0.0.1','PostmanRuntime/7.39.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiam03dXEzVEpDeDZXM1Z4V1VjZXF0aHdtQVI4VzRDdGw0MDV4WUJXTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1717699416),('qCIJnoIXz8eUrIPAQvya60o6gAUQezx22KfNnMFA',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOHIxZ0xxWUM2YWR5cHpOV2xEU1BrNkNGNDQ3alpsdEloRlh4bXFubyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkdzg3bTVHcW5CYzcuazB1a3g3TDB6ZXRMYnRjeThkaXZFcWw5UXZQQlhNakEvL05HVVBnS2UiO30=',1717772934),('wTw2WwvnVMbZgUSOBMNdhSDeVHbq6HHEyX6nwKma',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiakR4WFFnU3BmN3h2VHNrMnE5MHRMeEM4QzNVdFBLMzZwRXFMNEtVQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=',1717699395);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tratamientos`
--

DROP TABLE IF EXISTS `tratamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tratamientos` (
  `id_tratamiento` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_medicamento` bigint unsigned DEFAULT NULL,
  `id_cerda` bigint unsigned NOT NULL,
  `fecha_comienzo` datetime NOT NULL,
  `fecha_conclusion` datetime DEFAULT NULL,
  `enfermedad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_tratamiento`),
  KEY `tratamientos_id_medicamento_foreign` (`id_medicamento`),
  KEY `tratamientos_id_cerda_foreign` (`id_cerda`),
  CONSTRAINT `tratamientos_id_cerda_foreign` FOREIGN KEY (`id_cerda`) REFERENCES `fichas_cerdas` (`id_cerda`),
  CONSTRAINT `tratamientos_id_medicamento_foreign` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tratamientos`
--

LOCK TABLES `tratamientos` WRITE;
/*!40000 ALTER TABLE `tratamientos` DISABLE KEYS */;
INSERT INTO `tratamientos` VALUES (1,2,3872,'2024-05-28 18:56:45','2024-05-28 18:56:46','enf2'),(2,1,3872,'2024-06-02 18:47:27','2024-06-02 18:47:40','sa'),(3,1,5124,'2024-06-02 18:48:17',NULL,NULL),(4,1,3872,'2024-05-02 00:00:00','2024-06-03 00:00:00','hdf'),(14,NULL,3872,'2024-06-03 00:00:00',NULL,NULL),(15,7,3872,'2024-06-03 00:00:00',NULL,'hdf'),(16,NULL,3872,'2024-06-03 00:00:00',NULL,NULL),(17,NULL,3872,'2024-06-03 00:00:00',NULL,NULL),(18,NULL,5124,'2024-06-03 00:00:00',NULL,NULL),(19,NULL,5124,'2024-06-03 00:00:00',NULL,NULL),(20,NULL,5124,'2024-06-03 00:00:00',NULL,NULL),(21,NULL,3872,'2024-06-04 00:00:00',NULL,NULL),(22,NULL,3872,'2024-06-04 00:00:00',NULL,NULL),(23,NULL,3872,'2024-06-04 00:00:00',NULL,NULL),(24,NULL,3872,'2024-06-04 00:00:00',NULL,NULL),(25,NULL,3872,'2024-06-06 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `tratamientos` ENABLE KEYS */;
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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@mail.com',NULL,'$2y$12$w87m5GqnBc7.k0ukx7L0zetLbtcy8divEql9QvPBXMjA//NGUPgKe',NULL,NULL,NULL,'KyMNPjclblpuxJCDpaChYL3SSLhyvpSROWgpirhV7CpPnQrz5DsJDszZQoAn',NULL,NULL,'2024-05-02 14:44:41','2024-06-07 12:32:47'),(35,'ALVARO','alvaro@fam.com',NULL,'$2y$12$MAjwceFvAiuGTZGhrxcrLOncsySuUHnVCTI6EVt.w3cBeZfo/xjMq',NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-07 12:33:37','2024-06-07 12:33:37'),(37,'3131','3131@1.c3',NULL,'$2y$12$U5awefFNzceZX7D3khzVoO4MUvbAn5CflR7I5vBp0uguUOXVFCD56',NULL,NULL,NULL,NULL,NULL,NULL,'2024-06-07 12:56:17','2024-06-07 12:56:17');
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

-- Dump completed on 2024-06-07 18:42:11
