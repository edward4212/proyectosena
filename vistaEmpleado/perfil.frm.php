<!-- Se agrega Head -->

<?php include_once "head.frm.php" ?>

<!-- se agrega Menu -->

<?php include_once "menu.frm.php" ?>

<!-- se Inicia Pagina Inicio  -->

<title>Inicio</title>
<body class="bg-light"   >
    <div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-perfil" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Perfil</button>
            <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-contraseña" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contraseña</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-home-tab">
        <br>
        <div class="row">
            <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title text-center">Foto de Perfil</h5>
                        <img src="../imagenes/usuario.png" class="card-img-top imgPerfil" alt="...">
                    </div>
                    <div class="text-center">
                        <button type="submit" id="" class="btn btn-primary text-center">Modificar Imagen</button>
                    </div> 
                    <br>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title ">Nombre Funcionario</h5>
                    <p class="card-text"><strong><?php $nombre= $_SESSION['nombre_completo']; echo $nombre; ?> </strong></p>
                    <h5 class="card-title">Cargo</h5>
                    <p class="card-text"><strong><?php $cargo= $_SESSION['cargo']; echo $cargo; ?> </strong></p>
                    <h5 class="card-title">Correo Electronico</h5>
                    <p class="card-text"><strong><?php $correo= $_SESSION['correo_empleado']; echo $correo; ?> </strong></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contraseña" role="tabpanel" aria-labelledby="nav-profile-tab">
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6 col-xs-12 col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Actualizar Contraseña</h5>
                        <from>
                            <h5 for="formFile" class="form-label">Contraseña Actual</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="Contraseña Actual" id="" name="" aria-label=".form-control-lg example">
                            <h5 for="formFile" class="form-label">Contraseña Nueva</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="Contraseña Nueva" id="" name="" aria-label=".form-control-lg example">
                            <h5 for="formFile" class="form-label">Confirma Nueva Contraseña</h5>
                            <input class="form-control form-control-lg" type="text" placeholder="Confirma Nueva Contraseña" id="" name="" aria-label=".form-control-lg example">
                            <br>
                            <br>
                            <div class="text-center">
                                <button type="submit" id="" class="btn btn-primary text-center">Cambiar Contraseña</button>
                            </div> 
                        </from>
                    </div>
                </div>
            </div>
        </div>     
    </div>

    </div>
    </div>
</body>



