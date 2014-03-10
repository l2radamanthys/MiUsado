-- -----------------------------------------------------
-- Table `Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Users` (
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


CREATE  TABLE IF NOT EXISTS `Promotions` (
  `codigo_promotions` CHAR(8) NOT NULL ,
  `init_date_promotions` DATE NULL ,
  `end_date_promotions` DATE NULL ,
  `amount_promotions` INT NULL ,
  `avaibles_promotions` INT NULL ,
  `total_promotions` INT NULL ,
  PRIMARY KEY (`codigo_promotions`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `Marcas` (
  `id_marcas` INT NOT NULL ,
  `nombre_marcas` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_marcas`) )
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `Modelos` (
  `id_modelos` INT NOT NULL ,
  `fk_id_marcas` INT NOT NULL ,
  `nombre_modelos` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_modelos`, `fk_id_marcas`) ,
  INDEX `fk_Modelos_idx` (`id_modelos` ASC) ,
  INDEX `fk_Marcas_Modelos_idx` (`fk_id_marcas` ASC) ,
  CONSTRAINT `fk_Marcas_Modelos`
    FOREIGN KEY (`fk_id_marcas` )
    REFERENCES `Marcas` (`id_marcas` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


CREATE  TABLE IF NOT EXISTS `Autoss` (
  `id_autos` INT NOT NULL ,
  `fk_id_modelos` INT NOT NULL ,
  `fk_id_marcas` INT UNSIGNED NOT NULL ,
  `year_autos` INT NULL ,
  `km_autos` INT NULL ,
  `fuel_autos` ENUM('Diesel', 'Eletrico/Hibrido', 'Nafta', 'Nafta/GNC', 'Otros') NULL ,
  `motor_cv_autos` INT NULL ,
  `motor_cilindrada_autos` DECIMAL(3,3) NULL ,
  `segmento_autos` ENUM('Sin Definir','Camioneta', 'Convertible', 'Coupe', 'Familiar', 'HatchBank', 'Monovolumen', 'Pick Up', 'Sedan', 'Utilitario') NULL,
  `direccion_autos` ENUM('Asistida', 'Mecanica', 'Hidraulica') NULL,
  `puertas_autos` INT NULL ,
  `titulo_autos` VARCHAR(100) NULL ,
  `descripcion_autos` TEXT NULL ,
  `precio_autos` DECIMAL(7,2) NULL ,
  `ini_date_autos` DATE NULL ,
  `venc_date_autos` DATE NULL ,
  `fk_username_users` VARCHAR(16) NOT NULL ,
  INDEX `fk_Modelos_Autos1_idx` (`fk_id_modelos` ASC, `fk_id_marcas` ASC) ,
  PRIMARY KEY (`id_autos`) ,
  INDEX `fk_Users_Autos1_idx` (`fk_username_users` ASC) ,
CONSTRAINT `fk_Modelos_Autos`
  REFERENCES `modelos` (`id_modelos` , `fk_id_marcas` )
  ON DELETE CASCADE
  ON UPDATE CASCADE

--  ,CONSTRAINT `fk_Users_Autos1`
--    FOREIGN KEY (`fk_username_users` )
--    REFERENCES `Users` (`username_users` )
--    ON DELETE CASCADE
--    ON UPDATE CASCADE
)
ENGINE = InnoDB;
