<?php include('../../app/config.php');
include('../layout/parte1.php');
include('../../app/controlador/historiaClinica/historiaClinicaPacientesListadoControlador.php'); ?>

<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h1>Historia Clínica de pacientes</h1>

                </div>
            </div>

            <div class="card card-outline card-primary mt-lg-2">
                <div class="card-header">
                    <h3 class="card-title">Pacientes Registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12" id="divListadoPaciente">

                            <table id="example1" class="table table-resposive table-striped table-bordered table-hover ">
                                <thead class="bg-primary">
                                    <tr>
                                        <th style="text-align: center;">Nro</th>
                                        <th style="text-align: center;">Nombre y Apellidos</th>
                                        <th style="text-align: center;">dni</th>
                                        <th style="text-align: center;">Usuario</th>
                                        <th style="text-align: center;">Acciones</th>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($pacientes as $paciente) { ?>
                                        <?php $id_Paciente = $paciente['id']; ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1; ?> </td>
                                            <td><?php echo $paciente['nombre_completo']; ?> </td>
                                            <td><?php echo $paciente['dni']; ?> </td>
                                            <td><?php echo $paciente['usuario']; ?> </td>

                                            <td>
                                                <center>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="historiaPaciente.php?id_Paciente=<?php echo $id_Paciente; ?>" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Historial Clínico</a>

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
        </div>

    </div>

</div>


<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 7,
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
</script>