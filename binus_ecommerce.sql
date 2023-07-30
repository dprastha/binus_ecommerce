-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: binus_ecommerce
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `Barang`
--

DROP TABLE IF EXISTS `Barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Barang` (
  `IdBarang` int NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(255) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Satuan` varchar(255) DEFAULT NULL,
  `IdPengguna` int DEFAULT NULL,
  PRIMARY KEY (`IdBarang`),
  KEY `IdPengguna` (`IdPengguna`),
  CONSTRAINT `Barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Barang`
--

LOCK TABLES `Barang` WRITE;
/*!40000 ALTER TABLE `Barang` DISABLE KEYS */;
INSERT INTO `Barang` VALUES (1,'Tas Sekolah','Tas Sekolah','Barang',1),(2,'Mouse','Mouse','Barang',2),(3,'Speaker','Speaker','Barang',3),(4,'Botol Minum','Botol Minum','Barang',4),(5,'Laptop','Laptop Kerja','Barang',5),(6,'Topi','Topi','Barang',6),(7,'Kaos','Kaos Polos','Barang',7),(8,'Celana','Celana Panjang','Barang',8),(9,'Keyboard','Keyboard Hitam','Barang',9),(10,'Handphone','Handphone Canggih','Barang',10);
/*!40000 ALTER TABLE `Barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HakAkses`
--

DROP TABLE IF EXISTS `HakAkses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `HakAkses` (
  `IdAkses` int NOT NULL AUTO_INCREMENT,
  `NamaAkses` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HakAkses`
--

LOCK TABLES `HakAkses` WRITE;
/*!40000 ALTER TABLE `HakAkses` DISABLE KEYS */;
INSERT INTO `HakAkses` VALUES (1,'Melihat Hak Akses','Dapat melihat data hak akses'),(2,'Menambah Hak Akses','Dapat menambah data hak akses'),(3,'Mengubah Hak Akses','Dapat mengubah data hak akses'),(4,'Menghapus Hak Akses','Dapat menghapus data hak akses'),(5,'Melihat Pengguna','Dapat melihat data pengguna'),(6,'Menambah Pengguna','Dapat menambah data pengguna'),(7,'Mengubah Pengguna','Dapat mengubah data pengguna'),(8,'Menghapus Pengguna','Dapat menghapus pengguna'),(9,'Melihat Barang','Dapat melihat data barang'),(10,'Menambah Barang','Dapat menambah data barang');
/*!40000 ALTER TABLE `HakAkses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pembelian`
--

DROP TABLE IF EXISTS `Pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pembelian` (
  `IdPembelian` int NOT NULL AUTO_INCREMENT,
  `JumlahPembelian` int NOT NULL,
  `HargaBeli` int NOT NULL,
  `IdBarang` int DEFAULT NULL,
  PRIMARY KEY (`IdPembelian`),
  KEY `IdBarang` (`IdBarang`),
  CONSTRAINT `Pembelian_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `Barang` (`IdBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pembelian`
--

LOCK TABLES `Pembelian` WRITE;
/*!40000 ALTER TABLE `Pembelian` DISABLE KEYS */;
INSERT INTO `Pembelian` VALUES (1,2,150000,1),(2,1,240000,2),(3,2,145000,3),(4,4,200000,4),(5,1,5000000,5),(6,1,100000,6),(7,3,124000,7),(8,2,280000,8),(9,1,700000,9),(10,2,4000000,10),(11,3,120000,10),(12,2,500000,9),(13,1,750000,8),(14,5,245000,7),(15,1,5700000,6),(16,2,200000,5),(17,3,143000,4),(18,1,150000,3),(19,2,150000,2),(20,1,3500000,1);
/*!40000 ALTER TABLE `Pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pengguna`
--

DROP TABLE IF EXISTS `Pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pengguna` (
  `IdPengguna` int NOT NULL AUTO_INCREMENT,
  `NamaPengguna` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `NamaDepan` varchar(255) NOT NULL,
  `NamaBelakang` varchar(255) NOT NULL,
  `NoHp` varchar(15) DEFAULT NULL,
  `Alamat` text,
  `IdAkses` int DEFAULT NULL,
  PRIMARY KEY (`IdPengguna`),
  KEY `IdAkses` (`IdAkses`),
  CONSTRAINT `Pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pengguna`
--

LOCK TABLES `Pengguna` WRITE;
/*!40000 ALTER TABLE `Pengguna` DISABLE KEYS */;
INSERT INTO `Pengguna` VALUES (1,'Daniel','123456','Daniel','Prastha','08134758371','Kediri',1),(2,'Rifki','123456','Rifki','Pratama','08134758372','Malang',2),(3,'Yuli','123456','Ahmad','Yuli','08134758373','Malang',3),(4,'Grace','123456','Grace','Nila','08134758374','Jakarta',4),(5,'Fasya','123456','Fasya','Hari','08134758375','Bekasi',5),(6,'Ilham','123456','Ilham','Cahyo','08134758376','Jogja',6),(7,'Indres','123456','Indres','Faiz','08134758377','Blitar',7),(8,'Mirza','123456','Mirza','Agha','08134758378','Surabaya',8),(9,'Vera','123456','Vera','Nur','08134758379','Jakarta',9),(10,'Tasya','123456','Tasya','Kamila','08134758390','Bandung',10);
/*!40000 ALTER TABLE `Pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Penjualan`
--

DROP TABLE IF EXISTS `Penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Penjualan` (
  `IdPenjualan` int NOT NULL AUTO_INCREMENT,
  `JumlahPenjualan` int NOT NULL,
  `HargaJual` int NOT NULL,
  `IdBarang` int DEFAULT NULL,
  PRIMARY KEY (`IdPenjualan`),
  KEY `IdBarang` (`IdBarang`),
  CONSTRAINT `Penjualan_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `Barang` (`IdBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Penjualan`
--

LOCK TABLES `Penjualan` WRITE;
/*!40000 ALTER TABLE `Penjualan` DISABLE KEYS */;
INSERT INTO `Penjualan` VALUES (1,2,170000,1),(2,1,240000,2),(3,1,100000,3),(4,3,200000,4),(5,1,7000000,5),(6,1,150000,6),(7,2,124000,7),(8,2,300000,8),(9,1,760000,9),(10,2,6600000,10),(11,1,100000,10),(12,2,520000,9),(13,1,800000,8),(14,3,200000,7),(15,1,7000000,6),(16,2,250000,5),(17,3,193000,4),(18,1,190000,3),(19,1,100000,2),(20,1,3600000,1);
/*!40000 ALTER TABLE `Penjualan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-30 19:05:44
