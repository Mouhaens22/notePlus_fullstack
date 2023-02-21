/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     28/01/2023 18:54:30                          */
/*==============================================================*/


drop table if exists category;

drop table if exists notcad;

drop table if exists note;

drop table if exists user;

/*==============================================================*/
/* Table: category                                              */
/*==============================================================*/
create table category
(
   idcat                int not null,
   cat                  varchar(60),
   primary key (idcat)
);

/*==============================================================*/
/* Table: notcad                                                */
/*==============================================================*/
create table notcad
(
   idnote               int not null,
   idcat                int not null,
   primary key (idnote, idcat)
);

/*==============================================================*/
/* Table: note                                                  */
/*==============================================================*/
create table note
(
   idnote               int not null,
   username             varchar(20) not null,
   title                varchar(100),
   content              text,
   primary key (idnote)
);

/*==============================================================*/
/* Table: user                                                  */
/*==============================================================*/
create table user
(
   username             varchar(20) not null,
   fname                varchar(15),
   lname                varchar(15),
   dtnaissance          date,
   photo                varchar(40),
   tel                  bigint,
   primary key (username)
);

alter table notcad add constraint FK_in foreign key (idcat)
      references category (idcat) on delete restrict on update restrict;

alter table notcad add constraint FK_in2 foreign key (idnote)
      references note (idnote) on delete restrict on update restrict;

alter table note add constraint FK_write foreign key (username)
      references user (username) on delete restrict on update restrict;

-- alter table note add constraint FK_write foreign key (category)
--       references category (idcat) on delete restrict on update restrict;

-- alter table note add constraint FK_write foreign key (stat)
--       references stat (idstat) on delete restrict on update restrict;

