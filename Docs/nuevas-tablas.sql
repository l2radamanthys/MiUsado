CREATE TABLE `Confort` (
	`id_confort` INT NOT NULL AUTO_INCREMENT,
	`nombre_confort` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_confort`)
)


CREATE TABLE `Seguridad` (
	`id_seguridad` INT NOT NULL AUTO_INCREMENT,
	`nombre_seguridad` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_seguridad`)
)

CREATE TABLE `Exterior` (
	`id_exterior` INT NOT NULL AUTO_INCREMENT,
	`nombre_exterior` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_exterior`)
)

CREATE TABLE `Multimedia` (
	`id_multimedia` INT NOT NULL AUTO_INCREMENT,
	`nombre_multimedia` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id_multimedia`)
)

CREATE TABLE `ConfortAutos` (
	`fk_id_autos` INT NOT NULL,
	`fk_id_confort` INT NOT NULL,
	)
COLLATE='utf8_spanish2_ci'
ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `Imagenes` (
    `id_imagenes` INT NOT NULL AUTO_INCREMENT,
    `fk_id_autos` INT,
    `ruta_imagenes` VARCHAR(255),
	PRIMARY KEY (`id_imagenes`) ,
    CONSTRAINT `fk_Imagenes_Autos`
    FOREIGN KEY (`fk_id_autos` )
    REFERENCES `Autos` (`id_autos` )
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE=InnoDB;
 
