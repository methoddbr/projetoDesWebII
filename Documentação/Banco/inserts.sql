/* Inserts MARCA */
insert into Marca (descricao) values ('Chevrolet');
insert into Marca (descricao) values ('Fiat');
insert into Marca (descricao) values ('Ford');
insert into Marca (descricao) values ('Renault');
insert into Marca (descricao) values ('Volkswagen');

/* Inserts TIPO */
insert into tipo (tipo, capacidade) values ('Passeio', '300');
insert into tipo (tipo, capacidade) values ('Passeio', '500');

/* Inserts MODELO */
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('1', '1', 'Celta', '2008', 'Flex 1.0', '2', '5');
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('2', '1', 'Uno', '2010', 'Flex 1.0', '2', '5');
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('3', '1', 'Ka', '2013', 'Flex 1.0', '4', '5');
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('4', '2', 'Sandero', '2016', 'Flex 1.4', '4', '5');
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('5', '1', 'Gol', '2012', 'Flex 1.0', '4', '5');
insert into modelo (id_marca, id_tipo, descricao, ano, motor, nr_portas, nr_passageiros) values ('1', '2', 'Onix', '2017', 'Flex 1.0', '4', '5');

/* Inserts ACESSORIOS */
insert into acessorios (gps, ar, radio, camera, sensor, direcao, automatico) values (false, false, false, false, false, false, false);
insert into acessorios (gps, ar, radio, camera, sensor, direcao, automatico) values (false, true, true, false, false, false, false);
insert into acessorios (gps, ar, radio, camera, sensor, direcao, automatico) values (false, true, true, false, true, true, false);

/* Inserts VEICULO */
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('AAA111AAA111', '1', '1', '1', 'AAA-1111', '167000', 'PRATA', '', '70.00');
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('BBB222BBB222', '1', '2', '1', 'BBB-2222', '127000', 'VERMELHO', '', '75.00');
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('CCC333CCC333', '1', '6', '2', 'CCC-3333', '35000', 'BRANCO', '', '85.00');
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('AAA222AAA222', '2', '1', '1', 'AAA-2222', '167000', 'PRATA', '', '70.00');
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('BBB333BBB333', '2', '2', '1', 'BBB-3333', '127000', 'VERMELHO', '', '75.00');
INSERT INTO veiculo (chassi, id_filial, id_modelo, id_acessorio, placa, km, cor, imagem, valor) VALUES ('CCC444CCC444', '3', '6', '2', 'CCC-4444', '35000', 'BRANCO', '', '85.00');





/* Inserts para TESTE */
insert into cliente (nome, email, senha, telefone) values ('Roger', 'roger@a.com', '1234', '12345678');
insert into pessoa_fisica (id_cliente, sobrenome, cpf, habilitacao, dt_nascimento, sexo) values ('1', 'Cascaes', '11111111', '12345678910', '14-04-1994', 'M');

insert into cliente (nome, email, senha, telefone) values ('Empresa 01', 'empresa01@a.com', '4321', '222222222');
insert into pessoa_juridica (id_cliente, cnpj, ie) values ('2', '2222222-22', '2222');

insert into cidade (uf, descricao) values ('RS', 'Osorio');
insert into cidade (uf, descricao) values ('RS', 'Tramandai');
insert into cidade (uf, descricao) values ('RS', 'Imbe');
insert into cidade (uf, descricao) values ('RS', 'Xangrila');

insert into locadora (nome, email, senha) values ('Locadora 01', 'locadora01@a.com', '4321');
insert into locadora (nome, email, senha) values ('Locadora 02', 'locadora02@a.com', '4321');
insert into locadora (nome, email, senha) values ('Locadora 03', 'locadora03@a.com', '4321');
insert into filial (id_locadora, id_cidade, cnpj, ie, telefone, endereco) values ('1', '1', '111111-11', '111', '(11)1111-1111', 'dasdasdadas');
insert into filial (id_locadora, id_cidade, cnpj, ie, telefone, endereco) values ('2', '2', '222222-22', '222', '(22)2222-2222', 'bbbbbbb');
insert into filial (id_locadora, id_cidade, cnpj, ie, telefone, endereco) values ('3', '3', '333333-33', '333', '(33)3333-3333', 'cccccccccc');