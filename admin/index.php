<?php
include('../app/config.php');
include('../admin/layout/parte1.php');
include('../app/controlador/usuarios/usuariosControlador.php');
include('../app/controlador/productos/listadoProductosControlador.php');
include('../app/controlador/reservas/listadoReservasControlador.php');
?>
<script>
window.onload = function() {
    // Verificar si el usuario ha dado permiso previamente
    var permiso = localStorage.getItem('permisoSonido');
    if (permiso === null) {
        // Mostrar un mensaje de confirmación
        var consentimiento = confirm("¿Deseas permitir la reproducción automática de sonido para recibir notificaciones de nuevas reservas?");
        if (consentimiento) {
            // Guardar la preferencia del usuario
            localStorage.setItem('permisoSonido', 'true');
        }
    }
};

function checkForNewReservations() {
    // Verificar si el usuario ha dado permiso para la reproducción automática
    var permiso = localStorage.getItem('permisoSonido');
    if (permiso === 'true') {
        // Realizar la verificación y reproducir el sonido si es necesario
        // Tu lógica para verificar nuevas reservas y reproducir sonido aquí
    }
}

// Crear un nuevo objeto de Audio y cargar el sonido
var audio = new Audio('../public/sonidos/livechat-129007.mp3');

function checkForNewReservations() {
    // Realizar una solicitud AJAX al servidor para verificar nuevas reservas
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Si la respuesta es exitosa, verificar si hay nuevas reservas
                var response = JSON.parse(xhr.responseText);
                if (response.newReservations) {
                    // Reproducir el sonido
                    playAlertSound();
                }
            } else {
                console.error('Error al verificar nuevas reservas');
            }
        }
    };
    xhr.open('GET', 'check_new_reservations.php', true);
    xhr.send();
}

function playAlertSound() {
    // Reproducir el sonido
    audio.play();
}


// Verificar nuevas reservas cada 60 segundos
setInterval(checkForNewReservations, 60000);
</script>



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


<?php include('../admin/layout/parte2.php'); ?>