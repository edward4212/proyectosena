<?php
namespace entidad;

class Proceso {

    public $id_proceso;
    public $proceso;
    public $sigla_proceso;
    public $estado;


    /**
     * Get the value of id_proceso
     */
    public function getIdProceso()
    {
        return $this->id_proceso;
    }

    /**
     * Set the value of id_proceso
     *
     * @return  self
     */
    public function setIdProceso($id_proceso)
    {
        $this->id_proceso = $id_proceso;

        return $this;
    }

    /**
     * Get the value of proceso
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * Set the value of proceso
     *
     * @return  self
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;

        return $this;
    }

    /**
     * Get the value of sigla_proceso
     */
    public function getSiglaProceso()
    {
        return $this->sigla_proceso;
    }

    /**
     * Set the value of sigla_proceso
     *
     * @return  self
     */
    public function setSiglaProceso($sigla_proceso)
    {
        $this->sigla_proceso = $sigla_proceso;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}


?>