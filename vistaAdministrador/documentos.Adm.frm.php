<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Documentos</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-documentos-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-documentos" type="button" role="tab" aria-controls="nav-documentos"
                        aria-selected="true">Matriz de Documentos Vigentes</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-obsoletos"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Matriz de Documentos
                        Obsoletos</button>
                    <button class="nav-link" id="nav-tramite-tab" data-bs-toggle="tab" data-bs-target="#nav-tramite"
                        type="button" role="tab" aria-controls="nav-tramite" aria-selected="false">Documentos En
                        Tramites</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-crear"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Creación de
                        Documentos
                    </button>
                    <button class="nav-link " id="nav-creacion1-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-creacion1" type="button" role="tab" aria-controls="nav-creacion1"
                        aria-selected="true">Versionamiento</button>
                    <button class="nav-link " id="nav-inactivar-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-inactivar" type="button" role="tab" aria-controls="nav-inactivar"
                        aria-selected="true">Inactivar Documentos Vigentes</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-documentos" role="tabpanel"
                    aria-labelledby="nav-documentos-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos Vigentes</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="consulta"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-obsoletos" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos Obsoletos</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="documentosObs"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-tramite" role="tabpanel" aria-labelledby="nav-tramite-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos En Tramite</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="Doctramite"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-crear" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Crear Documentos</h3>
                            <form class="row g-3 form-group" id="crearDoc" name="crearDoc" method="POST">
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <input type="text" aria-label="E" class="form-control codigo" id="idsiglasProc12"
                                        name="idsiglasProc12" hidden>
                                    <h5>Proceso</h5>
                                    <select class="form-control redondeado" id="procesoNuevo" name="procesoNuevo"
                                        required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <input type="text" aria-label="E" class="form-control codigo" id="idsiglasTipDoc12"
                                        name="idsiglasTipDoc12" hidden>
                                    <h5>Tipo de Documento</h5>
                                    <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"
                                        required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12 d-flex  align-items-end" id="botonesAsig">
                                    <input type="text" aria-label="E" id="siglasProcNuevo" name="siglasProcNuevo"
                                        class="form-control codigo" hidden>
                                    <input type="text" aria-label="E" class="form-control codigo" id="siglasTipDoc"
                                        name="siglasTipDoc" hidden>
                                    <button type="button" id="btnAsignarCod" name="btnAsignarCod"
                                        class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Asignar Numero</button>
                                    <div class="" id="codigoAsi" hidden>
                                        <h5>Codigo del Documento</h5>
                                        <div class="input-group">
                                            <input type="text" aria-label="E" id="siglasProc1" name="siglasProc1"
                                                class="form-control codigo" readonly>
                                            <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                            <input type="text" aria-label="E" class="form-control codigo"
                                                id="siglasTipDoc1" name="siglasTipDoc1" readonly>
                                            <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                            <input type="number" aria-label="E" class="form-control codigo"
                                                id="txtcodigo" name="txtcodigo" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 col-xs-12 col-sm-12" id="nombreAsig" hidden>
                                    <h5>Nombre Documento</h5>
                                    <input type="text" class="form-control redondeado" id="nombreDoc" name="nombreDoc"
                                        onkeyup="javascript:this.value=this.value.toUpperCase(); " required>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12 d-flex  align-items-end">
                                    <br>
                                    <button type="submit" id="btncrearDoc" name="btncrearDoc"
                                        class="btn btn-primary mb-3" hidden><i class="fas fa-plus"></i> Crear
                                        Documento</button>
                                    <button type="reset" class="btn btn-secondary mb-3" id="btncrearResDoc"
                                        name="btncrearResDoc" hidden><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos Registrados</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="documentosRg"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-creacion1" role="tabpanel" aria-labelledby="nav-creacion-tab">
                    <div class="row">
                        <div>
                        </div>
                        <div class="row">
                            <form class="row g-3 form-group"
                                action="../controladorAdministrador/versionamiento.create1.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="col-md-10 col-xs-12 col-sm-12">
                                    <input class="form-control" type="text" name="idDocumento1" id="idDocumento1"
                                        hidden>
                                    <h5 for="data">Seleccionar Documento</h5>
                                    <input class="form-control" type="text" name="documentoAuto1" id="documentoAuto1">
                                    <input class="form-control" type="text" name="proceso1" id="proceso1" hidden>
                                    <input class="form-control" type="text" name="sigla_tipo_documento1"
                                        id="sigla_tipo_documento1" hidden>
                                </div>
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5>Version Siguiente</h5>
                                    <input class="form-control" type="text" name="versionSig1" id="versionSig1"
                                        readonly>
                                </div>
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h5>Descripción de la Versión</h5>
                                    <textarea type="text" class="form-control redondeado" rows="2" id="descriCambio1"
                                        name="descriCambio1" required></textarea>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Agregar Documento</h5>
                                    <input class="form-control" type="file" name="fileDocumento1" id="fileDocumento1"
                                        required>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Selecionar Usuario para Revision</h5>
                                    <select class="form-control" id="empleadoCAN" name="empleadoCAN" aria-label="E"
                                        aria-describedby="basic-addon1" required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i>Iniciar
                                        Versión</button>
                                    <button type="button" class="btn btn-primary"><i class="fas fa-undo"></i>
                                        Volver</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-inactivar" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos Vigentes</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="documentosAdm"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualziacion de estado documento-->
                        <div class="modal fade bd-example-modal-lg" id="inactivarDoc" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Inactivar Documento</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="inactivarDocVig" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input class="form-control" type="number" name="numeroVersionamiento"
                                                    id="numeroVersionamiento" hidden>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Estado Actual</h5>
                                                    <input class="form-control" type="text" name="estadoDocAct"
                                                        id="estadoDocAct" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Nuevo Estado del Documento</h5>
                                                    <input class="form-control" type="text" name="nuevoEstadoDocAct"
                                                        id="nuevoEstadoDocAct" value="O" hidden>
                                                    <label class="form-control" type="text" readonly >Obsoleto</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnInactivarDoc" class="btn btn-primary"><i
                                                    class="fas fa-times"></i> Inactivar Documento</button>
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
    <script src="../js/administrador/documento.js"></script>
    <script src="../js/administrador/tareas.adm.js"></script>
</body>

</html>