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
CREATE TABLE `tbinout` ( 
	`idinout` int(11) NOT NULL AUTO_INCREMENT,
	`idperson` int(11) NOT NULL,
	`diachkperson` VarChar( 255 ) NOT NULL,
	`horachkperson` VarChar( 255 ) NOT NULL,
	`registrochk` VarChar( 255 ) NOT NULL,
	`fechainout` VarChar( 255 ) NOT NULL,
	`operador` VarChar( 255 ) NOT NULL,
	CONSTRAINT tbinout_pk PRIMARY KEY(idinout) )
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "tbperson" ----------------------------------
CREATE TABLE `tbperson` ( 
	`idperson` int NOT NULL AUTO_INCREMENT,
	`cedulaperson` VarChar( 255 ) NOT NULL,
	`passwdperson` VarChar( 255 ) NOT NULL,
	`apenomperson` VarChar( 255 ) NOT NULL,
	`fotoperson` VarChar( 255 ) NOT NULL,
	`sexoperson` VarChar( 255 ) NOT NULL,
	`fnacperson` VarChar( 255 ) NOT NULL,
	`lugnacperson` VarChar( 255 ) NOT NULL,
	`correoperson` VarChar( 255 ) NOT NULL,
	`niveleducperson` VarChar( 255 ) NOT NULL,
	`cargoperson` VarChar( 255 ) NOT NULL,
	`gradoperson` VarChar( 255 ) NOT NULL,
	`materiaperson` VarChar( 255 ) NOT NULL,
	`tlfnocasperson` VarChar( 255 ) NOT NULL,
	`tlfnocelperson` VarChar( 255 ) NOT NULL,
	`direccionperson` VarChar( 255 ) NOT NULL,
	`statusperson` VarChar( 255 ) NOT NULL,
	`fechaperson` VarChar( 255 ) NOT NULL,
	`operador` VarChar( 255 ) NOT NULL,
	CONSTRAINT tbperson_pk PRIMARY KEY(idperson)  )
ENGINE = InnoDB;
-- ---------------------------------------------------------

-- Dump data of "tbperson" ----------------------------------
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '22251737','123456', 'GUTIERREZ, MARIAVIRGINIA', '', 'FEMENINO', '1993-11-02', 'MARACAIBO', 'mvgf_123@hotmail.com', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'MATERNAL A', 'COMPENDIO MATERNAL A', '0261 523-26-05', '0424 635-95-04', 'AV. LA POMONA CALLE 102 NRO CASA 18A-33', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '13414190','123456', 'GONZALEZ, KARINA', '', 'FEMENINO', '1975-11-07', 'MARACAIBO', 'JOHANKARI_1975@HOTMAIL.COM', 'UNIVERSITARIO', 'personSORA', 'SALA 5A', 'compendio sala 5a', '0424 609-07-38', '0416 113-89-00', 'SABANETA LARGA AV 100A CASA NRO 54-136B', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '17335570','123456', 'CALLEJAS, ARISBELYS', '', 'FEMENINO', '1986-05-19', 'MENE MAUROA', 'notiene@ceimiguelvazquez.edu.ve', 'TSU', 'MAESTRA DE AULA', 'SALA 4A', 'compendio sala 4a', '0261 418-71-22', '0424 602-21-16', 'AV 19D BARRIO LOS ANDES CASA NRO 110A-30', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '17568626','123456', 'MORALES, SUNAIRA', '', 'FEMENINO', '1984-08-15', 'MARACAIBO', 'sunairamorales@gmail.com', 'TSU', 'MAESTRA DE AULA', 'SALA 3A', 'compendio sala 3a', '1111 111-11-11', '0412 661-18-46', 'SECTOR POMONA CALLE 103 CON AV 19D CASA NRO 103-138', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '12514148','123456', 'ANDRADE, ROSELIN', '', 'FEMENINO', '1974-04-16', 'MARACAIBO', 'ROSELIN1629@HOTMAIL.COM', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'SALA 5B', 'COMPENDIO SALA 5B', '0261 729-10-09', '0424 609-66-85', 'SABANETA CALLE 100 CON AV 21 CASA NOR 21A-28', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '14279310','123456', 'VILLALOBOS, DAYANA', '', 'FEMENINO', '1979-12-23', 'MARACAIBO', 'DAYANACAROLINA_32@HOTMAIL.ES', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'MATERNAL B', 'COMPENDIO MATERNAL B', '0261 723-42-82', '0414 682-83-87', 'AV PRINCIPAL LA POMONA CALLE 102 CASA NOR 18-82', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '11857435','123456', 'ARAUJO, KEINNY', '', 'FEMENINO', '1973-10-18', 'MARACAIBO', 'notiene@ceimiguelvazquez.edu.ve', 'TSU', 'MAESTRA DE AULA', 'SALA 4B', 'COMPENDIO SALA 4B', '0261 723-71-37', '0424 611-22-72', 'CALLE 105 CON AV 19B CASA NOR 105-37', 'ACTIVO', '2016-01-12', 'admin' );
INSERT INTO `tbperson`(`cedulaperson`,`passwdperson`,`apenomperson`,`fotoperson`,`sexoperson`,`fnacperson`,`lugnacperson`,`correoperson`,`niveleducperson`,`cargoperson`,`gradoperson`,`materiaperson`,`tlfnocasperson`,`tlfnocelperson`,`direccionperson`,`statusperson`,`fechaperson`,`operador`) VALUES ( '19838394','123456', 'CONTRERAS, ROSSY', '', 'FEMENINO', '1990-09-25', 'MARACAIBO', 'contrerasrossy@hotmail.com', 'UNIVERSITARIO', 'MAESTRA DE AULA', 'SALA 3B', 'COMPENDIO SALA 3B', '0261 736-49-51', '0414 367-09-99', 'URB EL PINAR PINO CENTRO 1 APTO 2F SECTOR POMONA', 'ACTIVO', '2016-01-12', 'admin' );
-- ---------------------------------------------------------

--	Constraints of tbinout ---------------------------------
ALTER TABLE `tbinout` ADD CONSTRAINT tbinout_tbperson FOREIGN KEY(idperson) REFERENCES tbperson(idperson) ON DELETE CASCADE ON UPDATE CASCADE;
-- ---------------------------------------------------------

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


