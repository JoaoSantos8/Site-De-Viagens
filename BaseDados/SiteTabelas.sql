-- MySQL Script generated by MySQL Workbench
-- Thu Aug 24 02:14:27 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema site
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema site
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `site` ;

-- -----------------------------------------------------
-- Table `site`.`destinos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`destinos` (
  `destinoId` INT NOT NULL AUTO_INCREMENT,
  `destinoNome` VARCHAR(255) NOT NULL,
  `destinoImagemURL` VARCHAR(255) NOT NULL,
  `destinoDescricao` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`destinoId`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`concelhos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`concelhos` (
  `concelhoId` INT NOT NULL AUTO_INCREMENT,
  `concelhoNome` VARCHAR(255) NOT NULL,
  `concelhoImagemURL` VARCHAR(255) NOT NULL,
  `concelhoDescricao` VARCHAR(255) NOT NULL,
  `concelhoDestinoId` INT NOT NULL,
  PRIMARY KEY (`concelhoId`),
  INDEX `concelhoDestinoId` (`concelhoDestinoId` ASC) VISIBLE,
  CONSTRAINT `concelhos_ibfk_1`
    FOREIGN KEY (`concelhoDestinoId`)
    REFERENCES `site`.`destinos` (`destinoId`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`eventos` (
  `eventoId` INT NOT NULL AUTO_INCREMENT,
  `eventoNome` VARCHAR(255) NOT NULL,
  `eventoImagemURL` VARCHAR(255) NOT NULL,
  `eventoDescricao` VARCHAR(255) NOT NULL,
  `eventoEmail` VARCHAR(255) NOT NULL,
  `eventoDataC` DATE NOT NULL,
  `eventoDataA` DATE NOT NULL,
  `eventoPreco` INT NOT NULL,
  `eventoTipo` ENUM('Noite', 'Dia', 'Festival', 'Festa', 'Feira') NOT NULL DEFAULT _utf8mb4'Dia',
  `eventoConcelhoId` INT NOT NULL,
  PRIMARY KEY (`eventoId`),
  INDEX `eventoConcelhoId` (`eventoConcelhoId` ASC) VISIBLE,
  CONSTRAINT `eventos_ibfk_1`
    FOREIGN KEY (`eventoConcelhoId`)
    REFERENCES `site`.`concelhos` (`concelhoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`atividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`atividades` (
  `atividadeId` INT NOT NULL AUTO_INCREMENT,
  `atividadeNome` VARCHAR(255) NOT NULL,
  `atividadeImagemURL` VARCHAR(255) NOT NULL,
  `atividadePreco` INT NOT NULL,
  `atividadeEventoId` INT NOT NULL,
  PRIMARY KEY (`atividadeId`),
  INDEX `atividadeEventoId` (`atividadeEventoId` ASC) VISIBLE,
  CONSTRAINT `atividades_ibfk_1`
    FOREIGN KEY (`atividadeEventoId`)
    REFERENCES `site`.`eventos` (`eventoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`companhias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`companhias` (
  `companhiaId` INT NOT NULL AUTO_INCREMENT,
  `companhiaNome` VARCHAR(255) NOT NULL,
  `companhiaTelefone` INT NOT NULL,
  PRIMARY KEY (`companhiaId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`hoteis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`hoteis` (
  `hotelId` INT NOT NULL AUTO_INCREMENT,
  `hotelNome` VARCHAR(255) NOT NULL,
  `hotelImagemURL` VARCHAR(255) NOT NULL,
  `hotelDescricao` VARCHAR(255) NOT NULL,
  `hotelEmail` VARCHAR(255) NOT NULL,
  `hotelTelefone` INT NOT NULL,
  `hotelPreco` FLOAT NOT NULL,
  `hoteisConcelhoId` INT NOT NULL,
  PRIMARY KEY (`hotelId`),
  INDEX `hoteisConcelhoId` (`hoteisConcelhoId` ASC) VISIBLE,
  CONSTRAINT `hoteis_ibfk_1`
    FOREIGN KEY (`hoteisConcelhoId`)
    REFERENCES `site`.`concelhos` (`concelhoId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`monumentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`monumentos` (
  `monumentoId` INT NOT NULL AUTO_INCREMENT,
  `monumentoNome` VARCHAR(255) NOT NULL,
  `monumentoImagemURL` VARCHAR(255) NOT NULL,
  `monumentoDescrição` VARCHAR(255) NULL DEFAULT NULL,
  `monumentoEmail` VARCHAR(255) NULL DEFAULT NULL,
  `monumentoTelefone` INT NULL DEFAULT NULL,
  `monumentoPreco` INT NULL DEFAULT NULL,
  `monumentoConcelhoId` INT NOT NULL,
  PRIMARY KEY (`monumentoId`),
  INDEX `monumentoConcelhoId` (`monumentoConcelhoId` ASC) VISIBLE,
  CONSTRAINT `monumentos_ibfk_1`
    FOREIGN KEY (`monumentoConcelhoId`)
    REFERENCES `site`.`concelhos` (`concelhoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`viagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`viagens` (
  `viagemId` INT NOT NULL AUTO_INCREMENT,
  `viagemData` DATE NOT NULL,
  `viagemIni` TIME NOT NULL,
  `viagemChegada` TIME NOT NULL,
  `viagemTelefone` INT NOT NULL,
  `viagemLugares` INT NOT NULL,
  `viagemPreco` FLOAT NOT NULL,
  `viagemTipo` ENUM('Ida', 'Ida e Volta') NOT NULL,
  `viagemClasse` ENUM('Classe Economica', 'Classe Executiva') CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NOT NULL DEFAULT 'Classe Economica',
  `viagemDestinoId` INT NOT NULL,
  `viagemCompanhiaId` INT NOT NULL,
  PRIMARY KEY (`viagemId`),
  INDEX `viagemCompanhiaId` (`viagemCompanhiaId` ASC) VISIBLE,
  INDEX `viagemDestinoId` (`viagemDestinoId` ASC) VISIBLE,
  CONSTRAINT `viagens_ibfk_1`
    FOREIGN KEY (`viagemCompanhiaId`)
    REFERENCES `site`.`companhias` (`companhiaId`),
  CONSTRAINT `viagens_ibfk_2`
    FOREIGN KEY (`viagemDestinoId`)
    REFERENCES `site`.`destinos` (`destinoId`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`pacotes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`pacotes` (
  `pacoteId` INT NOT NULL,
  `pacoteNome` VARCHAR(255) NULL DEFAULT NULL,
  `pacoteHotelId` INT NOT NULL,
  `pacoteViagemId` INT NOT NULL,
  PRIMARY KEY (`pacoteId`),
  INDEX `pacoteHotelId` (`pacoteHotelId` ASC) VISIBLE,
  INDEX `pacoteViagemId` (`pacoteViagemId` ASC) VISIBLE,
  CONSTRAINT `pacotes_ibfk_1`
    FOREIGN KEY (`pacoteHotelId`)
    REFERENCES `site`.`hoteis` (`hotelId`),
  CONSTRAINT `pacotes_ibfk_2`
    FOREIGN KEY (`pacoteViagemId`)
    REFERENCES `site`.`viagens` (`viagemId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`restaurantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`restaurantes` (
  `restauranteId` INT NOT NULL AUTO_INCREMENT,
  `restauranteNome` VARCHAR(255) NOT NULL,
  `restauranteImagemURL` VARCHAR(255) NOT NULL,
  `restauranteDescricao` VARCHAR(255) NOT NULL,
  `restauranteTelefone` INT NOT NULL,
  `restauranteConcelhoId` INT NOT NULL,
  PRIMARY KEY (`restauranteId`),
  INDEX `restauranteConcelhoId` (`restauranteConcelhoId` ASC) VISIBLE,
  CONSTRAINT `restaurantes_ibfk_1`
    FOREIGN KEY (`restauranteConcelhoId`)
    REFERENCES `site`.`concelhos` (`concelhoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `site`.`utilizadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `site`.`utilizadores` (
  `utilizadorId` INT NOT NULL AUTO_INCREMENT,
  `utilizadorNome` VARCHAR(255) NOT NULL,
  `utilizadorEmail` VARCHAR(255) NOT NULL,
  `utilizadorImagemURL` VARCHAR(255) NOT NULL,
  `utilizadorIdade` INT NOT NULL,
  `utilizadorTelefone` VARCHAR(255) NOT NULL,
  `utilizadorCargo` ENUM('Geral', 'Hoteis', 'Monumentos', 'Viagens', 'Atividades', 'Restaurantes') NOT NULL DEFAULT _utf8mb4'Geral',
  `utilizadorPass` VARCHAR(255) NOT NULL,
  `utilizadorConfirmPass` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`utilizadorId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
