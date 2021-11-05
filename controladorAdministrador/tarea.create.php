<?php

include_once "../entidadAdministrador/solicitudes.entidad.php";
include_once "../modeloAdministrador/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];
$idsolicitud = $_POST['numIdSolicitud3'];  


$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuario($usuario);
$solicitudesE -> setIdSolicitud($idsolicitud);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->tareaCrear();
$resultado = $solicitudesM->estadoTarea();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>  