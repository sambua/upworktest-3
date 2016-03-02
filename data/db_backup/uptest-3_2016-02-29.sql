# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.9)
# Database: uptest-3
# Generation Time: 2016-02-28 21:52:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ut_hotel_media_files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_hotel_media_files`;

CREATE TABLE `ut_hotel_media_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) unsigned NOT NULL,
  `default` tinyint(1) DEFAULT '0',
  `base_name` varchar(1024) NOT NULL DEFAULT '',
  `file_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `mime` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  CONSTRAINT `ut_hotel_media_files_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `ut_hotels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ut_hotel_media_files` WRITE;
/*!40000 ALTER TABLE `ut_hotel_media_files` DISABLE KEYS */;

INSERT INTO `ut_hotel_media_files` (`id`, `hotel_id`, `default`, `base_name`, `file_name`, `type`, `size`, `mime`, `created_at`, `name`)
VALUES
	(21,2,1,'ausctr-omni-austin-hotel-downtown-evening-pool',NULL,NULL,83600,'image/jpeg','2016-02-29 00:28:03','U9x__ve-Xu97O5aztQXtZ4IyXOOlpdqn.jpg'),
	(24,3,1,'jaxjax-omni-jacksonville-hotel-pool',NULL,NULL,90288,'image/jpeg','2016-02-29 00:29:24','NATUIIz6u_udG8u8i5TydJWTkSHAFfcK.jpg'),
	(25,3,0,'luxury-hotel-rooms-rome',NULL,NULL,95777,'image/jpeg','2016-02-29 00:29:24','KU_llO6rNn1o4aZ70gY1aCZFniiV7f-R.jpg'),
	(26,4,1,'_500____college-hotelp1diapo1_718',NULL,NULL,301636,'image/jpeg','2016-02-29 00:29:43','a5fwe16PacbVPeEnz7A8WWlyj9_qfDbh.jpg'),
	(27,4,0,'ausctr-omni-austin-hotel-downtown-evening-pool',NULL,NULL,83600,'image/jpeg','2016-02-29 00:29:43','xfp48BQU5JcRY2IhUTOUPtLSMn85jmxU.jpg'),
	(28,4,0,'hotel-forum-roma_240920091414377028',NULL,NULL,28351,'image/jpeg','2016-02-29 00:29:43','OT5eQoOpEDdOaZq9rLskK3ODiGj59KrX.jpg'),
	(29,5,1,'hotels',NULL,NULL,106251,'image/jpeg','2016-02-29 00:29:59','1_i5r6ku8aQeqLnNoLVliwaJmEO9yWVs.jpg'),
	(30,5,0,'jaxjax-omni-jacksonville-hotel-pool',NULL,NULL,90288,'image/jpeg','2016-02-29 00:29:59','4n0fD8PPa4dsaj0DLSAWnImTBL34RjMD.jpg'),
	(31,5,0,'luxury-hotel-rooms-rome',NULL,NULL,95777,'image/jpeg','2016-02-29 00:29:59','I34JtixUjbJmO3GCX5M7REOYAd4IjV6j.jpg'),
	(32,5,0,'rongraem-1',NULL,NULL,44402,'image/jpeg','2016-02-29 00:29:59','IjyWLLLrn9RgUaBdRniDhA0vBe4UaINu.jpg'),
	(33,6,1,'hotels',NULL,NULL,106251,'image/jpeg','2016-02-29 00:30:08','mYMjCz0-zC5a53ph9AWEXc5cdNpvIDmV.jpg'),
	(34,6,0,'jaxjax-omni-jacksonville-hotel-pool',NULL,NULL,90288,'image/jpeg','2016-02-29 00:30:08','Gm9KkGydjY6kL2BrfAQ6-mYQfwtrNevw.jpg'),
	(35,6,0,'luxury-hotel-rooms-rome',NULL,NULL,95777,'image/jpeg','2016-02-29 00:30:08','vUvjEHBClSDp68WQyl6SDXbocbQcxJLk.jpg'),
	(36,6,0,'rongraem-1',NULL,NULL,44402,'image/jpeg','2016-02-29 00:30:08','wtf5rtmqYXGsxJ-St57470NhMqEvoajD.jpg'),
	(37,7,1,'ausctr-omni-austin-hotel-downtown-evening-pool',NULL,NULL,83600,'image/jpeg','2016-02-29 00:30:20','lzOUuIKVffev69CohYx61_nSwByq56hE.jpg'),
	(38,7,0,'hotel-forum-roma_240920091414377028',NULL,NULL,28351,'image/jpeg','2016-02-29 00:30:20','LD1yoogIP0qPryfNQolFGRWxagvi5QY7.jpg'),
	(39,7,0,'hotels',NULL,NULL,106251,'image/jpeg','2016-02-29 00:30:20','N2CtlcQS9wh9QHP-bA05mksM202wMXPF.jpg'),
	(41,2,1,'luxury-hotel-rooms-rome',NULL,NULL,95777,'image/jpeg','2016-02-29 00:52:50','6JDJpg-oGRK7NMLz-FEOJzLZNgifA2ga.jpg');

/*!40000 ALTER TABLE `ut_hotel_media_files` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_amenities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_amenities`;

