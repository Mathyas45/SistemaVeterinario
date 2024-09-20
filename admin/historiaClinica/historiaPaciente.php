<?php include('../../app/config.php');
include('../layout/parte1.php');
$id_paciente = $_GET['id_Paciente'];
include('../../app/controlador/historiaClinica/historiaClinicaPacientesShowControlador.php');
include('../../app/controlador/historiaClinica/historiaClinicaShowControlador.php');
include('../../app/controlador/historiaClinica/historiaClinicaProximaCitaControlador.php');


// Suponiendo que $fecha_nacimiento y $fecha son cadenas de fecha en formato 'YYYY-MM-DD'
$fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
$fecha_dt = new DateTime($fecha);
$edad = $fecha_nacimiento_dt->diff($fecha_dt)->y;
?>
<div class="container-fluid ">
    <br>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h1>Historia Clínica del Paciente: <b><?= ' ' . $nombre_completo ?></b></h1>
                    </div>
                    <div class="col-md-3">
                        <h3>Género: <b><?= ($genero === 'F') ? 'Femenino' : 'Masculino' ?></b></h3>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <h3>Dni: <b><?= $dni ?></b></h3>
                    </div>
                    <div class="col-md-4">
                        <h3>Fecha de Nacimiento: <b><?= $fecha_nacimiento ?></b></h3>
                    </div>
                    <div class="col-md-3">
                        <h3>Edad: <b><?= $edad ?></b></h3>
                    </div>
                    <div class="col-md-3">
                        <a href="nuevaConsulta.php?id_paciente=<?php echo $id_paciente; ?>" class="btn btn-primary btn-lg ml-auto"><i class="bi bi-plus-circle"></i> Nueva Consulta</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 mb-5">
            <div class="card card-outline card-primary mt-lg-2">
                <div class="card-header">
                    <h3 class="card-title">Historial Clínico</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12" id="divListadoPaciente">

                        <table id="example1" class=" table table-resposive table-striped table-bordered table-hover ">
                            <thead class="bg-primary">
                                <tr>
                                    <th style="text-align: center;">Nro</th>
                                    <th style="text-align: center;">Fecha</th>
                                    <th style="text-align: center;">tipo Consulta</th>
                                    <th style="text-align: center;">Motivo</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($historias as $historia) { ?>
                                    <?php $id_historia = $historia['id_historia']; 
                                    ?>
                                    <tr>
                                        <td><?php echo $contador = $contador + 1; ?> </td>
                                        <td><?php echo $historia['fecha_consulta']; ?> </td>
                                        <td><?php echo $historia['motivo_consulta']; ?> </td>
                                        <td><?php echo $historia['diagnostico']; ?> </td>

                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="showConsulta.php?id_historia=<?php echo $id_historia; ?>" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i> Ver</a>
                                                    <a href="updateConsulta.php?id_historia=<?= $id_historia; ?>&id_paciente=<?= $id_paciente; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                                                    <a href="#" class="btn btn-outline-primary" onclick="confirmarEliminacion(<?php echo $id_historia; ?>, <?php echo $id_paciente; ?>)">
                                                        <i class="bi bi-trash3-fill"></i> Eliminar
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>

                        <br>
                        <br>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h3>Próxima Cita</h3>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <?php
                            if ($proximaCitas) {
                                foreach ($proximaCitas as $cita) {
                                    // Convertir la fecha de la base de datos a un formato legible
                                    $fecha_cita = date("Y-m-d", strtotime($cita['fecha_cita']));
                                    $dia = date('d', strtotime($fecha_cita));
                                    $mes = date('F', strtotime($fecha_cita));
                                    $anio = date('Y', strtotime($fecha_cita)); ?>

                                    <div class="col-md-4 col-sm-12 border-right" style="border-left: 5px solid #007bff;"> <!-- Aplicamos un borde azul sólido de 5px de ancho -->
                                        <!-- Información de fecha -->
                                        <div class="card-body">
                                            <p class="card-text">
                                            <h4 class="ml-2"><b><?= $dia ?></b></h4>
                                            <h5><?= $mes ?> </h5>
                                            <h5><?= $anio ?></h5>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <!-- Información de la cita -->
                                        <div class="card-body">
                                            <h5 class="card-text">Hora Cita: <b><?= $cita['hora_cita']; ?> </b></h5>
                                            <h5 class="card-text">Tipo de servicio: <b><?= $cita['tipo_servicio']; ?></b></h5>
                                            <p class="card-text"><small class="text-muted">Fecha de Creación: <?= $cita['fyh_creacion']; ?></small></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="col-md-8 col-sm-12">
                                    <!-- Información de la cita -->
                                    <div class="card-body">
                                        <h5 class="card-title">No hay citas programadas</h5>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-outline card-primary">
                <div class="card-body">
                    <h3>Exames de laboratorios y fotos</h3>
                    <div class="card mb-3" style="max-width: 540px;">
                        <table id="example2" class=" table table-resposive table-striped table-bordered table-hover ">
                            <thead class="bg-primary">
                                <tr>
                                    <th style="text-align: center;">Nro</th>
                                    <th style="text-align: center;">Nombre</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $contador = 0;
                                foreach ($historias as $historia) { ?>
                                    <?php $id_historia = $historia['id_historia']; 
                                        $id_paciente = $historia['paciente_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $contador = $contador + 1; ?> </td>
                                        <td><?php echo $historia['fecha_consulta']; ?> </td>

                                        <td>
                                            <center>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="showConsulta.php?id_historia=<?php echo $id_historia; ?>" class="btn btn-outline-primary"><i class="bi bi-eye-fill"></i> Ver</a>
                                                    <a href="#" class="btn btn-outline-primary" onclick="confirmarEliminacion(<?php echo $id_usuario; ?>);">
                                                        <i class="bi bi-trash3-fill"></i> Eliminar
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

<?php
include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>

<script>
    function confirmarEliminacion(id_historia, id_paciente) {
        Swal.fire({
            title: '¿Estás seguro de eliminar la consulta?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                type: 'POST',
                url : '../../app/controlador/historiaClinica/historiaClinicaDeleteControlador.php',
                data: {
                    id_historia: id_historia,
                    id_paciente: id_paciente
                },
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.success) {
                        window.location.href = data.redirect_url;
                    }
                }
            });
            }
        })
    }
    $(function() {
        $("#example1").DataTable({
            "pageLength": 6,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Pacientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'csv'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed one-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
        $("#example2").DataTable({
            "pageLength": 3,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Pacientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,


        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>