CREATE TABLE IF NOT EXISTS zx_article_cate(
    id tinyint unsigned auto_increment primary key,
    cate_name varchar(50)NOT null unique,
    cate_rank tinyint unsigned default '0',
    cate_time int unsigned not null
);