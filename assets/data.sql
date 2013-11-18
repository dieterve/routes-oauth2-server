# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.14)
# Database: oauth2
# Generation Time: 2013-11-18 10:01:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table oauth_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;

INSERT INTO `oauth_access_tokens` (`access_token`, `client_id`, `user_id`, `expires`, `scope`)
VALUES
	('08802bc3d471688934dcc61a021594c79c640ff0','myroutes','dieter','2013-11-19 10:38:01',NULL),
	('1f3407ffe3b2e5abed1881db23b59bf4518908c4','myroutes','john','2013-11-19 10:37:15',NULL),
	('5104c9222361e4b57f5a04a6279f2986bb094b6a','myroutes','dieter','2013-11-19 10:23:03',NULL),
	('51b0ebd77f8f0bf91a8fd480d8a21f387a31af4a','myroutes',NULL,'2013-11-17 21:15:26',NULL),
	('55b6e778f1327ce38e186de6074314ea09ca9a47','myroutes','dieter','2013-11-18 21:29:05',NULL),
	('5e9fed081aa6de5bb81daa834034b2ae2bef3ea4','myroutes',NULL,'2013-11-17 21:16:49',NULL),
	('6a2909e03f36caa37db148e6936ef68b05b944ca','myroutes','dieter','2013-11-19 10:37:09',NULL),
	('6b88fadcf804ce02c2fce308f339bbcf41812406','myroutes',NULL,'2013-11-17 21:05:46',NULL),
	('83e7fc3bb87f2ff7317b79e1f2099d66057e24f7','myroutes','dieter','2013-11-17 22:19:10',NULL),
	('8cacb6ea290a8188f6a01ced0670bbdf6dc556a6','myroutes','dieter','2013-11-19 08:55:41',NULL),
	('a583707e4e7434e9963b3eb2eeaab7b808a68362','myroutes',NULL,'2013-11-17 21:15:44',NULL),
	('a81485c460cf41da9f70852e21c347edab5a98a1','myroutes','dieter','2013-11-19 10:08:01',NULL),
	('ac544747c283c72657465196388a8fb5513800db','myroutes','dieter','2013-11-19 10:33:49',NULL),
	('b07d4ac2b92dabc4ba8a741882e3d2a76de46bda','myroutes','jean','2013-11-19 10:34:50',NULL),
	('ebb79a51c920eeec1e419372a2581fb46308e93d','myroutes',NULL,'2013-11-17 21:19:38',NULL),
	('edaa4a1fdc558fcc33f9515a63eb963a8f9211e5','myroutes',NULL,'2013-11-17 21:04:43',NULL),
	('f5b198f962346987c2f158b218d8cccd9ad8c673','myroutes',NULL,'2013-11-17 21:13:53',NULL);

/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_authorization_codes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_authorization_codes`;

CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oauth_authorization_codes` WRITE;
/*!40000 ALTER TABLE `oauth_authorization_codes` DISABLE KEYS */;

INSERT INTO `oauth_authorization_codes` (`authorization_code`, `client_id`, `user_id`, `redirect_uri`, `expires`, `scope`)
VALUES
	('0e36517486f6a2502486e2ceb896c0b8142b61bc','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 20:07:03',NULL),
	('267195ddf74b5ecd815fcbbba36c6f9c2ab596ae','myroutes',NULL,'http://oauthserver.dev/myroutes/','2013-11-17 17:57:22',NULL),
	('4e190057f1410451e534f92f5d60749a3b0b8f91','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 17:15:22',NULL),
	('84fd53632a4f9047f1518bb86b1221bb13eafc32','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 19:25:38',NULL),
	('9317b98d30103735d8968b54ffb40151b33d9b31','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 19:42:54',NULL),
	('d6f75d676f77f9d9527a07e10efb3c7c7d12dd5a','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 20:04:07',NULL),
	('e0d64e04dffc77caa3fec282016076b5bea80f74','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 17:05:05',NULL),
	('e5aba84a2de1e751ec13b893842fd11ff0f0c7b5','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 18:00:36',NULL),
	('e6d884f225a522ed0fcc06499f95237da88207ef','myroutes',NULL,'http://oauthserver.dev/myroutes/authorize','2013-11-17 19:36:14',NULL);

