<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario_revision = $_SESSION['usuario'];
$id_versionamiento = $_POST['numIdTarea11'];
$comentario = $_POST['descriCambioRev'];
$usuario_aprobacion = $_POST['empleado1'];

$tareaE = new \entidad\Tarea();
$tareaE -> setIdVersionamiento($id_versionamiento);
$tareaE -> setDescripcionVersion($comentario);
$tareaE -> setUsuario($usuario_revision);
$tareaE -> setUsuarioAprobacion($usuario_aprobacion);


$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->actualizarVersionamiento();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>