
function cargar(){
    window.location.href = "../vistaAdministrador/solicitudes.adm.frm.php";
}

function comentario (codigo){
    $("#numIdSolicitud").val(codigo);
    $("#numIdSolicitud1").val(codigo);
   
}

function asignarFuncionario (codigo){
    $("#numIdSolicitud2").val(codigo);
}

function comentario2(codigo){
    $("#numIdSolicitud3").val(codigo);
    $("#numIdSolicitud4").val(codigo);
   
}

$(document).ready(function(){

    buscar();
    buscarPrioridad(); 
    buscarTipoDocumento();  
    buscarFuncionarios();
 

     /**
     * Se realiza la consulta de los Mis Solicitudes para mostrar en la vistaEmpleado/consultas.frm.php
     */

     function buscar(){
        $.ajax({
            url:'../controladorAdministrador/solicitudes.read2.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tableSolicitudes'   class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary text-center align-middle ">';
                            datos += '<th  class="border border-primary text-center align-middle ">CODIGO SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CODIGO DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CREADO POR </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">VER COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.codigo+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.nombre_completo+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>';
                                if(value.documento != ""){
                                    datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.usuario+'/solicitudes/'+value.carpeta+'/'+value.documento+'"><i class="fas fa-download"></i></a></td>';
                                }else{
                                    datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                                }
                              
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.estado+'</td>'; 
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario('+value.codigo+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        })
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudesAsig').html(datos);
            $('#tableSolicitudes').DataTable({
                "destroy" : true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info":     true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength":	5,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Qfrtip',
                dom:  'Bfrtip',
                buttons: 
                [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Mis Solicitudes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudesAsig').html(error);
        })
    }

    $(document).on('click','#btnVerComentarios',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/solicitudes.comentarios.read.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar').serialize(),
            }).done(function(json){
                var comentarios = '';
                    if(json== 0){ 
                        comentarios += "<h5>Aun no hay comentarios</h5>";
                    }else{
                    // datos += '<form action="" class="form-group" id="buscar">';
                    comentarios += "<table id='tableComentarios'  class='table  table-striped table-bordered table-responsive ' >"; 
                        comentarios += '<thead >';
                            comentarios += '<tr class="table-light border-primary ">';
                                comentarios += '<th  class="text-center align-middle border border-primary ">FECHA COMENTARIO</th>';
                                comentarios += '<th  class="text-center align-middle border border-primary ">USUARIO</th>';
                                comentarios += '<th  class="text-center align-middle border border-primary ">COMENTARIO</th>';;
                            comentarios += '</tr>';
                        comentarios +=  '</thead>';
                    comentarios += '<tbody>';
                    $.each(json, function(key, value){
                    comentarios += '<tr class="align-middle" >';
                        comentarios += '<td class=" border border-primary text-wrap" id="numIdSolicitud">'+value.fecha_comentario+' </td>';
                        comentarios += '<td class=" border border-primary  text-wrap align-middle">'+value.usuario_comentario+'</td>';
                        comentarios += '<td class=" border border-primary  text-wrap align-middle">'+value.comentario+'</td>';
                    comentarios += '</tr>';
                    })
                    comentarios += '</tbody>';
                    comentarios += '</table>';
                    }
                    $('#comentarios').html(comentarios  );
                    $('#tableComentarios').DataTable({
                        "destroy" : true,
                        "autoWidth": true,
                        "responsive": true,
                        "searching": true,
                        "info":     true,
                        "ordering": true,
                        "colReorder": true,
                        "sZeroRecords": true,
                        "fixedColumns": true,
                        "fixedHeader": true,
                        "keys": true,
                        "deferRender": true,
                        "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                        "iDisplayLength":5,
                        "language": {"url": "../componente/libreria/idioma/es-mx.json"}
                    }); 
                }).fail(function(xhr, status, error){
                        $('#comentarios').html(error); 
                })
                }
    )
  
    function buscarPrioridad() {
        $.ajax({
            url:'../controladorEmpleado/solicitudes.prioridad.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var prioridad  =0;
            prioridad+='<option disabled selected> - Seleccione una Prioridad -</option>';
            $.each(json, function (key,value) {    
                prioridad+='<option value='+value.id_prioridad+'>'+value.prioridad+'</option>';   
            })
            $('#prioridad').html(prioridad);
        }).fail(function(xhr, status, error){
            $('#prioridad').html(error);
        })     
    }
   
    function buscarTipoDocumento() {

        $.ajax({
            url:'../controladorEmpleado/solicitudes.tipoDocumento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var tipoDocumento  =0;
            tipoDocumento+='<option disabled selected> - Seleccione un Tipo de Documento -</option>';
            $.each(json, function (key,value) {    
                tipoDocumento+='<option value='+value.id_tipo_documento+'>'+value.tipo_documento+'</option>';   
            })            
            $('#tipoDocumento').html(tipoDocumento);
        }).fail(function(xhr, status, error){
            $('#tipoDocumento').html(error);
        })     
    }

    function buscarFuncionarios() {

        $.ajax({
            url:'../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var tipoDocumento  =0;
            tipoDocumento+='<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key,value) {    
                tipoDocumento+='<option value='+value.usuario+'>'+value.usuario+'</option>';   
            })            
            $('#empleado').html(tipoDocumento);
        }).fail(function(xhr, status, error){
            $('#empleado').html(error);
        })     
    }

  /// ASIGNAR COMENTARIO A LA SOLICITUD///
    $(document).on('click','#btnCrearcomentario',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/solicitudes.comentarios.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar1').serialize(),
            }).done(function(json){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Comentario Asignado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                    }).then((result) => {
                    cargar();
                    })
            }).fail(function(xhr, status, error){
                console.log(error);
        })
    })

     /// ASIGNAR FUNCIONARIO A LA SOLICITUD///
     $(document).on('click','#btnAgregarFunc',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/solicitudes.funcionario.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar2').serialize(),
            }).done(function(json){
                Swal.fire({                  
                    icon: 'success',
                    title: 'Funcionario Asignado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                }).then((result) => {
                    cargar();
                })
            }).fail(function(xhr, status, error){
                console.log(error);
        })
    })

    


})