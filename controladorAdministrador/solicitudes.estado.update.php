<?php

include_once "../entidadAdministrador/solicitudes.entidad.php";
include_once "../modeloAdministrador/solicitudes.modelo.php";

$idsolicitud = $_POST['numIdSolicitud2'];  
$id_estatus_solicitud= $_POST['estadoSolicitud1'];

$solicitudesE = new \entidad\Solicitudes();;
$solicitudesE -> setIdSolicitud($idsolicitud);
$solicitudesE -> setIdEstatusSolicitud($id_estatus_solicitud);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->estatusSolicitud();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  