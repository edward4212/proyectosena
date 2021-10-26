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
                        aria-selected="true">Matriz Documentos</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-crear"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Crear Documentos </button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-actualizar"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Actualizar Documentos</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-eliminar"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Eliminar Documentos</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-obsoletos"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Documentos Obsoletos</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-documentos" role="tabpanel"
                    aria-labelledby="nav-documentos-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Documentos Documento</h3>
                            <div class="text-center">
                                <h5 id="consulta"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-crear" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row ">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Crear Documentos</h3>
                            <form class="row g-3 form-group"
                                action="../controladorEmpleado/solicitudes.crearDoc.create.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Proceso</h5>
                                    <select class="form-control redondeado" id="prioridad" name="prioridad"
                                        required></select>
                                </div>

                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Tipo de Documento</h5>
                                    <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"
                                        required></select>
                                </div>
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Codigo</h5>
                                    <input type="text" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Nombre Documento</h5>
                                    <input type="text" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-12">
                                    <h5>Codigo Version</h5>
                                    <input type="text" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div>
                               
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Elaborado Por</h5>
                                    <select class="form-control redondeado" id="prioridad" name="prioridad"
                                        required></select>
                                </div>  
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5>Fecha Elaboracion</h5>
                                    <input type="date" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div> 
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Revisado Por</h5>
                                    <select class="form-control redondeado" id="prioridad" name="prioridad"
                                        required></select>
                                </div> 
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5>Fecha Revision</h5>
                                    <input type="date" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div> 
                                <div class="col-md-4 col-xs-12 col-sm-12">
                                    <h5>Aprobado</h5>
                                    <select class="form-control redondeado" id="prioridad" name="prioridad"
                                        required></select>
                                </div> 
                                <div class="col-md-2 col-xs-12 col-sm-12">
                                    <h5>Fecha Aprobado</h5>
                                    <input type="date" class="form-control redondeado" id="solicitud" name="solicitud" required>
                                </div> 
                                <div class="col-md-6 col-xs-12 col-sm-12 d-flex  align-items-end    ">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Crear
                                        Solicitud</button>
                                    <button type="reset" class="btn btn-secondary mb-3"><i class="fas fa-broom"></i>
                                        Limpiar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-actualizar" role="tabpanel" aria-labelledby="nav-contact-tab">..Actualizar.</div>
                <div class="tab-pane fade" id="nav-eliminar" role="tabpanel" aria-labelledby="nav-contact-tab">.Eliminar..</div>
                <div class="tab-pane fade" id="nav-obsoletos" role="tabpanel" aria-labelledby="nav-contact-tab">.Matriz documentos Obsoletos..</div>
            </div>
        </div>
    </main>

    <?php include_once "footer.frm.php" ?>
</body>
<script src="../js/empleado/documento.js"></script>

</html>