<?php
$id_historia = $_GET['id_historia'];
$id_paciente = $_GET['id_paciente'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowCreateControlador.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowCreateControlador2.php');
?>

<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-1"> </div>
        <div class="col-md-10 mt-5">
            <div class="card card-outline card-primary mt-lg-2">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="padecimiento-tab" data-toggle="tab" href="#padecimiento" role="tab" aria-controls="padecimiento" aria-selected="true">Notas de Padecimiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tratamiento-tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">tratamientos</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form action="./../../app/controlador/historiaClinica/historiaClinicaUpdateControlador.php" method="post" enctype="multipart/form-data">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="padecimiento" role="tabpanel" aria-labelledby="padecimiento-tab">
                                <!-- Formulario para notas de padecimiento -->

                                <div class="row bg-white">

                                    <div class="col-md-6">
                                        <h1>Actualizar Consulta:</h1>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Paciente</label>
                                            <input class="form-control" name="nombre_paciente" id="nombre_paciente" readonly value="<?= $nombre_completo ?>"></input>
                                            <input class="form-control" name="id_historia" id="id_historia" value="<?= $id_historia ?>" hidden></input>
                                            <input class="form-control" name="id_paciente" id="id_paciente" value="<?= $id_paciente ?>" hidden></input>
                                            <input class="form-control" name="id_reserva" id="id_reserva" value="<?= $id_Reserva ?>" hidden></input>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="motivo_consulta">Motivo de consulta</label>
                                                    <select class="form-control" name="motivo_consulta" id="motivo_consulta">
                                                        <option value="nueva" <?= ($motivo_consulta == "nueva") ? 'selected' : '' ?>>Nueva consulta </option>
                                                        <option value="control" <?= ($motivo_consulta == "control") ? 'selected' : '' ?>>Control </option>
                                                        <option value="revaaluación" <?= ($motivo_consulta == "revaaluación") ? 'selected' : '' ?>>Reevaluación </option>
                                                        <option value="seguimiento" <?= ($motivo_consulta == "seguimiento") ? 'selected' : '' ?>>Seguimiento </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_consulta">Fecha de consulta</label>
                                                    <input type="date" class="form-control" name="fecha_consulta" id="fecha_consulta" value="<?= $fecha_consulta ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Médico responsable</label>
                                            <input type="text" class="form-control" name="medico_responsable" id="medico_responsable" value="<?= $medico_responsable ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="notas_padecimiento">Diagnostico</label>
                                            <input class="form-control" name="diagnostico" id="diagnostico" value="<?= $diagnostico ?>"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Notas de Padecimiento:</label>
                                            <textarea class="form-control" name="notas_padecimiento" id="notas_padecimiento" rows="4" style="resize: none;"><?= $notas_padecimiento ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="formulario">
                                            <div class="form-group" id="contenedor-archivos" name="contenedor-archivos">
                                                <label for="id_paciente">Resultados de laboratorio:</label>
                                                <ul>
                                                    <?php if (!empty($historiass1)) : ?>
                                                        <?php foreach ($historiass1 as $historia) : ?>
                                                            <li id="item-<?= $historia['id_prueba'] ?>">
                                                                <a href="<?= htmlspecialchars($historia['url_prueba']) ?>" target="_blank"><?= htmlspecialchars($historia['nombre_prueba']) ?></a>
                                                                <button type="button" class="btn btn-link btn-sm bg-red" style="margin-left: 10px;" onclick="confirmarEliminar(<?= $historia['id_prueba'] ?>)">&#10005;</button>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <li>No hay registros disponibles.</li>
                                                    <?php endif; ?>
                                                </ul>
                                                <br>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="agregar-archivo">Agregar Archivo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento-tab">
                                <!-- Formulario para notas de tratamiento -->
                                <div class="form-group">
                                    <div class="row bg-white">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="notas_padecimiento">Paciente</label>
                                                <input class="form-control" value="<?= $nombre_completo ?>" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Solicitud de nuevos examenes</label>
                                                <input class="form-control" name="examenes" id="examenes" value="<?= $examenes ?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="notas_padecimiento">Tratamiento</label>
                                                <input class="form-control" id="tratamiento" name="tratamiento" value="<?= $tratamiento ?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="duracion">Duración del tratamiento</label>
                                                <input class="form-control" id="duracion_tratamiento" name="duracion_tratamiento" value="<?= $duracion_tratamiento ?>"></input>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div id="formulario">
                                                <div class="form-group">
                                                    <label>Medicamentos</label>
                                                    <input type="text" class="form-control" id="medicamentos" name="medicamentos" value="<?= $medicamentos ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="notas_padecimiento">Notas de Tratamiento</label>
                                                    <textarea class="form-control" rows="4" style="resize: none;" id="notas_tratamiento" name="notas_tratamiento"> <?= $notas_tratamiento ?></textarea>
                                                </div>
                                                <br>
                                                <div class="card">
                                                    <div class="form-group m-3">
                                                        <label>Motivo de la próxima cita</label>
                                                        <select name="tipo_servicio" id="tipo_servicio" class="form-control">
                                                            <option value="control" <?= ($tipo_servicio == "control") ? 'selected' : '' ?>>Control </option>
                                                            <option value="revaluación" <?= ($tipo_servicio == "revaluación") ? 'selected' : '' ?>>Reevaluación </option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Próxima cita</label>
                                                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= $fecha ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Hora</label>
                                                                <select class="form-control" name="hora" id="hora">
                                                                    <option value="08:00 - 09:00" <?= ($hora == "08:00 - 09:00") ? 'selected' : '' ?>>08:00 - 09:00</option>
                                                                    <option value="09:00 - 10:00" <?= ($hora == "09:00 - 10:00") ? 'selected' : '' ?>>09:00 - 10:00</option>
                                                                    <option value="10:00 - 11:00" <?= ($hora == "10:00 - 11:00") ? 'selected' : '' ?>>10:00 - 11:00</option>
                                                                    <option value="11:00 - 12:00" <?= ($hora == "11:00 - 12:00") ? 'selected' : '' ?>>11:00 - 12:00</option>
                                                                    <option value="12:00 - 13:00" <?= ($hora == "12:00 - 13:00") ? 'selected' : '' ?>>12:00 - 13:00</option>
                                                                    <option value="14:00 - 15:00" <?= ($hora == "14:00 - 15:00") ? 'selected' : '' ?>>14:00 - 15:00</option>
                                                                    <option value="15:00 - 16:00" <?= ($hora == "15:00 - 16:00") ? 'selected' : '' ?>>15:00 - 16:00</option>
                                                                    <option value="16:00 - 17:00" <?= ($hora == "16:00 - 17:00") ? 'selected' : '' ?>>16:00 - 17:00</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block mt-5">Editar Consulta</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>



<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>
<script>
    $(document).ready(function() {
        // Contador para generar IDs únicos
        var contador = 0;

        // Agregar un nuevo campo de entrada de archivos cuando se hace clic en el botón "Agregar Archivo"
        $('#agregar-archivo').click(function() {
            contador++;
            if (contador === 0) {
                $('<div class="form-group">' +
                    '<label for="resultados_laboratorio' + contador + '">Resultados de laboratorio:</label>' +
                    '<div id="archivos">' +
                    '<input type="file" class="form-control-file archivo" name="resultados_laboratorio[]">' +
                    '</div>' +
                    '<br>' +
                    '</div>').appendTo('#formulario #contenedor-archivos');
            } else {
                $('<div class="form-group">' +
                    '<label for="resultados_laboratorio' + contador + '">Resultados de laboratorio:</label>' +
                    '<div id="archivos">' +
                    '<input type="file" class="form-control-file archivo" name="resultados_laboratorio[]">' +
                    '<button type="button" class="btn btn-danger eliminar_archivo">Borrar</button>' +
                    '</div>' +
                    '<br>' +
                    '</div>').appendTo('#formulario #contenedor-archivos');
            }
        });

        // Eliminar un campo de archivo
        $(document).on('click', '.eliminar_archivo', function() {
            $(this).parent().remove();
        });

    });

    function confirmarEliminar(id_prueba) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción eliminará el archivo seleccionado. ¿Deseas continuar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminarArchivo(id_prueba);
            }
        });
    }

    function eliminarArchivo(id_prueba) {
        $.ajax({
            type: 'POST',
            url: '../../app/controlador/historiaClinica/historiaClinicaDeletePruebaControlador.php',
            data: {
                id_prueba: id_prueba
            },
            success: function(response) {
                try {
                    var data = JSON.parse(response);
                    if (data.success) {
                        Swal.fire(
                            'Eliminado!',
                            'El archivo ha sido eliminado.',
                            'success'
                        ).then(() => {
                            // Recargar la página después de eliminar el archivo
                            window.location.reload();
                        });
                    } else {
                        console.error("Error al eliminar: ", data.error);
                        Swal.fire(
                            'Error!',
                            'No se pudo eliminar el archivo.',
                            'error'
                        );
                    }
                } catch (e) {
                    console.error("Error parsing JSON response: ", e);
                    Swal.fire(
                        'Error!',
                        'Ocurrió un error al procesar la solicitud.',
                        'error'
                    );
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
                Swal.fire(
                    'Error!',
                    'Ocurrió un error en la solicitud.',
                    'error'
                );
            }
        });
    }
</script>