<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";

$tareaE = new \entidad\Tarea();

$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->readTotal();


unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>  