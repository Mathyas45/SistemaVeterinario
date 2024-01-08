<?php
include('../../app/config.php');
include('../layout/parte1.php');

$id_usuario = $_GET['id_usuario'];
include('../../app/controlador/usuarios/verUsuario.php');


?>


<div class="container-fluid">
    <h1>Actualizar datos del Usuario: <?php echo " " . $nombre_completo; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>

                </div>

                <div class="card-body">

                    <form action="../../app/controlador/usuarios/actualizarUsuarioControlador.php" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre y apellidos *</label>
                                    <input type="text" name="nombre_completo" value="<?php echo $nombre_completo ?>" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico *</label>
                                    <input type="email" name="email" value="<?php echo $email ?>" class="form-control text-lowercase">
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario ?>" class="form-control text-lowercase" hidden>

                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contraseña *</label>
                                    <input type="text" name="password" class="form-control"  placeholder="Ingrese su nueva contraseña">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Verificar Contraseña *</label>
                                    <input type="text" name="password_verify" class="form-control"  placeholder="Confirme su nueva contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <select class="form-control" name="cargo" id="">
                                        <?php
                                        if ($cargo == "Administrador") { ?>
                                            <option value="Administrador">Administrador</option>
                                            <option value="Cliente">Cliente</option>

                                        <?php
                                        } else { ?>
                                            <option value="Cliente">Cliente</option>
                                            <option value="Administrador">Administrador</option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="index.php" class="btn btn-danger">Cancelar</a>
                                <input type="submit" class="btn btn-warning" value="Actualizar Usuario">


                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>

</div>

<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>