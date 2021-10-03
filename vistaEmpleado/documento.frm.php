<!-- Se agrega Head -->

<?php include_once "head.frm.php" ?>

<!-- se agrega Menu -->

<?php include_once "menu.frm.php" ?>

<!-- se Inicia Pagina Inicio  -->

<title>Documentos</title>
<body class="bg-light"   >
    <div class="container">
    <nav>
        <div class="nav nav-tabs"  id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-matriz" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Matriz Documental</button>
        </div>
    </nav>
    <br>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-matriz" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-body">                          
                            <h3 class="card-title text-center">Documentos Vigentes</h3>
                        </div>
                        <div class="text-center">
                            <h5 id="consulta"></h5> 
                        </div> 
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="../js/empleado/documento.js"></script>
</html>





