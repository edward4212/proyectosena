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
           WHERE nombre_documento LIKE  CONCAT('%','$this->nombre_documento','%') AND vr.`estado_version` != 'O'";
           $this->result = $this->conexion->query($this->sql);
           $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);

           foreach ($this->retorno as $key => $value) {
                $this->informacion[] = array(
                     "nombre_documento" => $value['codigo'] . "-" . $value['nombre_documento'],
                     "numero_version" =>  $value['version1'],
                     "sigla_proceso" =>  $value['sigla_proceso'],
                     "id_documento" =>  $value['id_documento'],
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
               sl.`solicitud`,
               tr.`fecha_asignacion`,
               tr.`estado`
               FROM tarea AS tr
               INNER JOIN solicitud AS sl ON sl.`id_solicitud` = tr.`id_solicitud`
               WHERE sl.`funcionario_asignado` = '$this->usuario' AND estado = 'C' ";
              $this->result = $this->conexion->query($this->sql);
              $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
         } catch (Exception $e) {
              $this->retorno = $e->getMessage();
         }
         return $this->retorno;
    }

    


}

?>