# Host: localhost  (Version: 5.5.53)
# Date: 2018-10-08 12:01:15
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "zx_auth_group"
#

DROP TABLE IF EXISTS `zx_auth_group`;
CREATE TABLE `zx_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(255) NOT NULL DEFAULT '',
  `describe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "zx_auth_group"
#

/*!40000 ALTER TABLE `zx_auth_group` DISABLE KEYS */;
INSERT INTO `zx_auth_group` VALUES (1,'Developer',1,'1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,41,42,43,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69','Developers of this site');
/*!40000 ALTER TABLE `zx_auth_group` ENABLE KEYS */;
