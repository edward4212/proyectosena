<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_empleado = $_SESSION['id_empleado'];
$usuario = $_SESSION['usuario'];
$codigo = $_POST['codigo'];
$id_tipoDocumento = $_POST['idTipoDoc1'];
$id_prioridad = $_POST['prioridad1'];
$solicitud = $_POST['solicitud1'];
$fechaActual = date("Y-m-d H-i-s");

if (isset($_FILES["fileActualizacion"]))
{  
    $directorio = "../documentos/usuarios/$usuario/solicitudes/$fechaActual/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileActualizacion']['name'];   
        move_uploaded_file($_FILES['fileActualizacion']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileActualizacion']['name'];
            move_uploaded_file($_FILES['fileActualizacion']['tmp_name'],$directorio.$nombre);
        }    
    }
}
else{
    $nombre = NULL ;
    
    $directorio = "../documentos/usuarios/$usuario/solicitudes/$fechaActual/";
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
    }else{
        if(file_exists($directorio)){
        }    
    }
}

$solicitudesE = new \entidad\Solicitudes(); 
$solicitudesE -> setIdEmpleado($id_empleado);
$solicitudesE -> setCodigo($codigo);
$solicitudesE -> setIdTipoDocumento($id_tipoDocumento);
$solicitudesE -> setIdPrioridad($id_prioridad);
$solicitudesE -> setSolicitud($solicitud);
$solicitudesE -> setDocumento($nombre);  
$solicitudesE -> setCarpeta($fechaActual); 

$solicitudesM= new \modelo\Solicitudes($solicitudesE);
$resultado = $solicitudesM->solicitudActualizacion();

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
            title: "Solcitud de Actualización de Documento creada con Exito",
            showConfirmButton: false,
            timer: 2000
            }).then(function() {
            window.location.href = "../vistaEmpleado/solicitudes.frm.php";
        });
    });
    </script>';


?>  