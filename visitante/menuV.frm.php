<!-- Inicio Menu -->
<header class="navbar navbar-expand-md">
    <nav class=" navbar  bg-light container-lg flex-wrap flex-md-nowrap fixed-top head-model border" aria-label="Main navigation">
        <div class="container-fluid ">
            <a class="navbar-brand">
            <img src="../documentos/limaro/horizontal_on_white_by_logaster.png" alt="" width="130"
                    height="40">
            </a>
            <!-- <a class="navbar-brand p-0 me-2" href="#" aria-label="Bootstrap">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="far fa-caret-square-down"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class=" navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0  ">
                    <li class="nav-item col-6 col-md-auto">
                        <a class="nav-link p-2" aria-current="page" href="inicio.php"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item col-6 col-md-auto">
                        <a class="nav-link p-2 " href="documento.php"><i class="fas fa-file"></i> Documentos</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex">
            <label  href="perfil.frm.php" class="nav-link p-2" ><?php $usuario= $_SESSION['usuario']; echo $usuario;?></label>
                <img href="perfil.frm.php"  src="../documentos/usuarios/<?php $usuario= $_SESSION['usuario']; echo $usuario;?>/imagen/<?php $img_empleado= $_SESSION['img_empleado']; echo $img_empleado; ?>"
                alt="mdo" width="32" height="32" class="rounded-circle">
                <a class="btn btn-primary" id="btnCerrar"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                <script src="../js/Login/logueo.js"></script>
            </form>
        </div>
    </nav>
    
</header>

<!-- --Fin Menu -->