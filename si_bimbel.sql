-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: si_bimbel
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jadwal_kelas`
--

DROP TABLE IF EXISTS `jadwal_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `jadwal_kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kelas` int(10) unsigned NOT NULL,
  `id_pengajar_pelajaran` int(10) unsigned NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jadwal_kelas_id_kelas_idx` (`id_kelas`),
  KEY `fk_jadwal_kelas_id_pengajar_pelajaran_idx` (`id_pengajar_pelajaran`),
  CONSTRAINT `fk_jadwal_kelas_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jadwal_kelas_id_pengajar_pelajaran` FOREIGN KEY (`id_pengajar_pelajaran`) REFERENCES `pengajar_pelajaran` (`id_pengajar_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_kelas`
--

LOCK TABLES `jadwal_kelas` WRITE;
/*!40000 ALTER TABLE `jadwal_kelas` DISABLE KEYS */;
INSERT INTO `jadwal_kelas` VALUES (11,1,12,'Senin','15:00:00','16:00:00');
/*!40000 ALTER TABLE `jadwal_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kelas` (
  `id_kelas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'Djuanda - I'),(2,'Djuanda - II'),(3,'Djuanda - III'),(4,'Soeharto - I');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(6) NOT NULL,
  `nama_pelajaran` varchar(30) NOT NULL,
  `tingkat_pendidikan` enum('SMA','SMP','SD') NOT NULL,
  `jurusan` enum('IPA','IPS','Bahasa') DEFAULT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran`
--

LOCK TABLES `mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` VALUES ('SMA101','Matematika','SMA','IPA'),('SMA102','Bahasa Indonesia','SMA','IPA'),('SMP101','Bahasa Indonesia','SMP',NULL);
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nilai_siswa`
--

DROP TABLE IF EXISTS `nilai_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `nilai_siswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nis` char(10) NOT NULL,
  `id_pengajar_pelajaran` int(11) unsigned NOT NULL,
  `nilai` int(3) unsigned NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_siswa_nisn_idx` (`nis`),
  KEY `fk_nilai_siswa_id_pengajar_pelajaran_idx` (`id_pengajar_pelajaran`),
  CONSTRAINT `fk_nilai_siswa_id_pengajar_pelajaran` FOREIGN KEY (`id_pengajar_pelajaran`) REFERENCES `pengajar_pelajaran` (`id_pengajar_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nilai_siswa_nisn` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai_siswa`
--

LOCK TABLES `nilai_siswa` WRITE;
/*!40000 ALTER TABLE `nilai_siswa` DISABLE KEYS */;
INSERT INTO `nilai_siswa` VALUES (3,'10116150',12,90,'Nilai Tugas 1');
/*!40000 ALTER TABLE `nilai_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajar`
--

DROP TABLE IF EXISTS `pengajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pengajar` (
  `nip` char(18) NOT NULL,
  `nama_pengajar` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajar`
--

LOCK TABLES `pengajar` WRITE;
/*!40000 ALTER TABLE `pengajar` DISABLE KEYS */;
INSERT INTO `pengajar` VALUES ('10116167','Satria Adi Putra','Laki-laki','1998-09-14','085770431325');
/*!40000 ALTER TABLE `pengajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajar_pelajaran`
--

DROP TABLE IF EXISTS `pengajar_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pengajar_pelajaran` (
  `id_pengajar_pelajaran` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nip` char(18) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  PRIMARY KEY (`id_pengajar_pelajaran`),
  KEY `fk_pengajar_pelajaran_nip_idx` (`nip`),
  KEY `fk_pengajar_pelajaran_kode_mp_idx` (`kode_mapel`),
  CONSTRAINT `fk_pengajar_pelajaran_kode_mp` FOREIGN KEY (`kode_mapel`) REFERENCES `mata_pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pengajar_pelajaran_nip` FOREIGN KEY (`nip`) REFERENCES `pengajar` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajar_pelajaran`
--

LOCK TABLES `pengajar_pelajaran` WRITE;
/*!40000 ALTER TABLE `pengajar_pelajaran` DISABLE KEYS */;
INSERT INTO `pengajar_pelajaran` VALUES (12,'10116167','SMA102'),(17,'10116167','SMA101');
/*!40000 ALTER TABLE `pengajar_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tingkat_pendidikan` enum('SMA','SMP','SD') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `fk_siswa_id_kelas_idx` (`id_kelas`),
  CONSTRAINT `fk_siswa_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES ('10116111','Budi Taher','SMAN 1 Bogor','2002-08-16','SMA','Laki-laki','089765421276',4),('10116148','Dicky Hardiansyah','SMAN 1 Majalengka','1997-12-12','SMA','Laki-laki','089767652887',2),('10116150','Ricky Fahmi Nugraha','SMAN 1 Majalengka','1997-11-10','SMA','Laki-laki','089712347654',1),('10116156','Dzaki Fakhruddin','SMP 1 Cirebon','1998-10-10','SMP','Laki-laki','085770431325',4);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-18 10:18:11
