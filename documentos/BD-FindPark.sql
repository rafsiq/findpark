SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE `findpark` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `findpark`;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `estacionamento` (
  `IdEstacionamento` int(11) NOT NULL AUTO_INCREMENT,
  `NomeFantasia` varchar(250) NOT NULL,
  `DsRazaoSocial` varchar(1000) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Numero` int(6) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `UF` varchar(3) NOT NULL,
  `Complemento` varchar(250) DEFAULT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Imagem` varchar(250) DEFAULT NULL,
  `FlgAtivo` tinyint(4) NOT NULL,
  `Latitude` varchar(150) NOT NULL,
  `Longitude` varchar(150) NOT NULL,
  PRIMARY KEY (`IdEstacionamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `Rua` varchar(100) NOT NULL,
  `Numero` int(6) NOT NULL,
  `Bairro` varchar(100) NOT NULL,
  `Cidade` varchar(100) NOT NULL,
  `UF` varchar(3) NOT NULL,
  `Complemento` varchar(250) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `cep` varchar(10) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Login` varchar(25) DEFAULT NULL,
  `Senha` varchar(32) NOT NULL,
  `FlgAtivo` tinyint(4) NOT NULL,
  `CodigoEmail` varchar(6) NOT NULL,
  `FlgValido` tinyint(4) NOT NULL,
  PRIMARY KEY (`IdUsuario`),
  UNIQUE KEY `login` (`Login`),
  UNIQUE KEY `email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `horario` (
  `IdHorario` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstacionamento` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `horaInicio` varchar(100) DEFAULT NULL,
  `horaFim` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdHorario`),
  KEY `IdEstacionamento` (`IdEstacionamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `usuario_estacionamento` (
  `IdEstacionamento` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `DtCriacao` date NOT NULL,
  `FlgProprietario` tinyint(4) NOT NULL,
  KEY `IdEstacionamento` (`IdEstacionamento`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `preco` (
  `IdPreco` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstacionamento` int(11) NOT NULL,
  `Descricao` varchar(100) DEFAULT NULL,
  `PrecoCarro` decimal(5,2) NOT NULL,
  `PrecoMoto` decimal(5,2) NOT NULL,
  PRIMARY KEY (`IdPreco`),
  KEY `IdEstacionamento` (`IdEstacionamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `servicos` (
  `IdServico` int(11) NOT NULL AUTO_INCREMENT,
  `IdEstacionamento` int(11) NOT NULL,
  `descricaoServico` varchar(100) DEFAULT NULL,
  `preco` decimal(5,2) NOT NULL,
  PRIMARY KEY (`IdServico`),
  KEY `IdEstacionamento` (`IdEstacionamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE IF NOT EXISTS `vagas` (
  `IdEstacionamento` int(11) NOT NULL,
  `qtdVagasDeficientes` int(5) NOT NULL,
  `qtdVagasCarros` int(5) NOT NULL,
  `qtdVagasMoto` int(5) NOT NULL,
  `qtdTotalVagas` int(5) NOT NULL,
  `qtdVagasDisponiveis` int(5) NOT NULL,
  KEY `IdEstacionamento` (`IdEstacionamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`IdEstacionamento`) REFERENCES `estacionamento` (`IdEstacionamento`);
  
ALTER TABLE `preco`
  ADD CONSTRAINT `preco_ibfk_1` FOREIGN KEY (`IdEstacionamento`) REFERENCES `estacionamento` (`IdEstacionamento`);
  
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`IdEstacionamento`) REFERENCES `estacionamento` (`IdEstacionamento`);
  
ALTER TABLE `usuario_estacionamento`
  ADD CONSTRAINT `usuario_estacionamento_ibfk_1` FOREIGN KEY (`IdEstacionamento`) REFERENCES `estacionamento` (`IdEstacionamento`),
  ADD CONSTRAINT `usuario_estacionamento_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
  
ALTER TABLE `vagas`
  ADD CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`IdEstacionamento`) REFERENCES `estacionamento` (`IdEstacionamento`);

