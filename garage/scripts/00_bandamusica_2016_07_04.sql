# SQL Manager Lite for MySQL 5.3.1.3
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : bandamusica


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `bandamusica`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `bandamusica`;

#
# Structure for the `disponibilidad` table : 
#

CREATE TABLE `disponibilidad` (
  `iddisponibilidad` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `hora` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL,
  `dia01` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia02` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia03` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia04` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia05` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia06` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `dia07` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha01` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha02` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha03` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha04` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha05` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha06` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `fecha07` VARCHAR(10) COLLATE utf8_general_ci DEFAULT NULL,
  `estado01` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado02` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado03` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado04` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado05` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado06` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  `estado07` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`iddisponibilidad`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=7036 AVG_ROW_LENGTH=1092 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `reserva` table : 
#

CREATE TABLE `reserva` (
  `idReserva` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `idSala` INTEGER(11) DEFAULT NULL,
  `idUsuario` INTEGER(11) DEFAULT NULL,
  `fecha` DATE DEFAULT NULL,
  `hora` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL,
  `precio` DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idReserva`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=36 AVG_ROW_LENGTH=780 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `sala` table : 
#

CREATE TABLE `sala` (
  `idSala` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `direccion` VARCHAR(100) COLLATE utf8_general_ci DEFAULT NULL,
  `telefono` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idSala`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=10 AVG_ROW_LENGTH=1820 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `tarifa` table : 
#

CREATE TABLE `tarifa` (
  `idtarifa` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `hora` VARCHAR(5) COLLATE utf8_general_ci DEFAULT NULL,
  `lunes` DECIMAL(10,2) DEFAULT NULL,
  `martes` DECIMAL(10,2) DEFAULT NULL,
  `miercoles` DECIMAL(10,2) DEFAULT NULL,
  `jueves` DECIMAL(10,2) DEFAULT NULL,
  `viernes` DECIMAL(10,2) DEFAULT NULL,
  `sabado` DECIMAL(10,2) DEFAULT NULL,
  `domingo` DECIMAL(10,2) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idtarifa`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=16 AVG_ROW_LENGTH=1092 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `idUsuario` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `password` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `nombre` VARCHAR(50) COLLATE utf8_general_ci DEFAULT NULL,
  `telefono` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `tipoUsuario` CHAR(1) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idUsuario`) COMMENT ''
)ENGINE=InnoDB
AUTO_INCREMENT=15 AVG_ROW_LENGTH=1489 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;


#
# Data for the `disponibilidad` table  (LIMIT -484,500)
#

INSERT INTO `disponibilidad` (`iddisponibilidad`, `hora`, `dia01`, `dia02`, `dia03`, `dia04`, `dia05`, `dia06`, `dia07`, `fecha01`, `fecha02`, `fecha03`, `fecha04`, `fecha05`, `fecha06`, `fecha07`, `estado01`, `estado02`, `estado03`, `estado04`, `estado05`, `estado06`, `estado07`) VALUES

  (7021,'09:00','50','15','50','250','50','50','190','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7022,'10:00','50','120','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7023,'11:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7024,'12:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7025,'13:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7026,'14:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7027,'15:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7028,'16:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7029,'17:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7030,'18:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7031,'19:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7032,'20:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7033,'21:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7034,'22:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D'),
  (7035,'23:00','50','50','50','50','50','50','50','2016-07-03','2016-07-04','2016-07-05','2016-07-06','2016-07-07','2016-07-08','2016-07-09','D','D','D','D','D','D','D');
COMMIT;

#
# Data for the `reserva` table  (LIMIT -478,500)
#

INSERT INTO `reserva` (`idReserva`, `idSala`, `idUsuario`, `fecha`, `hora`, `precio`) VALUES

  (1,1,3,'2016-07-04','10:00',50.00),
  (2,1,3,'2016-07-09','10:00',50.00),
  (3,1,3,'2016-07-05','11:00',50.00),
  (18,1,3,'2016-07-03','09:00',50.00),
  (19,1,3,'2016-07-03','10:00',50.00),
  (20,1,3,'2016-07-03','11:00',50.00),
  (21,1,3,'2016-07-04','09:00',500.00),
  (22,2,3,'2016-07-03','09:00',50.00),
  (23,2,3,'2016-07-03','10:00',50.00),
  (24,2,3,'2016-07-04','09:00',500.00),
  (25,2,3,'2016-07-05','09:00',50.00),
  (26,2,3,'2016-07-06','09:00',250.00),
  (27,1,13,'2016-07-05','09:00',50.00),
  (28,1,13,'2016-07-06','09:00',250.00),
  (29,1,13,'2016-07-06','10:00',50.00),
  (30,1,13,'2016-07-04','11:00',50.00),
  (31,1,13,'2016-07-04','12:00',50.00),
  (32,1,13,'2016-07-07','09:00',50.00),
  (33,1,13,'2016-07-08','09:00',50.00),
  (34,1,14,'2016-07-03','12:00',50.00),
  (35,1,14,'2016-07-03','13:00',50.00);
COMMIT;

#
# Data for the `sala` table  (LIMIT -490,500)
#

INSERT INTO `sala` (`idSala`, `nombre`, `direccion`, `telefono`) VALUES

  (1,'Sala 01','Calle General Borgono, 459 ','555555'),
  (2,'Sala 02','Avenida Arenales, 287 - 289 ','666666'),
  (3,'Sala 03','Calle Dos de Mayo, 406 ','777777'),
  (4,'Sala 04','Avenida San Borja Sur, 653 ','888888'),
  (5,'Sala 05','Jiron Los Mirtos, 160 ','999999'),
  (6,'Sala 06','Avenida Tomas Marsano, 3170 ','12151515'),
  (7,'Sala 07','Avenida San Borja Sur, 653 ','484815'),
  (8,'Sala 08','Avenida Arenales, 287 ','151515'),
  (9,'Sala 09','Jiron Las Ceramicas - Mz. F Lt. 24 - Asoc. Ancieta ','484848');
COMMIT;

#
# Data for the `tarifa` table  (LIMIT -484,500)
#

INSERT INTO `tarifa` (`idtarifa`, `hora`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) VALUES

  (1,'09:00',15.00,50.00,250.00,50.00,50.00,190.00,50.00),
  (2,'10:00',120.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (3,'11:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (4,'12:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (5,'13:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (6,'14:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (7,'15:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (8,'16:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (9,'17:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (10,'18:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (11,'19:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (12,'20:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (13,'21:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (14,'22:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00),
  (15,'23:00',50.00,50.00,50.00,50.00,50.00,50.00,50.00);
COMMIT;

#
# Data for the `usuario` table  (LIMIT -488,500)
#

INSERT INTO `usuario` (`idUsuario`, `email`, `password`, `nombre`, `telefono`, `tipoUsuario`) VALUES

  (3,'123','123','1231','123','U'),
  (5,'1234','123','123','123','U'),
  (6,'123456','123456','123456','123456','U'),
  (7,'12346666','1234','1234','1234','U'),
  (8,'12346666','1234','1234','1234','U'),
  (9,'1234567','123456','123456','123456','U'),
  (10,'1234567','123456','123456','123456','U'),
  (11,'454545','454545','45454','54545','U'),
  (12,'maxroa3000@hotmail.com','123456','Christopher Roa','987654321','A'),
  (13,'jroa3000@gmail.com','123','jonathan roa','4545','U'),
  (14,'eduardo@hotmail.com','123456','Eduardo Gonzales','54545','U');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;