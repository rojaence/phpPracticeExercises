-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para logindb
CREATE DATABASE IF NOT EXISTS `logindb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `logindb`;

-- Volcando estructura para tabla logindb.users
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL DEFAULT '',
  `lastName` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- Volcando datos para la tabla logindb.users: ~4 rows (aproximadamente)

-- Volcando estructura para tabla logindb.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `attemptId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`attemptId`),
  KEY `FK_login_attempts_users` (`userId`),
  CONSTRAINT `FK_login_attempts_users` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla logindb.login_attempts: ~0 rows (aproximadamente)
DELETE FROM `login_attempts`;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`) VALUES
	(1, 'Ronny', 'Endara', 'rojaence@gmail.com', '$2a$10$YzHXFxfmoItzJXmIQcS/2eLznY75M5ZET3YwPFmNKeCCJZoRVm.i.'),
	(2, 'John', 'Doe', 'johndoe@gmail.com', '$2a$10$z5HHhNBIU3UmhCDxQOURTOUBH.UAOBEvw77hfQQkGEa7eqIWcNsny'),
	(3, 'Bryan', 'Hernandez', 'bernardo@outlook.com', '$2a$10$jPHAczOwhCFCEMynJAU7m.SkDrW8TM4/zAUWYs3.MCh6MqCwMhJ86'),
	(4, 'Leticia', 'Zambrano', 'leticia@outlook.com', '$2a$10$wu3/AV3Q0.MTvHoma7pOsuhVzA.J7Ftusr8nA2Se.2K7JpB/jC3i6');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
