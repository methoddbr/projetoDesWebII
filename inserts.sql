/* Inserts MARCA */
insert into Marca (descricao) values ('Chevrolet');
insert into Marca (descricao) values ('Fiat');
insert into Marca (descricao) values ('Ford');
insert into Marca (descricao) values ('Renault');
insert into Marca (descricao) values ('Volkswagen');

/* Inserts TIPO */
insert into cliente (nome, email, senha, telefone) values ('Roger', 'roger@a.com', '1234', '12345678');
insert into pessoa_fisica (id_cliente, sobrenome, cpf, habilitacao, dt_nascimento, sexo) values ('1', 'Cascaes', '11111111', '12345678910', '14-04-1994', 'M');

insert into cliente (nome, email, senha, telefone) values ('Empresa', 'empresa@a.com', '4321', '222222222');
insert into pessoa_juridica (id_cliente, cnpj, ie) values ('2', '2222222-22', '2222');

insert into cidade (uf, descricao) values ('RS', 'Osorio');

insert into locadora (nome) values ('Locadora 01');
insert into filial (id_locadora, id_cidade, cnpj, ie, email, senha, telefone, endereco) values ('1', '1', '111111-11', '111', 'locadora@a.com', '4321', '(11)1111-1111', 'dasdasdadas');