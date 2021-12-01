-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: uchast
-- ------------------------------------------------------
-- Server version	5.7.33-log

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
-- Table structure for table `bazapract`
--

DROP TABLE IF EXISTS `bazapract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bazapract` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `gps` geometry DEFAULT NULL,
  `obr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bazapract`
--

LOCK TABLES `bazapract` WRITE;
/*!40000 ALTER TABLE `bazapract` DISABLE KEYS */;
INSERT INTO `bazapract` VALUES (1,NULL,'2021-10-25 12:50:08','2021-10-25 12:50:33','Зеленодольская ЦРБ',NULL,NULL,'\0\0\0\0\0\0\0�x�19H@�$��K@',1);
/*!40000 ALTER TABLE `bazapract` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'{}',1),(2,1,'name','text','Name',1,1,1,1,1,1,'{}',2),(3,1,'email','text','Email',1,1,1,1,1,1,'{}',3),(4,1,'password','password','Password',1,0,0,1,1,0,'{}',4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,'{}',6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,'{}',9),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}',11),(10,1,'user_belongstomany_role_relationship','relationship','voyager::seeders.data_rows.roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',12),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,'{}',15),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',0,1,1,1,1,1,'{}',10),(22,4,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,4,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(24,4,'name','text','Название',0,1,1,1,1,1,'{}',3),(25,1,'user_belongsto_obr_uch_relationship','relationship','Образовательное учреждение',0,1,1,1,1,1,'{\"model\":\"App\\\\ObrUch\",\"table\":\"obr_uch\",\"type\":\"belongsTo\",\"column\":\"obr\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}',14),(26,1,'email_verified_at','timestamp','Email Verified At',0,1,1,1,1,1,'{}',7),(27,1,'obr','text','Obr',0,1,1,1,1,1,'{}',13),(28,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(29,5,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',2),(30,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(31,5,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',4),(32,5,'fam','text','Fam',0,1,1,1,1,1,'{}',5),(33,5,'name','text','Имя',0,1,1,1,1,1,'{}',6),(34,5,'otch','text','Фамилия',0,1,1,1,1,1,'{}',7),(35,5,'sht','checkbox','Штат',0,1,1,1,1,1,'{}',8),(36,5,'kat','number','Категория',0,1,1,1,1,1,'{}',9),(37,5,'obr','text','Obr',0,0,0,0,0,0,'{}',10),(38,6,'id','text','Id',1,0,0,0,0,0,'{}',1),(39,6,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',2),(40,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(41,6,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',4),(42,6,'nazv','text','Название сокращенное',0,1,0,1,1,1,'{}',5),(43,6,'nazv_full','text','Название полное',0,1,1,1,1,1,'{}',6),(44,6,'obr','text','Obr',0,0,0,0,0,0,'{}',7),(45,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(46,7,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(47,7,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(48,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(49,7,'name','text','Название',0,1,1,1,1,1,'{}',5),(50,7,'numspec','text','Номер',0,1,1,1,1,1,'{}',6),(51,7,'obr','text','Obr',0,0,0,0,0,0,'{}',7),(52,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(53,8,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(54,8,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(55,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(56,8,'nazv','text','Nazv',0,1,1,1,1,1,'{}',5),(57,8,'obr','text','Obr',0,0,0,0,0,0,'{}',6),(58,9,'id','text','Id',1,0,0,0,0,0,'{}',1),(59,9,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',2),(60,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(61,9,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',4),(62,9,'nazv','text','Название',0,1,1,1,1,1,'{}',5),(63,9,'col','number','Количество студенто',0,1,1,1,1,1,'{}',6),(64,9,'god','text','God',0,0,0,0,0,0,'{}',7),(65,9,'spec','text','Spec',0,1,1,1,1,1,'{}',8),(66,9,'kommerc','checkbox','Коммерческая',0,1,1,1,1,1,'{}',10),(67,9,'obr','text','Obr',0,0,0,0,0,0,'{}',11),(68,9,'grupp_belongsto_spec_relationship','relationship','Специальность',0,1,1,1,1,1,'{\"model\":\"App\\\\Spec\",\"table\":\"spec\",\"type\":\"belongsTo\",\"column\":\"spec\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}',9),(69,11,'id','text','Id',1,0,0,0,0,0,'{}',1),(70,11,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(71,11,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(72,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(73,11,'name','text','Название',0,1,1,1,1,1,'{}',5),(74,12,'id','text','Id',1,0,0,0,0,0,'{}',1),(75,12,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',2),(76,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(77,12,'god','text','God',0,1,1,1,1,1,'{}',4),(78,12,'obr','text','Obr',0,1,1,1,1,1,'{}',5),(79,12,'kurs','text','Kurs',0,1,1,1,1,1,'{}',6),(80,12,'semestr','text','Semestr',0,1,1,1,1,1,'{}',7),(81,12,'predmet','text','Predmet',0,1,1,1,1,1,'{}',8),(82,12,'prepod','text','Prepod',0,1,1,1,1,1,'{}',9),(83,12,'pck','text','Pck',0,1,1,1,1,1,'{}',10),(84,12,'pogos','text','Pogos',0,1,1,1,1,1,'{}',11),(85,12,'srs','text','Srs',0,1,1,1,1,1,'{}',12),(86,12,'leck','text','Leck',0,1,1,1,1,1,'{}',13),(87,12,'lab','text','Lab',0,1,1,1,1,1,'{}',14),(88,12,'pract','text','Pract',0,1,1,1,1,1,'{}',15),(89,12,'podgr','text','Podgr',0,1,1,1,1,1,'{}',16),(90,12,'ekz','text','Ekz',0,1,1,1,1,1,'{}',17),(91,12,'zach','text','Zach',0,1,1,1,1,1,'{}',18),(92,12,'ssuz_ekz','text','Ssuz Ekz',0,1,1,1,1,1,'{}',19),(93,12,'ssuz_zach','text','Ssuz Zach',0,1,1,1,1,1,'{}',20),(94,12,'KP','text','KP',0,1,1,1,1,1,'{}',21),(95,12,'KR','text','KR',0,1,1,1,1,1,'{}',22),(96,12,'typ_pr','text','Typ Pr',0,1,1,1,1,1,'{}',23),(97,13,'id','text','Id',1,0,0,0,0,0,'{}',1),(98,13,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(99,13,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(100,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(101,13,'nazv','text','Название',0,1,1,1,1,1,'{}',5),(102,13,'schitat','checkbox','Не считать при подсчете',0,0,1,1,1,1,'{\"on\":\"\\u041d\\u0435 \\u0441\\u0447\\u0438\\u0442\\u0430\\u0442\\u044c\",\"off\":\"\\u0441\\u0447\\u0438\\u0442\\u0430\\u0442\\u044c\"}',6),(103,13,'obr','text','Obr',0,0,0,0,0,0,'{}',7),(104,14,'id','text','Id',1,0,0,0,0,0,'{}',1),(105,14,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',2),(106,14,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(107,14,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',4),(108,14,'name','text','Название',0,1,1,1,1,1,'{}',5),(109,14,'kurs','number','Курс',0,1,1,1,1,1,'{}',6),(110,14,'kl_ruk','text','Kl Ruk',0,1,1,1,1,1,'{}',7),(111,14,'obr','text','Obr',0,0,0,0,0,0,'{}',9),(112,14,'spec','text','Spec',0,1,1,1,1,1,'{}',10),(113,14,'grupp_uchzav_belongsto_spec_relationship','relationship','Специальность',0,1,1,1,1,1,'{\"model\":\"App\\\\Spec\",\"table\":\"spec\",\"type\":\"belongsTo\",\"column\":\"spec\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}',11),(114,14,'grupp_uchzav_belongsto_prepod_relationship','relationship','Классный руководитель',0,1,1,1,1,1,'{\"model\":\"App\\\\Prepod\",\"table\":\"prepod\",\"type\":\"belongsTo\",\"column\":\"kl_ruk\",\"key\":\"id\",\"label\":\"full_name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}',8),(115,15,'id','text','Id',1,0,0,0,0,0,'{}',1),(116,15,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(117,15,'created_at','timestamp','Создано',0,0,1,0,0,0,'{}',3),(118,15,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(119,15,'fam','text','Фамилия',0,1,1,1,1,1,'{}',5),(120,15,'name','text','Имя',0,1,1,1,1,1,'{}',6),(121,15,'otch','text','Отчество',0,1,1,1,1,1,'{}',7),(122,15,'d_r','date','Дата рождения',0,1,1,1,1,1,'{}',8),(123,15,'passw','autogen','Passw',0,1,1,1,1,1,'{}',9),(124,15,'obr','text','Obr',0,0,0,0,0,0,'{}',10),(125,15,'grupp','text','Grupp',0,0,0,0,0,0,'{}',11),(126,15,'pol','checkbox','Pol',0,1,1,1,1,1,'{}',12),(132,17,'id','text','Id',1,0,0,0,0,0,'{}',1),(133,17,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(134,17,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(135,17,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(136,17,'name','text','Название',0,1,1,1,1,1,'{}',5),(137,17,'obr','text','Obr',0,0,0,0,0,0,'{}',6),(138,18,'id','text','Id',1,0,0,0,0,0,'{}',1),(139,18,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(140,18,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(141,18,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(142,18,'name','text','Название',0,1,1,1,1,1,'{}',5),(143,18,'variant','select_dropdown','Вид данных',0,1,1,1,1,1,'{\"default\":\"0\",\"options\":{\"0\":\"\\u0442\\u0435\\u043a\\u0441\\u0442\",\"1\":\"\\u0414\\u0430\\u0442\\u0430\",\"2\":\"\\u0414\\u0430\\u0442\\u0430\\/\\u0432\\u0440\\u0435\\u043c\\u044f\",\"3\":\"\\u041c\\u043d\\u043e\\u0433\\u043e\\u0441\\u0442\\u0440\\u043e\\u0447\\u043d\\u044b\\u0439 \\u0442\\u0435\\u043a\\u0441\\u0442\"}}',6),(144,18,'obr','text','Obr',0,0,0,0,0,0,'{}',7),(145,18,'typ_dann_belongsto_kategory_relationship','relationship','Категории',0,1,1,1,1,1,'{\"model\":\"App\\\\Kategory\",\"table\":\"kategory\",\"type\":\"belongsTo\",\"column\":\"kategor\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"data_rows\",\"pivot\":\"0\",\"taggable\":\"0\"}',8),(146,18,'kategor','text','Kategor',0,1,1,1,1,1,'{}',8),(147,19,'id','text','Id',1,0,0,0,0,0,'{}',1),(148,19,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',2),(149,19,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(150,19,'type_sv','text','Type Sv',0,1,1,1,1,1,'{}',4),(151,19,'obr','text','Obr',0,1,1,1,1,1,'{}',5),(152,19,'value','text','Value',0,1,1,1,1,1,'{}',6),(153,19,'student_id','text','Student Id',0,1,1,1,1,1,'{}',7),(154,18,'shifr','checkbox','Шифровать',0,1,1,1,1,1,'{}',9),(155,19,'comment','text_area','Комментарий',0,1,1,1,1,1,'{}',8),(156,20,'id','text','Id',1,0,0,0,0,0,'{}',1),(157,20,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(158,20,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(159,20,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(160,20,'num','number','Номер',0,1,1,1,1,1,'{}',5),(161,20,'name','text','Название',0,1,1,1,1,1,'{}',6),(162,20,'obr','text','Obr',0,0,0,0,0,0,'{}',7),(163,5,'password','autogen','Password',0,1,1,1,1,1,'{}',11),(164,21,'id','text','Id',1,0,0,0,0,0,'{}',1),(165,21,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(166,21,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(167,21,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(168,21,'name','text','Название приказа',0,1,1,1,1,1,'{}',5),(169,21,'obr','text','Obr',0,0,0,0,0,0,'{}',6),(170,14,'uchgr','select_dropdown','Uchgr',0,1,1,1,1,1,'{\"default\":\"1\",\"options\":{\"1\":\"\\u0423\\u0447\\u0435\\u0431\\u043d\\u0430\\u044f \\u0433\\u0440\\u0443\\u043f\\u043f\\u0430\",\"2\":\"\\u041d\\u0435\\u0443\\u0447\\u0435\\u0431\\u043d\\u0430\\u044f \\u0433\\u0440\\u0443\\u043f\\u043f\\u0430\"}}',10),(171,22,'id','text','Id',1,0,0,0,0,0,'{}',1),(172,22,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',2),(173,22,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(174,22,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(175,22,'name','text','Название предприятия',0,1,1,1,1,1,'{}',5),(176,22,'addr','text','Адрес',0,1,1,1,1,1,'{}',6),(177,22,'comment','text','Комментарий',0,1,1,1,1,1,'{}',7),(178,22,'gps','coordinates','Gps',0,1,1,1,1,1,'{}',8),(179,22,'obr','text','Obr',1,0,0,0,0,0,'{}',9),(180,23,'id','text','Id',1,0,0,0,0,0,'{}',1),(181,23,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',2),(182,23,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',3),(183,23,'sql','code_editor','Sql',0,1,1,1,1,1,'{}',4),(184,23,'text','text','Text',0,1,1,1,1,1,'{}',5),(185,23,'nazv','text','Nazv',0,1,1,1,1,1,'{}',6),(186,23,'script','code_editor','Script',0,1,1,1,1,1,'{}',7),(187,23,'php','code_editor','Php',0,1,1,1,1,1,'{}',8),(188,23,'obr','text','Obr',0,1,1,1,1,1,'{}',9),(189,23,'otchet_belongstomany_obr_uch_relationship','relationship','obr_uch',0,1,1,1,1,1,'{\"model\":\"App\\\\ObrUch\",\"table\":\"obr_uch\",\"type\":\"belongsTo\",\"column\":\"id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"obr_uch\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(196,26,'id','text','Id',1,0,0,0,0,0,'{}',1),(197,26,'obr','text','Obr',0,0,0,0,0,0,'{}',2),(198,26,'created_at','timestamp','Created At',0,0,0,0,0,0,'{}',3),(199,26,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(200,26,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',5),(201,26,'name','text','Name',0,1,1,1,1,1,'{}',6);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2021-09-25 15:46:30','2021-09-26 14:14:46'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2021-09-25 15:46:30','2021-09-25 15:46:30'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2021-09-25 15:46:30','2021-09-25 15:46:30'),(4,'obr_uch','obr-uch','Образовательное учреждение','Образовательное учреждение',NULL,'App\\ObrUch',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-25 15:52:25','2021-09-25 15:52:25'),(5,'prepod','prepod','Преподаватели','Преподаватели','voyager-archive','App\\Prepod',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-26 14:42:08','2021-10-12 12:58:26'),(6,'predmet','predmet','Предметы','Предметы','voyager-company','App\\Predmet',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-26 15:02:10','2021-09-26 15:02:10'),(7,'spec','spec','Специальности','Специальности','voyager-polaroid','App\\Spec',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-26 15:12:03','2021-09-26 15:12:03'),(8,'god','god','Год','Год','voyager-paper-plane','App\\God',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-26 15:25:10','2021-09-26 15:25:10'),(9,'grupp','grupp','Группы','Группы','voyager-receipt','App\\Grupp',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-09-26 16:04:55','2021-09-26 16:06:45'),(11,'pck','pck','Кафедра','Кафедра','voyager-tag','App\\Pck',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-26 16:19:33','2021-09-26 16:19:33'),(12,'nagr','nagr','Нагрузка','Нагрузка','voyager-fire','App\\Nagr',NULL,'App\\Http\\Controllers\\nagr_edit',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-26 16:36:52','2021-09-26 16:36:52'),(13,'tip_pred','tip-pred','Тип предмета','Тип предмета','voyager-wand','App\\TipPred',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-09-29 16:39:07','2021-09-29 16:39:07'),(14,'grupp_uchzav','grupp-uchzav','Группы','Группы','voyager-polaroid','App\\GruppUchzav',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-05 10:15:39','2021-10-15 15:48:41'),(15,'student','student','Студенты','Студенты',NULL,'App\\Student',NULL,'\\App\\Http\\Controllers\\student_edit',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-05 12:44:53','2021-10-10 13:27:57'),(17,'kategory','kategory','Категории сведений','Категории сведений','voyager-watch','App\\Kategory',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-10-05 14:26:25','2021-10-05 14:26:25'),(18,'typ_dann','typ-dann','Тип данных студента','Тип данных студента','voyager-paw','App\\TypDann',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-05 14:39:13','2021-10-06 15:03:28'),(19,'student_sved','student-sved','Student Sved','Student Sveds',NULL,'App\\StudentSved',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-05 15:13:25','2021-10-06 15:54:07'),(20,'typ_ball','typ-ball','Виды успеваемости','Виды успеваемости','voyager-company','App\\TypBall',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-10-09 15:26:01','2021-10-09 15:26:01'),(21,'typpricaza','typpricaza','Типы приказа','Типы приказа','voyager-backpack','App\\Typpricaza',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-10-15 15:32:10','2021-10-15 15:32:10'),(22,'bazapract','bazapract','Базы практик','Базы практик','voyager-activity','App\\Bazapract',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-25 11:13:06','2021-10-25 11:20:36'),(23,'otchets','otchets','Редактор отчетов','Редактор отчетов','voyager-pie-chart','App\\Otchet',NULL,'\\App\\Http\\Controllers\\otchet_edit',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2021-10-25 13:28:37','2021-10-27 13:50:42'),(26,'tip_ekz','tip-ekz','Тип экзамена','Тип экзамена','voyager-character','App\\TipEkz',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}','2021-11-17 13:51:58','2021-11-17 13:51:58');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `god`
--

DROP TABLE IF EXISTS `god`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `god` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nazv` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `god`
--

LOCK TABLES `god` WRITE;
/*!40000 ALTER TABLE `god` DISABLE KEYS */;
INSERT INTO `god` VALUES (3,NULL,'2021-09-27 14:07:39','2021-09-27 14:07:39',2021,1),(4,NULL,'2021-09-30 07:59:35','2021-09-30 07:59:35',2022,1);
/*!40000 ALTER TABLE `god` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupp`
--

DROP TABLE IF EXISTS `grupp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nazv` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `god` int(11) DEFAULT NULL,
  `spec` int(11) DEFAULT NULL,
  `kommerc` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupp`
--

LOCK TABLES `grupp` WRITE;
/*!40000 ALTER TABLE `grupp` DISABLE KEYS */;
INSERT INTO `grupp` VALUES (1,'2021-09-26 16:08:31','2021-09-26 16:08:31',NULL,'105',23,1,1,0,1),(2,'2021-09-26 16:11:14','2021-09-26 16:11:14',NULL,'110',22,2,1,0,1),(3,'2021-09-26 16:51:46','2021-09-26 16:51:46',NULL,'212',21,1,1,0,1),(4,'2021-09-26 16:52:17','2021-09-26 16:52:17',NULL,'311',22,1,1,1,1),(5,'2021-09-27 14:08:09','2021-09-27 14:08:09',NULL,'105',21,3,1,0,1),(6,'2021-09-27 14:08:23','2021-09-27 14:08:23',NULL,'106',22,3,1,0,1),(7,'2021-09-28 16:05:00','2021-09-28 17:01:17',NULL,'110',33,3,1,1,1),(8,'2021-09-28 16:05:20','2021-09-28 16:05:20',NULL,'205',23,3,1,0,1),(9,'2021-09-29 16:04:44','2021-09-29 16:04:44',NULL,'111',25,3,2,0,1),(111,'2021-10-01 16:12:00','2021-10-01 17:19:45',NULL,'115',15,4,1,0,1),(112,'2021-10-01 17:18:49','2021-10-01 17:18:49',NULL,'105',24,4,1,0,1);
/*!40000 ALTER TABLE `grupp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupp_uchzav`
--

DROP TABLE IF EXISTS `grupp_uchzav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupp_uchzav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurs` int(11) DEFAULT NULL,
  `kl_ruk` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `spec` int(11) DEFAULT NULL,
  `uchgr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupp_uchzav`
--

LOCK TABLES `grupp_uchzav` WRITE;
/*!40000 ALTER TABLE `grupp_uchzav` DISABLE KEYS */;
INSERT INTO `grupp_uchzav` VALUES (1,'2021-10-05 10:18:47','2021-10-15 15:49:08',NULL,'105',2,4,1,1,1),(2,'2021-10-05 12:26:19','2021-10-15 15:48:55',NULL,'106',2,4,1,1,1),(3,'2021-10-17 16:49:26','2021-10-17 16:49:26',NULL,'Отчисленные',0,NULL,1,1,2);
/*!40000 ALTER TABLE `grupp_uchzav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategory`
--

DROP TABLE IF EXISTS `kategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategory`
--

LOCK TABLES `kategory` WRITE;
/*!40000 ALTER TABLE `kategory` DISABLE KEYS */;
INSERT INTO `kategory` VALUES (1,NULL,'2021-10-05 14:28:27','2021-10-05 14:28:27','Портфолио',1),(2,NULL,'2021-10-05 14:50:56','2021-10-05 14:50:56','Общие сведения',1);
/*!40000 ALTER TABLE `kategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2021-09-25 15:46:30','2021-09-25 15:46:30','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,4,'2021-09-25 15:46:30','2021-09-26 16:21:22','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,3,'2021-09-25 15:46:30','2021-09-25 15:46:30','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2021-09-25 15:46:30','2021-09-25 15:46:30','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,5,'2021-09-25 15:46:30','2021-09-26 16:21:22',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2021-09-25 15:46:31','2021-09-26 16:21:22','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,2,'2021-09-25 15:46:31','2021-09-26 16:21:22','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2021-09-25 15:46:31','2021-09-26 16:21:22','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2021-09-25 15:46:31','2021-09-26 16:21:22','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,6,'2021-09-25 15:46:31','2021-09-26 16:21:22','voyager.settings.index',NULL),(11,1,'Образовательное учреждение','','_self',NULL,NULL,NULL,7,'2021-09-25 15:52:25','2021-09-26 16:21:22','voyager.obr-uch.index',NULL),(12,1,'Преподаватели','','_self','voyager-archive',NULL,18,3,'2021-09-26 14:42:08','2021-09-26 16:21:30','voyager.prepod.index',NULL),(13,1,'Предметы','','_self','voyager-company',NULL,18,4,'2021-09-26 15:02:10','2021-09-26 16:21:30','voyager.predmet.index',NULL),(14,1,'Специальности','','_self','voyager-polaroid',NULL,18,2,'2021-09-26 15:12:03','2021-09-26 16:21:30','voyager.spec.index',NULL),(15,1,'Год','','_self','voyager-paper-plane',NULL,18,1,'2021-09-26 15:25:10','2021-09-26 16:21:30','voyager.god.index',NULL),(16,1,'Группы','','_self','voyager-receipt',NULL,18,5,'2021-09-26 16:04:55','2021-09-26 16:21:33','voyager.grupp.index',NULL),(17,1,'Кафедра','','_self','voyager-tag',NULL,18,6,'2021-09-26 16:19:33','2021-09-26 16:21:35','voyager.pck.index',NULL),(18,1,'Справочники','','_self','voyager-photos','#000000',NULL,8,'2021-09-26 16:21:14','2021-09-26 16:21:35',NULL,''),(19,1,'Нагрузка','','_self','voyager-fire',NULL,NULL,10,'2021-09-26 16:36:52','2021-10-05 14:27:44','voyager.nagr.index',NULL),(20,1,'Тип предмета','','_self','voyager-wand',NULL,18,7,'2021-09-29 16:39:07','2021-09-30 08:13:08','voyager.tip-pred.index',NULL),(21,1,'Группы','','_self','voyager-polaroid',NULL,24,3,'2021-10-05 10:15:40','2021-10-05 14:49:45','voyager.grupp-uchzav.index',NULL),(22,1,'Студенты','','_self',NULL,NULL,24,4,'2021-10-05 12:44:53','2021-10-05 14:49:45','voyager.student.index',NULL),(23,1,'Категории сведений','','_self','voyager-watch',NULL,24,1,'2021-10-05 14:26:25','2021-10-05 14:27:36','voyager.kategory.index',NULL),(24,1,'Учебная часть','','_self','voyager-receipt','#000000',NULL,9,'2021-10-05 14:27:28','2021-10-05 14:27:44',NULL,''),(25,1,'Тип данных студента','','_self','voyager-paw',NULL,24,2,'2021-10-05 14:39:13','2021-10-05 14:49:45','voyager.typ-dann.index',NULL),(27,1,'Виды успеваемости','','_self','voyager-company',NULL,18,8,'2021-10-09 15:26:02','2021-10-09 15:27:06','voyager.typ-ball.index',NULL),(28,1,'Типы приказа','','_self','voyager-backpack',NULL,NULL,11,'2021-10-15 15:32:11','2021-10-15 15:32:11','voyager.typpricaza.index',NULL),(29,1,'Базы практик','','_self','voyager-activity',NULL,NULL,12,'2021-10-25 11:13:07','2021-10-25 11:13:07','voyager.bazapract.index',NULL),(30,1,'Редактор отчетов','','_self','voyager-pie-chart',NULL,NULL,13,'2021-10-25 13:28:37','2021-10-25 13:28:37','voyager.otchets.index',NULL),(31,1,'Тип экзамена','','_self','voyager-character',NULL,NULL,14,'2021-11-17 13:51:58','2021-11-17 13:51:58','voyager.tip-ekz.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2021-09-25 15:46:30','2021-09-25 15:46:30');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2014_10_12_000000_create_users_table',1),(25,'2014_10_12_100000_create_password_resets_table',1),(26,'2016_01_01_000000_add_voyager_user_fields',1),(27,'2016_01_01_000000_create_data_types_table',1),(28,'2016_05_19_173453_create_menu_table',1),(29,'2016_10_21_190000_create_roles_table',1),(30,'2016_10_21_190000_create_settings_table',1),(31,'2016_11_30_135954_create_permission_table',1),(32,'2016_11_30_141208_create_permission_role_table',1),(33,'2016_12_26_201236_data_types__add__server_side',1),(34,'2017_01_13_000000_add_route_to_menu_items_table',1),(35,'2017_01_14_005015_create_translations_table',1),(36,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(37,'2017_03_06_000000_add_controller_to_data_types_table',1),(38,'2017_04_21_000000_add_order_to_data_rows_table',1),(39,'2017_07_05_210000_add_policyname_to_data_types_table',1),(40,'2017_08_05_000000_add_group_to_settings_table',1),(41,'2017_11_26_013050_add_user_role_relationship',1),(42,'2017_11_26_015000_create_user_roles_table',1),(43,'2018_03_11_000000_add_user_settings',1),(44,'2018_03_14_000000_add_details_to_data_types_table',1),(45,'2018_03_16_000000_make_settings_value_nullable',1),(46,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nagr`
--

DROP TABLE IF EXISTS `nagr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nagr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `god` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `kurs` int(11) DEFAULT NULL,
  `semestr` int(11) DEFAULT NULL,
  `predmet` int(11) DEFAULT NULL,
  `prepod` int(11) DEFAULT NULL,
  `pck` int(11) DEFAULT NULL,
  `pogos` int(11) DEFAULT NULL,
  `srs` int(11) DEFAULT NULL,
  `leck` int(11) DEFAULT NULL,
  `lab` int(11) DEFAULT NULL,
  `pract` int(11) DEFAULT NULL,
  `podgr` int(11) DEFAULT '1',
  `ekz` int(11) DEFAULT NULL,
  `zach` int(11) DEFAULT NULL,
  `ssuz_ekz` int(11) DEFAULT NULL,
  `ssuz_zach` int(11) DEFAULT NULL,
  `KP` int(11) DEFAULT NULL,
  `KR` int(11) DEFAULT NULL,
  `typ_pr` int(11) DEFAULT NULL,
  `grupp` int(11) DEFAULT NULL,
  `inoe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nagr`
--

LOCK TABLES `nagr` WRITE;
/*!40000 ALTER TABLE `nagr` DISABLE KEYS */;
INSERT INTO `nagr` VALUES (25,'2021-10-12 15:07:41','2021-10-14 11:57:18',4,1,2,3,192,4,1,12,0,4,4,3,2,NULL,0,NULL,NULL,0,NULL,6,111,10),(26,'2021-10-12 16:10:47','2021-10-14 12:57:04',4,1,2,4,192,4,1,2,0,2,0,12,2,NULL,0,NULL,NULL,12,NULL,6,112,24),(27,'2021-10-12 16:28:56','2021-10-12 16:28:56',3,1,1,2,192,94,1,2,0,12,0,22,2,NULL,0,NULL,NULL,0,NULL,6,5,NULL),(28,'2021-10-14 14:32:11','2021-10-14 14:32:11',4,1,2,4,191,92,1,4,0,8,0,0,0,8,0,NULL,NULL,0,NULL,6,112,NULL),(29,'2021-10-14 16:11:30','2021-10-14 16:11:30',4,1,2,4,192,92,1,1,0,1,0,1,1,NULL,0,NULL,NULL,0,NULL,6,111,4);
/*!40000 ALTER TABLE `nagr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obr_uch`
--

DROP TABLE IF EXISTS `obr_uch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obr_uch` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obr_uch`
--

LOCK TABLES `obr_uch` WRITE;
/*!40000 ALTER TABLE `obr_uch` DISABLE KEYS */;
INSERT INTO `obr_uch` VALUES (1,NULL,'ГАОУ СПО ЗМУ','2021-09-26 14:27:20','2021-09-26 14:27:20'),(2,NULL,'КГАИСУ','2021-09-29 16:35:19','2021-09-29 16:35:19'),(5,'2021-10-01 17:02:36','проба','2021-10-01 17:00:13','2021-10-01 17:02:36'),(6,NULL,'Полный','2021-10-01 17:03:24','2021-10-01 17:03:24');
/*!40000 ALTER TABLE `obr_uch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otchets`
--

DROP TABLE IF EXISTS `otchets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otchets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sql` text COLLATE utf8mb4_unicode_ci,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `nazv` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci,
  `php` text COLLATE utf8mb4_unicode_ci,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otchets`
--

LOCK TABLES `otchets` WRITE;
/*!40000 ALTER TABLE `otchets` DISABLE KEYS */;
INSERT INTO `otchets` VALUES (2,'2021-10-27 13:50:53','2021-10-27 13:50:53',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `otchets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otchets_perem`
--

DROP TABLE IF EXISTS `otchets_perem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otchets_perem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `sql` text COLLATE utf8mb4_unicode_ci,
  `otchet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otchets_perem`
--

LOCK TABLES `otchets_perem` WRITE;
/*!40000 ALTER TABLE `otchets_perem` DISABLE KEYS */;
/*!40000 ALTER TABLE `otchets_perem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `pck`
--

DROP TABLE IF EXISTS `pck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pck` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pck`
--

LOCK TABLES `pck` WRITE;
/*!40000 ALTER TABLE `pck` DISABLE KEYS */;
INSERT INTO `pck` VALUES (1,NULL,'2021-09-26 16:20:36','2021-09-26 16:20:36','Фармация',1);
/*!40000 ALTER TABLE `pck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,2),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(21,2),(22,1),(22,2),(23,1),(23,2),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(31,2),(32,1),(32,2),(33,1),(33,2),(34,1),(34,2),(35,1),(35,2),(36,1),(36,2),(37,1),(37,2),(38,1),(38,2),(39,1),(39,2),(40,1),(40,2),(41,1),(41,2),(42,1),(42,2),(43,1),(43,2),(44,1),(44,2),(45,1),(45,2),(46,1),(46,2),(47,1),(47,2),(48,1),(48,2),(49,1),(49,2),(50,1),(50,2),(51,1),(51,2),(52,1),(52,2),(53,1),(53,2),(54,1),(54,2),(55,1),(55,2),(56,1),(56,2),(57,1),(57,2),(58,1),(58,2),(59,1),(59,2),(60,1),(60,2),(61,1),(61,2),(62,1),(62,2),(63,1),(63,2),(64,1),(64,2),(65,1),(65,2),(66,1),(66,2),(67,1),(67,2),(68,1),(68,2),(69,1),(69,2),(70,1),(70,2),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(78,1),(79,1),(80,1),(81,1),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1),(92,1),(93,1),(94,1),(95,1),(96,1),(97,1),(98,1),(99,1),(100,1),(101,1),(102,1),(103,1),(104,1),(105,1),(106,1),(107,1),(108,1),(109,1),(110,1),(111,1),(112,1),(113,1),(114,1),(115,1),(116,1),(117,1),(118,1),(119,1),(120,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2021-09-25 15:46:31','2021-09-25 15:46:31'),(2,'browse_bread',NULL,'2021-09-25 15:46:31','2021-09-25 15:46:31'),(3,'browse_database',NULL,'2021-09-25 15:46:31','2021-09-25 15:46:31'),(4,'browse_media',NULL,'2021-09-25 15:46:31','2021-09-25 15:46:31'),(5,'browse_compass',NULL,'2021-09-25 15:46:31','2021-09-25 15:46:31'),(6,'browse_menus','menus','2021-09-25 15:46:31','2021-09-25 15:46:31'),(7,'read_menus','menus','2021-09-25 15:46:31','2021-09-25 15:46:31'),(8,'edit_menus','menus','2021-09-25 15:46:31','2021-09-25 15:46:31'),(9,'add_menus','menus','2021-09-25 15:46:31','2021-09-25 15:46:31'),(10,'delete_menus','menus','2021-09-25 15:46:31','2021-09-25 15:46:31'),(11,'browse_roles','roles','2021-09-25 15:46:31','2021-09-25 15:46:31'),(12,'read_roles','roles','2021-09-25 15:46:31','2021-09-25 15:46:31'),(13,'edit_roles','roles','2021-09-25 15:46:31','2021-09-25 15:46:31'),(14,'add_roles','roles','2021-09-25 15:46:31','2021-09-25 15:46:31'),(15,'delete_roles','roles','2021-09-25 15:46:31','2021-09-25 15:46:31'),(16,'browse_users','users','2021-09-25 15:46:31','2021-09-25 15:46:31'),(17,'read_users','users','2021-09-25 15:46:31','2021-09-25 15:46:31'),(18,'edit_users','users','2021-09-25 15:46:31','2021-09-25 15:46:31'),(19,'add_users','users','2021-09-25 15:46:31','2021-09-25 15:46:31'),(20,'delete_users','users','2021-09-25 15:46:31','2021-09-25 15:46:31'),(21,'browse_settings','settings','2021-09-25 15:46:31','2021-09-25 15:46:31'),(22,'read_settings','settings','2021-09-25 15:46:31','2021-09-25 15:46:31'),(23,'edit_settings','settings','2021-09-25 15:46:31','2021-09-25 15:46:31'),(24,'add_settings','settings','2021-09-25 15:46:31','2021-09-25 15:46:31'),(25,'delete_settings','settings','2021-09-25 15:46:31','2021-09-25 15:46:31'),(26,'browse_obr_uch','obr_uch','2021-09-25 15:52:25','2021-09-25 15:52:25'),(27,'read_obr_uch','obr_uch','2021-09-25 15:52:25','2021-09-25 15:52:25'),(28,'edit_obr_uch','obr_uch','2021-09-25 15:52:25','2021-09-25 15:52:25'),(29,'add_obr_uch','obr_uch','2021-09-25 15:52:25','2021-09-25 15:52:25'),(30,'delete_obr_uch','obr_uch','2021-09-25 15:52:25','2021-09-25 15:52:25'),(31,'browse_prepod','prepod','2021-09-26 14:42:08','2021-09-26 14:42:08'),(32,'read_prepod','prepod','2021-09-26 14:42:08','2021-09-26 14:42:08'),(33,'edit_prepod','prepod','2021-09-26 14:42:08','2021-09-26 14:42:08'),(34,'add_prepod','prepod','2021-09-26 14:42:08','2021-09-26 14:42:08'),(35,'delete_prepod','prepod','2021-09-26 14:42:08','2021-09-26 14:42:08'),(36,'browse_predmet','predmet','2021-09-26 15:02:10','2021-09-26 15:02:10'),(37,'read_predmet','predmet','2021-09-26 15:02:10','2021-09-26 15:02:10'),(38,'edit_predmet','predmet','2021-09-26 15:02:10','2021-09-26 15:02:10'),(39,'add_predmet','predmet','2021-09-26 15:02:10','2021-09-26 15:02:10'),(40,'delete_predmet','predmet','2021-09-26 15:02:10','2021-09-26 15:02:10'),(41,'browse_spec','spec','2021-09-26 15:12:03','2021-09-26 15:12:03'),(42,'read_spec','spec','2021-09-26 15:12:03','2021-09-26 15:12:03'),(43,'edit_spec','spec','2021-09-26 15:12:03','2021-09-26 15:12:03'),(44,'add_spec','spec','2021-09-26 15:12:03','2021-09-26 15:12:03'),(45,'delete_spec','spec','2021-09-26 15:12:03','2021-09-26 15:12:03'),(46,'browse_god','god','2021-09-26 15:25:10','2021-09-26 15:25:10'),(47,'read_god','god','2021-09-26 15:25:10','2021-09-26 15:25:10'),(48,'edit_god','god','2021-09-26 15:25:10','2021-09-26 15:25:10'),(49,'add_god','god','2021-09-26 15:25:10','2021-09-26 15:25:10'),(50,'delete_god','god','2021-09-26 15:25:10','2021-09-26 15:25:10'),(51,'browse_grupp','grupp','2021-09-26 16:04:55','2021-09-26 16:04:55'),(52,'read_grupp','grupp','2021-09-26 16:04:55','2021-09-26 16:04:55'),(53,'edit_grupp','grupp','2021-09-26 16:04:55','2021-09-26 16:04:55'),(54,'add_grupp','grupp','2021-09-26 16:04:55','2021-09-26 16:04:55'),(55,'delete_grupp','grupp','2021-09-26 16:04:55','2021-09-26 16:04:55'),(56,'browse_pck','pck','2021-09-26 16:19:33','2021-09-26 16:19:33'),(57,'read_pck','pck','2021-09-26 16:19:33','2021-09-26 16:19:33'),(58,'edit_pck','pck','2021-09-26 16:19:33','2021-09-26 16:19:33'),(59,'add_pck','pck','2021-09-26 16:19:33','2021-09-26 16:19:33'),(60,'delete_pck','pck','2021-09-26 16:19:33','2021-09-26 16:19:33'),(61,'browse_nagr','nagr','2021-09-26 16:36:52','2021-09-26 16:36:52'),(62,'read_nagr','nagr','2021-09-26 16:36:52','2021-09-26 16:36:52'),(63,'edit_nagr','nagr','2021-09-26 16:36:52','2021-09-26 16:36:52'),(64,'add_nagr','nagr','2021-09-26 16:36:52','2021-09-26 16:36:52'),(65,'delete_nagr','nagr','2021-09-26 16:36:52','2021-09-26 16:36:52'),(66,'browse_tip_pred','tip_pred','2021-09-29 16:39:07','2021-09-29 16:39:07'),(67,'read_tip_pred','tip_pred','2021-09-29 16:39:07','2021-09-29 16:39:07'),(68,'edit_tip_pred','tip_pred','2021-09-29 16:39:07','2021-09-29 16:39:07'),(69,'add_tip_pred','tip_pred','2021-09-29 16:39:07','2021-09-29 16:39:07'),(70,'delete_tip_pred','tip_pred','2021-09-29 16:39:07','2021-09-29 16:39:07'),(71,'browse_grupp_uchzav','grupp_uchzav','2021-10-05 10:15:40','2021-10-05 10:15:40'),(72,'read_grupp_uchzav','grupp_uchzav','2021-10-05 10:15:40','2021-10-05 10:15:40'),(73,'edit_grupp_uchzav','grupp_uchzav','2021-10-05 10:15:40','2021-10-05 10:15:40'),(74,'add_grupp_uchzav','grupp_uchzav','2021-10-05 10:15:40','2021-10-05 10:15:40'),(75,'delete_grupp_uchzav','grupp_uchzav','2021-10-05 10:15:40','2021-10-05 10:15:40'),(76,'browse_student','student','2021-10-05 12:44:53','2021-10-05 12:44:53'),(77,'read_student','student','2021-10-05 12:44:53','2021-10-05 12:44:53'),(78,'edit_student','student','2021-10-05 12:44:53','2021-10-05 12:44:53'),(79,'add_student','student','2021-10-05 12:44:53','2021-10-05 12:44:53'),(80,'delete_student','student','2021-10-05 12:44:53','2021-10-05 12:44:53'),(81,'browse_kategory','kategory','2021-10-05 14:26:25','2021-10-05 14:26:25'),(82,'read_kategory','kategory','2021-10-05 14:26:25','2021-10-05 14:26:25'),(83,'edit_kategory','kategory','2021-10-05 14:26:25','2021-10-05 14:26:25'),(84,'add_kategory','kategory','2021-10-05 14:26:25','2021-10-05 14:26:25'),(85,'delete_kategory','kategory','2021-10-05 14:26:25','2021-10-05 14:26:25'),(86,'browse_typ_dann','typ_dann','2021-10-05 14:39:13','2021-10-05 14:39:13'),(87,'read_typ_dann','typ_dann','2021-10-05 14:39:13','2021-10-05 14:39:13'),(88,'edit_typ_dann','typ_dann','2021-10-05 14:39:13','2021-10-05 14:39:13'),(89,'add_typ_dann','typ_dann','2021-10-05 14:39:13','2021-10-05 14:39:13'),(90,'delete_typ_dann','typ_dann','2021-10-05 14:39:13','2021-10-05 14:39:13'),(91,'browse_student_sved','student_sved','2021-10-05 15:13:25','2021-10-05 15:13:25'),(92,'read_student_sved','student_sved','2021-10-05 15:13:25','2021-10-05 15:13:25'),(93,'edit_student_sved','student_sved','2021-10-05 15:13:25','2021-10-05 15:13:25'),(94,'add_student_sved','student_sved','2021-10-05 15:13:25','2021-10-05 15:13:25'),(95,'delete_student_sved','student_sved','2021-10-05 15:13:25','2021-10-05 15:13:25'),(96,'browse_typ_ball','typ_ball','2021-10-09 15:26:02','2021-10-09 15:26:02'),(97,'read_typ_ball','typ_ball','2021-10-09 15:26:02','2021-10-09 15:26:02'),(98,'edit_typ_ball','typ_ball','2021-10-09 15:26:02','2021-10-09 15:26:02'),(99,'add_typ_ball','typ_ball','2021-10-09 15:26:02','2021-10-09 15:26:02'),(100,'delete_typ_ball','typ_ball','2021-10-09 15:26:02','2021-10-09 15:26:02'),(101,'browse_typpricaza','typpricaza','2021-10-15 15:32:11','2021-10-15 15:32:11'),(102,'read_typpricaza','typpricaza','2021-10-15 15:32:11','2021-10-15 15:32:11'),(103,'edit_typpricaza','typpricaza','2021-10-15 15:32:11','2021-10-15 15:32:11'),(104,'add_typpricaza','typpricaza','2021-10-15 15:32:11','2021-10-15 15:32:11'),(105,'delete_typpricaza','typpricaza','2021-10-15 15:32:11','2021-10-15 15:32:11'),(106,'browse_bazapract','bazapract','2021-10-25 11:13:06','2021-10-25 11:13:06'),(107,'read_bazapract','bazapract','2021-10-25 11:13:06','2021-10-25 11:13:06'),(108,'edit_bazapract','bazapract','2021-10-25 11:13:06','2021-10-25 11:13:06'),(109,'add_bazapract','bazapract','2021-10-25 11:13:06','2021-10-25 11:13:06'),(110,'delete_bazapract','bazapract','2021-10-25 11:13:06','2021-10-25 11:13:06'),(111,'browse_otchets','otchets','2021-10-25 13:28:37','2021-10-25 13:28:37'),(112,'read_otchets','otchets','2021-10-25 13:28:37','2021-10-25 13:28:37'),(113,'edit_otchets','otchets','2021-10-25 13:28:37','2021-10-25 13:28:37'),(114,'add_otchets','otchets','2021-10-25 13:28:37','2021-10-25 13:28:37'),(115,'delete_otchets','otchets','2021-10-25 13:28:37','2021-10-25 13:28:37'),(116,'browse_tip_ekz','tip_ekz','2021-11-17 13:51:58','2021-11-17 13:51:58'),(117,'read_tip_ekz','tip_ekz','2021-11-17 13:51:58','2021-11-17 13:51:58'),(118,'edit_tip_ekz','tip_ekz','2021-11-17 13:51:58','2021-11-17 13:51:58'),(119,'add_tip_ekz','tip_ekz','2021-11-17 13:51:58','2021-11-17 13:51:58'),(120,'delete_tip_ekz','tip_ekz','2021-11-17 13:51:58','2021-11-17 13:51:58');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phistory`
--

DROP TABLE IF EXISTS `phistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phistory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `oldg` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newgr` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prikaz_id` int(11) DEFAULT NULL,
  `prikaz_data` date DEFAULT NULL,
  `p_comment` text COLLATE utf8mb4_unicode_ci,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phistory`
--

LOCK TABLES `phistory` WRITE;
/*!40000 ALTER TABLE `phistory` DISABLE KEYS */;
INSERT INTO `phistory` VALUES (1,'2021-10-16 17:08:02','2021-10-16 17:08:02',NULL,'106',4,'2021-10-09',NULL,1),(2,'2021-10-16 17:11:02','2021-10-16 17:11:02','106','105',5,'2021-10-08',NULL,1),(3,'2021-10-16 17:11:52','2021-10-16 17:11:52','105','106',6,'0022-02-22',NULL,1),(4,'2021-10-16 17:13:58','2021-10-16 17:13:58','105','106',7,'2021-10-16','уцуцу',1),(5,'2021-10-16 17:15:43','2021-10-16 17:15:43','106','105',7,'2021-10-08',NULL,1),(6,'2021-10-16 17:18:10','2021-10-16 17:18:10','105','106',7,'2021-10-01',NULL,1),(7,'2021-10-17 16:49:49','2021-10-17 16:49:49','106','Отчисленные',6,'2021-10-17',NULL,1);
/*!40000 ALTER TABLE `phistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `podrazdel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `predmet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nazv` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nazv_full` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `predmet`
--

LOCK TABLES `predmet` WRITE;
/*!40000 ALTER TABLE `predmet` DISABLE KEYS */;
INSERT INTO `predmet` VALUES (1,'2021-09-26 15:02:36','2021-10-01 14:21:42','2021-10-01 14:21:42','Русский язык','Русский язык',1),(2,'2021-09-26 15:04:35','2021-10-01 14:21:42','2021-10-01 14:21:42','Математика','Математика',1),(3,'2021-09-27 16:41:29','2021-10-01 14:21:42','2021-10-01 14:21:42','Общественное здоровье и здравоохранение','Общественное здоровье и здравоохранение',1),(4,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Анализ финансово-хозяйственной деятельности','Анализ финансово-хозяйственной деятельности',1),(5,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Архитектурная физика','Архитектурная физика',1),(6,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Архитектурное материаловедение','Архитектурное материаловедение',1),(7,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Астрономия','Астрономия',1),(8,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Аудит','Аудит',1),(9,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Безопасность жизнедеятельности','Безопасность жизнедеятельности',1),(10,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Бухгалтерский учет','Бухгалтерский учет',1),(11,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Бюджетный учет','Бюджетный учет',1),(12,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Деловая культура','Деловая культура',1),(13,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Документационное обеспечение управления','Документационное обеспечение управления',1),(14,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Естествознание','Естествознание',1),(15,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Инженерная графика','Инженерная графика',1),(16,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Инженерные сети','Инженерные сети',1),(17,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Инженерные сети и оборудование зданий и территорий поселений','Инженерные сети и оборудование зданий и территорий поселений',1),(18,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Иностранный Язык','Иностранный Язык',1),(19,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Иностранный язык в профессиональной деятельности','Иностранный язык в профессиональной деятельности',1),(20,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Информатика','Информатика',1),(21,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Информатика и информационные технологии в профессиональной деятельности','Информатика и информационные технологии в профессиональной деятельности',1),(22,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Информационные технологии в профессиональной деятельности','Информационные технологии в профессиональной деятельности',1),(23,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','История','История',1),(24,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','История архитектуры','История архитектуры',1),(25,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Квалификационный экзамен ПМ.04','Квалификационный экзамен ПМ.04',1),(26,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Квалификационный экзамен ПМ.06','Квалификационный экзамен ПМ.06',1),(27,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Классный час','Классный час',1),(28,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Колористика','Колористика',1),(29,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Культура речи в профессиональной деятельности','Культура речи в профессиональной деятельности',1),(30,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Культурология','Культурология',1),(31,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Литература','Литература',1),(32,NULL,'2021-10-01 14:21:42','2021-10-01 14:21:42','Логистика','Логистика',1),(33,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','Математика','Математика',1),(34,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','Материаловедение в строительстве','Материаловедение в строительстве',1),(35,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','Материалы и изделия сантехнических устройств и систем обеспечения микроклимата','Материалы и изделия сантехнических устройств и систем обеспечения микроклимата',1),(36,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Изображение архитектурного замысла при проектировании','МДК 01.01 Изображение архитектурного замысла при проектировании',1),(37,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Нормативное и документационное регулирование деятельности по управлению МД','МДК 01.01 Нормативное и документационное регулирование деятельности по управлению МД',1),(38,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Организация коммерческой деятельности','МДК 01.01 Организация коммерческой деятельности',1),(39,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Организация работ по ведению домашнего хозяйства','МДК 01.01 Организация работ по ведению домашнего хозяйства',1),(40,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Практические основы бухгалтерского учета активов организации','МДК 01.01 Практические основы бухгалтерского учета активов организации',1),(41,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Проектирование зданий и сооружений','МДК 01.01 Проектирование зданий и сооружений',1),(42,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Реализация технологических процессов монтажа систем водоснабжения и водоотведения, отоплен','МДК 01.01 Реализация технологических процессов монтажа систем водоснабжения и водоотведения, отоплен',1),(43,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Социально-правовые и законодательные основы соцработы с лицами ПожВозиИнв','МДК 01.01 Социально-правовые и законодательные основы соцработы с лицами ПожВозиИнв',1),(44,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.01 Технология обслуживания, ремонт и монтаж отдельных узлов системы водоснабжения, в том чис','МДК 01.01 Технология обслуживания, ремонт и монтаж отдельных узлов системы водоснабжения, в том чис',1),(45,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Контроль соответстви качества монтажа систем водоснабжения и водоотведения, отопления','МДК 01.02 Контроль соответстви качества монтажа систем водоснабжения и водоотведения, отопления',1),(46,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Обеспечение эксплуатации и обслуживания имущества и оборудования собствеников','МДК 01.02 Обеспечение эксплуатации и обслуживания имущества и оборудования собствеников',1),(47,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Объемно-пространственная композиция с элементами макетирования','МДК 01.02 Объемно-пространственная композиция с элементами макетирования',1),(48,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Организация торговли','МДК 01.02 Организация торговли',1),(49,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Проект производства работ','МДК 01.02 Проект производства работ',1),(50,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Психология и андрогогика лиц пожилого возраста и инвалидами','МДК 01.02 Психология и андрогогика лиц пожилого возраста и инвалидами',1),(51,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.02 Технология обслуживания, ремонт и монтаж отдельных узлов в соответствии с заданием (нарядо','МДК 01.02 Технология обслуживания, ремонт и монтаж отдельных узлов в соответствии с заданием (нарядо',1),(52,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.03 Начальное архитектурное проектирование: Проектирование небольшого открытого пространства','МДК 01.03 Начальное архитектурное проектирование: Проектирование небольшого открытого пространства',1),(53,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.03 Техническое оснащение торговых организаций и охрана труда','МДК 01.03 Техническое оснащение торговых организаций и охрана труда',1),(54,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.03 Технология обслуживания, ремонт и монтаж отдельных узлов в соответствии с заданием (нарядо','МДК 01.03 Технология обслуживания, ремонт и монтаж отдельных узлов в соответствии с заданием (нарядо',1),(55,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.03 Технология социальной работы с лицами пожилого возраста и инвалидами','МДК 01.03 Технология социальной работы с лицами пожилого возраста и инвалидами',1),(56,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.03 Экономика и управление домашним хозяйством','МДК 01.03 Экономика и управление домашним хозяйством',1),(57,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.04 Основы градостроительного проектирования с элементами селитебных территорий','МДК 01.04 Основы градостроительного проектирования с элементами селитебных территорий',1),(58,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.04 Социальный патронат лиц пожилого возраста и инвалидов','МДК 01.04 Социальный патронат лиц пожилого возраста и инвалидов',1),(59,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 01.05 Конструкции зданий и сооружений с элементами статики. Проектирование и строительство в усл','МДК 01.05 Конструкции зданий и сооружений с элементами статики. Проектирование и строительство в усл',1),(60,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Организация и контроль проведения тех осмотров и подготовки к сезонной эксплуатации объект','МДК 02.01 Организация и контроль проведения тех осмотров и подготовки к сезонной эксплуатации объект',1),(61,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Организация и контроль работ по эксплуатации систем водоснабжения и водоотведения, отопле','МДК 02.01 Организация и контроль работ по эксплуатации систем водоснабжения и водоотведения, отопле',1),(62,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Организация технологических процессов на объекте капитального строительства','МДК 02.01 Организация технологических процессов на объекте капитального строительства',1),(63,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Основы строительного производства','МДК 02.01 Основы строительного производства',1),(64,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Практические основы бухгалтерского учета источников формирования активов организации','МДК 02.01 Практические основы бухгалтерского учета источников формирования активов организации',1),(65,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Социально-правовая и законадательная основы социальной работы с семьей и детьми','МДК 02.01 Социально-правовая и законадательная основы социальной работы с семьей и детьми',1),(66,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Техническое эксплуатация, ремонт и монтаж отдельныхузлов силовых и слаботочных систем здан','МДК 02.01 Техническое эксплуатация, ремонт и монтаж отдельныхузлов силовых и слаботочных систем здан',1),(67,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Финансы, налоги и налогообложение','МДК 02.01 Финансы, налоги и налогообложение',1),(68,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.01 Эксплуатация, обслуживание и ремонт общего имущества многоквартирного дома','МДК 02.01 Эксплуатация, обслуживание и ремонт общего имущества многоквартирного дома',1),(69,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Анализ финансово-хозяйственной деятельности','МДК 02.02 Анализ финансово-хозяйственной деятельности',1),(70,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Бухгалтерская технология проведения и оформления инвентаризации','МДК 02.02 Бухгалтерская технология проведения и оформления инвентаризации',1),(71,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Возрастная психология и педагогика, семьеведение','МДК 02.02 Возрастная психология и педагогика, семьеведение',1),(72,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Документационной обеспечение управления эксплуатации объектов ЖКХ','МДК 02.02 Документационной обеспечение управления эксплуатации объектов ЖКХ',1),(73,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Организация расчетов за услуги и работы по содержанию и ремонту общего имущества многоквар','МДК 02.02 Организация расчетов за услуги и работы по содержанию и ремонту общего имущества многоквар',1),(74,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Реализация технологических процессов эксплуатации систем водоснабжения и водоотведения, от','МДК 02.02 Реализация технологических процессов эксплуатации систем водоснабжения и водоотведения, от',1),(75,NULL,'2021-10-01 14:21:43','2021-10-01 14:21:43','МДК 02.02 Техническое обслуживание, ремонт и монтаж домовых слаботочных систем зданий и сооружений','МДК 02.02 Техническое обслуживание, ремонт и монтаж домовых слаботочных систем зданий и сооружений',1),(76,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 02.02 Учет и контроль технологических процессов','МДК 02.02 Учет и контроль технологических процессов',1),(77,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 02.03 Маркетинг','МДК 02.03 Маркетинг',1),(78,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 02.03 Технология социальной работы с семьей и детьми','МДК 02.03 Технология социальной работы с семьей и детьми',1),(79,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 02.04 Социальный патронат различных типов семей и детей','МДК 02.04 Социальный патронат различных типов семей и детей',1),(80,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Нормативно-правовая основа СР с лицами из групп риска','МДК 03.01 Нормативно-правовая основа СР с лицами из групп риска',1),(81,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Организация и контроль диспетчерского и аварийного обслуживания объектов ЖКХ','МДК 03.01 Организация и контроль диспетчерского и аварийного обслуживания объектов ЖКХ',1),(82,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Организация работ по обеспечению санитарного содержания и благоустройству общего имуществ','МДК 03.01 Организация работ по обеспечению санитарного содержания и благоустройству общего имуществ',1),(83,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Организация расчетов с бюджетом и внебюджетными фондами','МДК 03.01 Организация расчетов с бюджетом и внебюджетными фондами',1),(84,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Особенности проектирования систем водоснабжения и водоотведения, отопления, вентиляции','МДК 03.01 Особенности проектирования систем водоснабжения и водоотведения, отопления, вентиляции',1),(85,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Планирование и организация архитектурного проектирования и строительства','МДК 03.01 Планирование и организация архитектурного проектирования и строительства',1),(86,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Теоретические основы товароведения','МДК 03.01 Теоретические основы товароведения',1),(87,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.01 Управление деятельностью структурных подразделений строительно-монтажных работ ЭкиРекЗиС','МДК 03.01 Управление деятельностью структурных подразделений строительно-монтажных работ ЭкиРекЗиС',1),(88,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.02 Организация работ по обеспечению безопасности жизнедеятельности МД','МДК 03.02 Организация работ по обеспечению безопасности жизнедеятельности МД',1),(89,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.02 Реализация проектирования систем водоснабжения и водоотведения, отопления, вентиляции','МДК 03.02 Реализация проектирования систем водоснабжения и водоотведения, отопления, вентиляции',1),(90,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.02 Технология СР с лицами из групп риска','МДК 03.02 Технология СР с лицами из групп риска',1),(91,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.02 Товароведение продовольственных и непродовольтсвенных товаров','МДК 03.02 Товароведение продовольственных и непродовольтсвенных товаров',1),(92,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 03.03 Социальный патронат лиц из групп риска','МДК 03.03 Социальный патронат лиц из групп риска',1),(93,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Организация и контроль работ по санитарному содержанию, благоустройству общего имущества и','МДК 04.01 Организация и контроль работ по санитарному содержанию, благоустройству общего имущества и',1),(94,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Основы профессионального общения','МДК 04.01 Основы профессионального общения',1),(95,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Технология выполнения работ по должности служащего \"Кассир торгового зала\"','МДК 04.01 Технология выполнения работ по должности служащего \"Кассир торгового зала\"',1),(96,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Технология выполнения работ по раб.профессии \"Рабочий по комплексному обслуживанию и РЗ','МДК 04.01 Технология выполнения работ по раб.профессии \"Рабочий по комплексному обслуживанию и РЗ',1),(97,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Технология выполнения работ по рабочей профессии \"Слесарь-сантехник\"','МДК 04.01 Технология выполнения работ по рабочей профессии \"Слесарь-сантехник\"',1),(98,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.01 Эксплуатация зданий','МДК 04.01 Эксплуатация зданий',1),(99,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.02 Основы ландшафтного строительства','МДК 04.02 Основы ландшафтного строительства',1),(100,NULL,'2021-10-01 14:21:44','2021-10-01 14:21:44','МДК 04.02 Реконструкция зданий','МДК 04.02 Реконструкция зданий',1),(101,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 04.02 Социально-медицинские основы профессиональной деятельности','МДК 04.02 Социально-медицинские основы профессиональной деятельности',1),(102,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 04.03 Основы социально-бытового обслуживания','МДК 04.03 Основы социально-бытового обслуживания',1),(103,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 05.01 Организация и нормативно-правовое регулирование в сфере ЖКХ','МДК 05.01 Организация и нормативно-правовое регулирование в сфере ЖКХ',1),(104,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 05.01 Организация и планирование налоговой деятельности','МДК 05.01 Организация и планирование налоговой деятельности',1),(105,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 05.01 Производство работ по рабочей профессии \"12680 Каменщик\", \"16671 Плотник\", \"19727 Штукатур','МДК 05.01 Производство работ по рабочей профессии \"12680 Каменщик\", \"16671 Плотник\", \"19727 Штукатур',1),(106,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 05.02 Организация методики экономических расчетов по работам и услугам в сфере ЖКХ','МДК 05.02 Организация методики экономических расчетов по работам и услугам в сфере ЖКХ',1),(107,NULL,'2021-10-01 14:21:55','2021-10-01 14:21:55','МДК 05.03 Организация работ по финансовому анализу и учету хозяйственной деятельности объектов ЖКХ','МДК 05.03 Организация работ по финансовому анализу и учету хозяйственной деятельности объектов ЖКХ',1),(108,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','МДК 06.01 Подготовка по рабочей профессии \"Рабочий по комплексному обслуживанию и ремонту зданий\"','МДК 06.01 Подготовка по рабочей профессии \"Рабочий по комплексному обслуживанию и ремонту зданий\"',1),(109,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Менеджмент','Менеджмент',1),(110,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Менеджмент и управление персоналом в ЖКХ','Менеджмент и управление персоналом в ЖКХ',1),(111,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Методы проведения социологических исследования','Методы проведения социологических исследования',1),(112,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Налоги и налогообложение','Налоги и налогообложение',1),(113,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Начертательная геометрия','Начертательная геометрия',1),(114,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Нормирование труда и сметы','Нормирование труда и сметы',1),(115,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','ОБЖ','ОБЖ',1),(116,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Общие сведения об инженерных системах','Общие сведения об инженерных системах',1),(117,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Организация социальной работы в Российской Федерации','Организация социальной работы в Российской Федерации',1),(118,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы бухгалтерского учета','Основы бухгалтерского учета',1),(119,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы бухгалтерского учета в ЖКХ','Основы бухгалтерского учета в ЖКХ',1),(120,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы геодезии','Основы геодезии',1),(121,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы гидравлики, теплотехники и аэродинамики','Основы гидравлики, теплотехники и аэродинамики',1),(122,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы инженерной геологии','Основы инженерной геологии',1),(123,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы инженерной графики','Основы инженерной графики',1),(124,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы педагогики и психологии','Основы педагогики и психологии',1),(125,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы предпринимательской деятельности','Основы предпринимательской деятельности',1),(126,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы социальной медицины','Основы социальной медицины',1),(127,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы строительного производства','Основы строительного производства',1),(128,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы учебно-исследовательской деятельности','Основы учебно-исследовательской деятельности',1),(129,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы философии','Основы философии',1),(130,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы финансовой грамотности','Основы финансовой грамотности',1),(131,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы экономики архитектурного проектирования и строительства','Основы экономики архитектурного проектирования и строительства',1),(132,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы экономики, менеджмента и маркетинга','Основы экономики, менеджмента и маркетинга',1),(133,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы электротехники','Основы электротехники',1),(134,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Основы электротехники и электронной техники','Основы электротехники и электронной техники',1),(135,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Охрана труда','Охрана труда',1),(136,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Охрана труда в ЖКХ','Охрана труда в ЖКХ',1),(137,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Право','Право',1),(138,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Правовое обеспечение в профессиональной деятельности','Правовое обеспечение в профессиональной деятельности',1),(139,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Правовое обеспечение профессиональной деятельности в ЖКХ','Правовое обеспечение профессиональной деятельности в ЖКХ',1),(140,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Прикладная математика','Прикладная математика',1),(141,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Проектно-сметное дело','Проектно-сметное дело',1),(142,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Производственная практика ПМ.02','Производственная практика ПМ.02',1),(143,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Производственная практика ПМ.03','Производственная практика ПМ.03',1),(144,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Производственная практика ПМ.04','Производственная практика ПМ.04',1),(145,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Производственная практика ПМ.05','Производственная практика ПМ.05',1),(146,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Психология общения','Психология общения',1),(147,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Психология профессионального самоопределения','Психология профессионального самоопределения',1),(148,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Рисунок и живопись','Рисунок и живопись',1),(149,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Родная литература','Родная литература',1),(150,NULL,'2021-10-01 14:21:56','2021-10-01 14:21:56','Русский язык','Русский язык',1),(151,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Русский язык и культура речи','Русский язык и культура речи',1),(152,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Сварка и резка материалов','Сварка и резка материалов',1),(153,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Сервисная деятельность','Сервисная деятельность',1),(154,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Системы автоматизированного проектирования и обработки информации','Системы автоматизированного проектирования и обработки информации',1),(155,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Социальная работа с представителями религиозных организаций','Социальная работа с представителями религиозных организаций',1),(156,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Стандартизация, метрология и подтверждение соответствия','Стандартизация, метрология и подтверждение соответствия',1),(157,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Статистика','Статистика',1),(158,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Строительные материалы','Строительные материалы',1),(159,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Строительные машины','Строительные машины',1),(160,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Татарский язык','Татарский язык',1),(161,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Татарский язык в профессиональной деятельности','Татарский язык в профессиональной деятельности',1),(162,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Теория и методика социальной работы','Теория и методика социальной работы',1),(163,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Техническая механика','Техническая механика',1),(164,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Техническое черчение','Техническое черчение',1),(165,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Типология зданий','Типология зданий',1),(166,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.01','Учебная практика ПМ.01',1),(167,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.01 (геодезическая)','Учебная практика ПМ.01 (геодезическая)',1),(168,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.02','Учебная практика ПМ.02',1),(169,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.03','Учебная практика ПМ.03',1),(170,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.04','Учебная практика ПМ.04',1),(171,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.05','Учебная практика ПМ.05',1),(172,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Учебная практика ПМ.06','Учебная практика ПМ.06',1),(173,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Физика','Физика',1),(174,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Физическая культура','Физическая культура',1),(175,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Финансы, денежное обращение и кредит','Финансы, денежное обращение и кредит',1),(176,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экзамен по модулю ПМ.01','Экзамен по модулю ПМ.01',1),(177,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экзамен по модулю ПМ.02','Экзамен по модулю ПМ.02',1),(178,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экзамен по модулю ПМ.03','Экзамен по модулю ПМ.03',1),(179,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экзамен по модулю ПМ.04','Экзамен по модулю ПМ.04',1),(180,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экзамен по модулю ПМ.05','Экзамен по модулю ПМ.05',1),(181,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экологические основы архитектурного проектирования','Экологические основы архитектурного проектирования',1),(182,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экологические основы природопльзования','Экологические основы природопльзования',1),(183,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экономика','Экономика',1),(184,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экономика организации','Экономика организации',1),(185,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экономика организации ЖКХ','Экономика организации ЖКХ',1),(186,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экономика отрасли','Экономика отрасли',1),(187,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Экономическая эффективность работы санитарно-технических систем и оборудования','Экономическая эффективность работы санитарно-технических систем и оборудования',1),(188,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Электротехника','Электротехника',1),(189,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Электротехника и электроника','Электротехника и электроника',1),(190,NULL,'2021-10-01 14:21:57','2021-10-01 14:21:57','Этика профессиональной деятельности','Этика профессиональной деятельности',1),(191,'2021-10-01 14:22:25','2021-10-01 14:22:25',NULL,'Математика','Математика',1),(192,NULL,NULL,NULL,'Информа́тика (ИКТ):','Информа́тика (ИКТ):',1);
/*!40000 ALTER TABLE `predmet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prepod`
--

DROP TABLE IF EXISTS `prepod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prepod` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `fam` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otch` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sht` int(11) DEFAULT NULL,
  `kat` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `password` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prepod`
--

LOCK TABLES `prepod` WRITE;
/*!40000 ALTER TABLE `prepod` DISABLE KEYS */;
INSERT INTO `prepod` VALUES (1,'2021-09-26 14:42:42','2021-09-26 14:42:42',NULL,'Иванов','Иван','Иванович',1,12,1,NULL),(2,'2021-09-26 14:42:42','2021-09-26 14:42:42',NULL,'Иванов2','Иван','Иванович',1,12,2,NULL),(3,'2021-09-26 17:42:49','2021-09-26 17:42:49',NULL,'Сидоров','Сидор','Сидорович',0,12,1,NULL),(4,'2021-09-30 07:47:10','2021-10-12 14:10:58',NULL,'Балабанов','Анатолий','Сергеевич',1,NULL,1,'2642023812171054'),(92,NULL,NULL,NULL,'Абдеева','Альбина','Хайрилхаковна',NULL,NULL,1,NULL),(93,NULL,NULL,NULL,'Агафонова','Екатерина','Владимировна',NULL,NULL,1,NULL),(94,NULL,NULL,NULL,'Азизов','Алмаз','Расыхович',NULL,NULL,1,NULL),(95,NULL,NULL,NULL,'Азизова','Зухра','Файзрахмановна',NULL,NULL,1,NULL),(96,NULL,NULL,NULL,'Аймаганбетов','Ерлан','Абаевич',NULL,NULL,1,NULL),(97,NULL,NULL,NULL,'Алеева','Гульназ','Усмановна',NULL,NULL,1,NULL),(98,NULL,NULL,NULL,'Афанасьева','Елена','Сергеевна',NULL,NULL,1,NULL),(99,NULL,NULL,NULL,'Ахмадиев','Роберт','Явдатович',NULL,NULL,1,NULL),(100,NULL,NULL,NULL,'Бабур','Вадим','Леонидович',NULL,NULL,1,NULL),(101,NULL,NULL,NULL,'Балаганина','Яна','Александровна',NULL,NULL,1,NULL),(102,NULL,NULL,NULL,'Бикмухаметова','Илсияр','Харисовна',NULL,NULL,1,NULL),(103,NULL,NULL,NULL,'Бубеннова','Наталья','Владимировна',NULL,NULL,1,NULL),(104,NULL,NULL,NULL,'Бурхина','Евгения','Александровна',NULL,NULL,1,NULL),(105,NULL,NULL,NULL,'Вакансия','В','В',NULL,NULL,1,NULL),(106,NULL,NULL,NULL,'Валеев','Ильмир','Ирекович',NULL,NULL,1,NULL),(107,NULL,NULL,NULL,'Валишина','Тамара','Михайловна',NULL,NULL,1,NULL),(108,NULL,NULL,NULL,'Васильева','Венера','Павловна',NULL,NULL,1,NULL),(109,NULL,NULL,NULL,'Вертепа','Анастасия','Вячеславовна',NULL,NULL,1,NULL),(110,NULL,NULL,NULL,'Виноградова','','',NULL,NULL,1,NULL),(111,NULL,NULL,NULL,'Виноградова','Елена','Александровна',NULL,NULL,1,NULL),(112,NULL,NULL,NULL,'Гайфиева','Лиана','Назиповна',NULL,NULL,1,NULL),(113,NULL,NULL,NULL,'Галиев','Фанзиль','Маратович',NULL,NULL,1,NULL),(114,NULL,NULL,NULL,'Галиуллин','Булат','Ниязович',NULL,NULL,1,NULL),(115,NULL,NULL,NULL,'Гизатуллина','Динара','Ринатовна',NULL,NULL,1,NULL),(116,NULL,NULL,NULL,'Гогина','Ирина','Александровна',NULL,NULL,1,NULL),(117,NULL,NULL,NULL,'Добролюбова','Анастасия','Романовна',NULL,NULL,1,NULL),(118,NULL,NULL,NULL,'Долгова','Анастасия','Николаена',NULL,NULL,1,NULL),(119,NULL,NULL,NULL,'Жаринова','Ирина','Степановна',NULL,NULL,1,NULL),(120,NULL,NULL,NULL,'Жилкина','Эльвира','Евдокимовна',NULL,NULL,1,NULL),(121,NULL,NULL,NULL,'Зайцева','Анна','Ивановна',NULL,NULL,1,NULL),(122,NULL,NULL,NULL,'Закеева','Диляра','Мунагировна',NULL,NULL,1,NULL),(123,NULL,NULL,NULL,'Зиангирова','Флюра','Замиловна',NULL,NULL,1,NULL),(124,NULL,NULL,NULL,'Ибатуллина','Роза','Наилевна',NULL,NULL,1,NULL),(125,NULL,NULL,NULL,'Иванов','Владимир','Вениаминович',NULL,NULL,1,NULL),(126,NULL,NULL,NULL,'Исмагилова','Венера','Хамитовна',NULL,NULL,1,NULL),(127,NULL,NULL,NULL,'Каримов','Рафаэль','Рустемович',NULL,NULL,1,NULL),(128,NULL,NULL,NULL,'Кашаева','Лилия','Ревовна',NULL,NULL,1,NULL),(129,NULL,NULL,NULL,'Конаков','Анатолий','Сергеевич',NULL,NULL,1,NULL),(130,NULL,NULL,NULL,'Кононенко','Вакансия','',NULL,NULL,1,NULL),(131,NULL,NULL,NULL,'Кононенко','Ирина','Александровна',NULL,NULL,1,NULL),(132,NULL,NULL,NULL,'Корабцева','Надежда','Александровна',NULL,NULL,1,NULL),(133,NULL,NULL,NULL,'Кульмякова','Ольга','Ивановна',NULL,NULL,1,NULL),(134,NULL,NULL,NULL,'Лебедев','Вакансия','',NULL,NULL,1,NULL),(135,NULL,NULL,NULL,'Лебедев','Николай','Олегович',NULL,NULL,1,NULL),(136,NULL,NULL,NULL,'Матина','Анастасия','Игоревна',NULL,NULL,1,NULL),(137,NULL,NULL,NULL,'Мингазитдинова','Наиля','Юнусовна',NULL,NULL,1,NULL),(138,NULL,NULL,NULL,'Морева','Инна','Владиславовна',NULL,NULL,1,NULL),(139,NULL,NULL,NULL,'Музафаров','Раушан','Рафкатович',NULL,NULL,1,NULL),(140,NULL,NULL,NULL,'Мухутдинов','Рустем','Фаритович',NULL,NULL,1,NULL),(141,NULL,NULL,NULL,'Назмутдинова','Альбина','Раисовна',NULL,NULL,1,NULL),(142,NULL,NULL,NULL,'Нетфуллов','Марат','Шамилевич',NULL,NULL,1,NULL),(143,NULL,NULL,NULL,'Низамутдинова','Анжелла','Шавкатовна',NULL,NULL,1,NULL),(144,NULL,NULL,NULL,'Нуриева','Лилия','Фаиловна',NULL,NULL,1,NULL),(145,NULL,NULL,NULL,'Нурутдинов','Ленар','Ринатович',NULL,NULL,1,NULL),(146,NULL,NULL,NULL,'Осина','Валерия','Леонидовна',NULL,NULL,1,NULL),(147,NULL,NULL,NULL,'Паленов','Евгений','Викторович',NULL,NULL,1,NULL),(148,NULL,NULL,NULL,'Пивсаев','Виктор','Иванович',NULL,NULL,1,NULL),(149,NULL,NULL,NULL,'Попов','Альберт','Дмитриевич',NULL,NULL,1,NULL),(150,NULL,NULL,NULL,'Саламатина','Светлана','Александровна',NULL,NULL,1,NULL),(151,NULL,NULL,NULL,'Сатдарова','Венера','Мансуровна',NULL,NULL,1,NULL),(152,NULL,NULL,NULL,'Сафиуллина','Галина','Николаевна',NULL,NULL,1,NULL),(153,NULL,NULL,NULL,'Сиразиева','Нурия','Кутдусовна',NULL,NULL,1,NULL),(154,NULL,NULL,NULL,'Сироткина','Татьяна','Витальевна',NULL,NULL,1,NULL),(155,NULL,NULL,NULL,'Смирнова','Татьяна','Валерьевна',NULL,NULL,1,NULL),(156,NULL,NULL,NULL,'Сорокина','Елена','Ильинична',NULL,NULL,1,NULL),(157,NULL,NULL,NULL,'Татьянина','Елена','Владимировна',NULL,NULL,1,NULL),(158,NULL,NULL,NULL,'Файзуллин','Альберт','Хусаинович',NULL,NULL,1,NULL),(159,NULL,NULL,NULL,'Федотова','Любовь','Александровна',NULL,NULL,1,NULL),(160,NULL,NULL,NULL,'Хадиев','Алмаз','Загирович',NULL,NULL,1,NULL),(161,NULL,NULL,NULL,'Хадиев','У','П',NULL,NULL,1,NULL),(162,NULL,NULL,NULL,'Хузагарипов','Айдар','Габдулахатович',NULL,NULL,1,NULL),(163,NULL,NULL,NULL,'Чулкова','Ирина','Юрьевна',NULL,NULL,1,NULL),(164,NULL,NULL,NULL,'Шавалеев','Ильфир','Ильдарович',NULL,NULL,1,NULL),(165,NULL,NULL,NULL,'Шаихова','Эльвира','Рустамовна',NULL,NULL,1,NULL),(166,NULL,NULL,NULL,'Шарабрина','Татьяна','Александровна',NULL,NULL,1,NULL),(167,NULL,NULL,NULL,'Шарафутдинов','Артур','Искандерович',NULL,NULL,1,NULL),(168,NULL,NULL,NULL,'Шарибджанова','Гульнор','Турсинбаевна',NULL,NULL,1,NULL),(169,NULL,NULL,NULL,'Шацкая','Гулие','Серверовна',NULL,NULL,1,NULL),(170,NULL,NULL,NULL,'Шацкий','Тимур','Эдуардович',NULL,NULL,1,NULL),(171,NULL,NULL,NULL,'Шевченко','Наталья','Анатольевна',NULL,NULL,1,NULL),(172,NULL,NULL,NULL,'Шмагин','Юрий','Алексеевич',NULL,NULL,1,NULL),(173,NULL,NULL,NULL,'Якимова','Лилия','Николаевна',NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `prepod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2021-09-25 15:46:31','2021-09-25 15:46:31'),(2,'user','Normal User','2021-09-25 15:46:31','2021-09-25 15:46:31');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_unique` (`key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Site Title','','text',1,'Site',0),(2,'site.description','Site Description','Site Description','','text',2,'Site',0),(3,'site.logo','Site Logo','','','image',3,'Site',0),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site',0),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin',0),(6,'admin.title','Admin Title','Voyager','','text',1,'Admin',0),(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin',0),(8,'admin.loader','Admin Loader','','','image',3,'Admin',0),(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin',0),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin',0),(11,'admin.kzach','Коэффициент расчёта зачет','0.25',NULL,'text',6,'Admin',1),(12,'admin.kezam','Коэффициент расчёта экзамен','0.35',NULL,'text',7,'Admin',1),(13,'admin.kkp','Коэффициент расчёта курсовой проект','0.50',NULL,'text',8,'Admin',1),(20,'admin.kzach','Коэффициент расчёта зачет','',NULL,'text',6,'Admin',6),(21,'admin.kezam','Коэффициент расчёта экзамен','',NULL,'text',7,'Admin',6),(22,'admin.kkp','Коэффициент расчёта курсовой проект','',NULL,'text',8,'Admin',6);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec`
--

DROP TABLE IF EXISTS `spec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numspec` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec`
--

LOCK TABLES `spec` WRITE;
/*!40000 ALTER TABLE `spec` DISABLE KEYS */;
INSERT INTO `spec` VALUES (1,NULL,'2021-09-26 15:15:41','2021-09-26 15:15:41','Сестринское дело','31101',1),(2,NULL,'2021-09-29 16:00:01','2021-09-29 16:00:01','Лечебное дело','31250',1);
/*!40000 ALTER TABLE `spec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprikaz`
--

DROP TABLE IF EXISTS `sprikaz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sprikaz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `prikaz_id` int(11) DEFAULT NULL,
  `data_pr` date DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `obr` int(11) DEFAULT NULL,
  `name` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprikaz`
--

LOCK TABLES `sprikaz` WRITE;
/*!40000 ALTER TABLE `sprikaz` DISABLE KEYS */;
INSERT INTO `sprikaz` VALUES (4,'2021-10-16 14:40:47','2021-10-16 14:40:47',2,1,'2021-10-02','21121',1,'№123'),(5,'2021-10-16 14:18:15','2021-10-16 14:18:15',2,2,'2021-10-09','1000000000000',1,'№123'),(7,'2021-10-16 14:18:15','2021-10-16 14:18:15',4,2,'2021-10-09','1000000000000',1,'№123'),(8,'2021-10-16 17:32:21','2021-10-16 17:32:21',2,2,NULL,NULL,1,NULL),(9,'2021-10-16 17:37:34','2021-10-16 17:37:34',2,2,'2021-10-01',NULL,1,NULL);
/*!40000 ALTER TABLE `sprikaz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studball`
--

DROP TABLE IF EXISTS `studball`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studball` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `predmet_id` int(11) DEFAULT NULL,
  `ball` int(11) DEFAULT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `sem` int(11) DEFAULT NULL,
  `prepod` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studball`
--

LOCK TABLES `studball` WRITE;
/*!40000 ALTER TABLE `studball` DISABLE KEYS */;
INSERT INTO `studball` VALUES (37,'2021-10-14 15:20:30','2021-10-14 15:20:30',192,NULL,2,1,4,4),(43,'2021-10-14 15:27:58','2021-10-15 15:50:34',191,4,2,1,4,92),(44,'2021-10-14 15:38:56','2021-10-14 15:47:07',192,5,2,1,3,4),(47,'2021-10-15 15:23:54','2021-10-15 15:23:54',192,NULL,4,1,4,4),(48,'2021-10-15 15:23:54','2021-10-15 15:23:54',191,NULL,4,1,4,92);
/*!40000 ALTER TABLE `studball` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fam` char(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` char(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otch` char(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_r` date DEFAULT NULL,
  `passw` char(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `grupp` int(11) DEFAULT NULL,
  `pol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,NULL,'2021-10-05 14:00:49','2021-10-05 14:00:49','Иванов','портфолио','Иванович','2021-10-08',NULL,1,2,NULL),(2,NULL,'2021-10-05 14:07:00','2021-10-16 17:11:02','Балабанов','Анатолий','Сергеевич','2021-10-09','7834182955172259',1,1,0),(3,'2021-10-17 16:58:13','2021-10-05 14:08:58','2021-10-17 16:58:13','Сидоров','Полный','Иванович','2021-10-06',NULL,1,3,NULL),(4,NULL,'2021-10-05 15:19:46','2021-10-16 17:18:10','Сидоров','портфолио','Иванович',NULL,NULL,1,2,NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_sved`
--

DROP TABLE IF EXISTS `student_sved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_sved` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_sv` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `value` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_sved`
--

LOCK TABLES `student_sved` WRITE;
/*!40000 ALTER TABLE `student_sved` DISABLE KEYS */;
INSERT INTO `student_sved` VALUES (45,'2021-10-07 16:01:42','2021-10-08 17:02:41',4,1,'8BxTdTq25RpnzaIEaNl6kw==',2,'sCLs1+XLAFV9qhI8vHTcLyywQoi4c66Bukx71BEUMLzbVVLT94CmbUIkxmDtGWN/'),(47,'2021-10-09 13:00:03','2021-10-09 13:00:03',2,1,'6NNZ6bOLN//7VjDa6jQadA==',2,'O5s3QNW4eVluOPPHo3njKQ=='),(51,'2021-10-09 13:18:07','2021-10-09 13:18:07',1,1,'nJbRYwyIuR9pyQfRKs4Rqg==',2,'smVrIQBCO9hIUVLNOBcD+w==');
/*!40000 ALTER TABLE `student_sved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_ekz`
--

DROP TABLE IF EXISTS `tip_ekz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_ekz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `obr` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_ekz`
--

LOCK TABLES `tip_ekz` WRITE;
/*!40000 ALTER TABLE `tip_ekz` DISABLE KEYS */;
INSERT INTO `tip_ekz` VALUES (1,1,'2021-11-17 14:06:19','2021-11-17 14:06:19',NULL,'Экзамен'),(2,1,'2021-11-17 14:08:20','2021-11-17 14:08:20',NULL,'Квалификационный');
/*!40000 ALTER TABLE `tip_ekz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_pred`
--

DROP TABLE IF EXISTS `tip_pred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_pred` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nazv` char(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schitat` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_pred`
--

LOCK TABLES `tip_pred` WRITE;
/*!40000 ALTER TABLE `tip_pred` DISABLE KEYS */;
INSERT INTO `tip_pred` VALUES (1,NULL,NULL,NULL,'Предмет',NULL,2),(2,NULL,NULL,NULL,'Дипломный проект',NULL,2),(3,NULL,NULL,NULL,'Консультации',NULL,2),(4,NULL,NULL,NULL,'Учебная практика',NULL,2),(5,NULL,NULL,NULL,'Производственная практика',NULL,2),(6,NULL,NULL,NULL,'Предмет',NULL,1),(7,NULL,NULL,NULL,'Дипломный проект',NULL,1),(8,NULL,NULL,NULL,'Консультации',NULL,1),(9,NULL,NULL,NULL,'Учебная практика',NULL,1),(10,NULL,NULL,NULL,'Производственная практика',NULL,1),(11,NULL,NULL,NULL,'Предмет',NULL,3),(12,NULL,NULL,NULL,'Дипломный проект',NULL,3),(13,NULL,NULL,NULL,'Консультации',NULL,3),(14,NULL,NULL,NULL,'Учебная практика',NULL,3),(15,NULL,NULL,NULL,'Производственная практика',NULL,3),(16,NULL,NULL,NULL,'Предмет',NULL,4),(17,NULL,NULL,NULL,'Дипломный проект',NULL,4),(18,NULL,NULL,NULL,'Консультации',NULL,4),(19,NULL,NULL,NULL,'Учебная практика',NULL,4),(20,NULL,NULL,NULL,'Производственная практика',NULL,4),(21,NULL,NULL,NULL,'Предмет',NULL,5),(22,NULL,NULL,NULL,'Дипломный проект',NULL,5),(23,NULL,NULL,NULL,'Консультации',NULL,5),(24,NULL,NULL,NULL,'Учебная практика',NULL,5),(25,NULL,NULL,NULL,'Производственная практика',NULL,5),(26,NULL,NULL,NULL,'Предмет',NULL,6),(27,NULL,NULL,NULL,'Дипломный проект',NULL,6),(28,NULL,NULL,NULL,'Консультации',NULL,6),(29,NULL,NULL,NULL,'Учебная практика',NULL,6),(30,NULL,NULL,NULL,'Производственная практика',NULL,6);
/*!40000 ALTER TABLE `tip_pred` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typ_ball`
--

DROP TABLE IF EXISTS `typ_ball`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typ_ball` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typ_ball`
--

LOCK TABLES `typ_ball` WRITE;
/*!40000 ALTER TABLE `typ_ball` DISABLE KEYS */;
INSERT INTO `typ_ball` VALUES (1,NULL,'2021-10-09 15:28:35','2021-10-09 15:28:35',2,'Неудовлетворительно',1),(2,NULL,'2021-10-09 15:28:54','2021-10-09 15:28:54',3,'Удовлетворительно',1),(3,NULL,'2021-10-09 15:29:53','2021-10-09 15:29:53',4,'Хорошо',1),(4,NULL,'2021-10-09 15:30:05','2021-10-09 15:30:05',5,'Отлично',1),(5,NULL,'2021-10-09 15:30:15','2021-10-09 15:30:15',6,'Зачет',1);
/*!40000 ALTER TABLE `typ_ball` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typ_dann`
--

DROP TABLE IF EXISTS `typ_dann`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typ_dann` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant` int(11) DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `kategor` int(11) DEFAULT NULL,
  `shifr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typ_dann`
--

LOCK TABLES `typ_dann` WRITE;
/*!40000 ALTER TABLE `typ_dann` DISABLE KEYS */;
INSERT INTO `typ_dann` VALUES (1,NULL,'2021-10-05 14:52:50','2021-10-05 14:52:50','дата поступления',1,1,2,NULL),(2,NULL,'2021-10-05 14:53:28','2021-10-05 14:53:28','Телефон',0,1,2,NULL),(3,NULL,'2021-10-06 15:04:04','2021-10-06 15:04:04','Паспорт',0,1,2,1),(4,NULL,'2021-10-07 15:53:14','2021-10-07 15:53:14','Фамилия бабушки',0,1,1,0);
/*!40000 ALTER TABLE `typ_dann` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typpricaza`
--

DROP TABLE IF EXISTS `typpricaza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typpricaza` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typpricaza`
--

LOCK TABLES `typpricaza` WRITE;
/*!40000 ALTER TABLE `typpricaza` DISABLE KEYS */;
INSERT INTO `typpricaza` VALUES (1,NULL,'2021-10-15 15:32:45','2021-10-15 15:32:45','Приказ о зачислении',1),(2,NULL,'2021-10-16 14:11:40','2021-10-16 14:11:40','приказ о переводе на следующий курс',1);
/*!40000 ALTER TABLE `typpricaza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,NULL,'prepod','','users/default.png',NULL,'',NULL,NULL,NULL,'2021-10-30 15:47:23',NULL),(1,1,'1','asb@mail.com','users/default.png',NULL,'$2y$10$dU0QF1Q04lTKiC4bGhOW/eBKebeoZZJcL3609AR0dgS9fddXLRrwG',NULL,NULL,'2021-09-25 15:47:17','2021-09-26 14:28:30',1),(2,2,'Балабанов Анатолий Сергеевич','asbcorp24@gmail.com','users/default.png',NULL,'$2y$10$M9KCuyiQ/y15sq2zFX/JYuR3nYb..uZBj34BDLtlDpP3NV2aiBVhS',NULL,NULL,'2021-09-30 14:46:03','2021-09-30 14:46:03',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vedomheader`
--

DROP TABLE IF EXISTS `vedomheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vedomheader` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `obr` int(11) DEFAULT NULL,
  `nagr_id` int(11) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `t_att` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vedomheader`
--

LOCK TABLES `vedomheader` WRITE;
/*!40000 ALTER TABLE `vedomheader` DISABLE KEYS */;
INSERT INTO `vedomheader` VALUES (1,'2021-11-18 15:00:58','2021-11-18 15:00:58',1,25,'2021-11-12',1),(2,'2021-11-18 15:50:04','2021-11-18 15:50:04',1,26,'2021-11-12',1);
/*!40000 ALTER TABLE `vedomheader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'uchast'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-25 20:50:27
