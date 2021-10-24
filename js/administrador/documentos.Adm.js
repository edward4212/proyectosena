function cargar(){
    window.location.href = "../vistaAdministrador/procesos.Adm.frm.php";
}

function modificarProceso (id_proceso, proceso, sigla_proceso){

    $("#numidProcesosMod").val(id_proceso);
    $("#txtProcesoMod").val(proceso);
    $("#txtSiglaProcesoMod").val(sigla_proceso);
    $("#txtSiglaProcesoAnt").val(sigla_proceso);
    
}

function eliminacionProceso (id_proceso, proceso, sigla_proceso){
    $("#numidProcesosElim").val(id_proceso);
    $("#txtProcesoElim").val(proceso);
    $("#txtSiglaProcesoElim").val(sigla_proceso);
}

function modificarTipoDoc (id_tipo_documento, tipo_documento, sigla_tipo_documento){

    $("#numidTipoDocumentoMod").val(id_tipo_documento);
    $("#txtTipoDocumentoMod").val(tipo_documento);
    $("#txtSiglaTipoDocumentoMod").val(sigla_tipo_documento)
    
}

function eliminacionTipoDoc (id_tipo_documento, tipo_documento, sigla_tipo_documento){

    $("#numidTipDocElim").val(id_tipo_documento);
    $("#txtTipoDocElim").val(tipo_documento);
    $("#txtSiglaTipDocElim").val(sigla_tipo_documento)
    
}

