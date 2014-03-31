-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla miusado.autos
DROP TABLE IF EXISTS `autos`;
CREATE TABLE IF NOT EXISTS `autos` (
  `id_autos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_modelos` int(11) NOT NULL,
  `version_autos` varchar(60) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `year_autos` int(11) DEFAULT NULL,
  `km_autos` int(11) DEFAULT NULL,
  `fuel_autos` enum('Diesel','Eletrico/Hibrido','Nafta','Nafta/GNC','Otros') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `motor_cv_autos` int(11) DEFAULT NULL,
  `motor_cilindrada_autos` varchar(3) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `segmento_autos` enum('Sin Definir','Camioneta','Convertible','Coupe','Familiar','HatchBank','Monovolumen','Pick Up','Sedan','Utilitario') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `direccion_autos` enum('Asistida','Mecanica','Hidraulica') COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `puertas_autos` int(11) DEFAULT NULL,
  `titulo_autos` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion_autos` text COLLATE utf8mb4_spanish2_ci,
  `precio_autos` decimal(7,2) DEFAULT NULL,
  `ini_date_autos` date DEFAULT NULL,
  `venc_date_autos` date DEFAULT NULL,
  `fk_username_users` varchar(16) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activa_autos` tinyint(1) DEFAULT '0',
  `id_imagenesauto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_autos`),
  KEY `fk_Modelos_Autos1_idx` (`fk_id_modelos`),
  KEY `fk_Users_Autos1_idx` (`fk_username_users`),
  KEY `fk_ImagenesAutos_Autos1_idx` (`id_imagenesauto`),
  CONSTRAINT `fk_Modelos_Autos1` FOREIGN KEY (`fk_id_modelos`) REFERENCES `modelos` (`id_modelos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Users_Autos1` FOREIGN KEY (`fk_username_users`) REFERENCES `users` (`username_users`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.autos: ~1 rows (aproximadamente)
DELETE FROM `autos`;
/*!40000 ALTER TABLE `autos` DISABLE KEYS */;
INSERT INTO `autos` (`id_autos`, `fk_id_modelos`, `version_autos`, `year_autos`, `km_autos`, `fuel_autos`, `motor_cv_autos`, `motor_cilindrada_autos`, `segmento_autos`, `direccion_autos`, `puertas_autos`, `titulo_autos`, `descripcion_autos`, `precio_autos`, `ini_date_autos`, `venc_date_autos`, `fk_username_users`, `activa_autos`, `id_imagenesauto`) VALUES
	(1, 24, 'Pack Plus 2', 2011, 65000, 'Nafta', 105, '1.6', 'Sedan', 'Asistida', 5, 'Renault Sandero', 'Descripcion del Modelo', 85000.00, NULL, NULL, 'admin', 0, NULL);
/*!40000 ALTER TABLE `autos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.confort
DROP TABLE IF EXISTS `confort`;
CREATE TABLE IF NOT EXISTS `confort` (
  `id_confort` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_confort` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_confort`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.confort: ~0 rows (aproximadamente)
DELETE FROM `confort`;
/*!40000 ALTER TABLE `confort` DISABLE KEYS */;
INSERT INTO `confort` (`id_confort`, `nombre_confort`) VALUES
	(1, 'Aire acondicionado'),
	(2, 'Asiento trasero rebatible'),
	(3, 'Alarma de luces encendidas'),
	(4, 'Apertura remota de baúl'),
	(5, 'Asiento conductor regulable en altura'),
	(6, 'Asientos eléctricos'),
	(7, 'Cierre centralizado con mando a distancia'),
	(8, 'Cierre centralizado de puertas'),
	(9, 'Climatizador automático'),
	(10, 'Computadora de abordo'),
	(11, 'Control de velocidad crucero'),
	(12, 'Espejos exteriores eléctricos'),
	(13, 'Faros regulables desde el interior'),
	(14, 'Tapizado de cuero'),
	(15, 'Techo corredizo'),
	(16, 'Vidrios eléctricos delanteros'),
	(17, 'Vidrios eléctricos delanteros y traseros'),
	(18, 'Volante regulable');
/*!40000 ALTER TABLE `confort` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.confortautos
DROP TABLE IF EXISTS `confortautos`;
CREATE TABLE IF NOT EXISTS `confortautos` (
  `fk_id_confort` int(11) NOT NULL,
  `fk_id_autos` int(11) NOT NULL,
  KEY `fk_Confort_table11_idx` (`fk_id_confort`),
  KEY `fk_Autos_table11_idx` (`fk_id_autos`),
  CONSTRAINT `fk_Autos_table11` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Confort_table11` FOREIGN KEY (`fk_id_confort`) REFERENCES `confort` (`id_confort`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.confortautos: ~0 rows (aproximadamente)
DELETE FROM `confortautos`;
/*!40000 ALTER TABLE `confortautos` DISABLE KEYS */;
INSERT INTO `confortautos` (`fk_id_confort`, `fk_id_autos`) VALUES
	(1, 1),
	(2, 1),
	(3, 1);
/*!40000 ALTER TABLE `confortautos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.exterior
DROP TABLE IF EXISTS `exterior`;
CREATE TABLE IF NOT EXISTS `exterior` (
  `id_exterior` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_multimedia` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_exterior`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.exterior: ~0 rows (aproximadamente)
DELETE FROM `exterior`;
/*!40000 ALTER TABLE `exterior` DISABLE KEYS */;
INSERT INTO `exterior` (`id_exterior`, `nombre_multimedia`) VALUES
	(1, 'Barra porta equipaje'),
	(2, 'Faros de xenón'),
	(3, 'Limpia/lava luneta'),
	(4, 'Llantas de aleación'),
	(5, 'Paragolpes color carrocería'),
	(6, 'Vidrios polarizados');
/*!40000 ALTER TABLE `exterior` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.exteriorautos
DROP TABLE IF EXISTS `exteriorautos`;
CREATE TABLE IF NOT EXISTS `exteriorautos` (
  `fk_id_exterior` int(11) NOT NULL,
  `fk_id_autos` int(11) NOT NULL,
  KEY `fk_Exterior_ExteriorAutos1_idx` (`fk_id_exterior`),
  KEY `fk_Autos_ExteriorAutos1_idx` (`fk_id_autos`),
  CONSTRAINT `fk_Autos_ExteriorAutos1` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Exterior_ExteriorAutos1` FOREIGN KEY (`fk_id_exterior`) REFERENCES `exterior` (`id_exterior`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.exteriorautos: ~0 rows (aproximadamente)
DELETE FROM `exteriorautos`;
/*!40000 ALTER TABLE `exteriorautos` DISABLE KEYS */;
/*!40000 ALTER TABLE `exteriorautos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.imagenesautos
DROP TABLE IF EXISTS `imagenesautos`;
CREATE TABLE IF NOT EXISTS `imagenesautos` (
  `id_imagenesauto` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_imagenesauto` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fk_id_autos` int(11) NOT NULL,
  PRIMARY KEY (`id_imagenesauto`),
  KEY `fk_Autos_ImagenesAutos1_idx` (`fk_id_autos`),
  CONSTRAINT `fk_Autos_ImagenesAutos1` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.imagenesautos: ~0 rows (aproximadamente)
DELETE FROM `imagenesautos`;
/*!40000 ALTER TABLE `imagenesautos` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenesautos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.marcas
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marcas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marcas` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_marcas`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.marcas: ~20 rows (aproximadamente)
DELETE FROM `marcas`;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` (`id_marcas`, `nombre_marcas`) VALUES
	(1, 'AUDI'),
	(2, 'BMW'),
	(3, 'FORD'),
	(4, 'CHEVROLET'),
	(5, 'GMC'),
	(6, 'FIAT'),
	(7, 'MERCEDEZ BENZ'),
	(8, 'RENAULT'),
	(9, 'PEUGEOT'),
	(10, 'DODGE'),
	(11, 'ISUZU'),
	(12, 'TOYOTA'),
	(13, 'LADA'),
	(14, 'NISSAN'),
	(15, 'IKA'),
	(16, 'MISHUBISHI'),
	(17, 'VOLKSWAGEN'),
	(18, 'CITROEN'),
	(19, 'CHRYSLER'),
	(20, 'HONDA');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.modelos
DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `id_modelos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_id_marcas` int(11) NOT NULL,
  `nombre_modelos` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_modelos`),
  KEY `fk_Marca_Modelos_idx` (`fk_id_marcas`),
  CONSTRAINT `fk_Marca_Modelos` FOREIGN KEY (`fk_id_marcas`) REFERENCES `marcas` (`id_marcas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.modelos: ~120 rows (aproximadamente)
DELETE FROM `modelos`;
/*!40000 ALTER TABLE `modelos` DISABLE KEYS */;
INSERT INTO `modelos` (`id_modelos`, `fk_id_marcas`, `nombre_modelos`) VALUES
	(1, 1, 'A3'),
	(2, 1, 'A4'),
	(3, 1, 'TT'),
	(4, 4, 'Corsa'),
	(5, 4, 'Astra'),
	(6, 4, 'Agile'),
	(7, 6, 'Palio'),
	(8, 3, 'Focus'),
	(9, 3, 'Falcon'),
	(10, 4, 'Chevy'),
	(11, 10, 'Ram'),
	(12, 6, 'Fiorino'),
	(13, 6, '600'),
	(14, 6, '580'),
	(15, 3, 'EcoSport'),
	(16, 11, 'Trooper'),
	(17, 13, 'Niva'),
	(18, 16, 'Montero'),
	(19, 14, 'Frontier'),
	(20, 9, '206'),
	(21, 9, '207'),
	(22, 9, 'Partner'),
	(23, 8, 'Clio'),
	(24, 8, 'Sandero'),
	(25, 8, 'Kangoo'),
	(26, 8, 'Megane'),
	(27, 12, 'Corola'),
	(28, 12, 'Hilux'),
	(29, 9, '307'),
	(30, 9, '308'),
	(31, 17, 'Gol'),
	(32, 8, 'Duster'),
	(33, 2, 'Serie 1'),
	(34, 2, 'Serie 3'),
	(35, 2, 'X1'),
	(36, 2, 'Serie 5'),
	(37, 2, 'Serie 6'),
	(38, 2, 'X3'),
	(39, 2, 'X5'),
	(40, 2, 'X6'),
	(41, 2, 'Z4'),
	(42, 2, 'M3'),
	(43, 2, 'M5'),
	(44, 4, 'Aveo'),
	(45, 17, 'Polo'),
	(46, 17, 'Amarok'),
	(47, 17, 'Suran'),
	(48, 17, 'Crossfox'),
	(49, 6, 'Uno'),
	(50, 6, 'Siena'),
	(51, 6, 'Strada'),
	(52, 3, 'Ka'),
	(53, 3, 'F100'),
	(54, 3, 'F1000'),
	(55, 3, 'Fiesta'),
	(56, 8, 'Logan'),
	(57, 8, '12'),
	(58, 8, '9'),
	(59, 8, '4'),
	(60, 8, '5'),
	(61, 18, 'C3'),
	(62, 18, 'C4'),
	(63, 18, 'Berlingo'),
	(64, 18, '3cv'),
	(65, 18, 'ds3'),
	(66, 18, 'ds4'),
	(67, 20, 'HRV'),
	(68, 20, 'Civic'),
	(69, 20, 'Fit'),
	(70, 20, 'City'),
	(71, 8, 'Scenic'),
	(72, 19, 'Cruice'),
	(73, 9, '208'),
	(74, 9, '408'),
	(75, 9, '508'),
	(76, 9, '3008'),
	(77, 9, '4008'),
	(78, 9, 'RCZ'),
	(79, 9, 'Hoggar'),
	(80, 9, 'Expert'),
	(81, 9, 'Boxer'),
	(82, 9, '504'),
	(83, 9, '505'),
	(84, 17, 'Saveiro'),
	(85, 4, 'Celta'),
	(86, 4, 'Clasic'),
	(87, 4, 'Onix'),
	(88, 4, 'Prisma'),
	(89, 4, 'Spark'),
	(90, 4, 'Cobalt'),
	(91, 4, 'Sonic'),
	(92, 4, 'Cruze'),
	(93, 4, 'Camaro'),
	(94, 4, 'Spin'),
	(95, 4, 'Montana'),
	(96, 4, 'Tracker'),
	(97, 4, 'S10'),
	(98, 4, 'Captiva'),
	(99, 4, 'Blazer'),
	(100, 4, 'TrailBlazer'),
	(101, 19, 'Town & Country'),
	(102, 19, '300C'),
	(103, 10, 'Viper'),
	(104, 10, 'Journey'),
	(105, 10, 'Charger'),
	(106, 12, '86'),
	(107, 12, 'Etios'),
	(108, 12, 'Camry'),
	(109, 12, 'Prius'),
	(110, 12, 'RAV4'),
	(111, 12, 'SW4'),
	(112, 12, 'Land Cruiser'),
	(113, 6, 'Bravo'),
	(114, 6, 'Linea'),
	(115, 6, 'Punto'),
	(116, 6, '500'),
	(117, 6, 'Doblo'),
	(118, 6, 'Idea'),
	(119, 6, 'Qubo'),
	(120, 6, 'Ducato'),
	(121, 3, 'S-MAX'),
	(122, 3, 'Mondeo'),
	(123, 3, 'Kuga'),
	(124, 3, 'Ranger'),
	(125, 3, 'Transit'),
	(126, 3, 'C915E'),
	(127, 3, 'C1517'),
	(128, 3, 'C1722'),
	(129, 3, 'C1932'),
	(130, 3, 'C2632');
/*!40000 ALTER TABLE `modelos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.multimedia
DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE IF NOT EXISTS `multimedia` (
  `id_multimedia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_multimedia` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_multimedia`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.multimedia: ~0 rows (aproximadamente)
DELETE FROM `multimedia`;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
INSERT INTO `multimedia` (`id_multimedia`, `nombre_multimedia`) VALUES
	(1, 'Bluetooth'),
	(2, 'Cargador de CD'),
	(3, 'Comando satelital de stereo'),
	(4, 'Entrada auxiliar'),
	(5, 'Entrada USB'),
	(6, 'GPS'),
	(7, 'Manos libres'),
	(8, 'Pasacassette'),
	(9, 'Radio AM/FM'),
	(10, 'Reproduce CD'),
	(11, 'Reproduce DVD'),
	(12, 'Reproduce MP3'),
	(13, 'Tarjeta SD'),
	(14, 'Volante multi-función');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.multimediaautos
DROP TABLE IF EXISTS `multimediaautos`;
CREATE TABLE IF NOT EXISTS `multimediaautos` (
  `fk_id_multimedia` int(11) NOT NULL,
  `fk_id_autos` int(11) NOT NULL,
  KEY `fk_Multimedia_MultimediaAutos1_idx` (`fk_id_multimedia`),
  KEY `fk_Autos_MultimediaAutos1_idx` (`fk_id_autos`),
  CONSTRAINT `fk_Autos_MultimediaAutos1` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Multimedia_MultimediaAutos1` FOREIGN KEY (`fk_id_multimedia`) REFERENCES `multimedia` (`id_multimedia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.multimediaautos: ~0 rows (aproximadamente)
DELETE FROM `multimediaautos`;
/*!40000 ALTER TABLE `multimediaautos` DISABLE KEYS */;
/*!40000 ALTER TABLE `multimediaautos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.promocionescanjeadas
DROP TABLE IF EXISTS `promocionescanjeadas`;
CREATE TABLE IF NOT EXISTS `promocionescanjeadas` (
  `fk_codigo_promotions` char(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fk_username_users` varchar(16) COLLATE utf8mb4_spanish2_ci NOT NULL,
  KEY `fk_Promotions_PromocionesCanjeadas1_idx` (`fk_codigo_promotions`),
  KEY `fk_Users_PromocionesCanjeadas1_idx` (`fk_username_users`),
  CONSTRAINT `fk_Promotions_PromocionesCanjeadas1` FOREIGN KEY (`fk_codigo_promotions`) REFERENCES `promotions` (`codigo_promotions`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Users_PromocionesCanjeadas1` FOREIGN KEY (`fk_username_users`) REFERENCES `users` (`username_users`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.promocionescanjeadas: ~0 rows (aproximadamente)
DELETE FROM `promocionescanjeadas`;
/*!40000 ALTER TABLE `promocionescanjeadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocionescanjeadas` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.promotions
DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `codigo_promotions` char(8) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `init_date_promotions` date DEFAULT NULL,
  `end_date_promotions` date DEFAULT NULL,
  `amount_promotions` int(11) DEFAULT NULL,
  `avaibles_promotions` int(11) DEFAULT NULL,
  `total_promotions` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_promotions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.promotions: ~0 rows (aproximadamente)
DELETE FROM `promotions`;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.seguridad
DROP TABLE IF EXISTS `seguridad`;
CREATE TABLE IF NOT EXISTS `seguridad` (
  `id_seguridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_seguridad` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.seguridad: ~0 rows (aproximadamente)
DELETE FROM `seguridad`;
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` (`id_seguridad`, `nombre_seguridad`) VALUES
	(1, 'Airbag acompañante'),
	(2, 'Airbag conductor'),
	(3, 'Airbag de cortina'),
	(4, 'Airbag laterales'),
	(5, 'Airbag trasero'),
	(6, 'Alarma'),
	(7, 'Apoya cabeza en asientos traseros'),
	(8, 'Blindado'),
	(9, 'Cierre de puertas automático en movimiento'),
	(10, 'Control de estabilidad (ESP)'),
	(11, 'Control de tracción'),
	(12, 'Doble tracción'),
	(13, 'Faros antiniebla delanteros'),
	(14, 'Faros antiniebla traseros'),
	(15, 'Frenos ABS'),
	(16, 'Inmovilizador de motor'),
	(17, 'Isofix'),
	(18, 'Regulador de velocidad'),
	(19, 'Repartidor electrónico de frenado'),
	(20, 'Sensor de estacionamiento'),
	(21, 'Sensor de lluvia'),
	(22, 'Sensor de luz'),
	(23, 'Tercer luz de stop');
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.seguridadautos
DROP TABLE IF EXISTS `seguridadautos`;
CREATE TABLE IF NOT EXISTS `seguridadautos` (
  `fk_id_seguridad` int(11) NOT NULL,
  `fk_id_autos` int(11) NOT NULL,
  KEY `fk_Seguridad_SeguridadAutos1_idx` (`fk_id_seguridad`),
  KEY `fk_Autos_SeguridadAutos1_idx` (`fk_id_autos`),
  CONSTRAINT `fk_Autos_SeguridadAutos1` FOREIGN KEY (`fk_id_autos`) REFERENCES `autos` (`id_autos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Seguridad_SeguridadAutos1` FOREIGN KEY (`fk_id_seguridad`) REFERENCES `seguridad` (`id_seguridad`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.seguridadautos: ~0 rows (aproximadamente)
DELETE FROM `seguridadautos`;
/*!40000 ALTER TABLE `seguridadautos` DISABLE KEYS */;
INSERT INTO `seguridadautos` (`fk_id_seguridad`, `fk_id_autos`) VALUES
	(1, 1),
	(2, 1),
	(7, 1),
	(15, 1),
	(23, 1);
/*!40000 ALTER TABLE `seguridadautos` ENABLE KEYS */;


-- Volcando estructura para tabla miusado.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username_users` varchar(16) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password_users` varchar(16) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `name_users` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email_users` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `phone_users` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `alt_phone_users` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `credits_users` int(11) DEFAULT '0',
  `is_super_users` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`username_users`),
  UNIQUE KEY `username_users_UNIQUE` (`username_users`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- Volcando datos para la tabla miusado.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username_users`, `password_users`, `name_users`, `email_users`, `phone_users`, `alt_phone_users`, `credits_users`, `is_super_users`, `is_active`) VALUES
	('admin', 'admin', 'Administrador del Sitio', 'admin@miusado.com.ar', '3875764272', '3874494307', 0, 1, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
