CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `proyecto1`;

/*Table structure for table `cargo` */

CREATE TABLE `cargo` (
  `id_cargo` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(200) NOT NULL,
  `manual_funciones` VARCHAR(200) DEFAULT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo` (`cargo`)
);

CREATE TABLE `empresa` (
  `id_empresa` TINYINT(3) UNSIGNED NOT NULL,
  `nombre_empresa` VARCHAR(500) DEFAULT NULL,
  `logo` VARCHAR(500) DEFAULT NULL,
  `mision` TEXT DEFAULT NULL,
  `vision` TEXT DEFAULT NULL,
  `politica_calidad` TEXT DEFAULT NULL,
  `objetivos_calidad` TEXT DEFAULT NULL,
  `organigrama` VARCHAR(500) DEFAULT NULL,
  `estado` ENUM('A','I') DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
);

CREATE TABLE `estatus_solicitud` (
  `id_estatus_solicitud` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estatus_solicitud` VARCHAR(50) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_estatus_solicitud`)
);

CREATE TABLE `prioridad` (
  `id_prioridad` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prioridad` VARCHAR(200) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_prioridad`)
);

CREATE TABLE `proceso` (
  `id_proceso` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `proceso` VARCHAR(200) NOT NULL,
  `sigla_proceso` VARCHAR(4) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_proceso`,`proceso`)
);

CREATE TABLE `rol` (
  `id_rol` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rol` VARCHAR(50) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `rol` (`rol`)
);

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_documento` VARCHAR(200) NOT NULL,
  `sigla_tipo_documento` VARCHAR(10) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_documento`)
);

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` VARCHAR(200) NOT NULL,
  `estado` ENUM('I','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_solicitud`)
);

CREATE TABLE `documento` (
  `id_documento` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` TINYINT(3) UNSIGNED NOT NULL,
  `id_proceso` TINYINT(3) UNSIGNED NOT NULL,
  `codigo` TINYINT(3) UNSIGNED ZEROFILL NOT NULL,
  `nombre_documento` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `id_tipo_documento_` (`id_tipo_documento`),
  KEY `id_proceso_` (`id_proceso`),
  CONSTRAINT `id_proceso_` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento_` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
);


CREATE TABLE `versionamiento` (
  `id_versionamiento` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` INT(10) UNSIGNED NOT NULL,
  `usuario_creacion` VARCHAR(200) DEFAULT NULL,
  `fecha_creacion` DATE DEFAULT NULL,
  `usuario_revision` VARCHAR(200) DEFAULT NULL,
  `fecha_revision` DATE DEFAULT NULL,
  `usuario_aprobacion` VARCHAR(200) DEFAULT NULL,
  `fecha_aprobacion` DATE DEFAULT NULL,
  `documento` VARCHAR(200) NOT NULL,
  `estado` ENUM('V','O') NOT NULL DEFAULT 'V',
  `id_documento` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id_versionamiento`),
  KEY `id_documento` (`id_documento`),
  CONSTRAINT `id_documentoV` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
);


CREATE TABLE `empleado` (
  `id_empleado` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_completo` VARCHAR(200) NOT NULL,
  `img_empleado` VARCHAR(200) NOT NULL,
  `correo_empleado` VARCHAR(500) NOT NULL,
  `id_cargo` TINYINT(3) UNSIGNED NOT NULL,
  `id_empresa` TINYINT(3) UNSIGNED DEFAULT NULL,
  `estado_empleado` ENUM('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `correo` (`correo_empleado`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE `usuario` (
  `id_usuario` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NOT NULL,
  `clave` VARBINARY(50) NOT NULL,
  `id_rol` TINYINT(3) UNSIGNED NOT NULL,
  `id_empleado` TINYINT(3) UNSIGNED NOT NULL,
  `estado` ENUM('A','I','C') NOT NULL DEFAULT 'C',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE `solicitud` (
  `id_solicitud` BIGINT(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `id_empleado` TINYINT(3) UNSIGNED NOT NULL,
  `id_prioridad` TINYINT(3) UNSIGNED NOT NULL,
  `id_tipo_documento` TINYINT(3) UNSIGNED NOT NULL,
  `id_tipo_solicitud` TINYINT(3) UNSIGNED NOT NULL,
  `id_estatus_solicitud` TINYINT(3) UNSIGNED NOT NULL,
  `codigo_documento` VARCHAR(200) DEFAULT '00000',
  `solicitud` TEXT NOT NULL,
  `carpeta` VARCHAR(100) DEFAULT NULL,
  `documento` VARCHAR(600) DEFAULT NULL,
  `fecha_solicitud` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  `funcionario_asignado` VARCHAR(200) DEFAULT 'Sin Asignar',
  `fecha_solucion` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `id_prioridad` (`id_prioridad`),
  KEY `id_tipo_solicitud` (`id_tipo_solicitud`),
  KEY `id_estatus_solicitud` (`id_estatus_solicitud`),
  KEY `id_empleado_sol` (`id_empleado`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `id_empleado_sol` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_estatus_solicitud` FOREIGN KEY (`id_estatus_solicitud`) REFERENCES `estatus_solicitud` (`id_estatus_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_prioridad` FOREIGN KEY (`id_prioridad`) REFERENCES `prioridad` (`id_prioridad`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_solicitud` FOREIGN KEY (`id_tipo_solicitud`) REFERENCES `tipo_solicitud` (`id_tipo_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE `comentarios_solicitud` (
  `id_comentarios_solicitud` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(500) NOT NULL,
  `id_solicitud` BIGINT(7) UNSIGNED ZEROFILL NOT NULL,
  `usuario_comentario` VARCHAR(100) NOT NULL,
  `estado` ENUM('A','I') NOT NULL DEFAULT 'A',
  `fecha_comentario` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_comentarios_solicitud`),
  KEY `id_solicitud_` (`id_solicitud`),
  CONSTRAINT `id_solicitud_` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;


DELIMITER $$

USE `proyecto1`$$

DROP PROCEDURE IF EXISTS `create_usuario`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_usuario`(IN id_usuario INT, usuario VARCHAR(50), clave VARCHAR(50),
    id_rol INT,  estado ENUM('A','I','C'),id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estadoEmpl  ENUM('A','I'))
BEGIN
DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
	GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
	SET @proceso="ERROR";
	SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
	ROLLBACK;
	END;
	START TRANSACTION;
	
	CALL create_empleado(1,nombre_completo,'usuario.png',correo_empleado,id_cargo,id_empresa,'A');
	SELECT LAST_INSERT_ID() INTO @id_empleado;
	INSERT INTO usuario VALUES(NULL,usuario,AES_ENCRYPT(clave,'kddbjw8b3d'),id_rol,@id_empleado,'C');
	
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END$$

DELIMITER ;

DELIMITER $$

USE `proyecto1`$$

DROP PROCEDURE IF EXISTS `create_empleado`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_empleado`( IN id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estado_empleado  ENUM('A','I'))
BEGIN
INSERT INTO empleado VALUES (NULL, nombre_completo,'usuario.png',correo_empleado,id_cargo,'1','A');
    END$$

DELIMITER ;
