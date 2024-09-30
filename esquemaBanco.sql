create table Usuario(
	CPF char(11) primary key,
	nome varchar(40) not null,
	dataNasc date not null
)
	
create table Guia(
	usuarioCPF char(11) primary key,
	habilitacaoGuia char(14) not null,
	foreign key (usuarioCPF) references Usuario(CPF)
)

create table Cliente(
	usuarioCPF char(11) primary key,
	foreign key (usuarioCPF) references Usuario(CPF)
)

create table Passeio(
	idPasseio serial primary key,
	HoraInicio time not null,
	dataInicio date not null,
	HoraFinal time not null,
	dataFinal date not null,
	nome varchar(60) not null,
	ranking varchar(2) not null,
	valor real not null,
	dataCompra date not null,
	tipoPagamento varchar(7) not null,
	clienteCPF char(11) not null,
	foreign key (clienteCPF) references Cliente(usuarioCPF)
)

create table DadosCartao(
	numero varchar(16) primary key,
	CVV varchar(4) not null,
	agencia varchar(5) not null,
	clienteCPF char(11) not null,
	foreign key (clienteCPF) references Cliente(usuarioCPF)
)

create table Guiar(
	guiaCPF char(11),
	idPasseio serial,
	primary key(guiaCPF, idPasseio),
	foreign key (guiaCPF) references Guia(usuarioCPF),
	foreign key (idPasseio) references Passeio(idPasseio)
)