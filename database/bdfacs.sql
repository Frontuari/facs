-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "bdchkinchkout" -------------------------
CREATE DATABASE IF NOT EXISTS `bdfacs` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdfacs`;
-- ---------------------------------------------------------


-- CREATE TABLE "tbinout" ----------------------------------
CREATE TABLE `tbuser` ( 
	`iduser` int(11) NOT NULL AUTO_INCREMENT,
	`name` int(11) NOT NULL,
	`passwd` VarChar( 255 ) NOT NULL,
	`email` VarChar( 255 ) NOT NULL,
	`status` Char(1) NOT NULL DEFAULT '1',
	CONSTRAINT tbuser_pk PRIMARY KEY(iduser) )
ENGINE = InnoDB;
-- ---------------------------------------------------------

-- Dump data of "tbperson" ----------------------------------
INSERT INTO `tbuser`(`name`,`passwd`,`email`) VALUES ( 'admin','123456', 'admin@facs.com');
INSERT INTO `tbuser`(`name`,`passwd`,`email`) VALUES ( 'operador','123456', 'operador@facs.com');
-- ---------------------------------------------------------

-- CREATE TABLE "tbinout" ----------------------------------
CREATE TABLE `tbinout` ( 
	`idinout` int(11) NOT NULL AUTO_INCREMENT,
	`idperson` int(11) NOT NULL,
	`daycheck` VarChar( 255 ) NOT NULL,
	`hourcheck` VarChar( 255 ) NOT NULL,
	`eventcheck` VarChar( 255 ) NOT NULL,
	`date_inout` VarChar( 255 ) NOT NULL,
	`iduser` int(11) NOT NULL,
	CONSTRAINT tbinout_pk PRIMARY KEY(idinout) )
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "tbperson" ----------------------------------
CREATE TABLE `tbperson` ( 
	`idperson` int NOT NULL AUTO_INCREMENT,
	`dni` VarChar( 50 ) NOT NULL,
	`passwd` VarChar( 255 ) NOT NULL,
	`name` VarChar( 160 ) NOT NULL,
	`urlphoto` VarChar( 255 ) NOT NULL,
	`gender` Char( 1 ) NOT NULL DEFAULT 'M',
	`birthday` VarChar( 255 ) NOT NULL,
	`place_birth` VarChar( 255 ) NOT NULL,
	`email` VarChar( 255 ) NOT NULL,
	`level_education` VarChar( 255 ) NOT NULL,
	`charge` VarChar( 255 ) NOT NULL,
	`degree_instruction` VarChar( 255 ) NOT NULL,
	`phone_number` VarChar( 40 ) NOT NULL,
	`mobile_phone` VarChar( 40 ) NOT NULL,
	`address` VarChar( 255 ) NOT NULL,
	`status` VarChar( 255 ) NOT NULL,
	`dateperson` VarChar( 255 ) NOT NULL,
	`iduser` int( 11 ) NOT NULL,
	CONSTRAINT tbperson_pk PRIMARY KEY(idperson)  )
ENGINE = InnoDB;
-- ---------------------------------------------------------

-- Dump data of "tbperson" ----------------------------------
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '22251737','123456', 'GUTIERREZ, MARIAVIRGINIA', '', 'FEMENINO', '1993-11-02', 'MARACAIBO', 'mvgf_123@hotmail.com', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'MATERNAL A', '0261 523-26-05', '0424 635-95-04', 'AV. LA POMONA CALLE 102 NRO CASA 18A-33', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '13414190','123456', 'GONZALEZ, KARINA', '', 'FEMENINO', '1975-11-07', 'MARACAIBO', 'JOHANKARI_1975@HOTMAIL.COM', 'UNIVERSITARIO', 'personSORA', 'SALA 5A', '0424 609-07-38', '0416 113-89-00', 'SABANETA LARGA AV 100A CASA NRO 54-136B', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '17335570','123456', 'CALLEJAS, ARISBELYS', '', 'FEMENINO', '1986-05-19', 'MENE MAUROA', 'notiene@ceimiguelvazquez.edu.ve', 'TSU', 'MAESTRA DE AULA', 'SALA 4A', '0261 418-71-22', '0424 602-21-16', 'AV 19D BARRIO LOS ANDES CASA NRO 110A-30', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '17568626','123456', 'MORALES, SUNAIRA', '', 'FEMENINO', '1984-08-15', 'MARACAIBO', 'sunairamorales@gmail.com', 'TSU', 'MAESTRA DE AULA', 'SALA 3A', '1111 111-11-11', '0412 661-18-46', 'SECTOR POMONA CALLE 103 CON AV 19D CASA NRO 103-138', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '12514148','123456', 'ANDRADE, ROSELIN', '', 'FEMENINO', '1974-04-16', 'MARACAIBO', 'ROSELIN1629@HOTMAIL.COM', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'SALA 5B', '0261 729-10-09', '0424 609-66-85', 'SABANETA CALLE 100 CON AV 21 CASA NOR 21A-28', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '14279310','123456', 'VILLALOBOS, DAYANA', '', 'FEMENINO', '1979-12-23', 'MARACAIBO', 'DAYANACAROLINA_32@HOTMAIL.ES', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'MATERNAL B', '0261 723-42-82', '0414 682-83-87', 'AV PRINCIPAL LA POMONA CALLE 102 CASA NOR 18-82', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '11857435','123456', 'ARAUJO, KEINNY', '', 'FEMENINO', '1973-10-18', 'MARACAIBO', 'notiene@ceimiguelvazquez.edu.ve', 'TSU', 'MAESTRA DE AULA', 'SALA 4B', '0261 723-71-37', '0424 611-22-72', 'CALLE 105 CON AV 19B CASA NOR 105-37', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`dni`,`passwd`,`name`,`urlphoto`,`gender`,`birthday`,`place_birth`,`email`,`level_education`,`charge`,`degree_instruction`,`phone_number`,`mobile_phone`,`address`,`status`,`dateperson`,`iduser`) VALUES ( '19838394','123456', 'CONTRERAS, ROSSY', '', 'FEMENINO', '1990-09-25', 'MARACAIBO', 'contrerasrossy@hotmail.com', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'SALA 3B', '0261 736-49-51', '0414 367-09-99', 'URB EL PINAR PINO CENTRO 1 APTO 2F SECTOR POMONA', 'ACTIVO', '2016-01-12', 'admin' );
-- ---------------------------------------------------------

--	Constraints of tbinout ---------------------------------
ALTER TABLE `tbinout` ADD CONSTRAINT tbinout_tbuser FOREIGN KEY(iduser) REFERENCES tbuser(iduser) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `tbinout` ADD CONSTRAINT tbinout_tbperson FOREIGN KEY(idperson) REFERENCES tbperson(idperson) ON DELETE CASCADE ON UPDATE CASCADE;
-- ---------------------------------------------------------

--	Constraints of tbperson ---------------------------------
ALTER TABLE `tbperson` ADD CONSTRAINT tbperson_tbuser FOREIGN KEY(iduser) REFERENCES tbuser(iduser) ON DELETE CASCADE ON UPDATE CASCADE;
-- ---------------------------------------------------------

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


