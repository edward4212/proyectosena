<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$nombre_documento = $_GET['term'];

$tareaE = new \entidad\Tarea();
$tareaE->setNombreDocumento($nombre_documento);
$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->autocomplete();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);




?>