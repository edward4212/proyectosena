<?php

namespace modelo;

include_once "../entidadLogin/login.entidad.php";
include_once "../entorno/conexionSingleton.php";


use PDO;

class login{

    public $idUsuario;
    public $Usuario;
    public $clave;

    // OTROS ATRIBUTOS //
    
    public  $result;
    public  $retorno;
    public  $respuesta;
    public  $conexion;
    public  $sql;

    public function __construct(\entidad\login $loginE)
    
    {
        $this->id_usuario = $loginE->getId_usuario ();
        $this->usuario = $loginE->getUsuario();
        $this->clave = $loginE->getClave();
        $this->conexion = \Conexion::singleton();
    }

    public function read(){
        try {
            $this->sql="SELECT 
            us.`id_usuario`,
            us.`usuario`,
            rol.`id_rol`,
            rol.`rol`,
            emp.`id_empleado`,
            emp.`nombre_completo`,
            emp.`correo_empleado`,
            emp.`img_empleado`,
            car.`cargo`,
	        car.`id_cargo`
            
            FROM 
                usuario AS us
            
            INNER JOIN rol AS rol ON us.`id_rol` = rol.`id_rol`
            INNER JOIN empleado AS emp ON us.`id_empleado` = emp.`id_empleado`
            INNER JOIN cargo AS car ON  emp.`id_cargo` = car.`id_cargo`

            WHERE usuario ='$this->usuario' AND clave = '$this->clave' ";
            $this->result = $this->conexion->query($this->sql);
            $this->retorno = $this->result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $this->retorno= $e->getMessage();
        }
        return $this->retorno;
    
        
    }
    
   


} 

?>