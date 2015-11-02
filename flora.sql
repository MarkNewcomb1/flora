# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.36)
# Database: crud
# Generation Time: 2015-11-02 21:30:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table observations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `observations`;

CREATE TABLE `observations` (
  `ObservationID` INT(11) unsigned NOT NULL AUTO_INCREMENT,
  `ObserverName` NVARCHAR(50) NULL DEFAULT '',
  `PlantName` NVARCHAR(100) NULL,
  `SoilConditions` NVARCHAR(100) DEFAULT NULL,
  `WeatherConditions` NVARCHAR(50) DEFAULT NULL,
  `DateTime` DATETIME DEFAULT NULL,
  `ObsLocation` NVARCHAR(200) DEFAULT NULL,
  `Latitude` DECIMAL(9,6) DEFAULT NULL,
  `Longitude` DECIMAL(9,6) DEFAULT NULL,
  `Notes` NVARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`ObservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# Dump of table AuthorizedUsers
# ------------------------------------------------------------
DROP TABLE IF EXISTS `AuthorizedUsers`;

CREATE TABLE `AuthorizedUsers` (
  `AuthorizedUserID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Username` NVARCHAR(60) NOT NULL DEFAULT '',
  `Password` NVARCHAR(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`AuthorizedUserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
