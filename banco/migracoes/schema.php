<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kamikazeRadical";

$conn = new mysqli($servername, $username, $password);
$conn -> query('create database kamikazeRadical');

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_errno) {
  die("Connection failed: $conn->connect_error");
};

$schema = "
create table if not exists Passeio(
	idPasseio int(11) primary key,
	horaInicio time not null,
	dataInicio date not null,
	horaFinal time not null,
	dataFinal date not null,
	nome varchar(60) not null,
	ranking varchar(2) not null,
	valor double(10,2) not null,
	imgSource varchar(40) not null,
	altImg varchar(40) not null,
	cardDir varchar(20) not null,
	descricao mediumtext null
);
create table if not exists Usuario(
	usuarioCPF char(11) primary key,
	nome varchar(40) not null,
	dataNasc date not null,
	usuarioEmail varchar(49) not null unique,
	usuarioSenha varchar(64) not null,
	usuarioTel char(11) not null,
	usuarioTipo varchar(8) not null
);	
create table if not exists Guia(
	guiaCPF char(11) primary key,
	habilitacaoGuia char(14) not null,
	foreign key (guiaCPF) references Usuario(usuarioCPF)
);
create table if not exists Cliente(
	clienteCPF char(11) primary key,
	foreign key (clienteCPF) references Usuario(usuarioCPF)
);

create table if not exists Comprar (
	clienteCPF char(11),
	idPasseio int(11),
	dataCompra date not null,
	foreign key (clienteCPF) references Cliente(clienteCPF),
	foreign key (idPasseio) references Passeio(idPasseio)
);

create table if not exists Carrinho(
	clienteCPF char(11) not null,
	idPasseio int(11) not null,
	primary key(clienteCPF, idPasseio),
	foreign key (clienteCPF) references Cliente(clienteCPF),
	foreign key (idPasseio) references Passeio(idPasseio)
)
";

if ($conn -> multi_query($schema)){
	echo "Esquema do Banco de Dados criado!";
};


?>