<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadEmpleado/documento.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Documento{
    
     public $id_documento;
     public $id_tipo_documento;
     public $id_proceso;
     public $codigo;
     public $nombre_documento;
     public $id_version;
     public $id_empresa;
     public $tipo_documento;
     public $sigla_tipo_documento;
     public $proceso;
     public $sigla_proceso;
     public $estado;
     public $version;
     public $fecha_aprobacion;
     

    // OTROS ATRIBUTOS //
    public $conexion;
    private $result;
    private $retorno;
    private $sql;


    public function __construct(\entidad\documento $documentoE)
    {
         $this->id_documento = $documentoE->getIdDocumento();
         $this->id_tipo_documento = $documentoE->getIdTipoDocumento();
         $this->id_proceso = $documentoE->getIdProceso();
         $this->codigo = $documentoE->getCodigo();
         $this->nombre_documento = $documentoE->getNombreDocumento();
         $this->id_version = $documentoE->getIdVersion();
         $this->id_empresa = $documentoE->getIdEmpresa();
         $this->tipo_documento = $documentoE->getTipoDocumento();
         $this->sigla_tipo_documento = $documentoE->getSiglaTipoDocumento();
         $this->proceso = $documentoE->getProceso();
         $this->sigla_proceso = $documentoE->getSiglaProceso();
         $this->estado = $documentoE->getEstado();
         $this->version = $documentoE->getVersion();
         $this->fecha_aprobacion = $documentoE->getFechaAprobacion();
         $this->conexion = \Conexion::singleton();
    }

    /**
     * Se realiza la consulta de los documentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
    public function read()
   {

     try {
          $this->sql = "SELECT 
               pr.`proceso` AS proceso, 
               tdoc.`id_tipo_documento`,
               tdoc.`tipo_documento` AS tipoDoc, 
               CONCAT(pr.`sigla_proceso`,'-',tdoc.`sigla_tipo_documento`,'-',doc.`codigo`) AS codigo,
               doc.`nombre_documento` AS nombre,
               vr.`version`,
               vr.`estado`,
               vr.`fecha_aprobacion` AS fecha,
               vr.`documento`   
               FROM documento AS doc
               INNER JOIN tipo_documento AS tdoc ON doc.`id_tipo_documento` = tdoc.`id_tipo_documento`
               INNER JOIN proceso AS pr ON doc.`id_proceso` = pr.`id_proceso`
               INNER JOIN versionamiento AS vr ON  doc.`id_versionamiento` = vr.`id_versionamiento` 
               WHERE vr.`estado`='v'
               ORDER BY codigo  ASC";
          $this->result = $this->conexion->query($this->sql);
          $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
               
     } catch (Exception $e) {
          $this->retorno = $e->getMessage();
     }
          return $this->retorno;
     }


}

?>