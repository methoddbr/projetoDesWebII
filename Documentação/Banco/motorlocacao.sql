-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Dez-2017 às 04:09
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorlocacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorios`
--

CREATE TABLE `acessorios` (
  `id_acessorio` int(11) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `gps` bit(1) NOT NULL,
  `ar` bit(1) NOT NULL,
  `radio` bit(1) NOT NULL,
  `camera` bit(1) NOT NULL,
  `sensor` bit(1) NOT NULL,
  `direcao` bit(1) NOT NULL,
  `automatico` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acessorios`
--

INSERT INTO `acessorios` (`id_acessorio`, `descricao`, `gps`, `ar`, `radio`, `camera`, `sensor`, `direcao`, `automatico`) VALUES
(1, 'Econômico', b'0', b'0', b'0', b'0', b'0', b'0', b'0'),
(2, 'Econômico(AR+RADIO)', b'0', b'1', b'1', b'0', b'0', b'0', b'0'),
(3, 'Executivo(AR+RADIO+SENSOR+DH)', b'0', b'1', b'1', b'0', b'1', b'1', b'0'),
(4, 'Completo', b'1', b'1', b'1', b'1', b'1', b'1', b'0'),
(5, 'Completo PLUS (Cambio Automático)', b'1', b'1', b'1', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `uf`, `descricao`) VALUES
(1, 'RS', 'Osorio'),
(2, 'RS', 'Tramandai'),
(3, 'RS', 'Imbe'),
(4, 'RS', 'Xangrila');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Roger', 'roger@a.com', '1234', '12345678'),
(2, 'Empresa 01', 'empresa01@a.com', '4321', '222222222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `id_filial` int(11) NOT NULL,
  `id_locadora` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cnpj` varchar(19) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `ativa` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`id_filial`, `id_locadora`, `id_cidade`, `nome`, `cnpj`, `ie`, `telefone`, `endereco`, `ativa`) VALUES
(1, 1, 1, 'Filial 01', '111111-11', '111', '(11)1111-1111', 'dasdasdadas', b'1'),
(2, 2, 2, 'Filial 01', '222222-22', '222', '(22)2222-2222', 'bbbbbbb', b'1'),
(3, 3, 3, 'Filial 01', '333333-33', '333', '(33)3333-3333', 'cccccccccc', b'1'),
(19, 1, 2, 'Filial 02', '07.158.789/0001-89', 'ISENTO', '51.984194786', 'AV FERNANDES BASTOS, 899', b'1'),
(24, 1, 2, 'Filial 03', '07.158.789/0002-89', 'ISENTO', '51.984194786', 'AV DAS ALAMEDAS, 899', b'1'),
(26, 1, 3, 'Filial 04', '07.158.789/0004-89', 'ISENTO', '51.984194786', 'AV DAS ALAMEDAS, 899', b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locadora`
--

CREATE TABLE `locadora` (
  `id_locadora` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locadora`
--

INSERT INTO `locadora` (`id_locadora`, `nome`, `email`, `senha`) VALUES
(1, 'Locadora 01', 'locadora01@a.com', '4321'),
(2, 'Locadora 02', 'locadora02@a.com', '4321'),
(3, 'Locadora 03', 'locadora03@a.com', '4321');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `descricao`) VALUES
(1, 'Chevrolet'),
(2, 'Fiat'),
(3, 'Ford'),
(4, 'Renault'),
(5, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ano` int(11) NOT NULL,
  `motor` varchar(30) NOT NULL,
  `nr_portas` int(11) NOT NULL,
  `nr_passageiros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_marca`, `id_tipo`, `descricao`, `ano`, `motor`, `nr_portas`, `nr_passageiros`) VALUES
(1, 1, 1, 'Celta', 2008, 'Flex 1.0', 2, 5),
(2, 2, 1, 'Uno', 2010, 'Flex 1.0', 2, 5),
(3, 3, 1, 'Ka', 2013, 'Flex 1.0', 4, 5),
(4, 4, 2, 'Sandero', 2016, 'Flex 1.4', 4, 5),
(5, 5, 1, 'Gol', 2012, 'Flex 1.0', 4, 5),
(6, 1, 2, 'Onix', 2017, 'Flex 1.0', 4, 5),
(7, 5, 1, 'Fox', 2015, '1.6', 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_fisica`
--

CREATE TABLE `pessoa_fisica` (
  `id_pesFisica` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `habilitacao` varchar(11) NOT NULL,
  `dt_nascimento` varchar(10) NOT NULL,
  `sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_fisica`
--

INSERT INTO `pessoa_fisica` (`id_pesFisica`, `id_cliente`, `sobrenome`, `cpf`, `habilitacao`, `dt_nascimento`, `sexo`) VALUES
(1, 1, 'Cascaes', '11111111', '12345678910', '14-04-1994', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_juridica`
--

CREATE TABLE `pessoa_juridica` (
  `id_pesJuridica` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cnpj` varchar(17) NOT NULL,
  `ie` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa_juridica`
--

INSERT INTO `pessoa_juridica` (`id_pesJuridica`, `id_cliente`, `cnpj`, `ie`) VALUES
(1, 2, '2222222-22', '2222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `chassi` varchar(17) NOT NULL,
  `ativa` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `capacidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo`, `capacidade`) VALUES
(1, 'Passeio', 300),
(2, 'Passeio', 500),
(3, 'UTILITARIO', 10000),
(4, 'UTILITARIO +CABINE DUPLA', 9000),
(5, 'CARGA PESADA', 300000),
(6, 'MINIVAN 12P', 300);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `chassi` varchar(17) NOT NULL,
  `id_filial` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_acessorio` int(11) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `km` int(11) NOT NULL,
  `cor` varchar(30) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `ativo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`chassi`, `id_filial`, `id_modelo`, `id_acessorio`, `placa`, `km`, `cor`, `imagem`, `valor`, `ativo`) VALUES
('AAA111AAA111', 1, 1, 1, 'AAA-1111', 167000, 'PRATA', '', '70.00', b'1'),
('AAA222AAA222', 2, 1, 1, 'AAA-2222', 167000, 'PRATA', '', '70.00', b'1'),
('BBB222BBB222', 1, 2, 1, 'BBB-2222', 127000, 'VERMELHO', '', '75.00', b'0'),
('BBB333BBB333', 2, 2, 1, 'BBB-3333', 127000, 'VERMELHO', '', '75.00', b'1'),
('CCC333CCC333', 1, 6, 2, 'CCC-3333', 35000, 'BRANCO', '', '85.00', b'1'),
('CCC444CCC444', 3, 6, 2, 'CCC-4444', 35000, 'BRANCO', '', '85.00', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acessorios`
--
ALTER TABLE `acessorios`
  ADD PRIMARY KEY (`id_acessorio`);

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`id_filial`),
  ADD KEY `id_locadora` (`id_locadora`),
  ADD KEY `id_cidade` (`id_cidade`);

--
-- Indexes for table `locadora`
--
ALTER TABLE `locadora`
  ADD PRIMARY KEY (`id_locadora`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD PRIMARY KEY (`id_pesFisica`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD PRIMARY KEY (`id_pesJuridica`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `chassi` (`chassi`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`chassi`),
  ADD KEY `id_filial` (`id_filial`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_acessorio` (`id_acessorio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acessorios`
--
ALTER TABLE `acessorios`
  MODIFY `id_acessorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `filial`
--
ALTER TABLE `filial`
  MODIFY `id_filial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `locadora`
--
ALTER TABLE `locadora`
  MODIFY `id_locadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  MODIFY `id_pesFisica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  MODIFY `id_pesJuridica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `filial`
--
ALTER TABLE `filial`
  ADD CONSTRAINT `filial_ibfk_1` FOREIGN KEY (`id_locadora`) REFERENCES `locadora` (`id_locadora`),
  ADD CONSTRAINT `filial_ibfk_2` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`);

--
-- Limitadores para a tabela `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `modelo_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Limitadores para a tabela `pessoa_fisica`
--
ALTER TABLE `pessoa_fisica`
  ADD CONSTRAINT `pessoa_fisica_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `pessoa_juridica`
--
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `pessoa_juridica_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`chassi`) REFERENCES `veiculo` (`chassi`);

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `veiculo_ibfk_1` FOREIGN KEY (`id_filial`) REFERENCES `filial` (`id_filial`),
  ADD CONSTRAINT `veiculo_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`),
  ADD CONSTRAINT `veiculo_ibfk_3` FOREIGN KEY (`id_acessorio`) REFERENCES `acessorios` (`id_acessorio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
