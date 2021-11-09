<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";

$id_documento = $_POST['documentos'];

$tareaE = new \entidad\Tarea();
$tareaE -> setIdDocumento($id_documento);

$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->readVersionamiento();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>