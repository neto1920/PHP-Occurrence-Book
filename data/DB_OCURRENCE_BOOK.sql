-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para livro_de_ocorrencia
CREATE DATABASE IF NOT EXISTS `livro_de_ocorrencia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `livro_de_ocorrencia`;

-- Copiando estrutura para tabela livro_de_ocorrencia.ocorrencia
CREATE TABLE IF NOT EXISTS `ocorrencia` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `INFO_POSTO` text NOT NULL,
  `ID_PATRULHEIRO` int(11) NOT NULL,
  `OS_ABERTA` varchar(500) NOT NULL,
  `PREVENTIVAS_ENVIADAS` varchar(100) NOT NULL,
  `OBS_PLANTONISTA` text NOT NULL,
  `TIPO` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - monitoramento | 1 - portaria',
  `IDUSER` int(11) unsigned NOT NULL,
  `DATA` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `FK_ocorrencia_patrulheiro` (`ID_PATRULHEIRO`),
  KEY `FK_ocorrencia_usuario` (`IDUSER`),
  CONSTRAINT `FK_ocorrencia_patrulheiro` FOREIGN KEY (`ID_PATRULHEIRO`) REFERENCES `patrulheiro` (`ID`),
  CONSTRAINT `FK_ocorrencia_usuario` FOREIGN KEY (`IDUSER`) REFERENCES `usuario` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela livro_de_ocorrencia.ocorrencia: ~2 rows (aproximadamente)
INSERT INTO `ocorrencia` (`ID`, `INFO_POSTO`, `ID_PATRULHEIRO`, `OS_ABERTA`, `PREVENTIVAS_ENVIADAS`, `OBS_PLANTONISTA`, `TIPO`, `IDUSER`, `DATA`) VALUES
	(11, 'teste', 3, 'teste', 'sem rondas ', 'teste', 1, 4, '2022-12-30 09:07:42'),
	(12, 'teste', 3, 'teste', 'teste', 'teste', 1, 4, '2022-12-30 09:08:42');

-- Copiando estrutura para tabela livro_de_ocorrencia.patrulheiro
CREATE TABLE IF NOT EXISTS `patrulheiro` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela livro_de_ocorrencia.patrulheiro: ~3 rows (aproximadamente)
INSERT INTO `patrulheiro` (`ID`, `NOME`) VALUES
	(1, 'RAMON'),
	(2, 'BONFIM'),
	(3, 'GLEISON'),
	(4, 'THIAGO');

-- Copiando estrutura para tabela livro_de_ocorrencia.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOME` varchar(150) NOT NULL,
  `EMAIL` varchar(150) NOT NULL,
  `SENHA` varchar(150) NOT NULL,
  `TIPO` tinyint(4) NOT NULL COMMENT '1 - Lider | 2 - monitoramento',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COMMENT='lider = portaria\r\npatrulha = monitoramento';

-- Copiando dados para a tabela livro_de_ocorrencia.usuario: ~7 rows (aproximadamente)
INSERT INTO `usuario` (`ID`, `NOME`, `EMAIL`, `SENHA`, `TIPO`) VALUES
	(1, 'teste', 'teste@teste.com', '123456', 0),
	(2, 'Maili', '@maili', 'maili@2022', 2),
	(3, 'rafael', '@rafael', 'rafael@2022', 1),
	(4, 'Shirlei', '@shirlei', 'shirlei@2022', 2),
	(5, 'Joelma', '@joelma', 'joelma@2022', 2),
	(7, 'Belmira', '@belmira', 'belmira@2022', 2),
	(8, 'Fabiane ', '@fabiane ', 'fabiane@2022', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
