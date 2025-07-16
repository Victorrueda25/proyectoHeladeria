CREATE DATABASE  IF NOT EXISTS `heladeria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `heladeria`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: heladeria
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_productos` varchar(100) NOT NULL,
  `precio_productos` decimal(10,2) NOT NULL,
  `stock_productos` int(11) DEFAULT 0,
  `imagen_productos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Helado de Fresa',3500.00,20,'fresa.png'),(2,'Helado de Chocolate',4000.00,15,'chocolate.png'),(3,'Helado de Coco Estudio',3000.00,25,'fotoHeldCocoStudio.png'),(4,'Helado de Mixta',3000.00,25,'fotoMixtaHeladoStudio.png'),(5,'Helado de Chispas Dulces',3000.00,25,'heladoChispasDulces.jpeg'),(6,'Helado de Coco',3000.00,25,'heladoCoco.jpeg'),(7,'Helado de Galleta',3000.00,25,'heladoGalleta.jpeg'),(8,'Helado de Mani',3000.00,25,'heladoMani.jpeg'),(9,'Helado de Maracuya',3000.00,25,'heladoMaracuya.jpeg'),(10,'Helado de Mora con Leche',3000.00,25,'heladoMoraCnlech.jpeg'),(11,'Helado de Oreo',3000.00,25,'heladoOreo.jpeg'),(12,'Helado de Salpicon',3000.00,25,'heladoSalpicon.jpeg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `nombre_rol` (`nombre_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador'),(2,'vendedor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `pers_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `clave_usuario` varchar(255) NOT NULL,
  `rol_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`pers_id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `correo_usuario` (`correo_usuario`),
  KEY `rol_id_usuario` (`rol_id_usuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id_usuario`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Antonio Admin','admin','admin@heladeria.com','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id_ventas` int(11) NOT NULL,
  `usuario_id_ventas` int(11) NOT NULL,
  `cantidad_ventas` int(11) NOT NULL,
  `precio_unitario_ventas` decimal(10,2) NOT NULL,
  `total_ventas` decimal(10,2) NOT NULL,
  `fecha_ventas` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ventas`),
  KEY `producto_id_ventas` (`producto_id_ventas`),
  KEY `usuario_id_ventas` (`usuario_id_ventas`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id_ventas`) REFERENCES `productos` (`id_productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`usuario_id_ventas`) REFERENCES `usuarios` (`pers_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,3,1,1,0.04,0.04,'2025-07-15 22:08:38');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-15 22:27:28
