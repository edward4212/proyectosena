<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario_revision = $_SESSION['usuario'];
$id_versionamiento = $_POST['numIdTareaApro'];
$comentario = $_POST['descriCambioApr'];

$tareaE = new \entidad\Tarea();
$tareaE -> setIdVersionamiento($id_versionamiento);
$tareaE -> setDescripcionVersion($comentario);
$tareaE -> setUsuario($usuario_revision);

$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->aprobarVersionamiento();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>