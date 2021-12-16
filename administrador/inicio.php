<!-- Se agrega Head -->
<?php include_once "head.Adm.frm.php" ?>
<title>Inicio</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.Adm.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-empresa-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-empresa" type="button" role="tab" aria-controls="nav-empresa"
                        aria-selected="false">Empresa</button>
                    <button class="nav-link " id="nav-inicio-tab" data-bs-toggle="tab" data-bs-target="#nav-inicio"
                        type="button" role="tab" aria-controls="nav-inicio" aria-selected="true">Misión y
                        Visión</button>
                    <button class="nav-link " id="nav-politica-tab" data-bs-toggle="tab" data-bs-target="#nav-politica"
                        type="button" role="tab" aria-controls="nav-politica" aria-selected="true">Política y Objetivo
                        de Calidad</button>
                    <button class="nav-link " id="nav-organigrama-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-organigrama" type="button" role="tab" aria-controls="nav-organigrama"
                        aria-selected="false">Organigrama</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-empresa" role="tabpanel"
                    aria-labelledby="nav-empresa-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Empresa</h5>
                                    <h5 class="card-text" id="empresa"></h5>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Logo</h5>
                                   
                                </div>
                                <h5 class="card-title text-center" id="btnModificarLogo"></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Informacion Empresa-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Nombre de la Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarEmpre" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaMod" name="numEmpresaMod"
                                            hidden>
                                        <h5 class="card-title">Nombre Empresa</h5>
                                        <input type="text" class="card-text" id="txtempresaMod" name="txtempresaMod">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarNomEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar logo Empresa-->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Logo de la Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" action="../controladorAdministrador/logo.update.php"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaMod1" name="numEmpresaMod1"
                                            hidden>
                                        <h5 class="card-title">Logo Empresa</h5>
                                        <input type="file" class="card-text" id="fileLogo" name="fileLogo"
                                            accept="image/*">
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
                </div>
                <div class="tab-pane fade" id="nav-inicio" role="tabpanel" aria-labelledby="nav-inicio-tab">
                    <br>
                    <div class="row ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Misión</h5>
                                    <h5 class="card-text" id="mision"></h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Visión</h5>
                                    <h5 class="card-text" id="vision"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Mision Empresa-->
                    <div class="modal fade" id="exampleModalmis" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Misión de la Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarMision" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModMis"
                                            name="numEmpresaModMis" hidden>
                                        <h5 class="card-title">Misión Empresa</h5>
                                        <div class="text-wrap">
                                            <textarea class="card-text form-group" id="txtMisionMod" name="txtMisionMod"
                                                style="width:450px; height:100px; "></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarMisionEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Vision Empresa-->
                    <div class="modal fade" id="exampleModalVis" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Visión de la Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarVision" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModvis"
                                            name="numEmpresaModvis" hidden>
                                        <h5 class="card-title">Visión Empresa</h5>
                                        <textarea class="card-text form-group" id="txtVisiomMod" name="txtVisiomMod"
                                            style="width:450px; height:100px; "></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarvisionEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-politica" role="tabpanel" aria-labelledby="nav-politica-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Política de Calidad</h5>
                                    <h5 class="card-text" id="politica"></h5>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-1 col-xs-12 col-sm-12">
                        </div>
                        <br>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Objetivo de Calidad</h5>
                                    <h5 class="card-text" id="objetivo"></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar Politca calidad Empresa-->
                    <div class="modal fade" id="exampleModalPol" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Política de Calidad de la
                                        Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarPolitica" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModPol"
                                            name="numEmpresaModPol" hidden>
                                        <h5 class="card-title">Política Calidad de la Empresa</h5>
                                        <div class="text-wrap">
                                            <textarea class="card-text form-group" id="txtPoliMod" name="txtPoliMod"
                                                style="width:450px; height:100px; "></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarPoliEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar objetivos calidad Empresa-->
                    <div class="modal fade" id="exampleModalObj" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Objetivo de Calidad de la Empresa</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group" id="ModificarObjetivo" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaModObj"
                                            name="numEmpresaModObj" hidden>
                                        <h5 class="card-title"> Objetivo de Calidad</h5>
                                        <textarea class="card-text form-group" id="txtObjMod" name="txtObjMod"
                                            style="width:450px; height:100px; "></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnModificarObjetivoEmp" class="btn btn-primary"><i
                                                class="far fa-edit"></i> Modificar</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                                                class="fas fa-undo"></i> Volver</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-organigrama" role="tabpanel" aria-labelledby="nav-organigrama-tab">
                    <br>
                    <div class="row  ">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                        <div div class="col-md-6 col-xs-12 col-sm-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Organigrama</h5>
                                </div>
                                <h5 class="card-title text-center" id="btnModificarOrganigrama"></h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                    <!-- Modal Modificar organigrama Empresa-->
                    <div class="modal fade" id="exampleModalorganigrama" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modificar Organigrama de la Empresa
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form class="row g-3 form-group"
                                    action="../controladorAdministrador/organigrama.update.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="number" class="card-text" id="numEmpresaOrganigrama"
                                            name="numEmpresaOrganigrama" hidden>
                                        <h5 class="card-title">Organigrama Empresa</h5>
                                        <input type="file" class="card-text" id="fileOrg" name="fileOrg"
                                            accept="image/*">
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
                </div>
            </div>
        </div>
    </main>

    <?php include_once "footer.frm.php" ?>
<script src="../js/administrador/inicio.adm.js"></script>
</body>
</html>