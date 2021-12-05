<?php

include_once "../entidadAdministrador/documento.entidad.php";
include_once "../modeloAdministrador/documento.modelo.php";

$id_documento = $_POST['idDocumentoCambiar'];
$nombre_documento = $_POST['nuevoNombreDoc'];


$documentoE = new \entidad\Documento();
$documentoE -> setIdDocumento($id_documento);
$documentoE -> setNombreDocumento($nombre_documento);

$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->actualizarNombreDoc();

unset($documentoE);
unset($documentoM);

echo json_encode($resultado);


?>