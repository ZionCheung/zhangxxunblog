DROP TABLE IF EXISTS zx_comment;
CREATE TABLE zx_comment
(
    id INT
    UNSIGNED AUTO_INCREMENT NOT NULL,
    comment_name VARCHAR
    (50) DEFAULT '网友',
    comment_content VARCHAR
    (200)NOT NULL,
    comment_time INT NOT NULL,
    comment_like INT NOT NULL,
    comment_ip VARCHAR
    (100)NOT NULL,
    comment_level INT DEFAULT 0,
    article_id INT NOT NULL,
    PRIMARY KEY
    (id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;