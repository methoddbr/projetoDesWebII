create database motorLocacao;
use motorLocacao;

CREATE TABLE Cliente (
	id_cliente INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	email VARCHAR(30) NOT NULL,
	senha VARCHAR(15) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	PRIMARY KEY (id_cliente)
);

CREATE TABLE Pessoa_juridica (
	id_pesJuridica INTEGER NOT NULL AUTO_INCREMENT,
	id_cliente INTEGER NOT NULL,
	cnpj VARCHAR(17) NOT NULL,
	ie VARCHAR(15) NOT NULL,
	PRIMARY KEY (id_pesJuridica),
	FOREIGN KEY (id_cliente) REFERENCES Cliente (id_cliente)
);

CREATE TABLE Pessoa_fisica (
	id_pesFisica INTEGER NOT NULL AUTO_INCREMENT,
	id_cliente INTEGER NOT NULL,
	sobrenome VARCHAR(30) NOT NULL,
	cpf VARCHAR(14) NOT NULL,
	habilitacao VARCHAR(11) NOT NULL,
	dt_nascimento VARCHAR(10) NOT NULL,
	sexo CHAR(1) NOT NULL,
	PRIMARY KEY (id_pesFisica),
	FOREIGN KEY (id_cliente) REFERENCES Cliente (id_cliente)
);

CREATE TABLE Acessorios (
	id_acessorio INTEGER NOT NULL AUTO_INCREMENT,
	gps BIT NOT NULL,
	ar BIT NOT NULL,
	radio BIT NOT NULL,
	camera BIT NOT NULL,
	sensor BIT NOT NULL,
	direcao BIT NOT NULL,
	automatico BIT NOT NULL,
	PRIMARY KEY (id_acessorio)
);

CREATE TABLE Marca (
	id_marca INTEGER NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_marca)
);

CREATE TABLE Tipo (
	id_tipo INTEGER NOT NULL AUTO_INCREMENT,
	tipo VARCHAR(30) NOT NULL,
	capacidade INTEGER NOT NULL,
	PRIMARY KEY (id_tipo)
);

CREATE TABLE Modelo (
	id_modelo INTEGER NOT NULL AUTO_INCREMENT,
	id_marca INTEGER NOT NULL,
	id_tipo INTEGER NOT NULL,
	descricao VARCHAR(30) NOT NULL,
	ano INTEGER NOT NULL,
	motor VARCHAR(30) NOT NULL,
	nr_portas INTEGER NOT NULL,
	nr_passageiros INTEGER NOT NULL,
	PRIMARY KEY (id_modelo),
	FOREIGN KEY (id_marca) REFERENCES Marca (id_marca),
	FOREIGN KEY (id_tipo) REFERENCES Tipo (id_tipo)
);

CREATE TABLE Cidade (
	id_cidade INTEGER NOT NULL AUTO_INCREMENT,
	uf VARCHAR(2) NOT NULL,
	descricao VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_cidade)
);

CREATE TABLE Locadora (
	id_locadora INTEGER NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	PRIMARY KEY (id_locadora)
);

CREATE TABLE Filial (
	id_filial INTEGER NOT NULL AUTO_INCREMENT,
	id_locadora INTEGER NOT NULL,
	id_cidade INTEGER NOT NULL,
	cnpj VARCHAR(17) NOT NULL,
	ie VARCHAR(15) NOT NULL,
	email VARCHAR(30) NOT NULL,
	senha VARCHAR(15) NOT NULL,
	telefone VARCHAR(15) NOT NULL,
	endereco VARCHAR(60) NOT NULL,
	PRIMARY KEY (id_filial),
	FOREIGN KEY (id_locadora) REFERENCES Locadora (id_locadora),
	FOREIGN KEY (id_cidade) REFERENCES Cidade (id_cidade)
);

CREATE TABLE Veiculo (
	chassi VARCHAR(17) NOT NULL,
	id_filial INTEGER NOT NULL,
	id_modelo INTEGER NOT NULL,
	id_acessorio INTEGER NOT NULL,
	placa VARCHAR(8) NOT NULL,
	km INTEGER NOT NULL,
	cor VARCHAR(30) NOT NULL,
	imagem VARCHAR(50) NOT NULL,
	valor DECIMAL(8,2) NOT NULL,
	PRIMARY KEY (chassi),
	FOREIGN KEY (id_filial) REFERENCES Filial (id_filial),
	FOREIGN KEY (id_modelo) REFERENCES Modelo (id_modelo),
	FOREIGN KEY (id_acessorio) REFERENCES Acessorios (id_acessorio)
);

CREATE TABLE aluga_Reserva (
	id_reserva INTEGER NOT NULL AUTO_INCREMENT,
	id_cliente INTEGER NOT NULL,
	chassi VARCHAR(17) NOT NULL,
	dt_entrega VARCHAR(10) NOT NULL,
	dt_retirada VARCHAR(10) NOT NULL,
	valor DECIMAL(8,2) NOT NULL,
	PRIMARY KEY (id_reserva),
	FOREIGN KEY(id_cliente) REFERENCES Cliente (id_cliente),
	FOREIGN KEY(chassi) REFERENCES Veiculo (chassi)
);