<?php
$id_historia = $_GET['id_historia'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowCreateControlador.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowCreateControlador2.php');
?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-5">
            <div class="card card-outline card-primary mt-lg-2">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="padecimiento-tab" data-toggle="tab" href="#padecimiento" role="tab" aria-controls="padecimiento" aria-selected="true">Notas de Padecimiento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tratamiento-tab" data-toggle="tab" href="#tratamiento" role="tab" aria-controls="tratamiento" aria-selected="false">Tratamientos</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form action="./../../app/controlador/historiaClinica/historiaClinicaUpdateControlador.php" method="post" enctype="multipart/form-data">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="padecimiento" role="tabpanel" aria-labelledby="padecimiento-tab">
                                <div class="row bg-white">
                                    <div class="col-md-6">
                                        <h1>Actualizar Consulta:</h1>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Paciente</label>
                                            <input class="form-control" name="nombre_paciente" id="nombre_paciente" value="<?= htmlspecialchars($nombre_completo) ?>"></input>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="motivo_consulta">Motivo de consulta</label>
                                                    <input type="text" name="motivo_consulta" id="motivo_consulta" class="form-control" value="<?= htmlspecialchars($motivo_consulta) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_consulta">Fecha de consulta</label>
                                                    <input type="date" class="form-control" name="fecha_consulta" id="fecha_consulta" value="<?= htmlspecialchars($fecha_consulta) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Médico responsable</label>
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($medico_responsable) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Diagnóstico</label>
                                            <input class="form-control" name="diagnostico" id="diagnostico" value="<?= htmlspecialchars($diagnostico) ?>"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Notas de Padecimiento:</label>
                                            <textarea class="form-control" name="notas_padecimiento" id="notas_padecimiento" rows="4" style="resize: none;"><?= htmlspecialchars($notas_padecimiento) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="formulario">
                                            <div class="form-group" id="contenedor-archivos">
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
                                                <div id="archivos">
                                                    <input type="file" class="form-control-file archivo" name="resultados_laboratorio[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tratamiento" role="tabpanel" aria-labelledby="tratamiento-tab">
                                <div class="form-group">
                                    <div class="row bg-white">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="notas_padecimiento">Paciente</label>
                                                <input class="form-control" value="<?= htmlspecialchars($nombre_completo) ?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Solicitud de nuevos exámenes</label>
                                                <input class="form-control" value="<?= htmlspecialchars($examenes) ?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="notas_padecimiento">Tratamiento</label>
                                                <input class="form-control" id="tratamiento" value="<?= htmlspecialchars($tratamiento) ?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="duracion">Duración del tratamiento</label>
                                                <input class="form-control" value="<?= htmlspecialchars($duracion_tratamiento) ?>"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="formulario">
                                                <div class="form-group">
                                                    <label>Medicamentos</label>
                                                    <input type="text" class="form-control" value="<?= htmlspecialchars($medicamentos) ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="notas_padecimiento">Notas de Tratamiento</label>
                                                    <textarea class="form-control" rows="4" style="resize: none;"><?= htmlspecialchars($notas_tratamiento) ?></textarea>
                                                </div>
                                                <br>
                                                <div class="card">
                                                    <div class="form-group m-3">
                                                        <label>Motivo de la próxima cita</label>
                                                        <input type="text" class="form-control" value="<?= htmlspecialchars($tipo_servicio) ?>">
                                                    </div>
                                                    <div class="form-group m-3">
                                                        <label>Fecha de la cita</label>
                                                        <input type="date" class="form-control" value="<?= htmlspecialchars($fecha) ?>">
                                                    </div>
                                                    <div class="form-group m-3">
                                                        <label>Hora de la cita</label>
                                                        <input type="time" class="form-control" value="<?= htmlspecialchars($hora) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3 mb-3">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                    <button type="button" id="agregar-archivo" class="btn btn-primary mt-3 mb-3">Agregar archivo</button>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php include('../layout/parte2.php'); ?>
<?php include('../layout/mensaje.php'); ?>

<script>
    $(document).ready(function() {
        var contador = 0;

        $('#agregar-archivo').click(function() {
            contador++;
            $('<div class="form-group">' +
                '<label for="resultados_laboratorio' + contador + '">Resultados de laboratorio:</label>' +
                '<input type="file" class="form-control-file archivo" name="resultados_laboratorio[]" id="resultados_laboratorio' + contador + '" multiple>' +
                '</div>').appendTo('#formulario #contenedor-archivos');
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
