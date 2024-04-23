<?php
session_start();
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
        $apellido_completo_sesion = $usuario['apellido'];

        $cargo_sesion = $usuario['cargo'];
    }
    if ($cargo_sesion == "CLIENTE") {
        header('Location: ' . $URL . '/');
    }
} else {
    echo "no ha pasado por el login";
    header('Location: ' . $URL . '/login');
}

?>

<style>
    .active {
    background-color: #007bff; /* Color de fondo para el elemento activo */
    color: #fff; /* Color de texto para el elemento activo */
    border-radius: 5px; /* Ajusta el radio de borde si deseas esquinas redondeadas */
}
</style>
<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APP_NAME; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini ">
    <div class="wrapper ">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo $URL; ?>/admin" class="nav-link text-white"><?php echo APP_NAME ?></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- menu Sidebar Container -->
        <aside class="main-sidebar bg-white sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo $URL; ?>/admin" class="bg-primary brand-link ">
                <img src="<?php echo $URL; ?>/public/img/355326638_591241446524239_5854611868236442444_n.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class=" text-white font-weight-bold brand-text font-weight-light">Rivas Dent</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block font-weight-bold text-primary"><?= $nombre_completo_sesion." ".$apellido_completo_sesion; ?></a>
                    </div>
                </div>



                <!-- Sidebar Menu desplegable-->
                <nav class="mt-2">
                    <!-- Usuarios -->
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-outline-primary d-flex align-items-center">
                                <i class="nav-icon bi bi-person-badge text-primary mr-2"></i>
                                <p class="text-primary mb-0">Usuarios</p>
                                <i class="text-primary fas fa-angle-left ml-auto"></i>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/admin/usuarios" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Listado de Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/admin/usuarios/create.php" class="nav-link">
                                        <i class=" far fa-circle nav-icon"></i>
                                        <p>Nuevo Usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>/admin/pacientes" class="nav-link btn btn-outline-primary d-flex align-items-center">
                                <i class="nav-icon bi bi-people-fill text-primary"></i>
                                <p class="text-primary mb-0 ml-2">Pacientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>/admin/historiaClinica" class="nav-link btn btn-outline-primary d-flex align-items-center">
                                <i class="nav-icon bi bi-person-lines-fill text-primary"></i>
                                <p class="text-primary mb-0 ml-2">Historia Clínica</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link  btn btn-outline-primary d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="nav-icon fas fa-box text-primary"></i>
                                    <p class="text-primary">Productos</p>
                                </div>
                                <i class="fas fa-angle-left"></i>
                            </a>

                            <!-- Productos -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/admin/productos" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Listado de Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/admin/productos/create.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nuevo Productos</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- Fin de productos -->

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link btn btn-outline-primary d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="nav-icon fas fa-calendar-event-fill">
                                        <i class="bi bi-calendar-event-fill text-primary"></i>
                                    </i>
                                    <p class="text-primary">Reservas</p>
                                </div>
                                <i class="fas fa-angle-left"></i>
                            </a>
                            <!-- Productos -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/admin/reservas" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Listado de Reservas</p>
                                    </a>
                                </li>

                            </ul>
                            <!-- Fin de productos -->

                        </li>


                        <li class="nav-item">
                            <a href="<?= $URL; ?>/login/logout.php" class="nav-link btn btn-outline-danger d-flex align-items-center">
                                <div>
                                    <i class="text-danger nav-icon fas fa-door-open mr-2"></i>
                                    <p class="text-danger mb-0">Cerrar Sesión</p>
                                </div>
                            </a>


                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Contenido -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">