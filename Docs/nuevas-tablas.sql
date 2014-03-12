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
	CONSTRAINT `fk_id_autos` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `fk_id_confort` FOREIGN KEY (`fk_id_confort`) REFERENCES `confort` (`id_confort`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_spanish2_ci'
ENGINE=InnoDB;

