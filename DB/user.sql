/*用户表*/
DROP TABLE erbg_user;
CREATE TABLE erbg_user(
id int(11) NOT NULL AUTO_INCREMENT,
username varchar(20) NOT NULL,
password varchar(36) NOT NULL,
createtime int(11) NOT NULL,
createip int(11) DEFAULT NULL,
PRIMARY KEY (id)
);

