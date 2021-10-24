$(document).ready(function () {
    $(document).on('click', '#btnLogin', function () {
        $.ajax({
            url: '../controladorLogin/login.read.php',
            type: 'POST',
            datatype: 'JSON',
            data: $('#LoginF').serialize(),
        }).done(function (json) {
            var obj = JSON.parse(json);
            if ((document.getElementById('txtUsuario').value == "") && (document.getElementById('txtClave').value == "")){
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: '¡Campo usuario y contraseña vacio!',
                });
            }else{
            if (document.getElementById('txtUsuario').value == "") {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: '¡Campo usuario vacio!',
                });
            }else{
            if (document.getElementById('txtClave').value == "") {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: '¡Campo contraseña vacio!',
                });
            }else {
                if (obj == false) {
                    Swal.fire({
                        type: 'error',
                        title: 'Error',
                        text: '¡Usuario o Contraseña Incorrecto!',
                    });
                } else {
                    if(obj[0].esUsuario == "A"){
                        if (obj[0].id_rol == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Bienvenido '+obj[0].nombre_completo,
                                showConfirmButton: false,
                                timer: 2000
                              }).then((result) => {
                                window.location.href = "../vistaAdministrador/inicio.Adm.frm.php";
                              })
                        }else if (obj[0].id_rol == 2) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Bienvenido '+obj[0].nombre_completo , 
                                showConfirmButton: false,
                                timer: 3000
                              }).then((result) => {
                                window.location.href = "../vistaEmpleado/inicio.frm.php";
                              })
                        }
                    }else if(obj[0].esUsuario == "C"){
                        Swal.fire({
                            icon: 'error',
                            title: '¡Usuario No Activo!',
                            showConfirmButton: false,
                            timer: 2000
                          })
                    }else if(obj[0].esUsuario == "I"){
                        Swal.fire({
                            icon: 'error',
                            title: '¡Usuario Inhabilitado!',
                            showConfirmButton: false,
                            timer: 2000
                          })
                    }else if(obj[0].rol.estado == "I"){
                        Swal.fire({
                            icon: 'error',
                            title: 'Rol Inhabilitado!',
                            showConfirmButton: false,
                            timer: 2000
                          })
                    }   
                }
                }
            }
        }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: '¡Usuario o Contraseña Incorrecto!',
                showConfirmButton: false,
                timer: 2000
              })
        })



    })


    /// ACTIVAR USUARIO///
    $(document).on('click','#btnActUsu',function(event){
        event.preventDefault();
        $.ajax({
            url:'../controladorLogin/clave.update.php',
            type: 'POST',
            dataType: 'json',
            data : $('#actUsu').serialize(),
        }).done(function(json){
            if(json == '1'){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Usuario Activado con Exito... Por Favor Inicie Sesion',
                    showConfirmButton: false,
                    timer: 2000
                }).then((result) => {
                    window.location.href = "../vistaLogin/login.frm.php";
                })
            }else  if(json == '0')
            {
                Swal.fire({     
                    icon: 'error',             
                    title: 'Usuario ya se encuentra Activo  o esta Inhabilitado',
                    showConfirmButton: false,
                    timer: 2000
                }).then((result) => {
                    window.location.href = "../vistaEmpleado/perfil.frm.php";
                })
            }
        }).fail(function(xhr, status, error){
            Swal.fire({                  
                icon: 'error',
                title: 'Digete los campos completos del formulario',
                showConfirmButton: false,
                timer: 2000
            }).then((result) => {
                window.location.href = "../vistaEmpleado/perfil.frm.php";
            })
        })
    })



})