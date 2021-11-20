
function siglasProcNuevo(id_proceso, sigla_proceso) {
    $("#idsiglasProc").val(id_proceso);
    $("#idsiglasProc12").val(id_proceso);
    $("#siglasProcNuevo").val(sigla_proceso);
    $("#siglasProc1").val(sigla_proceso);
}

function sigla_tipo_documento(id_tipo_documento, sigla_tipo_documento) {
    $("#idsiglasTipDoc").val(id_tipo_documento);
    $("#idsiglasTipDoc12").val(id_tipo_documento);
    $("#siglasTipDoc").val(sigla_tipo_documento);
    $("#siglasTipDoc1").val(sigla_tipo_documento);
}

$(document).ready(function () {
    buscar();
    buscarProceso();
    buscarTipoDocumento();
    buscarDocuCrea();
    buscarDocuAdm();
    buscarDocuObs();

    /**
    * Se realiza la consulta de los documentos vigentes para mostrar en la vistaEmpleado/consultas.frm.php
    */

    function buscar() {
        $.ajax({
            url: '../controladorAdministrador/documento.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tableConsultaDoc'  class='table  table-striped table-bordered table-responsive '   >";
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
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary  text-wrap">' + value.proceso + '</td>';
                datos += '<td class=" border border-primary text-center align-middle">' + value.tipo_documento + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + value.nombre_documento + '</td>';
                datos += '<td class=" border border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary text-center align-middle">' + value.fecha_aprobacion + '</td>';
                datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/procesos/' + value.sigla_proceso + '/' + value.sigla_tipo_documento + '/' + value.numero_version + '/' + value.documento + '"><i class="fas fa-download"></i></a></td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#consulta').html(datos);
            $('#tableConsultaDoc').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                order: [[0, 'asc'], [2, 'asc']],
                rowGroup: {
                    dataSrc: 0
                },
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Vigentes',
                        titleAttr: 'Documentos Vigentes',
                        messageTop: 'Documentos Vigentes',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Documentos Vigentes',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: 'searchBuilder'

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#consulta').html(error);
        })
    }

    /// MOSTRAR PROCESO ///
    function buscarProceso() {
        $.ajax({
            url: '../controladorAdministrador/proceso.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var proceso = 0;
            proceso += '<option disabled selected> - Seleccione un Proceso -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "A") {
                    proceso += '<option value=' + value.id_proceso + ' onclick="siglasProcNuevo(' + value.id_proceso + ',\'' + value.sigla_proceso + '\')">' + value.proceso + '</option>';
                  
                }
            })
            $('#procesoNuevo').html(proceso);
        }).fail(function (xhr, status, error) {
            $('#procesoNuevo').html(error);
        })
    }

    /// MOSTRAR TIPO DOCUMENTOS ///
    function buscarTipoDocumento() {
        $.ajax({
            url: '../controladorAdministrador/tipoDocumento.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un Tipo de Documento -</option>';
            $.each(json, function (key, value) {
                if (value.estado == "A") {
                    tipoDocumento += '<option value=' + value.id_tipo_documento + ' onclick="sigla_tipo_documento(' + value.id_tipo_documento + ',\'' + value.sigla_tipo_documento + '\')">' + value.tipo_documento + '</option>';
                }
            })
            $('#tipoDocumento').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#tipoDocumento').html(error);
        })
    }

    /// CREAR DOCUMENTO///
    $(document).on('click', '#btncrearDoc', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/documento.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#crearDoc').serialize(),
        }).done(function (json) {
            if (json[0].proceso == "OK") {
                Swal.fire({
                    icon: 'success',
                    title: 'Documento Creado con Exito',
                    showConfirmButton: false,
                    timer: 3000
                }).then((result) => {
                    window.location.href = "../vistaAdministrador/documentos.Adm.frm.php";
                })

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo crear el Documento!.. Favor Verifique los datos ingresado!',
                    showConfirmButton: false,
                    timer: 3000
                }).then((result) => {
                    window.location.href = "../vistaAdministrador/documentos.Adm.frm.php";
                })
            }
        }).fail(function (xhr, status, error) {
            $('#respuesta').html(error);
        })

    })

    /// MOSTRAR DOCUMENTOS CREADOS
    function buscarDocuCrea() {
        $.ajax({
            url: '../controladorAdministrador/documento.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tableConsultaDocR'  class='table  table-striped table-bordered table-responsive '   >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary ">';
            datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
            datos += '<th  class="text-center align-middle border border-primary ">ESTADO</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado_version == "C") {
                    value.estado_version = "CREADO";
                } else if (value.estado_version == "V") {
                    value.estado_version = "VIGENTE";
                } else if (value.estado_version == "O") {
                    value.estado_version = "OBSOLETO";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary  text-wrap">' + value.proceso + '</td>';
                datos += '<td class=" border border-primary  text-wrap">' + value.tipo_documento + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + value.nombre_documento + '</td>';
                datos += '<td class= "text-center align-middle border border-primary ">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + value.estado_version + '</td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#documentosRg').html(datos);
            $('#tableConsultaDocR').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                order: [[0, 'asc'], [2, 'asc']],
                rowGroup: {
                    dataSrc: 0
                },
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Documentos Registrados',
                        titleAttr: 'Documentos Registrados',
                        messageTop: 'Documentos Registrados',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Registrados',
                        titleAttr: 'Documentos Registrados',
                        messageTop: 'Documentos Registrados',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Documentos Registrados',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,5]
                        }
                    },
                    {
                        extend: 'searchBuilder'

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#documentosRg').html(error);
        })
    }

    /// MOSTRAR PARA ADMINISTRACIÓN DE DOCMENTOS
    function buscarDocuAdm() {
        $.ajax({
            url: '../controladorAdministrador/documento.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tableConsultaAdm'  class='table  table-striped table-bordered table-responsive '   >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary ">';
            datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
            datos += '<th  class="text-center align-middle border border-primary ">INACTIVAR</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                    datos += '<td class=" border border-primary text-wrap">' + value.proceso + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.tipo_documento + '</td>';
                    datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                    datos += '<td class=" border border-primary text-wrap">' + value.nombre_documento + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle">' + value.numero_version + '</td>';
                    datos += '<td class=" border border-primary text-center align-middle"><button type="button" onclick="estadoRol(' + value.id_rol + ',\'' + value.rol + '\')" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-times"></i></button></td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#documentosAdm').html(datos);
            $('#tableConsultaAdm').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                order: [[0, 'asc'], [2, 'asc']],
                rowGroup: {
                    dataSrc: 0
                },
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Documentos Registrados',
                        titleAttr: 'Documentos Registrados',
                        messageTop: 'Documentos Registrados',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Registrados',
                        titleAttr: 'Documentos Registrados',
                        messageTop: 'Documentos Registrados',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Documentos Registrados',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'searchBuilder'

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#documentosAdm').html(error);
        })
    }

    /// MOSTRAR DOCUMENTOS OBSOLETOS
    function buscarDocuObs() {
        $.ajax({
            url: '../controladorAdministrador/documento.obsoletos.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
            * Se crea la tabla para mostrar los datos consultados
            */
            var datos = '';
            datos += "<table id='tableConsultaObso'  class='table  table-striped table-bordered table-responsive '    >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary ">';
            datos += '<th  class="text-center align-middle border border-primary ">PROCESO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">TIPO DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">CODIGO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">VERSIÓN</th>';
            datos += '<th  class="text-center align-middle border border-primary ">VER DOCUMENTO</th>';
            datos += '<th  class="text-center align-middle border border-primary ">FECHA INACTIVACIÓN</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary  text-wrap">' + value.proceso + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                datos += '<td class=" border border-primary  text-wrap ">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + value.nombre_documento + '</td>';
                datos += '<td class=" border border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/procesos/' + value.sigla_proceso + '/' + value.sigla_tipo_documento + '/' + value.numero_version + '/' + value.documento + '"><i class="fas fa-download"></i></a></td>';
                datos += '<td class=" border border-primary text-wrap">' + value.fecha_aprobacion + '</td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#documentosObs').html(datos);
            $('#tableConsultaObso').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": true,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
                "iDisplayLength": 20,
                "language": { "url": "../componente/libreria/idioma/es-mx.json" },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                order: [[0, 'asc'], [2, 'asc']],
                rowGroup: {
                    dataSrc: 0
                },
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4',
                        download: 'open',
                        title: 'Documentos Obsoletos',
                        titleAttr: 'Documentos Obsoletos',
                        messageTop: 'Documentos Obsoletos',
                        text: '<i class="far fa-file-pdf"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,6]
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Documentos Obsoletos',
                        titleAttr: 'Documentos Obsoletos',
                        messageTop: 'Documentos Obsoletos',
                        text: '<i class="fas fa-print"></i>',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,6]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFiltre: true,
                        title: 'Documentos Obsoletos',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,6]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        autoFiltre: true,
                        titleAttr: 'COPIAR',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,6]
                        }
                    },
                    {
                        extend: 'searchBuilder'

                    }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#documentosObs').html(error);
        })
    }

    /// CREAR NUMERO DE CODIGO///
    $(document).on('click', '#btnAsignarCod', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/codigo.read.php',
            type: 'POST',
            dataType: 'json',
            data: $('#crearDoc').serialize(),
        }).done(function (json) {
            var miCadena = "";
                var divisiones = "";
                var sss="";
                var dd = "";
                var resul=0;
            $.each(json, function (key, value) {
                
                miCadena = value.codigo;
                divisiones = miCadena.split("-");
                sss = divisiones[2];
                dd = parseInt(sss);
                var uno = 1;
             
                resul = dd + uno;
            })
            $('#txtcodigo').val(resul);
            $("#btnAsignarCod").prop("hidden", true);
            $("#procesoNuevo").prop("disabled", true);
            $("#tipoDocumento").prop("disabled", true);
            $("#nombreAsig").prop("hidden", false);
            $("#codigoAsi").prop("hidden", false);
            $("#btncrearDoc").prop("hidden", false);
            $("#btncrearResDoc").prop("hidden", false);
        }).fail(function (xhr, status, error) {
            alert (error);
        })

    })

    $(document).on('click','#btncrearResDoc', function(){
        $("#btnAsignarCod").prop("hidden", false);
        $("#procesoNuevo").prop("disabled", false);
        $("#tipoDocumento").prop("disabled", false);
        $("#nombreAsig").prop("hidden", true);
        $("#codigoAsi").prop("hidden", true);
        $("#btncrearDoc").prop("hidden", true);
        $("#btncrearResDoc").prop("hidden", true)
    })

    


})