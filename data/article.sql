drop table if exists `zx_article`;
create table `zx_article`(
    id int unsigned auto_increment not null,
    article_name varchar(100)not null,
    article_cover varchar(100)not null,
    article_content text not null,
    article_time  int unsigned not null,
    article_like  int unsigned not null,
    article_click  int unsigned not null,
    `uid` int unsigned not null,
    `cid` int unsigned not null,
    `lid` int unsigned not null,
    primary key (`id`),
    unique key (`article_name`)
)engine=MyISAM default charset=utf8;