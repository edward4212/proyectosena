
function cargar(){
    window.location.href = "../vistaAdministrador/solicitudes.adm.frm.php";
}

function comentario(id_solicitud){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function asignarFuncionario (id_solicitud,funcionario_asignado,fecha_asignacion){
    $("#numIdSolicitud2").val(id_solicitud);
    $("#funcionarioAsignado").val(funcionario_asignado);
    $("#fecha").val(fecha_asignacion);
}

$(document).ready(function(){

    buscar();
    buscarFuncionarios();

    function buscar(){
        $.ajax({
            url:'../controladorAdministrador/solicitudes.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var datos = '';
                datos += "<table id='tableSolicitudesRea'   class='table  table-striped table-bordered table-responsive'>"; 
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
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNAR FUNCIONARIO</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ASIGNADO A</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary text-wrap">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.tipo_documento+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo_documento+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.nombre_completo+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.solicitud+'</td>'; 
                                if(value.documento  !=null){
                                    datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                                }else{
                                    datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/'+value.usuario+'/solicitudes/'+value.carpeta+'/'+value.documento+'"><i class="fas fa-download"></i></a></td>';
                                }
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.estatus_solicitud+'</td>'; 
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="bntAsignarFuncionario" onclick="asignarFuncionario('+value.id_solicitud+',\''+value.funcionario_asignado+'\',\''+value.fecha_asignacion+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asignarFuncionarioSol"><i class="fas fa-user-check"></i></button></td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.funcionario_asignado+'</td>';
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        })
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudesAdmn').html(datos);
            $('#tableSolicitudesRea').DataTable({
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
                order: [[2, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: 2
                },
                dom:  'Qfrtip',
                dom:  'Bfrtip',
                buttons: 
                [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        pageSize: 'LEGAL',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Mis Solicitudes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                    
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudesAdmn').html(error);
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
                    comentarios += "<table id='tableComentarios'  class='table  table-striped table-bordered table-responsive'>"; 
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
                        "searching": false,
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
                                pageSize: 'LEGAL',
                                title: 'Comentarios sobre la Solicitud',
                                titleAttr: 'Comentarios sobre la Solicitud',
                                messageTop: 'Comentarios sobre la Solicitud',
                                text : '<i class="far fa-file-pdf"></i>',
                                exportOptions : {
                                    columns: [0,1,2,]
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Comentarios sobre la Solicitud',
                                titleAttr: 'Comentarios sobre la Solicitud',
                                messageTop: 'Comentarios sobre la Solicitud',
                                text : '<i class="fas fa-print"></i>',
                                exportOptions : {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                text : '<i class="fas fa-file-excel"></i>',
                                autoFiltre : true ,
                                title: 'Comentarios sobre la Solicitud',
                                exportOptions : {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'copyHtml5',
                                text : '<i class="fas fa-copy"></i>',
                                autoFiltre : true ,
                                titleAttr: 'COPIAR',
                                exportOptions : {
                                    columns: [0,1,2]
                                }
                            }                
                        ]
                    }); 
                }).fail(function(xhr, status, error){
                        $('#comentarios').html(error); 
                })
                }
    )
  
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
                    title: 'Comentario Creado con Exito',
                    showConfirmButton: false,
                    timer: 3000
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
                    timer: 3000
                }).then((result) => {
                    cargar();
                })
            }).fail(function(xhr, status, error){
                console.log(error);
        })
    })

     /// ASIGNAR COMENTARIO DE CREACION FUNCIONARIO///
     $(document).on('click','#btnAgregarFunc',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/solicitudes.comentarios.funcionario.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar2').serialize(),
            }).done(function(json){
            }).fail(function(xhr, status, error){
                console.log(error);
        })
    })



})