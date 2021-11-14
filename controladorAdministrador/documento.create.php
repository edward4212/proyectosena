<?php

include_once "../entidadAdministrador/documento.entidad.php";
include_once "../modeloAdministrador/documento.modelo.php";
include_once "../controladorLogin/logueo.read.php";


$id_tipo_documento = $_POST['idsiglasTipDoc12'];
$sigla_tipo_documento =  $_POST['siglasTipDoc'];
$id_proceso = $_POST['idsiglasProc12'];
$sigla_proceso =  $_POST['siglasProc'];
$s ="-";
$codigo = $_POST['txtcodigo'];
$codigoConca = $sigla_proceso.$s.$sigla_tipo_documento.$s.$codigo;
$nombre_documento = $_POST['nombreDoc'];
$usuario_crecion = $_SESSION['usuario'];

$documentoE = new \entidad\Documento(); 
$documentoE -> setIdTipoDocumento($id_tipo_documento);
$documentoE -> setIdProceso($id_proceso);
$documentoE -> setCodigo($codigoConca);
$documentoE -> setNombreDocumento($nombre_documento);
$documentoE -> setUsuarioCreacion($usuario_crecion);


$documentoM= new \modelo\Documento($documentoE);
$resultado = $documentoM->creaciondocumento();

unset($documentoE);
unset($documentoM);


echo json_encode($resultado);

?>  