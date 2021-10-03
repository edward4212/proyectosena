<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_empleado = $_SESSION['id_empleado'];
$id_prioridad = $_POST['prioridad'];
$id_tipoDocumento = $_POST['tipoDocumento'];
$solicitud = $_POST['solicitud'];
$fechaActual = date("Y-m-d H-i-s");

if (isset($_FILES["fileSolicitud"]))
{
    $foto=$_FILES["fileSolicitud"]["tmp_name"];
    $tipo =$_FILES['fileSolicitud']['type'];
    $tamaño =$_FILES['fileSolicitud']['size'];
    
    $directorio = "../documentos/solicitudes/$id_empleado/$fechaActual/";
   
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

echo "<script>  alert('Solcitud de Creacion de Documento Creada con Exito');</script>";
echo "<script> window.location.href = '../vistaEmpleado/solicitudes.frm.php'</script>";

?>  