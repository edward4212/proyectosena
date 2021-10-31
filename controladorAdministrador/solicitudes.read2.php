<?php

include_once "../entidadAdministrador/solicitudes.entidad.php";
include_once "../modeloAdministrador/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];

$solicitudesE = new \entidad\Solicitudes();
$solicitudesE -> setUsuario($usuario);

$solicitudesM= new \modelo\Solicitudes($solicitudesE);

$resultado = $solicitudesM->read2();

unset($solicitudesE);
unset($solicitudesM);

echo json_encode($resultado);


?>