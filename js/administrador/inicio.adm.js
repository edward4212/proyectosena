function empresa (id_empresa, nombre_empresa){
    $("#numEmpresaMod").val(id_empresa);
    $("#txtempresaMod").val(nombre_empresa);
}

function logo (id_empresa){
    $("#numEmpresaMod1").val(id_empresa);
}

function organigramas (id_empresa){
    $("#numEmpresaOrganigrama").val(id_empresa);
}
function misions (id_empresa,mision){
    $("#numEmpresaModMis").val(id_empresa);
    $("#txtMisionMod").val(mision);
}

function visions (id_empresa,vision){
    $("#numEmpresaModvis").val(id_empresa);
    $("#txtVisiomMod").val(vision);
}

function politica (id_empresa,politica_calidad){
    $("#numEmpresaModPol").val(id_empresa);
    $("#txtPoliMod").val(politica_calidad);
}

function objetivos (id_empresa,objetivos_calidad){
    $("#numEmpresaModObj").val(id_empresa);
    $("#txtObjMod").val(objetivos_calidad);
}

function cargar(){
    window.location.href = "../administrador/inicio.php";
}

$(document).ready(function(){
    buscar()

    function buscar(){
        $.ajax({
            url:'../controladorAdministrador/inicio.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            mision = '';
            empresas = '';
            vision= '';
            politica_calidad= '';
            objetivos_calidad= '';
            organigrama ='';
            logos ='';
            $.each(json, function(key, value){
                if(value.mision != null){
                    mision += '<h5>'+value.mision+'</h5>';
                    mision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="misions('+value.id_empresa+',\''+value.mision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalmis"><i class="far fa-edit"></i> Modificar </button>';
                }else{
                    mision +='<h5>Debe ingresar la misión</h5>'; 
                    mision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="misions('+value.id_empresa+',\''+value.mision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalmis"><i class="far fa-edit"></i> Modificar </button>';
                }

                if(value.vision != null){
                    vision = '<h5>'+value.vision+'</h5>';
                    vision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="visions('+value.id_empresa+',\''+value.vision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalVis"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    vision='<h5>Debe ingresar la visión</h5>';
                    vision += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="visions('+value.id_empresa+',\''+value.vision+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalVis"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.nombre_empresa != null){
                    empresas += '<h5>'+value.nombre_empresa+'</h5>';
                    empresas += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="empresa('+value.id_empresa+',\''+value.nombre_empresa+'\')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i> Modificar </button>'; 
                 }else{
                    empresas='<h5>Debe ingresar el nombre de la empresa</h5>';
                    empresas += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="empresa('+value.id_empresa+',\''+value.nombre_empresa+'\')" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.politica_calidad != null){
                    politica_calidad = '<h5>'+value.politica_calidad+'</h5>';
                    politica_calidad += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="politica('+value.id_empresa+',\''+value.politica_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalPol"><i class="far fa-edit"></i> Modificar </button>';    
                 }else{
                    politica_calidad='<h5>Debe ingresar la política de calidad</h5>';
                    politica_calidad += '<button type="button" style="width:270px" class="btn btn-primary text-center" onclick="politica('+value.id_empresa+',\''+value.politica_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalPol"><i class="far fa-edit"></i> Modificar </button>'; 
                 }

                 if(value.objetivos_calidad != null){  
                    objetivos_calidad = '<h5>'+value.objetivos_calidad+'</h5>';
                    objetivos_calidad += '<button type="button" style="width:270px" class="btn btn-primary  text-center" onclick="objetivos('+value.id_empresa+',\''+value.objetivos_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalObj"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    objetivos_calidad='<h5>Debe ingresar el objetivo de calidad</h5>';
                    objetivos_calidad += '<button type="button" style="width:270px" class="btn btn-primary  text-center" onclick="objetivos('+value.id_empresa+',\''+value.objetivos_calidad+'\')" data-bs-toggle="modal" data-bs-target="#exampleModalObj"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.logo != null){
                    logos +=' <img id="logo" class="rounded d-block zoom1"  alt="..." src="../documentos/empresa/logo/'+value.logo+'">';
                    logos +='<button type="button" style="width:270px" class="btn btn-primary" onclick="logo('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="far fa-edit"></i> Modificar </button>';
                 }else{
                    logos='<h5>Debe ingresar el logo</h5>';
                    logos +='<button type="button" style="width:270px" class="btn btn-primary" onclick="logo('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="far fa-edit"></i> Modificar </button>';
                 }

                 if(value.organigrama != null){
                    organigrama +='<img id="organigrama" class="rounded mx-auto d-block zoom" alt="..." src="../documentos/empresa/organigrama/'+value.organigrama+'"></img>';
                    organigrama +='<button type="button" style="width:100%" class="btn btn-primary" onclick="organigramas('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalorganigrama"><i class="far fa-edit"></i> Modificar </button>';
                }else{
                    organigrama='<h5>Debe ingresar el organigrama</h5>';
                    organigrama +='<button type="button" style="width:100%" class="btn btn-primary" onclick="organigramas('+value.id_empresa+')" data-bs-toggle="modal" data-bs-target="#exampleModalorganigrama"><i class="far fa-edit"></i> Modificar </button>';
                }
    
            })
        
            $('#empresa').html(empresas);
            $('#mision').html(mision);
            $('#vision').html(vision);
            $('#politica').html(politica_calidad);
            $('#objetivo').html(objetivos_calidad); 
            $('#btnModificarLogo').html(logos); 
            $('#btnModificarOrganigrama').html(organigrama); 
        }).fail(function(xhr, status, error){
            $('#mision').html(error);
            $('#vision').html(error);
            $('#politica').html(error);
            $('#objetivo').html(error);
            $('#organigrama').html(error);
        })
    }

    /// MODIFICAR NOMBRE EMPRESA ///
    $(document).on('click','#btnModificarNomEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/empresa.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarEmpre').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Nombre Empresa Actualizado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                  }).then((result) => {
                    cargar();
                  })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

    /// MODIFICAR MISION ///
    $(document).on('click','#btnModificarMisionEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/mision.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarMision').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Misión Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        cargar();
                      })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

    /// MODIFICAR VISION ///
    $(document).on('click','#btnModificarvisionEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/vision.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarVision').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Visión Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        cargar();
                      })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

    /// MODIFICAR POLITICA CALIDAD ///
    $(document).on('click','#btnModificarPoliEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/politica.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarPolitica').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Política  de Calidad Actualizada con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        cargar();
                      })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

    /// MODIFICAR POLITICA CALIDAD ///
    $(document).on('click','#btnModificarObjetivoEmp',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/objetivos.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarObjetivo').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Objetivo de Calidad Actualizado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                    }).then((result) => {
                        cargar();
                      })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

})

