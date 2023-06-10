create database dw_tokosepatuasli;
use dw_tokosepatuasli;

/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     24/04/2023 18:33:47                          */
/*==============================================================*/


drop table if exists CART;

drop table if exists CUSTOMER;

drop table if exists DETAIL_TRANSACTION;

drop table if exists PRODUCT;

drop table if exists PRODUCT_CART;

drop table if exists PRODUCT_SUPPLIER;

drop table if exists SUPPLIER;

drop table if exists TRANSACTION;
set foreign_key_checks=0;

/*==============================================================*/
/* Table: CART                                                  */
/*==============================================================*/
create table CART
(
   CART_ID              varchar(10) not null,
   CUST_ID              varchar(6) not null,
   primary key (CART_ID)
);
/*==============================================================*/
/* Table: CUSTOMER                                              */
/*==============================================================*/
create table CUSTOMER
(
   CUST_ID              varchar(6) not null,
   CUST_NAME            varchar(100) not null,
   CUST_PHONE           varchar(13) not null,
   CUST_EMAIL           varchar(100) not null,
   CUST_PASS			varchar(100) not null,
   CUST_CONFIRM			varchar(100) not null,
   primary key (CUST_ID)
);
/*==============================================================*/
/* Table: DETAIL_TRANSACTION                                    */
/*==============================================================*/
create table DETAIL_TRANSACTION
(
   PRODUCT_ID           varchar(10) not null,
   TRANSACTION_ID       varchar(10) not null,
   TRANSACTION_QTY      int not null,
   TRANSACTION_SUBTOTAL int not null,
   primary key (PRODUCT_ID, TRANSACTION_ID)
);

/*==============================================================*/
/* Table: PRODUCT                                               */
/*==============================================================*/
create table PRODUCT
(
   PRODUCT_ID           varchar(10) not null,
   PRODUCT_NAME         varchar(200) not null,
   PRODUCT_COLOR        varchar(20) not null,
   PRODUCT_SIZE         int not null,
   PRODUCT_BRAND        varchar(20) not null,
   PRODUCT_PRICE        int not null,
   PRODUCT_QTY			int not null,
   PRODUCT_IMG			varchar(300) not null,
   PRODUCT_LINK			varchar(100) not null,
   PRODUCT_IMG_SAMPING1	varchar(300),
   PRODUCT_IMG_SAMPING2	varchar(300),
   PRODUCT_IMG_BLKG		varchar(300),
   PRODUCT_DESK			varchar(9000) not null,
   primary key (PRODUCT_ID)
);

/*==============================================================*/
/* Table: PRODUCT_CART                                          */
/*==============================================================*/
create table PRODUCT_CART
(
   PRODUCT_ID           varchar(10) not null,
   CART_ID              varchar(10) not null,
   PRODUCT_NAME		varchar(200) not null,
   PRODUCT_PRICE        int not null,
   PRODUCT_QTY          int not null,
   TOTAL_PRICE			int not null,
   primary key (PRODUCT_ID, CART_ID)
);

/*==============================================================*/
/* Table: PRODUCT_SUPPLIER                                      */
/*==============================================================*/
create table PRODUCT_SUPPLIER
(
   PRODUCT_ID           varchar(10) not null,
   SUPPLIER_ID          varchar(6) not null,
   SUPPLIER_DATE        date not null,
   QTY                  int not null,
   BPRICE               int not null,
   primary key (PRODUCT_ID, SUPPLIER_ID)
);

/*==============================================================*/
/* Table: SUPPLIER                                              */
/*==============================================================*/
create table SUPPLIER
(
   SUPPLIER_ID          varchar(6) not null,
   SUPPLIER_NAME        varchar(100) not null,
   SUPPLIER_EMAIL       varchar(100) not null,
   SUPPLIER_PHONE       varchar(13) not null,
   primary key (SUPPLIER_ID)
);

/*==============================================================*/
/* Table: TRANSACTION                                           */
/*==============================================================*/
create table TRANSACTION
(
   TRANSACTION_ID       varchar(10) not null,
   CUST_ID              varchar(6) not null,
   TRANSACTION_DATE     date not null,
   TRANSACTION_AMOUNT   int not null,
   FIRST_NAME			varchar(50) not null,
   LAST_NAME			varchar(50) not null,
   COMPANY_NAME			varchar(100),
   ADDRESS				varchar(200) not null,
   EMAIL				varchar(50) not null,
   NO_TLP				varchar(20) not null,
   ORDER_NOTE			varchar(1000),
   primary key (TRANSACTION_ID)
);

CREATE TABLE contact_us (
   CONTACT_ID INT(11) AUTO_INCREMENT,
   NAME VARCHAR(255),
   EMAIL VARCHAR(255),
   SUBJECT VARCHAR(255),
   MESSAGE VARCHAR(255),
   PRIMARY KEY (CONTACT_ID)
);


set foreign_key_checks = 0;
drop table transaction;

alter table CART add constraint FK_CUSTOMER_CART foreign key (CUST_ID)
      references CUSTOMER (CUST_ID) on delete restrict on update restrict;

alter table DETAIL_TRANSACTION add constraint FK_PRODUCT_TRANSACTION foreign key (PRODUCT_ID)
      references PRODUCT (PRODUCT_ID) on delete restrict on update restrict;

alter table DETAIL_TRANSACTION add constraint FK_PRODUCT_TRANSACTION2 foreign key (TRANSACTION_ID)
      references TRANSACTION (TRANSACTION_ID) on delete restrict on update restrict;

alter table PRODUCT_CART add constraint FK_PRODUCT_CART foreign key (PRODUCT_ID)
      references PRODUCT (PRODUCT_ID) on delete restrict on update restrict;

alter table PRODUCT_CART add constraint FK_PRODUCT_CART2 foreign key (CART_ID)
      references CART (CART_ID) on delete restrict on update restrict;

alter table PRODUCT_SUPPLIER add constraint FK_PRODUCT_SUPPLIER foreign key (PRODUCT_ID)
      references PRODUCT (PRODUCT_ID) on delete restrict on update restrict;

alter table PRODUCT_SUPPLIER add constraint FK_PRODUCT_SUPPLIER2 foreign key (SUPPLIER_ID)
      references SUPPLIER (SUPPLIER_ID) on delete restrict on update restrict;

alter table TRANSACTION add constraint FK_CUSTOMER_TRANSACTION foreign key (CUST_ID)
      references CUSTOMER (CUST_ID) on delete restrict on update restrict;

