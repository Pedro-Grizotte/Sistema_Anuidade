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
    Ano date not null,
    Valor decimal(10,2) not null
);

create table AnuidadeAssociados (
    IDAnuidadeAssociados int primary key auto_increment,
    AssociadosID int not null,
    Ano int not null,
    Pago tinyint(1)
);

/* Adicionando Foreign Key na Tabela AnuidadeAssociados */
alter table AnuidadeAssociados
add foreign key(AssociadosID)
references Associados(IDAssociados);

 

