
USE `proyecto1`;

CREATE TABLE `cargo` (
  `id_cargo` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) NOT NULL,
  `manual_funciones` varchar(200) DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo` (`cargo`)
);

CREATE TABLE `empresa` (
  `id_empresa` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `politica_calidad` text DEFAULT NULL,
  `objetivos_calidad` text DEFAULT NULL,
  `organigrama` varchar(500) DEFAULT NULL,
  `estado` enum('A','I') DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ;


CREATE TABLE `estatus_solicitud` (
  `id_estatus_solicitud` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `estatus_solicitud` varchar(50) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_estatus_solicitud`)
) ;

CREATE TABLE `prioridad` (
  `id_prioridad` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `prioridad` varchar(200) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_prioridad`)
) ;

CREATE TABLE `proceso` (
  `id_proceso` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `proceso` varchar(200) NOT NULL,
  `sigla_proceso` varchar(4) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_proceso`,`proceso`)
) ;

CREATE TABLE `rol` (
  `id_rol` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `rol` (`rol`)
) ;


CREATE TABLE `tipo_documento` (
  `id_tipo_documento` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(200) NOT NULL,
  `sigla_tipo_documento` varchar(10) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_documento`)
);

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(200) NOT NULL,
  `estado` enum('I','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_solicitud`)
) ;




