CREATE DATABASE  IF NOT EXISTS `sistemas` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `sistemas`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sistemas
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
  KEY `fk_bloque_hora_has_horario_bloque_hora1_idx` (`bloque_hora_id`)
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
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_creacion` date NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`departamento_id`),
  KEY `fk_carrera_departamento1_idx` (`departamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Telecomunicaciones','Telecomunicaciones','0000-00-00',2);
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('1ba38bc684e3369ac72ef0d317e52d3e','192.168.5.5','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36',1379703174,'a:2:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:9:\"usuario2q\";}'),('4b60ddf29b0aa51f1217ed5e86930323','192.168.5.5','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36',1379706213,'a:2:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:9:\"usuario2q\";}'),('52c671aedbfebf568486f61082a75314','192.168.5.5','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36',1379707549,'a:2:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:9:\"usuario1q\";}'),('b7a30286c0c783ebe09f524129abe48a','192.168.5.5','DavClnt',1381772754,''),('f1f5df97d5206bce19b92990007fa5a2','192.168.5.5','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.66 Safari/537.36',1379704149,'a:2:{s:9:\"user_data\";s:0:\"\";s:7:\"usuario\";s:9:\"usuario2q\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (2,'Electricidad','Electricidad','2013-11-03 07:52:55');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Sistemas'),(2,'Administración'),(3,'Producción'),(4,'Actualización de Datos'),(5,'Mercadeo y Ventas');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente_has_departamento`
--

DROP TABLE IF EXISTS `docente_has_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_has_departamento` (
  `usuario_ci` varchar(10) NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuario_ci`,`departamento_id`),
  KEY `fk_usuario_has_departamento_departamento1_idx` (`departamento_id`),
  KEY `fk_usuario_has_departamento_usuario1_idx` (`usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_has_departamento`
--

LOCK TABLES `docente_has_departamento` WRITE;
/*!40000 ALTER TABLE `docente_has_departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_has_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente_has_hora`
--

DROP TABLE IF EXISTS `docente_has_hora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_has_hora` (
  `usuario_ci` varchar(10) NOT NULL,
  `bloque_hora_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuario_ci`,`bloque_hora_id`),
  KEY `fk_usuario_has_horario_horario1_idx` (`bloque_hora_id`),
  KEY `fk_usuario_has_horario_usuario1_idx` (`usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_has_hora`
--

LOCK TABLES `docente_has_hora` WRITE;
/*!40000 ALTER TABLE `docente_has_hora` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_has_hora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente_has_materia`
--

DROP TABLE IF EXISTS `docente_has_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente_has_materia` (
  `usuario_ci` varchar(10) NOT NULL,
  `materia_codigo` varchar(10) NOT NULL,
  `plan_evaluacion` text,
  PRIMARY KEY (`usuario_ci`,`materia_codigo`),
  KEY `fk_usuario_has_materia_materia1_idx` (`materia_codigo`),
  KEY `fk_usuario_has_materia_usuario1_idx` (`usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente_has_materia`
--

LOCK TABLES `docente_has_materia` WRITE;
/*!40000 ALTER TABLE `docente_has_materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente_has_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante_has_carrera`
--

DROP TABLE IF EXISTS `estudiante_has_carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante_has_carrera` (
  `usuario_ci` varchar(10) NOT NULL,
  `carrera_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`usuario_ci`,`carrera_id`),
  KEY `fk_usuario_has_carrera_carrera1_idx` (`carrera_id`),
  KEY `fk_usuario_has_carrera_usuario1_idx` (`usuario_ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_has_carrera`
--

LOCK TABLES `estudiante_has_carrera` WRITE;
/*!40000 ALTER TABLE `estudiante_has_carrera` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_has_carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante_nota`
--

DROP TABLE IF EXISTS `estudiante_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudiante_nota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` tinyint(3) unsigned DEFAULT NULL,
  `usuario_ci` varchar(10) NOT NULL,
  `materia_has_pensum_materia_codigo` varchar(10) NOT NULL,
  `materia_has_pensum_pensum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`usuario_ci`,`materia_has_pensum_materia_codigo`,`materia_has_pensum_pensum_id`),
  KEY `fk_evaluacion_usuario1_idx` (`usuario_ci`),
  KEY `fk_estudiante_nota_materia_has_pensum1_idx` (`materia_has_pensum_materia_codigo`,`materia_has_pensum_pensum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante_nota`
--

LOCK TABLES `estudiante_nota` WRITE;
/*!40000 ALTER TABLE `estudiante_nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante_nota` ENABLE KEYS */;
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
  KEY `fk_horario_materia_has_pensum1_idx` (`materia_has_pensum_materia_codigo`,`materia_has_pensum_pensum_id`)
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

--
-- Temporary table structure for view `list_mat_has_pensum`
--

DROP TABLE IF EXISTS `list_mat_has_pensum`;
/*!50001 DROP VIEW IF EXISTS `list_mat_has_pensum`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_mat_has_pensum` (
  `id` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `pensum` tinyint NOT NULL,
  `semestre` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_pensum`
--

DROP TABLE IF EXISTS `list_pensum`;
/*!50001 DROP VIEW IF EXISTS `list_pensum`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_pensum` (
  `id` tinyint NOT NULL,
  `creacion` tinyint NOT NULL,
  `estatus` tinyint NOT NULL,
  `carrera` tinyint NOT NULL,
  `departamento` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `ip_index` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempt`
--

LOCK TABLES `login_attempt` WRITE;
/*!40000 ALTER TABLE `login_attempt` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (1,'127.0.0.1','2013-12-03 15:03:23'),(2,'127.0.0.1','2013-12-03 15:03:32'),(3,'127.0.0.1','2013-12-03 15:03:33');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `horas_teoricas` tinyint(3) unsigned NOT NULL,
  `horas_practicas` tinyint(3) unsigned NOT NULL,
  `total_horas` tinyint(3) unsigned NOT NULL,
  `uni_credito` tinyint(3) unsigned DEFAULT NULL,
  `cod_prelacion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES ('1','Lenguaje',3,2,5,2,'M1C323'),('12411','dnks',5,8,13,4,'M1C323'),('M1C323','Matematica',9,7,8,8,NULL);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_has_pensum`
--

DROP TABLE IF EXISTS `materia_has_pensum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_has_pensum` (
  `materia_codigo` varchar(10) NOT NULL,
  `pensum_id` int(10) unsigned NOT NULL,
  `semestre` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`materia_codigo`,`pensum_id`),
  KEY `fk_materia_has_pensum_pensum1_idx` (`pensum_id`),
  KEY `fk_materia_has_pensum_materia1_idx` (`materia_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_has_pensum`
--

LOCK TABLES `materia_has_pensum` WRITE;
/*!40000 ALTER TABLE `materia_has_pensum` DISABLE KEYS */;
INSERT INTO `materia_has_pensum` VALUES ('1',1,1),('12411',2,1),('ANS0122',1,1),('LEC0143',1,1),('M1C323',3,1),('TDC0103',1,1);
/*!40000 ALTER TABLE `materia_has_pensum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia_has_seminario`
--

DROP TABLE IF EXISTS `materia_has_seminario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia_has_seminario` (
  `materia_codigo` varchar(10) NOT NULL,
  `seminario_id` int(10) unsigned NOT NULL,
  `pensum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`materia_codigo`,`seminario_id`,`pensum_id`),
  KEY `fk_materia_has_seminario_seminario1_idx` (`seminario_id`),
  KEY `fk_materia_has_seminario_materia1_idx` (`materia_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia_has_seminario`
--

LOCK TABLES `materia_has_seminario` WRITE;
/*!40000 ALTER TABLE `materia_has_seminario` DISABLE KEYS */;
INSERT INTO `materia_has_seminario` VALUES ('1',1,1),('12411',1,2),('M1C323',1,3);
/*!40000 ALTER TABLE `materia_has_seminario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `url_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `icon_class` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`url_id`),
  KEY `fk_menu_url1` (`url_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Mapa',0,'icon-question-sign'),(2,'Mapa Insertar',1,''),(13,'Mapa Crear',1,''),(14,'Cantv',0,'icon-phone'),(15,'Cantv Consultar',14,''),(16,'Cantv Reporte',14,''),(3,'Mapa Modificar',1,''),(18,'Usuarios',0,'icon-wrench'),(20,'Crear',18,''),(34,'Pre-inscripción',33,''),(29,'Gestionar',30,''),(30,'Usuario',0,'icon-user'),(31,'Crear',30,''),(32,'Pre-InscripcionBlock',33,''),(33,'Estudiante',0,'icon-user'),(35,'Configuraciones',0,'icon-gears'),(36,'datos',0,'icon-wrench'),(49,'Rutas',35,''),(42,'departamento',50,'icon-ban-circle'),(41,'carrera',50,'icon-bar-chart'),(43,'administrar Usuarios',33,''),(40,'materia',50,''),(44,'Horario',50,''),(45,'Menú',35,''),(46,'Permisos',35,''),(48,'Sistema',35,''),(50,'Administrador',0,'icon-user-md'),(51,'Seminario',50,'icon-group'),(52,'requisitos',50,'icon-list-ol'),(53,'Pensum',50,'icon-bookmark'),(54,'Respaldar',56,'icon-cloud-download'),(55,'Restaurar',56,'icon-cloud-upload'),(56,'Respaldos',0,'icon-download-alt');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pensum`
--

DROP TABLE IF EXISTS `pensum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pensum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` enum('ACTIVO','INACTIVO') NOT NULL,
  `carrera_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`carrera_id`),
  KEY `fk_pensum_carrera1_idx` (`carrera_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pensum`
--

LOCK TABLES `pensum` WRITE;
/*!40000 ALTER TABLE `pensum` DISABLE KEYS */;
INSERT INTO `pensum` VALUES (1,'2013-12-03 18:40:13','ACTIVO',1),(2,'2013-12-03 23:10:49','ACTIVO',1),(3,'2013-12-03 23:16:08','ACTIVO',1);
/*!40000 ALTER TABLE `pensum` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = latin1 */ ;
/*!50003 SET character_set_results = latin1 */ ;
/*!50003 SET collation_connection  = latin1_spanish_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`127.0.0.1`*/ /*!50003 TRIGGER `pensum_BUPD` AFTER UPDATE ON `pensum`
 FOR EACH ROW BEGIN
	IF NEW.carrera_id <> OLD.carrera_id THEN
		delete from materia_has_pensum where pensum_id = new.id;
		delete from materia_has_seminario where pensum_id = new.id;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,1,'a:3:{s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:3:\"uri\";a:2:{i:0;s:23:\"/admin/uri_permissions/\";i:1;s:13:\"/admin/users/\";}}'),(2,4,'a:2:{s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisito`
--

DROP TABLE IF EXISTS `requisito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisito` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `requerido` enum('S','N') NOT NULL,
  `oculto` enum('S','N') NOT NULL,
  `tipo` enum('ESTUDIANTE','DOCENTE','ADMINISTRATIVO','GENERAL') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisito`
--

LOCK TABLES `requisito` WRITE;
/*!40000 ALTER TABLE `requisito` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisito_has_usuario`
--

DROP TABLE IF EXISTS `requisito_has_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisito_has_usuario` (
  `requisito_id` int(10) unsigned NOT NULL,
  `usuario_ci` varchar(10) NOT NULL,
  `url` text,
  PRIMARY KEY (`requisito_id`,`usuario_ci`),
  KEY `fk_requisito_has_usuario_usuario1_idx` (`usuario_ci`),
  KEY `fk_requisito_has_usuario_requisito_idx` (`requisito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisito_has_usuario`
--

LOCK TABLES `requisito_has_usuario` WRITE;
/*!40000 ALTER TABLE `requisito_has_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisito_has_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `system_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE,
  KEY `fk_role_system1` (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'transcriptor',1),(2,'consultor',1),(3,'consultor',2),(4,'administrador',2),(5,'consultor',3),(6,'administrador',3),(7,'casa',0),(13,'nuevo',10),(12,'Administrador',4),(14,'Administrador',11),(15,'admin',4);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_url`
--

DROP TABLE IF EXISTS `role_has_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_url` (
  `role_id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL,
  `operations` set('C','R','U','D') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`role_id`,`url_id`),
  KEY `fk_role_has_url_url1` (`url_id`),
  KEY `fk_role_has_url_role_idx` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_url`
--

LOCK TABLES `role_has_url` WRITE;
/*!40000 ALTER TABLE `role_has_url` DISABLE KEYS */;
INSERT INTO `role_has_url` VALUES (14,29,''),(14,31,''),(14,30,''),(3,4,''),(4,4,''),(4,5,''),(4,6,''),(5,8,''),(6,7,''),(6,9,''),(6,8,''),(12,50,'R'),(12,49,'C,R,U,D'),(12,46,'C,R,U,D'),(12,45,'C,R,U,D'),(12,44,'C,R,U'),(15,34,'C'),(15,33,'C'),(15,32,'C'),(15,28,'C,R,U,D'),(15,20,'C,R,U,D'),(15,19,'C,R,U,D'),(15,18,'C,R,U,D'),(12,42,'R'),(12,41,'R'),(12,40,'C,R,U,D'),(12,43,'R'),(12,34,'C'),(12,33,'C'),(12,28,'C,R,U,D'),(12,48,'C,R,U,D'),(12,35,'C'),(12,17,'R'),(12,51,'C,R,U,D'),(12,52,'C,R,U,D'),(12,53,'C,R,U,D'),(12,54,'R'),(12,55,'U'),(12,56,'R');
/*!40000 ALTER TABLE `role_has_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,0,'Estudiante'),(2,0,'Admin'),(3,0,'Profesor'),(4,0,'Administrativo'),(5,0,'pre-inscripto'),(6,2,'secretaria'),(7,0,'');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_auth`
--

DROP TABLE IF EXISTS `roles_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_auth`
--

LOCK TABLES `roles_auth` WRITE;
/*!40000 ALTER TABLE `roles_auth` DISABLE KEYS */;
INSERT INTO `roles_auth` VALUES (1,0,'Estudiante'),(2,0,'Admin'),(3,0,'Profesor'),(4,0,'Administrativo'),(5,0,'pre-inscripto'),(6,2,'secretaria'),(7,0,'');
/*!40000 ALTER TABLE `roles_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminario`
--

DROP TABLE IF EXISTS `seminario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminario`
--

LOCK TABLES `seminario` WRITE;
/*!40000 ALTER TABLE `seminario` DISABLE KEYS */;
INSERT INTO `seminario` VALUES (1,'Sem. temas especiales de metafisica I-II ');
/*!40000 ALTER TABLE `seminario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminario_has_pensum`
--

DROP TABLE IF EXISTS `seminario_has_pensum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminario_has_pensum` (
  `seminario_id` int(10) unsigned NOT NULL,
  `pensum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`seminario_id`,`pensum_id`),
  KEY `fk_seminario_has_pensum_pensum1_idx` (`pensum_id`),
  KEY `fk_seminario_has_pensum_seminario1_idx` (`seminario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminario_has_pensum`
--

LOCK TABLES `seminario_has_pensum` WRITE;
/*!40000 ALTER TABLE `seminario_has_pensum` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminario_has_pensum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `alias` varchar(6) COLLATE latin1_spanish_ci DEFAULT NULL,
  `url` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `path` varchar(120) COLLATE latin1_spanish_ci DEFAULT NULL,
  `logo` varchar(120) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES (1,'Sistema de Herramientas para Actualización','sha','actualizacion.infoguia.com/','C:\\www\\actualizacion\\',NULL),(2,'Sistema de Registro y Control de Contratos','srcc','contratos.infoguia.net/','C:\\www\\contratos\\',''),(3,'Sistema de Administracion de Contacto a Empresas','sace','contactos.infoguia.net/','C.\\www\\contacto\\',NULL),(4,'Administracion de cuentas y sistemas','adsi','http:\\\\actualizacion.infoguia','C:\\wamp\\www\\login.com\\',''),(5,'Sistema','sis','http://cualquiercosa2','C://cualquiercosa2',NULL),(9,'Sistema de control','sisco','http://controles.com','C:\\miCarpeta\\miarchivo.mp3\\','icon-asterisk'),(10,'Otro sistema de prueba','otro','http://otroSistema.com','C:\\otrosistema\\micarpeta\\','icon-adjust'),(11,'Administrador de Usuarios','adsu','http://localhost/adus_v1/','C:\\wamp\\','icon-user');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_change`
--

DROP TABLE IF EXISTS `system_change`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_change` (
  `id` int(11) NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_change`
--

LOCK TABLES `system_change` WRITE;
/*!40000 ALTER TABLE `system_change` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_change` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url` (
  `url_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) NOT NULL,
  `url` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `is_menu` tinyint(1) DEFAULT '0',
  `operations` set('C','R','U','D') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`url_id`,`system_id`) USING BTREE,
  KEY `fk_url_system1` (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` VALUES (1,1,'mapa/',1,'C,U'),(2,1,'mapa/insertar',1,''),(3,1,'mapa/modificar',1,''),(4,2,'contrato/nuevo',1,''),(5,2,'contrato/modificar',1,''),(6,2,'contrato/eliminar',1,''),(7,3,'contacto/email',1,''),(8,3,'contacto/estatus',1,''),(9,3,'contacto/desactivar',1,''),(13,1,'mapa/crear',1,''),(14,1,'cantv/',1,''),(15,1,'cantv/consultar',1,''),(16,1,'cantv/reporte',1,''),(17,4,'sistema/all',1,'R'),(21,0,'campo/',0,'C,R,U,D'),(22,0,'campo//',0,'R'),(23,0,'casa/',0,'R'),(24,0,'casss',1,'R'),(25,0,'casa/s',0,'R'),(26,0,'rerwe453',0,'C'),(28,4,'user/ajax',0,'C,R,U,D'),(29,11,'user/all',1,'C,R,U,D'),(30,11,'user/',1,'C,R,U,D'),(31,11,'user/create',1,'C,R,U,D'),(33,4,'usuario/',1,'C'),(34,4,'usuario/preInscripcion/add',1,'C'),(35,4,'sistema/',1,'C'),(43,4,'usuario/admin',1,'R'),(40,4,'materia/all',1,'C,R,U,D'),(41,4,'carrera/all',1,'R'),(42,4,'departamento/all',1,'R'),(44,4,'horario/',1,'C,R,U'),(45,4,'menu/index/4',1,'C,R,U,D'),(46,4,'role/index/4',1,'C,R,U,D'),(49,4,'url/index/4',1,'C,R,U,D'),(48,4,'sistema/all/edit/4',1,'C,R,U,D'),(50,4,'admin/',1,'R'),(51,4,'seminario/all',1,'C,R,U,D'),(52,4,'requisitos/all',1,'C,R,U,D'),(53,4,'pensum/all',1,'C,R,U,D'),(54,4,'basededatos/backup',1,'R'),(55,4,'basededatos/restore',1,'U'),(56,4,'basededatos/',1,'R');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `login` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password_s` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `sex` enum('Femenino','Masculino') COLLATE latin1_spanish_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `specialization` set('usuario','vendedor') COLLATE latin1_spanish_ci NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Jhoynerk Caraballo',NULL,'jhoynerk',NULL,NULL,'programador1@infoguia.net','Masculino',NULL,'usuario',NULL),(2,'Joseph Huizi',NULL,'joseph','260e41d3f9b21ef28432bfba437544fc3ee6ba32',NULL,'programador2@infoguia.net','Masculino',NULL,'usuario',NULL),(3,'Daniel Castillo',NULL,'daniel',NULL,NULL,'coordinador@infoguia.net','Masculino',NULL,'vendedor',NULL),(12,'daniel Castillo',NULL,NULL,NULL,NULL,'danielcfe@gmail.com',NULL,NULL,'',NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL),(15,'daniel Castillo',NULL,NULL,NULL,NULL,'danielcfe@gmail.com',NULL,NULL,'',NULL),(16,'daniel','castillo','danielcfe','9a2f065b6481b19ea729fb119479f3522e3a26ed','cccccccccc','danielcfes@gmail.com','Masculino','1988-11-19','usuario','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_role`
--

DROP TABLE IF EXISTS `user_has_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_has_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_user_has_role_role1` (`role_id`),
  KEY `fk_user_has_role_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_role`
--

LOCK TABLES `user_has_role` WRITE;
/*!40000 ALTER TABLE `user_has_role` DISABLE KEYS */;
INSERT INTO `user_has_role` VALUES (1,1,'ACTIVE'),(2,2,'ACTIVE'),(2,5,'ACTIVE'),(3,1,'ACTIVE'),(3,4,'ACTIVE'),(3,6,'ACTIVE'),(16,12,NULL);
/*!40000 ALTER TABLE `user_has_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_temp`
--

DROP TABLE IF EXISTS `user_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_temp`
--

LOCK TABLES `user_temp` WRITE;
/*!40000 ALTER TABLE `user_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `addres` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `gender` char(1) COLLATE utf8_bin NOT NULL,
  `civil_status` char(1) COLLATE utf8_bin DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `photo` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `instruction_level` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `observations` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `blood_type` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,2,'admin','$1$i75.Do4.$ROPRZjZzDx/JjqeVtaJLW.','admin@localhost.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','2013-12-03 04:15:22','2008-11-30 04:56:32','2013-12-03 04:15:22','Daniel','Castillo','EL encanto','M','S','2000-12-12','','','admin localhost','O-'),(2,1,'user','$1$DF2.QT3.$dI.Nk5Ze.hAgsOUcHQEWu/','Davidpalmalugo@gmail.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','2008-12-01 14:04:14','2008-12-01 14:01:53','2013-01-30 06:35:40','David','Palmasss','asdihaoishdoiash','M','C','1990-06-20','','','asdasdasd','O-'),(3,1,'danielcfe','$1$xd2.mp5.$rnHmro9wtRd2i8h3WrAvt1','xleninx@gmail.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','2012-11-19 15:23:00','2012-11-17 23:21:27','2013-01-30 19:08:11','lenin','luque','la casa de palma','M','C','2000-12-12','','','peligro altamente homosexual','O-'),(33,1,'daniel','$1$4G2.531.$enlwLJwD9Tw5v2BbdqEWk.','danielcfe@gmail.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','0000-00-00 00:00:00','2013-01-14 22:45:14','2013-01-15 20:09:35','DANIEL','CASTILLO','Av Bertorrelli URB El Encanto Etapa III','M','C','1998-02-24',NULL,'1','','O-'),(35,5,'leonardo','$1$z2..Ac4.$sIfUlIU2lWB7bM2oxj/Ye/','leonardogarciaolmos.12@gmail.com',1,NULL,NULL,NULL,NULL,'127.0.0.1','0000-00-00 00:00:00','2013-01-20 20:09:04','2013-01-30 20:13:14','DANIEL','CASTILLO','Av Bertorrelli URB El Encanto Etapa III','M','C','0000-00-00',NULL,'1','','O-'),(36,1,'12159553','$1$.t/.t3/.$ZlXHJrdqdtk7.8q9xz1sI1','dancas@gas.com',0,NULL,NULL,NULL,NULL,'127.0.0.1','0000-00-00 00:00:00','2013-01-30 20:09:54','2013-01-30 20:10:23','DANIEL','Alexis Jose','Av Bertorrelli URB El Encanto Etapa III','M','C','1998-03-02',NULL,'1','','O-');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ci` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `direccion` varchar(256) DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` enum('F','M') NOT NULL,
  `est_civil` enum('CASADO','SOLTERO','VIUDO','CONCUBINATO') NOT NULL,
  `tipo_sangre` enum('AB+','AB-','A+','A-','B+','B-','O+','O-') NOT NULL,
  `observacion` text,
  `nivel_instruccion` enum('BACHILLER','TSU','UNIVERSITARIO') NOT NULL,
  `clave` varchar(16) NOT NULL,
  `tipo` enum('ESTUDIANTE','DOCENTE','ADMINISTRATIVO') NOT NULL,
  `estatus` enum('INACTIVO','PENDIENTE','ACTIVO') DEFAULT 'INACTIVO',
  `etnia` varchar(60) NOT NULL,
  `expediente` varchar(10) DEFAULT NULL,
  `laico` enum('SI','NO') NOT NULL,
  `religioso` enum('SI','NO') NOT NULL,
  `congregacion` varchar(45) NOT NULL,
  `nacionalidad` enum('N','E') NOT NULL,
  PRIMARY KEY (`ci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('12159458','mariaelena@gmail.com','maria','castillo','mnbklm','0000-00-00','F','SOLTERO','A+',NULL,'BACHILLER','7arENR8FCXellT22','ESTUDIANTE','INACTIVO','castillo',NULL,'SI','NO','alguna',''),('18.539.017','danielcfe@gmail.com','Daniel','Castillo Fonseca','a aksndoansdas dasldn','0000-00-00','F','CASADO','A+',NULL,'','dante17','ESTUDIANTE','PENDIENTE','','I031455','','','','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
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
  KEY `fk_usuario_has_control_usuario1_idx` (`usuario_ci`)
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
-- Temporary table structure for view `view_horario`
--

DROP TABLE IF EXISTS `view_horario`;
/*!50001 DROP VIEW IF EXISTS `view_horario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_horario` (
  `dia` tinyint NOT NULL,
  `hora_inicio` tinyint NOT NULL,
  `hora_final` tinyint NOT NULL,
  `ci` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `apellido` tinyint NOT NULL,
  `materia_codigo` tinyint NOT NULL,
  `materia` tinyint NOT NULL,
  `bloque` tinyint NOT NULL,
  `pensum` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'sistemas'
--

--
-- Dumping routines for database 'sistemas'
--

--
-- Final view structure for view `list_mat_has_pensum`
--

/*!50001 DROP TABLE IF EXISTS `list_mat_has_pensum`*/;
/*!50001 DROP VIEW IF EXISTS `list_mat_has_pensum`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_spanish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_mat_has_pensum` AS select `mhp`.`materia_codigo` AS `id`,`mat`.`nombre` AS `nombre`,`mhp`.`pensum_id` AS `pensum`,`mhp`.`semestre` AS `semestre` from (`materia_has_pensum` `mhp` join `materia` `mat`) where (`mat`.`codigo` = `mhp`.`materia_codigo`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_pensum`
--

/*!50001 DROP TABLE IF EXISTS `list_pensum`*/;
/*!50001 DROP VIEW IF EXISTS `list_pensum`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_spanish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_pensum` AS select `pen`.`id` AS `id`,`pen`.`fecha_creacion` AS `creacion`,`pen`.`estatus` AS `estatus`,`carre`.`nombre` AS `carrera`,`dep`.`nombre` AS `departamento` from (`departamento` `dep` join (`pensum` `pen` join `carrera` `carre` on((`pen`.`carrera_id` = `carre`.`id`)))) where (`dep`.`id` = `carre`.`departamento_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_horario`
--

/*!50001 DROP TABLE IF EXISTS `view_horario`*/;
/*!50001 DROP VIEW IF EXISTS `view_horario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_horario` AS select `bh`.`dia` AS `dia`,`bh`.`hora_inicio` AS `hora_inicio`,`bh`.`hora_final` AS `hora_final`,`u`.`ci` AS `ci`,`u`.`nombre` AS `nombre`,`u`.`apellido` AS `apellido`,`mhp`.`materia_codigo` AS `materia_codigo`,`m`.`nombre` AS `materia`,`bh`.`id` AS `bloque`,`mhp`.`pensum_id` AS `pensum` from (((((((`bloque_hora` `bh` join `bloque_hora_has_horario` `bhh`) join `materia_has_pensum` `mhp`) join `horario` `h`) join `docente_has_materia` `dhm`) join `usuario` `u`) join `usuario_has_horario` `uhh`) join `materia` `m`) where ((`bh`.`id` = `bhh`.`bloque_hora_id`) and (`bhh`.`horario_id` = `h`.`id`) and (`mhp`.`materia_codigo` = `h`.`materia_has_pensum_materia_codigo`) and (`dhm`.`materia_codigo` = `mhp`.`materia_codigo`) and (`mhp`.`pensum_id` = `h`.`materia_has_pensum_pensum_id`) and (`u`.`ci` = `dhm`.`usuario_ci`) and (`u`.`tipo` = 2) and (`u`.`ci` = `uhh`.`usuario_ci`) and (`h`.`id` = `uhh`.`horario_id`) and (`m`.`codigo` = `mhp`.`materia_codigo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-03 23:30:33
