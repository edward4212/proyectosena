
function cargar(){
    window.location.href = "../vistaAdministrador/tareas.adm.frm.php";
}

function comentario (id_solicitud){
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function estadiSolicitud (id_solicitud,estatus_solicitud){
    $("#numIdSolicitud2").val(id_solicitud);
    $("#estadoSolicitud").val(estatus_solicitud);
}

function iniciarTarea (id_solicitud){
    $("#numIdSolicitud3").val(id_solicitud);

}

$(document).ready(function(){

    buscar();
    buscarFuncionarios();
    
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
                            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN</th>';
                            datos += '<th  class="border border-primary text-wrap align-middle ">PRIORIDAD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CODIGO DOCUMENTO </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">CREADO POR </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">DOCUMENTO SOPORTE </th>';
                            datos += '<th  class="border border-primary text-center align-middle ">ESTADO DE LA SOLICITUD</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS</th>';
                            datos += '<th  class="border border-primary text-center align-middle ">INICIAR TAREA</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap align-middle" id="numIdSolicitud">'+value.id_solicitud+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.fecha_asignacion+'</td>';  
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
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnEstadiSolicitud" onclick="estadiSolicitud('+value.id_solicitud+',\''+value.estatus_solicitud+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#estadoSol"><i class="far fa-list-alt"></i></button></td>';
                                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario('+value.id_solicitud+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                                if(value.fecha_inicio_tarea !=null){
                                    datos += '<td class=" border border-primary text-wrap align-middle">Tarea ya Iniciada</td>';
                                }else{
                                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnIniciarTarea" onclick="iniciarTarea('+value.id_solicitud+')" class="btn btn-primary" ><i class="far fa-clock"></i></button></td>';
                                }
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
                order: [[3, 'asc'], [1, 'asc']],
                rowGroup: {
                    dataSrc: 3
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
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Mis Solicitudes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6,7,8,9]
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
    
    /// ASIGNAR ESTATUS A LA SOLICITUD///
    function buscarFuncionarios() {
        $.ajax({
            url:'../controladorAdministrador/estatus_solicitud.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
            var estadoSolicitud  =0;
            estadoSolicitud+='<option disabled selected> - Seleccione un nuevo Estado-</option>';
            $.each(json, function (key,value) {    
                estadoSolicitud+='<option value='+value.id_estatus_solicitud+'>'+value.estatus_solicitud+'</option>';   
            })            
            $('#estadoSolicitud1').html(estadoSolicitud);
        }).fail(function(xhr, status, error){
            $('#estadoSolicitud1').html(error);
        })     
    }

  /// INICIAR UNA TAREA///
  $(document).on('click','#btnIniciarTarea',function(event){
    event.preventDefault();
        $.ajax({
            url:'../controladorAdministrador/tarea.create.php',
            type: 'POST',
            dataType: 'json',
            data : $('#buscar').serialize(),
        }).done(function(json){
            // Swal.fire({                  
            //     icon: 'success',
            //     title: 'Tarea Iniciada con Exito',
            //     showConfirmButton: false,
            //     timer: 2000
            // }).then((result) => {
            //     cargar();
            // })
        }).fail(function(xhr, status, error){
            console.log(error);
        })
    })


})