CREATE TABLE `ut_amenities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `updater_id` (`updater_id`),
  CONSTRAINT `ut_amenities_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `ut_user` (`id`),
  CONSTRAINT `ut_amenities_ibfk_2` FOREIGN KEY (`updater_id`) REFERENCES `ut_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ut_amenities` WRITE;
/*!40000 ALTER TABLE `ut_amenities` DISABLE KEYS */;

INSERT INTO `ut_amenities` (`id`, `status`, `title`, `description`, `creator_id`, `created_at`, `updater_id`, `updated_at`)
VALUES
	(1,1,'Have beach','Beach of the hotel is very good',1,1456682920,1,1456682920),
	(2,1,'All inclusive','',1,1456683160,1,1456683160),
	(3,1,'Conditioner','',1,1456683219,1,1456683219),
	(4,1,'Have lux room','',1,1456683235,1,1456683235);

/*!40000 ALTER TABLE `ut_amenities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_auth_assignment`;

CREATE TABLE `ut_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `ut_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ut_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ut_auth_assignment` WRITE;
/*!40000 ALTER TABLE `ut_auth_assignment` DISABLE KEYS */;

INSERT INTO `ut_auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('admin',1,1456666113),
	('member',2,1456666113);

/*!40000 ALTER TABLE `ut_auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_auth_item`;

CREATE TABLE `ut_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `ut_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `ut_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ut_auth_item` WRITE;
/*!40000 ALTER TABLE `ut_auth_item` DISABLE KEYS */;

INSERT INTO `ut_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('admin',1,'Administrator of this application',NULL,NULL,1456665244,1456665244),
	('member',1,'Authenticated user, equal to \"@\"',NULL,NULL,1456665244,1456665244);

/*!40000 ALTER TABLE `ut_auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_auth_item_child`;

CREATE TABLE `ut_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `ut_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ut_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ut_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ut_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ut_auth_item_child` WRITE;
/*!40000 ALTER TABLE `ut_auth_item_child` DISABLE KEYS */;

INSERT INTO `ut_auth_item_child` (`parent`, `child`)
VALUES
	('admin','member');

/*!40000 ALTER TABLE `ut_auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_auth_rule`;

CREATE TABLE `ut_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ut_auth_rule` WRITE;
/*!40000 ALTER TABLE `ut_auth_rule` DISABLE KEYS */;

INSERT INTO `ut_auth_rule` (`name`, `data`, `created_at`, `updated_at`)
VALUES
	('isAuthor','O:25:\"app\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1456665244;s:9:\"updatedAt\";i:1456665244;}',1456665244,1456665244);

/*!40000 ALTER TABLE `ut_auth_rule` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_hotel_amenities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_hotel_amenities`;

CREATE TABLE `ut_hotel_amenities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) unsigned DEFAULT NULL,
  `amenity_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `amenity_id` (`amenity_id`),
  CONSTRAINT `ut_hotel_amenities_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `ut_amenities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ut_hotel_amenities` WRITE;
/*!40000 ALTER TABLE `ut_hotel_amenities` DISABLE KEYS */;

