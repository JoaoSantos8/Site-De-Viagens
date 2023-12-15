/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 80031
Source Host           : localhost:3306
Source Database       : site

Target Server Type    : MYSQL
Target Server Version : 80031
File Encoding         : 65001

Date: 2023-08-27 21:54:55
*/

SET FOREIGN_KEY_CHECKS=0;

USE `site` ;
-- ----------------------------
-- Table structure for `atividades`
-- ----------------------------
DROP TABLE IF EXISTS `atividades`;
CREATE TABLE `atividades` (
  `atividadeId` int NOT NULL AUTO_INCREMENT,
  `atividadeNome` varchar(255) NOT NULL,
  `atividadeImagemURL` varchar(255) NOT NULL,
  `atividadePreco` int NOT NULL,
  `atividadeEventoId` int NOT NULL,
  PRIMARY KEY (`atividadeId`),
  KEY `atividadeEventoId` (`atividadeEventoId`),
  CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`atividadeEventoId`) REFERENCES `eventos` (`eventoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of atividades
-- ----------------------------

-- ----------------------------
-- Table structure for `companhias`
-- ----------------------------
DROP TABLE IF EXISTS `companhias`;
CREATE TABLE `companhias` (
  `companhiaId` int NOT NULL AUTO_INCREMENT,
  `companhiaNome` varchar(255) NOT NULL,
  `companhiaTelefone` int NOT NULL,
  PRIMARY KEY (`companhiaId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of companhias
-- ----------------------------
INSERT INTO `companhias` VALUES ('1', 'TAPE', '321654987');

-- ----------------------------
-- Table structure for `concelhos`
-- ----------------------------
DROP TABLE IF EXISTS `concelhos`;
CREATE TABLE `concelhos` (
  `concelhoId` int NOT NULL AUTO_INCREMENT,
  `concelhoNome` varchar(255) NOT NULL,
  `concelhoImagemURL` varchar(255) NOT NULL,
  `concelhoDescricao` varchar(255) NOT NULL,
  `concelhoDestinoId` int NOT NULL,
  PRIMARY KEY (`concelhoId`),
  KEY `concelhoDestinoId` (`concelhoDestinoId`),
  CONSTRAINT `concelhos_ibfk_1` FOREIGN KEY (`concelhoDestinoId`) REFERENCES `destinos` (`destinoId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of concelhos
-- ----------------------------
INSERT INTO `concelhos` VALUES ('1', 'Leiria', 'images/concelhos/20230823220850_64e68372825122.96375006.jpg', 'Distritio muito fixe', '1');
INSERT INTO `concelhos` VALUES ('2', 'Marinha Grande', 'images/concelhos/20230823220922_64e6839275b891.56781565.png', 'Distritio muito fixe', '1');
INSERT INTO `concelhos` VALUES ('3', 'Alcochete', 'images/concelhos/20230823220947_64e683abdcba80.36820591.jpg', 'Distritio muito fixe', '2');
INSERT INTO `concelhos` VALUES ('4', 'Benfica', 'images/concelhos/20230823221017_64e683c93374c6.94692853.jpg', 'Distritio Pouco fixe', '2');
INSERT INTO `concelhos` VALUES ('5', 'Vilamoura', 'images/concelhos/20230823221251_64e68463a60bb6.28369035.jpeg', 'Distrito pra gente rica', '5');
INSERT INTO `concelhos` VALUES ('6', 'Quarteira', 'images/concelhos/20230823221348_64e6849c4e6943.28274697.png', 'Distrito barato pra passar férias, e fica logo ao lado de vilamoura', '5');
INSERT INTO `concelhos` VALUES ('7', 'Albufeira', 'images/concelhos/20230823221418_64e684ba6e8885.23875585.jpg', 'Distrito para os mais jovens, muita bubadeira', '5');

-- ----------------------------
-- Table structure for `destinos`
-- ----------------------------
DROP TABLE IF EXISTS `destinos`;
CREATE TABLE `destinos` (
  `destinoId` int NOT NULL AUTO_INCREMENT,
  `destinoNome` varchar(255) NOT NULL,
  `destinoImagemURL` varchar(255) NOT NULL,
  `destinoDescricao` varchar(255) NOT NULL,
  PRIMARY KEY (`destinoId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of destinos
-- ----------------------------
INSERT INTO `destinos` VALUES ('1', 'Leiria', 'images/destinos/20230823220424_64e68268737997.14005440.jpg', 'Leiria é fixe, bons sitios, boas pessoas, muitas miudas giras, com todo o respeito por elas, elas são muito giras mesmo, mas já os os miúdos é cada Alien credooo ahahahah');
INSERT INTO `destinos` VALUES ('2', 'Lisboa', 'images/destinos/20230823220528_64e682a8ea4812.87001731.jpg', 'Capital de portugal, aqui a comunicação com outras pessoas já é mais complicado pois é muita gente, e as pessoas desconfiam umas das outras, é pena, mas é a verdade.');
INSERT INTO `destinos` VALUES ('3', 'Porto', 'images/destinos/20230823220708_64e6830c215b47.95353500.jpeg', 'É Puorto caramba..\r\nSutaque muito pecoliar, gente boa, ás vezes um bocado agressivos, mas quando eles falam levam as pessoas á gargalhada....\r\nMas muito gente boa por aqui.');
INSERT INTO `destinos` VALUES ('4', 'Coimbra', 'images/destinos/20230823220755_64e6833bded0d6.50034646.jpg', 'Por aqui chamamos-lhe cidade dos estudantes pois á muito estudante por aqui, por causa da universidade');
INSERT INTO `destinos` VALUES ('5', 'Algarve', 'images/destinos/20230823221226_64e6844a6bfe69.99203027.jpg', 'Cidade fixe, pra turistas.');

-- ----------------------------
-- Table structure for `eventos`
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `eventoId` int NOT NULL AUTO_INCREMENT,
  `eventoNome` varchar(255) NOT NULL,
  `eventoImagemURL` varchar(255) NOT NULL,
  `eventoDescricao` varchar(255) NOT NULL,
  `eventoEmail` varchar(255) NOT NULL,
  `eventoDataC` date NOT NULL,
  `eventoDataA` date NOT NULL,
  `eventoPreco` int NOT NULL,
  `eventoTipo` enum('Noite','Dia','Festival','Festa','Feira') NOT NULL DEFAULT (_utf8mb4'Dia'),
  `eventoConcelhoId` int NOT NULL,
  PRIMARY KEY (`eventoId`),
  KEY `eventoConcelhoId` (`eventoConcelhoId`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`eventoConcelhoId`) REFERENCES `concelhos` (`concelhoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of eventos
-- ----------------------------

-- ----------------------------
-- Table structure for `hoteis`
-- ----------------------------
DROP TABLE IF EXISTS `hoteis`;
CREATE TABLE `hoteis` (
  `hotelId` int NOT NULL AUTO_INCREMENT,
  `hotelNome` varchar(255) NOT NULL,
  `hotelImagemURL` varchar(255) NOT NULL,
  `hotelDescricao` varchar(255) NOT NULL,
  `hotelEmail` varchar(255) NOT NULL,
  `hotelTelefone` int NOT NULL,
  `hotelPreco` float NOT NULL,
  `hoteisConcelhoId` int NOT NULL,
  PRIMARY KEY (`hotelId`),
  KEY `hoteisConcelhoId` (`hoteisConcelhoId`),
  CONSTRAINT `hoteis_ibfk_1` FOREIGN KEY (`hoteisConcelhoId`) REFERENCES `concelhos` (`concelhoId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of hoteis
-- ----------------------------
INSERT INTO `hoteis` VALUES ('1', 'Tivoli', 'images/hoteis/20230823221541_64e6850d111451.41061154.jpg', 'Tivoli mais requintado de Portugal, onde todas as celebridades se estabelecem quando vão passar férias ao algarve', 'tivoli@gmail.com', '123456789', '120', '5');
INSERT INTO `hoteis` VALUES ('2', 'Pestana', 'images/hoteis/20230825233223_64e93a073ab771.62732939.jpg', 'Espetacular Hotel', 'espetacular@gmail.com', '123456789', '60', '1');

-- ----------------------------
-- Table structure for `monumentos`
-- ----------------------------
DROP TABLE IF EXISTS `monumentos`;
CREATE TABLE `monumentos` (
  `monumentoId` int NOT NULL AUTO_INCREMENT,
  `monumentoNome` varchar(255) NOT NULL,
  `monumentoImagemURL` varchar(255) NOT NULL,
  `monumentoDescrição` varchar(255) DEFAULT NULL,
  `monumentoEmail` varchar(255) DEFAULT NULL,
  `monumentoTelefone` int DEFAULT NULL,
  `monumentoPreco` int DEFAULT NULL,
  `monumentoConcelhoId` int NOT NULL,
  PRIMARY KEY (`monumentoId`),
  KEY `monumentoConcelhoId` (`monumentoConcelhoId`),
  CONSTRAINT `monumentos_ibfk_1` FOREIGN KEY (`monumentoConcelhoId`) REFERENCES `concelhos` (`concelhoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of monumentos
-- ----------------------------

-- ----------------------------
-- Table structure for `pacotes`
-- ----------------------------
DROP TABLE IF EXISTS `pacotes`;
CREATE TABLE `pacotes` (
  `pacoteId` int NOT NULL AUTO_INCREMENT,
  `pacoteNome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pacoteHotelId` int NOT NULL,
  `pacoteViagemId` int NOT NULL,
  PRIMARY KEY (`pacoteId`),
  KEY `pacoteHotelId` (`pacoteHotelId`),
  KEY `pacoteViagemId` (`pacoteViagemId`),
  CONSTRAINT `pacotes_ibfk_1` FOREIGN KEY (`pacoteHotelId`) REFERENCES `hoteis` (`hotelId`),
  CONSTRAINT `pacotes_ibfk_2` FOREIGN KEY (`pacoteViagemId`) REFERENCES `viagens` (`viagemId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of pacotes
-- ----------------------------
INSERT INTO `pacotes` VALUES ('1', 'Férias de Verão', '1', '3');
INSERT INTO `pacotes` VALUES ('2', 'Férias', '1', '5');
INSERT INTO `pacotes` VALUES ('4', 'Atiradores Furiosos', '2', '5');
INSERT INTO `pacotes` VALUES ('5', 'Velozes e Furiosos', '2', '5');

-- ----------------------------
-- Table structure for `restaurantes`
-- ----------------------------
DROP TABLE IF EXISTS `restaurantes`;
CREATE TABLE `restaurantes` (
  `restauranteId` int NOT NULL AUTO_INCREMENT,
  `restauranteNome` varchar(255) NOT NULL,
  `restauranteImagemURL` varchar(255) NOT NULL,
  `restauranteDescricao` varchar(255) NOT NULL,
  `restauranteTelefone` int NOT NULL,
  `restaurantePreco` int DEFAULT NULL,
  `restauranteConcelhoId` int NOT NULL,
  PRIMARY KEY (`restauranteId`),
  KEY `restauranteConcelhoId` (`restauranteConcelhoId`),
  CONSTRAINT `restaurantes_ibfk_1` FOREIGN KEY (`restauranteConcelhoId`) REFERENCES `concelhos` (`concelhoId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of restaurantes
-- ----------------------------
INSERT INTO `restaurantes` VALUES ('1', 'O Carloto', 'images/restaurantes/64eb89703f0d12.50178433.jpg', 'Muito bom', '123123123', '22', '2');
INSERT INTO `restaurantes` VALUES ('2', 'O Tonico', 'images/restaurantes/20230827170359_64eb81ff2acc55.97729093.jpg', 'Mariscada Tope Tope', '123123123', '25', '1');

-- ----------------------------
-- Table structure for `utilizadores`
-- ----------------------------
DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE `utilizadores` (
  `utilizadorId` int NOT NULL AUTO_INCREMENT,
  `utilizadorNome` varchar(255) NOT NULL,
  `utilizadorEmail` varchar(255) NOT NULL,
  `utilizadorImagemURL` varchar(255) NOT NULL,
  `utilizadorIdade` int NOT NULL,
  `utilizadorTelefone` varchar(255) NOT NULL,
  `utilizadorCargo` enum('Geral','Hoteis','Monumentos','Viagens','Atividades','Restaurantes') NOT NULL DEFAULT (_utf8mb4'Geral'),
  `utilizadorPass` varchar(255) NOT NULL,
  `utilizadorConfirmPass` varchar(255) NOT NULL,
  PRIMARY KEY (`utilizadorId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of utilizadores
-- ----------------------------

-- ----------------------------
-- Table structure for `viagens`
-- ----------------------------
DROP TABLE IF EXISTS `viagens`;
CREATE TABLE `viagens` (
  `viagemId` int NOT NULL AUTO_INCREMENT,
  `viagemData` date NOT NULL,
  `viagemIni` time NOT NULL,
  `viagemChegada` time NOT NULL,
  `viagemTelefone` int NOT NULL,
  `viagemLugares` int NOT NULL,
  `viagemPreco` float NOT NULL,
  `viagemTipo` enum('Ida','Ida e Volta') NOT NULL,
  `viagemClasse` enum('Classe Economica','Classe Executiva') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Classe Economica',
  `viagemDestinoId` int NOT NULL,
  `viagemChegadaDestinoId` int NOT NULL,
  `viagemCompanhiaId` int NOT NULL,
  PRIMARY KEY (`viagemId`),
  KEY `viagemCompanhiaId` (`viagemCompanhiaId`),
  KEY `viagemDestinoId` (`viagemDestinoId`),
  CONSTRAINT `viagens_ibfk_1` FOREIGN KEY (`viagemCompanhiaId`) REFERENCES `companhias` (`companhiaId`),
  CONSTRAINT `viagens_ibfk_2` FOREIGN KEY (`viagemDestinoId`) REFERENCES `destinos` (`destinoId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of viagens
-- ----------------------------
INSERT INTO `viagens` VALUES ('3', '2023-08-24', '23:29:13', '23:29:17', '123456789', '20', '30', 'Ida e Volta', 'Classe Executiva', '1', '0', '1');
INSERT INTO `viagens` VALUES ('5', '2023-08-30', '02:28:00', '05:29:00', '910543215', '45', '35', 'Ida', 'Classe Economica', '5', '0', '1');
