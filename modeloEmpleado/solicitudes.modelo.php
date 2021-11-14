<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadEmpleado/solicitudes.entidad.php    ';
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
          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los solicutdes creadas por el usuario vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     * */
     public function read()
     {
          try {
               $this->sql = "	SELECT
               sl.`id_solicitud` ,
               pr.`prioridad`,
               ts.`tipo_solicitud`,
               td.`tipo_documento`,
               sl.`codigo_documento`,
               sl.`solicitud`,
               sl.`fecha_solicitud`,
               sl.`fecha_asignacion`,
               sl.`carpeta`,
               sl.`documento`,
               sl.`funcionario_asignado`,
               est.`estatus_solicitud`
                    
               FROM solicitud AS sl
               INNER JOIN prioridad AS pr ON sl.`id_prioridad` = pr.`id_prioridad`
               INNER JOIN tipo_solicitud AS ts ON sl.`id_tipo_solicitud` = ts.`id_tipo_solicitud`
               INNER JOIN estatus_solicitud AS est ON sl.`id_estatus_solicitud` = est.`id_estatus_solicitud`
               INNER JOIN tipo_documento AS td ON sl.`id_tipo_documento` = td.`id_tipo_documento`
               WHERE sl.`id_empleado` = '$this->id_empleado' ";
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

     public function solicitudCreacion()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO solicitud VALUES (NULL , :empleado , :prioridad, :tipo_documento , '1', '1' , '0000', :solicitud ,:carpeta, :documento, CURRENT_TIMESTAMP(),'Sin    Asignar',NULL,NULL,NULL)");
               $this->result->bindParam(':empleado', $this->id_empleado);
               $this->result->bindParam(':prioridad', $this->id_prioridad);
               $this->result->bindParam(':tipo_documento', $this->id_tipo_documento);
               $this->result->bindParam(':solicitud', $this->solicitud);
               $this->result->bindParam(':carpeta', $this->carpeta);
               $this->result->bindParam(':documento', $this->documento);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function solicitudActualizacion()
     {
          try{

               $this->result = $this->conexion->prepare("INSERT INTO solicitud VALUES (NULL , :empleado , :prioridad, :tipo_documento , '2', '1' , :codigo, :solicitud, :carpeta, :documento, CURRENT_TIMESTAMP(),'Sin Asignar',NULL,NULL,NULL)");
               $this->result->bindParam(':empleado', $this->id_empleado);
               $this->result->bindParam(':prioridad', $this->id_prioridad);
               $this->result->bindParam(':tipo_documento', $this->id_tipo_documento);
               $this->result->bindParam(':codigo', $this->codigo);
               $this->result->bindParam(':solicitud', $this->solicitud);
               $this->result->bindParam(':carpeta', $this->carpeta);
               $this->result->bindParam(':documento', $this->documento);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function solicitudEliminacion()
     {
          try{

               $this->result = $this->conexion->prepare("INSERT INTO solicitud VALUES (NULL , :empleado , :prioridad, :tipo_documento , '3', '1' , :codigo, :solicitud, :carpeta, :documento, CURRENT_TIMESTAMP(),'Sin Asignar',NULL,NULL)");
               $this->result->bindParam(':empleado', $this->id_empleado);
               $this->result->bindParam(':prioridad', $this->id_prioridad);
               $this->result->bindParam(':tipo_documento', $this->id_tipo_documento);
               $this->result->bindParam(':codigo', $this->codigo);
               $this->result->bindParam(':solicitud', $this->solicitud);
               $this->result->bindParam(':carpeta', $this->carpeta);
               $this->result->bindParam(':documento', $this->documento);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }


     

}

?>