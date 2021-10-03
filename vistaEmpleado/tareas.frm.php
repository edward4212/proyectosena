<!-- Se agrega Head -->

<?php include_once "head.frm.php" ?>

<!-- se agrega Menu -->

<?php include_once "menu.frm.php" ?>

<!-- se Inicia Pagina Inicio  -->


<title>Tareas</title>
<body class="bg-light"   >
    <div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active " id="nav-tareas-tab" data-bs-toggle="tab" data-bs-target="#nav-tareas" type="button" role="tab" aria-controls="nav-tareas" aria-selected="false">Mis Tarea</button>
            <button class="nav-link " id="nav-asignar-tab" data-bs-toggle="tab" data-bs-target="#nav-asignar" type="button" role="tab" aria-controls="nav-asignar" aria-selected="true">Asignar Tareas</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade  show active" id="nav-tareas" role="tabpanel" aria-labelledby="nav-tareas-tab">
            <br>
            <div class="row ">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title  align-items-center">Mis Tareas</h5>
                        <div class="text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-asignar" role="tabpanel" aria-labelledby="nav-asignar-tab">
            <br>
            <div class="row ">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title  align-items-center">Tareas</h5>
                        <div class="text-center">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>



