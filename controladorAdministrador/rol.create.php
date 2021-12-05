<?php

include_once "../entidadAdministrador/rol.entidad.php";
include_once "../modeloAdministrador/rol.modelo.php";

$rols = $_POST['txtRol'];
$rol =  ucwords($rols);


$rolE = new \entidad\Rol();
$rolE -> setrol($rol);

$rolM= new \modelo\Rol($rolE);
$resultado = $rolM->crearRol();

unset($rolE);
unset($rolM);

echo json_encode($resultado);


?>