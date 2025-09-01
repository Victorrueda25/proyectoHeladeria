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
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ventas` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total_producto` decimal(10,2) GENERATED ALWAYS AS (`cantidad` * `precio_unitario`) STORED,
  PRIMARY KEY (`id_detalle`),
  KEY `venta_id` (`venta_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id_ventas`),
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` (`id_detalle`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`) VALUES (4,4,3,1,3000.00),(5,5,3,1,3000.00),(6,5,4,1,3000.00),(7,5,11,1,3000.00),(8,5,1,1,3500.00),(9,6,1,2,3500.00),(10,6,6,4,3000.00),(11,7,2,4,4.00),(12,7,4,4,3.00),(13,8,3,3,3.00),(14,8,4,3,3.00),(15,9,4,4,3.00),(16,9,5,3,3.00),(17,10,4,1,3.00),(18,11,3,2,3.00),(19,11,2,2,4.00),(20,12,5,3,3.00),(21,12,6,3,3.00),(22,13,2,1,4.00),(23,13,3,3,3.00),(24,14,2,3,4.00),(25,14,1,3,3.50),(26,15,2,3,4.00),(27,15,1,3,3.50),(28,16,7,1,3.00),(29,16,8,3,3.00),(30,17,10,1,3.00),(31,17,9,3,3.00),(32,18,10,3,3.00),(33,18,9,3,3.00),(34,18,8,3,3.00),(35,19,12,1,3.00),(36,20,14,1,3.60),(37,20,8,1,3.00),(38,21,10,1,3.00),(39,22,9,3,3.00),(40,22,8,1,3.00);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Helado de Fresa',3500.00,15,'fresa.png'),(2,'Helado de Chocolate',4000.00,4,'chocolate.png'),(3,'Helado de Coco Estudio',3000.00,16,'fotoHeldCocoStudio.png'),(4,'Helado de Mixta',3000.00,12,'fotoMixtaHeladoStudio.png'),(5,'Helado de Chispas Dulces',3000.00,19,'heladoChispasDulces.jpeg'),(6,'Helado de Coco',3000.00,18,'heladoCoco.jpeg'),(7,'Helado de Galleta',3000.00,24,'heladoGalleta.jpeg'),(8,'Helado de Mani',3000.00,17,'heladoMani.jpeg'),(9,'Helado de Maracuya',3000.00,16,'heladoMaracuya.jpeg'),(10,'Helado de Mora con Leche',3000.00,20,'heladoMoraCnlech.jpeg'),(11,'Helado de Oreo',3000.00,24,'heladoOreo.jpeg'),(12,'Helado de Salpicon',3000.00,24,'heladoSalpicon.jpeg'),(14,'Helado Prueba',3600.00,11,'vistas/img/productos/6885a6f7af362_heladoPrueba.jpg');
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
  `usuario_id_ventas` int(11) NOT NULL,
  `total_ventas` decimal(10,2) NOT NULL,
  `fecha_ventas` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_ventas`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,1,12500.00,'2025-07-25 14:51:30'),(2,1,12500.00,'2025-07-25 14:59:12'),(3,1,12500.00,'2025-07-25 14:59:15'),(4,1,12500.00,'2025-07-25 15:03:57'),(5,1,12500.00,'2025-07-25 15:07:11'),(6,1,19000.00,'2025-07-26 23:18:26'),(7,1,28.00,'2025-08-30 17:32:30'),(8,1,18.00,'2025-08-30 17:43:37'),(9,1,21.00,'2025-08-30 17:43:59'),(10,1,3.00,'2025-08-30 17:45:55'),(11,1,14.00,'2025-08-30 18:15:06'),(12,1,18.00,'2025-08-30 18:31:23'),(13,1,13.00,'2025-08-30 18:42:25'),(14,1,22.50,'2025-08-30 18:46:12'),(15,1,22.50,'2025-08-30 18:52:10'),(16,1,12.00,'2025-08-30 18:52:30'),(17,1,12.00,'2025-08-30 18:55:09'),(18,1,27.00,'2025-08-30 18:58:20'),(19,1,3.00,'2025-08-30 19:03:01'),(20,1,6.60,'2025-08-30 19:03:47'),(21,1,3.00,'2025-08-30 19:04:47'),(22,1,12.00,'2025-08-30 19:08:42');
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

-- Dump completed on 2025-09-01 16:57:52
