create database pruebas;
use pruebas;
create table productos(
cod int primary key,
descripcion text,
precio decimal(10,2),
stock int);
create table clientes(
dni varchar(100) primary key,
nombre varchar(100),
apellidos varchar(100),
email varchar(100),
fechadenacimiento date);
