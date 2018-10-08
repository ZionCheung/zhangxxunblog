# Host: localhost  (Version: 5.5.53)
# Date: 2018-10-08 12:01:01
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

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
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

#
# Data for table "zx_auth_rule"
#

/*!40000 ALTER TABLE `zx_auth_rule` DISABLE KEYS */;
INSERT INTO `zx_auth_rule` VALUES (1,'admin/Adminuser/adminUser','管理员列表',1,1,'',0),(2,'admin/Adminuser/addAdminUser','添加界面',1,1,'',1),(3,'admin/Adminuser/addAdminUserHandle','添加处理',1,1,'',1),(4,'admin/Adminuser/deleteAdminUser','删除',1,1,'',1),(5,'admin/Adminuser/updateUserOnOff','登陆开关',1,1,'',1),(6,'admin/Adminuser/updateUser','编辑界面',1,1,'',1),(7,'admin/Adminuser/updateUserHandle','编辑处理',1,1,'',1),(8,'admin/Adminuser/updateHeadHandle','编辑头像',1,1,'',1),(9,'admin/Adminuser/adAccess','管理员权限列表',1,1,'',0),(10,'admin/Adminuser/addUserAccess','配置权限界面',1,1,'',9),(11,'admin/Adminuser/addUserAccessHandle','配置权限处理',1,1,'',9),(12,'admin/Article/article','文章列表',1,1,'',0),(13,'admin/Article/addArticle','添加界面',1,1,'',12),(14,'admin/Article/articleAddHandle','添加处理',1,1,'',12),(15,'admin/Article/articleNameValidation','名称检测',1,1,'',12),(16,'admin/Article/articleCoverMapHandle','封面图上传',1,1,'',12),(17,'admin/Article/articlePreView','预览界面',1,1,'',12),(18,'admin/Article/articleRecycleBin','移入回收站',1,1,'',12),(19,'admin/Article/articleUpDate','编辑界面',1,1,'',12),(20,'admin/Article/articleUpDateHandle','编辑处理',1,1,'',12),(21,'admin/Article/articleSign','发布/撤回',1,1,'',12),(22,'admin/Article/articleSort','排序',1,1,'',12),(23,'admin/Article/articleRecycleBinList','回收站列表',1,1,'',0),(24,'admin/Article/articleRecovery','恢复',1,1,'',23),(25,'admin/Article/articleDelete','彻底删除',1,1,'',23),(26,'admin/Banner/banner','轮播列表',1,1,'',0),(27,'admin/Banner/addBanner','添加界面',1,1,'',26),(28,'admin/Banner/addBannerHandle','添加处理',1,1,'',26),(29,'admin/Banner/addBannerImgHandle','图片上传',1,1,'',26),(30,'admin/Banner/bannerImg','上传预览',1,1,'',26),(31,'admin/Banner/bannerOnOff','发布/撤回',1,1,'',26),(32,'admin/Banner/deleteBanner','删除',1,1,'',26),(33,'admin/Banner/bannerPreview','预览',1,1,'',26),(34,'admin/Banner/bannerUpdate','编辑界面',1,1,'',26),(35,'admin/Banner/bannerUpdateHandle','编辑处理',1,1,'',26),(36,'admin/Banner/bannerOrderUpdate','排序',1,1,'',26),(37,'admin/Role/role','权限角色列表',1,1,'',0),(38,'admin/Role/addRole','添加列表',1,1,'',37),(41,'admin/Role/addRoleHandle','添加处理',1,1,'',37),(42,'admin/Role/deleteRole','删除',1,1,'',37),(43,'admin/Role/updateOnOffRole','角色开关',1,1,'',37),(45,'admin/Role/updateRole','编辑界面',1,1,'',37),(46,'admin/Role/updateRoleHandle','编辑处理',1,1,'',37),(47,'admin/Rule/rule','权限规则列表',1,1,'',0),(48,'admin/Rule/addRule','添加界面',1,1,'',47),(49,'admin/Rule/addRuleHandle','添加处理',1,1,'',47),(50,'admin/Rule/updateRule','编辑界面',1,1,'',47),(51,'admin/Rule/updateRuleHandle','编辑处理',1,1,'',47),(52,'admin/Rule/updataOnOffRule','规则开关',1,1,'',47),(53,'admin/Rule/deleteRule','删除',1,1,'',47),(54,'admin/Tags/tags','标签列表',1,1,'',0),(55,'admin/Tags/addTags','添加界面',1,1,'',54),(56,'admin/Tags/addTagsHandle','添加处理',1,1,'',54),(57,'admin/Tags/tagsSort','排序',1,1,'',54),(58,'admin/Tags/tagsSign','开关',1,1,'',54),(59,'admin/Tags/tagsUpdate','编辑界面',1,1,'',54),(60,'admin/Tags/updateTagsHandle','编辑处理',1,1,'',54),(61,'admin/Tags/tagsDelete','删除',1,1,'',54),(62,'admin/WebCate/cate','分类列表',1,1,'',0),(63,'admin/WebCate/addCate','添加界面',1,1,'',62),(64,'admin/WebCate/addCateHandle','添加处理',1,1,'',62),(65,'admin/WebCate/cateNameHandle','名称验证',1,1,'',62),(66,'admin/WebCate/upDateCate','编辑界面',1,1,'',62),(67,'admin/WebCate/upDateCateHandle','编辑处理',1,1,'',62),(68,'admin/WebCate/upDateSortHandle','排序',1,1,'',62),(69,'admin/WebCate/deleteHandle','删除',1,1,'',62);
/*!40000 ALTER TABLE `zx_auth_rule` ENABLE KEYS */;