$(document).ready(function(){

    buscarProceso(); 
    buscarTipoDocumento();

        
     /**
     * Se realiza el CRUD de los Procesos para mostrar en vistaAdminsitrador/documento.Adm.frm.php
     */

    /// REGISTRAR PROCESO ///
    $(document).on('click','#btnRegistrarProceso',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#proceso').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Proceso Creado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                  }).then((result) => {
                    cargar();
                  })
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })

     /// MOSTRAR PROCESO ///
     function buscarProceso(){
        $.ajax({
            url:'../controladorAdministrador/proceso.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablaProcesos' class='table  table-striped table-bordered table-responsive '   >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary ">';
                            datos += '<th  class="text-center align-middle border border-primary ">CODIGO PROCESO</th>';
                            datos += '<th  class="text-wrap align-middle border border-primary ">NOMBRE PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">SIGLA PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ESTADO PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR PROCESO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            if(value.estado == "A"){
                                value.estado = "ACTIVO";
                            }else{
                                if(value.estado == "I"){
                                    value.estado = "INACTIVO";
                                }
                            }
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap" id="numIdSolicitud">'+value.id_proceso+' </td>';
                                datos += '<td class=" border border-primary text-wrap align-middle">'+value.proceso+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.sigla_proceso+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarProceso('+value.id_proceso+',\''+value.proceso+'\',\''+value.sigla_proceso+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i></button></td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="eliminacionProceso('+value.id_proceso+',\''+value.proceso+'\',\''+value.sigla_proceso+'\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-times"></i></button></td>';
                            datos += '</tr>';
                        })
                    datos += '</tbody>';
                datos += '</table>';
            $('#procesos').html(datos);
            $('#tablaProcesos').DataTable({
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
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Procesos',
                        titleAttr: 'Procesos',
                        messageTop: 'Procesos',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Procesos',
                        titleAttr: 'Procesos',
                        messageTop: 'Procesos',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Procesos',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ],
               
            });
        }).fail(function(xhr, status, error){
            $('#procesos').html(error);
        })
    }

     /// MODIFICAR PROCESO///
     $(document).on('click','#btnModificarPro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso.update.php',
                type: 'POST',
                dataType: 'json',
                data : $('#ModificarPro').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Proceso Actualizado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                  }).then((result) => {
                    cargar();
                  });
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })
	
    /// CAMBIO DE ESTADO PROCESO///
    $(document).on('click','#btnEliminarPro',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/proceso.delete.php',
                type: 'POST',
                dataType: 'json',
                data : $('#inactivarProce').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Estado Actualizado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                  }).then((result) => {
                    cargar();
                  })
            }).fail(function(xhr, status, error){
                alert (error);
        })

    })

     /**
     * Se realiza el CRUD de los tipos de documentos para mostrar en vistaAdminsitrador/documento.Adm.frm.php
     */
       /// MOSTRAR TIPO DOCUMENTOS ///
    function buscarTipoDocumento(){
        $.ajax({
            url:'../controladorAdministrador/tipoDocumento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tablaTipoDoc' class='table  table-striped table-bordered table-responsive '  >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary ">';
                            datos += '<th  class="text-wrap align-middle border border-primary ">CODIGO TIPO DOCUMENTO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE TIPO DOCUMENTO</th>';
                            datos += '<th  class="text-wrap align-middle border border-primary ">SIGLA TIPO DOCUMENTO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ESTADO TIPO DOCUMENTO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ACTUALIZAR TIPO DOCUMENTO</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">CAMBIAR ESTADO</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            if(value.estado == "A"){
                                value.estado = "ACTIVO";
                            }else{
                                if(value.estado == "I"){
                                    value.estado = "INACTIVO";
                                }
                            }
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap" id="numIdSolicitud">'+value.id_tipo_documento+' </td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.tipo_documento    +'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.sigla_tipo_documento+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="modificarTipoDoc('+value.id_tipo_documento+',\''+value.tipo_documento+'\',\''+value.sigla_tipo_documento+'\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actualizarTipoDocuento"><i class="far fa-edit"></i></button></td>';
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="eliminacionTipoDoc('+value.id_tipo_documento+',\''+value.tipo_documento+'\',\''+value.sigla_tipo_documento+'\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cambiarEstadoTipoDoc"><i class="fas fa-times"></i></button></td>';
                            datos += '</tr>';
                        })
                    datos += '</tbody>';
                datos += '</table>';
            $('#tipoDocumentos').html(datos);
            $('#tablaTipoDoc').dataTable({
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
                searchBuilder: true,
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Tipo Documentos',
                        titleAttr: 'Tipo Documentos',
                        messageTop: 'Tipo Documentos',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Tipo Documentos',
                        titleAttr: 'Tipo Documentos',
                        messageTop: 'Tipo Documentos',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Tipo Documentos',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ],
               
            });
        }).fail(function(xhr, status, error){
            $('#tipoDocumentos').html(error);
        })
    }

    /// REGISTRAR TIPO DOCUMENTOS ///
    $(document).on('click','#btnRegistrarTipoDocumento',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/tipoDocumento.create.php',
                type: 'POST',
                dataType: 'json',
                data : $('#tipoDocumento').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Tipo de Documento Creado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                  }).then((result) => {
                    cargar();
                  })
                  
            }).fail(function(xhr, status, error){
                alert (error);
        })
    })


    /// MODIFICAR TIPO DOCUMENTOS///
    $(document).on('click','#btnModificarTipoDoc',function(event){
    event.preventDefault();
        $.ajax({
            url:'../controladorAdministrador/tipoDocumento.update.php',
            type: 'POST',
            dataType: 'json',
            data : $('#ModificarTipoDoc').serialize(),
        }).done(function(json){
            Swal.fire({
                icon: 'success',
                title: 'Tipo de Documento Actualizado con Exito',
                showConfirmButton: false,
                timer: 2000
                }).then((result) => {
                    cargar();
                  })
        }).fail(function(xhr, status, error){
            alert (error);
        })
    })

    /// CAMBIO DE ESTADO TIPO DOCUMENTOS///
    $(document).on('click','#btnEliminarTipDoc',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorAdministrador/tipoDocumento.delete.php',
                type: 'POST',
                dataType: 'json',
                data : $('#inactivarTipoDoc').serialize(),
            }).done(function(json){
                Swal.fire({
                    icon: 'success',
                    title: 'Estado Actualizado con Exito',
                    showConfirmButton: false,
                    timer: 2000
                    }).then((result) => {
                        cargar();
                      })
            }).fail(function(xhr, status, error){
                alert (error);
        })

    })
    



})