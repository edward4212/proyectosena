
$(document).ready(function(){

     /// CAMBIO DE CONTRASEÑA POR EL EMPLEADO ///
     $(document).on('click','#btnModClavEmpl',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorEmpleado/clave.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#modifClaveUsu').serialize(),
            }).done(function(json){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Contraseña Actualizada con Éxito... Por Favor Inicie Sesión Nuevamente',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        window.location.href = "../vistaLogin/login.frm.php";
                    })
            }).fail(function(xhr, status, error){
                Swal.fire({                  
                    icon: 'error',
                    title: 'Contraseña No Actualizada',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        window.location.href = "../vistaEmpleado/perfil.frm.php";
                    })
        })
    })


})