INSERT INTO `ut_hotel_amenities` (`id`, `hotel_id`, `amenity_id`, `created_at`)
VALUES
	(57,3,1,'2016-02-29 00:29:24'),
	(58,3,3,'2016-02-29 00:29:24'),
	(59,3,4,'2016-02-29 00:29:24'),
	(60,4,3,'2016-02-29 00:29:43'),
	(61,4,4,'2016-02-29 00:29:43'),
	(62,5,2,'2016-02-29 00:29:59'),
	(63,5,4,'2016-02-29 00:29:59'),
	(64,6,1,'2016-02-29 00:30:08'),
	(65,6,3,'2016-02-29 00:30:08'),
	(66,7,1,'2016-02-29 00:30:20'),
	(67,7,2,'2016-02-29 00:30:20'),
	(68,7,4,'2016-02-29 00:30:20'),
	(72,2,1,'2016-02-29 00:52:50'),
	(73,2,2,'2016-02-29 00:52:50'),
	(74,2,3,'2016-02-29 00:52:50');

/*!40000 ALTER TABLE `ut_hotel_amenities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_hotels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_hotels`;

CREATE TABLE `ut_hotels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `creator_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creator_id` (`creator_id`),
  KEY `updater_id` (`updater_id`),
  CONSTRAINT `ut_hotels_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `ut_user` (`id`),
  CONSTRAINT `ut_hotels_ibfk_2` FOREIGN KEY (`updater_id`) REFERENCES `ut_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ut_hotels` WRITE;
/*!40000 ALTER TABLE `ut_hotels` DISABLE KEYS */;

INSERT INTO `ut_hotels` (`id`, `status`, `title`, `description`, `creator_id`, `created_at`, `updater_id`, `updated_at`)
VALUES
	(2,1,'Luxury Otel sun beach','Ut enim ad minim veniam, quis nostrud exercitation. Cum ceteris in veneratione tui montes, nascetur mus. Pellentesque habitant morbi tristique senectus et netus. Fabio vel iudice vincam, sunt in culpa qui officia.\r\nContra legem facit qui id facit quod lex prohibet. Nec dubitamus multa iter quae et nos invenerat. Idque Caesaris facere voluntate liceret: sese habere. Curabitur est gravida et libero vitae dictum.\r\nVivamus sagittis lacus vel augue laoreet rutrum faucibus. Quisque placerat facilisis egestas cillum dolore. Quis aute iure reprehenderit in voluptate velit esse.\r\nGallia est omnis divisa in partes tres, quarum. Quisque ut dolor gravida, placerat libero vel, euismod. Magna pars studiorum, prodita quaerimus. Quid securi etiam tamquam eu fugiat nulla pariatur. Integer legentibus erat a ante historiarum dapibus. Salutantibus vitae elit libero, a pharetra augue.',1,1456684756,1,1456692770),
	(3,1,'Quam temere in vitiis, legem sancimus haerentia.','Cum ceteris in veneratione tui montes, nascetur mus. Gallia est omnis divisa in partes tres, quarum. Curabitur blandit tempus ardua ridiculus sed magna.\r\nPaullum deliquit, ponderibus modulisque suis ratio utitur. Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh. Excepteur sint obcaecat cupiditat non proident culpa. Prima luce, cum quibus mons aliud consensu ab eo. Quisque placerat facilisis egestas cillum dolore. Cum sociis natoque penatibus et magnis dis parturient.\r\nA communi observantia non est recedendum. Quae vero auctorem tractata ab fiducia dicuntur. Ullamco laboris nisi ut aliquid ex ea commodi consequat.',1,1456684787,1,1456691364),
	(4,1,'Nihil hic munitissimus habendi','Sed haec quis possit intrepidus aestimare tellus. Donec sed odio operae, eu vulputate felis rhoncus. Quo usque tandem abutere, Catilina, patientia nostra? Ambitioni dedisse scripsisse iudicaretur.\r\nAb illo tempore, ab est sed immemorabili. A communi observantia non est recedendum. Hi omnes lingua, institutis, legibus inter se differunt. Quam temere in vitiis, legem sancimus haerentia.\r\nCum ceteris in veneratione tui montes, nascetur mus. Plura mihi bona sunt, inclinet, amari petere vellent. Me non paenitet nullum festiviorem excogitasse ad hoc. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Unam incolunt Belgae, aliam Aquitani, tertiam. Etiam habebis sem dicantur magna mollis euismod.',1,1456684853,1,1456691383),
	(5,1,'Ab illo tempore, ab est.','Etiam habebis sem dicantur magna mollis euismod. Quam temere in vitiis, legem sancimus haerentia. Morbi odio eros, volutpat ut pharetra vitae, lobortis sed nibh.\r\nGallia est omnis divisa in partes tres, quarum. Non equidem invideo, miror magis posuere velit aliquet. Paullum deliquit, ponderibus modulisque suis ratio utitur. Ullamco laboris nisi ut aliquid ex ea commodi consequat. Contra legem facit qui id facit quod lex prohibet. Phasellus laoreet lorem vel dolor tempus vehicula.\r\nFictum, deserunt mollit anim laborum astutumque! Donec sed odio operae, eu vulputate felis rhoncus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Integer legentibus erat a ante historiarum dapibus. Pellentesque habitant morbi tristique senectus et netus. Ab illo tempore, ab est sed immemorabili.\r\nQui ipsorum lingua Celtae, nostra Galli appellantur. Quisque placerat facilisis egestas cillum dolore. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Plura mihi bona sunt, inclinet, amari petere vellent.',1,1456684876,1,1456691399),
	(6,1,'Fabio vel iudice vincam.','Qui ipsorum lingua Celtae, nostra Galli appellantur. Integer legentibus erat a ante historiarum dapibus. Tu quoque, Brute, fili mi, nihil timor populi, nihil! Quam diu etiam furor iste tuus nos eludet?\r\nAmbitioni dedisse scripsisse iudicaretur. Ab illo tempore, ab est sed immemorabili. Pellentesque habitant morbi tristique senectus et netus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Mercedem aut nummos unde unde extricat, amaras. Curabitur est gravida et libero vitae dictum.\r\nHi omnes lingua, institutis, legibus inter se differunt. Fictum, deserunt mollit anim laborum astutumque! Quo usque tandem abutere, Catilina, patientia nostra?',1,1456684907,1,1456691408),
	(7,1,'Morbi odio eros.','Integer legentibus erat a ante historiarum dapibus. Me non paenitet nullum festiviorem excogitasse ad hoc. Quis aute iure reprehenderit in voluptate velit esse. Ambitioni dedisse scripsisse iudicaretur.\r\nQuae vero auctorem tractata ab fiducia dicuntur. Ut enim ad minim veniam, quis nostrud exercitation. Paullum deliquit, ponderibus modulisque suis ratio utitur. Non equidem invideo, miror magis posuere velit aliquet.\r\nAb illo tempore, ab est sed immemorabili. Nihilne te nocturnum praesidium Palati, nihil urbis vigiliae. Nec dubitamus multa iter quae et nos invenerat. Fabio vel iudice vincam, sunt in culpa qui officia.',1,1456684930,1,1456691420);

