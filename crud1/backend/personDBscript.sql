/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `persondb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `persondb`;

CREATE TABLE IF NOT EXISTS `person` (
  `personId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `address` varchar(500) NOT NULL,
  PRIMARY KEY (`personId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

INSERT INTO person(firstName, lastName, age, address) VALUES('Ronny', 'Endara', 23, 'Las Piñas');
INSERT INTO person(firstName, lastName, age, address) VALUES('John', 'Doe', 41, 'Roberto Astudillo');
INSERT INTO person(firstName, lastName, age, address) VALUES('Leticia', 'Rodriguez', 28, 'Av. 17 de Septiembre');
INSERT INTO person(firstName, lastName, age, address) VALUES('Carlos', 'Pesantez', 32, 'Av. Colón');

DELIMITER //
CREATE PROCEDURE `DeletePersonData`(perId INT)
BEGIN
	DELETE FROM person WHERE personId = perId;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `GetAllPersons`()
BEGIN
SELECT * FROM person;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `GetPersonData`(perId INT)
BEGIN 
SELECT * FROM person WHERE personId = perId;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `InsertPersonData`(
	personName VARCHAR(100),
	personSurname VARCHAR(100),
	personAge TINYINT,
	personAddress VARCHAR(500)
)
BEGIN
INSERT INTO person(firstName, lastName, age, address) VALUES(personName, personSurname, personAge, personAddress);
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `SearchPersons`(param VARCHAR(500))
BEGIN 
	SELECT * FROM person WHERE firstName LIKE CONCAT('%', param, '%') OR lastName LIKE CONCAT('%', param, '%') OR CONVERT(age, CHAR) LIKE CONCAT('%', param, '%') OR address LIKE CONCAT('%', param, '%') OR CONCAT(firstName, ' ', lastName) LIKE CONCAT('%', param, '%') OR CONCAT(firstName, lastName) LIKE CONCAT('%', param, '%');
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE `UpdatePersonData`(
	perId INT,
	personName VARCHAR(100),
	personSurname VARCHAR(100),
	personAge TINYINT,
	personAddress VARCHAR(500)
)
BEGIN 
	UPDATE person SET firstName=personName, lastName=personSurname, age=personAge, address=personAddress WHERE personId = perId;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
