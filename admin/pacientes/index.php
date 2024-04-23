<?php include('../../app/config.php'); ?>
<?php include('../layout/parte1.php'); ?>


<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h1>Pacientes</h1>
                    <button type="button" class="btn btn-primary ml-auto" onclick="modalPaciente('crear')">
                        <i class="bi bi-person-fill-add"></i> Agregar Paciente
                    </button>
                </div>
            </div>



            <div class="card card-outline card-primary mt-lg-2">
                <div class="card-header">
                    <h3 class="card-title">Pacientes Registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="divListadoPaciente">


                            <br>
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<!-- modales -->
<div class="modal fade " id="modalPaciente" tabindex="-1" aria-labelledby="permisosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="permisosModalLabel">Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPaciente" name="formPaciente">
                    <h4 class="text-primary">Datos generales:</h4>
                    <!-- Aquí mostrar los menús con casillas de verificación -->
                    <input type="text" id="idPaciente" name="idPaciente" hidden>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre_completo">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_Nacimiento">fecha Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="form-group">
                                <label for="fecha_Nacimiento">Genero</label>
                                <select class="form-control" id="genero" name="genero" required>
                                    <option value="">Seleccione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="O">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="dni">Dni (contraseña)</label>
                                <input type="number" class="form-control" id="dni" name="dni" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="dni">Usuario (para ingresar al sistema)</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                        </div>

                    </div>
                    <h4 class="text-primary">Datos de Contacto:</h4>
                    <div class="row">
                        <div class="col-lg-5 col-md-4">
                            <div class="form-group">
                                <label for="nombre_contacto">Datos persona de Contacto</label>
                                <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4">
                            <div class="form-group">
                                <label for="relacion_contacto">Relacion con el paciente</label>
                                <input type="text" class="form-control" id="relacion_contacto" name="relacion_contacto">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="telefono_contacto">Número celular</label>
                                <input type="text" class="form-control" id="telefono_contacto" name="telefono_contacto">
                            </div>
                        </div>
                    </div>
                    <h4 class="text-primary">Información médica básica:</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="alergias">Alergias (alimentos, medicamentos, etc)</label>
                                <input type="text" class="form-control" id="alergias" name="alergias">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="med_actual">Medicamentos actuales que está tomando</label>
                                <input type="text" class="form-control" id="med_actual" name="med_actual">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="enfermedad_cronica">Enfermedad Cronica</label>
                                <input type="text" class="form-control" id="enfermedad_cronica" name="enfermedad_cronica">
                            </div>
                        </div>
                    </div>
                    <h4 class="text-primary">Historial Clínico:</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_ulti_consulta">Fecha de la última consulta(general)</label>
                                <input type="text" class="form-control" id="fecha_ulti_consulta" name="fecha_ulti_consulta">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="motivo_ulti_consulta">Motivo de la última consulta</label>
                                <input type="text" class="form-control" id="motivo_ulti_consulta" name="motivo_ulti_consulta">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="tratamientos_previos">Tratamientos Previos u operaciones</label>
                                <input type="text" class="form-control" id="tratamientos_previos" name="tratamientos_previos">
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-guardar" onclick="guardarPaciente()">Guardar</button>
            </div>
        </div>
    </div>

</div>
<!-- fin modales -->


<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>

