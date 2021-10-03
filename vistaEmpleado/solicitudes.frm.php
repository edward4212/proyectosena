<!-- Se agrega Head -->

<?php include_once "head.frm.php" ?>

<!-- se agrega Menu -->

<?php include_once "menu.frm.php" ?>

<!-- se Inicia Pagina Inicio  -->

<title>Solicitudes</title>
<body class="bg-light"   >
    <div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active " id="nav-solicitudes-tab" data-bs-toggle="tab" data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes" aria-selected="false">Mis Solicitudes</button>
            <button class="nav-link " id="nav-crear-tab" data-bs-toggle="tab" data-bs-target="#nav-crear" type="button" role="tab" aria-controls="nav-crear" aria-selected="true">Crear Documento</button>
            <button class="nav-link " id="nav-actualizar-tab" data-bs-toggle="tab" data-bs-target="#nav-actualizar" type="button" role="tab" aria-controls="nav-actualizar" aria-selected="false">Actualizar Documento</button>
            <button class="nav-link " id="nav-eliminar-tab" data-bs-toggle="tab" data-bs-target="#nav-eliminar" type="button" role="tab" aria-controls="nav-eliminar" aria-selected="false">Eliminar Documento</button>
        </div>
    </nav>
    <br>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade  show active" id="nav-solicitudes" role="tabpanel" aria-labelledby="nav-solicitudes-tab">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="card-title text-center">Mis Solicitudes</h3>
                        </div>
                        <div class="text-center">
                            <form action="" class="form-group" id="buscar">
                                <input type="number" name="numIdSolicitud" id="numIdSolicitud" hidden  >
                                <h5 id="solicitudes"></h5> 
                            </form>
                        </div> 
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-crear" role="tabpanel" aria-labelledby="nav-crear-tab">
            <div class="row border">
                <div class="col-md-12 col-xs-12 col-sm-12">
                <h3 class="card-title text-center">Crear Documentos</h3>
                <form class="row g-3 form-group" action="../controladorEmpleado/solicitudes.crearDoc.create.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <h5>Prioridad</h5>
                        <select class="form-control redondeado" id="prioridad" name="prioridad"></select>
                    </div>
                    <div class="col-md-2 col-xs-12 col-sm-12">
                    </div>
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <h5>Tipo de Documento</h5>
                        <select class="form-control redondeado" id="tipoDocumento" name="tipoDocumento"></select>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h5>Descripcion</h5>
                        <textarea type="text"  rows="8" cols="135"  id="solicitud" name="solicitud"></textarea>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <input type="file" id="fileSolicitud" name="fileSolicitud" multiple>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <button type="submit" class="btn btn-primary mb-3">Crear Solicitud</button>
                        <button type="reset" class="btn btn-secondary mb-3">Limpiar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-actualizar" role="tabpanel" aria-labelledby="nav-actualizar-tab">
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">                          
                            <h3 class="card-title text-center">Actualizar Documentos Vigentes</h3>
                        </div>
                        <div class="text-center">
                            <h5 id="actualizacion"></h5> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-eliminar" role="tabpanel" aria-labelledby="nav-eliminar-tab">
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">                          
                            <h3 class="card-title text-center">Eliminar Documentos Vigentes</h3>
                        </div>
                        <div class="text-center">
                            <h5 id="eliminacion"></h5> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <!-- Modal para ver comentarios-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comentarios de la Solicitud</h5>
                <button type="button" id="btnCerrarModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <h5 id="comentarios"></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver</button>
            </div>
            </div>
        </div>
    </div>

     <!-- Modal para solicitar actualizaciones-->
     <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solicitar Actualizacion de Documento</h5>
                    <button type="button" id="btnCerrarModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3 form-group" action="../controladorEmpleado/solicitudes.actualiDoc.create.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h5>Codigo Documento</h5>
                        <input type="text" name="codigo" id="codigo" readonly>
                        <h5>Tipo Documento</h5>
                        <input type="text" name="idTipoDoc1" id="idTipoDoc1" hidden>
                        <input type="text" name="tipoDoc1" id="tipoDoc1" readonly>
                        <h5>Prioridad</h5>
                        <select class="form-control redondeado" id="prioridad1" name="prioridad1"></select>
                        <h5>Descripcion</h5>
                        <textarea type="text"  rows="8" cols="55"  id="solicitud1" name="solicitud1"></textarea>
                        <input type="file" id="fileActualizacion" name="fileActualizacion" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary">Crear Solicitud</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    
     <!-- Modal para solicitar eliminacion-->
     <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Solicitar Eliminación de Documento</h5>
                    <button type="button" id="btnCerrarModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="row g-3 form-group" action="../controladorEmpleado/solicitudes.elimDoc.create.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h5>Codigo Documento</h5>
                        <input type="text" name="codigo2" id="codigo2" readonly>
                        <h5>Tipo Documento</h5>
                        <input type="text" name="idTipoDoc2" id="idTipoDoc2" hidden>
                        <input type="text" name="tipoDoc2" id="tipoDoc2" readonly>
                        <h5>Prioridad</h5>
                        <select class="form-control redondeado" id="prioridad2" name="prioridad2"></select>
                        <h5>Descripcion</h5>
                        <textarea type="text"  rows="8" cols="55"  id="solicitud2" name="solicitud2"></textarea>
                        <input type="file" id="fileEliminacion" name="fileEliminacion" multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary">Crear Solicitud</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  

</body>
<script src="../js/empleado/solicitudes.js"></script>
</html>

