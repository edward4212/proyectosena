$(document).ready(function(){
    buscar();

     /**
     * Se realiza la consulta de los documentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
     */

     function buscar(){
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
            datos += "<table id='tableConsulta' class='table  table-striped table-bordered dt-responsive nowrap'  vertical-align: bottom; style='font-size: 15px; height: 100px;' >";
               datos += '<thead >';
                    datos += '<tr class="table-light border-primary ">';
                        datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">FECHA DE VIGENCIA</th>';
                        datos += '<th  class="text-center align-middle border border-primary ">DESCARGAR DOCUMENTO</th>';
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
                            datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/documentos/'+value.proceso+'/'+value.documento+'"><i class="fas fa-file-download"></i></a></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#consulta').html(datos);
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
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text : '<i class="far fa-file-pdf"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Documentos Vigentes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'searchBuilder'
                        
                    }                      
                ]
            });
        }).fail(function(xhr, status, error){
            $('#mision').html(error);
        })
    }

})