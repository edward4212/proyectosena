<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Procesos y Tipos De Documentos</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-procesos" type="button" role="tab" aria-controls="nav-home"
                        aria-selected="true"> Proceso</button>
                    <button class="nav-link " id="nav-tiDoc-tab" data-bs-toggle="tab" data-bs-target="#nav-tiDoc"
                        type="button" role="tab" aria-controls="nav-crear" aria-selected="true">Tipo De
                        Documento</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-procesos" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Procesos</h3>
                            <form class="row g-3 form-group" id="proceso" method="POST">
                                <h3 class="card-title">Crear Proceso</h3>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5>Nombre Proceso</h5>
                                    <input class="form-control inicialM" type="text" name="txtProceso" id="txtProceso"
                                         required >
                                </div>
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                </div>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5>Siglas Proceso</h5>
                                    <input class="form-control" type="text" name="txtSiglaProceso" id="txtSiglaProceso"
                                        maxlength="4" required
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarProceso"><i
                                            class="fas fa-plus"></i> Crear Proceso</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Procesos Registrados</h3>
                            <div class="">
                            <br>
                                <h5 id="procesos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre procesos-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Proceso</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarPro" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidProcesosMod"
                                                    id="numidProcesosMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nombre Proceso</h5>
                                                    <input class="form-control inicialM" type="text" name="txtProcesoMod"
                                                        id="txtProcesoMod" >
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Sigla Proceso</h5>
                                                    <input class="form-control" type="text" name="txtSiglaProcesoAnt"
                                                        id="txtSiglaProcesoAnt" hidden>
                                                    <input class="form-control" type="text" name="txtSiglaProcesoMod"
                                                        id="txtSiglaProcesoMod" maxlength="4"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarPro" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado procesos-->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Inactivar Proceso</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarProce" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidProcesosElim"
                                                    id="numidProcesosElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nombre Proceso</h5>
                                                    <input class="form-control " type="text" name="txtProcesoElim"
                                                        id="txtProcesoElim" readonly>
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Sigla Proceso</h5>
                                                    <input class="form-control" type="text" name="txtSiglaProcesoElim"
                                                        id="txtSiglaProcesoElim" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nuevo Estado del Proceso</h5>
                                                    <select class="form-group" id="estadoModProceso"
                                                        name="estadoModProceso">
                                                        <option value="A">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarPro" class="btn btn-primary"><i
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
                <div class="tab-pane fade" id="nav-tiDoc" role="tabpanel" aria-labelledby="nav-tiDoc-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Tipo Documento</h3>
                            <form class="row g-3 form-group" id="tipoDocumento" method="POST">
                                <h3 class="card-title">Crear Tipo Documento</h3>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5>Nombre Tipo Documento</h5>
                                    <input class="form-control inicialM" type="text" name="txtTipoDocumento"
                                        id="txtTipoDocumento" required
                                       
                                        >
                                </div>
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                </div>
                                <div class="col-md-5 col-xs-12 col-sm-12">
                                    <h5>Siglas Tipo Documento</h5>
                                    <input class="form-control" type="text" name="txtSiglaTipoDocumento"
                                        id="txtSiglaTipoDocumento" maxlength="4" required
                                        onkeyup="javascript:this.value=this.value.toUpperCase(); ">
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary mb-3" id="btnRegistrarTipoDocumento"><i
                                            class="fas fa-plus"></i> Crear Tipo Documento</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Tipo Documento Registrados</h3>
                            <div class="">
                            <br>
                                <h5 id="tipoDocumentos"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones sobre Tipo Documento-->
                        <div class="modal fade bd-example-modal-lg" id="actualizarTipoDocuento" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Tipo Documento</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="ModificarTipoDoc" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipoDocumentoMod"
                                                    id="numidTipoDocumentoMod" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nombre Tipo Documento</h5>
                                                    <input class="form-control inicialM" type="text" name="txtTipoDocumentoMod"
                                                        id="txtTipoDocumentoMod" required
                                                       >
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Sigla Tipo Documento</h5>
                                                    <input class="form-control" type="text"
                                                        name="txtSiglaTipoDocumentoMod" id="txtSiglaTipoDocumentoMod"
                                                        required
                                                        onkeyup="javascript:this.value=this.value.toUpperCase(); ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnModificarTipoDoc" class="btn btn-primary"><i
                                                    class="far fa-edit"></i> Modificar</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para cambio de estado sobre Tipo Documento-->
                        <div class="modal fade bd-example-modal-lg" id="cambiarEstadoTipoDoc" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cambiar Estado Tipo Documento
                                        </h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarTipoDoc" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numidTipDocElim"
                                                    id="numidTipDocElim" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nombre Tipo Documento</h5>
                                                    <input class="form-control" type="text" name="txtTipoDocElim"
                                                        id="txtTipoDocElim" readonly>
                                                </div>

                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Sigla Tipo Documento</h5>
                                                    <input class="form-control" type="text" name="txtSiglaTipDocElim"
                                                        id="txtSiglaTipDocElim" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nuevo Estado del Proceso</h5>
                                                    <select class="form-group" id="estadoModTipdoc"
                                                        name="estadoModTipdoc">
                                                        <option value="A">Activo</option>
                                                        <option value="I">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnEliminarTipDoc" class="btn btn-primary"><i
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
<script src="../js/administrador/procesos.Adm.js"></script>
</body>
</html>