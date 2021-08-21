create database human;
use human;
create table user(
                     id int(6) unsigned auto_increment primary key ,
                     name varchar (255) not null ,
                     birthday varchar (255) not null ,
                     username varchar (255) not null ,
                     mail varchar (255) not null ,
                     password varchar (255) not null ,
                     sickness varchar (255) not null ,
                     bio varchar (255) not null ,
                     avatar varchar (255) not null ,
                     header_img varchar (255) not null
);
create table friend (
                        id int(6) unsigned auto_increment primary key ,
                        user_1 varchar (255) not null ,
                        user_2 varchar(255) not null ,
                        acc varchar (15) default 0
);
create table  post (
                       id int(6) unsigned auto_increment primary key ,
                       user varchar (255) not null ,
                       title varchar (255) not null ,
                       description varchar (1500) not null ,
                       access varchar (25) default 0
);
create table comment (
                         id int(6) unsigned auto_increment primary key ,
                         user varchar (255) not null ,
                         description varchar (255) not null ,
                         post_id varchar (255) not null ,
                         reply varchar (255) default 0
);
create table like_post (
                           id int(6) unsigned auto_increment primary key ,
                           user varchar (255) not null ,
                           post_id varchar (255) not null
);
create table like_reply (
                            id int(6) unsigned auto_increment primary key ,
                            user varchar (255) not null ,
                            post_id varchar (255) not null
);
create table pm_chat (
                         id int(6) unsigned auto_increment primary key ,
                         user_1 varchar (255) not null ,
                         user_2 varchar(255) not null ,
                         pm varchar (1500) not null ,
                         voice varchar (255) not null ,
                         imag varchar (255) not null ,
                         video varchar (255) not null
);
create table chat_room (
                           id int(6) unsigned auto_increment primary key ,
                           user_creator varchar (255) not null ,
                           title varchar (255) not null ,
                           image varchar (255) not null
);
create  table chat_room_user(
                                id int(6) unsigned auto_increment primary key ,
                                chat_room varchar(255) not null ,
                                user varchar(255) not null
);
create  table chat_room_pm(
                              id int(6) unsigned auto_increment primary key ,
                              pm varchar(255) not null ,
                              user varchar(255) not null
);