/*!40000 ALTER TABLE `oauth_authorization_codes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `client_id` varchar(80) NOT NULL,
  `client_secret` varchar(80) NOT NULL,
  `redirect_uri` varchar(2000) NOT NULL,
  `grant_tpyes` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;

INSERT INTO `oauth_clients` (`client_id`, `client_secret`, `redirect_uri`, `grant_tpyes`)
VALUES
	('myroutes','5LK36bGnTKc23Dl1dXY','http://oauthserver.dev/myroutes/authorize',NULL);

/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_jwt
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_jwt`;

CREATE TABLE `oauth_jwt` (
  `client_id` varchar(80) NOT NULL,
  `subject` varchar(80) DEFAULT NULL,
  `public_key` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table oauth_refresh_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`refresh_token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;

INSERT INTO `oauth_refresh_tokens` (`refresh_token`, `client_id`, `user_id`, `expires`, `scope`)
VALUES
	('0130f46eecfe990d26b4df9d2db0f66f5ccd285f','myroutes',NULL,'2013-12-01 20:05:46',NULL),
	('06d008477bc0b93d4abe58ee0b8b7755f5332aca','myroutes','dieter','2013-12-01 21:29:05',NULL),
	('1240cb539d5b9709f6cb4b7fe75d167d2f6c3151','myroutes','dieter','2013-12-02 10:33:49',NULL),
	('28868153e08fc3d25d91cb606914e59bb2edc0df','myroutes','dieter','2013-12-02 10:38:01',NULL),
	('380503f723508740af1245896729453a634eb524','myroutes','john','2013-12-02 10:37:15',NULL),
	('457ccda4b5c40712a6782d06c9ed07540c83d8f7','myroutes',NULL,'2013-12-01 20:15:26',NULL),
	('4812ef9613f2b91fb8f43fdc46c7e5c9ccc6bddb','myroutes',NULL,'2013-12-01 20:16:49',NULL),
	('4be150c53bac578e13cab41ed1c85a8270043234','myroutes','dieter','2013-12-01 21:19:10',NULL),
	('6ef0aaef96005ee3024ce6af3b6a96821f1fdcb0','myroutes',NULL,'2013-12-01 20:15:44',NULL),
	('6f76de7453980e98cf6ff4094dd6382a1df5745f','myroutes','jean','2013-12-02 10:34:50',NULL),
	('75dfc86a2450201b98fd221b682cd5190c5896c4','myroutes','dieter','2013-12-02 08:55:41',NULL),
	('7a59cfda76b5252bc0cb024a2cea845d61930567','myroutes',NULL,'2013-12-01 20:04:43',NULL),
	('87a80e8cadc24db641f3411132cc18e2e1b3537d','myroutes','dieter','2013-12-02 10:23:03',NULL),
	('d0bf22b30d19acee5e2bc9b149317d94200034d6','myroutes',NULL,'2013-12-01 20:13:53',NULL),
	('dcbf9faabe683386eaf8e408a9ff1c9e09714c3a','myroutes','dieter','2013-12-02 10:37:09',NULL),
	('f44a0513c4b3c872df03c564683d5229d12ce970','myroutes',NULL,'2013-12-01 20:19:38',NULL),
	('fddd7ef79804cb9b5a08dfafd7504a766aac5507','myroutes','dieter','2013-12-02 10:08:01',NULL);

/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table oauth_scopes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_scopes`;

CREATE TABLE `oauth_scopes` (
  `type` varchar(255) NOT NULL DEFAULT 'supported',
  `scope` varchar(2000) DEFAULT NULL,
  `client_id` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table oauth_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `oauth_users`;

CREATE TABLE `oauth_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `oauth_users` WRITE;
/*!40000 ALTER TABLE `oauth_users` DISABLE KEYS */;

INSERT INTO `oauth_users` (`username`, `password`, `first_name`, `last_name`)
VALUES
	('dieter','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Dieter','Vanden Eynde'),
	('jean','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Jean Claude','Van Damme'),
	('john','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','John','Rambo');

/*!40000 ALTER TABLE `oauth_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table routes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `routes`;

CREATE TABLE `routes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `distance` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;

INSERT INTO `routes` (`id`, `username`, `title`, `distance`, `added_on`)
VALUES
	(1,X'646965746572','Petit Ballon - Massif des Vosges',16110,'2013-04-12 13:24:00'),
	(2,X'646965746572','Colonatta - Alpi Apuane',5520,'2012-07-06 16:22:03'),
	(3,X'646965746572','Arrigas - Parc national des Cevennes',14230,'2012-09-24 15:49:43'),
	(4,X'646965746572','Dormillouse - Parc national des Ecrins',13300,'2011-09-29 17:04:23'),
	(5,X'6A65616E','Bois de Petit Han - Luxembourg',14730,'2013-03-05 12:33:00');

/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
