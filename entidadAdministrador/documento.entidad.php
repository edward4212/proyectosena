<?php
namespace entidad;

class Documento {

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
   
    /**
     * Get the value of id_documento
     */
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * Set the value of id_documento
     *
     * @return  self
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;

        return $this;
    }

    /**
     * Get the value of id_tipo_documento
     */
    public function getIdTipoDocumento()
    {
        return $this->id_tipo_documento;
    }

    /**
     * Set the value of id_tipo_documento
     *
     * @return  self
     */
    public function setIdTipoDocumento($id_tipo_documento)
    {
        $this->id_tipo_documento = $id_tipo_documento;

        return $this;
    }

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
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of nombre_documento
     */
    public function getNombreDocumento()
    {
        return $this->nombre_documento;
    }

    /**
     * Set the value of nombre_documento
     *
     * @return  self
     */
    public function setNombreDocumento($nombre_documento)
    {
        $this->nombre_documento = $nombre_documento;

        return $this;
    }

    /**
     * Get the value of id_version
     */
    public function getIdVersion()
    {
        return $this->id_version;
    }

    /**
     * Set the value of id_version
     *
     * @return  self
     */
    public function setIdVersion($id_version)
    {
        $this->id_version = $id_version;

        return $this;
    }

    /**
     * Get the value of id_empresa
     */
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * Set the value of id_empresa
     *
     * @return  self
     */
    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;

        return $this;
    }

    /**
     * Get the value of tipo_documento
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * Set the value of tipo_documento
     *
     * @return  self
     */
    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    /**
     * Get the value of sigla_tipo_documento
     */
    public function getSiglaTipoDocumento()
    {
        return $this->sigla_tipo_documento;
    }

    /**
     * Set the value of sigla_tipo_documento
     *
     * @return  self
     */
    public function setSiglaTipoDocumento($sigla_tipo_documento)
    {
        $this->sigla_tipo_documento = $sigla_tipo_documento;

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

    /**
     * Get the value of version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of version
     *
     * @return  self
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the value of fecha_aprobacion
     */
    public function getFechaAprobacion()
    {
        return $this->fecha_aprobacion;
    }

    /**
     * Set the value of fecha_aprobacion
     *
     * @return  self
     */
    public function setFechaAprobacion($fecha_aprobacion)
    {
        $this->fecha_aprobacion = $fecha_aprobacion;

        return $this;
    }
}


?>