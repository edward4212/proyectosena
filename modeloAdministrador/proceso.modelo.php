<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadAdministrador/proceso.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Proceso{

     public $id_proceso;
     public $proceso;
     public $sigla_proceso;
     public $estado;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;

     public function __construct(\entidad\Proceso $procesoE)
     {
          $this->id_proceso = $procesoE->getIdProceso();
          $this->proceso = $procesoE->getProceso();
          $this->sigla_proceso = $procesoE->getSiglaProceso();
          $this->estado = $procesoE->getEstado();
          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los procesos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
               $this->sql = "SELECT * FROM proceso";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function crearProceso()
     {
          try{
               
               $this->result = $this->conexion->prepare("INSERT INTO proceso VALUES (NULL , :proceso , :sigla_proceso, 'A')");
               $this->result->bindParam(':proceso', $this->proceso);
               $this->result->bindParam(':sigla_proceso', $this->sigla_proceso);
               $this->result->execute();    
          } catch (Exception $e) {
          
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function actualizarProceso()
     {

          try {
               $this->sql = "UPDATE proceso SET proceso='$this->proceso', sigla_proceso='$this->sigla_proceso' WHERE id_proceso=$this->id_proceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarProceso()
     {

          try {
               $this->sql = "UPDATE proceso SET estado='$this->estado' WHERE id_proceso=$this->id_proceso";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

}

?>