<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Solicitudes</title>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-solicitudes-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes"
                        aria-selected="false">Solicitudes Asignadas</button>
                    <button class="nav-link " id="nav-asignadas-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-asignadas" type="button" role="tab" aria-controls="nav-asignadas"
                        aria-selected="true">Tareas</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <h3 class="card-title text-center">Solicitudes Asignadas</h3>
                            <div>
                                <form action="" class="form-group" id="buscar">
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" >
                                    <input type="number" name="numIdSolicitud3" id="numIdSolicitud3" >
                                    <h5 id="solicitudesAsig"></h5>
                                </form>
                            </div>

                        </div>
                        <!-- Modal para ver estado-->
                        <div class="modal fade" id="estadoSol" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Estado de la Solicitud</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="EstadiSolicitud">
                                        <div class="modal-body">
                                            <input type="number" name="numIdSolicitud2" id="numIdSolicitud2" >
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Estado Actual de la Solicitud </h5>
                                                <input type="text" class="form-control redondeado" 
                                                    id="estadoSolicitud" name="estadoSolicitud" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Nuevo estado de la Solicitud</h5>
                                            <select class="form-control " id="estadoSolicitud1" name="estadoSolicitud1" aria-label="E"
                                            aria-describedby="basic-addon1" required></select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                                id="btnEstadiSolicitud" name="btnEstadiSolicitud" data-bs-toggle="modal"
                                                data-bs-dismiss="modal"> <i class="fas fa-plus"></i>Cambiar
                                                Estado</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal para ver comentarios-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Comentarios de la Solicitud</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="buscar1">
                                        <div class="modal-body">
                                            <input type="number" name="numIdSolicitud1" id="numIdSolicitud1" >
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Agregar Comentario</h5>
                                                <textarea type="text" class="form-control redondeado" rows="2"
                                                    id="comentrioEmpleado" name="comentrioEmpleado" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                                id="btnCrearcomentario" name="btnCrearcomentario" data-bs-toggle="modal"
                                                data-bs-dismiss="modal"> <i class="fas fa-plus"></i>Agregar
                                                Comentario</button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 id="comentarios"></h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i
                                                    class="fas fa-undo"></i> Volver</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-asignadas" role="tabpanel" aria-labelledby="nav-asignadas-tab">
                  <h5>hoa</h5>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>
</body>
<script src="../js/administrador/tareas.adm.js"></script>

</html>