-- Adminer 4.8.1 MySQL 5.7.39 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `menu_uri` varchar(100) NOT NULL,
  `menu_icon` varchar(255) NOT NULL COMMENT 'use font awesome icon',
  `menu_allowed` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menu` (`id`, `menu`, `menu_uri`, `menu_icon`, `menu_allowed`, `parent`, `is_active`, `menu_order`) VALUES
(1,	'Dashboard',	'index',	'fas fa-chevron-circle-right',	'+ADM+CUSTOMER+',	0,	1,	0),
(2,	'Administrator',	'',	'fas fa-chevron-circle-right',	'+ADM+',	0,	1,	0),
(3,	'User',	'user.php',	'fas fa-chevron-circle-right',	'+ADM+',	2,	1,	0);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_group` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `user_group` (`user_group`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_group`) REFERENCES `user_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `password`, `user_group`) VALUES
('ADMIN',	'123456',	'ADM'),
('USER',	'123456',	'USER');

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` char(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_group` (`id`, `name`) VALUES
('ADM',	'ADMIN'),
('USER',	'USER');

-- 2023-05-29 04:19:12
