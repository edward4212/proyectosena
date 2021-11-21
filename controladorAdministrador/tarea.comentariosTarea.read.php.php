<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";


$id_tarea = $_POST['idTareaComDev'];  

$tareaE = new \entidad\Tarea();
$tareaE -> setIdTarea($id_tarea);

$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->comentariosTareas();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>  