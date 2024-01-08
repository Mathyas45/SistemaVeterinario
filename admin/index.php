<?php
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controlador/usuarios/usuariosControlador.php');
include('../app/controlador/productos/listadoProductosControlador.php');
include('../app/controlador/reservas/listadoReservasControlador.php');
?>


<h2>Bienvenido al sistema - <?= $nombre_completo_sesion; ?></h2>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                    $contador_usuarios = 0;
                    foreach ($clientes as $cliente) {
                        $contador_usuarios = $contador_usuarios + 1;
                    }
                    ?>
                    <h3><?= $contador_usuarios; ?></h3>
                    <p>Clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-"></i>
                    <i class="bi bi-person-bounding-box"></i>
                </div>
                <a href="<?= $URL . "/admin/usuarios" ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- productos -->
        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <?php
                    $contador_productos = 0;
                    foreach ($productos as $producto) {
                        $contador_productos = $contador_productos + 1;
                    }
                    ?>
                    <h3><?= $contador_productos; ?></h3>
                    <p>Productos registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-"></i>
                    <i class="bi bi-box2-fill"></i>
                </div>
                <a href="<?= $URL . "/admin/usuarios" ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Reservas -->
        <div class="col-lg-3 col-6">

            <div class="small-box bg-primary">
                <div class="inner">
                    <?php
                    $contador_reservas = 0;
                    foreach ($reservasHoy as $reservasHo) {
                        $contador_reservas = $contador_reservas + 1;
                    }
                    ?>
                    <h3><?= $contador_reservas; ?></h3>
                    <p>Reservas registradas para hoy</p>
                </div>
                <div class="icon">
                    <i class="ion ion-"></i>
                    <i class="bi bi-calendar-check"></i>
                </div>
                <a href="<?= $URL . "/admin/reservas" ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>


<?php include('../admin/layout/parte2.php');
