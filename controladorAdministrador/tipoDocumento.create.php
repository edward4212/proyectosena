<?php

include_once "../entidadAdministrador/tipoDocumento.entidad.php";
include_once "../modeloAdministrador/tipoDocumento.modelo.php";

$tipo_documento = $_POST['txtTipoDocumento'];
$sigla_tipo_documento = $_POST['txtSiglaTipoDocumento'];

$tipoDocumentoE = new \entidad\TipoDocumento();
$tipoDocumentoE -> setTipoDocumento($tipo_documento);
$tipoDocumentoE -> setSiglaTipoDocumento($sigla_tipo_documento);

$tipoDocumentoM= new \modelo\TipoDocumento($tipoDocumentoE);
$resultado = $tipoDocumentoM->creartipoDocumento();

unset($tipoDocumentoE);
unset($tipoDocumentoM);

echo json_encode($resultado);


?>