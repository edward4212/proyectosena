<!DOCTYPE html>
<html lang="en">
<head>
<!-- Inicio Anexo de archivos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/png" href="#" sizes="16x16 24x24 36x36 48x48"> 
    <link rel="stylesheet" href="../componente/css/globales/bootstrap.css"> 
    <link rel="stylesheet" href="../componente/css/globales/all.css"> 
    <link rel="stylesheet" href="../componente/css/globales/datatables.css"> 
    <link rel="stylesheet" href="../componente/css/globales/jquery-ui.css"> 
    <link rel="stylesheet" href="../componente/css/globales/alertify.css"> 
    <link rel="stylesheet" href="../componente/css/proyeto/style.css">
    <link rel="stylesheet" href="../componente/css/globales/fontawesome.css"> 
    <link rel="stylesheet" href="../componente/css/globales/regular.css"> 
    <link rel="stylesheet" href="../componente/css/globales/solid.css"> 
    <link rel="stylesheet" href="../componente/css/globales/svg-with-js.css"> 
    <link rel="stylesheet" href="../componente/css/globales/animate.css">
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css"> 
    <link rel="stylesheet" href="../componente/css/globales/autoFill.dataTables.css"> 
    <link rel="stylesheet" href="../componente/css/globales/buttons.dataTables.css"> 
    <link rel="stylesheet" href="../componente/css/globales/colReorder.dataTables.css">  
    <link rel="stylesheet" href="../componente/css/globales/dataTables.dateTime.css">  
    <link rel="stylesheet" href="../componente/css/globales/dataTables.foundation.css">  
    <link rel="stylesheet" href="../componente/css/globales/dataTables.jqueryui.css">  
    <link rel="stylesheet" href="../componente/css/globales/responsive.dataTables.css">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Kanit:wght@700&family=Oswald:wght@700&display=swap" rel="stylesheet"> 
    <script src="../componente/libreria/globales/jquery-3.6.0.js" ></script>    
    <script src="../componente/libreria/globales/bootstrap.js"></script>  
    <script src="../componente/libreria/globales/all.js"></script> 
    <script src="../componente/libreria/globales/datatables.js"></script> 
    <script src="../componente/libreria/globales/dataTables.buttons.js"></script> 
    <script src="../componente/libreria/globales/pdfmake.min.js"></script> 
    <script src="../componente/libreria/globales/regular.js"></script> 
    <script src="../componente/libreria/globales/vfs_fonts.js"></script>
    <script src="../componente/libreria/globales/jszip.min.js"></script> 
    <script src="../componente/libreria/globales/jquery-ui.js"></script>  
    <script src="../componente/libreria/globales/alertify.js"></script>   
    <script src="../componente/libreria/globales/fontawesome.js"></script>      
    <script src="../componente/libreria/globales/jquery.maskedinput.min.js"></script>     
    <script src="../componente/libreria/globales/autoFill.foundation.js"></script> 
    <script src="../componente/libreria/globales/buttons.html5.min.js"></script>
    <script src="../componente/libreria/globales/buttons.jqueryui.js"></script>
    <script src="../componente/libreria/globales/buttons.print.js"></script> 
    <script src="../componente/libreria/globales/colReorder.dataTables.js"></script>
    <script src="../componente/libreria/globales/dataTables.bootstrap.js"></script>
    <script src="../componente/libreria/globales/dataTables.dateTime.js"></script>
    <script src="../componente/libreria/globales/dataTables.fixedColumns.js"></script>
    <script src="../componente/libreria/globales/dataTables.foundation.js"></script>
    <script src="../componente/libreria/globales/dataTables.responsive.js"></script>
    <script src="../componente/libreria/globales/fixedColumns.bootstrap.js"></script>
    <script src="../componente/libreria/globales/fixedColumns.dataTables.js"></script>
    <script src="../componente/libreria/globales/responsive.bootstrap.js"></script> 
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script> 
    <script src="../js/proyecto/global.js"></script>
<!-- Fin Anexo de archivos -->
    <title>Iniciar Sesion</title>
</head>
<body class="bg-light"   >
<!-- Formulario login inicio -->
    <div  class="container ">
        <div class="position-absolute top-50 start-50 translate-middle  "  >
            <div class="card " style="max-width: 700px;">
                <div class="row justify-content-center">
                    <br>
                    <div class="col-md-4 ">
                        <div>
                        <br>
                            <a><i class="fas fa-user-circle fa-10x"></i></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card-body ">
                            <h5 class="card-title text-center">INICIAR SESION</h5>
                            <form class="form-group"  id="LoginF">
                                <h4 for="formFile" class="form-label ">Usuario</h4>
                                <input class="form-control form-control-lg bg-light"  type="text" placeholder="Usuario" id="txtUsuario" name="txtUsuario" aria-label=".form-control-lg example">
                                <h4 for="formFile" class="form-label">Contraseña</h4>
                                <div class="input-group mb-3 p-1">
                                    <input class="form-control form-control-lg bg-light" type="password"  autocomplete="off" class="form-control" placeholder="Contraseña" id="txtClave" aria-label="E" name="txtClave"  pattern="[A-Z]{1}[0-9]{2}" maxlength="50" aria-describedby="basic-addon1">
                                    <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword1()"><span class="fa fa-eye-slash icons"></span> </button>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn  btn-primary m-2 p-2 " type="button" id="btnLogin">Iniciar Sesion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Formulario login fin -->
</body>
<script src="../js/Login/login.js"></script>
</html>