CREATE TABLE `documento` (
  `id_documento` int unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` tinyint unsigned DEFAULT NULL,
  `id_proceso` tinyint unsigned DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre_documento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  KEY `id_tipo_documento_` (`id_tipo_documento`),
  KEY `id_proceso_` (`id_proceso`),
  CONSTRAINT `id_proceso_` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento_` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;

CREATE TABLE `empleado` (
  `id_empleado` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(200) NOT NULL,
  `img_empleado` varchar(200) NOT NULL,
  `correo_empleado` varchar(500) NOT NULL,
  `id_cargo` tinyint unsigned NOT NULL,
  `id_empresa` tinyint unsigned NOT NULL,
  `estado_empleado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `correo` (`correo_empleado`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;


CREATE TABLE `solicitud` (
  `id_solicitud` bigint unsigned  NOT NULL AUTO_INCREMENT,
  `id_empleado` tinyint unsigned NOT NULL,
  `id_prioridad` tinyint unsigned NOT NULL,
  `id_tipo_documento` tinyint unsigned NOT NULL,
  `id_tipo_solicitud` tinyint unsigned NOT NULL,
  `id_estatus_solicitud` tinyint unsigned NOT NULL,
  `codigo_documento` varchar(200) DEFAULT '00000',
  `solicitud` text NOT NULL,
  `carpeta` varchar(100) DEFAULT NULL,
  `documento` varchar(600) DEFAULT NULL,
  `fecha_solicitud` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `funcionario_asignado` varchar(200) DEFAULT 'Sin Asignar',
  `fecha_asignacion` timestamp NULL DEFAULT NULL,
  `fecha_inicio_tarea` timestamp NULL DEFAULT NULL,
  `fecha_solucion` timestamp NULL DEFAULT NULL,
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
) ;

CREATE TABLE `comentarios_solicitud` (
  `id_comentarios_solicitud` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_solicitud` bigint unsigned  NOT NULL,
  `usuario_comentario` varchar(100) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comentarios_solicitud`),
  KEY `id_solicitud_` (`id_solicitud`),
  CONSTRAINT `id_solicitud_` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
);

CREATE TABLE `tarea` (
  `id_tarea` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_solicitud` bigint unsigned NOT NULL,
  `fecha_asignacion` timestamp NULL DEFAULT NULL,
  `usuario_creacion` varchar(500) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `usuario_revision` varchar(500) DEFAULT NULL,
  `fecha_revision` timestamp NULL DEFAULT NULL,
  `usuario_aprobacion` varchar(500) DEFAULT NULL,
  `fecha_aprobacion` timestamp NULL DEFAULT NULL,
  `estado` enum('C','R','A','T') DEFAULT NULL,
  PRIMARY KEY (`id_tarea`),
  KEY `id_solicitud_tar` (`id_solicitud`),
  CONSTRAINT `id_solicitud_tar` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;


CREATE TABLE `usuario` (
  `id_usuario` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varbinary(50) NOT NULL,
  `id_rol` tinyint unsigned NOT NULL,
  `id_empleado` tinyint unsigned NOT NULL,
  `estado` enum('A','I','C') NOT NULL DEFAULT 'C',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;

CREATE TABLE `versionamiento` (
  `id_versionamiento` int unsigned NOT NULL AUTO_INCREMENT,
  `numero_version` int unsigned DEFAULT NULL,
  `id_documento` int unsigned DEFAULT NULL,
  `descripcion_version` text DEFAULT NULL,
  `usuario_creacion` varchar(200) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `usuario_revision` varchar(200) DEFAULT NULL,
  `fecha_revision` timestamp NULL DEFAULT NULL,
  `usuario_aprobacion` varchar(200) DEFAULT NULL,
  `fecha_aprobacion` timestamp NULL DEFAULT NULL,
  `documento` varchar(500) DEFAULT NULL,
  `estado_version` enum('V','O','T','C') DEFAULT 'V',
  PRIMARY KEY (`id_versionamiento`),
  KEY `id_documento` (`id_documento`),
  CONSTRAINT `id_documentoV` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ;

/* Procedure structure for procedure `createDocumento` */

/*!50003 DROP PROCEDURE IF EXISTS  `createDocumento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`admin`@`%` PROCEDURE `createDocumento`(iN id_documento int, id_tipo_documento tinyint,
 id_proceso tinyint, codigo varchar(10),nombre_documento varchar(500))
BEGIN
 INSERT INTO documento VALUES (NULL, id_tipo_documento,id_proceso ,codigo,nombre_documento);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `createVersionamiento` */

/*!50003 DROP PROCEDURE IF EXISTS  `createVersionamiento` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`admin`@`%` PROCEDURE `createVersionamiento`(in id_documento INT, id_tipo_documento tinyint,
 id_proceso tinyint, codigo VARCHAR(10), nombre_documento VARCHAR(500),
  id_versionamiento int, numero_version int,
 descripcion_version text, usuario_creacion varchar(200), fecha_creacion timestamp,
 usuario_revision VARCHAR(200), fecha_revision TIMESTAMP, usuario_aprobacion VARCHAR(200), fecha_aprobacion TIMESTAMP,
 documento varchar(500), estado_version ENUM('O','T','V','C'))
BEGIN
DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		GET DIAGNOSTICS @cno = NUMBER;
		GET DIAGNOSTICS CONDITION 1 @errNo = MYSQL_ERRNO, @errMsg = MESSAGE_TEXT;
		SELECT @errNo, @errMsg;
		GET CURRENT DIAGNOSTICS CONDITION 2 errno = MYSQL_ERRNO;
		SET @proceso="ERROR";
		SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
		ROLLBACK;
	END;
	START TRANSACTION;
	CALL createDocumento(1,id_tipo_documento,id_proceso ,codigo,nombre_documento);
	SELECT LAST_INSERT_ID() INTO @id_documento;
	INSERT INTO versionamiento VALUES(NULL,'1',@id_documento,'Se asigna Codigo al Documento',usuario_creacion, CURRENT_TIMESTAMP(),
	NULL,null,NULL,NULL,documento,'C');
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_empleado` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_empleado` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`admin`@`%` PROCEDURE `create_empleado`( IN id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estado_empleado  ENUM('A','I'))
BEGIN
INSERT INTO empleado VALUES (NULL, nombre_completo,'usuario.png',correo_empleado,id_cargo,'1','A');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_usuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_usuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`admin`@`%` PROCEDURE `create_usuario`(IN id_usuario INT, usuario VARCHAR(50), clave VARCHAR(50),
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
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
