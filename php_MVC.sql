DROP DATABASE IF EXISTS `php_MVC`;
CREATE DATABASE IF NOT EXISTS `php_MVC` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `php_MVC`;

CREATE TABLE IF NOT EXISTS `users`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `groupe` varchar(50) DEFAULT NULL,
  `status_user` tinyint(4) DEFAULT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` TEXT NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  `category_name` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `categories` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `comments` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  `article_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `tags` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(25) NOT NULL,
  `creation_date` DATETIME NOT NULL,
  `edition_date` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `tags_articles` (
  `tag_id` BIGINT UNSIGNED NOT NULL,
  `article_id` BIGINT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;