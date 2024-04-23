<?php include('../../app/controlador/pacientes/pacientesListadoControlador.php'); ?>

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
                            <button type="button" class="btn btn-outline-primary" onclick="modalPaciente('ver', <?= $id_Paciente ?>)"><i class="bi bi-eye-fill"></i> Ver</button>
                            <button type="button" class="btn btn-primary" onclick="modalPaciente('editar', <?= $id_Paciente ?>)"><i class="bi bi-pencil-square"></i> Editar</button>
                            <a href="#" class="btn btn btn-outline-primary" onclick="confirmarEliminacion(<?php echo $id_Paciente; ?>);">
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