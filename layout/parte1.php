<?php
session_start();
$email_sesion = "";
if (isset($_SESSION['sesion_email'])) {
    // echo "ha pasado por el login";

    $email_sesion = $_SESSION['sesion_email'];
    $sql  = "SELECT * FROM tb_usuarios where username = '$email_sesion' ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombre_completo_sesion = $usuario['nombre'];
    }
} else {
    // echo "no ha pasado por el login";
    // header('Location: ' . $URL . '/login');
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo APP_NAME; ?>
    </title>

    <!--  CSS -->
    <link rel="stylesheet" href="../public/style/style.css">
    <!-- Bootstrap CSS -->
    <link href="<?= $URL; ?>/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- JQUERY -->
    <script src="public/js/jquery-3.7.1.min.js"></script>

    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Navbar Brand -->
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a style="color:#212A4B;" class="navbar-brand" href="<?= $URL; ?>">
                    <img src="public/img/355326638_591241446524239_5854611868236442444_n.jpg" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
                    Rivas Dent
                </a>
            </div>
        </nav>
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar Items -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-start"> <!-- Agrega la clase text-start aquí -->
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary" href="#">Reservar Cita</a>
                </li>
                <!-- Aquí puedes agregar más elementos del navbar si es necesario -->
            </ul>
            <!-- Navbar Search -->
            <div class="d-flex" style="margin-right: 58px;">
                <?php
                if ($email_sesion == "") {
                ?>
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-info ingresar" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ingresar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login">Iniciar Sesión</a></li>
                                <li><a class="dropdown-item" href="login/registro.php">Registrarme</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav me-auto mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-info ingresar text-start" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <!-- Agrega la clase text-start aquí -->
                                Bienvenido: <?= $email_sesion; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= $URL; ?>/app/controlador/login/cerrarSesion.php">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>
