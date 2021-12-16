<?php

include_once "../entidadAdministrador/cargo.entidad.php";
include_once "../modeloAdministrador/cargo.modelo.php";


if(!file_exists($_FILES['fileCargoMod']['tmp_name']) || !is_uploaded_file($_FILES['fileCargoMod']['tmp_name']))
{
    $id_cargo = $_POST['numidCargoMod'];
    $cargo = $_POST['txtCargoMod'];
    $cargoAnt = $_POST['txtCargoModAnt'];
    $manual = $_POST['txtManualModAnt']; 

    $directorio = "../documentos/cargos/$cargoAnt/";
    $directorioNew = "../documentos/cargos/$cargo/";

    rename ($directorio, $directorioNew);


    $cargoE = new \entidad\Cargo();
    $cargoE -> setIdcargo($id_cargo);
    $cargoE -> setCargo($cargo);
    $cargoE -> setManualFunciones($manual);
}
else{

    $id_cargo = $_POST['numidCargoMod'];
    $cargo = $_POST['txtCargoMod'];
    $cargoAnt = $_POST['txtCargoModAnt'];

    $directorio = "../documentos/cargos/$cargoAnt/";
    $directorioNew = "../documentos/cargos/$cargo/";

    rename ($directorio, $directorioNew);

    $foto=$_FILES["fileCargoMod"]["tmp_name"];
    $tipo =$_FILES['fileCargoMod']['type'];
    $tamaño =$_FILES['fileCargoMod']['size'];
     
    if(!file_exists($directorioNew)){
        mkdir($directorioNew,0777,true);
        $nombre = $_FILES['fileCargoMod']['name'];   
        move_uploaded_file($_FILES['fileCargoMod']['tmp_name'],$directorioNew.$nombre);        
    }else{
        if(file_exists($directorioNew)){
            $nombre = $_FILES['fileCargoMod']['name'];
            move_uploaded_file($_FILES['fileCargoMod']['tmp_name'],$directorioNew.$nombre);
        }    
    }

    $cargoE = new \entidad\Cargo();
    $cargoE -> setIdcargo($id_cargo);
    $cargoE -> setCargo($cargo);
    $cargoE -> setManualFunciones($nombre);
}


$cargoM= new \modelo\Cargo($cargoE);
$resultado = $cargoM->actualizarcargo();

unset($cargoE);
unset($cargoM);

echo '
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script type="text/javascript" src="../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script>    
    jQuery(function(){
        Swal.fire({
            icon: "success",
            title: "Cargo Actualizado con Éxito",
            showConfirmButton: false,
            timer: 3000
            }).then(function() {
                window.location.href = "../administrador/usuarios.php";
        });
    });
    </script>';

?>