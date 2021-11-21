<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario_revision = $_SESSION['usuario'];
$id_versionamiento = $_POST['numIdVerDevolApr'];
$comentario = $_POST['descriDevoluApro'];
$id_tarea = $_POST['id_tareaDEvAp'];

$tareaE = new \entidad\Tarea();
$tareaE -> setIdVersionamiento($id_versionamiento);
$tareaE -> setDescripcionVersion($comentario);
$tareaE -> setUsuario($usuario_revision);
$tareaE -> setIdTarea($id_tarea);


$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->DevolverVersionamiento1();
$resultado = $tareaM->comentariosVersionamientoDevol1();
$resultado = $tareaM->comentariosTareaDevAp();
unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>