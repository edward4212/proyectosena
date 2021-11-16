<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadAdministrador/tarea.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Tarea{

     public $id_tarea;
     public $id_solicitud;
     public $usuario_creacion;
     public $fecha_asignacion;
     public $usuario_revision;
     public $fecha_revision;
     public $usuario_aprobacion;
     public $fecha_aprobacion;
     public $estado;
     public $id_documento;
     public $id_tipo_documento;
     public $id_proceso;
     public $codigo;
     public $nombre_documento;
     public $id_versionamiento;
     public $numero_version;
     public $descripcion_version;
     public $documento;
     public $estado_version;
     public $usuario;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Tarea $tareaE)
     {
          $this->id_tarea = $tareaE->getIdTarea();
          $this->id_solicitud = $tareaE->getIdSolicitud();
          $this->usuario_creacion = $tareaE->getUsuarioCreacion();
          $this->fecha_asignacion = $tareaE->getFechaAsignacion();
          $this->usuario_revision = $tareaE->getUsuarioRevision();
          $this->fecha_revision = $tareaE->getFechaRevision();
          $this->usuario_aprobacion = $tareaE->getUsuarioAprobacion();
          $this->fecha_aprobacion = $tareaE->getFechaAprobacion();
          $this->estado = $tareaE->getEstado();
          $this->id_documento = $tareaE->getIdDocumento();
          $this->id_tipo_documento = $tareaE->getIdTipoDocumento();
          $this->id_proceso = $tareaE->getIdProceso();
          $this->codigo = $tareaE->getCodigo();
          $this->nombre_documento = $tareaE->getNombreDocumento();
          $this->id_versionamiento = $tareaE->getIdVersionamiento();
          $this->numero_version = $tareaE->getNumeroVersion();
          $this->descripcion_version = $tareaE->getDescripcionVersion();
          $this->documento = $tareaE->getDocumento();
          $this->estado_version = $tareaE->getEstadoVersion();
          $this->usuario = $tareaE->getUsuario();
          $this->comentario = $tareaE->getComentario();
          $this->conexion = \Conexion::singleton();
     }

     public function autocomplete()
     {
          try {
               $this->sql = "SELECT 
               doc.`id_documento` AS id_documento,
               doc.`codigo` AS codigo,
               doc.`nombre_documento` AS nombre_documento,
               pr.`id_proceso`,
               pr.`proceso`,
               pr.`sigla_proceso` AS sigla_proceso,
               tdoc.`id_tipo_documento`,
               tdoc.`tipo_documento` ,
               tdoc.`sigla_tipo_documento` AS sigla_tipo_documento,
               vr.`id_versionamiento`,
               vr.`numero_version` AS version1,
               vr.`documento`,
               vr.`descripcion_version`,
               vr.`fecha_aprobacion`,
               vr.`estado_version`
               FROM documento AS doc
               INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
               INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
               INNER JOIN versionamiento AS vr ON  doc.`id_documento` = vr.`id_documento` 
               WHERE nombre_documento LIKE  CONCAT('%','$this->nombre_documento','%') AND vr.`estado_version` != 'O' AND vr.`estado_version` != 'T' AND vr.`estado_version` != 'D'   ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);

               foreach ($this->retorno as $key => $value) {
                    $this->informacion[] = array(
                         "nombre_documento" => $value['codigo'] . "-" . $value['nombre_documento'],
                         "numero_version" =>  $value['version1'],
                         "sigla_proceso" =>  $value['sigla_proceso'],
                         "id_documento" =>  $value['id_documento'],
                         "sigla_tipo_documento" =>  $value['sigla_tipo_documento'],
                         "label" => $value['codigo'] . "-" . $value['nombre_documento']);
               }
          } catch (Exception $e) {
               $this->informacion = $e->getMessage();
          }
               return $this->informacion;
     }

     public function read()
     {
          try {
               $this->sql = "SELECT
               tr.`id_tarea`,
               tr.`fecha_asignacion`,
               tr.`estado` as estado,
               sl.`solicitud`,
               sl.`id_solicitud`
               FROM tarea AS tr
               INNER JOIN solicitud AS sl ON sl.`id_solicitud` = tr.`id_solicitud`
               WHERE tr.`usuario_creacion` = '$this->usuario' AND estado = 'C' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function creacionVersionamiento()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO versionamiento VALUES (NULL , :numero_version , :id_documento, :descripcion_version , :usuario_creacion, CURRENT_TIMESTAMP(),:usuario_revision,null,null,null,:documento,'T')");
               $this->result->bindParam(':numero_version', $this->numero_version);
               $this->result->bindParam(':id_documento', $this->id_documento);
               $this->result->bindParam(':descripcion_version', $this->descripcion_version);
               $this->result->bindParam(':usuario_creacion', $this->usuario);
               $this->result->bindParam(':usuario_revision', $this->usuario_revision);
               $this->result->bindParam(':documento', $this->documento);
               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarTarea()
     {
          try {
               $this->sql = "UPDATE tarea SET usuario_revision='$this->usuario_revision', fecha_creacion = CURRENT_TIMESTAMP(), estado='R' WHERE id_tarea=$this->id_tarea";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }
          
     public function comentariosCrearDoc()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_solicitud VALUES (NULL , 'Se Creo el Documento', :id_solicitud, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':id_solicitud', $this->id_solicitud);
               $this->result->bindParam(':usuario_comentario', $this->usuario);
               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }
     
     public function comentariosTarea()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_tarea VALUES (NULL , 'Se Creo el Documento', :id_tarea, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");  
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_comentario', $this->usuario);
               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentarios()
     {
          try {
               $this->sql = "	SELECT * FROM comentarios_tarea
               WHERE id_tarea =  '$this->id_tarea'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosTarea1()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_tarea VALUES (NULL , :comentario, :id_tarea, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_comentario', $this->usuario);
               $this->result->bindParam(':comentario', $this->comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function readAct()
     {
          try {
               $this->sql = "SELECT 
               versionamiento.`id_versionamiento`,
               versionamiento.`descripcion_version`,
               versionamiento.`numero_version`,
               versionamiento.`documento`,
               documento.`codigo`,
               documento.`nombre_documento`,
               tipo_documento.`sigla_tipo_documento`,
               proceso.`sigla_proceso`
          
               FROM versionamiento 
          
               INNER JOIN documento ON documento.`id_documento` = versionamiento.`id_documento`
               INNER JOIN tipo_documento ON tipo_documento.`id_tipo_documento` = documento.`id_tipo_documento`
               INNER JOIN proceso ON proceso.`id_proceso` = documento.`id_proceso`
               WHERE versionamiento.`usuario_revision`  = '$this->usuario' AND estado_version = 'T' AND versionamiento.`usuario_aprobacion` IS  NULL ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

     public function comentariosRev()
     {
          try {
               $this->sql = "	SELECT * FROM comentarios_tarea
               WHERE id_tarea =  '$this->id_tarea'";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosTarea2()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_tarea VALUES (NULL , :comentario, :id_tarea, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':id_tarea', $this->id_tarea);
               $this->result->bindParam(':usuario_comentario', $this->usuario);
               $this->result->bindParam(':comentario', $this->comentario);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }
     
     public function actualizarVersionamiento()
     {
          try {
               $this->sql = "UPDATE versionamiento SET usuario_aprobacion='$this->usuario_aprobacion' , fecha_revision =  CURRENT_TIMESTAMP() WHERE id_versionamiento=$this->id_versionamiento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function DevolverVersionamiento()
     {
          try {
               $this->sql = "UPDATE versionamiento SET usuario_revision= null, estado_version = 'D' WHERE id_versionamiento=$this->id_versionamiento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function comentariosVersionamientoDevol()
     {
          try{
               $this->result = $this->conexion->prepare("INSERT INTO comentarios_versionamiento VALUES (NULL , :comentario, :id_versionamiento, :usuario_comentario , 'A', CURRENT_TIMESTAMP())");
               $this->result->bindParam(':comentario', $this->descripcion_version);
               $this->result->bindParam(':id_versionamiento', $this->id_versionamiento);
               $this->result->bindParam(':usuario_comentario', $this->usuario);
               $this->result->execute();    
          } catch (Exception $e) {

               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     
     public function readAprobacion()
     {
          try {
               $this->sql = "SELECT 
               versionamiento.`id_versionamiento`,
               versionamiento.`descripcion_version`,
               versionamiento.`numero_version`,
               versionamiento.`documento`,
               documento.`id_documento`,
               documento.`codigo`,
               documento.`nombre_documento`,
               tipo_documento.`sigla_tipo_documento`,
               proceso.`sigla_proceso`
          
               FROM versionamiento 
          
               INNER JOIN documento ON documento.`id_documento` = versionamiento.`id_documento`
               INNER JOIN tipo_documento ON tipo_documento.`id_tipo_documento` = documento.`id_tipo_documento`
               INNER JOIN proceso ON proceso.`id_proceso` = documento.`id_proceso`
               WHERE estado_version = 'T' AND versionamiento.`usuario_aprobacion` = '$this->usuario' ";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
          return $this->retorno;
     }

          
     public function aprobarVersionamiento()
     {
          try {
               $this->sql = "UPDATE versionamiento SET fecha_aprobacion =  CURRENT_TIMESTAMP(), 
               estado_version = 'V' WHERE id_versionamiento=$this->id_versionamiento";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function versionamientoObsoleto()
     {
          try {
               $this->sql = "UPDATE versionamiento SET estado_version = 'O' 
               WHERE id_documento = $this->id_documento  AND numero_version = $this->numero_version ";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

}

?>