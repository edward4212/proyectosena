<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];

$tareaE = new \entidad\Tarea();
$tareaE -> setUsuario($usuario);

$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->read();


unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>  