/*!40000 ALTER TABLE `ut_hotels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_migration`;

CREATE TABLE `ut_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ut_migration` WRITE;
/*!40000 ALTER TABLE `ut_migration` DISABLE KEYS */;

INSERT INTO `ut_migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1456665235),
	('m141022_115823_create_user_table',1456665237),
	('m141022_115912_create_rbac_tables',1456665237);

/*!40000 ALTER TABLE `ut_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ut_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ut_user`;

CREATE TABLE `ut_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  UNIQUE KEY `account_activation_token` (`account_activation_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ut_user` WRITE;
/*!40000 ALTER TABLE `ut_user` DISABLE KEYS */;

INSERT INTO `ut_user` (`id`, `username`, `email`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`)
VALUES
	(1,'sambua','aliyev.resad@gmail.com','$2y$13$9IMadS2DjfsZwENqb13yr.ghQpDQZyP.T1tsWiZaStoEY6sn3M3Ou',10,'EGnyqopU2AwWTtFFjEuk57bYCZLZGkko',NULL,NULL,1456666113,1456666113),
	(2,'sambua1','az_rashad@yahoo.com','$2y$13$SZpvb/VgQiGN/lD.W38TVuAbK/H4KaZHcHDXtx7aHguxop7ETqMbS',10,'NBJNBYQJxcK8TPUReSx-rf-hL8no4ymo',NULL,NULL,1456666428,1456666482);

/*!40000 ALTER TABLE `ut_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
