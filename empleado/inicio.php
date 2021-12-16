<!-- Se agrega Head -->
<?php include_once "head.frm.php" ?>
<title>Inicio</title>
</head>

<body class="bg-light d-flex flex-column h-100">
    <!-- se agrega Menu -->
    <?php include_once "menu.frm.php" ?>
    <!-- se Inicia Pagina Inicio  -->
    <main class="flex-shrink-0">
        <div class="container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-inicio-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-inicio" type="button" role="tab" aria-controls="nav-inicio"
                        aria-selected="false">Misión y Visión</button>
                    <button class="nav-link " id="nav-politica-tab" data-bs-toggle="tab" data-bs-target="#nav-politica"
                        type="button" role="tab" aria-controls="nav-politica" aria-selected="true">Política y Objetivos
                        de Calidad</button>
                    <button class="nav-link " id="nav-organigrama-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-organigrama" type="button" role="tab" aria-controls="nav-organigrama"
                        aria-selected="false">Organigrama</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  show active" id="nav-inicio" role="tabpanel"
                    aria-labelledby="nav-inicio-tab">
                    <br>
                    <div class="row  ">
                        <br>
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
                                    <img id="organigrama" class="rounded mx-auto d-block zoom" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once "footer.frm.php" ?>
<script src="../js/empleado/inicio.js"></script>
</body>
</html>