/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.21-MariaDB : Database - proyecto1
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cargo` */

CREATE TABLE `cargo` (
  `id_cargo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) NOT NULL,
  `manual_funciones` varchar(200) DEFAULT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo` (`cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `empresa` */

CREATE TABLE `empresa` (
  `id_empresa` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `politica_calidad` text DEFAULT NULL,
  `objetivos_calidad` text DEFAULT NULL,
  `organigrama` varchar(500) DEFAULT NULL,
  `estado` enum('A','I') DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_documento` */

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(200) NOT NULL,
  `sigla_tipo_documento` varchar(10) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `tipo_documento` (`tipo_documento`),
  UNIQUE KEY `sigla_tipo_documento` (`sigla_tipo_documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_solicitud` */

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(200) NOT NULL,
  `estado` enum('I','A') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_tipo_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;



/*Table structure for table `estatus_solicitud` */

CREATE TABLE `estatus_solicitud` (
  `id_estatus_solicitud` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `estatus_solicitud` varchar(50) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_estatus_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `prioridad` */

CREATE TABLE `prioridad` (
  `id_prioridad` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `prioridad` varchar(200) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_prioridad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `proceso` */

CREATE TABLE `proceso` (
  `id_proceso` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `proceso` varchar(200) NOT NULL,
  `sigla_proceso` varchar(4) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_proceso`,`proceso`),
  UNIQUE KEY `proceso` (`proceso`),
  UNIQUE KEY `siglas_proces` (`sigla_proceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `rol` */

CREATE TABLE `rol` (
  `id_rol` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;






CREATE TABLE `documento` (
  `id_documento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` tinyint(3) unsigned DEFAULT NULL,
  `id_proceso` tinyint(3) unsigned DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre_documento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_tipo_documento_` (`id_tipo_documento`),
  KEY `id_proceso_` (`id_proceso`),
  CONSTRAINT `id_proceso_` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento_` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `empleado` */

CREATE TABLE `empleado` (
  `id_empleado` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(200) NOT NULL,
  `img_empleado` varchar(200) NOT NULL,
  `correo_empleado` varchar(500) NOT NULL,
  `id_cargo` tinyint(3) unsigned NOT NULL,
  `id_empresa` tinyint(3) unsigned NOT NULL,
  `estado_empleado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `correo` (`correo_empleado`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


/*Table structure for table `solicitud` */

CREATE TABLE `solicitud` (
  `id_solicitud` bigint(7) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleado` tinyint(3) unsigned NOT NULL,
  `id_prioridad` tinyint(3) unsigned NOT NULL,
  `id_tipo_documento` tinyint(3) unsigned NOT NULL,
  `id_tipo_solicitud` tinyint(3) unsigned NOT NULL,
  `id_estatus_solicitud` tinyint(3) unsigned NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `comentarios_solicitud` */

CREATE TABLE `comentarios_solicitud` (
  `id_comentarios_solicitud` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_solicitud` bigint(7) unsigned NOT NULL,
  `usuario_comentario` varchar(100) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comentarios_solicitud`),
  KEY `id_solicitud_` (`id_solicitud`),
  CONSTRAINT `id_solicitud_` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tarea` */

CREATE TABLE `tarea` (
  `id_tarea` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_solicitud` bigint(20) unsigned NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `usuario` */

CREATE TABLE `usuario` (
  `id_usuario` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varbinary(50) NOT NULL,
  `id_rol` tinyint(3) unsigned NOT NULL,
  `id_empleado` tinyint(3) unsigned NOT NULL,
  `estado` enum('A','I','C') NOT NULL DEFAULT 'C',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `versionamiento` */

CREATE TABLE `versionamiento` (
  `id_versionamiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_version` int(10) unsigned DEFAULT NULL,
  `id_documento` int(10) unsigned DEFAULT NULL,
  `descripcion_version` text DEFAULT NULL,
  `usuario_creacion` varchar(200) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `usuario_revision` varchar(200) DEFAULT NULL,
  `fecha_revision` timestamp NULL DEFAULT NULL,
  `usuario_aprobacion` varchar(200) DEFAULT NULL,
  `fecha_aprobacion` timestamp NULL DEFAULT NULL,
  `documento` varchar(500) DEFAULT NULL,
  `estado_version` enum('V','O','T','C','D') DEFAULT 'V',
  `id_tarea` bigint(20) DEFAULT NULL,
  `fecha_obsoleto` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_versionamiento`),
  KEY `id_documento` (`id_documento`),
  CONSTRAINT `id_documentoV` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `comentarios_tarea` */

CREATE TABLE `comentarios_tarea` (
  `id_comentarios_tarea` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_tarea` bigint(20) unsigned NOT NULL,
  `usuario_comentario` varchar(100) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comentarios_tarea`),
  KEY `id_tarea_` (`id_tarea`),
  CONSTRAINT `id_tarea_` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `comentarios_versionamiento` */

CREATE TABLE `comentarios_versionamiento` (
  `id_comentarios_versionamineto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_versionamiento` int(20) unsigned NOT NULL,
  `usuario_comentario` varchar(100) NOT NULL,
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comentarios_versionamineto`),
  KEY `id_versionamiento_com` (`id_versionamiento`),
  CONSTRAINT `id_versionamiento_com` FOREIGN KEY (`id_versionamiento`) REFERENCES `versionamiento` (`id_versionamiento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `documento` */

/* Procedure structure for procedure `createDocumento` */

DELIMITER $$

/*!50003 CREATE DEFINER=CURRENT_USER PROCEDURE `createDocumento`(iN id_documento int, id_tipo_documento tinyint,
 id_proceso tinyint, codigo varchar(10),nombre_documento varchar(500))
BEGIN
 INSERT INTO documento VALUES (NULL, id_tipo_documento,id_proceso ,codigo,nombre_documento);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `createVersionamiento` */

DELIMITER $$

/*!50003 CREATE DEFINER=CURRENT_USER PROCEDURE `createVersionamiento`(in id_documento INT, id_tipo_documento tinyint,
 id_proceso tinyint, codigo VARCHAR(10), nombre_documento VARCHAR(500),
  id_versionamiento int, numero_version int,
 descripcion_version text, usuario_creacion varchar(200), fecha_creacion timestamp,
 usuario_revision VARCHAR(200), fecha_revision TIMESTAMP, usuario_aprobacion VARCHAR(200), fecha_aprobacion TIMESTAMP,
 documento varchar(500), estado_version ENUM('O','T','V','C','D'), id_tarea bigint, fecha_obsoleto TIMESTAMP)
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
	INSERT INTO versionamiento VALUES(NULL,'0',@id_documento,'Se asigna Codigo al Documento',usuario_creacion, CURRENT_TIMESTAMP(),
	NULL,null,NULL,NULL,documento,'C',null, null);
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_empleado` */

DELIMITER $$

/*!50003 CREATE DEFINER=CURRENT_USER PROCEDURE `create_empleado`( IN id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estado_empleado  ENUM('A','I'))
BEGIN
INSERT INTO empleado VALUES (NULL, nombre_completo,'usuario.png',correo_empleado,id_cargo,'1','A');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `create_usuario` */

DELIMITER $$

/*!50003 CREATE DEFINER=CURRENT_USER PROCEDURE `create_usuario`(IN id_usuario INT, usuario VARCHAR(50), clave VARCHAR(50),
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
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
