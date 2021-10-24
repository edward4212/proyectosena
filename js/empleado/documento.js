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
            datos += "<table id='tableConsulta'  class='table  table-striped table-bordered table-responsive '   >";
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
                            datos += '<td class=" border border-primary text-center align-middle">'+value.sigla_proceso+'</td>';
                            datos += '<td class=" border border-primary text-wrap align-middle">'+value.codigo+'</td>';
                            datos += '<td class=" border border-primary text-wrap">'+value.nombre+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.version+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle">'+value.fecha+'</td>';
                            datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/procesos/'+value.sigla_proceso+'/'+value.documento+'"><i class="fas fa-download"></i></a></td>';
                        datos += '</tr>';
                    })
                datos += '</tbody>';
            datos += '</table>';
            $('#consulta').html(datos);
            $('#tableConsulta').DataTable({
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
                "iDisplayLength":	10,
                "language": {"url": "../componente/libreria/idioma/es-mx.json"},
                dom:  'Qfrtip',
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
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text : '<i class="fas fa-print"></i>',
                        exportOptions : {
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text : '<i class="fas fa-file-excel"></i>',
                        autoFiltre : true ,
                        title: 'Documentos Vigentes',
                        exportOptions : {
                            columns: [0,1,2,3,4,5]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text : '<i class="fas fa-copy"></i>',
                        autoFiltre : true ,
                        titleAttr: 'COPIAR',
                        exportOptions : {
                            columns: [0,1,2,3,4,5]
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