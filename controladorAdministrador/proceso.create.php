<?php

include_once "../entidadAdministrador/proceso.entidad.php";
include_once "../modeloAdministrador/proceso.modelo.php";

$proceso = $_POST['txtProceso'];
$sigla_proceso = $_POST['txtSiglaProceso'];
$directorio = "../documentos/procesos/$sigla_proceso/";
   
if(!file_exists($directorio)){
    mkdir($directorio,0777,true);        
}

$procesoE = new \entidad\Proceso();
$procesoE -> setProceso($proceso);
$procesoE -> setSiglaProceso($sigla_proceso);

$procesoM= new \modelo\Proceso($procesoE);
$resultado = $procesoM->crearProceso();

unset($procesoE);
unset($procesoM);

echo json_encode($resultado);


?>