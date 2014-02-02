-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.24-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sistemas
--

CREATE DATABASE IF NOT EXISTS sistemas;
USE sistemas;

--
-- Definition of table `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `operation` enum('update','delete','replace') COLLATE latin1_spanish_ci DEFAULT NULL,
  `date_pre` text COLLATE latin1_spanish_ci,
  `date_new` text COLLATE latin1_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `audit`
--

/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;


--
-- Definition of table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `ip_index` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `login_attempt`
--

/*!40000 ALTER TABLE `login_attempt` DISABLE KEYS */;
INSERT INTO `login_attempt` (`id`,`ip`) VALUES 
 (1,'127.0.0.1'),
 (2,'127.0.0.1'),
 (3,'127.0.0.1');
/*!40000 ALTER TABLE `login_attempt` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `url_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `icon_class` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`url_id`),
  KEY `fk_menu_url1` (`url_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`url_id`,`name`,`parent_id`,`icon_class`) VALUES 
 (1,'Mapa',0,'icon-question-sign'),
 (2,'Mapa Insertar',1,''),
 (13,'Mapa Crear',1,''),
 (14,'Cantv',0,'icon-phone'),
 (15,'Cantv Consultar',14,''),
 (16,'Cantv Reporte',14,''),
 (3,'Mapa Modificar',1,''),
 (18,'Usuario',0,'icon-user'),
 (20,'Permisos',18,''),
 (19,'Gestión',18,''),
 (17,'Sistema',0,'icon-desktop');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `system_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`) USING BTREE,
  KEY `fk_role_system1` (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `role`
--

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`,`name`,`system_id`) VALUES 
 (1,'transcriptor',1),
 (2,'consultor',1),
 (3,'consultor',2),
 (4,'administrador',2),
 (5,'consultor',3),
 (6,'administrador',3),
 (7,'casa',0),
 (12,'Administrador',4);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


--
-- Definition of table `role_has_url`
--

DROP TABLE IF EXISTS `role_has_url`;
CREATE TABLE `role_has_url` (
  `role_id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL,
  `operations` set('C','R','U','D') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`role_id`,`url_id`),
  KEY `fk_role_has_url_url1` (`url_id`),
  KEY `fk_role_has_url_role_idx` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `role_has_url`
--

/*!40000 ALTER TABLE `role_has_url` DISABLE KEYS */;
INSERT INTO `role_has_url` (`role_id`,`url_id`,`operations`) VALUES 
 (3,4,''),
 (4,4,''),
 (4,5,''),
 (4,6,''),
 (5,8,''),
 (6,7,''),
 (6,9,''),
 (6,8,''),
 (12,17,''),
 (12,18,''),
 (12,19,''),
 (12,20,'');
/*!40000 ALTER TABLE `role_has_url` ENABLE KEYS */;


--
-- Definition of table `system`
--

DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE latin1_spanish_ci DEFAULT NULL,
  `alias` varchar(6) COLLATE latin1_spanish_ci DEFAULT NULL,
  `url` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `path` varchar(120) COLLATE latin1_spanish_ci DEFAULT NULL,
  `logo` varchar(120) COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `system`
--

/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` (`id`,`name`,`alias`,`url`,`path`,`logo`) VALUES 
 (1,'Sistema de Herramientas para Actualización','sha','actualizacion.infoguia.com/','C:\\www\\actualizacion\\',NULL),
 (2,'Sistema de Registro y Control de Contratos','srcc','contratos.infoguia.net/','C:\\www\\contratos\\',''),
 (3,'Sistema de Administracion de Contacto a Empresas','sace','contactos.infoguia.net/','C.\\www\\contacto\\',NULL),
 (4,'Administracion de sistemas','adsi','http:\\\\actualizacion.infoguia','C:\\wamp\\www\\login.com\\',NULL),
 (5,'Sistema','sis','http://cualquiercosa2','C://cualquiercosa2',NULL);
/*!40000 ALTER TABLE `system` ENABLE KEYS */;


--
-- Definition of table `system_change`
--

DROP TABLE IF EXISTS `system_change`;
CREATE TABLE `system_change` (
  `id` int(11) NOT NULL,
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `system_change`
--

/*!40000 ALTER TABLE `system_change` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_change` ENABLE KEYS */;


--
-- Definition of table `url`
--

DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `url_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) NOT NULL,
  `url` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `is_menu` tinyint(1) DEFAULT '0',
  `operations` set('C','R','U','D') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`url_id`,`system_id`) USING BTREE,
  KEY `fk_url_system1` (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `url`
--

/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` (`url_id`,`system_id`,`url`,`is_menu`,`operations`) VALUES 
 (1,1,'mapa/',1,''),
 (2,1,'mapa/insertar',1,''),
 (3,1,'mapa/modificar',1,''),
 (4,2,'contrato/nuevo',1,''),
 (5,2,'contrato/modificar',1,''),
 (6,2,'contrato/eliminar',1,''),
 (7,3,'contacto/email',1,''),
 (8,3,'contacto/estatus',1,''),
 (9,3,'contacto/desactivar',1,''),
 (13,1,'mapa/crear',1,''),
 (14,1,'cantv/',1,''),
 (15,1,'cantv/consultar',1,''),
 (16,1,'cantv/reporte',1,''),
 (17,4,'sistema/all',1,''),
 (18,4,'user/',1,''),
 (19,4,'user/all',1,''),
 (20,4,'user/permissions',1,'C,R'),
 (21,0,'campo/',0,'C,R,U,D'),
 (22,0,'campo//',0,'R'),
 (23,0,'casa/',0,'R'),
 (24,0,'casss',1,'R'),
 (25,0,'casa/s',0,'R'),
 (26,0,'rerwe453',0,'C'),
 (28,4,'usuario/ajax',0,'C,R,U,D');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `sex` enum('Femenino','Masculino') COLLATE latin1_spanish_ci DEFAULT NULL,
  `login` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password_s` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `type` set('usuario','vendedor','cliente','visitante') COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`name`,`email`,`sex`,`login`,`password`,`password_s`,`type`) VALUES 
 (1,'Jhoynerk Caraballo','programador1@infoguia.net','Masculino','jhoynerk',NULL,NULL,'usuario'),
 (2,'Joseph Huizi','programador2@infoguia.net','Masculino','joseph','260e41d3f9b21ef28432bfba437544fc3ee6ba32',NULL,'usuario,cliente'),
 (3,'Daniel Castillo','coordinador@infoguia.net','Masculino','daniel',NULL,NULL,'vendedor,visitante'),
 (12,'daniel Castillo','danielcfe@gmail.com',NULL,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


--
-- Definition of table `user_has_role`
--

DROP TABLE IF EXISTS `user_has_role`;
CREATE TABLE `user_has_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_user_has_role_role1` (`role_id`),
  KEY `fk_user_has_role_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `user_has_role`
--

/*!40000 ALTER TABLE `user_has_role` DISABLE KEYS */;
INSERT INTO `user_has_role` (`user_id`,`role_id`,`status`) VALUES 
 (1,1,'ACTIVE'),
 (2,2,'ACTIVE'),
 (2,5,'ACTIVE'),
 (3,1,'ACTIVE'),
 (3,4,'ACTIVE'),
 (3,6,'ACTIVE');
/*!40000 ALTER TABLE `user_has_role` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
