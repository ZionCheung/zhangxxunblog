# Host: localhost  (Version: 5.5.53)
# Date: 2018-09-30 08:58:28
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "zx_admin_user"
#

DROP TABLE IF EXISTS `zx_admin_user`;
CREATE TABLE `zx_admin_user` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(20) NOT NULL,
  `ad_password` char(32) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_sign` tinyint(1) DEFAULT '0',
  `ad_headimg` varchar(100) DEFAULT '/static/images/admin.jpg',
  `ad_name` varchar(50) DEFAULT '?????',
  `ad_retime` int(11) unsigned NOT NULL DEFAULT '0',
  `ad_phone` varchar(20) NOT NULL DEFAULT '0',
  `ad_regip` varchar(255) DEFAULT '',
  `ad_sort` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ad_username` (`ad_username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "zx_admin_user"
#

/*!40000 ALTER TABLE `zx_admin_user` DISABLE KEYS */;
INSERT INTO `zx_admin_user` VALUES (1,'zhangxxun','3775c147bc7c86a30db52321c21b0f7f','zhangxunxun1314@outlook.com',1,'5e788a.jpeg','ZionCheung',0,'13650502554','',1);
/*!40000 ALTER TABLE `zx_admin_user` ENABLE KEYS */;

#
# Structure for table "zx_article"
#

DROP TABLE IF EXISTS `zx_article`;
CREATE TABLE `zx_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_serial` varchar(255) NOT NULL DEFAULT '',
  `article_name` varchar(100) NOT NULL,
  `article_cover` varchar(100) NOT NULL,
  `article_content` text NOT NULL,
  `article_author` varchar(255) NOT NULL DEFAULT '',
  `article_time` int(10) unsigned NOT NULL,
  `article_like` int(10) unsigned NOT NULL DEFAULT '0',
  `article_click` int(10) unsigned NOT NULL DEFAULT '0',
  `article_sign` tinyint(3) NOT NULL DEFAULT '0',
  `article_sort` int(11) unsigned NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `lid` varchar(100) NOT NULL DEFAULT '0',
  `article_recycle` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `article_recycle_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `article_name` (`article_name`),
  UNIQUE KEY `article_serial` (`article_serial`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "zx_article"
#

/*!40000 ALTER TABLE `zx_article` DISABLE KEYS */;
INSERT INTO `zx_article` VALUES (2,'18091133130507','驱蚊器翁','20180928\\1da18466c19acb2e1dc9ff356fd379e0.jpg','<p>请问萨达萨达奥斯as</p>','ZionCheung',1538105637,0,6,1,0,1,3,'1,2,3,4,5,6,7',0,0);
/*!40000 ALTER TABLE `zx_article` ENABLE KEYS */;

#
# Structure for table "zx_article_cate"
#

DROP TABLE IF EXISTS `zx_article_cate`;
CREATE TABLE `zx_article_cate` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `cate_time` int(10) unsigned NOT NULL,
  `cate_belong` tinyint(1) NOT NULL DEFAULT '0',
  `cate_sort` int(2) unsigned NOT NULL DEFAULT '100',
  `cate_banner` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cate_name` (`cate_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "zx_article_cate"
#

/*!40000 ALTER TABLE `zx_article_cate` DISABLE KEYS */;
INSERT INTO `zx_article_cate` VALUES (1,'网站首页',1536817074,0,100,1),(2,'学海无涯',1536817081,0,100,0),(3,'心灵鸡汤',1536817085,0,100,1),(4,'喧嚣生活',1536817088,0,100,1),(5,'前端开发',1536817098,2,100,0),(6,'后端开发',1536817126,2,100,0),(7,'其他',1536817133,2,100,0),(8,'关于我',1536817144,0,100,0);
/*!40000 ALTER TABLE `zx_article_cate` ENABLE KEYS */;

#
# Structure for table "zx_auth_group"
#

DROP TABLE IF EXISTS `zx_auth_group`;
CREATE TABLE `zx_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `describe` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "zx_auth_group"
#

/*!40000 ALTER TABLE `zx_auth_group` DISABLE KEYS */;
INSERT INTO `zx_auth_group` VALUES (1,'普通管理员',1,'1,3,5','普通管理员'),(2,'超级管理员',1,'1,3,5,6,7,8,9','拥有所有权限'),(3,'网站编辑',1,'1,3,5,6,7','网站文章编辑');
/*!40000 ALTER TABLE `zx_auth_group` ENABLE KEYS */;

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
INSERT INTO `zx_auth_group_access` VALUES (1,2);
/*!40000 ALTER TABLE `zx_auth_group_access` ENABLE KEYS */;

#
# Structure for table "zx_auth_rule"
#

DROP TABLE IF EXISTS `zx_auth_rule`;
CREATE TABLE `zx_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "zx_auth_rule"
#

/*!40000 ALTER TABLE `zx_auth_rule` DISABLE KEYS */;
INSERT INTO `zx_auth_rule` VALUES (1,'admin/index/index','后台框架主页',1,1,'',0),(3,'admin/index/loginOut','退出登录',1,1,'',1),(5,'admin/home/home','后台桌面',1,1,'',1),(6,'admin/adminuser/adminuser','管理员列表',1,1,'',0),(7,'admin/articlecate/articleCate','文章分类列表',1,1,'',0),(8,'admin/rule/rule','权限规则列表',1,1,'',0),(9,'admin/role/role','权限组列表',1,1,'',0);
/*!40000 ALTER TABLE `zx_auth_rule` ENABLE KEYS */;

#
# Structure for table "zx_banner"
#

DROP TABLE IF EXISTS `zx_banner`;
CREATE TABLE `zx_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner_route` varchar(100) NOT NULL,
  `banner_time` int(11) NOT NULL,
  `banner_link` varchar(100) NOT NULL,
  `banner_desc` text,
  `cid` int(10) unsigned DEFAULT '0',
  `banner_sign` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `banner_sort` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `banner_route` (`banner_route`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "zx_banner"
#

/*!40000 ALTER TABLE `zx_banner` DISABLE KEYS */;
INSERT INTO `zx_banner` VALUES (1,'/static/upload/banner/5bac9ce2a3e34.jpg',1538039017,'213','',4,0,100),(2,'/static/upload/banner/5bac9d146bd11.jpg',1538039067,'12','',1,0,100);
/*!40000 ALTER TABLE `zx_banner` ENABLE KEYS */;

#
# Structure for table "zx_cate"
#

DROP TABLE IF EXISTS `zx_cate`;
CREATE TABLE `zx_cate` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL,
  `cate_time` int(10) unsigned NOT NULL,
  `cate_belong` tinyint(1) NOT NULL DEFAULT '0',
  `cate_sort` int(2) unsigned NOT NULL DEFAULT '100',
  `cate_banner` tinyint(3) NOT NULL DEFAULT '0',
  `cate_article` tinyint(3) NOT NULL DEFAULT '0',
  `cate_link` varchar(50) NOT NULL DEFAULT '',
  `cate_english_name` varchar(20) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cate_name` (`cate_name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "zx_cate"
#

/*!40000 ALTER TABLE `zx_cate` DISABLE KEYS */;
INSERT INTO `zx_cate` VALUES (1,'网站首页',1536817074,0,1,1,0,'index/index/index','home'),(2,'学海无涯',1536817081,0,2,0,0,'index/study/study','study'),(3,'心灵鸡汤',1536817085,0,3,1,1,'index/heart/heart','heart'),(4,'喧嚣生活',1536817088,0,4,1,1,'index/noisylife/noisylife','noisylife'),(5,'前端开发',1536817098,2,100,0,1,'','nose'),(6,'后端开发',1536817126,2,100,0,1,'','backend'),(7,'其他',1536817133,2,100,0,1,'','other'),(8,'关于我',1536817144,0,5,0,0,'index/aboutme/aboutme','aboutme');
/*!40000 ALTER TABLE `zx_cate` ENABLE KEYS */;

#
# Structure for table "zx_tags"
#

DROP TABLE IF EXISTS `zx_tags`;
CREATE TABLE `zx_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tags_title` varchar(50) NOT NULL,
  `tags_time` int(10) unsigned NOT NULL,
  `tags_sign` tinyint(3) unsigned DEFAULT '0',
  `tags_color` varchar(20) NOT NULL,
  `tags_desc` varchar(200) DEFAULT 'this is tags',
  `tags_sort` tinyint(3) unsigned DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_title` (`tags_title`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "zx_tags"
#

/*!40000 ALTER TABLE `zx_tags` DISABLE KEYS */;
INSERT INTO `zx_tags` VALUES (1,'版主原创',1537926304,1,'#82a6f5','本站原创内容',1),(2,'php',1537926350,1,'#3299bb','关于php的内容',2),(3,'div+css',1537926424,1,'#e08031','关于DIV+CSS页面构建的内容',3),(4,'javascript',1537926477,1,'#83af9b','关于js的内容',4),(5,'linux',1537926607,1,'#edc951','关于linux操作系统的文章',5),(6,'鸡汤文学',1537926692,1,'#fe4365','文字鸡汤',6),(7,'文学名著',1537926796,1,'#c7b3e5','文学名著,文学小说,著名文学作品',7),(8,'小常识',1537926862,1,'#3b200c','生活小常识',8);
/*!40000 ALTER TABLE `zx_tags` ENABLE KEYS */;
