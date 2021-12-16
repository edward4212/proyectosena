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
    $subject = "LIMARO - Creacion usuario";
    $bodyEmail = "Estimado (a) $nombre_completo,

    Su usuario dentro del sistema LIMARO ha sido creado con la siguiente información:
    
    Usuario: $usuario
    Contraseña Inicial:  $clave

    Para ingresar por primera vez, el sistema solicitará activar su usuario debe dar clic en el boton 'Activar Usuario' 
    y realizar cambio de contraseña .
    
    No olvide guardarla en un sitio seguro.

    Bienvenido(a)
    
    LIMARO";

    $fromemail = "notificaciones@limaro.co";
    $fromname = "LIMARO";
    $host = "smtp.mi.com.co";
    $port ="465";
    $SMTPAuth = true;
    $SMTPSecure = "tsl";
    $password ="Kddbjw8b3d";
    $IsHTML=true;

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail ->IsSMTP();
    $mail ->SMTPDebug = 2;
    $mail ->SMTPAuth  =  $SMTPAuth;
    $mail ->SMTPSecure = $SMTPSecure;
    $mail ->Host =  $host;
    $mail ->Port = $port; 
    $mail ->IsHTML = $IsHTML; 
    $mail->CharSet  ="utf-8";
    $mail->SMTPKeepAlive = true;
    $mail ->Username =  $fromemail;
    $mail ->Password =  $password;

    $mail ->setFrom($fromemail, $fromname);
    $mail ->addAddress($emailTo);

    // $mail ->isSMTP(true);
    $mail ->Subject = $subject;
    $mail ->Body =$bodyEmail;

    if(!$mail->send()){
       echo ("no enviado"); 
    }

    echo ("enviado"); 



} catch (Exception $e) {
    
}



?>  