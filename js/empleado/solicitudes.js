function comentario (codigo){
    $("#numIdSolicitud").val(codigo);
}

function actualizacion (codigo, tipoDoc,id_tipo_documento){
    $("#codigo").val(codigo);
    $("#tipoDoc1").val(tipoDoc);
    $("#idTipoDoc1").val(id_tipo_documento);
}


function eliminacion (codigo, tipoDoc,id_tipo_documento){
    $("#codigo2").val(codigo);
    $("#tipoDoc2").val(tipoDoc);
    $("#idTipoDoc2").val(id_tipo_documento);
}


$(document).ready(function(){
    buscar();
    buscarPrioridad(); 
    buscarTipoDocumento();   
     /**
     * Se realiza la consulta de los Mis Solicitudes para mostrar en la vistaEmpleado/consultas.frm.php
     */
     function buscar(){
        $.ajax({
            url:'../controladorEmpleado/solicitudes.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
                datos += "<table id='tableConsulta' class='table  table-striped table-bordered dt-responsive nowrap'  vertical-align: bottom; style='font-size: 14px; height: 100px;' >"; 
                datos += '<thead >';
                        datos += '<tr class="table-light border-primary ">';
                            datos += '<th  class="text-center align-middle border border-primary ">CODIGO SOLICITUD</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">PRIORIDAD</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">TIPO DE SOLICITUD</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">TIPO DE DOCUMENTO </th>';
                            datos += '<th  class="text-center align-middle border border-primary ">DESCRIPCIÓN DE LA SOLICITUD</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">ESTADO DE LA SOLICITUD</th>';
                            datos += '<th  class="text-center align-middle border border-primary ">VER COMENTARIOS</th>';
                        datos += '</tr>';
                    datos +=  '</thead>';
                    datos += '<tbody>';
                        $.each(json, function(key, value){
                            datos += '<tr class="align-middle" >';
                                datos += '<td class=" border border-primary text-wrap" id="numIdSolicitud">'+value.codigo+' </td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.prioridad+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.tipo_solicitud+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.tipo_documento+'</td>';
                                datos += '<td class=" border border-primary text-wrap">'+value.solicitud+'</td>';
                                datos += '<td class=" border border-primary text-center align-middle">'+value.estado+'</td>'; 
                                datos += '<td class=" border border-primary text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario('+value.codigo+')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                            datos += '</tr>';
                        })
                    datos += '</tbody>';
                datos += '</table>';
            $('#solicitudes').html(datos);
            $('#tableConsulta').DataTable({
                "destroy" : true,
                    "autoWidth": true,
                    "searching": true,
                    "info":     true,
                    "ordering": true,
                    "sZeroRecords": true,
                    "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                    "iDisplayLength":	10,
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                            "buttons":{
                                copyTitle: 'Registros Copiados',
                                copySuccess:{
                                    _:'%d Registros Copiados',
                                    1:'1 Registro Copiado',
                                }
                            },
                            searchBuilder: {
                                add: 'Agregar Condición',
                                data: 'Condición de Busqueda',
                                clearAll: 'Restablecer Filtro',
                                title:{  0: 'Seleccione Criterio de Busqueda',
                                _: 'Condicion(es) Seleccionada(s) (%d)'},
                                condition: 'Criterio de Busqueda',
                                value: 'Valor Buscado' ,
                                deleteTitle: 'Suprimir',
                                leftTitle: 'Izquierda',
                                rightTitle: 'Derecha',
                                logicOr: 'O',
                                logicAnd: 'Y',
                                button: 'BUSQUEDA AVANZADA <i class="fas fa-filter"></i>',
                                conditions :{
                                    date: {
                                        after: 'Despues',
                                        before: 'Antes',
                                        between: 'Entre',
                                        empty: 'Vacío',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        notBetween: 'No entre',
                                        notEmpty: 'No vacío'
                                    },
                                    moment: {
                                        before: 'Antes',
                                        after: 'Despues',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    number: {
                                        equals: 'Igual a',
                                        not: 'Diferente de',
                                        gt: 'Mayor que',
                                        gte: 'Mayor o igual que',
                                        lt: 'Menor que',
                                        lte: 'Menor o igual a',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    string: {
                                        contains: 'Contiene',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío',
                                        equals: 'Es igual a',
                                        not: 'Diferente de',
                                        endsWith: 'Termina con',
                                        startsWith: 'Empieza por'
                                    },
                                }
                                
                            },
                            },
                dom:  'Bfrtip',
                buttons: [
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
                            columns: [0,1,2,3,4]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Mis Solicitudes',
                        titleAttr: 'Mis Solicitudes',
                        messageTop: 'Mis Solicitudes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Mis Solicitudes',
                        exportOptions : {
                            columns: [0,1,2,3,4]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#solicitudes').html(error);
        })
    }

    $(document).on('click','#btnVerComentarios',function(event){
        event.preventDefault();
            $.ajax({
                url:'../controladorEmpleado/solicitudes.comentarios.read.php',
                type: 'POST',
                dataType: 'json',
                data : $('#buscar').serialize(),
            }).done(function(json){
                var comentarios = '';
                    if(json== 0){ 
                        comentarios += "<h5>Aun no hay comentarios</h5>";
                    }else{
                    // datos += '<form action="" class="form-group" id="buscar">';
                    comentarios += "<table id='tableConsulta' class='table  table-striped table-bordered dt-responsive nowrap'  vertical-align: bottom; style='font-size: 15px; height: 100px;' >"; 
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
                    $('#tablaFiltro').DataTable({
                        "destroy" : true,
                        "autoWidth": false,
                        "searching": false,
                        "info":     false,
                        "ordering": false,
                        "sZeroRecords": true,
                        "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                        "iDisplayLength":	5,
                        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",   
                                                
                                    },
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
    
    actualizarDocumentos();
    buscarPrioridad1();
    function actualizarDocumentos(){
        $.ajax({
            url:'../controladorEmpleado/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tableConsulta' class='table  table-striped table-bordered dt-responsive nowrap'  vertical-align: bottom; style='font-size: 14px; height: 100px;' >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">SOLICITAR ACTUALIZACIÓN</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap">'+value.proceso+'</td>'; 
                            datos += '<td class=" border border-primary text-center align-middle">'+value.tipoDoc+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.codigo+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.nombre+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="actualizacion(\''+value.codigo+'\',\''+value.tipoDoc+'\','+value.id_tipo_documento+'\)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-file-signature"></i></button></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#actualizacion').html(datos);
            $('#tableConsulta').DataTable({
                "destroy" : true,
                    "autoWidth": true,
                    "searching": true,
                    "info":     true,
                    "ordering": true,
                    "sZeroRecords": true,
                    "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                    "iDisplayLength":	10,
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                            "buttons":{
                                copyTitle: 'Registros Copiados',
                                copySuccess:{
                                    _:'%d Registros Copiados',
                                    1:'1 Registro Copiado',
                                }
                            },
                            searchBuilder: {
                                add: 'Agregar Condición',
                                data: 'Condición de Busqueda',
                                clearAll: 'Restablecer Filtro',
                                title:{  0: 'Seleccione Criterio de Busqueda',
                                _: 'Condicion(es) Seleccionada(s) (%d)'},
                                condition: 'Criterio de Busqueda',
                                value: 'Valor Buscado' ,
                                deleteTitle: 'Suprimir',
                                leftTitle: 'Izquierda',
                                rightTitle: 'Derecha',
                                logicOr: 'O',
                                logicAnd: 'Y',
                                button: 'BUSQUEDA AVANZADA <i class="fas fa-filter"></i>',
                                conditions :{
                                    date: {
                                        after: 'Despues',
                                        before: 'Antes',
                                        between: 'Entre',
                                        empty: 'Vacío',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        notBetween: 'No entre',
                                        notEmpty: 'No vacío'
                                    },
                                    moment: {
                                        before: 'Antes',
                                        after: 'Despues',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    number: {
                                        equals: 'Igual a',
                                        not: 'Diferente de',
                                        gt: 'Mayor que',
                                        gte: 'Mayor o igual que',
                                        lt: 'Menor que',
                                        lte: 'Menor o igual a',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    string: {
                                        contains: 'Contiene',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío',
                                        equals: 'Es igual a',
                                        not: 'Diferente de',
                                        endsWith: 'Termina con',
                                        startsWith: 'Empieza por'
                                    },
                                }
                                
                            },
                            },
                dom:  'Bfrtip',
                buttons: [
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#actualizacion').html(error);
        })
    }

    function buscarPrioridad1() {

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
            
            $('#prioridad1').html(prioridad);
        }).fail(function(xhr, status, error){
            $('#prioridad1').html(error);
        })     
    }

    eliminarDocumentos();
    buscarPrioridad2();
    function eliminarDocumentos(){  
        $.ajax({
            url:'../controladorEmpleado/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data : null,
        }).done(function(json){
             /**
             * Se crea la tabla para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tableConsulta' class='table  table-striped table-bordered dt-responsive nowrap'  vertical-align: bottom; style='font-size: 14px; height: 100px;' >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">SOLICITAR ELIMINACIÓN</th>';
                    datos += '</tr>';
                datos +=  '</thead>';
                datos += '<tbody>';
                    $.each(json, function(key, value){
                        datos += '<tr class="align-middle" >';
                            datos += '<td class=" border border-primary  text-wrap">'+value.proceso+'</td>'; 
                            datos += '<td class=" border border-primary text-center align-middle">'+value.tipoDoc+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.codigo+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.nombre+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><button type="button"  onclick="eliminacion(\''+value.codigo+'\',\''+value.tipoDoc+'\','+value.id_tipo_documento+'\)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fas fa-trash-alt"></i></button></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#eliminacion').html(datos);
            $('#tableConsulta').DataTable({
                "destroy" : true,
                    "autoWidth": true,
                    "searching": true,
                    "info":     true,
                    "ordering": true,
                    "sZeroRecords": true,
                    "lengthMenu":	[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                    "iDisplayLength":	10,
                    "language": {"url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
                            "buttons":{
                                copyTitle: 'Registros Copiados',
                                copySuccess:{
                                    _:'%d Registros Copiados',
                                    1:'1 Registro Copiado',
                                }
                            },
                            searchBuilder: {
                                add: 'Agregar Condición',
                                data: 'Condición de Busqueda',
                                clearAll: 'Restablecer Filtro',
                                title:{  0: 'Seleccione Criterio de Busqueda',
                                _: 'Condicion(es) Seleccionada(s) (%d)'},
                                condition: 'Criterio de Busqueda',
                                value: 'Valor Buscado' ,
                                deleteTitle: 'Suprimir',
                                leftTitle: 'Izquierda',
                                rightTitle: 'Derecha',
                                logicOr: 'O',
                                logicAnd: 'Y',
                                button: 'BUSQUEDA AVANZADA <i class="fas fa-filter"></i>',
                                conditions :{
                                    date: {
                                        after: 'Despues',
                                        before: 'Antes',
                                        between: 'Entre',
                                        empty: 'Vacío',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        notBetween: 'No entre',
                                        notEmpty: 'No vacío'
                                    },
                                    moment: {
                                        before: 'Antes',
                                        after: 'Despues',
                                        equals: 'Igual a',
                                        not: 'Diferente',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    number: {
                                        equals: 'Igual a',
                                        not: 'Diferente de',
                                        gt: 'Mayor que',
                                        gte: 'Mayor o igual que',
                                        lt: 'Menor que',
                                        lte: 'Menor o igual a',
                                        between: 'Entre',
                                        notBetween: 'No entre',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío'
                                    },
                                    string: {
                                        contains: 'Contiene',
                                        empty: 'Vacío',
                                        notEmpty: 'No vacío',
                                        equals: 'Es igual a',
                                        not: 'Diferente de',
                                        endsWith: 'Termina con',
                                        startsWith: 'Empieza por'
                                    },
                                }
                                
                            },
                            },
                dom:  'Bfrtip',
                buttons: [
                    {
                        extend: 'searchBuilder'
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#eliminacion').html(error);
            console.log(error);
        })
    }
    
    function buscarPrioridad2() {

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
            
            $('#prioridad2').html(prioridad);
        }).fail(function(xhr, status, error){
            $('#prioridad2').html(error);
        })     
    }


})