<script>
    function cargarTabla() {
        $.ajax({
            method: "POST",
            url: "tblPacientes.php", // El archivo PHP que devuelve los datos de la tabla
            dataType: 'html', // Esperamos datos HTML para la tabla
            success: function(data) {
                $('#divListadoPaciente').html(data); // Insertamos los datos en el contenedor de la tabla
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error al cargar la tabla: " + textStatus + ", " + errorThrown);
            }
        });
    }

    // Llamar a cargarTabla() al cargar la página inicialmente
    $(document).ready(function() {
        cargarTabla();
    });

    function modalPaciente(mode, idPaciente) {
        $('#formPaciente').trigger('reset');
        if (mode === 'crear') {
            // Configurar el modal para crear un nuevo paciente
            $('#modalPaciente').modal('show');
            $('.modal-title').text('Nuevo Paciente');
            $('.btn-guardar').text('Guardar Paciente');
        } else if ((mode === 'editar' || mode === 'ver') && idPaciente !== null) {
            // Obtener los datos del paciente desde el servidor utilizando AJAX
            $.ajax({
                    method: "POST",
                    url: "../../app/controlador/pacientes/pacientesShowControlador.php",
                    data: {
                        idPaciente: idPaciente
                    },
                    dataType: 'json'
                })
                .done(function(resultado) {
                    console.log(resultado);
                    console.log(typeof resultado);
                    // Llenar los campos del formulario con los datos del paciente
                    $('#idPaciente').val(idPaciente);
                    $('#nombre_completo').val(resultado.nombre_completo);
                    console.log(resultado.nombre_completo);
                    $('#fecha_nacimiento').val(resultado.fecha_nacimiento);
                    console.log(resultado.fecha_nacimiento);
                    $('#genero').val(resultado.genero);
                    console.log(resultado.genero);
                    $('#dni').val(resultado.dni);
                    $('#usuario').val(resultado.usuario);
                    $('#nombre_contacto').val(resultado.nombre_contacto);
                    $('#relacion_contacto').val(resultado.relacion_contacto);
                    $('#telefono_contacto').val(resultado.telefono_contacto);
                    $('#alergias').val(resultado.alergias);
                    $('#med_actual').val(resultado.med_actual);
                    $('#enfermedad_cronica').val(resultado.enfermedad_cronica);
                    $('#fecha_ulti_consulta').val(resultado.fecha_ulti_consulta);
                    $('#motivo_ulti_consulta').val(resultado.motivo_ulti_consulta);
                    $('#tratamientos_previos').val(resultado.tratamientos_previos);

                    // Deshabilitar todos los campos del formulario si se está en modo "ver"
                    if (mode === 'ver') {
                        $('#formPaciente :input').prop('disabled', true);
                        // Ocultar el botón de guardar
                        $('.btn-guardar').hide();
                    } else {
                        // Mostrar el botón de guardar si se está en modo "editar"
                        $('.btn-guardar').show();
                    }

                    // Mostrar el modal después de asignar los valores a los campos del formulario
                    $('#modalPaciente').modal('show');
                    $('.modal-title').text(mode === 'ver' ? 'Ver Paciente' : 'Editar Paciente');
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Error al obtener los datos del paciente: " + textStatus + ", " + errorThrown);
                });
        }

        // Limpia los campos del formulario al cerrar el modal
        $('#modalPaciente').on('hidden.bs.modal', function() {
            $('#formPaciente').trigger('reset');
            // Habilitar todos los campos del formulario cuando se cierra el modal
            $('#formPaciente :input').prop('disabled', false);
            // Mostrar el botón de guardar si no se está en modo "ver"
            if (mode !== 'ver') {
                $('.btn-guardar').show();
            }
        });
    }


    function guardarPaciente() {
        var datos = $('#formPaciente').serializeArray();
        var url = ""; // URL del controlador, se establecerá dependiendo de si es una creación o una edición

        // Determinar la URL del controlador según si se está creando o editando
        var mode = $('#idPaciente').val() ? 'editar' : 'crear';
        if (mode === 'crear') {
            url = "../../app/controlador/pacientes/pacientesCreateControlador.php";
        } else if (mode === 'editar') {
            url = "../../app/controlador/pacientes/pacientesUpdateControlador.php";
        }

        $.ajax({
                method: "POST",
                url: url,
                data: datos,
                dataType: 'json'
            })
            .done(function(resultado) {
                console.log(resultado); // Verificar la respuesta del servidor
                if (resultado.success) {
                    $('#modalPaciente').modal('hide');
                    $('#formPaciente').trigger('reset');
                    Swal.fire({
                        icon: 'success',
                        title: 'Paciente guardado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    cargarTabla(); // Cargar la tabla después de una operación exitosa
                } else {
                    // Mostrar mensaje de error utilizando SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: resultado.message
                    });
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX: " + textStatus + ", " + errorThrown);
            });
    }

    function confirmarEliminacion(id_Paciente) {
        Swal.fire({
            title: "¿Seguro que desea eliminar?",
            icon: "question",
            iconHtml: "?",
            cancelButtonText: "No",
            confirmButtonText: "Sí",
            showCancelButton: true,
            showCloseButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar una solicitud AJAX para eliminar el paciente
                $.ajax({
                    method: "GET",
                    url: "../../app/controlador/pacientes/pacientesDeleteControlador.php",
                    data: {
                        id_Paciente: id_Paciente
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Paciente eliminado correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            cargarTabla(); // Por ejemplo, recargar la tabla de pacientes
                        } else {
                            // Manejar el caso en el que la eliminación falla
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error en la solicitud AJAX: " + textStatus + ", " + errorThrown);
                    }
                });
            }
        });
        return false; // Evitar el comportamiento predeterminado del enlace
    }
</script>