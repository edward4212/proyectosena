<?php
namespace entidad;

class Solicitudes {

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

    public $id_comentarios_solicitud;
    public $comentario;
    public $usuario_comentario;
    public $fecha_comentario;

    /**
     * Get the value of id_solicitud
     */
    public function getIdSolicitud()
    {
        return $this->id_solicitud;
    }

    /**
     * Set the value of id_solicitud
     *
     * @return  self
     */
    public function setIdSolicitud($id_solicitud)
    {
        $this->id_solicitud = $id_solicitud;

        return $this;
    }

    /**
     * Get the value of solicitud
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set the value of solicitud
     *
     * @return  self
     */
    public function setSolicitud($solicitud)
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * Get the value of id_empleado
     */
    public function getIdEmpleado()
    {
        return $this->id_empleado;
    }

    /**
     * Set the value of id_empleado
     *
     * @return  self
     */
    public function setIdEmpleado($id_empleado)
    {
        $this->id_empleado = $id_empleado;

        return $this;
    }

    /**
     * Get the value of id_prioridad
     */
    public function getIdPrioridad()
    {
        return $this->id_prioridad;
    }

    /**
     * Set the value of id_prioridad
     *
     * @return  self
     */
    public function setIdPrioridad($id_prioridad)
    {
        $this->id_prioridad = $id_prioridad;

        return $this;
    }

    /**
     * Get the value of prioridad
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set the value of prioridad
     *
     * @return  self
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

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
     * Get the value of id_estatus_solicitud
     */
    public function getIdEstatusSolicitud()
    {
        return $this->id_estatus_solicitud;
    }

    /**
     * Set the value of id_estatus_solicitud
     *
     * @return  self
     */
    public function setIdEstatusSolicitud($id_estatus_solicitud)
    {
        $this->id_estatus_solicitud = $id_estatus_solicitud;

        return $this;
    }

    /**
     * Get the value of estatus_solicitud
     */
    public function getEstatusSolicitud()
    {
        return $this->estatus_solicitud;
    }

    /**
     * Set the value of estatus_solicitud
     *
     * @return  self
     */
    public function setEstatusSolicitud($estatus_solicitud)
    {
        $this->estatus_solicitud = $estatus_solicitud;

        return $this;
    }

    /**
     * Get the value of id_tipo_solicitud
     */
    public function getIdTipoSolicitud()
    {
        return $this->id_tipo_solicitud;
    }

    /**
     * Set the value of id_tipo_solicitud
     *
     * @return  self
     */
    public function setIdTipoSolicitud($id_tipo_solicitud)
    {
        $this->id_tipo_solicitud = $id_tipo_solicitud;

        return $this;
    }

    /**
     * Get the value of tipo_solicitud
     */
    public function getTipoSolicitud()
    {
        return $this->tipo_solicitud;
    }

    /**
     * Set the value of tipo_solicitud
     *
     * @return  self
     */
    public function setTipoSolicitud($tipo_solicitud)
    {
        $this->tipo_solicitud = $tipo_solicitud;

        return $this;
    }

    /**
     * Get the value of documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

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
     * Get the value of carpeta
     */
    public function getCarpeta()
    {
        return $this->carpeta;
    }

    /**
     * Set the value of carpeta
     *
     * @return  self
     */
    public function setCarpeta($carpeta)
    {
        $this->carpeta = $carpeta;

        return $this;
    }

    /**
     * Get the value of id_comentarios_solicitud
     */
    public function getIdComentariosSolicitud()
    {
        return $this->id_comentarios_solicitud;
    }

    /**
     * Set the value of id_comentarios_solicitud
     *
     * @return  self
     */
    public function setIdComentariosSolicitud($id_comentarios_solicitud)
    {
        $this->id_comentarios_solicitud = $id_comentarios_solicitud;

        return $this;
    }

    /**
     * Get the value of comentario
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set the value of comentario
     *
     * @return  self
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get the value of usuario_comentario
     */
    public function getUsuarioComentario()
    {
        return $this->usuario_comentario;
    }

    /**
     * Set the value of usuario_comentario
     *
     * @return  self
     */
    public function setUsuarioComentario($usuario_comentario)
    {
        $this->usuario_comentario = $usuario_comentario;

        return $this;
    }

    /**
     * Get the value of fecha_comentario
     */
    public function getFechaComentario()
    {
        return $this->fecha_comentario;
    }

    /**
     * Set the value of fecha_comentario
     *
     * @return  self
     */
    public function setFechaComentario($fecha_comentario)
    {
        $this->fecha_comentario = $fecha_comentario;

        return $this;
    }

    /**
     * Get the value of funcionario_asignado
     */
    public function getFuncionarioAsignado()
    {
        return $this->funcionario_asignado;
    }

    /**
     * Set the value of funcionario_asignado
     *
     * @return  self
     */
    public function setFuncionarioAsignado($funcionario_asignado)
    {
        $this->funcionario_asignado = $funcionario_asignado;

        return $this;
    }
}


?>