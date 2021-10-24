<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";


$id_empleado = $_SESSION['id_empleado'];
$usuario = $_SESSION['usuario'];
$id_prioridad = $_POST['prioridad'];
$id_tipoDocumento = $_POST['tipoDocumento'];
$solicitud = $_POST['solicitud'];
$fechaActual = date("Y-m-d H-i-s");

if (isset($_FILES["fileSolicitud"]))
{
    $foto=$_FILES["fileSolicitud"]["tmp_name"];
    $tipo =$_FILES['fileSolicitud']['type'];
    $tamaño =$_FILES['fileSolicitud']['size'];
    
    $directorio = "../documentos/usuarios/$usuario/solicitudes/$fechaActual/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileSolicitud']['name'];   
        move_uploaded_file($_FILES['fileSolicitud']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileSolicitud']['name'];
            move_uploaded_file($_FILES['fileSolicitud']['tmp_name'],$directorio.$nombre);
        }    
    }
}
else{
    $nombre = NULL ;
}

$solicitudesE = new \entidad\Solicitudes(); 
$solicitudesE -> setIdEmpleado($id_empleado);
$solicitudesE -> setIdPrioridad($id_prioridad);
$solicitudesE -> setIdTipoDocumento($id_tipoDocumento);
$solicitudesE -> setSolicitud($solicitud);
$solicitudesE -> setDocumento($nombre); 
$solicitudesE -> setCarpeta($fechaActual); 

$solicitudesM= new \modelo\Solicitudes($solicitudesE);
$resultado = $solicitudesM->solicitudCreacion();

unset($solicitudesE);
unset($solicitudesM);

echo '
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "success",
            title: "Solcitud de Creacion de Documento Creada con Exito",
            showConfirmButton: false,
            timer: 2000
            }).then(function() {
            window.location.href = "../vistaEmpleado/solicitudes.frm.php";
        });
    });
    </script>';

?>  