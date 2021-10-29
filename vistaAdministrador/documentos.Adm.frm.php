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
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-crear"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Creación de
                        Documentos
                    </button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-actualizar"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Administración de
                        Documentos</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-obsoletos"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Matriz de Documentos
                        Obsoletos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-documentos" role="tabpanel"
                    aria-labelledby="nav-documentos-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Documentos Documento Vigentes</h3>
                            <div class="text-center">
                                <h5 id="consulta"></h5>
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
                                    <h5>Proceso</h5>
                                    <select class="form-control redondeado" id="proceso" name="proceso"
                                        required></select>
                                </div>

                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Tipo de Documento</h5>
                                    <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"
                                        required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Codigo del Documento</h5>
                                    <div class="input-group">
                                        <input type="text" aria-label="E" id="siglasProc" name="siglasProc"
                                            class="form-control codigo" readonly>
                                        <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                        <input type="text" aria-label="E" class="form-control codigo" id="siglasTipDoc"
                                            name="siglasTipDoc" readonly>
                                        <label class="input-group-text" id="inputGroup-sizing-lg">-</label>
                                        <input type="number" aria-label="E" class="form-control codigo" aria-label="E"
                                            onKeyDown="if(this.value.length==3) return false;" id="codigo" name="codigo"
                                            onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                                            pattern="[0-9]{10}" aria-describedby="basic-addon1" value="000"
                                            onchange="leadingZeros(this)" onkeyup="leadingZeros(this)"
                                            onclick="leadingZeros(this)">
                                    </div>
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-12">
                                    <h5>Nombre Documento</h5>
                                    <input type="text" class="form-control redondeado" id="nombreDoc" name="nombreDoc"
                                        onkeyup="javascript:this.value=this.value.toUpperCase(); " required>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12 d-flex  align-items-end    ">
                                    <button type="submit" id="btncrearDoc" name="btncrearDoc" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Crear
                                        Documento</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Documentos Registrados</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                                <h5 id="documentosRg"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-actualizar" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Administracion de Documentos</h3>
                            <div class="text-center">
                                <h5 id="documentosAdm"></h5>
                            </div>
                        </div>
                        <!-- Modal para actualizaciones DE DOCUMEENTOS -->
                        <div class="modal fade bd-example-modal-xl" id="administrarDocumentos" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Actualizar Clave Usuario</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form class="row g-3 form-group" id="modifClaveUsu" method="POST">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Proceso</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Tipo Documento</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Codigo </h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" >
                                                </div>
                                                <div class="col-md-10 col-xs-12 col-sm-12">
                                                    <h5>Nombre del Documento</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" >
                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Version</h5>
                                                    <input class="form-control" type="number" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" >
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Creado Por:</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Fecha Creación</h5>
                                                    <input class="form-control" type="date" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" >
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Revisado Por:</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Fecha Revisión</h5>
                                                    <input class="form-control" type="date" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                    <h5>Aprobado Por:</h5>
                                                    <input class="form-control" type="text" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1" >
                                                </div>  
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Fecha Aprobación</h5>
                                                    <input class="form-control" type="date" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
                                                </div>  
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5>Documento</h5>
                                                    <input class="form-control" type="file" name="txtClaveMod"
                                                        id="txtClaveMod" autocomplete="current-password" aria-label="E"
                                                        aria-describedby="basic-addon1">
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
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-obsoletos" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <br>
                            <h3 class="card-title text-center">Documentos Obsoletos</h3>
                            <div class="text-center">
                                <h5 id="documentosObs"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "footer.frm.php" ?>
</body>
<script src="../js/administrador/documento.js"></script>

</html>