<?php

include_once "../entidadEmpleado/solicitudes.entidad.php";
include_once "../modeloEmpleado/solicitudes.modelo.php";
include_once "../controladorLogin/logueo.read.php";

$id_empleado = $_SESSION['id_empleado'];
$codigo = $_POST['codigo2'];
$id_tipoDocumento = $_POST['idTipoDoc2'];
$id_prioridad = $_POST['prioridad2'];
$solicitud = $_POST['solicitud2'];
$fechaActual = date("Y-m-d H-i-s");

if (isset($_FILES["fileEliminacion"]))
{
    $foto=$_FILES["fileEliminacion"]["tmp_name"];
    $tipo =$_FILES['fileEliminacion']['type'];
    $tamaño =$_FILES['fileEliminacion']['size'];
    
    $directorio = "../documentos/solicitudes/$id_empleado/$fechaActual/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileEliminacion']['name'];   
        move_uploaded_file($_FILES['fileEliminacion']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileEliminacion']['name'];
            move_uploaded_file($_FILES['fileEliminacion']['tmp_name'],$directorio.$nombre);
        }    
    }
}
else{
    $nombre = NULL ;
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
$resultado = $solicitudesM->solicitudEliminacion();

unset($solicitudesE);
unset($solicitudesM);

echo "<script>  alert('Solcitud de Eliminación de Documento creada con Exito');</script>";
echo "<script> window.location.href = '../vistaEmpleado/solicitudes.frm.php'</script>";

?>  