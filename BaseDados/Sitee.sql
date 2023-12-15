CREATE DATABASE Site;
USE Site;
CREATE TABLE `destinos` (
  `destinoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `destinoNome` VARCHAR(255) NOT NULL,
  `destinoImagemURL` VARCHAR(255) NOT NULL,
  `destinoDescricao` VARCHAR(255) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE `utilizadores` (
  `utilizadorId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `utilizadorNome` VARCHAR(255) NOT NULL,
  `utilizadorEmail` VARCHAR(255) NOT NULL,
  `utilizadorImagemURL` VARCHAR(255) NOT NULL,
  `utilizadorIdade` INT(9) NOT NULL,
  `utilizadorTelefone` VARCHAR(255) NOT NULL,
  `utilizadorCargo` ENUM('Geral', 'Hoteis', 'Monumentos', 'Viagens', 'Atividades', 'Restaurantes') NOT NULL DEFAULT('Geral'),
  `utilizadorPass` VARCHAR(255) NOT NULL,
  `utilizadorConfirmPass` VARCHAR(255) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE `concelhos` (
  `concelhoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `concelhoNome` VARCHAR(255) NOT NULL,
  `concelhoImagemURL` VARCHAR(255) NOT NULL,
  `concelhoDescricao` VARCHAR(255) NOT NULL,
  `concelhoDestinoId` INT(11) NOT NULL,
    FOREIGN KEY (`concelhoDestinoId`) REFERENCES `destinos` (`destinoId`))
ENGINE = InnoDB;

CREATE TABLE `hoteis` (
  `hotelId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `hotelNome` VARCHAR(255) NOT NULL,
  `hotelImagemURL` VARCHAR(255) NOT NULL,
  `hotelDescricao` VARCHAR(255) NOT NULL,
  `hotelEmail` VARCHAR(255) NOT NULL,
  `hotelTelefone` int(9) NOT NULL,
  `hotelPreco` FLOAT(11) NOT NULL,
  `hoteisConcelhoId` INT(11) NOT NULL,
    FOREIGN KEY (`hoteisConcelhoId`) REFERENCES `Site`.`concelhos` (`concelhoId`))
ENGINE = InnoDB;

CREATE TABLE `companhias` (
  `companhiaId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `companhiaNome` VARCHAR(255) NOT NULL,
  `companhiaTelefone` INT(9) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE `viagens` (
  `viagemId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `viagemData` DATE NOT NULL,
  `viagemIni` TIME NOT NULL,
  `viagemChegada` TIME NOT NULL,
  `viagemTelefone` int(11) NOT NULL,
  `viagemLugares` int(11) NOT NULL,
  `viagemPreco` FLOAT(11) NOT NULL,
  `viagemTipo` ENUM('Ida', 'Ida e Volta') NOT NULL,
  `viagemClasse` ENUM('Classe Economica', 'Classe Executiva') NOT NULL DEFAULT('Classe Económica'),
  `viagemChegadaDestinoId` int(11) NOT NULL,
    FOREIGN KEY (`viagemChegadaDestinoId`) REFERENCES `Site`.`destinos` (`destinoId`),
  `viagemDestinoId` int(11) NOT NULL,
    FOREIGN KEY (`viagemDestinoId`) REFERENCES `Site`.`destinos` (`destinoId`),
  `viagemCompanhiaId` INT(11) NOT NULL,
    FOREIGN KEY (`viagemCompanhiaId`) REFERENCES `Site`.`companhias` (`companhiaId`))
ENGINE = InnoDB;

CREATE TABLE `pacotes` (
  `pacoteId` INT(11) NOT NULL PRIMARY KEY,
  `pacoteNome` VARCHAR(255) NULL DEFAULT NULL,
  `pacoteHotelId` INT(11) NOT NULL,
  `pacoteViagemId` INT(11) NOT NULL,
    FOREIGN KEY (`pacoteHotelId`) REFERENCES `hoteis` (`hotelId`),
    FOREIGN KEY (`pacoteViagemId`)  REFERENCES `viagens` (`viagemId`))
ENGINE = InnoDB;

CREATE TABLE `monumentos` (
  `monumentoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `monumentoNome` VARCHAR(255) NOT NULL,
  `monumentoImagemURL` VARCHAR(255) NOT NULL,
  `monumentoDescricao` VARCHAR(255) NULL DEFAULT NULL,
  `monumentoEmail` VARCHAR(255) NULL DEFAULT NULL,
  `monumentoTelefone` int(9) NULL DEFAULT NULL,
  `monumentoPreco` INT(11) NULL DEFAULT NULL,
  `monumentoConcelhoId` INT(11) NOT NULL,
    FOREIGN KEY (`monumentoConcelhoId`) REFERENCES `concelhos` (`concelhoId`))
ENGINE = InnoDB;

CREATE TABLE `restaurantes` ( 
  `restauranteId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `restauranteNome` VARCHAR(255) NOT NULL,
  `restauranteImagemURL` VARCHAR(255) NOT NULL,
  `restauranteDescricao` VARCHAR(255) NOT NULL,
  `restauranteTelefone` INT(9) NOT NULL,
  `restaurantePreco` INT(9) NOT NULL,
  `restauranteConcelhoId` INT(11) NOT NULL,
    FOREIGN KEY (`restauranteConcelhoId`) REFERENCES `concelhos` (`concelhoId`))
ENGINE = InnoDB;

CREATE TABLE `eventos` (
  `eventoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `eventoNome` VARCHAR(255) NOT NULL,
  `eventoImagemURL` VARCHAR(255) NOT NULL,
  `eventoDescricao` varchar(255) NOT NULL,
  `eventoEmail` varchar(255) NOT NULL,
  `eventoDataC` date NOT NULL,
  `eventoDataA` date NOT NULL,
  `eventoPreco` int(9) NOT NULL,
  `eventoTipo` ENUM('Noite', 'Dia','Festival','Festa','Feira') NOT NULL DEFAULT ('Dia'),
  `eventoConcelhoId` INT(11) NOT NULL,
    FOREIGN KEY (`eventoConcelhoId`) REFERENCES `concelhos` (`concelhoId`))
ENGINE = InnoDB;

CREATE TABLE `atividades`(
  `atividadeId` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `atividadeNome` VARCHAR(255) NOT NULL,
  `atividadeImagemURL` VARCHAR(255) NOT NULL,
  `atividadePreco` INT(11) NOT NULL,
  `atividadeEventoId` INT(11) NOT NULL,
    FOREIGN KEY (`atividadeEventoId`) REFERENCES `eventos` (`eventoId`))
ENGINE = InnoDB;

CREATE TABLE `produtos` ( 
  `produtoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `produtoNome` varchar(255) NOT NULL,
  `produtoNum` int(4) NOT NULL,
  `produtoPreco` int(11) NOT NULL)
ENGINE = InnoDB;

CREATE TABLE `carrinho` ( 
  `carrinhoId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `carrinhoProdutoId` int(4) NOT NULL,
  `carrinhoPreco` int(11) NOT NULL,
	FOREIGN KEY (`carrinhoProdutoId`) REFERENCES `produtos` (`produtoId`),
  `carrinhoUtilizadorId` int(4) NOT NULL,
    FOREIGN KEY (`carrinhoUtilizadorId`) REFERENCES `utilizadores` (`utilizadorId`))
ENGINE = InnoDB;

create table `localidade`(
`localidadeId` int(11) auto_increment primary key,
`localidadeNome` varchar(100) Not null,
`localidadeUtilizadorId` int(11) Not Null,
FOREIGN KEY (`localidadeUtilizadorId`) REFERENCES `utilizadores` (`utilizadorId`))
ENGINE =InnoDB;



INSERT INTO `destinos` VALUES ('1', 'Leiria', 'images/destinos/20230823220424_64e68268737997.14005440.jpg', 'Leiria é fixe, bons sitios, boas pessoas, muitas miudas giras, com todo o respeito por elas, elas são muito giras mesmo, mas já os os miúdos é cada Alien credooo ahahahah');
INSERT INTO `destinos` VALUES ('2', 'Lisboa', 'images/destinos/20230823220528_64e682a8ea4812.87001731.jpg', 'Capital de portugal, aqui a comunicação com outras pessoas já é mais complicado pois é muita gente, e as pessoas desconfiam umas das outras, é pena, mas é a verdade.');
INSERT INTO `destinos` VALUES ('3', 'Porto', 'images/destinos/20230823220708_64e6830c215b47.95353500.jpeg', 'É Puorto caramba..\r\nSutaque muito pecoliar, gente boa, ás vezes um bocado agressivos, mas quando eles falam levam as pessoas á gargalhada....\r\nMas muito gente boa por aqui.');
INSERT INTO `destinos` VALUES ('4', 'Coimbra', 'images/destinos/20230823220755_64e6833bded0d6.50034646.jpg', 'Por aqui chamamos-lhe cidade dos estudantes pois á muito estudante por aqui, por causa da universidade');
INSERT INTO `destinos` VALUES ('5', 'Algarve', 'images/destinos/20230823221226_64e6844a6bfe69.99203027.jpg', 'Cidade fixe, pra turistas.');


INSERT INTO `concelhos` VALUES ('1', 'Leiria', 'images/concelhos/20230823220850_64e68372825122.96375006.jpg', 'Distritio muito fixe', '1');
INSERT INTO `concelhos` VALUES ('2', 'Marinha Grande', 'images/concelhos/20230823220922_64e6839275b891.56781565.png', 'Distritio muito fixe', '1');
INSERT INTO `concelhos` VALUES ('3', 'Alcochete', 'images/concelhos/20230823220947_64e683abdcba80.36820591.jpg', 'Distritio muito fixe', '2');
INSERT INTO `concelhos` VALUES ('4', 'Benfica', 'images/concelhos/20230823221017_64e683c93374c6.94692853.jpg', 'Distritio Pouco fixe', '2');
INSERT INTO `concelhos` VALUES ('5', 'Vilamoura', 'images/concelhos/20230823221251_64e68463a60bb6.28369035.jpeg', 'Distrito pra gente rica', '5');
INSERT INTO `concelhos` VALUES ('6', 'Quarteira', 'images/concelhos/20230823221348_64e6849c4e6943.28274697.png', 'Distrito barato pra passar férias, e fica logo ao lado de vilamoura', '5');
INSERT INTO `concelhos` VALUES ('7', 'Albufeira', 'images/concelhos/20230823221418_64e684ba6e8885.23875585.jpg', 'Distrito para os mais jovens, muita bubadeira', '5');

INSERT INTO `companhias` VALUES ('1', 'TAPE', '321654987');

INSERT INTO `hoteis` VALUES ('1', 'Tivoli', 'images/hoteis/20230823221541_64e6850d111451.41061154.jpg', 'Tivoli mais requintado de Portugal, onde todas as celebridades se estabelecem quando vão passar férias ao algarve', 'tivoli@gmail.com', '123456789', '120', '5');
INSERT INTO `hoteis` VALUES ('2', 'Pestana', 'images/hoteis/20230825233223_64e93a073ab771.62732939.jpg', 'Espetacular Hotel', 'espetacular@gmail.com', '123456789', '60', '1');


INSERT INTO `restaurantes` VALUES ('1', 'O Carloto', 'images/restaurantes/64eb89703f0d12.50178433.jpg', 'Muito bom', '123123123', '22', '2');
INSERT INTO `restaurantes` VALUES ('2', 'O Tonico', 'images/restaurantes/20230827170359_64eb81ff2acc55.97729093.jpg', 'Mariscada Tope Tope', '123123123', '25', '1');

INSERT INTO `viagens` VALUES ('3', '2023-08-24', '23:29:13', '23:29:17', '123456789', '20', '30', 'Ida e Volta', 'Classe Executiva', '1', '1', '1');
INSERT INTO `viagens` VALUES ('5', '2023-08-30', '02:28:00', '05:29:00', '910543215', '45', '35', 'Ida', 'Classe Economica', '5', '1', '1');

INSERT INTO `pacotes` VALUES ('1', 'Férias de Verão', '1', '3');
INSERT INTO `pacotes` VALUES ('2', 'Férias', '1', '5');
INSERT INTO `pacotes` VALUES ('4', 'Atiradores Furiosos', '2', '5');
INSERT INTO `pacotes` VALUES ('5', 'Velozes e Furiosos', '2', '5');