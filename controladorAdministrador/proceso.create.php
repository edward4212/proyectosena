<?php

include_once "../entidadAdministrador/proceso.entidad.php";
include_once "../modeloAdministrador/proceso.modelo.php";

$procesos = $_POST['txtProceso'];
$proceso =  ucwords($procesos);

$sigla_procesos = $_POST['txtSiglaProceso'];
$sigla_proceso = strtoupper($sigla_procesos);


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