<?php

namespace modelo;
use PDO;
use Exception;

include_once '../entidadAdministrador/usuario.entidad.php';
include_once '../entorno/conexionSingleton.php';

class Usuario{

     public $id_empleado;
     public $nombre_completo;
     public $img_empleado;
     public $correo_empleado;
     public $id_cargo;
     public $id_empresa;
     public $estado_empleado;
     public $id_usuario;
     public $usuario;
     public $clave;
     public $id_rol;
     public $estado;

     // OTROS ATRIBUTOS //
     public $conexion;
     private $result;
     private $retorno;
     private $sql;


     public function __construct(\entidad\Usuario $usuarioE)
     {
          $this->id_empleado = $usuarioE->getIdEmpleado();
          $this->nombre_completo = $usuarioE->getNombreCompleto();
          $this->img_empleado = $usuarioE->getImgEmpleado();
          $this->correo_empleado = $usuarioE->getCorreoEmpleado();
          $this->id_cargo = $usuarioE->getIdCargo();
          $this->id_empresa = $usuarioE->getIdEmpresa();
          $this->estado_empleado = $usuarioE->getEstadoEmpleado();
          $this->id_usuario = $usuarioE->getIdUsuario();
          $this->usuario = $usuarioE->getUsuario();
          $this->clave = $usuarioE->getClave();
          $this->id_rol = $usuarioE->getIdRol();
          $this->estado = $usuarioE->getEstado();

          $this->conexion = \Conexion::singleton();
     }

     /**
     * Se realiza la consulta de los procesos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     public function read()
     {
          try {
               $this->sql = "SELECT
               usu.`id_usuario`,
               empl.`id_empleado`,
               empl.`nombre_completo`,
               empl.`correo_empleado`,
               usu.`usuario`,
               usu.`estado`,
               (AES_DECRYPT(usu.`clave`, 'kddbjw8b3d')) as clave,
               rol.`id_rol`,
               rol.`rol`,
               ca.`id_cargo`,
               ca.`cargo`
               FROM empleado AS empl
               
               INNER JOIN usuario AS usu ON usu.`id_empleado` = empl.`id_empleado`
               INNER JOIN rol ON rol.`id_rol` = usu.`id_rol`
               INNER JOIN cargo AS ca ON ca.`id_cargo` = empl.`id_cargo`";
               $this->result = $this->conexion->query($this->sql);
               $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
                    
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function creacionUsuario()
     {
          try {
               $this->sql = "CALL create_usuario(1,'$this->usuario',$this->clave,
               '$this->id_rol','C',1,'$this->nombre_completo','usuario.png',
               '$this->correo_empleado','$this->id_cargo','1','A')";
               $this->result=$this->conexion->query($this->sql);
               $this->retorno =  $this->result->fetchAll(PDO::FETCH_ASSOC);
               // $this->retorno = "Exito: Usuario Creado";

          } catch (Exception $e) {
               $this->retorno = $e->getMessage(); 
          }
               return $this->retorno;
     }

     public function newpass()
     {
          try {
               $this->sql="UPDATE usuario SET  estado = 'C' , clave = AES_ENCRYPT('$this->clave','kddbjw8b3d')
               WHERE id_usuario = '$this->id_usuario'";
               $this->result=$this->conexion->query($this->sql);

          } catch (Exception $e) {
               $this->retorno =$e->getMessage();
          }
          return $this->retorno;
     }

     public function actualizarUsuario()
     {
          try {
               $this->sql = "UPDATE usuario
               INNER JOIN empleado ON usuario.`id_empleado` = empleado.`id_empleado`
               SET
                    empleado.`nombre_completo` = '$this->nombre_completo',
                    empleado.`correo_empleado` = '$this->correo_empleado',
                    usuario.`id_rol`= '$this->id_rol', 
                    empleado.`id_cargo` ='$this->id_cargo'
               WHERE usuario.`id_usuario` = '$this->id_usuario'";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }

     public function inactivarUsuario()
     {

          try {
               $this->sql = "UPDATE usuario SET estado='$this->estado' WHERE id_usuario=$this->id_usuario";
               $this->result = $this->conexion->query($this->sql);
          } catch (Exception $e) {
               $this->retorno = $e->getMessage();
          }
               return $this->retorno;
     }



}

?>