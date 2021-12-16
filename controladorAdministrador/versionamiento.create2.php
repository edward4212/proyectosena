<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$usuario = $_SESSION['usuario'];
$id_versionamiento = $_POST['idVersionDevo'];
$descriocion_version = $_POST['descriCambioDev'];
$usuario_revision = $_POST['empleadoDev'];
$numero_version = $_POST['versionDev'];
$codigo = $_POST['codigoDev'];

$proceso = $_POST['procesoDEv'];
$tipDoc = $_POST['tipoDocDElv'];

$foto=$_FILES["fileDocumentoDev"]["tmp_name"];
$tipo =$_FILES['fileDocumentoDev']['type'];
$tamaño =$_FILES['fileDocumentoDev']['size'];

$directorio = "../documentos/procesos/$proceso/$tipDoc/$codigo/$numero_version/";

if(!file_exists($directorio)){
    mkdir($directorio,0777,true);
    $nombre = $_FILES['fileDocumentoDev']['name'];   
    move_uploaded_file($_FILES['fileDocumentoDev']['tmp_name'],$directorio.$nombre);        
}else{
    if(file_exists($directorio)){
        $nombre = $_FILES['fileDocumentoDev']['name'];
        move_uploaded_file($_FILES['fileDocumentoDev']['tmp_name'],$directorio.$nombre);
    }    
}


$tareaE = new \entidad\Tarea(); 

$tareaE -> setUsuario($usuario);
$tareaE -> setIdVersionamiento($id_versionamiento);
$tareaE -> setDescripcionVersion($descriocion_version);
$tareaE -> setUsuarioRevision($usuario_revision);
$tareaE -> setDocumento($nombre);

$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->actualizacionVersionamientoDev();
$resultado = $tareaM->comentariosVersionamientoDevolEn();


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