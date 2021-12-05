function cargar() {
    window.location.href = "../administrador/tareas.php";
}

function comentario(id_solicitud) {
    $("#numIdSolicitud").val(id_solicitud);
    $("#numIdSolicitud1").val(id_solicitud);
}

function estadiSolicitud(id_solicitud, estatus_solicitud) {
    $("#numIdSolicitud2").val(id_solicitud);
    $("#estadoSolicitud").val(estatus_solicitud);
}

function iniciarTarea(id_solicitud) {
    $("#numIdSolicitud3").val(id_solicitud);
}

function idtarea(id_tarea, id_solicitud) {
    $("#numIdTarea").val(id_tarea);
    $("#numIdTarea1").val(id_tarea);
    $("#numIdSolT").val(id_solicitud);
}

function idtareaAct(id_versionamiento, id_tarea, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version) {
    $("#numIdTarea11").val(id_versionamiento);
    $("#documendocumentoTarea").val(codigo + '-' + nombre_documento);
    $("#versionDoc1").val(numero_version);
    $("#fileDocumentoDes").attr('href', '../documentos/procesos/' + sigla_proceso + '/' + sigla_tipo_documento + '/' + codigo+ '/' + numero_version + '/' + documento);
    $("#descriVersion").val(descripcion_version);
    $("#numIdVerDevol").val(id_versionamiento);
    $("#idTareDEvl").val(id_tarea);
    $("#id_tareaAct").val(id_tarea);
}

function idtareaApr(id_versionamiento, id_tarea, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version, id_documento) {
    $("#numIdTareaApro").val(id_versionamiento);
    $("#documendocumentoApr").val(codigo + '-' + nombre_documento);
    $("#versionDocAp").val(numero_version);
    $("#fileDocumentoDesAp").attr('href', '../documentos/procesos/' + sigla_proceso + '/' + sigla_tipo_documento + '/' + codigo+ '/' + numero_version + '/' + documento);
    $("#descriVersionAp").val(descripcion_version);
    $("#numIdVerDevolApr").val(id_versionamiento);

    $("#id_documentoVersion").val(id_documento);
    $("#versionAnterior").val(numero_version - 1);
    $("#id_tareaApr").val(id_tarea);

    $("#id_tareaDEvAp").val(id_tarea);

}

function idcomentarioTar(id_tarea,id_versionamiento) {
    $("#numIdTidTareaCom").val(id_tarea);
    $("#numIdTidTareaCom1").val(id_tarea);
    $("#idTareaComDev").val(id_versionamiento);
    
}

function idcomentarioTarAct(id_tarea) {
    $("#numIdTidTareaComAct").val(id_tarea);
    $("#numIdTidTareaCom1Act").val(id_tarea);
}

function sigla_proceso(id_proceso, sigla_proceso, numero_version) {
    $("#idsiglasProc").val(id_proceso);
    $("#proceso").val(sigla_proceso);
    $("#versionSig").val(numero_version + 1);
}

function idDevolucion(id_versionamiento, documento, codigo, nombre_documento, numero_version, sigla_tipo_documento, sigla_proceso, descripcion_version, id_documento) {
    $("#idVersionDevo").val(id_versionamiento);
    $("#documendocumentoDevo").val(codigo + '-' + nombre_documento);
    $("#versionDev").val(numero_version);
    $("#procesoDEv").val(sigla_proceso);
    $("#codigoDev").val(codigo);
    $("#tipoDocDElv").val(sigla_tipo_documento);
}

