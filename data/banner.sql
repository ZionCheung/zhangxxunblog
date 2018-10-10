DROP TABLE IF EXISTS zx_banner;

CREATE table zx_banner
(
    id int
    UNSIGNED AUTO_INCREMENT NOT NULL,
    banner_route VARCHAR
    (100) NOT NULL,
    banner_time int NOT NULL,
    banner_link VARCHAR
    (100) NOT NULL,
    banner_desc text DEFAULT '',
    cid int UNSIGNED DEFAULT 0,
    PRIMARY KEY
    (id),
    UNIQUE KEY
    (banner_route)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;