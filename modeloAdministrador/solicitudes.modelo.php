<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadAdministrador/solicitudes.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Solicitudes{
    
     public $id_solicitud;
     public $solicitud;
     public $id_empleado;
     public $id_prioridad;
     public $prioridad;
     public $id_tipo_documento;
     public $tipo_documento;
     public $id_estatus_solicitud;
     public $estatus_solicitud;
     public $id_tipo_solicitud;
     public $tipo_solicitud;
     public $documento;
     public $codigo;
     public $carpeta;
     public $funcionario_asignado;
     public $usuario;
     public $id_comentarios_solicitud;
     public $comentario;
     public $usuario_comentario;
     public $fecha_comentario;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Solicitudes $solicitudesE)
     {
          $this->id_solicitud = $solicitudesE->getIdSolicitud();
          $this->solicitud = $solicitudesE->getSolicitud();
          $this->id_empleado = $solicitudesE->getIdEmpleado();
          $this->id_prioridad = $solicitudesE->getIdPrioridad();
          $this->prioridad = $solicitudesE->getPrioridad();
          $this->id_tipo_documento = $solicitudesE->getIdTipoDocumento();
          $this->tipo_documento = $solicitudesE->getTipoDocumento();
          $this->id_estatus_solicitud = $solicitudesE->getIdEstatusSolicitud();
          $this->estatus_solicitud = $solicitudesE->getEstatusSolicitud();
          $this->id_tipo_solicitud = $solicitudesE->getIdTipoSolicitud();
          $this->tipo_solicitud = $solicitudesE->getTipoSolicitud();
          $this->documento = $solicitudesE->getDocumento();
          $this->codigo = $solicitudesE->getCodigo();
          $this->carpeta = $solicitudesE->getCarpeta();
          $this->usuario = $solicitudesE->getUsuario();
          $this->funcionario_asignado = $solicitudesE -> getFuncionarioAsignado();
          
          $this->id_comentarios_solicitud = $solicitudesE->getIdComentariosSolicitud();
          $this->comentario = $solicitudesE->getComentario();
          $this->usuario_comentario = $solicitudesE->getUsuarioComentario();
          $this->fecha_comentario = $solicitudesE->getFechaComentario();

          $this->conexion = \Conexion::singleton();
     }

     public function read()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               pr.`prioridad`,
               ts.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`carpeta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               est.`estatus_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
               INNER JOIN prioridad AS pr ON sl.`id_prioridad` = pr.`id_prioridad`
               INNER JOIN tipo_solicitud AS ts ON sl.`id_tipo_solicitud` = ts.`id_tipo_solicitud`
               INNER JOIN estatus_solicitud AS est ON sl.`id_estatus_solicitud` = est.`id_estatus_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado` ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function read2()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               pr.`prioridad`,
               ts.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               emp.`id_empleado`,
               emp.`nombre_completo`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`fecha_inicio_tarea`,
               sl.`fecha_solucion`,
               sl.`id_estatus_solicitud`,
               sl.`carpeta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               est.`estatus_solicitud`,
               us.`usuario`
          
               FROM solicitud AS sl
               INNER JOIN prioridad AS pr ON sl.`id_prioridad` = pr.`id_prioridad`
               INNER JOIN tipo_solicitud AS ts ON sl.`id_tipo_solicitud` = ts.`id_tipo_solicitud`
               INNER JOIN estatus_solicitud AS est ON sl.`id_estatus_solicitud` = est.`id_estatus_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               INNER JOIN empleado AS emp ON sl.`id_empleado` = emp.`id_empleado`
               INNER JOIN usuario AS us ON emp.`id_empleado` = us.`id_empleado`
               WHERE sl.`funcionario_asignado` = '$this->usuario' AND sl.`id_estatus_solicitud` != '4' AND  sl.`id_estatus_solicitud` != '5' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function comentarios()
     {
          try {
               $this->sql = "	SELECT * FROM comentarios_solicitud 
               WHERE id_solicitud =  '$this->id_solicitud'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function prioridad()
     {
          try {
               $this->sql = "SELECT * FROM prioridad ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }
          
     public function tipoDocumento()
     {
          try {
               $this->sql = "SELECT * FROM tipo_documento ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosCrear()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_solicitud VALUES (NULL , :comentario , :id_solicitud, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':comentario', $this->comentario);
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosCrear1()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_solicitud VALUES (NULL , 'Se asigno o modifico funcionario Encargado', :id_solicitud, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosCrear2()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_solicitud VALUES (NULL , 'Se inicio la tarea', :id_solicitud, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario_comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function funcionarioCrear()
     {
          try {
               $this->sql = "UPDATE solicitud SET funcionario_asignado='$this->funcionario_asignado', id_estatus_solicitud='2', fecha_asignacion =  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


     public function estadoSolicitudRead()
     {
          try {
               $this->sql = "SELECT * FROM estatus_solicitud WHERE id_estatus_solicitud != '1' AND id_estatus_solicitud  !='2' AND id_estatus_solicitud  != '3'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

          
     public function tareaCrear()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO tarea VALUES (NULL , :id_solicitud , CURRENT_TIMESTAMP(), :usuario_creacion, null,null, null,null,null, 'C' )");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_creacion', $this->usuario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function estadoTarea()
     {
          try {
               $this->sql = "UPDATE solicitud SET id_estatus_solicitud='3', fecha_inicio_tarea =  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function estatusSolicitud()
     {
          try {
               $this->sql = "UPDATE solicitud SET id_estatus_solicitud='$this->id_estatus_solicitud',  fecha_solucion =  CURRENT_TIMESTAMP() WHERE id_solicitud=$this->id_solicitud";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }



}

?>
