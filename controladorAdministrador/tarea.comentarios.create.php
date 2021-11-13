<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];
$id_tarea = $_POST['numIdTidTareaCom'];  
$comentario = $_POST['comentrioEmpleadoTarea'];

$tareaE = new \entidad\Tarea();
$tareaE -> setUsuario($usuario);
$tareaE -> setIdTarea($id_tarea);
$tareaE -> setComentario($comentario);

$tareaM= new \modelo\Tarea($tareaE);

$resultado = $tareaM->comentariosTarea1();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>  