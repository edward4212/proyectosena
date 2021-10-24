<?php

include_once "../entidadAdministrador/inicio.entidad.php";
include_once "../modeloAdministrador/inicio.modelo.php";

$id_empresa = $_POST['numEmpresaModMis'];
$mision = $_POST['txtMisionMod'];


$inicioE = new \entidad\Inicio();
$inicioE -> setIdEmpresa($id_empresa);
$inicioE -> setMision($mision);

$inicioM= new \modelo\Inicio($inicioE);
$resultado = $inicioM->actualizarMisionEmpresa();

unset($inicioE);
unset($inicioM);

echo json_encode($resultado);


?>