<?php include('../../app/config.php'); ?>
<?php include('../layout/parte1.php'); ?>
<?php include('../../app/controlador/usuarios/usuariosControlador.php'); ?>


<div class="container-fluid">
    <h1>Listado de Usuarios</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuarios Registrados</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-resposive table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($usuarios as $usuario) { ?>
                                <?php $id_usuario = $usuario['id_usuario']; ?>
                                <tr>
                                    <td><?php echo $contador = $contador + 1; ?> </td>
                                    <td><?php echo $usuario['nombre_completo']; ?> </td>
                                    <td><?php echo $usuario['email']; ?> </td>
                                    <td><?php echo $usuario['cargo']; ?> </td>

                                    <td>
                                        <center>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id_usuario=<?php echo $id_usuario; ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i> Ver</a>
                                                <a href="update.php?id_usuario=<?php echo $id_usuario; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
                                                <a href="#" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $id_usuario; ?>);">
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

</div>


<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>

<script>
    function confirmarEliminacion(idUsuario) {
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
                // Redirecciona al archivo que maneja la eliminación
                window.location.href = "eliminar.php?id_usuario=" + idUsuario;
            }
        });
        return false; // Evita el comportamiento predeterminado del enlace
    }

    $(function() {
        $("#example1").DataTable({
            "pageLength": 7,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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