<?php

include_once "../entidadAdministrador/proceso.entidad.php";
include_once "../modeloAdministrador/proceso.modelo.php";

$id_proceso = $_POST['numidProcesosMod'];
$proceso = $_POST['txtProcesoMod'];
$sigla_proceso = $_POST['txtSiglaProcesoMod'];
$sigla_procesoAnt = $_POST['txtSiglaProcesoAnt'];

$directorio = "../documentos/procesos/$sigla_procesoAnt/";
$directorioNew = "../documentos/procesos/$sigla_proceso/";

rename ($directorio, $directorioNew);

$procesoE = new \entidad\Proceso();
$procesoE -> setIdProceso($id_proceso);
$procesoE -> setProceso($proceso);
$procesoE -> setSiglaProceso($sigla_proceso);

$procesoM= new \modelo\Proceso($procesoE);
$resultado = $procesoM->actualizarProceso();

unset($procesoE);
unset($procesoM);

echo json_encode($resultado);


?>