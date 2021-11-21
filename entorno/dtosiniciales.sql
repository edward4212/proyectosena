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
/*Data for the table `cargo` */

LOCK TABLES `cargo` WRITE;

insert  into `cargo`(`id_cargo`,`cargo`,`manual_funciones`,`estado`) values (1,'Administrador',NULL,'A');

UNLOCK TABLES;

/*Data for the table `comentarios_solicitud` */

LOCK TABLES `comentarios_solicitud` WRITE;

UNLOCK TABLES;

/*Data for the table `comentarios_tarea` */

LOCK TABLES `comentarios_tarea` WRITE;

UNLOCK TABLES;

/*Data for the table `comentarios_versionamiento` */

LOCK TABLES `comentarios_versionamiento` WRITE;

UNLOCK TABLES;

/*Data for the table `documento` */

LOCK TABLES `documento` WRITE;

UNLOCK TABLES;

/*Data for the table `empresa` */

LOCK TABLES `empresa` WRITE;

insert  into `empresa`(`id_empresa`,`nombre_empresa`,`logo`,`mision`,`vision`,`politica_calidad`,`objetivos_calidad`,`organigrama`,`estado`) values (1,'Empresa',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;

/*Data for the table `rol` */

LOCK TABLES `rol` WRITE;

insert  into `rol`(`id_rol`,`rol`,`estado`) values (1,'Administrador','A'),(2,'Empleado','A'),(3,'Visitante','A');

UNLOCK TABLES;

/*Data for the table `empleado` */

LOCK TABLES `empleado` WRITE;

insert  into `empleado`(`id_empleado`,`nombre_completo`,`img_empleado`,`correo_empleado`,`id_cargo`,`id_empresa`,`estado_empleado`) values (1,'Administrador','usuario.png','administrador@limaro.com',1,1,'A');

UNLOCK TABLES;

/*Data for the table `estatus_solicitud` */

LOCK TABLES `estatus_solicitud` WRITE;

insert  into `estatus_solicitud`(`id_estatus_solicitud`,`estatus_solicitud`,`estado`) values (1,'Creada','A'),(2,'Adignada','A'),(3,'En Desarrollo','A'),(4,'Finalizada','A'),(5,'Negada','A');

UNLOCK TABLES;

/*Data for the table `prioridad` */

LOCK TABLES `prioridad` WRITE;

insert  into `prioridad`(`id_prioridad`,`prioridad`,`estado`) values (1,'Importante','A'),(2,'Urgente','A'),(3,'Media','A'),(4,'Baja','A');

UNLOCK TABLES;

/*Data for the table `proceso` */

LOCK TABLES `proceso` WRITE;

UNLOCK TABLES;

/*Data for the table `solicitud` */

LOCK TABLES `solicitud` WRITE;

UNLOCK TABLES;

/*Data for the table `tarea` */

LOCK TABLES `tarea` WRITE;

UNLOCK TABLES;

/*Data for the table `tipo_documento` */

LOCK TABLES `tipo_documento` WRITE;

UNLOCK TABLES;

/*Data for the table `tipo_solicitud` */

LOCK TABLES `tipo_solicitud` WRITE;

insert  into `tipo_solicitud`(`id_tipo_solicitud`,`tipo_solicitud`,`estado`) values (1,'Creacion','A'),(2,'Actualizacion','A'),(3,'Eliminacion','A');

UNLOCK TABLES;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`id_usuario`,`usuario`,`clave`,`id_rol`,`id_empleado`,`estado`) values (1,'admin',';aqèƒ/ÔÄBæFb¨û',1,1,'C');

UNLOCK TABLES;

/*Data for the table `versionamiento` */

LOCK TABLES `versionamiento` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
