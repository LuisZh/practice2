
-- create table student
create table student(
id int not null auto_increment,
studentId varchar(20) not null,
name varchar(20) not null,
address varchar(20),
email varchar(20) not null,
phone int(11),
password varchar(64) not null,
birthday date, 
role varchar(20) not null default 'student',
primary key(ID)
)charset=utf8;

create table staff(
id int not null auto_increment,
staffId varchar(20) not null,
name varchar(20) not null,
email varchar(20) not null,
phone int(11),
password varchar(64) not null,
qualification varchar(20) not null,
expertise varchar(20) not null,
role varchar(20),
unit varchar(20),
s1 varchar(20) default '0',
s2 varchar(20) default '0',
w varchar(20) default '0',
s varchar(20) default '0',
primary key(ID)
)charset=utf8;

create table unit(
id int not null auto_increment,
unitName varchar(20) not null,
semesters varchar(20) not null,
campus varchar(20) not null,
description varchar(64) not null,
lecturer varchar(20),
coordinator varchar(20),
primary key(ID)
)charset=utf8;

create table teach(
id int not null auto_increment,
unitName varchar(20) not null,
sessionType varchar(20) not null,
lecturer varchar(20) not null,
tutor varchar(64) not null,
day varchar(20) not null,
time varchar(20) not null,
capacity int default '0',
primary key(ID)
)charset=utf8;

create table enrollment(
id int not null auto_increment,
unitName varchar(20) not null,
studentId varchar(20) not null,
primary key(ID)
)charset=utf8;

create table allocation(
id int not null auto_increment,
unitName varchar(20) not null,
studentId varchar(20) not null,
studentName varchar(20) not null,
teachId varchar(20) not null,
primary key(ID)
)charset=utf8;
