<?php

include_once "../entidadAdministrador/inicio.entidad.php";
include_once "../modeloAdministrador/inicio.modelo.php";

$id_empresa = $_POST['numEmpresaModObj'];
$objetivos_calidad = $_POST['txtObjMod'];


$inicioE = new \entidad\Inicio();
$inicioE -> setIdEmpresa($id_empresa);
$inicioE -> setObjetivosCalidad($objetivos_calidad);

$inicioM= new \modelo\Inicio($inicioE);
$resultado = $inicioM->actualizarObjetivosEmpresa();

unset($inicioE);
unset($inicioM);

echo json_encode($resultado);


?>