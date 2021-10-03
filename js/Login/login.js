$(document).ready(function () {
    $(document).on('click', '#btnLogin', function () {
        $.ajax({
            url: '../controladorLogin/login.read.php',
            type: 'POST',
            datatype: 'JSON',
            data: $('#LoginF').serialize(),
        }).done(function (json) {
            var obj = JSON.parse(json);
            console.log(json);
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
                    if (obj[0].id_rol == 1) {

                        Swal.fire({
                            position: 'top-center',
                            type: 'success',
                            icon: 'success',
                            title: 'Bienvenido Administrador',
                            showConfirmButton: false,
                            timer: 2000
                          })

                        window.location.href = "../vistaEmpleado/inicio.frm.php";
                    }
                    if (obj[0].id_rol == 2) {
                        
                        Swal.fire({
                            position: 'top-center',
                            type: 'success',
                            icon: 'success',
                            title: 'Bienvenido Empleado',
                            showConfirmButton: false,
                            timer: 2000
                          })

                        window.location.href = "../vistaEmpleado/inicio.frm.php";
                    }
                }
                }
            }
            }
        }).fail(function (xhr, status, error) {
            Swal.fire({
                position: 'top-center',
                type: 'error',
                icon: 'error',
                title: '¡Usuario o Contraseña Incorrecto!',
                showConfirmButton: false,
                timer: 2000
              })
        })



    })



})