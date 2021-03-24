-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for aplikasi_hr_gink
CREATE DATABASE IF NOT EXISTS `aplikasi_hr_gink` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `aplikasi_hr_gink`;

-- Dumping structure for table aplikasi_hr_gink.data
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) unsigned NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keahlian` varchar(50) DEFAULT '',
  `masa_kontrak` date DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `cv` varchar(50) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `id_kehadiran` int(11) unsigned DEFAULT NULL,
  `id_user` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_data`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `id_kehadiran` (`id_kehadiran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='data karyawan dan calon karyawan\r\n';

-- Dumping data for table aplikasi_hr_gink.data: ~0 rows (approximately)
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

-- Dumping structure for table aplikasi_hr_gink.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) unsigned NOT NULL,
  `date` date DEFAULT NULL,
  `nm_kegiatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table aplikasi_hr_gink.jadwal: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- Dumping structure for table aplikasi_hr_gink.kehadiran
CREATE TABLE IF NOT EXISTS `kehadiran` (
  `id_kehadiran` int(11) unsigned NOT NULL,
  `izin` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cuti` int(11) DEFAULT NULL,
  `tp_keterangan` int(11) DEFAULT NULL,
  `id_data` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran`),
  UNIQUE KEY `id_data` (`id_data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table aplikasi_hr_gink.kehadiran: ~0 rows (approximately)
/*!40000 ALTER TABLE `kehadiran` DISABLE KEYS */;
/*!40000 ALTER TABLE `kehadiran` ENABLE KEYS */;

-- Dumping structure for table aplikasi_hr_gink.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) unsigned NOT NULL,
  `namauser` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin dan karyawan/calon karyawan';

-- Dumping data for table aplikasi_hr_gink.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
