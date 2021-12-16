<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Usuarios</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav class=""> 
                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-usuarios-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-usuarios" type="button" role="tab" aria-controls="nav-usuarios"
                        aria-selected="false">Usuarios</button>
                    <button class="nav-link  " id="nav-cargo-tab" data-bs-toggle="tab" data-bs-target="#nav-cargo"
                        type="button" role="tab" aria-controls="nav-cargo" aria-selected="true">Cargos</button>
                    <button class="nav-link  " id="nav-rol-tab" data-bs-toggle="tab" data-bs-target="#nav-rol"
                        type="button" role="tab" aria-controls="nav-rol" aria-selected="false">Roles</button>
                </div>
            </nav>
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-usuarios" role="tabpanel"
                    aria-labelledby="nav-usuarios-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Empleado</h3>
                            <form class="row g-3 form-group needs-validation" id="usuario" method="POST" >
                                <h3 class="card-title">Crear Empleado</h3>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Nombre Completo Empleado</h5>
                                    <input class="form-control inicialM" type="text" name="txtNombreEmpleado"
                                        id="txtNombreEmpleado" aria-label="E" aria-describedby="basic-addon1"
                                        required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Correo Electrónico </h5>
                                    <input class="form-control" type="email" name="txtCorreoEmpleado"
                                        id="txtCorreoEmpleado" placeholder="name@example.com"
                                        title="Introduzca una direccion de correo valido" aria-label="E"
                                        aria-describedby="basic-addon1" style="text-transform:lowercase;" required>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5>Cargo</h5>
                                    <select class="form-control " id="cargosUsuario" name="cargosUsuario" aria-label="E"
                                        aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5>Rol</h5>
                                    <select class="form-control " id="rolesUsuario" name="rolesUsuario" aria-label="E"
                                        aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5>Usuario</h5>
                                    <input class="form-control" type="text" name="txtUsuario" id="txtUsuario"
                                        aria-label="E" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <h5>Clave Inicial</h5>
                                    <input class="form-control" type="password" name="txtClaveInicial"
                                        id="txtClaveInicial" autocomplete="current-password" aria-label="E"
                                        aria-describedby="basic-addon1" value="12345" readonly required>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarUsuario"><i
                                            class="fas fa-plus"></i> Crear Usuarios</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Usuarios Registrados</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                                <h5 id="usuarios"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones clave usuario-->
                        <div class="modal fade bd-example-modal-lg" id="modClaveUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Clave Usuario</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="modifClaveUsu" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numIdUsurioMoClave"
                                                    id="numIdUsurioMoClave" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nueva Contraseña</h5>
                                                    <input class="form-control" type="password" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" value="12345" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModClaveUsu" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre Usuario-->
                        <div class="modal fade bd-example-modal-lg" id="modUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="actulizarUsuario" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numIdUsuMod"
                                                    id="numIdUsuMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nombre Empleado</h5>
                                                    <input class="form-control inicialM " type="text" name="txtNombreMod"
                                                        id="txtNombreMod"  >
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Correo Electrónico </h5>
                                                    <input class="form-control" type="text" name="txtCorreoMod"
                                                        id="txtCorreoMod" onkeyup="javascript:this.value=this.value.toLowerCase();" >
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Cargo Actual:</h5>
                                                    <input class="form-control" type="text" name="idCargoActuUsuAnt"
                                                        id="idCargoActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" hidden readonly>
                                                    <input class="form-control" type="text" name="cargoActuUsuAnt"
                                                        id="cargoActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <h5>Cargo Nuevo</h5>
                                                    <select class="form-control " id="cargosUsuarioAct"
                                                        name="cargosUsuarioAct" aria-label="E"
                                                        aria-describedby="basic-addon1"></select>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Rol Actual:</h5>
                                                    <input class="form-control" type="text" name="idRolActuUsuAnt"
                                                        id="idRolActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" hidden readonly>
                                                    <input class="form-control" type="text" name="rolActuUsuAnt"
                                                        id="rolActuUsuAnt" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <h5>Rol Nuevo</h5>
                                                    <select class="form-control " id="rolesUsuarioAct"
                                                        name="rolesUsuarioAct" aria-label="E"
                                                        aria-describedby="basic-addon1"></select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnActualizarEmpl" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado Cargo-->
                        <div class="modal fade bd-example-modal-lg" id="estadoUsuario" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar estado Usuario</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarUsuario" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidUsuElim"
                                                    id="numidUsuElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Estado Actual:</h5>
                                                    <input class="form-control" type="text" name="estadoUsuActu"
                                                        id="estadoUsuActu" aria-label="E"
                                                        aria-describedby="basic-addon1" readonly>
                                                    <h5>Nuevo Estado del Usuario</h5>
                                                    <select class="form-group" id="estadoModusuario"
                                                        name="estadoModusuario">
                                                        <option value="A">Activo</option>
                                                        <option value="C">Creado</option>
                                                        <option value="I">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarUsuario" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-cargo" role="tabpanel" aria-labelledby="nav-cargo-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Cargo</h3>
                            <form class="row g-3 form-group" action="../controladorAdministrador/cargo.create.php"
                                method="POST" enctype="multipart/form-data">
                                <h3 class="card-title">Crear Cargo</h3>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Nombre Cargo</h5>
                                    <input class="form-control inicialM " type="text" name="txtCargo" id="txtCargo" required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Manual de Funciones</h5>
                                    <input class="form-control" type="file" id="fileCargo" name="fileCargo" multiple>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Crear
                                        Cargo</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Cargos Registrados</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                                <h5 id="cargos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre cargo-->
                        <div class="modal fade bd-example-modal-lg" id="modCargo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Cargo</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group"
                                        action="../controladorAdministrador/cargo.update.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidCargoMod"
                                                    id="numidCargoMod" hidden>
                                                <input class="form-control" type="text" name="txtCargoModAnt"
                                                    id="txtCargoModAnt" hidden>
                                                <input class="form-control" type="text" name="txtManualModAnt"
                                                    id="txtManualModAnt" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Cargo</h5>
                                                    <input class="form-control inicialM" type="text" name="txtCargoMod"
                                                        id="txtCargoMod" >
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Manual de Funciones</h5>

                                                    <input class="form-control" type="file" id="fileCargoMod"
                                                        name="fileCargoMod" multiple>
                                                </div>
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
                        <!-- Modal para actualziacion de estado Cargo-->
                        <div class="modal fade bd-example-modal-lg" id="estadoCargo" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar estado Cargo</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarCargo" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidCargoElim"
                                                    id="numidCargoElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Estado Actual</h5>
                                                    <input class="form-control" type="text" name="txtCargoElim"
                                                        id="txtCargoElim" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nuevo Estado del Rol</h5>
                                                    <select class="form-group" id="estadoModCargo"
                                                        name="estadoModCargo">
                                                        <option value="A">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarCargo" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-rol" role="tabpanel" aria-labelledby="nav-rol-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Roles</h3>
                            <form class="row g-3 form-group" id="rol" method="POST">
                                <h3 class="card-title">Crear Rol</h3>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5>Nombre Rol</h5>
                                    <input class="form-control inicialM" type="text" name="txtRol" id="txtRol" required >
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarRol"><i
                                            class="fas fa-plus"></i> Crear Rol</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Roles Registrados</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                                <h5 id="roles"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre roles-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Rol</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarRol" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidRolMod"
                                                    id="numidRolMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Rol</h5>
                                                    <input class="form-control inicialM" type="text" name="txtRolMod"
                                                        id="txtRolMod" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarRol" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado rol-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Inactivar Rol</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarRol" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidRolElim"
                                                    id="numidRolElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Estado Actual</h5>
                                                    <input class="form-control" type="text" name="txtRolElim"
                                                        id="txtRolElim" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nuevo Estado del Rol</h5>
                                                    <select class="form-group" id="estadoModRol" name="estadoModRol">
                                                        <option value="A">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarRol" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Cambiar Estado</button>
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

<script src="../js/administrador/usuario.adm.js"></script>

</body>

</html>