-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: campeonato
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
  `id_amonestaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_partido` int(11) NOT NULL,
  `id_fix` int(11) NOT NULL,
  `id_ficha_jug` int(11) NOT NULL,
  `id_amonestacion` int(11) NOT NULL,
  PRIMARY KEY (`id_amonestaciones`),
  KEY `fk_tipo_amon_idx` (`id_amonestacion`),
  KEY `fk_id_ficha_idx` (`id_ficha_jug`),
  KEY `fk_id_fixture_idx` (`id_fix`),
  KEY `fk_PartidoJugado_idx` (`id_partido`),
  CONSTRAINT `FK_tipo_amonestacion` FOREIGN KEY (`id_amonestacion`) REFERENCES `tipo_amonestacion` (`id_amon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_fichas` FOREIGN KEY (`id_ficha_jug`) REFERENCES `ficha_jugador` (`Id_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_fixtures` FOREIGN KEY (`id_fix`) REFERENCES `fixture` (`idfixture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_partido` FOREIGN KEY (`id_partido`) REFERENCES `partido_jugado` (`idpartido_jugado`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for table `arbrito`
--

DROP TABLE IF EXISTS `arbrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arbrito` (
  `id_arbrito` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arbitro` varchar(45) NOT NULL,
  `nacionalidad_arbitro` varchar(45) NOT NULL,
  `lugar_nacimiento_arbitro` varchar(45) NOT NULL,
  `fecha_nacimiento_arbitro` date NOT NULL,
  `id_posicion_arbitro` int(11) NOT NULL,
  `id_partidos_arbitro` int(11) NOT NULL,
  PRIMARY KEY (`id_arbrito`),
  KEY `Fk_pos_arbitro_idx` (`id_posicion_arbitro`),
  KEY `Fk_partido_arbitro_idx` (`id_partidos_arbitro`),
  CONSTRAINT `Fk_partido_arbitro` FOREIGN KEY (`id_partidos_arbitro`) REFERENCES `partidos_arbitro` (`id_par_arb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_pos_arbitro` FOREIGN KEY (`id_posicion_arbitro`) REFERENCES `pos_arbitro` (`idpos_arbitro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbrito`
--

LOCK TABLES `arbrito` WRITE;
/*!40000 ALTER TABLE `arbrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cuidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
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
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_entrenador`),
  KEY `equipo_idx` (`id_equipo`),
  CONSTRAINT `equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrenador`
--

LOCK TABLES `entrenador` WRITE;
/*!40000 ALTER TABLE `entrenador` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrenador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipos` (
  `id_equipos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_fundacion` date NOT NULL,
  `nom_equipo` varchar(45) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `esquma_habitual` varchar(45) NOT NULL,
  PRIMARY KEY (`id_equipos`),
  KEY `ciudad_idx` (`id_ciudad`),
  CONSTRAINT `ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadios`
--

DROP TABLE IF EXISTS `estadios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadios` (
  `idestadios` int(11) NOT NULL AUTO_INCREMENT,
  `nom_estadio` varchar(45) NOT NULL,
  `capacidad` varchar(45) NOT NULL,
  `idciudad` int(11) NOT NULL,
  PRIMARY KEY (`idestadios`),
  KEY `FK_ciudad_idx` (`idciudad`),
  CONSTRAINT `FK_ciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadios`
--

LOCK TABLES `estadios` WRITE;
/*!40000 ALTER TABLE `estadios` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ficha_jugador`
--

DROP TABLE IF EXISTS `ficha_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ficha_jugador` (
  `Id_ficha` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la ficha del jugador con el equipo',
  `Id_Equipo` int(11) NOT NULL,
  `Id_Jugador` int(11) NOT NULL,
  PRIMARY KEY (`Id_ficha`),
  KEY `Fk_jugador_idx` (`Id_Jugador`),
  KEY `Fk_equipos_idx` (`Id_Equipo`),
  CONSTRAINT `Fk_equipos` FOREIGN KEY (`Id_Equipo`) REFERENCES `equipos` (`id_equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_jugador` FOREIGN KEY (`Id_Jugador`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ficha_jugador`
--

LOCK TABLES `ficha_jugador` WRITE;
/*!40000 ALTER TABLE `ficha_jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `ficha_jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture`
--

DROP TABLE IF EXISTS `fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture` (
  `idfixture` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `equipo_local` varchar(45) NOT NULL,
  `equipo_visitante` varchar(45) NOT NULL,
  `Id_temporada` int(11) NOT NULL,
  PRIMARY KEY (`idfixture`),
  KEY `Fk_fixture_idx` (`Id_temporada`),
  CONSTRAINT `Fk_fixture` FOREIGN KEY (`Id_temporada`) REFERENCES `temporada` (`id_temporada`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `Id_goles` int(11) NOT NULL AUTO_INCREMENT,
  `id_partido_fk` int(11) NOT NULL,
  `id_fixture_fk` int(11) NOT NULL,
  `id_ficha_jugador_fk` int(11) NOT NULL,
  PRIMARY KEY (`Id_goles`),
  KEY `fK_partidos_idx` (`id_partido_fk`),
  KEY `fK_fixtures_idx` (`id_fixture_fk`),
  KEY `fK_Fichas_idx` (`id_ficha_jugador_fk`),
  KEY `partidos_idx` (`id_partido_fk`),
  CONSTRAINT `ficha` FOREIGN KEY (`id_ficha_jugador_fk`) REFERENCES `ficha_jugador` (`Id_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fixture` FOREIGN KEY (`id_fixture_fk`) REFERENCES `fixture` (`idfixture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `partidos` FOREIGN KEY (`id_partido_fk`) REFERENCES `partido_jugado` (`idpartido_jugado`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `nom_jugador` varchar(45) NOT NULL,
  `nacionalidad_jugador` varchar(45) NOT NULL,
  `lugar_nacimiento_jugador` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso_jugador` float NOT NULL,
  `estatura_jugador` float NOT NULL,
  `id_posicion_jugador` int(11) NOT NULL,
  PRIMARY KEY (`id_jugador`),
  KEY `Fk_posicion_idx` (`id_posicion_jugador`),
  CONSTRAINT `Fk_posicion` FOREIGN KEY (`id_posicion_jugador`) REFERENCES `pos_jugador` (`idpos_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jugador`
--

LOCK TABLES `jugador` WRITE;
/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partido_jugado`
--

DROP TABLE IF EXISTS `partido_jugado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partido_jugado` (
  `idpartido_jugado` int(11) NOT NULL AUTO_INCREMENT,
  `id_estadio` int(11) NOT NULL,
  `id_fixture` int(11) NOT NULL,
  `id_arbitro_partidos` int(11) NOT NULL,
  `Local` int(11) NOT NULL,
  `Visita` int(11) NOT NULL,
  PRIMARY KEY (`idpartido_jugado`),
  KEY `Fk_estadio_idx` (`id_estadio`),
  KEY `FK_Fixtur_idx` (`id_fixture`),
  KEY `FK_partidoarbitro_idx` (`id_arbitro_partidos`),
  KEY `FK_Local_idx` (`Local`),
  KEY `FK_visita_idx` (`Visita`),
  CONSTRAINT `FK_Fixtur` FOREIGN KEY (`id_fixture`) REFERENCES `fixture` (`idfixture`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Local` FOREIGN KEY (`Local`) REFERENCES `equipos` (`id_equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_partidoarbitro` FOREIGN KEY (`id_arbitro_partidos`) REFERENCES `partidos_arbitro` (`id_par_arb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_visita` FOREIGN KEY (`Visita`) REFERENCES `equipos` (`id_equipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_estadio` FOREIGN KEY (`id_estadio`) REFERENCES `estadios` (`idestadios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partido_jugado`
--

LOCK TABLES `partido_jugado` WRITE;
/*!40000 ALTER TABLE `partido_jugado` DISABLE KEYS */;
/*!40000 ALTER TABLE `partido_jugado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidos_arbitro`
--

DROP TABLE IF EXISTS `partidos_arbitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partidos_arbitro` (
  `id_par_arb` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Arbitro` int(11) NOT NULL,
  `Id_Partido` int(11) NOT NULL,
  PRIMARY KEY (`id_par_arb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos_arbitro`
--

LOCK TABLES `partidos_arbitro` WRITE;
/*!40000 ALTER TABLE `partidos_arbitro` DISABLE KEYS */;
/*!40000 ALTER TABLE `partidos_arbitro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_arbitro`
--

DROP TABLE IF EXISTS `pos_arbitro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_arbitro` (
  `idpos_arbitro` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idpos_arbitro`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
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
  `idpos_jugador` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`idpos_jugador`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
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
  `fecha_inico` date NOT NULL,
  `fecha_final` date NOT NULL,
  PRIMARY KEY (`id_temporada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `id_amon` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la amonestacion ',
  `Descripcion` varchar(9) NOT NULL COMMENT 'Descripcion de la amonestacion ',
  PRIMARY KEY (`id_amon`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_amonestacion`
--

LOCK TABLES `tipo_amonestacion` WRITE;
/*!40000 ALTER TABLE `tipo_amonestacion` DISABLE KEYS */;
INSERT INTO `tipo_amonestacion` VALUES (1,'Amarilla'),(2,'Roja');
/*!40000 ALTER TABLE `tipo_amonestacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `NombreUsuario` varchar(20) NOT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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

-- Dump completed on 2018-07-28 20:43:43
