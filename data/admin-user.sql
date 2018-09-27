CREATE DATABASE
IF NOT EXISTS zxxblog;
use zxxblog;
CREATE TABLE
IF NOT EXISTS zx_admin_user
(
    id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ad_username VARCHAR
(20)NOT NULL UNIQUE,
    ad_password CHAR
(32)NOT NULL,
    ad_email VARCHAR
(50)NOT NULL,
    ad_sign TINYINT
(1) DEFAULT 0,
    ad_rank TINYINT UNSIGNED NOT NULL,
    ad_headimg VARCHAR
(100) DEFAULT 'admin.jpg',
    ad_name VARCHAR(50) DEFAULT '管理员'
);
INSERT INTO zx_admin_user(ad_username,ad_password,ad_email,ad_sign,ad_rank)VALUES('admin','21232f297a57a5a743894a0e4a801fc3','939129894@qq.com',
'1','1');