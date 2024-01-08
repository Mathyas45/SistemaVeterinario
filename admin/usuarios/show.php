<?php
include('../../app/config.php');
include('../layout/parte1.php');

$id_usuario = $_GET['id_usuario'];
include('../../app/controlador/usuarios/verUsuario.php');


?>

<div class="container-fluid">
    <h1>Observar datos del Usuario: <?php echo $nombre_completo ;?></h1>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>

                </div>

                <div class="card-body">


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre y apellidos</label>
                                    <input type="text" value="<?php echo $nombre_completo ;?>" name="nombre_completo" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico</label>
                                    <input type="email" value="<?php echo $email ;?>" name="email" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
        
                        <div class="row">

                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="">Cargo</label>
                                    <input type="email" value="<?php echo $cargo ;?>" name="email" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="index.php" class="btn btn-danger">Cancelar</a>


                            </div>
                        </div>

                </div>

            </div>
        </div>

    </div>

</div>

<?php include('../layout/parte2.php');
include('../layout/mensaje.php'); ?>