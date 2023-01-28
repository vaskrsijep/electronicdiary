CREATE DATABASE  IF NOT EXISTS `e_diary` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_diary`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: e_diary
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `grade_for`
--

DROP TABLE IF EXISTS `grade_for`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_for` (
  `id_grade_for` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_grade_for`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_for`
--

LOCK TABLES `grade_for` WRITE;
/*!40000 ALTER TABLE `grade_for` DISABLE KEYS */;
INSERT INTO `grade_for` VALUES (1,'Trimester1'),(2,'Trimester2'),(3,'Trimester3'),(4,'Trimester4'),(5,'Semester'),(6,'Final');
/*!40000 ALTER TABLE `grade_for` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id_meetings` int(11) NOT NULL AUTO_INCREMENT,
  `meetings` datetime NOT NULL,
  `meetings_status` tinyint(1) DEFAULT '0',
  `meeting_view` int(11) NOT NULL,
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_meetings`),
  KEY `fk_meeting_shedules_users1_idx` (`from_id_user`),
  CONSTRAINT `fk_meeting_shedules_users1` FOREIGN KEY (`from_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'2019-07-19 19:10:00',1,0,15,8),(2,'2019-07-24 19:02:00',1,0,15,8);
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id_messages` int(11) NOT NULL AUTO_INCREMENT,
  `message_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_content` text,
  `message_status` tinyint(1) DEFAULT NULL,
  `from_id_user` int(11) NOT NULL,
  `to_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `fk_messages_users1_idx` (`from_id_user`),
  KEY `fk_messages_users2_idx` (`to_id_user`),
  CONSTRAINT `fk_messages_users1` FOREIGN KEY (`from_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_users2` FOREIGN KEY (`to_id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'2019-07-18 16:15:42','fdgdfgfg',0,15,8),(2,'2019-07-18 16:15:59','fdgfg',0,15,8),(3,'2019-07-18 16:16:16','hgjghjhj',0,15,8),(4,'2019-07-18 16:16:18','hgjhgjgh',0,15,8),(5,'2019-07-18 16:16:29','hgjhgjhgjhgj',0,15,8),(6,'2019-07-18 16:16:31','ghjhgjgh',0,15,8),(7,'2019-07-18 16:16:32','hgjghj',0,15,8),(8,'2019-07-18 19:42:50','csacasacds',0,8,15),(9,'2019-07-18 19:42:56','cascaa',0,8,15),(10,'2019-07-19 13:20:21','retretertretertre',0,15,8),(11,'2019-07-19 13:21:02','yuguyguyf',0,8,15),(12,'2019-07-19 13:21:08','jbjihbiuh',0,15,8),(13,'2019-07-19 13:21:20','hyhndhhhy',0,8,15),(14,'2019-07-19 13:22:05','fhdhdfh',0,15,8);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent_notifications`
--

DROP TABLE IF EXISTS `parent_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent_notifications` (
  `id_parent_notification` int(11) NOT NULL AUTO_INCREMENT,
  `notification_content` text,
  PRIMARY KEY (`id_parent_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent_notifications`
--

LOCK TABLES `parent_notifications` WRITE;
/*!40000 ALTER TABLE `parent_notifications` DISABLE KEYS */;
INSERT INTO `parent_notifications` VALUES (1,'Test notification');
/*!40000 ALTER TABLE `parent_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id_schedules` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id_schedules`)
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'Srpski jezik i knjizevnost',1,1,1),(2,'Matematika',2,1,1),(3,'Biologija',3,1,1),(4,'Biologija',4,1,1),(5,'',5,1,1),(6,'',6,1,1),(7,'',7,1,1),(8,'Istorija',1,2,1),(9,'Matematika',2,2,1),(10,'Srpski jezik i knjizevnost',3,2,1),(11,'Fizicko vaspitanje',4,2,1),(12,'Engleski jezik',5,2,1),(13,'',6,2,1),(14,'',7,2,1),(15,'Srpski jezik i knjizevnost',1,3,1),(16,'Informatika',2,3,1),(17,'Hemija',3,3,1),(18,'Geografija',4,3,1),(19,'Veronauka',5,3,1),(20,'Likovno',6,3,1),(21,'',7,3,1),(22,'Engleski jezik',1,4,1),(23,'Srpski jezik i knjizevnost',2,4,1),(24,'Fizicko vaspitanje',3,4,1),(25,'Engleski jezik',4,4,1),(26,'Informatika',5,4,1),(27,'Matematika',6,4,1),(28,'Srpski jezik i knjizevnost',7,4,1),(29,'Likovno',2,5,1),(30,'Veronauka',1,5,1),(31,'Istorija',3,5,1),(32,'Engleski jezik',4,5,1),(33,'Hemija',5,5,1),(34,'Istorija',6,5,1),(35,'',7,5,1),(456,'Srpski jezik i knjizevnost',1,1,2),(457,'Matematika',2,1,2),(458,'Likovno',3,1,2),(459,'Geografija',4,1,2),(460,'Engleski jezik',5,1,2),(461,'',6,1,2),(462,'',7,1,2),(463,'Srpski jezik i knjizevnost',1,2,2),(464,'Istorija',2,2,2),(465,'Hemija',3,2,2),(466,'Srpski jezik i knjizevnost',4,2,2),(467,'Hemija',5,2,2),(468,'Veronauka',6,2,2),(469,'',7,2,2),(470,'Likovno',1,3,2),(471,'Fizicko vaspitanje',2,3,2),(472,'Engleski jezik',3,3,2),(473,'Hemija',4,3,2),(474,'',5,3,2),(475,'',6,3,2),(476,'',7,3,2),(477,'Istorija',1,4,2),(478,'Biologija',2,4,2),(479,'Informatika',3,4,2),(480,'Veronauka',4,4,2),(481,'Geografija',5,4,2),(482,'',6,4,2),(483,'',7,4,2),(484,'Srpski jezik i knjizevnost',2,5,2),(485,'Fizicko vaspitanje',1,5,2),(486,'Geografija',3,5,2),(487,'Istorija',4,5,2),(488,'Informatika',5,5,2),(489,'Hemija',6,5,2),(490,'Veronauka',7,5,2),(491,'Matematika',1,1,3),(492,'Biologija',2,1,3),(493,'Engleski jezik',3,1,3),(494,'Hemija',4,1,3),(495,'Biologija',5,1,3),(496,'Engleski jezik',6,1,3),(497,'Veronauka',7,1,3),(498,'Likovno',1,2,3),(499,'Srpski jezik i knjizevnost',2,2,3),(500,'Engleski jezik',3,2,3),(501,'Likovno',4,2,3),(502,'Hemija',5,2,3),(503,'',6,2,3),(504,'',7,2,3),(505,'Srpski jezik i knjizevnost',1,3,3),(506,'Engleski jezik',2,3,3),(507,'Fizicko vaspitanje',3,3,3),(508,'Hemija',4,3,3),(509,'Engleski jezik',5,3,3),(510,'',6,3,3),(511,'',7,3,3),(512,'Srpski jezik i knjizevnost',1,4,3),(513,'Istorija',2,4,3),(514,'Fizicko vaspitanje',3,4,3),(515,'Fizicko vaspitanje',4,4,3),(516,'',5,4,3),(517,'',6,4,3),(518,'',7,4,3),(519,'Istorija',2,5,3),(520,'Srpski jezik i knjizevnost',1,5,3),(521,'Engleski jezik',3,5,3),(522,'Informatika',4,5,3),(523,'Veronauka',5,5,3),(524,'',6,5,3),(525,'',7,5,3);
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules_users`
--

DROP TABLE IF EXISTS `schedules_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules_users` (
  `id_user` int(11) NOT NULL,
  `id_schedules` int(11) NOT NULL,
  KEY `fk_schedules_has_users_users1_idx` (`id_user`),
  KEY `fk_schedules_has_users_schedules1_idx` (`id_schedules`),
  CONSTRAINT `fk_schedules_has_users_schedules1` FOREIGN KEY (`id_schedules`) REFERENCES `schedules` (`id_schedules`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_schedules_has_users_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules_users`
--

LOCK TABLES `schedules_users` WRITE;
/*!40000 ALTER TABLE `schedules_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_classes`
--

DROP TABLE IF EXISTS `school_classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_classes` (
  `id_school_class` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id_school_class`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_classes`
--

LOCK TABLES `school_classes` WRITE;
/*!40000 ALTER TABLE `school_classes` DISABLE KEYS */;
INSERT INTO `school_classes` VALUES (1,'1-1'),(2,'1-2'),(3,'1-3'),(4,'1-4'),(5,'1-5'),(6,'1-6'),(7,'2-1'),(8,'2-2'),(9,'2-3'),(10,'2-4'),(11,'2-5'),(12,'2-6'),(13,'3-1'),(14,'3-2'),(15,'3-3'),(16,'3-4'),(17,'3-5'),(18,'3-6'),(19,'4-1'),(20,'4-2'),(21,'4-3'),(22,'4-4'),(23,'4-5'),(25,'4-6'),(26,'4-7');
/*!40000 ALTER TABLE `school_classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_school_class` int(11) NOT NULL,
  PRIMARY KEY (`id_student`),
  KEY `fk_students_school_classes1_idx` (`id_school_class`),
  CONSTRAINT `fk_students_school_classes1` FOREIGN KEY (`id_school_class`) REFERENCES `school_classes` (`id_school_class`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (6,'student2','student2',2),(26,'student3','student3',3),(27,'student1','student1',1),(28,'student4','student4',17),(29,'student2','student2',2),(30,'student3','student3',3);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_subjects`
--

DROP TABLE IF EXISTS `students_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students_subjects` (
  `id_student_subject` int(11) NOT NULL AUTO_INCREMENT,
  `grades` int(11) NOT NULL,
  `grade_status` tinyint(1) NOT NULL,
  `school_class_id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `grade_for_id` int(11) NOT NULL,
  PRIMARY KEY (`id_student_subject`),
  KEY `fk_students_subjects_students1_idx` (`id_student`),
  KEY `fk_students_subjects_subjects1_idx` (`id_subject`),
  CONSTRAINT `fk_students_subjects_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_subjects`
--

LOCK TABLES `students_subjects` WRITE;
/*!40000 ALTER TABLE `students_subjects` DISABLE KEYS */;
INSERT INTO `students_subjects` VALUES (9,5,0,1,27,1,0),(10,5,0,1,27,4,0),(11,4,0,1,27,6,0),(12,5,1,1,27,8,0),(13,5,1,1,27,2,0),(14,3,0,1,27,5,1),(15,3,0,1,27,5,1),(16,4,0,1,27,6,5),(17,4,0,1,27,6,5),(18,4,0,1,27,6,5);
/*!40000 ALTER TABLE `students_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_subject`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Srpski jezik i knjizevnost'),(2,'Matematika'),(3,'Likovno'),(4,'Biologija'),(5,'Fizicko vaspitanje'),(6,'Geografija'),(7,'Istorija'),(8,'Engleski jezik'),(9,'Informatika'),(10,'Hemija'),(11,'Veronauka');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` datetime DEFAULT NULL,
  `ip_user` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
INSERT INTO `user_log` VALUES (1,'2019-07-18 16:13:33','2019-07-18 17:50:44','::1',15),(2,'2019-07-18 17:51:09','2019-07-18 18:09:42','::1',2),(3,'2019-07-18 18:09:51','2019-07-18 18:09:51','::1',15),(4,'2019-07-18 18:13:53','2019-07-18 18:13:53','::1',15),(5,'2019-07-18 18:15:30','2019-07-18 18:15:33','::1',8),(6,'2019-07-18 18:16:36','2019-07-18 18:16:36','::1',2),(7,'2019-07-18 18:19:12','2019-07-18 18:27:06','::1',40),(8,'2019-07-18 18:27:15','2019-07-18 18:27:15','::1',15),(9,'2019-07-18 19:42:16','2019-07-18 19:44:28','::1',8),(10,'2019-07-18 19:44:48','2019-07-19 08:49:37','::1',15),(11,'2019-07-19 08:49:45','2019-07-19 08:49:45','::1',15),(12,'2019-07-19 09:18:02','2019-07-19 09:20:31','::1',2),(13,'2019-07-19 09:20:46','2019-07-19 09:20:58','::1',6),(14,'2019-07-19 09:21:17','2019-07-19 09:24:39','::1',8),(15,'2019-07-19 09:24:46','2019-07-19 09:24:46','::1',8),(16,'2019-07-19 09:25:41','2019-07-19 09:25:41','127.0.0.1',15),(17,'2019-07-19 12:59:59','2019-07-26 17:28:28','::1',2),(18,'2019-07-19 13:13:56','2019-07-19 13:14:52','::1',6),(19,'2019-07-19 13:15:00','2019-07-19 13:19:19','::1',2),(20,'2019-07-19 13:19:31','2019-07-19 13:28:55','::1',15),(21,'2019-07-19 13:20:45','2019-07-19 13:20:45','::1',8),(22,'2019-07-19 13:30:54','2019-07-19 13:31:18','::1',15),(23,'2019-07-19 13:31:25','2019-07-19 13:31:25','::1',2),(24,'2019-07-22 09:04:26','2019-07-22 09:04:26','::1',2),(25,'2019-07-23 09:10:12','2019-07-23 09:10:18','::1',2),(26,'2019-07-23 09:10:24','2019-07-23 09:10:41','::1',6),(27,'2019-07-23 09:11:08','2019-07-23 09:12:28','::1',15),(28,'2019-07-23 09:12:36','2019-07-23 10:48:59','::1',8),(29,'2019-07-23 10:49:07','2019-07-23 11:17:27','::1',6),(30,'2019-07-23 11:17:44','2019-07-23 11:17:44','::1',8),(31,'2019-07-26 17:28:52','2019-07-26 17:28:59','::1',8),(32,'2019-07-26 17:29:05','2019-07-26 17:29:23','::1',2),(33,'2019-07-26 17:30:19','2019-07-26 17:30:19','::1',2),(34,'2019-07-27 14:04:52','2019-07-27 14:04:52','::1',2),(35,'2019-07-28 11:02:42','2019-07-28 11:02:58','::1',2),(36,'2019-07-28 11:04:20','2019-07-28 11:04:20','::1',2),(37,'2019-07-29 14:30:49','2019-07-29 16:57:39','::1',2),(38,'2019-07-29 16:57:48','2019-07-30 16:52:18','::1',2),(39,'2019-07-29 17:00:06','2019-07-29 17:01:12','::1',8),(40,'2019-07-29 17:08:05','2019-07-29 17:09:06','::1',15),(41,'2019-07-30 15:12:33','2019-07-30 15:41:38','::1',8),(42,'2019-07-30 15:58:50','2019-07-30 16:15:53','::1',15),(43,'2019-07-30 16:52:24','2019-07-30 16:54:58','::1',2),(44,'2019-07-30 16:55:04','2019-07-30 16:57:03','::1',2),(45,'2019-07-31 15:59:55','2019-07-31 16:18:49','::1',2),(46,'2019-07-31 16:18:54','2019-07-31 16:23:48','::1',2),(47,'2019-07-31 16:23:53',NULL,'::1',2),(48,'2019-07-31 16:37:56','2019-07-31 16:38:59','::1',8),(49,'2019-07-31 17:09:35','2019-07-31 17:21:38','::1',8),(50,'2019-07-31 17:55:17',NULL,'::1',15);
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'Administrator','Administrator can delete update edit users,user roles,schedules,notifications'),(2,'Director','have access to statistics on the efficiency of the classroomto have access to statistics on the efficiency of subjects at the school level'),(3,'Teacher','can have 1 class and access to only that class,access their department and write, delete, and conclude grades,can accept and reject the request for parents to come to the open door,message section , schedule'),(4,'Parent','has access to and grades only for his child,has access to the part of the application where he will schedule the arrival at the open door,messages, notification access');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user_role` int(11) NOT NULL DEFAULT '4',
  `teacher_class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_user_roles_idx` (`id_user_role`),
  CONSTRAINT `fk_users_user_roles` FOREIGN KEY (`id_user_role`) REFERENCES `user_roles` (`id_user_role`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'administrator','$2y$10$2hg/V3YhIgKl2XNe0fNij.0DrBdXzns5AaeWu.j6h5QnXLjZNvEsW','administrator@gmail.com',1,0),(6,'director','$2y$10$YG.Ity62kSWi1j9xz0EdKeR96pITfKLX5Go7wocI/oCrg794HqZVm','director@gmail.com',2,0),(8,'teacher','$2y$10$91fxW1z3ChSXmhFh2Qy2U.7/ipBBotLWeSS2fspc27I2CbPfjldha','teacher@gmail.com',3,1),(15,'parent','$2y$10$3VngNhp8CWN2rL3nOXK6Au8jtqqTAGGg9g3/Nm7jXCpDr216.fCYe','parent@gmail.com',4,0),(34,'teacher1','$2y$10$e4dRFqGtFyjXaRARefmHP.PujuGjm3o63pZmEp4b7uORKewBPuvda','teacher1@gmail.com',3,2),(40,'parent2','$2y$10$HsATeFX5yQzoTr26sFP./OuT5S4jHowTbVithPPBLeKlV3/Z0dNrC','parent2@gmail.com',4,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_students`
--

DROP TABLE IF EXISTS `users_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_students` (
  `id_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  KEY `fk_users_students_users1_idx` (`id_user`),
  KEY `fk_users_students_students1_idx` (`id_student`),
  CONSTRAINT `fk_users_students_students1` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_students_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_students`
--

LOCK TABLES `users_students` WRITE;
/*!40000 ALTER TABLE `users_students` DISABLE KEYS */;
INSERT INTO `users_students` VALUES (15,27),(40,29),(40,30);
/*!40000 ALTER TABLE `users_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_subjects`
--

DROP TABLE IF EXISTS `users_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_subjects` (
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  KEY `fk_users_subjects_users1_idx` (`id_user`),
  KEY `fk_users_subjects_subjects1_idx` (`id_subject`),
  CONSTRAINT `fk_users_subjects_subjects1` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_subjects_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_subjects`
--

LOCK TABLES `users_subjects` WRITE;
/*!40000 ALTER TABLE `users_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'e_diary'
--

--
-- Dumping routines for database 'e_diary'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-31 18:03:10
