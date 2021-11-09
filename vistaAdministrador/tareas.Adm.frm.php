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
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden >
                                    <input type="number" name="numIdSolicitud3" id="numIdSolicitud3" hidden>
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
                                            <input type="number" name="numIdSolicitud2" id="numIdSolicitud2" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Estado Actual de la Solicitud </h5>
                                                <input type="text" class="form-control redondeado" id="estadoSolicitud"
                                                    name="estadoSolicitud" readonly>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Nuevo estado de la Solicitud</h5>
                                            <select class="form-control " id="estadoSolicitud1" name="estadoSolicitud1"
                                                aria-label="E" aria-describedby="basic-addon1" required></select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnEstadiSolicitud"
                                                name="btnEstadiSolicitud"> <i class="fas fa-plus"
                                                    data-bs-dismiss="modal"></i>Cambiar
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
                                            <input type="number" name="numIdSolicitud1" id="numIdSolicitud1" hidden>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Agregar Comentario</h5>
                                                <textarea type="text" class="form-control redondeado" rows="2"
                                                    id="comentrioEmpleado" name="comentrioEmpleado" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnCrearcomentario"
                                                name="btnCrearcomentario" data-bs-dismiss="modal"> <i
                                                    class="fas fa-plus"></i>Agregar
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
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                        <h3 class="card-title text-center">Mis Tareas</h3>
                            <div>
                                <form action="" class="form-group" id="buscar">
                                    <input type="number" name="numIdTarea" id="numIdTarea" hidden >
                                    <h5 id="tareas"></h5>
                                </form>
                            </div>
                        </div>
                        <!-- Modal para administrar tarea-->
                        <div class="modal fade" id="modaltarea" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ADMINISTRAR TAREA</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group">
                                        <div class="modal-body">
                                            <div class="row">
                                                <input type="number" name="numIdSolicitud1" id="numIdSolicitud1" hidden >
                                                <div class="col-md-10 col-xs-12 col-sm-12">
                                                    <label for="data">Seleccionar Documento</label>
                                                    <input  class="form-control"  type="text" name="documentoAuto" id="documentoAuto"  >
                                                    <!-- <select class="form-control" id="documentos" name="documentos" aria-label="E" aria-describedby="basic-addon1" required></select>
                                                    <input  class="form-control"  type="text" name="idsiglasProc" id="idsiglasProc" hidden >
                                                    <input  class="form-control"  type="text" name="proceso" id="proceso" hidden > -->
                                                </div>
                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                    <h5>Version Siguiente</h5>
                                                    <input  class="form-control"  type="text" name="versionSig" id="versionSig" readonly>
                                                </div>
                                                <div class="col-md-12 col-xs-12 col-sm-12">
                                                    <h5>Descripción de la Versión</h5>
                                                    <textarea type="text" class="form-control redondeado" rows="2" id="comentrioEmpleado" name="comentrioEmpleado" required></textarea>
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5>Agregar Documento</h5>
                                                    <input  class="form-control"  type="file" name="numIdSolicitud1" id="numIdSolicitud1" >
                                                </div>
                                                <div class="col-md-6 col-xs-12 col-sm-12">
                                                    <h5>Selecionar Usuario para Revision</h5>
                                                    <select class="form-control" id="cargarDocumento" name="cargarDocumento" aria-label="E" aria-describedby="basic-addon1" required></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="btnCrearcomentario"
                                                name="btnCrearcomentario" data-bs-dismiss="modal"> <i
                                                    class="fas fa-plus"></i>Iniciar Versión</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <i
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

<script src="../jS/administrador/tareas.adm.js"></script>

</body>
</html>