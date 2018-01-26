create user '91picture'@'localhost' identified by '91picture';
grant all privileges on 91picture.* to '91picture'@'localhost';
create database 91picture;
show databases;
use 91picture;

create table if not exists categories(
id int unsigned not null auto_increment primary key comment 'ID',
name varchar(255) not null default '' comment '名称',
sort tinyint unsigned not null default 255 comment '排序，越小越靠前',
status tinyint unsigned not null default 1 comment '状态：0-删除，1-正常',
created_by int unsigned not null default 0 comment '创建者',
updated_by int unsigned not null default 0 comment '修改者',
created_at datetime not null default CURRENT_TIMESTAMP comment '创建时间',
updated_at datetime not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '更新时间',
unique key unique_name(name)
)engine=innodb default charset=utf8 comment '分类表';

create table if not exists pictures(
id int unsigned not null auto_increment primary key comment 'ID',
category_id int unsigned not null default 0 comment '分类ID',
title varchar(255) not null default '' comment '标题',
sort tinyint unsigned not null default 255 comment '排序，越小越靠前',
status tinyint unsigned not null default 1 comment '状态：0-删除，1-正常',
created_by int unsigned not null default 0 comment '创建者',
updated_by int unsigned not null default 0 comment '修改者',
created_at datetime not null default CURRENT_TIMESTAMP comment '创建时间',
updated_at datetime not null default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP comment '更新时间'
)engine=innodb default charset=utf8 comment '图片表';