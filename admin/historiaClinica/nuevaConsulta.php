<?php 
include('../../app/config.php');
include('../layout/parte1.php');
$id_paciente = $_GET['id_paciente'];
include('../../app/controlador/historiaClinica/historiaClinicaPacientesShowControlador.php'); 
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
                    <form action="./../../app/controlador/historiaClinica/historiaClinicaNuevaControlador.php" method="post" enctype="multipart/form-data">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="padecimiento" role="tabpanel" aria-labelledby="padecimiento-tab">
                                <div class="row bg-white">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Paciente</label>
                                            <input class="form-control" name="nombre_paciente" id="nombre_paciente" value="<?= $nombre_completo ?>" readonly></input>
                                            <input type="text" readonly class="form-control" name="id_paciente" id="id_paciente" value="<?= $id_paciente ?>" hidden>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="motivo_consulta">Motivo de consulta</label>
                                                    <select class="form-control" name="motivo_consulta" id="motivo_consulta" required>
                                                        <option value="">Seleccione una opción</option>
                                                        <option value="nueva">Nueva Consulta</option>
                                                        <option value="control">Control</option>
                                                        <option value="revaaluación">Revaaluación</option>
                                                        <option value="seguimiento">Seguimiento</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_consulta">Fecha de consulta</label>
                                                    <input type="date" class="form-control" name="fecha_consulta" id="fecha_consulta" value="<?=$fecha?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Médico responsable</label>
                                            <input type="text" class="form-control" name="medico" id="medico">
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Diagnostico</label>
                                            <input class="form-control" id="diagnostico" name="diagnostico" required></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Notas de Padecimiento:</label>
                                            <textarea class="form-control" id="notas_padecimiento" name="notas_padecimiento" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="formulario">
                                            <div class="form-group" id="contenedor-archivos">
                                                <label for="id_paciente">Resultados de laboratorio:</label>
                                                <div id="archivos">
                                                    <input type="file" class="form-control-file archivo" name="resultados_laboratorio[]">
                                                </div>
                                                <br>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="agregar-archivo">Agregar Archivo</button>
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
                                                <input class="form-control" value="<?= $nombre_completo ?>" disabled></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Solicitud de nuevos examenes</label>
                                                <input type="text" class="form-control" name="examenes" id="examenes">
                                            </div>
                                            <div class="form-group">
                                                <label for="notas_padecimiento">Tratamiento</label>
                                                <input class="form-control" id="tratamiento" name="tratamiento"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="duracion">Duración del tratamiento</label>
                                                <input class="form-control" id="duracion_tratamiento" name="duracion_tratamiento"></input>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="formulario">
                                                <div class="form-group">
                                                    <label>Medicamentos</label>
                                                    <input type="text" class="form-control" name="medicamentos" id="medicamentos">
                                                </div>
                                                <div class="form-group">
                                                    <label for="notas_padecimiento">Notas de Tratamiento</label>
                                                    <textarea class="form-control" id="notas_tratamiento" name="notas_tratamiento" rows="4"></textarea>
                                                </div>
                                                <br>
                                                <div class="card">
                                                    <div class="form-group m-3">
                                                        <label>Motivo de la próxima cita</label>
                                                        <select class="form-control" name="tipo_servicio" id="tipo_servicio" >
                                                            <option value="">Seleccione una opción</option>
                                                            <option value="control">Control</option>
                                                            <option value="revaluación">Revaaluación</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Próxima cita</label>
                                                                <input type="date" class="form-control" name="fecha" id="fecha">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Hora</label>
                                                                <select class="form-control" name="hora" id="hora">
                                                                    <option value="">Seleccione una Hora para la cita</option>
                                                                    <option value="08:00 - 09:00">08:00 - 09:00</option>
                                                                    <option value="09:00 - 10:00">09:00 - 10:00</option>
                                                                    <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                                    <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                                    <option value="12:00 - 13:00">12:00 - 13:00</option>
                                                                    <option value="14:00 - 15:00">14:00 - 15:00</option>
                                                                    <option value="15:00 - 16:00">15:00 - 16:00</option>
                                                                    <option value="16:00 - 17:00">16:00 - 17:00</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block mt-5">Guardar Consulta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('../layout/parte2.php');
include('../layout/mensaje.php'); 
?>

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
</script>
