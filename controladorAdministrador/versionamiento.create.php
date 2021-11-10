<?php

include_once "../entidadAdministrador/tarea.entidad.php";
include_once "../modeloAdministrador/tarea.modelo.php";
include_once "../controladorLogin/logueo.read.php";


$numero_version = $_POST['versionSig'];
$id_documento = $_POST['idDocumento'];
$descriocion_version = $_POST['descriCambio'];
$usuario = $_SESSION['usuario'];
$usuario_revision = $_POST['empleado'];


$proceso = $_POST['proceso'];
$tipDoc = $_POST['sigla_tipo_documento'];


    $foto=$_FILES["fileDocumento"]["tmp_name"];
    $tipo =$_FILES['fileDocumento']['type'];
    $tamaño =$_FILES['fileDocumento']['size'];
    
    $directorio = "../documentos/procesos/$proceso/$tipDoc/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileDocumento']['name'];   
        move_uploaded_file($_FILES['fileDocumento']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileDocumento']['name'];
            move_uploaded_file($_FILES['fileDocumento']['tmp_name'],$directorio.$nombre);
        }    
    }

$id_tarea = $_POST['numIdTarea1'];



$tareaE = new \entidad\Tarea(); 
$tareaE -> setNumeroVersion($numero_version);
$tareaE -> setIdDocumento($id_documento);
$tareaE -> setDescripcionVersion($descriocion_version);
$tareaE -> setUsuario($usuario);
$tareaE -> setUsuarioRevision($usuario_revision);
$tareaE -> setDocumento($nombre);

$tareaE -> setIdTarea($id_tarea);

$tareaM= new \modelo\Tarea($tareaE);
$resultado = $tareaM->creacionVersionamiento();
$resultado = $tareaM->actualizarTarea();


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
                title: "Versionamiento Creado con Exito",
                showConfirmButton: false,
                timer: 2000
                }).then(function() {
                window.location.href = "../vistaAdministrador/tareas.Adm.frm.php";
            });
        });
    </script>';

?>  