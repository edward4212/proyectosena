<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Inicio Anexo de archivos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../documentos/usuarios/imagen/usuario.png" sizes="16x16 24x24 36x36 48x48">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../componente/css/proyecto/style.css">
    <link rel="stylesheet" href="../componente/css/globales/all.min.css">
    <link rel="stylesheet" href="../componente/css/globales/animate.min.css">
    <link rel="stylesheet" href="../componente/css/globales/autoFill.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/bootstrap.min.css">
    <link rel="stylesheet" href="../componente/css/globales/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/colReorder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="../componente/css/globales/datatables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/jquery-ui.min.css">
    <link rel="stylesheet" href="../componente/css/globales/keyTable.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/responsive.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/rowGroup.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/scroller.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/select.dataTables.min.css">
    <link rel="stylesheet" href="../componente/css/globales/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@600&family=Kanit:wght@700&family=Oswald:wght@700&display=swap"
        rel="stylesheet">

    <script src="../componente/libreria/globales/jquery-3.6.0.js"></script>
    <script src="../componente/libreria/globales/bootstrap.min.js"></script>
    <!-- <script src="../componente/libreria/globales/jquery-3.6.0.min.js" ></script>   -->
    <script src="../componente/libreria/globales/all.min.js"></script>
    <script src="../componente/libreria/globales/autoFill.dataTables.min.js"></script>
    <!-- <script src="../componente/libreria/globales/buttons.dataTables.min.js" ></script>
    <script src="../componente/libreria/globales/buttons.html5.min.js" ></script> 
    <script src="../componente/libreria/globales/buttons.jqueryui.min.js" ></script>     
    <script src="../componente/libreria/globales/buttons.print.min.js" ></script>   -->
    <script src="../componente/libreria/globales/colReorder.dataTables.min.js"></script>
    <!-- <script src="../componente/libreria/globales/dataTables.buttons.min.js" ></script>   -->
    <script src="../componente/libreria/globales/dataTables.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/dataTables.dateTime.min.js"></script>
    <script src="../componente/libreria/globales/datatables.min.js"></script>
    <script src="../componente/libreria/globales/fixedColumns.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/fixedHeader.dataTables.min.js"></script>
    <!-- <script src="../componente/libreria/globales/jquery-3.6.0.slim.min.js" ></script>   -->
    <!-- <script src="../componente/libreria/globales/jquery-ui.min.js" ></script>   -->
    <script src="../componente/libreria/globales/jszip.min.js"></script>
    <script src="../componente/libreria/globales/keyTable.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/pdfmake.min.js"></script>
    <script src="../componente/libreria/globales/responsive.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/rowGroup.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/rowReorder.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/scroller.dataTables.min.js"></script>
    <!-- <script src="../componente/libreria/globales/searchBuilder.dataTables.min.js" ></script>  
    <script src="../componente/libreria/globales/searchPanes.dataTables.min.js" ></script>   -->
    <script src="../componente/libreria/globales/select.dataTables.min.js"></script>
    <script src="../componente/libreria/globales/sweetalert2.all.min.js"></script>
    <script src="../componente/libreria/globales/sweetalert2.min.js"></script>
    <script src="../componente/libreria/globales/vfs_fonts.js"></script>
    <script src="../js/proyecto/global.js"></script>
    <script src="../js/Login/logueo.js"></script>

    <!-- Fin Anexo de archivos -->
    <title>Iniciar Sesion</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Formulario login inicio -->
        <div class="container ">
            <div class="position-absolute top-50 start-50 translate-middle  ">
                <div class="card ">
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
                                <form class="form-group" id="LoginF">
                                    <h4 for="formFile" class="form-label ">Usuario</h4>
                                    <input class="form-control form-control-lg bg-light" type="text"
                                        placeholder="Usuario" id="txtUsuario" name="txtUsuario"
                                        aria-label=".form-control-lg example">
                                    <h4 for="formFile" class="form-label">Contraseña</h4>
                                    <div class="input-group mb-3 p-1">
                                        <input class="form-control form-control-lg bg-light login" type="password"
                                            autocomplete="off"  placeholder="Contraseña"
                                            id="txtClave" aria-label="E" name="txtClave" pattern="[A-Z]{1}[0-9]{2}"
                                            maxlength="50" aria-describedby="basic-addon1">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                            onclick="mostrarPassword1()"><span class="fa fa-eye-slash icons"></span>
                                        </button>
                                    </div>
                                    <div class="text-center gap-2 col-12 mx-auto">
                                        <button class="btn  btn-primary " type="button" id="btnLogin">Iniciar
                                            Sesion</button>
                                        <button class="btn  btn-primary " type="button" id="" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Activar Usuario</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Activar Usuario-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Activar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
						<form class="row g-3 form-group" id="actUsu" method="POST">
							<div class="modal-body">
								
									<div class="modal-body">
										<div class="col-md-12 col-xs-12 col-sm-12">
											<h5>Usuario</h5>
											<input class="form-control" type="text" name="txtUsuarioAct" id="txtUsuarioAct"
												autocomplete="off" aria-label="E" aria-describedby="basic-addon1">
											<h5> Nueva Contraseña</h5>
											<input class="form-control" type="password" name="txtClaveAct" id="txtClaveAct"
												autocomplete="off" aria-label="E" aria-describedby="basic-addon1">
										</div>
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" id="btnActUsu" class="btn btn-primary"><i class="far fa-edit"></i>
									Modificar</button>
								<button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
										class="fas fa-undo"></i> Volver</button>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Formulario login fin -->
    </main>
    <?php include_once "footer.frm.php" ?>
	<script src="../js/Login/login.js"></script>
</body>


</html>