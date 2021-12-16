<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";


$numero_version = $_POST['versionSig1'];
$id_documento = $_POST['idDocumento1'];
$descriocion_version = $_POST['descriCambio1'];
$usuario = $_SESSION['usuario'];
$usuario_revision = $_POST['empleadoCAN'];
$codigo = $_POST['codigo1'];

$proceso = $_POST['proceso1'];
$tipDoc = $_POST['sigla_tipo_documento1'];

$foto=$_FILES["fileDocumento1"]["tmp_name"];
$tipo =$_FILES['fileDocumento1']['type'];
$tamaño =$_FILES['fileDocumento1']['size'];

$directorio = "../documentos/procesos/$proceso/$tipDoc/$codigo/$numero_version/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    $nombre = $_FILES['fileDocumento1']['name'];   
    move_uploaded_file($_FILES['fileDocumento1']['tmp_name'],$directorio.$nombre);        
}else{
    if(file_exists($directorio)){
        $nombre = $_FILES['fileDocumento1']['name'];
        move_uploaded_file($_FILES['fileDocumento1']['tmp_name'],$directorio.$nombre);
    }    
}


$tareaE = new \entidad\Tarea(); 
$tareaE -> setNumeroVersion($numero_version);
$tareaE -> setIdDocumento($id_documento);
$tareaE -> setDescripcionVersion($descriocion_version);
$tareaE -> setUsuario($usuario);
$tareaE -> setUsuarioRevision($usuario_revision);
$tareaE -> setDocumento($nombre);

$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->creacionVersionamiento1();



unset($tareaE);
unset($tareaM);

echo '
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
        jQuery(function(){
            Swal.fire({
                icon: "success",
                title: "Versionamiento Creado con Éxito",
                showConfirmButton: false,
                timer: 3000
                }).then(function() {
                window.location.href = "../administrador/documentos.php";
            });
        });
    </script>';

?>  