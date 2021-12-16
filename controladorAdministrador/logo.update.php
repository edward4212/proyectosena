<?php

include_once "../entidadAdministrador/inicio.entidad.php";
include_once "../modeloAdministrador/inicio.modelo.php";

$id_empresa=$_POST["numEmpresaMod1"];

if (isset($_FILES["fileLogo"]))
{
    $foto=$_FILES["fileLogo"]["tmp_name"];
    $tipo =$_FILES['fileLogo']['type'];
    $tamaño =$_FILES['fileLogo']['size'];
    
    $directorio = "../documentos/empresa/logo/";
   
    if(!file_exists($directorio)){
        mkdir($directorio,0777,true);
        $nombre = $_FILES['fileLogo']['name'];   
        move_uploaded_file($_FILES['fileLogo']['tmp_name'],$directorio.$nombre);        
    }else{
        if(file_exists($directorio)){
            $nombre = $_FILES['fileLogo']['name'];
            move_uploaded_file($_FILES['fileLogo']['tmp_name'],$directorio.$nombre);
        }    
    }
}
else{
    $nombre = NULL ;
}


$inicioE =new \entidad\Inicio();
$inicioE->setIdEmpresa($id_empresa);
$inicioE->setLogo($nombre);

$inicioM =new \modelo\Inicio($inicioE);

$resultado =$inicioM->actualizarLogo();


unset($inicioE);
unset($inicioM);

echo '
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "success",
            title: "Logo Actualizado con Éxito",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
            window.location.href = "../administrador/inicio.php";
        });
    });
    </script>';
?>  