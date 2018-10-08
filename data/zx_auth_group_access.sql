# Host: localhost  (Version: 5.5.53)
# Date: 2018-10-08 12:01:08
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "zx_auth_group_access"
#

DROP TABLE IF EXISTS `zx_auth_group_access`;
CREATE TABLE `zx_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "zx_auth_group_access"
#

/*!40000 ALTER TABLE `zx_auth_group_access` DISABLE KEYS */;
INSERT INTO `zx_auth_group_access` VALUES (1,1);
/*!40000 ALTER TABLE `zx_auth_group_access` ENABLE KEYS */;
