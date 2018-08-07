-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: golazo
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbitro`
--

LOCK TABLES `arbitro` WRITE;
/*!40000 ALTER TABLE `arbitro` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrenador`
--

LOCK TABLES `entrenador` WRITE;
/*!40000 ALTER TABLE `entrenador` DISABLE KEYS */;
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
  `id_ciudad` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `equipo_a_ciudad_idx` (`id_ciudad`),
  CONSTRAINT `equipo_a_ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture`
--

LOCK TABLES `fixture` WRITE;
/*!40000 ALTER TABLE `fixture` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugador`
--

LOCK TABLES `jugador` WRITE;
/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;
UNLOCK TABLES;

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
  `local` int(11) NOT NULL,
  `visita` int(11) NOT NULL,
  PRIMARY KEY (`id_partido_jugado`),
  KEY `par_jug_a_estadioa_idx` (`id_estadio`),
  KEY `par_jug_a_fix_idx` (`id_fixture`),
  KEY `par_jug_a_equipoLoc_idx` (`local`),
  KEY `par_jug_a_equipoVis_idx` (`visita`),
  CONSTRAINT `par_jug_a_equipoLoc` FOREIGN KEY (`local`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_equipoVis` FOREIGN KEY (`visita`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_estadios` FOREIGN KEY (`id_estadio`) REFERENCES `estadios` (`id_estadios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `par_jug_a_fix` FOREIGN KEY (`id_fixture`) REFERENCES `fixture` (`id_fixture`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido_jugado`
--

LOCK TABLES `partido_jugado` WRITE;
/*!40000 ALTER TABLE `partido_jugado` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-04  0:15:53
