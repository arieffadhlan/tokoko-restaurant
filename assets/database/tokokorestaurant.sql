-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tokokorestaurant
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `multiuser`
--

DROP TABLE IF EXISTS `multiuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multiuser` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','user','','') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multiuser`
--

LOCK TABLES `multiuser` WRITE;
/*!40000 ALTER TABLE `multiuser` DISABLE KEYS */;
INSERT INTO `multiuser` VALUES (1,'Albert Lukas Talupan Pangaribuan','albert','albertlukasti','albertlukastalupan1@gmail.com','admin'),(2,'Kevin Tulus Ricardo Silitonga','kevin tulus','kevintulusti','kevintulussilitonga@gmail.com','admin'),(3,'Geby Febry Anhar','geby','gebyfebryti','gebyfebryanhar@gmail.com','admin'),(4,'Indah Amalia Siregar','indah','indahamaliati','indahamalia1605@gmail.com\r\n','admin'),(5,'Muhammad Arief Fadhlan','arief','arieffadhlanti','ariffadhlan12@gmail.com','admin'),(6,'user','user','123q','user@gmail.com','user'),(15,'user2','user2','$2y$10$Kqt2FlkjNr4Vk3HwHMycBujcKwSvzmp1ffDxv7riZwaICClXAZ8oe','user2@gmail.com','user');
/*!40000 ALTER TABLE `multiuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pesan` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesan`
--

LOCK TABLES `pesan` WRITE;
/*!40000 ALTER TABLE `pesan` DISABLE KEYS */;
INSERT INTO `pesan` VALUES (1,'admin','admin@gmail.com','haloo'),(2,'user','user@gmail.com','terima kasih'),(3,'aa','admin@gmail.com','aa');
/*!40000 ALTER TABLE `pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesanan` (
  `idPesanan` int(11) NOT NULL AUTO_INCREMENT,
  `idPelanggan` text DEFAULT NULL,
  `tanggalDipesan` datetime DEFAULT NULL,
  `tanggalOrderan` date DEFAULT NULL,
  `waktuOrderan` time DEFAULT NULL,
  `orderan` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` VALUES (23,'kevin','2021-01-21 07:48:15','2021-01-23','11:11:00','    AyamGoreng x 0 = 0  ||  Gorengan x 0 = 0  ||  IkanSambal x 0 = 0  ||  KariAyam x 0 = 0  ||  Rendang x 0 = 0  ||  Sate x 0 = 0  ||  SayurKangkung x 0 = 0  ||  TelurBalado x 0 = 0  ||  TelurDadar x 0 = 0  ||  JusAlpukat x 0 = 0  ||  JusKuini x 0 = 0  ||  TehManis x 0 = 0  ||  Paket1 x 0 = 0  ||  Paket2 x 0 = 0  ||  Paket3 x 3 = 45000  ||      ',45000),(32,'user','2021-01-21 18:44:15','2021-01-22','00:44:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 1 = 5000<br>TehManis x 0 = 0<br>      ',5000),(33,'user','2021-01-22 05:09:06','2021-01-22','11:09:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 0 = 0<br>TehManis x 1 = 5000<br>      ',5000),(34,'user','2021-01-22 05:26:03','2021-01-22','11:25:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 2 = 20000<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 0 = 0<br>TehManis x 0 = 0<br>      ',20000),(35,'user2','2021-01-22 08:59:56','2021-01-22','14:59:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 1 = 8000<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 0 = 0<br>TehManis x 0 = 0<br>      ',8000),(36,'user','2021-01-23 03:07:45','2021-01-23','09:07:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 1 = 5000<br>JusKuini x 1 = 5000<br>TehManis x 1 = 5000<br>      ',15000),(37,'user','2021-01-23 04:35:34','2021-01-23','10:35:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 1 = 5000<br>TehManis x 0 = 0<br>      ',5000),(38,'user3','2021-01-23 04:45:37','2021-01-23','10:45:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 1 = 5000<br>JusKuini x 1 = 5000<br>TehManis x 1 = 5000<br>      ',15000),(39,'user2','2021-01-23 05:19:27','2021-01-23','11:19:00','      Paket1 x 0 = 0<br>Paket2 x 0 = 0<br>Paket3 x 0 = 0<br>AyamGoreng x 0 = 0<br>IkanSambal x 0 = 0<br>KariAyam x 0 = 0<br>Rendang x 0 = 0<br>Sate x 0 = 0<br>SayurKangkung x 0 = 0<br>TelurBalado x 0 = 0<br>TelurDadar x 0 = 0<br>Gorengan x 0 = 0<br>JusAlpukat x 0 = 0<br>JusKuini x 2 = 10000<br>TehManis x 0 = 0<br>      ',10000);
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-29 16:21:24
