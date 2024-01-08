<?php include('../../app/config.php'); ?>
<?php include('../layout/parte1.php'); ?>
<?php include('../../app/controlador/productos/listadoProductosControlador.php'); ?>


<div class="container-fluid">
    <h1>Listado de Productos</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Productos Registrados</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-resposive table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Código</th>
                                <th>Nombre del prod</th>
                                <th>Imagen</th>
                                <th>Stock</th>
                                <th>Precio C.</th>
                                <th>Precio v.</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $contador = 0;
                            foreach ($productos as $producto) { ?>
                                <?php $id_producto = $producto['id_producto']; ?>
                                <tr>
                                    <td><?php echo $contador = $contador + 1; ?> </td>
                                    <td><?php echo $producto['codigo']; ?> </td>
                                    <td><?php echo $producto['nombre_producto']; ?> </td>
                                    <td>
                                        <center>
                                        <img src="<?= $URL."/public/img/productos/". $producto['imagen']; ?> " width="150px"  alt=""> 
                                        </center>
                                    </td>
                                    <td><?php echo $producto['stock']; ?> </td>
                                    <td><?php echo $producto['precio_compra']; ?> </td>
                                    <td><?php echo $producto['precio_venta']; ?> </td>

                                    <td>
                                        <center>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="show.php?id_producto=<?php echo $id_producto; ?>" class="btn btn-success"><i class="bi bi-eye-fill"></i> Ver</a>
                                                <a href="update.php?id_producto=<?php echo $id_producto; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
                                                <a href="#" class="btn btn-danger" onclick="confirmarEliminacion(<?php echo $id_producto; ?>);">
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
    function confirmarEliminacion(id_producto) {
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
                window.location.href = "delete.php?id_producto=" + id_producto;
            }
        });
        return false; // Evita el comportamiento predeterminado del enlace
    }

    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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