<!-- Se agrega Head -->
<?php include_once "head.adm.frm.php" ?>
<title>Solicitudes</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-solicitudes-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes"
                        aria-selected="false">Solicitudes Registradas</button>
                    <button class="nav-link " id="nav-asignadas-tab" data-bs-toggle="tab" data-bs-target="#nav-asignadas"
                        type="button" role="tab" aria-controls="nav-asignadas" aria-selected="true">Solicitudes Asignadas</button>
                </div>
            </nav>
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Solicitudes Registradas</h3>
                            <div>
                                <form action="" class="form-group" id="buscar">
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden>
                                    <h5 id="solicitudes"></h5>
                                </form>
                            </div>
                            
                        </div>
                        <!-- Modal para ver comentarios-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comentarios de la Solicitud</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 id="comentarios"></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Volver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-asignadas" role="tabpanel" aria-labelledby="nav-asignadas-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Solicitudes Asignadas</h3>
                            <div>
                                <form action="" class="form-group" id="buscar">
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden>
                                    <h5 id="misSoliciutdes"></h5>
                                </form>
                            </div>
                            
                        </div>
                        <!-- Modal para Agregar comentarios-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comentarios</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12 col-xs-12 col-sm-12"></div>
                                        <h5 >Agregar Comentario</h5>
                                        <div></div>textarea>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12"></div>
                                        <h5 >Comentario De la Solicitud</h5>
                                        <h5 id="comentarios"></h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Volver</button>
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Volver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>
</body>
<script src="../js/administrador    /solicitudes.js"></script>

</html>