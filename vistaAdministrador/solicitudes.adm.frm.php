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
                        aria-selected="false">Solicitudes Registradas</button>
                    <button class="nav-link " id="nav-estadoSol-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-estadoSol" type="button" role="tab" aria-controls="nav-estadoSol"
                        aria-selected="true">Estado Solicitudes</button>
                    <button class="nav-link " id="nav-estadoTarea-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-estadoTarea" type="button" role="tab" aria-controls="nav-estadoTarea"
                        aria-selected="true">Estado Tareas</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel"
                    aria-labelledby="nav-solicitudes-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Solicitudes Registradas</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <form action="" class="form-group" id="buscar">
                                    <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden>
                                    <h5 id="solicitudesAdmn"></h5>
                                </form>
                            </div>

                        </div>
                        <!-- Modal Asignar Funcionario-->
                        <div class="modal fade" id="asignarFuncionarioSol" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Asignar Funcionario Encargado de
                                            la Solicitud</h5>
                                        <button type="button" id="btnCerrarModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" class="form-group" id="buscar2">
                                        <div class="modal-body">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <input type="number" name="numIdSolicitud2" id="numIdSolicitud2" hidden>
                                                <h5>Funcionario Asignado</h5>
                                                <input class="form-control " id="funcionarioAsignado"
                                                    name="funcionarioAsignado" aria-label="E"
                                                    aria-describedby="basic-addon1" readonly>
                                                <h5>Fecha de Asignación</h5>
                                                <input class="form-control " id="fecha" name="fecha" aria-label="E"
                                                    aria-describedby="basic-addon1" readonly>
                                            </div>
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <h5>Seleccione para Asignar o Modificar el Funcionario</h5>
                                                <select class="form-control " id="empleado" name="empleado"
                                                    aria-label="E" aria-describedby="basic-addon1"></select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnAgregarFunc" name="btnAgregarFunc"
                                                class="btn btn-primary"><i class="fas fa-plus"></i> Asignar
                                                Funcionario</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                    class="fas fa-undo"></i>Volver</button>
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
                                                name="btnCrearcomentario" data-bs-toggle="modal"> <i
                                                    class="fas fa-plus"></i>Agregar Comentario</button>
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
                <div class="tab-pane fade" id="nav-estadoSol" role="tabpanel" aria-labelledby="nav-estadoSol-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Estado Solicitudes</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="soliciTotal"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-estadoTarea" role="tabpanel" aria-labelledby="nav-estadoTarea-tab">
                    <div class="row ">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <br>
                            <h3 class="card-title text-center">Estado Tareas</h3>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <h5 id="tareasTotal"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>
    <script src="../js/administrador/solicitudes.adm.js"></script>
    <script src="../js/administrador/tareas.adm.js"></script>
</body>

</html>