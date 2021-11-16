<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_versionamiento = $_POST['id_documentoVersion'];
$numero_version = $_POST['versionAnterior'];

$tareaE = new \entidad\Tarea();
$tareaE -> setIdDocumento($id_versionamiento);
$tareaE -> setNumeroVersion($numero_version);


$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->versionamientoObsoleto();

unset($tareaE);
unset($tareaM);

echo json_encode($resultado);


?>