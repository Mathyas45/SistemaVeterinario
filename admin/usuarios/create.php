<?php
include('../../app/config.php');
include('../layout/parte1.php');
?>

<div class="container-fluid">
    <h1>Crear Nuevo Usuario</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Usuario</h3>

                </div>

                <div class="card-body">

                    <form action="../../app/controlador/usuarios/createUsuarioControlador.php" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre y apellidos *</label>
                                    <input type="text" name="nombre_completo" class="form-control text-uppercase" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Correo Electrónico *</label>
                                    <input type="email" name="email" class="form-control text-lowercase">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contraseña *</label>
                                    <input type="text" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Verificar Contraseña *</label>
                                    <input type="text" name="password_verify" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <select class="form-control" name="cargo" id="">
                                        <option value="">Seleccione</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Cliente">Cliente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="" class="btn btn-danger">Cancelar</a>
                                <input type="submit" class="btn btn-primary" value="Registrar Usuario">


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