<?php

include_once "../entidadAdministrador/documento.entidad.php";
include_once "../modeloAdministrador/documento.modelo.php";
include_once "../controladorLogin/logueo.read.php";


$id_tipo_documento = $_POST['idsiglasTipDoc12'];
$sigla_tipo_documento =  $_POST['siglasTipDoc'];
$id_proceso = $_POST['idsiglasProc12'];
$sigla_proceso =  $_POST['siglasProc1'];
$s ="-";
$e =" ";
$codigo = $_POST['txtcodigo'];
$codigoConca = $sigla_proceso.$s.$sigla_tipo_documento.$s.$codigo;
$nombre_documentos = $_POST['nombreDoc'];

$nombre_documentos =$codigoConca.$e.$nombre_documentos ;
$nombre_documento = strtoupper($nombre_documentos);

$usuario_crecion = $_SESSION['usuario'];

$directorio = "../documentos/procesos/$sigla_proceso/$sigla_tipo_documento/$codigoConca/0/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
           
}else{
    if(file_exists($directorio)){
       
    }    
}


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