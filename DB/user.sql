DROP DATABASE IF EXISTS erbgalpha;
CREATE DATABASE erbgalpha DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE userdb;
--用户表
DROP TABLE erbg_user;
CREATE TABLE erbg_user(
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(36) NOT NULL,
createtime int(11) NOT NULL,
createip int(11) DEFAULT NULL,
PRIMARY KEY (id)
);

--招聘信息表
DROP TABLE erbg_recruitment;
CREATE TABLE erbg_recruitment(
id int(11) NOT NULL AUTO_INCREMENT,
title varchar(128) NOT NULL,
location varchar(128),
department varchar(64),
deadline varchar(64),
description varchar(4096),
salary varchar(64),
jobdescription varchar(4096),
jobqualification varchar(4096),
otherdescription varchar(4096),
email varchar(128),
telephone varchar(32),
PRIMARY KEY (id)
);