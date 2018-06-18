/* Testé sous MySQL 5.x */

drop table if exists T_COMMENT;
drop table if exists T_POST;
drop table if exists T_USER;

create table T_POST (
  POST_ID integer primary key auto_increment,
  POST_DATE datetime not null,
  POST_TITLE varchar(100) not null,
  POST_CONTENT varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_COMMENT (
  COM_ID integer primary key auto_increment,
  COM_DATE datetime not null,
  COM_AUTHOR varchar(100) not null,
  COM_CONTENT varchar(200) not null,
  POST_ID integer not null,
  constraint fk_com_bil foreign key(POST_ID) references T_POST(POST_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_USER (
  USER_ID integer primary key auto_increment,
  USER_LOGIN varchar(100) not null,
  USER_PW varchar(100) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into T_POST(POST_DATE, POST_TITLE, POST_CONTENT) values
(NOW(), 'Premier billet', 'Bonjour monde ! Ceci est le premier billet sur mon blog.');
insert into T_POST(POST_DATE, POST_TITLE, POST_CONTENT) values
(NOW(), 'Au travail', 'Il faut enrichir ce blog dès maintenant.');

insert into T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POST_ID) values
(NOW(), 'A. Nonyme', 'Bravo pour ce début', 1);
insert into T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POST_ID) values
(NOW(), 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1);

insert into T_USER(USER_LOGIN, USER_PW) values
('admin', 'secret');