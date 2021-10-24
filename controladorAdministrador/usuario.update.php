<?php

include_once "../entidadAdministrador/usuario.entidad.php";
include_once "../modeloAdministrador/usuario.modelo.php";

$id_usuario = $_POST['numIdUsuMod'];
$nombre_completo = $_POST['txtNombreMod'];
$correo_empleado = $_POST['txtCorreoMod'];

if (isset($_POST['cargosUsuarioAct']))
{
    $cargo = $_POST['cargosUsuarioAct'];
}
else{
    $cargo = $_POST['idCargoActuUsuAnt'];
}

if (isset($_POST['rolesUsuarioAct']))
{
    $rol = $_POST['rolesUsuarioAct'];
}
else{
    $rol = $_POST['idRolActuUsuAnt'];
}

$usuarioE = new \entidad\Usuario();

$usuarioE -> setIdUsuario($id_usuario);
$usuarioE -> setNombreCompleto($nombre_completo);
$usuarioE -> setCorreoEmpleado($correo_empleado);
$usuarioE -> setIdCargo($cargo);
$usuarioE -> setIdRol($rol);


$usuarioM= new \modelo\Usuario($usuarioE);
$resultado = $usuarioM->actualizarUsuario();

unset($usuarioE);
unset($usuarioM);

echo json_encode($resultado);

?>