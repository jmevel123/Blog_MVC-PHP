
CREATE DATABASE IF NOT EXISTS `todo_php` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `todo_php`;



CREATE TABLE IF NOT EXISTS `tasks` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` TEXT,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

