/* Arquivo criado para meus comandos mySql */

create database Anuidade;

use Anuidade;

create table Associados (
    IDAssociados int primary key auto_increment,
    Nome varchar(250) not null,
    CPF varchar(20) not null,
    DataFiliacao date not null,
    Email varchar(250) not null,
    Senha varchar(250) not null
);

create table Anuidade (
    IDAnuidade int primary key auto_increment,
    Ano int not null,
    Valor decimal(10,2) not null
);
alter table Anuidade add column Inadimplente varchar(10) not null;
