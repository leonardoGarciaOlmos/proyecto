CREATE DATABASE  IF NOT EXISTS `sistemas` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `sistemas`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sistemas
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `bloque_hora`
--

DROP TABLE IF EXISTS `bloque_hora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloque_hora` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO') NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloque_hora`
--

LOCK TABLES `bloque_hora` WRITE;
/*!40000 ALTER TABLE `bloque_hora` DISABLE KEYS */;
INSERT INTO `bloque_hora` VALUES (1,'LUNES','08:00:00','08:50:00'),(2,'LUNES','08:50:00','09:40:00'),(3,'LUNES','09:40:00','10:30:00'),(4,'LUNES','10:30:00','11:20:00'),(5,'LUNES','11:20:00','12:10:00'),(6,'LUNES','12:10:00','12:50:00'),(7,'LUNES','14:00:00','14:50:00'),(8,'LUNES','14:50:00','15:40:00'),(9,'LUNES','15:40:00','16:30:00'),(10,'LUNES','16:30:00','17:20:00'),(11,'MARTES','08:00:00','08:50:00'),(12,'MARTES','08:50:00','09:40:00'),(13,'MARTES','09:40:00','10:30:00'),(14,'MARTES','10:30:00','11:20:00'),(15,'MARTES','11:20:00','12:10:00'),(16,'MARTES','12:10:00','12:50:00'),(17,'MARTES','14:00:00','14:50:00'),(18,'MARTES','14:50:00','15:40:00'),(19,'MARTES','15:40:00','16:30:00'),(20,'MARTES','16:30:00','17:20:00'),(21,'MIERCOLES','08:00:00','08:50:00'),(22,'MIERCOLES','08:50:00','09:40:00'),(23,'MIERCOLES','09:40:00','10:30:00'),(24,'MIERCOLES','10:30:00','11:20:00'),(25,'MIERCOLES','11:20:00','12:10:00'),(26,'MIERCOLES','12:10:00','12:50:00'),(27,'MIERCOLES','14:00:00','14:50:00'),(28,'MIERCOLES','14:50:00','15:40:00'),(29,'MIERCOLES','15:40:00','16:30:00'),(30,'MIERCOLES','16:30:00','17:20:00'),(31,'JUEVES','08:00:00','08:50:00'),(32,'JUEVES','08:50:00','09:40:00'),(33,'JUEVES','09:40:00','10:30:00'),(34,'JUEVES','10:30:00','11:20:00'),(35,'JUEVES','11:20:00','12:10:00'),(36,'JUEVES','12:10:00','12:50:00'),(37,'JUEVES','14:00:00','14:50:00'),(38,'JUEVES','14:50:00','15:40:00'),(39,'JUEVES','15:40:00','16:30:00'),(40,'JUEVES','16:30:00','17:20:00'),(41,'VIERNES','08:00:00','08:50:00'),(42,'VIERNES','08:50:00','09:40:00'),(43,'VIERNES','09:40:00','10:30:00'),(44,'VIERNES','10:30:00','11:20:00'),(45,'VIERNES','11:20:00','12:10:00'),(46,'VIERNES','12:10:00','12:50:00'),(47,'VIERNES','14:00:00','14:50:00'),(48,'VIERNES','14:50:00','15:40:00'),(49,'VIERNES','15:40:00','16:30:00'),(50,'VIERNES','16:30:00','17:20:00');
/*!40000 ALTER TABLE `bloque_hora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_has_horario`
--

DROP TABLE IF EXISTS `usuario_has_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_has_horario` (
  `usuario_ci` varchar(10) NOT NULL,
  `horario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuario_ci`,`horario_id`),
  KEY `fk_usuario_has_control_control1_idx` (`horario_id`),
  KEY `fk_usuario_has_control_usuario1_idx` (`usuario_ci`),
  CONSTRAINT `fk_usuario_has_control_control1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_control_usuario1` FOREIGN KEY (`usuario_ci`) REFERENCES `usuario` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_has_horario`
--

LOCK TABLES `usuario_has_horario` WRITE;
/*!40000 ALTER TABLE `usuario_has_horario` DISABLE KEYS */;
INSERT INTO `usuario_has_horario` VALUES ('20748439',12),('20748439',13),('6150665',14);
/*!40000 ALTER TABLE `usuario_has_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bloque_hora_has_horario`
--

DROP TABLE IF EXISTS `bloque_hora_has_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bloque_hora_has_horario` (
  `bloque_hora_id` int(10) unsigned NOT NULL,
  `horario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`bloque_hora_id`,`horario_id`),
  KEY `fk_bloque_hora_has_horario_horario1_idx` (`horario_id`),
  KEY `fk_bloque_hora_has_horario_bloque_hora1_idx` (`bloque_hora_id`),
  CONSTRAINT `fk_bloque_hora_has_horario_bloque_hora1` FOREIGN KEY (`bloque_hora_id`) REFERENCES `bloque_hora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_bloque_hora_has_horario_horario1` FOREIGN KEY (`horario_id`) REFERENCES `horario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloque_hora_has_horario`
--

LOCK TABLES `bloque_hora_has_horario` WRITE;
/*!40000 ALTER TABLE `bloque_hora_has_horario` DISABLE KEYS */;
INSERT INTO `bloque_hora_has_horario` VALUES (1,12),(2,12),(3,12),(31,13),(32,13),(33,13),(14,14),(15,14),(16,14);
/*!40000 ALTER TABLE `bloque_hora_has_horario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `operation` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `client_ip` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit`
--

LOCK TABLES `audit` WRITE;
/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
INSERT INTO `audit` VALUES (1,20748439,'2013-11-03 17:06:03','','::1'),(2,20748439,'2013-11-03 17:06:51','','::1'),(3,20748439,'2013-11-03 17:08:29','cool','::1');
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario`
--

DROP TABLE IF EXISTS `horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `materia_has_pensum_materia_codigo` varchar(10) NOT NULL,
  `materia_has_pensum_pensum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`materia_has_pensum_materia_codigo`,`materia_has_pensum_pensum_id`),
  KEY `fk_horario_materia_has_pensum1_idx` (`materia_has_pensum_materia_codigo`,`materia_has_pensum_pensum_id`),
  CONSTRAINT `fk_horario_materia_has_pensum1` FOREIGN KEY (`materia_has_pensum_materia_codigo`, `materia_has_pensum_pensum_id`) REFERENCES `materia_has_pensum` (`materia_codigo`, `pensum_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario`
--

LOCK TABLES `horario` WRITE;
/*!40000 ALTER TABLE `horario` DISABLE KEYS */;
INSERT INTO `horario` VALUES (12,'ANS0122',1),(14,'LEC0143',1),(13,'TDC0103',1);
/*!40000 ALTER TABLE `horario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-03 12:55:53
