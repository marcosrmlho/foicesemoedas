<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trabalhoFinal";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_errno) {
  die("Connection failed: $conn->connect_error");
};

$schema = "
create table if not exists Passeio(
	idPasseio int(11) primary key,
	HoraInicio time not null,
	dataInicio date not null,
	HoraFinal time not null,
	dataFinal date not null,
	nome varchar(60) not null,
	ranking varchar(2) not null,
	valor double(10,2) not null,
	imgSource varchar(40) not null,
	altImg varchar(40) not null,
	cardDir varchar(20) not null
);

create table if not exists Usuario(
	CPF char(11) primary key,
	nome varchar(40) not null,
	dataNasc date not null
);
	
create table if not exists Guia(
	usuarioCPF char(11) primary key,
	habilitacaoGuia char(14) not null,
	foreign key (usuarioCPF) references Usuario(CPF)
);

create table if not exists Cliente(
	usuarioCPF char(11) primary key,
	foreign key (usuarioCPF) references Usuario(CPF)
);

create table if not exists DadosCartao(
	numero varchar(16) primary key,
	CVV varchar(4) not null,
	agencia varchar(5) not null,
	clienteCPF char(11) not null,
	foreign key (clienteCPF) references Cliente(usuarioCPF)
);

create table if not exists Comprar (
	clienteCPF char(11),
	idPasseio int(11),
	dataCompra date not null,
	tipoPagamento varchar(7) not null,
	foreign key (clienteCPF) references Cliente(usuarioCPF),
	foreign key (idPasseio) references Passeio(idPasseio)
);

create table if not exists Guiar(
	guiaCPF char(11),
	idPasseio int(11),
	primary key(guiaCPF, idPasseio),
	foreign key (guiaCPF) references Guia(usuarioCPF),
	foreign key (idPasseio) references Passeio(idPasseio)
);
";

$schemaSQL = $conn -> multi_query($schema) or die($conn->error);


?>