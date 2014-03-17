SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `miusado` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `miusado` ;

-- -----------------------------------------------------
-- Table `miusado`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Users` (
  `username_users` VARCHAR(16) NOT NULL ,
  `password_users` VARCHAR(16) NULL ,
  `name_users` VARCHAR(45) NOT NULL ,
  `email_users` VARCHAR(45) NOT NULL ,
  `phone_users` VARCHAR(20) NOT NULL ,
  `alt_phone_users` VARCHAR(20) NULL ,
  `credits_users` INT NULL DEFAULT 0 ,
  `is_super_users` TINYINT(1) NULL DEFAULT False ,
  `is_active` TINYINT(1) NULL DEFAULT False ,
  PRIMARY KEY (`username_users`) ,
  UNIQUE INDEX `username_users_UNIQUE` (`username_users` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Promotions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Promotions` (
  `codigo_promotions` CHAR(8) NOT NULL ,
  `init_date_promotions` DATE NULL ,
  `end_date_promotions` DATE NULL ,
  `amount_promotions` INT NULL ,
  `avaibles_promotions` INT NULL ,
  `total_promotions` INT NULL ,
  PRIMARY KEY (`codigo_promotions`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Marcas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Marcas` (
  `id_marcas` INT NOT NULL AUTO_INCREMENT ,
  `nombre_marcas` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_marcas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Modelos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Modelos` (
  `id_modelos` INT NOT NULL AUTO_INCREMENT ,
  `fk_id_marcas` INT NOT NULL ,
  `nombre_modelos` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_modelos`) ,
  INDEX `fk_Marca_Modelos_idx` (`fk_id_marcas` ASC) ,
  CONSTRAINT `fk_Marca_Modelos`
    FOREIGN KEY (`fk_id_marcas` )
    REFERENCES `miusado`.`Marcas` (`id_marcas` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`ImagenesAutos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`ImagenesAutos` (
  `id_imagenesauto` INT NOT NULL AUTO_INCREMENT ,
  `ruta_imagenesauto` VARCHAR(255) NULL ,
  `fk_id_autos` INT NOT NULL ,
  PRIMARY KEY (`id_imagenesauto`) ,
  INDEX `fk_Autos_ImagenesAutos1_idx` (`fk_id_autos` ASC) ,
  CONSTRAINT `fk_Autos_ImagenesAutos1`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `miusado`.`Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Autos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Autos` (
  `id_autos` INT NOT NULL AUTO_INCREMENT ,
  `fk_id_modelos` INT NOT NULL ,
  `version_autos` VARCHAR(60) NULL ,
  `year_autos` INT NULL ,
  `km_autos` INT NULL ,
  `fuel_autos` ENUM('Diesel', 'Eletrico/Hibrido', 'Nafta', 'Nafta/GNC', 'Otros') NULL ,
  `motor_cv_autos` INT NULL ,
  `motor_cilindrada_autos` VARCHAR(3) NULL ,
  `segmento_autos` ENUM('Sin Definir','Camioneta', 'Convertible', 'Coupe', 'Familiar', 'HatchBank', 'Monovolumen', 'Pick Up', 'Sedan', 'Utilitario') NULL ,
  `direccion_autos` ENUM('Asistida', 'Mecanica', 'Hidraulica') NULL ,
  `puertas_autos` INT NULL ,
  `titulo_autos` VARCHAR(100) NULL ,
  `descripcion_autos` TEXT NULL ,
  `precio_autos` DECIMAL(7,2) NULL ,
  `ini_date_autos` DATE NULL ,
  `venc_date_autos` DATE NULL ,
  `fk_username_users` VARCHAR(16) NOT NULL ,
  `activa_autos` TINYINT(1) NULL DEFAULT 0 ,
  `fk_id_imagenesauto` INT NOT NULL ,
  INDEX `fk_Modelos_Autos1_idx` (`fk_id_modelos` ASC) ,
  PRIMARY KEY (`id_autos`) ,
  INDEX `fk_Users_Autos1_idx` (`fk_username_users` ASC) ,
  INDEX `fk_ImagenesAutos_Autos1_idx` (`fk_id_imagenesauto` ASC) ,
  CONSTRAINT `fk_Modelos_Autos1`
    FOREIGN KEY (`fk_id_modelos` )
    REFERENCES `miusado`.`Modelos` (`id_modelos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Users_Autos1`
    FOREIGN KEY (`fk_username_users` )
    REFERENCES `miusado`.`Users` (`username_users` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ImagenesAutos_Autos1`
    FOREIGN KEY (`fk_id_imagenesauto` )
    REFERENCES `miusado`.`ImagenesAutos` (`id_imagenesauto` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Confort`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Confort` (
  `id_confort` INT NOT NULL AUTO_INCREMENT ,
  `nombre_confort` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_confort`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`ConfortAutos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`ConfortAutos` (
  `fk_id_confort` INT NOT NULL ,
  `fk_id_autos` INT NOT NULL ,
  INDEX `fk_Confort_table11_idx` (`fk_id_confort` ASC) ,
  INDEX `fk_Autos_table11_idx` (`fk_id_autos` ASC) ,
  CONSTRAINT `fk_Confort_table11`
    FOREIGN KEY (`fk_id_confort` )
    REFERENCES `miusado`.`Confort` (`id_confort` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Autos_table11`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `miusado`.`Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Seguridad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Seguridad` (
  `id_seguridad` INT NOT NULL AUTO_INCREMENT ,
  `nombre_seguridad` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_seguridad`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`SeguridadAutos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`SeguridadAutos` (
  `fk_id_seguridad` INT NOT NULL ,
  `fk_id_autos` INT NOT NULL ,
  INDEX `fk_Seguridad_SeguridadAutos1_idx` (`fk_id_seguridad` ASC) ,
  INDEX `fk_Autos_SeguridadAutos1_idx` (`fk_id_autos` ASC) ,
  CONSTRAINT `fk_Seguridad_SeguridadAutos1`
    FOREIGN KEY (`fk_id_seguridad` )
    REFERENCES `miusado`.`Seguridad` (`id_seguridad` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Autos_SeguridadAutos1`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `miusado`.`Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Exterior`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Exterior` (
  `id_exterior` INT NOT NULL AUTO_INCREMENT ,
  `nombre_multimedia` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_exterior`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`Multimedia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`Multimedia` (
  `id_multimedia` INT NOT NULL AUTO_INCREMENT ,
  `nombre_multimedia` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_multimedia`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`ExteriorAutos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`ExteriorAutos` (
  `fk_id_exterior` INT NOT NULL ,
  `fk_id_autos` INT NOT NULL ,
  INDEX `fk_Exterior_ExteriorAutos1_idx` (`fk_id_exterior` ASC) ,
  INDEX `fk_Autos_ExteriorAutos1_idx` (`fk_id_autos` ASC) ,
  CONSTRAINT `fk_Exterior_ExteriorAutos1`
    FOREIGN KEY (`fk_id_exterior` )
    REFERENCES `miusado`.`Exterior` (`id_exterior` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Autos_ExteriorAutos1`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `miusado`.`Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`MultimediaAutos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`MultimediaAutos` (
  `fk_id_multimedia` INT NOT NULL ,
  `fk_id_autos` INT NOT NULL ,
  INDEX `fk_Multimedia_MultimediaAutos1_idx` (`fk_id_multimedia` ASC) ,
  INDEX `fk_Autos_MultimediaAutos1_idx` (`fk_id_autos` ASC) ,
  CONSTRAINT `fk_Multimedia_MultimediaAutos1`
    FOREIGN KEY (`fk_id_multimedia` )
    REFERENCES `miusado`.`Multimedia` (`id_multimedia` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Autos_MultimediaAutos1`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `miusado`.`Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miusado`.`PromocionesCanjeadas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `miusado`.`PromocionesCanjeadas` (
  `fk_codigo_promotions` CHAR(8) NOT NULL ,
  `fk_username_users` VARCHAR(16) NOT NULL ,
  INDEX `fk_Promotions_PromocionesCanjeadas1_idx` (`fk_codigo_promotions` ASC) ,
  INDEX `fk_Users_PromocionesCanjeadas1_idx` (`fk_username_users` ASC) ,
  CONSTRAINT `fk_Promotions_PromocionesCanjeadas1`
    FOREIGN KEY (`fk_codigo_promotions` )
    REFERENCES `miusado`.`Promotions` (`codigo_promotions` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Users_PromocionesCanjeadas1`
    FOREIGN KEY (`fk_username_users` )
    REFERENCES `miusado`.`Users` (`username_users` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

USE `miusado` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
