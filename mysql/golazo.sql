-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: golazo
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

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
-- Temporary view structure for view `amarillas`
--

DROP TABLE IF EXISTS `amarillas`;
/*!50001 DROP VIEW IF EXISTS `amarillas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `amarillas` AS SELECT 
 1 AS `nomb_jugador`,
 1 AS `nom_equipo`,
 1 AS `amarillas`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `amonestaciones`
--

DROP TABLE IF EXISTS `amonestaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `amonestaciones` (
  `id_partidos_jug` int(11) NOT NULL,
  `id_jugadore_fk` int(11) NOT NULL,
  `id_equipos_fk` int(11) NOT NULL,
  `id_amonestaciones` int(11) NOT NULL,
  KEY `amonestaciones_tipoamonestaciones_idx` (`id_amonestaciones`),
  KEY `amonestacion_encueuntro_fk_idx` (`id_partidos_jug`,`id_jugadore_fk`,`id_equipos_fk`),
  CONSTRAINT `amonestacion_encueuntro_fk` FOREIGN KEY (`id_partidos_jug`, `id_jugadore_fk`, `id_equipos_fk`) REFERENCES `encuentro_jugador` (`id_partidos_jugados`, `id_Jugadores`, `id_Equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `amonestaciones_tipoamonestaciones` FOREIGN KEY (`id_amonestaciones`) REFERENCES `tipo_amonestacion` (`id_tipo_amonestacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `amonestaciones`
--

LOCK TABLES `amonestaciones` WRITE;
/*!40000 ALTER TABLE `amonestaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `amonestaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbitro`
--

DROP TABLE IF EXISTS `arbitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arbitro` (
  `id_arbitro` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arbitro` varchar(45) NOT NULL,
  `nacionalidad_arbitro` varchar(45) NOT NULL,
  `lugar_nacimiento_arbitro` varchar(45) NOT NULL,
  `fecha_nacimeinto_arbitro` date NOT NULL,
  `foto_arbitro` varchar(45) DEFAULT NULL,
  `id_posicion_arbitro` int(11) NOT NULL,
  PRIMARY KEY (`id_arbitro`),
  KEY `arbitro_a_tipoArbitro_idx` (`id_posicion_arbitro`),
  CONSTRAINT `arbitro_a_tipoArbitro` FOREIGN KEY (`id_posicion_arbitro`) REFERENCES `pos_arbitro` (`id_pos_arbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbitro`
--

LOCK TABLES `arbitro` WRITE;
/*!40000 ALTER TABLE `arbitro` DISABLE KEYS */;
INSERT INTO `arbitro` VALUES (1,'Marcelo','HONDUREÃ‘A','La Ceiba, Atlantida, Honduras','2018-08-13','1534187661_1313.jpg',2),(2,'Fiochi','ARGELIANA','La Ceiba, Atlantida, Honduras','2018-08-14','1534187692_1584.jpg',3),(3,'Columbus','ANGOLESA','La Ceiba, Atlantida, Honduras','2018-08-14','1534187725_1518.jpg',2),(4,'Kebel Lopez Chino','HONDUREÃ‘A','La Ceiba, Atlantida, Honduras','2018-08-17','1534498689_1915.jpg',5),(5,'Kebel Lopez Chino','ARGELIANA','La Ceiba','2018-08-17','1534498801_1620.jpg',2),(6,'Juan Ramon Soto','HONDUREÃ‘A','La Ceiba, Atlantida, Honduras','2018-08-17','1534502173_1419.jpg',3);
/*!40000 ALTER TABLE `arbitro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ciudad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (9,'La Ceiba'),(10,'San Pedro Sula'),(11,'Tegucigalpa'),(12,'Tocoa'),(13,'Progreso');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuentro_jugador`
--

DROP TABLE IF EXISTS `encuentro_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuentro_jugador` (
  `id_partidos_jugados` int(11) NOT NULL,
  `id_Jugadores` int(11) NOT NULL,
  `id_Equipos` int(11) NOT NULL,
  PRIMARY KEY (`id_partidos_jugados`,`id_Jugadores`,`id_Equipos`),
  KEY `encuentro_equipo_jugador_fk_idx` (`id_Equipos`,`id_Jugadores`),
  CONSTRAINT `encuentro_equipo_jugador_fk` FOREIGN KEY (`id_Equipos`, `id_Jugadores`) REFERENCES `equipo_jugador` (`id_equipos`, `id_jugadores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `encuentro_jugador_fk` FOREIGN KEY (`id_partidos_jugados`) REFERENCES `partido_jugado` (`id_partido_jugado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuentro_jugador`
--

LOCK TABLES `encuentro_jugador` WRITE;
/*!40000 ALTER TABLE `encuentro_jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuentro_jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `encuentros`
--

DROP TABLE IF EXISTS `encuentros`;
/*!50001 DROP VIEW IF EXISTS `encuentros`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `encuentros` AS SELECT 
 1 AS `nombre_equipo_local`,
 1 AS `nombre_equipo_visita`,
 1 AS `fecha`,
 1 AS `id_temporada`,
 1 AS `id_fixture`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `entrenador`
--

DROP TABLE IF EXISTS `entrenador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrenador` (
  `id_entrenador` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entrenador` varchar(45) NOT NULL,
  `nacionalidad_entrenador` varchar(45) NOT NULL,
  `lugar_nacimiento_entrenador` varchar(45) NOT NULL,
  `fecha_nacimiento_entrenador` date NOT NULL,
  `foto_entrenador` varchar(45) DEFAULT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_entrenador`),
  KEY `entrenado_a_equipo_idx` (`id_equipo`),
  CONSTRAINT `entrenado_a_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrenador`
--

LOCK TABLES `entrenador` WRITE;
/*!40000 ALTER TABLE `entrenador` DISABLE KEYS */;
INSERT INTO `entrenador` VALUES (1,'Kebel','HONDUREÃ‘A','La Masica Atlantida','2018-08-14','1534491436_1050.jpg',4),(2,'Kebel Armando Andrades','HONDUREÃ‘A','La Masica Atlantida','2018-08-17','1534494675_1091.jpg',3);
/*!40000 ALTER TABLE `entrenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipo` varchar(45) NOT NULL,
  `fecha_fundacion` date NOT NULL,
  `esquema_habitual` varchar(45) NOT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `id_estadio` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `euipo_a_estadio_idx` (`id_estadio`),
  CONSTRAINT `euipo_a_estadio` FOREIGN KEY (`id_estadio`) REFERENCES `estadios` (`id_estadios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,'Chievo','2018-08-19','3-2-4','1534188039_1194.png',5),(2,'Empoli','2018-08-20','3-2-4','1534188078_1119.png',5),(3,'Fiorentina','2018-08-21','3-2-4','1534188107_1777.png',6),(4,'Inter','2018-08-21','3-2-4','1534188129_1371.png',4),(5,'Juventus','2012-05-20','5-4-2','1534188152_1595.png',5),(6,'Lazio','1998-09-05','3-2-4','1534188172_1957.png',5);
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo_jugador`
--

DROP TABLE IF EXISTS `equipo_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo_jugador` (
  `id_equipos` int(11) NOT NULL,
  `id_jugadores` int(11) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `dorsal` int(11) NOT NULL,
  PRIMARY KEY (`id_equipos`,`id_jugadores`),
  KEY `jugador_jugador_fk_idx` (`id_jugadores`),
  CONSTRAINT `equipo_jugador_fk` FOREIGN KEY (`id_equipos`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jugador_jugador_fk` FOREIGN KEY (`id_jugadores`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_jugador`
--

LOCK TABLES `equipo_jugador` WRITE;
/*!40000 ALTER TABLE `equipo_jugador` DISABLE KEYS */;
INSERT INTO `equipo_jugador` VALUES (1,1,'1',2),(1,2,'1',5),(1,3,'1',9),(1,4,'1',8),(1,5,'1',7),(1,6,'1',10);
/*!40000 ALTER TABLE `equipo_jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadios`
--

DROP TABLE IF EXISTS `estadios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadios` (
  `id_estadios` int(11) NOT NULL AUTO_INCREMENT,
  `nom_estadios` varchar(45) NOT NULL,
  `capacidad` varchar(45) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  PRIMARY KEY (`id_estadios`),
  KEY `estadio_a_ciudad_idx` (`id_ciudad`),
  CONSTRAINT `estadio_a_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
INSERT INTO `estadios` VALUES (4,'Zamorano','15020',11),(5,'Bernaveus','15896',12),(6,'Chapecoence','15981',13);
/*!40000 ALTER TABLE `estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture`
--

DROP TABLE IF EXISTS `fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture` (
  `id_fixture` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `equipo_local` int(11) NOT NULL,
  `equipo_visitante` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL,
  PRIMARY KEY (`id_fixture`),
  KEY `fix_a_equipoLoc_idx` (`equipo_local`),
  KEY `fix_a_equipoVis_idx` (`equipo_visitante`),
  KEY `fix_a_temporada_idx` (`id_temporada`),
  CONSTRAINT `fix_a_equipoLoc` FOREIGN KEY (`equipo_local`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fix_a_equipoVis` FOREIGN KEY (`equipo_visitante`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fix_a_temporada` FOREIGN KEY (`id_temporada`) REFERENCES `temporada` (`id_temporada`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture`
--

LOCK TABLES `fixture` WRITE;
/*!40000 ALTER TABLE `fixture` DISABLE KEYS */;
INSERT INTO `fixture` VALUES (1,'2018-07-20',5,2,1),(2,'2018-07-20',6,1,1),(3,'2018-07-21',3,4,1),(4,'2018-07-25',6,5,1),(5,'2018-07-25',3,2,1),(6,'2018-07-26',1,4,1),(7,'2018-07-30',3,6,1),(8,'2018-07-30',1,5,1),(9,'2018-07-31',2,4,1),(10,'2018-08-04',1,3,1),(11,'2018-08-04',2,6,1),(12,'2018-08-05',5,4,1),(13,'2018-08-09',2,1,1),(14,'2018-08-09',5,3,1),(15,'2018-08-10',6,4,1),(16,'2018-08-14',2,5,1),(17,'2018-08-14',1,6,1),(18,'2018-08-15',4,3,1),(19,'2018-08-19',5,6,1),(20,'2018-08-19',2,3,1),(21,'2018-08-20',4,1,1),(22,'2018-08-24',6,3,1),(23,'2018-08-24',5,1,1),(24,'2018-08-25',4,2,1),(25,'2018-08-29',3,1,1),(26,'2018-08-29',6,2,1),(27,'2018-08-30',4,5,1),(28,'2018-09-03',1,2,1),(29,'2018-09-03',3,5,1),(30,'2018-09-04',4,6,1);
/*!40000 ALTER TABLE `fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goles`
--

DROP TABLE IF EXISTS `goles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goles` (
  `id_partido_jugados_fk` int(11) NOT NULL,
  `id_jugadores_fk` int(11) NOT NULL,
  `id_equipos_fk` int(11) NOT NULL,
  KEY `goles_encuentrojugador_fk_idx` (`id_partido_jugados_fk`,`id_jugadores_fk`,`id_equipos_fk`),
  CONSTRAINT `goles_encuentrojugador_fk` FOREIGN KEY (`id_partido_jugados_fk`, `id_jugadores_fk`, `id_equipos_fk`) REFERENCES `encuentro_jugador` (`id_partidos_jugados`, `id_Jugadores`, `id_Equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goles`
--

LOCK TABLES `goles` WRITE;
/*!40000 ALTER TABLE `goles` DISABLE KEYS */;
/*!40000 ALTER TABLE `goles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jugador`
--

DROP TABLE IF EXISTS `jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL AUTO_INCREMENT,
  `nomb_jugador` varchar(45) NOT NULL,
  `lugar_nacimiento_jugador` varchar(45) NOT NULL,
  `nacionalidad_jugador` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso_jugador` float NOT NULL,
  `estatura_jugador` float NOT NULL,
  `foto_jugador` varchar(45) DEFAULT NULL,
  `id_posicion_jugador` int(11) NOT NULL,
  PRIMARY KEY (`id_jugador`),
  KEY `jugador_a_posJug_idx` (`id_posicion_jugador`),
  CONSTRAINT `jugador_a_posJug` FOREIGN KEY (`id_posicion_jugador`) REFERENCES `pos_jugador` (`id_pos_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugador`
--

LOCK TABLES `jugador` WRITE;
/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
INSERT INTO `jugador` VALUES (1,'Jeumin Armando Padroni','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2018-08-23',155.5,1.7,'1534445731_1290.jpg',14),(2,'Diego Godoy','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2018-08-16',189.5,1.7,'1534482840_1481.jpg',2),(3,'Kebel Armando Sagastume','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2018-08-16',189.5,1.7,'1534483755_1096.jpg',17),(4,'Edgardo Jose Argueta','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2018-08-17',180,1.75,'1534484019_1456.jpg',16),(5,'Ledin Alvarado','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2018-08-14',200,1.75,'1534488440_1540.jpg',17),(6,'Edgardo Argueta Sagastume','La Ceiba, Atlantida, Honduras','HONDUREÃ‘A','2016-10-30',205.5,1.8,'1534498919_1372.jpg',18);
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `mostrar_resultados`
--

DROP TABLE IF EXISTS `mostrar_resultados`;
/*!50001 DROP VIEW IF EXISTS `mostrar_resultados`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `mostrar_resultados` AS SELECT 
 1 AS `id_partido_jugado`,
 1 AS `equipo_local`,
 1 AS `equipo_visita`,
 1 AS `goles_local`,
 1 AS `goles_visitante`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `partido_arbitro`
--

DROP TABLE IF EXISTS `partido_arbitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partido_arbitro` (
  `id_partido_arbitro` int(11) NOT NULL AUTO_INCREMENT,
  `id_arbitro` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  PRIMARY KEY (`id_partido_arbitro`),
  KEY `par_arb_a_arbitro_idx` (`id_arbitro`),
  KEY `par_arb_a_partidoJu_idx` (`id_partido`),
  CONSTRAINT `par_arb_a_arbitro` FOREIGN KEY (`id_arbitro`) REFERENCES `arbitro` (`id_arbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_arb_a_partidoJu` FOREIGN KEY (`id_partido`) REFERENCES `partido_jugado` (`id_partido_jugado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido_arbitro`
--

LOCK TABLES `partido_arbitro` WRITE;
/*!40000 ALTER TABLE `partido_arbitro` DISABLE KEYS */;
/*!40000 ALTER TABLE `partido_arbitro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partido_jugado`
--

DROP TABLE IF EXISTS `partido_jugado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partido_jugado` (
  `id_partido_jugado` int(11) NOT NULL AUTO_INCREMENT,
  `id_estadio` int(11) NOT NULL,
  `id_fixture` int(11) NOT NULL,
  `equipo_local` int(11) NOT NULL,
  `equipo_visita` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_partido_jugado`),
  KEY `par_jug_a_estadioa_idx` (`id_estadio`),
  KEY `par_jug_a_fix_idx` (`id_fixture`),
  KEY `par_jug_a_equipoLoc_idx` (`equipo_local`),
  KEY `par_jug_a_equipoVis_idx` (`equipo_visita`),
  CONSTRAINT `par_jug_a_equipoLoc` FOREIGN KEY (`equipo_local`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_equipoVis` FOREIGN KEY (`equipo_visita`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_estadios` FOREIGN KEY (`id_estadio`) REFERENCES `estadios` (`id_estadios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_fix` FOREIGN KEY (`id_fixture`) REFERENCES `fixture` (`id_fixture`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido_jugado`
--

LOCK TABLES `partido_jugado` WRITE;
/*!40000 ALTER TABLE `partido_jugado` DISABLE KEYS */;
INSERT INTO `partido_jugado` VALUES (1,5,1,5,2,'2018-07-20');
/*!40000 ALTER TABLE `partido_jugado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_arbitro`
--

DROP TABLE IF EXISTS `pos_arbitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_arbitro` (
  `id_pos_arbitro` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pos_arbitro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_arbitro`
--

LOCK TABLES `pos_arbitro` WRITE;
/*!40000 ALTER TABLE `pos_arbitro` DISABLE KEYS */;
INSERT INTO `pos_arbitro` VALUES (1,'Arbitro Central'),(2,'Primer Arbitro'),(3,'Segundo Arbitro'),(4,'Tercer Arbitro'),(5,'Cuarto Arbitro');
/*!40000 ALTER TABLE `pos_arbitro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_jugador`
--

DROP TABLE IF EXISTS `pos_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_jugador` (
  `id_pos_jugador` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pos_jugador`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_jugador`
--

LOCK TABLES `pos_jugador` WRITE;
/*!40000 ALTER TABLE `pos_jugador` DISABLE KEYS */;
INSERT INTO `pos_jugador` VALUES (1,'POR'),(2,'DFI'),(3,'DFD'),(4,'DFC'),(5,'LIB'),(6,'LI'),(7,'LD'),(8,'CAD'),(9,'CAI'),(10,'MCD'),(11,'MD'),(12,'MC'),(13,'MI'),(14,'MCO'),(15,'EI'),(16,'ED'),(17,'SDI'),(18,'SD'),(19,'SDD'),(20,'DC');
/*!40000 ALTER TABLE `pos_jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `resultados`
--

DROP TABLE IF EXISTS `resultados`;
/*!50001 DROP VIEW IF EXISTS `resultados`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `resultados` AS SELECT 
 1 AS `id_partido_jugado`,
 1 AS `equipo_local`,
 1 AS `goles_local`,
 1 AS `puntos_del_local`,
 1 AS `equipo_visita`,
 1 AS `goles_visitante`,
 1 AS `puntos_del_visitante`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `resultados_1`
--

DROP TABLE IF EXISTS `resultados_1`;
/*!50001 DROP VIEW IF EXISTS `resultados_1`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `resultados_1` AS SELECT 
 1 AS `id_partido_jugado`,
 1 AS `equipo_local`,
 1 AS `resultado_local`,
 1 AS `equipo_visita`,
 1 AS `resultado_visita`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `rojas`
--

DROP TABLE IF EXISTS `rojas`;
/*!50001 DROP VIEW IF EXISTS `rojas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `rojas` AS SELECT 
 1 AS `nomb_jugador`,
 1 AS `nom_equipo`,
 1 AS `amarillas`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tabla_goleadores`
--

DROP TABLE IF EXISTS `tabla_goleadores`;
/*!50001 DROP VIEW IF EXISTS `tabla_goleadores`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tabla_goleadores` AS SELECT 
 1 AS `nomb_jugador`,
 1 AS `nom_equipo`,
 1 AS `goles`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `tabla_posiciones`
--

DROP TABLE IF EXISTS `tabla_posiciones`;
/*!50001 DROP VIEW IF EXISTS `tabla_posiciones`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `tabla_posiciones` AS SELECT 
 1 AS `nombre_equipo`,
 1 AS `PG`,
 1 AS `PE`,
 1 AS `PP`,
 1 AS `PJ`,
 1 AS `GF`,
 1 AS `GC`,
 1 AS `PTS`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `temporada`
--

DROP TABLE IF EXISTS `temporada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporada` (
  `id_temporada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  PRIMARY KEY (`id_temporada`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporada`
--

LOCK TABLES `temporada` WRITE;
/*!40000 ALTER TABLE `temporada` DISABLE KEYS */;
INSERT INTO `temporada` VALUES (1,'2018-07-20','2018-09-28');
/*!40000 ALTER TABLE `temporada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_amonestacion`
--

DROP TABLE IF EXISTS `tipo_amonestacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_amonestacion` (
  `id_tipo_amonestacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_amonestacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_amonestacion`
--

LOCK TABLES `tipo_amonestacion` WRITE;
/*!40000 ALTER TABLE `tipo_amonestacion` DISABLE KEYS */;
INSERT INTO `tipo_amonestacion` VALUES (1,'Roja'),(2,'Amarilla');
/*!40000 ALTER TABLE `tipo_amonestacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'leumin','trochez','root','1234','leotroche20@gmail.com'),(2,'root','root','root','root','root@gmail.com'),(3,'Ivan','Godoy','godoy24','kellorkc24','ivangodoy24@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `amarillas`
--

/*!50001 DROP VIEW IF EXISTS `amarillas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `amarillas` AS select `jugador`.`nomb_jugador` AS `nomb_jugador`,`equipo`.`nom_equipo` AS `nom_equipo`,count(0) AS `amarillas` from ((`amonestaciones` join `jugador` on((`amonestaciones`.`id_jugadore_fk` = `jugador`.`id_jugador`))) join `equipo` on((`equipo`.`id_equipo` = `amonestaciones`.`id_equipos_fk`))) where (`amonestaciones`.`id_amonestaciones` = 2) group by `jugador`.`nomb_jugador` order by count(0) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `encuentros`
--

/*!50001 DROP VIEW IF EXISTS `encuentros`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `encuentros` AS select `equipo_local`.`nom_equipo` AS `nombre_equipo_local`,`equipo_visitante`.`nom_equipo` AS `nombre_equipo_visita`,`fixture`.`fecha` AS `fecha`,`fixture`.`id_temporada` AS `id_temporada`,`fixture`.`id_fixture` AS `id_fixture` from ((`fixture` join `equipo` `equipo_local` on((`fixture`.`equipo_local` = `equipo_local`.`id_equipo`))) join `equipo` `equipo_visitante` on((`fixture`.`equipo_visitante` = `equipo_visitante`.`id_equipo`))) order by `fixture`.`fecha`,`equipo_local`.`nom_equipo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `mostrar_resultados`
--

/*!50001 DROP VIEW IF EXISTS `mostrar_resultados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `mostrar_resultados` AS select `resultados`.`id_partido_jugado` AS `id_partido_jugado`,`equipo_local`.`nom_equipo` AS `equipo_local`,`equipo_visita`.`nom_equipo` AS `equipo_visita`,`resultados`.`goles_local` AS `goles_local`,`resultados`.`goles_visitante` AS `goles_visitante` from ((`resultados` join `equipo` `equipo_local` on((`equipo_local`.`id_equipo` = `resultados`.`equipo_local`))) join `equipo` `equipo_visita` on((`equipo_visita`.`id_equipo` = `resultados`.`equipo_visita`))) order by `resultados`.`id_partido_jugado` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `resultados`
--

/*!50001 DROP VIEW IF EXISTS `resultados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `resultados` AS select `resultados_1`.`id_partido_jugado` AS `id_partido_jugado`,`resultados_1`.`equipo_local` AS `equipo_local`,`resultados_1`.`resultado_local` AS `goles_local`,(case when (`resultados_1`.`resultado_local` > `resultados_1`.`resultado_visita`) then 3 when (`resultados_1`.`resultado_visita` > `resultados_1`.`resultado_local`) then 0 else 1 end) AS `puntos_del_local`,`resultados_1`.`equipo_visita` AS `equipo_visita`,`resultados_1`.`resultado_visita` AS `goles_visitante`,(case when (`resultados_1`.`resultado_local` < `resultados_1`.`resultado_visita`) then 3 when (`resultados_1`.`resultado_visita` < `resultados_1`.`resultado_local`) then 0 else 1 end) AS `puntos_del_visitante` from `resultados_1` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `resultados_1`
--

/*!50001 DROP VIEW IF EXISTS `resultados_1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `resultados_1` AS select `fix`.`id_partido_jugado` AS `id_partido_jugado`,`fix`.`equipo_local` AS `equipo_local`,(select count(0) from `goles` where ((`goles`.`id_partido_jugados_fk` = `fix`.`id_partido_jugado`) and (`goles`.`id_equipos_fk` = `fix`.`equipo_local`))) AS `resultado_local`,`fix`.`equipo_visita` AS `equipo_visita`,(select count(0) from `goles` where ((`goles`.`id_partido_jugados_fk` = `fix`.`id_partido_jugado`) and (`goles`.`id_equipos_fk` = `fix`.`equipo_visita`))) AS `resultado_visita` from `partido_jugado` `fix` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `rojas`
--

/*!50001 DROP VIEW IF EXISTS `rojas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `rojas` AS select `jugador`.`nomb_jugador` AS `nomb_jugador`,`equipo`.`nom_equipo` AS `nom_equipo`,count(0) AS `amarillas` from ((`amonestaciones` join `jugador` on((`amonestaciones`.`id_jugadore_fk` = `jugador`.`id_jugador`))) join `equipo` on((`equipo`.`id_equipo` = `amonestaciones`.`id_equipos_fk`))) where (`amonestaciones`.`id_amonestaciones` = 1) group by `jugador`.`nomb_jugador` order by count(0) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tabla_goleadores`
--

/*!50001 DROP VIEW IF EXISTS `tabla_goleadores`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tabla_goleadores` AS select `jugador`.`nomb_jugador` AS `nomb_jugador`,`equipo`.`nom_equipo` AS `nom_equipo`,count(0) AS `goles` from ((`goles` join `jugador` on((`goles`.`id_jugadores_fk` = `jugador`.`id_jugador`))) join `equipo` on((`equipo`.`id_equipo` = `goles`.`id_equipos_fk`))) group by `jugador`.`nomb_jugador` order by count(0) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `tabla_posiciones`
--

/*!50001 DROP VIEW IF EXISTS `tabla_posiciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `tabla_posiciones` AS select distinct `equipo`.`nom_equipo` AS `nombre_equipo`,((select count(0) from `resultados` where ((`resultados`.`equipo_local` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_local` = 3))) + (select count(0) from `resultados` where ((`resultados`.`equipo_visita` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_visitante` = 3)))) AS `PG`,((select count(0) from `resultados` where ((`resultados`.`equipo_local` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_local` = 1))) + (select count(0) from `resultados` where ((`resultados`.`equipo_visita` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_visitante` = 1)))) AS `PE`,((select count(0) from `resultados` where ((`resultados`.`equipo_local` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_local` = 0))) + (select count(0) from `resultados` where ((`resultados`.`equipo_visita` = `equipo`.`id_equipo`) and (`resultados`.`puntos_del_visitante` = 0)))) AS `PP`,(select count(0) from `resultados` where ((`resultados`.`equipo_local` = `equipo`.`id_equipo`) or (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) AS `PJ`,((select coalesce(sum(`resultados`.`goles_local`),0) from `resultados` where (`resultados`.`equipo_local` = `equipo`.`id_equipo`)) + (select coalesce(sum(`resultados`.`goles_visitante`),0) from `resultados` where (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) AS `GF`,((select coalesce(sum(`resultados`.`goles_visitante`),0) from `resultados` where (`resultados`.`equipo_local` = `equipo`.`id_equipo`)) + (select coalesce(sum(`resultados`.`goles_local`),0) from `resultados` where (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) AS `GC`,((select coalesce(sum(`resultados`.`puntos_del_local`),0) from `resultados` where (`resultados`.`equipo_local` = `equipo`.`id_equipo`)) + (select coalesce(sum(`resultados`.`puntos_del_visitante`),0) from `resultados` where (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) AS `PTS` from (`equipo` join `resultados` on(((`equipo`.`id_equipo` = `resultados`.`equipo_local`) or (`equipo`.`id_equipo` = `resultados`.`equipo_visita`)))) order by ((select coalesce(sum(`resultados`.`puntos_del_local`),0) from `resultados` where (`resultados`.`equipo_local` = `equipo`.`id_equipo`)) + (select coalesce(sum(`resultados`.`puntos_del_visitante`),0) from `resultados` where (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) desc,((select coalesce(sum(`resultados`.`goles_local`),0) from `resultados` where (`resultados`.`equipo_local` = `equipo`.`id_equipo`)) + (select coalesce(sum(`resultados`.`goles_visitante`),0) from `resultados` where (`resultados`.`equipo_visita` = `equipo`.`id_equipo`))) desc */;
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

-- Dump completed on 2018-08-17  9:30:22
