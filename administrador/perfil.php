<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Perfil</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-perfil"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</button>
                    <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-contraseña"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contraseña</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-home-tab">
                    <br>
                    <div class="row ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <br>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Foto de Perfil</h5>
                                    <img src="../documentos/usuarios/<?php $usuario= $_SESSION['usuario']; echo $usuario;?>/imagen/<?php $img_empleado= $_SESSION['img_empleado']; echo $img_empleado; ?>"
                                        class="card-img-top imgPerfil" alt="...">
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="" class="btn btn-primary text-center"
                                        data-bs-toggle="modal" data-bs-target="#modalImgAdm">Modificar Imagen</button>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre Funcionario</h5>
                                    <p class="card-text"><?php $nombre= $_SESSION['nombre_completo']; echo $nombre; ?>
                                    </p>
                                    <h5 class="card-title">Cargo</h5>
                                    <p class="card-text"><?php $cargo= $_SESSION['cargo']; echo $cargo; ?> </p>
                                    <h5 class="card-title">Correo Electrónico </h5>
                                    <p class="card-text"><?php $correo= $_SESSION['correo_empleado']; echo $correo; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Manual de Funciones</h5>
                                        <?php if ($_SESSION['manual_funciones'] != null): ?>
                                            <a class="btn btn-primary" href="../documentos/cargos/<?php $cargo= $_SESSION['cargo']; echo $cargo;?>/<?php $manual_funciones= $_SESSION['manual_funciones']; echo $manual_funciones;?>">Descargar Manual de Funciones <i class="fas fa-download"></i></a>
                                        <?php else: ?>   
                                            <h5>No se ha cargado el manual de Funciones</h5>
                                        <?php endif ?>
                                </div>
                                <br>
                            </div>
                        </div>
                        <!-- Modal para cambio de foto de perfil-->
                        <div class="modal fade bd-example-modal-lg" id="modalImgAdm" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar Imagen de Perfil</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group"
                                        action="../controladorAdministrador/imagen.update.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipDocElim"
                                                    id="numidTipDocElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nueva Imagen</h5>
                                                    <input class="form-control" type="file" name="fileImagenPerfilUs"
                                                        id="fileImagenPerfilUs" class="file" accept="image/*">
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>
                                                Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contraseña" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <br>
                    <div class="row  justify-content-center">
                        <div class="col-md-6 col-xs-12 col-sm-12 ">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Actualizar Contraseña</h5>
                                    <form class="row g-3 form-group" id="modifClaveUsu" method="POST">
                                        <div class="modal-body">
                                            <div class="">
                                                <input class="form-control" type="number" name="numIdUsurioMoClave"
                                                    id="numIdUsurioMoClave" hidden>
                                                <div class="">
                                                    <h5>Nueva Contraseña</h5>
                                                    <input class="bg-light login" type="password"
                                                        name="txtNuevaClaveEmplA" id="txtNuevaClaveEmplA"
                                                        autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                    <button id="show_password" class="btn btn-primary" type="button"
                                                        onclick="mostrarPassword2()"><span
                                                            class="fa fa-eye-slash icons"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModClavEmpl" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>
<script src="../js/administrador/perfil.js"></script>
</body>


</html>