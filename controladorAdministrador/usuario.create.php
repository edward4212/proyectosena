<?php

include_once "../entidadAdministrador/usuario.entidad.php";
include_once "../modeloAdministrador/usuario.modelo.php";
include_once "../componente/Mailer/src/PHPMailer.php";
include_once "../componente/Mailer/src/SMTP.php";
include_once "../componente/Mailer/src/Exception.php";



 $nombre_completo  = $_POST['txtNombreEmpleado'];
 $correo_empleado  = $_POST['txtCorreoEmpleado'];
 $id_cargo  = $_POST['cargosUsuario'];
 $usuario  = $_POST['txtUsuario'];
 $clave  = $_POST['txtClaveInicial'];
 $id_rol  = $_POST['rolesUsuario'];

$directorio = "../documentos/usuarios/$usuario/imagen/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    copy("../documentos/usuarios/imagenes/usuario.png","../documentos/usuarios/$usuario/imagen/usuario.png");     
}


$usuarioE = new \entidad\Usuario(); 
$usuarioE -> setNombreCompleto($nombre_completo);
$usuarioE -> setCorreoEmpleado($correo_empleado);
$usuarioE -> setIdCargo($id_cargo);
$usuarioE -> setUsuario($usuario);
$usuarioE -> setClave($clave);
$usuarioE -> setIdRol($id_rol);

$usuarioM= new \modelo\Usuario($usuarioE);
$resultado = $usuarioM->creacionUsuario();

unset($usuarioE);
unset($usuarioM);


echo json_encode($resultado);



?>  