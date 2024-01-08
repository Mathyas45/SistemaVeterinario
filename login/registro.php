<?php
include('../app/config.php');
include('../layout/parte1.php');
?>


<div class="container">
    <br>
    <br>
    <center>
        <h1>Registrate</h1>
        <br>
    </center>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Introduce tus datos
                </div>
                <div class="card-body">
                    <form action="../app/controlador/login/registroControlador.php" method="post">
                        <label for="">Nombres y apellidos</label>
                        <input type="text" class="form-control" name="nombre_completo" placeholder="Introduce tus nombres y apellidos" value="<?php echo isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : ''; ?>">
                        <br>
                        <label for="">Correo Electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Introduce tu correo electrónico" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        <br>
                        <label for="">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Introduce tu contraseña">
                        <br>
                        <label for="">Repita la Contraseña</label>
                        <input type="password" class="form-control" name="password_verify" placeholder="Introduce tu contraseña">
                        <hr>
                        <button class="btn btn-primary" type="submit" style="width: 100%;">Registrarse</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>
</div>
<br><br>

<?php include('../layout/parte2.php');

include('../admin/layout/mensaje.php'); ?>
