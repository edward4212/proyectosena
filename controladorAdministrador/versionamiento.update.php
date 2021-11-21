<?php

include_once "../entidadAdministrador/documento.entidad.php";
include_once "../modeloAdministrador/documento.modelo.php";

$id_versionamiento = $_POST['numeroVersionamiento'];
$estado_versionamiento = $_POST['nuevoEstadoDocAct'];

$documentoE = new \entidad\Documento();
$documentoE -> setIdVersionamiento($id_versionamiento);
$documentoE -> setEstado($estado_versionamiento);

$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->actualizarVersionamiento();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>