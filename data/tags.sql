drop table if exists `zx_tags`;
create table `zx_tags`
(
    `id` int unsigned auto_increment not null,
    `tags_title` varchar(50) not null,
    `tags_time` int unsigned not null,
    `tags_sign` tinyint unsigned default 0,
    `tags_color` varchar(20) not null,
    `tags_desc` varchar(200) default 'this is tags',
    `tags_sort` tinyint unsigned DEFAULT 100,
    primary key (`id`),
    unique key (`tags_title`)
)engine=MyISAM default charset=utf8;