$(document).ready(function () {

    buscar();
    estatus();
    tareas();
    buscarFuncionarios();
    tareasAct();
    tareasApr();
    tareasDevol();
    buscarFuncionarios1();
    buscarFuncionariossINT();
    buscarFuncionarios2();
    tareastotal();

    $("#documentoAuto").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "../controladorAdministrador/documento.autocomplete.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response(data);
                }
            })
        },
        select: function (event, ui) {
            event.preventDefault();
            var suma = parseInt(ui.item.numero_version);
            var uno = 1;
            var resul = suma + uno;
            $("#documentoAuto").val(ui.item.nombre_documento);
            $("#versionSig").val(resul);
            $("#codigo").val(ui.item.codigo);
            $("#idDocumento").val(ui.item.id_documento);
            $("#proceso").val(ui.item.sigla_proceso);
            $("#sigla_tipo_documento").val(ui.item.sigla_tipo_documento);
            $("#documentoAuto").prop("disabled", true);
        }
    })

    $("#documentoAuto1").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "../controladorAdministrador/documento.autocomplete.php",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response(data);
                }
            })
        },
        select: function (event, ui) {

            event.preventDefault();
            if (ui.item.est == 'T') {
                Swal.fire({
                    icon: 'error',
                    title: 'El Documento se encuentra en Tramite, Seleccione otro documento',
                    showConfirmButton: false,
                    timer: 3000
                }).then((result) => {
                    cargar();
                })
            } else {
                var suma = parseInt(ui.item.numero_version);
                var uno = 1;
                var resul = suma + uno;
                $("#documentoAuto1").val(ui.item.nombre_documento);
                $("#codigo1").val(ui.item.codigo);
                $("#versionSig1").val(resul);
                $("#idDocumento1").val(ui.item.id_documento);
                $("#proceso1").val(ui.item.sigla_proceso);
                $("#sigla_tipo_documento1").val(ui.item.sigla_tipo_documento);
                $("#documentoAuto1").prop("disabled", true);

            }
        }
    })

    function buscar() {
        $.ajax({
            url: '../controladorAdministrador/solicitudes.read2.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
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
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.id_solicitud + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_solicitud + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_asignacion + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + value.prioridad + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_solicitud + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.tipo_documento + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo_documento + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_completo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                if (value.documento != "") {
                    datos += '<td class=" border border-primary text-center align-middle"><a class="btn btn-primary" href="../documentos/usuarios/' + value.usuario + '/solicitudes/' + value.carpeta + '/' + value.documento + '"><i class="fas fa-download"></i></a></td>';
                } else {
                    datos += '<td class=" border border-primary text-wrap align-middle">Sin Documento Soporte</td>';
                }
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnEstadiSolicitud" onclick="estadiSolicitud(' + value.id_solicitud + ',\'' + value.estatus_solicitud + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#estadoSol"><i class="far fa-list-alt"></i></button></td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnVerComentarios" onclick="comentario(' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-comment-dots"></i></button></td>';
                if (value.fecha_inicio_tarea != null) {
                    datos += '<td class=" border border-primary text-wrap align-middle">Tarea ya Iniciada</td>';
                } else {
                    datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  id="btnIniciarTarea" onclick="iniciarTarea(' + value.id_solicitud + ')" class="btn btn-primary" ><i class="far fa-clock"></i></button></td>';
                }
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#solicitudesAsig').html(datos);
            $('#tableSolicitudes').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [3, 'asc'],
                    [1, 'asc']
                ],
                rowGroup: {
                    dataSrc: 3
                },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Mis Solicitudes Asignadas',
                    titleAttr: 'Mis Solicitudes Asignadas',
                    messageTop: 'Mis Solicitudes Asignadas',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10]
                    }
                },
                {
                    extend: 'print',
                    title: 'Mis Solicitudes Asignadas',
                    titleAttr: 'Mis Solicitudes Asignadas',
                    messageTop: 'Mis Solicitudes Asignadas',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Mis Solicitudes Asignadas',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#solicitudesAsig').html(error);
        })
    }

    $(document).on('click', '#btnVerComentarios', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitudes.comentarios.read.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar').serialize(),
        }).done(function (json) {
            var comentarios = '';
            if (json == 0) {
                comentarios += "<h5>Aun no hay comentarios</h5>";
            } else {
                comentarios += "<table id='tableComentarios'  class='table  table-striped table-bordered table-responsive ' >";
                comentarios += '<thead >';
                comentarios += '<tr class="table-light border-primary ">';
                comentarios += '<th  class="text-center align-middle border border-primary ">FECHA COMENTARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">USUARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">COMENTARIO</th>';;
                comentarios += '</tr>';
                comentarios += '</thead>';
                comentarios += '<tbody>';
                $.each(json, function (key, value) {
                    comentarios += '<tr class="align-middle" >';
                    comentarios += '<td class=" border border-primary text-wrap" id="numIdSolicitud">' + value.fecha_comentario + ' </td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.usuario_comentario + '</td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.comentario + '</td>';
                    comentarios += '</tr>';
                })
                comentarios += '</tbody>';
                comentarios += '</table>';
            }
            $('#comentarios').html(comentarios);
            $('#tableComentarios').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": false,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    pageSize: 'LEGAL',
                    title: 'Comentarios sobre la Solicitud',
                    titleAttr: 'Comentarios sobre la Solicitud',
                    messageTop: 'Comentarios sobre la Solicitud',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2,]
                    }
                },
                {
                    extend: 'print',
                    title: 'Comentarios sobre la Solicitud',
                    titleAttr: 'Comentarios sobre la Solicitud',
                    messageTop: 'Comentarios sobre la Solicitud',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Comentarios sobre la Solicitud',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#comentarios').html(error);
        })
    })

    /// ASIGNAR COMENTARIO A LA SOLICITUD///
    $(document).on('click', '#btnCrearcomentario', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitudes.comentarios.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar1').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Comentario Asignado con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// ASIGNAR ESTATUS A LA SOLICITUD///
    function estatus() {
        $.ajax({
            url: '../controladorAdministrador/estatus_solicitud.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var estadoSolicitud = 0;
            estadoSolicitud += '<option disabled selected> - Seleccione un nuevo Estado-</option>';
            $.each(json, function (key, value) {
                estadoSolicitud += '<option value=' + value.id_estatus_solicitud + '>' + value.estatus_solicitud + '</option>';
            })
            $('#estadoSolicitud1').html(estadoSolicitud);
        }).fail(function (xhr, status, error) {
            $('#estadoSolicitud1').html(error);
        })
    }

    /// cambio de estado a la solicitud///
    $(document).on('click', '#btnEstadiSolicitud', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitudes.estado.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#EstadiSolicitud').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Soliictud Actualizada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {

        })
    })

    /// INICIAR UNA TAREA///
    $(document).on('click', '#btnIniciarTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Tarea Iniciada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// agregar comentario de INICIAR UNA TAREA///
    $(document).on('click', '#btnIniciarTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/solicitudes.comentarios.tarea.create.php',
            type: 'POST',
            dataType: 'json',
            data: $('#buscar').serialize(),
        }).done(function (json) {

        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    function tareas() {
        $.ajax({
            url: '../controladorAdministrador/tarea.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareas'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO TAREA</th>';
            datos += '<th  class="border border-primary text-center align-middle ">SOLICITUD</th>';
            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ESTADO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "C") {
                    estado = "CREACION";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_tarea + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_asignacion + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + estado + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button" onclick="idtarea(' + value.id_tarea + ',' + value.id_solicitud + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltarea"><i class="fas fa-cogs"></i></button></td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareas').html(datos);
            $('#tabletareas').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos Para Creación',
                    titleAttr: 'Documentos Para Creación',
                    messageTop: 'Documentos Para Creación',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos Para Creación',
                    titleAttr: 'Documentos Para Creación',
                    messageTop: 'Documentos Para Creación',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos Para Creación',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareas').html(error);
        })
    }

    function buscarFuncionarios() {

        $.ajax({
            url: '../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            })
            $('#empleado').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleado').html(error);
        })
    }


    function buscarFuncionariossINT() {

        $.ajax({
            url: '../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            })
            $('#empleadoCAN').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleadoCAN').html(error);
        })
    }

    /// mostrar las tareas revision//
    function tareasAct() {
        $.ajax({
            url: '../controladorAdministrador/tarea.readAct.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasAct'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO VERSIONAMIENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle "> VERSION</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "R") {
                    estado = "REVISION";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_versionamiento + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_documento + '</td>';
                datos += '<td class=" border border border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  onclick="idtareaAct(' + value.id_versionamiento + ',' + value.id_tarea + ',\'' + value.documento + '\',\'' + value.codigo + '\',\'' + value.nombre_documento + '\',' + value.numero_version + ',\'' + value.sigla_tipo_documento + '\',\'' + value.sigla_proceso + '\',\'' + value.descripcion_version + '\')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltareaAct"><i class="fas fa-cogs"></i></button></td>';

                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasAct').html(datos);
            $('#tabletareasAct').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos Para Revisión',
                    titleAttr: 'Documentos Para Revisión',
                    messageTop: 'Documentos Para Revisión',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos Para Revisión',
                    titleAttr: 'Documentos Para Revisión',
                    messageTop: 'Documentos Para Revisión',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos Para Revisión',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareasAct').html(error);
        })
    }

    ///asignar funcioanrio Para revisar///
    function buscarFuncionarios1() {
        $.ajax({
            url: '../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            })
            $('#empleado1').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleado1').html(error);
        })
    }

    /// REVISION DE VERSION REALZIADA///
    $(document).on('click', '#btnRevisionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.revision.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaRevision').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Revision Registrada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// DEVOLVER REVISION DE VERSION REALZIADA///
    $(document).on('click', '#btnDevolverTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.devolver.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaDevolucion').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Devolucion de Documento Registrada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// mostrar las tareas APROBACION//
    function tareasApr() {
        $.ajax({
            url: '../controladorAdministrador/tarea.readApr.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasApr'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO VERSIONAMIENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle "> VERSION</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "R") {
                    estado = "REVISION";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_versionamiento + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_documento + '</td>';
                datos += '<td class=" bborder border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  onclick="idtareaApr(' + value.id_versionamiento + ',' + value.id_tarea + ',\'' + value.documento + '\',\'' + value.codigo + '\',\'' + value.nombre_documento + '\',' + value.numero_version + ',\'' + value.sigla_tipo_documento + '\',\'' + value.sigla_proceso + '\',\'' + value.descripcion_version + '\',' + value.id_documento + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltareaApr"><i class="fas fa-cogs"></i></button></td>';

                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasApr').html(datos);
            $('#tabletareasApr').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos  Para Aprobación',
                    titleAttr: 'Documentos  Para Aprobación',
                    messageTop: 'Documentos  Para Aprobación',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos  Para Aprobación',
                    titleAttr: 'Documentos  Para Aprobación',
                    messageTop: 'Documentos  Para Aprobación',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos  Para Aprobación',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareasApr').html(error);
        })
    }

    /// REVISION DE VERSION REALZIADA///
    $(document).on('click', '#btnAprobacionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.aprobacion.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#aprobacion').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Revision Registrada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    ///INACTIVAR VERSION ANTERIOR DE VERSION REALZIADA///
    $(document).on('click', '#btnAprobacionTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.aprobacion.update2.php',
            type: 'POST',
            dataType: 'json',
            data: $('#aprobacion').serialize(),
        }).done(function (json) {

        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    /// DEVOLVER REVISION DE VERSION REALZIADA///
    $(document).on('click', '#btnDevolverTareaApr', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/versionamiento.devolver1.update.php',
            type: 'POST',
            dataType: 'json',
            data: $('#tareaDevolucionApr').serialize(),
        }).done(function (json) {
            Swal.fire({
                icon: 'success',
                title: 'Devolucion de Documento Registrada con Exito',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                cargar();
            })
        }).fail(function (xhr, status, error) {
            console.log(error);
        })
    })

    function tareasDevol() {
        $.ajax({
            url: '../controladorAdministrador/tarea.dev.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasDev'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO VERSIONAMIENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle ">NOMBRE DOCUMENTO</th>';
            datos += '<th  class="border border-primary text-center align-middle "> VERSION</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ADMINISTRAR TAREA</th>';
            datos += '<th  class="border border-primary text-center align-middle ">COMENTARIOS </th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "D") {
                    estado = "DEVOLUCION";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_versionamiento + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.codigo + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.nombre_documento + '</td>';
                datos += '<td class=" border border-primary text-center align-middle">' + value.numero_version + '</td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button"  onclick="idDevolucion(' + value.id_versionamiento + ',\'' + value.documento + '\',\'' + value.codigo + '\',\'' + value.nombre_documento + '\',' + value.numero_version + ',\'' + value.sigla_tipo_documento + '\',\'' + value.sigla_proceso + '\',\'' + value.descripcion_version + '\',' + value.id_documento + ')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaltareaDevol"><i class="fas fa-cogs"></i></button></td>';
                datos += '<td class=" border border-primary  text-center align-middle"><button type="button" id="btnVerComentariosTarea" onclick="idcomentarioTar(' + value.id_tarea + ',' + value.id_versionamiento +')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comentarioDevolucion"><i class="far fa-comment-dots"></i></button></td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasDevol').html(datos);
            $('#tabletareasDev').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Documentos  Devueltos',
                    titleAttr: 'Documentos  Devueltos',
                    messageTop: 'Documentos  Devueltos',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Documentos  Devueltos',
                    titleAttr: 'Documentos  Devueltos',
                    messageTop: 'Documentos  Devueltos',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Documentos  Devueltos',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareasDevol').html(error);
        })
    }

    ///asignar funcioanrio Para revisar///
    function buscarFuncionarios2() {
        $.ajax({
            url: '../controladorAdministrador/usuario.read.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            var tipoDocumento = 0;
            tipoDocumento += '<option disabled selected> - Seleccione un funcionario-</option>';
            $.each(json, function (key, value) {
                tipoDocumento += '<option value=' + value.usuario + '>' + value.usuario + '</option>';
            })
            $('#empleadoDev').html(tipoDocumento);
        }).fail(function (xhr, status, error) {
            $('#empleadoDev').html(error);
        })
    }

    
    $(document).on('click', '#btnVerComentariosTarea', function (event) {
        event.preventDefault();
        $.ajax({
            url: '../controladorAdministrador/tarea.comentariosTarea.read.php.php',
            type: 'POST',
            dataType: 'json',
            data: $('#comentarioDevoluciona').serialize(),
        }).done(function (json) {
            var comentarios = '';
            if (json == 0) {
                comentarios += "<h5>Aun no hay comentarios</h5>";
            } else {
                comentarios += "<table id='tableComentariosTarea'  class='table  table-striped table-bordered table-responsive ' >";
                comentarios += '<thead >';
                comentarios += '<tr class="table-light border-primary ">';
                comentarios += '<th  class="text-center align-middle border border-primary ">FECHA COMENTARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">USUARIO</th>';
                comentarios += '<th  class="text-center align-middle border border-primary ">COMENTARIO</th>';;
                comentarios += '</tr>';
                comentarios += '</thead>';
                comentarios += '<tbody>';
                $.each(json, function (key, value) {
                    comentarios += '<tr class="align-middle" >';
                    comentarios += '<td class=" border border-primary text-wrap" id="numIdSolicitud">' + value.fecha_comentario + ' </td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.usuario_comentario + '</td>';
                    comentarios += '<td class=" border border-primary  text-wrap align-middle">' + value.comentario + '</td>';
                    comentarios += '</tr>';
                })
                comentarios += '</tbody>';
                comentarios += '</table>';
            }
            $('#comentariosTareaDev').html(comentarios);
            $('#tableComentariosTarea').DataTable({
                "destroy": true,
                "autoWidth": true,
                "responsive": true,
                "searching": false,
                "info": true,
                "ordering": true,
                "colReorder": true,
                "sZeroRecords": true,
                "fixedColumns": true,
                "fixedHeader": true,
                "keys": true,
                "deferRender": true,
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    pageSize: 'LEGAL',
                    title: 'Comentarios sobre la Solicitud',
                    titleAttr: 'Comentarios sobre la Solicitud',
                    messageTop: 'Comentarios sobre la Solicitud',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2,]
                    }
                },
                {
                    extend: 'print',
                    title: 'Comentarios sobre la Solicitud',
                    titleAttr: 'Comentarios sobre la Solicitud',
                    messageTop: 'Comentarios sobre la Solicitud',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Comentarios sobre la Solicitud',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#comentariosTareaDev').html(error);
        })
    })


    function tareastotal() {
        $.ajax({
            url: '../controladorAdministrador/tarea.readtotal.php',
            type: 'POST',
            dataType: 'json',
            data: null,
        }).done(function (json) {
            /**
             * Se crea la tabla Para mostrar los datos consultados
             */
            var datos = '';
            datos += "<table id='tabletareasTotal'   class='table  table-striped table-bordered table-responsive '  >";
            datos += '<thead >';
            datos += '<tr class="table-light border-primary text-center align-middle ">';
            datos += '<th  class="border border-primary text-center align-middle ">CODIGO TAREA</th>';
            datos += '<th  class="border border-primary text-center align-middle ">SOLICITUD</th>';
            datos += '<th  class="border border-primary text-center align-middle ">FECHA DE ASIGNACIÓN</th>';
            datos += '<th  class="border border-primary text-center align-middle ">ESTADO</th>';
            datos += '</tr>';
            datos += '</thead>';
            datos += '<tbody>';
            $.each(json, function (key, value) {
                if (value.estado = "C") {
                    estado = "CREACION";
                }
                datos += '<tr class="align-middle" >';
                datos += '<td class=" border border-primary text-wrap align-middle" >' + value.id_tarea + ' </td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.solicitud + '</td>';
                datos += '<td class=" border border-primary text-wrap align-middle">' + value.fecha_asignacion + '</td>';
                datos += '<td class=" border border-primary text-wrap">' + estado + '</td>';
                datos += '</tr>';
            })
            datos += '</tbody>';
            datos += '</table>';
            $('#tareasTotal').html(datos);
            $('#tabletareasTotal').DataTable({
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
                "lengthMenu": [
                    [5, 10, 20, 25, 50, -1],
                    [5, 10, 20, 25, 50, "Todos"]
                ],
                "iDisplayLength": 5,
                "language": {
                    "url": "../componente/libreria/idioma/es-mx.json"
                },
                order: [
                    [0, 'asc']
                ],
                dom: 'Qfrtip',
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    download: 'open',
                    title: 'Total de Tareas',
                    titleAttr: 'Total de Tareas',
                    messageTop: 'Total de Tareas',
                    text: '<i class="far fa-file-pdf"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: 'Total de Tareas',
                    titleAttr: 'Total de Tareas',
                    messageTop: 'Total de Tareas',
                    text: '<i class="fas fa-print"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i>',
                    autoFiltre: true,
                    title: 'Total de Tareas',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<i class="fas fa-copy"></i>',
                    autoFiltre: true,
                    titleAttr: 'COPIAR',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'searchBuilder'

                }
                ]
            });
        }).fail(function (xhr, status, error) {
            $('#tareas').html(error);
        })
    }

})
