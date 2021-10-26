<?php

include_once "../entidadAdministrador/usuario.entidad.php";
include_once "../modeloAdministrador/usuario.modelo.php";
include_once "../componente/Mailer/src/PHPMailer.php";
include_once "../componente/Mailer/src/SMTP.php";
include_once "../componente/Mailer/src/Exception.php";



 $nombre_completo  = $_POST['txtNombreEmpleado'];
 $correo_empleado  = $_POST['txtCorreoEmpleado'];
 $id_cargo  = $_POST['cargosUsuario'];
 $usuario  = $_POST['txtUsuario'];
 $clave  = $_POST['txtClaveInicial'];
 $id_rol  = $_POST['rolesUsuario'];

try {

    $nombre_completo  = $_POST['txtNombreEmpleado'];
    $usuario  = $_POST['txtUsuario'];
    $emailTo =  $_POST['txtCorreoEmpleado'];
    $clave  = $_POST['txtClaveInicial'];
    $subject = "SIDOC - Creacion usuario";
    $bodyEmail = "Estimado (a) $nombre_completo,

    Su usuario dentro del sistema SIDOC ha sido creado con la siguiente información:
    
    Usuario: $usuario
    Contraseña Inicial:  $clave

    Para ingresar por primera vez, el sistema solicitará activar su usuario debe dar clic en el boton 'Activar Usuario' 
    y realizar cambio de contraseña .
    
    No olvide guardarla en un sitio seguro.
    
    
    Bienvenido (a)
    
    SIDOC";

    $fromemail = "edward4212@gmail.com";
    $fromname = "SIDOC";
    $host = "smtp.gmail.com";
    $port ="465";
    $SMTPAuth = true;
    $SMTPSecure = "ssl";
    $password ="Romero1316";
    $IsHTML=true;
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail ->isSMTP();
    $mail ->SMTPDebug = 1;
    $mail ->SMTPAuth  =  $SMTPAuth;
    $mail ->SMTPSecure = $SMTPSecure;
    $mail ->Host =  $host;
    $mail ->Port = $port; 
    $mail ->IsHTML = $IsHTML; 
    
    $mail ->Username =  $fromemail;
    $mail ->Password =  $password;

    $mail ->setFrom($fromemail, $fromname);
    $mail ->AddAddress($emailTo);

    // $mail ->isSMTP(true);
    $mail ->Subject = $subject;
    $mail ->Body =$bodyEmail;

    if(!$mail->send()){
        echo "no se envio"; die();
    }

    echo "se envio"; die();



} catch (Exception $e) {
    
}



?>  