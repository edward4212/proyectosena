<?php

include_once "../entidadAdministrador/rol.entidad.php";
include_once "../modeloAdministrador/rol.modelo.php";

$id_rol = $_POST['numidRolElim'];
$estado = $_POST["estadoModRol"];

$rolE = new \entidad\Rol();
$rolE -> setIdRol($id_rol);
$rolE -> setEstado($estado);

$rolM= new \modelo\Rol($rolE);
$resultado = $rolM->inactivarRol();

unset($rolE);
unset($rolM);

echo json_encode($resultado);


?>