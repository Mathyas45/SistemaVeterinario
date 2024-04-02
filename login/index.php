<?php
include('../app/config.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APP_NAME ?> | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-6 ">
                <a class="btn btn-danger btn-lg" href="../index.php"><i class="bi bi-arrow-90deg-left"></i></a>

            </div>
            <div class="login-box col-md-6 col-sm-12 mx-auto">
                <div class="login-logo">
                    <a href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/index2.html"><b>COAX</b> Login</a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <center>

                            <img src="<?php echo $URL; ?>/public/img/rivasDent.jpg" width="60%" alt="">
                        </center>

                        <p class="login-box-msg">Ingresa tus datos</p>

                        <form action="<?php echo $URL; ?>/app/controlador/login/loginControlador.php" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <button type="submit" class="btn btn-primary" style="width:100%" href=""><i class="bi bi-box-arrow-in-right"></i> Ingresar</button>
                            <br>
                            <br>
                            <a class="btn btn-danger" style="width:100%" href="../index.php"><i class="bi bi-x-lg"></i> Volver</a>
                        </form>

                        <?php
                        session_start();
                        if (isset($_SESSION['mensaje'])) {
                            $mensaje = $_SESSION['mensaje'];
                        ?>
                            <script>
                                Swal.fire({
                                    position: "top-end",
                                    icon: "error",
                                    title: "<?= $mensaje; ?>",
                                    showConfirmButton: false,
                                    timer: 3500
                                });
                            </script>
                        <?php
                            session_destroy();
                        }
                        ?>



                        <!-- /.social-auth-links -->

                        <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>



    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>