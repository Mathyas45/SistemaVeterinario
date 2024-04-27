<?php 
$id_historia = $_GET['id_historia'];
include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowCreateControlador.php'); 


?>

<div class="container-fluid">

    <div class="row mt-3">
        <!-- <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h1>Nueva Consulta</h1>

                </div>
            </div>
        </div> -->

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
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="padecimiento" role="tabpanel" aria-labelledby="padecimiento-tab">
                                <!-- Formulario para notas de padecimiento -->

                                <div class="row bg-white">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Paciente</label>
                                            <input class="form-control" name="nombre_paciente" id="nombre_paciente" value="<?= $nombre_completo ?>" readonly></input>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="motivo_consulta">Motivo de consulta</label>
                                                    <input type="text" class="form-control" value="<?= $motivo_consulta ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fecha_consulta">Fecha de consulta</label>
                                                    <input type="date" class="form-control" value="<?=$fecha_consulta?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Médico responsable</label>
                                            <input type="text" class="form-control" value="<?=$medico_responsable?>" readonly >
                                        </div>

                                        <div class="form-group">
                                            <label for="notas_padecimiento">Diagnostico</label>
                                            <input class="form-control" value="<?=$diagnostico?>" readonly></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="notas_padecimiento">Notas de Padecimiento:</label>
                                            <label class="form-control" value="<?=$notas_padecimiento?>" rows="4" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="formulario">
                                            <div class="form-group" id="contenedor-archivos">

                                                <label for="id_paciente">Resultados de laboratorio:</label>
                                                <input type="file" class="form-control-file" id="resultados_laboratorio" name="resultados_laboratorio[]">
                                                <br>

                                                <button type="button" class="btn btn-primary" id="agregar-archivo">Agregar Archivo</button>

                                            </div>
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
                                                <input class="form-control" value="<?= $nombre_completo ?>" disabled></input>
                                            </div>

                                            <div class="form-group">
                                                <label>Solicitud de nuevos examenes</label>
                                                <input type="text" class="form-control" value="<?= $examenes ?>" disabled >
                                            </div>

                                            <div class="form-group">
                                                <label for="notas_padecimiento">Tratamiento</label>
                                                <input class="form-control" id="tratamiento" value="<?= $tratamiento ?>" disabled></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="duracion">Duración del tratamiento</label>
                                                <input class="form-control" value="<?= $duracion_tratamiento ?>" disabled ></input>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div id="formulario">
                                                <div class="form-group">
                                                    <label>Medicamentos</label>
                                                    <input type="text" class="form-control" value="<?= $medicamentos ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="notas_padecimiento">Notas de Tratamiento</label>
                                                    <label class="form-control" value="<?= $notas_tratamiento ?>" readonly></label>
                                                </div>
                                                <br>
                                                <div class="card">
                                                    <div class="form-group m-3">
                                                        <label>Motivo de la próxima cita</label>
                                                        <input type="text" class="form-control" value="<?= $tipo_servicio ?>" disabled>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Próxima cita</label>
                                                                <input type="date" class="form-control" value="<?= $fecha ?>" disabled>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Hora</label>
                                                                <input type="text" class="form-control" value="<?= $hora ?>" disabled>
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
            $('<div class="form-group">' +
                '<label for="resultados_laboratorio' + contador + '">Resultados de laboratorio:</label>' +
                '<input type="file" class="form-control-file archivo" name="resultados_laboratorio[]" id="resultados_laboratorio' + contador + '" multiple>' +
                '</div>').appendTo('#formulario #contenedor-archivos');
        });
    });
</script>